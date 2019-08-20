<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_2_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
    if ($styledata[115] == 'left') {
        $filesdata = oxi_addons_font_awesome($stylefiles[9]) . ' ' . OxiAddonsTextConvert($stylefiles[3]);
        $icondistance = 'margin-right: ' . $styledata[117] . 'px;';
    } else {
        $filesdata = OxiAddonsTextConvert($stylefiles[3]) . ' ' . oxi_addons_font_awesome($stylefiles[9]);
        $icondistance = 'margin-left: ' . $styledata[117] . 'px;';
    }

    echo '<div class="oxi-addons-container">
             <div class="oxi-addons-row">
                <div class="oxi-addons-align-' . $oxiid . '">';
                 echo  '<a ' . $target . ' ' . $href . ' ' . OxiAddonsAnimation($styledata, 59) . ' class="oxi-button oxi-button-' . $oxiid . ' ' . $styledata[125] . '" id="' . $stylefiles[5] . '">' . $filesdata . '</a>';
         echo '</div>
         </div>
    </div>';
          $textalign = explode(':', $styledata[11]);
    $css .= '.oxi-addons-container .oxi-button-' . $oxiid . '{   
                max-width: ' . $styledata[29] . 'px;
                width: 100%;
                display: inline-flex;
                justify-content: center;
                align-items: center;
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
               color:' . $styledata[43] . ';
               background:' . $styledata[45] . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
               border-style:' . $styledata[48] . '; 
               border-color:' . $styledata[49] . ';
               border-radius:' . $styledata[51] . 'px;
            }
            .oxi-addons-container .oxi-button-' . $oxiid . ' .oxi-icons{
               font-size: ' . $styledata[121] . 'px;
               color:' . $styledata[119] . ';
            }
            .oxi-addons-container .oxi-button-' . $oxiid . ':hover .oxi-icons{
               ' . $icondistance . '
            }
            
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-container .oxi-button-' . $oxiid . '{   
                    max-width: ' . $styledata[30] . 'px;
                    font-size: ' . $styledata[4] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 84) . ';
                }
                .oxi-addons-container .oxi-button-' . $oxiid . ':hover,
                .oxi-addons-container .oxi-button-' . $oxiid . ':focus,
                .oxi-addons-container  .oxi-button-' . $oxiid . ':active{
                   border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 100) . ';
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
                .oxi-addons-container .oxi-button-' . $oxiid . ':hover,
                .oxi-addons-container .oxi-button-' . $oxiid . ':focus,
                .oxi-addons-container  .oxi-button-' . $oxiid . ':active{
                   border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
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
