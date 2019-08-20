<?php

if (!defined('ABSPATH'))
    exit;

function oxi_food_menu_style_4_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    
    echo ' <div class="oxi-addons-container">
          <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $listitemdata = explode('||#||', $value['files']);
        $heading = $imagebody = $price = $category = $info = '';
        if ($listitemdata[2] != '') {
            $heading = '<div class="oxi-addonsFM-FO-heading">
                               ' . OxiAddonsTextConvert($listitemdata[2]) . '
                            </div>';
        }
        if ($listitemdata[4] != '') {
            $imagebody = '<div class="oxi-addonsFM-FO-image">
                                <img src="' . OxiAddonsUrlConvert($listitemdata[4]) . '"/>
                            </div>';
        }
        if ($listitemdata[6] != '') {
            $price = '<div class="oxi-addonsFM-FO-price">' . OxiAddonsTextConvert($listitemdata[6]) . '</div>';
        }
         if ($listitemdata[12] != '') {
            $category = '<div class="oxi-addonsFM-FO-category">' . OxiAddonsPublicRate($listitemdata[12]) . '</div>';
        }
        if ($listitemdata[10] != '') {
            $info = '<div class="oxi-addonsFM-FO-info">' . OxiAddonsTextConvert($listitemdata[10]) . '</div>';
        }
       
        

        echo '<div class="' . OxiAddonsItemRows($styledata, 203) . '  ' . OxiAddonsAdminDefine($user) . '">
                <a href="' . OxiAddonsUrlConvert($listitemdata[8]) . '" target="' . $styledata[209] . '">
                  <div class="oxi-addonsFM-wrapper-FO-' . $oxiid . ' oxi-addonsFM-wrapper-FO-' . $oxiid . '-' . $value['id'] . '">
                    <div class="oxi-addonsFM-FO-row" ' . OxiAddonsAnimation($styledata, 61) . '>
                        <div class="oxi-addonsFM-FO-content-body">
                            '.$imagebody.'
                            <div class="oxi-addonsFM-FO-text-body">
                                <div class="oxi-addonsFM-FO-heading-body">
                                    ' . $heading . '
                                    ' . $price . '
                                </div>
                                ' .$category. '
                                ' .$info. '
                            </div>
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
    $css = '.oxi-addonsFM-wrapper-FO-' . $oxiid . '{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-row{
            width: 100%;
            max-width: ' . $styledata[149] . 'px;
            margin: 0 auto;
            Background: ' . $styledata[207] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 55) . '
            overflow: auto;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-content-body{
            width: 100%;
            float: left;
            display: flex;
        }
        .oxi-addonsFM-FO-text-body{
            flex-grow: 10;
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image{
            flex-grow: 1;
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image img{
            width:' . $styledata[173] . 'px;
            max-width:' . $styledata[173] . 'px;
            height:' . $styledata[173] . 'px;
            border: ' . $styledata[211] . 'px ' . $styledata[212] . ' ' . $styledata[215] . ';
            border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 85) . ';
            margin:' . OxiAddonsPaddingMarginSanitize($styledata, 219) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-heading-body{
            width: 100%;
            float: left;
            display: flex;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-price{
            flex-grow: 60;
            font-size: ' . $styledata[117] . 'px;
            color: ' . $styledata[121] . ';
            ' . OxiAddonsFontSettings($styledata, 123) . '
             margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-heading{
            flex-grow: 1;
            font-size: ' . $styledata[175] . 'px;
            color: ' . $styledata[179] . ';
            ' . OxiAddonsFontSettings($styledata, 181) . '
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-category{
            width: 100%;
            float: left;
            font-size: ' . $styledata[235] . 'px;
            color: ' . $styledata[239] . ';
            text-align: ' . $styledata[285] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 241) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-info{
            width: 100%;
            float: left;
            font-size: ' . $styledata[257] . 'px;
            color: ' . $styledata[261] . ';
            ' . OxiAddonsFontSettings($styledata, 263) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 269) . ';
        }



         @media only screen and (min-width : 669px) and (max-width : 993px){
         .oxi-addonsFM-wrapper-FO-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 40) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 24) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-content-body{
            flex-direction:column;
            width:100%
            float:left;
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image{
            text-align: center;
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image img{
            text-align:center;
            border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 86) . ';
            margin:' . OxiAddonsPaddingMarginSanitize($styledata, 220) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-heading-body{
            flex-direction: column;
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 188) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-price{
            font-size: ' . $styledata[118] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';
            text-align:center;
            width: 100%;
            float: left;
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-heading{
            font-size: ' . $styledata[176] . 'px;
            text-align:center;
            width: 100%;
            float: left;
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-category{
            text-align:center;
            width: 100%;
            float: left;
            font-size: ' . $styledata[236] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 242) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-info{
            text-align:center;
            width: 100%;
            float: left;
            font-size: ' . $styledata[258] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 270) . ';
        }

           

         }
         @media only screen and (max-width : 668px){
            .oxi-addonsFM-wrapper-FO-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 41) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-content-body{
            flex-direction:column;
            width:100%
            float:left;
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image{
            text-align: center;
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image img{
            text-align:center;
            border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            margin:' . OxiAddonsPaddingMarginSanitize($styledata, 221) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-heading-body{
            flex-direction: column;
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 189) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-price{
            font-size: ' . $styledata[119] . 'px;
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';
            text-align:center;
            width: 100%;
            float: left;
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-heading{
            font-size: ' . $styledata[177] . 'px;
            text-align:center;
            width: 100%;
            float: left;
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-category{
            text-align:center;
            width: 100%;
            float: left;
            font-size: ' . $styledata[237] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 243) . ';
        }
        .oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-info{
            text-align:center;
            width: 100%;
            float: left;
            font-size: ' . $styledata[259] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 271) . ';
        }
        }';
    $js='setTimeout(function(){oxiequalHeight(jQuery(".oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-row"));},500);';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($js, 'js');
}
