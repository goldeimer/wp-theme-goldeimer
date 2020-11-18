<?php

namespace Goldeimer\WordPress\WpTheme;

use Goldeimer\WordPress\WpUtil\WebpackAssetLoader;

$loader = new WebpackAssetLoader(
    \get_stylesheet_directory_uri(),
    GOLDEIMER_THEME_ABSPATH
);

$loader->register();
$loader->enqueue();
