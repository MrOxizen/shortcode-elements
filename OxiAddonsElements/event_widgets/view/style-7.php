<?php

if (!defined('ABSPATH'))
    exit;

function oxi_event_widgets_style_7_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $heading = $ewicon = $time = $addressicon = $addresstext = $linkicon = $link = $linktext= $timesection = $addressicon ='';
    $css = '';
      echo '<div class="oxi-addons-container">';
      echo '<div class="oxi-addons-row">';
            foreach ($listdata as $value) {
            $listitemdata = explode('||#||', $value['files']);
              if ($listitemdata[4] != '') {
                    $heading = '<div class="oxi-addons-EW-7-H">' . OxiAddonsTextConvert($listitemdata[4]) . '</div>';
                }
                if ($listitemdata[8] != '') {
                    $ewicon = '<div class="oxi-addons-EW-7-icon">'.oxi_addons_font_awesome('' . $listitemdata[8] . '').'</div>';
                }
                if ($listitemdata[6] != '') {
                    $time = '<div class="oxi-addons-EW-7-time-text">' . OxiAddonsTextConvert($listitemdata[6]) . '</div>';
                }
                if ($listitemdata[12] != '') {
                    $addressicon = '<div class="oxi-addons-EW-7-icon">'.oxi_addons_font_awesome('' . $listitemdata[12] . '').'</div>';
                }
                if ($listitemdata[10] != '') {
                    $addresstext = '<div class="oxi-addons-EW-7-text">' . OxiAddonsTextConvert($listitemdata[10]) . '</div>';
                }
                if ($listitemdata[18] != '') {
                    $linkicon = '<div class="oxi-addons-EW-7-icon">'.oxi_addons_font_awesome('' . $listitemdata[18] . '').'</div>';
                }
                if ($listitemdata[14] != '') {
                    $linktext = '<div class="oxi-addons-EW-7-icon-text">' . OxiAddonsTextConvert($listitemdata[14]) . '</div>';
                }
                if ($listitemdata[16] != '') {
                    $link = '<div class="oxi-addons-EW-7-link" >
                                  <a class="oxi-addons-EW-7-link-C" href="' . OxiAddonsUrlConvert($listitemdata[16]) . '" target="'.$styledata[171].'">
                                    '.$linkicon.'
                                    '.$linktext.'
                                  </a>
                             </div>';
                } else {
                    $link = '<div class="oxi-addons-EW-7-link" >
                                '.$linkicon.'
                                '.$linktext.'
                             </div>';
                }
                if ($ewicon != '' || $time != '') {
                    $timesection = '<div class="oxi-addons-EW-7-time">
                                        ' .$ewicon. '
                                        ' .$time. '
                                    </div>';
                }
                if ($addressicon != '' || $addresstext != '' || $link != '') {
                    $addresssection = '<div class="oxi-addons-EW-7-address">
                                          ' .$addressicon. '
                                          ' .$addresstext. '
                                          ' .$link. '
                                    </div>';
                }
                
            echo'<div class="' . OxiAddonsItemRows($styledata, 197) . ' ' . OxiAddonsAdminDefine($user) . '">
                    <div class="oxi-addons-EW-7-wrapper-' .$oxiid. ' oxi-addons-EW-7-wrapper-' . $oxiid . '-' . $value['id'] . '" ' . OxiAddonsAnimation($styledata, 63) . '>
                        <div class="oxi-addons-EW-7-image">
                            <div class="oxi-addons-EW-7-body">
                                  ' .$heading. '
                                  '.$timesection.'
                                  '.$addresssection.'
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
             $css .= '.oxi-addons-EW-7-wrapper-' .$oxiid. '.oxi-addons-EW-7-wrapper-' . $oxiid . '-' . $value['id'] . ' .oxi-addons-EW-7-image{
                        background: url(\'' . OxiAddonsUrlConvert($listitemdata[2]) . '\');
                        width: 100%;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-size: cover;
                        position: relative;
                      
                      }';
            }     
        echo'</div>';
        echo'</div>';


      $css .='
      .oxi-addons-EW-7-wrapper-' .$oxiid. '{
        width: 100%;
        float: left;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 41) . ';

      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-image{
            border: ' . $styledata[3] .'px ' . $styledata[4] .'  ' . $styledata[7] .';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 57) . ';
        }
      
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-image::after{
        display: inline-block;
        content: "";
        padding: ' . $styledata[67] . '%;
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-body{
        width: 100%;
        float: left;
        position: absolute;
        bottom: 0;
        background: ' . $styledata[69] . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ';
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-H{
        width: 100%;
        float: left;
        font-size: ' . $styledata[87] . 'px;
        color: ' . $styledata[91] . ';
        ' . OxiAddonsFontSettings($styledata, 93) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 99) . ';
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-time{
        width: 100%;
        float: left;
        font-size: ' . $styledata[115] . 'px;
        color: ' . $styledata[119] . ';
        ' . OxiAddonsFontSettings($styledata, 121) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 127) . ';
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-icon{
        display: inline;
        padding-right: 5px;
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-time-text{
        display: inline;
        margin:0;
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-address{
        width: 100%;
        float: left;
        font-size: ' . $styledata[143] . 'px;
        color: ' . $styledata[147] . ';
        ' . OxiAddonsFontSettings($styledata, 149) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 155) . ';
      }

      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-icon{
        display: inline;
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-text{
        display: inline;
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-link{
        display: inline;
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-icon{
        display: inline;
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-icon-text{
        display: inline;
      }

      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-link{
        font-size: ' . $styledata[173] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 181) . ';
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-icons{
        transition: none;
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-link-C{
        color: ' . $styledata[177] . ';
        transition: none;
      }
      .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-link:hover .oxi-addons-EW-7-link-C{
          color: ' . $styledata[179] . ';
      }
      
      @media only screen and (min-width : 669px) and (max-width : 993px){
        .oxi-addons-EW-7-wrapper-' .$oxiid. '{
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 42) . ';
        }
        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-image{
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 26) . ';
        }
        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-body{
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 72) . ';
        }
        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-H{
          font-size: ' . $styledata[88] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 100) . ';
        }
        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-time{
          font-size: ' . $styledata[116] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 128) . ';
        }
        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-address{
          font-size: ' . $styledata[144] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 156) . ';
        }

        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-link{
          font-size: ' . $styledata[174] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 182) . ';
        }
      }
      @media only screen and (max-width : 668px){
        .oxi-addons-EW-7-wrapper-' .$oxiid. '{
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 43) . ';
        }
        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-image{
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 44) . ';
        }
        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-body{
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
        }
        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-H{
          font-size: ' . $styledata[89] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
        }
        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-time{
          font-size: ' . $styledata[117] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
        }
        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-address{
          font-size: ' . $styledata[145] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . ';
        }

        .oxi-addons-EW-7-wrapper-' .$oxiid. ' .oxi-addons-EW-7-link{
          font-size: ' . $styledata[175] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 183) . ';
        }

      }';


      echo OxiAddonsInlineCSSData($css);
}
