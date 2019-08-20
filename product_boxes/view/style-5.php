<?php

if (!defined('ABSPATH'))
    exit;

function oxi_product_boxes_style_5_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    echo '<div class="oxi-addons-container">
          <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $image = $price = $heading = $rating = $button = $link = '';


        if ($data[1] != '') {
            $image .= '
                <div class="oxi-product5-image">
                     <a href="' . OxiAddonsUrlConvert($data[9]) . '" target="' . $styledata[196] . '">
                        <div class="oxi-product5-image-image"></div>
                        <div class="oxi-product5-button"' . OxiAddonsAnimation($styledata, 287) . '>
                          <div class="oxi-product5-button-button">' . oxi_addons_font_awesome($data[13]) . '  ' . OxiAddonsTextConvert($data[7]) . '</div>
                        </div>
                      </a>
                    </div>
            ';
        }
        if ($data[3] != '') {
            $heading = ' 
                  <div class="oxi-product5-title">' . OxiAddonsTextConvert($data[3]) . '</div>  
            ';
        }
        if ($data[11] != '') {
            $rating = ' 
                   <div class="oxi-product5-rating">
                         ' . OxiAddonsPublicRate($data[11]) . '
                      </div>
            ';
        }
        if ($data[5] != '') {
            $price = '
                <div class="oxi-product5-price">' . OxiAddonsTextConvert($data[5]) . '</div>
            ';
        }


        echo '<div class="oxi-addons-product-' . $oxiid . ' ' . OxiAddonsItemRows($styledata, 3) . ' oxi-events-' . $value['styleid'] . '-' . $value['id'] . ' ' . OxiAddonsAdminDefine($user) . '">';
        echo ' <div class="oxi-product5-' . $oxiid . '">
                <div class="oxi-product5-main">
                  <div class="oxi-product5-body" ' . OxiAddonsAnimation($styledata, 86) . '>
                    ' . $image . '
                    <div class="oxi-product5-content">
                      ' . $heading . '
                      ' . $rating . '
                      ' . $price . '
                     </div>
                  </div>
                </div>
              </div>
        ';
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
        $css .= '.oxi-events-' . $value['styleid'] . '-' . $value['id'] . ' .oxi-product5-image-image{
                  background: url("' . OxiAddonsUrlConvert($data[1]) . '");
                  background-size: cover;
                  }';
    }
    echo '</div></div>';


    $css .= '
        .oxi-addons-container  .oxi-product5-' . $oxiid . '  * {
           transition : none;
        }
      .oxi-product5-' . $oxiid . ' {
          width: 100%;
          margin: 0 auto;
          overflow: auto;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .oxi-product5-' . $oxiid . ' .oxi-product5-main {
          width: 100%;
          float: left;
          max-width: ' . $styledata[7] . 'px;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 64) . ';
        }

        .oxi-product5-' . $oxiid . ' .oxi-product5-body {
          width: 100%;
          float: left;
          overflow: hidden;
          background: ' . $styledata[11] . ';
          border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 32) . ';
          border-style: ' . $styledata[13] . ';
          border-color: ' . $styledata[14] . ';
          border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';
          ' . OxiAddonsBoxShadowSanitize($styledata, 80) . '
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 48) . ';
        }

        .oxi-product5-' . $oxiid . ' .oxi-product5-image {
          position: relative;
          width: 100%;
          float: left;
          overflow: hidden;
        }

        .oxi-product5-' . $oxiid . ' .oxi-product5-image::after {
          display: block;
          content: "";
          padding-bottom: ' . $styledata[90] . '%;
        }

        .oxi-product5-' . $oxiid . ' .oxi-product5-image-image {
          width: 100%;
          height: 100%;
          position: absolute;
          transform: scale(1);
          transition: 0.5s;
        }
        .oxi-product5-' . $oxiid . ' .oxi-product5-image:hover .oxi-product5-image-image {
          transform: scale(' . $styledata[94] . ');
        }
        .oxi-product5-' . $oxiid . ' .oxi-product5-image:hover .oxi-product5-button-button {
          opacity: 1;
          margin-top: 0px;
        }

        .oxi-product5-' . $oxiid . ' .oxi-product5-button {
          width: 100%;
          height: 100%;
          position: absolute;
          display: flex;
          justify-content:  ' . $styledata[198] . ';
          align-items:  ' . $styledata[303] . ';
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 216) . ';
        }

        .oxi-product5-' . $oxiid . ' .oxi-product5-button-button {
          display: inline-block;
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 200) . ';
          font-size: ' . $styledata[232] . 'px;
          ' . OxiAddonsFontSettings($styledata, 240) . '
          color: ' . $styledata[236] . ';
          background: ' . $styledata[238] . ';
          border-style: ' . $styledata[246] . ';
          border-color: ' . $styledata[247] . ';
          border-width:  ' . OxiAddonsPaddingMarginSanitize($styledata, 249) . ';
          border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 265) . ';
          ' . OxiAddonsBoxShadowSanitize($styledata, 281) . '
          margin-top: -50px;
          opacity: 0;
          transition: 0.3s;
        }
        .oxi-product5-' . $oxiid . ' .oxi-product5-button-button:hover{
          color: ' . $styledata[291] . ';
          background: ' . $styledata[293] . ';
          border-color: ' . $styledata[295] . ';
          ' . OxiAddonsBoxShadowSanitize($styledata, 281) . '
          transition: 0.3s;
        }


        .oxi-product5-' . $oxiid . ' .oxi-product5-content {
          width: 100%;
          float: left;
          color: black;
          background: ' . $styledata[98] . ';
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 100) . ';
        }
        .oxi-product5-' . $oxiid . ' .oxi-product5-title {
          width: 100%;
          float: left;
          font-size: ' . $styledata[116] . 'px;
          color: ' . $styledata[120] . ';
            ' . OxiAddonsFontSettings($styledata, 122) . '
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 128) . ';
        }

        .oxi-product5-' . $oxiid . ' .oxi-product5-rating {
          width: 100%;
          float: left;
         font-size: ' . $styledata[144] . 'px;
          color: ' . $styledata[148] . ';
        text-align: ' . $styledata[150] . ';
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 152) . ';
        }


        .oxi-product5-' . $oxiid . ' .oxi-product5-price {
          width: 100%;
          float: left;
            font-size: ' . $styledata[168] . 'px;
          color: ' . $styledata[172] . ';
            ' . OxiAddonsFontSettings($styledata, 174) . '
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 180) . ';
       }
    @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-product5-' . $oxiid . ' .oxi-product5-main {
               max-width: ' . $styledata[8] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';
              }

              .oxi-product5-' . $oxiid . ' .oxi-product5-body {
                
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . ';
              }

              .oxi-product5-' . $oxiid . ' .oxi-product5-image::after {
               padding-bottom: ' . $styledata[91] . '%;
              }

              .oxi-product5-' . $oxiid . ' .oxi-product5-image:hover .oxi-product5-image-image {
                transform: scale(' . $styledata[95] . ');
              }
              .oxi-product5-' . $oxiid . ' .oxi-product5-button {
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 217) . ';
              }

              .oxi-product5-' . $oxiid . ' .oxi-product5-button-button {
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 201) . ';
                font-size: ' . $styledata[233] . 'px;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 250) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 266) . ';
               }
             .oxi-product5-' . $oxiid . ' .oxi-product5-content {
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
              }
              .oxi-product5-' . $oxiid . ' .oxi-product5-title {
                font-size: ' . $styledata[117] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
              }

              .oxi-product5-' . $oxiid . ' .oxi-product5-rating {
                font-size: ' . $styledata[145] . 'px;
                 padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
              }


              .oxi-product5-' . $oxiid . ' .oxi-product5-price {
                 font-size: ' . $styledata[169] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 181) . ';
             }
     }
    @media only screen and (max-width : 668px){
        .oxi-product5-' . $oxiid . ' .oxi-product5-main {
               max-width: ' . $styledata[9] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 66) . ';
              }

              .oxi-product5-' . $oxiid . ' .oxi-product5-body {
                
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 34) . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 18) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . ';
              }

              .oxi-product5-' . $oxiid . ' .oxi-product5-image::after {
               padding-bottom: ' . $styledata[92] . '%;
              }

              .oxi-product5-' . $oxiid . ' .oxi-product5-image:hover .oxi-product5-image-image {
                transform: scale(' . $styledata[96] . ');
              }
              .oxi-product5-' . $oxiid . ' .oxi-product5-button {
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 218) . ';
              }

              .oxi-product5-' . $oxiid . ' .oxi-product5-button-button {
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 202) . ';
                font-size: ' . $styledata[234] . 'px;
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 251) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 267) . ';
               }
             .oxi-product5-' . $oxiid . ' .oxi-product5-content {
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
              }
              .oxi-product5-' . $oxiid . ' .oxi-product5-title {
                font-size: ' . $styledata[118] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';
              }

              .oxi-product5-' . $oxiid . ' .oxi-product5-rating {
                font-size: ' . $styledata[146] . 'px;
                 padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 154) . ';
              }


              .oxi-product5-' . $oxiid . ' .oxi-product5-price {
                 font-size: ' . $styledata[170] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 182) . ';
             }
    }
        ';
    echo OxiAddonsInlineCSSData($css);
}
