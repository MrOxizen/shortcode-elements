<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_image_scroll_style_4_shortcode($styledata = false, $listdata = false, $user = 'user')
{

    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $jquery = '';
    echo '<div class="oxi-addons-container">'
	. '<div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $img = $flink =  $lastlink = $button = $title = '';
        if ($stylefiles[2] != '' && $data[3] != '') {
            $button = '
            <div class="oxi-addons-main-button"  id="oxi-img-' . $value['id'] . '"> 
                <a href="' . OxiAddonsUrlConvert($data[3]) . '" class="oxi-addons-link"  target="' . $styledata[98] . '">
                    ' . OxiAddonsTextConvert($stylefiles[2]) . '
                </a>
            </div>
        ';
        } elseif ($stylefiles[2] != '' && $data[3] == '') {
            $button = '
        <div class="oxi-addons-main-button">
            <div class="oxi-addons-link">
                ' . OxiAddonsTextConvert($stylefiles[2]) . '
            </div>
        </div>
    ';
        }
        if ($data[1] != '') {
            $img = '  
                    <div class="oxi-addons-img" >
                        <img class="oxi-img oxi-image-' . $value['id'] . '" src="' . OxiAddonsUrlConvert($data[1]) . '" alt="image" />
                             ' . $button . '
                   </div>  
        ';
        }
        if ($data[7] != '') {
            $title = '  
                    <div class="oxi-addons-title">  ' . OxiAddonsTextConvert($data[7]) . '</div>  
        ';
        }


        echo '
        <div class="oxi-addons-main-wrapper-' . $oxiid . '  ' . OxiAddonsItemRows($styledata, 66) . '  ' . OxiAddonsAdminDefine($user) . '">
            <div class="oxi-addons-wrapper-' . $oxiid . '" >  
             <div class="oxi-addons-image-main" id="oxi-addons-image-main-' . $value['id'] . '" >
                ' . $img . '   
                ' . $title . '
            </div>  
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
                'jQuery("#oxi-img-' . $value['id'] . '").mouseover(function(){ 
                    var imgHeight= jQuery(".oxi-image-' . $value['id'] . '").height();  
                    var outerHeight = jQuery("#oxi-addons-image-main-' . $value['id'] . '").outerHeight(); 
                    var height = imgHeight-outerHeight; 
                    jQuery(".oxi-image-' . $value['id'] . '").css({"transform":"translateY(-" + height + "px)"});
                });  
                jQuery("#oxi-img-' . $value['id'] . '").mouseout(function(){ 
                    jQuery(".oxi-image-' . $value['id'] . '").css({"transform":"translateY(0px)"});
                });   
            ';
        } elseif ($data[5] == 'bottom') {
            $jquery .=
                'jQuery(".oxi-image-' . $value['id'] . '").css({
                        "position" : "absolute",
                        "bottom" : "0",
                        "left" : "0",
                        "Top" : "auto",
                    }); 
                    jQuery("#oxi-img-' . $value['id'] . '").mouseover(function(){
                            var imgHeight= jQuery(".oxi-image-' . $value['id'] . '").height();  
                            var outerHeight = jQuery("#oxi-addons-image-main-' . $value['id'] . '").outerHeight(); 
                            var height = imgHeight-outerHeight; 
                            jQuery(".oxi-image-' . $value['id'] . '").css({"transform":"translateY(" + height + "px)"});
                        });  
                        jQuery("#oxi-img-' . $value['id'] . '").mouseout(function(){ 
                            jQuery(".oxi-image-' . $value['id'] . '").css({"transform":"translateY(0px)"});
                        });   
                    ';
        }
    }
    echo ' </div>'
	.'</div>';



    $css = ' 
        
       .oxi-addons-wrapper-' . $oxiid . '{ 
            width: 100%;
            float: left; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 3) . '; 
            overflow: hidden; 
             display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }  
       .oxi-addons-wrapper-' . $oxiid . ' .oxi-link{ 
            width: 100%;
            float: left;  
             display: flex;
            align-items: center;
            justify-content: center;
        }  
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main{ 
               width: ' . $styledata[19] . 'px; 
               ' . OxiAddonsBoxShadowSanitize($styledata, 34) . ';
               position: relative; 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 48) . '; 
              transition: all 0.5s;
        }
          .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main:hover{ 
                ' . OxiAddonsBoxShadowSanitize($styledata, 42) . ';
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-img{
            width: ' . $styledata[19] . 'px;
            height: ' . $styledata[23] . 'px;
            position: relative;
            max-width: 100%;  
            float: left;
            overflow: hidden;  
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title{
           font-size: ' . $styledata[70] . 'px;
            ' . OxiAddonsFontSettings($styledata, 74) . ';
            Background: ' . $styledata[174] . ';
            color: ' . $styledata[80] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 82) . '; 
            width: 100%;
            float: left; 
        }
       
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-img{
            width: 100%;
            max-width: 100%;
            height:auto;
            transition: all ' . $styledata[27] . 's ; 
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button{
            position: absolute;
            left:0;
            top: 0; 
           Background: ' . $styledata[176] . ';
            width: 100%;
            height: 100%;
            opacity: 0;  
            visibility: hidden;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main:hover  .oxi-addons-main-button{ 
            opacity: 1;
            visibility: visible; 
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link{
            background: ' . $styledata[112] . ';
            color: ' . $styledata[110] . ';
            display: inline-block;
            ' . OxiAddonsFontSettings($styledata, 104) . ';
            font-size: ' . $styledata[100] . 'px;
            border:  ' . $styledata[114] . 'px ' . $styledata[115] . ';
            border-color: ' . $styledata[118] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 120) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 136) . ';  

            left: 50%;
            position: absolute;
            top: 50%;
            transform: translate(-50%,-50%);
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link:hover{
            background: ' . $styledata[154] . ';
            color: ' . $styledata[152] . '; 
            border-color: ' . $styledata[156] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 158) . ';
        } 

        @media only screen and (min-width : 669px) and (max-width : 993px){ 
            .oxi-addons-wrapper-' . $oxiid . '{  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 4) . ';  
               
            }  
             .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main{
                width: ' . $styledata[20] . 'px;
                height: ' . $styledata[24] . 'px;  
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . '; 
            }   
              .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-img{
            width: ' . $styledata[20] . 'px;
            height: ' . $styledata[24] . 'px; 
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title{
           font-size: ' . $styledata[71] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';  
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link{ 
            font-size: ' . $styledata[101] . 'px; 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 121) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 137) . ';   
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link:hover{ 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 159) . ';
        } 
        }
        @media only screen and (max-width : 668px){  
               .oxi-addons-wrapper-' . $oxiid . '{  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 5) . ';  
            }  
             .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main{
                width: ' . $styledata[21] . 'px;
                height: ' . $styledata[25] . 'px;  
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . '; 
            }   
                   .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-img{
            width: ' . $styledata[21] . 'px;
            height: ' . $styledata[25] . 'px; 
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title{
           font-size: ' . $styledata[72] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 84) . ';  
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link{ 
            font-size: ' . $styledata[102] . 'px; 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 122) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 138) . ';   
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link:hover{ 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 160) . ';
        } 
        }';

    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-animation');
}
