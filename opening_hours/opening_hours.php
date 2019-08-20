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
$freeimport = array('style-1', 'style-2','style-3');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = Array(
    'Style 1 OXIIMPORTopening_hoursOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(0, 0, 0, 1)|OxiAddonsOH-rows |oxi-addons-lg-col-4|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddonsOH-G-BG|rgba(255, 255, 255, 1)|OxiAddonsUrl.//wp-content/uploads/2019/03/phonepicutres-TA.jpg||OxiAddonsOH-G-B |solid|#fcaf0a||OxiAddonsOH-G-BS-top |4|4|4|OxiAddonsOH-G-BS-bottom |4|4|4|OxiAddonsOH-G-BS-left |4|4|4|OxiAddonsOH-G-BS-right |4|4|4|OxiAddonsOH-G-BR-top |0|0|0|OxiAddonsOH-G-BR-bottom |0|0|0|OxiAddonsOH-G-BR-left |0|0|0|OxiAddonsOH-G-BR-right |0|0|0|OxiAddonsOH-G-P-top |50|50|50|OxiAddonsOH-G-P-bottom |50|50|50|OxiAddonsOH-G-P-left |15|15|15|OxiAddonsOH-G-P-right |15|15|15|OxiAddonsOH-G-M-top |5|5|0|OxiAddonsOH-G-M-bottom |5|5|0|OxiAddonsOH-G-M-left |10|10|0|OxiAddonsOH-G-M-right |10|10|0|OxiAddonsOH-B-Shadow |rgba(194, 194, 194, 1)|0|0|0|0|OxiAddonsOH-animation||2|0//|OxiAddonsOH-H-FS |35|35|35| OxiAddonsOH-H-C |#f73b3b|OxiAddonsOH-H-family |Pacifico|100|OxiAddonsOH-H-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-H-P-top |0|0|0|OxiAddonsOH-H-P-bottom |0|0|0|OxiAddonsOH-H-P-left |0|0|0|OxiAddonsOH-H-P-right |0|0|0|OxiAddonsOH-D-FS |20|20|| OxiAddonsOH-D-C |#000000|OxiAddonsOH-D-family |Neuton|100|OxiAddonsOH-D-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-D-P-top |15|15|15|OxiAddonsOH-D-P-bottom |0|0|0|OxiAddonsOH-D-P-left |0|0|0|OxiAddonsOH-D-P-right |0|0|0|OxiAddonsOH-G-MXW |250|250|250|||#|| ||#||##OXISTYLE##||#||OxiAddonsFM-D ||#||Monday||#|| OxiAddonsFM-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsFM-D ||#||Sunday||#|| OxiAddonsFM-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsFM-D ||#||Tuesday||#|| OxiAddonsFM-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsFM-D ||#||Friday||#|| OxiAddonsFM-T ||#||Closed||#||##OXIDATA##',
    'Style 2OXIIMPORTopening_hoursOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddonsOH-T-rows |oxi-addons-lg-col-4|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddonsOH-T-G-BG|rgba(252,18,18,1.00)|OxiAddonsUrl.//wp-content/uploads/2019/03/phonepicutres-TA.jpg||OxiAddonsOH-T-G-B |solid|#ffffff||OxiAddonsOH-T-G-BS-top |4|4|4|OxiAddonsOH-T-G-BS-bottom |4|4|4|OxiAddonsOH-T-G-BS-left |4|4|4|OxiAddonsOH-T-G-BS-right |4|4|4|OxiAddonsOH-T-G-BR-top |0|0|0|OxiAddonsOH-T-G-BR-bottom |0|0|0|OxiAddonsOH-T-G-BR-left |0|0|0|OxiAddonsOH-T-G-BR-right |0|0|0|OxiAddonsOH-T-G-P-top |15|15|15|OxiAddonsOH-T-G-P-bottom |15|15|15|OxiAddonsOH-T-G-P-left |15|15|15|OxiAddonsOH-T-G-P-right |15|15|15|OxiAddonsOH-T-G-M-top |5|5|0|OxiAddonsOH-T-G-M-bottom |5|5|0|OxiAddonsOH-T-G-M-left |10|10|0|OxiAddonsOH-T-G-M-right |10|10|0|OxiAddonsOH-T-B-Shadow |rgba(194, 194, 194, 1)|0|4|8|0|OxiAddonsOH-T-animation||2:false:false:500:10:0.2|0//|OxiAddonsOH-T-H-FS |20|20|20| OxiAddonsOH-T-H-C |#424242|OxiAddonsOH-T-H-family |Open+Sans|100|OxiAddonsOH-T-H-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-T-H-P-top |0|0|0|OxiAddonsOH-T-H-P-bottom |0|0|0|OxiAddonsOH-T-H-P-left |0|0|0|OxiAddonsOH-T-H-P-right |0|0|0|OxiAddonsOH-T-D-FS |20|20|| OxiAddonsOH-T-D-C |#ffffff|OxiAddonsOH-T-D-family |Open+Sans|100|OxiAddonsOH-T-D-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-T-D-P-top |15|15|15|OxiAddonsOH-T-D-P-bottom |0|0|0|OxiAddonsOH-T-D-P-left |0|0|0|OxiAddonsOH-T-D-P-right |0|0|0|OxiAddonsOH-T-G-MXW |250|250|250|OxiAddonsOH-T-C-BS-top |1|1|1|OxiAddonsOH-T-C-BS-bottom |1|1|1|OxiAddonsOH-T-C-BS-left |1|1|1|OxiAddonsOH-T-C-BS-right |1|1|1|OxiAddonsOH-T-C-B |dashed|#ffffff||OxiAddonsOH-T-C-BR-top |0|0|0|OxiAddonsOH-T-C-BR-bottom |0|0|0|OxiAddonsOH-T-C-BR-left |0|0|0|OxiAddonsOH-T-C-BR-right |0|0|0|OxiAddonsOH-T-C-P-top |10|10|10|OxiAddonsOH-T-C-P-bottom |30|30|30|OxiAddonsOH-T-C-P-left |10|10|10|OxiAddonsOH-T-C-P-right |10|10|10| OxiAddonsOH-T-I-BG |rgba(235, 228, 228, 1)|OxiAddonsOH-T-I-W |60|60|60|OxiAddonsOH-T-I-H |30|30|30|OxiAddonsOH-T-I-FS |20|20|20| OxiAddonsOH-T-I-C |#ff0000|OxiAddonsOH-T-I-M-top |-23|-23|-23|OxiAddonsOH-T-I-M-bottom |3|3|3|OxiAddonsOH-T-I-M-left |0|0|0|OxiAddonsOH-T-I-M-right |0|0|0| OxiAddonsOH-T-H-BG |rgba(235, 228, 228, 1)|OxiAddonsOH-T-H-W |60|60|60|OxiAddonsOH-T-H-H |30|30|30|||#|| ||#||##OXISTYLE##||#||OxiAddonsOH-D ||#||MON||#|| OxiAddonsOH-T ||#||10:00-17:00||#|| OxiAddonsOH-I ||#||far fa-clock||#||##OXIDATA##||#||OxiAddonsOH-D ||#||SUN||#|| OxiAddonsOH-T ||#||10:00-17:00||#|| OxiAddonsOH-I ||#||far fa-clock||#||##OXIDATA##||#||OxiAddonsOH-D ||#||FRI||#|| OxiAddonsOH-T ||#||10:00-17:00||#|| OxiAddonsOH-I ||#||far fa-clock||#||##OXIDATA##||#||OxiAddonsOH-D ||#||SAT||#|| OxiAddonsOH-T ||#||Closed||#|| OxiAddonsOH-I ||#||far fa-clock||#||##OXIDATA##',
    'Style 3OXIIMPORTopening_hoursOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddonsOH-TH-rows |oxi-addons-lg-col-2|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddonsOH-TH-G-BG|rgba(15,205,252,1.00)|OxiAddonsUrl.//wp-content/uploads/2019/03/phonepicutres-TA.jpg||OxiAddonsOH-TH-G-B |solid|#ffffff||OxiAddonsOH-TH-G-BS-top |3|3|3|OxiAddonsOH-TH-G-BS-bottom |3|3|3|OxiAddonsOH-TH-G-BS-left |3|3|3|OxiAddonsOH-TH-G-BS-right |3|3|3|OxiAddonsOH-TH-G-BR-top |0|0|0|OxiAddonsOH-TH-G-BR-bottom |0|0|0|OxiAddonsOH-TH-G-BR-left |0|0|0|OxiAddonsOH-TH-G-BR-right |0|0|0|OxiAddonsOH-TH-G-P-top |15|15|15|OxiAddonsOH-TH-G-P-bottom |15|15|15|OxiAddonsOH-TH-G-P-left |15|15|15|OxiAddonsOH-TH-G-P-right |15|15|15|OxiAddonsOH-TH-G-M-top |10|10|10|OxiAddonsOH-TH-G-M-bottom |10|10|10|OxiAddonsOH-TH-G-M-left |10|10|10|OxiAddonsOH-TH-G-M-right |10|10|10|OxiAddonsOH-TH-B-Shadow |rgba(194, 194, 194, 1)|0|4|8|0|OxiAddonsOH-TH-animation||2:false:false:500:10:0.2|0//infinite|OxiAddonsOH-TH-H-FS |20|20|20| OxiAddonsOH-TH-H-C |#ffffff|OxiAddonsOH-TH-H-family |Actor|100|OxiAddonsOH-TH-H-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsOH-TH-H-P-top |0|0|0|OxiAddonsOH-TH-H-P-bottom |0|0|0|OxiAddonsOH-TH-H-P-left |0|0|0|OxiAddonsOH-TH-H-P-right |0|0|0|OxiAddonsOH-TH-D-FS |20|20|| OxiAddonsOH-TH-D-C |#f0f0f0|OxiAddonsOH-TH-D-family |bold|100|OxiAddonsOH-TH-D-style |normal:1.3|right:0()0()0()#ffffff:|OxiAddonsOH-TH-D-P-top |0|0|0|OxiAddonsOH-TH-D-P-bottom |0|0|0|OxiAddonsOH-TH-D-P-left |0|0|0|OxiAddonsOH-TH-D-P-right |0|0|0|OxiAddonsOH-TH-G-MXW |600|600|600|OxiAddonsOH-TH-I-FS |18|18|18| OxiAddonsOH-TH-I-C |#ffffff|OxiAddonsOH-TH-I-M-top |0|0|0|OxiAddonsOH-TH-I-M-bottom |0|0|0|OxiAddonsOH-TH-I-M-left |5|5|5|OxiAddonsOH-TH-I-M-right |15|15|15|||#||OxiAddonsOH-TH-I ||#||far fa-clock||#|| ||#||##OXISTYLE##||#||OxiAddonsOH-D ||#||MON||#|| OxiAddonsOH-T ||#||10:00-17:00||#|| OxiAddonsOH-I ||#||far fa-clock||#||##OXIDATA##||#||OxiAddonsOH-D ||#||SUN||#|| OxiAddonsOH-T ||#||10:00-17:00||#|| OxiAddonsOH-I ||#||far fa-clock||#||##OXIDATA##||#||OxiAddonsOH-D ||#||FRI||#|| OxiAddonsOH-T ||#||10:00-17:00||#|| OxiAddonsOH-I ||#||far fa-clock||#||##OXIDATA##||#||OxiAddonsOH-D ||#||SAT||#|| OxiAddonsOH-T ||#||Closed||#|| OxiAddonsOH-I ||#||far fa-clock||#||##OXIDATA##',
    'Style 4OXIIMPORTopening_hoursOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)| ||||OxiAddonsOH-F-G-BG|rgba(79,47,6,1.00)|OxiAddonsUrl.//wp-content/uploads/2019/03/phonepicutres-TA.jpg||OxiAddonsOH-F-G-B |solid|#ffffff||OxiAddonsOH-F-G-BS-top |3|3|3|OxiAddonsOH-F-G-BS-bottom |3|3|3|OxiAddonsOH-F-G-BS-left |3|3|3|OxiAddonsOH-F-G-BS-right |3|3|3|OxiAddonsOH-F-G-BR-top |0|0|0|OxiAddonsOH-F-G-BR-bottom |0|0|0|OxiAddonsOH-F-G-BR-left |0|0|0|OxiAddonsOH-F-G-BR-right |0|0|0|OxiAddonsOH-F-G-P-top |30|30|30|OxiAddonsOH-F-G-P-bottom |30|30|30|OxiAddonsOH-F-G-P-left |30|30|30|OxiAddonsOH-F-G-P-right |30|30|30|OxiAddonsOH-F-G-M-top |5|5|5|OxiAddonsOH-F-G-M-bottom |5|5|5|OxiAddonsOH-F-G-M-left |10|10|10|OxiAddonsOH-F-G-M-right |10|10|10|OxiAddonsOH-F-B-Shadow |rgba(194, 194, 194, 1)|0|4|8|0|OxiAddonsOH-F-animation||2:false:false:500:10:0.2|0//infinite|OxiAddonsOH-F-H-FS |25|25|25| OxiAddonsOH-F-H-C |#ffffff|OxiAddonsOH-F-H-family |Pacifico|100|OxiAddonsOH-F-H-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsOH-F-H-P-top |0|0|0|OxiAddonsOH-F-H-P-bottom |5|5|5|OxiAddonsOH-F-H-P-left |0|0|0|OxiAddonsOH-F-H-P-right |0|0|0|OxiAddonsOH-F-D-FS |20|20|| OxiAddonsOH-F-D-C |#dedede|OxiAddonsOH-F-D-family |bold|100|OxiAddonsOH-F-D-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsOH-F-D-P-top |0|0|0|OxiAddonsOH-F-D-P-bottom |0|0|0|OxiAddonsOH-F-D-P-left |0|0|0|OxiAddonsOH-F-D-P-right |0|0|0|OxiAddonsOH-F-G-MXW |600|600|600|OxiAddonsOH-F-I-FS |24|24|24| OxiAddonsOH-F-I-C |#ff9305|OxiAddonsOH-F-I-M-top |0|0|0|OxiAddonsOH-F-I-M-bottom |0|0|0|OxiAddonsOH-F-I-M-left |5|5|5|OxiAddonsOH-F-I-M-right |15|15|15|OxiAddonsOH-F-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1| OxiAddonsOH-F-I-BG |rgba(102,7,7,1.00)|OxiAddonsOH-F-I-W |60|60|60|OxiAddonsOH-F-I-H |60|60|60|OxiAddonsOH-F-I-BR-top |50|50|50|OxiAddonsOH-F-I-BR-bottom |50|50|50|OxiAddonsOH-F-I-BR-left |50|50|50|OxiAddonsOH-F-I-BR-right |50|50|50|OxiAddonsOH-F-I-B |solid|#ffffff||OxiAddonsOH-F-I-BS-top |2|2|2|OxiAddonsOH-F-I-BS-bottom |2|2|2|OxiAddonsOH-F-I-BS-left |2|2|2|OxiAddonsOH-F-I-BS-right |2|2|2|||#||OxiAddonsOH-F-I ||#||far fa-clock||#|| ||#||##OXISTYLE##||#||OxiAddonsOH-D ||#||Monday to Friday||#|| OxiAddonsOH-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsOH-D ||#||Sunday to Saturday||#|| OxiAddonsOH-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsOH-D ||#||Friday to Tuesday||#|| OxiAddonsOH-T ||#||10:00-17:00||#||##OXIDATA##',
    'Style 5OXIIMPORTopening_hoursOXIIMPORTstyle-5OXIIMPORToxi-addons-preview-BG |rgba(0, 0, 0, 1)|OxiAddonsOH-FI-rows |oxi-addons-lg-col-7|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddonsOH-FI-G-BG|rgba(23,23,23,1.00)|OxiAddonsUrl.//wp-content/uploads/2019/03/phonepicutres-TA.jpg||OxiAddonsOH-FI-G-B |solid|#12b31a||OxiAddonsOH-FI-G-BS-top |4|4|4|OxiAddonsOH-FI-G-BS-bottom |4|4|4|OxiAddonsOH-FI-G-BS-left |4|4|4|OxiAddonsOH-FI-G-BS-right |4|4|4|OxiAddonsOH-FI-G-BR-top |0|0|0|OxiAddonsOH-FI-G-BR-bottom |0|0|0|OxiAddonsOH-FI-G-BR-left |0|0|0|OxiAddonsOH-FI-G-BR-right |0|0|0|OxiAddonsOH-FI-G-P-top |30|30|30|OxiAddonsOH-FI-G-P-bottom |30|30|30|OxiAddonsOH-FI-G-P-left |5|5|5|OxiAddonsOH-FI-G-P-right |5|5|5|OxiAddonsOH-FI-G-M-top |5|5|0|OxiAddonsOH-FI-G-M-bottom |5|5|0|OxiAddonsOH-FI-G-M-left |10|10|0|OxiAddonsOH-FI-G-M-right |10|10|0|OxiAddonsOH-FI-B-Shadow |rgba(194, 194, 194, 1)|0|0|0|0|OxiAddonsOH-FI-animation||2:false:false:500:10:0.2|0//|OxiAddonsOH-FI-H-FS |21|21|21| OxiAddonsOH-FI-H-C |#ffffff|OxiAddonsOH-FI-H-family |Nunito|100|OxiAddonsOH-FI-H-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-FI-H-P-top |0|0|0|OxiAddonsOH-FI-H-P-bottom |0|0|0|OxiAddonsOH-FI-H-P-left |0|0|0|OxiAddonsOH-FI-H-P-right |0|0|0|OxiAddonsOH-FI-D-FS |12|12|12| OxiAddonsOH-FI-D-C |#d4d0d0|OxiAddonsOH-FI-D-family |Sintony|100|OxiAddonsOH-FI-D-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-FI-D-P-top |15|15|15|OxiAddonsOH-FI-D-P-bottom |0|0|0|OxiAddonsOH-FI-D-P-left |0|0|0|OxiAddonsOH-FI-D-P-right |0|0|0|OxiAddonsOH-FI-G-MXW |200|200|200|OxiAddonsOH-FI-G-HBS-top |4|4|4|OxiAddonsOH-FI-G-HBS-bottom |4|4|4|OxiAddonsOH-FI-G-HBS-left |4|4|4|OxiAddonsOH-FI-G-HBS-right |4|4|4|OxiAddonsOH-FI-G-HB |solid|#08fce0||OxiAddonsOH-FI-G-HBG|rgba(0,0,0,1.00)|OxiAddonsUrl.//wp-content/uploads/2019/03/phonepicutres-TA.jpg||||#|| ||#||##OXISTYLE##||#||OxiAddonsOH-FI-D ||#||Saturday||#|| OxiAddonsOH-FI-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsFM-D ||#||Sunday||#|| OxiAddonsFM-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsOH-FI-D ||#||Monday||#|| OxiAddonsOH-FI-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsFM-D ||#||Tuesday||#|| OxiAddonsFM-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsOH-D ||#||Wednesday||#|| OxiAddonsOH-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsOH-D ||#||Thusday||#|| OxiAddonsOH-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsFM-D ||#||Friday||#|| OxiAddonsFM-T ||#||Closed||#||##OXIDATA##',
    'Style 6OXIIMPORTopening_hoursOXIIMPORTstyle-6OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)| ||||OxiAddonsOH-SX-G-BG|rgba(143, 29, 78, 1)|OxiAddonsUrl.//wp-content/uploads/2019/03/phonepicutres-TA.jpg||OxiAddonsOH-SX-G-B |solid|#eb156e||OxiAddonsOH-SX-G-BS-top |4|4|4|OxiAddonsOH-SX-G-BS-bottom |4|4|4|OxiAddonsOH-SX-G-BS-left |4|4|4|OxiAddonsOH-SX-G-BS-right |4|4|4|OxiAddonsOH-SX-G-BR-top |0|0|0|OxiAddonsOH-SX-G-BR-bottom |0|0|0|OxiAddonsOH-SX-G-BR-left |0|0|0|OxiAddonsOH-SX-G-BR-right |0|0|0|OxiAddonsOH-SX-G-P-top |15|15|15|OxiAddonsOH-SX-G-P-bottom |15|15|15|OxiAddonsOH-SX-G-P-left |15|15|15|OxiAddonsOH-SX-G-P-right |15|15|15|OxiAddonsOH-SX-G-M-top |0|0|0|OxiAddonsOH-SX-G-M-bottom |0|0|0|OxiAddonsOH-SX-G-M-left |10|10|10|OxiAddonsOH-SX-G-M-right |10|10|10|OxiAddonsOH-SX-B-Shadow |rgba(194, 194, 194, 1)|1|1|15|2|OxiAddonsOH-SX-animation||2:false:false:500:10:0.2|0//|OxiAddonsOH-SX-H-FS |20|20|20| OxiAddonsOH-SX-H-C |#ffffff|OxiAddonsOH-SX-H-family |Actor|100|OxiAddonsOH-SX-H-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsOH-SX-H-P-top |0|0|0|OxiAddonsOH-SX-H-P-bottom |0|0|0|OxiAddonsOH-SX-H-P-left |0|0|0|OxiAddonsOH-SX-H-P-right |0|0|0|OxiAddonsOH-SX-D-FS |20|20|| OxiAddonsOH-SX-D-C |#e6e6e6|OxiAddonsOH-SX-D-family |bold|100|OxiAddonsOH-SX-D-style |normal:1.3|right:0()0()0()#ffffff:|OxiAddonsOH-SX-D-P-top |0|0|0|OxiAddonsOH-SX-D-P-bottom |0|0|0|OxiAddonsOH-SX-D-P-left |0|0|0|OxiAddonsOH-SX-D-P-right |0|0|0|OxiAddonsOH-SX-G-MXW |600|600|600|OxiAddonsOH-SX-I-FS |18|18|18| OxiAddonsOH-SX-I-C |#ffffff|OxiAddonsOH-SX-I-M-top |0|0|0|OxiAddonsOH-SX-I-M-bottom |0|0|0|OxiAddonsOH-SX-I-M-left |5|5|5|OxiAddonsOH-SX-I-M-right |15|15|15|OxiAddonsOH-SX-CB-B |1|dotted|| OxiAddonsOH-SX-CB-BC |#999696|OxiAddonsOH-SX-CB-P-top |15|15|15|OxiAddonsOH-SX-CB-P-bottom |15|15|15|OxiAddonsOH-SX-CB-P-left |0|0|0|OxiAddonsOH-SX-CB-P-right |0|0|0|||#||OxiAddonsOH-SX-I ||#||far fa-clock||#|| ||#||##OXISTYLE##||#||OxiAddonsOH-D ||#||MON||#|| OxiAddonsOH-T ||#||10:00-17:00||#|| OxiAddonsOH-I ||#||far fa-clock||#||##OXIDATA##||#||OxiAddonsOH-D ||#||Monday||#|| OxiAddonsOH-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsOH-D ||#||Thusday||#|| OxiAddonsOH-T ||#||10:00-17:00||#||##OXIDATA##||#||OxiAddonsOH-D ||#||Friday||#|| OxiAddonsOH-T ||#||Closed||#||##OXIDATA##',
    'Style 7OXIIMPORTopening_hoursOXIIMPORTstyle-7OXIIMPORToxi-addons-preview-BG |rgba(0, 0, 0, 1)|OxiAddonsOH-SV-rows |oxi-addons-lg-col-4|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddonsOH-SV-G-BG|rgba(60,214,21,0.00)|https://www.oxilab.org/wp-content/uploads/2019/03/j.png||OxiAddonsOH-SV-G-B |solid|#b34610||OxiAddonsOH-SV-G-BS-top |4|4|4|OxiAddonsOH-SV-G-BS-bottom |4|4|4|OxiAddonsOH-SV-G-BS-left |4|4|4|OxiAddonsOH-SV-G-BS-right |4|4|4|OxiAddonsOH-SV-G-BR-top |0|0|0|OxiAddonsOH-SV-G-BR-bottom |0|0|0|OxiAddonsOH-SV-G-BR-left |0|0|0|OxiAddonsOH-SV-G-BR-right |0|0|0|OxiAddonsOH-SV-G-P-top |10|10|10|OxiAddonsOH-SV-G-P-bottom |30|30|30|OxiAddonsOH-SV-G-P-left |0|0|0|OxiAddonsOH-SV-G-P-right |0|0|0|OxiAddonsOH-SV-G-M-top |5|5|0|OxiAddonsOH-SV-G-M-bottom |5|5|0|OxiAddonsOH-SV-G-M-left |10|10|0|OxiAddonsOH-SV-G-M-right |10|10|0|OxiAddonsOH-SV-B-Shadow |rgba(194, 194, 194, 1)|0|0|0|0|OxiAddonsOH-SV-animation||2:false:false:500:10:0.2|0//|OxiAddonsOH-SV-H-FS |25|25|25| OxiAddonsOH-SV-H-C |#b34610|OxiAddonsOH-SV-H-family |Play|100|OxiAddonsOH-SV-H-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 0):|OxiAddonsOH-SV-H-P-top |0|0|0|OxiAddonsOH-SV-H-P-bottom |0|0|0|OxiAddonsOH-SV-H-P-left |0|0|0|OxiAddonsOH-SV-H-P-right |0|0|0|OxiAddonsOH-SV-D-FS |35|35|35| OxiAddonsOH-SV-D-C |#000000|OxiAddonsOH-SV-D-family |bold|100|OxiAddonsOH-SV-D-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-SV-D-P-top |60|60|60|OxiAddonsOH-SV-D-P-bottom |0|0|0|OxiAddonsOH-SV-D-P-left |0|0|0|OxiAddonsOH-SV-D-P-right |0|0|0|OxiAddonsOH-SV-G-MXW |250|250|250|OxiAddonsOH-SV-T-FS |30|30|30| OxiAddonsOH-SV-T-C |#ffffff|OxiAddonsOH-SV-T-family |Pacifico|100|OxiAddonsOH-SV-T-style |normal:1|center:0()0()0()rgba(255, 255, 255, 0):|OxiAddonsOH-SV-T-P-top |0|0|0|OxiAddonsOH-SV-T-P-bottom |0|0|0|OxiAddonsOH-SV-T-P-left |0|0|0|OxiAddonsOH-SV-T-P-right |0|0|0|||#|| ||#||##OXISTYLE##||#||OxiAddonsOH-D ||#||Monday||#|| OxiAddonsOH-T ||#||10:00-17:00||#|| OxiAddonsOH-TI ||#||Opening Hour||#||##OXIDATA##||#||OxiAddonsOH-D ||#||Sunday||#|| OxiAddonsOH-T ||#||10:00-17:00||#|| OxiAddonsOH-TI ||#||Opening Hour||#||##OXIDATA##||#||OxiAddonsOH-D ||#||Tuesday||#|| OxiAddonsOH-T ||#||10:00-17:00||#|| OxiAddonsOH-TI ||#||Opening Hour||#||##OXIDATA##||#||OxiAddonsOH-D ||#||Friday||#|| OxiAddonsOH-T ||#||Closed||#|| OxiAddonsOH-TI ||#||Opening Hour||#||##OXIDATA##',
    'Style 8OXIIMPORTopening_hoursOXIIMPORTstyle-8OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)| ||||OxiAddonsOH-SX-G-BG|rgba(255,255,255,1.00)|OxiAddonsUrl.//wp-content/uploads/2019/03/phonepicutres-TA.jpg||OxiAddonsOH-SX-G-B |none|#eb156e||OxiAddonsOH-SX-G-BS-top |4|4|4|OxiAddonsOH-SX-G-BS-bottom |4|4|4|OxiAddonsOH-SX-G-BS-left |4|4|4|OxiAddonsOH-SX-G-BS-right |4|4|4|OxiAddonsOH-SX-G-BR-top |5|5|5|OxiAddonsOH-SX-G-BR-bottom |5|5|5|OxiAddonsOH-SX-G-BR-left |5|5|5|OxiAddonsOH-SX-G-BR-right |5|5|5|OxiAddonsOH-SX-G-P-top |15|15|15|OxiAddonsOH-SX-G-P-bottom |15|15|15|OxiAddonsOH-SX-G-P-left |15|15|15|OxiAddonsOH-SX-G-P-right |15|15|15|OxiAddonsOH-SX-G-M-top |0|0|0|OxiAddonsOH-SX-G-M-bottom |0|0|0|OxiAddonsOH-SX-G-M-left |10|10|10|OxiAddonsOH-SX-G-M-right |10|10|10|OxiAddonsOH-SX-B-Shadow |rgba(194, 194, 194, 1)|1|1|10|1|OxiAddonsOH-SX-animation||2:false:false:500:10:0.2|0//|OxiAddonsOH-SX-H-FS |22|22|22| ||OxiAddonsOH-SX-H-family |Roboto Slab|500|OxiAddonsOH-SX-H-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsOH-SX-H-P-top |0|0|0|OxiAddonsOH-SX-H-P-bottom |0|0|0|OxiAddonsOH-SX-H-P-left |0|0|0|OxiAddonsOH-SX-H-P-right |0|0|0|OxiAddonsOH-SX-D-FS |20|20|20| ||OxiAddonsOH-SX-D-family |Basic|normal|OxiAddonsOH-SX-D-style |normal:1.3|right:0()0()0()#ffffff:|OxiAddonsOH-SX-D-P-top |0|0|0|OxiAddonsOH-SX-D-P-bottom |0|0|0|OxiAddonsOH-SX-D-P-left |0|0|0|OxiAddonsOH-SX-D-P-right |0|0|0|OxiAddonsOH-SX-G-MXW |600|600|600|OxiAddonsOH-SX-CB-B |0|dotted|| OxiAddonsOH-SX-CB-BC |#a6a6a6|OxiAddonsOH-SX-CB-P-top |10|10|10|OxiAddonsOH-SX-CB-P-bottom |10|10|10|OxiAddonsOH-SX-CB-P-left |10|10|10|OxiAddonsOH-SX-CB-P-right |10|10|10|||#|| ||#||##OXISTYLE##||#||OxiAddonsOH-SX-D ||#||Monday||#|| OxiAddonsOH-SX-T ||#||08:00 - 19:00||#|| OxiAddonsOH-SX-H-C ||#||#000000||#|| OxiAddonsOH-SX-D-C ||#||#000000||#||##OXIDATA##||#||OxiAddonsOH-SX-D ||#||Tuesday||#|| OxiAddonsOH-SX-T ||#||08:00 - 19:00||#|| OxiAddonsOH-SX-H-C ||#||#000000||#|| OxiAddonsOH-SX-D-C ||#||#000000||#||##OXIDATA##||#||OxiAddonsOH-SX-D ||#||Wednesday||#|| OxiAddonsOH-SX-T ||#||08:00 - 19:00||#|| OxiAddonsOH-SX-H-C ||#||#000000||#|| OxiAddonsOH-SX-D-C ||#||#000000||#||##OXIDATA##||#||OxiAddonsOH-SX-D ||#||Thursday||#|| OxiAddonsOH-SX-T ||#||08:00 - 19:00||#|| OxiAddonsOH-SX-H-C ||#||#000000||#|| OxiAddonsOH-SX-D-C ||#||#000000||#||##OXIDATA##||#||OxiAddonsOH-SX-D ||#||Friday||#|| OxiAddonsOH-SX-T ||#||08:00 - 19:00||#|| OxiAddonsOH-SX-H-C ||#||#000000||#|| OxiAddonsOH-SX-D-C ||#||#000000||#||##OXIDATA##||#||OxiAddonsOH-SX-D ||#||Saturday||#|| OxiAddonsOH-SX-T ||#||08:00 - 19:00||#|| OxiAddonsOH-SX-H-C ||#||#000000||#|| OxiAddonsOH-SX-D-C ||#||#000000||#||##OXIDATA##||#||OxiAddonsOH-SX-D ||#||Sunday||#|| OxiAddonsOH-SX-T ||#||Closed||#|| OxiAddonsOH-SX-H-C ||#||#f01313||#|| OxiAddonsOH-SX-D-C ||#||#f01313||#||##OXIDATA##',
    'Style 9OXIIMPORTopening_hoursOXIIMPORTstyle-9OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)| ||||OxiAddonsOH-SX-G-BG|rgba(255,255,255,1.00)|OxiAddonsUrl.//wp-content/uploads/2019/03/phonepicutres-TA.jpg||OxiAddonsOH-SX-G-B |none|#eb156e||OxiAddonsOH-SX-G-BS-top |4|4|4|OxiAddonsOH-SX-G-BS-bottom |4|4|4|OxiAddonsOH-SX-G-BS-left |4|4|4|OxiAddonsOH-SX-G-BS-right |4|4|4|OxiAddonsOH-SX-G-BR-top |0|0|0|OxiAddonsOH-SX-G-BR-bottom |0|0|0|OxiAddonsOH-SX-G-BR-left |0|0|0|OxiAddonsOH-SX-G-BR-right |0|0|0|OxiAddonsOH-SX-G-P-top |15|15|15|OxiAddonsOH-SX-G-P-bottom |15|15|15|OxiAddonsOH-SX-G-P-left |60|60|60|OxiAddonsOH-SX-G-P-right |60|60|60|OxiAddonsOH-SX-G-M-top |0|0|0|OxiAddonsOH-SX-G-M-bottom |0|0|0|OxiAddonsOH-SX-G-M-left |10|10|10|OxiAddonsOH-SX-G-M-right |10|10|10|OxiAddonsOH-SX-B-Shadow |rgba(194, 194, 194, 1)|1|1|10|1|OxiAddonsOH-SX-animation||2:false:false:500:10:0.2|0//|OxiAddonsOH-SX-H-FS |18|18|18| ||OxiAddonsOH-SX-H-family |Roboto Slab|500|OxiAddonsOH-SX-H-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsOH-SX-H-P-top |0|0|0|OxiAddonsOH-SX-H-P-bottom |0|0|0|OxiAddonsOH-SX-H-P-left |0|0|0|OxiAddonsOH-SX-H-P-right |0|0|0|OxiAddonsOH-SX-D-FS |16|16|16| ||OxiAddonsOH-SX-D-family |Basic|normal|OxiAddonsOH-SX-D-style |normal:1.3|right:0()0()0()#ffffff:|OxiAddonsOH-SX-D-P-top |0|0|0|OxiAddonsOH-SX-D-P-bottom |0|0|0|OxiAddonsOH-SX-D-P-left |0|0|0|OxiAddonsOH-SX-D-P-right |0|0|0|OxiAddonsOH-SX-G-MXW |500|500|500|OxiAddonsOH-SX-CB-B |1|solid|| OxiAddonsOH-SX-CB-BC |#a6a6a6|OxiAddonsOH-SX-CB-P-top |10|10|10|OxiAddonsOH-SX-CB-P-bottom |10|10|10|OxiAddonsOH-SX-CB-P-left |10|10|10|OxiAddonsOH-SX-CB-P-right |10|10|10| OxiAddonsOH-SX-HD-BC |rgba(41,42,112,1.00)|OxiAddonsOH-SX-HD-FS |30|30|30| OxiAddonsOH-SX-HD-C |#ffffff|OxiAddonsOH-SX-HD-family |Roboto Slab|500|OxiAddonsOH-SX-HD-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-SX-HD-P-top |15|15|15|OxiAddonsOH-SX-HD-P-bottom |15|15|15|OxiAddonsOH-SX-HD-P-left |15|15|15|OxiAddonsOH-SX-HD-P-right |15|15|15|OxiAddonsOH-SX-SHD-FS |22|22|22| OxiAddonsOH-SX-SHD-C |#000000|OxiAddonsOH-SX-SHD-family |Roboto Slab|500|OxiAddonsOH-SX-SHD-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-SX-SHD-P-top |20|20|20|OxiAddonsOH-SX-SHD-P-bottom |20|20|20|OxiAddonsOH-SX-SHD-P-left |15|15|15|OxiAddonsOH-SX-SHD-P-right |15|15|15|OxiAddonsOH-SX-FT-FS |22|22|22| OxiAddonsOH-SX-FT-C |#000000|OxiAddonsOH-SX-FT-family |Roboto Slab|500|OxiAddonsOH-SX-FT-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-SX-FT-P-top |10|10|10|OxiAddonsOH-SX-FT-P-bottom |20|20|20|OxiAddonsOH-SX-FT-P-left |15|15|15|OxiAddonsOH-SX-FT-P-right |15|15|15| OxiAddonsOH-B-Tab |_blank|OxiAddonsOH-B-FS |20|20|20| OxiAddonsOH-B-C |#000000| OxiAddonsOH-B-BG |rgba(255,255,255,1.00)|OxiAddonsOH-B-family |Basic|normal|OxiAddonsOH-B-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOH-B-B |1|solid|| OxiAddonsOH-B-BC |#000000|OxiAddonsOH-B-BR-top |0|0|0|OxiAddonsOH-B-BR-bottom |0|0|0|OxiAddonsOH-B-BR-left |0|0|0|OxiAddonsOH-B-BR-right |0|0|0|OxiAddonsOH-B-P-top |5|5|5|OxiAddonsOH-B-P-bottom |5|5|5|OxiAddonsOH-B-P-left |10|10|10|OxiAddonsOH-B-P-right |10|10|10|OxiAddonsOH-B-M-top |5|5|5|OxiAddonsOH-B-M-bottom |15|15|15|OxiAddonsOH-B-M-left |5|5|5|OxiAddonsOH-B-M-right |5|5|5| OxiAddonsOH-B-H-C |#ffffff| OxiAddonsOH-B-H-BG |rgba(0, 0, 0, 1)| OxiAddonsOH-B-BC-H |#000000|||#|| OxiAddonsOH-HD-T ||#||RESERVATIONS||#|| OxiAddonsOH-SHD-T ||#||Opening Hours||#|| OxiAddonsOH-FT-T ||#||Book your table now||#|| OxiAddonsOH-BT-T ||#||Book Now||#|| OxiAddonsOH-BT-URL ||#||#||#|| ||#||##OXISTYLE##||#||OxiAddonsOH-SX-D ||#||Monday||#|| OxiAddonsOH-SX-T ||#||08:00 - 19:00||#|| OxiAddonsOH-SX-H-C ||#||#000000||#|| OxiAddonsOH-SX-D-C ||#||#000000||#||##OXIDATA##||#||OxiAddonsOH-SX-D ||#||Tuesday||#|| OxiAddonsOH-SX-T ||#||08:00 - 19:00||#|| OxiAddonsOH-SX-H-C ||#||#000000||#|| OxiAddonsOH-SX-D-C ||#||#000000||#||##OXIDATA##||#||OxiAddonsOH-SX-D ||#||Wednesday||#|| OxiAddonsOH-SX-T ||#||08:00 - 19:00||#|| OxiAddonsOH-SX-H-C ||#||#000000||#|| OxiAddonsOH-SX-D-C ||#||#000000||#||##OXIDATA##||#||OxiAddonsOH-SX-D ||#||Thursday||#|| OxiAddonsOH-SX-T ||#||08:00 - 19:00||#|| OxiAddonsOH-SX-H-C ||#||#000000||#|| OxiAddonsOH-SX-D-C ||#||#000000||#||##OXIDATA##',
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





