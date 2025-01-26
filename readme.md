<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://github.com/victor-teles/playwright-php/raw/main/.github/banner-dark.webp">
  <img alt="playwright-php banner" src="https://github.com/victor-teles/playwright-php/raw/main/.github/banner.webp">
</picture>

<div align="center">
    <img src="https://badgen.net/npm/v/playwright-php?" alt="NPM Version" />
    <img src="https://github.com/victor-teles/playwright-php/actions/workflows/tests.yaml/badge.svg" alt="Build Status" />
</a>
</div>
<br />

<div align="center"><strong>A PHP library for automating browsers using <a target="_blank" href="https://playwright.dev/">Playwright</a>.</strong></div>

<br />


## Installation

Install via Composer:

```bash
composer require playwright-php
```

Install npm dependencies:

```bash
npm install https://github.com/zoonru/puphpeteer/tarball/zoon
```

Install browser binaries:

```bash
npx playwright install
```

## Usage

### Navigating to a Page

```php
<?php

use Playwright\Playwright;

$playwright = new Playwright(['browser' => 'chromium']);
$browser = $playwright->launch();
$page = $browser->newPage();

$page->goto('https://example.com');

$browser->close();
```

## Differences between PlaywrightPHP and Playwright

### Playwright's class must be instantiated

Instead of requiring Playwright:

```js
const playwright = require('playwright');
```

You have to instantiate the `Playwright` class:

```php
$playwright = new Playwright;
```

This will create a new Node process controlled by PHP.

You can also pass some options to the constructor, see [Rialto's documentation](https://github.com/nesk/rialto/blob/master/docs/api.md#options). PlaywrightPHP also extends these options:

```php
[
    // Logs the output of Browser's console methods (console.log, console.debug, etc...) to the PHP logger
    'log_browser_console' => false,
]
```

<details>
<summary><strong>⏱ Want to use some timeouts higher than 30 seconds in Playwright's API?</strong></summary> <br>

If you use some timeouts higher than 30 seconds, you will have to set a higher value for the `read_timeout` option (default: `35`):

```php
$playwright = new Playwright([
    'browser' => 'chromium',
    'read_timeout' => 65, // In seconds
]);

$playwright->launch()->newPage()->goto($url, [
    'timeout' => 60000, // In milliseconds
]);
```
</details>

### No need to use the `await` keyword

With PlaywrightPHP, every method call or property getting/setting is synchronous.

### Some methods have been aliased

The following methods have been aliased because PHP doesn't support the `$` character in method names:

- `$` => `querySelector`
- `$$` => `querySelectorAll`
- `$x` => `querySelectorXPath`
- `$eval` => `querySelectorEval`
- `$$eval` => `querySelectorAllEval`

Use these aliases just like you would have used the original methods:

```php
$divs = $page->querySelectorAll('div');
```

### Evaluated functions must be created with `JsFunction`

Functions evaluated in the context of the page must be written [with the `JsFunction` class](https://github.com/nesk/rialto/blob/master/docs/api.md#javascript-functions), the body of these functions must be written in JavaScript instead of PHP.

```php
use Nesk\Rialto\Data\JsFunction;

$pageFunction = new JsFunction(['element'], "return element.textContent");
```

### Exceptions must be caught with `->tryCatch`

If an error occurs in Node, a `Node\FatalException` will be thrown and the process closed, you will have to create a new instance of `Playwright`.

To avoid that, you can ask Node to catch these errors by prepending your instruction with `->tryCatch`:

```php
use Nesk\Rialto\Exceptions\Node;

try {
    $page->tryCatch->goto('invalid_url');
} catch (Node\Exception $exception) {
    // Handle the exception...
}
```

Instead, a `Node\Exception` will be thrown, the Node process will stay alive and usable.


## Credits

This project is based on [zoon/puphpeteer](https://github.com/zoonru/puphpeteer), which provided the foundation for this library.
