<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_banner_style_5_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $images = $column_1 = $heading_one = $heading_two = $detail = $button_left = $button_right = $main_button = $main_column = $transform = $hover_image = $line_position = '';
    if ($stylefiles[8] != '') {
        $images = '
            <div class="oxi-addons-lg-col-2 oxi-addons-md-col-1 oxi-addons-xs-col-1 oxi-addons-hide-sm">
                <div class="oxi-addons-main-left">
                    <img class="oxi-addons-image" src="' . OxiAddonsUrlConvert($stylefiles[8]) . '" alt="logo" ' . OxiAddonsAnimation($styledata, 161) . '>
                </div>
            </div>
        ';
        $column_1 = '
            <div class="oxi-addons-lg-col-2 oxi-addons-md-col-1 oxi-addons-xs-col-1">
        ';
    } else {
        $column_1 = '
            <div class="oxi-addons-lg-col-1 ">
         ';
    }
    if ($stylefiles[2] != '') {
        $heading_one = '
                <div class="oxi-addons-heading-line">
                    <div class="oxi-addons-heading-one" ' . OxiAddonsAnimation($styledata, 51) . '>
                        ' . OxiAddonsTextConvert($stylefiles[2]) . '
                    </div>
                    <div class="oxi-addons-line" ' . OxiAddonsAnimation($styledata, 99) . '></div>
                </div>
            ';
    }
    if ($stylefiles[4] != '') {
        $heading_two = '
                    <div class="oxi-addons-heading-two" ' . OxiAddonsAnimation($styledata, 84) . '>
                         ' . OxiAddonsTextConvert($stylefiles[4]) . '
                    </div>
            ';
    }
    if ($stylefiles[4] != '') {
        $detail = '
            <div class="oxi-addons-short-detail" ' . OxiAddonsAnimation($styledata, 132) . '>
                ' . OxiAddonsTextConvert($stylefiles[6]) . '
            </div>
        ';
    }

    if ($stylefiles[10] != '' && $stylefiles[12] != '') {
        $button_left = '
                <div class="oxi-addons-button-left" ' . OxiAddonsAnimation($styledata, 252) . '>
                    <a href="' . OxiAddonsUrlConvert($stylefiles[12]) . '" class="oxi-addons-button-link"  target="' . $styledata[166] . '">
                                ' . OxiAddonsTextConvert($stylefiles[10]) . '
                    </a>
                </div>
            ';
    } elseif ($stylefiles[10] != '' && $stylefiles[12] == '') {
        $button_left = '
                <div class="oxi-addons-button-left" ' . OxiAddonsAnimation($styledata, 252) . '>
                    <div class="oxi-addons-button-link"  >
                         ' . OxiAddonsTextConvert($stylefiles[10]) . '
                    </div>
                </div>
        ';
    }
    if ($stylefiles[14] != '' && $stylefiles[16] != '') {
        $button_right = '
                <div class="oxi-addons-button-right" ' . OxiAddonsAnimation($styledata, 343) . '>
                    <a href="' . OxiAddonsUrlConvert($stylefiles[16]) . '" class="oxi-addons-button-link"  target="' . $styledata[257] . '">
                                ' . OxiAddonsTextConvert($stylefiles[14]) . '
                    </a>
                </div>
            ';
    } elseif ($stylefiles[14] != '' && $stylefiles[16] == '') {
        $button_right = '
                    <div class="oxi-addons-button-right" ' . OxiAddonsAnimation($styledata, 343) . '>
                        <div class="oxi-addons-button-link">
                                    ' . OxiAddonsTextConvert($stylefiles[14]) . '
                        </div>
                    </div>
        ';
    }
    if ($stylefiles[10] != '' || $stylefiles[14] != '') {
        $main_button = '
                <div class="oxi-addons-button">
                    ' . $button_left . '
                    ' . $button_right . '
                </div>
            ';
    }

    if ($styledata[352] == 'right') {
        $main_column = '
                    ' . $images . '
                    ' . $column_1 . '
                    <div class="oxi-addons-main-right">
                            ' . $heading_one . '
                            ' . $heading_two . '
                            ' . $detail . '
                            ' . $main_button . '
                    </div>
                </div>
            ';
        $hover_image = '
            -o-transform: translate(5%);
            -moz-transform: translate(5%);
            -webkit-transform: translate(5%);
            transform: translate(5%);
        ';
    } else {
        $main_column = '
            ' . $column_1 . '
            <div class="oxi-addons-main-right">
                    ' . $heading_one . '
                    ' . $heading_two . '
                    ' . $detail . '
                    ' . $main_button . '
                </div>
            </div>
            ' . $images . '
        '; 
        $hover_image = '
            -o-transform: translate(5%);
            -moz-transform: translate(5%);
            -webkit-transform: translate(5%);
            transform: translate(5%);
        ';
    } 
    echo '<div class="oxi-addons-container">
			<div class="oxi-addons-row">
				<div class="oxi-addons-wrapper-' . $oxiid . '">
					' . $main_column . '
				</div>
			</div>
        </div>
        ';
    $data = explode(':',$styledata[31]);
    if ( $data[0] == 'left') { 
        $line_position = '
                left: 10%;
                -o-transform: translate(-10%);
                -moz-transform: translate(-10%);
                -webkit-transform: translate(-10%);
                transform: translate(-10%);
            ';
    } elseif ( $data[0] == 'right') {
        $line_position = '
            right: 5%;
            -o-transform: translate(-5%);
            -moz-transform: translate(-5%);
            -webkit-transform: translate(-5%);
            transform: translate(-5%);
      ';
    } else {
        $line_position = '
            left: 50%;
            -o-transform: translate(-50%);
            -moz-transform: translate(-50%);
            -webkit-transform: translate(-50%);
            transform: translate(-50%);
        ';
    }

    $css = '
        .oxi-addons-wrapper-' . $oxiid . '{
            width: 100%;
            float: left;
            ' . OxiAddonsBGImage($styledata, 3) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';
            overflow: hidden;
            display: flex;
            align-items: center;
            background-size: cover;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 145) . ';
            width: 100%; 
            display: flex;
            justify-content: center;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left .oxi-addons-image{
            width: ' . $styledata[137] . 'px;
            height:' . $styledata[141] . 'px;
            max-width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left:hover{
          cursor: pointer;
            ' . $hover_image . '
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-one{
            font-size: ' . $styledata[23] . 'px;
            ' . OxiAddonsFontSettings($styledata, 27) . ';
            color: ' . $styledata[33] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two{
            font-size: ' . $styledata[56] . 'px; 
            ' . OxiAddonsFontSettings($styledata, 60) . ';
            color: ' . $styledata[66] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-line{
            position: relative;
            width: 100%;
            float: left;
         }
         .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-line{
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-line::after{
            content: "";
            position: absolute;
            ' . $line_position . '
            bottom: 0;
            width: ' . $styledata[89] . '%;
            height:' . $styledata[93] . 'px;
            background: ' . $styledata[97] . '; 
         } 
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail{
            font-size: ' . $styledata[104] . 'px;
            ' . OxiAddonsFontSettings($styledata, 108) . ';
            color: ' . $styledata[114] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 116) . ';
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-button{
            width: 100%;
            float: left;
            text-align: ' . $styledata[354] . '; 
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-left{
            display: inline-block;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link{
            background: ' . $styledata[180] . ';
            color: ' . $styledata[178] . ';
            display: inline-block;
            ' . OxiAddonsFontSettings($styledata, 172) . ';
            font-size: ' . $styledata[168] . 'px;
            border:  ' . $styledata[214] . 'px ' . $styledata[215] . ';
            border-color: ' . $styledata[218] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 182) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 220) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 236) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 198) . ';
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover{
            background: ' . $styledata[206] . ';
            color: ' . $styledata[204] . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 146) . ';
            border-color: ' . $styledata[348] . ';
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-right{
           display: inline-block;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-button-link{
            background: ' . $styledata[271] . ';
            color: ' . $styledata[269] . ';
            display: inline-block;
            ' . OxiAddonsFontSettings($styledata, 263) . ';
            font-size: ' . $styledata[259] . 'px;
            border:  ' . $styledata[305] . 'px ' . $styledata[306] . ';
            border-color: ' . $styledata[309] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 273) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 311) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 327) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 289) . ';
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-button-link:hover{
            background: ' . $styledata[297] . ';
            color: ' . $styledata[295] . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 299) . ';
            border-color: ' . $styledata[350] . ';
         } 
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 146) . ';
             }
             .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left .oxi-addons-image{
                width: ' . $styledata[138] . 'px;
                height:' . $styledata[142] . 'px;
                max-width: 100%; 
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-one{
                font-size: ' . $styledata[24] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two{
                font-size: ' . $styledata[57] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-line:before{
                width: ' . $styledata[90] . '%;
                height:' . $styledata[94] . 'px;
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail{
                font-size: ' . $styledata[105] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 117) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link{
                font-size: ' . $styledata[169] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 183) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 221) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 237) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-button-link{
                font-size: ' . $styledata[260] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 274) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 312) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 328) . ';
             }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 148) . ';
             }
             .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left .oxi-addons-image{
                width: ' . $styledata[139] . 'px;
                height:' . $styledata[143] . 'px;
                max-width: 100%; 
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-one{
                font-size: ' . $styledata[25] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-hide-sm{
                display: none;
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two{
                font-size: ' . $styledata[58] . 'px;
                
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 70) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-line:before{
                width: ' . $styledata[91] . '%;
                height:' . $styledata[95] . 'px;
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail{
                font-size: ' . $styledata[106] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 118) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link{
                font-size: ' . $styledata[170] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 184) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 222) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 238) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-button-link{
                font-size: ' . $styledata[261] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 275) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 313) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 329) . ';
             }
        }
    ';
    echo OxiAddonsInlineCSSData($css);
}

;
