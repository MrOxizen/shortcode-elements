<?php

if (!defined('ABSPATH'))
    exit;

function oxi_hover_effects_style_26_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects:hover{
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-img{
                z-index: 11; 
                pointer-events: none;
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
                z-index: 0;
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
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects .oxi-hover-img {
                width: 100%;
                float: left;
                transition: all 1s ease-out 0s;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-left-to-right .oxi-hover-img {
                opacity: 1;
                animation-duration: 1s;
                animation-name: tinRightIn;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-left-to-right:hover .oxi-hover-img{
                animation-duration: 1s;
                animation-name: tinRightOut;
                opacity: 0 ;
                pointer-events: none;
            }
            @keyframes tinRightIn {
                0% {
                    opacity: 0;
                    transform: scale(1, 1) translateX(900%);
                }
                50%, 70%, 90% {
                    opacity: 1;
                    transform: scale(1.1, 1.1) translateX(0px);
                }
                60%, 80%, 100% {
                    opacity: 1;
                    transform: scale(1, 1) translateX(0px);
                }
            }
            @keyframes tinRightOut {
                0%, 20%, 40%, 50% {
                    opacity: 1;
                    transform: scale(1, 1) translateX(0px);
                }
                10%, 30% {
                    opacity: 1;
                    transform: scale(1.1, 1.1) translateX(0px);
                }
                100% {
                    opacity: 0;
                    transform: scale(1, 1) translateX(900%);
                }
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-right-to-left .oxi-hover-img {
                opacity: 1;
                animation-duration: 1s;
                animation-name: tinLeftIn;
                opacity: 1;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-right-to-left:hover .oxi-hover-img{
                animation-duration: 1s;
                animation-name: tinLeftOut;
                opacity: 0 ;
                pointer-events: none;
            }
            @keyframes tinLeftIn {
                0% {
                    opacity: 0;
                    transform: scale(1, 1) translateX(-900%);
                }
                50%, 70%, 90% {
                    opacity: 1;
                    transform: scale(1.1, 1.1) translateX(0px);
                }
                60%, 80%, 100% {
                    opacity: 1;
                    transform: scale(1, 1) translateX(0px);
                }
            }
            @keyframes tinLeftOut {
                0%, 20%, 40%, 50% {
                    opacity: 1;
                    transform: scale(1, 1) translateX(0px);
                }
                10%, 30% {
                    opacity: 1;
                    transform: scale(1.1, 1.1) translateX(0px);
                }
                100% {
                    opacity: 0;
                    transform: scale(1, 1) translateX(-900%);
                }
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-top-to-bottom .oxi-hover-img {
                opacity: 1;
                animation-duration: 1s;
                animation-name: tinTopIn;
                opacity: 1;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-top-to-bottom:hover .oxi-hover-img{
                animation-duration: 1s;
                animation-name: tinTopOut;
                opacity: 0 ;
                pointer-events: none;
            }
            @keyframes tinTopIn {
                0% {
                    opacity: 0;
                    transform: scale(1, 1) translateY(-900%);
                }
                50%, 70%, 90% {
                    opacity: 1;
                    transform: scale(1.1, 1.1) translateY(0px);
                }
                60%, 80%, 100% {
                    opacity: 1;
                    transform: scale(1, 1) translateY(0px);
                }
            }
            @keyframes tinTopOut {
                0%, 20%, 40%, 50% {
                    opacity: 1;
                    transform: scale(1, 1) translateY(0px);
                }
                10%, 30% {
                    opacity: 1;
                    transform: scale(1.1, 1.1) translateY(0px);
                }
                100% {
                    opacity: 0;
                    transform: scale(1, 1) translateY(-900%);
                }
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-bottom-to-top .oxi-hover-img {
                opacity: 1;
                animation-duration: 1s;
                animation-name: tinBottomIn;
                opacity: 1;
            }
            .oxi-hover-effects-' . $oxiid . ' .oxi-hover-effects.oxi-hover-bottom-to-top:hover .oxi-hover-img{
                animation-duration: 1s;
                animation-name: tinBottomOut;
                opacity: 0 ;
                pointer-events: none;
            }
            @keyframes tinBottomIn {
                0% {
                    opacity: 0;
                    transform: scale(1, 1) translateY(900%);
                }
                50%, 70%, 90% {
                    opacity: 1;
                    transform: scale(1.1, 1.1) translateY(0px);
                }
                60%, 80%, 100% {
                    opacity: 1;
                    transform: scale(1, 1) translateY(0px);
                }
            }
            @keyframes tinBottomOut {
                0%, 20%, 40%, 50% {
                    opacity: 1;
                    transform: scale(1, 1) translateY(0px);
                }
                10%, 30% {
                    opacity: 1;
                    transform: scale(1.1, 1.1) translateY(0px);
                }
                100% {
                    opacity: 0;
                    transform: scale(1, 1) translateY(900%);
                }
            }';
    wp_add_inline_style('oxi-addons', $css);
}
