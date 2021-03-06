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
$freeimport = array('style-1', 'style-2', 'style-3');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = array(
    'Style 1OXIIMPORTalert_boxOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG || OxiAddonsAL-G-BG |rgba(229,134,135,1.00)|OxiAddonsAL-G-BR-top |0|0|0|OxiAddonsAL-G-BR-bottom |0|0|0|OxiAddonsAL-G-BR-left |0|0|0|OxiAddonsAL-G-BR-right |0|0|0|OxiAddonsAL-G-P-top |10|8|5|OxiAddonsAL-G-P-bottom |10|8|5|OxiAddonsAL-G-P-left |15|8|5|OxiAddonsAL-G-P-right |10|8|5|OxiAddonsAL-G-M-top |5|5|5|OxiAddonsAL-G-M-bottom |5|5|5|OxiAddonsAL-G-M-left |5|5|5|OxiAddonsAL-G-M-right |5|5|5|OxiAddonsAL-G-B-Shadow |rgba(204, 198, 198, 1)|1|1|15|2|OxiAddonsAL-G-animation||0.5:false:false:500:10:0.2|0.5//| OxiAddonsAL-I-BC |rgba(204,96,96,1.00)|OxiAddonsAL-I-FS |30|25|18| OxiAddonsAL-I-C |#ffffff|OxiAddonsAL-I-P-top |10|8|5|OxiAddonsAL-I-P-bottom |10|8|5|OxiAddonsAL-I-P-left |25|20|16|OxiAddonsAL-I-P-right |25|20|16|OxiAddonsAL-H-FS |20|18|16| OxiAddonsAL-H-C|#ffffff|OxiAddonsAL-H-F-family |Montserrat|700|OxiAddonsAL-H-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-H-P-top |4|4|2|OxiAddonsAL-H-P-bottom |4|4|2|OxiAddonsAL-H-P-left |4|4|2|OxiAddonsAL-H-P-right |4|4|2|OxiAddonsAL-DE-FS |15|15|13| OxiAddonsAL-DE-C |#ffffff|OxiAddonsAL-DE-F-family |Montserrat|300|OxiAddonsAL-DE-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-DE-P-top |3|3|2|OxiAddonsAL-DE-P-bottom |3|3|2|OxiAddonsAL-DE-P-left |3|3|2|OxiAddonsAL-DE-P-right |3|3|2| OxiAddonsAL-CI-BC |rgba(204,96,96,1.00)|OxiAddonsAL-CI-FS |18|18|16| OxiAddonsAL-CI-C |#fafafa|OxiAddonsAL-CI-P-top |10|8|5|OxiAddonsAL-CI-P-bottom |10|8|5|OxiAddonsAL-CI-P-left |25|20|16|OxiAddonsAL-CI-P-right |25|20|16|||#|| OxiAddonsAL-I ||#||fas fa-exclamation-triangle||#|| OxiAddonsAL-HT ||#||ERROR||#|| OxiAddonsAL-DE ||#||This a Error Message Box, Looks Pretty Slick||#|| OxiAddonsAL-CI ||#||fa fa-times||#|| ||#||',
    'Style 2OXIIMPORTalert_boxOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG || OxiAddonsAL-2-G-BG |rgba(28, 107, 14, 1)|OxiAddonsAL-2-G-BR-top |0|0|0|OxiAddonsAL-2-G-BR-bottom |0|0|0|OxiAddonsAL-2-G-BR-left |0|0|0|OxiAddonsAL-2-G-BR-right |0|0|0|OxiAddonsAL-2-G-P-top |15|10|7|OxiAddonsAL-2-G-P-bottom |15|10|7|OxiAddonsAL-2-G-P-left |15|10|7|OxiAddonsAL-2-G-P-right |15|10|7|OxiAddonsAL-2-G-M-top |5|5|5|OxiAddonsAL-2-G-M-bottom |5|5|5|OxiAddonsAL-2-G-M-left |5|5|5|OxiAddonsAL-2-G-M-right |5|5|5|OxiAddonsAL-2-G-B-Shadow |rgba(204, 198, 198, 1)|1|1|15|2|OxiAddonsAL-2-G-animation||0.5:false:false:500:10:0.2|0.5//| OxiAddonsAL-2-I-BC |rgba(38,168,15,1.00)|OxiAddonsAL-2-I-FS |16|14|14| OxiAddonsAL-2-I-C |#1c6b0e|OxiAddonsAL-2-I-P-top |25|20|15|OxiAddonsAL-2-I-P-bottom |25|20|15|OxiAddonsAL-2-I-P-left |25|20|15|OxiAddonsAL-2-I-P-right |10|20|15|OxiAddonsAL-2-H-FS |24|20|18| OxiAddonsAL-2-H-C|#ffffff|OxiAddonsAL-2-H-F-family |Open+Sans|700|OxiAddonsAL-2-H-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-2-H-P-top |10|8|5|OxiAddonsAL-2-H-P-bottom |10|8|5|OxiAddonsAL-2-H-P-left |10|8|5|OxiAddonsAL-2-H-P-right |10|8|5|OxiAddonsAL-2-DE-FS |15|15|13| OxiAddonsAL-2-DE-C |#ffffff|OxiAddonsAL-2-DE-F-family |Open+Sans|300|OxiAddonsAL-2-DE-F-style |normal:1|left:0()0()0()#ffffff:|OxiAddonsAL-2-DE-P-top |0|0|5|OxiAddonsAL-2-DE-P-bottom |10|10|5|OxiAddonsAL-2-DE-P-left |10|10|5|OxiAddonsAL-2-DE-P-right |0|0|5| OxiAddonsAL-2-I-BG |rgba(255,255,255,1.00)|OxiAddonsAL-2-CI-FS |18|16|14| OxiAddonsAL-2-CI-C |#ffffff|OxiAddonsAL-2-CI-P-top |10|20|15|OxiAddonsAL-2-CI-P-bottom |10|20|15|OxiAddonsAL-2-CI-P-left |10|20|15|OxiAddonsAL-2-CI-P-right |25|20|15|OxiAddonsAL-2-I-WH |20|14|14|OxiAddonsAL-2-I-BR-top |100|100|100|OxiAddonsAL-2-I-BR-bottom |100|100|100|OxiAddonsAL-2-I-BR-left |100|100|100|OxiAddonsAL-2-I-BR-right |100|100|100|||#|| OxiAddonsAL-2-I ||#||fa fa-times||#|| OxiAddonsAL-2-HT ||#||Success||#|| OxiAddonsAL-2-DE ||#||There are many variations of passages||#|| OxiAddonsAL-2-CI ||#||fa fa-times||#|| ||#||',
    'Style 3OXIIMPORTalert_boxOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG || OxiAddonsAL-3-G-BG |rgba(229, 176, 70, 1)|OxiAddonsAL-3-G-BR-top |5|4|3|OxiAddonsAL-3-G-BR-bottom |5|4|3|OxiAddonsAL-3-G-BR-left |5|4|3|OxiAddonsAL-3-G-BR-right |5|4|3|OxiAddonsAL-3-G-P-top |5|4|3|OxiAddonsAL-3-G-P-bottom |5|4|3|OxiAddonsAL-3-G-P-left |5|4|3|OxiAddonsAL-3-G-P-right |5|4|3|OxiAddonsAL-3-G-M-top |5|5|5|OxiAddonsAL-3-G-M-bottom |5|5|5|OxiAddonsAL-3-G-M-left |5|5|5|OxiAddonsAL-3-G-M-right |5|5|5|OxiAddonsAL-3-G-B-Shadow |rgba(204, 198, 198, 1)|1|1|15|2|OxiAddonsAL-3-G-animation||0.5:false:false:500:10:0.2|0.5//| OxiAddonsAL-3-I-BC |rgba(229, 176, 70, 1)|OxiAddonsAL-3-I-FS |24|18|16| OxiAddonsAL-3-I-C |#ffffff|OxiAddonsAL-3-I-P-top |10|8|5|OxiAddonsAL-3-I-P-bottom |10|8|5|OxiAddonsAL-3-I-P-left |25|20|15|OxiAddonsAL-3-I-P-right |25|20|15|OxiAddonsAL-3-H-FS |20|18|20| OxiAddonsAL-3-H-C|#ffffff|OxiAddonsAL-3-H-F-family |Open+Sans|700|OxiAddonsAL-3-H-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-3-H-P-top |4|3|4|OxiAddonsAL-3-H-P-bottom |4|3|4|OxiAddonsAL-3-H-P-left |4|3|4|OxiAddonsAL-3-H-P-right |4|3|4|OxiAddonsAL-3-DE-FS |15|14|13| OxiAddonsAL-3-DE-C |#ffffff|OxiAddonsAL-3-DE-F-family |Roboto|300|OxiAddonsAL-3-DE-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-3-DE-P-top |3|3|2|OxiAddonsAL-3-DE-P-bottom |3|3|2|OxiAddonsAL-3-DE-P-left |3|3|2|OxiAddonsAL-3-DE-P-right |3|3|2| OxiAddonsAL-3-CI-BC |rgba(229, 176, 70, 1)|OxiAddonsAL-3-CI-FS |18|18|16| OxiAddonsAL-3-CI-C |#fafafa|OxiAddonsAL-3-CI-P-top |10|8|5|OxiAddonsAL-3-CI-P-bottom |10|8|5|OxiAddonsAL-3-CI-P-left |25|20|15|OxiAddonsAL-3-CI-P-right |25|20|15| OxiAddonsAL-3-C-BC |rgba(243,187,76,1.00)|OxiAddonsAL-3-C-P-top |20|18|15|OxiAddonsAL-3-C-P-bottom |20|18|15|OxiAddonsAL-3-C-P-left |20|18|15|OxiAddonsAL-3-C-P-right |20|18|15|OxiAddonsAL-3-C-M-top |0|0|0|OxiAddonsAL-3-C-M-bottom |0|0|0|OxiAddonsAL-3-C-M-left |5|4|3|OxiAddonsAL-3-C-M-right |5|4|3|OxiAddonsEW-3-IB-B |5|solid|| OxiAddonsAL-3-IB-BC |#f3bb4c|OxiAddonsAL-3-IB-P-top |6|5|4|OxiAddonsAL-3-IB-P-bottom |6|5|4|OxiAddonsAL-3-IB-P-left |6|5|4|OxiAddonsAL-3-IB-P-right |6|5|4|||#|| OxiAddonsAL-3-I ||#||fas fa-exclamation-triangle||#|| OxiAddonsAL-3-HT ||#||Warning||#|| OxiAddonsAL-3-DE ||#||THIS A ERROR MESSAGE BOX, LOOKS PRETTY SLICK.||#|| OxiAddonsAL-3-CI ||#||fa fa-times||#|| ||#||',
    'Style 4OXIIMPORTalert_boxOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG || OxiAddonsAL-4-G-BG |rgba(255,255,255,1.00)|OxiAddonsAL-4-G-BR-top |100|70|60|OxiAddonsAL-4-G-BR-bottom |100|70|60|OxiAddonsAL-4-G-BR-left |100|70|60|OxiAddonsAL-4-G-BR-right |100|70|60|OxiAddonsAL-4-G-P-top |5|5|3|OxiAddonsAL-4-G-P-bottom |5|5|3|OxiAddonsAL-4-G-P-left |5|5|3|OxiAddonsAL-4-G-P-right |5|5|3|OxiAddonsAL-4-G-M-top |5|5|5|OxiAddonsAL-4-G-M-bottom |5|5|5|OxiAddonsAL-4-G-M-left |5|5|5|OxiAddonsAL-4-G-M-right |5|5|5|OxiAddonsAL-4-G-B-Shadow |rgba(204, 198, 198, 1)|1|1|15|2|OxiAddonsAL-4-G-animation||0.5:false:false:500:10:0.2|0.5//| ||OxiAddonsAL-4-I-FS |24|20|16| OxiAddonsAL-4-I-C |#b51717|OxiAddonsAL-4-I-P-top |10|8|5|OxiAddonsAL-4-I-P-bottom |10|8|5|OxiAddonsAL-4-I-P-left |25|20|15|OxiAddonsAL-4-I-P-right |25|20|15|OxiAddonsAL-4-H-FS |20|18|18| OxiAddonsAL-4H-C|#b51717|OxiAddonsAL-4-H-F-family |Open+Sans|700|OxiAddonsAL-4-H-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-4-H-P-top |4|3|2|OxiAddonsAL-4-H-P-bottom |4|3|2|OxiAddonsAL-4-H-P-left |4|3|2|OxiAddonsAL-4-H-P-right |4|3|2|OxiAddonsAL-4-DE-FS |15|14|13| OxiAddonsAL-4DE-C |#b51717|OxiAddonsAL-4-DE-F-family |Open+Sans|300|OxiAddonsAL-4-DE-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-4-DE-P-top |3|2|2|OxiAddonsAL-4-DE-P-bottom |3|2|2|OxiAddonsAL-4-DE-P-left |3|2|2|OxiAddonsAL-4-DE-P-right |3|2|2| OxiAddonsAL-4-CI-BC |rgba(255,255,255,1.00)|OxiAddonsAL-4-CI-FS |18|18|16| OxiAddonsAL-4-CI-C |#b51717|OxiAddonsAL-4-CI-P-top |10|8|5|OxiAddonsAL-4-CI-P-bottom |10|8|5|OxiAddonsAL-4-CI-P-left |25|20|15|OxiAddonsAL-4-CI-P-right |25|20|15| || |||||||||||||||| ||||||||||||||||OxiAddonsEW-4-IB-B |3|solid|| OxiAddonsAL-4-IB-BC |#b51717|OxiAddonsAL-4-IB-P-top |25|20|15|OxiAddonsAL-4-IB-P-bottom |25|20|15|OxiAddonsAL-4-IB-P-left |25|20|15|OxiAddonsAL-4-IB-P-right |25|20|15|OxiAddonsEW-4-G-B |3|solid|| OxiAddonsAL-4-G-BC |#b51717|||#|| OxiAddonsAL-4-I ||#||far fa-bell||#|| OxiAddonsAL-4-HT ||#||Alert||#|| OxiAddonsAL-4-DE ||#||This is a Nice Alert Box||#|| OxiAddonsAL-4-CI ||#||fa fa-times||#|| ||#||',
    'Style 5OXIIMPORTalert_boxOXIIMPORTstyle-5OXIIMPORToxi-addons-preview-BG || OxiAddonsAL-FI-G-BG |rgba(12, 90, 207, 1)|OxiAddonsAL-FI-G-BR-top |0|0|0|OxiAddonsAL-FI-G-BR-bottom |0|0|0|OxiAddonsAL-FI-G-BR-left |0|0|0|OxiAddonsAL-FI-G-BR-right |0|0|0|OxiAddonsAL-FI-G-P-top |10|8|5|OxiAddonsAL-FI-G-P-bottom |10|8|5|OxiAddonsAL-FI-G-P-left |10|8|5|OxiAddonsAL-FI-G-P-right |10|8|5|OxiAddonsAL-FI-G-M-top |10|8|5|OxiAddonsAL-FI-G-M-bottom |10|8|5|OxiAddonsAL-FI-G-M-left |10|8|5|OxiAddonsAL-FI-G-M-right |10|8|5|OxiAddonsAL-FI-G-B-Shadow |rgba(204, 198, 198, 1)|1|1|15|2|OxiAddonsAL-FI-G-animation||0.5|0.5//| OxiAddonsAL-FI-I-BC |rgba(6, 67, 158, 1)|OxiAddonsAL-FI-I-FS |24|20|18| OxiAddonsAL-FI-I-C |#ffffff|OxiAddonsAL-FI-I-P-top |10|8|5|OxiAddonsAL-FI-I-P-bottom |10|8|5|OxiAddonsAL-FI-I-P-left |25|20|15|OxiAddonsAL-FI-I-P-right |25|20|15|OxiAddonsAL-FI-H-FS |25|22|18| OxiAddonsAL-FI-H-C|#ffffff|OxiAddonsAL-FI-H-F-family |Open+Sans|700|OxiAddonsAL-FI-H-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-FI-H-P-top |4|3|2|OxiAddonsAL-FI-H-P-bottom |4|3|2|OxiAddonsAL-FI-H-P-left |4|3|2|OxiAddonsAL-FI-H-P-right |4|3|2|OxiAddonsAL-FI-DE-FS |15|14|13| OxiAddonsAL-FI-DE-C |#ffffff|OxiAddonsAL-FI-DE-F-family |Roboto|300|OxiAddonsAL-FI-DE-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-FI-DE-P-top |3|2|2|OxiAddonsAL-FI-DE-P-bottom |3|2|2|OxiAddonsAL-FI-DE-P-left |3|2|2|OxiAddonsAL-FI-DE-P-right |3|2|2| OxiAddonsAL-FI-CI-BC |rgba(6, 67, 158, 1)|OxiAddonsAL-FI-CI-FS |18|16|16| OxiAddonsAL-FI-CI-C |#fafafa|OxiAddonsAL-FI-CI-P-top |10|8|5|OxiAddonsAL-FI-CI-P-bottom |10|8|5|OxiAddonsAL-FI-CI-P-left |25|20|15|OxiAddonsAL-FI-CI-P-right |25|20|15| OxiAddonsAL-FI-CG-BG |rgba(12, 90, 207, 1)|OxiAddonsAL-FI-CG-B |3|solid|| OxiAddonsAL-FI-CG-BC |#061c96|OxiAddonsAL-FI-CG-BR-top |5|4|3|OxiAddonsAL-FI-CG-BR-bottom |5|4|3|OxiAddonsAL-FI-CG-BR-left |5|4|3|OxiAddonsAL-FI-CG-BR-right |5|4|3|OxiAddonsAL-FI-CG-P-top |30|22|15|OxiAddonsAL-FI-CG-P-bottom |30|22|15|OxiAddonsAL-FI-CG-P-left |30|22|15|OxiAddonsAL-FI-CG-P-right |30|22|15| ||||||||||||||||OxiAddonsAL-FI-CG-B-Shadow |rgba(204, 198, 198, 1)|1|1|15|2|OxiAddonsAL-FI-CB-IS |20|18|16| OxiAddonsAL-FI-CB-IC2 |#ffffff|OxiAddonsAL-FI-CB-IP-top |4|4|2|OxiAddonsAL-FI-CB-IP-bottom |4|4|2|OxiAddonsAL-FI-CB-IP-left |4|4|2|OxiAddonsAL-FI-CB-IP-right |4|4|2|OxiAddonsAL-FI-CT-FS |20|18|30| OxiAddonsAL-FI-CT-C|#ffffff|OxiAddonsAL-FI-CT-F-family |Open+Sans|300|OxiAddonsAL-FI-CT-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-FI-CT-P-top |4|4|2|OxiAddonsAL-FI-CT-P-bottom |4|4|2|OxiAddonsAL-FI-CT-P-left |4|4|2|OxiAddonsAL-FI-CT-P-right |4|4|2|OxiAddonsAL-FI-CT-MAX |300|300|300| OxiAddonsAL-FI-CB-ICP |center|||#|| OxiAddonsAL-FI-I ||#||fas fa-bell||#|| OxiAddonsAL-FI-HT ||#||Alert||#|| OxiAddonsAL-FI-DE ||#||SHOW ALERT WHIT CLICK ON ELEMENT||#|| OxiAddonsAL-FI-CI ||#||fa fa-times||#|| OxiAddonsAL-FI-CB-IC ||#||fas fa-mouse-pointer||#|| OxiAddonsAL-FI-CB-HT ||#||Click Here||#|| ||#|| ',
    'Style 6OXIIMPORTalert_boxOXIIMPORTstyle-6OXIIMPORToxi-addons-preview-BG || ||OxiAddonsAL-6-G-BR-top |0|0|0|OxiAddonsAL-6-G-BR-bottom |0|0|0|OxiAddonsAL-6-G-BR-left |0|0|0|OxiAddonsAL-6-G-BR-right |0|0|0|OxiAddonsAL-6-G-P-top |20|18|15|OxiAddonsAL-6-G-P-bottom |20|18|15|OxiAddonsAL-6-G-P-left |10|18|15|OxiAddonsAL-6-G-P-right |10|18|15|OxiAddonsAL-6-G-M-top |10|8|5|OxiAddonsAL-6-G-M-bottom |10|8|5|OxiAddonsAL-6-G-M-left |10|8|5|OxiAddonsAL-6-G-M-right |10|8|'
        . '5|OxiAddonsAL-6-G-B-Shadow |rgba(204, 198, 198, 1)|0|0|0|0|OxiAddonsAL-6-G-animation||0.5|0.5//| ||OxiAddonsAL-6-I-FS |30|25|20| OxiAddonsAL-6-I-C |#ffffff|OxiAddonsAL-6-I-P-top |10|8|5|OxiAddonsAL-6-I-P-bottom |10|8|5|OxiAddonsAL-6-I-P-left |10|20|15|OxiAddonsAL-6-I-P-right |10|20|15|OxiAddonsAL-6-H-FS |24|20|18| OxiAddonsAL-6H-C|#ffffff|OxiAddonsAL-6-H-F-family |Open+Sans|700|OxiAddonsAL-6-H-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-6-H-P-top |4|3|2|OxiAddonsAL-6-H-P-bottom |4|3|2|OxiAddonsAL-6-H-P-left |4|3|2|OxiAddonsAL-6-H-P-right |4|3|2|OxiAddonsAL-6-DE-FS |15|14|13| OxiAddonsAL-6DE-C |#ffffff|OxiAddonsAL-6-DE-F-family |Open+Sans|300|OxiAddonsAL-6-DE-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsAL-6-DE-P-top |3|2|2|OxiAddonsAL-6-DE-P-bottom |3|2|2|OxiAddonsAL-6-DE-P-left |3|2|2|OxiAddonsAL-6-DE-P-right |3|2|2| ||OxiAddonsAL-6-CI-FS |18|18|16| OxiAddonsAL-6-CI-C |#ffffff|OxiAddonsAL-6-CI-P-top |10|8|5|OxiAddonsAL-6-CI-P-bottom |10|8|5|OxiAddonsAL-6-CI-P-left |10|20|15|OxiAddonsAL-6-CI-P-right |10|20|15|OxiAddonsAL-6-G-B |0|dotted|| OxiAddonsAL-6-G-BC |#f23030|OxiAddonsAL-6-G-BG|rgba(255,255,255,0.00)|https://www.oxilab.org/wp-content/uploads/2018/12/2.jpg||||#|| OxiAddonsAL-6-I ||#||far fa-heart||#|| OxiAddonsAL-6-HT ||#||Alert||#|| OxiAddonsAL-6-DE ||#||This is a Nice Alert Box||#|| OxiAddonsAL-6-CI ||#||fa fa-times||#|| ||#||',
    'Style 7OXIIMPORTalert_boxOXIIMPORTstyle-7OXIIMPORToxi-addons-preview-BG || OxiAddonsAL-SE-G-BG |linear-gradient(0deg, rgba(145,189,0,1) 0%,rgba(190,219,109,1.00) 100%)|OxiAddonsAL-SE-G-BR-top |5|5|5|OxiAddonsAL-SE-G-BR-bottom |5|5|5|OxiAddonsAL-SE-G-BR-left |5|5|5|OxiAddonsAL-SE-G-BR-right |5|5|5|OxiAddonsAL-SE-G-P-top |20|20|20|OxiAddonsAL-SE-G-P-bottom |20|20|20|OxiAddonsAL-SE-G-P-left |20|20|20|OxiAddonsAL-SE-G-P-right |20|20|20|OxiAddonsAL-SE-G-M-top |5|5|5|OxiAddonsAL-SE-G-M-bottom |5|5|5|OxiAddonsAL-SE-G-M-left |5|5|5|OxiAddonsAL-SE-G-M-right |5|5|5|OxiAddonsAL-SE-G-B-Shadow |rgba(204, 198, 198, 1)|1|1|15|2|OxiAddonsAL-SE-G-animation||0.5:false:false:500:10:0.2|0.5//| OxiAddonsAL-SE-I-BC |rgba(46,175,184,0.00)|OxiAddonsAL-SE-I-FS |30|25|18| OxiAddonsAL-SE-I-C |#3f5202|OxiAddonsAL-SE-I-P-top |0|0|0|OxiAddonsAL-SE-I-P-bottom |0|0|0|OxiAddonsAL-SE-I-P-left |0|0|0|OxiAddonsAL-SE-I-P-right |0|0|0|OxiAddonsAL-SE-H-FS |20|18|16| OxiAddonsAL-SE-H-C|#3f5202|OxiAddonsAL-SE-H-F-family |Open+Sans|700|OxiAddonsAL-SE-H-F-style |normal:1.3|left:0()0()2()#ffffff:|OxiAddonsAL-SE-H-P-top |4|4|2|OxiAddonsAL-SE-H-P-bottom |4|4|2|OxiAddonsAL-SE-H-P-left |30|20|15|OxiAddonsAL-SE-H-P-right |4|4|2|OxiAddonsAL-SE-DE-FS |15|15|13| OxiAddonsAL-SE-DE-C |#3f5202|OxiAddonsAL-SE-DE-F-family |Roboto|300|OxiAddonsAL-SE-DE-F-style |normal:1.3|left:0()0()2()#ffffff:|OxiAddonsAL-SE-DE-P-top |4|4|2|OxiAddonsAL-SE-DE-P-bottom |4|4|2|OxiAddonsAL-SE-DE-P-left |30|20|15|OxiAddonsAL-SE-DE-P-right |4|4|2| OxiAddonsAL-SE-CI-BC |linear-gradient(0deg, rgba(92,110,38,1.00) 5%,rgba(197,235,85,1) 100%)|OxiAddonsAL-SE-CI-FS |18|18|16| OxiAddonsAL-SE-CI-C |#ffffff|OxiAddonsAL-SE-CI-P-top |0|0|0|OxiAddonsAL-SE-CI-P-bottom |0|0|0|OxiAddonsAL-SE-CI-P-left |0|0|0|OxiAddonsAL-SE-CI-P-right |0|0|0|OxiAddonsAL-SE-I-RB-L |2|solid|| OxiAddonsAL-SE-I-RB-L-C |#8aa72b|OxiAddonsAL-SE-I-RB-R |1|solid|| OxiAddonsAL-SE-I-RB-R-C |#d7e5a9|OxiAddonsAL-SE-CI-W |33|33|33|OxiAddonsAL-SE-CI-H |33|33|33|OxiAddonsAL-SE-CI-BR-top |50|50|50|OxiAddonsAL-SE-CI-BR-bottom |50|50|50|OxiAddonsAL-SE-CI-BR-left |50|50|50|OxiAddonsAL-SE-CI-BR-right |50|50|50|OxiAddonsAL-SE-CI-B-Shadow |rgba(68, 68, 68, 1)|0|0|10|0|OxiAddonsAL-SE-CI-T-Shadow |1|2|2|rgba(0, 0, 0, 1)||||#|| OxiAddonsAL-SE-I ||#||fas fa-check||#|| OxiAddonsAL-SE-HT ||#||Success||#|| OxiAddonsAL-SE-DE ||#||This a Success Message Box, Looks Pretty Slick||#|| OxiAddonsAL-SE-CI ||#||fa fa-times||#|| ||#||',
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
