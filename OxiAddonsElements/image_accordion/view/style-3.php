<?php

if (!defined('ABSPATH'))
    exit;

function oxi_image_accordion_style_3_shortcode($styledata = false, $listdata = false, $user = 'user')
{

    $oxiid = $styledata['id'];
    echo oxi_addons_elements_stylejs('style', 'image_accordion', 'css');
    echo oxi_addons_elements_stylejs('main', 'image_accordion', 'js'); 
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    $jquery = '';

echo '<div class="oxi-addons-container">
		<div class="oxi-addons-row">
            <div class="oxi-addons-wrapper-' . $oxiid . '">
                <div class="oxi-addons-accordion">
                    <section id="oxi-addons-slider">
                            <div class="oxi-addons-slider-content">';
                foreach ($listdata as $key => $value) {
                    $data = explode('||#||', $value['files']); 
                         echo ' <div class="oxi-addons-image oxi-addons-image-first ' . OxiAddonsAdminDefine($user) . '">
                                    <div class="oxi-addons-slider-item">
                                        <div class="oxi-addons-item-img-1" data-src="' . OxiAddonsUrlConvert($data[1]) . '"></div>
                                        <div class="oxi-addons-item-img-2" data-src="' . OxiAddonsUrlConvert($data[3]) . '"></div>
                                    </div>
                                    	<span class="oxi-addons-image-text oxi-addons-heading">   ' . OxiAddonsTextConvert( $data[5]) . '</span>';
                                    if ($user == 'admin') {
                                    echo '  <div class="oxi-addons-admin-absulote">
                                                <div class="oxi-addons-admin-absulate-edit">
                                                    <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditimage_accordiondata") . '
                                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                        <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                                    </form>
                                                </div>
                                                <div class="oxi-addons-admin-absulate-delete">
                                                    <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteimage_accordiondata") . '
                                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                        <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                                    </form>
                                                </div>
                                            </div>';
                                }
                              echo '</div>'; 
                            }      
                            echo '</div>
                     </section>
                </div>
            </div>
            </div>
        </div>';

    $jquery .= '
         jQuery(".oxi-addons-admin-absulote").addClass("oxi-addons-permission-class"); 
    ';
 
$css .= '
    .oxi-addons-permission-class{
        left: 0 !important;
        top: 15px !important;
    } 
    .oxi-addons-wrapper-' . $oxiid . '{  
        max-width: 100%;
        margin: 0 auto;  
        display: flex;
        justify-content:center;   
    }
    .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-admin-absulote{  
       z-index: 999;
    } 
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-image-text{
        left: -30%;
    } 
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-image:last-child .oxi-addons-image-text{
        left: -30%;
    }
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-image:first-child .oxi-addons-image-text{
        left: -15%;
    }
    .oxi-addons-wrapper-' . $oxiid . '  #oxi-addons-slider,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-slider-content,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-image,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-slider-item,
   .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-item-img-1,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-item-img-2{ 
       height:' . $styledata[7] . 'px;
    } 
   .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-item-img-1,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-item-img-2{ 
      width: 150%;
    }
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-accordion {
        width: 100%;
        max-width:' . $styledata[3] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';   
    } 
    .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading {
        font-size: ' . $styledata[27] . 'px;
        ' . OxiAddonsFontSettings($styledata, 31) . ';
        color: ' . $styledata[37] . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . '; 
        width: 100%;
        float: left;
    }  
@media only screen and (min-width : 669px) and (max-width : 993px){   
    .oxi-addons-wrapper-' . $oxiid . '  #oxi-addons-slider,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-slider-content,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-image,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-slider-item
    {
       height:' . $styledata[8] . 'px;
    }
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-accordion { 
        max-width:' . $styledata[4] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 12) . ';   
    } 
    .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading {
        font-size: ' . $styledata[28] . 'px; 
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 40) . ';  
    }     
}
@media only screen and (max-width : 668px){  
    .oxi-addons-wrapper-' . $oxiid . '  #oxi-addons-slider,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-slider-content,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-image,
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-slider-item
    {
       height:' . $styledata[9] . 'px;
    }
    .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-accordion { 
        max-width:' . $styledata[5] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';   
    } 
    .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading {
        font-size: ' . $styledata[29] . 'px; 
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 41) . ';  
    }     
}';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-main');
}
