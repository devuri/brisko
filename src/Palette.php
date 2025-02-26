<?php

namespace Brisko;

use InvalidArgumentException;

class Palette
{
    /**
     * Generate a Palette-style colors based on a base hex color.
     *
     * @param string $colorName The name of the color.
     * @param string $baseHex   The base hex color (e.g., #04e200).
     *
     * @throws InvalidArgumentException If an invalid hex color is provided.
     *
     * @return array The generated color palette.
     */
    public static function generate(string $baseHex, string $colorName): array
    {
        $baseHex = self::sanitizeHex($baseHex);

        [$r, $g, $b] = self::hexToRgb($baseHex);

        $shades = [
            50  => 0.05,
            100 => 0.1,
            200 => 0.2,
            300 => 0.3,
            400 => 0.4,
            500 => 0.5,
            600 => 0.6,
            700 => 0.7,
            800 => 0.8,
            900 => 0.9,
            950 => 0.95,
        ];

        $palette = [];

        foreach ($shades as $shade => $factor) {
            $palette[$shade] = self::rgbToHex(
                self::adjustColorComponent($r, $factor),
                self::adjustColorComponent($g, $factor),
                self::adjustColorComponent($b, $factor)
            );
        }

        return [$colorName => $palette];
    }

    /**
     * Sanitize and normalize a hex color code.
     *
     * @param string $hex The input hex color.
     *
     * @throws InvalidArgumentException If the hex format is invalid.
     *
     * @return string The sanitized 6-character hex code.
     */
    private static function sanitizeHex(string $hex): string
    {
        $hex = ltrim($hex, '#');

        // Convert 3-character hex to 6-character hex
        if (3 === \strlen($hex)) {
            $hex = preg_replace('/(.)/', '$1$1', $hex);
        }

        if ( ! preg_match('/^[a-fA-F0-9]{6}$/', $hex)) {
            throw new InvalidArgumentException('Invalid hex color format.');
        }

        return strtolower($hex);
    }

    /**
     * Convert a hex color to an RGB array.
     *
     * @param string $hex The hex color.
     *
     * @return array An array containing RGB values.
     */
    private static function hexToRgb(string $hex): array
    {
        return sscanf($hex, "%02x%02x%02x");
    }

    /**
     * Convert RGB values to a hex color string.
     *
     * @param int $r Red component (0-255).
     * @param int $g Green component (0-255).
     * @param int $b Blue component (0-255).
     *
     * @return string The hex color.
     */
    private static function rgbToHex(int $r, int $g, int $b): string
    {
        return \sprintf("#%02x%02x%02x", $r, $g, $b);
    }

    /**
     * Adjust an RGB color component based on a lightness factor.
     *
     * @param int   $component The original color component (0-255).
     * @param float $factor    The lightness factor (0.0 - 1.0).
     *
     * @return int The adjusted color component.
     */
    private static function adjustColorComponent(int $component, float $factor): int
    {
        return max(0, min(255, round($component * $factor + (255 * (1 - $factor)))));
    }
}

// Example usage:
// $palette = Palette::generate('#04e200', 'deep-fir');
// print_r($palette);
