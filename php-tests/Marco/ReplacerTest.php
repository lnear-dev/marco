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


use Lame\Marco\Data\Manager as DataMan;
use Lame\Marco\Replacer;

describe("replacer", function () {
    $replacer = new Replacer();
    foreach (DataMan::expectedPatterns() as $pattern => $expected) {
        test("replaces `{$pattern}` with `{$expected}`", fn() => expect($replacer->replace($pattern))->toBe($expected));
    }
});

