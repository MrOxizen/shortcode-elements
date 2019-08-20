<?php

if (!defined('ABSPATH'))
    exit;

function oxi_heading_style_8_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $css = '';
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $heading = $content = $WM = '';
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
    if ($stylefiles[7]) {
        $WM = '<div class="oxi-addons-heading-WM">
                    ' . OxiAddonsTextConvert($stylefiles[7]) . '
                </div>';
    }

    $textalign = explode(":", $styledata[113]);
    if ($textalign[0] == 'left') {
        $transformdata = "top: 50%;left: 0%;transform: translateX(-0%) translateY(-50%);";
    } else if ($textalign[0] == 'center') {
        $transformdata = "top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);";
    } else {
        $transformdata = "top: 50%;right: 0%;transform: translateY(-50%);";
    }

    echo '  <div class="oxi-addons-container">
                <div class="oxi-addons-row">
                    <div class="OxiAddons-Heading-' . $oxiid . '" ' . OxiAddonsAnimation($styledata, 95) . '>
                        <div class="oxi-addons-main-heading-body' . $oxiid . '">
                            ' . $WM . '
                            <div class="oxi-addons-Content-body-' . $oxiid . '">
                                ' . $content . '
                            </div>
                            <div class="oxi-addons-Heading-body-' . $oxiid . '">
                                ' . $heading . '
                            </div>
                        </div>
                    </div>
                </div>
            </div>';




    $css .= '
            .OxiAddons-Heading-' . $oxiid . '{
                width: 100%;
                float: left;
                }
            .oxi-addons-Heading-body-' . $oxiid . '{
                width: 100%;
                height: auto;
                float: left;
                display: block;
            }
            .oxi-addons-main-heading-body' . $oxiid . '{
                position: relative;
                width: 100%;
                text-align: center;
                z-index: 1; 
            }
            .oxi-addons-main-heading-body' . $oxiid . ' .oxi-addons-heading-WM {
                position: absolute;
                color: ' . $styledata[107] . ';
                font-size: ' . $styledata[101] . 'px;
                ' . OxiAddonsFontSettings($styledata, 109) . '
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 115) . ';
                z-index: -1;
                ' . $transformdata . '
            }
            .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-text{
                width: 100%;
                font-size: ' . $styledata[35] . 'px;
                ' . OxiAddonsFontSettings($styledata, 43) . '; 
                color: ' . $styledata[41] . ';
                margin: 0;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . ';
            }
            .oxi-addons-Content-body-' . $oxiid . '{
                width: 100%;
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
                .oxi-addons-main-heading-body' . $oxiid . ' .oxi-addons-heading-WM {
                    font-size: ' . $styledata[102] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 116) . ';
                    z-index: -1;
                    top: 50%;
                    left: 50%;
                    transform: translateX(-50%) translateY(-50%);
                }
                .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-text{
                    font-size: ' . $styledata[36] . 'px;
                    margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . ';
                    text-align:center;
                }
                
                .oxi-addons-Content-body-' . $oxiid . '  .oxi-addons-Content-text{
                    font-size: ' . $styledata[66] . 'px;
                    margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 80) . ';
                    text-align:center;
                    float: left;
                }
            }      
            @media only screen and (max-width : 668px){
                .oxi-addons-main-heading-body' . $oxiid . ' .oxi-addons-heading-WM {
                    font-size: ' . $styledata[103] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 117) . ';
                    z-index: -1;
                    top: 50%;
                    left: 50%;
                    transform: translateX(-50%) translateY(-50%);
                    text-align:center;
                }
                .oxi-addons-Heading-body-' . $oxiid . ' .oxi-addons-Heading-text{
                    font-size: ' . $styledata[37] . 'px;
                        margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . ';
                    text-align:center;
                }
                
                .oxi-addons-Content-body-' . $oxiid . '  .oxi-addons-Content-text{
                    font-size: ' . $styledata[67] . 'px;
                    margin: 0;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 81) . ';
                    text-align:center;
                    float: left;
                }
            }';
    echo OxiAddonsInlineCSSData($css);
}
