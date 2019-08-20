<?php

if (!defined('ABSPATH'))
    exit;

function oxi_icon_effects_style_16_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);

    $styledata = explode('|', $stylefiles[0]);
      
    echo '<div class="oxi-addons-container " >'
			. '<div class="oxi-addons-row oxi-addons-center"  ' . OxiAddonsAnimation($styledata, 23) . '>';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $link ='';
        if ($data[5] != '') {
            $link = '<a href="' . OxiAddonsUrlConvert($data[5]) . '" class="oxi-icon oxi-icon-' . $oxiid . '" id="' . $data[3] . '" target="' . $styledata[1] . '">' . oxi_addons_font_awesome($data[1]) . '</a>';
          }else{
            $link = '<div class="oxi-icon oxi-icon-' . $oxiid . '" id="' . $data[3] . '" >' . oxi_addons_font_awesome($data[1]) . '</div>';
          }
        echo '<div class="' . OxiAddonsItemRows($styledata, 51) . '  ' . OxiAddonsAdminDefine($user) . '">';
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
                    box-shadow: 0 0 0 ' . $styledata[39] . 'px ' . $styledata[21] . ';  
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':after{
                    pointer-events: none;
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    border-radius: 50%;
                    content: "";
                    z-index: -1;
                    -webkit-box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;
                    top: -' . $styledata[47] . 'px;
                    left: -' . $styledata[47] . 'px;
                    padding: ' . $styledata[47] . 'px;
                    box-shadow: ' . ($styledata[39] / 4 * 3) . 'px ' . ($styledata[39] / 4 * 3) . 'px 0 transparent;  
                    -webkit-transition: all 0.4s;
                    -moz-transition: all 0.4s;
                    transition: all 0.4s;
                    -webkit-transform: rotate(-90deg);
                    -moz-transform: rotate(-90deg);
                    -ms-transform: rotate(-90deg);
                    transform: rotate(-90deg);
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
                    border-radius:' . $styledata[27] . 'px;   
                    box-shadow: 0 0 0 ' . $styledata[39] . 'px ' . $styledata[33] . '; 
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover:after{                   
                    opacity: 1;
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    transform: rotate(0deg);
                    box-shadow: ' . ($styledata[39] / 4 * 3) . 'px ' . ($styledata[39] / 4 * 3) . 'px 0 ' . $styledata[33] . ';  
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                     font-size: ' . $styledata[3] . 'px;
                     color:' . $styledata[19] . ';
                     line-height: ' . $styledata[15] . 'px; 
                     -webkit-transition: all 0.4s;
                    -moz-transition: all 0.4s;
                    transition: all 0.4s;
                    -webkit-transform: scale(0.8);
                    -moz-transform: scale(0.8);
                    -ms-transform: scale(0.8);
                    transform: scale(0.8);
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover  .oxi-icons {                    
                     color:' . $styledata[31] . ';
                     -webkit-transform: scale(1);
                    -moz-transform: scale(1);
                    -ms-transform: scale(1);
                    transform: scale(1);
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                    .oxi-addons-container .oxi-icon-' . $oxiid . '{
                        max-width: ' . $styledata[16] . 'px;                  
                        height: ' . $styledata[16] . 'px;              
                        margin: ' . $styledata[8] . 'px ' . $styledata[12] . 'px;
                        box-shadow: 0 0 0 ' . $styledata[40] . 'px ' . $styledata[21] . ';
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':after{
                        top: -' . $styledata[48] . 'px;
                        left: -' . $styledata[48] . 'px;
                        padding: ' . $styledata[48] . 'px;
                        box-shadow: ' . ($styledata[40] / 4 * 3) . 'px ' . ($styledata[40] / 4 * 3) . 'px 0 transparent;
                    }                
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':hover,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':focus,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':active{
                        max-width: ' . $styledata[16] . 'px;
                        height: ' . $styledata[16] . 'px;    
                        box-shadow: 0 0 0 ' . $styledata[40] . 'px ' . $styledata[33] . ';    
                        margin: ' . $styledata[8] . 'px ' . $styledata[12] . 'px;     
                        border-radius:' . $styledata[28] . 'px;    
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':hover:after{                   
                         box-shadow: ' . ($styledata[40] / 4 * 3) . 'px ' . ($styledata[40] / 4 * 3) . 'px 0 ' . $styledata[33] . ';  
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
                        box-shadow: 0 0 0 ' . $styledata[41] . 'px ' . $styledata[21] . ';
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':after{
                        top: -' . $styledata[49] . 'px;
                        left: -' . $styledata[49] . 'px;
                        padding: ' . $styledata[49] . 'px;
                        box-shadow: ' . ($styledata[41] / 4 * 3) . 'px ' . ($styledata[41] / 4 * 3) . 'px 0 transparent;
                    }                
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':hover,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':focus,
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':active{
                        max-width: ' . $styledata[17] . 'px;
                        height: ' . $styledata[17] . 'px;    
                        box-shadow: 0 0 0 ' . $styledata[41] . 'px ' . $styledata[33] . ';    
                        margin: ' . $styledata[9] . 'px ' . $styledata[13] . 'px;     
                        border-radius:' . $styledata[29] . 'px;    
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':hover:after{                   
                        box-shadow: ' . ($styledata[41] / 4 * 3) . 'px ' . ($styledata[41] / 4 * 3) . 'px 0 ' . $styledata[33] . ';  
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                         font-size: ' . $styledata[5] . 'px;
                         line-height: ' . $styledata[17] . 'px; 
                    }
                }';

    echo OxiAddonsInlineCSSData($css);
}
