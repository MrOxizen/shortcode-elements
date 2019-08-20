<?php

if (!defined('ABSPATH'))
    exit;

function oxi_text_blocks_style_2_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $css = $headingdiv = $contentdiv = '';
    if ($stylefiles[3] == '') {
        $headingdiv = 'display:none;';
    }
    if ($stylefiles[5] == '') {
        $contentdiv = 'display:none;';
    }
    $styledata = explode('|', $stylefiles[0]);
    echo '<div class="oxi-addons-container" > 
                <div class="oxi-addons-row">
                    <div class="oxi-addons-text-blocks-' . $oxiid . '-body" ' . OxiAddonsAnimation($styledata, 19) . '>
                         <div class="oxi-addons-text-blocks-' . $oxiid . '">';
    if ($stylefiles[7] == 'headingbordercontent') {
        echo ' <div class="oxi-addons-text-blocks-heading-' . $oxiid . '">' . OxiAddonsTextConvert($stylefiles[3]) . '</div>
                                <div class="oxi-addons-text-blocks-border-' . $oxiid . '">
                                    <div class="oxi-addons-text-block-border"></div>
                                </div>
                                <div class="oxi-addons-text-blocks-content-' . $oxiid . '">' . OxiAddonsTextConvert($stylefiles[5]) . '</div>';
    } elseif ($stylefiles[7] == 'contentborderheading') {
        echo ' <div class="oxi-addons-text-blocks-content-' . $oxiid . '">' . OxiAddonsTextConvert($stylefiles[5]) . '</div>
                                <div class="oxi-addons-text-blocks-border-' . $oxiid . '">
                                    <div class="oxi-addons-text-block-border"></div>
                                </div>
                                <div class="oxi-addons-text-blocks-heading-' . $oxiid . '">' . OxiAddonsTextConvert($stylefiles[3]) . '</div>
                                 ';
    } elseif ($stylefiles[7] == 'headingcontentborder') {
        echo ' <div class="oxi-addons-text-blocks-heading-' . $oxiid . '">' . OxiAddonsTextConvert($stylefiles[3]) . '</div>
                                <div class="oxi-addons-text-blocks-content-' . $oxiid . '">' . OxiAddonsTextConvert($stylefiles[5]) . '</div>
                                <div class="oxi-addons-text-blocks-border-' . $oxiid . '">
                                    <div class="oxi-addons-text-block-border"></div>
                                </div>';
    } elseif ($stylefiles[7] == 'contentheadingborder') {
        echo ' <div class="oxi-addons-text-blocks-content-' . $oxiid . '">' . OxiAddonsTextConvert($stylefiles[5]) . '</div>
                                <div class="oxi-addons-text-blocks-heading-' . $oxiid . '">' . OxiAddonsTextConvert($stylefiles[3]) . '</div>
                                <div class="oxi-addons-text-blocks-border-' . $oxiid . '">
                                  <div class="oxi-addons-text-block-border"></div>
                                </div>';
    }

    echo '           </div>
                    </div>
                </div>
              </div>';
    $dividertx = explode(':', $styledata[33]);
    if ($dividertx[0] == 'left') {
        $dividerdata = 'flex-start';
    } elseif ($dividertx[0] == 'center') {
        $dividerdata = 'center';
    } else {
        $dividerdata = 'flex-end';
    }
    $css .= '.oxi-addons-text-blocks-' . $oxiid . '{
                    width:100%;
                    float:left;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 3) . ';
                }
                .oxi-addons-text-blocks-' . $oxiid . '-body{
                     width:100%;
                     max-width: ' . $styledata[107] . 'px;
                     margin: 0 auto;
                     display: flex; 
                }
                .oxi-addons-text-blocks-heading-' . $oxiid . '{
                    width:100%;
                    float:left; 
                     ' . $headingdiv . ' 
                    font-size:' . $styledata[23] . 'px;
                    color: ' . $styledata[27] . ';
                    ' . OxiAddonsFontSettings($styledata, 29) . '
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
                }
                .oxi-addons-text-blocks-content-' . $oxiid . '{
                    width:100%;
                    float:left;
                    ' . $contentdiv . '
                    font-size:' . $styledata[51] . 'px;
                    color: ' . $styledata[55] . ';
                    ' . OxiAddonsFontSettings($styledata, 57) . '
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 63) . ';
                }
                .oxi-addons-text-blocks-border-' . $oxiid . '{
                    width:100%;
                    float:left;
                    display: flex;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
                    justify-content: ' . $dividerdata . ';
                }
                .oxi-addons-text-blocks-border-' . $oxiid . ' .oxi-addons-text-block-border{
                    width:' . $styledata[79] . 'px;
                    max-width:100%;
                    display:inline-block;
                    border-top: ' . $styledata[85] . 'px ' . $styledata[83] . ' ' . $styledata[84] . ';
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                   .oxi-addons-text-blocks-' . $oxiid . '{
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 4) . ';
                    }
                    .oxi-addons-text-blocks-' . $oxiid . '-body{
                        max-width: ' . $styledata[108] . 'px;
                   }
                    .oxi-addons-text-blocks-heading-' . $oxiid . '{
                        font-size:' . $styledata[24] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
                    }
                    .oxi-addons-text-blocks-content-' . $oxiid . '{
                        font-size:' . $styledata[51] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 64) . ';
                    }
                    .oxi-addons-text-blocks-border-' . $oxiid . '{
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
                    } 
                    .oxi-addons-text-blocks-border-' . $oxiid . ' .oxi-addons-text-block-border{
                        width:' . $styledata[80] . 'px;
                    }
                }
                @media only screen and (max-width : 668px){
                     .oxi-addons-text-blocks-' . $oxiid . '{
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 5) . ';
                    }
                    .oxi-addons-text-blocks-' . $oxiid . '-body{
                        max-width: ' . $styledata[109] . 'px;
                   }
                    .oxi-addons-text-blocks-heading-' . $oxiid . '{
                        font-size:' . $styledata[25] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
                    }
                    .oxi-addons-text-blocks-content-' . $oxiid . '{
                        font-size:' . $styledata[52] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';
                    }
                    .oxi-addons-text-blocks-border-' . $oxiid . '{
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                    } 
                    .oxi-addons-text-blocks-border-' . $oxiid . ' .oxi-addons-text-block-border{
                        width:' . $styledata[81] . 'px;
                    }
                }';

    OxiAddonsInlineCSSData($css);
}
