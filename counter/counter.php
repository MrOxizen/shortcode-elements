<?php
if (!defined('ABSPATH')) {
    exit;
}

$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiimpport = '';
if(!empty($_GET['oxiimpport'])){
    $oxiimpport = sanitize_text_field($_GET['oxiimpport']);
}

oxi_addons_user_capabilities();
OxiDataAdminImport($oxitype);
global $wpdb;
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_import = $wpdb->prefix . 'oxi_div_import';
$importstyle = $wpdb->get_results("SELECT * FROM $table_import WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
$freeimport = array('style-1', 'style-2',);
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = array(
                'Style 1 Demo 1OXIIMPORTcounterOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG || OxiAddPR-TC-Serial |icon,divider,number,title| || || ||OxiADDC-animation||2|0//| OxiADDC-align |center|OxiADDC-Item |oxi-addons-lg-col-4|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiADDC-padding-top |10|10|10|OxiADDC-padding-bottom |10|10|10|OxiADDC-padding-left |10|10|10|OxiADDC-padding-right |10|10|10|OxiADDC-T-size |20|15|15| OxiADDC-T-color |#474747|OxiADDC-T-family |Open+Sans|600|OxiADDC-T-style |normal:1.3|center:0()0()0()#ffffff|OxiADDC-T-padding-top |5|2|2|OxiADDC-T-padding-bottom |5|2|2|OxiADDC-T-padding-left |5|2|2|OxiADDC-T-padding-right |5|2|2|OxiADDC-N-size |40|25|25| OxiADDC-N-color |#e35b5b|OxiADDC-N-family |Open+Sans|bold|OxiADDC-N-style |normal:1.3|center:0()0()0()#ffffff|OxiADDC-N-padding-top |2|2|2|OxiADDC-N-padding-bottom |2|2|2|OxiADDC-N-padding-left |2|2|2|OxiADDC-N-padding-right |2|2|2|OxiADDC-I-size |40|40|40|OxiADDC-I-width |100|100|100| OxiADDC-I-color |#e35b5b|OxiADDC-I-bg|rgba(255, 255, 255, 1)|||OxiADDC-I-border-top |5|5|5|OxiADDC-I-border-bottom |5|5|5|OxiADDC-I-border-left |5|5|5|OxiADDC-I-border-right |5|5|5|OxiADDC-I-border |solid|#e35b5b||OxiADDC-I-radius-top |50|50|50|OxiADDC-I-radius-bottom |50|50|50|OxiADDC-I-radius-left |50|50|50|OxiADDC-I-radius-right |50|50|50|OxiADDC-I-margin-top |5|5|5|OxiADDC-I-margin-bottom |15|15|15|OxiADDC-I-margin-left |15|15|15|OxiADDC-I-margin-right |20|20|20|OxiADDC-D-width |100|||OxiADDC-D-border |4|4|4|OxiADDC-D-border |dashed|#474747||OxiADDC-D-padding-top |5|0|0|OxiADDC-D-padding-bottom |5|0|0|OxiADDC-D-padding-left |5|0|0|OxiADDC-D-padding-right |5|0|0| OxiADDC-D |yes| counter-duration |3| counter-delay |0.01|||#|| ||#|||##OXISTYLE##OxiADDC-number||#||6000||#||OxiADDC-title||#||Support||#||OxiADDC-icon-class||#||far fa-life-ring||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||5,290||#||OxiADDC-title||#||Tasks||#||OxiADDC-icon-class||#||fas fa-check||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||38,242||#||OxiADDC-title||#||Milestones||#||OxiADDC-icon-class||#||fas fa-trophy||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||18,320||#||OxiADDC-title||#||Users||#||OxiADDC-icon-class||#||fas fa-user-friends||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##',
                'Style 1 Demo 2OXIIMPORTcounterOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG || OxiAddPR-TC-Serial |icon,number,title,divider| || || ||OxiADDC-animation||2|0//| OxiADDC-align |center|OxiADDC-Item |oxi-addons-lg-col-4|oxi-addons-md-col-2|oxi-addons-xs-col-1|OxiADDC-padding-top |10|10|10|OxiADDC-padding-bottom |10|10|10|OxiADDC-padding-left |10|10|10|OxiADDC-padding-right |10|10|10|OxiADDC-T-size |22|22|22| OxiADDC-T-color |#404040|OxiADDC-T-family |Hammersmith+One|500|OxiADDC-T-style |normal:1.3|center:0()0()0()#ffffff|OxiADDC-T-padding-top |5|5|5|OxiADDC-T-padding-bottom |5|5|5|OxiADDC-T-padding-left |5|5|5|OxiADDC-T-padding-right |5|5|5|OxiADDC-N-size |36|36|33| OxiADDC-N-color |#db2323|OxiADDC-N-family |Francois+One|400|OxiADDC-N-style |normal:1.3|center:0()0()0()#ffffff|OxiADDC-N-padding-top |5|5|5|OxiADDC-N-padding-bottom |5|5|5|OxiADDC-N-padding-left |5|5|5|OxiADDC-N-padding-right |5|5|5|OxiADDC-I-size |46|46|46|OxiADDC-I-width |100|100|100| OxiADDC-I-color |#ffffff|OxiADDC-I-bg|rgba(18,18,18,0.35)|https://www.oxilab.org/wp-content/uploads/2018/10/FB_IMG_15329750637819655.jpg||OxiADDC-I-border-top |0|0|0|OxiADDC-I-border-bottom |0|0|0|OxiADDC-I-border-left |0|0|0|OxiADDC-I-border-right |0|0|0|OxiADDC-I-border |outset|#0d00ff||OxiADDC-I-radius-top |0|0|0|OxiADDC-I-radius-bottom |0|0|0|OxiADDC-I-radius-left |0|0|0|OxiADDC-I-radius-right |0|0|0|OxiADDC-I-margin-top |15|15|15|OxiADDC-I-margin-bottom |15|15|15|OxiADDC-I-margin-left |15|15|15|OxiADDC-I-margin-right |15|15|15|OxiADDC-D-width |100|100|100|OxiADDC-D-border |2|2|2|OxiADDC-D-border |dotted|#614a4a||OxiADDC-D-padding-top |5|5|5|OxiADDC-D-padding-bottom |5|5|5|OxiADDC-D-padding-left |5|5|5|OxiADDC-D-padding-right |5|5|5| OxiADDC-D || counter-duration |3| counter-delay |0.01|||#|| ||#|||##OXISTYLE##OxiADDC-number||#||55,210||#||OxiADDC-title||#||HAPPY CLIENTS||#||OxiADDC-icon-class||#||fas fa-users||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||2,901||#||OxiADDC-title||#||TOTAL PROJECTS||#||OxiADDC-icon-class||#||fas fa-clipboard-list||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||3,210||#||OxiADDC-title||#||MILESTONES||#||OxiADDC-icon-class||#||fas fa-chess-knight||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||34665||#||OxiADDC-title||#||Pictures||#||OxiADDC-icon-class||#||fab fa-twitter||#||||#|| ||#||##OXIDATA##',
                'Style 2 Demo 1OXIIMPORTcounterOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG || OxiAddPR-TC-Serial |title,number,divider| || OxiADDC-formation-icon-class ||||OxiADDC-animation|||//| OxiADDC-icon-align |left|OxiADDC-Item |oxi-addons-lg-col-4|oxi-addons-md-col-2|oxi-addons-xs-col-1|OxiADDC-padding-top |5|10|10|OxiADDC-padding-bottom |5|10|10|OxiADDC-padding-left |5|10|10|OxiADDC-padding-right |5|10|10|OxiADDC-T-size |22|22|22| OxiADDC-T-color |#262626|OxiADDC-T-family |Open+Sans|800|OxiADDC-T-style |normal:1.3|left:0()0()0()#ffffff|OxiADDC-T-padding-top |5|5|5|OxiADDC-T-padding-bottom |5|5|5|OxiADDC-T-padding-left |5|5|5|OxiADDC-T-padding-right |5|5|5|OxiADDC-N-size |35|35|35| OxiADDC-N-color |#e62e2e|OxiADDC-N-family |Open+Sans|500|OxiADDC-N-style |normal:1.3|left:0()0()0()#ffffff|OxiADDC-N-padding-top |5|5|5|OxiADDC-N-padding-bottom |5|5|5|OxiADDC-N-padding-left |1|1|1|OxiADDC-N-padding-right |0|1|1|OxiADDC-I-size |50|50|50|OxiADDC-I-width |80|80|80| OxiADDC-I-color |#e62e2e|OxiADDC-I-bg|rgba(255, 255, 255, 1)|||OxiADDC-I-border-top |0|0|0|OxiADDC-I-border-bottom |0|0|0|OxiADDC-I-border-left |0|0|0|OxiADDC-I-border-right |0|0|0|OxiADDC-I-border |ridge|#0096fa||OxiADDC-I-radius-top |10|10|10|OxiADDC-I-radius-bottom |10|10|10|OxiADDC-I-radius-left |10|10|10|OxiADDC-I-radius-right |10|10|10|OxiADDC-I-margin-top |15|15|15|OxiADDC-I-margin-bottom |5|5|5|OxiADDC-I-margin-left |5|5|5|OxiADDC-I-margin-right |20|20|20|OxiADDC-D-width |60|60|60|OxiADDC-D-border |4|4|4|OxiADDC-D-border |double|#e62e2e||OxiADDC-D-padding-top |0|0|0|OxiADDC-D-padding-bottom |0|0|0|OxiADDC-D-padding-left |0|0|0|OxiADDC-D-padding-right |0|0|0| OxiADDC-D |yes| counter-duration |3| counter-delay |0.01|||#|| ||#|||##OXISTYLE##OxiADDC-number||#||100023||#||OxiADDC-title||#||Likes||#||OxiADDC-icon-class||#||fas fa-heart||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||327||#||OxiADDC-title||#||Songs||#||OxiADDC-icon-class||#||fas fa-headphones||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||228||#||OxiADDC-title||#||GB||#||OxiADDC-icon-class||#||fas fa-cloud-upload-alt||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||20||#||OxiADDC-title||#||Bookmarks||#||OxiADDC-icon-class||#||far fa-bookmark||#||||#|| ||#||##OXIDATA##',
                'Style 2 Demo 2OXIIMPORTcounterOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(247, 247, 247, 1)| OxiAddPR-TC-Serial |title,divider,number| || OxiADDC-formation-icon-class ||||OxiADDC-animation|||//| OxiADDC-icon-align |left|OxiADDC-Item |oxi-addons-lg-col-4|oxi-addons-md-col-2|oxi-addons-xs-col-2|OxiADDC-padding-top |10|10|10|OxiADDC-padding-bottom |10|10|10|OxiADDC-padding-left |10|10|10|OxiADDC-padding-right |10|10|10|OxiADDC-T-size |18|18|18| OxiADDC-T-color |#171717|OxiADDC-T-family |Open+Sans|100|OxiADDC-T-style |normal:1.3|left:0()0()0()#ffffff|OxiADDC-T-padding-top |5|5|5|OxiADDC-T-padding-bottom |0|0|0|OxiADDC-T-padding-left |10|10|10|OxiADDC-T-padding-right |5|5|5|OxiADDC-N-size |26|26|26| OxiADDC-N-color |#545454|OxiADDC-N-family |Open+Sans|800|OxiADDC-N-style |normal:1.3|left:0()0()0()#ffffff|OxiADDC-N-padding-top |5|5|5|OxiADDC-N-padding-bottom |1|1|1|OxiADDC-N-padding-left |10|10|10|OxiADDC-N-padding-right |5|5|5|OxiADDC-I-size |35|35|35|OxiADDC-I-width |75|75|75| OxiADDC-I-color |#ffffff|OxiADDC-I-bg|rgba(35,91,194,1.00)|||OxiADDC-I-border-top |3|3|3|OxiADDC-I-border-bottom |3|3|3|OxiADDC-I-border-left |3|3|3|OxiADDC-I-border-right |3|3|3|OxiADDC-I-border |solid|#808080||OxiADDC-I-radius-top |50|50|50|OxiADDC-I-radius-bottom |50|50|50|OxiADDC-I-radius-left |50|50|50|OxiADDC-I-radius-right |50|50|50|OxiADDC-I-margin-top |5|5|5|OxiADDC-I-margin-bottom |5|5|5|OxiADDC-I-margin-left |5|5|5|OxiADDC-I-margin-right |5|5|5|OxiADDC-D-width |60|60|60|OxiADDC-D-border |5|5|5|OxiADDC-D-border |solid|#1c1c1c||OxiADDC-D-padding-top |0|0|0|OxiADDC-D-padding-bottom |0|0|0|OxiADDC-D-padding-left |10|10|10|OxiADDC-D-padding-right |0|0|0| OxiADDC-D |yes| counter-duration |3| counter-delay |0.01|||#|| ||#|||##OXISTYLE##OxiADDC-number||#||50283||#||OxiADDC-title||#||Likes||#||OxiADDC-icon-class||#||fab fa-facebook-f||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||204872||#||OxiADDC-title||#||Followers||#||OxiADDC-icon-class||#||fab fa-instagram||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||305120||#||OxiADDC-title||#||Retweets||#||OxiADDC-icon-class||#||fab fa-twitter||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||100203||#||OxiADDC-title||#||Views||#||OxiADDC-icon-class||#||fab fa-youtube||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##',
                'Style 3 OXIIMPORTcounterOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)| OxiAddPR-TC-Serial |icon,title,number,divider| || || ||OxiADDC-animation||2|0//| OxiADDC-align |center|OxiADDC-Item |oxi-addons-lg-col-4|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiADDC-G-M-top |10|10|10|OxiADDC-G-M-bottom |10|10|10|OxiADDC-G-M-left |10|10|10|OxiADDC-G-M-right |10|10|10|OxiADDC-T-size |20|15|15| OxiADDC-T-color |#05abab|OxiADDC-T-family |Open+Sans|100|OxiADDC-T-style |normal:1.3|center:0()0()0()#ffffff|OxiADDC-T-padding-top |5|2|2|OxiADDC-T-padding-bottom |5|2|2|OxiADDC-T-padding-left |5|2|2|OxiADDC-T-padding-right |5|2|2|OxiADDC-N-size |40|25|25| OxiADDC-N-color |#05abab|OxiADDC-N-family |Open+Sans|bold|OxiADDC-N-style |normal:1.3|center:0()0()0()#ffffff|OxiADDC-N-padding-top |2|2|2|OxiADDC-N-padding-bottom |2|2|2|OxiADDC-N-padding-left |2|2|2|OxiADDC-N-padding-right |2|2|2|OxiADDC-I-size |40|40|40|OxiADDC-I-width |80|80|80| OxiADDC-I-color |#05abab|OxiADDC-I-bg|rgba(255,255,255,0.00)|||OxiADDC-I-border-top |4|3|3|OxiADDC-I-border-bottom |4|3|3|OxiADDC-I-border-left |4|3|3|OxiADDC-I-border-right |4|3|3|OxiADDC-I-border |solid|#05abab||OxiADDC-I-radius-top |50|50|50|OxiADDC-I-radius-bottom |50|50|50|OxiADDC-I-radius-left |50|50|50|OxiADDC-I-radius-right |50|50|50|OxiADDC-I-margin-top |5|5|5|OxiADDC-I-margin-bottom |15|15|15|OxiADDC-I-margin-left |15|15|15|OxiADDC-I-margin-right |20|20|20|OxiADDC-D-width |100|||OxiADDC-D-border |2|||OxiADDC-D-border |dotted|#614a4a||OxiADDC-D-padding-top |5|0|0|OxiADDC-D-padding-bottom |5|0|0|OxiADDC-D-padding-left |5|0|0|OxiADDC-D-padding-right |5|0|0| OxiADDC-D || counter-duration |3| counter-delay |0.01|OxiADDC-G-bg|rgba(255,255,255,1.00)|https://www.oxilab.org/wp-content/uploads/2019/03/phonepicutres-TA.jpg||OxiADDC-G-BS-top |4|4|4|OxiADDC-G-BS-bottom |4|4|4|OxiADDC-G-BS-left |4|4|4|OxiADDC-G-BS-right |4|4|4|OxiADDC-G-B |solid|#ffffff||OxiADDC-G-BR-top |0|0|0|OxiADDC-G-BR-bottom |0|0|0|OxiADDC-G-BR-left |0|0|0|OxiADDC-G-BR-right |0|0|0|OxiADDC-G-P-top |20|20|20|OxiADDC-G-P-bottom |20|20|20|OxiADDC-G-P-left |20|20|20|OxiADDC-G-P-right |20|20|20|OxiADDC-B-Shadow |rgba(186, 179, 179, 1)|1|1|15|2|||#|| ||#|||##OXISTYLE##OxiADDC-number||#||247||#||OxiADDC-title||#||Support||#||OxiADDC-icon-class||#||far fa-life-ring||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||18,320||#||OxiADDC-title||#||Users||#||OxiADDC-icon-class||#||fas fa-user-friends||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||38,242||#||OxiADDC-title||#||Milestones||#||OxiADDC-icon-class||#||fas fa-trophy||#||OxiADDC-SP-H-icon-color||#||||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||5,290||#||OxiADDC-title||#||Tasks||#||OxiADDC-icon-class||#||fas fa-check||#||||#|| ||#||##OXIDATA##',
                'style 04OXIIMPORTcounterOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddonsCounter-Item-per-row |oxi-addons-lg-col-4|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddonsCounter-G-BG|linear-gradient(45deg, rgba(74,99,240,1.00) 0%,rgba(55,52,194,1.00) 100%)|||OxiAddonsCounter-G-P-top |35|35|35|OxiAddonsCounter-G-P-bottom |35|35|35|OxiAddonsCounter-G-P-left |10|10|10|OxiAddonsCounter-G-P-right |10|10|10|OxiAddonsCounter-G-M-top |5|5|5|OxiAddonsCounter-G-M-bottom |5|5|5|OxiAddonsCounter-G-M-left |10|10|10|OxiAddonsCounter-G-M-right |10|10|10|OxiAddonsCounter-Shadow |rgba(222, 69, 69, 1)|0|0|0|0| OxiAddonsCounter-duration |3| OxiAddonsCounter-delay |0.01|OxiAddonsCounter-number-FS |50|50|32|OxiAddonsCounter-number-F-family |Bree Serif|100|OxiAddonsCounter-number-F-style |normal:1.3|center:0()0()0()#ffffff:| OxiAddonsCounter-number-C |#ffffff|OxiAddonsCounter-number-P-top |0|0|0|OxiAddonsCounter-number-P-bottom |0|0|0|OxiAddonsCounter-number-P-left |0|0|0|OxiAddonsCounter-number-P-right |0|0|0|OxiAddonsCounter-title-FS |22|22|16|OxiAddonsCounter-title-F-family |Bree Serif|100|OxiAddonsCounter-title-F-style |normal:1.3|center:0()0()0()#ffffff:| OxiAddonsCounter-title-C |#ffffff|OxiAddonsCounter-title-P-top |0|0|0|OxiAddonsCounter-title-P-bottom |0|0|0|OxiAddonsCounter-title-P-left |0|0|0|OxiAddonsCounter-title-P-right |0|0|0| OxiAddPR-TC-Serial |number,title|||#|| ||#|||##OXISTYLE##OxiADDC-number||#||1,20,000||#||OxiADDC-title||#||Happy Customer||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||10,000||#||OxiADDC-title||#||Milestones||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||1,00,000||#||OxiADDC-title||#||Active Install||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||2,00,000||#||OxiADDC-title||#||Downloads||#||||#|| ||#||##OXIDATA##',
                'OXIIMPORTcounterOXIIMPORTstyle-5OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddonsCounter-Item-per-row |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddonsCounter-G-BG|rgba(81,88,117,1.00)|||OxiAddonsCounter-G-P-top |50|50|50|OxiAddonsCounter-G-P-bottom |50|50|50|OxiAddonsCounter-G-P-left |10|10|10|OxiAddonsCounter-G-P-right |10|10|10|OxiAddonsCounter-G-M-top |5|5|5|OxiAddonsCounter-G-M-bottom |5|5|5|OxiAddonsCounter-G-M-left |10|10|10|OxiAddonsCounter-G-M-right |10|10|10|OxiAddonsCounter-Shadow |rgba(255, 255, 255, 1)|0|0|0|0| OxiAddonsCounter-duration |3| OxiAddonsCounter-delay |0.01|OxiAddonsCounter-number-FS |50|50|32|OxiAddonsCounter-number-F-family |Oswald|100|OxiAddonsCounter-number-F-style |normal:1.3|center:0()0()0()#ffffff:| OxiAddonsCounter-number-C |#ffffff|OxiAddonsCounter-number-P-top |10|10|10|OxiAddonsCounter-number-P-bottom |15|15|15|OxiAddonsCounter-number-P-left |0|0|0|OxiAddonsCounter-number-P-right |0|0|0|OxiAddonsCounter-title-FS |22|22|16|OxiAddonsCounter-title-F-family |Open+Sans|100|OxiAddonsCounter-title-F-style |normal:1.3|center:0()0()0()#ffffff:| OxiAddonsCounter-title-C |#ffffff|OxiAddonsCounter-title-P-top |15|15|15|OxiAddonsCounter-title-P-bottom |0|0|0|OxiAddonsCounter-title-P-left |0|0|0|OxiAddonsCounter-title-P-right |0|0|0| OxiAddonsCounter-I-PS |center|OxiAddonsCounter-icon-size |60|60|60|OxiAddonsCounter-icon-width-height |70|70|70|OxiAddonsCounter-icon-color|#ffffff|OxiAddonsCounter-icon-BG|rgba(15,93,161,0.00)|OxiAddonsCounter-icon-B |0|dotted|| OxiAddonsCounter-icon-BC ||OxiAddonsCounter-icon-border-radius-top |1|1|1|OxiAddonsCounter-icon-border-radius-bottom |1|1|1|OxiAddonsCounter-icon-border-radius-left |1|1|1|OxiAddonsCounter-icon-border-radius-right |1|1|1|OxiAddonsCounter-icon-color-hover|#ffffff|OxiAddonsCounter-icon-BG-hover|rgba(55,171,159,0.00)||||| OxiAddonsCounter-border-color-hover |#ffffff|OxiAddonsCounter-Line-W |50|50|50|OxiAddonsCounter-Line-H |5|5|5| OxiAddonsCounter-Line-BG |#ffffff||||||| oxi-addons-select-align |0| OxiAddonsCounter-play-controls |false|||#|| OxiAddonsCounter-sign ||#||k||#|| ||#||##OXISTYLE##OxiADDC-number||#||15000||#||OxiADDC-title||#||KBS OF HTML FILES||#||OxiADDC-title||#||fab fa-android||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||10000||#||OxiADDC-title||#||NO. OF TEMPLATES||#||OxiADDC-title||#||fas fa-air-freshener||#||||#|| ||#||##OXIDATA##OxiADDC-number||#||1400||#||OxiADDC-title||#||HOURS OF CODING||#||OxiADDC-title||#||fab fa-apple||#||||#|| ||#||##OXIDATA##',
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
                        echo '<div class="oxi-addons-col-1" id="'.$expludedata[2].'"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
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

