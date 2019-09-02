<?php

if (!defined('ABSPATH'))
    exit;

function oxi_step_flow_style_1_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
   
    $css = '';
    echo '<div class="oxi-addons-container">';
    echo '<div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $icon = $heading = $content = '';
        if ($data[1] != '') {
            $icon = '<div class="oxi-addons-step-flow-icon" >
                            <div class="oxi-addons-step-flow-icon-icon" >
                                ' . oxi_addons_font_awesome($data[1]) . '
                            </div>
                    </div>';
        }
        if ($data[3] != '') {
            $heading = '<div class="oxi-addons-step-flow-heading">
                            ' . OxiAddonsTextConvert($data[3]) . '
                        </div>';
        }
        if ($data[5] != '') {
            $content = '<div class="oxi-addons-step-flow-content">
                          ' . OxiAddonsTextConvert($data[5]) . '
                        </div>';
        }

        echo '<div class="oxi-addons-step-flow-full-div ' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '">';
        echo '<div class="oxi-addons-step-flow-' . $oxiid . '" >
                  <div class="oxi-addons-step-flow-' . $oxiid . '-data">
                        ' . $icon . '
                        ' . $heading . '
                        ' . $content . '
                  </div>
              </div>';
       if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                            <div class="oxi-addons-admin-absulate-edit">
                                <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditstep_flowdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                </form>
                            </div>
                            <div class="oxi-addons-admin-absulate-delete">
                                <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletestep_flowdata") . '
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
    $css .= '.oxi-addons-step-flow-' . $oxiid . '{
                    display: flex;
                    width: 100%;
                    position: relative;
                    max-width: 350px;
                    margin: 0 auto;
                    padding: 10px;
                }
                .oxi-addons-step-flow-' . $oxiid . '-data{
                    width: 100%;
                    float:left; 
                    //' . OxiAddonsBGImage($styledata, 11) . '
                    background: #d6d6d6;
                    border-radius: 0px;
                    border-width: 0px;
                    border-style:solid; 
                    border-color:red;
                    padding: 10px; 
//                    ' . OxiAddonsBoxShadowSanitize($styledata, 83) . '
                }
                .oxi-addons-step-flow-' . $oxiid . ' .oxi-addons-step-flow-icon{
                    width: 100%;
                    float:left;
                    text-align: center;
                }
                .oxi-addons-step-flow-' . $oxiid . ' .oxi-addons-step-flow-icon-icon{
                    
                        display: inline-block;
                        width: 120px;
                        height: 120px;
                        background: #865d5d;
                        border-radius: 73px;
                        border-width: 0px;
                        border-style: solid;
                        border-color: white;
                        position: relative;
                        z-index: 2;
                        }
                  .oxi-addons-step-flow-' . $oxiid . ' .oxi-addons-step-flow-icon-icon:before{
                    position: absolute;
                     content: "";
                    left: 100%;
                    transform: translateY(-50%);
                    top: 50%;
                    height: 2px;
                    border-left: 350px solid;
                    z-index: 1;
                    }
                .oxi-addons-step-flow-full-div:last-child .oxi-addons-step-flow-icon-icon:before {
                        display :none ;
                    }
                .oxi-addons-step-flow-' . $oxiid . ' .oxi-icons{
                   width: 100%;
                   height:100%;
                   display: flex;
                  justify-content: center;
                  align-items: center;
                   color: white;
                   font-size: 50px;
                   
                }
                .oxi-addons-step-flow-' . $oxiid . ' .oxi-addons-step-flow-heading{
                   width: 100%;
                   float:left;
                   color: #000;
                   font-size: 20px;
                   //' . OxiAddonsFontSettings($styledata, 123) . '    
                   padding: 10px;   
                }
                .oxi-addons-step-flow-' . $oxiid . ' .oxi-addons-step-flow-content{
                   width: 100%;
                   float:left;
                   color: #000;
                   font-size: 15px;
                   //' . OxiAddonsFontSettings($styledata, 151) . '    
                   padding: 10px;   
                }
                
               
//                @media only screen and (min-width : 669px) and (max-width : 993px){
//                   .oxi-addons-step-flow-' . $oxiid . '{
//                        max-width: ' . $styledata[4] . 'px;
//                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';
//                    }
//                    .oxi-addons-step-flow-' . $oxiid . '-data{ 
//                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
//                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';
//                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 52) . '; 
//                    }
//                    .oxi-addons-step-flow-' . $oxiid . ' .oxi-icons{
//                        width:' . $styledata[180] . 'px;
//                        height:' . $styledata[180] . 'px;
//                        line-height:' . $styledata[180] . 'px;
//                        font-size: ' . $styledata[94] . 'px;
//                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 188) . ';
//                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
//                    }
//                    .oxi-addons-step-flow-' . $oxiid . ' .oxi-addons-step-flow-heading{
//                      
//                       font-size: ' . $styledata[118] . 'px;
//                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';   
//                    }
//                    .oxi-addons-step-flow-' . $oxiid . ' .oxi-addons-step-flow-content{
//                       font-size: ' . $styledata[146] . 'px;   
//                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 158) . ';   
//                    } 
//                }
//                @media only screen and (max-width : 668px){
//                    .oxi-addons-step-flow-' . $oxiid . '{
//                        max-width: ' . $styledata[5] . 'px;
//                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
//                    }
//                    .oxi-addons-step-flow-' . $oxiid . '-data{ 
//                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
//                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';
//                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 53) . '; 
//                    }
//                    .oxi-addons-step-flow-' . $oxiid . ' .oxi-icons{
//                        width:' . $styledata[181] . 'px;
//                        height:' . $styledata[181] . 'px;
//                        line-height:' . $styledata[181] . 'px;
//                        font-size: ' . $styledata[95] . 'px;
//                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 189) . ';
//                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
//                }
//                    .oxi-addons-step-flow-' . $oxiid . ' .oxi-addons-step-flow-heading{
//                      
//                       font-size: ' . $styledata[119] . 'px;
//                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';   
//                    }
//                    .oxi-addons-step-flow-' . $oxiid . ' .oxi-addons-step-flow-content{
//                       font-size: ' . $styledata[147] . 'px;   
//                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 159) . ';   
//                    } 
//                }
                ';

    echo OxiAddonsInlineCSSData($css);
   }
