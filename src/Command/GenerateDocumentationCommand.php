<?php

namespace PlaywrightPhp\Command;

use PlaywrightPhp\Playwright;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Process;

final class GenerateDocumentationCommand extends Command
{
    private const DOC_FILE_NAME = 'doc-generator';

    private const BUILD_DIR = __DIR__.'/../../.build';

    private const NODE_MODULES_DIR = __DIR__.'/../../node_modules';

    private const RESOURCES_DIR = __DIR__.'/../Resources';

    private const RESOURCES_NAMESPACE = 'PlaywrightPhp\\Resources';

    private const DOC_FORMAT_PHP = 'php';

    private const DOC_FORMAT_PHPSTAN = 'phpstan';

    private const DOC_FORMATS = [self::DOC_FORMAT_PHP, self::DOC_FORMAT_PHPSTAN];

    public function getName(): ?string
    {
        return 'doc:generate';
    }

    protected function configure(): void
    {
        $this->addOption(
            'playwrightPath',
            null,
            InputOption::VALUE_OPTIONAL,
            'The path where Playwright is installed.',
            self::NODE_MODULES_DIR.'/playwright-core'
        );
    }

    /**
     * Builds the documentation generator from TypeScript to JavaScript.
     */
    private static function buildDocumentationGenerator(): void
    {
        self::rmdirRecursive(self::BUILD_DIR);
        $process = new Process([
            self::NODE_MODULES_DIR.'/.bin/tsc',
            '--outDir',
            self::BUILD_DIR,
            __DIR__.'/../../src/'.self::DOC_FILE_NAME.'.ts',
        ]);
        $process->run();
    }

    /**
     * Gets the documentation from the TypeScript documentation generator.
     */
    private static function getDocumentation(string $playwrightPath, array $resourceNames): array
    {
        self::buildDocumentationGenerator();

        $files = \Safe\glob($playwrightPath . '/types/*.d.ts', GLOB_BRACE);

        $result = [];
        foreach (self::DOC_FORMATS as $format) {
            $process = new Process(
                array_merge(
                    ['node', self::BUILD_DIR.'/'.self::DOC_FILE_NAME.'.js', $format],
                    $files,
                    ['--resources-namespace', self::RESOURCES_NAMESPACE, '--resources'],
                    $resourceNames
                )
            );
            $process->mustRun();

            foreach (\Safe\json_decode($process->getOutput(), true) as &$class) {
                $result[$class['name']]['name'] = $class['name'];
                $result[$class['name']][$format] = [
                    'properties' => $class['properties'],
                    'getters' => $class['getters'],
                    'methods' => $class['methods'],
                ];
            }
        }

        return $result;
    }

    private static function getResourceNames(): array
    {
        return array_map(static function (string $filePath): string {
            return explode('.', basename($filePath))[0];
        }, glob(self::RESOURCES_DIR.'/*'));
    }

    private static function generatePhpDocWithDocumentation(array $classDocumentation): ?string
    {
        $properties = array_map(function (string $property): string {
            return "\n * @property {$property}";
        }, $classDocumentation[self::DOC_FORMAT_PHP]['properties']);
        $properties = implode('', $properties);

        $getters = array_map(function (string $getter): string {
            return "\n * @property-read {$getter}";
        }, $classDocumentation[self::DOC_FORMAT_PHP]['getters']);
        $getters = implode('', $getters);

        $methods = '';
        foreach ($classDocumentation[self::DOC_FORMAT_PHP]['methods'] as $pos => $method) {
            $methods .= "\n * @method {$method}";

            $phpStanMethod = $classDocumentation[self::DOC_FORMAT_PHPSTAN]['methods'][$pos];
            // phpStorm works incorrectly if @phpstan-method is used.
            // Using non-standard method-extended phpDoc:
            $methods .= "\n * @method-extended {$phpStanMethod}";
        }

        if ('' !== $properties || '' !== $getters || '' !== $methods) {
            return "/**{$properties}{$getters}{$methods}\n */";
        }

        return null;
    }

    /**
     * Writes the doc comment in the PHP class.
     */
    private static function writePhpDoc(string $className, string $phpDoc): void
    {
        $reflectionClass = new \ReflectionClass($className);

        if (! $reflectionClass) {
            return;
        }

        $fileName = $reflectionClass->getFileName();

        $contents = file_get_contents($fileName);

        // If there already is a doc comment, replace it.
        if ($doc = $reflectionClass->getDocComment()) {
            $newContents = str_replace($doc, $phpDoc, $contents);
        } else {
            $startLine = $reflectionClass->getStartLine();

            $lines = explode("\n", $contents);

            $before = \array_slice($lines, 0, $startLine - 1);
            $after = \array_slice($lines, $startLine - 1);

            $newContents = implode("\n", array_merge($before, explode("\n", $phpDoc), $after));
        }

        file_put_contents($fileName, $newContents);
    }

    /**
     * Executes the current command.
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $resourceNames = self::getResourceNames();
        $documentation = self::getDocumentation($input->getOption('playwrightPath'), $resourceNames);

        foreach ($resourceNames as $resourceName) {
            $classDocumentation = $documentation[$resourceName] ?? null;

            if (null !== $classDocumentation) {
                $phpDoc = self::generatePhpDocWithDocumentation($classDocumentation);
                if (null !== $phpDoc) {
                    $resourceClass = self::RESOURCES_NAMESPACE.'\\'.$resourceName;
                    self::writePhpDoc($resourceClass, $phpDoc);
                }
            }
        }

        // Handle the specific Playwright class
        $classDocumentation = $documentation['BrowserType'];
        unset($documentation['BrowserType'], $resourceNames[array_search('BrowserType', $resourceNames, true)]);

        if (null !== $classDocumentation) {
            $phpDoc = self::generatePhpDocWithDocumentation($classDocumentation);
            if (null !== $phpDoc) {
                self::writePhpDoc(Playwright::class, $phpDoc);
            }
        }

        $missingResources = array_diff(array_keys($documentation), $resourceNames);
        foreach ($missingResources as $resource) {
            $io->warning("The {$resource} class in Playwright doesn't have any equivalent in PlaywrightPhp.");
        }

        $inexistantResources = array_diff($resourceNames, array_keys($documentation));
        foreach ($inexistantResources as $resource) {
            $io->error("The {$resource} resource doesn't have any equivalent in PlaywrightPhp.");
        }

        return 0;
    }

    private static function rmdirRecursive(string $dir): bool
    {
        $files = scandir($dir);
        if (! \is_array($files)) {
            return false;
        }
        $files = array_diff($files, ['.', '..']);
        foreach ($files as $file) {
            (is_dir("{$dir}/{$file}")) ? self::rmdirRecursive("{$dir}/{$file}") : unlink("{$dir}/{$file}");
        }

        return rmdir($dir);
    }
}
