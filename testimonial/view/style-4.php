<?php

if (!defined('ABSPATH'))
    exit;

function oxi_testimonial_style_4_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    echo '<div class="oxi-addons-container"><div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $image = $info = $name = $company =  '';
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
                 <div class="oxi-testimonials-style-' . $oxiid . '-name">
                        ' . OxiAddonsTextConvert($data[3]) . '
                    </div>
            ';
        }
        if ($data[11] != '') {
            $company = '
                   <div class="oxi-testimonials-style-' . $oxiid . '-working">
                        <a href="' . $data[7] . '" target="' . $styledata[45] . '">@' . OxiAddonsTextConvert($data[11]) . '</a>
                    </div>
            ';
        }
        echo ' <div class="oxi-testimonials-' . $oxiid . '-padding ' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 63) . ' >
                    <div class="oxi-testimonials-item-' . $oxiid . ' ' . $styledata[222] . '">
                            <div class="oxi-testimonials-style-' . $oxiid . '">                                
                                '. $info .'
                                <div class="oxi-testimonials-style-' . $oxiid . '-left">
                                '. $image .'
                                </div>
                                <div class="oxi-testimonials-style-' . $oxiid . '-right">
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
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';          
            }
             .oxi-addons-container .oxi-testimonials-item-' . $oxiid . '{
                position: relative;
                max-width: ' . $styledata[7] . 'px;
                width: 100%;
                margin: 0 auto;
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '{
                width: 100%;
                position: relative;
                float: left;
                text-align: left;
                background: ' . $styledata[11] . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
                border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 47) . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 68) . ';
               }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-left{
                width: ' . $styledata[74] . 'px;
                float: left;
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-right{    
                width: calc(100% - ' . $styledata[74] . 'px);
                padding-left: ' . $styledata[224] . 'px;
                float: left;
            }
            .oxi-addons-container  .oxi-addonsdata-right  .oxi-testimonials-style-' . $oxiid . '-left, 
            .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-right{
                float: right;
                text-align: right;
            }
            .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-right{
                float: right;
                text-align: right;
                padding-left: 0px;
                padding-right: ' . $styledata[224] . 'px;
            }
            .oxi-addons-container  .oxi-addonsdata-center  .oxi-testimonials-style-' . $oxiid . '-left, 
            .oxi-addons-container  .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-right{
                float: left;
                text-align: center;
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image{
                max-width: ' . $styledata[74] . 'px;              
                width: 100%;
                position: relative;
                float: left;               
            }

            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image:after{
                padding-bottom:' . $styledata[78] . 'px;
                content: "";
                display: block;
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image img{              
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%; 
                display: block;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 82) . ';
                border-style:' . $styledata[98] . '; 
                border-color:' . $styledata[99] . '; 
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info{
                width: 100%;
                float: left;       
                text-align: left;
                font-size: ' . $styledata[134] . 'px;
                color: ' . $styledata[138] . ';
                ' . OxiAddonsFontSettings($styledata, 140) . ';
                line-height: 130%; 
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 146) . ';  
            }
            .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-info{
                text-align: right;
            }
           .oxi-addons-container   .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-info{
                text-align: center;
            }            
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name{
                width: 100%;
                float: left; 
                text-align: left;
                font-size: ' . $styledata[162] . 'px;
                color: ' . $styledata[166] . ';
                ' . OxiAddonsFontSettings($styledata, 168) . ';
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 174) . ';                     
            }
            .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-name{
                text-align: right;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-working{
                width: 100%;
                float: left; 
                text-align: left;
                font-size: ' . $styledata[190] . 'px;
                ' . OxiAddonsFontSettings($styledata, 200) . ';
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 206) . ';                  
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-working a{
                color: ' . $styledata[194] . ';
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-working a:hover,
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-working a:active,
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-working a:focus{               
                color: ' . $styledata[198] . ';
                text-decoration:none;
            }
            .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-working{
                text-align: right;
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-container  .oxi-testimonials-' . $oxiid . '-padding{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';          
                }
                .oxi-addons-container  .oxi-testimonials-item-' . $oxiid . '{
                    max-width: ' . $styledata[8] . 'px;
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '{                   
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
                    border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 48) . ';
                   }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-left{
                    width: ' . $styledata[75] . 'px;                    
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-right{    
                    width: calc(100% - ' . $styledata[75] . 'px);
                    padding-left: ' . $styledata[225] . 'px;                   
                }
                .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-right{                  
                    padding-right: ' . $styledata[225] . 'px;
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image{
                    max-width: ' . $styledata[75] . 'px;  
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image:after{
                    padding-bottom:' . $styledata[79] . 'px;                    
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image img{  
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';                   
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info{                   
                    font-size: ' . $styledata[135] . 'px;
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 147) . ';  
                }          
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name{
                    font-size: ' . $styledata[163] . 'px;                   
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 175) . ';                     
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-working{                  
                    font-size: ' . $styledata[191] . 'px;
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 207) . ';                  
                }
            }
            @media only screen and (max-width : 668px){
                .oxi-addons-container  .oxi-testimonials-' . $oxiid . '-padding{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';          
                }
                .oxi-addons-container  .oxi-testimonials-item-' . $oxiid . '{
                    max-width: ' . $styledata[9] . 'px;
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '{                   
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
                    border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 49) . ';
                   }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-left{
                    width: ' . $styledata[76] . 'px;                    
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-right{    
                    width: calc(100% - ' . $styledata[76] . 'px);
                    padding-left: ' . $styledata[226] . 'px;                   
                }
                .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-right{                  
                    padding-right: ' . $styledata[226] . 'px;
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image{
                    max-width: ' . $styledata[76] . 'px;  
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image:after{
                    padding-bottom:' . $styledata[80] . 'px;                    
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image img{  
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 104) . ';
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 84) . ';                   
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info{                   
                    font-size: ' . $styledata[136] . 'px;
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 148) . ';  
                }          
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name{
                    font-size: ' . $styledata[164] . 'px;                   
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 176) . ';                     
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-working{                  
                    font-size: ' . $styledata[192] . 'px;
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 208) . ';                  
                }
            }
';
    OxiAddonsInlineCSSData($css);
}
