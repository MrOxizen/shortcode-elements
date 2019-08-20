<?php

if (!defined('ABSPATH'))
    exit;

function oxi_icon_effects_style_1_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo '<div class="oxi-addons-container  "  >'
			. '<div class="oxi-addons-row oxi-addons-center"  ' . OxiAddonsAnimation($styledata, 23) . '>';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $link = '';
        if ($data[5] != '') {
            $link = '<a href="' . OxiAddonsUrlConvert($data[5]) . '" class="oxi-icon oxi-icon-' . $oxiid . '" id="' . $data[3] . '" target="' . $styledata[1] . '">' . oxi_addons_font_awesome($data[1]) . '</a>';
        } else {
            $link = '<div class="oxi-icon oxi-icon-' . $oxiid . '" id="' . $data[3] . '" >' . oxi_addons_font_awesome($data[1]) . '</div>';
        }
        echo '<div class="' . OxiAddonsItemRows($styledata, 43) . '  ' . OxiAddonsAdminDefine($user) . '">';
        echo "$link";
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                        <div class="oxi-addons-admin-absulate-edit">
                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditicon_effectsdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                            </form>
                        </div>
                        <div class="oxi-addons-admin-absulate-delete">
                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteicon_effectsdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                            </form>
                        </div>
                    </div>';
        }
        echo'</div>';
    }
    echo ' </div></div>';

    $css = '.oxi-addons-container .oxi-icon-' . $oxiid . '{
                    position: relative;
                    max-width: ' . $styledata[15] . 'px;
                    width: 100%;
                    height: ' . $styledata[15] . 'px;                                      
                    margin: ' . $styledata[7] . 'px ' . $styledata[11] . 'px;
                    background:' . $styledata[21] . ';
                    border-radius:' . $styledata[27] . 'px;    
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':after{
                    pointer-events: none;
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    border-radius: 50%;
                    content: "";
                    -webkit-box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;   
                    top: -' . $styledata[35] . 'px;
                    left: -' . $styledata[35] . 'px;
                    padding: ' . $styledata[35] . 'px;
                    box-shadow: 0 0 0 ' . $styledata[39] . 'px ' . $styledata[33] . ';
                    -webkit-transition: -webkit-transform 0.2s, opacity 0.2s;
                    -webkit-transform: scale(.8);
                    -moz-transition: -moz-transform 0.2s, opacity 0.2s;
                    -moz-transform: scale(.8);
                    -ms-transform: scale(.8);
                    transition: transform 0.2s, opacity 0.2s;
                    transform: scale(.8);
                    opacity: 0;
                }                
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover,
                .oxi-addons-container .oxi-icon-' . $oxiid . ':focus,
                .oxi-addons-container .oxi-icon-' . $oxiid . ':active{
                    max-width: ' . $styledata[15] . 'px;
                    width: 100%;
                    height: ' . $styledata[15] . 'px;                  
                    margin: ' . $styledata[7] . 'px ' . $styledata[11] . 'px;
                    animation-duration: ' . $styledata[25] . 's;  
                    background:' . $styledata[33] . ';
                    border-radius:' . $styledata[27] . 'px;    
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover:after{
                    -webkit-transform: scale(1);
                    -moz-transform: scale(1);
                    -ms-transform: scale(1);
                    transform: scale(1);
                    opacity: 1;
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                     font-size: ' . $styledata[3] . 'px;
                     color:' . $styledata[19] . ';
                     line-height: ' . $styledata[15] . 'px; 
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover  .oxi-icons {                    
                     color:' . $styledata[31] . ';
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                    .oxi-addons-container .oxi-icon-' . $oxiid . '{
                        max-width: ' . $styledata[16] . 'px;                  
                        height: ' . $styledata[16] . 'px;              
                        margin: ' . $styledata[8] . 'px ' . $styledata[12] . 'px;
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':hover,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':focus,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':active{
                        max-width: ' . $styledata[16] . 'px;
                        height: ' . $styledata[16] . 'px;                  
                        margin: ' . $styledata[8] . 'px ' . $styledata[12] . 'px;
                        border-radius:' . $styledata[28] . 'px;    
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                         line-height: ' . $styledata[16] . 'px; 
                         font-size: ' . $styledata[4] . 'px;
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':after{
                        top: -' . $styledata[36] . 'px;
                        left: -' . $styledata[36] . 'px;
                        padding: ' . $styledata[36] . 'px;
                        box-shadow: 0 0 0 ' . $styledata[40] . 'px ' . $styledata[33] . ';
                    }
                }
                @media only screen and (max-width : 668px){
                    .oxi-addons-container .oxi-icon-' . $oxiid . '{
                        max-width: ' . $styledata[17] . 'px;                  
                        height: ' . $styledata[17] . 'px;              
                        margin: ' . $styledata[9] . 'px ' . $styledata[13] . 'px;
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':hover,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':focus,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':active{
                        max-width: ' . $styledata[17] . 'px;
                        height: ' . $styledata[17] . 'px;                  
                        margin: ' . $styledata[9] . 'px ' . $styledata[13] . 'px;
                        border-radius:' . $styledata[29] . 'px;    
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                         line-height: ' . $styledata[17] . 'px; 
                         font-size: ' . $styledata[5] . 'px;
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':after{
                        top: -' . $styledata[37] . 'px;
                        left: -' . $styledata[37] . 'px;
                        padding: ' . $styledata[37] . 'px;
                        box-shadow: 0 0 0 ' . $styledata[41] . 'px ' . $styledata[33] . ';
                    }
                }';


    echo OxiAddonsInlineCSSData($css);
}
