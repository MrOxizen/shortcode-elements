<?php

if (!defined('ABSPATH'))
    exit;

function oxi_animated_text_style_2_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $textdata = explode('||#||', $stylefiles[1]);
    echo '<div class="oxi-addons-container">'
	. '<div class="oxi-addons-row">'
			. '<div class="oxi-addons-AT-' . $oxiid . '">'
			. '<span class="oxi-animated-' . $oxiid . '">' . OxiAddonsTextConvert($stylefiles[3]) . '</span>'
				. '</div>'
			. '</div>'
			. '</div>';
    echo oxi_addons_elements_stylejs('shuffletext-jquery', 'animated_text', 'js');
    $txtdata = '';
    foreach ($textdata as $value) {
        if (!empty($value)) {
            $txtdata .= "'$value',";
        }
    }
    $jquery = 'jQuery(".oxi-animated-' . $oxiid . '").ShuffleText(
                     [ '.$txtdata.'],
                    {loop: true, delay: '. $styledata[15].', shuffleSpeed:'. $styledata[17].',});';
    $css = '.oxi-addons-AT-' . $oxiid . '{
                width: 100%;
                float: left;
                ' . OxiAddonsFontSettings($styledata, 9) . ';
            }
            .oxi-animated-' . $oxiid . '{
                display:inline-block;
                vertical-align: text-top;
                color:' . $styledata[7] . ';
               
            }';
    if ($styledata[19] == 'Indovisual') {
        $css .= '.oxi-animated-' . $oxiid . '{
                     font-size:' . $styledata[3] . 'px;
                  }
                  @media only screen and (min-width : 669px) and (max-width : 993px){
                    .oxi-animated-' . $oxiid . '{
                       font-size:' . $styledata[4] . 'px;
                    }
                  } 
                  @media only screen and (max-width : 668px){
                    .oxi-animated-' . $oxiid . '{
                        font-size:' . $styledata[5] . 'px;
                     }
                  } ';
    }
     echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-shuffletext-jquery');
}
