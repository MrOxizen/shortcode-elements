<?php

if (!defined('ABSPATH'))
    exit;

function oxi_spacer_style_1_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $styleid = $styledata['id'];
    $style = explode('|', $styledata['css']);
    echo '<div class="oxi-addons-container">'
        . '<div class="oxi-addons-row">'
        . '<div class="oxi-spacer-' . $styleid . '">'
        . '</div>'
        . '</div>'
        . '</div>';

    $custom_css = '.oxi-spacer-' . $styleid . '{ width: 100%; float: left;  height: ' . $style[1] . 'px; position: relative; } '
            . '@media only screen and (min-width : 669px) and (max-device-width: 992px){ .oxi-spacer-' . $styleid . '{ height: ' . $style[2] . 'px; } } '
            . '@media only screen and (max-device-width: 768px){.oxi-spacer-' . $styleid . '{ height: ' . $style[3] . 'px;}}';

    echo OxiAddonsInlineCSSData($custom_css);
}
