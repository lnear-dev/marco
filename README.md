# @lnear/marco - CSS Utilities Library

This is a lightweight (and low level) CSS utilities library aimed at simplifying and standardizing common CSS patterns. It provides a utility function for generating CSS properties and values dynamically.

## Installation

You can install this library via npm:

```bash
npm install @lnear/marco
```

## Usage

```javascript
import { replace } from '@lnear/marco';
console.log(
  `div { ${replace(
    'transition-colors',
    'transition-none',
    'blur-md',
    'drop-shadow-xl'
  )} }`
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

More docs coming soon...

## Patterns

The below are the predefined patterns that can be used with the `replace` function. It is not an exhaustive list and intutive patterns are implemented as needed.
For example, only "saturate-(0, 50, 100, 150, 200)" are documented here, but any value can be used with the "saturate" pattern. (saturate-x where x is a number will be replaced with "filter: saturate({x / 100});")

<details>
  <summary>View Patterns</summary>

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
#### `touch-none`
```css
touch-action: none;
```
#### `touch-auto`
```css
touch-action: auto;
```
#### `touch-pan-x`
```css
touch-action: pan-x;
```
#### `cursor-auto`
```css
cursor: auto;
```
#### `cursor-default`
```css
cursor: default;
```
#### `select-none`
```css
-webkit-user-select: none;user-select: none;
```
#### `select-text`
```css
-webkit-user-select: text;user-select: text;
```
#### `rotate-0`
```css
rotate: 0deg;
```
#### `rotate-90`
```css
rotate: 90deg;
```
#### `border-inherit`
```css
border-color: inherit;
```
#### `border-current`
```css
border-color: currentColor;
```
#### `border-transparent`
```css
border-color: transparent;
```
#### `border-x-black`
```css
border-left-color: rgb(0 0 0); border-right-color: rgb(0 0 0);
```
#### `border-black`
```css
border-color: rgb(0 0 0);
```
#### `border-white`
```css
border-color: rgb(255 255 255);
```
#### `border-slate-50`
```css
border-color: rgb(248 250 252);
```
#### `border-slate-100`
```css
border-color: rgb(241 245 249);
```
#### `border-slate-200`
```css
border-color: rgb(226 232 240);
```
#### `border-slate-300`
```css
border-color: rgb(203 213 225);
```
#### `border-slate-400`
```css
border-color: rgb(148 163 184);
```
#### `border-slate-500`
```css
border-color: rgb(100 116 139);
```
#### `border-slate-600`
```css
border-color: rgb(71 85 105);
```
#### `border-slate-700`
```css
border-color: rgb(51 65 85);
```
#### `border-slate-800`
```css
border-color: rgb(30 41 59);
```
#### `border-slate-900`
```css
border-color: rgb(15 23 42);
```
#### `border-slate-950`
```css
border-color: rgb(2 6 23);
```
#### `border-gray-50`
```css
border-color: rgb(249 250 251);
```
#### `border-gray-100`
```css
border-color: rgb(243 244 246);
```
#### `border-gray-200`
```css
border-color: rgb(229 231 235);
```
#### `border-gray-300`
```css
border-color: rgb(209 213 219);
```
#### `border-gray-400`
```css
border-color: rgb(156 163 175);
```
#### `border-gray-500`
```css
border-color: rgb(107 114 128);
```
#### `border-gray-600`
```css
border-color: rgb(75 85 99);
```
#### `border-gray-700`
```css
border-color: rgb(55 65 81);
```
#### `border-gray-800`
```css
border-color: rgb(31 41 55);
```
#### `border-gray-900`
```css
border-color: rgb(17 24 39);
```
#### `border-gray-950`
```css
border-color: rgb(3 7 18);
```
#### `border-zinc-50`
```css
border-color: rgb(250 250 250);
```
#### `border-zinc-100`
```css
border-color: rgb(244 244 245);
```
#### `border-zinc-200`
```css
border-color: rgb(228 228 231);
```
#### `border-zinc-300`
```css
border-color: rgb(212 212 216);
```
#### `border-zinc-400`
```css
border-color: rgb(161 161 170);
```
#### `border-zinc-500`
```css
border-color: rgb(113 113 122);
```
#### `border-zinc-600`
```css
border-color: rgb(82 82 91);
```
#### `border-zinc-700`
```css
border-color: rgb(63 63 70);
```
#### `border-zinc-800`
```css
border-color: rgb(39 39 42);
```
#### `border-zinc-900`
```css
border-color: rgb(24 24 27);
```
#### `border-zinc-950`
```css
border-color: rgb(9 9 11);
```
#### `border-neutral-50`
```css
border-color: rgb(250 250 250);
```
#### `border-neutral-100`
```css
border-color: rgb(245 245 245);
```
#### `border-neutral-200`
```css
border-color: rgb(229 229 229);
```
#### `border-neutral-300`
```css
border-color: rgb(212 212 212);
```
#### `border-neutral-400`
```css
border-color: rgb(163 163 163);
```
#### `border-neutral-500`
```css
border-color: rgb(115 115 115);
```
#### `border-neutral-600`
```css
border-color: rgb(82 82 82);
```
#### `border-neutral-700`
```css
border-color: rgb(64 64 64);
```
#### `border-neutral-800`
```css
border-color: rgb(38 38 38);
```
#### `border-neutral-900`
```css
border-color: rgb(23 23 23);
```
#### `border-neutral-950`
```css
border-color: rgb(10 10 10);
```
#### `border-stone-50`
```css
border-color: rgb(250 250 249);
```
#### `border-stone-100`
```css
border-color: rgb(245 245 244);
```
#### `border-stone-200`
```css
border-color: rgb(231 229 228);
```
#### `border-stone-300`
```css
border-color: rgb(214 211 209);
```
#### `border-stone-400`
```css
border-color: rgb(168 162 158);
```
#### `border-stone-500`
```css
border-color: rgb(120 113 108);
```
#### `border-stone-600`
```css
border-color: rgb(87 83 78);
```
#### `border-stone-700`
```css
border-color: rgb(68 64 60);
```
#### `border-stone-800`
```css
border-color: rgb(41 37 36);
```
#### `border-stone-900`
```css
border-color: rgb(28 25 23);
```
#### `border-stone-950`
```css
border-color: rgb(12 10 9);
```
#### `border-red-50`
```css
border-color: rgb(254 242 242);
```
#### `border-red-100`
```css
border-color: rgb(254 226 226);
```
#### `border-red-200`
```css
border-color: rgb(254 202 202);
```
#### `border-red-300`
```css
border-color: rgb(252 165 165);
```
#### `border-red-400`
```css
border-color: rgb(248 113 113);
```
#### `border-red-500`
```css
border-color: rgb(239 68 68);
```
#### `border-red-600`
```css
border-color: rgb(220 38 38);
```
#### `border-red-700`
```css
border-color: rgb(185 28 28);
```
#### `border-red-800`
```css
border-color: rgb(153 27 27);
```
#### `border-red-900`
```css
border-color: rgb(127 29 29);
```
#### `border-red-950`
```css
border-color: rgb(69 10 10);
```
#### `border-orange-50`
```css
border-color: rgb(255 247 237);
```
#### `border-orange-100`
```css
border-color: rgb(255 237 213);
```
#### `border-orange-200`
```css
border-color: rgb(254 215 170);
```
#### `border-orange-300`
```css
border-color: rgb(253 186 116);
```
#### `border-orange-400`
```css
border-color: rgb(251 146 60);
```
#### `border-orange-500`
```css
border-color: rgb(249 115 22);
```
#### `border-orange-600`
```css
border-color: rgb(234 88 12);
```
#### `border-orange-700`
```css
border-color: rgb(194 65 12);
```
#### `border-orange-800`
```css
border-color: rgb(154 52 18);
```
#### `border-orange-900`
```css
border-color: rgb(124 45 18);
```
#### `border-orange-950`
```css
border-color: rgb(67 20 7);
```
#### `border-amber-50`
```css
border-color: rgb(255 251 235);
```
#### `border-amber-100`
```css
border-color: rgb(254 243 199);
```
#### `border-amber-200`
```css
border-color: rgb(253 230 138);
```
#### `border-amber-300`
```css
border-color: rgb(252 211 77);
```
#### `border-amber-400`
```css
border-color: rgb(251 191 36);
```
#### `border-amber-500`
```css
border-color: rgb(245 158 11);
```
#### `border-amber-600`
```css
border-color: rgb(217 119 6);
```
#### `border-amber-700`
```css
border-color: rgb(180 83 9);
```
#### `border-amber-800`
```css
border-color: rgb(146 64 14);
```
#### `border-amber-900`
```css
border-color: rgb(120 53 15);
```
#### `border-amber-950`
```css
border-color: rgb(69 26 3);
```
#### `border-yellow-50`
```css
border-color: rgb(254 252 232);
```
#### `border-yellow-100`
```css
border-color: rgb(254 249 195);
```
#### `border-yellow-200`
```css
border-color: rgb(254 240 138);
```
#### `border-yellow-300`
```css
border-color: rgb(253 224 71);
```
#### `border-yellow-400`
```css
border-color: rgb(250 204 21);
```
#### `border-yellow-500`
```css
border-color: rgb(234 179 8);
```
#### `border-yellow-600`
```css
border-color: rgb(202 138 4);
```
#### `border-yellow-700`
```css
border-color: rgb(161 98 7);
```
#### `border-yellow-800`
```css
border-color: rgb(133 77 14);
```
#### `border-yellow-900`
```css
border-color: rgb(113 63 18);
```
#### `border-yellow-950`
```css
border-color: rgb(66 32 6);
```
#### `border-lime-50`
```css
border-color: rgb(247 254 231);
```
#### `border-lime-100`
```css
border-color: rgb(236 252 203);
```
#### `border-lime-200`
```css
border-color: rgb(217 249 157);
```
#### `border-lime-300`
```css
border-color: rgb(190 242 100);
```
#### `border-lime-400`
```css
border-color: rgb(163 230 53);
```
#### `border-lime-500`
```css
border-color: rgb(132 204 22);
```
#### `border-lime-600`
```css
border-color: rgb(101 163 13);
```
#### `border-lime-700`
```css
border-color: rgb(77 124 15);
```
#### `border-lime-800`
```css
border-color: rgb(63 98 18);
```
#### `border-lime-900`
```css
border-color: rgb(54 83 20);
```
#### `border-lime-950`
```css
border-color: rgb(26 46 5);
```
#### `border-green-50`
```css
border-color: rgb(240 253 244);
```
#### `border-green-100`
```css
border-color: rgb(220 252 231);
```
#### `border-green-200`
```css
border-color: rgb(187 247 208);
```
#### `border-green-300`
```css
border-color: rgb(134 239 172);
```
#### `border-green-400`
```css
border-color: rgb(74 222 128);
```
#### `border-green-500`
```css
border-color: rgb(34 197 94);
```
#### `border-green-600`
```css
border-color: rgb(22 163 74);
```
#### `border-green-700`
```css
border-color: rgb(21 128 61);
```
#### `border-green-800`
```css
border-color: rgb(22 101 52);
```
#### `border-green-900`
```css
border-color: rgb(20 83 45);
```
#### `border-green-950`
```css
border-color: rgb(5 46 22);
```
#### `border-emerald-50`
```css
border-color: rgb(236 253 245);
```
#### `border-emerald-100`
```css
border-color: rgb(209 250 229);
```
#### `border-emerald-200`
```css
border-color: rgb(167 243 208);
```
#### `border-emerald-300`
```css
border-color: rgb(110 231 183);
```
#### `border-emerald-400`
```css
border-color: rgb(52 211 153);
```
#### `border-emerald-500`
```css
border-color: rgb(16 185 129);
```
#### `border-emerald-600`
```css
border-color: rgb(5 150 105);
```
#### `border-emerald-700`
```css
border-color: rgb(4 120 87);
```
#### `border-emerald-800`
```css
border-color: rgb(6 95 70);
```
#### `border-emerald-900`
```css
border-color: rgb(6 78 59);
```
#### `border-emerald-950`
```css
border-color: rgb(2 44 34);
```
#### `border-teal-50`
```css
border-color: rgb(240 253 250);
```
#### `border-teal-100`
```css
border-color: rgb(204 251 241);
```
#### `border-teal-200`
```css
border-color: rgb(153 246 228);
```
#### `border-teal-300`
```css
border-color: rgb(94 234 212);
```
#### `border-teal-400`
```css
border-color: rgb(45 212 191);
```
#### `border-teal-500`
```css
border-color: rgb(20 184 166);
```
#### `border-teal-600`
```css
border-color: rgb(13 148 136);
```
#### `border-teal-700`
```css
border-color: rgb(15 118 110);
```
#### `border-teal-800`
```css
border-color: rgb(17 94 89);
```
#### `border-teal-900`
```css
border-color: rgb(19 78 74);
```
#### `border-teal-950`
```css
border-color: rgb(4 47 46);
```
#### `border-cyan-50`
```css
border-color: rgb(236 254 255);
```
#### `border-cyan-100`
```css
border-color: rgb(207 250 254);
```
#### `border-cyan-200`
```css
border-color: rgb(165 243 252);
```
#### `border-cyan-300`
```css
border-color: rgb(103 232 249);
```
#### `border-cyan-400`
```css
border-color: rgb(34 211 238);
```
#### `border-cyan-500`
```css
border-color: rgb(6 182 212);
```
#### `border-cyan-600`
```css
border-color: rgb(8 145 178);
```
#### `border-cyan-700`
```css
border-color: rgb(14 116 144);
```
#### `border-cyan-800`
```css
border-color: rgb(21 94 117);
```
#### `border-cyan-900`
```css
border-color: rgb(22 78 99);
```
#### `border-cyan-950`
```css
border-color: rgb(8 51 68);
```
#### `border-sky-50`
```css
border-color: rgb(240 249 255);
```
#### `border-sky-100`
```css
border-color: rgb(224 242 254);
```
#### `border-sky-200`
```css
border-color: rgb(186 230 253);
```
#### `border-sky-300`
```css
border-color: rgb(125 211 252);
```
#### `border-sky-400`
```css
border-color: rgb(56 189 248);
```
#### `border-sky-500`
```css
border-color: rgb(14 165 233);
```
#### `border-sky-600`
```css
border-color: rgb(2 132 199);
```
#### `border-sky-700`
```css
border-color: rgb(3 105 161);
```
#### `border-sky-800`
```css
border-color: rgb(7 89 133);
```
#### `border-sky-900`
```css
border-color: rgb(12 74 110);
```
#### `border-sky-950`
```css
border-color: rgb(8 47 73);
```
#### `border-blue-50`
```css
border-color: rgb(239 246 255);
```
#### `border-blue-100`
```css
border-color: rgb(219 234 254);
```
#### `border-blue-200`
```css
border-color: rgb(191 219 254);
```
#### `border-blue-300`
```css
border-color: rgb(147 197 253);
```
#### `border-blue-400`
```css
border-color: rgb(96 165 250);
```
#### `border-blue-500`
```css
border-color: rgb(59 130 246);
```
#### `border-blue-600`
```css
border-color: rgb(37 99 235);
```
#### `border-blue-700`
```css
border-color: rgb(29 78 216);
```
#### `border-blue-800`
```css
border-color: rgb(30 64 175);
```
#### `border-blue-900`
```css
border-color: rgb(30 58 138);
```
#### `border-blue-950`
```css
border-color: rgb(23 37 84);
```
#### `border-indigo-50`
```css
border-color: rgb(238 242 255);
```
#### `border-indigo-100`
```css
border-color: rgb(224 231 255);
```
#### `border-indigo-200`
```css
border-color: rgb(199 210 254);
```
#### `border-indigo-300`
```css
border-color: rgb(165 180 252);
```
#### `border-indigo-400`
```css
border-color: rgb(129 140 248);
```
#### `border-indigo-500`
```css
border-color: rgb(99 102 241);
```
#### `border-indigo-600`
```css
border-color: rgb(79 70 229);
```
#### `border-indigo-700`
```css
border-color: rgb(67 56 202);
```
#### `border-indigo-800`
```css
border-color: rgb(55 48 163);
```
#### `border-indigo-900`
```css
border-color: rgb(49 46 129);
```
#### `border-indigo-950`
```css
border-color: rgb(30 27 75);
```
#### `border-violet-50`
```css
border-color: rgb(245 243 255);
```
#### `border-violet-100`
```css
border-color: rgb(237 233 254);
```
#### `border-violet-200`
```css
border-color: rgb(221 214 254);
```
#### `border-violet-300`
```css
border-color: rgb(196 181 253);
```
#### `border-violet-400`
```css
border-color: rgb(167 139 250);
```
#### `border-violet-500`
```css
border-color: rgb(139 92 246);
```
#### `border-violet-600`
```css
border-color: rgb(124 58 237);
```
#### `border-violet-700`
```css
border-color: rgb(109 40 217);
```
#### `border-violet-800`
```css
border-color: rgb(91 33 182);
```
#### `border-violet-900`
```css
border-color: rgb(76 29 149);
```
#### `border-violet-950`
```css
border-color: rgb(46 16 101);
```
#### `border-purple-50`
```css
border-color: rgb(250 245 255);
```
#### `border-purple-100`
```css
border-color: rgb(243 232 255);
```
#### `border-purple-200`
```css
border-color: rgb(233 213 255);
```
#### `border-purple-300`
```css
border-color: rgb(216 180 254);
```
#### `border-purple-400`
```css
border-color: rgb(192 132 252);
```
#### `border-purple-500`
```css
border-color: rgb(168 85 247);
```
#### `border-purple-600`
```css
border-color: rgb(147 51 234);
```
#### `border-purple-700`
```css
border-color: rgb(126 34 206);
```
#### `border-purple-800`
```css
border-color: rgb(107 33 168);
```
#### `border-purple-900`
```css
border-color: rgb(88 28 135);
```
#### `border-purple-950`
```css
border-color: rgb(59 7 100);
```
#### `border-fuchsia-50`
```css
border-color: rgb(253 244 255);
```
#### `border-fuchsia-100`
```css
border-color: rgb(250 232 255);
```
#### `border-fuchsia-200`
```css
border-color: rgb(245 208 254);
```
#### `border-fuchsia-300`
```css
border-color: rgb(240 171 252);
```
#### `border-fuchsia-400`
```css
border-color: rgb(232 121 249);
```
#### `border-fuchsia-500`
```css
border-color: rgb(217 70 239);
```
#### `border-fuchsia-600`
```css
border-color: rgb(192 38 211);
```
#### `border-fuchsia-700`
```css
border-color: rgb(162 28 175);
```
#### `border-fuchsia-800`
```css
border-color: rgb(134 25 143);
```
#### `border-fuchsia-900`
```css
border-color: rgb(112 26 117);
```
#### `border-fuchsia-950`
```css
border-color: rgb(74 4 78);
```
#### `border-pink-50`
```css
border-color: rgb(253 242 248);
```
#### `border-pink-100`
```css
border-color: rgb(252 231 243);
```
#### `border-pink-200`
```css
border-color: rgb(251 207 232);
```
#### `border-pink-300`
```css
border-color: rgb(249 168 212);
```
#### `border-pink-400`
```css
border-color: rgb(244 114 182);
```
#### `border-pink-500`
```css
border-color: rgb(236 72 153);
```
#### `border-pink-600`
```css
border-color: rgb(219 39 119);
```
#### `border-pink-700`
```css
border-color: rgb(190 24 93);
```
#### `border-pink-800`
```css
border-color: rgb(157 23 77);
```
#### `border-pink-900`
```css
border-color: rgb(131 24 67);
```
#### `border-pink-950`
```css
border-color: rgb(80 7 36);
```
#### `border-rose-50`
```css
border-color: rgb(255 241 242);
```
#### `border-rose-100`
```css
border-color: rgb(255 228 230);
```
#### `border-rose-200`
```css
border-color: rgb(254 205 211);
```
#### `border-rose-300`
```css
border-color: rgb(253 164 175);
```
#### `border-rose-400`
```css
border-color: rgb(251 113 133);
```
#### `border-rose-500`
```css
border-color: rgb(244 63 94);
```
#### `border-rose-600`
```css
border-color: rgb(225 29 72);
```
#### `border-rose-700`
```css
border-color: rgb(190 18 60);
```
#### `border-rose-800`
```css
border-color: rgb(159 18 57);
```
#### `border-rose-900`
```css
border-color: rgb(136 19 55);
```
#### `border-rose-950`
```css
border-color: rgb(76 5 25);
```

</details>

## Colors

<details>
  <summary>View Colors</summary>

<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>inherit</div>
                  <div style="background-color: inherit; width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>current</div>
                  <div style="background-color: currentColor; width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>transparent</div>
                  <div style="background-color: transparent; width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>black</div>
                  <div style="background-color: rgb(0 0 0); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>white</div>
                  <div style="background-color: rgb(255 255 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-50</div>
                  <div style="background-color: rgb(248 250 252); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-100</div>
                  <div style="background-color: rgb(241 245 249); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-200</div>
                  <div style="background-color: rgb(226 232 240); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-300</div>
                  <div style="background-color: rgb(203 213 225); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-400</div>
                  <div style="background-color: rgb(148 163 184); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-500</div>
                  <div style="background-color: rgb(100 116 139); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-600</div>
                  <div style="background-color: rgb(71 85 105); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-700</div>
                  <div style="background-color: rgb(51 65 85); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-800</div>
                  <div style="background-color: rgb(30 41 59); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-900</div>
                  <div style="background-color: rgb(15 23 42); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>slate-950</div>
                  <div style="background-color: rgb(2 6 23); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-50</div>
                  <div style="background-color: rgb(249 250 251); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-100</div>
                  <div style="background-color: rgb(243 244 246); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-200</div>
                  <div style="background-color: rgb(229 231 235); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-300</div>
                  <div style="background-color: rgb(209 213 219); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-400</div>
                  <div style="background-color: rgb(156 163 175); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-500</div>
                  <div style="background-color: rgb(107 114 128); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-600</div>
                  <div style="background-color: rgb(75 85 99); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-700</div>
                  <div style="background-color: rgb(55 65 81); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-800</div>
                  <div style="background-color: rgb(31 41 55); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-900</div>
                  <div style="background-color: rgb(17 24 39); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>gray-950</div>
                  <div style="background-color: rgb(3 7 18); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-50</div>
                  <div style="background-color: rgb(250 250 250); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-100</div>
                  <div style="background-color: rgb(244 244 245); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-200</div>
                  <div style="background-color: rgb(228 228 231); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-300</div>
                  <div style="background-color: rgb(212 212 216); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-400</div>
                  <div style="background-color: rgb(161 161 170); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-500</div>
                  <div style="background-color: rgb(113 113 122); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-600</div>
                  <div style="background-color: rgb(82 82 91); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-700</div>
                  <div style="background-color: rgb(63 63 70); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-800</div>
                  <div style="background-color: rgb(39 39 42); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-900</div>
                  <div style="background-color: rgb(24 24 27); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>zinc-950</div>
                  <div style="background-color: rgb(9 9 11); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-50</div>
                  <div style="background-color: rgb(250 250 250); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-100</div>
                  <div style="background-color: rgb(245 245 245); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-200</div>
                  <div style="background-color: rgb(229 229 229); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-300</div>
                  <div style="background-color: rgb(212 212 212); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-400</div>
                  <div style="background-color: rgb(163 163 163); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-500</div>
                  <div style="background-color: rgb(115 115 115); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-600</div>
                  <div style="background-color: rgb(82 82 82); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-700</div>
                  <div style="background-color: rgb(64 64 64); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-800</div>
                  <div style="background-color: rgb(38 38 38); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-900</div>
                  <div style="background-color: rgb(23 23 23); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>neutral-950</div>
                  <div style="background-color: rgb(10 10 10); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-50</div>
                  <div style="background-color: rgb(250 250 249); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-100</div>
                  <div style="background-color: rgb(245 245 244); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-200</div>
                  <div style="background-color: rgb(231 229 228); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-300</div>
                  <div style="background-color: rgb(214 211 209); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-400</div>
                  <div style="background-color: rgb(168 162 158); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-500</div>
                  <div style="background-color: rgb(120 113 108); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-600</div>
                  <div style="background-color: rgb(87 83 78); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-700</div>
                  <div style="background-color: rgb(68 64 60); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-800</div>
                  <div style="background-color: rgb(41 37 36); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-900</div>
                  <div style="background-color: rgb(28 25 23); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>stone-950</div>
                  <div style="background-color: rgb(12 10 9); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-50</div>
                  <div style="background-color: rgb(254 242 242); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-100</div>
                  <div style="background-color: rgb(254 226 226); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-200</div>
                  <div style="background-color: rgb(254 202 202); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-300</div>
                  <div style="background-color: rgb(252 165 165); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-400</div>
                  <div style="background-color: rgb(248 113 113); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-500</div>
                  <div style="background-color: rgb(239 68 68); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-600</div>
                  <div style="background-color: rgb(220 38 38); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-700</div>
                  <div style="background-color: rgb(185 28 28); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-800</div>
                  <div style="background-color: rgb(153 27 27); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-900</div>
                  <div style="background-color: rgb(127 29 29); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>red-950</div>
                  <div style="background-color: rgb(69 10 10); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-50</div>
                  <div style="background-color: rgb(255 247 237); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-100</div>
                  <div style="background-color: rgb(255 237 213); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-200</div>
                  <div style="background-color: rgb(254 215 170); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-300</div>
                  <div style="background-color: rgb(253 186 116); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-400</div>
                  <div style="background-color: rgb(251 146 60); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-500</div>
                  <div style="background-color: rgb(249 115 22); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-600</div>
                  <div style="background-color: rgb(234 88 12); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-700</div>
                  <div style="background-color: rgb(194 65 12); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-800</div>
                  <div style="background-color: rgb(154 52 18); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-900</div>
                  <div style="background-color: rgb(124 45 18); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>orange-950</div>
                  <div style="background-color: rgb(67 20 7); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-50</div>
                  <div style="background-color: rgb(255 251 235); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-100</div>
                  <div style="background-color: rgb(254 243 199); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-200</div>
                  <div style="background-color: rgb(253 230 138); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-300</div>
                  <div style="background-color: rgb(252 211 77); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-400</div>
                  <div style="background-color: rgb(251 191 36); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-500</div>
                  <div style="background-color: rgb(245 158 11); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-600</div>
                  <div style="background-color: rgb(217 119 6); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-700</div>
                  <div style="background-color: rgb(180 83 9); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-800</div>
                  <div style="background-color: rgb(146 64 14); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-900</div>
                  <div style="background-color: rgb(120 53 15); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>amber-950</div>
                  <div style="background-color: rgb(69 26 3); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-50</div>
                  <div style="background-color: rgb(254 252 232); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-100</div>
                  <div style="background-color: rgb(254 249 195); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-200</div>
                  <div style="background-color: rgb(254 240 138); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-300</div>
                  <div style="background-color: rgb(253 224 71); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-400</div>
                  <div style="background-color: rgb(250 204 21); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-500</div>
                  <div style="background-color: rgb(234 179 8); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-600</div>
                  <div style="background-color: rgb(202 138 4); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-700</div>
                  <div style="background-color: rgb(161 98 7); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-800</div>
                  <div style="background-color: rgb(133 77 14); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-900</div>
                  <div style="background-color: rgb(113 63 18); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>yellow-950</div>
                  <div style="background-color: rgb(66 32 6); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-50</div>
                  <div style="background-color: rgb(247 254 231); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-100</div>
                  <div style="background-color: rgb(236 252 203); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-200</div>
                  <div style="background-color: rgb(217 249 157); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-300</div>
                  <div style="background-color: rgb(190 242 100); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-400</div>
                  <div style="background-color: rgb(163 230 53); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-500</div>
                  <div style="background-color: rgb(132 204 22); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-600</div>
                  <div style="background-color: rgb(101 163 13); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-700</div>
                  <div style="background-color: rgb(77 124 15); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-800</div>
                  <div style="background-color: rgb(63 98 18); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-900</div>
                  <div style="background-color: rgb(54 83 20); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>lime-950</div>
                  <div style="background-color: rgb(26 46 5); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-50</div>
                  <div style="background-color: rgb(240 253 244); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-100</div>
                  <div style="background-color: rgb(220 252 231); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-200</div>
                  <div style="background-color: rgb(187 247 208); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-300</div>
                  <div style="background-color: rgb(134 239 172); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-400</div>
                  <div style="background-color: rgb(74 222 128); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-500</div>
                  <div style="background-color: rgb(34 197 94); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-600</div>
                  <div style="background-color: rgb(22 163 74); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-700</div>
                  <div style="background-color: rgb(21 128 61); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-800</div>
                  <div style="background-color: rgb(22 101 52); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-900</div>
                  <div style="background-color: rgb(20 83 45); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>green-950</div>
                  <div style="background-color: rgb(5 46 22); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-50</div>
                  <div style="background-color: rgb(236 253 245); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-100</div>
                  <div style="background-color: rgb(209 250 229); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-200</div>
                  <div style="background-color: rgb(167 243 208); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-300</div>
                  <div style="background-color: rgb(110 231 183); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-400</div>
                  <div style="background-color: rgb(52 211 153); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-500</div>
                  <div style="background-color: rgb(16 185 129); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-600</div>
                  <div style="background-color: rgb(5 150 105); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-700</div>
                  <div style="background-color: rgb(4 120 87); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-800</div>
                  <div style="background-color: rgb(6 95 70); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-900</div>
                  <div style="background-color: rgb(6 78 59); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>emerald-950</div>
                  <div style="background-color: rgb(2 44 34); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-50</div>
                  <div style="background-color: rgb(240 253 250); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-100</div>
                  <div style="background-color: rgb(204 251 241); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-200</div>
                  <div style="background-color: rgb(153 246 228); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-300</div>
                  <div style="background-color: rgb(94 234 212); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-400</div>
                  <div style="background-color: rgb(45 212 191); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-500</div>
                  <div style="background-color: rgb(20 184 166); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-600</div>
                  <div style="background-color: rgb(13 148 136); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-700</div>
                  <div style="background-color: rgb(15 118 110); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-800</div>
                  <div style="background-color: rgb(17 94 89); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-900</div>
                  <div style="background-color: rgb(19 78 74); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>teal-950</div>
                  <div style="background-color: rgb(4 47 46); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-50</div>
                  <div style="background-color: rgb(236 254 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-100</div>
                  <div style="background-color: rgb(207 250 254); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-200</div>
                  <div style="background-color: rgb(165 243 252); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-300</div>
                  <div style="background-color: rgb(103 232 249); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-400</div>
                  <div style="background-color: rgb(34 211 238); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-500</div>
                  <div style="background-color: rgb(6 182 212); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-600</div>
                  <div style="background-color: rgb(8 145 178); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-700</div>
                  <div style="background-color: rgb(14 116 144); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-800</div>
                  <div style="background-color: rgb(21 94 117); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-900</div>
                  <div style="background-color: rgb(22 78 99); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>cyan-950</div>
                  <div style="background-color: rgb(8 51 68); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-50</div>
                  <div style="background-color: rgb(240 249 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-100</div>
                  <div style="background-color: rgb(224 242 254); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-200</div>
                  <div style="background-color: rgb(186 230 253); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-300</div>
                  <div style="background-color: rgb(125 211 252); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-400</div>
                  <div style="background-color: rgb(56 189 248); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-500</div>
                  <div style="background-color: rgb(14 165 233); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-600</div>
                  <div style="background-color: rgb(2 132 199); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-700</div>
                  <div style="background-color: rgb(3 105 161); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-800</div>
                  <div style="background-color: rgb(7 89 133); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-900</div>
                  <div style="background-color: rgb(12 74 110); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>sky-950</div>
                  <div style="background-color: rgb(8 47 73); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-50</div>
                  <div style="background-color: rgb(239 246 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-100</div>
                  <div style="background-color: rgb(219 234 254); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-200</div>
                  <div style="background-color: rgb(191 219 254); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-300</div>
                  <div style="background-color: rgb(147 197 253); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-400</div>
                  <div style="background-color: rgb(96 165 250); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-500</div>
                  <div style="background-color: rgb(59 130 246); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-600</div>
                  <div style="background-color: rgb(37 99 235); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-700</div>
                  <div style="background-color: rgb(29 78 216); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-800</div>
                  <div style="background-color: rgb(30 64 175); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-900</div>
                  <div style="background-color: rgb(30 58 138); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>blue-950</div>
                  <div style="background-color: rgb(23 37 84); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-50</div>
                  <div style="background-color: rgb(238 242 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-100</div>
                  <div style="background-color: rgb(224 231 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-200</div>
                  <div style="background-color: rgb(199 210 254); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-300</div>
                  <div style="background-color: rgb(165 180 252); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-400</div>
                  <div style="background-color: rgb(129 140 248); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-500</div>
                  <div style="background-color: rgb(99 102 241); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-600</div>
                  <div style="background-color: rgb(79 70 229); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-700</div>
                  <div style="background-color: rgb(67 56 202); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-800</div>
                  <div style="background-color: rgb(55 48 163); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-900</div>
                  <div style="background-color: rgb(49 46 129); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>indigo-950</div>
                  <div style="background-color: rgb(30 27 75); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-50</div>
                  <div style="background-color: rgb(245 243 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-100</div>
                  <div style="background-color: rgb(237 233 254); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-200</div>
                  <div style="background-color: rgb(221 214 254); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-300</div>
                  <div style="background-color: rgb(196 181 253); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-400</div>
                  <div style="background-color: rgb(167 139 250); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-500</div>
                  <div style="background-color: rgb(139 92 246); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-600</div>
                  <div style="background-color: rgb(124 58 237); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-700</div>
                  <div style="background-color: rgb(109 40 217); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-800</div>
                  <div style="background-color: rgb(91 33 182); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-900</div>
                  <div style="background-color: rgb(76 29 149); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>violet-950</div>
                  <div style="background-color: rgb(46 16 101); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-50</div>
                  <div style="background-color: rgb(250 245 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-100</div>
                  <div style="background-color: rgb(243 232 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-200</div>
                  <div style="background-color: rgb(233 213 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-300</div>
                  <div style="background-color: rgb(216 180 254); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-400</div>
                  <div style="background-color: rgb(192 132 252); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-500</div>
                  <div style="background-color: rgb(168 85 247); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-600</div>
                  <div style="background-color: rgb(147 51 234); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-700</div>
                  <div style="background-color: rgb(126 34 206); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-800</div>
                  <div style="background-color: rgb(107 33 168); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-900</div>
                  <div style="background-color: rgb(88 28 135); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>purple-950</div>
                  <div style="background-color: rgb(59 7 100); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-50</div>
                  <div style="background-color: rgb(253 244 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-100</div>
                  <div style="background-color: rgb(250 232 255); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-200</div>
                  <div style="background-color: rgb(245 208 254); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-300</div>
                  <div style="background-color: rgb(240 171 252); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-400</div>
                  <div style="background-color: rgb(232 121 249); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-500</div>
                  <div style="background-color: rgb(217 70 239); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-600</div>
                  <div style="background-color: rgb(192 38 211); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-700</div>
                  <div style="background-color: rgb(162 28 175); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-800</div>
                  <div style="background-color: rgb(134 25 143); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-900</div>
                  <div style="background-color: rgb(112 26 117); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>fuchsia-950</div>
                  <div style="background-color: rgb(74 4 78); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-50</div>
                  <div style="background-color: rgb(253 242 248); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-100</div>
                  <div style="background-color: rgb(252 231 243); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-200</div>
                  <div style="background-color: rgb(251 207 232); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-300</div>
                  <div style="background-color: rgb(249 168 212); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-400</div>
                  <div style="background-color: rgb(244 114 182); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-500</div>
                  <div style="background-color: rgb(236 72 153); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-600</div>
                  <div style="background-color: rgb(219 39 119); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-700</div>
                  <div style="background-color: rgb(190 24 93); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-800</div>
                  <div style="background-color: rgb(157 23 77); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-900</div>
                  <div style="background-color: rgb(131 24 67); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>pink-950</div>
                  <div style="background-color: rgb(80 7 36); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-50</div>
                  <div style="background-color: rgb(255 241 242); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-100</div>
                  <div style="background-color: rgb(255 228 230); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-200</div>
                  <div style="background-color: rgb(254 205 211); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-300</div>
                  <div style="background-color: rgb(253 164 175); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-400</div>
                  <div style="background-color: rgb(251 113 133); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-500</div>
                  <div style="background-color: rgb(244 63 94); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-600</div>
                  <div style="background-color: rgb(225 29 72); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-700</div>
                  <div style="background-color: rgb(190 18 60); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-800</div>
                  <div style="background-color: rgb(159 18 57); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-900</div>
                  <div style="background-color: rgb(136 19 55); width: 100px; height: 50px;"></div>
                  </div>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                  <div>rose-950</div>
                  <div style="background-color: rgb(76 5 25); width: 100px; height: 50px;"></div>
                  </div>

</details>

