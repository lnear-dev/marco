
export class PrefixMap extends Map<string, string[]> {
    public root: string[] = [];
    constructor(toSplit?: string[]) {
        super();
        this.set('__root__', this.root);
        if (toSplit) this.splitImpl(toSplit);
    }
    add(key: string, value: string) {
        if (!this.has(key)) return this.set(key, [value]);
        this.get(key)?.push(value);
        return this;
    }
    rootify(key: string) {
        this.root.push(key);
        return this;
    }
    split(toSplit: string[]): PrefixMap {
        this.splitImpl(toSplit);
        return this;
    }
    walk(callback: (key: string, value: string[]) => void) {
        for (const [key, value] of this) callback(key, value);
        return this;
    }

    toObject() {
        return Object.fromEntries(this);
    }
    toJSONString() {
        return JSON.stringify(this.toObject());
    }

    private splitImpl(toSplit: string[]): void {
        toSplit.map((str: string) => {
            const split = str.split(':');
            if (split.length === 1) this.rootify(split[0]);
            else if (split.length === 2) {
                this.add(split[0], split[1]);
            } else {
                const [key, value] = [split.shift(), split.pop()];
                this.add(key!, value!);
                for (const k of split) this.add(k, value!);
            }
        });
    }

    export() {
        const o: Record<string, string[]> = {};
        this.forEach((value, key) => (o[key] = value));
        return o;
    }
}
