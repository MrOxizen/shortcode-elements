<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_image_comparison_style_3_shortcode($styledata = false, $listdata = false, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    echo oxi_addons_elements_stylejs('mbac', 'image_comparison', 'css');
    echo oxi_addons_elements_stylejs('mbac', 'image_comparison', 'js');

    $css = $jquery = '';
    $img1 = $img2 = $img3 = $img4 = '';
    if ($stylefiles[2] != '') {
        $img1 = ' <li><img src="' . OxiAddonsUrlConvert($stylefiles[2]) . '" alt="Image Comparison"></li>';
    }
    if ($stylefiles[4] != '') {
        $img2 = ' <li><img src="' . OxiAddonsUrlConvert($stylefiles[4]) . '" alt="Image Comparison"></li>';
    }
    if ($stylefiles[6] != '') {
        $img3 = ' <li><img src="' . OxiAddonsUrlConvert($stylefiles[6]) . '" alt="Image Comparison"></li>';
    }
    if ($stylefiles[8] != '') {
        $img4 = ' <li><img src="' . OxiAddonsUrlConvert($stylefiles[8]) . '" alt="Image Comparison"></li>';
    }

    echo '<div class="oxi-addons-container">
			<div class="oxi-addons-row">
				<div class="oxi-addons-main-wrapper-' . $oxiid . ' "  >
				  <div class="oxi-addons-main"> 
				   <div id="oxi-addons-mbac-' . $oxiid . '"  class="mbac-wrap"> 
						<ul class="mbac">
							' . $img1 . '
							' . $img2 . '
							' . $img3 . '  
							' . $img4 . '
						</ul> 
					</div>
				  </div>
				</div>
            </div>
        </div>
        ';

    $jquery .= ' jQuery("#oxi-addons-mbac-' . $oxiid . '").mbac() ';

    $css .= '
        .oxi-addons-main-wrapper-' . $oxiid . '{ 
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';  
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' *{
                transition: none;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main{
             width: ' . $styledata[3] . 'px;
             max-width: 100%;
             margin: 0 auto;
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .mbac .mbac-slide{
            list-style-type: none;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .mbac .mbac-slide > img{
             max-width: none;
        } 
        #oxi-addons-beforeafter-' . $oxiid . ' {
             max-width: 100%;
             margin: 0 auto;
        }
       #oxi-addons-beforeafter-' . $oxiid . ' img{
             width: 100%;
        }
       

        @media only screen and (min-width : 669px) and (max-width : 993px){
           .oxi-addons-main-wrapper-' . $oxiid . '{  
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';  
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main{
                width: ' . $styledata[4] . 'px; 
            } 
           
        }
        @media only screen and (max-width : 668px){
          
            .oxi-addons-main-wrapper-' . $oxiid . '{  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';  
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main{
                width: ' . $styledata[5] . 'px; 
            } 
            
        }
    ';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-mbac');
}
