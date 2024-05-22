<?php

namespace Lame\Marco;

final readonly class Marco
{
    /**
     * Private constructor to prevent instantiation of this class.
     */
    private function __construct() {}
    /**
     * Generates a CSS stylesheet with breakpoints.
     * <code>
     * <?php
     * use Lame\Marco\Marco;
     *$cssOptions = Marco::generate(
     *  stylesheet: 'body { margin: 0; }',
     *  sm: '.container { max-width: 100%; }',
     *  md: '.container { max-width: 75%; }'
     *);
     * ?>  
     * </code>
     * @param string $macros The macros to be transformed.
     * @param string $stylesheet The base stylesheet that will be pasted word for word into the generated CSS.
     * @param string $sm The small screen size.
     * @param string $md The medium screen size.
     * @param string $lg The large screen size.
     * @param string $xl The extra large screen size.
     * @param string $dark The dark color scheme.
     * @param string $light The light color scheme.
     * @param string $xl2 The extra extra large screen size.
     * @param array $screens The screen sizes and color schemes.
     * @return string The generated CSS breakpoints.
     */
    public static function generate(
        string $macros = "",
        string $stylesheet = "",
        string $sm = "",
        string $md = "",
        string $lg = "",
        string $xl = "",
        string $dark = "",
        string $light = "",
        string $xl2 = "",
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
        return (
            new CSSBreakpointsOptions(
                stylesheet: $stylesheet,
                sm: $sm,
                md: $md,
                lg: $lg,
                xl: $xl,
                dark: $dark,
                light: $light,
                xl2: $xl2,
                macros: $macros,
                screens: $screens,
            )
        )->generate();

    }
    /**
     * Gets the screen size at a known breakpoint.
     *
     * @param string $knownBreakpoint The known breakpoint.
     * @param string $alias The alias for the breakpoint.
     * @return string The screen size at the known breakpoint.
     */
    public static function screenSizeAt(string $knownBreakpoint, string $alias = "min"): string
    {
        return (
            new CSSBreakpointsOptions()
        )->screenSizeAt($knownBreakpoint, $alias);
    }
    /**
     * Resolves the provided macro.
     *
     * @param string $macro The macro to be resolved.
     * @return string The resolved macro.
     */
    public static function macro(string $macro = ""): string
    {
        return (
            new CSSBreakpointsOptions(
                macros: $macro,
            )
        )->resolveMacros();
    }
    /**
     * Gets the screen options.
     *
     * @return array The screen options.
     */

    public static function screens(): array
    {
        return (
            new Screens()
        )->getScreenOptions();
    }
}