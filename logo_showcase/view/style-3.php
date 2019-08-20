<?php

if (!defined('ABSPATH'))
    exit;

function oxi_logo_showcase_style_3_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
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
                    <div class="oxi-addons-logo-showcase-row-img-' . $oxiid . '">
                        ' . $link . '
                    </div>';

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
            .oxi-addons-logo-showcase-row-img-' . $oxiid . '{                
                width: 100%;
                margin: 0 auto;
                display: flex;
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '{
                max-width: ' . $styledata[7] . 'px;
                width:100%;
                margin: 0 auto;
                float: left;
                position: relative;
                background: ' . $styledata[70] . ';
                border-width:' . $styledata[72] . 'px;
                border-style:' . $styledata[88] . ';    
                border-color:' . $styledata[89] . ';
                border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 92) . ';               
                ' . OxiAddonsBoxShadowSanitize($styledata, 54) . ';   
                transform: scale(' . $styledata[64] . ');
                transition: transform ' . $styledata[66] . 's;
                filter: grayscale(' . $styledata[60] . '%);    
                overflow:hidden;    
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
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';        
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':hover .oxi-addons-img{               
                transform: scale(' . $styledata[68] . ');    
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':hover{
                filter: grayscale(' . $styledata[62] . '%);
            }
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-container .oxi-addons-logo-showcase-row-' . $oxiid . '{                
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 32) . ';       
            } 
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '{
                max-width: ' . $styledata[8] . 'px;              
                border-width:' . $styledata[73] . 'px;
                border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 93) . ';  
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
                border-width:' . $styledata[74] . 'px;
                border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 94) . ';  
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
