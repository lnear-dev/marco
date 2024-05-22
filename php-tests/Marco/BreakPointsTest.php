<?php
/**
 * This file is part of a Lnear project.
 *
 * (c) 2024 Lanre Ajao(lnear)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ..................
 * ..................
 * .__............__.
 * /\_\........../\_\
 * \/_/.._______.\/_/
 * ...../\______\....
 * .....\/______/....
 */

use Lame\Marco\CSSBreakpointsOptions;
use Lame\Marco\Screens;

const kScreens = [
    "sm"    => ["min" => "640px"],
    "md"    => ["min" => "768px"],
    "lg"    => ["min" => "1024px"],
    "xl"    => ["min" => "1280px"],
    "xl2"   => ["min" => "1536px"],
    "dark"  => ["prefersColorScheme" => "dark"],
    "light" => ["prefersColorScheme" => "light"],
];
describe("CSSBreakpointsOptions", function () {

    test("loads", function () {
        expect(class_exists(CSSBreakpointsOptions::class))->toBeTrue();
    });
    test("screenSizeAt", function () {
        $options = new CSSBreakpointsOptions(screens: kScreens);
        expect($options->screenSizeAt('sm'))->toBe('640px');
        expect($options->screenSizeAt('md'))->toBe('768px');
        expect($options->screenSizeAt('lg'))->toBe('1024px');
        expect($options->screenSizeAt('xl'))->toBe('1280px');
        expect($options->screenSizeAt('xl2'))->toBe('1536px');

    });
    it('can be instantiated', function () {
        expect(new CSSBreakpointsOptions(screens: kScreens))->toBeInstanceOf(CSSBreakpointsOptions::class);
    });

    it('returns screen size at known breakpoint', function () {
        expect((new CSSBreakpointsOptions(screens: kScreens))->screenSizeAt('sm'))->toBe('640px');
    });

    it('returns screen size at known breakpoint with alias', function () {
        expect((new CSSBreakpointsOptions(screens: [
            ...kScreens,
            'sm' => ['max' => '640px'],
        ]))->screenSizeAt('sm', 'max'))->toBe('640px');
    });

    it('throws exception for unknown breakpoint', function () {
        $options = new CSSBreakpointsOptions(screens: kScreens);
        expect(fn() => $options->screenSizeAt('unknown'))->toThrow(new Exception('Unknown breakpoint: unknown'));
        expect(fn() => $options->screenSizeAt('dark'))->toThrow(new Exception('Unknown breakpoint: dark'));
        expect(fn() => $options->screenSizeAt('light'))->toThrow(new Exception('Unknown breakpoint: light'));
    });


    it('resolves macros', function () {
        $options = new CSSBreakpointsOptions(
            macros: 'sm:md:lg:xl:xl2:dark:sr-only',
            screens: kScreens,
        );
        $sr      = "position: absolute;width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip: rect(0, 0, 0, 0);white-space: nowrap;border-width: 0;";
        expect($options->resolveMacros())->toBe(
            implode("", [
                "@media (min-width: 640px) { {$sr} }",
                "@media (min-width: 768px) { {$sr} }",
                "@media (min-width: 1024px) { {$sr} }",
                "@media (min-width: 1280px) { {$sr} }",
                "@media (min-width: 1536px) { {$sr} }",
                "@media (prefers-color-scheme: dark) { {$sr} }",
            ]),
        );
    });

    it('generates', function () {
        $options = new CSSBreakpointsOptions(
            sm: 'div { color: red; }',
            md: 'div { color: green; }',
            lg: 'div { color: blue; }',
            xl: 'div { color: yellow; }',
            xl2: 'div { color: pink; }',
            dark: 'div { color: black; }',
            light: 'div { color: white; }',
            macros: 'sm:md:lg:xl:xl2:dark:bg-red-500',
            screens: kScreens,
        );

        expect($options->generate())->toBe(
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
    it('respects host in stylesheet', function () {
        $options = new CSSBreakpointsOptions(
            sm: 'div { color: red; }',
            md: 'div { color: green; }',
            lg: 'div { color: blue; }',
            xl: 'div { color: yellow; }',
            xl2: 'div { color: pink; }',
            dark: 'div { color: black; }',
            light: 'div { color: white; }',
            macros: 'sm:md:lg:xl:xl2:dark:bg-red-500',
            stylesheet: ':host { display: block; }',
            screens: kScreens,
        );

        expect($options->generate())->toBe(
            implode("", [
                ':host { ',
                '@media (min-width: 640px) { background-color: rgb(239 68 68); }',
                '@media (min-width: 768px) { background-color: rgb(239 68 68); }',
                '@media (min-width: 1024px) { background-color: rgb(239 68 68); }',
                '@media (min-width: 1280px) { background-color: rgb(239 68 68); }',
                '@media (min-width: 1536px) { background-color: rgb(239 68 68); }',
                '@media (prefers-color-scheme: dark) { background-color: rgb(239 68 68); }',
                ' display: block;',
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

});