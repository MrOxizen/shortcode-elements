<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_banner_style_10_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $justify_content = $heading = $detail = $image = '';
    if ($styledata[133] == 'left') {
        $justify_content = 'justify-content: start;';
    } elseif ($styledata[133] == 'right') {
        $justify_content = 'justify-content: end;';
    } else {
        $justify_content = 'justify-content: center;';
    }
    $data = explode(':', $styledata[31]);
    if ( $data[0] == 'left'):
        $line_position = '
		            left: 0;
		            -webkit-transform: translate(-0%);
		            -moz-transform: translate(-0%);
		            -o-transform: translate(-0%);
		            transform: translate(-0%);
			        ';

    elseif ( $data[0] == 'right'):
        $line_position = '
		            right: 0;
		            -webkit-transform: translate(-0);
		            -moz-transform: translate(-0);
		            -o-transform: translate(-0);
		            transform: translate(-0);
			    ';
    else:
        $line_position = '
		            left: 50%;
		            -webkit-transform: translate(-50%);
		            -moz-transform: translate(-50%);
		            -o-transform: translate(-50%);
		            transform: translate(-50%);
		        ';
    endif;

    if ($stylefiles[2] != '') {
        $heading = '
            <div class="oxi-addons-main-header">
                <div class="oxi-addons-heading"  ' . OxiAddonsAnimation($styledata, 51) . '>
                        ' . OxiAddonsTextConvert($stylefiles[2]) . '
                </div>
                <div class="oxi-addons-line" ' . OxiAddonsAnimation($styledata, 66) . '></div>
            </div>
        ';
    }
    if ($stylefiles[4] != '') {
        $detail = '
            <div class="oxi-addons-details" ' . OxiAddonsAnimation($styledata, 99) . '>
                ' . OxiAddonsTextConvert($stylefiles[4]) . '
            </div>
        ';
    }
    if ($stylefiles[6] != '') {
        $image = '
            <div class="oxi-addons-images" ' . OxiAddonsAnimation($styledata, 128) . '>
                    <img class="oxi-addons-img" src="' . OxiAddonsUrlConvert($stylefiles[6]) . '" alt="images">
            </div>
        ';
    } 
    echo '<div class="oxi-addons-container">
			<div class="oxi-addons-row">
				<div class="oxi-addons-wrapper-' . $oxiid . '">
					<div class="oxi-addons-lg-col-1">
						<div class="oxi-addons-main">
								' . $heading . '
								' . $detail . '
								' . $image . '
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
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header{
           position: relative;
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
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line{
            width: 100%;
            float: left;
            position: relative;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line::before{
            content: "";
            position: absolute;
            top: 0;
            width: ' . $styledata[56] . '%;
            height:' . $styledata[60] . 'px;
            background: ' . $styledata[64] . ';
            ' . $line_position . '
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
            font-size: ' . $styledata[71] . 'px;
            line-height: ' . ($styledata[71] / 2 + 12) . 'px;
            ' . OxiAddonsFontSettings($styledata, 75) . ';
            color: ' . $styledata[81] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
            width: 100%;
            float: left;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-images{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 112) . ';
            display: flex;
            ' . $justify_content . '
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-images .oxi-addons-img{
            width: ' . $styledata[104] . 'px;
            max-width: 100%;
            height: 100%;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-images .oxi-addons-img:hover{
            cursor: pointer;
            -o-transform: translate(5%);
            -moz-transform: translate(5%);
            -webkit-transform: translate(5%);
            transform: translate(5%);
        }
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading{
                font-size: ' . $styledata[24] . 'px;
                line-height: ' . ($styledata[24] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line::before{
                width: ' . $styledata[57] . '%;
                height:' . $styledata[61] . 'px;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
                font-size: ' . $styledata[72] . 'px;
                line-height: ' . ($styledata[72] / 2 + 12) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 84) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-images .oxi-addons-img{
                    width: ' . $styledata[105] . 'px;
                    max-width: 100%;
            }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading{
                font-size: ' . $styledata[25] . 'px;
                line-height: ' . ($styledata[25] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line::before{
                width: ' . $styledata[58] . '%;
                height:' . $styledata[62] . 'px;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
                font-size: ' . $styledata[73] . 'px;
                line-height: ' . ($styledata[73] / 2 + 12) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 85) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-images .oxi-addons-img{
                    width: ' . $styledata[106] . 'px;
                    max-width: 100%;
            }
        }
    ';
    echo OxiAddonsInlineCSSData($css);
}

;
