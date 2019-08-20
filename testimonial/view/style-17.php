<?php

if (!defined('ABSPATH'))
    exit;

function oxi_testimonial_style_17_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
        echo'<div class="oxi-addons-container">
                <div class="oxi-addons-row">';
                foreach ($listdata as $value) {
                    $data = explode('||#||', $value['files']);
                    $image = $button  = $name = $company = $rating = '';
                        if ($data[1] != '') {
                            $image = '
                                <div class="oxi_addons_testimonial_top_left">
                                    <img src="' . OxiAddonsUrlConvert($data[1]) . '" alt="" class="oxi-img">
                                </div>
                            ';
                        }
                        if ($data[11] != '') {
                            $button = '
                              <div class="oxi_addons_testimonial_bottom_content">
                                    <div class="oxi_addons_testimonial_bottom_details">
                                    ' . OxiAddonsTextConvert($data[11]) . '
                                    </div>
                                </div>
                            ';
                        }
                        if ($data[3] != '') {
                            $name = '
                                <div class="oxi_addons_testimonial_name">' . OxiAddonsTextConvert($data[3]) . '</div>
                            ';
                        }
                        if ($data[7] != '') {
                            $company = '
                                <div class="oxi_addons_testimonial_working">' . OxiAddonsTextConvert($data[5]) . ' <a href="' . OxiAddonsUrlConvert($data[13]) . '">' . OxiAddonsTextConvert($data[7]) . '</a></div>
                            ';
                        } 
                        if ($data[9] != '') {
                            $rating = '
                                <div class="oxi_addons_testimonial_rating">Review: ' . OxiAddonsPublicRate($data[9]) . ' </div>
                            ';
                        } 
                echo'
                    <div class="oxi_addons_testimonial_container ' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '">
                        <div class="oxi_addons_testimonial_' . $oxiid . '_box"  ' . OxiAddonsAnimation($styledata, 97) . '>
                            <div class="oxi_addons_testimonial_content">
                                <div class="oxi_addons_testimonial_top_content">
                                    '. $image .'
                                    <div class="oxi_addons_testimonial_top_right">
                                        '. $name .' 
                                        '. $company .' 
                                        '. $rating .'  
                                    </div>
                                </div>
                                '.$button.'
                            </div>
                        </div>';
                if ($user == 'admin') {
                echo '  <div class="oxi-addons-admin-absulote">
                            <div class="oxi-addons-admin-absulate-edit">
                                <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEdittestimonialdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                </form>
                            </div>
                            <div class="oxi-addons-admin-absulate-delete">
                                <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletetestimonialdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                </form>
                            </div>
                        </div>';
                }
                echo'</div>';
                }
        echo '
                </div>
            </div>';    
        $css='
            .oxi_addons_testimonial_container {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . ';
            }
            .oxi_addons_testimonial_' . $oxiid . '_box {
                max-width: '.$styledata[7].'px;
                margin: 0 auto;
                background: '.$styledata[11].';
                border-width: '.$styledata[13].'px; 
                border-style:  '.$styledata[29].';
                border-color:  '.$styledata[30].';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 101) . ';
                transition: all .3s linear;
                overflow: hidden;
            }
            .oxi_addons_testimonial_' . $oxiid . '_box:hover {
                background: '.$styledata[67].';
                border-style:  '.$styledata[69].';
                border-color:  '.$styledata[70].';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 107) . ';
                transition: all .3s linear;
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_content {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_content{
                width: 100%;
                display: flex;
                justify-content: flex-start;
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_left{
                width: '.$styledata[89].'px;
                height: '.$styledata[93].'px;
                position: relative;
                left: 0;
                top: 0;
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_left::after{
                content: "";
                display: block;
                padding-bottom:  '.$styledata[93].'px;;
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_left .oxi-img{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_right{
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                text-align: left;
                padding: 10px 20px;
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_name{
                width: 100%;
                font-size: '.$styledata[141].'px;
                color: '.$styledata[145].';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 155) . ';
                ' . OxiAddonsFontSettings($styledata, 149) . ';
            }
            .oxi_addons_testimonial_' . $oxiid . '_box:hover .oxi_addons_testimonial_name{
                color: '.$styledata[147].';
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_working{
                width: 100%;
                font-size: '.$styledata[171].'px;
                color: '.$styledata[175].';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 187) . ';
                ' . OxiAddonsFontSettings($styledata, 181) . ';
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_working a{
                color: '.$styledata[177].';
            }
            .oxi_addons_testimonial_' . $oxiid . '_box:hover .oxi_addons_testimonial_working a{
                color: '.$styledata[179].';
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_rating{
                font-size: '.$styledata[203].'px;
                color: '.$styledata[207].';
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_rating i{
                color: '.$styledata[225].';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 209) . ';
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_bottom_content{
                width: 100%;
            }
            .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_bottom_details{
                font-size: '.$styledata[113].'px;
                color: '.$styledata[117].';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 125) . ';
                ' . OxiAddonsFontSettings($styledata, 119) . ';
            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .oxi_addons_testimonial_container {
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . ';
                }
                .oxi_addons_testimonial_' . $oxiid . '_box {
                    max-width: '.$styledata[8].'px;
                    border-width: '.$styledata[14].'px; 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 34) . ';
                }
                .oxi_addons_testimonial_' . $oxiid . '_box:hover {
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 74) . ';
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_left{
                    width: '.$styledata[90].'px;
                    height: '.$styledata[94].'px;
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_left::after{
                    padding-bottom:  '.$styledata[94].'px;;
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_name{
                    font-size: '.$styledata[142].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 156) . ';
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_working{
                    font-size: '.$styledata[172].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 188) . ';
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_rating{
                    font-size: '.$styledata[204].'px;
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_bottom_details{
                    font-size: '.$styledata[114].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 126) . ';
                }
           }
           @media only screen and (max-width : 668px){
                .oxi_addons_testimonial_container {
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . ';
                }
                .oxi_addons_testimonial_' . $oxiid . '_box {
                    max-width: '.$styledata[9].'px;
                    border-width: '.$styledata[15].'px; 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
                }
                .oxi_addons_testimonial_' . $oxiid . '_box:hover {
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 75) . ';
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_left{
                    width: '.$styledata[91].'px;
                    height: '.$styledata[95].'px;
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_left::after{
                    padding-bottom:  '.$styledata[95].'px;;
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_name{
                    font-size: '.$styledata[143].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . ';
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_working{
                    font-size: '.$styledata[173].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 189) . ';
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_rating{
                    font-size: '.$styledata[205].'px;
                }
                .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_bottom_details{
                    font-size: '.$styledata[115].'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 127) . ';
                }
            }';
        OxiAddonsInlineCSSData($css);
}