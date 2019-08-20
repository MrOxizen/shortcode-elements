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
$freeimport = array('style-1','style-2','style-3');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = array(
	'Style 1OXIIMPORTcall_to_actionOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|oxi-call-button-opening-type |_blank|||||||oxi-call-button-font-size|18|16|12|oxi-call-button-color |#242424|oxi-call-button-bg-color |rgba(255,208,18,1.00)|oxi-call-button-H-color |#242424|oxi-call-button-H-bg-color |rgba(255,255,255,1.00)|oxi-call-button-border-width-top |0|0|0|oxi-call-button-border-width-bottom |0|0|0|oxi-call-button-border-width-left |0|0|0|oxi-call-button-border-width-right |0|0|0|oxi-call-button-border |solid|#ffffff||oxi-call-button-font-family |Raleway|400|oxi-call-button-font-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 0):|oxi-call-button-border-radius-top |50|50|50|oxi-call-button-border-radius-bottom |50|50|50|oxi-call-button-border-radius-left |50|50|50|oxi-call-button-border-radius-right |50|50|50|oxi-call-button-padding-top |15|15|15|oxi-call-button-padding-bottom |15|15|15|oxi-call-button-padding-left |35|25|20|oxi-call-button-padding-right |35|25|20|oxi-call-button-margin-top |13|13|13|oxi-call-button-margin-bottom |13|13|13|oxi-call-button-margin-left |0|0|0|oxi-call-button-margin-right |0|0|0|oxi-call-button-border-hover |dotted|#ffffff||oxi-call-button-H-border-radius-top |50|50|50|oxi-call-button-H-border-radius-bottom |50|50|50|oxi-call-button-H-border-radius-left |50|50|50|oxi-call-button-H-border-radius-right |50|50|50|oxi-call-button-animation||2:false:false:500:10:0.2|0//|oxi-call-action-bg-image|rgba(2,26,72,1.00)|||oxi-call-full-padding-top |180|100|100|oxi-call-full-padding-bottom |180|100|100|oxi-call-full-padding-left |0|100|0|oxi-call-full-padding-right |0|100|0|oxi-call-action-heading-color |#ffd012|oxi-call-action-heading-font-size|85|65|35|oxi-call-action-heading-font-family |Roboto|700|oxi-call-action-heading-font-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 0):|oxi-call-action-heading-padding-top |25|25|25|oxi-call-action-heading-padding-bottom |25|25|25|oxi-call-action-heading-padding-left |0|0|0|oxi-call-action-heading-padding-right |0|0|0|oxi-call-action-heading-margin-top |0|0|0|oxi-call-action-heading-margin-bottom |0|0|0|oxi-call-action-heading-margin-left |0|0|0|oxi-call-action-heading-margin-right |0|0|0|oxi-call-action-sub-heading-color |#ffffff|oxi-call-action-sub-heading-font-size|18|16|12|oxi-call-action-sub-heading-font-family |Open Sans|500|oxi-call-action-sub-heading-font-style |normal:1.3|center:0()0()0()#ffffff:|oxi-call-action-sub-heading-padding-top |0|0|0|oxi-call-action-sub-heading-padding-bottom |0|0|0|oxi-call-action-sub-heading-padding-left |0|0|0|oxi-call-action-sub-heading-padding-right |0|0|0|oxi-call-action-sub-heading-margin-top |0|0|0|oxi-call-action-sub-heading-margin-bottom |0|0|0|oxi-call-action-sub-heading-margin-left |0|0|0|oxi-call-action-sub-heading-margin-right |0|0|0|||#||oxi-call-button-text ||#||CONTACT NOW||#||oxi-call-button-url ||#||#||#||oxi-call-action-heading ||#||Contact Us !!||#||oxi-call-action-sub-heading ||#||Need your service Immediately||#||',
	'Style 2OXIIMPORTcall_to_actionOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|oxi-call-button-opening-type |_blank|||||||oxi-call-button-font-size|13|13|13|oxi-call-button-color |#0059ff|oxi-call-button-bg-color |rgba(255,255,255,1.00)|oxi-call-button-H-color |#ffffff|oxi-call-button-H-bg-color |rgba(39,39,39,1.00)|oxi-call-button-border-width-top |0|0|0|oxi-call-button-border-width-bottom |0|0|0|oxi-call-button-border-width-left |0|0|0|oxi-call-button-border-width-right |0|0|0|oxi-call-button-border |solid|#ffffff||oxi-call-button-font-family |Raleway|400|oxi-call-button-font-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 0)|oxi-call-button-border-radius-top |50|50|50|oxi-call-button-border-radius-bottom |50|50|50|oxi-call-button-border-radius-left |50|50|50|oxi-call-button-border-radius-right |50|50|50|oxi-call-button-padding-top |12|12|12|oxi-call-button-padding-bottom |12|12|12|oxi-call-button-padding-left |25|25|25|oxi-call-button-padding-right |25|25|25|oxi-call-button-margin-top |10|10|10|oxi-call-button-margin-bottom |10|10|10|oxi-call-button-margin-left |0|0|0|oxi-call-button-margin-right |0|0|0|oxi-call-button-border-hover |dotted|#ffffff||oxi-call-button-H-border-radius-top |50|50|50|oxi-call-button-H-border-radius-bottom |50|50|50|oxi-call-button-H-border-radius-left |50|50|50|oxi-call-button-H-border-radius-right |50|50|50|oxi-call-button-animation||0.5|0.5//|oxi-call-action-bg-image|linear-gradient(45deg, rgba(245,22,93,0.77) 0%,rgba(5,85,245,0.83) 100%)|https://www.oxilab.org/wp-content/uploads/2018/10/content2.png||oxi-call-full-padding-top |80|80|80|oxi-call-full-padding-bottom |80|80|80|oxi-call-full-padding-left |0|0|0|oxi-call-full-padding-right |0|0|0|oxi-call-action-heading-color |#ffffff|oxi-call-action-heading-font-size|36|24|20|oxi-call-action-heading-font-family |Roboto|700|oxi-call-action-heading-font-style |normal:2|center:0()0()0()rgba(255, 255, 255, 0)|oxi-call-action-heading-padding-top |25|25|25|oxi-call-action-heading-padding-bottom |25|25|25|oxi-call-action-heading-padding-left |0|0|0|oxi-call-action-heading-padding-right |0|0|0|oxi-call-action-heading-margin-top |0|0|0|oxi-call-action-heading-margin-bottom |0|0|0|oxi-call-action-heading-margin-left |0|0|0|oxi-call-action-heading-margin-right |0|0|0|oxi-call-action-sub-heading-color |#ffffff|oxi-call-action-sub-heading-font-size|18|14|15|oxi-call-action-sub-heading-font-family |Open+Sans|500|oxi-call-action-sub-heading-font-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 0)|oxi-call-action-sub-heading-padding-top |0|0|0|oxi-call-action-sub-heading-padding-bottom |0|0|0|oxi-call-action-sub-heading-padding-left |80|9|80|oxi-call-action-sub-heading-padding-right |80|9|80|oxi-call-action-sub-heading-margin-top |0|0|0|oxi-call-action-sub-heading-margin-bottom |35|35|35|oxi-call-action-sub-heading-margin-left |0|0|0|oxi-call-action-sub-heading-margin-right |0|0|0|oxi-call-action-max-width|800|500|800|||#||oxi-call-button-text ||#||Contact Now||#||oxi-call-button-url ||#||#||#||oxi-call-action-heading ||#||Take your sit, & don’t forget to recive all updates||#||oxi-call-action-sub-heading ||#||There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.||#||',
	'Style 3 OXIIMPORTcall_to_actionOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|oxi-call-button-opening-type |_blank|oxi-call-button-text-align ||||||oxi-call-button-font-size|17|15|12|oxi-call-button-color |#ffffff|oxi-call-button-bg-color |rgba(255,255,255,-0.00)|oxi-call-button-H-color |#0088e3|oxi-call-button-H-bg-color |rgba(255,255,255,1.00)|oxi-call-button-border-width-top |2|2|2|oxi-call-button-border-width-bottom |2|2|2|oxi-call-button-border-width-left |2|2|2|oxi-call-button-border-width-right |2|2|2|oxi-call-button-border |solid|#ffffff||oxi-call-button-font-family |Open+Sans|600|oxi-call-button-font-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 0)|oxi-call-button-border-radius-top |50|50|50|oxi-call-button-border-radius-bottom |50|50|50|oxi-call-button-border-radius-left |50|50|50|oxi-call-button-border-radius-right |50|50|50|oxi-call-button-padding-top |17|15|12|oxi-call-button-padding-bottom |17|15|12|oxi-call-button-padding-left |30|25|25|oxi-call-button-padding-right |30|25|25|oxi-call-button-margin-top |15|40|20|oxi-call-button-margin-bottom |15|40|20|oxi-call-button-margin-left |0|0|0|oxi-call-button-margin-right |0|0|0|oxi-call-button-border-hover |solid|#ffffff||oxi-call-button-H-border-radius-top |50|50|50|oxi-call-button-H-border-radius-bottom |50|50|50|oxi-call-button-H-border-radius-left |50|50|50|oxi-call-button-H-border-radius-right |50|50|50|oxi-call-button-animation|swing|2|0//|oxi-call-action-bg-image|rgba(0, 136, 227, 0.75)|https://www.oxilab.org/wp-content/uploads/2019/03/dental-hero.jpg||oxi-call-full-padding-top |110|85|40|oxi-call-full-padding-bottom |110|85|40|oxi-call-full-padding-left |110|85|40|oxi-call-full-padding-right |110|85|40|oxi-call-action-heading-color |#ffffff|oxi-call-action-heading-font-size|38|33|21|oxi-call-action-heading-font-family |Roboto|700|oxi-call-action-heading-font-style |normal:1.2|left:0()0()0()rgba(255, 255, 255, 0)|oxi-call-action-heading-padding-top |10|10|10|oxi-call-action-heading-padding-bottom |10|10|10|oxi-call-action-heading-padding-left |0|0|0|oxi-call-action-heading-padding-right |0|0|0|oxi-call-action-heading-margin-top |0|0|0|oxi-call-action-heading-margin-bottom |0|0|0|oxi-call-action-heading-margin-left |0|0|0|oxi-call-action-heading-margin-right |0|0|0|oxi-call-action-sub-heading-color |#ffffff|oxi-call-action-sub-heading-font-size|18|15|12|oxi-call-action-sub-heading-font-family |Open+Sans|500|oxi-call-action-sub-heading-font-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0)|oxi-call-action-sub-heading-padding-top |3|3|3|oxi-call-action-sub-heading-padding-bottom |3|3|3|oxi-call-action-sub-heading-padding-left |0|0|0|oxi-call-action-sub-heading-padding-right |0|0|0|oxi-call-action-sub-heading-margin-top |0|0|0|oxi-call-action-sub-heading-margin-bottom |0|0|0|oxi-call-action-sub-heading-margin-left |0|0|0|oxi-call-action-sub-heading-margin-right |0|0|0|oxi-call-button-text-align ||||#||oxi-call-button-text ||#||Contact Now||#||oxi-call-button-url ||#||#||#||oxi-call-action-heading ||#||You start new business with us!||#||oxi-call-action-sub-heading ||#||Expound the actual teachings of the great explorer of the truth, the master.||#||',
	'Style 4OXIIMPORTcall_to_actionOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|oxi-call-button-opening-type |_blank|oxi-call-button-text-align ||||||oxi-call-button-font-size|17|15|12|oxi-call-button-color |#272727|oxi-call-button-bg-color |rgba(255,255,255,1.00)|oxi-call-button-H-color |#ffffff|oxi-call-button-H-bg-color |rgba(39,39,39,1.00)|oxi-call-button-border-width-top |2|2|2|oxi-call-button-border-width-bottom |2|2|2|oxi-call-button-border-width-left |2|2|2|oxi-call-button-border-width-right |2|2|2|oxi-call-button-border |solid|#272727||oxi-call-button-font-family |Raleway|600|oxi-call-button-font-style |normal:1.3|center:0()0()0()#ffffff:|oxi-call-button-border-radius-top |50|50|50|oxi-call-button-border-radius-bottom |50|50|50|oxi-call-button-border-radius-left |50|50|50|oxi-call-button-border-radius-right |50|50|50|oxi-call-button-padding-top |15|15|13|oxi-call-button-padding-bottom |15|15|13|oxi-call-button-padding-left |35|35|27|oxi-call-button-padding-right |35|35|27|oxi-call-button-margin-top |15|40|20|oxi-call-button-margin-bottom |15|40|20|oxi-call-button-margin-left |0|0|0|oxi-call-button-margin-right |0|0|0|oxi-call-button-border-hover |solid|#272727||oxi-call-button-H-border-radius-top |50|50|50|oxi-call-button-H-border-radius-bottom |50|50|50|oxi-call-button-H-border-radius-left |50|50|50|oxi-call-button-H-border-radius-right |50|50|50|oxi-call-button-animation||0.5:false:false:500:10:0.2|0.5//|oxi-call-action-bg-image|rgba(255,255,255,1.00)|||oxi-call-full-padding-top |50|50|50|oxi-call-full-padding-bottom |50|50|50|oxi-call-full-padding-left |50|50|50|oxi-call-full-padding-right |50|50|50|oxi-call-action-heading-color |#272727|oxi-call-action-heading-font-size|24|24|20|oxi-call-action-heading-font-family |Roboto|600|oxi-call-action-heading-font-style |normal:1.2|left:0()0()0()#ffffff:|oxi-call-action-heading-padding-top |10|10|20|oxi-call-action-heading-padding-bottom |10|10|20|oxi-call-action-heading-padding-left |20|20|20|oxi-call-action-heading-padding-right |20|20|20|oxi-call-action-heading-margin-top |0|0|0|oxi-call-action-heading-margin-bottom |0|0|0|oxi-call-action-heading-margin-left |0|0|0|oxi-call-action-heading-margin-right |0|0|0|oxi-call-action-sub-heading-color |#272727|oxi-call-action-sub-heading-font-size|15|15|14|oxi-call-action-sub-heading-font-family |Montserrat|400|oxi-call-action-sub-heading-font-style |normal:1.3|left:0()0()0()#ffffff:|oxi-call-action-sub-heading-padding-top |3|3|3|oxi-call-action-sub-heading-padding-bottom |3|3|3|oxi-call-action-sub-heading-padding-left |20|20|15|oxi-call-action-sub-heading-padding-right |20|20|15|oxi-call-action-sub-heading-margin-top |0|0|0|oxi-call-action-sub-heading-margin-bottom |0|0|0|oxi-call-action-sub-heading-margin-left |0|0|0|oxi-call-action-sub-heading-margin-right |0|0|0|oxi-call-button-text-align ||oxi-call-full-margin-top |5|5|5|oxi-call-full-margin-bottom |5|5|5|oxi-call-full-margin-left |5|5|5|oxi-call-full-margin-right |5|5|5|oxi-call-content-part-max-width|1180|1180|1180|oxi-call-box-shadow |rgba(0, 0, 0, 0.3)|0|5|10|0|oxi-call-middle-line-width|2|2|2|oxi-call-middle-line-height|50|50|50|oxi-call-middle-line-color |#292929|oxi-call-middle-line-on-off |on|||#||oxi-call-button-text ||#||Contact Us||#||oxi-call-button-url ||#||#||#||oxi-call-action-heading ||#||Subscribe to Newsletter||#||oxi-call-action-sub-heading ||#||Sign Up Here to get Letest Update.||#||',
	'Style 5OXIIMPORTcall_to_actionOXIIMPORTstyle-5OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|oxi-call-button-opening-type |_blank|oxi-call-button-text-align ||||||oxi-call-button-font-size|17|15|12|oxi-call-button-color |#272727|oxi-call-button-bg-color |rgba(255,255,255,1.00)|oxi-call-button-H-color |#ffffff|oxi-call-button-H-bg-color |rgba(63,81,181,1.00)|oxi-call-button-border-width-top |0|0|0|oxi-call-button-border-width-bottom |0|0|0|oxi-call-button-border-width-left |0|0|0|oxi-call-button-border-width-right |0|0|0|oxi-call-button-border |solid|#272727||oxi-call-button-font-family |Roboto|500|oxi-call-button-font-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 0.02):|oxi-call-button-border-radius-top |50|50|50|oxi-call-button-border-radius-bottom |50|50|50|oxi-call-button-border-radius-left |50|50|50|oxi-call-button-border-radius-right |50|50|50|oxi-call-button-padding-top |15|15|10|oxi-call-button-padding-bottom |15|15|10|oxi-call-button-padding-left |35|35|25|oxi-call-button-padding-right |35|35|25|oxi-call-button-margin-top |15|20|20|oxi-call-button-margin-bottom |15|20|20|oxi-call-button-margin-left |0|0|0|oxi-call-button-margin-right |20|20|20|oxi-call-button-border-hover |solid|#272727||oxi-call-button-H-border-radius-top |50|50|50|oxi-call-button-H-border-radius-bottom |50|50|50|oxi-call-button-H-border-radius-left |50|50|50|oxi-call-button-H-border-radius-right |50|50|50|oxi-call-button-animation||2:false:false:500:10:0.2|0//|oxi-call-action-bg-image|rgba(249,44,139,1.00)|||oxi-call-full-padding-top |25|25|25|oxi-call-full-padding-bottom |25|25|25|oxi-call-full-padding-left |35|35|35|oxi-call-full-padding-right |35|35|35|oxi-call-action-heading-color |#ffffff|oxi-call-action-heading-font-size|24|24|18|oxi-call-action-heading-font-family |Roboto|600|oxi-call-action-heading-font-style |normal:1.2|left:0()0()0()rgba(255, 255, 255, 0):|oxi-call-action-heading-padding-top |10|10|16|oxi-call-action-heading-padding-bottom |10|10|16|oxi-call-action-heading-padding-left |20|20|16|oxi-call-action-heading-padding-right |20|20|16|oxi-call-action-heading-margin-top |0|0|0|oxi-call-action-heading-margin-bottom |0|0|0|oxi-call-action-heading-margin-left |0|0|0|oxi-call-action-heading-margin-right |0|0|0|oxi-call-action-sub-heading-color |#ffffff|oxi-call-action-sub-heading-font-size|15|15|12|oxi-call-action-sub-heading-font-family |Montserrat|400|oxi-call-action-sub-heading-font-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0):|oxi-call-action-sub-heading-padding-top |3|3|3|oxi-call-action-sub-heading-padding-bottom |3|3|3|oxi-call-action-sub-heading-padding-left |20|20|15|oxi-call-action-sub-heading-padding-right |20|20|15|oxi-call-action-sub-heading-margin-top |0|0|0|oxi-call-action-sub-heading-margin-bottom |0|0|0|oxi-call-action-sub-heading-margin-left |0|0|0|oxi-call-action-sub-heading-margin-right |0|0|0|oxi-call-button-text-align ||oxi-call-full-margin-top |5|5|5|oxi-call-full-margin-bottom |5|5|5|oxi-call-full-margin-left |5|5|5|oxi-call-full-margin-right |5|5|5|oxi-call-content-part-max-width|1180|1180|1180|oxi-call-box-shadow |rgba(0, 0, 0, 0.25)|0|5|20|5|oxi-call-middle-line-width|2|2|2|oxi-call-middle-line-height|50|50|50|oxi-call-middle-line-color |#ffffff|oxi-call-full-border-radius-top |105|105|74|oxi-call-full-border-radius-bottom |105|105|74|oxi-call-full-border-radius-left |105|105|74|oxi-call-full-border-radius-right |105|105|74|oxi-call-middle-line-on-off |on|||#||oxi-call-button-text ||#||Contact Now||#||oxi-call-button-url ||#||#||#||oxi-call-action-heading ||#||Subscribe to Newsletter||#||oxi-call-action-sub-heading ||#||Sign Up Here to get Letest Update.||#||',
	'Style 6OXIIMPORTcall_to_actionOXIIMPORTstyle-6OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|oxi-call-button-opening-type |_blank|oxi-call-button-text-align |right|||||oxi-call-button-font-size|17|15|12|oxi-call-button-color |#ffffff|oxi-call-button-bg-color |rgba(236,90,54,1.00)|oxi-call-button-H-color |#ffffff|oxi-call-button-H-bg-color |rgba(63,81,181,1.00)|oxi-call-button-border-width-top |0|0|0|oxi-call-button-border-width-bottom |0|0|0|oxi-call-button-border-width-left |0|0|0|oxi-call-button-border-width-right |0|0|0|oxi-call-button-border |solid|#272727||oxi-call-button-font-family |Roboto|500|oxi-call-button-font-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0.02):|oxi-call-button-border-radius-top |50|50|50|oxi-call-button-border-radius-bottom |50|50|50|oxi-call-button-border-radius-left |50|50|50|oxi-call-button-border-radius-right |50|50|50|oxi-call-button-padding-top |15|15|12|oxi-call-button-padding-bottom |15|15|12|oxi-call-button-padding-left |35|35|35|oxi-call-button-padding-right |35|35|35|oxi-call-button-margin-top |15|40|20|oxi-call-button-margin-bottom |15|40|20|oxi-call-button-margin-left |0|0|0|oxi-call-button-margin-right |0|0|0|oxi-call-button-border-hover |solid|#272727||oxi-call-button-H-border-radius-top |50|50|50|oxi-call-button-H-border-radius-bottom |50|50|50|oxi-call-button-H-border-radius-left |50|50|50|oxi-call-button-H-border-radius-right |50|50|50|oxi-call-button-animation||2:false:false:500:10:0.2|0//|oxi-call-action-bg-image|rgba(255,255,255,0.71)|https://www.oxilab.org/wp-content/uploads/2019/03/modern-illustrated-city.png||oxi-call-full-padding-top |27|27|27|oxi-call-full-padding-bottom |27|27|27|oxi-call-full-padding-left |27|27|27|oxi-call-full-padding-right |27|27|27|oxi-call-action-heading-color |#ec5a36|oxi-call-action-heading-font-size|26|26|26|oxi-call-action-heading-font-family |Roboto|600|oxi-call-action-heading-font-style |normal:1.2|left:0()0()0()rgba(255, 255, 255, 0):|oxi-call-action-heading-padding-top |7|7|7|oxi-call-action-heading-padding-bottom |7|7|7|oxi-call-action-heading-padding-left |20|20|10|oxi-call-action-heading-padding-right |20|20|10|oxi-call-action-heading-margin-top |0|0|0|oxi-call-action-heading-margin-bottom |0|0|0|oxi-call-action-heading-margin-left |0|0|0|oxi-call-action-heading-margin-right |0|0|0|oxi-call-action-sub-heading-color |#292929|oxi-call-action-sub-heading-font-size|13|13|13|oxi-call-action-sub-heading-font-family |Montserrat|600|oxi-call-action-sub-heading-font-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0):|oxi-call-action-sub-heading-padding-top |3|3|3|oxi-call-action-sub-heading-padding-bottom |3|3|3|oxi-call-action-sub-heading-padding-left |20|20|15|oxi-call-action-sub-heading-padding-right |20|20|15|oxi-call-action-sub-heading-margin-top |0|0|0|oxi-call-action-sub-heading-margin-bottom |0|0|10|oxi-call-action-sub-heading-margin-left |0|0|0|oxi-call-action-sub-heading-margin-right |0|0|0|oxi-call-button-text-align |right|oxi-call-full-margin-top |5|5|5|oxi-call-full-margin-bottom |5|5|5|oxi-call-full-margin-left |5|5|5|oxi-call-full-margin-right |5|5|5|oxi-call-content-part-max-width|1180|1180|1180|oxi-call-box-shadow |rgba(0, 0, 0, 0.25)|0|5|10|2|||||||||||oxi-call-full-border-radius-top |7|7|7|oxi-call-full-border-radius-bottom |7|7|7|oxi-call-full-border-radius-left |7|7|7|oxi-call-full-border-radius-right |7|7|7|||oxi-call-action-icon-font-size|60|60|60|oxi-call-action-icon-color |#eb5732|oxi-call-action-icon-padding-top |5|5|5|oxi-call-action-icon-padding-bottom |5|5|5|oxi-call-action-icon-padding-left |20|20|20|oxi-call-action-icon-padding-right |20|20|20|oxi-call-action-icon-margin-top |0|0|0|oxi-call-action-icon-margin-bottom |0|0|0|oxi-call-action-icon-margin-left |0|0|0|oxi-call-action-icon-margin-right |0|0|0|||#||oxi-call-button-text ||#||Contact Now||#||oxi-call-button-url ||#||#||#||oxi-call-action-heading ||#||Subscribe to Newsletter||#||oxi-call-action-sub-heading ||#||Sign Up Here to get Letest Update.||#||oxi-call-action-icon ||#||fas fa-street-view||#||',
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

