<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_banner_style_2_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $front_image = $heading = $details = $btn_left = $btn_middle = $btn_right = $button = "";

    if ($stylefiles[2] != '') {
        $front_image = '
            <div class="oxi-addons-content-image" ' . OxiAddonsAnimation($styledata, 27) . '>
                <img class="oxi-addons-image" src="' . OxiAddonsUrlConvert($stylefiles[2]) . '" alt="Banner image">
            </div>
        ';
    }
    if ($stylefiles[4] != '') {
        $heading = '
            <div class="oxi-addons-content-heading" ' . OxiAddonsAnimation($styledata, 60) . '>' . OxiAddonsTextConvert($stylefiles[4]) . ' </div>
        ';
    }
    if ($stylefiles[6] != '') {
        $details = '
            <div class="oxi-addons-content-detail" ' . OxiAddonsAnimation($styledata, 93) . '> ' . OxiAddonsTextConvert($stylefiles[6]) . '</div>
        ';
    }
    if ($stylefiles[10] != '' && $stylefiles[8] != '') {
        $btn_left = '
            <div class="oxi-addons-button-left" ' . OxiAddonsAnimation($styledata, 184) . '>
                <a href="' . OxiAddonsUrlConvert($stylefiles[10]) . '" class="oxi-addons-button-link" target="' . $styledata[98] . '"> ' . OxiAddonsTextConvert($stylefiles[8]) . '
                <span class="oxi-addons-button-left-icon">   ' . oxi_addons_font_awesome('' . $stylefiles[12] . '') . '</span>
                </a>
            </div>
        ';
    } elseif ($stylefiles[10] == '' && $stylefiles[8] != '') {
        $btn_left = '
            <div class="oxi-addons-button-left" ' . OxiAddonsAnimation($styledata, 184) . '>
                <div class="oxi-addons-button-link" > ' . OxiAddonsTextConvert($stylefiles[8]) . '
                <span class="oxi-addons-button-left-icon">   ' . oxi_addons_font_awesome('' . $stylefiles[12] . '') . '</span>
                </div>
            </div>
      ';
    }
    if ($stylefiles[16] != '' && $stylefiles[14] != '') {
        $btn_middle = '
            <div class="oxi-addons-button-middle" ' . OxiAddonsAnimation($styledata, 275) . '>
                <a href="' . OxiAddonsUrlConvert($stylefiles[16]) . '" class="oxi-addons-button-link" target="' . $styledata[189] . '"> ' . OxiAddonsTextConvert($stylefiles[14]) . '</a>
            </div>
        ';
    } elseif ($stylefiles[16] == '' && $stylefiles[14] != '') {
        $btn_middle = '
            <div class="oxi-addons-button-middle" ' . OxiAddonsAnimation($styledata, 275) . '>
                <div class="oxi-addons-button-link"> ' . OxiAddonsTextConvert($stylefiles[14]) . '</div>
            </div>
        ';
    }
    if ($stylefiles[20] != '' && $stylefiles[18] != '') {
        $btn_right = '
            <div class="oxi-addons-button-right" ' . OxiAddonsAnimation($styledata, 366) . '>
                <a  href="' . OxiAddonsUrlConvert($stylefiles[20]) . '"  class="oxi-addons-button-link" target="' . $styledata[280] . '"> ' . OxiAddonsTextConvert($stylefiles[18]) . ' </a>
            </div>
        ';
    } elseif ($stylefiles[20] == '' && $stylefiles[18] != '') {
        $btn_right = '
                     <div class="oxi-addons-button-right" ' . OxiAddonsAnimation($styledata, 366) . '>
                         <div class="oxi-addons-button-link"> ' . OxiAddonsTextConvert($stylefiles[18]) . ' </div>
                    </div>
            ';
    }

    if ($stylefiles[8] != "" || $stylefiles[14] != "" || $stylefiles[18] != "") {
        $button = '
                <div class="oxi-addons-content-button"> 
                ' . $btn_left . '
                ' . $btn_middle . '
                ' . $btn_right . ' 
                </div>
            ';
    }
    echo '<div class="oxi-addons-container">
			<div class="oxi-addons-row">
				<div class="oxi-addons-main-wrapper-' . $oxiid . ' "  >
					<div class="oxi-addons-lg-col-1 oxi-addons-md-col-1 oxi-addons-xs-col-1">
						<div class="oxi-addons-content ">
							' . $front_image . '
							' . $heading . '
							' . $details . '
						</div>
						' . $button . '
					</div>
				</div>
			</div>
        </div>
        ';
    $css = '
        .oxi-addons-main-wrapper-' . $oxiid . '{
            width: 100%;
            float: left;
            ' . OxiAddonsBGImage($styledata, 3) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 371) . ';
            overflow: hidden;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content{
            width: 100%;
            float: left;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-image {
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';
            text-align: ' . $styledata[387] . ';
            width: 100%;
            float: left;
        }

        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-image .oxi-addons-image {
            width: ' . $styledata[7] . 'px;
            height: ' . $styledata[397] . 'px; 
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading{
            font-size: ' . $styledata[32] . 'px;
            ' . OxiAddonsFontSettings($styledata, 36) . ';
            color: ' . $styledata[42] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 44) . ';
            width: 100%;
            float: left;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-detail{
            font-size: ' . $styledata[65] . 'px;
            ' . OxiAddonsFontSettings($styledata, 69) . ';
            color: ' . $styledata[75] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 77) . ';
            width: 100%;
            float: left;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button{
            width: 100%;
            float: left;
            text-align: ' . $styledata[395] . ';
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left{
            display: inline-block;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link{
            background: ' . $styledata[112] . ';
            color: ' . $styledata[110] . ';
            display: inline-block;
            ' . OxiAddonsFontSettings($styledata, 104) . ';
            font-size: ' . $styledata[100] . 'px;
            border:  ' . $styledata[146] . 'px ' . $styledata[147] . ';
            border-color: ' . $styledata[150] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 114) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 152) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 168) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 130) . ';
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link:hover{
            background: ' . $styledata[138] . ';
            color: ' . $styledata[136] . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 140) . ';
            border-color: ' . $styledata[389] . ';
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-left-icon{
            padding-left: 5px;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle{
            display: inline-block;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link{
            background: ' . $styledata[203] . ';
            color: ' . $styledata[201] . ';
            display: block;
            ' . OxiAddonsFontSettings($styledata, 195) . ';
            font-size: ' . $styledata[191] . 'px;
            border:  ' . $styledata[237] . 'px ' . $styledata[238] . ';
            border-color: ' . $styledata[241] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 205) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 243) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 259) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 221) . ';
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link:hover{
            background: ' . $styledata[229] . ';
            color: ' . $styledata[227] . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 231) . ';
            border-color: ' . $styledata[391] . ';
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right{
            display: inline-block;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link{
            background: ' . $styledata[294] . ';
            color: ' . $styledata[292] . ';
            display: inline-block;
            ' . OxiAddonsFontSettings($styledata, 286) . ';
            font-size: ' . $styledata[282] . 'px;
            border:  ' . $styledata[328] . 'px ' . $styledata[329] . ';
            border-color: ' . $styledata[332] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 296) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 334) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 350) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 312) . ';
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link:hover{
            background: ' . $styledata[320] . ';
            color: ' . $styledata[318] . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 322) . ';
            border-color: ' . $styledata[393] . ';
        }

        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-main-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 372) . ';
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-image {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 12) . ';
            } 
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-image .oxi-addons-image {
                width: ' . $styledata[8] . 'px;
                height: ' . $styledata[398] . 'px; 
            } 
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading{
                font-size: ' . $styledata[33] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 45) . ';
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-detail{
                font-size: ' . $styledata[66] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 78) . ';
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link{
                font-size: ' . $styledata[101] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 115) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 169) . ';
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link{
                font-size: ' . $styledata[192] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 206) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 244) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 260) . ';
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link{
                font-size: ' . $styledata[283] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 297) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 335) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 351) . ';
            }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-main-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 373) . ';
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-image {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
            }

            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-image .oxi-addons-image {
                width: ' . $styledata[9] . 'px;
                height: ' . $styledata[399] . 'px; 
            } 
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading{
                font-size: ' . $styledata[34] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 46) . ';
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-detail{
                font-size: ' . $styledata[67] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 79) . ';
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link{

                font-size: ' . $styledata[102] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 116) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 154) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 170) . ';
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link{

                font-size: ' . $styledata[193] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 207) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 245) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 261) . ';
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link{

                font-size: ' . $styledata[284] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 298) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 336) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 352) . ';
            }
        }



    ';
    echo OxiAddonsInlineCSSData($css);
}

;
