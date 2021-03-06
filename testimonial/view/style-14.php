<?php

if (!defined('ABSPATH'))
    exit;

function oxi_testimonial_style_14_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    echo '<div class="oxi-addons-container"><div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $image = $info  = $name = $company = '';
        if ($data[1] != '') {
            $image = '
                <div class="oxi-testimonials-style-' . $oxiid . '-image-parent">
                    <div class="oxi-testimonials-style-' . $oxiid . '-image">
                        <img src="' . OxiAddonsUrlConvert($data[1]) . '">
                    </div>
                </div> 
            ';
        }
        if ($data[5] != '') {
            $info = '
                 <div class="oxi-testimonials-style-' . $oxiid . '-info">
                    ' . OxiAddonsTextConvert($data[5]) . '
                    <div class="oxi-before"> </div>
                    <div class="oxi-after"> </div>
                </div>
            ';
        }
        if ($data[3] != '') {
            $name = '
               <a class="oxi-testimonials-style-' . $oxiid . '-name" href="' . $data[9] . '" target="' . $styledata[29] . '"> 
                    ' . OxiAddonsTextConvert($data[3]) . ' 
                </a>
            ';
        }
        if ($data[9] != '') {
            $company = '
                <div class="oxi-testimonials-style-' . $oxiid . '-working">
                    ' . OxiAddonsTextConvert($data[9]) . '
                </div>
            ';
        } 
        echo ' <div class="oxi-testimonials-' . $oxiid . '-padding ' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 31) . ' >
                    <div class="oxi-testimonials-item-' . $oxiid . '">
                            <div class="oxi-testimonials-style-' . $oxiid . ' ' . $styledata[11] . '">                                
                                <div class="oxi-testimonials-style-' . $oxiid . '-name-body-parent">
                                    '. $image .'
                                    <div class="oxi-testimonials-style-' . $oxiid . '-name-body">    
                                        '. $name .'
                                        '. $company .' 
                                    </div>
                                </div>                               
                            </div>
                            ' . $info . '
                    </div>';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                            <div class="oxi-addons-admin-absulate-edit">
                                <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEdittestimonialdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                </form>
                            </div>
                            <div class="oxi-addons-admin-absulate-delete">
                                <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletetestimonialdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                </form>
                            </div>
                        </div>';
        }
        echo '</div>';
    }
    echo '</div></div>';
    $css .= '  .oxi-addons-container .oxi-testimonials-' . $oxiid . '-padding{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';  
            }
             .oxi-addons-container .oxi-testimonials-item-' . $oxiid . '{
                position: relative;
                max-width: ' . $styledata[7] . 'px;
                width: 100%;
                margin: 0 auto;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '{
                width: 100%;
                float: left; 
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name-body-parent{
                width: 100%;
                float: left; 
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image-parent{
                max-width: ' . $styledata[36] . 'px;
                width: 100%;
                float: left;  
                text-align: left;
                padding-bottom:' . $styledata[146] . 'px;
            }   
             .oxi-addons-container .oxi-testimonials-center .oxi-testimonials-style-' . $oxiid . '-image-parent{
                width: 100%;
                max-width: 50%;
                text-align: right;
            }
             .oxi-addons-container .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-image-parent{
                max-width: ' . $styledata[36] . 'px;
                width: 100%;
                float: right;  
                text-align: left;
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image{
                max-width: ' . $styledata[36] . 'px;
                position: relative;
                display: inline-block;
                width: 100%;                
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 44) . '; 
            }           
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image:after{
                padding-bottom:' . $styledata[40] . 'px;
                content: "";
                display: block;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image img{              
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%; 
                display: block;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 44) . '; 
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name-body{                
                float: left;    
                width: calc(100% - ' . $styledata[36] . 'px);          
            }
             .oxi-addons-container .oxi-testimonials-center .oxi-testimonials-style-' . $oxiid . '-name-body{
                width: 100%;
                max-width: 50%;
                text-align: left;
            }
             .oxi-addons-container .oxi-testimonials-right .oxi-testimonials-style-' . $oxiid . '-name-body{
                width: calc(100% - ' . $styledata[36] . 'px);
                float: left;  
                text-align: right;
            }            
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name{
                width: 100%;
                float: left; 
                color: ' . $styledata[64] . ';
                font-size: ' . $styledata[60] . 'px;
                ' . OxiAddonsFontSettings($styledata, 66) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';             
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name:hover{
                color: ' . $styledata[116] . ';
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-working{
                width: 100%;
                float: left; 
                color: ' . $styledata[122] . ';
                font-size: ' . $styledata[118] . 'px;
                ' . OxiAddonsFontSettings($styledata, 124) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';                
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info{
                width: 100%;
                float: left;  
                font-size: ' . $styledata[88] . 'px;
                ' . OxiAddonsFontSettings($styledata, 94) . ';
                color: ' . $styledata[92] . ';
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 100) . ';
                background-color:  ' . $styledata[11] . ';
                position: relative;                
                text-align: left;
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info .oxi-before{
                position: absolute;
                left: 0;
                bottom: -' . $styledata[150] . 'px;
                width: 0;
                height: 0;
                border-top: ' . $styledata[150] . 'px solid ' . $styledata[152] . ';
                border-right: ' . $styledata[150] . 'px solid transparent;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info .oxi-after{
                position: absolute;
                right: 0;
                bottom: -' . $styledata[150] . 'px;
                width: 0;
                height: 0;
                border-top: ' . $styledata[150] . 'px solid ' . $styledata[152] . ';
                border-left: ' . $styledata[150] . 'px solid transparent;
            }
             .oxi-addons-container .oxi-testimonials-right .oxi-testimonials-style-' . $oxiid . '-info{
                text-align: right;
            }
             .oxi-addons-container .oxi-testimonials-center .oxi-testimonials-style-' . $oxiid . '-info{
                text-align: center;
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-container  .oxi-testimonials-' . $oxiid . '-padding{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';  
                }
                 .oxi-addons-container .oxi-testimonials-item-' . $oxiid . '{                    
                    max-width: ' . $styledata[8] . 'px;                  
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image-parent{
                    max-width: ' . $styledata[37] . 'px;                    
                    padding-bottom:' . $styledata[147] . 'px;
                }  
                
                 .oxi-addons-container .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-image-parent{
                    max-width: ' . $styledata[37] . 'px;                    
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image{
                    max-width: ' . $styledata[37] . 'px;                      
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 45) . '; 
                }           
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image:after{
                    padding-bottom:' . $styledata[41] . 'px;
                                   }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image img{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 45) . '; 
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name-body{  
                    width: calc(100% - ' . $styledata[37] . 'px);          
                }
                .oxi-addons-container  .oxi-testimonials-right .oxi-testimonials-style-' . $oxiid . '-name-body{
                    width: calc(100% - ' . $styledata[37] . 'px);
                }            
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name{               
                    font-size: ' . $styledata[61] . 'px;                  
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';             
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-working{                 
                    font-size: ' . $styledata[119] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';                
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info{                
                    font-size: ' . $styledata[89] . 'px;                   
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
                }
            }
            @media only screen and (max-width : 668px){
                .oxi-addons-container  .oxi-testimonials-' . $oxiid . '-padding{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';  
                }
                .oxi-addons-container  .oxi-testimonials-item-' . $oxiid . '{                    
                    max-width: ' . $styledata[9] . 'px;                  
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image-parent{
                    max-width: ' . $styledata[38] . 'px;                    
                    padding-bottom:' . $styledata[148] . 'px;
                }  
                
                 .oxi-addons-container .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-image-parent{
                    max-width: ' . $styledata[38] . 'px;                    
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image{
                    max-width: ' . $styledata[38] . 'px;                      
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 46) . '; 
                }           
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image:after{
                    padding-bottom:' . $styledata[42] . 'px;
                                   }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image img{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 46) . '; 
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name-body{  
                    width: calc(100% - ' . $styledata[38] . 'px);          
                }
                 .oxi-addons-container .oxi-testimonials-right .oxi-testimonials-style-' . $oxiid . '-name-body{
                    width: calc(100% - ' . $styledata[38] . 'px);
                }            
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name{               
                    font-size: ' . $styledata[62] . 'px;                  
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 74) . ';             
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-working{                 
                    font-size: ' . $styledata[120] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 132) . ';                
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info{                
                    font-size: ' . $styledata[90] . 'px;                   
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
                }
            }
';
    OxiAddonsInlineCSSData($css);
}
