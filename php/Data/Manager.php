<?php

namespace Lame\Marco\Data;

final readonly class Manager
{
    private function __construct()
    {
    }

    const kColorsDir    = __DIR__ . '/colors';
    const kPatternsDir  = __DIR__ . '/patterns';
    const kModifiersDir = __DIR__ . '/modifiers';
    public static function colors(string $file): array
    {
        return json_decode(file_get_contents(self::kColorsDir . '/' . $file), true);
    }
    public static function patterns(): array
    {
        return json_decode(file_get_contents(self::kPatternsDir . '/simple.json'), true);
    }
    public static function modifiers(): array
    {
        return json_decode(file_get_contents(self::kModifiersDir . '/simple.json'), true);
    }
    public static function expectedColors(): array// for testing
    {
        return json_decode(file_get_contents(self::kColorsDir . '/expect.json'), true);
    }
    public static function expectedPatterns(): array// for testing
    {
        return json_decode(file_get_contents(self::kPatternsDir . '/expect.json'), true);
    }

    public static function BaseColors(): array
    {
        return self::colors('base.json');
    }

    public static function RGBColors(): array
    {
        return self::colors('rgb.json');
    }

    public static function Shades(): array
    {
        return self::colors('shades.json');
    }

    public static function getPatterns(): array
    {
        return self::patterns();
    }

    public static function getModifiers(): array
    {
        return self::modifiers();
    }

}