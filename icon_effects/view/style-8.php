<?php

if (!defined('ABSPATH'))
    exit;

function oxi_icon_effects_style_8_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);

    $styledata = explode('|', $stylefiles[0]);
    echo '<div class="oxi-addons-container " >'
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
                    border-radius:' . $styledata[27] . 'px; 
                    border: ' . $styledata[39] . 'px ' . $styledata[41] . ' ' . $styledata[21] . ';
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':after{
                    pointer-events: none;
                    position: absolute;
                    width: calc(100% - ' . ($styledata[35] * 2 - $styledata[39] * 2) . 'px);
                    height: calc(100% - ' . ($styledata[35] * 2 - $styledata[39] * 2) . 'px);
                    border-radius: 50%;
                    content: "";
                    z-index: -1;
                    -webkit-box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;
                    top: -' . $styledata[39] . 'px;
                    left: -' . $styledata[39] . 'px;
                    -webkit-transition: all 0.4s;
                    -moz-transition: all 0.4s;
                    transition: all 0.4s;
                    opacity: 0;
                    border: ' . $styledata[35] . 'px ' . $styledata[37] . ' transparent;
                }                
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover,
                .oxi-addons-container .oxi-icon-' . $oxiid . ':focus,
                .oxi-addons-container .oxi-icon-' . $oxiid . ':active{
                    max-width: ' . $styledata[15] . 'px;
                    width: 100%;
                    height: ' . $styledata[15] . 'px;       
                    margin: ' . $styledata[7] . 'px ' . $styledata[11] . 'px;
                    animation-duration: ' . $styledata[25] . 's;                      
                    border-radius:' . $styledata[27] . 'px;   
                    border: ' . $styledata[39] . 'px ' . $styledata[41] . ' transparent;
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover:after{                   
                    opacity: 1;
                    border: ' . $styledata[35] . 'px ' . $styledata[33] . ' ' . $styledata[37] . ';
                    -webkit-animation: spinAround 9s linear infinite;
                    -moz-animation: spinAround 9s linear infinite;
                    animation: spinAround 9s linear infinite;
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                     font-size: ' . $styledata[3] . 'px;
                     color:' . $styledata[19] . ';
                     line-height: ' . ($styledata[15] - ($styledata[39] * 2)) . 'px; 
                     -webkit-transition: all 0.4s;
                    -moz-transition: all 0.4s;
                    transition: all 0.4s;
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
                         font-size: ' . $styledata[4] . 'px;
                         line-height: ' . ($styledata[16] - $styledata[39] * 2) . 'px; 
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
                         font-size: ' . $styledata[5] . 'px;
                         line-height: ' . ($styledata[17] - $styledata[39] * 2) . 'px; 
                    }
                }
                @-webkit-keyframes spinAround {
                        from {
                                -webkit-transform: rotate(0deg)
                        }
                        to {
                                -webkit-transform: rotate(360deg);
                        }
                }
                @-moz-keyframes spinAround {
                        from {
                                -moz-transform: rotate(0deg)
                        }
                        to {
                                -moz-transform: rotate(360deg);
                        }
                }
                @keyframes spinAround {
                        from {
                                transform: rotate(0deg)
                        }
                        to {
                                transform: rotate(360deg);
                        }
                }';

    echo OxiAddonsInlineCSSData($css);
}
