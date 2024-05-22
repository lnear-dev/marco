import { test, expect } from 'vitest';
import expectations from '../../php/Data/colors/expect.json';
import { color } from './';
test.each(Object.entries(expectations))('should replace %s with %s',
    (key, value) => {
        expect(color(key)).toBe(value);
    })