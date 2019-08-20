<?php

if (!defined('ABSPATH'))
    exit;

function oxi_social_icons_style_5_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    echo '<div class="oxi-addons-container">
                <div class="oxi-addons-row oxi-addons-center">';
    foreach ($listdata as $value) {
        $listfiles = explode('||#||', $value['files']);

        echo '<div class = "oxi-addons-social-' . $oxiid . '  ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 29) . '>
                        <a href="' . OxiAddonsUrlConvert($listfiles[3]) . '" target="' . $styledata[45] . '" class = "oxi-icon-' . $oxiid . ' oxi-icon-item-' . $value['id'] . '">' . oxi_addons_font_awesome($listfiles[1]) . '</a>
                    ';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                            <div class="oxi-addons-admin-absulate-edit">
                                <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditsocial_iconsdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                </form>
                            </div>
                            <div class="oxi-addons-admin-absulate-delete">
                                <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletesocial_iconsdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                </form>
                            </div>
                        </div>';
        }
        echo '</div>';

        if ($styledata[37] == '') {
            $css .= '.oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '.oxi-icon-item-' . $value['id'] . ' .oxi-icons{   color:' . $listfiles[5] . ';}';
        }
        if ($styledata[41] == '') {
            $css .= '.oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '.oxi-icon-item-' . $value['id'] . ':hover .oxi-icons{   color:' . $listfiles[7] . ';}';
        }
    }
    echo '</div></div>';
    $css .= '.oxi-addons-social-' . $oxiid . '{
                    position:relative;
                    margin:0 auto;
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
                    display: inline-block;
                }
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '{
                    width:' . $styledata[7] . 'px;
                    height:' . $styledata[7] . 'px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ' .oxi-icons{
                    font-size:' . $styledata[33] . 'px;
                    color:' . $styledata[39] . ';
                }
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ':hover .oxi-icons{
                    color:' . $styledata[43] . ';
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                    .oxi-addons-social-' . $oxiid . '{
                         padding:' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
                    }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '{
                        width:' . $styledata[8] . 'px;
                        height:' . $styledata[8] . 'px;
                     }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ' .oxi-icons{
                        font-size:' . $styledata[34] . 'px;
                     }
                }
                @media only screen and (max-width : 668px){ 
                    .oxi-addons-social-' . $oxiid . '{
                         padding:' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
                    }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '{
                        width:' . $styledata[9] . 'px;
                        height:' . $styledata[9] . 'px;
                     }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ' .oxi-icons{
                        font-size:' . $styledata[35] . 'px;
                     }
                }
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '{overflow:hidden}
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ' .oxi-icons{
                  -webkit-transition: all 0.4s;
                -moz-transition: all 0.4s;
                transition: all 0.4s;
                }
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ':hover .oxi-icons{
                    -webkit-animation: toBottomFromTop 0.3s forwards;
                    -moz-animation: toBottomFromTop 0.3s forwards;
                    animation: toBottomFromTop 0.3s forwards;
                }
                @-webkit-keyframes toBottomFromTop {
                    49% {
                        -webkit-transform: translateY(100%);
                    }
                    50% {
                        opacity: 0;
                        -webkit-transform: translateY(-100%);
                    }
                    51% {
                        opacity: 1;
                    }
                }
                @-moz-keyframes toBottomFromTop {
                    49% {
                        -moz-transform: translateY(100%);
                    }
                    50% {
                        opacity: 0;
                        -moz-transform: translateY(-100%);
                    }
                    51% {
                        opacity: 1;
                    }
                }
                @keyframes toBottomFromTop {
                    49% {
                        transform: translateY(100%);
                    }
                    50% {
                        opacity: 0;
                        transform: translateY(-100%);
                    }
                    51% {
                        opacity: 1;
                    }
                }';
     echo OxiAddonsInlineCSSData($css);
}
