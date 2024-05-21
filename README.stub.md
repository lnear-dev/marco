# @lnear/marco - CSS Utilities Library

This is a lightweight (and low level) CSS utilities library aimed at simplifying and standardizing common CSS patterns. It provides a utility function for generating CSS properties and values dynamically.

## Installation

You can install this library via npm:

```bash
npm install @lnear/marco
```

## Patterns

The below are the predefined patterns that can be used with the `marco` function. It is not an exhaustive list and intutive patterns are implemented as needed.
For example, only "saturate-(0, 50, 100, 150, 200)" are documented here, but any value can be used with the "saturate" pattern. (saturate-x where x is a number will be replaced with "filter: saturate({x / 100});")

{!!patterns!!}
