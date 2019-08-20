<?php

if (!defined('ABSPATH'))
    exit;

function oxi_event_widgets_style_8_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $image = $heading = $subheading = $date = $month = $time = $headingsection = $footersection = '';

      echo '<div class="oxi-addons-container">';
      echo '<div class="oxi-addons-row">';
             foreach ($listdata as $value) {
             $listitemdata = explode('||#||', $value['files']);
             if ($listitemdata[4] != '' && $listitemdata[2] != '') {
                    $image = '<a class="oxi-addons-EW-8-img" href="' . OxiAddonsUrlConvert($listitemdata[4]) . '" target="'.$styledata[65].'">
                                <img class="oxi-addons-EW-8-img-h" src="' . OxiAddonsUrlConvert($listitemdata[2]) . '" alt="">
                            </a>';
                } elseif ($listitemdata[4] == '' && $listitemdata[2] != '') {
                      $image = '<div class="oxi-addons-EW-8-img" href="' . OxiAddonsUrlConvert($listitemdata[4]) . '" target="'.$styledata[65].'">
                                    <img class="oxi-addons-EW-8-img-h" src="' . OxiAddonsUrlConvert($listitemdata[2]) . '" alt="">
                                </div>';
                }
                if ($listitemdata[6] != '') {
                    $heading = '  <div class="oxi-addons-EW-8-H">' . OxiAddonsTextConvert($listitemdata[6]) . '</div>';
                }
                if ($listitemdata[8] != '') {
                    $subheading = '<div class="oxi-addons-EW-8-SH">' . OxiAddonsTextConvert($listitemdata[8]) . '</div>';
                }
                if ($listitemdata[10] != '') {
                    $date = '<div class="oxi-addons-EW-8-footer-D">' . OxiAddonsTextConvert($listitemdata[10]) . '</div>';
                }
                if ($listitemdata[12] != '') {
                    $month = '<div class="oxi-addons-EW-8-footer-M">' . OxiAddonsTextConvert($listitemdata[12]) . '</div>';
                }
                if ($listitemdata[14] != '') {
                    $time = '  <div class="oxi-addons-EW-8-footer-T"> ' . OxiAddonsTextConvert($listitemdata[14]) . '</div>';
                }
                if ($heading != '' || $subheading != '') {
                    $headingsection = '<div class="oxi-addons-EW-8-header">
                                            ' .$heading. '
                                            ' .$subheading. '
                                        </div>';
                }
                if ($date != '' || $month != '' || $time != '') {
                    $footersection = '<div class="oxi-addons-EW-8-footer">
                                            ' .$date. '
                                            ' .$month. '
                                            ' .$time. '
                                        </div>';
                }

             echo '<div class="' . OxiAddonsItemRows($styledata, 207) . ' ' . OxiAddonsAdminDefine($user) . '">
                    <div class="oxi-addons-EW-8-wrapper-' .$oxiid. '" ' . OxiAddonsAnimation($styledata, 61) . '>
                        <div class="oxi-addons-EW-8-img-body">
                            ' .$image. '
                          <div class="oxi-addons-EW-8-body">
                              <div class="oxi-addons-EW-8-body-position">
                                    ' .$headingsection. '
                                    ' .$footersection. '
                              </div>
                          </div>
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
          echo '</div>';
          echo '</div>';

    $css='
      .oxi-addons-EW-8-wrapper-' .$oxiid. '{
        width: 100%;
        max-width: ' . $styledata[5] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
        margin: 0 auto;
      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-img-body{
        width: 100%;
        position: relative;
        overflow: hidden;
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 55) . ';
      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-img-h{
        width: 100%;
        float: left;
        height: auto;
        -webkit-transition: transform 0.3s ease-out 0s;
        -moz-transition: transform 0.3s ease-out 0s;
        -ms-transition: transform 0.3s ease-out 0s;
        -o-transition: transform 0.3s ease-out 0s;
        transition: transform 0.3s ease-out 0s;
      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-img:hover .oxi-addons-EW-8-img-h {
          filter: blur(3px);
          -webkit-filter: blur(3px);
          -webkit-transform: scale(1.1);
          -moz-transform: scale(1.1);
          -ms-transform: scale(1.1);
          -o-transform: scale(1.1);
          transform: scale(1.1);
      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-body{
        background: ' . $styledata[3] . ';
        pointer-events: none;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-body-position{
        position: relative;
        width: 100%;
        height: 100%;
      }
      .oxi-addons-EW-8-header{
        width:100%;
        position: absolute;
        top: 0;
      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-H{
        width: 100%;
        float: left;
        font-size: ' . $styledata[67] . 'px;
        color: ' . $styledata[71] . ';
        ' . OxiAddonsFontSettings($styledata, 73) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 79) . ';
      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-SH{
        width: 100%;
        float: left;
        font-size: ' . $styledata[95] . 'px;
        color: ' . $styledata[99] . ';
        ' . OxiAddonsFontSettings($styledata, 101) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 107) . ';
      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-footer{
        width: 100%;
        position: absolute;
        bottom: 0;

      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-footer-D{
        width: 100%;
        float: left;
        font-size: ' . $styledata[123] . 'px;
        color: ' . $styledata[127] . ';
        ' . OxiAddonsFontSettings($styledata, 129) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';
      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-footer-M{
        width: 100%;
        float: left;
        font-size: ' . $styledata[151] . 'px;
        color: ' . $styledata[155] . ';
        ' . OxiAddonsFontSettings($styledata, 157) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 163) . ';
      }
      .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-footer-T{
        width: 100%;
        float: left;
        font-size: ' . $styledata[179] . 'px;
        color: ' . $styledata[183] . ';
        ' . OxiAddonsFontSettings($styledata, 185) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 191) . ';
      }

      @media only screen and (min-width : 669px) and (max-width : 993px){
        .oxi-addons-EW-8-wrapper-' .$oxiid. '{
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 40) . ';
        } 
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-body{
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 24) . ';
        }
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-H{
          font-size: ' . $styledata[68] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 80) . ';
        }
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-SH{
          font-size: ' . $styledata[96] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 108) . ';
        }
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-footer-D{
          font-size: ' . $styledata[124] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 136) . ';
        }
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-footer-M{
          font-size: ' . $styledata[152] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 164) . ';
        }
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-footer-T{
          font-size: ' . $styledata[180] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 192) . ';
        }

      }
      @media only screen and (max-width : 668px){
        .oxi-addons-EW-8-wrapper-' .$oxiid. '{
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 41) . ';
        }

        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-body{
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . ';
        }
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-H{
          font-size: ' . $styledata[69] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 81) . ';
        }
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-SH{
          font-size: ' . $styledata[97] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 109) . ';
        }
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-footer-D{
          font-size: ' . $styledata[125] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 137) . ';
        }
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-footer-M{
          font-size: ' . $styledata[153] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 165) . ';
        }
        .oxi-addons-EW-8-wrapper-' .$oxiid. ' .oxi-addons-EW-8-footer-T{
          font-size: ' . $styledata[181] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 193) . ';
        }

      }

    ';

    echo OxiAddonsInlineCSSData($css);
}
