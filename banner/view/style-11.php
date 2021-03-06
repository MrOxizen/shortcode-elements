<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_banner_style_11_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $line_position = $image = $column = $heading_one = $heading_two = $button = $main_column = '';
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
    if ($stylefiles[10] != '') {
        $image = '
            <div class="oxi-addons-lg-col-2 oxi-addons-md-col-1 oxi-addons-xs-col-1 oxi-addons-hide">
                <div class="oxi-addons-images" ' . OxiAddonsAnimation($styledata, 185) . '>
                    <img class="oxi-addons-img" src="' . OxiAddonsUrlConvert($stylefiles[10]) . '" alt="images">
                </div>
            </div>
        ';
        $column = '
            <div class="oxi-addons-lg-col-2 oxi-addons-md-col-1 oxi-addons-xs-col-1 oxi-addons-media">
        ';
    } else {
        $column = '
            <div class="oxi-addons-lg-col-1 oxi-addons-md-col-1 oxi-addons-xs-col-1 oxi-addons-media">
        ';
    }
    if ($stylefiles[2] != '' && $stylefiles[4] != '') {
        $heading_one = '
            <div class="oxi-addons-main-header ">
                <div class="oxi-addons-heading"  ' . OxiAddonsAnimation($styledata, 51) . '>
                    ' . OxiAddonsTextConvert($stylefiles[2]) . '
                    <div class="oxi-addons-text-bold">' . OxiAddonsTextConvert($stylefiles[4]) . '</div>
                </div>
                <div class="oxi-addons-line" ' . OxiAddonsAnimation($styledata, 94) . '></div>
            </div>
        ';
    } elseif ($stylefiles[2] != '' && $stylefiles[4] == '') {
        $heading_one = '
            <div class="oxi-addons-main-header">
                <div class="oxi-addons-heading"  ' . OxiAddonsAnimation($styledata, 51) . '>
                    ' . OxiAddonsTextConvert($stylefiles[2]) . '
                </div>
                <div class="oxi-addons-line" ' . OxiAddonsAnimation($styledata, 94) . '></div>
            </div>
         ';
    }
    if ($stylefiles[6] != '') {
        $heading_two = '
            <div class="oxi-addons-heading-two" ' . OxiAddonsAnimation($styledata, 127) . '>
                ' . OxiAddonsTextConvert($stylefiles[6]) . '
            </div>
        ';
    }
    if ($stylefiles[8] != '') {
        $detail = '
            <div class="oxi-addons-details" ' . OxiAddonsAnimation($styledata, 160) . '>
                ' . OxiAddonsTextConvert($stylefiles[8]) . '
            </div>
        ';
    }
    if ($stylefiles[12] != '' && $stylefiles[14] != '') {
        $button = '
            <div class="oxi-addons-button">
                <a href="' . OxiAddonsUrlConvert($stylefiles[14]) . '" class="oxi-addons-link"  target="' . $styledata[190] . '"  ' . OxiAddonsAnimation($styledata, 276) . '>
                    ' . OxiAddonsTextConvert($stylefiles[12]) . '
                </a>
            </div>
        ';
    } elseif ($stylefiles[12] != '' && $stylefiles[14] == '') {
        $button = '
            <div class="oxi-addons-button">
                <div class="oxi-addons-link" ' . OxiAddonsAnimation($styledata, 276) . '>
                    ' . OxiAddonsTextConvert($stylefiles[12]) . '
                </div>
            </div>
        ';
    }
    if ($styledata[281] == 'left') {
        $main_column = '
        ' . $image . '
            ' . $column . '
            <div class="oxi-addons-main ">
                    ' . $heading_one . '
                    ' . $heading_two . '
                    ' . $detail . '
                    ' . $button . '
            </div>
        </div>
        ';
    } else {
        $main_column = '
            ' . $column . '
            <div class="oxi-addons-main">
                    ' . $heading_one . '
                    ' . $heading_two . '
                    ' . $detail . '
                    ' . $button . '
            </div>
        </div>
        ' . $image . '
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
        .oxi-addons-wrapper-' . $oxiid . '   .oxi-addons-images{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 169) . ';
            display: flex;
            justify-content: center;
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . '   .oxi-addons-images .oxi-addons-img{
                width: ' . $styledata[165] . 'px; 
                height: 100%;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-images .oxi-addons-img:hover{
            cursor: pointer;
            -o-transform: translate(5%);
            -moz-transform: translate(5%);
            -webkit-transform: translate(5%);
            transform: translate(5%);
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

        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading .oxi-addons-text-bold{
            width: 100%;
            float: left;
            font-size: ' . $styledata[56] . 'px;
            ' . OxiAddonsFontSettings($styledata, 60) . ';
            color: ' . $styledata[66] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';

        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line{
            position: relative;
            width: 100%;
            float: left;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line::before{
            content: "";
            position: absolute;
            top: 0;
            width: ' . $styledata[84] . '%;
            height:' . $styledata[88] . 'px;
            background: ' . $styledata[92] . ';
            ' . $line_position . '
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading-two{
            font-size: ' . $styledata[99] . 'px;
            line-height: ' . ($styledata[99] / 2 + 20) . 'px;
            ' . OxiAddonsFontSettings($styledata, 103) . ';
            color: ' . $styledata[109] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 111) . ';
            width: 100%;
            float: left;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
            font-size: ' . $styledata[132] . 'px;
            line-height: ' . ($styledata[132] / 2 + 12) . 'px;
            ' . OxiAddonsFontSettings($styledata, 136) . ';
            color: ' . $styledata[142] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 144) . ';
            width: 100%;
            float: left;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button{
            text-align: ' . $styledata[283] . ';
            width: 100%;
            float: left;
           }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link{
            background: ' . $styledata[204] . ';
            color: ' . $styledata[202] . ';
            display: inline-block;
            ' . OxiAddonsFontSettings($styledata, 196) . ';
            font-size: ' . $styledata[192] . 'px;
            border:  ' . $styledata[238] . 'px ' . $styledata[239] . ';
            border-color: ' . $styledata[239] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 206) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 244) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 260) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 222) . ';
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover{
            background: ' . $styledata[230] . ';
            color: ' . $styledata[228] . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 232) . ';
            border-color: ' . $styledata[285] . ';
        } 
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';
                display: block;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-images{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 169) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-images .oxi-addons-img{
                    width: ' . $styledata[166] . 'px;
                    max-width: 100%;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading{
                font-size: ' . $styledata[24] . 'px;
                line-height: ' . ($styledata[24] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
                text-align: center;
            }

            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading .oxi-addons-text-bold{
                font-size: ' . $styledata[57] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line::before{
                width: ' . $styledata[85] . '%;
                height:' . $styledata[89] . 'px;
                left: 50%;
                transform: translate(-50%);
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading-two{
                font-size: ' . $styledata[100] . 'px;
                line-height: ' . ($styledata[100] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 112) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
                font-size: ' . $styledata[133] . 'px;
                line-height: ' . ($styledata[133] / 2 + 12) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 145) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button{
                text-align: center;
               }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link{
                font-size: ' . $styledata[193] . 'px;
                order-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 207) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 245) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 261) . ';
               }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-hide{
                display:none;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-media{
                width: 100%;

            }

        }
        @media only screen and (max-width : 668px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
                display: block;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-images{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 170) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-images .oxi-addons-img{
                    width: ' . $styledata[167] . 'px;
                    max-width: 100%;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading{
                font-size: ' . $styledata[25] . 'px;
                line-height: ' . ($styledata[25] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
                text-align: center;
            }

            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading .oxi-addons-text-bold{
                font-size: ' . $styledata[58] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 70) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line::before{
                width: ' . $styledata[86] . '%;
                height:' . $styledata[90] . 'px;
                left: 50%;
                transform: translate(-50%);
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading-two{
                font-size: ' . $styledata[101] . 'px;
                line-height: ' . ($styledata[101] / 2 + 20) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 113) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
                font-size: ' . $styledata[134] . 'px;
                line-height: ' . ($styledata[134] / 2 + 12) . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 146) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button{
                text-align: center;
               }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link{
                font-size: ' . $styledata[194] . 'px;
                order-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 208) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 246) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 262) . ';
               }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-hide{
                display:none;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-media{
                width: 100%;
            }

        }
    ';
    echo OxiAddonsInlineCSSData($css);
}

;
