<?php

if (!defined('ABSPATH'))
    exit;

function oxi_testimonial_style_1_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $image = $info = $rating = $name =  '';
        if($data[1] != ''){
            $image = '
                    <div class="oxi-testimonials-style-' . $oxiid . '-image">                               
                        <img src="' . OxiAddonsUrlConvert($data[1]) . '">  
                    </div>
            ';
        }
        if($data[7] != ''){
            $info = '
                    <div class="oxi-testimonials-style-' . $oxiid . '-info">
                        ' . OxiAddonsTextConvert($data[7]) . '
                    </div>
            ';
        }
        if($data[5] != ''){
            $rating = '
                    <div class="oxi-testimonials-style-' . $oxiid . '-rating">
                        ' . OxiAddonsPublicRate($data[5]) . '                                
                     </div>
            ';
        }
        if($data[3] != '' && $data[9] != ''){
            $name = '
                      <a href="' . $data[9] . '" class="oxi-testimonials-style-' . $oxiid . '-name" target="' . $styledata[45] . '">
                            ' . OxiAddonsTextConvert($data[3]) . ' 
                      </a>
            ';
        }elseif($data[3] != '' && $data[9] == ''){
            $name = '
                      <div class="oxi-testimonials-style-' . $oxiid . '-name" >
                            ' . OxiAddonsTextConvert($data[3]) . ' 
                      </div>
            ';
        }


        echo ' <div class="oxi-testimonials-' . $oxiid . '-padding ' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 63) . ' >
                    <div class="oxi-testimonials-item-' . $oxiid . '">
                        <div class="oxi-testimonials-style-' . $oxiid . '">
                            '.$image.'
                            '.$info.' 
                            '.$rating.'  
                            '.$name.'  
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
            .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '{
                width: 100%;
                position: relative;
                float: left;
                text-align: left;
                background:' . $styledata[11] . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';                 
                border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 47) . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 68) . ';
                }
            .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image{
                width: 100%;
                display: block;
                position: relative;
                margin:0 auto ' . $styledata[234] . 'px;
                max-width: ' . $styledata[74] . 'px;            
                vertical-align: middle;               
            }
            .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image:after{
                padding-bottom:' . $styledata[78] . 'px;
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
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 82) . ';
                border-style:' . $styledata[98] . '; 
                border-color:' . $styledata[99] . ';
            }
            .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info{
                width: 100%;
                float: left;                
                font-size: ' . $styledata[134] . 'px;
                color: ' . $styledata[138] . ';
                ' . OxiAddonsFontSettings($styledata, 140) . ';                
                line-height: 130%;                
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 146) . ';
            }
            .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-rating{
                text-align: center;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 218) . ';  
            }
            .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-rating i{
                font-size: ' . $styledata[212] . 'px;
                color:  ' . $styledata[216] . ';
                padding: 0 2px;
            }
            .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name{
                display: flex;
                align-items: center;
                justify-content: center;
                width: '.$styledata[196].'px;
                height: '.$styledata[200].'px;
                position: absolute;
                top:100%;
                -webkit-transform: translateX(-50%);
                -moz-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                -o-transform: translateX(-50%);
                transform: translateX(-50%) translateY(-50%);
                left: 50%;
                line-height: 100%;
                color: ' . $styledata[166] . ';
                font-size: ' . $styledata[162] . 'px;
                background: ' . $styledata[168] . ';
                ' . OxiAddonsFontSettings($styledata, 174) . ';          
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 180) . ';   
                cursor: pointer;
            }
            .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name:hover,
            .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name:active,
            .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name:focus{               
                color: ' . $styledata[170] . ';
                background: ' . $styledata[172] . ';
            }    
            @media only screen and (min-width : 669px) and (max-width : 993px){
               .oxi-addons-container  .oxi-testimonials-' . $oxiid . '-padding{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';                
                }
               .oxi-addons-container  .oxi-testimonials-item-' . $oxiid . '{                   
                    max-width: ' . $styledata[8] . 'px;
                }
               .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';                 
                    border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 48) . ';                   
                    }
               .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-image{
                    width: ' . $styledata[75] . 'px;                   
                    margin:0 auto ' . $styledata[235] . 'px;
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
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 147) . ';
                }
               .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-rating{                   
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 219) . ';  
                }
               .oxi-addons-container  .oxi-testimonials-style-' . $oxiid . '-rating i{
                    font-size: ' . $styledata[213] . 'px; 
                }
                .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name{                   
                    font-size: ' . $styledata[163] . 'px;                             
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 181) . ';  
                }               
            }
            @media only screen and (max-width : 668px){
            .oxi-addons-container .oxi-testimonials-' . $oxiid . '-padding{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';                
                }
                .oxi-addons-container .oxi-testimonials-item-' . $oxiid . '{                   
                    max-width: ' . $styledata[9] . 'px;
                }
                .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';                 
                    border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 49) . ';                   
                    }
                .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image{
                    width: ' . $styledata[76] . 'px;                   
                    margin:0 auto ' . $styledata[236] . 'px;
                }
                .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image:after{
                    padding-bottom:' . $styledata[80] . 'px;                   
                }
                .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-image img{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 104) . ';
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 84) . ';
                }
                .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info{                           
                    font-size: ' . $styledata[136] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 148) . ';
                }
                .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-rating{                   
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 220) . ';  
                }
                .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-rating i{
                    font-size: ' . $styledata[214] . 'px; 
                }
                .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-name{                   
                    font-size: ' . $styledata[164] . 'px;                            
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 182) . ';  
                }  
            }
            
';
    OxiAddonsInlineCSSData($css);
}
