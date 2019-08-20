<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_banner_style_7_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $heading = $detail = $button = '';
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
            <div class="oxi-addons-header">
                <div class="oxi-addons-heading" ' . OxiAddonsAnimation($styledata, 51) . '></>
                    ' . OxiAddonsTextConvert($stylefiles[2]) . '
                </div>
                <div class="oxi-addons-line" ' . OxiAddonsAnimation($styledata, 99) . '></div>
            </div>
            ';
    }
    if ($stylefiles[4] != '') {
        $detail = '
                <div class="oxi-addons-details"  ' . OxiAddonsAnimation($styledata, 84) . '>
                    ' . OxiAddonsTextConvert($stylefiles[4]) . '
                </div>
            ';
    }
    if ($stylefiles[6] != '' && $stylefiles[8] != '') {
        $button = '
                <div class="oxi-addons-button" ' . OxiAddonsAnimation($styledata, 192) . '></>
                    <a href="' . OxiAddonsUrlConvert($stylefiles[8]) . '" class="oxi-addons-link"  target="' . $styledata[104] . '">
                        ' . OxiAddonsTextConvert($stylefiles[6]) . '
                    </a>
                </div>
            ';
    } elseif ($stylefiles[6] != '' && $stylefiles[8] == '') {
        $button = '
            <div class="oxi-addons-button" ' . OxiAddonsAnimation($styledata, 192) . '></>
                <div class="oxi-addons-link">
                    ' . OxiAddonsTextConvert($stylefiles[6]) . '
                </div>
            </div>
        ';
    }
    echo '<div class="oxi-addons-container">
			<div class="oxi-addons-row">
				<div class="oxi-addons-wrapper-' . $oxiid . '">
					 <div class="oxi-addons-lg-col-1 oxi-addons-md-col-1 oxi-addons-xs-col-1 oxi-addons-main">
						<div class="oxi-addons-area">
								' . $heading . '
								' . $detail . '
								' . $button . '
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
            justify-content:center;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header{
            position: relative;
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-heading{
            font-size: ' . $styledata[23] . 'px;
            line-height: ' . ($styledata[23] / 2 + 10) . 'px;
            ' . OxiAddonsFontSettings($styledata, 27) . ';
            color: ' . $styledata[33] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
            width: 100%;
            float: left;
         }
         .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-line{
            position: relative;
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-line::before{
            content: "";
            position: absolute;
            ' . $line_position . '
            top: 0;
            width: ' . $styledata[89] . '%;
            height:' . $styledata[93] . 'px;
            background: ' . $styledata[97] . ';

         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-area .oxi-addons-details{
            font-size: ' . $styledata[56] . 'px;
            line-height: ' . ($styledata[56] / 2 + 20) . 'px;
            ' . OxiAddonsFontSettings($styledata, 60) . ';
            color: ' . $styledata[66] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-area .oxi-addons-button{
            width: 100%;
            float: left;
            text-align: ' . $styledata[120] . ';
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-area .oxi-addons-button .oxi-addons-link{
            background: ' . $styledata[118] . ';
            color: ' . $styledata[116] . ';
            display: inline-block;
            ' . OxiAddonsFontSettings($styledata, 110) . ';
            font-size: ' . $styledata[106] . 'px;
            border:  ' . $styledata[154] . 'px ' . $styledata[155] . ';
            border-color: ' . $styledata[158] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 122) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 160) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 176) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 138) . ';
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-area .oxi-addons-button .oxi-addons-link:hover{
            background: ' . $styledata[146] . ';
            color: ' . $styledata[144] . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 148) . ';
            border-color: ' . $styledata[197] . ';
         } 
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-heading{
                font-size: ' . $styledata[24] . 'px;
                line-height: ' . ($styledata[24] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-line::before{
                width: ' . $styledata[90] . '%;
                height:' . $styledata[93] . 'px;
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-area .oxi-addons-details{
                font-size: ' . $styledata[56] . 'px;
                line-height: ' . ($styledata[56] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-area .oxi-addons-button .oxi-addons-link{
                font-size: ' . $styledata[107] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 123) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 177) . ';
             }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-heading{
                font-size: ' . $styledata[25] . 'px;
                line-height: ' . ($styledata[25] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-line::before{
                width: ' . $styledata[91] . '%;
                height:' . $styledata[94] . 'px;
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-area .oxi-addons-details{
                font-size: ' . $styledata[57] . 'px;
                line-height: ' . ($styledata[57] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 70) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-area .oxi-addons-button .oxi-addons-link{
                font-size: ' . $styledata[108] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 124) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 162) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 178) . ';
             }
        }
    ';
    echo OxiAddonsInlineCSSData($css);
}

;
