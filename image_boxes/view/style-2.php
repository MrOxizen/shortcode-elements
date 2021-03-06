<?php

if (!defined('ABSPATH'))
    exit;

function oxi_image_boxes_style_2_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $linkstart = $linkends = '';
    $css = '';
    echo ' <div class="oxi-addons-container">  <div class="oxi-addons-row">';

    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $heading = $content = $link = '';
        if ($data[3] != '') {
            $heading = '
                <div class="oxi-addons-image-content-heading">
                        ' . OxiAddonsTextConvert($data[3]) . '
                </div>
            ';
        }
        if ($data[5] != '') {
            $content = '
                <div class="oxi-addons-image-content-body">
                        ' . OxiAddonsTextConvert($data[5]) . '
                </div>
            ';
        }
        if ($data[9] != '' && $data[7] != '') {
            $link = '
            <a href="' . OxiAddonsUrlConvert($data[9]) . '" target="' . $styledata[97] . '" class="oxi-addons-image-content-button-data">
                    ' . OxiAddonsTextConvert($data[7]) . '
            </a>
            ';
        } elseif ($data[9] == '' && $data[7] == '') {
            $link = '
            <div class="oxi-addons-image-content-button-data">
                    ' . OxiAddonsTextConvert($data[7]) . '
            </div>
            ';
        }
        echo '<div class="' . OxiAddonsItemRows($styledata, 1) . ' ' . OxiAddonsAdminDefine($user) . ' ">
            <div class="oxi-addons-image-box-' . $oxiid . ' oxi-addons-image-box-' . $oxiid . '-' . $value['id'] . '" ' . OxiAddonsAnimation($styledata, 37) . '>
                <div class="oxi-addons-image-image">
                    <div class="oxi-addons-image-content">
                      ' . $heading . '
                      ' . $content . ' 
                        <div class="oxi-addons-image-content-button">
                            ' . $link . '
                        </div>
                    </div>
                </div>';
        if ($user == 'admin') {
            echo '<div class="oxi-addons-admin-absulote">
                        <div class="oxi-addons-admin-absulate-edit">
                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditimage_boxesdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                            </form>
                        </div>
                        <div class="oxi-addons-admin-absulate-delete">
                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteimage_boxesdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                            </form>
                        </div>
                  </div>';
        }
        echo '</div>
        ';
        $css .= '.oxi-addons-image-box-' . $oxiid . '-' . $value['id'] . ' .oxi-addons-image-image{
                    background-image: url(" ' . OxiAddonsUrlConvert($data[1]) . ' ");
                    -moz-background-size: 100% 100%;
                    -o-background-size: 100% 100%;
                    background-size: 100% 100%;; 
                }';
        echo '</div>';
    }

    echo '</div>
    </div>';
    $css .= '.oxi-addons-image-box-' . $oxiid . '{
            width: 100%;
            max-width: ' . $styledata[5] . 'px;
            margin: 0 auto;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 221) . ';
        }
        .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image{
            position: relative;
            width: 100%;
            float: left;
            overflow: hidden; 
            border: ' . $styledata[239] . 'px ' . $styledata[240] . ';
            border-color: ' . $styledata[243] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 245) . '; 
            ' . OxiAddonsBoxShadowSanitize($styledata, 31) . ' 
        }
        .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image::after{
            content: "";
            width: 100%;
            padding-bottom: ' . ($styledata[9] / $styledata[5] * 100) . '%;
            display: block;
        }
        .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content{
            position: absolute;
            left: 0px;
            right: 0px;
            bottom: 0px;
            background:  ' . $styledata[13] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 189) . '; 
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 205) . ';
        }
        .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-heading{
            font-size:' . $styledata[41] . 'px;
            color: ' . $styledata[45] . ';
            ' . OxiAddonsFontSettings($styledata, 47) . ';
            line-height:1;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 53) . ';
        }
        .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-body{
            font-size:' . $styledata[69] . 'px;
            color: ' . $styledata[73] . ';
            ' . OxiAddonsFontSettings($styledata, 75) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 81) . ';
        }
        .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button{
        ';
        $text = explode(':', $styledata[117]); 
        $css .= "text-align: $text[0] ";

        $css .= '    }
        .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data{
            display: inline-block;
            font-size:' . $styledata[99] . 'px;
            color: ' . $styledata[103] . ';
            background: ' . $styledata[105] . ';
            border: ' . $styledata[107] . 'px ' . $styledata[108] . ';
            border-color: ' . $styledata[111] . ';
            ' . OxiAddonsFontSettings($styledata, 113) . ';
            line-height:1;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 119) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 151) . ';
        }
        .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data:hover{ 
            color: ' . $styledata[167] . ';
            background: ' . $styledata[169] . ';
            border-color: ' . $styledata[171] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 173) . ';
        }
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-image-box-' . $oxiid . '{
                max-width: ' . $styledata[6] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 222) . ';
            } 
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image{ 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 246) . ';  
            }
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image::after{
                padding-bottom: ' . ($styledata[10] / $styledata[6] * 100) . '%;
            }
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content{
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 190) . ';
            }
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-heading{
                font-size:' . $styledata[42] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 54) . ';
            }
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-body{
                font-size:' . $styledata[70] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 82) . ';
            }
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data{
                font-size:' . $styledata[100] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 136) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 152) . ';
            }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-image-box-' . $oxiid . '{
                max-width: ' . $styledata[7] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 223) . ';
            } 
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image{ 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 247) . ';  
            }
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image::after{
                padding-bottom: ' . ($styledata[11] / $styledata[7] * 100) . '%;
            }
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content{
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 191) . ';
            }
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-heading{
                font-size:' . $styledata[43] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 55) . ';
            }
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-body{
                font-size:' . $styledata[71] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
            }
            .oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data{
                font-size:' . $styledata[101] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 137) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
            }
        }';
         echo OxiAddonsInlineCSSData($css);
}
