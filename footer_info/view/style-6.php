<?php

if (!defined('ABSPATH'))
    exit;


function oxi_footer_info_style_6_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $footertext = '';
    if ($stylefiles[2] != '') {
        $footertext = '  <div class="oxi-addons-FI-6-footer-text">' . OxiAddonsTextConvert($stylefiles[2]) . '</div>';
    }
    
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-FI-6-' . $oxiid . '">
                <div class="oxi-addons-FI-6-row" ' . OxiAddonsAnimation($styledata, 67) . '>
                    <div class="oxi-addons-FI-6-social-icon">';
                        foreach ($listdata as $value) {
                                $listitemdata = explode('||#||', $value['files']);
                                    echo '<a class="' . OxiAddonsAdminDefine($user) . '" href="' . OxiAddonsUrlConvert($listitemdata[4]) . '" target="' . $styledata[99] . '">'.oxi_addons_font_awesome($listitemdata[2]).'';
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
                    echo '</div>
                   '.$footertext.'
                </div>
            </div>
        </div>';

 $css = '.oxi-addons-FI-6-' . $oxiid . '{
        width: 100%;
        float: left;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 45) . ';
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-row{
        width: 100%;
        margin: auto;
        border: ' . $styledata[7] .'px ' . $styledata[8] .'  ' . $styledata[11] .';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 61) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';
        ' . OxiAddonsBGImage($styledata, 3) . ';
        overflow: auto;
         
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon{
        width: 100%;
        float: left;
        text-align:' . $styledata[101] . ';
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        ' . OxiAddonsBGImage($styledata, 71) . ';
        font-size: ' . $styledata[75] . 'px;
        width: ' . $styledata[79] . 'px;
        height: ' . $styledata[79] . 'px;
        color: ' . $styledata[83] . ';
         border: ' . $styledata[87] .'px ' . $styledata[88] .'  ' . $styledata[91] .';
        ' . OxiAddonsBoxShadowSanitize($styledata, 93) . ';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 119) . ';
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons:hover{
        color: ' . $styledata[85] . ';
        ' . OxiAddonsBGImage($styledata, 179) . ';
        border-color:' . $styledata[183] .';
        ' . OxiAddonsBoxShadowSanitize($styledata, 185) . ';    
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-footer-text{
        width: 100%;
        float: left;
        font-size: ' . $styledata[151] . 'px;
        color: ' . $styledata[155] . ';
        ' . OxiAddonsFontSettings($styledata, 157) . '
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 163) . ';
        
    }
    @media only screen and (min-width : 669px) and (max-width : 993px){
    .oxi-addons-FI-6-' . $oxiid . '{
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 46) . ';
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-row{
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';
         
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons{
        ' . OxiAddonsBGImage($styledata, 21) . ';
        font-size: ' . $styledata[76] . 'px;
        width: ' . $styledata[80] . 'px;
        height: ' . $styledata[80] . 'px;
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 104) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 120) . ';
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 136) . ';
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-footer-text{
        font-size: ' . $styledata[152] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 164) . ';
        
    }    
           
        }
    @media only screen and (max-width : 668px){
        .oxi-addons-FI-6-' . $oxiid . '{
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 47) . ';
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-row{
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';
         
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons{
        ' . OxiAddonsBGImage($styledata, 22) . ';
        font-size: ' . $styledata[77] . 'px;
        width: ' . $styledata[81] . 'px;
        height: ' . $styledata[81] . 'px;
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 105) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 121) . ';
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 137) . ';
    }
    .oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-footer-text{
        font-size: ' . $styledata[153] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 165) . ';
        
    }     

         }';
 
   echo OxiAddonsInlineCSSData($css);
}
