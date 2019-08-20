<?php

if (!defined('ABSPATH'))
    exit;

function oxi_animated_text_style_1_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $textdata = explode('||#||', $stylefiles[1]);
    echo '<div class="oxi-addons-container">'
			. '<div class="oxi-addons-row">'
				. '<div class="oxi-addons-AT-P-' . $oxiid . '">'
					. '<span class="oxi-animated-' . $oxiid . '">' . OxiAddonsTextConvert($stylefiles[3]) . '</span>'
				. '</div>'
			. '</div>'
		. '</div>';
    echo oxi_addons_elements_stylejs('jquery.bubble.text', 'animated_text', 'js');
    $txtdata = '';
    foreach ($textdata as $value) {
        if (!empty($value)) {
            $txtdata .= "'$value',";
        }
    }
    $jquery = "var phrases$oxiid = [
                $txtdata
              ];
            var len$oxiid = phrases$oxiid.length;
            var index = 0;

            var ctrl = bubbleText({
                element: jQuery('.oxi-animated-$oxiid'),
                newText: phrases" . $oxiid . "[index++],
                letterSpeed: ' . $styledata[17] . ',
                repeat: Infinity,
                timeBetweenRepeat: ' . $styledata[15] . ',
                callback: function() {
                    this.newText = phrases" . $oxiid . "[index++ % len$oxiid];
                },
            });";
    $css = '.oxi-addons-AT-P-' . $oxiid . '{
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
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-jquery.bubble.text');
}
