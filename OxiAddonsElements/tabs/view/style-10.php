<?php
if (!defined('ABSPATH'))
    exit;

function oxi_tabs_style_10_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    $jquery = $linkopening = '';
    if ($styledata[9] != 'new-tab') {
        $linkopening = ", '_self'";
    }
    echo '<div class="oxi-addons-container">
          <div class="oxi-addons-row">
            <div class="oxi-addons-main-wrapper-' . $oxiid . ' ">
                <div class="oxi-addons-wrapper">
                    <div class="oxi-addons-main-tab-header">';
    foreach ($listdata as $key => $header) {
        $value_header = explode('||#||', $header['files']);
        if (!empty($value_header[3]) && $user != 'admin') {
            $jquery .= 'jQuery(".oxi-header-' . $header['id'] . '").click(function() {window.open("' . $value_header[3] . '" ' . $linkopening . ');});';
        }
        echo '<div class="oxi-addons-header oxi-header-' . $header['id'] . ' " ref="#oxi-tab-' . $oxiid . '-id-' . $header['id'] . '"><span class="oxi-addons-badge">' . ($key + 1) . ' </span> ' . $value_header[1] . ' <span class="oxi-addons-span-arrow"></span></div>';
    }
    echo '</div>
   <div class="oxi-addons-main-tab-body ">';
    foreach ($listdata as $body) {
        $value_body = explode('||#||', $body['files']);
        if (!empty($value_body[3]) && $user != 'admin') {
            $jquery .= 'jQuery(".oxi-header-' . $body['id'] . '").click(function() {window.open("' . $value_body[3] . '" ' . $linkopening . ');});';
        }
        echo '<div class="oxi-addons-header-two oxi-header-' . $body['id'] . ' " ref="#oxi-tab-' . $oxiid . '-id-' . $body['id'] . '">  <span class="oxi-addons-badge">' . ($key + 1) . ' </span> ' . $value_body[1] . '</div>';

        echo '<div class="oxi-addons-body ' . OxiAddonsAdminDefine($user) . '" id="oxi-tab-' . $oxiid . '-id-' . $body['id'] . '" style="display: none;">
        ' . $value_body[5] . '
          
        ';
        if ($user == 'admin') {
            echo '<div class="oxi-addons-admin-absulote">
                    <div class="oxi-addons-admin-absulate-edit">
                        <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEdittabsdata") . '
                            <input type="hidden" name="oxi-item-id" value="' . $body['id'] . '">
                            <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                        </form>
                    </div>
                    <div class="oxi-addons-admin-absulate-delete">
                        <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletetabsdata") . '
                            <input type="hidden" name="oxi-item-id" value="' . $body['id'] . '">
                            <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                        </form>
                    </div>
                </div>';
        }
        echo '</div>';
    }
    echo '</div>
                </div>
            </div>
        </div>
    </div>';
    $animationIn = $animationOut = '';
    if ($styledata[5] == 'slide') {
        $animationIn = 'slideDown';
        $animationOut = 'slideUp';
    } else {
        $animationIn = 'fadeIn';
        $animationOut = 'fadeOut';
    }
    $jquery .= ' 
        jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header:eq(' . $styledata[3] . ')").addClass("oxi-active");
        jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two:eq(' . $styledata[3] . ')").addClass("oxi-active");
        jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body:eq(' . $styledata[3] . ')").' . $animationIn . '("slow");
        jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header").click(function() {
        if (jQuery(this).hasClass("oxi-active")) {
            return false
        } else {
            jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header").removeClass("oxi-active");
            jQuery(this).addClass("oxi-active");
            jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body").' . $animationOut . '("slow");
            var activeTab = jQuery(this).attr("ref");
            jQuery(activeTab).' . $animationIn . '("slow"); 
        }
    });
        jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two").click(function() {
        if (jQuery(this).hasClass("oxi-active")) {
            return false
        } else {
            jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two").removeClass("oxi-active");
            jQuery(this).addClass("oxi-active");
            jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body").' . $animationOut . '("slow");
            var activeTab = jQuery(this).attr("ref");
            jQuery(activeTab).' . $animationIn . '("slow");
            var fullwidth = jQuery("html, body").width();';
    if ($styledata[7] == 'true') {
        $jquery .= '    if(fullwidth <= 668){
                        jQuery("html, body").animate({
                            scrollTop: jQuery(".oxi-addons-main-wrapper-' . $oxiid . '").offset().top - ' . $stylefiles[2] . '
                        }, 2000);
                    } ';
    }
    $jquery .= '}
    });
