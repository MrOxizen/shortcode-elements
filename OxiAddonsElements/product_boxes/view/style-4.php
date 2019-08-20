<?php

if (!defined('ABSPATH'))
    exit;

function oxi_product_boxes_style_4_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    echo '<div class="oxi-addons-container">
          <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $image = $price = $heading = $rating = $button = '';
        if ($data[1] != '') {
            $image = '
                <div class="oxi-product4-image">
                      <div class="oxi-product4-image-image"></div>
                    </div>
            ';
        }
        if ($data[3] != '') {
            $heading = ' 
                    <div class="oxi-product4-title">' . OxiAddonsTextConvert($data[3]) . '</div>
            ';
        }
        if ($data[11] != '') {
            $rating = ' 
                    <div class="oxi-product4-rating">
                        ' . OxiAddonsPublicRate($data[11]) . '
                      </div>
            ';
        }
        if ($data[5] != '') {
            $price = '
                <div class="oxi-product4-price">' . OxiAddonsTextConvert($data[5]) . '</div>
            ';
        }
        if ($data[9] != '' && $data[7] != '') {
            $button = '
               <div class="oxi-product4-button" ' . OxiAddonsAnimation($styledata, 207) . '>
                      <a href="' . OxiAddonsUrlConvert($data[9]) . '" target = "'.$styledata[117].'"class="oxi-product4-button-button">' . OxiAddonsTextConvert($data[7]) . '</a>
                    </div>
            ';
        } elseif ($data[9] == '' && $data[7] != '') {
            $button = '
               <div class="oxi-product4-button" ' . OxiAddonsAnimation($styledata, 207) . '>
                      <a href="#" target = "'.$styledata[117].'"class="oxi-product4-button-button">' . OxiAddonsTextConvert($data[7]) . '</a>
                    </div>
        ';
        }

        echo '<div class="oxi-addons-product-' . $oxiid . ' ' . OxiAddonsItemRows($styledata, 3) . ' oxi-events-'.$value['styleid'].'-'.$value['id'].' ' . OxiAddonsAdminDefine($user) . '">';
        echo '<div class="oxi-product4-' . $oxiid . '">
                <div class="oxi-product4-main">
                  <div class="oxi-product4-body" ' . OxiAddonsAnimation($styledata, 57) . '>
                    '.$image.'
                    '.$heading.'
                    '.$rating.'
                    '.$price.'
                    '.$button.'
                  </div>
                </div>
              </div>';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                        <div class="oxi-addons-admin-absulate-edit">
                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditproduct_boxesdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                            </form>
                        </div>
                        <div class="oxi-addons-admin-absulate-delete">
                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteproduct_boxesdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                            </form>
                        </div>
                    </div>';
        }

        echo '</div>';
        $css .='.oxi-events-'.$value['styleid'].'-'.$value['id'].' .oxi-product4-image-image{
                  background: url("' . OxiAddonsUrlConvert($data[1]) . '");
                  background-size: cover;
                  }';
    }
    echo '</div></div>';


    $css .= '
    .oxi-product4-' . $oxiid . ' {
        width: 100%;
        margin: 0 auto;
        overflow: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
      }

      .oxi-product4-' . $oxiid . ' .oxi-product4-main {
        width: 100%;
        float: left;
        max-width: '.$styledata[7].'px;
         padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
      }

      .oxi-product4-' . $oxiid . ' .oxi-product4-body {
        width: 100%;
        float: left;
        overflow: hidden;
        background: '.$styledata[11].';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 211) . ';
        border-width: ' . $styledata[13] . 'px;
        border-style: ' . $styledata[14] . ';
        border-color: ' . $styledata[17] . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 51) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 19) . ';
                
      }

      .oxi-product4-' . $oxiid . ' .oxi-product4-image {
        position: relative;
        width: 100%;
        float: left;
      }

      .oxi-product4-' . $oxiid . ' .oxi-product4-image::after {
        display: block;
        content: "";
        padding-bottom: '.$styledata[255].'%;
      }

      .oxi-product4-' . $oxiid . ' .oxi-product4-image-image {
        width: 100%;
        height: 100%;
        position: absolute;
       
      }

      .oxi-product4-' . $oxiid . ' .oxi-product4-title {
        width: 100%;
        float: left;
        font-size: '.$styledata[61].'px;
        color: '.$styledata[65].';
         ' . OxiAddonsFontSettings($styledata, 67) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
        }
      .oxi-product4-' . $oxiid . ' .oxi-product4-rating {
        width: 100%;
        float: left;
        font-size: '.$styledata[227].'px;
        color: '.$styledata[231].';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 239) . ';
        text-align: '.$styledata[233].';
        }

      .oxi-product4-' . $oxiid . ' .oxi-product4-price {
        width: 100%;
        float: left;
       font-size: '.$styledata[89].'px;
        color: '.$styledata[93].';
         ' . OxiAddonsFontSettings($styledata, 95) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
        }

      .oxi-product4-' . $oxiid . ' .oxi-product4-button {
        width: 100%;
        float: left;
        text-align: '.$styledata[151].';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';
      }

      .oxi-product4-' . $oxiid . ' .oxi-product4-button-button {
        background: '.$styledata[159].';
        font-size: '.$styledata[153].'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 119) . ';
        display: inline-block;
        color: '.$styledata[157].';
           ' . OxiAddonsFontSettings($styledata, 161) . '
        border-width: ' . $styledata[167] . 'px;
        border-style: ' . $styledata[168] . ';
        border-color: ' . $styledata[171] . ';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 173) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 189) . '
        text-decoration: none;
      }
      .oxi-product4-' . $oxiid . ' .oxi-product4-button-button:hover{
        color: '.$styledata[195].';
        background: '.$styledata[197].';
        border-color: ' . $styledata[199] . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 201) . '
         text-decoration: none;
      }
    @media only screen and (min-width : 669px) and (max-width : 993px){
           .oxi-product4-' . $oxiid . ' .oxi-product4-main {
               
                max-width: '.$styledata[8].'px;
                 padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
              }

              .oxi-product4-' . $oxiid . ' .oxi-product4-body {
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 212) . ';
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 20) . ';
              }
            .oxi-product4-' . $oxiid . ' .oxi-product4-title {
               
                font-size: '.$styledata[62].'px;
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 74) . ';
                }
              .oxi-product4-' . $oxiid . ' .oxi-product4-rating {
                font-size: '.$styledata[228].'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 240) . ';
                }

              .oxi-product4-' . $oxiid . ' .oxi-product4-price {
                font-size: '.$styledata[90].'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
                }

              .oxi-product4-' . $oxiid . ' .oxi-product4-button {
                 padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';
              }

              .oxi-product4-' . $oxiid . ' .oxi-product4-button-button {
                font-size: '.$styledata[154].'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 120) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 174) . ';
               }
     }
    @media only screen and (max-width : 668px){
        .oxi-product4-' . $oxiid . ' .oxi-product4-main {
               
                max-width: '.$styledata[9].'px;
                 padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
              }

              .oxi-product4-' . $oxiid . ' .oxi-product4-body {
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 213) . ';
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . ';
              }
            .oxi-product4-' . $oxiid . ' .oxi-product4-title {
               
                font-size: '.$styledata[63].'px;
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 75) . ';
                }
              .oxi-product4-' . $oxiid . ' .oxi-product4-rating {
                font-size: '.$styledata[229].'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 241) . ';
                }

              .oxi-product4-' . $oxiid . ' .oxi-product4-price {
                font-size: '.$styledata[91].'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
                }

              .oxi-product4-' . $oxiid . ' .oxi-product4-button {
                 padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 136) . ';
              }

              .oxi-product4-' . $oxiid . ' .oxi-product4-button-button {
                font-size: '.$styledata[155].'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 121) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 175) . ';
               }
    }
        ';
    echo OxiAddonsInlineCSSData($css);
}
