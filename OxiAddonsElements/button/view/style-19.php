<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_19_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
                        <div class="Oxi-btn-align" ' . OxiAddonsAnimation($styledata, 27) . '>
                            <a ' . $target . ' ' . $href . ' class="Oxi-btn Oxi-btn-style" id="' . $stylefiles[5] . '" > 
                                <div class="oxi-btn-txt">  ' . OxiAddonsTextConvert($stylefiles[3]) . '</div>
                                <div class="oxi-btn-overlay">
                                    <div class="oxi-btn-overlay-txt">' . OxiAddonsTextConvert($stylefiles[9]) . '</div>
                                </div>
                            </a>
                      </div>
                    </div>
                </div>
            </div>
          </div>';

    $textalign = explode(':', $styledata[43]);
    $css .='.Oxi-addons-btn-'.$oxiid.' {   
                float: left;
                width: 100%;
        }
        .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-body{
               text-align: '.$textalign[0].';
                padding: '. OxiAddonsPaddingMarginSanitize($styledata, 11).';
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align{
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                position: relative;
            }
            .Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt{
                background: '.$styledata[37].';
                color:'.$styledata[35].';
                font-size:'.$styledata[31].'px;
                width:'.$styledata[7].'px;
                max-width:100%;
                    '. OxiAddonsFontSettings($styledata, 39).';
                text-align: center;
                padding: '. OxiAddonsPaddingMarginSanitize($styledata, 45).';
                display: flex;
                justify-content: center;
                align-items: center;
            }';
    
    if($styledata[75] == 1){
        $css .='.Oxi-addons-btn-'.$oxiid.' .oxi-btn-overlay{
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    background:'.$styledata[67].' ;
                    overflow: hidden;
                    width: 100%;
                    height: 0;
                    transition: .5s ease;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover .oxi-btn-overlay{
                    height: 100%;
                }';
    }
    elseif($styledata[75] == 2){
        $css .='.Oxi-addons-btn-'.$oxiid.' .oxi-btn-overlay{
                    position: absolute;
                    bottom: 100%;
                    left: 0;
                    right: 0;
                    background:'.$styledata[67].' ;
                    overflow: hidden;
                    width: 100%;
                    height: 0;
                    transition: .5s ease;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover .oxi-btn-overlay{
                    bottom: 0;
                    height: 100%;
                }';
    }
    elseif($styledata[75] == 3){
        $css .='.Oxi-addons-btn-'.$oxiid.' .oxi-btn-overlay{
                    position: absolute;
                    left: 0;
                    right: 0;
                    bottom:0;
                    background:'.$styledata[67].' ;
                    overflow: hidden;
                    width: 0;
                    height: 100%;
                    transition: .5s ease;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover .oxi-btn-overlay{
                    width: 100%;
                }';
    }
    elseif($styledata[75] == 4){
        $css .='.Oxi-addons-btn-'.$oxiid.' .oxi-btn-overlay{
                    position: absolute;
                    left: 100%;
                    right: 0;
                    bottom:0;
                    background:'.$styledata[67].' ;
                    overflow: hidden;
                    width: 0;
                    height: 100%;
                    transition: .5s ease;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover .oxi-btn-overlay{
                    width: 100%;
                    left:0;
                }';
    }
    elseif($styledata[75] == 5){
        $css .='.Oxi-addons-btn-'.$oxiid.' .oxi-btn-overlay{
                    position: absolute;
                    left: 0;
                    right: 0;
                    background:'.$styledata[67].' ;
                    overflow: hidden;
                    width: 100%;
                    height: 0;
                    transition: .5s ease;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover .oxi-btn-overlay{
                    height: 100%;
                }';
    }
    else{
        $css .='.Oxi-addons-btn-'.$oxiid.' .oxi-btn-overlay{
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    background:'.$styledata[67].' ;
                    overflow: hidden;
                    width: 0;
                    height: 100%;
                    transition: .5s ease;
                }
                .Oxi-addons-btn-'.$oxiid.' .Oxi-btn:hover .oxi-btn-overlay{
                    width: 100%;
                    overflow: hidden;
                }';
    }
    $css .=' .Oxi-addons-btn-'.$oxiid.' .oxi-btn-overlay-txt{
                color: '.$styledata[65].';
                font-size: '.$styledata[61].'px;
                    '. OxiAddonsFontSettings($styledata, 69).';
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
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
                        display: flex;
                        justify-content: center;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 12).';
                    }
                    
                .Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt{
                    font-size:'.$styledata[32].'px;
                    width:'.$styledata[8].'px;
                    max-width:100%;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 46).';
                }
                .Oxi-addons-btn-'.$oxiid.' .oxi-btn-overlay-txt{
                    font-size: '.$styledata[62].'px;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    -webkit-transform: translate(-50%, -50%);
                    -ms-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
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
                        display: flex;
                        justify-content: center;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 13).';
                    }
                    
                .Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt{
                    font-size:'.$styledata[33].'px;
                    width:'.$styledata[9].'px;
                    max-width:100%;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 47).';
                }
                .Oxi-addons-btn-'.$oxiid.' .oxi-btn-overlay-txt{
                    font-size: '.$styledata[63].'px;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    -webkit-transform: translate(-50%, -50%);
                    -ms-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
                }
            }';

    echo OxiAddonsInlineCSSData($css);
}
