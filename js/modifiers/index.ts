import simpleModifiers from '../../php/Data/modifiers/simple.json';
export { simpleModifiers };
export { PrefixMap } from './PrefixMap';
export type KnownModifier = keyof typeof simpleModifiers;
export type Modifier = KnownModifier | string;
export class UnknownModifier extends Error {
    constructor(modifier: string) {
        super(`Unknown modifier: ${modifier}`);
    }
}


