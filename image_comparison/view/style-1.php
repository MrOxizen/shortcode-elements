<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_image_comparison_style_1_shortcode($styledata = false, $listdata = false, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);


    echo oxi_addons_elements_stylejs('twentytwenty', 'image_comparison', 'css');
    echo oxi_addons_elements_stylejs('jquery-event-move', 'image_comparison', 'js');
    echo oxi_addons_elements_stylejs('jquery-twentytwenty', 'image_comparison', 'js');

    $css = $jquery = '';


    echo '<div class="oxi-addons-container">
			<div class="oxi-addons-row">
				<div class="oxi-addons-main-wrapper-' . $oxiid . ' "  >
				  <div class="oxi-addons-main">
					<div class="oxi-addons-comparison-' . $oxiid . '">
						<img class="oxi-img" src="' . OxiAddonsUrlConvert($stylefiles[6]) . '" />
						<img class="oxi-img"  src="' . OxiAddonsUrlConvert($stylefiles[8]) . '" />
					</div>
				  </div>
				</div>
			</div>
        </div>
        ';

    $jquery .= ' 
       jQuery(window).on("load",function() {
             jQuery(".oxi-addons-comparison-' . $oxiid . '").twentytwenty({
                default_offset_pct: ' . $styledata[23] . ', 
                 before_label: "' . $stylefiles[2] . '",
                 after_label: "' . $stylefiles[4] . '",
                ';
    if ($styledata[27] == 'true') {
        $jquery .= 'no_overlay: false,';
    } else {
        $jquery .= 'no_overlay: true,';
    }
    if ($styledata[29] == 'true') {
        $jquery .= 'click_to_move: true,';
    } else {
        $jquery .= 'click_to_move: false,';
    }
    if ($styledata[29] == 'true') {
        $jquery .= 'orientation: "horizontal",';
    } else {
        $jquery .= 'orientation: "vertical",';
    }
    if ($styledata[31] == 'true') {
        $jquery .= 'orientation: "horizontal",';
    } else {
        $jquery .= 'orientation: "vertical",';
        $css .= '
       .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-up-arrow, .twentytwenty-down-arrow{
            left: 50% !important;
              transform: translateX(-50%);
        }
        ';
    }
    if ($styledata[33] == 'true') {
        $jquery .= '  move_slider_on_hover: true,';
    } else {
        $jquery .= 'move_slider_on_hover: false,';
    }

    $jquery .= ' });
        });
         
    ';
    $css .= '
        .oxi-addons-main-wrapper-' . $oxiid . '{ 
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';  
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main{
             width: ' . $styledata[3] . 'px;
             max-width: 100%;
             margin: 0 auto;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-left-arrow, 
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-right-arrow{
           top: 50%;
           transform: translateY(-50%);
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-img{
            transition: none;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-handle{
            transition: none;
        }
       .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-horizontal .twentytwenty-handle::before,
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-horizontal .twentytwenty-handle::after, 
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-vertical .twentytwenty-handle::before, 
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-vertical .twentytwenty-handle::after{ 
            background: ' . $styledata[25] . ' !important;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-handle{
            border-color:  ' . $styledata[25] . ' !important;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-horizontal .twentytwenty-handle::after{ 
            box-shadow: 0 -3px 0 ' . $styledata[25] . ', 0px 0px 12px rgba(51, 51, 51, 0.5) !important;
        }
        .oxi-addons-main-wrapper-' . $oxiid . '  .twentytwenty-horizontal .twentytwenty-handle::before{ 
            box-shadow: 0 -3px 0 ' . $styledata[25] . ', 0px 0px 12px rgba(51, 51, 51, 0.5) !important;
        }
        .oxi-addons-main-wrapper-' . $oxiid . '  .twentytwenty-left-arrow{ 
           
                 border-right: 6px solid ' . $styledata[25] . ';
        }
        .oxi-addons-main-wrapper-' . $oxiid . '  .twentytwenty-right-arrow{ 
            border-left: 6px solid ' . $styledata[25] . ';
        }
        .oxi-addons-main-wrapper-' . $oxiid . '  .twentytwenty-before-label::before,
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-after-label::before{ 
             background: ' . $styledata[41] . ' !important;
            color: ' . $styledata[39] . ' !important;
            display: inline-block;
            ' . OxiAddonsFontSettings($styledata, 49) . ' !important;
            font-size: ' . $styledata[35] . 'px !important;
            border:  ' . $styledata[43] . 'px ' . $styledata[44] . ' !important; 
            border-color: ' . $styledata[47] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 55) . ' !important;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ' !important;
        }

        @media only screen and (min-width : 669px) and (max-width : 993px){
             .oxi-addons-main-wrapper-' . $oxiid . '{   
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';  
        }
       
        .oxi-addons-main-wrapper-' . $oxiid . '  .twentytwenty-before-label::before,
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-after-label::before{  
            font-size: ' . $styledata[36] . 'px !important; 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 56) . ' !important;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ' !important;
        }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-main-wrapper-' . $oxiid . '{   
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';  
        }
       
        .oxi-addons-main-wrapper-' . $oxiid . '  .twentytwenty-before-label::before,
        .oxi-addons-main-wrapper-' . $oxiid . ' .twentytwenty-after-label::before{  
            font-size: ' . $styledata[37] . 'px !important; 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 57) . ' !important;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ' !important;
        }
            
        }
    ';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-jquery-twentytwenty');
}
