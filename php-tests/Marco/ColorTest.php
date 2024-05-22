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


use Lame\Marco\Color\Manager as ColorMan;
use Lame\Marco\Data\Manager as DataMan;

describe("color", function () {
    test("loads", function () {
        expect(class_exists('Lame\Marco\Color\Manager'))->toBeTrue();
    });
    foreach (array_keys(DataMan::BaseColors()) as $color) {
        test("isBaseColor $color", function () use ($color) {
            expect((new ColorMan())->isBaseColor($color))->toBeTrue();
        });
    }
    foreach (array_keys(DataMan::RGBColors()) as $color) {
        test("isRGBColor $color", function () use ($color) {
            expect((new ColorMan())->isRGBColor($color))->toBeTrue();
        });
    }
    foreach (array_keys(DataMan::Shades()) as $color) {
        foreach ([50, 100, 200, 300, 400, 500, 600, 700, 800, 900, 950] as $shade) {
            test("isShadyColor {$color}-{$shade}", function () use ($color, $shade) {
                expect((new ColorMan())->isShadyColor("{$color}-{$shade}"))->toBeTrue();
            });
        }
    }
    foreach (DataMan::expectedColors() as $color => $expected) {
        test("Generates `{$expected}` for `{$color}`", function () use ($color, $expected) {
            expect((new ColorMan())->color($color))->toBe($expected);
        });
    }

});
