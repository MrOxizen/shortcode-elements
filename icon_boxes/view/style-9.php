<?php

if (!defined('ABSPATH'))
    exit;

function oxi_icon_boxes_style_9_shortcode($style = FALSE, $listdata = FALSE, $user = 'user') {

    $oxiid = $style['id'];
    $stylefiles = explode('||#||', $style['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    
//    echo '<pre>';
//        print_r($styledata);
//        print_r($listitemdata);
//        print_r($oxiid);
//        print_r($files);
//    echo '</pre>';
    
    echo '<div class="oxi-addons-container">';
    echo '<div class="oxi-addons-row">';
    
    foreach ($listdata as $value) {
        $listitemdata = explode('||#||', $value['files']);
        $icon_area = $heading_area = $desc_area = '';
        
//      echo '<pre>';
//      print_r($listitemdata);
//      print_r($oxiid);
//      echo '</pre>';
        
        if ($listitemdata[2] != '') {
            $icon_area = '<div class="oxi-addons-icon">
                <div class="oxi-addons-fuad">
                            <div class="oxi-addons-icon-inner"  ' . OxiAddonsAnimation($styledata, 125) . ' >
                                ' . oxi_addons_font_awesome($listitemdata[2]) . '
                            </div>
                </div>
                          </div>';
        }
        if ($listitemdata[4] != '') {
            $heading_area = '<div class="oxi-addons-heading">
                            ' . OxiAddonsTextConvert($listitemdata[4]) . '
                          </div>';
        }
        if ($listitemdata[6] != '') {
            $desc_area = '<div class="oxi-addons-desc">
                            ' . OxiAddonsTextConvert($listitemdata[6]) . '
                          </div>';
        }
      
    echo '<div class="oxi-box-wrap-' . $oxiid . '  ' . OxiAddonsAdminDefine($user) . ' ' . OxiAddonsItemRows($styledata, 3) . '"   ' . OxiAddonsAnimation($styledata, 52) . '  >
           <div class="oxi-addons-icon-main-outer">
            <div class="oxi-addons-icon-main oxi-addons-image'.$value['id'].' ">
                ' . $icon_area . '
                ' . $heading_area . '
                ' . $desc_area . '
            </div>';
            if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                        <div class="oxi-addons-admin-absulate-edit">
                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditicon_boxesdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                            </form>
                        </div>
                        <div class="oxi-addons-admin-absulate-delete">
                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteicon_boxesdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                            </form>
                        </div>
                    </div>';
        }
       echo' </div>';
       echo' </div>';
       $css .= '.oxi-box-wrap-' . $oxiid . '  .oxi-addons-image'.$value['id'].'{
                        background: url("' . OxiAddonsUrlConvert($listitemdata[1]) . '");
                         background-size: cover;
                  }';
    }
     echo'</div>';
    echo'</div>';
    
    
    $css .= '
        
        .oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main-outer{
                width: 100%;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';
        }
        .oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main {
                ' . OxiAddonsBoxShadowSanitize($styledata, 46) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 188) . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 204) . ';
                border-style:' . $styledata[220] . '; 
                border-color:' . $styledata[221] . ';
                max-width: ' . $styledata[224] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
                background: ' . $styledata[242] . ';
                margin: auto;
        }
        .oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main:hover {
                background: ' . $styledata[244] . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 236) . ';
        }
        .oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon {
                height: auto;
                width: 100%;
                text-align: ' . $styledata[130] . ';
        }
        .oxi-box-wrap-' . $oxiid . ' .oxi-addons-fuad{
        }
        .oxi-box-wrap-' . $oxiid . ' i {
                font-size: ' . $styledata[57] . 'px;
                color: ' . $styledata[61] . ';
                height: ' . $styledata[85] . 'px;
                width: ' . $styledata[81] . 'px;
                border-style:' . $styledata[105] . '; 
                border-color:' . $styledata[106] . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 109) . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';
                display: inline-flex;
                justify-content: center;
                align-items: center;
        }
        .oxi-box-wrap-' . $oxiid . ' .oxi-addons-heading {
                color: ' . $styledata[132] . ';
                font-size: ' . $styledata[134] . 'px;
                ' . OxiAddonsFontSettings($styledata, 138) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 144) . ';
        }
        .oxi-box-wrap-' . $oxiid . ' .oxi-addons-desc {
                color: ' . $styledata[160] . ';
                font-size: ' . $styledata[162] . 'px;
                ' . OxiAddonsFontSettings($styledata, 166) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 172) . ';
        }
        

        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main {
                max-width: ' . $styledata[225] . 'px;
            }
            .oxi-box-wrap-' . $oxiid . ' i {
                font-size: ' . $styledata[58] . 'px;
                height: ' . $styledata[86] . 'px;
                width: ' . $styledata[82] . 'px;
            }
            .oxi-box-wrap-' . $oxiid . ' .oxi-addons-heading {
                font-size: ' . $styledata[135] . 'px;
            }
            .oxi-box-wrap-' . $oxiid . ' .oxi-addons-desc {
                font-size: ' . $styledata[163] . 'px;
            }
        }

        @media only screen and (max-width : 668px){
            .oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main {
                max-width: ' . $styledata[226] . 'px;
            }
            .oxi-box-wrap-' . $oxiid . ' i {
                font-size: ' . $styledata[59] . 'px;
                height: ' . $styledata[87] . 'px;
                width: ' . $styledata[83] . 'px;
            }
            .oxi-box-wrap-' . $oxiid . ' .oxi-addons-heading {
                font-size: ' . $styledata[136] . 'px;
            }
            .oxi-box-wrap-' . $oxiid . ' .oxi-addons-desc {
                font-size: ' . $styledata[164] . 'px;
            }
        }

';
    echo OxiAddonsInlineCSSData($css);
}
