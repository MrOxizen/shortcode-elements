<?php

if (!defined('ABSPATH'))
    exit;

function oxi_testimonial_style_12_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
               <div class="oxi-testimonials-style-' . $oxiid . '-image">
                    <img src="' . OxiAddonsUrlConvert($data[1]) . '">
                </div>
            ';
        }
        if ($data[5] != '') {
            $info = '
                <div class="oxi-testimonials-style-' . $oxiid . '-info">
                    ' . OxiAddonsTextConvert($data[5]) . '
                </div> 
            ';
        }
        if ($data[3] != '') {
            $name = '
               <a class="oxi-testimonials-style-' . $oxiid . '-name" href="' . $data[9] . '" target="' . $styledata[47] . '"> 
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
        echo ' <div class="oxi-testimonials-' . $oxiid . '-padding ' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 49) . ' >
                    <div class="oxi-testimonials-item-' . $oxiid . '">
                            <div class="oxi-testimonials-style-' . $oxiid . ' ' . $styledata[11] . '">
                                '. $image .'
                                '. $info .' 
                                <div class="oxi-testimonials-style-' . $oxiid . '-name-body">        
                                    '. $name .' 
                                    '. $company .'  
                                </div>
                            </div> 
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
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';  
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
                position: relative;                
                border-bottom-width:  ' . $styledata[242] . 'px;
                border-bottom-style: solid;
                border-bottom-color: ' . $styledata[244] . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';   
                background-color:   ' . $styledata[13] . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 54) . ';
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . ':hover{
                cursor: pointer;
                ' . OxiAddonsBoxShadowSanitize($styledata, 246) . ';
                }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image{
                position: relative;
                display: block;
                margin: ' . $styledata[238] . 'px auto ' . $styledata[238] . 'px 0;
                max-width: ' . $styledata[60] . 'px;               
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . '; 
                border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 68) . '; 
                border-style:' . $styledata[84] . '; 
                border-color:' . $styledata[85] . '; 
            }
             .oxi-addons-container .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-image{
                margin: ' . $styledata[238] . 'px 0 ' . $styledata[238] . 'px  auto;
            }
             .oxi-addons-container .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-image{
                margin: ' . $styledata[238] . 'px auto;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image:after{
                padding-bottom:' . $styledata[64] . 'px;
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
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . '; 
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name-body{
                width: 100%;
                float: left;                  
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name{
                width: 100%;
                float: left; 
                text-align: left;
                color: ' . $styledata[124] . ';
                font-size: ' . $styledata[120] . 'px;
                ' . OxiAddonsFontSettings($styledata, 126) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 132) . ';                     
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name:hover{
                color:  ' . $styledata[192] . ';
            }
             .oxi-addons-container .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-name{
                text-align: right;
            }  
             .oxi-addons-container .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-name{
                text-align: center;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-working{
                width: 100%;
                float: left; 
                text-align: left;
                color: ' . $styledata[214] . ';
                font-size: ' . $styledata[210] . 'px;
                ' . OxiAddonsFontSettings($styledata, 216) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 222) . ';           
            }
             .oxi-addons-container .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-working{
                text-align: right;
            }
             .oxi-addons-container .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-working{
                text-align: center;
            }            
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info{
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 160) . ';
                width: 100%;
                float: left;  
                position: relative;
                font-size: ' . $styledata[148] . 'px;
                ' . OxiAddonsFontSettings($styledata, 154) . ';
                color: ' . $styledata[152] . ';
                text-align: left;
            }
             .oxi-addons-container .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-info{
                text-align: right;
            }
             .oxi-addons-container .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-info{
                text-align: center;
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-container  .oxi-testimonials-' . $oxiid . '-padding{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 32) . ';  
                }
                .oxi-addons-container  .oxi-testimonials-item-' . $oxiid . '{                  
                    max-width: ' . $styledata[8] . 'px;                   
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '{     
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image{
                    margin: ' . $styledata[239] . 'px auto ' . $styledata[239] . 'px 0;
                    max-width: ' . $styledata[61] . 'px;               
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . '; 
                    border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';                    
                }
                .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-image{
                    margin: ' . $styledata[239] . 'px 0 ' . $styledata[239] . 'px  auto;
                }
                .oxi-addons-container  .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-image{
                    margin: ' . $styledata[239] . 'px auto;
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image:after{
                    padding-bottom:' . $styledata[65] . 'px;
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image img{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . '; 
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name, a .oxi-testimonials-style-' . $oxiid . '-name{
                    font-size: ' . $styledata[121] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 133) . ';                     
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-working{                  
                    font-size: ' . $styledata[211] . 'px;                    
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 223) . ';           
                }         
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info{
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';                   
                    font-size: ' . $styledata[149] . 'px;
                }
            }
            @media only screen and (max-width : 668px){
                .oxi-addons-container  .oxi-testimonials-' . $oxiid . '-padding{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';  
                }
                .oxi-addons-container  .oxi-testimonials-item-' . $oxiid . '{                  
                    max-width: ' . $styledata[9] . 'px;                   
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '{     
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image{
                    margin: ' . $styledata[240] . 'px auto ' . $styledata[240] . 'px 0;
                    max-width: ' . $styledata[62] . 'px;               
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 90) . '; 
                    border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 70) . ';                    
                }
                .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-image{
                    margin: ' . $styledata[240] . 'px 0 ' . $styledata[240] . 'px  auto;
                }
                .oxi-addons-container  .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-image{
                    margin: ' . $styledata[240] . 'px auto;
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image:after{
                    padding-bottom:' . $styledata[66] . 'px;
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image img{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 90) . '; 
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name, a .oxi-testimonials-style-' . $oxiid . '-name{
                    font-size: ' . $styledata[122] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 134) . ';                     
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-working{                  
                    font-size: ' . $styledata[212] . 'px;                    
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 224) . ';           
                }         
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info{
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 162) . ';                   
                    font-size: ' . $styledata[150] . 'px;
                }
            }
';
    OxiAddonsInlineCSSData($css);
}
