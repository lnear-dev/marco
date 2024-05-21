
export type CSSResultGroup = any;
export type MediaQueryAlias =
    | 'min'
    | 'max'
    | 'minWidth'
    | 'maxWidth'
    | 'minimumWidth'
    | 'maximumWidth'
    | 'aspectRatio'
    | 'deviceHeight'
    | 'deviceWidth'
    | 'minResolution'
    | 'maxResolution'
    | 'deviceAspectRatio'
    | 'minDeviceHeight'
    | 'maxDeviceHeight'
    | 'minDeviceWidth'
    | 'maxDeviceWidth'
    | 'minDeviceAspectRatio'
    | 'maxDeviceAspectRatio'
    | 'orientation'
    | 'prefersColorScheme';

export type KnownMediaQuery =
    | 'aspect-ratio'
    | 'device-height'
    | 'device-width'
    | 'min-resolution'
    | 'max-resolution'
    | 'device-aspect-ratio'
    | 'min-device-height'
    | 'max-device-height'
    | 'min-device-width'
    | 'max-device-width'
    | 'min-device-aspect-ratio'
    | 'max-device-aspect-ratio'
    | 'orientation'
    | 'min-width'
    | 'max-width'
    | 'prefers-color-scheme';

export const mediaQueryMap: {
    [key in MediaQueryAlias | KnownMediaQuery]: KnownMediaQuery;
} = {
    'min': 'min-width',
    'max': 'max-width',
    'minWidth': 'min-width',
    'maxWidth': 'max-width',
    'minimumWidth': 'min-width',
    'maximumWidth': 'max-width',
    'aspectRatio': 'aspect-ratio',
    'deviceHeight': 'device-height',
    'deviceWidth': 'device-width',
    'minResolution': 'min-resolution',
    'maxResolution': 'max-resolution',
    'deviceAspectRatio': 'device-aspect-ratio',
    'minDeviceHeight': 'min-device-height',
    'maxDeviceHeight': 'max-device-height',
    'minDeviceWidth': 'min-device-width',
    'maxDeviceWidth': 'max-device-width',
    'minDeviceAspectRatio': 'min-device-aspect-ratio',
    'maxDeviceAspectRatio': 'max-device-aspect-ratio',
    'orientation': 'orientation',
    'prefersColorScheme': 'prefers-color-scheme',
    'prefers-color-scheme': 'prefers-color-scheme',
    'aspect-ratio': 'aspect-ratio',
    'device-height': 'device-height',
    'device-width': 'device-width',
    'min-resolution': 'min-resolution',
    'max-resolution': 'max-resolution',
    'device-aspect-ratio': 'device-aspect-ratio',
    'min-device-height': 'min-device-height',
    'max-device-height': 'max-device-height',
    'min-device-width': 'min-device-width',
    'max-device-width': 'max-device-width',
    'min-device-aspect-ratio': 'min-device-aspect-ratio',
    'max-device-aspect-ratio': 'max-device-aspect-ratio',
    'min-width': 'min-width',
    'max-width': 'max-width',
};
export type KnownBreakpoint =
    | 'sm'
    | 'md'
    | 'lg'
    | 'xl'
    | '2xl'
    | 'dark'
    | 'light';
export const isMediaQueryAlias = (value: string): value is MediaQueryAlias => {
    return value in mediaQueryMap;
};
export const isKnownBreakpoint = (value: string): value is KnownBreakpoint => {
    return value in defaultScreenOptions;
}
export const generateMediaQuery = (option: MediaQueryAlias, value: string) => {
    return `${mediaQueryMap[option]}: ${value}`;
};

export type CSSPart = string;
export type CSSMacros = string;
export type ScreenBreakpoints = {
    [key in MediaQueryAlias | KnownMediaQuery]?: string;
};
export type Screens = {
    [key in KnownBreakpoint]: ScreenBreakpoints;
};

export type KnownBreakpointOptions<T> = {
    [key in KnownBreakpoint]?: T;
};

export interface CSSBreakpointOptions
    extends KnownBreakpointOptions<CSSResultGroup> {
    screens: Screens;
    stylesheet?: CSSResultGroup;
    macros?: CSSMacros;
    screenSizeAt(knownBreakpoint: KnownBreakpoint): string;
    screenSizeAt(knownBreakpoint: KnownBreakpoint, alias: MediaQueryAlias): string;
    screenSizeAt(knownBreakpoint: KnownBreakpoint, alias?: MediaQueryAlias): string;
    resolveMacros(): string;
}
export function screenSizeAt(
    this: CSSBreakpointOptions,
    knownBreakpoint: KnownBreakpoint,
    alias?: MediaQueryAlias
): string {
    return this.screens[knownBreakpoint][alias || 'min'] || '';
}

export function resolveMacros(this: CSSBreakpointOptions): string {
    return "not implemented";
}

export function walkScreens(
    screens: Screens,
    callback: (breakpoint: KnownBreakpoint, options: ScreenBreakpoints) => void
): void {
    Object.keys(screens).forEach((breakpoint) => {
        callback(breakpoint as KnownBreakpoint, screens[breakpoint as KnownBreakpoint]);
    });
}

export const defaultScreenOptions: Screens = {
    'sm': { min: '640px' },
    'md': { min: '768px' },
    'lg': { min: '1024px' },
    'xl': { min: '1280px' },
    '2xl': { min: '1536px' },
    'dark': { prefersColorScheme: 'dark' },
    'light': { prefersColorScheme: 'light' },
};
export const defaultBreakpointOptions: CSSBreakpointOptions = {
    screens: defaultScreenOptions,
    screenSizeAt,
    resolveMacros,
};

