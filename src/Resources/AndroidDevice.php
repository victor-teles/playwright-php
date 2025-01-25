<?php

namespace PlaywrightPhp\Resources;

use Nesk\Rialto\Data\BasicResource;

/**
 * @property $input: \PlaywrightPhp\Resources\AndroidInput
 * @method mixed on('webview' $event, \Nesk\Rialto\Data\JsFunction $listener)
 * @method-extended mixed on('webview' $event, callable(\PlaywrightPhp\Resources\AndroidWebView $androidWebView): mixed|\Nesk\Rialto\Data\JsFunction $listener)
 * @method mixed once('webview' $event, \Nesk\Rialto\Data\JsFunction $listener)
 * @method-extended mixed once('webview' $event, callable(\PlaywrightPhp\Resources\AndroidWebView $androidWebView): mixed|\Nesk\Rialto\Data\JsFunction $listener)
 * @method mixed addListener('webview' $event, \Nesk\Rialto\Data\JsFunction $listener)
 * @method-extended mixed addListener('webview' $event, callable(\PlaywrightPhp\Resources\AndroidWebView $androidWebView): mixed|\Nesk\Rialto\Data\JsFunction $listener)
 * @method mixed removeListener('webview' $event, \Nesk\Rialto\Data\JsFunction $listener)
 * @method-extended mixed removeListener('webview' $event, callable(\PlaywrightPhp\Resources\AndroidWebView $androidWebView): mixed|\Nesk\Rialto\Data\JsFunction $listener)
 * @method mixed off('webview' $event, \Nesk\Rialto\Data\JsFunction $listener)
 * @method-extended mixed off('webview' $event, callable(\PlaywrightPhp\Resources\AndroidWebView $androidWebView): mixed|\Nesk\Rialto\Data\JsFunction $listener)
 * @method mixed prependListener('webview' $event, \Nesk\Rialto\Data\JsFunction $listener)
 * @method-extended mixed prependListener('webview' $event, callable(\PlaywrightPhp\Resources\AndroidWebView $androidWebView): mixed|\Nesk\Rialto\Data\JsFunction $listener)
 * @method void close()
 * @method-extended void close()
 * @method void drag(mixed $selector, array $dest, array $options = [])
 * @method-extended void drag(mixed $selector, array{ $x: float, $y: float } $dest, array{ $speed: float, $timeout: float } $options = null)
 * @method void fill(mixed $selector, string $text, array $options = [])
 * @method-extended void fill(mixed $selector, string $text, array{ $timeout: float } $options = null)
 * @method void fling(mixed $selector, string $direction, array $options = [])
 * @method-extended void fling(mixed $selector, string $direction, array{ $speed: float, $timeout: float } $options = null)
 * @method mixed info(mixed $selector)
 * @method-extended mixed info(mixed $selector)
 * @method void installApk(string|mixed $file, array $options = [])
 * @method-extended void installApk(string|mixed $file, array{ $args: mixed } $options = null)
 * @method \PlaywrightPhp\Resources\BrowserContext launchBrowser(array $options = [])
 * @method-extended \PlaywrightPhp\Resources\BrowserContext launchBrowser(array{ $acceptDownloads: bool, $args: mixed, $baseURL: string, $bypassCSP: bool, $colorScheme: null|'light'|'dark'|'no-preference', $deviceScaleFactor: float, $extraHTTPHeaders: array{  }, $forcedColors: null|'active'|'none', $geolocation: array{ $latitude: float, $longitude: float, $accuracy: float }, $hasTouch: bool, $httpCredentials: array{ $username: string, $password: string, $origin: string, $send: string }, $ignoreHTTPSErrors: bool, $isMobile: bool, $javaScriptEnabled: bool, $locale: string, $logger: \PlaywrightPhp\Resources\Logger, $offline: bool, $permissions: mixed, $pkg: string, $proxy: array{ $server: string, $bypass: string, $username: string, $password: string }, $recordHar: array{ $omitContent: bool, $content: string, $path: string, $mode: string, $urlFilter: string|mixed }, $recordVideo: array{ $dir: string, $size: array{ $width: float, $height: float } }, $reducedMotion: null|'reduce'|'no-preference', $screen: array{ $width: float, $height: float }, $serviceWorkers: string, $strictSelectors: bool, $timezoneId: string, $userAgent: string, $videoSize: array{ $width: float, $height: float }, $videosPath: string, $viewport: null|array{ $width: float, $height: float } } $options = null)
 * @method void longTap(mixed $selector, array $options = [])
 * @method-extended void longTap(mixed $selector, array{ $timeout: float } $options = null)
 * @method string model()
 * @method-extended string model()
 * @method \PlaywrightPhp\Resources\AndroidSocket open(string $command)
 * @method-extended \PlaywrightPhp\Resources\AndroidSocket open(string $command)
 * @method void pinchClose(mixed $selector, float $percent, array $options = [])
 * @method-extended void pinchClose(mixed $selector, float $percent, array{ $speed: float, $timeout: float } $options = null)
 * @method void pinchOpen(mixed $selector, float $percent, array $options = [])
 * @method-extended void pinchOpen(mixed $selector, float $percent, array{ $speed: float, $timeout: float } $options = null)
 * @method void press(mixed $selector, mixed $key, array $options = [])
 * @method-extended void press(mixed $selector, mixed $key, array{ $timeout: float } $options = null)
 * @method void push(string|mixed $file, string $path, array $options = [])
 * @method-extended void push(string|mixed $file, string $path, array{ $mode: float } $options = null)
 * @method mixed screenshot(array $options = [])
 * @method-extended mixed screenshot(array{ $path: string } $options = null)
 * @method void scroll(mixed $selector, string $direction, float $percent, array $options = [])
 * @method-extended void scroll(mixed $selector, string $direction, float $percent, array{ $speed: float, $timeout: float } $options = null)
 * @method string serial()
 * @method-extended string serial()
 * @method void setDefaultTimeout(float $timeout)
 * @method-extended void setDefaultTimeout(float $timeout)
 * @method mixed shell(string $command)
 * @method-extended mixed shell(string $command)
 * @method void swipe(mixed $selector, string $direction, float $percent, array $options = [])
 * @method-extended void swipe(mixed $selector, string $direction, float $percent, array{ $speed: float, $timeout: float } $options = null)
 * @method void tap(mixed $selector, array $options = [])
 * @method-extended void tap(mixed $selector, array{ $duration: float, $timeout: float } $options = null)
 * @method void wait(mixed $selector, array $options = [])
 * @method-extended void wait(mixed $selector, array{ $state: 'gone', $timeout: float } $options = null)
 * @method \PlaywrightPhp\Resources\AndroidWebView waitForEvent('webview' $event, array|\Nesk\Rialto\Data\JsFunction $optionsOrPredicate = null)
 * @method-extended \PlaywrightPhp\Resources\AndroidWebView waitForEvent('webview' $event, array{ $predicate: callable(\PlaywrightPhp\Resources\AndroidWebView $androidWebView): bool|Promise|bool[]|\Nesk\Rialto\Data\JsFunction, $timeout: float }|callable(callable(\PlaywrightPhp\Resources\AndroidWebView $androidWebView): bool|Promise|bool[]|\Nesk\Rialto\Data\JsFunction): |\Nesk\Rialto\Data\JsFunction $optionsOrPredicate = null)
 * @method \PlaywrightPhp\Resources\AndroidWebView webView(array $selector, array $options = [])
 * @method-extended \PlaywrightPhp\Resources\AndroidWebView webView(array{ $pkg: string, $socketName: string } $selector, array{ $timeout: float } $options = null)
 * @method mixed webViews()
 * @method-extended mixed webViews()
 */
class AndroidDevice extends BasicResource
{
}
