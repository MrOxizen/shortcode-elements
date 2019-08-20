<?php

if (!defined('ABSPATH'))
    exit;

function oxi_event_widgets_style_11_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $date = $month = $datemonthsection = $bottomsection = $headingsection = $icon = $addresstext = $addresssection = $button = '';
    $css = '';
        echo'<div class="oxi-addons-container">';
        echo'<div class="oxi-addons-row">';
                foreach ($listdata as $value) {
                $listitemdata = explode('||#||', $value['files']);
                    if ($listitemdata[4] != '') {
                            $date = '<div class="oxi-addons-EW-11-D">' . OxiAddonsTextConvert($listitemdata[4]) . '</div>';
                        }
                        if ($listitemdata[6] != '') {
                            $month = '<div class="oxi-addons-EW-11-M">' . OxiAddonsTextConvert($listitemdata[6]) . '</div>';
                        }
                        if ($date != '' || $month != '') {
                            $datemonthsection = '<div class="oxi-addons-EW-11-top">
                                                      <div class="oxi-addons-EW-11-DM-body">
                                                         <div class="oxi-addons-EW-11-DM-cell">
                                                            ' .$date. '
                                                            ' .$month. '
                                                          </div>
                                                      </div>
                                                  </div>';
                        }
                        if ($listitemdata[8] != '') {
                            $bottomsection = '<div class="oxi-addons-EW-11-bottom">
                                            <div class="oxi-addons-EW-11-timebody">
                                                <div class="oxi-addons-EW-11-time">' . OxiAddonsTextConvert($listitemdata[8]) . '</div>
                                            </div>
                                      </div>';
                        }
                        if ($listitemdata[10] != '') {
                            $headingsection = '<div class="oxi-addons-EW-11-heading">' . OxiAddonsTextConvert($listitemdata[10]) . '</div>';
                        }
                        if ($listitemdata[12] != '') {
                            $icon = '<div class="oxi-addons-EW-11-address-icon">'.oxi_addons_font_awesome('' . $listitemdata[12] . '').'</div>';
                        }
                        if ($listitemdata[14] != '') {
                            $addresstext = '<div class="oxi-addons-EW-11-address-text">' . OxiAddonsTextConvert($listitemdata[14]) . '</div>';
                        }
                        if ($icon != '' || $addresstext != '') {
                            $addresssection = '<div class="oxi-addons-EW-11-address">
                                                    ' .$icon. '
                                                    ' .$addresstext. '
                                                </div>';
                        }
                        if ($listitemdata[18] != '' && $listitemdata[16] != '') {
                            $button = '  <div class="oxi-addons-EW-11-button">
                                              <a class="oxi-addons-EW-11-button-link" href="' . OxiAddonsUrlConvert($listitemdata[18]) . '" target="'.$styledata[356].'">' . OxiAddonsTextConvert($listitemdata[16]) . '</a>
                                          </div>';
                        } elseif ($listitemdata[18] == '' && $listitemdata[16] != '') {
                            $button = ' <div class="oxi-addons-EW-11-button">
                                              <div class="oxi-addons-EW-11-button-link">' . OxiAddonsTextConvert($listitemdata[16]) . '</div>
                                          </div>';
                        }
                    echo '<div class="' . OxiAddonsItemRows($styledata, 397) . ' ' . OxiAddonsAdminDefine($user) . '">
                            <div class="oxi-addons-EW-11-wrapper-' . $oxiid . ' oxi-addons-EW-11-wrapper-' . $oxiid . '-' . $value['id'] . '">
                                <div class="oxi-addons-EW-11-row" ' . OxiAddonsAnimation($styledata, 401) . '>
                                    <div class="oxi-addons-EW-11-fullbody">
                                        <div class="oxi-addons-EW-11-col-6">
                                            <div class="oxi-addons-EW-11-imagebody">
                                                <div class="oxi-addons-EW-11-image-position">
                                                    ' .$datemonthsection. '
                                                    ' .$bottomsection. '
                                                </div>
                                            </div>
                                        </div>
                                        <div class="oxi-addons-EW-11-col-6 oxi-addons-EW-11-postiton">
                                              <div class="oxi-addons-EW-11-contentbody">
                                                    ' .$headingsection. '
                                                    ' .$addresssection. '
                                                    ' .$button. '
                                              </div>
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
                 $css .= '.oxi-addons-EW-11-wrapper-' . $oxiid . '.oxi-addons-EW-11-wrapper-' . $oxiid . '-' . $value['id'] . ' .oxi-addons-EW-11-imagebody{
                            background: url(\'' . OxiAddonsUrlConvert($listitemdata[2]) . '\');
                            width: 100%;
                            height: 100%;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;
                          }';
              }
            echo '</div>';
            echo '</div>';

        if( $styledata[41] == 'left'){
          $justify_content =  'justify-content: flex-start';
        }elseif( $styledata[41] == 'right'){
          $justify_content  = 'justify-content: flex-end';
        }else{
          $justify_content  = 'justify-content: center';
        }
        if( $styledata[149] == 'left'){
          $justify_content_bootom =  'justify-content: flex-start';
        }elseif( $styledata[149] == 'right'){
          $justify_content_bootom  = 'justify-content: flex-end';
        }else{
          $justify_content_bootom  = 'justify-content: center';
        }
        $bodyposition = $styledata[7] == 'right' ? "order: -1" : "order: 1";
          $css .= '
                .oxi-addons-EW-11-wrapper-' . $oxiid . '{
                  width: 100%;
                  max-width: '. $styledata[5] .'px;
                  margin: 0 auto;
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-row{
                  border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . ';
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-fullbody{
                    display: flex;
                }
                .oxi-addons-EW-11-col-6{
                    width:100%;
                    float: left;
                }
                .oxi-addons-EW-11-bottom{
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-postiton{
                  ' .$bodyposition. ';
                }
                .oxi-addons-EW-11-image-position{
                  width: 100%;
                  height: 100%;
                  display: flex;
                  flex-wrap: wrap;
                  align-content: space-between;
                }
                .oxi-addons-EW-11-top{
                  width: 100%;
                  display: flex;
                  ' . $justify_content . '
                }
                .oxi-addons-EW-11-bottom{
                  width: 100%;
                  display: flex;
                  ' . $justify_content_bootom . '
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-DM-body{
                    display: table;
                    width: ' . $styledata[43] . 'px;
                    height: ' . $styledata[47] . 'px;
                    ' . OxiAddonsBGImage($styledata, 51) . '
                    border: ' . $styledata[55] . 'px ' . $styledata[56] . ' ' . $styledata[59] . ';
                    border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 61) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 77) . ';
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-DM-cell{
                  vertical-align: middle;
                  text-align: center;
                  display: table-cell;
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-D{
                  line-height: 1;
                  font-size: ' . $styledata[93] . 'px;
                  color: ' . $styledata[97] . ';
                  ' . OxiAddonsFontSettings($styledata, 99) . '
                  margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 105) . ';
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-M{
                  line-height: 1;
                  font-size: ' . $styledata[121] . 'px;
                  color: ' . $styledata[125] . ';
                  ' . OxiAddonsFontSettings($styledata, 127) . '
                   margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 133) . ';
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-timebody{
                  ' . OxiAddonsBGImage($styledata, 151) . '
                  border: ' . $styledata[155] . 'px ' . $styledata[156] . ' ' . $styledata[159] . ';
                  border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 177) . ';
                  margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 193) . ';
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-time{
                  font-size: ' . $styledata[209] . 'px;
                  color: ' . $styledata[213] . ';
                  ' . OxiAddonsFontSettings($styledata, 215) . '
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-contentbody{
                  width: 100%;
                  float: left;
                  background: ' . $styledata[221] . ';
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 223) . ';
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-heading{
                  font-size: ' . $styledata[239] . 'px;
                  color: ' . $styledata[243] . ';
                  ' . OxiAddonsFontSettings($styledata, 245) . '
                   margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 251) . ';
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address{
                  display: flex;
                  margin: 0px auto;
                  align-items: center;
                }

                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-icon .oxi-icons{
                  background: ' . $styledata[273] . ';
                  width: ' . $styledata[275] . 'px;
                  height: ' . $styledata[279] . 'px;
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 299) . ';
                  display: flex;
                  align-items: center;
                  border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 283) . ';
                  margin-right: 10px;
                  justify-content: center;
                  font-size: ' . $styledata[267] . 'px;
                  color: ' . $styledata[271] . ';
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-text{
                  width: 100%;
                  float: left;
                  font-size: ' . $styledata[315] . 'px;
                  color: ' . $styledata[319] . ';
                  ' . OxiAddonsFontSettings($styledata, 321) . '
                   margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 327) . ';

                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button{
                  width:100%;
                  float: left;
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 365) . ';
                  ' . OxiAddonsFontSettings($styledata, 359) . '
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button-link{
                  font-size: ' . $styledata[343] . 'px;
                  color: ' . $styledata[347] . ';
                  border-bottom:' . $styledata[351] . 'px ' . $styledata[352] . ' ' . $styledata[355] . ';
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 381) . ';
                }
                .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button-link:hover{
                    color: ' . $styledata[349] . ';
                }


                @media only screen and (min-width : 669px) and (max-width : 993px){
                  .oxi-addons-EW-11-wrapper-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 10) . ';
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-row{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 26) . ';
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-fullbody{
                    flex-direction: column;
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-DM-body{
                      width: ' . $styledata[44] . 'px;
                      height: ' . $styledata[48] . 'px;
                      border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 62) . ';
                      margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 78) . ';
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-D{
                    font-size: ' . $styledata[94] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 106) . ';
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-M{
                    font-size: ' . $styledata[122] . 'px;
                     margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 134) . ';
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-timebody{
                    border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 162) . ';
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 178) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 194) . ';
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-time{
                    font-size: ' . $styledata[210] . 'px;
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-contentbody{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 224) . ';
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-heading{
                    font-size: ' . $styledata[240] . 'px;
                     margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 252) . ';
                  }

                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-icon .oxi-icons{
                    width: ' . $styledata[276] . 'px;
                    height: ' . $styledata[280] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 300) . ';
                    font-size: ' . $styledata[268] . 'px;
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-text{
                    font-size: ' . $styledata[316] . 'px;
                     margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 328) . ';

                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 366) . ';
                  }
                  .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button-link{
                    font-size: ' . $styledata[344] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 382) . ';
                  }
                }

                @media only screen and (max-width : 668px){
                    .oxi-addons-EW-11-wrapper-' . $oxiid . '{
                      padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';
                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-row{
                      border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 27) . ';
                    }

                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-fullbody{
                      flex-direction: column;
                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-DM-body{
                        width: ' . $styledata[45] . 'px;
                        height: ' . $styledata[49] . 'px;
                        border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 63) . ';
                        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 79) . ';
                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-D{
                      font-size: ' . $styledata[95] . 'px;
                      margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 107) . ';
                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-M{
                      font-size: ' . $styledata[123] . 'px;
                       margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';
                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-timebody{
                      border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 163) . ';
                      padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 179) . ';
                      margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 195) . ';
                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-time{
                      font-size: ' . $styledata[211] . 'px;
                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-contentbody{
                      padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 225) . ';
                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-heading{
                      font-size: ' . $styledata[241] . 'px;
                       margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 253) . ';
                    }

                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-icon .oxi-icons{
                      width: ' . $styledata[277] . 'px;
                      height: ' . $styledata[281] . 'px;
                      padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 301) . ';
                      font-size: ' . $styledata[269] . 'px;
                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-text{
                      font-size: ' . $styledata[317] . 'px;
                       margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 329) . ';

                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button{
                      padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 367) . ';
                    }
                    .oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button-link{
                      font-size: ' . $styledata[345] . 'px;
                      padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 383) . ';
                    }
                }
          ';

          echo OxiAddonsInlineCSSData($css);
}
