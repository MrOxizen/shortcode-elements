<?php

if (!defined('ABSPATH'))
    exit;


function oxi_footer_info_style_7_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $headertext = $followustext = '';
    if ($stylefiles[2] != '') {
        $headertext = '<div class="oxi-addons-FI-7-header-text">' . OxiAddonsTextConvert($stylefiles[2]) . '</div>';
    }
    if ($stylefiles[4] != '') {
        $followustext = '<div class="oxi-addons-FI-7-follow-us">' . OxiAddonsTextConvert($stylefiles[4]) . '</div>';
    }
    echo '<div class="oxi-addons-container">
        <div class="oxi-addons-FI-7-' . $oxiid . '">
            <div class="oxi-addons-FI-7-row" ' . OxiAddonsAnimation($styledata, 67) . '>
                '.$headertext.'
                <div class="oxi-addons-FI-7-col-icon">
                      '.$followustext.'
                       <div class="oxi-addons-FI-7-follow-icon">';
                           foreach ($listdata as $value) {
                                $listitemdata = explode('||#||', $value['files']);
                                    echo '<a class="' . OxiAddonsAdminDefine($user) . '" href="' . OxiAddonsUrlConvert($listitemdata[4]) . '" target="' . $styledata[155] . '">'.oxi_addons_font_awesome($listitemdata[2]).'';
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
                      echo'</div>
                 </div>
            </div>
        </div>
    </div>';

 $css = '.oxi-addons-FI-7-' . $oxiid . '{
        width: 100%;
        float: left;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 45) . ';
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-row{
        width: 100%;
        margin: auto;
        border: ' . $styledata[7] .'px ' . $styledata[8] .'  ' . $styledata[11] .';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 61) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';
        ' . OxiAddonsBGImage($styledata, 3) . ';
        overflow: auto;
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-header-text{
        width: 100%;
        float: left;
        font-size: ' . $styledata[75] . 'px;
        color: ' . $styledata[79] . ';
        ' . OxiAddonsFontSettings($styledata, 81) . '
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
        
    } 
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-us{
        width: 100%;
        float: left;
        font-size: ' . $styledata[103] . 'px;
        color: ' . $styledata[107] . ';
        ' . OxiAddonsFontSettings($styledata, 109) . '
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 115) . ';
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-col-icon{
        width: 100%;
        float:left;
        text-align:' . $styledata[157] . ';
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        ' . OxiAddonsBGImage($styledata, 71) . ';
        font-size: ' . $styledata[131] . 'px;
        width: ' . $styledata[135] . 'px;
        height: ' . $styledata[135] . 'px;
        color: ' . $styledata[139] . ';
         border: ' . $styledata[143] .'px ' . $styledata[144] .'  ' . $styledata[147] .';
        ' . OxiAddonsBoxShadowSanitize($styledata, 149) . ';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 159) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 175) . ';
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 191) . ';
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons:hover{
        color: ' . $styledata[141] . ';
        ' . OxiAddonsBGImage($styledata, 207) . ';
        border-color:' . $styledata[211] .';
        ' . OxiAddonsBoxShadowSanitize($styledata, 213) . '; 
    } 
    @media only screen and (min-width : 669px) and (max-width : 993px){
    .oxi-addons-FI-7-' . $oxiid . '{
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 46) . ';
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-row{
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-header-text{
        font-size: ' . $styledata[76] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
        
    } 
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-us{
        font-size: ' . $styledata[104] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 116) . ';
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons{
        font-size: ' . $styledata[132] . 'px;
        width: ' . $styledata[136] . 'px;
        height: ' . $styledata[136] . 'px;
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 160) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 176) . ';
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 192) . ';
    }   
           
        }
    @media only screen and (max-width : 668px){
    .oxi-addons-FI-7-' . $oxiid . '{
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 47) . ';
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-row{
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-header-text{
        font-size: ' . $styledata[77] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
        
    } 
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-us{
        font-size: ' . $styledata[105] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 117) . ';
    }
    .oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons{
        font-size: ' . $styledata[133] . 'px;
        width: ' . $styledata[137] . 'px;
        height: ' . $styledata[137] . 'px;
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 177) . ';
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 193) . ';
    } 
    }';
 
    echo OxiAddonsInlineCSSData($css);
}
