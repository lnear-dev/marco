<?php

namespace Lame\Marco;

class Screens
{
    private static $mediaQueryMap = [
        'min'                     => 'min-width',
        'max'                     => 'max-width',
        'minWidth'                => 'min-width',
        'maxWidth'                => 'max-width',
        'minimumWidth'            => 'min-width',
        'maximumWidth'            => 'max-width',
        'aspectRatio'             => 'aspect-ratio',
        'deviceHeight'            => 'device-height',
        'deviceWidth'             => 'device-width',
        'minResolution'           => 'min-resolution',
        'maxResolution'           => 'max-resolution',
        'deviceAspectRatio'       => 'device-aspect-ratio',
        'minDeviceHeight'         => 'min-device-height',
        'maxDeviceHeight'         => 'max-device-height',
        'minDeviceWidth'          => 'min-device-width',
        'maxDeviceWidth'          => 'max-device-width',
        'minDeviceAspectRatio'    => 'min-device-aspect-ratio',
        'maxDeviceAspectRatio'    => 'max-device-aspect-ratio',
        'orientation'             => 'orientation',
        'prefersColorScheme'      => 'prefers-color-scheme',
        'prefers-color-scheme'    => 'prefers-color-scheme',
        'aspect-ratio'            => 'aspect-ratio',
        'device-height'           => 'device-height',
        'device-width'            => 'device-width',
        'min-resolution'          => 'min-resolution',
        'max-resolution'          => 'max-resolution',
        'device-aspect-ratio'     => 'device-aspect-ratio',
        'min-device-height'       => 'min-device-height',
        'max-device-height'       => 'max-device-height',
        'min-device-width'        => 'min-device-width',
        'max-device-width'        => 'max-device-width',
        'min-device-aspect-ratio' => 'min-device-aspect-ratio',
        'max-device-aspect-ratio' => 'max-device-aspect-ratio',
        'min-width'               => 'min-width',
        'max-width'               => 'max-width',
    ];

    private static $defaultScreenOptions = [
        'sm'    => ['min' => '640px'],
        'md'    => ['min' => '768px'],
        'lg'    => ['min' => '1024px'],
        'xl'    => ['min' => '1280px'],
        'xl2'   => ['min' => '1536px'],
        'dark'  => ['prefersColorScheme' => 'dark'],
        'light' => ['prefersColorScheme' => 'light'],
    ];

    private array $screens;

    public function getScreenOptions()
    {
        return $this->screens;
    }

    public function __construct(?array $screens = null)
    {
        $this->screens = $screens ?? self::$defaultScreenOptions;
    }

    public static function isMediaQueryAlias($value)
    {
        return array_key_exists($value, self::$mediaQueryMap);
    }
    public static function generateMediaQuery($option, $value)
    {
        return isset(self::$mediaQueryMap[$option]) ? self::$mediaQueryMap[$option] . ": $value" : '';
    }

    public function isKnownBreakpoint($value)
    {
        return in_array($value, ['sm', 'md', 'lg', 'xl', 'xl2']);
    }

    public function walkScreens($callback)
    {
        foreach ($this->screens as $breakpoint => $options) {
            $callback($breakpoint, $options);
        }
    }

    public function screenSizeAt($knownBreakpoint, $alias = 'min')
    {
        return $this->screens[$knownBreakpoint][$alias] ?? throw new \Exception("Unknown breakpoint: $knownBreakpoint");
    }
}