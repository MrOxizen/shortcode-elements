<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_27_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
            echo    '<a ' . $target . ' ' . $href . '  ' . OxiAddonsAnimation($styledata, 43) . ' class=" oxi-button-' . $oxiid . ' oxi-btn-invarted" id="' . $stylefiles[5] . '">
                        <div class=" oxi-button-txt "  >' . OxiAddonsTextConvert($stylefiles[3]) . ' 
                            <span class="oxi-button-line oxi-button-line-1" > </span>
                            <span class="oxi-button-line oxi-button-line-2" > </span>
                            <span class="oxi-button-line oxi-button-line-3" > </span>
                            <span class="oxi-button-line oxi-button-line-4" > </span>
                            </div>
                    </a>';
    echo        '</div>
            </div>
        </div>';

    $textalign = explode(':', $styledata[59]);
    $css .= '.oxi-addons-align-' . $oxiid . '{
                --width:'.$styledata[109].'px;
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
                width: '.$styledata[7].'px;
                padding: '. OxiAddonsPaddingMarginSanitize($styledata, 11).';
                position: relative;
                overflow: hidden;
            }
            .oxi-button-' . $oxiid . ':hover{
                background: '.$styledata[115].';
            }
            .oxi-button-' . $oxiid . ':hover .oxi-button-txt{
                color:'.$styledata[113].';
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-txt{
                color:'.$styledata[51].';
                font-size: '.$styledata[47].'px;
                    '. OxiAddonsFontSettings($styledata, 55).';
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line{
                position: absolute;
                display: block;
                background: '.$styledata[105].';
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-1{
                top: 0;
                left: 0;
                width: var(--width);
                height: 100%;
                transform: translateY(0);
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . ':hover .oxi-button-line-1{
                transition: 0.5s;
                transform: translateY(-100%);
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-2{
                top: 0;
                left: -100%;
                width: 100%;
                height: var(--width);
                transform: translateX(0);
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . ':hover .oxi-button-line-2{
                transition: 0.75s;
                transform: translateX(100%);
                transition-delay: 0.25s;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-3{
                bottom: 0;
                right: -100%;
                width: 100%;
                height: var(--width);
                transform: translateX(0);
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . ':hover .oxi-button-line-3{
                transition: 0.75s;
                transform: translateX(-100%);
                transition-delay: .25s;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-4{
                top: 0;
                right: 0;
                width: var(--width);
                height: 100%;
                transform: translateY(0);
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . ':hover .oxi-button-line-4{
                transition: 0.5s;
                transform: translateY(100%);
            }
            
            
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-align-' . $oxiid . '{
                    --width:'.$styledata[110].'px;
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
                    width: '.$styledata[8].'px;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 12).';
                    position: relative;
                    overflow: hidden;
                }
                .oxi-addons-align-' . $oxiid . ' .oxi-button-txt{
                    font-size: '.$styledata[48].'px;
                }
            }
            @media only screen and (max-width : 668px){
                .oxi-addons-align-' . $oxiid . '{
                    --width:'.$styledata[111].'px;
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
                    width: '.$styledata[9].'px;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 13).';
                    position: relative;
                    overflow: hidden;

                }
                .oxi-addons-align-' . $oxiid . ' .oxi-button-txt{
                    font-size: '.$styledata[49].'px;
                }

            }';
  echo OxiAddonsInlineCSSData($css);
}
