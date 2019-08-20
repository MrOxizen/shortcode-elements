<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_15_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $css = '';
    $styledata = explode('|', $stylefiles[0]);
    $href = '';
    $target = '';
    $jquery = '';
    if ($stylefiles[7] != '') {
        $href = 'href="' . OxiAddonsUrlConvert($stylefiles[7]) . '"';
        if ($styledata[3] != '') {
            $target = 'target="' . $styledata[3] . '"';
        }
    }
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-row">
                <div class="Oxi-addons-btn-'.$oxiid.'" >
                    <div class="Oxi-btn-body">
                        <div class="Oxi-btn-align" ' . OxiAddonsAnimation($styledata, 43) . '>
                            <a ' . $target . ' ' . $href . ' class="Oxi-btn Oxi-btn-style" id="' . $stylefiles[5] . '" > ' . OxiAddonsTextConvert($stylefiles[3]) . ' </a>
                        </div>
                    </div>
                </div>
            </div>
          </div>';
    
    $textalign = explode(':', $styledata[55]);
    $css .='.Oxi-addons-btn-'.$oxiid.' {   
                    float: left;
                    width: 100%;
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-body{
                    --width: '.$styledata[7].'px; 	
                    --height: '.$styledata[71].'px; 	
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 27).';
                    text-align: '.$textalign[0].';
                    
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn{
                    position: relative;
                    border: none;
                    background: '.$styledata[59].';
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 11).';
                    width: var(--width);
                    max-width: 100%;
                    display: inline-flex;
                    justify-content: center;
                    align-items: center
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover{
                    border: none;
                    color: '.$styledata[65].';
                    background: '.$styledata[67].';
            }
            
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn::before{
                content: "";
                width: var(--width);
                height: var(--height);
                position: absolute;
                background: '.$styledata[63].';
                bottom: 0;
                right: 0;
                transition: all 0.8s ease-in-out;
                transition-delay: 0.5s;
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover::before{
                content: "";
                width: 0;
                height: var(--height);
                position: absolute;
                background: '.$styledata[63].';
                bottom: 0;
                right: 0;
                transition: all 0.5s ease-in-out;
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn::after{
                content: "";
                width: 0px;
                height: var(--height);
                position: absolute;
                background: '.$styledata[69].';
                bottom: 0;
                left: 0;
                transition: all 0.5s ease-in-out;
                transition-delay: 0s;
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover::after{
                content: "";
                width: var(--width);
                height: var(--height);
                position: absolute;
                background: '.$styledata[69].';
                bottom: 0;
                left: 0;
                transition: all 0.8s ease-in-out;
                transition-delay: 0.5s;
            }

            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-style{
                color:'.$styledata[57].';
                font-size:'.$styledata[47].'px;
                    '. OxiAddonsFontSettings($styledata, 51).'
            }
            
             

            
            @media only screen and (min-width : 669px) and (max-width : 993px){
              .Oxi-addons-btn-'.$oxiid.' {   
                    float: left;
                    width: 100%;
                }
                .Oxi-addons-btn-'.$oxiid.'{ 	
                    display: flex;
                    justify-content: center;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-body{
                        --width: '.$styledata[8].'px; 	
                        --height: '.$styledata[72].'px; 	
                        display: flex;
                        justify-content: center;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 28).';

                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn{
                        position: relative;
                        border: none;
                        
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 12).';
                        width: var(--width);
                        max-width: 100%;
                        display: inline-flex;
                        justify-content: center;
                        align-items: center
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn::before{
                    content: "";
                    width: var(--width);
                    height: var(--height);
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    transition: all 0.8s ease-in-out;
                    transition-delay: 0.5s;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover::before{
                    content: "";
                    width: 0;
                    height: var(--height);
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    transition: all 0.5s ease-in-out;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn::after{
                    content: "";
                    width: 0px;
                    height: var(--height);
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    transition: all 0.5s ease-in-out;
                    transition-delay: 0s;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover::after{
                    content: "";
                    width: var(--width);
                    height: var(--height);
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    transition: all 0.8s ease-in-out;
                    transition-delay: 0.5s;
                }

                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-style{
                    font-size:'.$styledata[48].'px;
                }

            }
            @media only screen and (max-width : 668px){
                .Oxi-addons-btn-'.$oxiid.' {   
                    float: left;
                    width: 100%;
                }
                .Oxi-addons-btn-'.$oxiid.'{ 	
                    display: flex;
                    justify-content: center;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-body{
                    --width: '.$styledata[9].'px; 	
                    --height: '.$styledata[73].'px; 	
                    display: flex;
                    justify-content: center;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 29).';

                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn{
                    position: relative;
                    border: none;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 13).';
                    width: var(--width);
                    max-width: 100%;
                    display: inline-flex;
                    justify-content: center;
                    align-items: center
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn::before{
                    content: "";
                    width: var(--width);
                    height: var(--height);
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    transition: all 0.8s ease-in-out;
                    transition-delay: 0.5s;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover::before{
                    content: "";
                    width: 0;
                    height: var(--height);
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    transition: all 0.4s ease-in-out;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn::after{
                    content: "";
                    width: 0px;
                    height: var(--height);
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    transition: all 0.4s ease-in-out;
                    transition-delay: 0s;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover::after{
                    content: "";
                    width: var(--width);
                    height: var(--height);
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    transition: all 0.8s ease-in-out;
                    transition-delay: 0.5s;
                }

                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-style{
                    font-size:'.$styledata[49].'px;
                }
            }';

    echo OxiAddonsInlineCSSData($css);
}
