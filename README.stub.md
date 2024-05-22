# Marco - CSS Macro Library

[[toc]]
This is a lightweight (and low level) CSS utilities library aimed at simplifying and standardizing common CSS patterns. It provides a utility function for generating CSS properties and values dynamically.

## Installation

This library is implemented in both TypeScript and PHP. You can install the TypeScript version via npm:

```bash
npm install @lnear/marco
```

and the PHP version via composer:

```bash
composer require lnear/marco
```

## Usage

```javascript
import { replace } from "@lnear/marco";
console.log(
  `div { ${replace(
    "transition-colors",
    "transition-none",
    "blur-md",
    "drop-shadow-xl"
  )} }`
);
```

```php
use Lnear\Marco\Marco;
$m = Marco::macro(
  'transition-colors',
  'transition-none',
  'blur-md',
  'drop-shadow-xl'
);
echo "div { $m }";
```

This will generate the following CSS string:

```css
div {
  transition-property: color, background-color, border-color,
    text-decoration-color, fill, stroke;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
  transition-property: none;
  filter: blur(12px);
  filter: drop-shadow(0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(
      0 8px 5px rgb(0 0 0 / 0.08)
    );
}
```

You can also use the `generateCSS` function to generate CSS strings for web components (or any other scoped style engine that supports :host) with multiple macros:

```javascript
import { generateCSS } from "@lnear/marco";
console.log(
  generateCSS({
    sm: "div { color: red; }",
    md: "div { color: green; }",
    lg: "div { color: blue; }",
    xl: "div { color: yellow; }",
    xl2: "div { color: pink; }",
    dark: "div { color: black; }",
    light: "div { color: white; }",
    macros: "sm:md:lg:xl:xl2:dark:bg-red-500",
  })
);
```

or the `generate` method of the `Marco` class in PHP:

```php
use Lnear\Marco\Marco;
echo Marco::generate(
  sm: 'div { color: red; }',
  md: 'div { color: green; }',
  lg: 'div { color: blue; }',
  xl: 'div { color: yellow; }',
  xl2: 'div { color: pink; }',
  dark: 'div { color: black; }',
  light: 'div { color: white; }',
  macros: 'sm:md:lg:xl:xl2:dark:bg-red-500',
);
```

Both will generate the following CSS string:

```css
:host {
  @media (min-width: 640px) {
    background-color: rgb(239 68 68);
  }
  @media (min-width: 768px) {
    background-color: rgb(239 68 68);
  }
  @media (min-width: 1024px) {
    background-color: rgb(239 68 68);
  }
  @media (min-width: 1280px) {
    background-color: rgb(239 68 68);
  }
  @media (min-width: 1536px) {
    background-color: rgb(239 68 68);
  }
  @media (prefers-color-scheme: dark) {
    background-color: rgb(239 68 68);
  }
}
@media (min-width: 640px) {
  div {
    color: red;
  }
}
@media (min-width: 768px) {
  div {
    color: green;
  }
}
@media (min-width: 1024px) {
  div {
    color: blue;
  }
}
@media (min-width: 1280px) {
  div {
    color: yellow;
  }
}
@media (min-width: 1536px) {
  div {
    color: pink;
  }
}
@media (prefers-color-scheme: dark) {
  div {
    color: black;
  }
}
@media (prefers-color-scheme: light) {
  div {
    color: white;
  }
}
```

More docs coming soon...

## Patterns

The below are the predefined patterns that can be used with the `replace` function. It is not an exhaustive list and intutive patterns are implemented as needed.
For example, only "saturate-(0, 50, 100, 150, 200)" are documented here, but any value can be used with the "saturate" pattern. (saturate-x where x is a number will be replaced with "filter: saturate({x / 100});")

<details>
  <summary>View Patterns</summary>

{!!patterns!!}

</details>

## Colors

<details>
  <summary>View Colors</summary>

{!!colors!!}

</details>
