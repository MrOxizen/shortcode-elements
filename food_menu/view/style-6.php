<?php

if (!defined('ABSPATH'))
    exit;

function oxi_food_menu_style_6_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $css = '';
    echo ' <div class="oxi-addons-container">
          <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $listitemdata = explode('||#||', $value['files']);
        $heading = $price = $rating = $info = $image = '';
        if ($listitemdata[2] != '') {
            $heading = '<div class="oxi-addonsFM-SI-heading">
                               ' . OxiAddonsTextConvert($listitemdata[2]) . '
                            </div>';
        }
        if ($listitemdata[6] != '') {
            $price = '<div class="oxi-addonsFM-SI-price">' . OxiAddonsTextConvert($listitemdata[6]) . '</div>';
        }
        if ($listitemdata[12] != '') {
            $rating = '<div class="oxi-addonsFM-SI-rating">' . OxiAddonsPublicRate($listitemdata[12]) . '</div>';
        }
        if ($listitemdata[10] != '') {
            $info = '<div class="oxi-addonsFM-SI-info">' . OxiAddonsTextConvert($listitemdata[10]) . '</div>';
        }
        if ($listitemdata[4] != '') {
            $image = '<div class="oxi-addonsFM-SI-image">
                                <img src="' . OxiAddonsUrlConvert($listitemdata[4]) . '"/>
                            </div>';
        }



        echo '<div class="' . OxiAddonsItemRows($styledata, 203) . '  ' . OxiAddonsAdminDefine($user) . '">
                <a href="' . OxiAddonsUrlConvert($listitemdata[8]) . '" target="' . $styledata[209] . '">
                  <div class="oxi-addonsFM-SI-wrapper-' . $oxiid . ' oxi-addonsFM-SI-wrapper-' . $oxiid . '-' . $value['id'] . '">
                    <div class="oxi-addonsFM-SI-row" ' . OxiAddonsAnimation($styledata, 61) . '>
                        <div class="oxi-addonsFM-SI-content-body">
                           ' . $image . '
                           ' . $price . '
                           ' . $rating . '
                           ' . $heading . '
                           ' . $info . '
                        </div>
                       
                    </div>
                </div></a> ';
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
    echo '  </div></div>';
    $css .= '.oxi-addonsFM-SI-wrapper-' . $oxiid . '{
            width: 100%;
            max-width: ' . $styledata[149] . 'px;
            margin: 0 auto;
            overflow: auto;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-row{
            width: 100%;
            float:left;
            Background: ' . $styledata[207] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 55) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
            position: relative;
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-content-body{
            width: 100%;
            float: left;
            border: ' . $styledata[79] . 'px ' . $styledata[80] . ' ' . $styledata[83] . ';
            ' . OxiAddonsBGImage($styledata, 75) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-image{
            width: 100%;
            float: left;
            text-align: ' . $styledata[217] . ';
            position: absolute;
            top: -100px;
            transform: translateX(-50%);
            left: 50%;
            overflow: hidden;
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-image img{
            width:' . $styledata[173] . 'px;
            height:' . $styledata[173] . 'px;
            border: ' . $styledata[211] . 'px ' . $styledata[212] . ' ' . $styledata[215] . ';
            border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 85) . ';
            margin:' . OxiAddonsPaddingMarginSanitize($styledata, 219) . ';
            overflow: hidden;
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-price{
            width: 100%;
            float: left;
            font-size: ' . $styledata[117] . 'px;
            color: ' . $styledata[121] . ';
            ' . OxiAddonsFontSettings($styledata, 123) . '
             margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
             line-height: 1;
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-heading{
            width: 100%;
            float: left;
            font-size: ' . $styledata[175] . 'px;
            color: ' . $styledata[179] . ';
            ' . OxiAddonsFontSettings($styledata, 181) . '
             padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-rating{
            width: 100%;
            float: left;
            font-size: ' . $styledata[235] . 'px;
            color: ' . $styledata[239] . ';
            text-align: ' . $styledata[285] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 241) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-info{
            width: 100%;
            float: left;
            font-size: ' . $styledata[257] . 'px;
            color: ' . $styledata[261] . ';
            ' . OxiAddonsFontSettings($styledata, 263) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 269) . ';
        }



         @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addonsFM-SI-wrapper-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 40) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 24) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-content-body{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-image img{
            border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 86) . ';
            margin:' . OxiAddonsPaddingMarginSanitize($styledata, 220) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-price{
            font-size: ' . $styledata[118] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-heading{
            font-size: ' . $styledata[176] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 188) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-rating{
            font-size: ' . $styledata[236] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 242) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-info{
            font-size: ' . $styledata[258] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 270) . ';
        }

           

         }
         @media only screen and (max-width : 668px){
          .oxi-addonsFM-SI-wrapper-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 41) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-content-body{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-image img{
            border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            margin:' . OxiAddonsPaddingMarginSanitize($styledata, 221) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-price{
            font-size: ' . $styledata[119] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-heading{
            font-size: ' . $styledata[177] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 189) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-rating{
            font-size: ' . $styledata[237] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 243) . ';
        }
        .oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-info{
            font-size: ' . $styledata[259] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 271) . ';
        }

         }';
    echo OxiAddonsInlineCSSData($css);
}
