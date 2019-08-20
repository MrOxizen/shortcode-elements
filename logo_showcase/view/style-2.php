<?php

if (!defined('ABSPATH'))
    exit;

function oxi_logo_showcase_style_2_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';

    echo '<div class="oxi-addons-container"> <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $link = '';
        if ($data[3] != '') {
            $link = '<a href="' . OxiAddonsUrlConvert($data[3]) . '" target="' . $styledata[52] . '" class="oxi-addons-logo-showcase-img-' . $oxiid . '">
                        <img src="' . OxiAddonsUrlConvert($data[1]) . '" class="oxi-addons-img">
                     </a>';
        } elseif ($data[3] == '') {
            $link = '<div class="oxi-addons-logo-showcase-img-' . $oxiid . '"><img src="' . OxiAddonsUrlConvert($data[1]) . '" class="oxi-addons-img"></div>';
        };

        echo '  <div class="oxi-addons-logo-showcase-row-' . $oxiid . ' ' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 47) . '>                       
                            ' . $link . '';

        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                                <div class="oxi-addons-admin-absulate-edit">
                                    <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditlogo_showcasedata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                    </form>
                                </div>
                                <div class="oxi-addons-admin-absulate-delete">
                                    <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletelogo_showcasedata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                    </form>
                                </div>
                            </div>';
        }
        echo'</div>';
    }
    echo'</div></div>';
    $css .= '.oxi-addons-container .oxi-addons-logo-showcase-row-' . $oxiid . '{
                position:relative;                
                display: flex;
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';       
            } 
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '{
                max-width: ' . $styledata[7] . 'px;
                width:100%;
                margin: 0 auto;
                float: left;
                position: relative;                
                ' . OxiAddonsBoxShadowSanitize($styledata, 54) . ';
                
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':after{
                display:block;
                content: "";  
                width:100%;
                padding-bottom:' . ($styledata[11] / $styledata[7]) * 100 . '%;
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-img{
                position:absolute;                
                top:0;
                left:0;
                width:100%;
                height:100%;  
                filter: grayscale(' . $styledata[60] . '%);
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';        
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':hover .oxi-addons-img{
                filter: grayscale(' . $styledata[62] . '%);
            }
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-container .oxi-addons-logo-showcase-row-' . $oxiid . '{               
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 32) . ';       
            } 
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '{
               max-width: ' . $styledata[8] . 'px;   
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':after{               
                padding-bottom:' . ($styledata[12] / $styledata[8]) * 100 . '%;
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-img{               
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';        
            }
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-container .oxi-addons-logo-showcase-row-' . $oxiid . '{               
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';       
            } 
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '{
               max-width: ' . $styledata[9] . 'px;   
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':after{               
                padding-bottom:' . ($styledata[13] / $styledata[9]) * 100 . '%;
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-img{               
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';        
            }
        }
           ';
    echo OxiAddonsInlineCSSData($css);
}
