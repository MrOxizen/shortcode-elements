<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_9_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $css = '';
    $styledata = explode('|', $stylefiles[0]);
    $href = '';
    $target = '';
    if ($stylefiles[7] != '') {
        $href = 'href="' . OxiAddonsUrlConvert($stylefiles[7]) . '"';
        if ($styledata[3] != '') {
            $target = 'target="' . $styledata[3] . '"';
        }
    }
    $icon = '';
    $text1 = '';
    $text2 = '';
    if($stylefiles[9] != ''){
        $icon = '<span class="oxi-button-icon"> ' . oxi_addons_font_awesome($stylefiles[9]) . ' </span>';
    }
    if($stylefiles[3] != ''){
        $text1 = '<div class="oxi-button-text1">' . OxiAddonsTextConvert($stylefiles[3]) . '</div>';
    }
    if($stylefiles[11] != ''){
        $text2 = '<div class="oxi-button-text2">' . OxiAddonsTextConvert($stylefiles[11]) . '</div>';
    }
    
    $position = '';
    if($styledata[203] == 1){
        $position = '  <div class="oxi-btn-icon">
                            '.$icon .'
                       </div>
                       <div class="oxi-btn-text">
                           <div class="oxi-btn-text-1">
                              '. $text1 .'
                           </div>
                           <div class="oxi-btn-text-2">
                              '. $text2 .'
                           </div>
                       </div>';
    }
     else {
        $position = '  
                       <div class="oxi-btn-text">
                           <div class="oxi-btn-text-1">
                              '. $text1 .'
                           </div>
                           <div class="oxi-btn-text-2">
                              '. $text2 .'
                           </div>
                       </div>
                       <div class="oxi-btn-icon">
                            '.$icon .'
                       </div>';
    }
    
    
    echo '<div class="oxi-addons-container">
                <div class="oxi-addons-row">
                    <div class="oxi-addons-button-body-' . $oxiid . '">
                      <div class="oxi-addons-align" ' . OxiAddonsAnimation($styledata, 63) . '>';
                    echo    '<a ' . $target . ' ' . $href . '  class="oxi-button-'. $oxiid .' " id="' . $stylefiles[5] . '">
                                '.$position.'
                            </a>'; 
                echo '</div>
                    </div>
                </div>
          </div>';
                
                
     if($styledata[153]== 1){
         $css .= '.oxi-addons-button-body-' . $oxiid . '{  
                display: flex;
                justify-content: flex-start;
                align-items: center
                }
            ';
     }

     
     elseif ($styledata[153] == 2) {
        $css .= '.oxi-addons-button-body-' . $oxiid . '{  
                   display: flex;
                   justify-content: flex-end;
                   align-items: center
                   }
               ';
    } else {
        $css .= '.oxi-addons-button-body-' . $oxiid . '{  
                display: flex;
                justify-content: center;
                align-items: center
                }
            ';
    }

    
    $css .= ' .oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align{
                    background: '.$styledata[5].';
                    border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 9).';
                    border-color: '.$styledata[26].';
                    border-style: '.$styledata[25].';
                    border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 137).';
                    outline: none;
                    margin: '. OxiAddonsPaddingMarginSanitize($styledata, 47).';
                    display: flex;
                    justify-content: center;    
                    ' . OxiAddonsBoxShadowSanitize($styledata, 191) . '; 
            }
            .oxi-addons-button-body-' . $oxiid . ' .oxi-button-'. $oxiid .' {
                    display: inline-block;
                    border: none;
                    position: relative;
                    cursor: pointer;
                    z-index: 1;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 121).';
                    max-width: 100%;
                    width: '.$styledata[235].'px;
              }
              
            .oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align a{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
            .oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover {
                background: '.$styledata[7].';
                border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 155).';
                border-color: '.$styledata[172].';
                border-style: '.$styledata[171].';
                border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 175).';
                transition: .5s !important;
                ' . OxiAddonsBoxShadowSanitize($styledata, 197) . '; 
            }

            .oxi-addons-button-body-' . $oxiid . ' .oxi-btn-icon{
                float: left;
             }
             
            .oxi-addons-button-body-' . $oxiid . ' .oxi-button-icon{
                    color: '.$styledata[97].';
                    font-size: '.$styledata[101].'px;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 105).';
                    transition: none !important;
            }
            .oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover .oxi-button-icon{
                    color: '.$styledata[99].';
                    transition: .5s;
            }
            
            .oxi-addons-button-body-' . $oxiid . ' .oxi-btn-text{
                    float: right;
                    width: 100%;
                    display: block;
            }
            
            .oxi-addons-button-body-' . $oxiid . ' .oxi-button-text1{
                color: '.$styledata[67].';
                font-size: '.$styledata[71].'px;
                    '. OxiAddonsFontSettings($styledata, 75).'
                padding: '. OxiAddonsPaddingMarginSanitize($styledata, 81).';
                transition: none !important;
            }
            .oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover .oxi-button-text1{
                    color: '.$styledata[69].';
                    transition: .5s !important;
            }
            
            .oxi-addons-button-body-' . $oxiid . ' .oxi-button-text2{
                color: '.$styledata[205].';
                font-size: '.$styledata[209].'px;
                    '. OxiAddonsFontSettings($styledata, 213).'
                padding: '. OxiAddonsPaddingMarginSanitize($styledata, 219).';
                transition: none !important;
            }
            .oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover .oxi-button-text2{
                    color: '.$styledata[207].';
                    transition: .5s !important;
            }

            @media only screen and (min-width : 669px) and (max-width : 993px){
                 .oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align{
                    border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 10).';
                    border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 138).';
                    outline: none;
                    margin: '. OxiAddonsPaddingMarginSanitize($styledata, 48).';
                    display: flex;
                    justify-content: center;    
                }
                .oxi-addons-button-body-' . $oxiid . ' .oxi-button-'. $oxiid .' {
                        display: inline-block;
                        border: none;
                        position: relative;
                        cursor: pointer;
                        z-index: 1;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 122).';
                        max-width: 100%;
                        width: '.$styledata[236].'px;
                  }

               
                .oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover {
                    border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 156).';
                    border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 176).';
                    transition: .5s !important;
                }

                .oxi-addons-button-body-' . $oxiid . ' .oxi-button-icon{
                        font-size: '.$styledata[102].'px;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 106).';
                        transition: none !important;
                }
                .oxi-addons-button-body-' . $oxiid . ' .oxi-button-text1{
                    font-size: '.$styledata[72].'px;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 82).';
                    transition: none !important;
                }
                .oxi-addons-button-body-' . $oxiid . ' .oxi-button-text2{
                    font-size: '.$styledata[210].'px;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 220).';
                    transition: none !important;
                }
            }
            @media only screen and (max-width : 668px){
               .oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align{
                    border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 11).';
                    border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 139).';
                    outline: none;
                    margin: '. OxiAddonsPaddingMarginSanitize($styledata, 49).';
                    display: flex;
                    justify-content: center;    
                }
                .oxi-addons-button-body-' . $oxiid . ' .oxi-button-'. $oxiid .' {
                        display: inline-block;
                        border: none;
                        position: relative;
                        cursor: pointer;
                        z-index: 1;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 123).';
                        max-width: 100%;
                        width: '.$styledata[239].'px;
                  }
                .oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover {
                    border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 157).';
                    border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 177).';
                    transition: .5s !important;
                }
                .oxi-addons-button-body-' . $oxiid . ' .oxi-button-icon{
                        font-size: '.$styledata[103].'px;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 107).';
                        transition: none !important;
                }
                .oxi-addons-button-body-' . $oxiid . ' .oxi-button-text1{
                    font-size: '.$styledata[73].'px;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 83).';
                    transition: none !important;
                }
                .oxi-addons-button-body-' . $oxiid . ' .oxi-button-text2{
                    font-size: '.$styledata[211].'px;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 221).';
                    transition: none !important;
                }
            }';
	echo OxiAddonsInlineCSSData($css);
}
