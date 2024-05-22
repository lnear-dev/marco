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



namespace Lame\Marco\Color;

use Lame\Marco\Data\Manager as DataMan;

class Manager
{
    private array $base;
    private array $rgb;
    private array $shades;

    public function __construct(
    ) {
        $this->base   = DataMan::BaseColors();
        $this->rgb    = DataMan::RGBColors();
        $this->shades = DataMan::Shades();
    }

    public function isBaseColor(string $color): bool
    {
        return array_key_exists($color, $this->base);
    }

    public function isRGBColor(string $color): bool
    {
        return array_key_exists($color, $this->rgb);
    }

    public function isShadyColor(string $color): bool
    {
        [$base, $shade] = explode('-', $color);
        return isset($this->shades[$base]) && $shade % 50 === 0;
    }

    public function color(string $color): string
    {
        if ($this->isBaseColor($color))
            return $this->base[$color];
        if ($this->isRGBColor($color))
            return $this->colorRGB($color);
        if ($this->isShadyColor($color))
            return $this->shadyColor($color);
        throw new UnknownColorException($color);
    }

    private function colorRGB(string $color): string
    {
        if (!isset($this->rgb[$color]))
            throw new UnknownColorException($color);

        [$r, $g, $b] = $this->rgb[$color];
        return "rgb($r $g $b)";
    }

    private function shadyColor(string $color): string
    {
        [$base, $shade_] = explode('-', $color);
        $shade           = (int) $shade_;
        if ($shade % 50 !== 0)
            throw new \InvalidArgumentException("Invalid shade: $shade");

        if (!isset($this->shades[$base]))
            throw new UnknownColorException($base);

        if ($shade < 50 || $shade > 950)
            throw new UnknownShadeException($shade);

        $shadeIndex  = $shade === 50 ? 0 : ($shade === 950 ? 10 : ($shade / 100));
        [$r, $g, $b] = $this->shades[$base][$shadeIndex];
        return "rgb($r $g $b)";
    }
}
