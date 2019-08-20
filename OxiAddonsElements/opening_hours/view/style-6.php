<?php

if (!defined('ABSPATH'))
    exit;

function oxi_opening_hours_style_6_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $css = '';
    echo ' <div class="oxi-addons-container">
          <div class="oxi-addons-row">
                <div class="oxi-addonsOH-SX-wrapper-' . $oxiid . ' oxi-addonsOH-SX-wrapper-' . $oxiid . '">
                    <div class="oxi-addonsOH-SX-row" ' . OxiAddonsAnimation($styledata, 85) . '>';
    foreach ($listdata as $value) {
        $listitemdata = explode('||#||', $value['files']);
        $day = $times = $icon = '';
        if ($listitemdata[2] != '') {
            $day = '<div class="oxi-addonsOH-SX-heading">
                                <div class="oxi-addonsOH-SX-heading-text">
                                       ' . OxiAddonsTextConvert($listitemdata[2]) . '
                                </div>
                            </div>';
        }
        if ($listitemdata[4] != '') {
            $times = '<div class="oxi-addonsOH-SX-date">' . OxiAddonsTextConvert($listitemdata[4]) . '</div>';
        }
        if ($stylefiles[2] != '') {
            $icon = '<div class="oxi-addonsOH-SX-icon">' . oxi_addons_font_awesome($stylefiles[2]) . '</div>';
        }



        echo '<div class="oxi-addonsOH-SX-child ' . OxiAddonsItemRows($styledata, 3) . ' ">
                        <div class="oxi-addonsOH-SX-content ' . OxiAddonsAdminDefine($user) . '">
                            ' . $icon . '
                            ' . $day . '
                            ' . $times . '
                        ';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                            <div class="oxi-addons-admin-absulate-edit">
                                <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditopening_hoursdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                </form>
                            </div>
                            <div class="oxi-addons-admin-absulate-delete">
                                <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteopening_hoursdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                </form>
                            </div>
                        </div>';
        }
        echo '</div></div>';
    }
    echo '</div> </div> </div></div>';
    $css .= '.oxi-addonsOH-SX-wrapper-' . $oxiid . '{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 63) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row{
            width: 100%;
            margin: 0 auto;
            max-width: ' . $styledata[145] . 'px;
            ' . OxiAddonsBGImage($styledata, 7) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 79) . ';
            overflow: hidden;
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ' ;
            border-style: ' . $styledata[11] . ';
            border-color: ' . $styledata[12] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 47) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-content{
            width: 100%;
            float: left;
            display: flex;
            border-bottom: ' . $styledata[171] . 'px ' . $styledata[172] . '  ' . $styledata[175] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 177) . ';
            transition: .8s;
            
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-child:last-child .oxi-addonsOH-SX-content{
           border-bottom: 0px; 
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-content:hover{
            padding-left: 14px;
            padding-right: 14px;
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-icon{
            display: flex;
            justify-content: center;
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-icon .oxi-icons{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: ' . $styledata[149] . 'px;
            color: ' . $styledata[153] . ';
            margin:  ' . OxiAddonsPaddingMarginSanitize($styledata, 155) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . '  .oxi-addonsOH-SX-heading{
            width: 100%;
            float: left;
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-heading-text{
            width: 100%;
            font-size: ' . $styledata[89] . 'px;
            color: ' . $styledata[93] . ';
            ' . OxiAddonsFontSettings($styledata, 95) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-date{
            width: 100%;
            float: left;
            font-size: ' . $styledata[117] . 'px;
            color: ' . $styledata[121] . ';
            ' . OxiAddonsFontSettings($styledata, 123) . ';
             margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
        }

         @media only screen and (min-width : 669px) and (max-width : 993px){

           .oxi-addonsOH-SX-wrapper-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 64) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row{
            max-width: ' . $styledata[146] . 'px;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 32) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 48) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-content{
           padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 178) . ';
            
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-icon .oxi-icons{
            font-size: ' . $styledata[150] . 'px;
            margin:  ' . OxiAddonsPaddingMarginSanitize($styledata, 156) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-heading-text{
            font-size: ' . $styledata[90] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-date{
            font-size: ' . $styledata[118] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';
        }

         }
         @media only screen and (max-width : 668px){
                 .oxi-addonsOH-SX-wrapper-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row{
            max-width: ' . $styledata[147] . 'px;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-content{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 179) . ';
            
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-icon .oxi-icons{
            font-size: ' . $styledata[151] . 'px;
            margin:  ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-heading-text{
            font-size: ' . $styledata[91] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
        }
        .oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-date{
            font-size: ' . $styledata[119] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';
        }

         }';
    echo OxiAddonsInlineCSSData($css);
}
