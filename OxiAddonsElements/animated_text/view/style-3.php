<?php

if (!defined('ABSPATH'))
    exit;

function oxi_animated_text_style_3_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $text1 = $text2 = '';
    if($stylefiles[3] != ''){
        $text1 = ' <span class="oxi-addons-text1">' . OxiAddonsTextConvert($stylefiles[3]) . '</span>';
    }
    if($stylefiles[5] != ''){
        $text2 = ' <span class="oxi-addons-text2">' . OxiAddonsTextConvert($stylefiles[5]) . '</span>';
    }
    echo '<div class="oxi-addons-container">
                    <div class="oxi-addons-row">
                        <div class="oxi-addons-animet-text-'.$oxiid.'">
                            <div class="oxi-addons-text">
                                <div class="oxi-addons-text-body">
                                    '.$text1.'
                                    '.$text2.'
                                 </div>
                            </div>
                        </div>
                    </div>                
            </div>';
        $css = '
            .oxi-addons-animet-text-'.$oxiid.'{
                width: 100%;
                height:auto;
                float: left;
            }
            .oxi-addons-animet-text-'.$oxiid.' .oxi-addons-text{
                position: relative;
            }
            .oxi-addons-animet-text-'.$oxiid.' .oxi-addons-text-body{
                text-align: center;
                width: 100%;
            }
           .oxi-addons-animet-text-'.$oxiid.'  .oxi-addons-text-body span{
                text-transform: uppercase;
                display: block;
            }
            .oxi-addons-animet-text-'.$oxiid.' .oxi-addons-text1{
                color: '. $styledata[5].';
                font-size:  '. $styledata[7].'px;
                ' . OxiAddonsFontSettings($styledata, 11) . ';
                letter-spacing: 8px;
                position: relative;
                animation: text '. $styledata[3].'s 1;
            }
            .oxi-addons-animet-text-'.$oxiid.' .oxi-addons-text2{
                color: '. $styledata[17].';
                font-size:  '. $styledata[19].'px;
                animation: text2 '. $styledata[3].'s 1;
                    ' . OxiAddonsFontSettings($styledata, 23) . ';
            }
            
            @keyframes text2 {
                0%{        
                   
                    color: rgba(255,89,89,0.00);
                    opacity: 0;
                }
                30%{
              
                    color: #fff;
                    opacity: 0;

                }
                86%{
                 color: #fff;
                    opacity: 0;
                }
            }
            @keyframes text {

                0%{
                    
                    margin-bottom: -40px;
                    
                }
                30%{
                    letter-spacing: 25px;
                    margin-bottom: -40px;
                }
                85%{
                    letter-spacing: 8px;
                    margin-bottom: -40px;
                }
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-animet-text-'.$oxiid.'{
                    width: 100%;
                    height:auto;
                }
                .oxi-addons-animet-text-'.$oxiid.' .oxi-addons-text1{
                    font-size:  '. $styledata[8].'px;
                    text-align: center;
                }
                .oxi-addons-animet-text-'.$oxiid.' .oxi-addons-text2{
                    font-size:  '. $styledata[20].'px;
                    text-align: center;
                }

            }
            @media only screen and (max-width : 668px){
                .oxi-addons-animet-text-'.$oxiid.'{
                    width: 100%;
                    height:auto;
                }
                .oxi-addons-animet-text-'.$oxiid.' .oxi-addons-text1{
                    font-size:  '. $styledata[9].'px;
                    text-align: center;
                }
                .oxi-addons-animet-text-'.$oxiid.' .oxi-addons-text2{
                    font-size:  '. $styledata[21].'px;
                    text-align: center;
                }
            }

            ';

    echo OxiAddonsInlineCSSData($css);
}
