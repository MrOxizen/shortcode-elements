<?php

if (!defined('ABSPATH'))
    exit;

function oxi_event_widgets_style_6_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $heading = $subheading = $details = $subdetails = $headersection = $footersection = '';
    
    
          echo '<div class="oxi-addons-container">';
          echo '<div class="oxi-addons-row">';
                foreach ($listdata as $value) {
                $listitemdata = explode('||#||', $value['files']);
                if ($listitemdata[2] != '') {
                    $heading = '<div class="oxi-addons-EW-6-H">' . OxiAddonsTextConvert($listitemdata[2]) . '</div>';
                }
                if ($listitemdata[4] != '') {
                    $subheading = '<div class="oxi-addons-EW-6-SH">' . OxiAddonsTextConvert($listitemdata[4]) . '</div>';
                }
                if ($listitemdata[6] != '') {
                    $details = '<div class="oxi-addons-EW-6-D">' . OxiAddonsTextConvert($listitemdata[6]) . '</div>';
                }
                if ($listitemdata[8] != '') {
                    $subdetails = '  <div class="oxi-addons-EW-6-M">' . OxiAddonsTextConvert($listitemdata[8]) . '</div>';
                }
                if ($heading != '' || $subheading != '') {
                    $headersection = '<div class="oxi-addons-EW-6-content-box">
                                          ' .$heading. '
                                          ' .$subheading. '
                                        </div>';
                }
                if ($details != '' || $subdetails != '') {
                    $footersection = '<div class="oxi-addons-EW-6-date-box">
                                          <div class="oxi-addons-EW-6-DM">
                                              ' .$details. '
                                              ' .$subdetails. '
                                          </div>
                                      </div>';
                }
                echo'<div class="' . OxiAddonsItemRows($styledata, 177) . ' ' . OxiAddonsAdminDefine($user) . '">
                        <div class="oxi-addons-EW-6-wrapper-' .$oxiid. '" ' . OxiAddonsAnimation($styledata, 59) . '>
                           <div class="oxi-addons-EW-6-body">
                               ' .$headersection. '
                               ' .$footersection. '
                           </div>
                       </div>';
                if ($user == 'admin') {
                        echo '  <div class="oxi-addons-admin-absulote">
                                    <div class="oxi-addons-admin-absulate-edit">
                                        <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditevent_widgetsdata") . '
                                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                            <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                        </form>
                                    </div>
                                    <div class="oxi-addons-admin-absulate-delete">
                                        <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteevent_widgetsdata") . '
                                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                            <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                        </form>
                                    </div>
                                </div>';
                    }
                    echo '</div>';
                }
            echo'</div>';
            echo'</div>';

          $css= '.oxi-addons-EW-6-wrapper-' .$oxiid. '{
              width: 100%;
              float: left;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
          }
          .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-body{
            width: 100%;
            float: left;
            display: flex;
            background:' . $styledata[91] . ';
            align-items: center;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 5) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 53) . '
          }
          .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-content-box{
            width: 80%;
            background:' . $styledata[3] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . ';
           
          }
          .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-H{
            width: 100%;
            float: left;
            font-size: ' . $styledata[63] . 'px;
            color: ' . $styledata[67] . ';
            ' . OxiAddonsFontSettings($styledata, 69) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 75) . ';
          }
          .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-SH{
            width: 100%;
            float: left;
            font-size: ' . $styledata[121] . 'px;
            color: ' . $styledata[125] . ';
            ' . OxiAddonsFontSettings($styledata, 127) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 133) . ';
          }
          .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-date-box{
            width: 20%;
            text-align: center;
          }
          .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-DM{
            text-align: center;
          }
          .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-D{
            font-size: ' . $styledata[93] . 'px;
            color: ' . $styledata[97] . ';
            ' . OxiAddonsFontSettings($styledata, 99) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 105) . ';
          }
          .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-M{
            font-size: ' . $styledata[149] . 'px;
            color: ' . $styledata[153] . ';
            ' . OxiAddonsFontSettings($styledata, 155) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
          }

          @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-content-box{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . ';
              margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 38) . ';
            }
            .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-H{
              font-size: ' . $styledata[64] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 76) . ';
            }
            .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-SH{
              font-size: ' . $styledata[122] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 134) . ';
            }
            .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-D{
              font-size: ' . $styledata[94] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 106) . ';
            }
            .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-M{
              font-size: ' . $styledata[150] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 162) . ';
            }

          }
          @media only screen and (max-width : 668px){
            .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-content-box{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
              margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
            }
            .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-H{
              font-size: ' . $styledata[65] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 77) . ';
            }
            .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-SH{
              font-size: ' . $styledata[123] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 134) . ';
            }
            .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-D{
              font-size: ' . $styledata[95] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 107) . ';
            }
            .oxi-addons-EW-6-wrapper-' .$oxiid. ' .oxi-addons-EW-6-M{
              font-size: ' . $styledata[151] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 163) . ';
            }

          }

          ';


        echo OxiAddonsInlineCSSData($css);
}
