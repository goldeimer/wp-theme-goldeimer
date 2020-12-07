<?php

declare(strict_types=1);

namespace Goldeimer\WordPress\WpTheme;

const TEXT_DOMAIN = 'goldeimer';

function __(string $text): string
{
    return \__($text, TEXT_DOMAIN);
}
