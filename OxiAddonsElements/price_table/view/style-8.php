<?php

if (!defined('ABSPATH'))
    exit;

function oxi_price_table_style_8_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $date = $month = $datemonthsection = $bottomsection = $headingsection = $icon = $addresstext = $addresssection = $button = '';
    $css = '';

    if ($stylefiles[2] != '') {
        $headingsection = '<div class="oxi-addons-price-table-heading">' . OxiAddonsTextConvert($stylefiles[2]) . '</div>';
    }
    if ($styledata[407] != '' || $styledata[408] != '') {
        $image_section = ' <div class="oxi-addons-price-table-col-6">
                                <div class="oxi-addons-price-table-imagebody">
                                  
                                </div>
                            </div>';
    }
    if ($stylefiles[4] != '') {
        $sub_headingsection = '<div class="oxi-addons-price-table-sub-heading">' . OxiAddonsTextConvert($stylefiles[4]) . '</div>';
    }
    if ($stylefiles[6] != '' && $stylefiles[8] != '') {
        $button = '  <div class="oxi-addons-price-table-button">
						<a class="oxi-addons-price-table-button-link" href="' . OxiAddonsUrlConvert($stylefiles[8]) . '" target="' . $styledata[356] . '">' . OxiAddonsTextConvert($stylefiles[6]) . '</a>
					</div>';
    } elseif ($stylefiles[8] == '' && $stylefiles[6] != '') {
        $button = ' <div class="oxi-addons-price-table-button">
                        <div class="oxi-addons-price-table-button-link">' . OxiAddonsTextConvert($stylefiles[6]) . '</div>
                    </div>';
    }
    echo '  <div class="oxi-addons-container">
                <div class="oxi-addons-row">
                    <div class="oxi-addons-price-table-wrapper-' . $oxiid . ' ">
                        <div class="oxi-addons-price-table-row" ' . OxiAddonsAnimation($styledata, 401) . '>
                            <div class="oxi-addons-price-table-fullbody">
                               ' . $image_section . '
                                <div class="oxi-addons-price-table-col-6 oxi-addons-price-table-postiton  ">
                                    <div class="oxi-addons-price-table-contentbody">
                                        ' . $headingsection . '
                                        ' . $sub_headingsection . '
                                        <div class="oxi-full-add-sec">';
                            foreach ($listdata as $value) {
                                $listitemdata = explode('||#||', $value['files']);
                                if ($listitemdata[8] != '') {
                                    $icon = '<div class="oxi-addons-price-table-address-icon">' . oxi_addons_font_awesome('' . $listitemdata[8] . '') . '</div>';
                                }
                                if ($listitemdata[10] != '') {
                                    $addresstext = '<div class="oxi-addons-price-table-address-text">' . OxiAddonsTextConvert($listitemdata[10]) . '</div>';
                                }

                                if ($icon != '' || $addresstext != '') {
                                    $addresssection = '<div class="oxi-addons-price-table-address">
                                                          ' . $icon . '
                                                          ' . $addresstext . '
                                                      </div>';
                                }
                                echo ' <div class="' . OxiAddonsAdminDefine($user) . ' ">
                                                                    ' . $addresssection . ' ';
                                if ($user == 'admin') {
                                    echo '  <div class="oxi-addons-admin-absulote">
                                                <div class="oxi-addons-admin-absulate-edit">
                                                    <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditprice_tabledata") . '
                                                      <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                      <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                                    </form>
                                                  </div>
                                                <div class="oxi-addons-admin-absulate-delete">
                                                  <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteprice_tabledata") . '
                                                      <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                      <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                                  </form>
                                                </div>
                                            </div>';
                                }
                                echo '</div>';
                            }
                            echo '</div>
                                    </div>
                                    ' . $button . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>	 
		';

    if ($styledata[41] == 'left') {
        $justify_content = 'justify-content: flex-start';
    } elseif ($styledata[41] == 'right') {
        $justify_content = 'justify-content: flex-end';
    } else {
        $justify_content = 'justify-content: center';
    }
    if ($styledata[149] == 'left') {
        $justify_content_bootom = 'justify-content: flex-start';
    } elseif ($styledata[149] == 'right') {
        $justify_content_bootom = 'justify-content: flex-end';
    } else {
        $justify_content_bootom = 'justify-content: center';
    }
    $bodyposition = $styledata[7] == 'right' ? "order: -1" : "order: 1";
    $css .= '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-imagebody{
              ' . OxiAddonsBGImage($styledata, 407) . ';
              width: 100%;
              height: 100%;
              -moz-background-size: 100% 100%;
              -o-background-size: 100% 100%;
              background-size: 100% 100%;
            }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-imagebody:after{
            content :"";
            display : inline-block;
            padding-bottom : ' . $styledata[479] . '%;
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . '{
            width: 100%;
            max-width: ' . $styledata[5] . 'px;
            margin: 0 auto;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . ';
            background  : ' . $styledata[221] . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-fullbody{
            display: flex;
            justify-content: center;
            align-items : center;
            ' . OxiAddonsBoxShadowSanitize($styledata, 457) . ';
          }
          .oxi-addons-price-table-col-6{
              width:100%;
              float: left;
          }
          .oxi-addons-price-table-bottom{
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-postiton{
            ' . $bodyposition . ';
          }
          .oxi-addons-price-table-image-position{
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            align-content: space-between;
          }
          .oxi-addons-price-table-top{
            width: 100%;
            display: flex;
            ' . $justify_content . '
          }
          .oxi-addons-price-table-bottom{
            width: 100%;
            display: flex;
            ' . $justify_content_bootom . '
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-DM-body{
              display: table;
              width: ' . $styledata[43] . 'px;
              height: ' . $styledata[47] . 'px;
              ' . OxiAddonsBGImage($styledata, 51) . '
              border: ' . $styledata[55] . 'px ' . $styledata[56] . ' ' . $styledata[59] . ';
              border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 61) . ';
              margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 77) . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-DM-cell{
            vertical-align: middle;
            text-align: center;
            display: table-cell;
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-D{
            line-height: 1;
            font-size: ' . $styledata[93] . 'px;
            color: ' . $styledata[97] . ';
            ' . OxiAddonsFontSettings($styledata, 99) . '
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 105) . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-M{
            line-height: 1;
            font-size: ' . $styledata[121] . 'px;
            color: ' . $styledata[125] . ';
            ' . OxiAddonsFontSettings($styledata, 127) . '
              margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 133) . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-timebody{
            ' . OxiAddonsBGImage($styledata, 151) . '
            border: ' . $styledata[155] . 'px ' . $styledata[156] . ' ' . $styledata[159] . ';
            border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 177) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 193) . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-time{
            font-size: ' . $styledata[209] . 'px;
            color: ' . $styledata[213] . ';
            ' . OxiAddonsFontSettings($styledata, 215) . '
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-contentbody{
            width: 100%;
            float: left;
            background: ' . $styledata[221] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 223) . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-heading{
            font-size: ' . $styledata[239] . 'px;
            color: ' . $styledata[243] . ';
            ' . OxiAddonsFontSettings($styledata, 245) . '
              margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 251) . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-sub-heading{
            font-size: ' . $styledata[413] . 'px;
            color: ' . $styledata[417] . ';
            ' . OxiAddonsFontSettings($styledata, 419) . '
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 425) . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-full-add-sec{
            
            padding :  ' . OxiAddonsPaddingMarginSanitize($styledata, 463) . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address{
            display: flex;
            margin: 0px auto;
            align-items: center;
          }

          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-icon .oxi-icons{
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
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-text{
            width: 100%;
            float: left;
            font-size: ' . $styledata[315] . 'px;
            color: ' . $styledata[319] . ';
            ' . OxiAddonsFontSettings($styledata, 321) . '
              margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 327) . ';

          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button{
            width:100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 365) . ';
            ' . OxiAddonsFontSettings($styledata, 359) . '
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link{
            font-size: ' . $styledata[343] . 'px;
            color: ' . $styledata[347] . ';
            background: ' . $styledata[405] . ';
            border-bottom:' . $styledata[351] . 'px ' . $styledata[352] . ' ' . $styledata[355] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 381) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 441) . ';
          }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link:hover{
            color: ' . $styledata[349] . ';
            background: ' . $styledata[411] . ';
          }


          @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-price-table-wrapper-' . $oxiid . '{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 10) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-row{
              border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 26) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-fullbody{
              flex-direction: column;
            }
            
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-contentbody{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 224) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-heading{
              font-size: ' . $styledata[240] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 252) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-sub-heading{
              font-size: ' . $styledata[414] . 'px;
              margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 426) . ';
            }

            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-icon .oxi-icons{
              width: ' . $styledata[276] . 'px;
              height: ' . $styledata[280] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 300) . ';
              font-size: ' . $styledata[268] . 'px;
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-text{
              font-size: ' . $styledata[316] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 328) . ';

            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 366) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link{
              font-size: ' . $styledata[344] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 382) . ';
              border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 442) . ';
            }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-imagebody:after{
            padding-bottom : ' . $styledata[480] . '%;
          }
        }

        @media only screen and (max-width : 668px){
            .oxi-addons-price-table-wrapper-' . $oxiid . '{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-row{
              border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 27) . ';
            }

            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-fullbody{
              flex-direction: column;
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-DM-body{
                width: ' . $styledata[45] . 'px;
                height: ' . $styledata[49] . 'px;
                border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 63) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 79) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-D{
              font-size: ' . $styledata[95] . 'px;
              margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 107) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-M{
              font-size: ' . $styledata[123] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-timebody{
              border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 163) . ';
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 179) . ';
              margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 195) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-time{
              font-size: ' . $styledata[211] . 'px;
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-contentbody{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 225) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-heading{
              font-size: ' . $styledata[241] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 253) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-sub-heading{
                font-size: ' . $styledata[415] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 427) . ';
              }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-icon .oxi-icons{
              width: ' . $styledata[277] . 'px;
              height: ' . $styledata[281] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 301) . ';
              font-size: ' . $styledata[269] . 'px;
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-text{
              font-size: ' . $styledata[317] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 329) . ';

            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button{
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 367) . ';
            }
            .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link{
              font-size: ' . $styledata[345] . 'px;
              padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 383) . ';
              border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 443) . ';
            }
          .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-imagebody:after{
            padding-bottom : ' . $styledata[481] . '%;
          }
        }';
    echo OxiAddonsInlineCSSData($css);
}
