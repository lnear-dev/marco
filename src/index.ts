import { CSSBreakpointOptions, KnownBreakpoint, MediaQueryAlias, mediaQueryMap } from './screens';
import { optimizeCss } from './css-optimize';
export { CSSBreakpointOptionsImplementer } from './CSSBreakpointOptionsImplementer';
export * from './screens';
export * from './colors';
export * from './patterns';

export const generateCSSImpl = (options: CSSBreakpointOptions): string => {
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


export const generateCSS = (options: CSSBreakpointOptions) =>
    generateCSSImpl(options);
export const generateOptimizedCSS = (options: CSSBreakpointOptions) =>
    optimizeCss(generateCSSImpl(options));
