<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_effects_style_6_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo oxi_addons_elements_stylejs('css/style', 'style', 'css', 'button-effects');

    echo '  <div class="oxi-addons-container">
                <div class="oxi-addons-row">';

    foreach ($listdata as $value) {
        $valuefile = explode('||#||', $value['files']);
        echo '<div class="oxi-button-hover-' . $oxiid . ' ' . OxiAddonsItemRows($styledata, 7) . '  ' . OxiAddonsAdminDefine($user) . '"  ' . OxiAddonsAnimation($styledata, 45) . '>';
        echo '  <div class="oxi-button-hover-map-' . $oxiid . '">
                    <div class="oxi-button-hover-map-body '.$styledata[191].'">
                        <div class="oxi-button-hover">
                            <div class="oxi-button-img">
                                 <img src="' . OxiAddonsUrlConvert($valuefile[9]) . '">
                            </div>
                            <div class="oxi-button-info">';
        if ($valuefile[1] != '') {
            echo '<a target="'.$styledata[11].'" href="' . OxiAddonsUrlConvert($valuefile[3]) . '">' . oxi_addons_font_awesome($valuefile[1]) . '</a>';
        }
        if ($valuefile[5] != '') {
            echo '<a target="'.$styledata[11].'" href="' . OxiAddonsUrlConvert($valuefile[7]) . '">' . oxi_addons_font_awesome($valuefile[5]) . '</a>';
        }
        echo '              </div>
                        </div>
                    </div>
                </div>';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                                <div class="oxi-addons-admin-absulate-edit">
                                    <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditbutton_effectsdata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                    </form>
                                </div>
                                <div class="oxi-addons-admin-absulate-delete">
                                    <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletebutton_effectsdata") . '
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
    $css = '.oxi-button-hover-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-hover-map-' . $oxiid . '{
                max-width: '.$styledata[63].'px;
                width: 100%;
                margin: 0 auto;
                position: relative;
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-hover-map-' . $oxiid . ':after{
                padding-bottom: '.($styledata[65] / $styledata[63] *100).'%;
                content: "";
                display: block;
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-hover-map-body{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: block;
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-hover{
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                -webkit-transition: all .35s ease-in-out;
                -moz-transition: all .35s ease-in-out;
                overflow: hidden;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ';
                 ' . OxiAddonsBoxShadowSanitize($styledata, 49) . '
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-hover:hover{
                ' . OxiAddonsBoxShadowSanitize($styledata, 56) . '
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            }
           .oxi-button-hover-' . $oxiid . ' .oxi-button-img,
           .oxi-button-hover-' . $oxiid . ' .oxi-button-img img{
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
            .oxi-button-hover-' . $oxiid . ' .oxi-button-img:hover,
            .oxi-button-hover-' . $oxiid . ' .oxi-button-img:hover img{
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-info{
                display:flex;
                '.$styledata[5].'
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity:0;
                ' . OxiAddonsBGImage($styledata, 67) . '
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ';
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-hover:hover .oxi-button-info{
                opacity:1;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-hover a .oxi-icons{
                background: '.$styledata[113].';
                color: '.$styledata[111].';
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: '.$styledata[103].'px;
                text-align: center;
                text-decoration: none;
                width: '.$styledata[107].'px;
                height: '.$styledata[107].'px;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 115) . ';
                border-color:'.$styledata[132].';
                border-style:'.$styledata[131].';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';
                margin:' . OxiAddonsPaddingMarginSanitize($styledata, 151) . ';
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-hover:hover a .oxi-icons:hover{
                background: '.$styledata[169].';
                color: '.$styledata[167].';
                border-color:'.$styledata[172].';
                border-style:'.$styledata[171].';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 175) . ';
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-button-hover-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-hover{
                   border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-hover:hover{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
                }
               .oxi-button-hover-' . $oxiid . ' .oxi-button-img,
               .oxi-button-hover-' . $oxiid . ' .oxi-button-img img{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-img:hover,
                .oxi-button-hover-' . $oxiid . ' .oxi-button-img:hover img{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-info{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-hover:hover .oxi-button-info{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
                }
                
                .oxi-button-hover-' . $oxiid . ' .oxi-button-hover a .oxi-icons{
                    font-size: '.$styledata[104].'px;
                    width: '.$styledata[108].'px;
                    height: '.$styledata[108].'px;
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 116) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 136) . ';
                    margin:' . OxiAddonsPaddingMarginSanitize($styledata, 152) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-hover:hover a .oxi-icons:hover{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 176) . ';
                }
            }
            @media only screen and (max-width : 668px){
                .oxi-button-hover-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-hover{
                   border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-hover:hover{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                }
               .oxi-button-hover-' . $oxiid . ' .oxi-button-img,
               .oxi-button-hover-' . $oxiid . ' .oxi-button-img img{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-img:hover,
                .oxi-button-hover-' . $oxiid . ' .oxi-button-img:hover img{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-info{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-hover:hover .oxi-button-info{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-hover a .oxi-icons{
                    font-size: '.$styledata[105].'px;
                    width: '.$styledata[109].'px;
                    height: '.$styledata[109].'px;
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 117) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 137) . ';
                    margin:' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
                }
                .oxi-button-hover-' . $oxiid . ' .oxi-button-hover:hover a .oxi-icons:hover{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 177) . ';
                }
            }
            
            .oxi-button-hover-' . $oxiid . ' .oxi-button-left-to-right .oxi-button-hover .oxi-button-info a:first-child{
                -webkit-transform: translateX(-900%);
                -moz-transform: translateX(-900%);
                -ms-transform: translateX(-900%);
                -o-transform: translateX(-900%);
                transform: translateX(-900%);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-left-to-right:hover .oxi-button-hover .oxi-button-info a:first-child{
                -webkit-transform: translateX(0%);
                -moz-transform: translateX(0%);
                -ms-transform: translateX(0%);
                -o-transform: translateX(0%);
                transform: translateX(0%);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-left-to-right .oxi-button-hover .oxi-button-info a:last-child{
                -webkit-transform: translateX(900%);
                -moz-transform: translateX(900%);
                -ms-transform: translateX(900%);
                -o-transform: translateX(900%);
                transform: translateX(900%);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-left-to-right:hover .oxi-button-hover .oxi-button-info a:last-child{
                -webkit-transform: translateX(0%);
                -moz-transform: translateX(0%);
                -ms-transform: translateX(0%);
                -o-transform: translateX(0%);
                transform: translateX(0%);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-right-to-left .oxi-button-hover .oxi-button-info a:first-child{
                -webkit-transform-origin: -190% 50%;
                -moz-transform-origin: -190% 50%;
                -ms-transform-origin: -190% 50%;
                -o-transform-origin: -190% 50%;
                transform-origin: -190% 50%;
                webkit-transform: rotateZ(180deg);
                -moz-transform: rotateZ(180deg);
                -ms-transform: rotateZ(180deg);
                -o-transform: rotateZ(180deg);
                transform: rotateZ(180deg);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-right-to-left:hover .oxi-button-hover .oxi-button-info a:first-child{
                -webkit-transform: rotateZ(0deg);
                -moz-transform: rotateZ(0deg);
                -ms-transform: rotateZ(0deg);
                -o-transform: rotateZ(0deg);
                transform: rotateZ(0deg);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-right-to-left .oxi-button-hover .oxi-button-info a:last-child{
                -webkit-transform-origin: 300% 50%;
                -moz-transform-origin: 300% 50%;
                -ms-transform-origin: 300% 50%;
                -o-transform-origin: 300% 50%;
                transform-origin: 300% 50%;
                -webkit-transform: rotateZ(180deg);
                -moz-transform: rotateZ(180deg);
                -ms-transform: rotateZ(180deg);
                -o-transform: rotateZ(180deg);
                transform: rotateZ(180deg);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-right-to-left:hover .oxi-button-hover .oxi-button-info a:last-child{
                -webkit-transform: rotateZ(0deg);
                -moz-transform: rotateZ(0deg);
                -ms-transform: rotateZ(0deg);
                -o-transform: rotateZ(0deg);
                transform: rotateZ(0deg);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-top-to-bottom .oxi-button-hover .oxi-button-info a:first-child{

                -webkit-transform: translateY(-900%);
                -moz-transform: translateY(-900%);
                -ms-transform: translateY(-900%);
                -o-transform: translateY(-900%);
                transform: translateY(-900%);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-top-to-bottom:hover .oxi-button-hover .oxi-button-info a:first-child{
                -webkit-transform: translateY(0%);
                -moz-transform: translateY(0%);
                -ms-transform: translateY(0%);
                -o-transform: translateY(0%);
                transform: translateY(0%);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-top-to-bottom .oxi-button-hover .oxi-button-info a:last-child{
                -webkit-transform: translateY(900%);
                -moz-transform: translateY(900%);
                -ms-transform: translateY(900%);
                -o-transform: translateY(900%);
                transform: translateY(900%);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-top-to-bottom:hover .oxi-button-hover .oxi-button-info a:last-child{
                -webkit-transform: translateY(0%);
                -moz-transform: translateY(0%);
                -ms-transform: translateY(0%);
                -o-transform: translateY(0%);
                transform: translateY(0%);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-bottom-to-top .oxi-button-hover .oxi-button-info a:first-child{
                -webkit-transform-origin: 50% -110%;
                -moz-transform-origin: 50% -110%;
                -ms-transform-origin: 50% -110%;
                -o-transform-origin: 50% -110%;
                transform-origin: 50% -110%;
                -webkit-transform: rotateZ(180deg);
                -moz-transform: rotateZ(180deg);
                -ms-transform: rotateZ(180deg);
                -o-transform: rotateZ(180deg);
                transform: rotateZ(180deg);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-bottom-to-top:hover .oxi-button-hover .oxi-button-info a:first-child{
                -webkit-transform: rotateZ(0deg);
                -moz-transform: rotateZ(0deg);
                -ms-transform: rotateZ(0deg);
                -o-transform: rotateZ(0deg);
                transform: rotateZ(0deg);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-bottom-to-top .oxi-button-hover .oxi-button-info a:last-child{
                -webkit-transform-origin: 50% 210%;
                -moz-transform-origin: 50% 210%;
                -ms-transform-origin: 50% 210%;
                -o-transform-origin: 50% 210%;
                transform-origin: 50% 210%;
                -webkit-transform: rotateZ(180deg);
                -moz-transform: rotateZ(180deg);
                -ms-transform: rotateZ(180deg);
                -o-transform: rotateZ(180deg);
                transform: rotateZ(180deg);
            }
            .oxi-button-hover-' . $oxiid . ' .oxi-button-bottom-to-top:hover .oxi-button-hover .oxi-button-info a:last-child{
                -webkit-transform: rotateZ(0deg);
                -moz-transform: rotateZ(0deg);
                -ms-transform: rotateZ(0deg);
                -o-transform: rotateZ(0deg);
                transform: rotateZ(0deg);
            }

            ';
    wp_add_inline_style('oxi-addons', $css);
}
