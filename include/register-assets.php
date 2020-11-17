<?php

namespace Goldeimer\WordPress\WpTheme;

use Goldeimer\WordPress\WpUtil\WebpackAssetLoader;

$loader = new WebpackAssetLoader(GOLDEIMER_THEME_ABSPATH);
$loader->register();
