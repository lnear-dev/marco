
export type ReplacerFn = (match: string, ...args: string[]) => string;
export type Replacer = string | ReplacerFn;
export type Pattern = [RegExp, Replacer];
export type Patterns = (readonly [RegExp, Replacer])[];