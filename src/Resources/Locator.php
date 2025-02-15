<?php

namespace PlaywrightPhp\Resources;

use Nesk\Rialto\Data\BasicResource;

/**
 * @method mixed evaluate(\Nesk\Rialto\Data\JsFunction $pageFunction, array $options = [])
 * @method-extended mixed evaluate(callable|\Nesk\Rialto\Data\JsFunction $pageFunction, array{ $timeout: float } $options = null)
 * @method mixed evaluateHandle(\Nesk\Rialto\Data\JsFunction $pageFunction)
 * @method-extended mixed evaluateHandle(callable|\Nesk\Rialto\Data\JsFunction $pageFunction)
 * @method mixed evaluateAll(\Nesk\Rialto\Data\JsFunction $pageFunction)
 * @method-extended mixed evaluateAll(callable|\Nesk\Rialto\Data\JsFunction $pageFunction)
 * @method null|\PlaywrightPhp\Resources\ElementHandle|mixed[] elementHandle(array $options = [])
 * @method-extended null|\PlaywrightPhp\Resources\ElementHandle|mixed[] elementHandle(array{ $timeout: float } $options = null)
 * @method mixed all()
 * @method-extended mixed all()
 * @method mixed allInnerTexts()
 * @method-extended mixed allInnerTexts()
 * @method mixed allTextContents()
 * @method-extended mixed allTextContents()
 * @method \PlaywrightPhp\Resources\Locator and(\PlaywrightPhp\Resources\Locator $locator)
 * @method-extended \PlaywrightPhp\Resources\Locator and(\PlaywrightPhp\Resources\Locator $locator)
 * @method string ariaSnapshot(array $options = [])
 * @method-extended string ariaSnapshot(array{ $timeout: float } $options = null)
 * @method void blur(array $options = [])
 * @method-extended void blur(array{ $timeout: float } $options = null)
 * @method null|array boundingBox(array $options = [])
 * @method-extended null|array{ $x: float, $y: float, $width: float, $height: float } boundingBox(array{ $timeout: float } $options = null)
 * @method void check(array $options = [])
 * @method-extended void check(array{ $force: bool, $noWaitAfter: bool, $position: array{ $x: float, $y: float }, $timeout: float, $trial: bool } $options = null)
 * @method void clear(array $options = [])
 * @method-extended void clear(array{ $force: bool, $noWaitAfter: bool, $timeout: float } $options = null)
 * @method void click(array $options = [])
 * @method-extended void click(array{ $button: string, $clickCount: float, $delay: float, $force: bool, $modifiers: mixed, $noWaitAfter: bool, $position: array{ $x: float, $y: float }, $timeout: float, $trial: bool } $options = null)
 * @method \PlaywrightPhp\Resources\FrameLocator contentFrame()
 * @method-extended \PlaywrightPhp\Resources\FrameLocator contentFrame()
 * @method float count()
 * @method-extended float count()
 * @method void dblclick(array $options = [])
 * @method-extended void dblclick(array{ $button: string, $delay: float, $force: bool, $modifiers: mixed, $noWaitAfter: bool, $position: array{ $x: float, $y: float }, $timeout: float, $trial: bool } $options = null)
 * @method void dispatchEvent(string $type, mixed $eventInit = null, array $options = [])
 * @method-extended void dispatchEvent(string $type, mixed $eventInit = null, array{ $timeout: float } $options = null)
 * @method void dragTo(\PlaywrightPhp\Resources\Locator $target, array $options = [])
 * @method-extended void dragTo(\PlaywrightPhp\Resources\Locator $target, array{ $force: bool, $noWaitAfter: bool, $sourcePosition: array{ $x: float, $y: float }, $targetPosition: array{ $x: float, $y: float }, $timeout: float, $trial: bool } $options = null)
 * @method mixed elementHandles()
 * @method-extended mixed elementHandles()
 * @method void fill(string $value, array $options = [])
 * @method-extended void fill(string $value, array{ $force: bool, $noWaitAfter: bool, $timeout: float } $options = null)
 * @method \PlaywrightPhp\Resources\Locator filter(array $options = [])
 * @method-extended \PlaywrightPhp\Resources\Locator filter(array{ $has: \PlaywrightPhp\Resources\Locator, $hasNot: \PlaywrightPhp\Resources\Locator, $hasNotText: string|mixed, $hasText: string|mixed } $options = null)
 * @method \PlaywrightPhp\Resources\Locator first()
 * @method-extended \PlaywrightPhp\Resources\Locator first()
 * @method void focus(array $options = [])
 * @method-extended void focus(array{ $timeout: float } $options = null)
 * @method \PlaywrightPhp\Resources\FrameLocator frameLocator(string $selector)
 * @method-extended \PlaywrightPhp\Resources\FrameLocator frameLocator(string $selector)
 * @method null|string getAttribute(string $name, array $options = [])
 * @method-extended null|string getAttribute(string $name, array{ $timeout: float } $options = null)
 * @method \PlaywrightPhp\Resources\Locator getByAltText(string|mixed $text, array $options = [])
 * @method-extended \PlaywrightPhp\Resources\Locator getByAltText(string|mixed $text, array{ $exact: bool } $options = null)
 * @method \PlaywrightPhp\Resources\Locator getByLabel(string|mixed $text, array $options = [])
 * @method-extended \PlaywrightPhp\Resources\Locator getByLabel(string|mixed $text, array{ $exact: bool } $options = null)
 * @method \PlaywrightPhp\Resources\Locator getByPlaceholder(string|mixed $text, array $options = [])
 * @method-extended \PlaywrightPhp\Resources\Locator getByPlaceholder(string|mixed $text, array{ $exact: bool } $options = null)
 * @method \PlaywrightPhp\Resources\Locator getByRole(string $role, array $options = [])
 * @method-extended \PlaywrightPhp\Resources\Locator getByRole(string $role, array{ $checked: bool, $disabled: bool, $exact: bool, $expanded: bool, $includeHidden: bool, $level: float, $name: string|mixed, $pressed: bool, $selected: bool } $options = null)
 * @method \PlaywrightPhp\Resources\Locator getByTestId(string|mixed $testId)
 * @method-extended \PlaywrightPhp\Resources\Locator getByTestId(string|mixed $testId)
 * @method \PlaywrightPhp\Resources\Locator getByText(string|mixed $text, array $options = [])
 * @method-extended \PlaywrightPhp\Resources\Locator getByText(string|mixed $text, array{ $exact: bool } $options = null)
 * @method \PlaywrightPhp\Resources\Locator getByTitle(string|mixed $text, array $options = [])
 * @method-extended \PlaywrightPhp\Resources\Locator getByTitle(string|mixed $text, array{ $exact: bool } $options = null)
 * @method void highlight()
 * @method-extended void highlight()
 * @method void hover(array $options = [])
 * @method-extended void hover(array{ $force: bool, $modifiers: mixed, $noWaitAfter: bool, $position: array{ $x: float, $y: float }, $timeout: float, $trial: bool } $options = null)
 * @method string innerHTML(array $options = [])
 * @method-extended string innerHTML(array{ $timeout: float } $options = null)
 * @method string innerText(array $options = [])
 * @method-extended string innerText(array{ $timeout: float } $options = null)
 * @method string inputValue(array $options = [])
 * @method-extended string inputValue(array{ $timeout: float } $options = null)
 * @method bool isChecked(array $options = [])
 * @method-extended bool isChecked(array{ $timeout: float } $options = null)
 * @method bool isDisabled(array $options = [])
 * @method-extended bool isDisabled(array{ $timeout: float } $options = null)
 * @method bool isEditable(array $options = [])
 * @method-extended bool isEditable(array{ $timeout: float } $options = null)
 * @method bool isEnabled(array $options = [])
 * @method-extended bool isEnabled(array{ $timeout: float } $options = null)
 * @method bool isHidden(array $options = [])
 * @method-extended bool isHidden(array{ $timeout: float } $options = null)
 * @method bool isVisible(array $options = [])
 * @method-extended bool isVisible(array{ $timeout: float } $options = null)
 * @method \PlaywrightPhp\Resources\Locator last()
 * @method-extended \PlaywrightPhp\Resources\Locator last()
 * @method \PlaywrightPhp\Resources\Locator locator(string|\PlaywrightPhp\Resources\Locator $selectorOrLocator, array $options = [])
 * @method-extended \PlaywrightPhp\Resources\Locator locator(string|\PlaywrightPhp\Resources\Locator $selectorOrLocator, array{ $has: \PlaywrightPhp\Resources\Locator, $hasNot: \PlaywrightPhp\Resources\Locator, $hasNotText: string|mixed, $hasText: string|mixed } $options = null)
 * @method \PlaywrightPhp\Resources\Locator nth(float $index)
 * @method-extended \PlaywrightPhp\Resources\Locator nth(float $index)
 * @method \PlaywrightPhp\Resources\Locator or(\PlaywrightPhp\Resources\Locator $locator)
 * @method-extended \PlaywrightPhp\Resources\Locator or(\PlaywrightPhp\Resources\Locator $locator)
 * @method \PlaywrightPhp\Resources\Page page()
 * @method-extended \PlaywrightPhp\Resources\Page page()
 * @method void press(string $key, array $options = [])
 * @method-extended void press(string $key, array{ $delay: float, $noWaitAfter: bool, $timeout: float } $options = null)
 * @method void pressSequentially(string $text, array $options = [])
 * @method-extended void pressSequentially(string $text, array{ $delay: float, $noWaitAfter: bool, $timeout: float } $options = null)
 * @method mixed screenshot(\PlaywrightPhp\Resources\LocatorScreenshotOptions $options = null)
 * @method-extended mixed screenshot(\PlaywrightPhp\Resources\LocatorScreenshotOptions $options = null)
 * @method void scrollIntoViewIfNeeded(array $options = [])
 * @method-extended void scrollIntoViewIfNeeded(array{ $timeout: float } $options = null)
 * @method mixed selectOption(null|string|\PlaywrightPhp\Resources\ElementHandle|mixed|array $values, array $options = [])
 * @method-extended mixed selectOption(null|string|\PlaywrightPhp\Resources\ElementHandle|mixed|array{ $value: string, $label: string, $index: float } $values, array{ $force: bool, $noWaitAfter: bool, $timeout: float } $options = null)
 * @method void selectText(array $options = [])
 * @method-extended void selectText(array{ $force: bool, $timeout: float } $options = null)
 * @method void setChecked(bool $checked, array $options = [])
 * @method-extended void setChecked(bool $checked, array{ $force: bool, $noWaitAfter: bool, $position: array{ $x: float, $y: float }, $timeout: float, $trial: bool } $options = null)
 * @method void setInputFiles(string|mixed|array $files, array $options = [])
 * @method-extended void setInputFiles(string|mixed|array{ $name: string, $mimeType: string, $buffer: mixed } $files, array{ $noWaitAfter: bool, $timeout: float } $options = null)
 * @method void tap(array $options = [])
 * @method-extended void tap(array{ $force: bool, $modifiers: mixed, $noWaitAfter: bool, $position: array{ $x: float, $y: float }, $timeout: float, $trial: bool } $options = null)
 * @method null|string textContent(array $options = [])
 * @method-extended null|string textContent(array{ $timeout: float } $options = null)
 * @method void type(string $text, array $options = [])
 * @method-extended void type(string $text, array{ $delay: float, $noWaitAfter: bool, $timeout: float } $options = null)
 * @method void uncheck(array $options = [])
 * @method-extended void uncheck(array{ $force: bool, $noWaitAfter: bool, $position: array{ $x: float, $y: float }, $timeout: float, $trial: bool } $options = null)
 * @method void waitFor(array $options = [])
 * @method-extended void waitFor(array{ $state: string, $timeout: float } $options = null)
 */
class Locator extends BasicResource
{
}
