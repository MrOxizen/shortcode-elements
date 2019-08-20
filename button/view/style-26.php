<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_26_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
    $text = $icon = '';
    if($stylefiles[3] != ''){
        $text = '';
    }
    if($stylefiles[9] != ''){
        $icon = '';
    }
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-row">
                <div class="oxi-addons-align-' . $oxiid . '">';
            echo    '<a ' . $target . ' ' . $href . '  ' . OxiAddonsAnimation($styledata, 43) . ' class=" oxi-button-' . $oxiid . '" id="' . $stylefiles[5] . '">
                        <div class="oxi-btn-txt" data-text="Open Project" >' . OxiAddonsTextConvert($stylefiles[3]) . '</div>
                    </a>';
    echo        '</div>
            </div>
        </div>';

    $textalign = explode(':', $styledata[59]);
    $css .= '.oxi-addons-align-' . $oxiid . '{
                    float: left;
                    width: 100%;
                    text-align: '.$textalign[0].';
                    display: block;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 27).';
            }
            .oxi-button-' . $oxiid . '{
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    background: '.$styledata[53].';
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 11).';
                    width: '.$styledata[7].'px;
                    border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 61).';
                    border-style: '.$styledata[77].';
                    border-color: '.$styledata[78].';
                    border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 81).';
                    position: relative;
                    transition: all 0.35s;
                    overflow: hidden;
            }
            .oxi-button-' . $oxiid . ':hover{
                   
                    border-style: '.$styledata[117].';
                    border-color: '.$styledata[118].';
                    border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 121).';
                    transition: all 0.35s;
            }';
        if($styledata[5] == 1){
        $css .='.oxi-button-' . $oxiid . '::before{
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 150%;
                height: 100%;
                background: '.$styledata[115].';
                /* z-index: -1; */
                opacity: 1;
                transform-origin: 0% 100%;
                transition: transform 0.3s, opacity 0.3s, background-color 0.3s;
                transform: rotate(-90deg);
                    
            }
            .oxi-button-' . $oxiid . ':hover::before{
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 150%;
                height: 100%;
                opacity: 1;
                transform-origin: 0% 100%;
                transition: transform 0.3s, opacity 0.3s, background-color 0.3s;
                transform: rotate(0deg);
                    
            }';
        }    
        else {   
        $css .= '.oxi-button-' . $oxiid . '::before{
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 150%;
                    height: 100%;
                    background: '.$styledata[115].';
                    opacity: 1;
                    transform-origin: 100% 00%;
                    transition: transform 0.3s, opacity 0.3s, background-color 0.3s;
                    transform: rotate(90deg);

                }
                .oxi-button-' . $oxiid . ':hover::before{
                        content: "";
                        position: absolute;
                        bottom: 0;
                        right: 0;
                        width: 150%;
                        height: 100%;
                        opacity: 1;
                        transform-origin: 100% 0%;
                        transition: transform 0.3s, opacity 0.3s, background-color 0.3s;
                        transform: rotate(0deg);

            }';
        }
        $css .='.oxi-addons-align-' . $oxiid . ' .oxi-btn-txt{
                font-size: '.$styledata[47].'px;
                color: '.$styledata[51].';
                    '. OxiAddonsFontSettings($styledata, 55).';
                
            }
            .oxi-button-' . $oxiid . ':hover .oxi-btn-txt {
                z-index: 99;
                color: '.$styledata[113].';
                
            }
            


            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-align-' . $oxiid . '{
                        float: left;
                        width: 100%;
                        text-align: '.$textalign[0].';
                        display: block;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 28).';
                }
                .oxi-button-' . $oxiid . '{
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 12).';
                        width: '.$styledata[8].'px;
                        border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 62).';
                        border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 82).';
                        position: relative;
                        transition: all 0.35s;
                        overflow: hidden;
                }
                .oxi-button-' . $oxiid . ':hover{
                        border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 122).';
                        transition: all 0.35s;
                }
            
                .oxi-addons-align-' . $oxiid . ' .oxi-btn-txt{
                    font-size: '.$styledata[48].'px;
                }
                
                
            }
            @media only screen and (max-width : 668px){
                .oxi-addons-align-' . $oxiid . '{
                        float: left;
                        width: 100%;
                        text-align: '.$textalign[0].';
                        display: block;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 29).';
                }
                .oxi-button-' . $oxiid . '{
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 13).';
                        width: '.$styledata[9].'px;
                        border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 63).';
                        border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 83).';
                        position: relative;
                        transition: all 0.35s;
                        overflow: hidden;
                }
                .oxi-button-' . $oxiid . ':hover{
                        border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 123).';
                        transition: all 0.35s;
                }
            
                .oxi-addons-align-' . $oxiid . ' .oxi-btn-txt{
                    font-size: '.$styledata[49].'px;
                }
            }';
  echo OxiAddonsInlineCSSData($css);
}
