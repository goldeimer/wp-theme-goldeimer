<?php
/// @shortcode [goldeimer-iframe-embed]

namespace Goldeimer\WordPress\WpTheme;

function shortcodeIframeEmbed($attributes)
{
    $parsedAttributes = shortcode_atts(
        array(
            'src' => 'https://www.goldeimer.de/jtl',
        ),
        $attributes
    );

    return '<iframe src="'.$parsedAttributes['src'].'" />';
}

add_shortcode(
    'goldeimer-iframe-embed',
    'shortcodeIframeEmbed'
);
