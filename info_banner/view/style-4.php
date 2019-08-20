<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_info_banner_style_4_shortcode($styledata = false, $listdata = false, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    $images = $column_1 = $icon = $heading_two = $detail = $button_left = $button_right = $main_button = $main_column = $transform = $hover_image = $line_position = '';
    if ($stylefiles[8] != '') {
        $images = '
            <div class="oxi-addons-lg-col-2 oxi-addons-md-col-1 oxi-addons-xs-col-1 oxi-addons-hide-sm">
                <div class="oxi-addons-main-left">
                    <img class="oxi-addons-image" src="' . OxiAddonsUrlConvert($stylefiles[8]) . '" alt="logo" ' . OxiAddonsAnimation($styledata, 167) . '>
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
        $icon = '
                <div class="oxi-addons-content-boxes-icon" ' . OxiAddonsAnimation($styledata, 73) . '>
                ' . oxi_addons_font_awesome($stylefiles[2]) . '
                </div>  
            ';
    }
    if ($stylefiles[4] != '') {
        $heading_two = '
                    <div class="oxi-addons-heading-two" ' . OxiAddonsAnimation($styledata, 107) . '>
                         ' . OxiAddonsTextConvert($stylefiles[4]) . '
                    </div>
            ';
    }
    if ($stylefiles[6] != '') {
        $detail = '
                    <div class="oxi-addons-short-detail" ' . OxiAddonsAnimation($styledata, 140) . '>
                        ' . OxiAddonsTextConvert($stylefiles[6]) . '
                    </div>
            ';
    }

    if ($stylefiles[10] != '' && $stylefiles[12] != '') {
        $button_left = '
                <div class="oxi-addons-button-left" ' . OxiAddonsAnimation($styledata, 167) . '>
                    <a href="' . OxiAddonsUrlConvert($stylefiles[12]) . '" class="oxi-addons-button-link"  target="' . $styledata[172] . '">
                        ' . OxiAddonsTextConvert($stylefiles[10]) . '
                    </a>
                </div>
            ';
    } elseif ($stylefiles[10] != '' && $stylefiles[12] == '') {
        $button_left = '
                <div class="oxi-addons-button-left" ' . OxiAddonsAnimation($styledata, 262) . '>
                    <div class="oxi-addons-button-link" >
                         ' . OxiAddonsTextConvert($stylefiles[10]) . '
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

    if ($styledata[3] == 'right') {
        $main_column = '
                    ' . $images . '
                    ' . $column_1 . '
                    <div class="oxi-addons-main-right">
                            ' . $icon . '
                            ' . $heading_two . '
                            ' . $detail . '
                            ' . $main_button . '
                    </div>
                </div>
            ';
        $hover_image = '
            -o-transform: translate(-5%);
            -moz-transform: translate(-5%);
            -webkit-transform: translate(-5%);
            transform: translate(-5%);
        ';
    } else {
        $main_column = '
            ' . $column_1 . '
            <div class="oxi-addons-main-right"> 
                    '. $icon .'
                    ' . $heading_two . '
                    ' . $detail . '
                    ' . $main_button . '
                </div>
            </div>
            ' . $images . '
        ';
        $transform = '
            transform: translate(0%);
        ';
        $hover_image = '
            -o-transform:   translate(5%);
            -moz-transform:  translate(5%);
            -webkit-transform:  translate(5%);
            transform:  translate(5%);
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
 
        $justify = '';
            if($styledata[33] == 'left'){
                $justify = 'justify-content: flex-start;';
            }elseif($styledata[33] == 'right'){
                $justify = 'justify-content: flex-end;';
            }else{
                $justify = 'justify-content: center;';
            }
    $css = '
        .oxi-addons-wrapper-' . $oxiid . '{
            width: 100%;
            float: left;
            ' . OxiAddonsBGImage($styledata, 5) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
            overflow: hidden;
            display: flex;
            align-items: center;
            background-size: cover;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 151) . ';
            width: 100%;
            ' . $transform . ' 
            margin: 0 auto; 
            text-align: center;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left .oxi-addons-image{
            width: ' . $styledata[145] . '%;
            height: auto;
            max-width: ' . $styledata[145] . '%; 
         }
        .oxi-addons-wrapper-' . $oxiid . ':hover .oxi-addons-main-left{
            cursor: pointer;
            ' . $hover_image . '
         }
         .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-icon{
            width: 100%;
            float:left;  
            display: flex;   
            '.$justify.'
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons{
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-size: ' . $styledata[25] . 'px; 
            line-height:1;
            color: ' . $styledata[29] . ';
            background: '.$styledata[31].';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 67) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';  
            width: '.$styledata[267].'px;
            height: '.$styledata[267].'px;   
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two{
            font-size: ' . $styledata[77] . 'px;
            line-height: 1;
            ' . OxiAddonsFontSettings($styledata, 81) . ';
            color: ' . $styledata[87] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 91) . ';
            width: 100%;
            float: left;
         }
         .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two > span{ 
            color: ' . $styledata[89] . '; 
         }
   
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail{
            font-size: ' . $styledata[112] . 'px;
            ' . OxiAddonsFontSettings($styledata, 116) . ';
            color: ' . $styledata[122] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 124) . ';
            width: 100%;
            float: left;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-button{
            width: 100%;
            float: left;
            text-align: ' . $styledata[178] . ';
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-left{
            display: inline-block;
         }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link{
            background: ' . $styledata[188] . ';
            color: ' . $styledata[186] . ';
            display: inline-block;
            ' . OxiAddonsFontSettings($styledata, 180) . ';
            font-size: ' . $styledata[174] . 'px;
            border:  ' . $styledata[206] . 'px ' . $styledata[207] . ';
            border-color: ' . $styledata[210] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 190) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 230) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 246) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 212) . ';
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover{
            color: ' . $styledata[218] . ';
            background: ' . $styledata[220] . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 224) . ';
            border-color: ' . $styledata[222] . ';
         } 
        @media only screen and (min-width : 669px) and (max-width : 993px){  
            .oxi-addons-wrapper-' . $oxiid . '{ 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 10) . '; 
                display: block;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 152) . '; 
             }  
              .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons{
                font-size: ' . $styledata[26] . 'px;  
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 52) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';   
                width: '.$styledata[268].'px;
                height: '.$styledata[268].'px;  
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two{
                font-size: ' . $styledata[78] . 'px;  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 92) . '; 
             } 
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail{
                font-size: ' . $styledata[113] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 125) . '; 
             }  
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link{ 
                font-size: ' . $styledata[175] . 'px; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 191) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 231) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 247) . ';  
            } 
        }
        @media only screen and (max-width : 668px){ 
            .oxi-addons-wrapper-' . $oxiid . '{ 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . '; 
                display: block;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-hide-sm{
                display: none;
             }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 153) . '; 
             }  
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons{
                font-size: ' . $styledata[27] . 'px;  
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 53) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';   
                width: '.$styledata[269].'px;
                height: '.$styledata[269].'px;   
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two{
                font-size: ' . $styledata[79] . 'px;  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 93) . '; 
                text-align:center;
             } 
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail{
                font-size: ' . $styledata[114] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 126) . '; 
                text-align:center;
             }  
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link{ 
                font-size: ' . $styledata[176] . 'px; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 192) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 232) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 248) . ';  
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-button{
                text-align: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-icon{
                justify-content: center;
            } 
        }';
    if($styledata[3] == 'right'){
        $css .= '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left .oxi-addons-image{
                    height: auto;
                    max-width: '.$styledata[145].'%;
                    width: '.$styledata[145].'%;
                    transform:translateX(-'.(100 - (( 100 / $styledata[145]) * 100)).'%);
                } 
                @media only screen and (min-width : 669px) and (max-width : 993px){

                    .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left .oxi-addons-image{
                        height: auto;
                        max-width: '.$styledata[146].'%;
                        width: '.$styledata[146].'%;
                        transform:translateX(-'.(100 - (( 100 / $styledata[146]) * 100)).'%);
                    } 
                }
                @media only screen and (max-width : 668px){ 
                    .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left .oxi-addons-image{
                        height: auto;
                        max-width: '.$styledata[147].'%;
                        width: '.$styledata[147].'%;
                        transform:translateX(-'.(100 - (( 100 / $styledata[147]) * 100)).'%);
                    } 
                }';
                if($styledata[263] == 'auto'){
                    $css .= '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left .oxi-addons-image{ 
                        max-width: 100%;
                        width:  auto !important;
                        transform:translateX(-0%) !important; 
                    }';
                }

    }
    echo OxiAddonsInlineCSSData($css);
}

;
