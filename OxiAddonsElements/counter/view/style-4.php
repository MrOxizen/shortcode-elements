<?php

if (!defined('ABSPATH'))
    exit;

function oxi_counter_style_4_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    echo oxi_addons_public_waypoints();
    $stylename = $styledata['style_name'];
    $datatype = $styledata['type'] . 'data';
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    echo '<div class="oxi-addons-row">
            <div class="oxi-addons-wrapper-' . $oxiid . '">';
    foreach ($listdata as $value) {
        $listfiles = explode('||#||', $value['files']);
        $title = $number = '';
        echo '<div class = "' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '">
                            <div class="oxi-addons-counter-' . $oxiid . '">
                                <div class="oxi-addons-counter ">';
        if (!empty($listfiles[1])) {
            $number = '<div class="oxi-addons-number "> <span class="oxi-number-' . $oxiid . '">' . OxiAddonsTextConvert($listfiles[1]) . '</span> + </div>
                                  ';
        }
        if (!empty($listfiles[3])) {
            $title = '<div class="oxi-addons-title">' . OxiAddonsTextConvert($listfiles[3]) . '</div>';
        }

        $rearrange = explode(',', $styledata[109]);
        foreach ($rearrange as $arrange) {
            echo $$arrange;
        }
        echo '</div> ';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                                        <div class="oxi-addons-admin-absulate-edit">
                                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEdit$datatype") . '
                                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                            </form>
                                        </div>
                                        <div class="oxi-addons-admin-absulate-delete">
                                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDelete$datatype") . '
                                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                            </form>
                                        </div>
                                    </div>';
        }
        echo '</div>
                </div>';
    }
    echo '</div>
        </div>';
    $css .= '  
        .oxi-addons-wrapper-' . $oxiid . '{
            width: 100%;
            float: left; 
            overflow: hidden;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-admin-absulote{
            top: 0;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-counter-' . $oxiid . '{
            width: 100%;
            float: left;  
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 27) . ';
        }
        .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-counter {
            width: 100%;
            float: left;  
            ' . OxiAddonsBGImage($styledata, 7) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';
             ' . OxiAddonsBoxShadowSanitize($styledata, 43) . ';
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-number{
            float:left;
            width:100%;
            font-size: ' . $styledata[53] . 'px;
            color:' . $styledata[63] . ';
            ' . OxiAddonsFontSettings($styledata, 57) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title{
            float:left;
            width:100%;
            font-size: ' . $styledata[81] . 'px;
            color:' . $styledata[91] . ';
            ' . OxiAddonsFontSettings($styledata, 85) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 93) . ';
        }
        @media only screen and (min-width : 669px) and (max-width : 993px){ 
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-counter-' . $oxiid . '{ 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 28) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-counter { 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 12) . '; 
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-number{ 
                font-size: ' . $styledata[54] . 'px; 
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 66) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title{ 
                font-size: ' . $styledata[82] . 'px; 
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 94) . ';
            }  
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-counter-' . $oxiid . '{ 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-counter { 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . '; 
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-number{ 
                font-size: ' . $styledata[55] . 'px; 
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 67) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title{ 
                font-size: ' . $styledata[83] . 'px; 
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 95) . ';
            }  
        }';
    $jquery = 'jQuery(".oxi-number-' . $oxiid . '").counterUp({
                        delay: ' . ($styledata[51] * 1000) . ',
                        time: ' . ($styledata[49] * 1000) . '
                })';

    echo OxiAddonsInlineCSSData($css);
    echo oxi_addons_elements_stylejs('jquery-counterup-min', 'counter', 'js');
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-jquery-counterup-min');
}
