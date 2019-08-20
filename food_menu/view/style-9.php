<?php

if (!defined('ABSPATH'))
    exit;

function oxi_food_menu_style_9_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo '<div class="oxi-addons-container">
          <div class="oxi-addons-row">
                <div class="oxi-addonsFM-wrapper-' . $oxiid . '">
                    <div class="oxi-addonsFM-row" ' . OxiAddonsAnimation($styledata, 61) . '>
                        <div class="oxi-addonsFM-content-body">
                            <div class="oxi-addonsFM-text-body">';
    foreach ($listdata as $value) {
        $listitemdata = explode('||#||', $value['files']);
        $heading = $price = '';
        if ($listitemdata[2] != '') {
            $heading = '<div class="oxi-addonsFM-TH-heading">
                                                       ' . OxiAddonsTextConvert($listitemdata[2]) . '
                                                    </div>';
        }
        if ($listitemdata[4] != '') {
            $price = '<div class="oxi-addonsFM-TH-price">' . OxiAddonsTextConvert($listitemdata[4]) . '</div>';
        }




        echo '<div class="' . OxiAddonsItemRows($styledata, 203) . '  ' . OxiAddonsAdminDefine($user) . '">
                                      <a href="' . OxiAddonsUrlConvert($listitemdata[6]) . '" target="' . $styledata[209] . '">
                                        <div class="oxi-addonsFM-TH-heading-body">
                                            ' . $heading . '
                                            ' . $price . '
                                        </div>
                                      </a> ';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                                                    <div class="oxi-addons-admin-absulate-edit">
                                                        <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditfood_menudata") . '
                                                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                            <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                                        </form>
                                                    </div>
                                                    <div class="oxi-addons-admin-absulate-delete">
                                                        <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletefood_menudata") . '
                                                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                            <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>';
        }
        echo '</div>';
    }
    echo '</div>
                        </div>
                    </div> 
                </div>   
            </div></div>';

    $css = '.oxi-addonsFM-wrapper-' . $oxiid . '{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-row{
            width: 100%;
            max-width: ' . $styledata[149] . 'px;
            margin: 0 auto;
            overflow: auto;
            ' . OxiAddonsBGImage($styledata, 241) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 55) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-content-body{
            width: 100%;
            float: left;
            display: flex;
            border: ' . $styledata[79] . 'px ' . $styledata[80] . ' ' . $styledata[83] . ';
            ' . OxiAddonsBGImage($styledata, 75) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-text-body{
            flex-grow: 10;
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-heading-body{
            width: 100%;
            float: left;
            display: flex;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price{
            flex-grow: 60;
            font-size: ' . $styledata[117] . 'px;
            color: ' . $styledata[121] . ';
            ' . OxiAddonsFontSettings($styledata, 123) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price:after{
            content: "";
            width: 100%;
            float: left;
            border-bottom: ' . $styledata[235] . 'px ' . $styledata[236] . ' ' . $styledata[239] . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-heading{
            flex-grow: 1;
            font-size: ' . $styledata[175] . 'px;
            color: ' . $styledata[179] . ';
            ' . OxiAddonsFontSettings($styledata, 181) . ';
        }



    @media only screen and (min-width : 669px) and (max-width : 993px){
        .oxi-addonsFM-wrapper-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 40) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 24) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-content-body{
            flex-direction: column;
            text-align:center;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-text-body{
           width: 100%;
           float: left;
        }
        .oxi-addonsFM-TH-heading-body{
            flex-direction: column;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 188) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price{
            width: 100%;
            float: left;
            text-align: center;
            font-size: ' . $styledata[118] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price:after{
            border:none
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price:before{
            content: "";
            width: 100%;
            float: left;
            border-bottom: ' . $styledata[235] . 'px ' . $styledata[236] . ' ' . $styledata[239] . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-heading{
            width: 100%;
            float: left;
            font-size: ' . $styledata[176] . 'px;
            text-align: center;
        }
           

         }
         @media only screen and (max-width : 668px){
          .oxi-addonsFM-wrapper-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 41) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-content-body{
            flex-direction: column;
            text-align:center;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-text-body{
           width: 100%;
           float: left;
        }
        .oxi-addonsFM-TH-heading-body{
            flex-direction: column;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 189) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price{
            width: 100%;
            float: left;
            text-align: center;
            font-size: ' . $styledata[119] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price:after{
            border:none
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price:before{
            content: "";
            width: 100%;
            float: left;
            border-bottom: ' . $styledata[235] . 'px ' . $styledata[236] . ' ' . $styledata[239] . ';
        }
        .oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-heading{
            width: 100%;
            float: left;
            font-size: ' . $styledata[177] . 'px;
            text-align: center;
        }
          

         }';
    echo OxiAddonsInlineCSSData($css);
}
