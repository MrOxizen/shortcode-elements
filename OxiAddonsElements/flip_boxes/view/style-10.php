<?php

if (!defined('ABSPATH'))
    exit;

/**
 * The code that runs during carousel js loading.
 */
function oxi_flip_boxes_style_10_shortcode($styledata = FALSE, $listdata = array(), $user = 'user')
{
    echo oxi_addons_elements_stylejs('flip-boxes', 'flip_boxes');
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $css = '';
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $fronticon = $front_hadding = $backicon= $backinfo = $fileslinkend = '';
        if ($data[1] != '') {
            $fronticon .= '<div class="oxi-addons-flip-box-front-icon">
                    ' . oxi_addons_font_awesome($data[1]) . '
                    </div>';
        }
        if ($data[3] != '') {
            $front_hadding .= '<div class="oxi-addons-flip-box-front-headding">
                            ' . OxiAddonsTextConvert($data[3]) . '
                            </div> ';
        }
        if ($data[5] != '') {
            $backicon .= '<div class="oxi-addons-flip-box-back-icon">
                        ' . oxi_addons_font_awesome($data[5]) . '
                        </div>';
        }
        if ($data[7] != '') {
            $backinfo .= '<div class="oxi-addons-flip-box-back-info">
                        ' . OxiAddonsTextConvert($data[7]) . '
                        </div>';
        }
        echo '       <div class="' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '"    ' . OxiAddonsAnimation($styledata, 53) . '>';
        if ($data[9] != '') {
            echo '<a href="' . OxiAddonsUrlConvert($data[9]) . '">';
            $fileslinkend = '</a>';
        }
                   echo'<div class="oxi-addons-flip-box-' . $oxiid . '">
                            <div class="oxi-addons-flip-boxes-body">
                                <div class="oxi-addons-flip-boxes-body-data">
                                    <div class="oxi-addons-flip-box-flip ' . $styledata[7] . '">
                                        <div class="oxi-addons-flip-box-flip-data ' . $styledata[9] . '">
                                            <div class="oxi-addons-flip-box-style">
                                                <div class="oxi-addons-flip-box-front">
                                                    <div class="oxi-addons-flip-box-front-section-box">
                                                        <div class="oxi-addons-flip-box-front-section">
                                                            '.$fronticon.' 
                                                            '.$front_hadding.'
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="oxi-addons-flip-box-back">
                                                    <div class="oxi-addons-flip-box-back-section-box">
                                                        <div class="oxi-addons-flip-box-back-section">
                                                            '.$backicon.'
                                                            '.$backinfo.'
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                                        <div class="oxi-addons-admin-absulate-edit">
                                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditflip_boxesdata") . '
                                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                            </form>
                                        </div>
                                        <div class="oxi-addons-admin-absulate-delete">
                                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteflip_boxesdata") . '
                                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                            </form>
                                        </div>
                                    </div>';
        }
        echo $fileslinkend;
        echo '</div>';
    }
    echo '</div>
        </div>';
    $css = '
        .oxi-addons-container .oxi-addons-flip-box-' . $oxiid . ' *{
            -webkit-transition: all  ' . $styledata[11] . 's ease-in-out;
            -moz-transition: all  ' . $styledata[11] . 's ease-in-out;
            transition: all  ' . $styledata[11] . 's ease-in-out;
            text-decoration: none;    
        }
        .oxi-addons-flip-box-' . $oxiid . '{
            max-width: ' . $styledata[13] . 'px;
            height: ' . $styledata[17] . 'px;
            width: 100%;
            margin: 0 auto;
            position: relative;
            padding :  ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . '; 
            overflow: hidden;
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-boxes-body:after {    
            padding-bottom: ' . ($styledata[17] / $styledata[13] * 100) . '%;
            content: "";
            display: block;
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section-box {
            width: 100%;
            height: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 109) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . '; 
            border-style: ' . $styledata[89] . ';
            border-color: ' . $styledata[90] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . '; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 93) . '; 
            ' . OxiAddonsBGImage($styledata, 69) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 57) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon {
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 349) . ';
            text-align: center;
            width: 100%;
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons {
            font-size:  ' . $styledata[129] . 'px;
            width: ' . $styledata[125] . 'px;
            height: ' . $styledata[125] . 'px;
            color: ' . $styledata[133] . ';
            background: ' . $styledata[135] . ';
            line-height: ' . $styledata[125] . 'px;
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 137) . '; 
            border-style: ' . $styledata[153] . ';
            border-color: ' . $styledata[154] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding {
            width: 100%;
            font-size:  ' . $styledata[173] . 'px;
            color:  ' . $styledata[177] . ';
            ' . OxiAddonsFontSettings($styledata, 179) . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 185) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section-box {
            width: 100%;
            height: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 241) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            ' . OxiAddonsBGImage($styledata, 201) . ';
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 205) . '; 
            border-style: ' . $styledata[221] . ';
            border-color: ' . $styledata[222] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 225) . '; 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . '; 
            ' . OxiAddonsBoxShadowSanitize($styledata, 63) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon {
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 305) . ';
            text-align: center;
            width: 100%;
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon .oxi-icons {
            font-size:  ' . $styledata[261] . 'px;
            width: ' . $styledata[257] . 'px;
            height: ' . $styledata[257] . 'px;
            color: ' . $styledata[265] . ';
            background: ' . $styledata[267] . ';
            line-height: ' . $styledata[257] . 'px;
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 269) . '; 
            border-style: ' . $styledata[285] . ';
            border-color: ' . $styledata[286] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 289) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info {
            width: 100%;
            font-size:  ' . $styledata[321] . 'px;
            color:  ' . $styledata[325] . ';
            ' . OxiAddonsFontSettings($styledata, 327) . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 333) . '; 
        }

        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-flip-box-' . $oxiid . '{
                max-width: ' . $styledata[14] . 'px;
                height: ' . $styledata[18] . 'px;
                padding :  ' . OxiAddonsPaddingMarginSanitize($styledata, 38) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-boxes-body:after {    
                padding-bottom: ' . ($styledata[18] / $styledata[14] * 100) . '%;
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section-box {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 110) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section {
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 74) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 94) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 350) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons {
                font-size:  ' . $styledata[130] . 'px;
                width: ' . $styledata[126] . 'px;
                height: ' . $styledata[126] . 'px;
                line-height: ' . $styledata[126] . 'px;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 138) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 158) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding {
                font-size:  ' . $styledata[174] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 186) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section-box {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 242) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section {
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 206) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 226) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 306) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon .oxi-icons {
                font-size:  ' . $styledata[262] . 'px;
                width: ' . $styledata[258] . 'px;
                height: ' . $styledata[258] . 'px;
                line-height: ' . $styledata[258] . 'px;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 270) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 290) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info {
                font-size:  ' . $styledata[322] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 334) . '; 
            }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-flip-box-' . $oxiid . '{
                max-width: ' . $styledata[15] . 'px;
                height: ' . $styledata[19] . 'px;
                padding :  ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-boxes-body:after {    
                padding-bottom: ' . ($styledata[19] / $styledata[15] * 100) . '%;
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section-box {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 111) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section {
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 75) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 95) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 351) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons {
                font-size:  ' . $styledata[131] . 'px;
                width: ' . $styledata[127] . 'px;
                height: ' . $styledata[127] . 'px;
                line-height: ' . $styledata[127] . 'px;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 139) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 159) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding {
                font-size:  ' . $styledata[175] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section-box {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 243) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section {
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 207) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 227) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 307) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon .oxi-icons {
                font-size:  ' . $styledata[263] . 'px;
                width: ' . $styledata[259] . 'px;
                height: ' . $styledata[259] . 'px;
                line-height: ' . $styledata[259] . 'px;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 271) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 291) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info {
                font-size:  ' . $styledata[323] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 335) . '; 
            }
        }';
    echo OxiAddonsInlineCSSData($css);
}
