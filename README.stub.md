# @lnear/marco - CSS Utilities Library

This is a lightweight CSS utilities library aimed at simplifying and standardizing common CSS patterns. It provides a utility function for generating CSS properties and values dynamically.

## Installation

You can install this library via npm:

```bash
npm install @lnear/marco
```

## Usage

The `marco` function can be used in a variety of ways. It can be used to generate CSS strings dynamically, or it can be used in template literals to generate inline styles.

```html
<div style="${marco(['blur-md', 'drop-shadow-xl'])}"></div>
```

will generate the following HTML:

```html
<div
  style="filter: blur(12px); filter: drop-shadow(0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(0 8px 5px rgb(0 0 0 / 0.08));"
></div>
```

### `marco` Function

The `marco` function is the primary utility provided by this library. It dynamically replaces CSS patterns in strings using regular expressions and predefined patterns.

```javascript
import { marco } from '@lnear/marco';
console.log(
  `div { ${marco([
    'transition-colors',
    'transition-none',
    'blur-md',
    'drop-shadow-xl',
  ])} }`
);
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

### Custom Patterns

You can also pass custom patterns to the `marco` function as follows:

```javascript
import { marco } from '@lnear/marco';
console.log(
  `div { ${marco(
    ['hello-world', 'hello-100', 'hello-200'],
    [
      [/^hello-world/g, 'color: red;'], // note the ^ to match the start of the string and g to match all occurences
      [/^hello-(\d+)/g, 'color: blue; font-size: $1px;'], //or a replacer cb according to string.replace
    ]
  )} }`
);
```

This will generate the following CSS string:

```css
div {
  color: red;
  color: blue;
  font-size: 100px;
  color: blue;
  font-size: 200px;
}
```

## Patterns

The below are the predefined patterns that can be used with the `marco` function. It is not an exhaustive list and intutive patterns are implemented as needed.
For example, only "saturate-(0, 50, 100, 150, 200)" are documented here, but any value can be used with the "saturate" pattern. (saturate-x where x is a number will be replaced with "filter: saturate({x / 100});")

{!!patterns!!}

## Contributing

Contributions are welcome! Please feel free to open issues or pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

