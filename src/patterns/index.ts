import type { Patterns, ReplacerFn } from '../types';
import simplePatterns_ from './simple.json';
import { color } from '../colors';
const simplePatterns = Object.entries(simplePatterns_).map(
    ([pattern, replacer]) => [new RegExp(`^${pattern}`, 'g'), replacer] as const
);
const blurValues: { [key: string]: string } = {
    '-none': '0',
    '-sm': '4px',
    '-md': '12px',
    '-lg': '16px',
    '-xl': '24px',
    '-2xl': '40px',
    '-3xl': '64px',
    'default': '8px',
};
const shadowValues: { [key: string]: string } = {
    'none': '0 0 #0000',
    'sm': '0 1px 1px rgb(0 0 0 / 0.05)',
    'md': '0 4px 3px rgb(0 0 0 / 0.07)) drop-shadow(0 2px 2px rgb(0 0 0 / 0.06)',
    'lg': '0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1)',
    'xl': '0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(0 8px 5px rgb(0 0 0 / 0.08)',
    '2xl': '0 25px 25px rgb(0 0 0 / 0.15)',
};
const easeValues: Record<string, string> = {
    'in-out': 'cubic-bezier(0.4, 0, 0.2, 1)',
    'in': 'cubic-bezier(0.4, 0, 1, 1)',
    'out': 'cubic-bezier(0, 0, 0.2, 1)',
    'default': 'linear',
};
const generateFilter = (property: string, value: string) =>
    `filter: ${property}(${value});`;
const generateBackdropFilter = (property: string, value: string) =>
    `backdrop-filter: ${property}(${value});`;
const blurHelper = (screen: string): string =>
    blurValues[screen] || blurValues['default'];
const dropShadowHelper = (screen: string): string =>
    shadowValues[screen] || screen;
const easeHelper = (opt: string): string =>
    `transition-timing-function: ${easeValues[opt] || easeValues['default']};`;
const filter = (property: TemplateStringsArray, value: string): string =>
    `filter: ${property.join('')}(${value});`;

