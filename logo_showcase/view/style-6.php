<?php

if (!defined('ABSPATH'))
    exit;

function oxi_logo_showcase_style_6_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';

    echo '<div class="oxi-addons-container"> <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $link = $text = '';
        if ($data[3] != '') {
            if ($data[5] != '') {
                $text = ' <div class="oxi-addons-logo-showcase-hover-text" >
                        ' . OxiAddonsTextConvert($data[5]) . '
                        </div>';
            }
            $link = '<a href="' . OxiAddonsUrlConvert($data[3]) . '" target="' . $styledata[52] . '" class="oxi-addons-logo-showcase-img-' . $oxiid . '">
                        <img src="' . OxiAddonsUrlConvert($data[1]) . '" class="oxi-addons-img">
                       '.$text.'
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
                overflow: hidden;
                position: relative;
                ' . OxiAddonsBoxShadowSanitize($styledata, 54) . ';
                background: ' . $styledata[60] . ';
                 border-style: ' . $styledata[86] . ';
                border-color: ' . $styledata[87] . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 70) . '; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
                 transition: all 0.5s;
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':hover{
                background: ' . $styledata[62] . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 64) . ';
                transition: all 0.5s;
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':after{
                display:block;
                content: "";  
                width:100%;
                padding-bottom:' . $styledata[11]. '%;
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-img{
                position:absolute;                
                top:0;
                left:0;
                width:100%;
                height:100%;  
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';        
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logo-showcase-hover-text{
                width: 100%;
                 color: ' . $styledata[109] . ';
                background: ' . $styledata[111] . ';
                ' . OxiAddonsFontSettings($styledata, 113) . '
                font-size: ' . $styledata[105] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 119) . ';
                position: absolute;       
                bottom : -50%;
                opacity: 0;
                transition: all 0.3s;
               }
             .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':hover .oxi-addons-logo-showcase-hover-text{
               bottom : 0;
                transition: all 0.3s;
                opacity: 1;
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
                .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logo-showcase-hover-text{
                 font-size: ' . $styledata[106] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 120) . ';
               
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
                .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logo-showcase-hover-text{
                 font-size: ' . $styledata[107] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 121) . ';
               
               }
        }
           ';
    echo OxiAddonsInlineCSSData($css);
}
