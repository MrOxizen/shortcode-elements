<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_offcanvas_content_style_3_shortcode($styledata = false, $listdata = false, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $btntext = $btnicon = $info = $cicon = '';
    if (!empty($stylefiles[2])) {
        $btntext = '<div class="oxi-addons-OC-TH-button">
                        ' . OxiAddonsTextConvert($stylefiles[2]) . '
                     </div>';
    }
    if (!empty($stylefiles[4])) {
        $info = ' <div class="oxi-addons-OC-TH-content-details">
                    ' . OxiAddonsTextConvert($stylefiles[4]) . '
                </div>';
    }
    if (!empty($stylefiles[6])) {
        $cicon = '<div class="oxi-addons-OC-TH-cross-icon">' . oxi_addons_font_awesome($stylefiles[6]) . '</div>';
    }


    echo '<div class="oxi-addons-container">
    <div class="oxi-addons-row">
        <div class="oxi-addons-OC-TH-' . $oxiid . '">
            <div class="oxi-addons-OC-TH-row">
                ' . $btntext . '
                <div class="oxi-addons-OC-TH-conetent-overlay"></div>
                <div class="oxi-addons-OC-TH-Content">
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
    $css = '.oxi-addons-OC-TH-' . $oxiid . '{
        width: 100%;
        float: left;
    }
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-row{
        width: 100%;
        float: left;
        overflow: auto;
    }
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-button{
        width: 100%;
        float: left;
        cursor: pointer;
    }
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content{
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
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content.oxi-active{
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
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-conetent-overlay{
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
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-conetent-overlay.oxi-active{
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
    
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-cross-icon{
        width: 100%;
        float: left;
        text-align: ' . $styledata[49] . ';
        color: ' . $styledata[31] . ';
        font-size:  ' . $styledata[27] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';
        
       
    }
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-cross-icon .oxi-icons{
        cursor: pointer; 
    }
    @media only screen and (min-width : 669px) and (max-width : 993px){
    
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content{
        width: ' . $styledata[6] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 10) . ';
    }
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content.oxi-active{
        width: ' . $styledata[6] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 10) . ';
    }
    
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-cross-icon{
        font-size:  ' . $styledata[28] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 34) . ';
    }
          
}
@media only screen and (max-width : 668px){
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content{
        width: ' . $styledata[7] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';
    }
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content.oxi-active{
        width: ' . $styledata[7] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';
    }
    
    .oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-cross-icon{
        font-size:  ' . $styledata[29] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . '; 
    }   

}';

    $jquery = 'jQuery(document).ready(function(){
                    jQuery(".oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-button").click(function(){
                        jQuery(".oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content").toggleClass("oxi-active");
                        jQuery(".oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-conetent-overlay").toggleClass("oxi-active");
                    });
                    jQuery(".oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-cross-icon .oxi-icons").click(function(){
                        jQuery(".oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content").toggleClass("oxi-active");
                        jQuery(".oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-conetent-overlay").toggleClass("oxi-active");
                    });
                    jQuery(".oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-conetent-overlay").click(function(){
                        jQuery(".oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content").toggleClass("oxi-active");
                        jQuery(".oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-conetent-overlay").toggleClass("oxi-active");
                    });
                });';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js');
}
