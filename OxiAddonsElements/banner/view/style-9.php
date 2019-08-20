<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_banner_style_9_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $line_position = $heading = $detail = $button = $image = $column = $main_column = '';
    if ($styledata[31] == 'left'):
        $line_position = '
            left: 0;
            -webkit-transform: translate(-0%);
            -moz-transform: translate(-0%);
            -o-transform: translate(-0%);
            transform: translate(-0%);
            ';

    elseif ($styledata[31] == 'right'):
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
    if ($stylefiles[8] != '' && $stylefiles[10] != '') {
        $button = '
            <div class="oxi-addons-button"  ' . OxiAddonsAnimation($styledata, 219) . '>
                <a href="' . OxiAddonsUrlConvert($stylefiles[10]) . '" class="oxi-addons-link"  target="' . $styledata[133] . '">
                    ' . OxiAddonsTextConvert($stylefiles[8]) . '
                </a>
            </div>
        ';
    } elseif ($stylefiles[8] != '' && $stylefiles[10] == '') {
        $button = '
            <div class="oxi-addons-button"  ' . OxiAddonsAnimation($styledata, 219) . '>
                <div class="oxi-addons-link">
                    ' . OxiAddonsTextConvert($stylefiles[8]) . '
                </div>
            </div>
         ';
    }
    if ($stylefiles[6] != '') {
        $image = '
            <div class="oxi-addons-lg-col-2 oxi-addons-md-col-1 oxi-addons-xs-col-1 oxi-addons-media">
                <div class="oxi-addons-images" ' . OxiAddonsAnimation($styledata, 128) . '>
                    <img class="oxi-addons-img" src="' . OxiAddonsUrlConvert($stylefiles[6]) . '" alt="images">
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
    if ($styledata[224] == 'right') {
        $main_column = '
            ' . $column . '
                <div class="oxi-addons-main">
                    ' . $heading . '
                    ' . $detail . '
                    ' . $button . '
                </div>
            </div>
            ' . $image . '
        ';
    } else {
        $main_column = '
        ' . $image . '
        ' . $column . '
            <div class="oxi-addons-main">
                ' . $heading . '
                ' . $detail . '
                ' . $button . '
            </div>
        </div>
    ';
    }
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-wrapper-' . $oxiid . '">
                ' . $main_column . '
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
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header{
           position: relative;
           width: 100%;
           float: left;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading{
            font-size: ' . $styledata[23] . 'px;
            line-height: 1.2;
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
            line-height: 1;
            ' . OxiAddonsFontSettings($styledata, 75) . ';
            color: ' . $styledata[81] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
            width: 100%;
            float: left;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-button{
            width: 100%;
            float: left;
            text-align: ' . $styledata[226] . ';
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main  .oxi-addons-button .oxi-addons-link{
            background: ' . $styledata[147] . ';
            color: ' . $styledata[145] . ';
            display: inline-block;
            ' . OxiAddonsFontSettings($styledata, 139) . ';
            font-size: ' . $styledata[135] . 'px;
            border:  ' . $styledata[181] . 'px ' . $styledata[182] . ';
            border-color: ' . $styledata[185] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 149) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 203) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 165) . ';
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-button .oxi-addons-link:hover{
            background: ' . $styledata[173] . ';
            color: ' . $styledata[171] . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 175) . ';
            border-color: ' . $styledata[228] . ';
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-images{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 112) . ';
            display: flex;
            justify-content: center;
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-images .oxi-addons-img{
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
                display: block;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading{
                font-size: ' . $styledata[24] . 'px;
                line-height: 1;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
                text-aling: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-line::before{
                width: ' . $styledata[57] . '%;
                height:' . $styledata[61] . 'px;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
                font-size: ' . $styledata[72] . 'px;
                line-height: 1;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 84) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line::before{
                left: 50%;
                -o-transform: translate(-50%)  ;
                -moz-transform: translate(-50%)  ;
                -webkit-transform: translate(-50%)  ;
                transform: translate(-50%)  ;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-button{
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main  .oxi-addons-button .oxi-addons-link{
                font-size: ' . $styledata[136] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 150) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 188) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 204) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-images{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 123) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-images .oxi-addons-img{
                    width: ' . $styledata[105] . 'px;
                    max-width: 100%;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-media{
                width: 100%;
                float: none;
            }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-wrapper-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
                display: block;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading{
                font-size: ' . $styledata[25] . 'px;
                line-height: 1.1;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line::before{
                left: 50%;
                -o-transform: translate(-50%)  ;
                -moz-transform: translate(-50%)  ;
                -webkit-transform: translate(-50%)  ;
                transform: translate(-50%)  ;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-line::before{
                width: ' . $styledata[58] . '%;
                height:' . $styledata[62] . 'px;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details{
                font-size: ' . $styledata[73] . 'px;
                line-height: 1;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 84) . ';
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-button{
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main  .oxi-addons-button .oxi-addons-link{
                font-size: ' . $styledata[137] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 151) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 189) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 205) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-images{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 124) . ';
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-images .oxi-addons-img{
                    width: ' . $styledata[106] . 'px;
                    max-width: 100%;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-media{
                width: 100%;
                float: none;
            }
        }
    ';
    echo OxiAddonsInlineCSSData($css);
}

;
