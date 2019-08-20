<?php

if (!defined('ABSPATH'))
    exit;

function oxi_image_boxes_style_3_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $linkstart = $linkends = '';
    $css = '';
    echo ' <div class="oxi-addons-container"> <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $heading = $content = $link = '';
        if($data[3] != ''){
            $heading = '
                <div class="oxi-addons-image-content-heading">
                        ' . OxiAddonsTextConvert($data[3]) . '
                </div>
            ';
        }
        if($data[5] != ''){
            $content = '
                <div class="oxi-addons-image-content-body">
                        ' . OxiAddonsTextConvert($data[5]) . '
                </div>
            ';
        }
        if($data[9] != '' && $data[7] != ''){
            $link = '
            <a href="' . OxiAddonsUrlConvert($data[9]) . '" target="' . $styledata[97] . '" class="oxi-addons-image-content-button-data">
                    ' . OxiAddonsTextConvert($data[7]) . '
            </a>
            ';
        }elseif($data[9] != '' && $data[7] == ''){
            $link = '
            <div class="oxi-addons-image-content-button-data">
                    ' . OxiAddonsTextConvert($data[7]) . '
            </div>
            ';
        } 
        
        echo '<div class="' . OxiAddonsItemRows($styledata, 1) . ' ' . OxiAddonsAdminDefine($user) . ' ">
               <div class="oxi-image-boxes-'.$oxiid.'-container  oxi-image-boxes-'.$oxiid.'-container'.$value['id'].'"   ' . OxiAddonsAnimation($styledata, 71) . '>
                <div class="oxi-image-boxes-row">
                    <div class="oxi-addons-image">
                        <div class="oxi-addons-image-image">
                            <div class="oxi-addons-image-content">
                                <div class="oxi-addons-image-content-cell">
                                '.$heading.'
                                '.$content.' 
                                    <div class="oxi-addons-image-content-button">
                                        '.$link.'
                                    </div>
                                </div>
                            </div>
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
        </div>';
            $css .= '.oxi-image-boxes-'.$oxiid.'-container'.$value['id'].' .oxi-addons-image-image {
                        background-image: url(" ' . OxiAddonsUrlConvert($data[1]). ' ");
                        -moz-background-size: cover;
                       -o-background-size: cover;
                        background-size: cover;
                        background-position: center center;
                    }';
    }
    echo '</div></div>
       ';
    
    $css .= '.oxi-image-boxes-'.$oxiid.'-container{
                width: 100%;
                max-width: '.$styledata[7].'px;
                margin: 0 auto;
            }
            .oxi-image-boxes-'.$oxiid.'-container .oxi-image-boxes-row{
                width: 100%;
                float: left;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
            }
            .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image{
                width: 100%;
                float: left;
                position: relative;
                overflow: hidden;
                border: ' . $styledata[223] . 'px ' . $styledata[224] . ';
                border-color: ' . $styledata[227] . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 229) . '; 
                ' . OxiAddonsBoxShadowSanitize($styledata, 65) . ';
            }
            .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image:after{
                display: block;
                content: "";
                padding-bottom: '.($styledata[11] / $styledata[7] * 100).'%;
            }
            .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-image{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content{
                position: absolute;
                background:  '.$styledata[31].';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';
                top: '.$styledata[49].'px;
                bottom: '.$styledata[53].'px;
                left: '.$styledata[57].'px;
                right: '.$styledata[61].'px;
                display: inline-flex;
                align-items: center;
                opacity: 0;
            }
            .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image:hover .oxi-addons-image-content{
                opacity: 1;
            }
            .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-cell{
                width: 100%;
                float: left;
                opacity: 0;
                transform:  translateY(120%);
            }
            .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image:hover .oxi-addons-image-content-cell{
                transform:  translateY(0%);
                opacity: 1;
            }
           .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-heading,
           .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-body,
           .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-button{
                width: 100%;
                float: left;
            }
           .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-heading{
                font-size:'.$styledata[75].'px;
                color: '.$styledata[79].';
                ' . OxiAddonsFontSettings($styledata, 81) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
            }
           .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-body{
                font-size:'.$styledata[103].'px;
                color: '.$styledata[107].';
                ' . OxiAddonsFontSettings($styledata, 109) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 115) . ';
            }
           .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-button{
            '; 
            $text = explode(':', $styledata[151]); 
            $css .= "text-align: $text[0] ";

           $css .= ' }
           .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-button-data{
                display: inline-block;
                font-size:'.$styledata[133].'px;
                color: '.$styledata[137].';
                background: '.$styledata[139].';
                border: '.$styledata[141].'px '.$styledata[142].';
                border-color: '.$styledata[145].';
                ' . OxiAddonsFontSettings($styledata, 147) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 169) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 185) . ';
            }
           .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-button-data:hover{
                color: '.$styledata[201].';
                background: '.$styledata[203].';
                border-color: '.$styledata[205].';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 207) . ';
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
               .oxi-image-boxes-'.$oxiid.'-container{
                    max-width: '.$styledata[8].'px;
                }
                .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 230) . ';  
                }
                .oxi-image-boxes-'.$oxiid.'-container .oxi-image-boxes-row{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';
                }
                .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image:after{
                    padding-bottom: '.($styledata[12] / $styledata[8] * 100).'%;
                }
                .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content{
                    top: '.$styledata[50].'px;
                    bottom: '.$styledata[54].'px;
                    left: '.$styledata[58].'px;
                    right: '.$styledata[62].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 34) . ';
                }
               .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-heading{
                    font-size:'.$styledata[76].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
                }
               .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-body{
                    font-size:'.$styledata[104].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 116) . ';
                }
               .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-button{
                    text-align: '.$styledata[152].';
                }
               .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-button-data{
                    font-size:'.$styledata[134].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 170) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 186) . ';
                }
            }
            @media only screen and (max-width : 668px){
                .oxi-image-boxes-'.$oxiid.'-container{
                    max-width: '.$styledata[9].'px;
                }
                .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 231) . ';  
                }
                .oxi-image-boxes-'.$oxiid.'-container .oxi-image-boxes-row{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';
                }
                .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image:after{
                    padding-bottom: '.($styledata[13] / $styledata[9] * 100).'%;
                }
                .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content{
                    top: '.$styledata[51].'px;
                    bottom: '.$styledata[55].'px;
                    left: '.$styledata[59].'px;
                    right: '.$styledata[63].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
                }
               .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-heading{
                    font-size:'.$styledata[77].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                }
               .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-body{
                    font-size:'.$styledata[105].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 117) . ';
                }
               .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-button{
                    text-align: '.$styledata[153].';
                }
               .oxi-image-boxes-'.$oxiid.'-container .oxi-addons-image-content-button-data{
                    font-size:'.$styledata[135].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 171) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . ';
                }
            }';
            echo OxiAddonsInlineCSSData($css);
}
