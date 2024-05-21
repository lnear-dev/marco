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

#### `drop-shadow`
```css
filter: drop-shadow(0 1px 2px rgb(0 0 0 / 0.1)) drop-shadow(0 1px 1px rgb(0 0 0 / 0.06));
```
#### `drop-shadow-sm`
```css
filter: drop-shadow(0 1px 1px rgb(0 0 0 / 0.05));
```
#### `drop-shadow-md`
```css
filter: drop-shadow(0 4px 3px rgb(0 0 0 / 0.07)) drop-shadow(0 2px 2px rgb(0 0 0 / 0.06));
```
#### `drop-shadow-lg`
```css
filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
```
#### `drop-shadow-xl`
```css
filter: drop-shadow(0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(0 8px 5px rgb(0 0 0 / 0.08));
```
#### `drop-shadow-2xl`
```css
filter: drop-shadow(0 25px 25px rgb(0 0 0 / 0.15));
```
#### `drop-shadow-none`
```css
filter: drop-shadow(0 0 #0000);
```
#### `backdrop-hue-rotate-0`
```css
backdrop-filter: hue-rotate(0deg);
```
#### `backdrop-hue-rotate-15`
```css
backdrop-filter: hue-rotate(15deg);
```
#### `backdrop-hue-rotate-16`
```css
backdrop-filter: hue-rotate(16deg);
```
#### `backdrop-hue-rotate-30`
```css
backdrop-filter: hue-rotate(30deg);
```
#### `backdrop-hue-rotate-60`
```css
backdrop-filter: hue-rotate(60deg);
```
#### `backdrop-hue-rotate-90`
```css
backdrop-filter: hue-rotate(90deg);
```
#### `backdrop-hue-rotate-180`
```css
backdrop-filter: hue-rotate(180deg);
```
#### `hue-rotate-0`
```css
filter: hue-rotate(0deg);
```
#### `hue-rotate-15`
```css
filter: hue-rotate(15deg);
```
#### `hue-rotate-30`
```css
filter: hue-rotate(30deg);
```
#### `hue-rotate-60`
```css
filter: hue-rotate(60deg);
```
#### `hue-rotate-90`
```css
filter: hue-rotate(90deg);
```
#### `hue-rotate-180`
```css
filter: hue-rotate(180deg);
```
#### `grayscale-0`
```css
filter: grayscale(0);
```
#### `grayscale`
```css
filter: grayscale(100%);
```
#### `invert-0`
```css
filter: invert(0);
```
#### `invert`
```css
filter: invert(100%);
```
#### `sepia-0`
```css
filter: sepia(0);
```
#### `sepia`
```css
filter: sepia(100%);
```
#### `backdrop-grayscale-0`
```css
backdrop-filter: grayscale(0);
```
#### `backdrop-grayscale`
```css
backdrop-filter: grayscale(100%);
```
#### `saturate-0`
```css
filter: saturate(0);
```
#### `saturate-50`
```css
filter: saturate(0.5);
```
#### `saturate-100`
```css
filter: saturate(1);
```
#### `saturate-150`
```css
filter: saturate(1.5);
```
#### `saturate-200`
```css
filter: saturate(2);
```
#### `backdrop-blur`
```css
backdrop-filter: blur(8px);
```
#### `backdrop-blur-none`
```css
backdrop-filter: blur(0);
```
#### `backdrop-blur-sm`
```css
backdrop-filter: blur(4px);
```
#### `backdrop-blur-md`
```css
backdrop-filter: blur(12px);
```
#### `backdrop-blur-lg`
```css
backdrop-filter: blur(16px);
```
#### `backdrop-blur-xl`
```css
backdrop-filter: blur(24px);
```
#### `backdrop-blur-2xl`
```css
backdrop-filter: blur(40px);
```
#### `backdrop-blur-3xl`
```css
backdrop-filter: blur(64px);
```
#### `blur`
```css
filter: blur(8px);
```
#### `blur-none`
```css
filter: blur(0);
```
#### `blur-sm`
```css
filter: blur(4px);
```
#### `blur-md`
```css
filter: blur(12px);
```
#### `blur-lg`
```css
filter: blur(16px);
```
#### `blur-xl`
```css
filter: blur(24px);
```
#### `blur-2xl`
```css
filter: blur(40px);
```
#### `blur-3xl`
```css
filter: blur(64px);
```
#### `backdrop-brightness-0`
```css
backdrop-filter: brightness(0);
```
#### `backdrop-brightness-50`
```css
backdrop-filter: brightness(0.5);
```
#### `backdrop-brightness-75`
```css
backdrop-filter: brightness(0.75);
```
#### `backdrop-brightness-90`
```css
backdrop-filter: brightness(0.9);
```
#### `backdrop-brightness-95`
```css
backdrop-filter: brightness(0.95);
```
#### `backdrop-brightness-100`
```css
backdrop-filter: brightness(1);
```
#### `backdrop-brightness-105`
```css
backdrop-filter: brightness(1.05);
```
#### `backdrop-brightness-110`
```css
backdrop-filter: brightness(1.1);
```
#### `backdrop-brightness-125`
```css
backdrop-filter: brightness(1.25);
```
#### `backdrop-brightness-150`
```css
backdrop-filter: brightness(1.5);
```
#### `backdrop-brightness-200`
```css
backdrop-filter: brightness(2);
```
#### `brightness-0`
```css
filter: brightness(0);
```
#### `brightness-50`
```css
filter: brightness(0.5);
```
#### `brightness-75`
```css
filter: brightness(0.75);
```
#### `brightness-90`
```css
filter: brightness(0.9);
```
#### `brightness-95`
```css
filter: brightness(0.95);
```
#### `brightness-100`
```css
filter: brightness(1);
```
#### `brightness-105`
```css
filter: brightness(1.05);
```
#### `brightness-110`
```css
filter: brightness(1.1);
```
#### `brightness-125`
```css
filter: brightness(1.25);
```
#### `brightness-150`
```css
filter: brightness(1.5);
```
#### `brightness-200`
```css
filter: brightness(2);
```
#### `contrast-0`
```css
filter: contrast(0);
```
#### `contrast-50`
```css
filter: contrast(0.5);
```
#### `contrast-75`
```css
filter: contrast(0.75);
```
#### `contrast-100`
```css
filter: contrast(1);
```
#### `contrast-125`
```css
filter: contrast(1.25);
```
#### `contrast-150`
```css
filter: contrast(1.5);
```
#### `contrast-200`
```css
filter: contrast(2);
```
#### `backdrop-contrast-0`
```css
backdrop-filter: contrast(0);
```
#### `backdrop-contrast-50`
```css
backdrop-filter: contrast(0.5);
```
#### `backdrop-contrast-75`
```css
backdrop-filter: contrast(0.75);
```
#### `backdrop-contrast-100`
```css
backdrop-filter: contrast(1);
```
#### `backdrop-contrast-125`
```css
backdrop-filter: contrast(1.25);
```
#### `backdrop-contrast-150`
```css
backdrop-filter: contrast(1.5);
```
#### `backdrop-contrast-200`
```css
backdrop-filter: contrast(2);
```
#### `ease-linear`
```css
transition-timing-function: linear;
```
#### `ease-in`
```css
transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
```
#### `ease-out`
```css
transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
```
#### `ease-in-out`
```css
transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
```
#### `timing-linear`
```css
transition-timing-function: linear;
```
#### `timing-in`
```css
transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
```
#### `timing-out`
```css
transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
```
#### `timing-in-out`
```css
transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
```
#### `transition-colors`
```css
transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);transition-duration: 150ms;
```
#### `transition-opacity`
```css
transition-property: opacity;transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);transition-duration: 150ms;
```
#### `transition-all`
```css
transition-property: all;transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);transition-duration: 150ms;
```
#### `transition-shadow`
```css
transition-property: shadow;transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);transition-duration: 150ms;
```
#### `transition-none`
```css
transition-property: none;
```
#### `float-start`
```css
float: start;
```
#### `float-end`
```css
float: end;
```
#### `float-right`
```css
float: right;
```
#### `float-left`
```css
float: left;
```
#### `float-none`
```css
float: none;
```
#### `clear-start`
```css
clear: start;
```
#### `clear-end`
```css
clear: end;
```
#### `clear-right`
```css
clear: right;
```
#### `clear-left`
```css
clear: left;
```
#### `clear-both`
```css
clear: both;
```
#### `clear-none`
```css
clear: none;
```
#### `inline-block`
```css
display: inline-block;
```
#### `inline-flex`
```css
display: inline-flex;
```
#### `inline-table`
```css
display: inline-table;
```
#### `block`
```css
display: block;
```
#### `inline`
```css
display: inline;
```
#### `hidden`
```css
display: none;
```
#### `table`
```css
display: table;
```
#### `table-caption`
```css
display: table-caption;
```
#### `table-cell`
```css
display: table-cell;
```
#### `table-column`
```css
display: table-column;
```
#### `table-column-group`
```css
display: table-column-group;
```
#### `table-footer-group`
```css
display: table-footer-group;
```
#### `table-header-group`
```css
display: table-header-group;
```
#### `table-row-group`
```css
display: table-row-group;
```
#### `table-row`
```css
display: table-row;
```
#### `flow-root`
```css
display: flow-root;
```
#### `grid`
```css
display: grid;
```
#### `inline-grid`
```css
display: inline-grid;
```
#### `contents`
```css
display: contents;
```
#### `list-item`
```css
display: list-item;
```
#### `bg-inherit`
```css
background-color: inherit;
```
#### `bg-transparent`
```css
background-color: transparent;
```
#### `bg-auto`
```css
background-size: auto;
```
#### `bg-cover`
```css
background-size: cover;
```
#### `bg-contain`
```css
background-size: contain;
```
#### `bg-fixed`
```css
background-attachment: fixed;
```
#### `bg-local`
```css
background-attachment: local;
```
#### `bg-scroll`
```css
background-attachment: scroll;
```
#### `bg-center`
```css
background-position: center;
```
#### `bg-top`
```css
background-position: top;
```
#### `bg-right-top`
```css
background-position: right-top;
```
#### `bg-right`
```css
background-position: right;
```
#### `bg-right-bottom`
```css
background-position: right-bottom;
```
#### `bg-bottom`
```css
background-position: bottom;
```
#### `bg-left-bottom`
```css
background-position: left-bottom;
```
#### `bg-left`
```css
background-position: left;
```
#### `bg-left-top`
```css
background-position: left-top;
```
#### `bg-repeat`
```css
background-repeat: repeat;
```
#### `bg-no-repeat`
```css
background-repeat: no-repeat;
```
#### `bg-repeat-x`
```css
background-repeat: repeat-x;
```
#### `bg-repeat-y`
```css
background-repeat: repeat-y;
```
#### `bg-round`
```css
background-repeat: round;
```
#### `bg-space`
```css
background-repeat: space;
```
#### `bg-none`
```css
background-image: none;
```
#### `pointer-events-none`
```css
pointer-events: none;
```
#### `pointer-events-auto`
```css
pointer-events: auto;
```
#### `place-content-center`
```css
place-content: center;
```
#### `place-content-start`
```css
place-content: start;
```
#### `place-content-end`
```css
place-content: end;
```
#### `place-content-between`
```css
place-content: between;
```
#### `place-content-around`
```css
place-content: around;
```
#### `place-content-evenly`
```css
place-content: evenly;
```
#### `place-content-baseline`
```css
place-content: baseline;
```
#### `place-content-stretch`
```css
place-content: stretch;
```
#### `place-items-center`
```css
place-items: center;
```
#### `place-items-start`
```css
place-items: start;
```
#### `place-items-end`
```css
place-items: end;
```
#### `place-items-baseline`
```css
place-items: baseline;
```
#### `place-items-stretch`
```css
place-items: stretch;
```
#### `inset-auto`
```css
inset: auto;
```
#### `start-auto`
```css
inset-inline-start: auto;
```
#### `end-auto`
```css
inset-inline-end: auto;
```
#### `top-auto`
```css
top: auto;
```
#### `right-auto`
```css
right: auto;
```
#### `bottom-auto`
```css
bottom: auto;
```
#### `left-auto`
```css
left: auto;
```
#### `isolate`
```css
isolation: isolate;
```
#### `isolation-auto`
```css
isolation: auto;
```
#### `z-auto`
```css
z-index: auto;
```
#### `order-first`
```css
order: calc(-infinity);
```
#### `order-last`
```css
order: calc(infinity);
```
#### `order-none`
```css
order: 0;
```
#### `col-auto`
```css
grid-column: auto;
```
#### `col-span-full`
```css
grid-column: 1 / -1;
```
#### `col-start-auto`
```css
grid-column-start: auto;
```
#### `col-end-auto`
```css
grid-column-end: auto;
```
#### `row-auto`
```css
grid-row: auto;
```
#### `row-span-full`
```css
grid-row: 1 / -1;
```
#### `row-start-auto`
```css
grid-row-start: auto;
```
#### `row-end-auto`
```css
grid-row-end: auto;
```
#### `box-border`
```css
box-sizing: border-box;
```
#### `box-content`
```css
box-sizing: content-box;
```
#### `aspect-auto`
```css
aspect-ratio: auto;
```
#### `aspect-square`
```css
aspect-ratio: 1 / 1;
```
#### `aspect-video`
```css
aspect-ratio: 16 / 9;
```
#### `flex-auto`
```css
flex: auto;
```
#### `flex-initial`
```css
flex: 0 auto;
```
#### `flex-none`
```css
flex: none;
```
#### `basis-auto`
```css
flex-basis: auto;
```
#### `basis-full`
```css
flex-basis: 100%;
```
#### `table-auto`
```css
table-layout: auto;
```
#### `table-fixed`
```css
table-layout: fixed;
```
#### `caption-top`
```css
caption-side: top;
```
#### `caption-bottom`
```css
caption-side: bottom;
```
#### `border-collapse`
```css
border-collapse: collapse;
```
#### `border-separate`
```css
border-collapse: separate;
```
#### `origin-center`
```css
transform-origin: center;
```
#### `origin-top`
```css
transform-origin: top;
```
#### `origin-top-right`
```css
transform-origin: top right;
```
#### `origin-right`
```css
transform-origin: right;
```
#### `origin-bottom-right`
```css
transform-origin: bottom right;
```
#### `origin-bottom`
```css
transform-origin: bottom;
```
#### `origin-bottom-left`
```css
transform-origin: bottom left;
```
#### `origin-left`
```css
transform-origin: left;
```
#### `origin-top-left`
```css
transform-origin: top left;
```
#### `perspective-origin-center`
```css
perspective-origin: center;
```
#### `perspective-origin-top`
```css
perspective-origin: top;
```
#### `perspective-origin-top-right`
```css
perspective-origin: top right;
```
#### `perspective-origin-right`
```css
perspective-origin: right;
```
#### `perspective-origin-bottom-right`
```css
perspective-origin: bottom right;
```
#### `perspective-origin-bottom`
```css
perspective-origin: bottom;
```
#### `perspective-origin-bottom-left`
```css
perspective-origin: bottom left;
```
#### `perspective-origin-left`
```css
perspective-origin: left;
```
#### `perspective-origin-top-left`
```css
perspective-origin: top left;
```
#### `perspective-none`
```css
perspective: none;
```
#### `translate-none`
```css
translate: none;
```
#### `transform-none`
```css
transform: none;
```
#### `transform-flat`
```css
transform-style: flat;
```
#### `transform-3d`
```css
transform-style: preserve-3d;
```
#### `transform-content`
```css
transform-box: content-box;
```
#### `transform-border`
```css
transform-box: border-box;
```
#### `transform-fill`
```css
transform-box: fill-box;
```
#### `transform-stroke`
```css
transform-box: stroke-box;
```
#### `transform-view`
```css
transform-box: view-box;
```
#### `backface-visible`
```css
backface-visibility: visible;
```
#### `backface-hidden`
```css
backface-visibility: hidden;
```
#### `resize-none`
```css
resize: none;
```
#### `resize-both`
```css
resize: both;
```
#### `resize-x`
```css
resize: horizontal;
```
#### `resize-y`
```css
resize: vertical;
```
#### `snap-none`
```css
scroll-snap-type: none;
```
#### `snap-align-none`
```css
scroll-snap-align: none;
```
#### `snap-start`
```css
scroll-snap-align: start;
```
#### `snap-end`
```css
scroll-snap-align: end;
```
#### `snap-center`
```css
scroll-snap-align: center;
```
#### `snap-normal`
```css
scroll-snap-stop: normal;
```
#### `snap-always`
```css
scroll-snap-stop: always;
```
#### `list-inside`
```css
list-style-position: inside;
```
#### `list-outside`
```css
list-style-position: outside;
```
#### `list-none`
```css
list-style-type: none;
```
#### `list-disc`
```css
list-style-type: disc;
```
#### `list-decimal`
```css
list-style-type: decimal;
```
#### `list-image-none`
```css
list-style-image: none;
```
#### `appearance-none`
```css
appearance: none;
```
#### `appearance-auto`
```css
appearance: auto;
```
#### `columns-auto`
```css
columns: auto;
```
#### `grid-flow-row`
```css
grid-auto-flow: row;
```
#### `grid-flow-col`
```css
grid-auto-flow: column;
```
#### `grid-flow-dense`
```css
grid-auto-flow: dense;
```
#### `grid-flow-row-dense`
```css
grid-auto-flow: row dense;
```
#### `grid-flow-col-dense`
```css
grid-auto-flow: column dense;
```
#### `auto-cols-auto`
```css
grid-auto-columns: auto;
```
#### `auto-cols-min`
```css
grid-auto-columns: min-content;
```
#### `auto-cols-max`
```css
grid-auto-columns: max-content;
```
#### `auto-cols-fr`
```css
grid-auto-columns: minmax(0, 1fr);
```
#### `auto-rows-auto`
```css
grid-auto-rows: auto;
```
#### `auto-rows-min`
```css
grid-auto-rows: min-content;
```
#### `auto-rows-max`
```css
grid-auto-rows: max-content;
```
#### `auto-rows-fr`
```css
grid-auto-rows: minmax(0, 1fr);
```
#### `grid-cols-none`
```css
grid-template-columns: none;
```
#### `grid-cols-subgrid`
```css
grid-template-columns: subgrid;
```
#### `grid-rows-none`
```css
grid-template-rows: none;
```
#### `grid-rows-subgrid`
```css
grid-template-rows: subgrid;
```
#### `flex-row`
```css
flex-direction: row;
```
#### `flex-row-reverse`
```css
flex-direction: row-reverse;
```
#### `flex-col`
```css
flex-direction: column;
```
#### `flex-col-reverse`
```css
flex-direction: column-reverse;
```
#### `flex-wrap`
```css
flex-wrap: wrap;
```
#### `flex-nowrap`
```css
flex-wrap: nowrap;
```
#### `flex-wrap-reverse`
```css
flex-wrap: wrap-reverse;
```
#### `content-normal`
```css
align-content: normal;
```
#### `content-center`
```css
align-content: center;
```
#### `content-start`
```css
align-content: flex-start;
```
#### `content-end`
```css
align-content: flex-end;
```
#### `content-between`
```css
align-content: space-between;
```
#### `content-around`
```css
align-content: space-around;
```
#### `content-evenly`
```css
align-content: space-evenly;
```
#### `content-baseline`
```css
align-content: baseline;
```
#### `content-stretch`
```css
align-content: stretch;
```
#### `items-center`
```css
align-items: center;
```
#### `items-start`
```css
align-items: flex-start;
```
#### `items-end`
```css
align-items: flex-end;
```
#### `items-baseline`
```css
align-items: baseline;
```
#### `items-stretch`
```css
align-items: stretch;
```
#### `justify-normal`
```css
justify-content: normal;
```
#### `justify-center`
```css
justify-content: center;
```
#### `justify-start`
```css
justify-content: flex-start;
```
#### `justify-end`
```css
justify-content: flex-end;
```
#### `justify-between`
```css
justify-content: space-between;
```
#### `justify-around`
```css
justify-content: space-around;
```
#### `justify-evenly`
```css
justify-content: space-evenly;
```
#### `justify-baseline`
```css
justify-content: baseline;
```
#### `justify-stretch`
```css
justify-content: stretch;
```
#### `justify-items-normal`
```css
justify-items: normal;
```
#### `justify-items-center`
```css
justify-items: center;
```
#### `justify-items-start`
```css
justify-items: start;
```
#### `justify-items-end`
```css
justify-items: end;
```
#### `justify-items-stretch`
```css
justify-items: stretch;
```
#### `place-self-auto`
```css
place-self: auto;
```
#### `place-self-start`
```css
place-self: start;
```
#### `place-self-end`
```css
place-self: end;
```
#### `place-self-center`
```css
place-self: center;
```
#### `place-self-stretch`
```css
place-self: stretch;
```
#### `self-auto`
```css
align-self: auto;
```
#### `self-start`
```css
align-self: flex-start;
```
#### `self-end`
```css
align-self: flex-end;
```
#### `self-center`
```css
align-self: center;
```
#### `self-stretch`
```css
align-self: stretch;
```
#### `self-baseline`
```css
align-self: baseline;
```
#### `justify-self-auto`
```css
justify-self: auto;
```
#### `justify-self-start`
```css
justify-self: flex-start;
```
#### `justify-self-end`
```css
justify-self: flex-end;
```
#### `justify-self-center`
```css
justify-self: center;
```
#### `justify-self-stretch`
```css
justify-self: stretch;
```
#### `scroll-auto`
```css
scroll-behavior: auto;
```
#### `scroll-smooth`
```css
scroll-behavior: smooth;
```
#### `text-ellipsis`
```css
text-overflow: ellipsis;
```
#### `text-clip`
```css
text-overflow: clip;
```
#### `whitespace-normal`
```css
white-space: normal;
```
#### `whitespace-nowrap`
```css
white-space: nowrap;
```
#### `whitespace-pre`
```css
white-space: pre;
```
#### `whitespace-pre-line`
```css
white-space: pre-line;
```
#### `whitespace-pre-wrap`
```css
white-space: pre-wrap;
```
#### `whitespace-break-spaces`
```css
white-space: break-spaces;
```
#### `text-wrap`
```css
text-wrap: wrap;
```
#### `text-nowrap`
```css
text-wrap: nowrap;
```
#### `text-balance`
```css
text-wrap: balance;
```
#### `text-pretty`
```css
text-wrap: pretty;
```
#### `break-words`
```css
overflow-wrap: break-word;
```
#### `break-all`
```css
word-break: break-all;
```
#### `break-keep`
```css
word-break: break-keep;
```
#### `via-none`
```css
--tw-gradient-via-stops: initial;
```
#### `bg-clip-text`
```css
background-clip: text;
```
#### `bg-clip-border`
```css
background-clip: border-box;
```
#### `bg-clip-padding`
```css
background-clip: padding-box;
```
#### `bg-clip-content`
```css
background-clip: content-box;
```
#### `bg-origin-border`
```css
background-origin: border-box;
```
#### `bg-origin-padding`
```css
background-origin: padding-box;
```
#### `bg-origin-content`
```css
background-origin: content-box;
```
#### `mix-blend-plus-darker`
```css
mix-blend-mode: plus-darker;
```
#### `mix-blend-plus-lighter`
```css
mix-blend-mode: plus-lighter;
```
#### `stroke-none`
```css
stroke: none;
```
#### `object-contain`
```css
object-fit: contain;
```
#### `object-cover`
```css
object-fit: cover;
```
#### `object-fill`
```css
object-fit: fill;
```
#### `object-none`
```css
object-fit: none;
```
#### `object-scale-down`
```css
object-fit: scale-down;
```
#### `object-bottom`
```css
object-position: bottom;
```
#### `object-center`
```css
object-position: center;
```
#### `object-left`
```css
object-position: left;
```
#### `object-left-bottom`
```css
object-position: left bottom;
```
#### `object-left-top`
```css
object-position: left top;
```
#### `object-right`
```css
object-position: right;
```
#### `object-right-bottom`
```css
object-position: right bottom;
```
#### `object-right-top`
```css
object-position: right top;
```
#### `object-top`
```css
object-position: top;
```
#### `text-left`
```css
text-align: left;
```
#### `text-center`
```css
text-align: center;
```
#### `text-right`
```css
text-align: right;
```
#### `text-justify`
```css
text-align: justify;
```
#### `text-start`
```css
text-align: start;
```
#### `text-end`
```css
text-align: end;
```
#### `align-baseline`
```css
vertical-align: baseline;
```
#### `align-top`
```css
vertical-align: top;
```
#### `align-middle`
```css
vertical-align: middle;
```
#### `align-bottom`
```css
vertical-align: bottom;
```
#### `align-text-top`
```css
vertical-align: text-top;
```
#### `align-text-bottom`
```css
vertical-align: text-bottom;
```
#### `align-sub`
```css
vertical-align: sub;
```
#### `align-super`
```css
vertical-align: super;
```
#### `uppercase`
```css
text-transform: uppercase;
```
#### `lowercase`
```css
text-transform: lowercase;
```
#### `capitalize`
```css
text-transform: capitalize;
```
#### `normal-case`
```css
text-transform: none;
```
#### `italic`
```css
font-style: italic;
```
#### `not-italic`
```css
font-style: normal;
```
#### `underline`
```css
text-decoration-line: underline;
```
#### `overline`
```css
text-decoration-line: overline;
```
#### `line-through`
```css
text-decoration-line: line-through;
```
#### `no-underline`
```css
text-decoration-line: none;
```
#### `font-stretch-normal`
```css
font-stretch: normal;
```
#### `font-stretch-ultra-condensed`
```css
font-stretch: ultra-condensed;
```
#### `font-stretch-extra-condensed`
```css
font-stretch: extra-condensed;
```
#### `font-stretch-condensed`
```css
font-stretch: condensed;
```
#### `font-stretch-semi-condensed`
```css
font-stretch: semi-condensed;
```
#### `font-stretch-semi-expanded`
```css
font-stretch: semi-expanded;
```
#### `font-stretch-expanded`
```css
font-stretch: expanded;
```
#### `font-stretch-extra-expanded`
```css
font-stretch: extra-expanded;
```
#### `font-stretch-ultra-expanded`
```css
font-stretch: ultra-expanded;
```
#### `decoration-solid`
```css
text-decoration-style: solid;
```
#### `decoration-double`
```css
text-decoration-style: double;
```
#### `decoration-dotted`
```css
text-decoration-style: dotted;
```
#### `decoration-dashed`
```css
text-decoration-style: dashed;
```
#### `decoration-wavy`
```css
text-decoration-style: wavy;
```
#### `decoration-auto`
```css
text-decoration-thickness: auto;
```
#### `decoration-from-font`
```css
text-decoration-thickness: from-font;
```
#### `animate-none`
```css
animation: none;
```
#### `will-change-auto`
```css
will-change: auto;
```
#### `will-change-scroll`
```css
will-change: scroll-position;
```
#### `will-change-contents`
```css
will-change: contents;
```
#### `will-change-transform`
```css
will-change: transform;
```
#### `contain-none`
```css
contain: none;
```
#### `contain-content`
```css
contain: content;
```
#### `contain-strict`
```css
contain: strict;
```
#### `forced-color-adjust-none`
```css
forced-color-adjust: none;
```
#### `forced-color-adjust-auto`
```css
forced-color-adjust: auto;
```
#### `normal-nums`
```css
font-variant-numeric: normal;
```
#### `underline-offset-auto`
```css
text-underline-offset: auto;
```

## Contributing

Contributions are welcome! Please feel free to open issues or pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

