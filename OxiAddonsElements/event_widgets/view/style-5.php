<?php

if (!defined('ABSPATH'))
    exit;

function oxi_event_widgets_style_5_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $heading = $subheading = $details = $subdetails = $headingsection = $detailssection = '';
        echo '<div class="oxi-addons-container">';
        echo '<div class="oxi-addons-row">';
            foreach ($listdata as $value) {
            $listitemdata = explode('||#||', $value['files']);
                if ($listitemdata[2] != '') {
                    $heading = '<div class="oxi-addons-EW-5-H">' . OxiAddonsTextConvert($listitemdata[2]) . '</div>';
                }
                if ($listitemdata[4] != '') {
                    $subheading = '<div class="oxi-addons-EW-5-SH">' . OxiAddonsTextConvert($listitemdata[4]) . '</div>';
                }
                if ($listitemdata[6] != '') {
                    $details = '<div class="oxi-addons-EW-5-D">' . OxiAddonsTextConvert($listitemdata[6]) . '</div>';
                }
                if ($listitemdata[8] != '') {
                    $subdetails = '  <div class="oxi-addons-EW-5-SD">' . OxiAddonsTextConvert($listitemdata[8]) . '</div>';
                }
                if ($heading != '' || $subheading != '') {
                    $headingsection = '<div class="oxi-addons-EW-5-Heading">
                                            ' .$heading. '
                                            ' .$subheading. '
                                        </div>';
                }
                if ($details != '' || $subdetails != '') {
                    $detailssection = '<div class="oxi-addons-EW-5-details">
                                          ' .$details. '
                                          ' .$subdetails. '
                                        </div>';
                }
            
            echo'<div class="' . OxiAddonsItemRows($styledata, 123) . ' ' . OxiAddonsAdminDefine($user) . '">
                    <div class="oxi-addons-EW-5-wrapper-' .$oxiid. '" ' . OxiAddonsAnimation($styledata, 61) . '>
                        <div class="oxi-addons-EW-5-row">
                            <div class="oxi-addons-EW-5-content">
                              ' .$headingsection. '
                              ' .$detailssection. '
                            </div>
                        </div>
                    </div>';
            if ($user == 'admin') {
            echo '<div class="oxi-addons-admin-absulote">
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
            echo'</div>';
            }
        echo'</div>';
        echo'</div>';

      $css='.oxi-addons-EW-5-wrapper-' .$oxiid. '{
            width:100%;
            margin: 0 auto;
            max-width: '. $styledata[121] .'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
            overflow: auto; 
          }
          .oxi-addons-EW-5-wrapper-' .$oxiid. ' .oxi-addons-EW-5-row{
            width: 100%;
            float: left;
            ' . OxiAddonsBGImage($styledata, 3) . '
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 55) . '
          }
          .oxi-addons-EW-5-wrapper-' .$oxiid. ' .oxi-addons-EW-5-Heading{
            width: 100%;
            float: left;
            font-size: ' . $styledata[65] . 'px;
            color: ' . $styledata[69] . ';
            ' . OxiAddonsFontSettings($styledata, 71) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 77) . ';
          }
          .oxi-addons-EW-5-wrapper-' .$oxiid. ' .oxi-addons-EW-5-details{
            width: 100%;
            float: left;
            font-size: ' . $styledata[93] . 'px;
            color: ' . $styledata[97] . ';
            ' . OxiAddonsFontSettings($styledata, 99) . '
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 105) . ';
          }
          .oxi-addons-EW-5-H{
            width: 100%;
            float: left;
          }
          .oxi-addons-EW-5-SH{
            width: 100%;
            float: left;
          }
          .oxi-addons-EW-5-D{
            width: 100%;
            float: left;
          }
          .oxi-addons-EW-5-SD{
            width: 100%;
            float: left;
          }


          @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-EW-5-wrapper-' .$oxiid. '{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 40) . ';
            }
            .oxi-addons-EW-5-row{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 24) . ';
            }
            .oxi-addons-EW-5-wrapper-' .$oxiid. ' .oxi-addons-EW-5-Heading{
              font-size: ' . $styledata[66] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 78) . ';
            }
            .oxi-addons-EW-5-wrapper-' .$oxiid. ' .oxi-addons-EW-5-details{
              font-size: ' . $styledata[94] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 106) . ';
            }

          }
          @media only screen and (max-width : 668px){
            .oxi-addons-EW-5-wrapper-' .$oxiid. '{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 41) . ';
            }
            .oxi-addons-EW-5-row{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
            }
            .oxi-addons-EW-5-wrapper-' .$oxiid. ' .oxi-addons-EW-5-Heading{
              font-size: ' . $styledata[67] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 79) . ';
            }
            .oxi-addons-EW-5-wrapper-' .$oxiid. ' .oxi-addons-EW-5-details{
              font-size: ' . $styledata[95] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 107) . ';
            }

          }';

          echo OxiAddonsInlineCSSData($css);
}
