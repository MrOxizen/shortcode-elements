<?php

if (!defined('ABSPATH'))
    exit;

function oxi_testimonial_style_9_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
        if ($data[7] != '') {
            $info = '
              <div class="oxi-testimonials-style-' . $oxiid . '-info">
                    ' . OxiAddonsTextConvert($data[7]) . '
                </div> 
            ';
        }
        if ($data[3] != '') {
            $name = '
               <a class="oxi-testimonials-style-' . $oxiid . '-name" href="' . $data[9] . '" target="' . $styledata[45] . '"> 
                        ' . OxiAddonsTextConvert($data[3]) . ' 
                </a>
            ';
        }
        if ($data[11] != '') {
            $company = '
                <div class="oxi-testimonials-style-' . $oxiid . '-working">
                    ' . OxiAddonsTextConvert($data[11]) . '
                </div>
            ';
        } 
        echo ' <div class="oxi-testimonials-' . $oxiid . '-padding ' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 63) . ' >
                    <div class="oxi-testimonials-item-' . $oxiid . '">
                            <div class="oxi-testimonials-style-' . $oxiid . ' ' . $styledata[206] . '">
                                '. $info .' 
                                '. $image .'
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
    $css .= ' .oxi-addons-container .oxi-testimonials-' . $oxiid . '-padding{
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
                float: left;                
                background-color:   ' . $styledata[11] . ';
                border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 47) . ';       
                ' . OxiAddonsBoxShadowSanitize($styledata, 68) . ';
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . ':hover{               
                ' . OxiAddonsBoxShadowSanitize($styledata, 224) . ';
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . '; 
                width: 100%;
                float: left;  
                position: relative;
                color: ' . $styledata[122] . ';
                font-size: ' . $styledata[118] . 'px;
                ' . OxiAddonsFontSettings($styledata, 124) . '; 
                text-align: left;
                border-top: ' . $styledata[208] . 'px solid  ' . $styledata[216] . ';
                border-bottom: ' . $styledata[212] . 'px solid ' . $styledata[216] . ';
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . ':hover .oxi-testimonials-style-' . $oxiid . '-info{
                border-top: ' . $styledata[208] . 'px solid  ' . $styledata[222] . ';
                border-bottom: ' . $styledata[212] . 'px solid ' . $styledata[222] . ';
            }
           .oxi-addons-container   .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-info{
                text-align: right;
            }
             .oxi-addons-container .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-info{
                text-align: center;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info:after{
                position: absolute;
                width: ' . $styledata[218] . 'px;
                height: ' . $styledata[218] . 'px;
                display: block;
                background-color:' . $styledata[216] . ';           
                bottom: -' . ($styledata[218] / 2 + $styledata[212]) . 'px;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                -ms-border-radius: 50%;
                -o-border-radius: 50%;
                border-radius: 50%;
                left: 10px;
                content: "";
                display: block;
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . ':hover .oxi-testimonials-style-' . $oxiid . '-info:after{
                background-color:  ' . $styledata[222] . ';
            }
            .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-info:after{
                text-align: right;
                left: auto;
                right: 10px;
            }
            .oxi-addons-container  .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-info:after{              
                -webkit-transform: translateX(-50%);
                -moz-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                -o-transform: translateX(-50%);
                transform: translateX(-50%);
                left: 50%;
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image-parent{
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
                width: 100%;
                float: left;   
                text-align: left;
            }
            .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-image-parent{
                text-align: right;
            }
            .oxi-addons-container  .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-image-parent{
                text-align: center;
            }
           .oxi-addons-container   .oxi-testimonials-style-' . $oxiid . '-image{
                max-width: ' . $styledata[74] . 'px;          
                position: relative;
                display: inline-block;
                width: 100%;
                vertical-align: middle;                
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';                
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
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 82) . ';
                border-style:' . $styledata[98] . '; 
                border-color:' . $styledata[99] . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name-body{
                width: 100%;
                float: left;   
                padding: 0px ' . $styledata[91] . 'px;
            }
             .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name{
                width: 100%;
                float: left; 
                text-align: left;
                color: ' . $styledata[150] . ';
                font-size: ' . $styledata[146] . 'px;
                ' . OxiAddonsFontSettings($styledata, 152) . ';  
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 158) . ';           
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name:hover{
                color: ' . $styledata[180] . ';
            }
            .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-name{
                text-align: right;
            }  
            .oxi-addons-container  .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-name{
                text-align: center;
            }
            .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-working{
                width: 100%;
                float: left; 
                text-align: left;
                color: ' . $styledata[178] . ';
                font-size: ' . $styledata[174] . 'px;
                ' . OxiAddonsFontSettings($styledata, 184) . ';
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 190) . ';                 
            }
            .oxi-addons-container  .oxi-addonsdata-right .oxi-testimonials-style-' . $oxiid . '-working{
                text-align: right;
            }
            .oxi-addons-container  .oxi-addonsdata-center .oxi-testimonials-style-' . $oxiid . '-working{
                text-align: center;
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
               .oxi-addons-container   .oxi-testimonials-' . $oxiid . '-padding{
                     padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';              
                }
               .oxi-addons-container   .oxi-testimonials-item-' . $oxiid . '{
                    max-width: ' . $styledata[8] . 'px;
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';                  
                    font-size: ' . $styledata[119] . 'px;                   
                    border-top: ' . $styledata[209] . 'px solid  ' . $styledata[216] . ';
                    border-bottom: ' . $styledata[213] . 'px solid ' . $styledata[216] . ';
                }
               .oxi-addons-container   .oxi-testimonials-style-' . $oxiid . ':hover .oxi-testimonials-style-' . $oxiid . '-info{
                    border-top: ' . $styledata[209] . 'px solid  ' . $styledata[222] . ';
                    border-bottom: ' . $styledata[213] . 'px solid ' . $styledata[222] . ';
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info:after{                  
                    width: ' . $styledata[219] . 'px;
                    height: ' . $styledata[219] . 'px;               
                    bottom: -' . ($styledata[219] / 2 + $styledata[213]) . 'px;                   
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image-parent{
                    padding: 0px ' . $styledata[92] . 'px;                    
                } 
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image{
                    max-width: ' . $styledata[75] . 'px;  
                    margin:' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
                    }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image:after{
                    padding-bottom:' . $styledata[79] . 'px;                   
                }
               .oxi-addons-container   .oxi-testimonials-style-' . $oxiid . '-image img{              
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
                }
               .oxi-addons-container   .oxi-testimonials-style-' . $oxiid . '-name-body{
                    padding: 0px ' . $styledata[92] . 'px;
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-name{
                    font-size: ' . $styledata[147] . 'px;                    
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 159) . ';           
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-working{                    
                    font-size: ' . $styledata[175] . 'px;                   
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 191) . ';                 
                }
            }
            @media only screen and (max-width : 668px){
               .oxi-addons-container   .oxi-testimonials-' . $oxiid . '-padding{
                     padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';              
                }
                .oxi-addons-container  .oxi-testimonials-item-' . $oxiid . '{
                    max-width: ' . $styledata[9] . 'px;
                }
                 .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 140) . ';                  
                    font-size: ' . $styledata[120] . 'px;                   
                    border-top: ' . $styledata[210] . 'px solid  ' . $styledata[216] . ';
                    border-bottom: ' . $styledata[214] . 'px solid ' . $styledata[216] . ';
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . ':hover .oxi-testimonials-style-' . $oxiid . '-info{
                    border-top: ' . $styledata[210] . 'px solid  ' . $styledata[222] . ';
                    border-bottom: ' . $styledata[214] . 'px solid ' . $styledata[222] . ';
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-info:after{                  
                    width: ' . $styledata[220] . 'px;
                    height: ' . $styledata[220] . 'px;               
                    bottom: -' . ($styledata[220] / 2 + $styledata[214]) . 'px;                   
                }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image-parent{
                    padding: 0px ' . $styledata[93] . 'px;                    
                } 
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image{
                    max-width: ' . $styledata[76] . 'px;  
                    margin:' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 104) . ';
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 84) . ';
                    }
                .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image:after{
                    padding-bottom:' . $styledata[80] . 'px;                   
                }
               .oxi-addons-container   .oxi-testimonials-style-' . $oxiid . '-image img{              
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 104) . ';
                }
               .oxi-addons-container   .oxi-testimonials-style-' . $oxiid . '-name-body{
                    padding: 0px ' . $styledata[93] . 'px;
                }
               .oxi-addons-container   .oxi-testimonials-style-' . $oxiid . '-name{
                    font-size: ' . $styledata[148] . 'px;                    
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 160) . ';           
                }
               .oxi-addons-container   .oxi-testimonials-style-' . $oxiid . '-working{                    
                    font-size: ' . $styledata[176] . 'px;                   
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 192) . ';                 
                }
            }
';
    OxiAddonsInlineCSSData($css);
}
