<?php

if (!defined('ABSPATH'))
    exit;

/**
 * The code that runs during carousel js loading.
 */
function oxi_flip_boxes_style_23_shortcode($styledata = FALSE, $listdata = array(), $user = 'user')
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
        $fronticon = $front_hadding =  $front_info = $back_icon = $back_hadding = $backinfo = $fileslinkend ='';
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
            $front_info .= '<div class="oxi-addons-flip-box-front-info">
                            ' . OxiAddonsTextConvert($data[5]) . '
                            </div> ';
        }
        if ($data[7] != '') {
            $back_icon .= '<div class="oxi-addons-flip-box-back-icon">
                                ' . oxi_addons_font_awesome($data[7]) . '
                        </div>';
        }
        if ($data[9] != '') {
            $back_hadding .= '<div class="oxi-addons-flip-box-back-headding">
                            ' . OxiAddonsTextConvert($data[9]) . '
                            </div>';
        }
        if ($data[11] != '') {
            $backinfo .= '<div class="oxi-addons-flip-box-back-info">
                        ' . OxiAddonsTextConvert($data[11]) . '
                        </div>';
        }
        echo '      <div class="' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '"    ' . OxiAddonsAnimation($styledata, 53) . '>';
                    if ($data[13] != '') {
                        echo '<a href="' . OxiAddonsUrlConvert($data[13]) . '">';
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
                                                            '.$front_info.'
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="oxi-addons-flip-box-back">
                                                    <div class="oxi-addons-flip-box-back-section-box">
                                                        <div class="oxi-addons-flip-box-back-section">
                                                            '.$back_icon.'
                                                            '.$back_hadding.'
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
            ' . OxiAddonsBGImage($styledata, 69) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . '; 
            ' . OxiAddonsBoxShadowSanitize($styledata, 57) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . '; 
            border-style: ' . $styledata[89] . ';
            border-color: ' . $styledata[90] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . '; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 93) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon {
            text-align: center;
            width: 100%;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 429) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons {
            font-size:  ' . $styledata[133] . 'px;
            width: ' . $styledata[125] . '%;
            background: ' . $styledata[139] . ';
            color: ' . $styledata[137] . ';
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 141) . '; 
            border-style: ' . $styledata[157] . ';
            border-color: ' . $styledata[158] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 161) . '; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 177) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding {
            width: 100%;
            font-size:  ' . $styledata[193] . 'px;
            color:  ' . $styledata[197] . ';
            ' . OxiAddonsFontSettings($styledata, 199) . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 205) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-info {
            width: 100%;
            font-size:  ' . $styledata[221] . 'px;
            color:  ' . $styledata[225] . ';
            ' . OxiAddonsFontSettings($styledata, 227) . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 233) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section-box {
            width: 100%;
            height: 100%;
            float: left;
            ' . OxiAddonsBGImage($styledata, 249) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 289) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . '; 
            ' . OxiAddonsBoxShadowSanitize($styledata, 63) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 253) . '; 
            border-style: ' . $styledata[269] . ';
            border-color: ' . $styledata[270] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . '; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 273) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon {
            text-align: center;
            width: 100%;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 445) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon .oxi-icons {
            width: ' . $styledata[305] . '%;
            background: ' . $styledata[319] . ';
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 321) . '; 
            border-style: ' . $styledata[337] . ';
            border-color: ' . $styledata[338] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 341) . '; 
            font-size:  ' . $styledata[313] . 'px;
            color: ' . $styledata[317] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 357) . ';
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding {
            width: 100%;
            font-size:  ' . $styledata[373] . 'px;
            color:  ' . $styledata[377] . ';
            ' . OxiAddonsFontSettings($styledata, 379) . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 385) . '; 
        }
        .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info {
            width: 100%;
            font-size:  ' . $styledata[401] . 'px;
            color:  ' . $styledata[405] . ';
            ' . OxiAddonsFontSettings($styledata, 407) . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 413) . '; 
        }
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-flip-box-' . $oxiid . '{
                max-width: ' . $styledata[14] . 'px;
                height: ' . $styledata[18] . 'px;
                padding :  ' . OxiAddonsPaddingMarginSanitize($styledata, 38) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-boxes-body:after {    
                padding-bottom: ' . ($styledata[18] / $styledata[14] * 100) . '%;
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section-box {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 110) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section {
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 74) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 94) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 430) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons {
                font-size:  ' . $styledata[134] . 'px;
                width: ' . $styledata[126] . '%;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 142) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 162) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 178) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding {
                font-size:  ' . $styledata[194] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 206) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-info {
                font-size:  ' . $styledata[222] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 234) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section-box {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 290) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section {
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 254) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 274) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 446) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon .oxi-icons {
                width: ' . $styledata[306] . '%;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 322) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 342) . '; 
                font-size:  ' . $styledata[314] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 358) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding {
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 386) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info {
                font-size:  ' . $styledata[402] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 414) . '; 
            }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-flip-box-' . $oxiid . '{
                max-width: ' . $styledata[15] . 'px;
                height: ' . $styledata[19] . 'px;
                padding :  ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-boxes-body:after {    
                padding-bottom: ' . ($styledata[19] / $styledata[15] * 100) . '%;
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section-box {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 111) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section {
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 75) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 95) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 431) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons {
                font-size:  ' . $styledata[135] . 'px;
                width: ' . $styledata[127] . '%;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 143) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 163) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 179) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding {
                font-size:  ' . $styledata[195] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 207) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-info {
                font-size:  ' . $styledata[223] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 235) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section-box {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 291) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section {
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 255) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 275) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 447) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-icon .oxi-icons {
                width: ' . $styledata[307] . '%;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 323) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 343) . '; 
                font-size:  ' . $styledata[315] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 359) . ';
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding {
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 387) . '; 
            }
            .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info {
                font-size:  ' . $styledata[403] . 'px;
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 415) . '; 
            }
        }';
    echo OxiAddonsInlineCSSData($css);
}
