import { Features, transform } from 'lightningcss'
export function optimizeCss(
    input: string,
    { file = 'blitz-input.css', minify = true }: { file?: string; minify?: boolean } = {},
) {
    return transform({
        filename: file,
        code: Buffer.from(input),
        minify,
        sourceMap: false,
        drafts: {
            customMedia: true,
        },
        nonStandard: {
            deepSelectorCombinator: true,
        },
        include: Features.Nesting,
        targets: {
            safari: (16 << 16) | (4 << 8),
        },
        errorRecovery: true,
    }).code.toString()
}