';

    $css .= '
    .oxi-addons-main-wrapper-' . $oxiid . '{
        width: 100%;  
        float: left;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 190) . ';
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper{
        display: flex; 
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 34) . '; 
    }
    .oxi-addons-container *{
        transition: none; 
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-tab-header{ 
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . '; 
        width: ' . $styledata[212] . '%; 
        float: left;
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two{
        display: none; 
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header{  
        display: flex;
        align-items: center;
        width: ' . (100 - $styledata[212]) . '%; 
        position: relative;
        font-size: ' . $styledata[74] . 'px;
        color: ' . $styledata[72] . ';
        ' . OxiAddonsFontSettings($styledata, 78) . ';
        border-style: ' . $styledata[84] . ';
        border-color: ' . $styledata[85] . '; 
        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ' ; 
        padding-top: 20px;
        padding-bottom: 20px;
        padding-left: 10px;
        padding-right: 10px;
        cursor: pointer;  
        border-radius: 5px 0 0 5px; 
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-badge{  
        font-size: 14px;
        width: 20px;
        height: 20px; 
        background: ' . $styledata[72] . ' ;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 5px;
        color: white;
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active .oxi-addons-badge {   
        background: ' . $styledata[206] . ' !important;
        color:' . $styledata[230] . ' !important;  
    }
   
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active{
        color: ' . $styledata[206] . ' !important; 
        background: ' . $styledata[230] . ' !important; 
        ' . OxiAddonsBoxShadowSanitize($styledata, 216) . '; 
        position: relative;   
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active::before{ 
        content: "";
        position: absolute; 
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        background: ' . $styledata[206] . ' !important; 
        width: ' . $styledata[222] . 'px;
        height: ' . $styledata[226] . 'px;  
    }

     .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active .oxi-addons-span-arrow{
        width: 54px;
        position: absolute;
        right: -25px;
        top: 6px;
        height: 52px;
        border-radius: 14px;
        -webkit-border-radius: 14px;
        -moz-border-radius: 14px;
        -ms-border-radius: 14px;
        transform: rotate(50deg);
        -webkit-transform: rotate(50deg);
        -o-transform: rotate(50deg);
        -moz-transform: rotate(50deg);
        -ms-transform: rotate(50deg);
        display: block;
        background: ' . $styledata[230] . ' !important;  
    }


    .oxi-addons-main-wrapper-' . $oxiid . ' .active{
        display: block !important;
    }
  
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two:hover{
        color: ' . $styledata[210] . '; 
        -webkit-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        transition: all 0.2s linear;
    } 
     .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header:hover .oxi-addons-badge{
         background: ' . $styledata[210] . '; 
     } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header:hover{
        color: ' . $styledata[210] . '; 
    }
   
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-tab-body{
        width: ' . (100 - $styledata[212]) . '%; 
        float:left;
        background: ' . $styledata[119] . ';
        border-style: ' . $styledata[121] . ';
        border-color: ' . $styledata[122] . ';
        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 124) . ';
         ' . OxiAddonsBoxShadowSanitize($styledata, 172) . ';  
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body{
        font-size: ' . $styledata[180] . 'px;
        color: ' . $styledata[178] . ';
        ' . OxiAddonsFontSettings($styledata, 184) . '; 
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 156) . '; 
    } 

@media only screen and (min-width : 669px) and (max-width : 993px){
     .oxi-addons-main-wrapper-' . $oxiid . '{ 
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper{ 
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . '; 
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-tab-header{  
        width: ' . $styledata[213] . '%;  
         padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . ';
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header{   
        width: ' . (100 - $styledata[213]) . '%;  
        font-size: ' . $styledata[75] . 'px; 
        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ' ;  
        padding-top: 15px;
        padding-bottom: 15px;
    }
    
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active::before{  
        width: ' . $styledata[223] . 'px;
        height: ' . $styledata[227] . 'px;  
    }
 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-tab-body{
        width: ' . (100 - $styledata[213]) . '%;  
        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 125) . '; 
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body{
        font-size: ' . $styledata[181] . 'px; 
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . '; 
    } 
     .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active .oxi-addons-span-arrow{
        width: 47px;
        position: absolute;
        right: -25px;
        top: 5px;
        height: 44px;
    }
}
    @media only screen and (max-width : 668px){
      .oxi-addons-main-wrapper-' . $oxiid . '{ 
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 192) . '; 
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper{ 
        display: block;
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . '; 
        box-shadow: none; 
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-tab-header{  
        display: none;
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two{
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: ' . $styledata[76] . 'px;
        color: ' . $styledata[72] . ';
        ' . OxiAddonsFontSettings($styledata, 78) . ';
        border-style: ' . $styledata[84] . ';
        border-color: ' . $styledata[85] . ';
        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ' ; 
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 52) . '; 
        padding-top: ' . $styledata[232] . 'px;
        padding-bottom: ' . $styledata[234] . 'px;
        cursor: pointer;
        text-align: center; 
    }  
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active::before{  
        display: none;
    }  
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-tab-body{ 
        width: 100%;
        border: none !important;
        background: transparent;
        
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body{
        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 126) . '; 
        font-size: ' . $styledata[181] . 'px; 
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 158) . '; 
        ' . OxiAddonsBoxShadowSanitize($styledata, 172) . '; 
        background: ' . $styledata[119] . ';
        border-style: ' . $styledata[121] . ';
        border-color: ' . $styledata[122] . ';
        box-shadow: none;
    } 
}
';


    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-animation');
}
