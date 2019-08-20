<?php

if (!defined('ABSPATH'))
    exit;

function oxi_opening_hours_style_4_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $css = '';
    echo ' <div class="oxi-addons-container">
          <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $listitemdata = explode('||#||', $value['files']);
        $day = $times = $icon = '';
        if ($listitemdata[2] != '') {
            $day = '<div class="oxi-addonsOH-F-heading">
                                <div class="oxi-addonsOH-F-heading-text">
                                       ' . OxiAddonsTextConvert($listitemdata[2]) . '
                                </div>
                            </div>';
        }
        if ($listitemdata[4] != '') {
            $times = '<div class="oxi-addonsOH-F-date">' . OxiAddonsTextConvert($listitemdata[4]) . '</div>';
        }
        if ($stylefiles[2] != '') {
            $icon = '<div class="oxi-addonsOH-F-icon">' . oxi_addons_font_awesome($stylefiles[2]) . '</div>';
        }



        echo '<div class="' . OxiAddonsItemRows($styledata, 171) . '  ' . OxiAddonsAdminDefine($user) . '">
                  <div class="oxi-addonsOH-F-wrapper-' . $oxiid . ' oxi-addonsOH-F-wrapper-' . $oxiid . '-' . $value['id'] . '">
                    <div class="oxi-addonsOH-F-row" ' . OxiAddonsAnimation($styledata, 85) . '>
                        <div class="oxi-addonsOH-F-content">
                            ' . $icon . '
                            <div class="oxi-addonsOH-F-C-T">
                                ' . $day . '
                                ' . $times . '
                            </div>
                        </div>
                    </div>
                </div> ';
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
        echo '</div>';
    }
    echo '  </div></div>';
    $css .= '.oxi-addonsOH-F-wrapper-' . $oxiid . '{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 63) . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-row{
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
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-content{
            width: 100%;
            float: left;
            display: flex;
            
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon{
                display: flex;
                justify-content: center;
                flex-grow: 2;
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons{
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: ' . $styledata[149] . 'px;
            color: ' . $styledata[153] . ';
            margin:  ' . OxiAddonsPaddingMarginSanitize($styledata, 155) . ';
            width: ' . $styledata[177] . 'px;
            height: ' . $styledata[181] . 'px;
            background: ' . $styledata[175] . ';
            border-radius:  ' . OxiAddonsPaddingMarginSanitize($styledata, 185) . ';
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 205) . ' ;
            border-style: ' . $styledata[201] . ';
            border-color: ' . $styledata[202] . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-C-T{
                flex-grow: 10;
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . '  .oxi-addonsOH-F-heading{
            width: 100%;
            float: left;
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-heading-text{
            width: 100%;
            font-size: ' . $styledata[89] . 'px;
            color: ' . $styledata[93] . ';
            ' . OxiAddonsFontSettings($styledata, 95) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-date{
            width: 100%;
            float: left;
            font-size: ' . $styledata[117] . 'px;
            color: ' . $styledata[121] . ';
            ' . OxiAddonsFontSettings($styledata, 123) . ';
             margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
        }

         @media only screen and (min-width : 669px) and (max-width : 993px){

           .oxi-addonsOH-F-wrapper-' . $oxiid . '{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 64) . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-row{
            max-width: ' . $styledata[146] . 'px;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 32) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 48) . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons{
            font-size: ' . $styledata[150] . 'px;
            margin:  ' . OxiAddonsPaddingMarginSanitize($styledata, 156) . ';
            width: ' . $styledata[178] . 'px;
            height: ' . $styledata[182] . 'px;
            border-radius:  ' . OxiAddonsPaddingMarginSanitize($styledata, 186) . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-heading-text{
            font-size: ' . $styledata[90] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-date{
            font-size: ' . $styledata[118] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';
        }
         }
         @media only screen and (max-width : 668px){
        .oxi-addonsOH-F-wrapper-' . $oxiid . '{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-row{
            max-width: ' . $styledata[147] . 'px;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons{
            font-size: ' . $styledata[151] . 'px;
            margin:  ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . ';
            width: ' . $styledata[179] . 'px;
            height: ' . $styledata[183] . 'px;
            border-radius:  ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-heading-text{
            font-size: ' . $styledata[91] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
        }
        .oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-date{
            font-size: ' . $styledata[119] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';
        }

         }';
    echo OxiAddonsInlineCSSData($css);
}
