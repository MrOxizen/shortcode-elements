<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_offcanvas_content_style_2_shortcode($styledata = false, $listdata = false, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $btntext = $btnicon = $info = $cicon = '';
    if (!empty($stylefiles[2])) {
        $btntext = '<div class="oxi-addons-OC-T-button">
                        <div  class="oxi-addons-OC-T-C-button-link">
                             <img src="' . OxiAddonsUrlConvert($stylefiles[2]) . '">
                        </div>
                     </div>';
    }
    if (!empty($stylefiles[4])) {
        $info = ' <div class="oxi-addons-OC-T-content-details">
                    ' . OxiAddonsTextConvert($stylefiles[4]) . '
                </div>';
    }
    if (!empty($stylefiles[6])) {
        $cicon = '<div class="oxi-addons-OC-T-cross-icon">' . oxi_addons_font_awesome($stylefiles[6]) . '</div>';
    }


    echo '<div class="oxi-addons-container">
    <div class="oxi-addons-row">
        <div class="oxi-addons-OC-T-' . $oxiid . '">
            <div class="oxi-addons-OC-T-row" ' . OxiAddonsAnimation($styledata, 149) . '>
                ' . $btntext . ' 
                <div class="oxi-addons-OC-T-conetent-overlay"></div>
                <div class="oxi-addons-OC-T-Content">
                    ' . $cicon . '
                    ' . $info . '
                </div>
            </div>
        </div>
    </div>
</div>';
    if ($styledata[51] == 'right') {
        $right = "right: 0";
        $margin = "margin-right: -$styledata[5]px";
        $marginler = "margin-right: 0;";
    } else {
        $right = "left: 0";
        $margin = "margin-left: -$styledata[5]px";
        $marginler = "margin-left: 0;";
    }
    $css = '.oxi-addons-OC-T-' . $oxiid . '{
        width: 100%;
        float: left;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 123) . ';
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-row{
        width: 100%;
        max-width: ' . $styledata[139] . 'px;
        border: ' . $styledata[85] . 'px ' . $styledata[86] . ' ;
        border-color: ' . $styledata[89] . ' ;
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 91) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 107) . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 143) . '
        margin: 0 auto;
        overflow: auto;
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-button{
        width: 100%;
        float: left;
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-C-button-link{
        width: 100%;
        float: left;
        overflow: hidden;
        cursor: pointer;
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-C-button-link img{
        width: 100%; 
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content{
        position: fixed;
        top: 0;
        ' . $right . ';
        z-index: 99999999;
        width: ' . $styledata[5] . 'px;
        height: 100%;
        overflow-y: auto;
        background: ' . $styledata[3] . ';
        transition: all 0.5s;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
        ' . $margin . ';
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content.oxi-active{
        position: fixed;
        top: 0;
        ' . $right . ';
        z-index: 99999999;
        width: ' . $styledata[5] . 'px;
        height: 100%;
        overflow-y: auto;
        background: ' . $styledata[3] . ';
        transition: all 0.5s;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
        ' . $marginler . ';
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-conetent-overlay{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        z-index: 99999999;
        overflow-y: auto;
        background: ' . $styledata[25] . ';
        display: none;
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-conetent-overlay.oxi-active{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        z-index: 99999999;
        overflow-y: auto;
        background: ' . $styledata[25] . ';
        display: block;
        cursor: pointer;
    }
    
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-cross-icon{
        width: 100%;
        float: left;
        text-align: ' . $styledata[49] . ';
        color: ' . $styledata[31] . ';
        font-size:  ' . $styledata[27] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';  
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-cross-icon .oxi-icons{
        cursor: pointer; 
    }
    @media only screen and (min-width : 669px) and (max-width : 993px){
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-row{
        max-width: ' . $styledata[140] . 'px;
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-C-button-link{
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 92) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 108) . ';
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 124) . '; 
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content{
        width: ' . $styledata[6] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 10) . ';
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content.oxi-active{
        width: ' . $styledata[6] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 10) . ';
    } 
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-cross-icon{
        font-size:  ' . $styledata[28] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 34) . '; 
    }    
}
    @media only screen and (max-width : 668px){
     .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-row{
        max-width: ' . $styledata[141] . 'px;
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-C-button-link{
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 93) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 109) . ';
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 125) . ';

    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content{
        width: ' . $styledata[7] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';
    }
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content.oxi-active{
        width: ' . $styledata[7] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';
    }
    
    .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-cross-icon{
        font-size:  ' . $styledata[29] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';  
    }   

    }';

    $jquery = 'jQuery(document).ready(function(){
                    jQuery(".oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-C-button-link").click(function(){
                        jQuery(".oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content").toggleClass("oxi-active");
                        jQuery(".oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-conetent-overlay").toggleClass("oxi-active");
                    });
                    jQuery(".oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-cross-icon .oxi-icons").click(function(){
                        jQuery(".oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content").toggleClass("oxi-active");
                        jQuery(".oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-conetent-overlay").toggleClass("oxi-active");
                    });
                    jQuery(".oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-conetent-overlay").click(function(){
                        jQuery(".oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content").toggleClass("oxi-active");
                        jQuery(".oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-conetent-overlay").toggleClass("oxi-active");
                    });
                });';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js');
}
