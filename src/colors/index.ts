import base from './base.json';
import rgb from './rgb.json';
import shades from './shades.json';
export { base, rgb, shades };
export type BaseColor = keyof typeof base;
export type RGBColor = keyof typeof rgb;
export type KnownShades = 50 | 100 | 200 | 300 | 400 | 500 | 600 | 700 | 800 | 900 | 950;
export type KnownShadeKeys = keyof typeof shades;
export type ShadyColor = `${KnownShadeKeys}-${KnownShades}`;
const isShadyColor = (color: string): color is ShadyColor => {
    const [base, shade] = color.split('-');
    return base in shades && parseInt(shade) % 50 === 0;
}
const isBaseColor = (color: string): color is BaseColor => color in base;
const isRGBColor = (color: string): color is RGBColor => color in rgb;
export type Color = BaseColor | RGBColor | ShadyColor;
class UnknownColor extends Error {
    constructor(color: string) {
        super(`Unknown color: ${color}`);
    }
}
class UnknownShade extends Error {
    constructor(shade: string) {
        super(`Unknown shade: ${shade}`);
    }
}
class UnknownBaseColor extends Error {
    constructor(base: string) {
        super(`Unknown base color: ${base}`);
    }
}


export const color = (color: string): string => {
    if (isBaseColor(color)) return base[color as BaseColor];
    if (isRGBColor(color)) return colorRGB(color as RGBColor);
    if (isShadyColor(color)) return shadyColor(color);
    throw new UnknownColor(color);
}
const shadyColor = (color: ShadyColor): string => {
    const [base, shade_] = color.split('-');
    const shade = parseInt(shade_);
    if (shade % 50 !== 0) throw new Error(`Invalid shade: ${shade}`);
    if (!shades[base as KnownShadeKeys]) throw new UnknownBaseColor(base);
    if (shade < 50 || shade > 950) throw new UnknownShade(shade_);
    const [r, g, b] = shades[base as KnownShadeKeys][shade === 50 ? 0 :
        shade === 950 ? 10 :
            (shade / 100)];
    return `rgb(${r} ${g} ${b})`;
}
export const colorRGB = (color: RGBColor): string => {
    if (!rgb[color]) throw new UnknownColor(color);
    const [r, g, b] = rgb[color];
    return `rgb(${r} ${g} ${b})`;
}



