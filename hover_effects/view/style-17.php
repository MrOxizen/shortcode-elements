<?php

if (!defined('ABSPATH'))
    exit;

function oxi_hover_effects_style_17_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo oxi_addons_elements_stylejs('css/style', 'hover_effects', 'css', 'hover-effects');

    echo '  <div class="oxi-addons-container">
                <div class="oxi-addons-row">';

    foreach ($listdata as $value) {
        $valuefile = explode('||#||', $value['files']);
        echo '<div class="oxi-hover-effects-' . $oxiid . ' ' . OxiAddonsItemRows($styledata, 7) . '  ' . OxiAddonsAdminDefine($user) . '"  ' . OxiAddonsAnimation($styledata, 45) . '>';
        if ($valuefile[5] == '' && $valuefile[7] != '') {
            echo '<a target="' . $styledata[11] . '" href="' . OxiAddonsUrlConvert($valuefile[7]) . '">';
        }
        echo '  <div class="oxi-hover-effects-map-' . $oxiid . '">
                    <div class="oxi-hover-effects-map-body">
                        <div class="oxi-hover-effects '.$styledata[303].'">
                            <div class="oxi-hover-img">
                                 <img src="' . OxiAddonsUrlConvert($valuefile[9]) . '">
                            </div>
                            <div class="oxi-hover-info">';
        if ($valuefile[1] != '') {
            echo ' <h3 class="oxi-button-heading ' . $styledata[215] . '">' . oxi_addons_html_decode($valuefile[1]) . '</h3>';
            echo ' <div class="headingunderline-body ' . $styledata[215] . '"><div class="headingunderline"></div></div>';
        }
        if ($valuefile[3] != '') {
            echo ' <div class="oxi-button-content ' . $styledata[245] . '">' . oxi_addons_html_decode($valuefile[3]) . '</div>';
        }
        if ($valuefile[5] != '' && $valuefile[7] != '') {
            echo ' <div class="oxi-hover-info-button"><a class=" ' . $styledata[213] . '" target="' . $styledata[11] . '" href="' . OxiAddonsUrlConvert($valuefile[7]) . '">' . oxi_addons_html_decode($valuefile[5]) . '</a></div>';
        }
        echo '              </div>
                        </div>
                    </div>
                </div>';
        if ($valuefile[5] == '' && $valuefile[7] != '') {
            echo '</a>';
        }
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                                <div class="oxi-addons-admin-absulate-edit">
                                    <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEdithover_effectsdata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                    </form>
                                </div>
                                <div class="oxi-addons-admin-absulate-delete">
                                    <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletehover_effectsdata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                    </form>
                                </div>
                            </div>';
        }
        echo ' </div>';
    }

    echo '      </div>
            </div>';
    $css = '.oxi-hover-effects-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects-map-' . $oxiid . '{
                max-width: ' . $styledata[63] . 'px;
                width: 100%;
                margin: 0 auto;
                position: relative;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects-map-' . $oxiid . ':after{
                padding-bottom: ' . ($styledata[65] / $styledata[63] * 100) . '%;
                content: "";
                display: block;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects-map-body{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: block;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects{
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                -webkit-transition: all .35s ease-in-out;
                -moz-transition: all .35s ease-in-out;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ';
                -webkit-perspective: 900px;
                -moz-perspective: 900px;
                perspective: 900px;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects:hover{
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            }
           .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img,
           .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img img{
                position: absolute;
                display: block;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100% !important;
                height: 100% !important;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ';
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img:hover,
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img:hover img{
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img:before{
                ' . OxiAddonsBoxShadowSanitize($styledata, 49) . '
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ';
            }
            .oxi-hover-effects-' . $oxiid . ':hover .oxi-hover-img:before{
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info{
                display:flex;
                ' . $styledata[5] . '
                position: absolute;
                flex-direction: column;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity:0;
                ' . OxiAddonsBGImage($styledata, 67) . '
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 56) . '
                pointer-events: none;
                 -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ';
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects:hover .oxi-hover-info{
                opacity:1;
                pointer-events: auto;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info h3.oxi-button-heading{
                width: 100%;
                font-size: ' . $styledata[217] . 'px;
                color: ' . $styledata[221] . ';
                ' . OxiAddonsFontSettings($styledata, 223) . '
                margin: 0 !important;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 229) . ';
                flex-direction: column;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info .headingunderline-body{
                width: 100%; 
                display:inline-block;
                text-align:' . (explode(':', $styledata[227])[0]) . ';
                line-height: 0;
                font-size: 0px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 287) . ';
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info .headingunderline{
                display:inline-block;
                width: ' . $styledata[275] . 'px;
                border-bottom: ' . $styledata[279] . 'px ' . $styledata[283] . ' ' . $styledata[284] . ';
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info .oxi-button-content{
                width: 100%;
                font-size: ' . $styledata[247] . 'px;
                color: ' . $styledata[251] . ';
                ' . OxiAddonsFontSettings($styledata, 253) . '
                margin: 0 !important;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 259) . ';
            }
           .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects  .oxi-hover-info-button{
               width: 100%;
               text-align:' . (explode(':', $styledata[211])[0]) . '
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects a{
                background: ' . $styledata[113] . ';
                color: ' . $styledata[111] . ';
                font-size: ' . $styledata[103] . 'px;
                text-align: center;
                text-decoration: none;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 115) . ';
                border-color:' . $styledata[132] . ';
                border-style:' . $styledata[131] . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 191) . ';
                margin:' . OxiAddonsPaddingMarginSanitize($styledata, 151) . ';
                ' . OxiAddonsFontSettings($styledata, 207) . '
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects a:hover{
                background: ' . $styledata[169] . ';
                color: ' . $styledata[167] . ';
                border-color:' . $styledata[172] . ';
                border-style:' . $styledata[171] . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 175) . ';
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-hover-effects-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects{
                   border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects:hover{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
                }
               .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img,
               .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img img{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img:hover,
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img:hover img{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
                         border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects:hover .oxi-hover-info{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info h3.oxi-button-heading{
                    font-size: ' . $styledata[218] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 230) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info .headingunderline-body{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 288) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info .headingunderline{
                    width: ' . $styledata[276] . 'px;
                    border-bottom: ' . $styledata[280] . 'px ' . $styledata[283] . ' ' . $styledata[284] . ';
                  
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info .oxi-button-content{
                    font-size: ' . $styledata[248] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 260) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects a{
                    font-size: ' . $styledata[104] . 'px;
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 116) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 136) . ';
                    margin:' . OxiAddonsPaddingMarginSanitize($styledata, 152) . ';
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 192) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects a:hover{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 176) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img:before{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';
                }
                .oxi-hover-effects-' . $oxiid . ':hover .oxi-hover-img:before{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
                }
            }
            @media only screen and (max-width : 668px){
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img:before{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
                }
                .oxi-hover-effects-' . $oxiid . ':hover .oxi-hover-img:before{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                }.oxi-hover-effects-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects{
                   border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects:hover{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                }
               .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img,
               .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img img{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img:hover,
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img:hover img{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects:hover .oxi-hover-info{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info h3.oxi-button-heading{
                    font-size: ' . $styledata[219] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 231) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info .headingunderline-body{
                     padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 289) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info  .headingunderline{
                    width: ' . $styledata[277] . 'px;
                    border-bottom: ' . $styledata[281] . 'px ' . $styledata[283] . ' ' . $styledata[284] . ';
                   
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-info .oxi-button-content{
                    font-size: ' . $styledata[248] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 260) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects a{
                    font-size: ' . $styledata[105] . 'px;
                    width: ' . $styledata[109] . 'px;
                    height: ' . $styledata[109] . 'px;
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 117) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 137) . ';
                    margin:' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 193) . ';
                }
                .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects a:hover{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 177) . ';
                }
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects:hover .oxi-hover-img{
                pointer-events: none;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-bottom-to-top .oxi-hover-img {
                -webkit-transform-origin: 50% 0;
                -moz-transform-origin: 50% 0;
                -ms-transform-origin: 50% 0;
                -o-transform-origin: 50% 0;
                transform-origin: 50% 0;
            }
             .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-bottom-to-top:hover .oxi-hover-img{
                -webkit-transform: rotate3d(1, 0, 0, 180deg);
                -moz-transform: rotate3d(1, 0, 0, 180deg);
                -ms-transform: rotate3d(1, 0, 0, 180deg);
                -o-transform: rotate3d(1, 0, 0, 180deg);
                transform: rotate3d(1, 0, 0, 180deg);
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-top-to-bottom .oxi-hover-img {
                -webkit-transform-origin: 50% 100%;
                -moz-transform-origin: 50% 100%;
                -ms-transform-origin: 50% 100%;
                -o-transform-origin: 50% 100%;
                transform-origin: 50% 100%;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-top-to-bottom:hover .oxi-hover-img{
                -webkit-transform: rotate3d(1, 0, 0, -180deg);
                -moz-transform: rotate3d(1, 0, 0, -180deg);
                -ms-transform: rotate3d(1, 0, 0, -180deg);
                -o-transform: rotate3d(1, 0, 0, -180deg);
                transform: rotate3d(1, 0, 0, -180deg);
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-left-to-right .oxi-hover-img {
                -webkit-transform-origin: 100% 50%;
                -moz-transform-origin: 100% 50%;
                -ms-transform-origin: 100% 50%;
                -o-transform-origin: 100% 50%;
                transform-origin: 100% 50%;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-left-to-right:hover .oxi-hover-img{
                -webkit-transform: rotate3d(0, 1, 0, 180deg);
                -moz-transform: rotate3d(0, 1, 0, 180deg);
                -ms-transform: rotate3d(0, 1, 0, 180deg);
                -o-transform: rotate3d(0, 1, 0, 180deg);
                transform: rotate3d(0, 1, 0, 180deg);
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-right-to-left .oxi-hover-img {
                -webkit-transform-origin: 0% 50%;
                -moz-transform-origin: 0% 50%;
                -ms-transform-origin: 0% 50%;
                -o-transform-origin: 0% 50%;
                transform-origin: 0% 50%;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-right-to-left:hover .oxi-hover-img{
                -webkit-transform: rotate3d(0, 1, 0, -180deg);
                -moz-transform: rotate3d(0, 1, 0, -180deg);
                -ms-transform: rotate3d(0, 1, 0, -180deg);
                -o-transform: rotate3d(0, 1, 0, -180deg);
                transform: rotate3d(0, 1, 0, -180deg);
            }';
    wp_add_inline_style('oxi-addons', $css);
}
