<?php

if (!defined('ABSPATH'))
    exit;

function oxi_icon_style_4_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $href = '';
    $target = '';
    echo '<div class="oxi-addons-container">';
    echo '<div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $listfiles = explode('||#||', $value['files']);
        echo '<div class="' . OxiAddonsItemRows($styledata, 37) . ' oxi-addons-center  ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 23) . '>';
        if ($listfiles[7] != '') {
            $hreffirst = '<a href="' . OxiAddonsUrlConvert($listfiles[7]) . '" target = "' . $styledata[1] . '"  class="oxi-icon oxi-icon-' . $oxiid . '" id="' . $listfiles[5] . '">';
            $hreflast = '</a>';
        } else {
            $hreffirst = '<div  class="oxi-icon oxi-icon-' . $oxiid . '" id="' . $listfiles[5] . '">';
            $hreflast = '</div>';
        }
        echo $hreffirst;
        echo '' . oxi_addons_font_awesome($listfiles[3]) . '';
        echo $hreflast;
        if ($user == 'admin') {
        echo '  <div class="oxi-addons-admin-absulote">
                    <div class="oxi-addons-admin-absulate-edit">
                        <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditicondata") . '
                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                            <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                        </form>
                    </div>
                    <div class="oxi-addons-admin-absulate-delete">
                        <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteicondata") . '
                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                            <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                        </form>
                    </div>
                </div>';
        }
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    $css = '.oxi-addons-container .oxi-icon-' . $oxiid . '{
                    max-width: ' . $styledata[15] . 'px;
                    width: 100%;
                    position:relative;
                    height: ' . $styledata[15] . 'px;                                      
                    margin: ' . $styledata[7] . 'px ' . $styledata[11] . 'px;
                    background:' . $styledata[21] . ';
                    border-radius:' . $styledata[27] . 'px; 
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':hover,
                .oxi-addons-container .oxi-icon-' . $oxiid . ':focus,
                .oxi-addons-container .oxi-icon-' . $oxiid . ':active{
                    max-width: ' . $styledata[15] . 'px;
                    width: 100%;
                    height: ' . $styledata[15] . 'px;                  
                    margin: ' . $styledata[7] . 'px ' . $styledata[11] . 'px;
                    animation-duration: ' . $styledata[25] . 's;  
                    background:' . $styledata[21] . ';
                    border-radius:' . $styledata[27] . 'px;
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . ':after{  
                    pointer-events: none;
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    border-radius:' . $styledata[27] . 'px;
                    content: "";
                    -webkit-box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;
                    box-shadow: 0 0 0 ' . $styledata[33] . 'px ' . $styledata[31] . ';
                    top: 0px;
                    left: 0px;
                }
                .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                     font-size: ' . $styledata[3] . 'px;
                     color:' . $styledata[19] . ';
                     line-height: ' . $styledata[15] . 'px; 
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                    .oxi-addons-container .oxi-icon-' . $oxiid . '{
                        max-width: ' . $styledata[16] . 'px;                  
                        height: ' . $styledata[16] . 'px;              
                        margin: ' . $styledata[8] . 'px ' . $styledata[12] . 'px;
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                         line-height: ' . $styledata[16] . 'px; 
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':after{  
                       box-shadow: 0 0 0 ' . $styledata[34] . 'px ' . $styledata[31] . ';
                    }
                }
                @media only screen and (max-width : 668px){
                    .oxi-addons-container .oxi-icon-' . $oxiid . '{
                        max-width: ' . $styledata[17] . 'px;                  
                        height: ' . $styledata[17] . 'px;              
                        margin: ' . $styledata[9] . 'px ' . $styledata[13] . 'px;
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons {
                         line-height: ' . $styledata[17] . 'px; 
                    }
                    .oxi-addons-container .oxi-icon-' . $oxiid . ':after{  
                       box-shadow: 0 0 0 ' . $styledata[35] . 'px ' . $styledata[31] . ';
                    }
                }';
    echo OxiAddonsInlineCSSData($css);
}
