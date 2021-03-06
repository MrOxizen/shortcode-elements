<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_banner_style_12_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $heading = $content = '';
 
    if ($stylefiles[2] != '') {
        $heading = '
            <div class="oxi-addons-heading"  ' . OxiAddonsAnimation($styledata, 51) . '>
                ' . OxiAddonsTextConvert($stylefiles[2]) . '
            </div>
        ';
    } 
    if ($stylefiles[4] != '') {
        $content = '
            <div class="oxi-addons-details" ' . OxiAddonsAnimation($styledata, 84) . '>
                ' . OxiAddonsTextConvert($stylefiles[4]) . '
            </div>
        ';
    }
    echo '<div class="oxi-addons-container">
			<div class="oxi-addons-row">
				<div class="oxi-addons-wrapper-' . $oxiid . '">
					<div class="oxi-addons-lg-col-1">
						<div class="oxi-addons-main">
							' . $heading . '
							' . $content . '
						</div>
					</div>
				</div>
            </div>
        </div>
        ';
    $css = '
        .oxi-addons-wrapper-' . $oxiid . '{
            width: 100%;
            float: left;
            ' . OxiAddonsBGImage($styledata, 3) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main{
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading{
            font-size: ' . $styledata[23] . 'px;
            line-height: ' . ($styledata[23] / 2 + 20) . 'px;
            ' . OxiAddonsFontSettings($styledata, 27) . ';
            color: ' . $styledata[33] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
            width: 100%;
            float: left;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
            font-size: ' . $styledata[56] . 'px;
            line-height: ' . ($styledata[56] / 2 + 15) . 'px;
            ' . OxiAddonsFontSettings($styledata, 60) . ';
            color: ' . $styledata[66] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';
            width: 100%;
            float: left;
        }

        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';
                display: block;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading{
                font-size: ' . $styledata[24] . 'px;
                line-height: ' . ($styledata[24] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
                font-size: ' . $styledata[57] . 'px;
                line-height: ' . ($styledata[57] / 2 + 15) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
                text-align: center;
            }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
                display: block;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading{
                font-size: ' . $styledata[25] . 'px;
                line-height: ' . ($styledata[25] / 2 + 15) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
                font-size: ' . $styledata[58] . 'px;
                line-height: ' . ($styledata[58] / 2 + 15) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 70) . ';
                text-align: center;
            }

        }
    ';
    echo OxiAddonsInlineCSSData($css);
}

;
