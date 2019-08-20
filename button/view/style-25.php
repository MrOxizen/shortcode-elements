<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_25_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
            
            .oxi-button-' . $oxiid . ':hover  {
                    background: '.$styledata[115].';
                    border-style: '.$styledata[117].';
                    border-color: '.$styledata[118].';
                    border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 121).';
                    transition: all 0.2s;
            }
            .oxi-button-' . $oxiid . '::after{
                    content: "' . OxiAddonsTextConvert($stylefiles[9]) . '";
                    position: absolute;
                    color: '.$styledata[113].';
                    font-size:'.$styledata[47].'px;
                    '. OxiAddonsFontSettings($styledata, 55).';
                        text-align: center;
                    width: 100%;
                    top: 0; 
                    left: 0;
                    //bottom: 0;
                    right: 0;
                    opacity: 0;
                    transform: translate3d(0, 150%, 0);
                    transition: all 0.2s;
            }
            
            .oxi-button-' . $oxiid . ':hover .oxi-btn-txt {
                    opacity: 0;
                    top: 0;
                    left: 0;
                    right: 0;
                    -webkit-transform: translate3d(0, 0%, 0);
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    transition: all 0.09s;
            }
            .oxi-button-' . $oxiid . ':hover::after {
                    opacity: 1;
                    top: 50%;
                    left: 0;
                    right: 0;
                    -webkit-transform: translate3d(0, -50%, 0);
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    transition: all 0.2s;
            }
           .oxi-addons-align-' . $oxiid . ' .oxi-btn-txt{
                color: '.$styledata[51].';
                font-size:'.$styledata[47].'px;
                    '. OxiAddonsFontSettings($styledata, 55).';
                text-align: center;
                transition: all 0.3s;
                
            }


            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-align-' . $oxiid . '{
                        float: left;
                        width: 100%;
                        text-align: center;
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
                        transition: all 0.1s;
                        overflow: hidden;
                }

                .oxi-button-' . $oxiid . ':hover  {
                        border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 122).';
                        transition: all 0.2s;
                }
                .oxi-button-' . $oxiid . '::after{
                        content: "' . OxiAddonsTextConvert($stylefiles[9]) . '";
                        position: absolute;
                        font-size:'.$styledata[48].'px;
                        width: 100%;
                        top: 0; 
                        left: 0;
                        //bottom: 0;
                        right: 0;
                        opacity: 0;
                        transform: translate3d(0, 150%, 0);
                        transition: all 0.09s;
                }

                .oxi-button-' . $oxiid . ':hover .oxi-btn-txt {
                        opacity: 0;
                        top: 0;
                        left: 0;
                        right: 0;
                        -webkit-transform: translate3d(0, 0%, 0);
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        transition: all 0.09s;
                }
                .oxi-button-' . $oxiid . ':hover::after {
                        opacity: 1;
                        top: 50%;
                        left: 0;
                        right: 0;
                        -webkit-transform: translate3d(0, -50%, 0);
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        transition: all 0.2s;
                }
               .oxi-addons-align-' . $oxiid . ' .oxi-btn-txt{
                    font-size:'.$styledata[48].'px;
                    transition: all 0.3s;
                        text-align: center;
                }
                
            }
            @media only screen and (max-width : 668px){
                .oxi-addons-align-' . $oxiid . '{
                        float: left;
                        width: 100%;
                        text-align: center;
                        display: block;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 29).';
                }
                .oxi-button-' . $oxiid . '{
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        padding: '. OxiAddonsPaddingMarginSanitize($styledata, 13).';
                        width: '.$styledata[8].'px;
                        border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 63).';
                        border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 83).';
                        position: relative;
                        transition: all 0.1s;
                        overflow: hidden;
                }

                .oxi-button-' . $oxiid . ':hover  {
                        border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 123).';
                        transition: all 0.2s;
                }
                .oxi-button-' . $oxiid . '::after{
                        content: "' . OxiAddonsTextConvert($stylefiles[9]) . '";
                        position: absolute;
                        font-size:'.$styledata[49].'px;
                        width: 100%;
                        top: 0; 
                        left: 0;
                        //bottom: 0;
                        right: 0;
                        opacity: 0;
                        transform: translate3d(0, 150%, 0);
                        transition: all 0.09s;
                }

                .oxi-button-' . $oxiid . ':hover .oxi-btn-txt {
                        opacity: 0;
                        top: 0;
                        left: 0;
                        right: 0;
                        -webkit-transform: translate3d(0, 0%, 0);
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        transition: all 0.09s;
                }
                .oxi-button-' . $oxiid . ':hover::after {
                        opacity: 1;
                        top: 50%;
                        left: 0;
                        right: 0;
                        -webkit-transform: translate3d(0, -50%, 0);
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        transition: all 0.2s;
                }
               .oxi-addons-align-' . $oxiid . ' .oxi-btn-txt{
                    font-size:'.$styledata[49].'px;
                    transition: all 0.3s;
                        text-align: center;
                }
            }';
  echo OxiAddonsInlineCSSData($css);
}
