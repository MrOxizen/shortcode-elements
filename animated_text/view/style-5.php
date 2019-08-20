<?php

if (!defined('ABSPATH'))
    exit;

function oxi_animated_text_style_5_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';

    echo '<div class="oxi-addons-container">  
                <div class="oxi-addons-row">
                    <div class="oxi-addons-animet-text-'.$oxiid.'">
                        <div class="oxi-animet-text-body-'.$oxiid.'">
                            <div class="oxi-animet-text-text-'.$oxiid.'">
                              <div class="oxi-animet-text-'.$oxiid.'-h1">';
                                $str1 = $stylefiles[3];
                                for($i = 0; $i <= strlen($str1) - 1; $i++){
                                    echo '<span>'.$str1[$i].'</span>';
                                }
                          echo '</div>
                            </div>
                        </div>
                    </div>
                </div>
            
         </div>';

                for($k=0; $k<= strlen($str1); $k++){
                  $css .= '.oxi-animet-text-'.$oxiid.'-h1 span:nth-child('.$k.') {
                              animation-delay: '.$k.'s;
                        }';
                } 
    $css .= '
            .oxi-addons-animet-text-'.$oxiid.'{
                width: 100%;
                height:auto;
                float: left;
                ' . OxiAddonsFontSettings($styledata, 11) . '; 
            } 
             .oxi-addons-animet-text-'.$oxiid.' .oxi-animet-text-'.$oxiid.'-h1 {
                cursor: default;
                top: 0;
                left: 40%;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                margin: auto;
                display: block;
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';
              }
              .oxi-animet-text-'.$oxiid.'-h1 span {
                top: 20px;
                display: inline-block;
                animation: bounce '.$styledata[3].'s ease '.$styledata[33].' alternate;
                font-size: '.$styledata[7].'px;
                color: '.$styledata[5].';
               
               }
              @-webkit-keyframes bounce {
                100% {
                  top: -20px;
                  text-shadow: 0 1px 0 #ccc, 0 2px 0 #ccc, 0 3px 0 #ccc, 0 4px 0 #ccc,
                    0 5px 0 #ccc, 0 6px 0 #ccc, 0 7px 0 #ccc, 0 8px 0 #ccc, 0 9px 0 #ccc,
                    0 50px 25px rgba(0, 0, 0, 0.2);
                }
              } 
              @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-animet-text-'.$oxiid.'-h1 {
                  padding:' . OxiAddonsPaddingMarginSanitize($styledata, 18) . ';
                } 
                .oxi-animet-text-'.$oxiid.'-h1 span {
                  font-size: '.$styledata[8].'px;
                 }
            }
            @media only screen and (max-width : 668px){
                .oxi-animet-text-'.$oxiid.'-h1 {
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 19) . ';
              } 
              .oxi-animet-text-'.$oxiid.'-h1 span {
                font-size: '.$styledata[9].'px;
              }
            }
            ';

    echo OxiAddonsInlineCSSData($css);
    
}
