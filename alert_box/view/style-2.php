<?php

if (!defined('ABSPATH'))
    exit;

function oxi_alert_box_style_2_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $firsticon = $heading = $details = $contentsection = $lasticon = '';
        if ($stylefiles[2] != '') {
                $firsticon = '<div class="oxi-addonsAL-T-col-one">
                                        <div class="oxi-addonsAL-T-icon">
                                            ' .oxi_addons_font_awesome('' .$stylefiles[2]. '').'
                                        </div>
                                    </div>';
        }
        if ($stylefiles[4] != '') {
                $heading = '<div class="oxi-addonsAL-T-H">
                                           ' . OxiAddonsTextConvert($stylefiles[4]) . '
                                        </div>';
        }
        if ($stylefiles[6] != '') {
                $details = '<div class="oxi-addonsAL-T-DC">
                                            ' . OxiAddonsTextConvert($stylefiles[6]) . '
                                        </div>';
        }
        if ($heading != '' || $details != '') {
                $contentsection = '<div class="oxi-addonsAL-T-content">
                                    '.$heading.'
                                    '.$details.'
                                </div>';
        }
        if ($stylefiles[8] != '') {
                $lasticon = '<div class="oxi-addonsAL-T-col-three">
                                <div class="oxi-addonsAL-T-L-icon">
                                    ' .oxi_addons_font_awesome('' .$stylefiles[8]. '').'
                                </div>
                            </div>';
        }
        echo '<div class="oxi-addons-container">
                 <div class="oxi-addons-row">
                    <div class="oxi-addons-AL-T-' .$oxiid. '" ' . OxiAddonsAnimation($styledata, 59) . '>
                        <div class="oxi-addons-AL-R">
                            <div class="oxi-addonsAL-T-row">
                                '.$firsticon.'
                                 <div class="oxi-addonsAL-T-col-two"></div>
                                '.$lasticon.'
                            </div>
                            '.$contentsection.'
                        </div>
                     </div>
                 </div>
              </div>';

          $css='.oxi-addons-AL-T-' .$oxiid. '{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addons-AL-R{
            width: 100%;
            float: left;
            overflow: auto;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 5) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 53) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-row{
            display: flex;
            width: 100%;
            margin: 0 auto;
            overflow: auto;
            background: ' . $styledata[3] . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-col-one{
            justify-content: center;
            display: flex;
            align-items: center;
            flex-grow: 0;
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-icon{
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-icon .oxi-icons{
            display: flex;
            justify-content: center;
            align-items: center;
            width: ' . $styledata[167] . 'px;
            height: ' . $styledata[167] . 'px;
            font-size: ' . $styledata[65] . 'px;
            color: ' . $styledata[69] . ';
            background: ' . $styledata[143] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 171) . ';
           }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-content{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . ';
            background: ' . $styledata[63] . ';
            
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-H{
            width: 100%;
            float: left;
            font-size: ' . $styledata[87] . 'px;
            color: ' . $styledata[91] . ';
            ' . OxiAddonsFontSettings($styledata, 93) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 99) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-DC{
            width: 100%;
            float: left;
            font-size: ' . $styledata[115] . 'px;
            color: ' . $styledata[119] . ';
            ' . OxiAddonsFontSettings($styledata, 121) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 127) . ';
          }
           .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-col-three{
            justify-content: center;
            display: flex;
            align-items: center;
            cursor: pointer;
            flex-grow: 0;
           }
           .oxi-addonsAL-T-col-two{
            flex-grow: 8;
           }
           .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-col-three:hover{
            
           }
           .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-L-icon{
            text-align: center;
            font-size: ' . $styledata[145] . 'px;
            color: ' . $styledata[149] . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 151) . ';
          }

          @media only screen and (min-width : 669px) and (max-width : 993px){
          .oxi-addons-AL-T-' .$oxiid. '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 38) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 6) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-icon{
            font-size: ' . $styledata[66] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-content{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . ';
            
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-H{
            font-size: ' . $styledata[88] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 100) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-DC{
            font-size: ' . $styledata[116] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 128) . ';
          }

           .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-L-icon{
            font-size: ' . $styledata[146] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 152) . ';
          }

          }
          @media only screen and (max-width : 668px){
            .oxi-addons-AL-T-' .$oxiid. '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-icon{
            font-size: ' . $styledata[67] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-content{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
            
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-H{
            font-size: ' . $styledata[89] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
          }
          .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-DC{
            font-size: ' . $styledata[117] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
          }

           .oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-L-icon{
            font-size: ' . $styledata[147] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
          }
            
          }
';
   $jquery = 'jQuery(document).ready(function(){
                jQuery(".oxi-addons-AL-T-' .$oxiid. ' .oxi-addonsAL-T-col-three").click(function(){
                    jQuery(".oxi-addons-AL-T-' .$oxiid. '").hide();
                });
           
            });';       
          
          
          
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js');
}