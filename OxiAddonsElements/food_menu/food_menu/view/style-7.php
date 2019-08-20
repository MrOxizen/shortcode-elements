<?php

if (!defined('ABSPATH'))
    exit;

function oxi_food_menu_style_7_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $css = '';
    echo ' <div class="oxi-addons-container">
          <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $listitemdata = explode('||#||', $value['files']);
        $heading = $price = $rating = $info = $styleselect = '';
        if ($listitemdata[2] != '') {
            $heading = '<div class="oxi-addonsFM-SV-heading">
                               ' . OxiAddonsTextConvert($listitemdata[2]) . '
                            </div>';
        }
        if ($listitemdata[6] != '') {
            $price = '<div class="oxi-addonsFM-SV-price">' . OxiAddonsTextConvert($listitemdata[6]) . '</div>';
        }
        if ($listitemdata[12] != '') {
            $rating = '<div class="oxi-addonsFM-SV-rating">' . OxiAddonsPublicRate($listitemdata[12]) . '</div>';
        }
        if ($listitemdata[10] != '') {
            $info = '<div class="oxi-addonsFM-SV-info">' . OxiAddonsTextConvert($listitemdata[10]) . '</div>';
        }
        if ($styledata[215] == 'styleone') {
            $styleselect = '<div class="oxi-addonsFM-SV-content-body">
                                <div class="oxi-addonsFM-SV-C-sape">
                                    ' . $heading . '
                                    ' . $price . '
                                    ' . $rating . '
                                    ' . $info . '
                                </div>
                            </div>';
        }
        if ($styledata[215] == 'styletwo') {
            $styleselect = '<div class="oxi-addonsFM-SV-content-body">
                                <div class="oxi-addonsFM-SV-B-T-I"></div>
                                ' . $heading . '
                                ' . $price . '
                                ' . $rating . '
                                ' . $info . '
                            </div>';
        }


        echo '<div class="' . OxiAddonsItemRows($styledata, 203) . '  ' . OxiAddonsAdminDefine($user) . '">
                <a href="' . OxiAddonsUrlConvert($listitemdata[8]) . '" target="' . $styledata[209] . '">
                  <div class="oxi-addonsFM-SV-wrapper-' . $oxiid . ' oxi-addonsFM-SV-wrapper-' . $oxiid . '-' . $value['id'] . ' "  ' . OxiAddonsAnimation($styledata, 61) . '>
                        <div class="oxi-addonsFM-SV-image ">
                        </div>
                    <div class="oxi-addonsFM-SV-row">
                        ' . $styleselect . '
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
        $css .= '.oxi-addonsFM-SV-wrapper-' . $oxiid . '.oxi-addonsFM-SV-wrapper-' . $oxiid . '-' . $value['id'] . '  .oxi-addonsFM-SV-image{
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: url(\'' . OxiAddonsUrlConvert($listitemdata[4]) . '\');
                    -moz-background-size: 100% 100%;
                    -o-background-size: 100% 100%;
                    background-size: 100% 100%;
                    ' . OxiAddonsBoxShadowSanitize($styledata, 303) . ';
                }';
    }
    echo '  </div></div>';
    if ($styledata[215] == 'styleone') {
        $backgroundcol = OxiAddonsBGImage($styledata, 65);
    }
    if ($styledata[215] == 'styletwo') {
        $backgroundcol = 'background:#fff';
    }
    $css .= '.oxi-addonsFM-SV-wrapper-' . $oxiid . '{
            width: 100%;
            max-width: ' . $styledata[149] . 'px;
            margin: 0 auto;
            overflow: auto;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-row{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-image:after{
            display: block;
            content: "";
            padding-bottom:' . $styledata[173] . '%;
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-content-body{
            width: 100%;
            float: left;
            position: relative;
            border: ' . $styledata[79] . 'px ' . $styledata[80] . ' ' . $styledata[83] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 55) . '
            ' . $backgroundcol . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 287) . '; 
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-C-sape:before,.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-C-sape:after{
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: -60px;
            height: 50px;
            background: radial-gradient(closest-side,' . $styledata[65] . ',' . $styledata[65] . ' 50%,transparent 50%);
            background-size: 40px 50px;
            background-position: 30px 24px;
            background-repeat: repeat-x;
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-C-sape:after{
            background: radial-gradient(closest-side,transparent,transparent 50%, ' . $styledata[65] . ' 50%);
            background-size: 40px 50px;
            background-position: 10px -25px;
            top: -13px;
            background-repeat: repeat-x;
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-B-T-I{
            position: absolute;
            background: url(https://www.oxilab.org/wp-content/uploads/2019/02/arrow.png) repeat;
            width: 100%;
            height: 12px;
            top: -10px;
            left: 0;
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-price{
            width: 100%;
            float: left;
            font-size: ' . $styledata[117] . 'px;
            color: ' . $styledata[121] . ';
            ' . OxiAddonsFontSettings($styledata, 123) . '
             margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
             line-height: 1;
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-heading{
            width: 100%;
            float: left;
            font-size: ' . $styledata[175] . 'px;
            color: ' . $styledata[179] . ';
            ' . OxiAddonsFontSettings($styledata, 181) . '
             padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-rating{
            width: 100%;
            float: left;
            font-size: ' . $styledata[235] . 'px;
            color: ' . $styledata[239] . ';
            text-align: ' . $styledata[285] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 241) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-info{
            width: 100%;
            float: left;
            font-size: ' . $styledata[257] . 'px;
            color: ' . $styledata[261] . ';
            ' . OxiAddonsFontSettings($styledata, 263) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 269) . ';
        }



         @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addonsFM-SV-wrapper-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 40) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 24) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-content-body{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-price{
            font-size: ' . $styledata[118] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-heading{
            font-size: ' . $styledata[176] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 188) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-rating{
            font-size: ' . $styledata[236] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 242) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-info{
            font-size: ' . $styledata[258] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 270) . ';
        }

           

         }
         @media only screen and (max-width : 668px){
          .oxi-addonsFM-SV-wrapper-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 41) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-content-body{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-price{
            font-size: ' . $styledata[119] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-heading{
            font-size: ' . $styledata[177] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 189) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-rating{
            font-size: ' . $styledata[237] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 243) . ';
        }
        .oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-info{
            font-size: ' . $styledata[259] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 271) . ';
        }

         }';

    echo OxiAddonsInlineCSSData($css);
}
