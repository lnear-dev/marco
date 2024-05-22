<?php
/**
 * This file is part of a Lnear project.
 *
 * (c) 2024 Lanre Ajao(lnear)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.

* .........<-..(`-')_..(`-').._(`-').._....(`-').
* ...<-.......\(.OO).).(.OO).-/(OO.).-/.<-.(OO.).
* .,--..)..,--./.,--/.(,------./.,---...,------,)
* .|..(`-')|...\.|..|..|...---'|.\./`.\.|.../`..'
* .|..|OO.)|....'|..|)(|..'--..'-'|_.'.||..|_.'.|
* (|..'__.||..|\....|..|...--'(|...-...||.......'
* .|.....|'|..|.\...|..|..`---.|..|.|..||..|\..\.
* .`-----'.`--'..`--'..`------'`--'.`--'`--'.'--'
*/



use Lame\Marco\Marco;

describe("Marco", function () {
    test("loads", function () {
        expect(class_exists('Lame\Marco\Marco'))->toBeTrue();
    });
    test("generate", function () {
        expect(
            Marco::generate(
                sm: 'div { color: red; }',
                md: 'div { color: green; }',
                lg: 'div { color: blue; }',
                xl: 'div { color: yellow; }',
                xl2: 'div { color: pink; }',
                dark: 'div { color: black; }',
                light: 'div { color: white; }',
                macros: 'sm:md:lg:xl:xl2:dark:bg-red-500',
            ),
        )->toBe(
                implode("", [
                    ':host { ',
                    '@media (min-width: 640px) { background-color: rgb(239 68 68); }',
                    '@media (min-width: 768px) { background-color: rgb(239 68 68); }',
                    '@media (min-width: 1024px) { background-color: rgb(239 68 68); }',
                    '@media (min-width: 1280px) { background-color: rgb(239 68 68); }',
                    '@media (min-width: 1536px) { background-color: rgb(239 68 68); }',
                    '@media (prefers-color-scheme: dark) { background-color: rgb(239 68 68); }',
                    ' }',
                    '@media (min-width: 640px) { div { color: red; } }',
                    '@media (min-width: 768px) { div { color: green; } }',
                    '@media (min-width: 1024px) { div { color: blue; } }',
                    '@media (min-width: 1280px) { div { color: yellow; } }',
                    '@media (min-width: 1536px) { div { color: pink; } }',
                    '@media (prefers-color-scheme: dark) { div { color: black; } }',
                    '@media (prefers-color-scheme: light) { div { color: white; } }',
                ]),
            );
    });

    test("macro", function () {
        expect(Marco::macro('sm:md:lg:xl:xl2:dark:bg-red-500'))->toBe(implode("", [
            '@media (min-width: 640px) { background-color: rgb(239 68 68); }',
            '@media (min-width: 768px) { background-color: rgb(239 68 68); }',
            '@media (min-width: 1024px) { background-color: rgb(239 68 68); }',
            '@media (min-width: 1280px) { background-color: rgb(239 68 68); }',
            '@media (min-width: 1536px) { background-color: rgb(239 68 68); }',
            '@media (prefers-color-scheme: dark) { background-color: rgb(239 68 68); }',
        ]));
    });
});