<?php

namespace Goldeimer\WordPress\WpTheme;

if (! defined('GOLDEIMER_THEME_ABSPATH')) {
    define(
        'GOLDEIMER_THEME_ABSPATH',
        get_stylesheet_directory()
    );
}

require_once GOLDEIMER_THEME_ABSPATH . '/include/filter-p-bank.php';
require_once GOLDEIMER_THEME_ABSPATH . '/include/register-assets.php';
require_once GOLDEIMER_THEME_ABSPATH . '/shortcode/shortcode-iframe-embed.php';
