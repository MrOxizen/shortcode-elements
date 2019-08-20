<?php

if (!defined('ABSPATH'))
    exit;

function oxi_animated_text_style_6_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    echo '<div class="oxi-addons-row">
                    <div class="oxi-addons-animet-text-' . $oxiid . '">
                        <div class="oxi-animet-text-body">
                            <svg viewBox="0 50 1500 ' . ( (($styledata[35] + $styledata[41]) * 10 * 13.75) + ($styledata[35] * 10 * 17.5) + ($styledata[41] * 10 * 42.5) + ( ($styledata[41] - $styledata[35]) * 10 * 12.5) ) . '"  id="svg1" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                <symbol id="oxi-add-s-text">
                                  <text text-anchor="middle"
                                        x="50%"
                                        y="35%"
                                        class="oxi-add-text--line"
                                        >
                                    ' . $stylefiles[3] . '
                                  </text>
                                  <text text-anchor="middle"
                                        x="50%"
                                        y="68%"
                                        class="oxi-add-text--line2"
                                        >
                                    ' . $stylefiles[5] . '
                                  </text>
                                </symbol>

                                <g class="g-ants">
                                  <use xlink:href="#oxi-add-s-text"
                                    class="oxi-add-text-copy"></use>     
                                  <use xlink:href="#oxi-add-s-text"
                                    class="oxi-add-text-copy"></use>     
                                  <use xlink:href="#oxi-add-s-text"
                                    class="oxi-add-text-copy"></use>     
                                  <use xlink:href="#oxi-add-s-text"
                                    class="oxi-add-text-copy"></use>     
                                  <use xlink:href="#oxi-add-s-text"
                                    class="oxi-add-text-copy"></use>     
                                </g>
                            </svg>
                            
                        </div>
                    </div>
                </div>';
  
    $css .= '.oxi-addons-animet-text-' . $oxiid . '{
                width: 100%;
                height:auto;
                font-size:16px;
                display:block;
            }
            .oxi-addons-animet-text-' . $oxiid . ' *{
                overflow: visible;
                transition: none;
            }
            .oxi-animet-text-body{
                height: 100%;
                font: 16em/1 Arial;
                display:flex;
            }
            .oxi-add-text--line {
                font-size: ' . $styledata[35] . 'em;
              }
            .oxi-add-text--line2 {
                font-size: ' . $styledata[41] . 'em;
              }
             .oxi-addons-animet-text-' . $oxiid . ' svg {
                width: 100%;
                height: 100%;
                margin-top: ' . $styledata[37] . '%;
                margin-bottom: ' . $styledata[39] . '%;
              }

             .oxi-addons-animet-text-' . $oxiid . ' .oxi-add-text-copy {
                fill: none;
                stroke: white;
                stroke-dasharray: 7% 28%;
                stroke-width: ' . $styledata[7] . 'px;
                -webkit-animation: '.$styledata[5].' ' . $styledata[3] . 's infinite linear;
                animation: '.$styledata[5].' ' . $styledata[3] . 's infinite linear;
              }
             .oxi-addons-animet-text-' . $oxiid . ' .oxi-add-text-copy:nth-child(1) {
                stroke: ' . $styledata[9] . ';
                stroke-dashoffset: 7%;
              }
             .oxi-addons-animet-text-' . $oxiid . ' .oxi-add-text-copy:nth-child(2) {
                stroke: ' . $styledata[11] . ';
                stroke-dashoffset: 14%;
              }
             .oxi-addons-animet-text-' . $oxiid . ' .oxi-add-text-copy:nth-child(3) {
                stroke: ' . $styledata[13] . ';
                stroke-dashoffset: 21%;
              }
             .oxi-addons-animet-text-' . $oxiid . ' .oxi-add-text-copy:nth-child(4) {
                stroke: ' . $styledata[15] . ';
                stroke-dashoffset: 28%;
              }
             .oxi-addons-animet-text-' . $oxiid . ' .oxi-add-text-copy:nth-child(5) {
                stroke: ' . $styledata[17] . ';
                stroke-dashoffset: 35%;
              }

              @-webkit-keyframes stroke-offset {
                50% {
                  stroke-dashoffset: 35%;
                  stroke-dasharray: 0 87.5%;
                }
              }

              @keyframes stroke-offset {
                50% {
                  stroke-dashoffset: 35%;
                  stroke-dasharray: 0 87.5%;
                }
              }
            ';

    echo OxiAddonsInlineCSSData($css);
}
