<?php
if (!defined('ABSPATH')) {
    exit;
}

function oxi_footer_info_style_4_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $logo = $contact = '';
    if ($stylefiles[4] != '' && $stylefiles[2] != '') {
            $logo = '<div class="oxi-addons-FI-4-col-1" >
                        <a href="' . OxiAddonsUrlConvert($stylefiles[4]) . '" target="'.$styledata[67].'"><div class="oxi-addons-FI-4-logo" ' . OxiAddonsAnimation($styledata, 47) . '>' . OxiAddonsTextConvert($stylefiles[2]) . '</div></a>
                    </div>';
        } elseif ($stylefiles[4] == '' && $stylefiles[2] != '') {
            $logo = '<div class="oxi-addons-FI-4-col-1" >
                        <div class="oxi-addons-FI-4-logo" ' . OxiAddonsAnimation($styledata, 47) . '>' . OxiAddonsTextConvert($stylefiles[2]) . '</div>
                    </div>';
        }
    if ($stylefiles[6] != '') {
        $contact = '<div class="oxi-addons-FI-4-col-2">
                    <div class="oxi-addons-FI-4-Address" ' . OxiAddonsAnimation($styledata, 47) . '>
                        ' . OxiAddonsTextConvert($stylefiles[6]) . '
                    </div>
                </div>';
    }
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-FI-4-' . $oxiid . '">
                <div class="oxi-addons-FI-4-row">
                    '.$logo.'
                    '.$contact.'
                    <div class="oxi-addons-FI-4-col-3">
                        <div class="oxi-addons-FI-4-icon" ' . OxiAddonsAnimation($styledata, 47) . '>';
                            foreach ($listdata as $value) {
                            $listitemdata = explode('||#||', $value['files']);
                            echo '<a class="oxi-icons ' . OxiAddonsAdminDefine($user) . '" href="' . OxiAddonsUrlConvert($listitemdata[4]) . '" target="' . $styledata[67] . '">'.oxi_addons_font_awesome($listitemdata[2]).'';
                                  if ($user == 'admin') {
                                    echo '  <div class="oxi-addons-admin-absulote">
                                                    <div class="oxi-addons-admin-absulate-edit">
                                                        <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditfooter_infodata") . '
                                                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                            <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                                        </form>
                                                    </div>
                                                    <div class="oxi-addons-admin-absulate-delete">
                                                        <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletefooter_infodata") . '
                                                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                            <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>';
                                     }
                                    echo '</a>';
                        }
                        echo'    
                    </div>
                </div>
            </div>
        </div>
    </div>';
    $css = '.oxi-addons-FI-4-' . $oxiid . '{
                width: 100%;
                float: left;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . ';
            }
            .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-row{
                width: 100%;
                align-items: initial;
                display: flex;
                overflow: hidden;
                border: ' . $styledata[3] .'px ' . $styledata[4] .'  ' . $styledata[7] .';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 41) . ';
            }
            .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-1,.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-2, .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-3{
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 173) . ';
            }
            .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-1{
                ' . OxiAddonsBGImage($styledata, 51) . ';
                border: ' . $styledata[55] .'px ' . $styledata[56] .'  ' . $styledata[59] .';

            }
            .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-2{
                ' . OxiAddonsBGImage($styledata, 97) . ';
                border: ' . $styledata[101] .'px ' . $styledata[102] .'  ' . $styledata[105] .';
            }
            .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-3{
                ' . OxiAddonsBGImage($styledata, 135) . ';
                border: ' . $styledata[139] .'px ' . $styledata[140] .'  ' . $styledata[143] .';
            }
            .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-logo{
                font-size: ' . $styledata[61] . 'px;
                color: ' . $styledata[65] . ';
                border: ' . $styledata[69] .'px ' . $styledata[70] .'  ' . $styledata[73] .';
                ' . OxiAddonsFontSettings($styledata, 75) . '
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 81) . ';
            }
            .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-Address{
                width: 100%;
                float: left;
                font-size: ' . $styledata[107] . 'px;
                color: ' . $styledata[111] . ';
                ' . OxiAddonsFontSettings($styledata, 113) . '
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 119) . ';
            }
            .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-icon{
                width: 100%;
                float: left;
                text-align:' . $styledata[155] . ';
            }
            .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-icon .oxi-icons{
                font-size: ' . $styledata[145] . 'px;
                color: ' . $styledata[149] . ';
                padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . ';
            }
            .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-icon .oxi-icons:hover{
                color: ' . $styledata[151] . ';
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-FI-4-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 26) . ';
                }
                .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-row{
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 10) . ';
                }
                .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-1,.oxi-addons-FI-4-col-2, .oxi-addons-FI-4-col-3{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 174) . ';
                }
                .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-logo{
                    font-size: ' . $styledata[62] . 'px;
                    padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 82) . ';
                }
                .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-Address{
                    font-size: ' . $styledata[108] . 'px;
                    padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 120) . ';
                }
                .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-icon .oxi-icons{
                    font-size: ' . $styledata[146] . 'px;
                    padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 158) . ';
                }

            }
             @media only screen and (max-width : 668px){
                    .oxi-addons-FI-4-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 27) . ';
                }
                .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-row{
                    flex-direction: column;
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';
                }
                .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-1,.oxi-addons-FI-4-col-2, .oxi-addons-FI-4-col-3{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 175) . ';
                }
                .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-logo{
                    font-size: ' . $styledata[63] . 'px;
                    padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
                }
                .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-Address{
                    font-size: ' . $styledata[109] . 'px;
                    padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 121) . ';
                }
                .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-icon .oxi-icons{
                    font-size: ' . $styledata[147] . 'px;
                    padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 159) . ';
                }
            }';

    echo OxiAddonsInlineCSSData($css);
}


