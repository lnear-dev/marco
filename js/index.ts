

/**
 * This file is part of a Lnear project.
 *
 * (c) 2024 Lanre Ajao(lnear)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * .........<-..(`-')_..(`-').._(`-').._....(`-').
 * ...<-.......\(.OO).).(.OO).-/(OO.).-/.<-.(OO.).
 * .,--..)..,--./.,--/.(,------./.,---...,------,)
 * .|..(`-')|...\.|..|..|...---'|.\./`.\.|.../`..'
 * .|..|OO.)|....'|..|)(|..'--..'-'|_.'.||..|_.'.|
 * (|..'__.||..|\....|..|...--'(|...-...||.......'
 * .|.....|'|..|.\...|..|..`---.|..|.|..||..|\..\.
 * .`-----'.`--'..`--'..`------'`--'.`--'`--'.'--'
 */

import { CSSBreakpointOptions, KnownBreakpoint, MediaQueryAlias, mediaQueryMap } from './screens';
export { CSSBreakpointOptionsImplementer } from './CSSBreakpointOptionsImplementer';
export * from './screens';
export * from './colors';
export * from './patterns';

export const generateCSS = (options: CSSBreakpointOptions): string => {
    let out = '';
    if (options.stylesheet) out += options.stylesheet?.toString();
    Object.keys(options.screens).forEach((breakpoint) => {
        let q = '';
        const screen = options.screens[breakpoint as KnownBreakpoint];
        if (screen) {
            Object.keys(screen).forEach((alias) => {
                const [query, value] = [
                    mediaQueryMap[alias as MediaQueryAlias],
                    screen[alias as MediaQueryAlias]
                ];
                if (value) q += `(${query}: ${value})`;
            });
        }
        const style = options[breakpoint as KnownBreakpoint] || '';
        if (style) out += `@media${q}{ ${style} }`;
    });
    if (options.macros) {
        const macros = options.resolveMacros();
        if (out.includes(':host')) {
            out = out.replace(/:host\s*\{/, `:host { ${macros}`);
        } else {
            out = `:host { ${macros} }` + out;
        }
    }
    return out;
};
