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
    'Style 1 Demo 1OXIIMPORTsingle_imageOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddSI-padding-top |10|10|10|OxiAddSI-padding-bottom |10|10|10|OxiAddSI-padding-left |10|10|10|OxiAddSI-padding-right |10|10|10|OxiAddSI-margin-top |5|5|5|OxiAddSI-margin-bottom |5|5|5|OxiAddSI-margin-left |5|5|5|OxiAddSI-margin-right |5|5|5|OxiAddSI-box-shadow |rgba(201, 201, 201, 1)|0|0|0|0|OxiAddSIN-border-top |0|0|0|OxiAddSIN-border-bottom |0|0|0|OxiAddSIN-border-left |0|0|0|OxiAddSIN-border-right |0|0|0|OxiAddSIN-border |solid|#ad8e8e||OxiAddSIN-radius-top |0|0|0|OxiAddSIN-radius-bottom |0|0|0|OxiAddSIN-radius-left |0|0|0|OxiAddSIN-radius-right |0|0|0|OxiAddSIN-image |rgba(105, 0, 161, 0.77)|OxiAddSIN-image-inner|0|OxiAddSIH-border-top |0|0|0|OxiAddSIH-border-bottom |0|0|0|OxiAddSIH-border-left |0|0|0|OxiAddSIH-border-right |0|0|0|OxiAddSIH-border |solid|#b202c9||OxiAddSIH-radius-top |0|0|0|OxiAddSIH-radius-bottom |0|0|0|OxiAddSIH-radius-left |0|0|0|OxiAddSIH-radius-right |0|0|0|OxiAddSIH-image |rgba(179, 154, 154, 1)|OxiAddSIH-image-inner|0| OxiAddSIR|none|OxiAddSIR-size|20|20|20| OxiAddSIR-color|#ffffff| OxiAddSIR-bgcolor|rgba(63, 120, 37, 1)|OxiAddSIR-family |Roboto Slab|100|OxiAddSIR-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddSIR-padding-top |10|10|10|OxiAddSIR-padding-bottom |10|10|10|OxiAddSIR-padding-left |10|10|10|OxiAddSIR-padding-right |10|10|10| OxiAddSIN-G|100| OxiAddSIH-G|0| OxiAddSIH-bgcolor|rgba(255, 255, 255, 0)|OxiAddSI-animation||2:false:false:500:10:0.2|0//| OxiAddSIN-bgcolor|rgba(255, 255, 255, 0)| OxiAddSIR-position|right| OxiAddSIR-width|200| OxiAddSIR-top|37| OxiAddSIR-left|-43|||||||#|| ||#||OxiAddSI-class ||#||#paicinaektao||#||OxiAddSI-image ||#||https://www.oxilab.org/wp-content/uploads/2019/01/small.jpeg||#||OxiAddSIR-text ||#||PROMO PIC||#|||',
    'Style 1 Demo 2OXIIMPORTsingle_imageOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddSI-padding-top |10|10|10|OxiAddSI-padding-bottom |10|10|10|OxiAddSI-padding-left |10|10|10|OxiAddSI-padding-right |10|10|10|OxiAddSI-margin-top |5|5|5|OxiAddSI-margin-bottom |5|5|5|OxiAddSI-margin-left |5|5|5|OxiAddSI-margin-right |5|5|5|OxiAddSI-box-shadow |rgba(201, 201, 201, 1)|0|0|0|0|OxiAddSIN-border-top |0|0|0|OxiAddSIN-border-bottom |0|0|0|OxiAddSIN-border-left |0|0|0|OxiAddSIN-border-right |0|0|0|OxiAddSIN-border |solid|#ad8e8e||OxiAddSIN-radius-top |0|0|0|OxiAddSIN-radius-bottom |0|0|0|OxiAddSIN-radius-left |0|0|0|OxiAddSIN-radius-right |0|0|0|OxiAddSIN-image |rgba(105, 0, 161, 0.77)|OxiAddSIN-image-inner|0|OxiAddSIH-border-top |5|5|5|OxiAddSIH-border-bottom |5|5|5|OxiAddSIH-border-left |5|5|5|OxiAddSIH-border-right |5|5|5|OxiAddSIH-border |solid|#44a156||OxiAddSIH-radius-top |0|0|0|OxiAddSIH-radius-bottom |0|0|0|OxiAddSIH-radius-left |0|0|0|OxiAddSIH-radius-right |0|0|0|OxiAddSIH-image |rgba(179, 154, 154, 1)|OxiAddSIH-image-inner|0| OxiAddSIR|block|OxiAddSIR-size|17|17|17| OxiAddSIR-color|#ffffff| OxiAddSIR-bgcolor|rgba(36,120,91,1.00)|OxiAddSIR-family |Roboto Slab|100|OxiAddSIR-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddSIR-padding-top |10|10|10|OxiAddSIR-padding-bottom |10|10|10|OxiAddSIR-padding-left |10|10|10|OxiAddSIR-padding-right |10|10|10| OxiAddSIN-G|100| OxiAddSIH-G|0| OxiAddSIH-bgcolor|rgba(255, 255, 255, 0)|OxiAddSI-animation||2:false:false:500:10:0.2|0//| OxiAddSIN-bgcolor|rgba(255, 255, 255, 0)| OxiAddSIR-position|left| OxiAddSIR-width|205| OxiAddSIR-top|37| OxiAddSIR-left|-43|||||||#|| ||#||OxiAddSI-class ||#||#paicinaektao||#||OxiAddSI-image ||#||https://www.oxilab.org/wp-content/uploads/2019/01/fireworks-846063_1920.jpg||#||OxiAddSIR-text ||#||PROMO PIC||#|||',
    'Style 2 Demo 1OXIIMPORTsingle_imageOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddSI-padding-top |10|10|10|OxiAddSI-padding-bottom |10|10|10|OxiAddSI-padding-left |10|10|10|OxiAddSI-padding-right |10|10|10|OxiAddSI-margin-top |10|10|10|OxiAddSI-margin-bottom |10|10|10|OxiAddSI-margin-left |10|10|10|OxiAddSI-margin-right |10|10|10|OxiAddSI-box-shadow |rgba(201, 201, 201, 1)|0|5|10|0|OxiAddSIN-border-top |0|0|0|OxiAddSIN-border-bottom |0|0|0|OxiAddSIN-border-left |0|0|0|OxiAddSIN-border-right |0|0|0|OxiAddSIN-border |solid|#ad8e8e||OxiAddSIN-radius-top |0|0|0|OxiAddSIN-radius-bottom |0|0|0|OxiAddSIN-radius-left |0|0|0|OxiAddSIN-radius-right |0|0|0|OxiAddSIN-image |rgba(105, 0, 161, 0.77)|OxiAddSIN-image-inner|0|OxiAddSIH-border-top |0|0|0|OxiAddSIH-border-bottom |0|0|0|OxiAddSIH-border-left |0|0|0|OxiAddSIH-border-right |0|0|0|OxiAddSIH-border |solid|#b202c9||OxiAddSIH-radius-top |0|0|0|OxiAddSIH-radius-bottom |0|0|0|OxiAddSIH-radius-left |0|0|0|OxiAddSIH-radius-right |0|0|0|OxiAddSIH-image |rgba(222, 73, 73, 0.8)|OxiAddSIH-image-inner|0| OxiAddSIR|block|OxiAddSIR-size|20|20|20| OxiAddSIR-color|#000000| OxiAddSIR-bgcolor|rgba(145,145,145,1.00)|OxiAddSIR-family |Roboto Slab|100|OxiAddSIR-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddSIR-padding-top |10|10|10|OxiAddSIR-padding-bottom |10|10|10|OxiAddSIR-padding-left |10|10|10|OxiAddSIR-padding-right |10|10|10| OxiAddSIN-G|100| OxiAddSIH-G|0| OxiAddSIH-bgcolor|rgba(89,89,179,0.00)|OxiAddSI-animation||1.6:false:false:500:10:0.2|0.5//| OxiAddSIN-bgcolor|rgba(139,0,194,0.00)| OxiAddSIR-position|left| OxiAddSIR-width|200| OxiAddSIR-top|32| OxiAddSIR-left|-45|OxiAddSI-I-size|30|30|30|OxiAddSI-I-width|80|80|80| OxiAddSI-I-color|#ffffff| OxiAddSI-I-bgcolor|rgba(99,47,74,1.00)|OxiAddSI-I-border-top |3|3|3|OxiAddSI-I-border-bottom |3|3|3|OxiAddSI-I-border-left |3|3|3|OxiAddSI-I-border-right |3|3|3|OxiAddSI-I-border |solid|#943d6a||OxiAddSI-I-radius-top |50|50|50|OxiAddSI-I-radius-bottom |50|50|50|OxiAddSI-I-radius-left |50|50|50|OxiAddSI-I-radius-right |50|50|50| OxiAddSI-IH-color|#ffffff| OxiAddSI-IH-bgcolor|rgba(148,61,106,1.00)|OxiAddSI-IH-border |solid|#804a4a||OxiAddSI-IH-radius-top |50|50|50|OxiAddSI-IH-radius-bottom |50|50|50|OxiAddSI-IH-radius-left |50|50|50|OxiAddSI-IH-radius-right |50|50|50| OxiAddSI-LL|lightbox| OxiAddSI-Link-open|| OxiAddSI-L-index|9999| OxiAddSI-L-bg|rgba(199, 104, 104, 1)| OxiAddSI-L-color|#ffffff| OxiAddSI-L-preloader|#9c5fb0|OxiAddSI-L-shadow |rgba(204, 204, 204, 1)|0|5|10|0|||||||#|| ||#||OxiAddSI-class ||#||#paicinaektao||#||OxiAddSI-image ||#||https://www.oxilab.org/wp-content/uploads/2019/01/architecture-black-and-white-brick-104707.jpg||#||OxiAddSIR-text ||#||PROMO PIC||#||OxiAddSI-Icon ||#||fab fa-twitter||#||OxiAddSI-Link ||#||||#||OxiAddSI-L-image ||#||https://www.oxilab.org/wp-content/uploads/2019/01/architecture-black-and-white-brick-104707.jpg||#|||',
    'Style 2 Demo 2OXIIMPORTsingle_imageOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddSI-padding-top |10|10|10|OxiAddSI-padding-bottom |10|10|10|OxiAddSI-padding-left |10|10|10|OxiAddSI-padding-right |10|10|10|OxiAddSI-margin-top |10|10|10|OxiAddSI-margin-bottom |10|10|10|OxiAddSI-margin-left |10|10|10|OxiAddSI-margin-right |10|10|10|OxiAddSI-box-shadow |rgba(201, 201, 201, 1)|0|5|10|0|OxiAddSIN-border-top |0|0|0|OxiAddSIN-border-bottom |0|0|0|OxiAddSIN-border-left |0|0|0|OxiAddSIN-border-right |0|0|0|OxiAddSIN-border |solid|#ad8e8e||OxiAddSIN-radius-top |0|0|0|OxiAddSIN-radius-bottom |0|0|0|OxiAddSIN-radius-left |0|0|0|OxiAddSIN-radius-right |0|0|0|OxiAddSIN-image |rgba(105, 0, 161, 0.77)|OxiAddSIN-image-inner|0|OxiAddSIH-border-top |0|0|0|OxiAddSIH-border-bottom |0|0|0|OxiAddSIH-border-left |0|0|0|OxiAddSIH-border-right |0|0|0|OxiAddSIH-border |solid|#b202c9||OxiAddSIH-radius-top |0|0|0|OxiAddSIH-radius-bottom |0|0|0|OxiAddSIH-radius-left |0|0|0|OxiAddSIH-radius-right |0|0|0|OxiAddSIH-image |rgba(222, 73, 73, 0.8)|OxiAddSIH-image-inner|0| OxiAddSIR|none|OxiAddSIR-size|20|20|20| OxiAddSIR-color|#ffffff| OxiAddSIR-bgcolor||OxiAddSIR-family |Roboto Slab|100|OxiAddSIR-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddSIR-padding-top |10|10|10|OxiAddSIR-padding-bottom |10|10|10|OxiAddSIR-padding-left |10|10|10|OxiAddSIR-padding-right |10|10|10| OxiAddSIN-G|0| OxiAddSIH-G|0| OxiAddSIH-bgcolor|rgba(91,91,179,0.61)|OxiAddSI-animation||1.6:false:false:500:10:0.2|0.5//| OxiAddSIN-bgcolor|rgba(139,0,194,0.00)| OxiAddSIR-position|right| OxiAddSIR-width|200| OxiAddSIR-top|37| OxiAddSIR-left|-43|OxiAddSI-I-size|30|30|30|OxiAddSI-I-width|80|80|80| OxiAddSI-I-color|#ffffff| OxiAddSI-I-bgcolor|rgba(75,99,47,1.00)|OxiAddSI-I-border-top |0|0|0|OxiAddSI-I-border-bottom |0|0|0|OxiAddSI-I-border-left |0|0|0|OxiAddSI-I-border-right |0|0|0|OxiAddSI-I-border |inset|#c78282||OxiAddSI-I-radius-top |0|0|0|OxiAddSI-I-radius-bottom |0|0|0|OxiAddSI-I-radius-left |0|0|0|OxiAddSI-I-radius-right |0|0|0| OxiAddSI-IH-color|#ffffff| OxiAddSI-IH-bgcolor|rgba(133, 66, 66, 1)|OxiAddSI-IH-border |solid|#804a4a||OxiAddSI-IH-radius-top |20|20|20|OxiAddSI-IH-radius-bottom |20|20|20|OxiAddSI-IH-radius-left |20|20|20|OxiAddSI-IH-radius-right |20|20|20| OxiAddSI-LL|lightbox| OxiAddSI-Link-open|| OxiAddSI-L-index|9999| OxiAddSI-L-bg|rgba(199, 104, 104, 1)| OxiAddSI-L-color|#ffffff| OxiAddSI-L-preloader|#9c5fb0|OxiAddSI-L-shadow |rgba(204, 204, 204, 1)|0|5|10|0|||||||#|| ||#||OxiAddSI-class ||#||#paicinaektao||#||OxiAddSI-image ||#||https://www.oxilab.org/wp-content/uploads/2019/01/architecture-black-and-white-brick-104707.jpg||#||OxiAddSIR-text ||#||PROMO PIC||#||OxiAddSI-Icon ||#||fab fa-twitter||#||OxiAddSI-Link ||#||||#||OxiAddSI-L-image ||#||https://www.oxilab.org/wp-content/uploads/2019/01/architecture-black-and-white-brick-104707.jpg||#|||',
    'Style 3OXIIMPORTsingle_imageOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddSI-padding-top |10|10|10|OxiAddSI-padding-bottom |10|10|10|OxiAddSI-padding-left |10|10|10|OxiAddSI-padding-right |10|10|10|OxiAddSI-margin-top |5|5|5|OxiAddSI-margin-bottom |5|5|5|OxiAddSI-margin-left |5|5|5|OxiAddSI-margin-right |5|5|5|OxiAddSI-box-shadow |rgba(201, 201, 201, 1)|0|0|0|0|OxiAddSIN-border-top |0|0|0|OxiAddSIN-border-bottom |0|0|0|OxiAddSIN-border-left |0|0|0|OxiAddSIN-border-right |0|0|0|OxiAddSIN-border |solid|#ad8e8e||OxiAddSIN-radius-top |0|0|0|OxiAddSIN-radius-bottom |0|0|0|OxiAddSIN-radius-left |0|0|0|OxiAddSIN-radius-right |0|0|0|OxiAddSIN-image |rgba(105, 0, 161, 0.77)|OxiAddSIN-image-inner|0|OxiAddSIH-border-top |0|0|0|OxiAddSIH-border-bottom |0|0|0|OxiAddSIH-border-left |0|0|0|OxiAddSIH-border-right |0|0|0|OxiAddSIH-border |solid|#b202c9||OxiAddSIH-radius-top |0|0|0|OxiAddSIH-radius-bottom |0|0|0|OxiAddSIH-radius-left |0|0|0|OxiAddSIH-radius-right |0|0|0|OxiAddSIH-image |rgba(128, 83, 153, 0.47)|OxiAddSIH-image-inner|10| OxiAddSIR|block|OxiAddSIR-size|20|20|20| OxiAddSIR-color|#ffffff| OxiAddSIR-bgcolor|rgba(125, 68, 163, 1)|OxiAddSIR-family |Roboto Slab|300|OxiAddSIR-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddSIR-padding-top |8|8|8|OxiAddSIR-padding-bottom |8|8|8|OxiAddSIR-padding-left |8|8|8|OxiAddSIR-padding-right |8|8|8| OxiAddSIN-G|100| OxiAddSIH-G|0| OxiAddSIH-bgcolor|rgba(101, 55, 171, 0.42)|OxiAddSI-animation||2:false:false:500:10:0.2|0//| OxiAddSIN-bgcolor|rgba(255, 255, 255, 0)| OxiAddSIR-position|right| OxiAddSIR-width|200| OxiAddSIR-top|37| OxiAddSIR-left|-43|OxiAddSI-B-size|20|20|20||||| OxiAddSI-B-color|#ffffff| OxiAddSI-B-bgcolor|rgba(44,38,153,0.51)|OxiAddSI-B-border-top |0|0|0|OxiAddSI-B-border-bottom |0|0|0|OxiAddSI-B-border-left |0|0|0|OxiAddSI-B-border-right |0|0|0|OxiAddSI-B-border |solid|#b202c9||OxiAddSI-B-radius-top |50|50|50|OxiAddSI-B-radius-bottom |50|50|50|OxiAddSI-B-radius-left |50|50|50|OxiAddSI-B-radius-right |50|50|50| OxiAddSI-BH-color|#ffffff| OxiAddSI-BH-bgcolor|rgba(23,118,166,1.00)|OxiAddSI-BH-border |solid|#7d7d7d||OxiAddSI-BH-radius-top |30|30|30|OxiAddSI-BH-radius-bottom |30|30|30|OxiAddSI-BH-radius-left |30|30|30|OxiAddSI-BH-radius-right |30|30|30| OxiAddSI-LL|lightbox| OxiAddSI-Link-open|| OxiAddSI-L-index|9999| OxiAddSI-L-bg|rgba(77,77,77,0.28)| OxiAddSI-L-color|#ebe8e8| OxiAddSI-L-preloader|#d1c9c9|OxiAddSI-L-shadow |rgba(255, 255, 255, 1)|0|0|8|0|OxiAddSI-B-padding-top |10|10|10|OxiAddSI-B-padding-bottom |10|10|10|OxiAddSI-B-padding-left |20|20|20|OxiAddSI-B-padding-right |20|20|20|OxiAddSI-B-family |Roboto Slab|100|OxiAddSI-B-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddSI-BH-border-top |3|3|3|OxiAddSI-BH-border-bottom |3|3|3|OxiAddSI-BH-border-left |3|3|3|OxiAddSI-BH-border-right |3|3|3|||||||#|| ||#||OxiAddSI-class ||#||#paicinaektao||#||OxiAddSI-image ||#||https://www.oxilab.org/wp-content/uploads/2019/01/asdasdasd.jpeg||#||OxiAddSIR-text ||#||PROMO PIC||#||OxiAddSI-button ||#||Button Text||#||OxiAddSI-Link ||#||#||#||OxiAddSI-L-image ||#||https://www.oxilab.org/wp-content/uploads/2019/01/pexels-photo-167629.jpeg||#|||',
    'Style 4OXIIMPORTsingle_imageOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddSI-padding-top |10|10|10|OxiAddSI-padding-bottom |10|10|10|OxiAddSI-padding-left |10|10|10|OxiAddSI-padding-right |10|10|10|OxiAddSI-margin-top |0|0|0|OxiAddSI-margin-bottom |0|0|0|OxiAddSI-margin-left |0|0|0|OxiAddSI-margin-right |0|0|0|OxiAddSI-box-shadow |rgba(230, 230, 230, 1)|0|5|10|0|OxiAddSIN-radius-top |0|0|0|OxiAddSIN-radius-bottom |0|0|0|OxiAddSIN-radius-left |0|0|0|OxiAddSIN-radius-right |0|0|0|OxiAddSIH-radius-top |0|0|0|OxiAddSIH-radius-bottom |0|0|0|OxiAddSIH-radius-left |0|0|0|OxiAddSIH-radius-right |0|0|0| OxiAddSIN-G|30| OxiAddSIH-G|0| OxiAddSIH-bgcolor|rgba(255, 255, 255, 0)|OxiAddSI-animation||:false:false:500:10:0.2|//| OxiAddSIN-bgcolor|rgba(135, 19, 19, 0)| OxiAddSIN-S|1| OxiAddSIN-animaton-D|5| OxiAddSIH-S|1.5|OxiAddSIH-box-shadow |rgba(150, 145, 145, 1)|0|10|35|5|||||||#|| ||#||OxiAddSI-class ||#||#paicinaektao||#||OxiAddSI-image ||#||https://www.oxilab.org/wp-content/uploads/2019/01/cold-dark-eerie-414144.jpg||#||OxiAddSIR-text ||#||||#|||'
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
