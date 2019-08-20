<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_team_style_8_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $listid = $value['id'];
        $data = explode('||#||', $value['files']);
        $socialdata = '';
        if ($data[7] != '{|}{|}') {
            $socialmodal = explode("{|}||{|}", $data[7]);
            $socialdata .= '<div class="member-icons">';
            foreach ($socialmodal as $SOC) {
                $rand = rand();
                if (!empty($SOC)) {
                    $socialalldata = explode("{|}{|}", $SOC);
                    $socialdata .= ' <a href="' . OxiAddonsUrlConvert($socialalldata[1]) . '" class="member-icon member-iconsdd member-icon-' . $rand . '">' . oxi_addons_font_awesome($socialalldata[0]) . '</a>';
                    $socialstyle = explode("{|}||{|}", $stylefiles[1]);
                    foreach ($socialstyle as $socialSS) {
                        $styledatacss = explode("{|}{|}", $socialSS);
                        if (!empty($styledatacss[1]) && $styledatacss[1] == $socialalldata[0]) {
                            $css .= '   .oxi-addons-team-' . $oxiid . ' .member-icon.member-icon-' . $rand . ' .oxi-icons{
                                            color: ' . $styledatacss[2] . ';
                                        }
                                        .oxi-addons-team-' . $oxiid . ' .member-icon.member-icon-' . $rand . '{
                                            background: ' . $styledatacss[3] . ';
                                            border-color: ' . $styledatacss[4] . ' !important;
                                        }
                                        .oxi-addons-team-' . $oxiid . ' .member-icon:hover.member-icon-' . $rand . ' .oxi-icons{
                                            color: ' . $styledatacss[5] . ';
                                        }
                                        .oxi-addons-team-' . $oxiid . ' .member-icon:hover.member-icon-' . $rand . '{
                                            background: ' . $styledatacss[6] . ';
                                            border-color: ' . $styledatacss[7] . ' !important;
                                        }';
                        }
                    }
                }
            }
            $socialdata .= '</div>';
        }
        echo '<div class="' . OxiAddonsItemRows($styledata, 3) . ' oxi-addons-team-' . $oxiid . ' ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 65) . '>';
        echo '  <div class="oxi-team-show-body">
                    <div class="oxi-team-show  oxi-team-center">
                        <div class="member-photo">
                            <div class="oxi-team-pic-size">
                                <img src="' . OxiAddonsUrlConvert($data[5]) . '" alt="' . OxiAddonsTextConvert($data[1]) . '">
                            </div>
                        </div>
                       <div class="member-content-absolute">                                
                            ' . $socialdata . ' 
                            <div class="member-info ">
                                <h3 class="member-name">' . OxiAddonsTextConvert($data[1]) . '</h3>                          
                                <span class="member-role">' . OxiAddonsTextConvert($data[3]) . '</span>
                            </div>
                        </div>
                    </div>
                </div>';
        if ($user == 'admin') {
            echo '<div class="oxi-addons-admin-absulote">
                    <div class="oxi-addons-admin-absulate-edit">
                        <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditteamdata") . '
                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                            <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                        </form>
                    </div>
                    <div class="oxi-addons-admin-absulate-delete">
                        <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteteamdata") . '
                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                            <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                        </form>
                    </div>
                </div>';
        }
        echo '</div> ';
    }
    echo ' </div>
        </div> ';
    $Bordercolor = strpos($styledata[97], 'Left');
    if ($Bordercolor === FALSE) {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon.member-iconsdd{
                        border-left:0px solid transparent;
                     }';
    } else {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon.member-iconsdd{
                        border-left: ' . $styledata[211] . 'px ' . $styledata[101] . ';
                     }';
    }
    $Bordercolor = strpos($styledata[97], 'Right');
    if ($Bordercolor === FALSE) {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon.member-iconsdd{
                        border-right:0px solid transparent;
                     }';
    } else {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon.member-iconsdd{
                        border-right: ' . $styledata[211] . 'px ' . $styledata[101] . ';
                     }';
    }
    $Bordercolor = strpos($styledata[97], 'Top');
    if ($Bordercolor === FALSE) {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon.member-iconsdd{
                        border-top:0px solid transparent;
                     }';
    } else {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon.member-iconsdd{
                        border-top: ' . $styledata[211] . 'px ' . $styledata[101] . ';
                     }';
    }
    $Bordercolor = strpos($styledata[97], 'Bottom');
    if ($Bordercolor === FALSE) {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon.member-iconsdd{
                        border-bottom:0px solid transparent;
                     }';
    } else {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon.member-iconsdd{
                        border-bottom: ' . $styledata[211] . 'px ' . $styledata[101] . ';
                     }';
    }
    $Bordercolor = strpos($styledata[99], 'Left');
    if ($Bordercolor === FALSE) {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon:hover.member-iconsdd{
                        border-left:0px solid transparent !important;
                     }';
    } else {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon:hover.member-iconsdd{
                        border-left: ' . $styledata[211] . 'px ' . $styledata[101] . ';
                     }';
    }
    $Bordercolor = strpos($styledata[99], 'Right');
    if ($Bordercolor === FALSE) {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon:hover.member-iconsdd{
                        border-right:0px solid transparent !important;
                     }';
    } else {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon:hover.member-iconsdd{
                        border-right: ' . $styledata[211] . 'px ' . $styledata[101] . ';
                     }';
    }
    $Bordercolor = strpos($styledata[99], 'Top');
    if ($Bordercolor === FALSE) {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon:hover.member-iconsdd{
                        border-top:0px solid transparent !important;
                     }';
    } else {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon:hover.member-iconsdd{
                        border-top: ' . $styledata[211] . 'px ' . $styledata[101] . ';
                     }';
    }
    $Bordercolor = strpos($styledata[99], 'Bottom');
    if ($Bordercolor === FALSE) {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon:hover.member-iconsdd{
                        border-bottom:0px solid transparent !important;
                     }';
    } else {
        $css .= '.oxi-addons-team-' . $oxiid . ' .member-icon:hover.member-iconsdd{
                        border-bottom: ' . $styledata[211] . 'px ' . $styledata[101] . ';
                     }';
    }
    $css .= '.oxi-addons-team-' . $oxiid . '{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 27) . ';
            }
            .oxi-addons-team-' . $oxiid . ' .oxi-team-show-body {
                -webkit-transform: translateY(0px);
                -ms-transform: translateY(0px) translateX(0px);
                -moz-transform:translateY(0px) translateX(0px);
                -o-transform: translateY(0px) translateX(0px);
                transform: translateY(0px) translateX(0px);
            }
            .oxi-addons-team-' . $oxiid . ' .oxi-team-show-body:hover {
                -webkit-transform: translateY(' . $styledata[105] . 'px) translateX(' . $styledata[103] . 'px);
                -ms-transform: translateY(' . $styledata[105] . 'px) translateX(' . $styledata[103] . 'px);
                -moz-transform: translateY(' . $styledata[105] . 'px) translateX(' . $styledata[103] . 'px);
                -o-transform: translateY(' . $styledata[105] . 'px) translateX(' . $styledata[103] . 'px);
                transform: translateY(' . $styledata[105] . 'px) translateX(' . $styledata[103] . 'px);
            }
             .oxi-addons-team-' . $oxiid . ' .oxi-team-show{
                width: 100%;
                float: left;
                ' . OxiAddonsBoxShadowSanitize($styledata, 51) . ';
                -webkit-transform: translateY(0) translateX(0); 
                transform: translateY(0) translateX(0); 
                -ms-transform: translateY(0) translateX(0); 
                -o-transform: translateY(0) translateX(0); 
                -moz-transform: translateY(0) translateX(0); 
            }
            .oxi-addons-team-' . $oxiid . ' .oxi-team-show:hover{
                ' . OxiAddonsBoxShadowSanitize($styledata, 58) . ';
            }
            .oxi-addons-team-' . $oxiid . ' .oxi-team-show-body{
                max-width: ' . $styledata[43] . 'px;
                width: 100%;
                margin: 0 auto;
            }
            .oxi-addons-team-' . $oxiid . ' .member-photo {
                position: relative;
                width: 100%;
                float:left;
                display: flex;
                align-items: flex-end;
            }
            .oxi-addons-team-' . $oxiid . ' .oxi-team-pic-size{
                width: 100%;
                float: left;
                position: relative;
            }
            .oxi-addons-team-' . $oxiid . ' .oxi-team-pic-size:after{
                padding-bottom: ' . ($styledata[47] / $styledata[43] * 100) . '%;
                content: "";
                display: block;
            }
            .oxi-addons-team-' . $oxiid . ' .oxi-team-pic-size img{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: block;
            }
            .oxi-addons-team-' . $oxiid . ' .member-icons{
                float:left;                
                z-index: +1;
                width:100%;                               
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 107) . ';  
                background:' . $styledata[9] . ';      
                text-align: center;          
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .oxi-addons-team-' . $oxiid . ' .member-icon {
                line-height: ' . $styledata[191] . 'px;    
                height:' . $styledata[191] . 'px;
                width:' . $styledata[187] . 'px;
                display: flex;
                align-items:center;
                justify-content:center;
                Border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 243) . ';  
                margin:' . OxiAddonsPaddingMarginSanitize($styledata, 259) . ';  
            }            
            .oxi-addons-team-' . $oxiid . ' .member-icon .oxi-icons {
                font-size: ' . $styledata[175] . 'px;
            }
            .oxi-addons-team-' . $oxiid . ' .member-content-absolute {
                width:100%;
                float:left; 
            }
            .oxi-addons-team-' . $oxiid . ' .member-info {                
                width: 100%;                
                float:left;
                display:flex;
                flex-direction:column;   
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . ';
                background:' . $styledata[7] . ';    
            }
            .oxi-addons-team-' . $oxiid . ' .member-name {
                font-size: ' . $styledata[69] . 'px;
                margin: 0;
                margin-bottom: 0px;
                margin-top: 0px;
                color: ' . $styledata[73] . ';
                ' . OxiAddonsFontSettings($styledata, 75) . '
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 81) . ';
            }
            .oxi-addons-team-' . $oxiid . ' span.member-role {
                font-size: ' . $styledata[123] . 'px;
                margin: 0;
                margin-bottom: 0px;
                margin-top: 0px;
                color: ' . $styledata[127] . ';
                ' . OxiAddonsFontSettings($styledata, 129) . '
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';    
            } 
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi-addons-team-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 28) . ';
                }
                .oxi-addons-team-' . $oxiid . ' .oxi-team-show-body{
                    max-width: ' . $styledata[43] . 'px;                  
                }
                .oxi-addons-team-' . $oxiid . ' .oxi-team-pic-size:after{
                    padding-bottom: ' . ($styledata[48] / $styledata[44] * 100) . '%;                  
                }
                .oxi-addons-team-' . $oxiid . ' .member-icons{                                    
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 108) . ';                     
                }
                .oxi-addons-team-' . $oxiid . ' .member-icon {
                    line-height: ' . $styledata[192] . 'px;    
                    height:' . $styledata[192] . 'px;
                    width:' . $styledata[188] . 'px;                   
                    Border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 244) . ';  
                    margin:' . OxiAddonsPaddingMarginSanitize($styledata, 260) . ';  
                }            
                .oxi-addons-team-' . $oxiid . ' .member-icon .oxi-icons {
                    font-size: ' . $styledata[176] . 'px;
                }
                .oxi-addons-team-' . $oxiid . ' .member-info { 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 12) . ';
                }
                .oxi-addons-team-' . $oxiid . ' .member-name {
                    font-size: ' . $styledata[70] . 'px;                   
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 82) . ';
                }
                .oxi-addons-team-' . $oxiid . ' span.member-role {
                    font-size: ' . $styledata[124] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 136) . ';    
                } 
            }
            @media only screen and (max-width : 668px){ 
                .oxi-addons-team-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';
                }
                .oxi-addons-team-' . $oxiid . ' .oxi-team-show-body{
                    max-width: ' . $styledata[44] . 'px;                  
                }
                .oxi-addons-team-' . $oxiid . ' .oxi-team-pic-size:after{
                    padding-bottom: ' . ($styledata[49] / $styledata[45] * 100) . '%;                  
                }
                .oxi-addons-team-' . $oxiid . ' .member-icons{                                    
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 109) . ';                     
                }
                .oxi-addons-team-' . $oxiid . ' .member-icon {
                    line-height: ' . $styledata[193] . 'px;    
                    height:' . $styledata[193] . 'px;
                    width:' . $styledata[189] . 'px;                   
                    Border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 245) . ';  
                    margin:' . OxiAddonsPaddingMarginSanitize($styledata, 261) . ';  
                }            
                .oxi-addons-team-' . $oxiid . ' .member-icon .oxi-icons {
                    font-size: ' . $styledata[177] . 'px;
                }
                .oxi-addons-team-' . $oxiid . ' .member-info { 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
                }
                .oxi-addons-team-' . $oxiid . ' .member-name {
                    font-size: ' . $styledata[71] . 'px;                   
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
                }
                .oxi-addons-team-' . $oxiid . ' span.member-role {
                    font-size: ' . $styledata[125] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 137) . ';    
                } 
            }';
    OxiAddonsInlineCSSData($css);
}
