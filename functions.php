<?php

namespace Goldeimer\WordPress\WpTheme;

use Goldeimer\PhpUtil\Traits\Singleton;

/// TODO(Johannes):
/// Deprecate the below unencapsulated requires
/// and incorporate that functionality into the WpTheme class.

if (! defined('GOLDEIMER_THEME_ABSPATH')) {
    define(
        'GOLDEIMER_THEME_ABSPATH',
        get_stylesheet_directory()
    );
}

require_once GOLDEIMER_THEME_ABSPATH . '/include/filter-p-bank.php';
require_once GOLDEIMER_THEME_ABSPATH . '/include/register-assets.php';
require_once GOLDEIMER_THEME_ABSPATH . '/shortcode/shortcode-iframe-embed.php';

final class WpTheme
{
    use Singleton;

    final public function __construct()
    {
        WpCustomizeHeaderFlag::getInstance();
    }
}

WpTheme::getInstance();
