<?php

namespace Lame\Marco;

use Lame\Marco\Color\Manager as ColorManager;

final class Replacer
{
    const blurValues = [
        "-none"   => "0",
        "-sm"     => "4px",
        "-md"     => "12px",
        "-lg"     => "16px",
        "-xl"     => "24px",
        "-xl2"    => "40px",
        "-2xl"    => "40px",
        "-xl3"    => "64px",
        "-3xl"    => "64px",
        "default" => "8px",
    ];

    const shadowValues = [
        "none" => "0 0 #0000",
        "sm"   => "0 1px 1px rgb(0 0 0 / 0.05)",
        "md"   => "0 4px 3px rgb(0 0 0 / 0.07)) drop-shadow(0 2px 2px rgb(0 0 0 / 0.06)",
        "lg"   => "0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1)",
        "xl"   => "0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(0 8px 5px rgb(0 0 0 / 0.08)",
        "xl2"  => "0 25px 25px rgb(0 0 0 / 0.15)",
    ];

    const easeValues = [
        "in-out"  => "cubic-bezier(0.4, 0, 0.2, 1)",
        "in"      => "cubic-bezier(0.4, 0, 1, 1)",
        "out"     => "cubic-bezier(0, 0, 0.2, 1)",
        "default" => "linear",
    ];

    private array $patterns = [];
    private array $passes = [];
    public function __construct()
    {
        $patterns             = Data\Manager::patterns();
        $this->patterns = array_merge(
            array_map(
                fn($pattern, $replacer) => ["/^{$pattern}/", $replacer],
                array_keys($patterns),
                $patterns,
            ),
            [
                ["/backdrop-(brightness|contrast)-([0-9]+)/", fn($matches) => self::backdropFilter($matches[1], (int) $matches[2] / 100)],
                ["/backdrop-blur(-(?:none|sm|md|lg|xl3|xl2|xl|2xl|3xl))?/", fn($matches) => self::backdropFilter("blur", self::blurHelper($matches[1] ?? "default"))],
                ["/backdrop-(grayscale|invert|sepia)-([0-9]+)/", fn($matches) => self::backdropFilter($matches[1], (int) $matches[2] / 100)],
                ["/backdrop-(grayscale|invert|sepia)/", fn($matches) => self::backdropFilter($matches[1], "100%")],
                ["/backdrop-(brightness|contrast|saturate)-([0-9]+)/", fn($matches) => self::backdropFilter($matches[1], (int) $matches[2] / 100)],
                ["/blur(-(?:none|sm|md|lg|xl3|xl2|xl|2xl|3xl))?/", fn($matches) => self::filter("blur", self::blurHelper($matches[1] ?? "default"))],
                ["/^drop-shadow-(sm|md|lg|xl2|xl|none)/", fn($matches) => self::filter("drop-shadow", self::dropShadowHelper($matches[1]))],
                ["/^drop-shadow/", "filter: drop-shadow(0 1px 2px rgb(0 0 0 / 0.1)) drop-shadow(0 1px 1px rgb(0 0 0 / 0.06));"],
                ["/(grayscale|invert|sepia)-([0-9]+)/", fn($matches) => self::filter($matches[1], (int) $matches[2] / 100)],
                ["/(grayscale|invert|sepia)/", fn($matches) => self::filter($matches[1], "100%")],
                ["/(brightness|contrast|saturate)-([0-9]+)/", fn($matches) => self::filter($matches[1], (int) $matches[2] / 100)],
                ["/(?:ease|timing)-(linear|in-out|in|out)/", fn($matches) => self::easeHelper($matches[1])],
                ["/break-(before|inside|after)-([a-z]+)/", fn($matches) => "break-{$matches[1]}: {$matches[2]};"],
                ["/overflow-(x|y)-([a-z]+)/", fn($matches) => "overflow-{$matches[1]}: {$matches[2]};"],
                ["/overflow-([a-z]+)/", fn($matches) => "overflow: {$matches[1]};"],
                ["/overscroll-(x|y)-([a-z]+)/", fn($matches) => "overscroll-behavior-{$matches[1]}: {$matches[2]};"],
                ["/overscroll-([a-z]+)/", fn($matches) => "overscroll-behavior: {$matches[1]};"],
                ["/^(min|max)-(w|h)-([0-9]+(?:[.][0-9]+)?)/", fn($matches) => $matches[1]."-".self::decimalSize($matches[2], $matches[3])],
                ["/^(w|h)-([0-9]+(?:[.][0-9]+)?)/", fn($matches) => self::decimalSize($matches[1], $matches[2])],
                ["/^(w|h)-([0-9]+)\/([0-9]+)/", fn($matches) => self::fractionalSize($matches[1], $matches[2], $matches[3])],
                ["/^size-([0-9]+(?:[.][0-9]+)?)/", fn($matches) => self::decimalSize("w", $matches[1]) . " " . self::decimalSize("h", $matches[1])],
                ["/^size-([0-9]+)\/([0-9]+)/", fn($matches) => self::fractionalSize("w", $matches[1], $matches[2]) . " " . self::fractionalSize("h", $matches[1], $matches[2])],
            ]
        );
        $this->passes = [
            $this->colorPass(...),
            fn($strings) => array_map(fn($str) => $this->replacer($str), $strings),
        ];
    }

    private static function filter(string $property, string $value): string
    {
        return "filter: {$property}({$value});";
    }

