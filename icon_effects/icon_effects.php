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
$freeimport = array('style-1', 'style-2', 'style-3', 'style-4', 'style-5', 'style-6', 'style-7', 'style-8');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = Array(
                'Style 1OXIIMPORTicon_effectsOXIIMPORTstyle-1OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(161,5,5,1.00)|oxi_addons-icon-animation||.5:false:false:500:10:0.2|.5//| oxi-addons-icon-border-radius |50| oxi-addons-preview-BG || oxi_addons-icon-hover-color |#ffffff| oxi_addons-icon-hover-bg-color |rgba(145,9,9,1.00)| oxi_addons-icon-padding |5|5|5| oxi_addons-icon-border |5|5|5|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 2OXIIMPORTicon_effectsOXIIMPORTstyle-2OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(10,194,56,1.00)|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG || oxi_addons-icon-hover-color |#ffffff| oxi_addons-icon-hover-bg-color |rgba(6,92,21,1.00)| oxi_addons-icon-padding |5|5|5| oxi_addons-icon-border |5|5|5|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 3OXIIMPORTicon_effectsOXIIMPORTstyle-3OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(14,39,230,1.00)|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#ffffff| oxi_addons-icon-hover-bg-color |rgba(9,13,117,1.00)| oxi_addons-icon-padding |5|5|5| oxi_addons-icon-border |5|5|5|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 4OXIIMPORTicon_effectsOXIIMPORTstyle-4OXIIMPORToxi_addons-icon-link-opening |_blank| oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(168,12,207,1.00)|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#7f0485| oxi_addons-icon-hover-border-color |#7f0485| |||| oxi_addons-icon-border |5|5|5|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 5OXIIMPORTicon_effectsOXIIMPORTstyle-5OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(4,166,207,1.00)|oxi_addons-icon-animation||.5:false:false:500:10:0.2|.5//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#066a73| oxi_addons-icon-hover-border-color |#066a73| |||| oxi_addons-icon-border |5|5|5|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 6OXIIMPORTicon_effectsOXIIMPORTstyle-6OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(255, 123, 0, 1)|oxi_addons-icon-animation||.5:false:false:500:10:0.2|.5//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG || oxi_addons-icon-hover-color |#ad590a| oxi_addons-icon-hover-bg-color |#ad590a| |||| oxi_addons-icon-border |5|5|5|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 7OXIIMPORTicon_effectsOXIIMPORTstyle-7OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#b35656| oxi_addons-icon-border-color |#b35656|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#993838| oxi_addons-icon-border-hover-color |#993838| oxi_addons-icon-hover-border |5|oxi_addons-icon-hover-border-type|dashed| oxi_addons-icon-border |5|oxi_addons-icon-border-type|solid|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 8OXIIMPORTicon_effectsOXIIMPORTstyle-8OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#5050a3| oxi_addons-icon-border-color |#5050a3|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#2d2d85| oxi_addons-icon-border-hover-color |#2d2d85| oxi_addons-icon-hover-border |5|oxi_addons-icon-hover-border-type|dashed| oxi_addons-icon-border |5|oxi_addons-icon-border-type|solid|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 9OXIIMPORTicon_effectsOXIIMPORTstyle-9OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(82,158,91,1.00)|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#529e59| oxi_addons-icon-border-color |#529e59| |||| oxi_addons-icon-border |5|5|5| oxi_addons-icon-hover-border |5|5|5| oxi_addons-icon-hover-hover-color |#306635|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 10OXIIMPORTicon_effectsOXIIMPORTstyle-10OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(166, 87, 162, 1)|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#a657a2| oxi_addons-icon-border-color |#a657a2| |||| oxi_addons-icon-border |5|5|5| oxi_addons-icon-hover-border |10|10|10| oxi_addons-icon-hover-hover-color |#963990|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 11OXIIMPORTicon_effectsOXIIMPORTstyle-11OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(80,149,153,1.00)|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#509599| oxi_addons-icon-border-color |#509599| |||| oxi_addons-icon-border |5|5|5| oxi_addons-icon-hover-border |10|10|10| oxi_addons-icon-hover-hover-color |#357175|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 12OXIIMPORTicon_effectsOXIIMPORTstyle-12OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(140,124,79,1.00)|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#8c7c4f| oxi_addons-icon-border-color |#8c7c4f| |||| oxi_addons-icon-border |5|5|5| oxi_addons-icon-hover-border |10|10|10| oxi_addons-icon-hover-hover-color |#6b5d32|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 13OXIIMPORTicon_effectsOXIIMPORTstyle-13OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(245,49,140,1.00)|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#f5318c| oxi_addons-icon-border-color |#f5318c| |||| oxi_addons-icon-border |5|5|5| oxi_addons-icon-hover-border |10|10|10| oxi_addons-icon-hover-hover-color |#d1196c|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 14OXIIMPORTicon_effectsOXIIMPORTstyle-14OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(23,140,235,1.00)|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#178ceb| oxi_addons-icon-hover-border-color |#178ceb| |||| oxi_addons-icon-border |5||5|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 15OXIIMPORTicon_effectsOXIIMPORTstyle-15OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#37b857| oxi_addons-icon-border-color |#37b857|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#23913e| oxi_addons-icon-hover-border-color |#23913e| |||| oxi_addons-icon-border |5|5|5| oxi_addons-icon-padding-top |10|8|8| oxi_addons-icon-padding-left |10|8|8|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 16OXIIMPORTicon_effectsOXIIMPORTstyle-16OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffbb00| oxi_addons-icon-border-color |#ffbb00|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#ba8d07| oxi_addons-icon-hover-border-color |#ba8d07| |||| oxi_addons-icon-border |5|5|5| oxi_addons-icon-padding-top |10|8|8| oxi_addons-icon-padding-left |10|8|8|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
                'Style 17OXIIMPORTicon_effectsOXIIMPORTstyle-17OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |50|45|40| oxi_addons-icon-margin-top |0|0|0| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |100|90|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(12,209,186,1.00)|oxi_addons-icon-animation||:false:false:500:10:0.2|10//| oxi-addons-icon-border-radius |90| oxi-addons-preview-BG |#ffffff| oxi_addons-icon-hover-color |#ffffff| oxi_addons-icon-hover-bg-color |rgba(4,140,126,1.00)| oxi_addons-icon-padding |0|0|0| oxi_addons-icon-border |5|5|5|OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1||##OXISTYLE##oxi_addons-icon-class ||#||fab fa-youtube||#||oxi_addons-icon-id ||#||btn1||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-facebook||#||oxi_addons-icon-id ||#||btn2||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##oxi_addons-icon-class ||#||fab fa-linkedin||#||oxi_addons-icon-id ||#||btn3||#||oxi_addons-icon-link ||#||#||#|| ||#||##OXIDATA##',
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

