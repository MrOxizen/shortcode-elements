<?php

if (!defined('ABSPATH'))
    exit;

function oxi_divider_style_1_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $style = explode('|', $stylefiles[0]);
    $css = '';
    if ($style[11] == 'left') {
        $cssmargin = 'margin: 0 auto 0 0 !important;';
    } elseif ($style[11] == 'center') {
        $cssmargin = 'margin: 0 auto !important;';
    } else {
        $cssmargin = 'margin: 0 0 0 auto !important;';
    }
    echo  ' <div class="oxi-addons-container">
                <div class="oxi-addons-row">
                        <div class="oxi-divider-' . $oxiid . '" id="' . $stylefiles[2] . '"  ' . OxiAddonsAnimation($style, 13) . '>
                            <div class="oxi-divider-left"><div class="oxi-divider"></div></div>
                            <div class="oxi-divider-right"><div class="oxi-divider"></div></div>
                        </div>
                    
                </div>
            </div>';
    $css .= '.oxi-divider-' . $oxiid . '{
                    position: relative;
                    display: table;
                    width: 100%;
                    max-width:' . $style[7] . 'px;
                    padding:' . OxiAddonsPaddingMarginSanitize($style, 17) . ';
                    ' . $cssmargin . '    
                }
               .oxi-divider-' . $oxiid . ' .oxi-divider-left,
               .oxi-divider-' . $oxiid . ' .oxi-divider-right{
                    display: table-cell;
                    width: 50%;
                    vertical-align: middle;
                }
               .oxi-divider-' . $oxiid . ' .oxi-divider-left .oxi-divider {
                    border-top-style: ' . $style[4] . ';
                    border-top-color: ' . $style[5] . ';
                    border-top-width: ' . $style[3] . 'px;
                    margin-top: 1px;
                }
                .oxi-divider-' . $oxiid . ' .oxi-divider-right .oxi-divider {
                    border-top-style: ' . $style[4] . ';
                    border-top-color: ' . $style[5] . ';
                    border-top-width: ' . $style[3] . 'px;
                    margin-top: 1px;
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                    .oxi-divider-' . $oxiid . '{
                        max-width:' . $style[8] . 'px;
                        padding:' . OxiAddonsPaddingMarginSanitize($style, 18) . ';
                    }
                }
                @media only screen and (max-width : 668px){
                    .oxi-divider-' . $oxiid . '{
                        max-width:' . $style[9] . 'px;
                        padding:' . OxiAddonsPaddingMarginSanitize($style, 19) . ';
                        margin: 0 auto !important;
                    }
                    
                }
                ';

    echo OxiAddonsInlineCSSData($css);
}