    private static function backdropFilter(string $property, string $value): string
    {
        return "backdrop-filter: {$property}({$value});";
    }

    private static function blurHelper(string $screen): string
    {
        return self::blurValues[$screen] ?? self::blurValues["default"];
    }
    private static function dropShadowHelper(string $screen): string
    {
        return self::shadowValues[$screen] ?? $screen;
    }

    private static function easeHelper(string $opt): string
    {
        return "transition-timing-function: " . (self::easeValues[$opt] ?? self::easeValues["default"]) . ";";
    }

    private static function fractionalSize(string $property, string $value, string $value2): string
    {
        $out = round((float) $value / (float) $value2 * 100, 6);
        return ($property === 'w' ? 'width' : 'height') . ": {$out}%;";
    }

    private static function decimalSize(string $property, string $value): string
    {
        $value = ((float) $value / 4);
        return ($property === 'w' ? 'width' : 'height') . ": {$value}rem;";
    }

    public function replacer(string $str): string
    {
        foreach ($this->patterns as [$pattern, $replacer]) {
            if (preg_match($pattern, $str, $matches) && $matches[0] === $str) {
                if (is_callable($replacer)) {
                    if ($str === $replacer($matches)) continue;
                    return preg_replace_callback($pattern, $replacer, $str);
                }
                return preg_replace($pattern, $replacer, $str);
            }
        }
        return $str;
    }

    private static function colorPass(array $strings): array
    {
    $kPattern = "/(.+?)-((?:slate|gray|zinc|neutral|stone|red|orange|amber|yellow|lime|green|emerald|teal|cyan|sky|blue|indigo|violet|purple|fuchsia|pink|rose|aliceblue|antiquewhite|aqua|aquamarine|azure|beige|bisque|black|blanchedalmond|blueviolet|brown|burlywood|cadetblue|chartreuse|chocolate|coral|cornflowerblue|cornsilk|crimson|darkblue|darkcyan|darkgoldenrod|darkgray|darkgreen|darkgrey|darkkhaki|darkmagenta|darkolivegreen|darkorange|darkorchid|darkred|darksalmon|darkseagreen|darkslateblue|darkslategray|darkslategrey|darkturquoise|darkviolet|deeppink|deepskyblue|dimgray|dimgrey|dodgerblue|firebrick|floralwhite|forestgreen|gainsboro|ghostwhite|gold|goldenrod|greenyellow|grey|honeydew|hotpink|indianred|ivory|khaki|lavender|lavenderblush|lawngreen|lemonchiffon|lightblue|lightcoral|lightcyan|lightgoldenrodyellow|lightgray|lightgreen|lightgrey|lightpink|lightsalmon|lightseagreen|lightskyblue|lightslategray|lightslategrey|lightsteelblue|lightyellow|limegreen|linen|magenta|maroon|mediumaquamarine|mediumblue|mediumorchid|mediumpurple|mediumseagreen|mediumslateblue|mediumspringgreen|mediumturquoise|mediumvioletred|midnightblue|mintcream|mistyrose|moccasin|navajowhite|navy|oldlace|olive|olivedrab|orangered|orchid|palegoldenrod|palegreen|paleturquoise|palevioletred|papayawhip|peachpuff|peru|plum|powderblue|rebeccapurple|rosybrown|royalblue|saddlebrown|salmon|sandybrown|seagreen|seashell|sienna|silver|skyblue|slateblue|slategray|slategrey|snow|springgreen|steelblue|tan|thistle|tomato|turquoise|wheat|white|whitesmoke|yellowgreen|inherit|current|transparent)(?:-\d+)?)/";

    $prefix = function (string $p, string $v) {
        switch ($p) {
            case "border-t":
                return "border-top-color: {$v};";
            case "border-r":
                return "border-right-color: {$v};";
            case "border-b":
                return "border-bottom-color: {$v};";
            case "border-l":
                return "border-left-color: {$v};";
            case "border-s":
                return "border-inline-start-color: {$v};";
            case "border-e":
                return "border-inline-end-color: {$v};";
            case "border-x":
                return "border-left-color: {$v}; border-right-color: {$v};";
            case "border-y":
                return "border-top-color: {$v}; border-bottom-color: {$v};";
            case "border":
                return "border-color: {$v};";
            case "text":
                return "color: {$v};";
            case "bg":
                return "background-color: {$v};";
            case "ring":
                return "ring-color: {$v};";
            case "ring-inset":
                return "ring-inset-color: {$v};";
            case "ring-offset":
                return "ring-offset-color: {$v};";
            case "ring-offset-inset":
                return "ring-offset-inset-color: {$v};";
            default:
                return "{$p}: {$v};";
        }
    };

    return array_map(function (string $str) use ($kPattern, $prefix) {
        if (preg_match($kPattern, $str, $matches) && $matches[0] === $str) {
            return preg_replace_callback($kPattern, function ($matches) use ($prefix) {
                return $prefix($matches[1], (new ColorManager())->color($matches[2]));
            }, $str);
        }
        return $str;
    }, $strings);
    }

    public function replace(string ...$entries): string
    {
        return implode("", array_reduce($this->passes, fn($acc, $pass) => $pass($acc), $entries));
    }

    public function __invoke(string ...$entries): string
    {
        return $this->replace(...$entries);
    }

    

}