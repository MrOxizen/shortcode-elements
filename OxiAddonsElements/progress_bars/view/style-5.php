<?php

if (!defined('ABSPATH'))
    exit;

function oxi_progress_bars_style_5_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo oxi_addons_public_waypoints();
    echo oxi_addons_elements_stylejs('jquery-asProgress.min', 'progress_bars', 'js');
    $css = '';
    $jquery = '';

    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        echo '<div class="oxi-addons-parent-wrapper-' . $oxiid . ' oxi-addons-parent-wrapper-' . $oxiid . '-' . $value['id'] . ' ' . OxiAddonsItemRows($styledata, 3) . '  ' . OxiAddonsAdminDefine($user) . '">';
        echo '<div class="oxi-addons-main-wrapper-' . $oxiid . '" ' . OxiAddonsAnimation($styledata, 39) . '>
                        <div class="oxi-addons-progress-bar-main"  role="oxi-progress" data-goal="' . $data[1] . '" data-speed="' . $data[9] . '"> 
                            <div class="oxi-addons-progress-bar" style="background: ' . $data[5] . '">
                                <div class="oxi-addons-progress-line oxi-progress__bar" style="background: ' . $data[7] . '"></div>
                                <div class="oxi-addons-heading">
                                    <div class="oxi-addons-progress-title">' . $data[3] . '</div>
                                    <div class="oxi-addons-progress-percentage oxi-progress__label"></div>
                                </div>
                            </div>
                        </div> 
                    </div>';
        $jquery .= 'jQuery(".oxi-addons-parent-wrapper-' . $oxiid . '-' . $value['id'] . ' .oxi-addons-progress-bar-main").waypoint(function () {
                    jQuery(".oxi-addons-parent-wrapper-' . $oxiid . '-' . $value['id'] . ' .oxi-addons-progress-bar-main").asProgress({"namespace": "oxi-progress"});
                    jQuery(".oxi-addons-parent-wrapper-' . $oxiid . '-' . $value['id'] . ' .oxi-addons-progress-bar-main").asProgress("start");
                }, {
                    offset: "80%"
                });';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                                <div class="oxi-addons-admin-absulate-edit">
                                    <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditprogress_barsdata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                    </form>
                                </div>
                                <div class="oxi-addons-admin-absulate-delete">
                                    <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteprogress_barsdata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                    </form>
                                </div>
                            </div>';
        }
        echo '</div>';
    }
    echo '</div>
        </div>';

    $css .= '
    .oxi-addons-parent-wrapper-' . $oxiid . '{
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . '; 
    }
    .oxi-addons-main-wrapper-' . $oxiid . '{   
        width: 100%;
        float: left; 
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . '; 
        background: ' . $styledata[50] . '; 
        ' . OxiAddonsBoxShadowSanitize($styledata, 44) . ';
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-progress-bar-main{   
        width: 100%;
        float: left; 
    } 
    .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-heading{
         display: block; 
    }
    .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-title{
        font-size: ' . $styledata[52] . 'px;
        ' . OxiAddonsFontSettings($styledata, 56) . ';
        color: ' . $styledata[62] . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 64) . ';  
    }
   
    .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-percentage{
        font-size: ' . $styledata[84] . 'px;
        ' . OxiAddonsFontSettings($styledata, 88) . ';
        color: ' . $styledata[94] . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 96) . ';    
    }
    .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-bar{
        width: 100%;
        float: left;
        padding: ' . $styledata[112] . 'px;
        display: block;
        border-radius:  ' . OxiAddonsPaddingMarginSanitize($styledata, 120) . '; 
        ' . OxiAddonsBoxShadowSanitize($styledata, 152) . ';
    }
    .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-line{
        height: ' . $styledata[116] . 'px;
        display: block;
        border-radius:  ' . OxiAddonsPaddingMarginSanitize($styledata, 136) . ';
        width: 0; 
    }  
    @media only screen and (min-width : 669px) and (max-width : 993px){
        .oxi-addons-parent-wrapper-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 24) . '; 
        }
        .oxi-addons-main-wrapper-' . $oxiid . '{    
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . ';  
        } 
        .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-title{
            font-size: ' . $styledata[53] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';  
        }
       
        .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-percentage{
            font-size: ' . $styledata[85] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 97) . ';    
        }
        .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-bar{ 
            padding: ' . $styledata[113] . 'px; 
            border-radius:  ' . OxiAddonsPaddingMarginSanitize($styledata, 121) . ';  
        }
        .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-line{
            height: ' . $styledata[117] . 'px; 
            border-radius:  ' . OxiAddonsPaddingMarginSanitize($styledata, 137) . '; 
        } 
    }
    @media only screen and (max-width : 668px){
        .oxi-addons-parent-wrapper-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . '; 
        }
        .oxi-addons-main-wrapper-' . $oxiid . '{    
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . ';  
        } 
        .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-title{
            font-size: ' . $styledata[54] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 66) . ';  
        }
       
        .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-percentage{
            font-size: ' . $styledata[86] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 98) . ';    
        }
        .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-bar{ 
            padding: ' . $styledata[114] . 'px; 
            border-radius:  ' . OxiAddonsPaddingMarginSanitize($styledata, 122) . ';  
        }
        .oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-line{
            height: ' . $styledata[118] . 'px; 
            border-radius:  ' . OxiAddonsPaddingMarginSanitize($styledata, 138) . '; 
        }
    }
';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-jquery-asProgress.min');
}
