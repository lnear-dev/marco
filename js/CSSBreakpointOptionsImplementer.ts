import { replace } from "./patterns";
import { Modifier, simpleModifiers, KnownModifier, UnknownModifier, PrefixMap } from "./modifiers";
import { CSSBreakpointOptions, CSSResultGroup, Screens, CSSMacros, KnownBreakpoint, MediaQueryAlias, isKnownBreakpoint, ScreenBreakpoints } from "./screens";

export class CSSBreakpointOptionsImplementer
    implements CSSBreakpointOptions {
    public stylesheet?: CSSResultGroup;
    public sm?: CSSResultGroup;
    public md?: CSSResultGroup;
    public lg?: CSSResultGroup;
    public xl?: CSSResultGroup;
    public dark?: CSSResultGroup;
    public light?: CSSResultGroup;
    public xl2?: CSSResultGroup;
    public screens: Screens = {
        sm: { min: '640px' },
        md: { min: '768px' },
        lg: { min: '1024px' },
        xl: { min: '1280px' },
        xl2: { min: '1536px' },
        dark: { prefersColorScheme: 'dark' },
        light: { prefersColorScheme: 'light' },
    };
    public macros?: CSSMacros;
    constructor(
        options: Partial<CSSBreakpointOptions> = {} as CSSBreakpointOptions
    ) {
        this.stylesheet = options.stylesheet;
        this.sm = options.sm;
        this.md = options.md;
        this.lg = options.lg;
        this.xl = options.xl;
        this.xl2 = options.xl2;
        this.dark = options.dark;
        this.light = options.light;
        this.screens = options.screens || this.screens;
        this.macros = options.macros;
    }
    public screenSizeAt = (knownBreakpoint: KnownBreakpoint, alias?: MediaQueryAlias): string => this.screens[knownBreakpoint][alias || 'min'] || '';

    public resolveMacros = (): string => {
        const wrap = (modifier: Modifier, value: string) => {
            if (modifier in simpleModifiers)
                return `${simpleModifiers[modifier as KnownModifier]} { ${value} }`;
            if (isKnownBreakpoint(modifier))
                return `@media (min-width: ${this.screenSizeAt(modifier as KnownBreakpoint)}) { ${value} }`;
            // modifiers.forEach(([pattern, replacer]) => pattern.test(modifier) ? modifier.replace(pattern, replacer).replace(/\$/g, value) : null);
            switch (modifier) {
                case 'max-sm':
                case 'max-md':
                case 'max-lg':
                case 'max-xl':
                case 'max-xl2':
                    return `@media not all and (min-width: ${this.screenSizeAt(
                        modifier.slice(4) as KnownBreakpoint
                    )}) { ${value} }`;
                case 'min':
                case 'max':
                    return `@media (min-width: ${value}) { ${value} }`;
                case 'supports':
                    return `@supports (${value}) { ${value} }`;
                case 'aria':
                case 'data':
                    return `&[${modifier}-${value}]`;
                case '*':
                    return `& > * { ${value} }`;
            }
            throw new UnknownModifier(modifier);
        };
        return ((macro: string) => {
            const map = new PrefixMap(macro.split(' '));
            const o: string[] = [];
            map.walk((key, value) => {
                o.push(
                    key === '__root__' ? replace(...value) : wrap(key, replace(...value))
                );
            });
            return o.join(' ');
        })(this.macros || '');
    }

    walkScreens(callback: (breakpoint: KnownBreakpoint, options: ScreenBreakpoints) => void): void {
        Object.keys(this.screens).forEach((breakpoint) => {
            callback(breakpoint as KnownBreakpoint, this.screens[breakpoint as KnownBreakpoint]);
        });
    }
}
