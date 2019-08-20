<?php

if (!defined('ABSPATH'))
    exit;

function oxi_icon_effects_style_11_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);

    $styledata = explode('|', $stylefiles[0]);
    echo '<div class="oxi-addons-container" >'
			. '<div class="oxi-addons-row oxi-addons-center"  ' . OxiAddonsAnimation($styledata, 23) . '>';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $link ='';
        if ($data[5] != '') {
            $link = '<a href="' . OxiAddonsUrlConvert($data[5]) . '" class="oxi-icon oxi-icon-' . $oxiid . '" id="' . $data[3] . '" target="' . $styledata[1] . '">' . oxi_addons_font_awesome($data[1]) . '</a>';
          }else{
            $link = '<div class="oxi-icon oxi-icon-' . $oxiid . '" id="' . $data[3] . '" >' . oxi_addons_font_awesome($data[1]) . '</div>';
          }
        echo '<div class="' . OxiAddonsItemRows($styledata, 49) . '  ' . OxiAddonsAdminDefine($user) . '">';
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
                    overflow: hidden;
                    max-width: ' . $styledata[15] . 'px;
                    width: 100%;
                    height: ' . $styledata[15] . 'px;                                      
                    margin: ' . $styledata[7] . 'px ' . $styledata[11] . 'px;
                    border-radius:' . $styledata[27] . 'px; 
                    box-shadow: 0 0 0 ' . $styledata[39] . 'px ' . $styledata[33] . ';
                    -webkit-transition: all 0.4s;
                    -moz-transition: all 0.4s;
                    transition: all 0.4s;
                }   
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover,
                .oxi-addons-container .oxi-icon-' . $oxiid . ':focus,
                .oxi-addons-container .oxi-icon-' . $oxiid . ':active{
                    max-width: ' . $styledata[15] . 'px;
                    width: 100%;
                    background: ' . $styledata[21] . ';
                    height: ' . $styledata[15] . 'px;       
                    margin: ' . $styledata[7] . 'px ' . $styledata[11] . 'px;   
                    border-radius:' . $styledata[27] . 'px;   
                    box-shadow: 0 0 0 ' . $styledata[43] . 'px ' . $styledata[47] . ';
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                     font-size: ' . $styledata[3] . 'px;
                     color:' . $styledata[31] . ';
                     line-height: ' . $styledata[15] . 'px; 
                     -webkit-transition: all 0.4s;
                    -moz-transition: all 0.4s;
                    transition: all 0.4s;
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover  .oxi-icons {                    
                     color:' . $styledata[19] . ';
                    -webkit-animation: toLeftFromRight 0.3s forwards;
                    -moz-animation: toLeftFromRight 0.3s forwards;
                    animation: toLeftFromRight 0.3s forwards;
                }
                @-webkit-keyframes toLeftFromRight {
                        49% {
                                -webkit-transform: translate(-100%);
                        }
                        50% {
                                opacity: 0;
                                -webkit-transform: translate(100%);
                        }
                        51% {
                                opacity: 1;
                        }
                }
                @-moz-keyframes toLeftFromRight {
                        49% {
                                -moz-transform: translate(-100%);
                        }
                        50% {
                                opacity: 0;
                                -moz-transform: translate(100%);
                        }
                        51% {
                                opacity: 1;
                        }
                }
                @keyframes toLeftFromRight {
                        49% {
                                transform: translate(-100%);
                        }
                        50% {
                                opacity: 0;
                                transform: translate(100%);
                        }
                        51% {
                                opacity: 1;
                        }
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                    .oxi-addons-container .oxi-icon-' . $oxiid . '{
                        max-width: ' . $styledata[16] . 'px;                  
                        height: ' . $styledata[16] . 'px;              
                        margin: ' . $styledata[8] . 'px ' . $styledata[12] . 'px;
                        box-shadow: 0 0 0 ' . $styledata[40] . 'px ' . $styledata[21] . ';
                    }              
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':hover,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':focus,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':active{
                        max-width: ' . $styledata[16] . 'px;
                        height: ' . $styledata[16] . 'px;    
                        box-shadow: 0 0 0 ' . $styledata[44] . 'px ' . $styledata[47] . ';    
                        margin: ' . $styledata[8] . 'px ' . $styledata[12] . 'px;     
                        border-radius:' . $styledata[28] . 'px;    
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                         font-size: ' . $styledata[4] . 'px;
                         line-height: ' . $styledata[16] . 'px; 
                    }
                }
                @media only screen and (max-width : 668px){
                    .oxi-addons-container .oxi-icon-' . $oxiid . '{
                        max-width: ' . $styledata[17] . 'px;                  
                        height: ' . $styledata[17] . 'px;              
                        margin: ' . $styledata[9] . 'px ' . $styledata[13] . 'px;
                        box-shadow: 0 0 0 ' . $styledata[41] . 'px ' . $styledata[33] . ';
                    }              
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':hover,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':focus,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':active{
                        max-width: ' . $styledata[17] . 'px;
                        height: ' . $styledata[17] . 'px;    
                        box-shadow: 0 0 0 ' . $styledata[45] . 'px ' . $styledata[47] . ';    
                        margin: ' . $styledata[9] . 'px ' . $styledata[13] . 'px;     
                        border-radius:' . $styledata[29] . 'px;    
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                         font-size: ' . $styledata[5] . 'px;
                         line-height: ' . $styledata[17] . 'px; 
                    }
                }';

    echo OxiAddonsInlineCSSData($css);
}
