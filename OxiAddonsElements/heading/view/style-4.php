<?php

if (!defined('ABSPATH'))
    exit;

function oxi_heading_style_4_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $css = '';
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $heading = $content = '';
    if ($stylefiles[3] != '') {
        $heading = '<' . $styledata[39] . ' class="oxi-addons-Heading-text"> 
                            ' . OxiAddonsTextConvert($stylefiles[3]) . '
                    </' . $styledata[39] . '>';
    }
    if ($stylefiles[5]) {
        $content = ' <p class="oxi-addons-Content-text"> 
                        ' . OxiAddonsTextConvert($stylefiles[5]) . '
                    </p>';
    }

    echo '  <div class="oxi-addons-container">
                <div class="oxi-addons-row">
                    <div class="OxiAddons-Heading-' . $oxiid . '" ' . OxiAddonsAnimation($styledata, 95) . '>
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
               
            }
            .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-text{
                width: 100%;
                float: left;
                font-size: ' . $styledata[35] . 'px;
                ' . OxiAddonsFontSettings($styledata, 43) . '; 
                color: ' . $styledata[41] . ';
                margin: 0;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . ';
            }
            .oxi-addons-Content-body-' . $oxiid . '{
                width: 100%;
                float: left;
            }
            .oxi-addons-Content-body-' . $oxiid . '  .oxi-addons-Content-text{
                width: 100%;
                float: left;
                font-size: ' . $styledata[65] . 'px;
                ' . OxiAddonsFontSettings($styledata, 73) . '; 
                color: ' . $styledata[71] . ';
                margin: 0;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 79) . ';
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                
                .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-text{
                    font-size: ' . $styledata[36] . 'px;
                    margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . ';
                }
                .oxi-addons-Content-body-' . $oxiid . '  .oxi-addons-Content-text{
                    font-size: ' . $styledata[66] . 'px;
                        margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 80) . ';
                }
            }      
            @media only screen and (max-width : 668px){
                .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-text{
                    font-size: ' . $styledata[37] . 'px;
                    margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . ';
                }
                .oxi-addons-Content-body-' . $oxiid . '  .oxi-addons-Content-text{
                    font-size: ' . $styledata[67] . 'px;
                    margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 81) . ';
                }
            }
            ';
    echo OxiAddonsInlineCSSData($css);
}
