<?php

if (!defined('ABSPATH'))
    exit;

function oxi_info_banner_style_5_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
            <div class="oxi-addons-main-wrapper-' . $oxiid . ' ">';
            if($styledata[203] == 'left'){
                echo ' <div class="oxi-bt-col-lg-4 oxi-bt-col-md-12">
                            <div class="oxi-addons-image-body">
                                '.$image.'
                            </div>
                        </div>';
            }
               echo '<div class="oxi-bt-col-lg-8 oxi-bt-col-md-12"> ';

                            $heading = $content  = '';
                                        
                            if ($stylefiles[2] != '') {
                                $heading = '
                                            <div class="oxi-addons-content-boxes-heading">
                                                ' . OxiAddonsTextConvert($stylefiles[2]) . '
                                            </div>
                                        ';
                            }
                            if ($stylefiles[4] != '') {
                                $content = '
                                            <div class="oxi-addons-content-boxes-content">
                                            ' . OxiAddonsTextConvert($stylefiles[4]) . '
                                            </div>  
                                        ';
                            } 
                        echo '
                            <div class="oxi-addons-header-content">
                                    ' . $heading . '
                                ' . $content . '     
                            </div>
                        ';



                        foreach ($listdata as $value) {
                            $data = explode('||#||', $value['files']);
                          $icon = $title = ''; 
                            if ($data[3] != '') {
                                $icon = '
                                            <div class="oxi-addons-content-boxes-icon" ' . OxiAddonsAnimation($styledata, 195) . '>
                                            ' . oxi_addons_font_awesome($data[3]) . '
                                            </div>  
                                        ';
                            } 
                            if ($data[1] != '') {
                                $title = '
                                            <div class="oxi-addons-content-boxes-icon-title">
                                            ' . OxiAddonsTextConvert($data[1]) . '
                                            </div>  
                                        ';
                            } 
                            echo '<div class="' . OxiAddonsItemRows($styledata, 21) . '  ' . OxiAddonsAdminDefine($user) . '">';
                                echo '<div class="oxi-addons-content-boxes-' . $oxiid . ' " ' . OxiAddonsAnimation($styledata, 87) . '>
                                            <div class="oxi-addons-content-boxes-main">        
                                            ' . $icon . '
                                            ' . $title . '
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
            echo ' </div>';
            if($styledata[203] == 'right'){
                echo ' <div class="oxi-bt-col-lg-4 oxi-bt-col-md-12">
                            <div class="oxi-addons-image-body">
                                '.$image.'
                            </div>
                        </div>';
            }  
            echo '</div>'; 
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
        .oxi-addons-main-wrapper-' . $oxiid . '{
            width: 100%;
            float: left;
            ' . OxiAddonsBGImage($styledata, 199) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 205) . ';
            overflow: hidden;
            display: flex;
            align-items: center;
            background-size: cover;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-body{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 5) . '; 
            text-align: center;
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-body .oxi-addons-img{
            height: auto;
            max-width: '.$styledata[223].'%;
            width: '.$styledata[223].'%;
        }  
        .oxi-addons-content-boxes-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';
            overflow: auto;
            display: inline-block;
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
            display: flex;
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-content{
            width: 100%;
            float:left; 
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-heading{
            width: 100%;
            float:left;
            font-size: ' . $styledata[115] . 'px;
            color: ' . $styledata[119] . ';
            ' . OxiAddonsFontSettings($styledata, 121) . ';    
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 127) . ';   
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content{
            width: 100%;
            float:left;
            font-size: ' . $styledata[143] . 'px;
            color: ' . $styledata[147] . ';
            ' . OxiAddonsFontSettings($styledata, 149) . ';    
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 155) . ';    
        }
        .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon-title{
            width: 100%;
            float:left;
            font-size: ' . $styledata[243] . 'px;
            color: ' . $styledata[247] . ';
            ' . OxiAddonsFontSettings($styledata, 249) . ';    
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 255) . ';   
            display: flex; 
            align-items: center;
        }
        .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon{
            width: 100%;
            float:left; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 227) . ';    
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
            width: '.$styledata[271].'px;
            height: '.$styledata[271].'px;   
        }         
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-main-wrapper-' . $oxiid . '{
                display: block;
            }
            .oxi-addons-main-wrapper-' . $oxiid . '{ 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 206) . '; 
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-body{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 6) . '; 
            }
          
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-body .oxi-addons-img{
                height: auto;
                max-width: '.$styledata[224].'%;
                width: '.$styledata[224].'%;
            }  
            .oxi-addons-content-boxes-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 66) . ';
            }
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon-title{ 
                font-size: ' . $styledata[244] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 256) . ';   
            }
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main{ 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 34) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . ';  
            } 
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-heading{ 
                font-size: ' . $styledata[116] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 128) . ';   
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content{ 
                font-size: ' . $styledata[144] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 156) . ';   
            }  
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons{
                font-size: ' . $styledata[92] . 'px;  
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 174) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 100) . ';   
                width: '.$styledata[272].'px;
                height: '.$styledata[272].'px;   
            } 
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-main-wrapper-' . $oxiid . '{
                display: block;
            }
            .oxi-addons-main-wrapper-' . $oxiid . '{ 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 207) . '; 
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-body{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . '; 
            }
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon-title{ 
                font-size: ' . $styledata[245] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 257) . ';   
                text-align:center;
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-body .oxi-addons-img{
                height: auto;
                max-width: '.$styledata[225].'%;
                width: '.$styledata[225].'%;
            }  
            .oxi-addons-content-boxes-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 67) . ';
            }
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main{ 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . '; 
                display: block;
            } 
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-heading{ 
                font-size: ' . $styledata[117] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';   
                text-align: center;
            }
            .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content{ 
                font-size: ' . $styledata[145] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . ';   
                text-align: center;
            } 
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon-title{
                text-align:center;
                display: block;
            }
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon{
                justify-content:center; 
            } 
            .oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons{
                font-size: ' . $styledata[92] . 'px;  
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 175) . '; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';  
                width: '.$styledata[273].'px;
                height: '.$styledata[273].'px;    
            }  
        }
        ';
      
        if($styledata[203] == 'left'){
            $css .= '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-body .oxi-addons-img{
                        height: auto;
                        max-width: '.$styledata[223].'%;
                        width: '.$styledata[223].'%;
                        transform:translateX(-'.(100 - (( 100 / $styledata[223]) * 100)).'%);
                    } 
                    @media only screen and (min-width : 669px) and (max-width : 993px){ 
                        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-body .oxi-addons-img{
                            height: auto;
                            max-width: '.$styledata[224].'%;
                            width: '.$styledata[224].'%;
                            transform:translateX(-'.(100 - (( 100 / $styledata[224]) * 100)).'%);
                        } 
                    }
                    @media only screen and (max-width : 668px){ 
                        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-body .oxi-addons-img{
                            height: auto;
                            max-width: '.$styledata[225].'%;
                            width: '.$styledata[225].'%;
                            transform:translateX(-'.(100 - (( 100 / $styledata[225]) * 100)).'%);
                        } 
                    }
                    
                    ';

        }
        if($styledata[221] == 'auto'){
            $css .= '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-body .oxi-addons-img{ 
                max-width: 100%;
                width:  auto !important;
                transform:translateX(-0%) !important; 
            } ';
        } 
        $jquery = 'setTimeout(function () {oxiequalHeight(jQuery(".oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main"));}, 500);';
    
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-animation');
    
}
