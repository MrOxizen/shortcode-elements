<?php

if (!defined('ABSPATH'))
    exit;

function oxi_heading_style_11_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $css = '';
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $heading = $content = '';
    if ($stylefiles[3] != '') {
        $heading = '<div class="oxi-addons-Heading-title">
                        <' . $styledata[9] . '>' . OxiAddonsTextConvert($stylefiles[3]) . ' </' . $styledata[9] . '>
                    </div>';
    }
    if ($stylefiles[5]) {
        $content = ' <p class="oxi-addons-Content-text"> 
                        ' . OxiAddonsTextConvert($stylefiles[5]) . '
                    </p>';
    }

    echo '  <div class="oxi-addons-container">
                <div class="oxi-addons-row">
                    <div  class="OxiAddons-Heading-' . $oxiid . '"' . OxiAddonsAnimation($styledata, 83) . '>
                        <div class="oxi-addons-Heading-body-' . $oxiid . '">
                            ' . $heading . '
                        </div>
                        <div class="oxi-addons-Content-body-' . $oxiid . '">
                            ' . $content . '
                        </div>
                    </div>
                </div>
            </div>';




    $css .= '.OxiAddons-Heading-' . $oxiid . '{
                width: 100%;
                float: left;
                }
            .oxi-addons-Heading-body-' . $oxiid . '{
                width: 100%;
                float: left;
                display: block;
                border-bottom-width: ' . $styledata[23] . 'px;
                border-top-width: 0;
                border-left-width: 0;
                border-right-width: 0;
                border-style: ' . $styledata[19] . ';
                border-color: ' . $styledata[20] . ';
                ' . OxiAddonsFontSettings($styledata, 13) . ';

            }
            .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-title{
                    margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
                    background: ' . $styledata[11] . ';
                    display: inline-block;
                    
            }
            .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-title ' . $styledata[9] . '{
                margin: 0;
                font-size: ' . $styledata[3] . 'px;
                ' . OxiAddonsFontSettings($styledata, 13) . ';
                color: ' . $styledata[7] . ';
            }
            .oxi-addons-Content-body-' . $oxiid . '{
                width: 100%;
                float: left;
                display: block;
            }
            .oxi-addons-Content-body-' . $oxiid . '  .oxi-addons-Content-text{
                width: 100%;
                height: auto;
                font-size: ' . $styledata[55] . 'px;
                ' . OxiAddonsFontSettings($styledata, 61) . '; 
                color: ' . $styledata[59] . ';
                margin: 0;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 67) . ';
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-Heading-body-' . $oxiid . '{
                    width: 100%;
                    float: left;
                    display: block;
                    border-bottom-width: ' . $styledata[24] . 'px;
                    border-top-width: 0;
                    border-left-width: 0;
                    border-right-width: 0;                }
                .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-title{
                        margin: 0;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 40) . ';
                        display: inline-block;

                }
                .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-title ' . $styledata[9] . '{
                    margin: 0;
                    font-size: ' . $styledata[4] . 'px;
                }
                .oxi-addons-Content-body-' . $oxiid . '{
                    width: 100%;
                    float: left;
                    display: block;
                }
                .oxi-addons-Content-body-' . $oxiid . '  .oxi-addons-Content-text{
                    width: 100%;
                    height: auto;
                    font-size: ' . $styledata[56] . 'px;
                    margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';
                }
                
            }      
            @media only screen and (max-width : 668px){
               .oxi-addons-Heading-body-' . $oxiid . '{
                    width: 100%;
                    height: auto;
                    border-bottom-width: ' . $styledata[25] . 'px;
                    border-top-width: 0;
                    border-left-width: 0;
                    border-right-width: 0;
                }
                .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-title{
                        margin: 0;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 41) . ';
                        display: inline-block;

                }
                .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-title ' . $styledata[9] . '{
                    margin: 0;
                    font-size: ' . $styledata[5] . 'px;
                }
                .oxi-addons-Content-body-' . $oxiid . '{
                    width: 100%;
                    height: auto;
                }
                .oxi-addons-Content-body-' . $oxiid . '  .oxi-addons-Content-text{
                    width: 100%;
                    height: auto;
                    font-size: ' . $styledata[57] . 'px;
                    margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
                }
            }';
    echo OxiAddonsInlineCSSData($css);
}
