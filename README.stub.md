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
