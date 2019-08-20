<?php

if (!defined('ABSPATH'))
    exit;

function oxi_event_widgets_style_9_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $icon = $heading = $image = $content = $headersection = $bodysection = '';

      echo'<div class="oxi-addons-container">';
      echo'<div class="oxi-addons-row">';
            foreach ($listdata as $value) {
             $listitemdata = explode('||#||', $value['files']);
             if ($listitemdata[6] != '') {
                    $icon = '<div class="oxi-addons-EW-9-H-icon">'. oxi_addons_font_awesome('' . $listitemdata[6] . '') .'</div>';
                }
                if ($listitemdata[4] != '') {
                    $heading = '<div class="oxi-addons-EW-9-H-text">' . OxiAddonsTextConvert($listitemdata[4]) . '</div>';
                }
                if ($listitemdata[2] != '') {
                    $image = '<div class="oxi-addons-EW-9-calendar-body">
                                    <img src="' . OxiAddonsUrlConvert($listitemdata[2]) . '">
                                </div>';
                }
                if ($listitemdata[8] != '') {
                    $content = '<div class="oxi-addons-EW-9-content-text">' . OxiAddonsTextConvert($listitemdata[8]) . '</div>';
                }
                if ($icon != '' || $heading != '') {
                    $headersection = '<div class="oxi-addons-EW-9-header">
                                          <div class="oxi-addons-EW-9-HI">
                                            ' .$icon. '
                                            ' .$heading. '
                                          </div>
                                      </div>';
                }
                if ($image != '' || $content != '') {
                    $bodysection = '<div class="oxi-addons-EW-9-content-body">
                                          ' .$image. '
                                          ' .$content. '
                                      </div>';
                }
            echo'<div class="' . OxiAddonsItemRows($styledata, 145) . ' ' . OxiAddonsAdminDefine($user) . '">
                    <div class="oxi-addons-EW-9-wrapper-' .$oxiid. '" ' . OxiAddonsAnimation($styledata, 59) . '>
                        <div class="oxi-addons-EW-9-body">
                            ' .$headersection. '
                            ' .$bodysection. '
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
        .oxi-addons-EW-9-wrapper-' .$oxiid. '{
          width: 100%;
          max-width:' . $styledata[3] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
          margin: 0 auto;
        }
        .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-body{
          overflow: hidden;
          border: ' . $styledata[137] .'px ' . $styledata[138] .'  ' . $styledata[141] .';
          border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 5) . ';
          ' . OxiAddonsBoxShadowSanitize($styledata, 53) . '; 
        }
        .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-header{
          width: 100%;
          float: left;
          background: ' . $styledata[63] . ';
          padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';
        }
        .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-HI{
          font-size: ' . $styledata[81] . 'px;
          color: ' . $styledata[85] . ';
          ' . OxiAddonsFontSettings($styledata, 87) . '
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 93) . ';
        }
        .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-H-icon{
          display: inline;
        }
        .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-H-text{
          display: inline;
        }
        .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-content-body{
          width: 100%;
          float: left;
          background: ' . $styledata[143] . ';
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . ';
        }
        .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-calendar-body img{
          width: 100%;
        }
        .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-calendar-body{
          text-align: center;
        }
        .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-content-text{
          width: 100%;
          float: left;
          font-size: ' . $styledata[109] . 'px;
          color: ' . $styledata[113] . ';
          ' . OxiAddonsFontSettings($styledata, 115) . '
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 121) . ';
        }

        @media only screen and (min-width : 669px) and (max-width : 993px){
          .oxi-addons-EW-9-wrapper-' .$oxiid. '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 38) . ';
          }
          .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-header{
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 66) . ';
          }
          .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-HI{
            font-size: ' . $styledata[82] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 94) . ';
          }
          .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-content-body{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . ';
          }
          .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-content-text{
            font-size: ' . $styledata[110] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 122) . ';
          }

        }
        @media only screen and (max-width : 668px){
          .oxi-addons-EW-9-wrapper-' .$oxiid. '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
          }
          .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-header{
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 67) . ';
          }
          .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-HI{
            font-size: ' . $styledata[83] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 95) . ';
          }
          .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-content-body{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
          }
          .oxi-addons-EW-9-wrapper-' .$oxiid. ' .oxi-addons-EW-9-content-text{
            font-size: ' . $styledata[111] . 'px;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 123) . ';
          }

        }

        ';



        echo OxiAddonsInlineCSSData($css);
}
