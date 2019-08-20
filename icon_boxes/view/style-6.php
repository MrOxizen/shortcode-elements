<?php

if (!defined('ABSPATH'))
    exit;

function oxi_icon_boxes_style_6_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $linkfirst = $linklast = '';
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        if ($data[5] != '') {
            $linkfirst = '<a href="' . OxiAddonsUrlConvert($data[5]) . '" target="' . $styledata[169] . '">';
            $linklast = '</a>';
        }
        $icon = '<div class="oxi-addons-icon-set"   ' . OxiAddonsAnimation($styledata, 115) . '>
                        ' . oxi_addons_font_awesome($data[3]) . '
                  </div>';
        $title = '<div class="oxi-addons-icon-heading">
                                         ' . OxiAddonsTextConvert($data[1]) . '
                                     </div>';
        $loopdata = '';
        $rearrange = explode(',', $styledata[171]);
        foreach ($rearrange as $arrange) {
            $loopdata .= $$arrange;
        }
        echo '<div class="' . OxiAddonsItemRows($styledata, 165) . '  ' . OxiAddonsAdminDefine($user) . '">
                   ' . $linkfirst . '
                        <div class="oxi-icon-boxes-' . $oxiid . '"  ' . OxiAddonsAnimation($styledata, 89) . '>
                             <div class="oxi-addons-icon-box">
                                 <div class="oxi-addons-icon-body">
                                   ' . $loopdata . '  
                                 </div>
                             </div>
                        </div>
                    ' . $linklast . ' ';
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
    echo ' </div>
        </div>';
    $CSS = '.oxi-icon-boxes-' . $oxiid . ' *{line-height:1}'
            . '.oxi-icon-boxes-' . $oxiid . '{
                   display: flex;
                    width: 100%;
                    max-width: ' . $styledata[3] . 'px;
                    display: -webkit-box;
                    margin: 0 auto;
                    position: relative;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 67) . ';
                }
                .oxi-icon-boxes-' . $oxiid . ' .oxi-addons-icon-box{
                    width: 100%;
                    position: relative;
                    float: left;
                    ' . OxiAddonsBGImage($styledata, 11) . '
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
                    border-style:' . $styledata[31] . '; 
                    border-color:' . $styledata[32] . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
                    ' . OxiAddonsBoxShadowSanitize($styledata, 83) . '
                }
                .oxi-icon-boxes-' . $oxiid . ':hover .oxi-addons-icon-box{
                    ' . OxiAddonsBGImage($styledata, 147) . '
                    border-style:' . $styledata[151] . '; 
                    border-color:' . $styledata[152] . ';
                    ' . OxiAddonsBoxShadowSanitize($styledata, 155) . '
                }
               .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-box:after{
                    content: "";
                    display: block;
                    padding-bottom: ' . ($styledata[7] / $styledata[3] * 100) . '%;
                }
               .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-body{
                    position: absolute;
                    width:100%;
                    left: 50%;
                    top: 50%;
                    transform: translateX(-50%) translateY(-50%);
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . ';
                }
               .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-heading,
               .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-set{
                    width: 100%;
                    position: relative;
                    text-align:center;
                }
               .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-heading{
                   color: ' . $styledata[123] . ';
                   font-size: ' . $styledata[119] . 'px;
                   ' . OxiAddonsFontSettings($styledata, 125) . '    
                   padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';  
                }
                .oxi-icon-boxes-' . $oxiid . ':hover  .oxi-addons-icon-heading{
                    color: ' . $styledata[163] . ';
                }
               .oxi-icon-boxes-' . $oxiid . '  .oxi-icons{
                   color: ' . $styledata[97] . ';
                   font-size: ' . $styledata[93] . 'px;
                   margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 99) . ';
                }
                .oxi-icon-boxes-' . $oxiid . ':hover  .oxi-icons{
                    color: ' . $styledata[161] . ';
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                   .oxi-icon-boxes-' . $oxiid . '{
                        max-width: ' . $styledata[4] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';
                    }
                    .oxi-icon-boxes-' . $oxiid . ' .oxi-addons-icon-box{
                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';
                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
                    }
                   .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-box:after{
                        padding-bottom: ' . ($styledata[8] / $styledata[4] * 100) . '%;
                    }
                   .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-body{
                         padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 52) . ';
                    }
                   .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-heading{
                        font-size: ' . $styledata[120] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 132) . ';  
                    }
                   .oxi-icon-boxes-' . $oxiid . '  .oxi-icons{
                       font-size: ' . $styledata[94] . 'px;
                       margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 100) . ';
                    }
                }
                @media only screen and (max-width : 668px){
                    .oxi-icon-boxes-' . $oxiid . '{
                        max-width: ' . $styledata[5] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
                    }
                    .oxi-icon-boxes-' . $oxiid . ' .oxi-addons-icon-box{
                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';
                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
                    }
                   .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-box:after{
                        padding-bottom: ' . ($styledata[9] / $styledata[5] * 100) . '%;
                    }
                   .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-body{
                         padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 53) . ';
                    }
                   .oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-heading{
                        font-size: ' . $styledata[121] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 133) . ';  
                    }
                   .oxi-icon-boxes-' . $oxiid . '  .oxi-icons{
                       font-size: ' . $styledata[95] . 'px;
                       margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
                    }
                }';
     echo OxiAddonsInlineCSSData($CSS);
}
