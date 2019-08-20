<?php

if (!defined('ABSPATH'))
    exit;

function oxi_social_icons_style_13_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
        if ($styledata[47] == '') {
            $css .= '.oxi-addons-container .oxi-icon-item-' . $value['id'] . '.oxi-icon-' . $oxiid . ':after{
                        background: ' . $listfiles[9] . ';
                    }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-item-' . $value['id'] . '.oxi-icon-' . $oxiid . '{
                        box-shadow: 0 0 0 0px ' . $listfiles[9] . ';
                    }';
        }
        if ($styledata[81] == '') {
            $css .= '.oxi-addons-social-' . $oxiid . ' .oxi-icon-item-' . $value['id'] . '.oxi-icon-' . $oxiid . ':hover{
                        box-shadow: 0 0 0 ' . $styledata[67] . 'px ' . $listfiles[15] . ';
                    }
                    @media only screen and (min-width : 669px) and (max-width : 993px){
                        .oxi-addons-social-' . $oxiid . ' .oxi-icon-item-' . $value['id'] . '.oxi-icon-' . $oxiid . ':hover{
                            box-shadow: 0 0 0 ' . $styledata[68] . 'px ' . $listfiles[15] . ';
                        }
                    }
                    @media only screen and (max-width : 668px){ 
                        .oxi-addons-social-' . $oxiid . ' .oxi-icon-item-' . $value['id'] . '.oxi-icon-' . $oxiid . ':hover{
                            box-shadow: 0 0 0 ' . $styledata[69] . 'px ' . $listfiles[15] . ';
                        }
                    }';
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
                    position: relative;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-radius:' . $styledata[59] . 'px;
                }
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ':hover{
                    border-radius:' . $styledata[75] . 'px;
                }
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ' .oxi-icons{
                    font-size:' . $styledata[33] . 'px;
                    color:' . $styledata[39] . ';
                }
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ':hover .oxi-icons{
                    color:' . $styledata[43] . ';
                }
                
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '{
                    box-shadow: 0 0 0 0px ' . $styledata[49] . ';
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':after{
                    pointer-events: none;
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    border-radius:' . $styledata[75] . 'px;
                    content: "";
                    z-index: 1;
                    -webkit-box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;   
                    top: -' . $styledata[67] . 'px;
                    left: -' . $styledata[67] . 'px;
                    padding: ' . $styledata[67] . 'px;
                    background: ' . $styledata[49] . ';
                    -webkit-transition: all 0.2s;
                    -moz-transition: all 0.2s;
                    transition: all 0.2s;
                } 
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover:after{
                     -webkit-transform: scale(0);
                    -moz-transform: scale(0);
                    -ms-transform: scale(0);
                    transform: scale(0);
                    padding: 0px;
                }
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ' .oxi-icons{
                  z-index: 2;
                }
                .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ':hover{
                   box-shadow: 0 0 0 ' . $styledata[67] . 'px ' . $styledata[72] . ';
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                    .oxi-addons-social-' . $oxiid . '{
                         padding:' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
                    }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '{
                        width:' . $styledata[8] . 'px;
                        height:' . $styledata[8] . 'px;
                        border-radius:' . $styledata[60] . 'px;
                    }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ':hover{
                        border-radius:' . $styledata[76] . 'px;
                    }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ' .oxi-icons{
                        font-size:' . $styledata[34] . 'px;
                    }

                    .oxi-addons-container .oxi-icon-' . $oxiid . ':after{
                        border-radius:' . $styledata[76] . 'px;
                        top: -' . $styledata[68] . 'px;
                        left: -' . $styledata[68] . 'px;
                        padding: ' . $styledata[68] . 'px;
                    } 
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ':hover{
                       box-shadow: 0 0 0 ' . $styledata[68] . 'px ' . $styledata[72] . ';
                    }
                }
                @media only screen and (max-width : 668px){ 
                    .oxi-addons-social-' . $oxiid . '{
                         padding:' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
                    }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '{
                        width:' . $styledata[9] . 'px;
                        height:' . $styledata[9] . 'px;
                        border-radius:' . $styledata[61] . 'px;
                    }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ':hover{
                        border-radius:' . $styledata[77] . 'px;
                    }
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ' .oxi-icons{
                        font-size:' . $styledata[35] . 'px;
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':after{
                        border-radius:' . $styledata[77] . 'px;
                        top: -' . $styledata[69] . 'px;
                        left: -' . $styledata[69] . 'px;
                        padding: ' . $styledata[69] . 'px;
                    } 
                    .oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ':hover{
                       box-shadow: 0 0 0 ' . $styledata[69] . 'px ' . $styledata[72] . ';
                    }
                }';
                
     echo OxiAddonsInlineCSSData($css);
}
