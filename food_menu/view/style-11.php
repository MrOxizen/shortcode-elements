                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <?php
if (!defined('ABSPATH')) {
    exit;
}

function oxi_food_menu_style_11_shortcode($style = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $style['id'];
//    echo '<pre>';
//    echo $oxiid;
//    echo '</pre>';
    $stylefiles = explode('||#||', $style['css']);
    $styledata = explode('|', $stylefiles[0]);

    $css = '';
    echo '

    <div class="oxi-addons-container">
                <div class="oxi-addons-row">';

      foreach ($listdata as $value) {
          $listfile = explode('||#||', $value['files']);
          
          if ($listfile[3] != '') {
            $heading = '
                        <div class="oxi-addons-box-food-heading">
                            '.OxiAddonsTextConvert($listfile[3]).'
                        </div>
                     ';
            }
            if ($listfile[5] != '') {
            $descriptions = '
                        <div class="oxi-addons-box-food-desc">
                            '.OxiAddonsTextConvert($listfile[5]).'
                        </div>
                     ';
            }
            if ($listfile[1] != '') {
            $img = '
                        <div class="oxi-addons-box-food-img-area-outer">
                            <div class="oxi-addons-box-food-img-area">
                                    
                            </div>
                        </div>
                     ';
            }
          
          
       
        echo '  <div class="oxi-box-wrap-'.$oxiid.'   oxi-addons-bg-img-'.$value['styleid'].'-'.$value['id'].'    '.OxiAddonsItemRows($styledata, 3).'      '.OxiAddonsAdminDefine($user).'">
                        <div class="oxi-addons-food-box-outer"   '.OxiAddonsAnimation($styledata, 199).'>
                            <div class="oxi-addons-box-main">
                                <div class="oxi-addons-box-food-content-area">
                                    ' . $heading . '
                                    ' . $descriptions . '
                                </div>
                                    ' . $img . '
                            </div>
                        </div>
                   ';

        if ($user == 'admin') {
           echo '  <div class="oxi-addons-admin-absulote">
                        <div class="oxi-addons-admin-absulate-edit">
                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditfood_menudata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                            </form>
                        </div>
                        <div class="oxi-addons-admin-absulate-delete">
                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletefood_menudata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                            </form>
                        </div>
                    </div>';
        }
        echo '</div>';
        
        $css .= ' .oxi-addons-bg-img-'.$value['styleid'].'-'.$value['id'].'   .oxi-addons-box-food-img-area{
                        background: url("'.OxiAddonsUrlConvert($listfile[1]).'");
                  }';
        
    }
    echo '</div>
            </div>
            ';

    $css .= '
.oxi-box-wrap-'.$oxiid.' .oxi-addons-food-box-outer{
            padding: ' . (OxiAddonsPaddingMarginSanitize($styledata, 66)) . ' ;
}
.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-main {
            max-width: ' . $styledata[7] . 'px;
            ' . OxiAddonsBGImage($styledata, 203) . '
            border-width: ' . (OxiAddonsPaddingMarginSanitize($styledata, 15)) . ' ;
            border-radius: ' . (OxiAddonsPaddingMarginSanitize($styledata, 31)) . ' ;
            border-style:' . $styledata[47] . ';
            border-color:' . $styledata[48] . ';
            padding: ' . (OxiAddonsPaddingMarginSanitize($styledata, 50)) . ' ;
            ' . OxiAddonsBoxShadowSanitize($styledata, 82) . ';
            margin: 0 auto;
            height: auto;
}
.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-heading {
            ' . OxiAddonsFontSettings($styledata, 94) . '
            padding: ' . (OxiAddonsPaddingMarginSanitize($styledata, 100)) . ' ;
            color:' . $styledata[92] . ';
            font-size:' . $styledata[88] . 'px; 
}
.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-desc {
            ' . OxiAddonsFontSettings($styledata, 122) . '
            padding: ' . (OxiAddonsPaddingMarginSanitize($styledata, 128)) . ' ;
            color:' . $styledata[120] . ';
            font-size:' . $styledata[116] . 'px; 
}
.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-img-area-outer{
            padding: ' . (OxiAddonsPaddingMarginSanitize($styledata, 144)) . ' ;
            height: auto;
            width: 100%;
}
.oxi-box-wrap-'.$oxiid.'  .oxi-addons-box-food-img-area{
            height: ' . $styledata[195] . 'px;
            border-width: ' . (OxiAddonsPaddingMarginSanitize($styledata, 160)) . ' ;
            border-radius: ' . (OxiAddonsPaddingMarginSanitize($styledata, 176)) . ' ;
            border-style:' . $styledata[192] . ';
            background-size: cover;
            background-position: center;
            width: 100%;
}

@media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-box-wrap-'.$oxiid.' .oxi-addons-box-main {
                        max-width: ' . $styledata[8] . 'px;
            }
            .oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-heading {
                        font-size:' . $styledata[89] . 'px; 
            }
            .oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-desc {
                        font-size:' . $styledata[117] . 'px; 
            }
            .oxi-box-wrap-'.$oxiid.'  .oxi-addons-box-food-img-area{
                        height: ' . $styledata[196] . 'px;
            }
}

@media only screen and (max-width : 668px){
            .oxi-box-wrap-'.$oxiid.' .oxi-addons-box-main {
                        max-width: ' . $styledata[9] . 'px;
            }
            .oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-heading {
                        font-size:' . $styledata[90] . 'px; 
            }
            .oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-desc {
                        font-size:' . $styledata[118] . 'px; 
            }
            .oxi-box-wrap-'.$oxiid.'  .oxi-addons-box-food-img-area{
                        height: ' . $styledata[197] . 'px;
            }
}

            ';
   
    echo OxiAddonsInlineCSSData($css);

}
