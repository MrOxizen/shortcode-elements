<?php

if (!defined('ABSPATH'))
    exit;

function oxi_icon_boxes_style_3_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    echo '<div class="oxi-addons-container">';
    echo '<div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $linklast = $linkfirst = $heading = $content = $fontawesome = '';
        $data = explode('||#||', $value['files']);
        if ($data[7] != '') {
            $linkfirst = '<a href="' . OxiAddonsUrlConvert($data[7]) . '" target="' . $styledata[203] . '">';
            $linklast = '</a>';
        }
        if ($data[1] != '') {
            $fontawesome = '<div class="oxi-addons-icon-boxes-icon" ' . OxiAddonsAnimation($styledata, 173) . '>
                                ' . oxi_addons_font_awesome($data[1]) . '
                            </div>';
        }
        if ($data[3] != '') {
            $heading = '<div class="oxi-addons-icon-boxes-heading">
                            ' . OxiAddonsTextConvert($data[3]) . '
                        </div>';
        }
        if ($data[5] != '') {
            $content = '<div class="oxi-addons-icon-boxes-content">
                          ' . OxiAddonsTextConvert($data[5]) . '
                        </div>';
        }
        echo '<div class="' . OxiAddonsItemRows($styledata, 205) . '  ' . OxiAddonsAdminDefine($user) . '">';
        echo $linkfirst;
        echo '<div class="oxi-addons-icon-boxes-' . $oxiid . '" ' . OxiAddonsAnimation($styledata, 89) . '>
                    <div class="oxi-addons-icon-boxes-' . $oxiid . '-data">
                        ' . $fontawesome . '
                        ' . $heading . '
                        ' . $content . '
                    </div>
              </div>';
        echo $linklast;
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
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    $css .= '.oxi-addons-icon-boxes-' . $oxiid . '{
                       display: flex;
                    width: 100%;
                    position: relative;
                    max-width: ' . $styledata[3] . 'px;
                    margin: 0 auto; 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 67) . ';
                }
                .oxi-addons-icon-boxes-' . $oxiid . '-data{
                    width: 100%;
                    float:left; 
                    ' . OxiAddonsBGImage($styledata, 11) . '
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
                    border-style:' . $styledata[31] . '; 
                    border-color:' . $styledata[32] . ';
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . ';
                    ' . OxiAddonsBoxShadowSanitize($styledata, 83) . '
                }
                .oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-icon{
                    width: 100%;
                    float:left;
                    text-align: ' . $styledata[99] . ';
                }
                .oxi-addons-icon-boxes-' . $oxiid . ' .oxi-icons{
                   width:' . $styledata[179] . 'px;
                   height:' . $styledata[179] . 'px;
                   line-height:' . $styledata[179] . 'px;    
                   display:inline-block;
                   text-align:center;
                   color: ' . $styledata[97] . ';
                   font-size: ' . $styledata[93] . 'px;
                   border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . ';
                   border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
                   border-style:' . $styledata[183] . '; 
                   border-color:' . $styledata[184] . ';  
                   display: inline-flex;
                   justify-content: center;
                   align-items: center;
                }
                .oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-heading{
                   width: 100%;
                   float:left;
                   color: ' . $styledata[121] . ';
                   font-size: ' . $styledata[117] . 'px;
                   ' . OxiAddonsFontSettings($styledata, 123) . '    
                   padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';   
                }
                .oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-content{
                   width: 100%;
                   float:left;
                   color: ' . $styledata[149] . ';
                   font-size: ' . $styledata[145] . 'px;
                   ' . OxiAddonsFontSettings($styledata, 151) . '    
                   padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . ';   
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                   .oxi-addons-icon-boxes-' . $oxiid . '{
                        max-width: ' . $styledata[4] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';
                    }
                    .oxi-addons-icon-boxes-' . $oxiid . '-data{ 
                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 52) . '; 
                    }
                    .oxi-addons-icon-boxes-' . $oxiid . ' .oxi-icons{
                        width:' . $styledata[180] . 'px;
                        height:' . $styledata[180] . 'px;
                        line-height:' . $styledata[180] . 'px;
                        font-size: ' . $styledata[94] . 'px;
                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 188) . ';
                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
                    }
                    .oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-heading{
                      
                       font-size: ' . $styledata[118] . 'px;
                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';   
                    }
                    .oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-content{
                       font-size: ' . $styledata[146] . 'px;   
                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 158) . ';   
                    } 
                }
                @media only screen and (max-width : 668px){
                    .oxi-addons-icon-boxes-' . $oxiid . '{
                        max-width: ' . $styledata[5] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
                    }
                    .oxi-addons-icon-boxes-' . $oxiid . '-data{ 
                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 53) . '; 
                    }
                    .oxi-addons-icon-boxes-' . $oxiid . ' .oxi-icons{
                        width:' . $styledata[181] . 'px;
                        height:' . $styledata[181] . 'px;
                        line-height:' . $styledata[181] . 'px;
                        font-size: ' . $styledata[95] . 'px;
                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 189) . ';
                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
                }
                    .oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-heading{
                      
                       font-size: ' . $styledata[119] . 'px;
                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';   
                    }
                    .oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-content{
                       font-size: ' . $styledata[147] . 'px;   
                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 159) . ';   
                    } 
                }
                ';

    $js = 'setTimeout(function () {oxiequalHeight(jQuery(".oxi-addons-icon-boxes-' . $oxiid . '-data"));}, 500);';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($js, 'js', 'oxi-addons-animation');
}