export const kPatterns: Patterns = [
    ...simplePatterns,
    [
        /backdrop-(brightness|contrast)-([0-9]+)/g,
        (_: string, property: string, value: string) =>
            generateBackdropFilter(property, `${parseInt(value) / 100}`),
    ],
    [
        /backdrop-blur(-(?:none|sm|md|lg|xl|2xl|3xl))?/g,
        (_: string, screen: string) =>
            generateBackdropFilter('blur', blurHelper(screen)),
    ],
    [
        /backdrop-(grayscale|invert|sepia)-([0-9]+)/g,
        (_: string, property: string, value: string) =>
            generateBackdropFilter(property, `${parseInt(value) / 100}`),
    ],
    [
        /backdrop-(grayscale|invert|sepia)/g,
        (_: string, property: string) => generateBackdropFilter(property, '100%'),
    ],
    [
        /backdrop-(brightness|contrast|saturate)-([0-9]+)/g,
        (_: string, property: string, value: string) =>
            generateBackdropFilter(property, `${parseInt(value) / 100}`),
    ],
    [
        /blur(-(?:none|sm|md|lg|xl|2xl|3xl))?/g,
        (_: string, screen: string) => filter`blur${blurHelper(screen)}`,
    ],
    [
        /^drop-shadow-(sm|md|lg|xl|2xl|none)/g,
        (_: string, screen: string) =>
            filter`drop-shadow${dropShadowHelper(screen)}`,
    ],
    [
        /^drop-shadow/g,
        'filter: drop-shadow(0 1px 2px rgb(0 0 0 / 0.1)) drop-shadow(0 1px 1px rgb(0 0 0 / 0.06));',
    ],
    [
        /(grayscale|invert|sepia)-([0-9]+)/g,
        (_: string, property: string, value: string) =>
            generateFilter(property, `${parseInt(value) / 100}`),
    ],
    [
        /(grayscale|invert|sepia)/g,
        (_: string, property: string) => generateFilter(property, '100%'),
    ],
    [
        /(brightness|contrast|saturate)-([0-9]+)/g,
        (_: string, property: string, value: string) =>
            generateFilter(property, `${parseInt(value) / 100}`),
    ],
    [
        /(?:ease|timing)-(linear|in-out|in|out)/g,
        (_: string, opt: string) => easeHelper(opt),
    ],
    [
        /break-(before|inside|after)-([a-z]+)/g,
        (_: string, property: string, value: string) =>
            `break-${property}: ${value};`,
    ],
    [
        /overflow-(x|y)-([a-z]+)/g,
        (_: string, property: string, value: string) =>
            `overflow-${property}: ${value};`,
    ],
    [/overflow-([a-z]+)/g, (_: string, value: string) => `overflow: ${value};`],
    [
        /overscroll-(x|y)-([a-z]+)/g,
        (_: string, property: string, value: string) =>
            `overscroll-behavior-${property}: ${value};`,
    ],
    [
        /overscroll-([a-z]+)/g,
        (_: string, value: string) => `overscroll-behavior: ${value};`,
    ],
    [
        /min-(w|h)-([a-z]+)/g,
        (_: string, property: string, value: string) =>
            `min-${property === 'w' ? 'width' : 'height'}: ${value};`,
    ],
    [
        /max-(w|h)-([a-z]+)/g,
        (_: string, property: string, value: string) =>
            `max-${property === 'w' ? 'width' : 'height'}: ${value};`,
    ],
    [
        /^(w|h)-([a-z]+)/g,
        (_: string, property: string, value: string) =>
            `${property === 'w' ? 'width' : 'height'}: ${value};`,
    ],
];
function replacer(str: string, patterns: Patterns = kPatterns): string {
    for (const [pattern, replacer] of patterns)
        if (pattern.test(str) && str.match(pattern)?.[0] === str) {
            if (typeof replacer === 'function' && replacer(str) === str) continue;
            return str.replace(pattern, replacer as ReplacerFn);
        }
    // throw new Error(`Unknown pattern: ${str}`);
    return str;
}
type Pass = (strings: string[]) => string[];
const colorPass: Pass = (strings: string[]) =>
    strings
        .map((str) => {
            const kPattern =
                /(.+?)-((?:slate|gray|zinc|neutral|stone|red|orange|amber|yellow|lime|green|emerald|teal|cyan|sky|blue|indigo|violet|purple|fuchsia|pink|rose|aliceblue|antiquewhite|aqua|aquamarine|azure|beige|bisque|black|blanchedalmond|blueviolet|brown|burlywood|cadetblue|chartreuse|chocolate|coral|cornflowerblue|cornsilk|crimson|darkblue|darkcyan|darkgoldenrod|darkgray|darkgreen|darkgrey|darkkhaki|darkmagenta|darkolivegreen|darkorange|darkorchid|darkred|darksalmon|darkseagreen|darkslateblue|darkslategray|darkslategrey|darkturquoise|darkviolet|deeppink|deepskyblue|dimgray|dimgrey|dodgerblue|firebrick|floralwhite|forestgreen|gainsboro|ghostwhite|gold|goldenrod|greenyellow|grey|honeydew|hotpink|indianred|ivory|khaki|lavender|lavenderblush|lawngreen|lemonchiffon|lightblue|lightcoral|lightcyan|lightgoldenrodyellow|lightgray|lightgreen|lightgrey|lightpink|lightsalmon|lightseagreen|lightskyblue|lightslategray|lightslategrey|lightsteelblue|lightyellow|limegreen|linen|magenta|maroon|mediumaquamarine|mediumblue|mediumorchid|mediumpurple|mediumseagreen|mediumslateblue|mediumspringgreen|mediumturquoise|mediumvioletred|midnightblue|mintcream|mistyrose|moccasin|navajowhite|navy|oldlace|olive|olivedrab|orangered|orchid|palegoldenrod|palegreen|paleturquoise|palevioletred|papayawhip|peachpuff|peru|plum|powderblue|rebeccapurple|rosybrown|royalblue|saddlebrown|salmon|sandybrown|seagreen|seashell|sienna|silver|skyblue|slateblue|slategray|slategrey|snow|springgreen|steelblue|tan|thistle|tomato|turquoise|wheat|white|whitesmoke|yellowgreen|inherit|current|transparent)(?:-\d+)?)/g;
            const prefix = (p: string, v: string) => {
                // prettier-ignore
                switch (p) {
                    case "border-t": return `border-top-color: ${v};`;
                    case "border-r": return `border-right-color: ${v};`;
                    case "border-b": return `border-bottom-color: ${v};`;
                    case "border-l": return `border-left-color: ${v};`;
                    case "border-s": return `border-inline-start-color: ${v};`;
                    case "border-e": return `border-inline-end-color: ${v};`;
                    case "border-x": return `border-left-color: ${v}; border-right-color: ${v};`;
                    case "border-y": return `border-top-color: ${v}; border-bottom-color: ${v};`;
                    case "border": return `border-color: ${v};`;
                    case "text": return `color: ${v};`;
                    case "bg": return `background-color: ${v};`;
                    case "ring": return `ring-color: ${v};`;
                    case "ring-inset": return `ring-inset-color: ${v};`;
                    case "ring-offset": return `ring-offset-color: ${v};`;
                    case "ring-offset-inset": return `ring-offset-inset-color: ${v};`;
                    default: return `${p}: ${v};`;
                }
            };

            return kPattern.test(str) && str.match(kPattern)?.[0] === str
                ? str.replace(kPattern, (_: string, p: string, v: string) =>
                    prefix(p, color(v))
                )
                : str;
        })
    ;
const passes: Pass[] = [
    colorPass,
    (strings: string[]) => strings.map((str) => replacer(str)),
];
/**
 * Replaces CSS patterns in strings using regular expressions and predefined patterns.
 * @param {string[] | string} entry - The CSS string or an array of CSS strings to be processed.
 * @param {Patterns} patterns - Optional. Custom replacement patterns. Default is predefined patterns.
 * @returns {string} The processed CSS string.
 * @example
 *```typescript
 *console.log(
 *  `div { ${marco(
 *    'transition-colors',
 *    'transition-none',
 *    'blur-md',
 *    'drop-shadow-xl',
 *  )} }`
 *);
 *```
 *Will generate the following CSS string:
 *
 *```css
 *div {
 *  transition-property: color, background-color, border-color,
 *    text-decoration-color, fill, stroke;
 *  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
 *  transition-duration: 150ms;
 *  transition-property: none;
 *  filter: blur(12px);
 *  filter: drop-shadow(0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(
 *      0 8px 5px rgb(0 0 0 / 0.08)
 *    );
 *}
 *```
 */
export function replace(...entries: string[]): string {
    return passes.reduce((acc, pass) => pass(acc), entries).join('');
}

