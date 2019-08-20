<?php
if (!defined('ABSPATH')) {
    exit;
}

$oxitype = sanitize_text_field($_GET['oxitype']);
oxi_addons_user_capabilities();
OxiDataAdminImport($oxitype);
global $wpdb;
$table_name = $wpdb->prefix . 'oxi_div_style';
$data = $wpdb->get_results("SELECT * FROM $table_name WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
?>
<div class="wrap">
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <?php echo OxiAddonsAdmAdminShortcodeTable($data, $oxitype); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <?php
            $file = array(
                'Style 1OXIIMPORTinfo_boxesOXIIMPORTstyle-1OXIIMPORTOxiAddIconBoxes-par-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddInfo-box-BG|rgba(255, 255, 255, 0)|OxiAddInfo-box-padding-top |10|10|10|OxiAddInfo-box-padding-bottom |10|10|10|OxiAddInfo-box-padding-left |10|10|10|OxiAddInfo-box-padding-right |10|10|10|OxiAddInfo-box-margin-top |20|20|20|OxiAddInfo-box-margin-bottom |20|20|20|OxiAddInfo-box-margin-left |10|10|10|OxiAddInfo-box-margin-right |10|10|10|OxiAddInfo-box-icon-size|40|35|30|OxiAddInfo-box-icon-color|#000000|OxiAddInfo-box-icon-hover-color|#2ab500|OxiAddInfo-box-icon-weight |50|50|50|OxiAddInfo-box-icon-position|center|OxiAddInfo-box-icon-padding-top |10|10|10|OxiAddInfo-box-icon-padding-bottom |0|0|0|OxiAddInfo-box-icon-padding-left |10|10|10|OxiAddInfo-box-icon-padding-right |10|10|10|OxiAddInfo-box-heading-size|24|22|20| OxiAddInfo-box-heading-color|#3d3d3d|OxiAddInfo-box-heading-family |Open+Sans|100|OxiAddInfo-box-heading-style |normal:1.5|center:0()0()0()#ffffff|OxiAddInfo-box-heading-padding-top |25|25|25|OxiAddInfo-box-heading-padding-bottom |10|10|10|OxiAddInfo-box-heading-padding-left |10|10|10|OxiAddInfo-box-heading-padding-right |10|10|10|OxiAddInfo-box-content-size|16|16|16| OxiAddInfo-box-content-color|#4d4d4d|OxiAddInfo-box-content-family |Open+Sans|100|OxiAddInfo-box-content-style |normal:1.5|center:0()0()0()#ffffff|OxiAddInfo-box-content-padding-top |5|5|5|OxiAddInfo-box-content-padding-bottom |20|20|20|OxiAddInfo-box-content-padding-left |20|20|20|OxiAddInfo-box-content-padding-right |20|20|20|OxiAddInfo-box-animation||2|0.5//|oxi-addons-preview-BG|rgba(255, 255, 255, 1)||||||||||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis.||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Fully responsive||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis.||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Service One||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis.||#||OxiAddInfoBanner-i-class ||#||fab fa-servicestack||#|| ||#||##OXIDATA##',
                'Style 2OXIIMPORTinfo_boxesOXIIMPORTstyle-2OXIIMPORTOxiAddIconBoxes-par-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddInfo-box-BG|rgba(230, 230, 230, 1)|OxiAddInfo-box-padding-top |25|25|25|OxiAddInfo-box-padding-bottom |25|25|25|OxiAddInfo-box-padding-left |25|25|25|OxiAddInfo-box-padding-right |25|25|25|OxiAddInfo-box-margin-top |20|20|20|OxiAddInfo-box-margin-bottom |20|20|20|OxiAddInfo-box-margin-left |10|10|10|OxiAddInfo-box-margin-right |1|1|1|OxiAddInfo-box-icon-size|25|22|22|OxiAddInfo-box-icon-color|#ffffff|OxiAddInfo-box-icon-BG-color|#fa6969|OxiAddInfo-box-icon-weight |70|70|70|OxiAddInfo-box-icon-border-radius-top |6|6|6|OxiAddInfo-box-icon-border-radius-bottom |6|6|6|OxiAddInfo-box-icon-border-radius-left |6|6|6|OxiAddInfo-box-icon-border-radius-right |6|6|6|OxiAddInfo-box-icon-position|center|OxiAddInfo-box-icon-padding-top |20|20|20|OxiAddInfo-box-icon-padding-bottom |20|20|20|OxiAddInfo-box-icon-padding-left |20|20|20|OxiAddInfo-box-icon-padding-right |20|20|20|OxiAddInfo-box-icon-hover-color|#ffffff|OxiAddInfo-box-icon-hover-border-radius-top |50|50|50|OxiAddInfo-box-icon-hover-border-radius-bottom |50|50|50|OxiAddInfo-box-icon-hover-border-radius-left |50|50|50|OxiAddInfo-box-icon-hover-border-radius-right |50|50|50|OxiAddInfo-box-icon-BG-hover-color|#ad3f29|OxiAddInfo-box-heading-size|24|24|22| OxiAddInfo-box-heading-color|#4d4d4d|OxiAddInfo-box-heading-family |Raleway|800|OxiAddInfo-box-heading-style |normal:1.5|center:0()0()0()#ffffff|OxiAddInfo-box-heading-padding-top |0|0|0|OxiAddInfo-box-heading-padding-bottom |13|13|13|OxiAddInfo-box-heading-padding-left |0|0|0|OxiAddInfo-box-heading-padding-right |0|0|0|OxiAddInfo-box-content-size|16|14|14| OxiAddInfo-box-content-color|#000000|OxiAddInfo-box-content-family |Open+Sans|100|OxiAddInfo-box-content-style |normal:1.5|center:0()0()0()#ffffff|OxiAddInfo-box-content-padding-top |10|10|10|OxiAddInfo-box-content-padding-bottom |20|20|20|OxiAddInfo-box-content-padding-left |20|20|20|OxiAddInfo-box-content-padding-right |20|20|20|OxiAddInfo-box-animation||1|1//|oxi-addons-preview-BG|rgba(209, 209, 209, 1)||||||||||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Service One||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis.||#||OxiAddInfoBanner-i-class ||#||fab fa-servicestack||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Main Title||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis.||#||OxiAddInfoBanner-i-class ||#||fas fa-magic||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Interface Design||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis.||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#|| ||#||##OXIDATA##',
                'Style 3OXIIMPORTinfo_boxesOXIIMPORTstyle-3OXIIMPORTOxiAddIconBoxes-par-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddInfo-box-BG|rgba(255, 255, 255, 0)|OxiAddInfo-box-padding-top |20|20|20|OxiAddInfo-box-padding-bottom |20|20|20|OxiAddInfo-box-padding-left |20|20|20|OxiAddInfo-box-padding-right |20|20|20|OxiAddInfo-box-margin-top |25|25|25|OxiAddInfo-box-margin-bottom |50|50|50|OxiAddInfo-box-margin-left |10|10|10|OxiAddInfo-box-margin-right |10|10|10|OxiAddInfo-box-icon-size|25|22|22|OxiAddInfo-box-icon-color|#ffffff|OxiAddInfo-box-icon-weight |70||70|OxiAddInfo-box-icon-border |2|solid||OxiAddInfo-box-icon-border-color|#94928e|||OxiAddInfo-box-icon-border-radius-top |10|10|10|OxiAddInfo-box-icon-border-radius-bottom |10|10|10|OxiAddInfo-box-icon-border-radius-left |10|10|10|OxiAddInfo-box-icon-border-radius-right |10|10|10|OxiAddInfo-box-icon-position|center|OxiAddInfo-box-icon-padding-top |20|20|20|OxiAddInfo-box-icon-padding-bottom |20|20|20|OxiAddInfo-box-icon-padding-left |20|20|20|OxiAddInfo-box-icon-padding-right |20|20|20|OxiAddInfo-box-heading-size|24|22|22| OxiAddInfo-box-heading-color|#000000|OxiAddInfo-box-heading-family |Open+Sans|400|OxiAddInfo-box-heading-style |normal:1.5|center:0()0()0()#ffffff|OxiAddInfo-box-heading-padding-top |0|0|0|OxiAddInfo-box-heading-padding-bottom |20|20|20|OxiAddInfo-box-heading-padding-left |0|0|0|OxiAddInfo-box-heading-padding-right |0|0|0|OxiAddInfo-box-content-size|14|14|14| OxiAddInfo-box-content-color|#000000|OxiAddInfo-box-content-family |Open+Sans|100|OxiAddInfo-box-content-style |normal:1.5|center:0()0()0()#ffffff|OxiAddInfo-box-content-padding-top |0|0|0|OxiAddInfo-box-content-padding-bottom |20|20|20|OxiAddInfo-box-content-padding-left |10|10|10|OxiAddInfo-box-content-padding-right |10|10|10|OxiAddInfo-box-BG-hover-shadow |rgba(196, 196, 196, 0.59)|1|4|4|4|OxiAddInfo-box-animation||2|.5//|OxiAddInfo-box-icon-BG|#a57dfa|OxiAddInfo-box-BG-shadow |rgba(165, 125, 250, 0.59)|1|2|2|1|OxiAddInfo-box-BG-border |solid|#be9eff||OxiAddInfo-box-BG-border-top |0|0|0|OxiAddInfo-box-BG-border-bottom |5|5|5|OxiAddInfo-box-BG-border-left |0|0|0|OxiAddInfo-box-BG-border-right |0|0|0|OxiAddInfo-box-BG-border-radius-top |0|0|0|OxiAddInfo-box-BG-border-radius-bottom |0|0|0|OxiAddInfo-box-BG-border-radius-left |0|0|0|OxiAddInfo-box-BG-border-radius-right |0|0|0|oxi-addons-preview-BG|rgba(255, 255, 255, 1)||||||||||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Service Tow||#||OxiAddInfoBanner-content ||#||Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum.||#||OxiAddInfoBanner-i-class ||#||fas fa-heart||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Service One||#||OxiAddInfoBanner-content ||#||Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Service Three||#||OxiAddInfoBanner-content ||#||Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum||#||OxiAddInfoBanner-i-class ||#||fas fa-magic||#|| ||#||##OXIDATA##',
                'Style 4OXIIMPORTinfo_boxesOXIIMPORTstyle-4OXIIMPORTOxiAddIconBoxes-par-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddInfo-box-padding-top |10|10|10|OxiAddInfo-box-padding-bottom |10|10|10|OxiAddInfo-box-padding-left |10|10|10|OxiAddInfo-box-padding-right |10|10|10|OxiAddInfo-box-margin-top |25|25|25|OxiAddInfo-box-margin-bottom |50|50|50|OxiAddInfo-box-margin-left |5|5|5|OxiAddInfo-box-margin-right |0|0|0|OxiAddInfo-box-icon-size|30|25|25|OxiAddInfo-box-icon-color|#fabd3a|OxiAddInfo-box-icon-weight |70|60|60|||||OxiAddInfo-box-icon-border |2|solid||OxiAddInfo-box-icon-border-color|#fabd3a|OxiAddInfo-box-icon-BG-color|#ffffff|OxiAddInfo-box-icon-border-radius-top |50|50|50|OxiAddInfo-box-icon-border-radius-bottom |50|50|50|OxiAddInfo-box-icon-border-radius-left |50|50|50|OxiAddInfo-box-icon-border-radius-right |50|50|50|OxiAddInfo-box-icon-position|center|OxiAddInfo-box-icon-hover-color|#fabd3a|OxiAddInfo-box-icon-hover-border-radius-top |50|50|50|OxiAddInfo-box-icon-hover-border-radius-bottom |50|50|50|OxiAddInfo-box-icon-hover-border-radius-left |50|50|50|OxiAddInfo-box-icon-hover-border-radius-right |50|50|50|OxiAddInfo-box-icon-hover-border-color|#fabd3a|OxiAddInfo-box-icon-BG-hover-color|#04298f|||||OxiAddInfo-box-heading-size|24|24|20|OxiAddInfo-box-heading-family |Raleway|600|OxiAddInfo-box-heading-style |normal:1.5|center:0()0()0()#ffffff| OxiAddInfo-box-heading-color|#303030|OxiAddInfo-box-heading-padding-top |10|10|10|OxiAddInfo-box-heading-padding-bottom |10|10|10|OxiAddInfo-box-heading-padding-left |10|10|10|OxiAddInfo-box-heading-padding-right |10|10|10|OxiAddInfo-box-content-size|18|14|14| OxiAddInfo-box-content-color|#000000|OxiAddInfo-box-content-family |Open+Sans|lighter|OxiAddInfo-box-content-style |normal:1.5|center:0()0()0()#ffffff|OxiAddInfo-box-content-padding-top |20|20|20|OxiAddInfo-box-content-padding-bottom |10|10|10|OxiAddInfo-box-content-padding-left |10|10|10|OxiAddInfo-box-content-padding-right |10|10|10|OxiAddInfo-box-animation||2|0.5//|OxiAddInfo-box-BG|rgba(255, 255, 255, 1)|OxiAddInfo-box-BG-border |solid|#ffcf82||OxiAddInfo-box-BG-border-top |2|2|2|OxiAddInfo-box-BG-border-bottom |2|2|2|OxiAddInfo-box-BG-border-left |2|2|2|OxiAddInfo-box-BG-border-right |2|2|2|OxiAddInfo-box-BG-border-radius-top |0|0|0|OxiAddInfo-box-BG-border-radius-bottom |0|0|0|OxiAddInfo-box-BG-border-radius-left |0|0|0|OxiAddInfo-box-BG-border-radius-right |0|0|0|OxiAddInfo-box-BG-hover-shadow |rgba(130, 130, 130, 0.68)|2|5|11|2|OxiAddInfo-box-icon-padding-top |20|20|20|OxiAddInfo-box-icon-padding-bottom |20|0|20|OxiAddInfo-box-icon-padding-left |14|14|14|OxiAddInfo-box-icon-padding-right |0|0|0|OxiAddInfo-box-hover-color|rgba(99, 217, 235, 1)|OxiAddInfo-box-hover-BG-border |solid|#7fb9fa||OxiAddInfo-box-hover-BG-border-top |2|2|2|OxiAddInfo-box-hover-BG-border-bottom |2|2|2|OxiAddInfo-box-hover-BG-border-left |2|2|2|OxiAddInfo-box-hover-BG-border-right |2|2|2|OxiAddInfo-box-hover-heading-color|#ffffff|OxiAddInfo-box-hover-text-color|#ffffff|OxiAddInfo-box-BG-shadow |rgba(166, 176, 170, 0.73)|1|4|7|1|oxi-addons-preview-BG|||||||||||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam||#||OxiAddInfoBanner-i-class ||#||fas fa-cogs||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Fully responsive||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam||#||OxiAddInfoBanner-i-class ||#||fas fa-tv||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Service One||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam||#||OxiAddInfoBanner-i-class ||#||fab fa-servicestack||#|| ||#||##OXIDATA##',
                'Style 5OXIIMPORTinfo_boxesOXIIMPORTstyle-5OXIIMPORTOxiAddIconBoxes-par-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddInfo-box-BG|rgba(255, 255, 255, 0)|OxiAddInfo-box-padding-top |10|0|10|OxiAddInfo-box-padding-bottom |10|0|10|OxiAddInfo-box-padding-left |10|0|10|OxiAddInfo-box-padding-right |10|0|25|OxiAddInfo-box-margin-top |25|0|50|OxiAddInfo-box-margin-bottom |25|25|25|OxiAddInfo-box-margin-left |5|0|0|OxiAddInfo-box-margin-right |5|5|5|OxiAddInfo-box-icon-size|50|50|50|OxiAddInfo-box-icon-color|#b8b8b8|OxiAddInfo-box-icon-weight |70|||OxiAddInfo-box-icon-border |0|solid||OxiAddInfo-box-icon-border-color|#91decf|||OxiAddInfo-box-icon-border-radius-top |0|0|0|OxiAddInfo-box-icon-border-radius-bottom |0|0|0|OxiAddInfo-box-icon-border-radius-left |0|0|0|OxiAddInfo-box-icon-border-radius-right |0|0|0|OxiAddInfo-box-icon-position|center|OxiAddInfo-box-icon-padding-top |0|0|0|OxiAddInfo-box-icon-padding-bottom |20|20|20|OxiAddInfo-box-icon-padding-left |50|50|50|OxiAddInfo-box-icon-padding-right |50|50|50|OxiAddInfo-box-heading-size|25|25|25| OxiAddInfo-box-heading-color|#000000|OxiAddInfo-box-heading-family |Montserrat|600|OxiAddInfo-box-heading-style |normal:1.3|center:0()0()0()#ffffff|OxiAddInfo-box-heading-padding-top |0|0|0|OxiAddInfo-box-heading-padding-bottom |10|10|10|OxiAddInfo-box-heading-padding-left |10|10|10|OxiAddInfo-box-heading-padding-right |10|10|10|OxiAddInfo-box-content-size|14|14|14| OxiAddInfo-box-content-color|#2e2e2e|OxiAddInfo-box-content-family |Open+Sans|100|OxiAddInfo-box-content-style |normal:1.3|center:0()0()0()#ffffff|OxiAddInfo-box-content-padding-top |10|10|10|OxiAddInfo-box-content-padding-bottom |20|20|20|OxiAddInfo-box-content-padding-left |20|20|20|OxiAddInfo-box-content-padding-right |20|20|20|OxiAddInfo-box-BG-hover-shadow |rgba(209, 209, 209, 1)|0|0|20|0|OxiAddInfo-box-animation||1|1//|OxiAddInfo-box-icon-BG|transparent|OxiAddInfo-box-BG-shadow |rgba(255, 255, 255, 1)|0|0|0|0|OxiAddInfo-box-BG-border |solid|#ffcf82||OxiAddInfo-box-BG-border-top |0|0|0|OxiAddInfo-box-BG-border-bottom |0|0|0|OxiAddInfo-box-BG-border-left |0|0|0|OxiAddInfo-box-BG-border-right |0|0|0|OxiAddInfo-box-BG-border-radius-top |0|0|0|OxiAddInfo-box-BG-border-radius-bottom |0|0|0|OxiAddInfo-box-BG-border-radius-left |0|0|0|OxiAddInfo-box-BG-border-radius-right |0|0|0|oxi-addons-preview-BG||OxiAddInfo-link-text-size |15|15|15|OxiAddInfo-link-text-color |#ffffff|OxiAddInfo-link-text-F-family |Amiko|300|OxiAddInfo-link-text-F-style |normal:2|center:0()0()0()#ffffff|OxiAddInfo-link-BG|rgba(0, 0, 0, 1)|OxiAddInfo-link-border |solid|#c2bebe||OxiAddInfo-link-border-S-top |2|2|2|OxiAddInfo-link-border-S-bottom |2|2|2|OxiAddInfo-link-border-S-left |2|2|2|OxiAddInfo-link-border-S-right |2|2|2|OxiAddInfo-link-border-radius-top |5|5|5|OxiAddInfo-link-border-radius-bottom |5|5|5|OxiAddInfo-link-border-radius-left |5|5|5|OxiAddInfo-link-border-radius-right |5|5|5|Oxi-addons-link-opening |_blank|OxiAddInfo-link-padding-top |5|5|5|OxiAddInfo-link-padding-bottom |5|5|5|OxiAddInfo-link-padding-left |25|25|25|OxiAddInfo-link-padding-right |25|25|25|OxiAddInfo-Button-position |center||||||||||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Service One||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam||#||OxiAddInfoBanner-i-class ||#||fab fa-servicestack||#||Oxi-addons-info-link-link ||#||#||#||Oxi-addons-info-link-text ||#||Click Now||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#||Oxi-addons-info-link-link ||#||#||#||Oxi-addons-info-link-text ||#||Click Now||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Fully responsive||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam||#||OxiAddInfoBanner-i-class ||#||fas fa-tv||#||Oxi-addons-info-link-link ||#||#||#||Oxi-addons-info-link-text ||#||Click Now||#|| ||#||##OXIDATA##',
                'Style 6OXIIMPORTinfo_boxesOXIIMPORTstyle-6OXIIMPORTOxiAddIconBoxes-par-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddInfo-box-BG|rgba(255, 255, 255, 0)|OxiAddInfo-box-padding-top |10|0|10|OxiAddInfo-box-padding-bottom |10|0|10|OxiAddInfo-box-padding-left |10|0|10|OxiAddInfo-box-padding-right |10|0|25|OxiAddInfo-box-margin-top |25|0|50|OxiAddInfo-box-margin-bottom |50|0|5|OxiAddInfo-box-margin-left |5|0|0|OxiAddInfo-box-margin-right |0|0|30|OxiAddInfo-box-icon-size|40|40|40|OxiAddInfo-box-icon-color|#ff9166|OxiAddInfo-box-icon-weight |70||70|||||||||OxiAddInfo-box-icon-border-radius-top |0|0|50|OxiAddInfo-box-icon-border-radius-bottom |0|0|0|OxiAddInfo-box-icon-border-radius-left |0|0|0|OxiAddInfo-box-icon-border-radius-right |0|0|0|OxiAddInfo-box-icon-position|center|OxiAddInfo-box-icon-padding-top |0|0|50|OxiAddInfo-box-icon-padding-bottom |15|15|15|OxiAddInfo-box-icon-padding-left |50|0|50|OxiAddInfo-box-icon-padding-right |50|0|50|OxiAddInfo-box-heading-size|25|25|25| OxiAddInfo-box-heading-color|#000000|OxiAddInfo-box-heading-family |Montserrat|600|OxiAddInfo-box-heading-style |normal:1.5|center:0()0()0()#ffffff|OxiAddInfo-box-heading-padding-top |0|0|0|OxiAddInfo-box-heading-padding-bottom |10|10|10|OxiAddInfo-box-heading-padding-left |20|20|20|OxiAddInfo-box-heading-padding-right |20|20|20|OxiAddInfo-box-content-size|15|15|15| OxiAddInfo-box-content-color|#000000|OxiAddInfo-box-content-family |Montserrat|100|OxiAddInfo-box-content-style |normal:1.5|center:0()0()0()#ffffff|OxiAddInfo-box-content-padding-top |0|0|0|OxiAddInfo-box-content-padding-bottom |15|15|15|OxiAddInfo-box-content-padding-left |20|20|20|OxiAddInfo-box-content-padding-right |20|0|0|OxiAddInfo-box-BG-hover-shadow |rgba(166, 202, 255, 0.57)|0|0|50|0|OxiAddInfo-box-animation||2|1//|OxiAddInfo-box-icon-BG|transparent|OxiAddInfo-box-BG-shadow |rgba(255, 255, 255, 0)|0|0|10|0|OxiAddInfo-box-BG-border |dotted|#9bb3f5||OxiAddInfo-box-BG-border-W-top |0|0|0|OxiAddInfo-box-BG-border-W-bottom |0|0|0|OxiAddInfo-box-BG-border-W-left |0|0|0|OxiAddInfo-box-BG-border-W-right |0|0|0|OxiAddInfo-box-BG-border-radius-top |0|0|0|OxiAddInfo-box-BG-border-radius-bottom |0|0|0|OxiAddInfo-box-BG-border-radius-left |0|0|0|OxiAddInfo-box-BG-border-radius-right |0|0|0|oxi-addons-preview-BG|rgba(255, 255, 255, 1)|OxiAddInfo-link-text-size |20|20|20|OxiAddInfo-link-text-color |#fcfcfc|OxiAddInfo-link-text-F-family |Actor|100|OxiAddInfo-link-text-F-style |normal:2|right:0()0()0()#ffffff|OxiAddInfo-link-BG|rgba(82, 82, 82, 1)|OxiAddInfo-link-border |solid|#c2c2c2||OxiAddInfo-link-border-S-top |0|0|0|OxiAddInfo-link-border-S-bottom |0|0|0|OxiAddInfo-link-border-S-left |0|0|0|OxiAddInfo-link-border-S-right |0|0|0|OxiAddInfo-link-border-radius-top |2|2|2|OxiAddInfo-link-border-radius-bottom |2|2|2|OxiAddInfo-link-border-radius-left |2|2|2|OxiAddInfo-link-border-radius-right |2|2|2|Oxi-addons-link-opening |_blank|OxiAddInfo-link-padding-top |5|5|5|OxiAddInfo-link-padding-bottom |8|8|8|OxiAddInfo-link-padding-left |25|25|25|OxiAddInfo-link-padding-right |25|25|25|OxiAddInfo-box-icon-border-W-top |0|0|0|OxiAddInfo-box-icon-border-W-bottom |3|3|3|OxiAddInfo-box-icon-border-W-left |0|0|0|OxiAddInfo-box-icon-border-W-right |0|0|0|OxiAddInfo-box-icon-border-C-T |solid|#b87e67||OxiAddInfobox-BG-hover-color|rgba(255, 255, 255, 0)|OxiAddInfo-box-border-hover-color |ridge|#c21b1b||OxiAddInfo-box-border-radius-top |0|0|0|OxiAddInfo-box-border-radius-bottom |0|0|0|OxiAddInfo-box-border-radius-left |0|0|0|OxiAddInfo-box-border-radius-right |0|0|0|OxiAddInfobox-icon-BG-hover-color|rgba(252, 252, 252, 0)|OxiAddInfo-icon-hover-color|#8040ff|OxiAddInfo-icon-border-hover-color |inset|#8565bf||OxiAddInfo-icon-hover-border-radius-top |20|20|20|OxiAddInfo-icon-hover-border-radius-bottom |20|20|20|OxiAddInfo-icon-hover-border-radius-left |20|20|20|OxiAddInfo-icon-hover-border-radius-right |20|20|20|OxiAddInfo-icon-hover-border-S-top |0|0|0|OxiAddInfo-icon-hover-border-S-bottom |3|3|3|OxiAddInfo-icon-hover-border-S-left |0|0|0|OxiAddInfo-icon-hover-border-S-right |0|0|0|OxiAddInfo-heading-hover-text-color |#000000|OxiAddInfo-content-hover-text-color |#404040|OxiAddInfo-link-hover-text-color |#ffffff|OxiAddInfo-link-hover-BG |rgba(65, 86, 97, 1)|OxiAddInfo-link-border-hover-color |solid|#241717||OxiAddInfo-link-border-hover-radius-top |0|0|0|OxiAddInfo-link-border-hover-radius-bottom |0|0|0|OxiAddInfo-link-border-hover-radius-left |0|0|0|OxiAddInfo-link-border-hover-radius-right |0|0|0| OxiAddInfo-button-al |center|OxiAddInfo-link-margin-top |6|6|6|OxiAddInfo-link-margin-bottom |6|6|6|OxiAddInfo-link-margin-left |50|50|50|OxiAddInfo-link-margin-right |50|50|50||||||||||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Fully responsive||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.||#||OxiAddInfoBanner-i-class ||#||fas fa-tv||#||Oxi-addons-info-link-link ||#||https://fontawesome.com/icons/android?style=brands||#||Oxi-addons-info-link-text ||#||Click Now||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.||#||OxiAddInfoBanner-i-class ||#||fas fa-magic||#||Oxi-addons-info-link-link ||#||#||#||Oxi-addons-info-link-text ||#||Click Now||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Service One||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.||#||OxiAddInfoBanner-i-class ||#||fab fa-servicestack||#||Oxi-addons-info-link-link ||#||#||#||Oxi-addons-info-link-text ||#||Click Now||#|| ||#||##OXIDATA##',
                'Style 7OXIIMPORTinfo_boxesOXIIMPORTstyle-7OXIIMPORTOxiAddIconBoxes-par-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddInfo-box-BG|rgba(255,255,255,0.00)|OxiAddInfo-box-padding-top |10|0|10|OxiAddInfo-box-padding-bottom |10|0|10|OxiAddInfo-box-padding-left |10|0|10|OxiAddInfo-box-padding-right |10|0|25|OxiAddInfo-box-margin-top |25|0|50|OxiAddInfo-box-margin-bottom |50|0|5|OxiAddInfo-box-margin-left |5|0|0|OxiAddInfo-box-margin-right |0|0|30|OxiAddInfo-box-icon-size|40|40|40|OxiAddInfo-box-icon-color||OxiAddInfo-box-icon-weight |325||325|||||||||OxiAddInfo-box-icon-border-radius-top |0|0|50|OxiAddInfo-box-icon-border-radius-bottom |0|0|0|OxiAddInfo-box-icon-border-radius-left |0|0|0|OxiAddInfo-box-icon-border-radius-right |0|0|0|OxiAddInfo-box-icon-position|center|OxiAddInfo-box-icon-padding-top |0|0|0|OxiAddInfo-box-icon-padding-bottom |25|25|25|OxiAddInfo-box-icon-padding-left |0|0|0|OxiAddInfo-box-icon-padding-right |0|0|0|OxiAddInfo-box-heading-size|25|25|25| OxiAddInfo-box-heading-color|#000000|OxiAddInfo-box-heading-family |Bad+Script|600|OxiAddInfo-box-heading-style |normal:1.5|center:0()0()0()rgba(255, 255, 255, 0)|OxiAddInfo-box-heading-padding-top |0|0|0|OxiAddInfo-box-heading-padding-bottom |10|10|10|OxiAddInfo-box-heading-padding-left |20|20|20|OxiAddInfo-box-heading-padding-right |20|20|20|OxiAddInfo-box-content-size|14|14|14| OxiAddInfo-box-content-color|#000000|OxiAddInfo-box-content-family |Archivo|200|OxiAddInfo-box-content-style |normal:1.5|center:0()0()0()rgba(255, 255, 255, 0)|OxiAddInfo-box-content-padding-top |0|0|0|OxiAddInfo-box-content-padding-bottom |30|30|30|OxiAddInfo-box-content-padding-left |20|20|20|OxiAddInfo-box-content-padding-right |20|0|0|OxiAddInfo-box-BG-hover-shadow |rgba(158, 158, 158, 0.79)|0|0|40|0|OxiAddInfo-box-animation||2|1//|OxiAddInfo-box-icon-BG||OxiAddInfo-box-BG-shadow |rgba(255, 255, 255, 0)|0|0|10|0|OxiAddInfo-box-BG-border |dotted|#9bb3f5||OxiAddInfo-box-BG-border-W-top |0|0|0|OxiAddInfo-box-BG-border-W-bottom |0|0|0|OxiAddInfo-box-BG-border-W-left |0|0|0|OxiAddInfo-box-BG-border-W-right |0|0|0|OxiAddInfo-box-BG-border-radius-top |0|0|0|OxiAddInfo-box-BG-border-radius-bottom |0|0|0|OxiAddInfo-box-BG-border-radius-left |0|0|0|OxiAddInfo-box-BG-border-radius-right |0|0|0|oxi-addons-preview-BG|rgba(255,255,255,1.00)|OxiAddInfo-link-text-size |20|20|20|OxiAddInfo-link-text-color |#fcfcfc|OxiAddInfo-link-text-F-family |Actor|100|OxiAddInfo-link-text-F-style |normal:2|left:0()0()0()rgba(255, 255, 255, 0)|OxiAddInfo-link-BG|rgba(135, 135, 135, 1)|OxiAddInfo-link-border |solid|#c2c2c2||OxiAddInfo-link-border-S-top |0|0|0|OxiAddInfo-link-border-S-bottom |0|0|0|OxiAddInfo-link-border-S-left |0|0|0|OxiAddInfo-link-border-S-right |0|0|0|OxiAddInfo-link-border-radius-top |2|2|2|OxiAddInfo-link-border-radius-bottom |2|2|2|OxiAddInfo-link-border-radius-left |2|2|2|OxiAddInfo-link-border-radius-right |2|2|2|Oxi-addons-link-opening |_blank|OxiAddInfo-link-padding-top |6|6|6|OxiAddInfo-link-padding-bottom |6|6|6|OxiAddInfo-link-padding-left |15|15|15|OxiAddInfo-link-padding-right |15|15|15|OxiAddInfo-box-icon-border-W-top |0|0|0|OxiAddInfo-box-icon-border-W-bottom |5|5|5|OxiAddInfo-box-icon-border-W-left |0|0|0|OxiAddInfo-box-icon-border-W-right |0|0|0|OxiAddInfo-box-icon-border-C-T |solid|#878787||OxiAddInfobox-BG-hover-color|rgba(255,255,255,0.00)|OxiAddInfo-box-border-hover-color |ridge|#c21b1b||OxiAddInfo-box-border-radius-top |0|0|0|OxiAddInfo-box-border-radius-bottom |0|0|0|OxiAddInfo-box-border-radius-left |0|0|0|OxiAddInfo-box-border-radius-right |0|0|0|OxiAddInfobox-icon-BG-hover-color|rgba(94,94,94,0.37)|OxiAddInfo-icon-hover-color||OxiAddInfo-icon-border-hover-color ||||OxiAddInfo-icon-hover-border-radius-top |0|0|0|OxiAddInfo-icon-hover-border-radius-bottom |0|0|0|OxiAddInfo-icon-hover-border-radius-left |0|0|0|OxiAddInfo-icon-hover-border-radius-right |0|0|0|OxiAddInfo-icon-hover-border-S-top |0|0|0|OxiAddInfo-icon-hover-border-S-bottom |0|0|0|OxiAddInfo-icon-hover-border-S-left |0|0|0|OxiAddInfo-icon-hover-border-S-right |0|0|0|OxiAddInfo-heading-hover-text-color |#ffffff|OxiAddInfo-content-hover-text-color |#f5f5f5|OxiAddInfo-link-hover-text-color |#ffffff|OxiAddInfo-link-hover-BG ||OxiAddInfo-link-border-hover-color |solid|#241717||OxiAddInfo-link-border-hover-radius-top |0|0|0|OxiAddInfo-link-border-hover-radius-bottom |0|0|0|OxiAddInfo-link-border-hover-radius-left |0|0|0|OxiAddInfo-link-border-hover-radius-right |0|0|0| OxiAddInfo-button-al |center|OxiAddInfo-link-margin-top |6|6|6|OxiAddInfo-link-margin-bottom |6|6|6|OxiAddInfo-link-margin-left |50|50|50|OxiAddInfo-link-margin-right |50|50|50||||||||||||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Elite Design||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.||#||OxiAddInfoBanner-i-class ||#||https://www.oxilab.org/wp-content/uploads/2019/03/2.jpg||#||Oxi-addons-info-link-link ||#||https://fontawesome.com/icons/android?style=brands||#||Oxi-addons-info-link-text ||#||Click Now||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam||#||OxiAddInfoBanner-i-class ||#||https://www.oxilab.org/wp-content/uploads/2019/03/3.jpg||#||Oxi-addons-info-link-link ||#||https://fontawesome.com/icons/android?style=brands||#||Oxi-addons-info-link-text ||#||Click Now||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Service One||#||OxiAddInfoBanner-content ||#||Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.Voluptatem accusantium doloremque laudantium sprea totam rem aperiam||#||OxiAddInfoBanner-i-class ||#||https://www.oxilab.org/wp-content/uploads/2019/03/arcteck.jpg||#||Oxi-addons-info-link-link ||#||https://fontawesome.com/icons/android?style=brands||#||Oxi-addons-info-link-text ||#||Click Now||#|| ||#||##OXIDATA##',
            );
            foreach ($file as $value) {
                $number = rand();
                echo '<div class="oxi-addons-col-1"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                echo OxiDataAdminShortcode($oxitype, $value);
                echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                echo OxiDataAdminShortcodeName($value);
                echo '       </div>';
                echo OxiDataAdminShortcodeControl($number, $value, array('style-1', 'style-2', 'style-3'));
                echo '        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
echo OxiDataAdminShortcodeModal($oxitype);
