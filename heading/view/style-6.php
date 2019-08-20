<?php

if (!defined('ABSPATH'))
    exit;

function oxi_heading_style_6_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    $heading = $content = '';
    if ($stylefiles[3] != '') {
        $heading = '<div class="oxi-addons-img-body-' . $oxiid . '">
                        <div class="oxi-addons-Heading-body-' . $oxiid . '">
                            <' . $styledata[39] . ' class="oxi-addons-Heading-text"> 
                                    ' . OxiAddonsTextConvert($stylefiles[3]) . '
                            </' . $styledata[39] . '>
                        </div>
                    </div>';
    }
    if ($stylefiles[5] != '') {
        $content = '<div class="oxi-addons-Content-body-' . $oxiid . '">
                        <p class="oxi-addons-Content-text"> 
                            ' . OxiAddonsTextConvert($stylefiles[5]) . '
                        </p>
                    </div>';
    }

    echo '  <div class="oxi-addons-container">
                <div class="oxi-addons-row">
                    <div class="oxi-addons-body-' . $oxiid . '" ' . OxiAddonsAnimation($styledata, 95) . '>
                        ' . $content . '
                        ' . $heading . '
                    </div>
                </div>
            </div>';




    $css .= '
            .oxi-addons-body-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 99) . ';
                width: 100%;
                float: left;
            }
            .oxi-addons-img-body-' . $oxiid . '{
            	width: 100%;
                float: left;
                display: block;
                background: url(\'' . OxiAddonsUrlConvert($stylefiles[7]) . '\');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
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
                .oxi-addons-body-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 100) . ';
                }
                .oxi-addons-img-body-' . $oxiid . '{
                    width: 100%;
                    float: left;
                    background-position: center;
                    }
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
                .oxi-addons-body-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
                }
                .oxi-addons-img-body-' . $oxiid . '{
                    width: 100%;
                    float: left;
                    background-position: center;
                    }
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
