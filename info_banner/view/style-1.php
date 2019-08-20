<?php

if (!defined('ABSPATH'))
    exit;

function oxi_info_banner_style_1_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = ''; 
    $image = '';
    if($styledata[14] != ''){
        $image = ' <img src="'.OxiAddonsUrlConvert($styledata[3]).'" alt="front images" class="oxi-addons-img">';
    } 
    echo '<div class="oxi-addons-container">
          <div class="oxi-addons-row">
            <div class="oxi-addons-main-wrapper-' . $oxiid . ' ">
               '.$image.'
            </div>'; 
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $heading = $content  = $icon = '';
     
        if ($data[1] != '') {
            $heading = '
                        <div class="oxi-addons-content-boxes-heading">
                            ' . OxiAddonsTextConvert($data[1]) . '
                        </div>
                    ';
        }
        if ($data[3] != '') {
            $content = '
                        <div class="oxi-addons-content-boxes-content">
                        ' . OxiAddonsTextConvert($data[3]) . '
                        </div>  
                    ';
        } 
        if ($data[5] != '') {
            $icon = '
                        <div class="oxi-addons-content-boxes-icon" ' . OxiAddonsAnimation($styledata, 195) . '>
                            ' . oxi_addons_font_awesome($data[5]) . '
                        </div>  
                    ';
        } 
        echo '<div class="' . OxiAddonsItemRows($styledata, 21) . '  ' . OxiAddonsAdminDefine($user) . ' ">';
             echo '<div class="oxi-addons-content-boxes-' . $oxiid . ' " ' . OxiAddonsAnimation($styledata, 87) . '>
                        <div class="oxi-addons-content-boxes-main">                        
                            ' . $icon . '
                            ' . $heading . '
                            ' . $content . '              
                        </div>
                    </div>';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                        <div class="oxi-addons-admin-absulate-edit">
                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditinfo_bannerdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                            </form>
                        </div>
                        <div class="oxi-addons-admin-absulate-delete">
                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteinfo_bannerdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                            </form>
                        </div>
                    </div>';
        }
        echo '</div>';
    }
    echo '</div></div>';
    $justify = '';
    if($styledata[97] == 'left'){
        $justify = 'justify-content: flex-start;';
    }elseif($styledata[97] == 'right'){
        $justify = 'justify-content: flex-end;';
    }else{
        $justify = 'justify-content: center;';
    }

    $css .= ' 
        .oxi-addons-main-wrapper-' . $oxiid . ' {
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 5) . '; 
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-img{
            width: 100%;
            height: 100%;
        }
        .oxi-addons-content-boxes-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';
            display: inline-block;
            overflow: auto;
        }
        .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main{
            width: 100%;
            float:left; 
            background: '.$styledata[25].';
            border:  ' . $styledata[27] . 'px ' . $styledata[28] . ';
            border-color: ' . $styledata[31] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 81) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . '; 
        } 
        .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-heading{
            width: 100%;
            float:left;
            font-size: ' . $styledata[115] . 'px;
            color: ' . $styledata[119] . ';
            ' . OxiAddonsFontSettings($styledata, 121) . ';    
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 127) . ';   
        }
        .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-content{
            width: 100%;
            float:left;
            font-size: ' . $styledata[143] . 'px;
            color: ' . $styledata[147] . ';
            ' . OxiAddonsFontSettings($styledata, 149) . ';    
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 155) . ';   
        }
     
        .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon{
            width: 100%;
            float:left;  
            display: flex;  
            '.$justify.'
        }
     
        .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons{
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-size: ' . $styledata[91] . 'px; 
            line-height:1;
            color: ' . $styledata[95] . ';  
            background: '.$styledata[171].';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 173) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 189) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 99) . ';   
            width: '.$styledata[199].'px;
            height: '.$styledata[199].'px;
        }
     
                
        @media only screen and (min-width : 669px) and (max-width : 993px){
             .oxi-addons-main-wrapper-' . $oxiid . ' {
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 6) . '; 
            } 
            .oxi-addons-content-boxes-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 66) . ';
            }
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main{  
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 34) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . '; 
            } 
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-heading{ 
                font-size: ' . $styledata[116] . 'px;  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 128) . ';   
            }
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-content{ 
                font-size: ' . $styledata[144] . 'px;   
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 156) . ';   
            }
        
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons{ 
                font-size: ' . $styledata[92] . 'px;   
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 174) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 100) . ';   
                width: '.$styledata[200].'px;
                height: '.$styledata[200].'px;
            }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-main-wrapper-' . $oxiid . ' {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . '; 
            } 
            .oxi-addons-content-boxes-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 67) . ';
            }
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main{  
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . '; 
            } 
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-heading{ 
                font-size: ' . $styledata[117] . 'px;  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';   
            }
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-content{ 
                font-size: ' . $styledata[145] . 'px;   
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . ';   
            } 
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon{ 
                justify-content: center !important; 
            }
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons{ 
                font-size: ' . $styledata[93] . 'px;   
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 175) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';   
                width: '.$styledata[201].'px;
                height: '.$styledata[201].'px;
            }
        }
        ';
        $jquery = 'setTimeout(function () {oxiequalHeight(jQuery(".oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main"));}, 500);';
       
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-animation');
}
