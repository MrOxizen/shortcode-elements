<?php
if (!defined('ABSPATH')) {
    exit;
}

$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiimpport = '';
if (!empty($_GET['oxiimpport'])) {
    $oxiimpport = sanitize_text_field($_GET['oxiimpport']);
}

oxi_addons_user_capabilities();
OxiDataAdminImport($oxitype);
global $wpdb;
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_import = $wpdb->prefix . 'oxi_div_import';
$importstyle = $wpdb->get_results("SELECT * FROM $table_import WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
$freeimport = array('style-1', 'style-2');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = array(
    'style 1 demo 1OXIIMPORTimage_boxesOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddIconBoxes-rows |oxi-addons-lg-col-1|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddIconBoxes-width|250|250|250|OxiAddIconBoxes-height|250|250|250|OxiAddIconBoxes-body|rgba(255,255,255,1.00)|||OxiAddIconBoxes-border-top |0|0|0|OxiAddIconBoxes-border-bottom |0|0|0|OxiAddIconBoxes-border-left |0|0|0|OxiAddIconBoxes-border-right |0|0|0|OxiAddIconBoxes-border |none|#ffffff||OxiAddIconBoxes-radius-top |0|0|0|OxiAddIconBoxes-radius-bottom |0|0|0|OxiAddIconBoxes-radius-left |0|0|0|OxiAddIconBoxes-radius-right |0|0|0| OxiAddIconBoxes-Tab||OxiAddIconBoxes-padding-top |10|10|0|OxiAddIconBoxes-padding-bottom |10|10|0|OxiAddIconBoxes-padding-left |10|10|0|OxiAddIconBoxes-padding-right |10|10|0|OxiAddIconBoxes-margin-top |20|20|0|OxiAddIconBoxes-margin-bottom |20|20|0|OxiAddIconBoxes-margin-left |20|20|0|OxiAddIconBoxes-margin-right |20|20|0|OxiAddIconBoxes-box-shadow |rgba(176, 176, 176, 1)|0|10|20|0|OxiAddIconBoxes-animation||.5|.5//|OxiAddIconBoxes-H-FS|18|18|18| OxiAddIconBoxes-H-C|#757575|OxiAddIconBoxes-H-F-family |Roboto|bold|OxiAddIconBoxes-H-F-style |normal:1.3|center|OxiAddIconBoxes-H-P-top |5|10|10|OxiAddIconBoxes-H-P-bottom |5|10|10|OxiAddIconBoxes-H-P-left |0|10|10|OxiAddIconBoxes-H-P-right |0|10|10|OxiAddIconBoxes-IMG-W|70|70|70|OxiAddIconBoxes-IMG-H|70|70|70|OxiAddIconBoxes-IMG-animation||.5|.5//| OxiAddIconBoxes-H-HO-C|#3d3c3c|OxiAddIconBoxes-HO-body|rgba(242,242,242,1.00)|||OxiAddIconBoxes-HO-shadow |rgba(179, 179, 179, 1)|0|12|12|0|OxiAddPR-TC-Serial|heading,image| OxiAddIconBoxes-HO-BC|#ffffff|##OXISTYLE##OxiAddIconBoxes-IMG-title||#||Mozilla||#|| OxiAddIconBoxes-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/01/firefox.png||#|| OxiAddIconBoxes-IMG-link||#||#||#|| ||#||##OXIDATA##',
    'Style 1 Demo 2OXIIMPORTimage_boxesOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddIconBoxes-rows |oxi-addons-lg-col-1|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddIconBoxes-width|250|250|250|OxiAddIconBoxes-height|250|250|250|OxiAddIconBoxes-body|rgba(56,56,56,0.20)|https://www.oxilab.org/wp-content/uploads/2019/01/asdsad.jpeg||OxiAddIconBoxes-border-top |0|0|0|OxiAddIconBoxes-border-bottom |0|0|0|OxiAddIconBoxes-border-left |0|0|0|OxiAddIconBoxes-border-right |0|0|0|OxiAddIconBoxes-border |none|#ffffff||OxiAddIconBoxes-radius-top |0|0|0|OxiAddIconBoxes-radius-bottom |0|0|0|OxiAddIconBoxes-radius-left |0|0|0|OxiAddIconBoxes-radius-right |0|0|0| OxiAddIconBoxes-Tab||OxiAddIconBoxes-padding-top |10|10|10|OxiAddIconBoxes-padding-bottom |10|10|10|OxiAddIconBoxes-padding-left |10|10|10|OxiAddIconBoxes-padding-right |10|10|10|OxiAddIconBoxes-margin-top |20|20|20|OxiAddIconBoxes-margin-bottom |20|20|20|OxiAddIconBoxes-margin-left |20|20|20|OxiAddIconBoxes-margin-right |20|20|20|OxiAddIconBoxes-box-shadow |rgba(176, 176, 176, 1)|0|5|15|-2|OxiAddIconBoxes-animation||.5|.5//|OxiAddIconBoxes-H-FS|18|18|18| OxiAddIconBoxes-H-C|#ffffff|OxiAddIconBoxes-H-F-family |Roboto|bold|OxiAddIconBoxes-H-F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddIconBoxes-H-P-top |15|15|15|OxiAddIconBoxes-H-P-bottom |5|10|10|OxiAddIconBoxes-H-P-left |0|10|10|OxiAddIconBoxes-H-P-right |0|10|10|OxiAddIconBoxes-IMG-W|70|70|70|OxiAddIconBoxes-IMG-H|70|70|70|OxiAddIconBoxes-IMG-animation||.5|.5//| OxiAddIconBoxes-H-HO-C|#ffffff|OxiAddIconBoxes-HO-body|linear-gradient(135deg, rgba(205,11,219,0.53) 0%,rgba(99,181,27,0.50) 100%)|https://www.oxilab.org/wp-content/uploads/2019/01/asdsad.jpeg||OxiAddIconBoxes-HO-shadow |rgba(69, 69, 69, 0.83)|0|5|15|-2|OxiAddPR-TC-Serial|image,heading| OxiAddIconBoxes-HO-BC|#ffffff|##OXISTYLE##OxiAddIconBoxes-IMG-title||#||Google Plus||#|| OxiAddIconBoxes-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/01/google-plus.png||#|| OxiAddIconBoxes-IMG-link||#||#||#|| ||#||##OXIDATA##',
    'style 2 demo 1OXIIMPORTimage_boxesOXIIMPORTstyle-2OXIIMPORTOxiAddImageBoxes-rows |oxi-addons-lg-col-1|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddImageBoxes-width|300|300|300|OxiAddImageBoxes-height|380|380|380| OxiAddImageBoxes-CBox-bg |rgba(15,156,140,0.97)|OxiAddImageBoxes-CBox-margin-top |10|10|10|OxiAddImageBoxes-CBox-margin-bottom |10|10|10|OxiAddImageBoxes-CBox-margin-left |10|10|10|OxiAddImageBoxes-CBox-margin-right |10|10|10|OxiAddImageBoxes-box-shadow |rgba(176, 176, 176, 0.85)|0|10|20|0|OxiAddImageBoxes-animation||1|.5//|OxiAddImageBoxes-heading-size|22|22|22| OxiAddImageBoxes-heading-color |#ffffff|OxiAddImageBoxes-heading-FontSetings-family |Roboto+Slab|bold|OxiAddImageBoxes-heading-FontSetings-style |normal:1.3|center:0()0()0()#ffffff|OxiAddImageBoxes-heading-padding-top |10|10|10|OxiAddImageBoxes-heading-padding-bottom |0|0|0|OxiAddImageBoxes-heading-padding-left |0|0|0|OxiAddImageBoxes-heading-padding-right |0|0|0|OxiAddImageBoxes-content-size|16|16|16| OxiAddImageBoxes-content-color |#e8e8e8|OxiAddImageBoxes-content-FontSettings-family |Lato|100|OxiAddImageBoxes-content-FontSettings-style |normal:1.3|center:0()0()0()#ffffff|OxiAddImageBoxes-content-padding-top |10|10|10|OxiAddImageBoxes-content-padding-bottom |10|10|10|OxiAddImageBoxes-content-padding-left |10|10|10|OxiAddImageBoxes-content-padding-right |10|10|10| OxiAddImageBoxes-B-Tab |_blank|OxiAddImageBoxes-B-FS|13|13|13| OxiAddImageBoxes-B-TC |#ffffff| OxiAddImageBoxes-B-BG |rgba(2, 87, 78, 0.95)|OxiAddImageBoxes-B-B |0|dotted|| OxiAddImageBoxes-B-BC |#ffffff|OxiAddImageBoxes-B-F-family |Roboto+Slab|200|OxiAddImageBoxes-B-F-style |normal:1.3|center:0()0()0()#ffffff|OxiAddImageBoxes-B-BR-top |0|0|0|OxiAddImageBoxes-B-BR-bottom |0|0|0|OxiAddImageBoxes-B-BR-left |0|0|0|OxiAddImageBoxes-B-BR-right |0|0|0|OxiAddImageBoxes-B-P-top |10|10|10|OxiAddImageBoxes-B-P-bottom |10|10|10|OxiAddImageBoxes-B-P-left |10|10|10|OxiAddImageBoxes-B-P-right |10|10|10|OxiAddImageBoxes-B-M-top |0|0|0|OxiAddImageBoxes-B-M-bottom |10|10|10|OxiAddImageBoxes-B-M-left |0|0|0|OxiAddImageBoxes-B-M-right |0|0|0| OxiAddImageBoxes-B-HTC |#fafafa| OxiAddImageBoxes-B-HBG |rgba(3,59,53,0.95)| OxiAddImageBoxes-B-HBC |#ffffff|OxiAddImageBoxes-B-HBR-top |0|0|0|OxiAddImageBoxes-B-HBR-bottom |0|0|0|OxiAddImageBoxes-B-HBR-left |0|0|0|OxiAddImageBoxes-B-HBR-right |0|0|0|OxiAddImageBoxes-CBox-padding-top |10|10|10|OxiAddImageBoxes-CBox-padding-bottom |10|10|10|OxiAddImageBoxes-CBox-padding-left |10|10|10|OxiAddImageBoxes-CBox-padding-right |10|10|10|OxiAddImageBoxes-CBox-BR-top |0|0|0|OxiAddImageBoxes-CBox-BR-bottom |0|0|0|OxiAddImageBoxes-CBox-BR-left |0|0|0|OxiAddImageBoxes-CBox-BR-right |0|0|0|OxiAddImageBoxes-margin-top |10|10|10|OxiAddImageBoxes-margin-bottom |10|10|10|OxiAddImageBoxes-margin-left |10|10|10|OxiAddImageBoxes-margin-right |10|10|10|oxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddImageBoxes-G-B |2|solid|| OxiAddImageBoxes-G-BC |#0f9c8c|OxiAddImageBoxes-G-BR-top |0|0|0|OxiAddImageBoxes-G-BR-bottom |0|0|0|OxiAddImageBoxes-G-BR-left |0|0|0|OxiAddImageBoxes-G-BR-right |0|0|0||##OXISTYLE##OxiAddImageBoxes-BG-I||#||https://www.oxilab.org/wp-content/uploads/2019/02/pexels-photo-206558.jpeg||#||OxiAddImageBoxes-HT||#||DEFAULT TITLE||#||OxiAddImageBoxes-BC||#||Lorem ipsum dolor sit amet||#||OxiAddImageBoxes-BT||#||LEARN MORE||#||OxiAddImageBoxes-BT-DL||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##',
    'style 2 demo 2OXIIMPORTimage_boxesOXIIMPORTstyle-2OXIIMPORTOxiAddImageBoxes-rows |oxi-addons-lg-col-1|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddImageBoxes-width|300|300|300|OxiAddImageBoxes-height|380|380|380| OxiAddImageBoxes-CBox-bg |rgba(245, 84, 116, 1)|OxiAddImageBoxes-CBox-margin-top |10|10|10|OxiAddImageBoxes-CBox-margin-bottom |10|10|10|OxiAddImageBoxes-CBox-margin-left |10|10|10|OxiAddImageBoxes-CBox-margin-right |10|10|10|OxiAddImageBoxes-box-shadow |rgba(143, 143, 143, 0.47)|0|10|20|0|OxiAddImageBoxes-animation||1|.5//|OxiAddImageBoxes-heading-size|22|22|22| OxiAddImageBoxes-heading-color |#ffffff|OxiAddImageBoxes-heading-FontSetings-family |Roboto+Slab|bold|OxiAddImageBoxes-heading-FontSetings-style |normal:1.3|center:0()0()0()#ffffff|OxiAddImageBoxes-heading-padding-top |10|10|10|OxiAddImageBoxes-heading-padding-bottom |0|0|0|OxiAddImageBoxes-heading-padding-left |0|0|0|OxiAddImageBoxes-heading-padding-right |0|0|0|OxiAddImageBoxes-content-size|16|16|16| OxiAddImageBoxes-content-color |#f2f2f2|OxiAddImageBoxes-content-FontSettings-family |Nunito|100|OxiAddImageBoxes-content-FontSettings-style |normal:1.3|center:0()0()0()#ffffff|OxiAddImageBoxes-content-padding-top |10|10|10|OxiAddImageBoxes-content-padding-bottom |10|10|10|OxiAddImageBoxes-content-padding-left |10|10|10|OxiAddImageBoxes-content-padding-right |10|10|10| OxiAddImageBoxes-B-Tab |_blank|OxiAddImageBoxes-B-FS|13|13|13| OxiAddImageBoxes-B-TC |#ffffff| OxiAddImageBoxes-B-BG |rgba(173,48,71,1.00)|OxiAddImageBoxes-B-B |0|dotted|| OxiAddImageBoxes-B-BC |#ffffff|OxiAddImageBoxes-B-F-family |Roboto+Slab|200|OxiAddImageBoxes-B-F-style |normal:1.3|center:0()0()0()#ffffff|OxiAddImageBoxes-B-BR-top |0|0|0|OxiAddImageBoxes-B-BR-bottom |0|0|0|OxiAddImageBoxes-B-BR-left |0|0|0|OxiAddImageBoxes-B-BR-right |0|0|0|OxiAddImageBoxes-B-P-top |10|10|10|OxiAddImageBoxes-B-P-bottom |10|10|10|OxiAddImageBoxes-B-P-left |10|10|10|OxiAddImageBoxes-B-P-right |10|10|10|OxiAddImageBoxes-B-M-top |0|0|0|OxiAddImageBoxes-B-M-bottom |10|10|10|OxiAddImageBoxes-B-M-left |0|0|0|OxiAddImageBoxes-B-M-right |0|0|0| OxiAddImageBoxes-B-HTC |#ffffff| OxiAddImageBoxes-B-HBG |rgba(166,28,53,1.00)| OxiAddImageBoxes-B-HBC |#ffffff|OxiAddImageBoxes-B-HBR-top |0|0|0|OxiAddImageBoxes-B-HBR-bottom |0|0|0|OxiAddImageBoxes-B-HBR-left |0|0|0|OxiAddImageBoxes-B-HBR-right |0|0|0|OxiAddImageBoxes-CBox-padding-top |10|10|10|OxiAddImageBoxes-CBox-padding-bottom |10|10|10|OxiAddImageBoxes-CBox-padding-left |10|10|10|OxiAddImageBoxes-CBox-padding-right |10|10|10|OxiAddImageBoxes-CBox-BR-top |0|0|0|OxiAddImageBoxes-CBox-BR-bottom |0|0|0|OxiAddImageBoxes-CBox-BR-left |0|0|0|OxiAddImageBoxes-CBox-BR-right |0|0|0|OxiAddImageBoxes-margin-top |10|10|10|OxiAddImageBoxes-margin-bottom |10|10|10|OxiAddImageBoxes-margin-left |10|10|10|OxiAddImageBoxes-margin-right |10|10|10|oxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddImageBoxes-G-B |2|solid|| OxiAddImageBoxes-G-BC |#f55474|OxiAddImageBoxes-G-BR-top |0|0|0|OxiAddImageBoxes-G-BR-bottom |0|0|0|OxiAddImageBoxes-G-BR-left |0|0|0|OxiAddImageBoxes-G-BR-right |0|0|0||##OXISTYLE##OxiAddImageBoxes-BG-I||#||https://www.oxilab.org/wp-content/uploads/2019/02/Printed-color-block-T-shirt2-571x714.jpg||#||OxiAddImageBoxes-HT||#||DEFAULT TITLE||#||OxiAddImageBoxes-BC||#||Lorem ipsum dolor sit amet||#||OxiAddImageBoxes-BT||#||LEARN MORE||#||OxiAddImageBoxes-BT-DL||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##',
    'style 3 demo 1OXIIMPORTimage_boxesOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG|rgba(247,247,247,1.00)| OxiAddImageBoxes-rows |oxi-addons-lg-col-1|oxi-addons-md-col-2|oxi-addons-xs-col-1|OxiAddImageBoxes-width|360|360|360|OxiAddImageBoxes-height|380|380|380|OxiAddImageBoxes-padding-top |10|10|10|OxiAddImageBoxes-padding-bottom |10|10|10|OxiAddImageBoxes-padding-left |10|10|10|OxiAddImageBoxes-padding-right |10|10|10| OxiAddImageBoxes-CBox-bg |rgba(0, 0, 0, 0.5)|OxiAddImageBoxes-CBox-padding-top |10|10|10|OxiAddImageBoxes-CBox-padding-bottom |10|10|10|OxiAddImageBoxes-CBox-padding-left |10|10|10|OxiAddImageBoxes-CBox-padding-right |10|10|10|OxiAddImageBoxes-CBox-margin-top |10|10|10|OxiAddImageBoxes-CBox-margin-bottom |10|10|10|OxiAddImageBoxes-CBox-margin-left |10|10|10|OxiAddImageBoxes-CBox-margin-right |10|10|10|OxiAddImageBoxes-box-shadow |rgba(207, 186, 186, 1)|0|4|8|0|OxiAddImageBoxes-animation||1|.5//|OxiAddImageBoxes-heading-size|30|30|16| OxiAddImageBoxes-heading-color |#ffffff|OxiAddImageBoxes-heading-family |Roboto|600|OxiAddImageBoxes-heading-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddImageBoxes-heading-padding-top |5|5|5|OxiAddImageBoxes-heading-padding-bottom |5|5|5|OxiAddImageBoxes-heading-padding-left |5|5|5|OxiAddImageBoxes-heading-padding-right |5|5|5|OxiAddImageBoxes-content-size|16|16|11| OxiAddImageBoxes-content-color |#ffffff|OxiAddImageBoxes-content-family |Roboto|300|OxiAddImageBoxes-content-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddImageBoxes-content-padding-top |5|5|5|OxiAddImageBoxes-content-padding-bottom |5|5|5|OxiAddImageBoxes-content-padding-left |5|5|5|OxiAddImageBoxes-content-padding-right |5|5|5| OxiAddImageBoxes-B-Tab ||OxiAddImageBoxes-B-FS|14|14|10| OxiAddImageBoxes-B-TC |#0e0e0e| OxiAddImageBoxes-B-BG |rgba(255, 255, 255, 1)|OxiAddImageBoxes-B-B |1|solid|| OxiAddImageBoxes-B-BC |#ffffff|OxiAddImageBoxes-B-F-family |Roboto|600|OxiAddImageBoxes-B-F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddImageBoxes-B-BR-top |30|30|20|OxiAddImageBoxes-B-BR-bottom |30|30|20|OxiAddImageBoxes-B-BR-left |30|30|20|OxiAddImageBoxes-B-BR-right |30|30|20|OxiAddImageBoxes-B-P-top |10|10|7|OxiAddImageBoxes-B-P-bottom |10|10|7|OxiAddImageBoxes-B-P-left |30|30|25|OxiAddImageBoxes-B-P-right |30|30|25|OxiAddImageBoxes-B-M-top |10|10|0|OxiAddImageBoxes-B-M-bottom |10|10|0|OxiAddImageBoxes-B-M-left |10|10|0|OxiAddImageBoxes-B-M-right |10|10|0| OxiAddImageBoxes-B-HTC |#ffffff| OxiAddImageBoxes-B-HBG |rgba(255,115,115,1.00)| OxiAddImageBoxes-B-HBC |#ffffff|OxiAddImageBoxes-B-HBR-top |30|30|30|OxiAddImageBoxes-B-HBR-bottom |30|30|30|OxiAddImageBoxes-B-HBR-left |30|30|30|OxiAddImageBoxes-B-HBR-right |30|30|30|OxiAddImageBoxes-G-B ||dotted|| OxiAddImageBoxes-G-BC ||OxiAddImageBoxes-G-BR-top |-2|-2|-2|OxiAddImageBoxes-G-BR-bottom |-2|-2|-2|OxiAddImageBoxes-G-BR-left |-2|-2|-2|OxiAddImageBoxes-G-BR-right |-2|-2|-2||##OXISTYLE##OxiAddImageBoxes-BG-I||#||https://www.oxilab.org/wp-content/uploads/2019/01/pexels-photo-756248.jpeg||#||OxiAddImageBoxes-HT||#||Default Title||#||OxiAddImageBoxes-BC||#||Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.||#||OxiAddImageBoxes-BT||#||READ MORE||#||OxiAddImageBoxes-BT-DL||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##',
    'style 3 demo 2OXIIMPORTimage_boxesOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG|rgba(247,247,247,1.00)| OxiAddImageBoxes-rows |oxi-addons-lg-col-1|oxi-addons-md-col-2|oxi-addons-xs-col-1|OxiAddImageBoxes-width|360|360|360|OxiAddImageBoxes-height|380|380|380|OxiAddImageBoxes-padding-top |10|10|0|OxiAddImageBoxes-padding-bottom |10|10|0|OxiAddImageBoxes-padding-left |10|10|0|OxiAddImageBoxes-padding-right |10|10|0| OxiAddImageBoxes-CBox-bg |rgba(0, 0, 0, 0.5)|OxiAddImageBoxes-CBox-padding-top |10|10|0|OxiAddImageBoxes-CBox-padding-bottom |10|10|0|OxiAddImageBoxes-CBox-padding-left |10|10|0|OxiAddImageBoxes-CBox-padding-right |10|10|0|OxiAddImageBoxes-CBox-margin-top |10|10|0|OxiAddImageBoxes-CBox-margin-bottom |10|10|0|OxiAddImageBoxes-CBox-margin-left |10|10|0|OxiAddImageBoxes-CBox-margin-right |10|10|0|OxiAddImageBoxes-box-shadow |rgba(207, 186, 186, 1)|0|4|8|0|OxiAddImageBoxes-animation||1|.5//|OxiAddImageBoxes-heading-size|30|30|16| OxiAddImageBoxes-heading-color |#ffffff|OxiAddImageBoxes-heading-family |Roboto|600|OxiAddImageBoxes-heading-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddImageBoxes-heading-padding-top |5|5|5|OxiAddImageBoxes-heading-padding-bottom |5|5|5|OxiAddImageBoxes-heading-padding-left |5|5|5|OxiAddImageBoxes-heading-padding-right |5|5|5|OxiAddImageBoxes-content-size|14|14|10| OxiAddImageBoxes-content-color |#ffffff|OxiAddImageBoxes-content-family |Roboto|300|OxiAddImageBoxes-content-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddImageBoxes-content-padding-top |5|5|5|OxiAddImageBoxes-content-padding-bottom |5|5|5|OxiAddImageBoxes-content-padding-left |5|5|5|OxiAddImageBoxes-content-padding-right |5|5|5| OxiAddImageBoxes-B-Tab ||OxiAddImageBoxes-B-FS|14|14|10| OxiAddImageBoxes-B-TC |#0e0e0e| OxiAddImageBoxes-B-BG |rgba(255, 255, 255, 1)|OxiAddImageBoxes-B-B |1|solid|| OxiAddImageBoxes-B-BC |#ffffff|OxiAddImageBoxes-B-F-family |Roboto|600|OxiAddImageBoxes-B-F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddImageBoxes-B-BR-top |30|30|30|OxiAddImageBoxes-B-BR-bottom |30|30|30|OxiAddImageBoxes-B-BR-left |30|30|30|OxiAddImageBoxes-B-BR-right |30|30|30|OxiAddImageBoxes-B-P-top |10|10|10|OxiAddImageBoxes-B-P-bottom |10|10|10|OxiAddImageBoxes-B-P-left |30|30|30|OxiAddImageBoxes-B-P-right |30|30|30|OxiAddImageBoxes-B-M-top |5|5|5|OxiAddImageBoxes-B-M-bottom |5|5|5|OxiAddImageBoxes-B-M-left |5|5|5|OxiAddImageBoxes-B-M-right |5|5|5| OxiAddImageBoxes-B-HTC |#0e0e0e| OxiAddImageBoxes-B-HBG |rgba(255, 255, 255, 1)| OxiAddImageBoxes-B-HBC |#ffffff|OxiAddImageBoxes-B-HBR-top |30|30|30|OxiAddImageBoxes-B-HBR-bottom |30|30|30|OxiAddImageBoxes-B-HBR-left |30|30|30|OxiAddImageBoxes-B-HBR-right |30|30|30|OxiAddImageBoxes-G-B |1|none|| OxiAddImageBoxes-G-BC ||OxiAddImageBoxes-G-BR-top |0|0|0|OxiAddImageBoxes-G-BR-bottom |0|0|0|OxiAddImageBoxes-G-BR-left |0|0|0|OxiAddImageBoxes-G-BR-right |0|0|0||##OXISTYLE##OxiAddImageBoxes-BG-I||#||https://www.oxilab.org/wp-content/uploads/2019/01/pexels-photo-756242.jpeg||#||OxiAddImageBoxes-HT||#||Default Title||#||OxiAddImageBoxes-BC||#||Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.||#||OxiAddImageBoxes-BT||#||READ MORE||#||OxiAddImageBoxes-BT-DL||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##',
    'style 4 OXIIMPORTimage_boxesOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddCB-width|350|350|332|||||||||OxiAddCB-padding-top |10|10|10|OxiAddCB-padding-bottom |10|10|10|OxiAddCB-padding-left |10|10|10|OxiAddCB-padding-right |10|10|10|OxiAddCB-margin-top |80|80|80|OxiAddCB-margin-bottom |80|80|80|OxiAddCB-margin-left |10|10|10|OxiAddCB-margin-right |10|10|10|OxiAddCB-box-shadow |rgba(255, 255, 255, 1)|0|0|0|0|OxiAddCB-animation||0.5|0.5//| OxiAddCB-button-al ||OxiAddCB-heading-size|22|20|19| OxiAddCB-heading-color |#ffffff|OxiAddCB-heading-family |Open+Sans|800|OxiAddCB-heading-style |normal:1.5|left:0()0()0()#ffffff:1|OxiAddCB-heading-padding-top |6|6|6|OxiAddCB-heading-padding-bottom |6|6|6|OxiAddCB-heading-padding-left |10|0|0|OxiAddCB-heading-padding-right |10|10|10|OxiAddCB-content-size|15|15|14| OxiAddCB-content-color |#ffffff|OxiAddCB-content-family |Open+Sans|300|OxiAddCB-content-style |normal:1.5|left:0()0()0()#ffffff:1|OxiAddCB-content-padding-top |10|10|10|OxiAddCB-content-padding-bottom |20|20|20|OxiAddCB-content-padding-left |10|0|0|OxiAddCB-content-padding-right |10|0|0| OxiAddCB-CH-color |#ffffff|OxiAddCB-I-height|180|180|180| OxiAddCB-BG-color |rgba(26,26,26,1.00)|||||OxiAddIconBoxes-rows |oxi-addons-lg-col-1|oxi-addons-md-col-1|oxi-addons-xs-col-1|||OxiAddCB-all-content-margin-top |-27|-27|-27|OxiAddCB-all-content-margin-bottom |0|0|0|OxiAddCB-all-content-margin-left |0|0|0|OxiAddCB-all-content-margin-right |0|0|0| OxiAddCB-BG-hover-color|rgba(219, 15, 15, 1)|OxiAddCB-all-content-hover-margin-top |-80|-80|-80|OxiAddCB-all-content-hover-margin-bottom |0|0|0|OxiAddCB-all-content-hover-margin-left |0|0|0|OxiAddCB-all-content-hover-margin-right |0|0|0|OxiAddIC-font-size|33|31|30| OxiAddIC-color |#ffffff| OxiAddIC-color |#ffffff|OxiAddIC-padding-top |80|80|80|OxiAddIC-padding-bottom |80|80|80|OxiAddIC-padding-left |25|22|15|OxiAddIC-padding-right |1|10|6|OxiAdd-I-margin-top |0|0|0|OxiAdd-I-margin-bottom |0|0|0|OxiAdd-I-margin-left |-20|-20|-20|OxiAdd-I-margin-right |0|0|0|OxiAdd-I-h-margin-top |20|20|20|OxiAdd-I-h-margin-bottom |0|0|0|OxiAdd-I-h-margin-left |-25|-25|-25|OxiAdd-I-h-margin-right |0|0|0|##OXISTYLE##OxiAddCB-Front-IMG ||#||https://www.oxilab.org/wp-content/uploads/2018/10/nature-animal-quotes.jpg||#||OxiAddCB-heading-text ||#||Lorem Ipsum||#||OxiAddCB-content ||#||Lorem Ipsum is simply dummy text of the printing and typesetting industry||#||OxiAddCB-icon-class ||#||fa fa-camera||#|| ||#||##OXIDATA##',
);
if ($oxiimpport == 'import') {
    ?>
    <div class="wrap">
        <?php
        echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes');
        echo '<div class="oxi-addons-wrapper">
                <div class="oxi-addons-row">
                    <div class="oxi-addons-view-more-demo" style=" padding-top: 35px; padding-bottom: 35px; ">
                        <div class="oxi-addons-view-more-demo-data" >
                            <div class="oxi-addons-view-more-demo-icon">
                                <i class="fas fa-bullhorn oxi-icons"></i>
                            </div>
                            <div class="oxi-addons-view-more-demo-text">
                                <div class="oxi-addons-view-more-demo-heading">
                                    More Layouts
                                </div>
                                <div class="oxi-addons-view-more-demo-content">
                                    Thank you for using Shortcode Addons. As limitation of viewing Layouts or Design we added some layouts. Kindly check more  <a target="_blank" href="https://www.oxilab.org/shortcode-addons-features/' . str_replace('_', '-', $oxitype) . '" >' . oxi_addons_shortcode_name_converter($oxitype) . '</a> design from Oxilab.org. Copy <strong>export</strong> code and <strong>import</strong> it, get your preferable layouts.
                                </div>
                            </div>
                            <div class="oxi-addons-view-more-demo-button">
                                <a target="_blank" class="oxi-addons-more-layouts" href="https://www.oxilab.org/shortcode-addons-features/' . str_replace('_', '-', $oxitype) . '" >View layouts</a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>';
        ?>

        <div class="oxi-addons-wrapper">
            <div class="oxi-addons-row">
                <?php
                foreach ($file as $value) {
                    $expludedata = explode('OXIIMPORT', $value);
                    $datatrue = '';
                    foreach ($importstyle as $vals) {
                        if ($vals['name'] == $expludedata[2]) {
                            $datatrue = 'true';
                        }
                    }
                    if ($datatrue != 'true') {
                        $number = rand();
                        echo '<div class="oxi-addons-col-1"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo OxiDataAdminShortcode($oxitype, $value);
                        echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                        echo OxiDataAdminShortcodeName($value);
                        echo '       </div>';
                        echo '  <div class="oxi-addons-style-preview-bottom-right">
                                    <form method="post" style=" display: inline-block; ">
                                        ' . wp_nonce_field("oxi-addons-$expludedata[1]-style-active-nonce") . '
                                        <input type="hidden" name="oxiactivestyle" value="' . $expludedata[2] . '">
                                        <button class="btn btn-success" title="Active"  type="submit" value="Active" name="addonsstyleactive">Import Style</button>  
                                    </form> 
                                </div>';
                        echo '            </div>
                   </div>
                </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

<?php
} else {
    $data = $wpdb->get_results("SELECT * FROM $table_name WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
    ?>
    <div class="wrap">
        <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
        <?php echo OxiAddonsAdmAdminShortcodeTable($data, $oxitype); ?>
        <div class="oxi-addons-wrapper">
            <div class="oxi-addons-row">
                <?php
                foreach ($file as $value) {
                    $expludedata = explode('OXIIMPORT', $value);
                    $datatrue = '';
                    foreach ($importstyle as $vals) {
                        if ($vals['name'] == $expludedata[2]) {
                            $datatrue = 'true';
                        }
                    }
                    if ($datatrue == 'true') {
                        $number = rand();
                        echo '<div class="oxi-addons-col-1" id="' . $expludedata[2] . '"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo OxiDataAdminShortcode($oxitype, $value);
                        echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                        echo OxiDataAdminShortcodeName($value);
                        echo '       </div>';
                        echo OxiDataAdminShortcodeControl($number, $value, $freeimport);
                        echo '            </div>
                   </div>
                </div>';
                    }
                }
                ?>
                <div class="oxi-addons-col-1 oxi-import">
                    <div class="oxi-addons-style-preview">
                        <div class="oxilab-admin-style-preview-top">
                            <a href="<?php echo admin_url("admin.php?page=oxi-addons&oxitype=$oxitype&oxiimpport=import"); ?>">
                                <div class="oxilab-admin-add-new-item">
                                    <span>
                                        <i class="fas fa-plus-circle oxi-icons"></i>
                                        Add More Templates
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    echo OxiDataAdminShortcodeModal($oxitype);
}
