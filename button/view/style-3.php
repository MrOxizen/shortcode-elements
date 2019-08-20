<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_3_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $css = '';
    $styledata = explode('|', $stylefiles[0]);
    $href = '';
    $target = '';
    if ($stylefiles[7] != '') {
        $href = 'href="' . OxiAddonsUrlConvert($stylefiles[7]) . '"';
        if ($styledata[1] != '') {
            $target = 'target="' . $styledata[1] . '"';
        }
    }
    echo '<div class="oxi-addons-container">
                <div class="oxi-addons-row">
                    <div class="oxi-addons-align-' . $oxiid . '">';
                echo  '<a ' . $target . ' ' . $href . ' ' . OxiAddonsAnimation($styledata, 59) . ' class="oxi-button oxi-button-' . $oxiid . ' ' . $styledata[125] . '" id="' . $stylefiles[5] . '">' . oxi_addons_font_awesome($stylefiles[9]) . ' <span class="oxi-text">' . OxiAddonsTextConvert($stylefiles[3]) . '</span></a>';
            echo '</div>
        </div>
    </div>';
     $textalign = explode(':', $styledata[11]);
    $css .= '.oxi-addons-container .oxi-button-' . $oxiid . '{  
                overflow: hidden;
                -webkit-backface-visibility: hidden;
                -moz-backface-visibility: hidden;
                backface-visibility: hidden;
                max-width: ' . $styledata[29] . 'px;
                width: 100%;
                position:relative;
                font-size: ' . $styledata[3] . 'px;
                ' . OxiAddonsFontSettings($styledata, 7) . '
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 67) . ';
                color:' . $styledata[33] . ';
                background:' . $styledata[35] . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
                border-style:' . $styledata[38] . '; 
                border-color: ' . $styledata[39] . ';
                border-radius:' . $styledata[41] . 'px; 
                text-align:center;
            }
            .oxi-addons-align-' . $oxiid . '{
                text-align:center;
                text-align: ' . $textalign[0] . '
            }
            .oxi-addons-container .oxi-button-' . $oxiid . ':hover,
            .oxi-addons-container .oxi-button-' . $oxiid . ':focus,
            .oxi-addons-container  .oxi-button-' . $oxiid . ':active{
               background:' . $styledata[45] . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
               border-style:' . $styledata[48] . '; 
               border-color:' . $styledata[49] . ';
               border-radius:' . $styledata[51] . 'px;
                   
            }
            .oxi-addons-container .oxi-button-' . $oxiid . ' .oxi-icons{
               font-size: ' . $styledata[121] . 'px;
               color:' . $styledata[119] . ';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                align-content: center;
                height: 100%;
            }
            .oxi-addons-container .oxi-button-' . $oxiid . ' .oxi-text{
               display: inline-block;
            }
            
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-container .oxi-button-' . $oxiid . '{   
                    max-width: ' . $styledata[30] . 'px;
                    font-size: ' . $styledata[4] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 84) . ';
                }
                
                .oxi-addons-container .oxi-button-' . $oxiid . ' .oxi-icons{
                    font-size: ' . $styledata[122] . 'px;
                 }
            }
            @media only screen and (max-width : 668px){
                .oxi-addons-container .oxi-button-' . $oxiid . '{   
                    max-width: ' . $styledata[31] . 'px;
                    font-size: ' . $styledata[5] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 85) . ';
                }
                
                .oxi-addons-container .oxi-button-' . $oxiid . ' .oxi-icons{
                    font-size: ' . $styledata[123] . 'px;
                 }
                 .oxi-addons-align-' . $oxiid . '{
                    text-align:center;
                }
            }';
  echo OxiAddonsInlineCSSData($css);
}
