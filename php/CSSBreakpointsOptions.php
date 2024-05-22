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



namespace Lame\Marco;

class CSSBreakpointsOptions
{
    public Screens $screens;
    public function __construct(
        public string $stylesheet = "",
        public string $sm = "",
        public string $md = "",
        public string $lg = "",
        public string $xl = "",
        public string $dark = "",
        public string $light = "",
        public string $xl2 = "",
        public string $macros = "",
        array $screens = [
            "sm"    => ["min" => "640px"],
            "md"    => ["min" => "768px"],
            "lg"    => ["min" => "1024px"],
            "xl"    => ["min" => "1280px"],
            "xl2"   => ["min" => "1536px"],
            "dark"  => ["prefersColorScheme" => "dark"],
            "light" => ["prefersColorScheme" => "light"],
        ],
    ) {
        $this->screens = new Screens($screens);
    }

    public function screenSizeAt(string $knownBreakpoint, string $alias = "min"): string
    {
        return $this->screens->screenSizeAt($knownBreakpoint, $alias);
    }
    public function resolveMacros()
    {
        $simpleModifiers = Data\Manager::modifiers();
        $wrap            = fn($modifier, $value) => (
            array_key_exists($modifier, $simpleModifiers))
            ? "{$simpleModifiers[$modifier]} { $value }"
            : (
                $this->screens->isKnownBreakpoint($modifier)
                ? "@media (min-width: {$this->screenSizeAt($modifier)}) { $value }"
                : match ($modifier) {
                    'max-sm', 'max-md', 'max-lg', 'max-xl', 'max-xl2' => "@media not all and (min-width: {$this->screenSizeAt(substr($modifier, 4))}) { $value }",
                    'min', 'max'                                      => "@media (min-width: $value) { $value }",
                    'supports'                                        => "@supports ($value) { $value }",
                    'aria', 'data'                                    => "&[{$modifier}-{$value}]",
                    '*'                                               => "& > * { $value }",
                    default                                           => throw new \Exception("Unknown modifier: $modifier")
                });
        return (function ($macro) use ($wrap) {
            $map     = new PrefixMap(...explode(' ', $macro));
            $o       = [];
            $replace = new Replacer();
            foreach ($map as $key => $value) $o[] = $key === '__root__' ? $replace(...$value) : $wrap($key, $replace(...$value));
            return implode('', $o);
        })($this->macros);

    }

    public function generate()
    {
        $out = $this->stylesheet;
        foreach ($this->screens->getScreenOptions() as $breakpoint => $options) {
            $q = '';
            foreach ($options as $alias => $value) {
                if (Screens::isMediaQueryAlias($alias))
                    $q .= Screens::generateMediaQuery($alias, $value);
            }
            $style = $this->{$breakpoint} ?? "";
            if ($style !== "")
                $out .= "@media ({$q}) { {$style} }";
        }

        return ($this->macros === ""
            ? $out
            : (str_contains($out, ':host')
                ? preg_replace('/\s*:\s*host\s*\{/', ":host { " . $this->resolveMacros(), $out)
                : ":host { " . $this->resolveMacros() . " }" . $out));

    }
}