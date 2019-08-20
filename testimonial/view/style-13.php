<?php

if (!defined('ABSPATH'))
    exit;

function oxi_testimonial_style_13_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
                </div>
            ';
        }
        if ($data[3] != '') {
            $name = '
                <a  class="oxi-testimonials-style-' . $oxiid . '-name" href="' . $data[9] . '" target="' . $styledata[47] . '"> 
                        ' . OxiAddonsTextConvert($data[3]) . ' 
                </a>
            ';
        }
        if ($data[9] != '') {
            $company = '
                  <div class="oxi-testimonials-style-' . $oxiid . '-designation">
                        ' . OxiAddonsTextConvert($data[9]) . '
                    </div>
            ';
        } 
        echo ' <div class="oxi-testimonials-' . $oxiid . '-padding ' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 49) . ' >
                    <div class="oxi-testimonials-item-' . $oxiid . '">
                        <div class="oxi-testimonials-style-' . $oxiid . '">
                            ' . $info . '
                            <div class="oxi-testimonials-style-' . $oxiid . '-image-body-parent">
                                    ' . $image . '
                                <div class="oxi-testimonials-style-' . $oxiid . '-body-parent">
                                    ' . $name . '
                                    ' . $company . ' 
                                </div>
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
    $css .= '.oxi-addons-container .oxi-testimonials-' . $oxiid . '-padding{
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';  
            }
             .oxi-addons-container .oxi-testimonials-item-' . $oxiid . '{
                max-width: ' . $styledata[7] . 'px;
                width: 100%;
                margin: 0 auto;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '{
                width: 100%;   
                background-color:   ' . $styledata[13] . ';
                float: left;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info{
                width: 100%;
                float: left;
                font-size: ' . $styledata[148] . 'px;
                ' . OxiAddonsFontSettings($styledata, 154) . ';
                color: ' . $styledata[152] . ';
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 160) . ';
            }            
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image-body-parent{
                width: 100%;
                float: left;
                align-items: center;
                display: flex;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image-parent{
                width: 50%;
                float: left;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . '; 
            }            
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image{
                max-width: ' . $styledata[60] . 'px;               
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . '; 
                border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 68) . '; 
                border-style:' . $styledata[84] . '; 
                border-color:' . $styledata[85] . '; 
                position: relative;
                width: 100%;
                display: inline-block;
                float: right;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image:after{
                content: "";
                padding-bottom: ' . $styledata[64] . 'px;
                display:block;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image img{
                position: absolute;
                top:0;
                bottom: 0;
                width: 100%;
                height: 100%;
                display: block;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . '; 
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-body-parent{
                width: 50%;
                float: left;     
            }
             .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name{
                width: 100%;
                float: left;
                color: ' . $styledata[124] . ';
                font-size: ' . $styledata[120] . 'px;
                ' . OxiAddonsFontSettings($styledata, 126) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 132) . ';      
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-body-parent:hover, a .oxi-testimonials-style-' . $oxiid . '-name:hover{
                color: ' . $styledata[192] . ';
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-body-parent .oxi-testimonials-style-' . $oxiid . '-designation{
                width: 100%;
                float: left; 
                color: ' . $styledata[214] . ';
                font-size: ' . $styledata[210] . 'px;
                ' . OxiAddonsFontSettings($styledata, 216) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 222) . ';      
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-container  .oxi-testimonials-' . $oxiid . '-padding{
                   padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 32) . ';  
                }
                .oxi-addons-container  .oxi-testimonials-item-' . $oxiid . '{
                    max-width: ' . $styledata[8] . 'px;
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info{                  
                    font-size: ' . $styledata[149] . 'px;
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
                } 
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image-parent{                  
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 16) . '; 
                }            
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image{
                    max-width: ' . $styledata[61] . 'px;               
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . '; 
                    border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';                     
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image:after{                   
                    padding-bottom: ' . $styledata[65] . 'px;                    
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image img{                  
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . '; 
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name{                   
                    font-size: ' . $styledata[121] . 'px;                   
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 133) . ';      
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-body-parent .oxi-testimonials-style-' . $oxiid . '-designation{
                    font-size: ' . $styledata[210] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 222) . ';      
                }
            }
            @media only screen and (max-width : 668px){
               .oxi-addons-container   .oxi-testimonials-' . $oxiid . '-padding{
                   padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';  
                }
                .oxi-addons-container  .oxi-testimonials-item-' . $oxiid . '{
                    max-width: ' . $styledata[9] . 'px;
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info{                  
                    font-size: ' . $styledata[150] . 'px;
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 162) . ';
                } 
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image-parent{                  
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . '; 
                }            
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image{
                    max-width: ' . $styledata[62] . 'px;               
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 90) . '; 
                    border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 70) . ';                     
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image:after{                   
                    padding-bottom: ' . $styledata[66] . 'px;                    
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image img{                  
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 90) . '; 
                }
                .oxi-addons-container  a .oxi-testimonials-style-' . $oxiid . '-name{                   
                    font-size: ' . $styledata[122] . 'px;                   
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 134) . ';      
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-body-parent .oxi-testimonials-style-' . $oxiid . '-designation{
                    font-size: ' . $styledata[211] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 223) . ';      
                }
            }
';
    OxiAddonsInlineCSSData($css);
}
