<?php
use Lame\Marco\PrefixMap;

describe("PrefixMap", function () {
    test("loads", function () {
        expect(class_exists('Lame\Marco\PrefixMap'))->toBeTrue();
    });
    test("rootify", function () {
        $map = new PrefixMap();
        $map->rootify('root');
        expect($map->root())->toBe(['root']);
    });
    test("split", function () {
        $map = new PrefixMap(
            'key1',
            'sm:val1',
            'md:val2',
            'sm:md:val3',
        );
        expect($map->toObject())->toBe([
            '__root__' => ['key1'],
            'sm'       => ['val1', 'val3'],
            'md'       => ['val2', 'val3'],
        ]);
    });
    test("toObject", function () {
        $map = new PrefixMap();
        $map->add('key', 'value');
        $map->add('key', 'value2');
        expect($map->toObject())->toBe(['__root__' => [], 'key' => ['value', 'value2']]);
    });
    test("toJSONString", function () {
        $map = new PrefixMap();
        $map->add('key', 'value');
        $map->add('key', 'value2');
        expect($map->toJSONString())->toBe('{"__root__":[],"key":["value","value2"]}');
    });
    test("root works", function () {
        $map = new PrefixMap();
        $map->rootify('root');
        $map->add('key', 'value');
        $map->add('key', 'value2');
        expect($map->toObject())->toBe(['__root__' => ['root'], 'key' => ['value', 'value2']]);
    });
});