<?php

if (!defined('ABSPATH'))
    exit;

function oxi_animated_text_style_4_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);


    echo '<div class="oxi-addons-container">  
                <div class="oxi-addons-row">
                    <div class="oxi-addons-animet-text-' . $oxiid . '">
                        <div class="oxi-animet-text-body">
                            <div class="oxi-text-text oxi-text-middle">'; 
                            $str =  $stylefiles[3];
                            $p = (explode(" ",$str)); 
                            foreach ($p as  $value) {
                                for ($i = 0; $i <= strlen($value) - 1; $i++) {
                                    if ($i == 0) {
                                        echo '<span>&nbsp' . $value[$i] . '</span>';
                                    } else {
                                        echo '<span class="oxi-text-hidden">' . $value[$i] . '</span>';
                                    }
                                    echo "<br>";
                                }
                            }
               echo '       </div>
                        </div>
                    </div>
                </div>
            
        </div>';
               
    $css = '
            .oxi-addons-animet-text-' . $oxiid . '{
                width: 100%;
                height:auto;
                float: left;
            }
            .oxi-animet-text-body{
                width: 100%;
                height: auto;
                float: left;
            }
            .oxi-text-middle{
                width: 100%;
                display: flex;
                justify-content: center;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';
            }
            .oxi-text-text {
                color: '.$styledata[5].';
                font-size: '.$styledata[7].'px;
                ' . OxiAddonsFontSettings($styledata, 11) . '; 
                cursor: pointer;
            }
            .oxi-text-hidden{
                max-width: 0;
                opacity: 0;
                transition: '.$styledata[3].'s ease-in;
            }
            .oxi-text-text:hover .oxi-text-hidden{
                opacity: 1;
                max-width: 1em;
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                
                .oxi-text-middle{
                    display: flex;
                    justify-content: center;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 18) . ';
                }
                .oxi-text-text {
                    font-size: '.$styledata[8].'px;
                    cursor: pointer;
                }
            }
            @media only screen and (max-width : 668px){
                .oxi-text-middle{
                    display: flex;
                    justify-content: center;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 19) . ';
                }
                .oxi-text-text {
                    font-size: '.$styledata[9].'px;
                    cursor: pointer;
                }
            }
            ';

    echo OxiAddonsInlineCSSData($css);
}
