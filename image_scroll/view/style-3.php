<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_image_scroll_style_3_shortcode($styledata = false, $listdata = false, $user = 'user')
{

    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $jquery = "";

    echo '<div class="oxi-addons-container">'
	. '<div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $img = $flink =  $lastlink = '';
        if ($data[3] != '') {
            $flink = '
              <a href="' . OxiAddonsUrlConvert($data[3]) . '" class="oxi-link" target="' . $styledata[64] . '">
        ';

            $lastlink = '
            </a>
        ';
        }
        if ($data[1] != '') {
            $img = ' 
         ' . $flink . '    
                <div class="oxi-addons-image-main"  ' . OxiAddonsAnimation($styledata, 29) . '>
                    <div class="oxi-addons-img">
                        <img class="oxi-img"  src="' . OxiAddonsUrlConvert($data[1]) . '" alt="image" />
                    </div>
                </div> 
        ' .  $lastlink . '
        ';
        }



        echo '
            <div class="oxi-addons-main-wrapper-' . $oxiid . '  ' . OxiAddonsItemRows($styledata, 66) . '  ' . OxiAddonsAdminDefine($user) . '">
                <div class="oxi-addons-wrapper-' . $oxiid . '">  
                    ' . $img . ' 
                </div>';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                    <div class="oxi-addons-admin-absulate-edit">
                        <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditimage_scrolldata") . '
                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                            <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                        </form>
                    </div>
                    <div class="oxi-addons-admin-absulate-delete">
                        <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteimage_scrolldata") . '
                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                            <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                        </form>
                    </div>
                </div>';
        }
        echo '</div>';
        if ($data[5] == 'top') {
            $jquery .=
                ' 
                jQuery("#oxi-img-' . $value['id'] . '").mouseover (function(){
                    var imgWidth = jQuery(this).width();  
                    var outerWidth = jQuery("#oxi-addons-image-main-' . $value['id'] . '").outerWidth(); 
                    var height = imgWidth-outerWidth; 
                    jQuery(this).css({"transform":"translateX(-" + height + "px)"});
                });  
                jQuery("#oxi-img-' . $value['id'] . '").mouseout(function(){ 
                    jQuery(this).css({"transform":"translateX(0px)"});
                });   
            ';
        } elseif ($data[5] == 'bottom') {
            $jquery .=
                '  
                    jQuery("#oxi-img-' . $value['id'] . '").css({
                        "position" : "absolute",
                        "right" : "0",
                        "top" : "0"
                    }); 
                jQuery("#oxi-img-' . $value['id'] . '").mouseover (function(){
                    var imgWidth = jQuery(this).width();  
                    var outerWidth = jQuery("#oxi-addons-image-main-' . $value['id'] . '").outerWidth(); 
                    var height = imgWidth-outerWidth; 
                    jQuery(this).css({"transform":"translateX(" + height + "px)"});
                });  
                jQuery("#oxi-img-' . $value['id'] . '").mouseout(function(){ 
                    jQuery(this).css({"transform":"translateX(0px)"});
                });   
            ';
        }
    }
    echo '</div></div>';
    $css = ' 

       .oxi-addons-wrapper-' . $oxiid . '{ 
            width: 100%;
            float: left; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 3) . '; 
            overflow: hidden; 
             display: flex;
            align-items: center;
            justify-content: center;
        }  
       .oxi-addons-wrapper-' . $oxiid . ' .oxi-link{ 
            width: 100%;
            float: left;  
             display: flex;
            align-items: center;
            justify-content: center;
        }  
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main{
            width: 100%;
            height: ' . $styledata[23] . 'px;
            max-width: 100%; 
            overflow-x: hidden;  
            overflow-y: scroll; 
            position: relative;   
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-img{
            width: 100%;
            float: left; 
        }
       
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-img{
            width: 100%; 
            height: 100%;
            max-height: 100%; 
        }  

        @media only screen and (min-width : 669px) and (max-width : 993px){ 
            .oxi-addons-wrapper-' . $oxiid . '{  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 4) . ';  
            }  
             .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main{ 
                height: ' . $styledata[24] . 'px;  
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . '; 
            }   
        }
        @media only screen and (max-width : 668px){  
            .oxi-addons-wrapper-' . $oxiid . '{  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 5) . ';  
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main{ 
                height: ' . $styledata[25] . 'px;  
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . '; 
            }   
        }';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-animation');
}
