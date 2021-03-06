<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_28_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
                        <div class=" oxi-button-txt "  >
                            <span class=" oxi-button-line-1" > </span>
                                ' . OxiAddonsTextConvert($stylefiles[3]) . ' 
                            <span class=" oxi-button-line-2" > 
                            </span><span class=" oxi-button-line-3" > </span>
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
            
            .oxi-addons-align-' . $oxiid . ' .oxi-button-txt{
                color:'.$styledata[51].';
                font-size: '.$styledata[47].'px;
                    '. OxiAddonsFontSettings($styledata, 55).';
                z-index: 999;
            }
            .oxi-button-' . $oxiid . ':hover .oxi-button-txt{
                color:'.$styledata[113].';
            }
            .oxi-button-' . $oxiid . '::before,
            .oxi-button-' . $oxiid . '::after,
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-1::before,
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-1::after{
                content: "";
                position: absolute;
                width: 2px;
                height: 2px;
                background: '.$styledata[105].';
                transition: 1s;
            }
            .oxi-button-' . $oxiid . '::before{
                content: "";
                position: absolute;
                z-index: 1;
            }
            .oxi-button-' . $oxiid . '::after{
                 content: "";
                position: absolute;
                z-index: 11;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-1::before,
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-1::after{
                content: "";
                position: absolute;
                z-index: -1;
            }
            .oxi-button-' . $oxiid . '::before{
                 top: 0px;
                 left: -2px;
            }
            .oxi-button-' . $oxiid . '::after{
                top:0px;
                right: -2px;
                z-index: 1;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-1::before{
                bottom: 0px;
                left: -2px;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-1::after{
                bottom: 0px;
                right: -2px;
            }
            

            .oxi-button-' . $oxiid . ':hover::before,
            .oxi-button-' . $oxiid . ':hover::after,
            .oxi-button-' . $oxiid . ':hover .oxi-button-line-1::before,
            .oxi-button-' . $oxiid . ':hover .oxi-button-line-1::after{
                width: 50%;
                height: var(--width);
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-2::before,
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-2::after,
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-3::before,
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-3::after{
                content: "";
                position: absolute;
                width: 2px;
                height: 2px;
                background: '.$styledata[105].';
                transition: 1s;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-2::before{
                top:-2px;
                left:0px;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-2::after{
                top:-2px;
                right:0px;
            }
            
            .oxi-button-' . $oxiid . ':hover .oxi-button-line-2::before,
            .oxi-button-' . $oxiid . ':hover .oxi-button-line-2::after{
                width: var(--width);
                height: 50%;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-3::before{
                bottom: -2px;
                left: 0px;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-button-line-3::after{
                bottom: -2px;
                right:0px;
            }
            
            .oxi-button-' . $oxiid . ':hover .oxi-button-line-3::before,
            .oxi-button-' . $oxiid . ':hover .oxi-button-line-3::after{
                width: var(--width);
                height: 50%;
            }
            
            @media only screen and (min-width : 669px) and (max-width : 993px){
                
                .oxi-addons-align-' . $oxiid . '{
                    --width:'.$styledata[110].'px;
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
                    width: '.$styledata[8].'px;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 12).';
                    position: relative;
                    overflow: hidden;
                }
                

                .oxi-addons-align-' . $oxiid . ' .oxi-button-txt{
                    font-size: '.$styledata[48].'px;
                    z-index: 999;
                }
                
            }
            @media only screen and (max-width : 668px){
                .oxi-addons-align-' . $oxiid . '{
                    --width:'.$styledata[111].'px;
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
                    width: '.$styledata[9].'px;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 13).';
                    position: relative;
                    overflow: hidden;
                }
                .oxi-addons-align-' . $oxiid . ' .oxi-button-txt{
                    font-size: '.$styledata[49].'px;
                    z-index: 999;
                }
                


            }';
  echo OxiAddonsInlineCSSData($css);
}
