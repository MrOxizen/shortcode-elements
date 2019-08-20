<?php

if (!defined('ABSPATH'))
    exit;

function oxi_alert_box_style_4_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $firsticon = $heading = $details = $contentsection = $lasticon = '';
        if ($stylefiles[2] != '') {
                $firsticon = '<div class="oxi-addonsAL-FO-col-one">
                                        <div class="oxi-addonsAL-FO-F-icon">
                                            ' .oxi_addons_font_awesome('' .$stylefiles[2]. '').'
                                        </div>
                                    </div>';
        }
        if ($stylefiles[4] != '') {
                $heading = '<div class="oxi-addonsAL-FO-H">
                                           ' . OxiAddonsTextConvert($stylefiles[4]) . '
                                        </div>';
        }
        if ($stylefiles[6] != '') {
                $details = '<div class="oxi-addonsAL-FO-DC">
                                            ' . OxiAddonsTextConvert($stylefiles[6]) . '
                                        </div>';
        }
        if ($heading != '' || $details != '') {
                $contentsection = '<div class="oxi-addonsAL-FO-col-two">
                                    '.$heading.'
                                    '.$details.'
                                </div>';
        }
        if ($stylefiles[8] != '') {
                $lasticon = '<div class="oxi-addonsAL-FO-col-three">
                                <div class="oxi-addonsAL-FO-L-icon">
                                    ' .oxi_addons_font_awesome('' .$stylefiles[8]. '').'
                                </div>
                            </div>';
        }
        echo '<div class="oxi-addons-container">
                 <div class="oxi-addons-row">
                    <div class="oxi-addons-AL-FO-' .$oxiid. '" ' . OxiAddonsAnimation($styledata, 59) . '>
                        <div class="oxi-addonsAL-FO-row">
                            <div class="oxi-addonsAL-FO-BI">
                                '.$firsticon.'
                                '.$contentsection.'
                                '.$lasticon.'
                            </div>
                        </div>
                     </div>
                </div>
              </div>';

          $css='.oxi-addons-AL-FO-' .$oxiid. '{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-row{
            width: 100%;
            float: left;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 5) . ';
            background: ' . $styledata[3] . ';
            border: ' . $styledata[223] . 'px ' . $styledata[224] . ' ' . $styledata[227] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 53) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-BI{
            display: flex;
            width: 100%;
            margin: 0 auto;
            overflow: auto;
            background: ' . $styledata[143] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 5) . ';
            border: ' . $styledata[201] . 'px ' . $styledata[202] . ' ' . $styledata[205] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 207) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-col-one{
            justify-content: center;
            display: flex;
            align-items: center;
            flex-grow: 1;
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-F-icon{
            text-align: center;
            font-size: ' . $styledata[65] . 'px;
            color: ' . $styledata[69] . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-col-two{
            flex-grow: 8;
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-H{
            width: 100%;
            float: left;
            font-size: ' . $styledata[87] . 'px;
            color: ' . $styledata[91] . ';
            ' . OxiAddonsFontSettings($styledata, 93) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 99) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-DC{
            width: 100%;
            float: left;
            font-size: ' . $styledata[115] . 'px;
            color: ' . $styledata[119] . ';
            ' . OxiAddonsFontSettings($styledata, 121) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 127) . ';
          }
           .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-col-three{
            justify-content: center;
            display: flex;
            align-items: center;
            cursor: pointer;
            flex-grow: 1;
           }
           .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-L-icon{
            text-align: center;
            font-size: ' . $styledata[145] . 'px;
            color: ' . $styledata[149] . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 151) . ';
          }

          @media only screen and (min-width : 669px) and (max-width : 993px){
          .oxi-addons-AL-FO-' .$oxiid. '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 38) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 6) . ';
             padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-BI{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 208) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-F-icon{
            font-size: ' . $styledata[66] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';
          }
          
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-col-two{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 170) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 186) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-H{
            font-size: ' . $styledata[88] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 100) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-DC{
            font-size: ' . $styledata[116] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 128) . ';
          }

           .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-L-icon{
            font-size: ' . $styledata[146] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 152) . ';
          }

          }
          @media only screen and (max-width : 668px){
            .oxi-addons-AL-FO-' .$oxiid. '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-BI{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 209) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-F-icon{
            font-size: ' . $styledata[67] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-col-two{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 171) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . ';
            
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-H{
            font-size: ' . $styledata[89] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
          }
          .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-DC{
            font-size: ' . $styledata[117] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
          }

           .oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-L-icon{
            font-size: ' . $styledata[147] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
          }
            
          }
';
   $jquery = 'jQuery(document).ready(function(){
                jQuery(".oxi-addons-AL-FO-' .$oxiid. ' .oxi-addonsAL-FO-col-three").click(function(){
                    jQuery(".oxi-addons-AL-FO-' .$oxiid. '").hide();
                });
           
            });';       
          
          
          
          
    wp_add_inline_script('oxi-addons-animation', $jquery);
    wp_add_inline_style('oxi-addons', $css);
}
