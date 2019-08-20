<?php

if (!defined('ABSPATH'))
    exit;

function oxi_category_style_1_shortcode($styledata = FALSE, $listdata = array(), $user = 'user') {
    $css = $listcatdata = '';
    echo oxi_addons_elements_stylejs('jquery.isotope.v3.0.2', 'category', 'js');
    echo oxi_addons_elements_stylejs('imagesloaded.pkgd.min', 'category', 'js');
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $catdata = explode('{{}}', $stylefiles[2]);
    echo '<div class="oxi-addons-container">
                 <div class="oxi-addons-row">';

    echo '<div class="oxi-addons-category-menu-' . $oxiid . '">';
    foreach ($catdata as $value) {
        if ($styledata[7] == $value) {
            $cat = '*';
            $class = 'oxi-active';
        } else {
            $class = '';
            $cat = '.' . OxiStringToClassReplacce($value, $oxiid) . '';
        }
        echo '<div class="oxi-cat-menu ' . $class . '" oxi-ref="' . $cat . '">';
        echo OxiAddonsTextConvert($value);
        echo '</div>';
    }
    echo '</div>';

    echo '<div class="oxi-addons-category-' . $oxiid . '">';
    echo '<div class="oxi-addons-category-data-' . $oxiid . '">';
    foreach ($listdata as $value) {
        $listfiles = explode("||#||", $value['files']);
        $listcat = explode('{{}}', $listfiles[3]);
        $listcatdata = '';
        foreach ($listcat as $data) {
            $listcatdata .= OxiStringToClassReplacce($data, $oxiid) . ' ';
        }
        echo '<div class="oxi-single-item ' . OxiAddonsItemRows($styledata, 3) . '  ' . $listcatdata . ' ' . OxiAddonsAdminDefine($user) . '">';
        echo '<div class="oxi-addons-category-files">';
        echo OxiAddonsTextConvert($listfiles[1]);
        echo '</div>';
        if ($user == 'admin') {
            $css .= '.oxi-addons-admin-edit-list:hover .oxi-addons-admin-absulote{
                         top: 0px !important;
                    }';
            echo '  <div class="oxi-addons-admin-absulote">
                                    <div class="oxi-addons-admin-absulate-edit">
                                        <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditcategorydata") . '
                                            <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                            <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                        </form>
                                    </div>
                                    <div class="oxi-addons-admin-absulate-delete">
                                        <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletecategorydata") . '
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
    echo '   </div>
              </div>';

    $jquery = 'jQuery(window).load(function(){
                        jQuery(".oxi-addons-category-data-' . $oxiid . '").imagesLoaded(function(){
                            jQuery(".oxi-addons-category-data-' . $oxiid . '").isotope({
                                filter: "*",
                                animationOptions: {
                                    duration: 750,
                                    easing: "linear",
                                    queue: false
                                },
                                layoutMode: "masonry",
                            });
                        });
                        jQuery(".oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu").on("click", function () {
                            if(!jQuery(this).hasClass("oxi-active")){
                                jQuery(".oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu").removeClass("oxi-active");
                                jQuery(this).addClass("oxi-active");
                                var selector = jQuery(this).attr("oxi-ref");
                                jQuery(".oxi-addons-category-data-' . $oxiid . '").isotope({
                                    filter: selector, 
                                    animationOptions: {
                                        duration: 750, 
                                        easing: "linear",
                                        queue: false
                                    }
                                });
                                return false;
                            }
                        });
                    });';

   

    if ($styledata[45] == '') {
        $width = 'width: ' . $styledata[47] . 'px;';
        $widthtab = 'width: ' . $styledata[47] . 'px;';
        $widthmobile = 'width: ' . $styledata[47] . 'px;';
    } else {
        $width = $widthtab = $widthmobile = '';
    }
    $css .= '.oxi-addons-category-menu-' . $oxiid . '{
                    width:100%;
                    float:left;
                    text-align: ' . (explode(':', $styledata[79])[0]) . ';
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . '
                 }
                 .oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu{
                     display:inline-block;
                     cursor:pointer;
                     ' . $width . '
                     font-size: ' . $styledata[41] . 'px;
                     color:' . $styledata[51] . ';
                     background: ' . $styledata[53] . ';
                     border-color:' . $styledata[72] . ';
                     border-style:' . $styledata[71] . ';
                     border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 55) . ';
                     ' . OxiAddonsFontSettings($styledata, 75) . '
                     text-align:center;
                     border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 81) . ';
                     padding:' . OxiAddonsPaddingMarginSanitize($styledata, 97) . ';
                     margin:' . OxiAddonsPaddingMarginSanitize($styledata, 113) . ';
                     ' . OxiAddonsBoxShadowSanitize($styledata, 129) . '
                 }
                 .oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu:hover,
                 .oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu.oxi-active{
                     color:' . $styledata[135] . ';
                     background: ' . $styledata[137] . ';
                     border-color:' . $styledata[156] . ';
                     border-style:' . $styledata[155] . ';
                     border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 139) . ';
                     border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 159) . ';
                     ' . OxiAddonsBoxShadowSanitize($styledata, 175) . '
                 }
                 .oxi-addons-category-' . $oxiid . '{
                    width:100%;
                    float:left;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . '
                 }
                 .oxi-addons-category-files ' . $listcatdata . ',.oxi-addons-category-data-' . $oxiid . '{
                    width:100%;
                    float:left;
                 }
                 @media only screen and (min-width : 669px) and (max-width : 993px){
                    .oxi-addons-category-menu-' . $oxiid . '{
                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 10) . '
                     }
                     .oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu{
                         ' . $widthtab . '
                        font-size: ' . $styledata[42] . 'px;
                        border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 56) . ';
                         border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 82) . ';
                         padding:' . OxiAddonsPaddingMarginSanitize($styledata, 98) . ';
                         margin:' . OxiAddonsPaddingMarginSanitize($styledata, 114) . ';
                     }
                     .oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu:hover,
                     .oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu.oxi-active{
                         border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 140) . ';
                         border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 160) . ';
                     }
                     .oxi-addons-category-' . $oxiid . '{
                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 26) . '
                     }
                }
                @media only screen and (max-width : 668px){
                    .oxi-addons-category-menu-' . $oxiid . '{
                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . '
                     }
                     .oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu{
                         ' . $widthmobile . '
                        font-size: ' . $styledata[43] . 'px;
                        border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 57) . ';
                         border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
                         padding:' . OxiAddonsPaddingMarginSanitize($styledata, 99) . ';
                         margin:' . OxiAddonsPaddingMarginSanitize($styledata, 115) . ';
                     }
                     .oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu:hover,
                     .oxi-addons-category-menu-' . $oxiid . ' .oxi-cat-menu.oxi-active{
                         border-width:' . OxiAddonsPaddingMarginSanitize($styledata, 141) . ';
                         border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
                     }
                     .oxi-addons-category-' . $oxiid . '{
                       padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 27) . '
                     }
                }';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-imagesloaded.pkgd.min');
}
