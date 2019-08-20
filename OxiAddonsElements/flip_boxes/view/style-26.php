<?php

if (!defined('ABSPATH'))
    exit;

/**
 * The code that runs during carousel js loading.
 */
function oxi_flip_boxes_style_26_shortcode($styledata = FALSE, $listdata = array(), $user = 'user')
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
        $icon = $front_hadding = $front_info  = $back_hadding = $backinfo = $button = '';
        if ($data[1] != '') {
            $front_hadding .= '<div class="oxi-addons-flip-box-front-headding">
                            ' . OxiAddonsTextConvert($data[1]) . '
                                <span class="oxi-addons-flip-box-front-headding-border"></span>
                            </div> ';
        }
        if ($data[3] != '') {
            $front_info .= '<div class="oxi-addons-flip-box-front-info">
            ' . OxiAddonsTextConvert($data[3]) . '
            </div> ';
        }
        if ($data[5] != '') {
            $back_hadding .= '<div class="oxi-addons-flip-box-back-headding">
                            ' . OxiAddonsTextConvert($data[5]) . '
                                <span class="oxi-addons-flip-box-back-headding-border"></span>
                            </div>';
        }
        if ($data[7] != '') {
            $backinfo .= '<div class="oxi-addons-flip-box-back-info">
                        ' . OxiAddonsTextConvert($data[7]) . '
                        </div>';
        }
        if ($data[9] != '') {
            $button .= '<div class="oxi-addons-flip-box-back-button">
                            <a href="' . OxiAddonsUrlConvert($data[11]) . '" class="oxi-addons-flip-box-back-link" >' . OxiAddonsTextConvert($data[9]) . '</a>
                        </div>';
        }
        echo '       <div class="' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '"    ' . OxiAddonsAnimation($styledata, 53) . '>
                        <div class="oxi-addons-flip-box-' . $oxiid . '">
                            <div class="oxi-addons-flip-boxes-body">
                                <div class="oxi-addons-flip-boxes-body-data">
                                    <div class="oxi-addons-flip-box-flip ' . $styledata[7] . '">
                                        <div class="oxi-addons-flip-box-flip-data ' . $styledata[9] . '">
                                            <div class="oxi-addons-flip-box-style">
                                                <div class="oxi-addons-flip-box-front">
                                                    <div class="oxi-addons-flip-box-front-section-box">
                                                        <div class="oxi-addons-flip-box-front-section">
                                                            '.$front_hadding.' 
                                                            '.$front_info.'
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="oxi-addons-flip-box-back">
                                                    <div class="oxi-addons-flip-box-back-section-box">
                                                        <div class="oxi-addons-flip-box-back-section">
                                                            '.$back_hadding.'
                                                            '.$backinfo.'
                                                            '.$button.'
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
            ' . OxiAddonsBGImage($styledata, 69) . ';
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . '; 
            border-style: ' . $styledata[89] . ';
            border-color: ' . $styledata[90] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . '; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 93) . '; 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . '; 
            ' . OxiAddonsBoxShadowSanitize($styledata, 57) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding {
            width: 100%;
            position: relative;
            font-size:  ' . $styledata[125] . 'px;
            color:  ' . $styledata[129] . ';
            ' . OxiAddonsFontSettings($styledata, 131) . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 137) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding-border {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: ' . $styledata[153] . 'px;
            height: ' . $styledata[157] . 'px;
            background: ' . $styledata[161] . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-info {
            width: 100%;
            font-size:  ' . $styledata[163] . 'px;
            color:  ' . $styledata[167] . ';
            ' . OxiAddonsFontSettings($styledata, 169) . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 175) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section-box {
            width: 100%;
            height: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 231) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            ' . OxiAddonsBGImage($styledata, 191) . ';
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 195) . '; 
            border-style: ' . $styledata[211] . ';
            border-color: ' . $styledata[212] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 215) . '; 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . '; 
            ' . OxiAddonsBoxShadowSanitize($styledata, 63) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding {
            width: 100%;
            font-size:  ' . $styledata[247] . 'px;
            color:  ' . $styledata[251] . ';
            ' . OxiAddonsFontSettings($styledata, 253) . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 259) . '; 
            position: relative;
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding-border {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: ' . $styledata[275] . 'px;
            height: ' . $styledata[279] . 'px;
            background: ' . $styledata[283] . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info {
            width: 100%;
            font-size:  ' . $styledata[285] . 'px;
            color:  ' . $styledata[289] . ';
            ' . OxiAddonsFontSettings($styledata, 291) . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 297) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-button {
            width: 100%;
            float: left;
            text-align: center;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 379) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link {
            display: inline-block;
            font-size:  ' . $styledata[313] . 'px;
            color:  ' . $styledata[317] . ';
            background: ' . $styledata[319] . ';
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 321) . '; 
            border-style: ' . $styledata[337] . ';
            border-color: ' . $styledata[338] . ';
            ' . OxiAddonsFontSettings($styledata, 341) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 347) . '; 
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 363) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link:hover {
            color: ' . $styledata[395] . ';
            background: ' . $styledata[397] . ';
            border-style: ' . $styledata[399] . ';
            border-color: ' . $styledata[400] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 403) . '; 
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
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding {
                font-size:  ' . $styledata[126] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 138) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding-border {
                width: ' . $styledata[154] . 'px;
                height: ' . $styledata[158] . 'px;
                background: ' . $styledata[162] . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-info {
                font-size:  ' . $styledata[164] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 176) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section-box {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 232) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section {
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 196) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 216) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding {
                font-size:  ' . $styledata[248] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 260) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding-border {
                width: ' . $styledata[276] . 'px;
                height: ' . $styledata[280] . 'px;
                background: ' . $styledata[284] . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info {
                font-size:  ' . $styledata[286] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 298) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-button {
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 380) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link {
                font-size:  ' . $styledata[314] . 'px;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 322) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 348) . '; 
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 364) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link:hover {
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 404) . '; 
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
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding {
                font-size:  ' . $styledata[127] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 139) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding-border {
                width: ' . $styledata[155] . 'px;
                height: ' . $styledata[159] . 'px;
                background: ' . $styledata[163] . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-info {
                font-size:  ' . $styledata[165] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 177) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section-box {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 233) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section {
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 197) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 217) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding {
                font-size:  ' . $styledata[249] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 261) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding-border {
                width: ' . $styledata[277] . 'px;
                height: ' . $styledata[281] . 'px;
                background: ' . $styledata[285] . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info {
                font-size:  ' . $styledata[287] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 299) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-button {
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 381) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link {
                font-size:  ' . $styledata[315] . 'px;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 323) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 349) . '; 
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 365) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link:hover {
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 405) . '; 
            }
        }';
    echo OxiAddonsInlineCSSData($css);
}
