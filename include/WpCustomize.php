<?php

declare(strict_types=1);

namespace Goldeimer\WordPress\WpTheme;

abstract class WpCustomize
{
    protected const ID_PREFIX = 'goldeimer';

    public function __construct()
    {
        \add_action(
            'customize_register',
            [$this, 'settings']
        );
    }

    protected static function handle(string ...$parts): string
    {
        return implode(
            '_',
            array_merge(
                [self::ID_PREFIX],
                $parts
            )
        );
    }

    // callback for 'customize_register' WordPress hook,
    // adds settings via the WordPress Theme Customization API
    abstract public function settings(
        \WP_Customize_Manager $wp_customize
    ): void;
}
