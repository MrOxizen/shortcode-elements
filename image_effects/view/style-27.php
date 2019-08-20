<?php

if (!defined('ABSPATH'))
    exit;

function oxi_image_effects_style_27_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo '<div class="oxi-addons-container">
                 <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $valuefile = explode('||#||', $value['files']);
        $valueurl1st = $valueurllast = $heading = $valueurlbtn = $content = '';
        if (!empty($valuefile[7])) {
            if (!empty($valuefile[5])) {
                $valueurlbtn = '<div class="oxi-addons-image-effects-button"><a href="' . OxiAddonsUrlConvert($valuefile[7]) . '"  target="' . $styledata[249] . '" class="img-btn ihewc-button ' . $styledata[129] . '">' . oxi_addons_html_decode($valuefile[5]) . '</a></div>';
            } else {
                $valueurl1st = '<a href="' . OxiAddonsUrlConvert($valuefile[7]) . '" target="' . $styledata[249] . '">';
                $valueurllast = '</a>';
            }
        }

        if (!empty($valuefile[1])) {
            $heading = '<h3 class="ihewc-heading ihewc-delay-sm ' . $styledata[69] . '">' . OxiAddonsTextConvert($valuefile[1]) . '</h3>';
        }
        if (!empty($valuefile[3])) {
            $content = '<div class="ihewc-content ihewc-delay-sm ' . $styledata[99] . '">' . OxiAddonsTextConvert($valuefile[3]) . '</div>';
        }
        echo '<div class="' . OxiAddonsItemRows($styledata, 7) . '  ' . OxiAddonsAdminDefine($user) . '" >';
        echo '<div class="ihewc-hover-padding-' . $oxiid . '" ' . OxiAddonsAnimation($styledata, 51) . '>
                ' . $valueurl1st . '
                <div class="ihewc-hover ihewc-hover-' . $oxiid . ' ' . $styledata[3] . '">
                    <div class="ihewc-hover-figure">
                        <div class="ihewc-hover-image">
                            <img src="' . OxiAddonsUrlConvert($valuefile[9]) . '">
                        </div>
                        <div class="ihewc-hover-figure-caption">
                            <div class="ihewc-hover-figure-caption-table">
                                <div class="ihewc-hover-figure-caption-content ' . $styledata[5] . '">
                                    ' . $heading . '
                                    ' . $content . '
                                    ' . $valueurlbtn . '
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                ' . $valueurllast . '  
              </div>';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                                <div class="oxi-addons-admin-absulate-edit">
                                    <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditimage_effectsdata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                    </form>
                                </div>
                                <div class="oxi-addons-admin-absulate-delete">
                                    <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteimage_effectsdata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                    </form>
                                </div>
                            </div>';
        }
        echo '</div>';
    }


    echo '    </div>
          </div>';
    $css = '.ihewc-hover-padding-' . $oxiid . '{
                max-width:    ' . $styledata[11] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 35) . ';
                margin: 0 auto;
            }
            .ihewc-hover-' . $oxiid . '{
               ' . OxiAddonsBoxShadowSanitize($styledata, 55) . '
            }
            .ihewc-hover-' . $oxiid . ':hover,
            .ihewc-hover-' . $oxiid . '.oxi-touch{
               ' . OxiAddonsBoxShadowSanitize($styledata, 63) . '
            }
            .ihewc-hover-' . $oxiid . ':hover,
            .ihewc-hover-' . $oxiid . ':hover:before,
            .ihewc-hover-' . $oxiid . ':hover:after,
            .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure,
            .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure:before,
            .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure:after,
            .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure-caption,
            .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure-caption:before,
            .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure-caption:after{
                   background: ' . $styledata[15] . '
            }
            .ihewc-hover-' . $oxiid . ' .ihewc-hover-image:after{
                padding-bottom: ' . ($styledata[13] / $styledata[11] * 100) . '%;
                display: block;
                content: "";
            }
            .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption-content{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 19) . ';
            }
            .ihewc-hover-' . $oxiid . ',
            .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure,
            .ihewc-hover-' . $oxiid . ' .ihewc-hover-image,
            .ihewc-hover-' . $oxiid . ' .ihewc-hover-image img,  
            .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption,
            .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption-content {
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 251) . ';
            }
            .ihewc-hover-' . $oxiid . ':hover,
            .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure,
            .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-image,
            .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-image img,  
            .ihewc-hover-' . $oxiid . ':hover.ihewc-hover-figure .ihewc-hover-figure-caption,
            .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure .ihewc-hover-figure-caption-content {
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 267) . ';
            }
            
            .ihewc-hover-' . $oxiid . ' h3.ihewc-heading{
                font-size:' . $styledata[71] . 'px;
                color: ' . $styledata[75] . ';
                ' . OxiAddonsFontSettings($styledata, 77) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
                margin:0px;
            }
            .ihewc-hover-' . $oxiid . ' .ihewc-content{
                font-size:' . $styledata[101] . 'px;
                color: ' . $styledata[105] . ';
                ' . OxiAddonsFontSettings($styledata, 107) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 113) . ';
                margin:0px;
            }
            .ihewc-hover-' . $oxiid . ' .oxi-addons-image-effects-button{
                text-align:' . (explode(":", $styledata[179])[0]) . ';
            }
             .ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button {
                font-size:' . $styledata[131] . 'px;
                color: ' . $styledata[135] . ';
                background: ' . $styledata[137] . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 139) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 159) . ';
                border-color: ' . $styledata[156] . ';
                border-style: ' . $styledata[155] . ';
                ' . OxiAddonsFontSettings($styledata, 175) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 181) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 197) . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 237) . '
                text-align:center;
                display:inline-block;
            }
            .ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:hover,
            .ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:focus, 
            .ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:active {
                color: ' . $styledata[213] . ';
                background: ' . $styledata[215] . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 221) . ';
                border-color: ' . $styledata[218] . ';
                border-style: ' . $styledata[217] . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 243) . '

            }
            @media only screen and (min-width : 669px) and (max-width : 993px){
                .ihewc-hover-padding-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 36) . ';
                }
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption-content{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 20) . ';
                }
                .ihewc-hover-' . $oxiid . ',
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure,
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-image,
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-image img,  
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption,
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption-content {
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 252) . ';
                }
                .ihewc-hover-' . $oxiid . ':hover,
                .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure,
                .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-image,
                .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-image img,  
                .ihewc-hover-' . $oxiid . ':hover.ihewc-hover-figure .ihewc-hover-figure-caption,
                .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure .ihewc-hover-figure-caption-content {
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 268) . ';
                }

                .ihewc-hover-' . $oxiid . ' h3.ihewc-heading{
                    font-size:' . $styledata[72] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 84) . ';
                }
                .ihewc-hover-' . $oxiid . ' .ihewc-content{
                    font-size:' . $styledata[102] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 114) . ';
                }
                 .ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button {
                    font-size:' . $styledata[132] . 'px;
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 140) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 160) . ';
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 182) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 198) . ';
                }
                .ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:hover,
                .ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:focus, 
                .ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:active {
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 222) . ';
                }
            }
            @media only screen and (max-width : 668px){
                .ihewc-hover-padding-' . $oxiid . '{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 37) . ';
                }
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption-content{
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . ';
                }
                .ihewc-hover-' . $oxiid . ',
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure,
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-image,
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-image img,  
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption,
                .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption-content {
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 253) . ';
                }
                .ihewc-hover-' . $oxiid . ':hover,
                .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure,
                .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-image,
                .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-image img,  
                .ihewc-hover-' . $oxiid . ':hover.ihewc-hover-figure .ihewc-hover-figure-caption,
                .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure .ihewc-hover-figure-caption-content {
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 269) . ';
                }

                .ihewc-hover-' . $oxiid . ' h3.ihewc-heading{
                    font-size:' . $styledata[73] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 85) . ';
                }
                .ihewc-hover-' . $oxiid . ' .ihewc-content{
                    font-size:' . $styledata[103] . 'px;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 115) . ';
                }
                 .ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button {
                    font-size:' . $styledata[133] . 'px;
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 141) . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 183) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 199) . ';
                }
                .ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:hover,
                .ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:focus, 
                .ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:active {
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 223) . ';
                }
            }';
    echo OxiAddonsInlineCSSData($css);
    echo oxi_addons_elements_stylejs('css/style', 'image_effects', 'css', 'image-effects');
    echo oxi_addons_elements_stylejs('css/style-splash-effects', 'image_effects', 'css', 'style-splash-effects');
}
