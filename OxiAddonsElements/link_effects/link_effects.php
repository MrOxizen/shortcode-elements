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
$freeimport = array('style-1','style-2','style-3', 'style-4', 'style-5');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file =  Array(
                'Style 1 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-1OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |26|26|26| oxi-addons-color |#f06060| oxi-addons-hover-color |#3c12e6| oxi-addons-icon-color |#3c12e6| oxi-addons-family |Roboto| oxi-addons-font-weight |800| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |#ffffff|||#|| ||#||oxi-addons-text ||#||SIGN UP||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#||oxi-addons-left-icon ||#|||||#||oxi-addons-right-icon ||#|||||#|||',
                'Style 1 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-1OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |26|26|26| oxi-addons-color |#f06060| oxi-addons-hover-color |#3c12e6| oxi-addons-icon-color |#3c12e6| oxi-addons-family |Roboto| oxi-addons-font-weight |800| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |#ffffff|||#|| ||#||oxi-addons-text ||#||SIGN UP||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#||oxi-addons-left-icon ||#|||||#||oxi-addons-right-icon ||#|||||#|||',
                'Style 2 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-2OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |25|25|25| oxi-addons-color |#ffffff| oxi-addons-hover-color |#242424| oxi-addons-bg-color |linear-gradient(0deg, rgba(176,14,152,1.00) 0%,rgba(247,15,216,1) 97%)| oxi-addons-family |Roboto| oxi-addons-font-weight |700| oxi-addons-font-style |italic| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |30|30|30| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//| oxi-addons-bg-hover-color |rgba(240,228,60,1.00)|oxi-addons-preview-BG |#ffffff|||#|| ||#||oxi-addons-text ||#||Learn More||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#||oxi-addons-hover-text ||#||Sign Up||#|||',
                'Style 2 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-2OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |20|20|20| oxi-addons-color |#ffffff| oxi-addons-hover-color |#ffffff| oxi-addons-bg-color |rgba(21,191,15,1.00)| oxi-addons-family |Montserrat| oxi-addons-font-weight |700| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |50|50|50| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//| oxi-addons-bg-hover-color |rgba(23,161,230,1.00)|oxi-addons-preview-BG |#ffffff|||#|| ||#||oxi-addons-text ||#||SIGN IN||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#||oxi-addons-hover-text ||#||SEND||#|||',
                'Style 3 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-3OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#dd12eb| oxi-addons-hover-color |#db0f38| oxi-addons-border-color |#db0f38| oxi-addons-family |Raleway| oxi-addons-font-weight |500| oxi-addons-font-style |italic| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |rgba(41,41,58,1.00)| oxi-addons-border-size |3|3|3|||#|| ||#||oxi-addons-text ||#||Read More||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 3 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-3OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|30| oxi-addons-color |#15bf0f| oxi-addons-hover-color |#ff00ea| oxi-addons-border-color |#ff00ea| oxi-addons-family |Montserrat| oxi-addons-font-weight |600| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |rgba(28,28,28,1.00)| oxi-addons-border-size |4|4|3|||#|| ||#||oxi-addons-text ||#||LOGIN||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 4 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-4OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#d90021| oxi-addons-hover-color |#6219ff| oxi-addons-border-color |#6219ff| oxi-addons-family |Roboto| oxi-addons-font-weight |600| oxi-addons-font-style |italic| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |#ffffff| oxi-addons-border-size |4|4|3|||#|| ||#||oxi-addons-text ||#||Read More||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 4 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-4OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#d000f5| oxi-addons-hover-color |#f00505| oxi-addons-border-color |#f00505| oxi-addons-family |Montserrat| oxi-addons-font-weight |700| oxi-addons-font-style |italic| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |#ffffff| oxi-addons-border-size |4|4|3|||#|| ||#||oxi-addons-text ||#||Click Here||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 5 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-5OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#c70cbe| oxi-addons-hover-color |#00b5b5| || oxi-addons-family |Open+Sans| oxi-addons-font-weight |600| oxi-addons-font-style |italic| |||| |||| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|oxi-addons-padding-top |0|0|0|oxi-addons-padding-bottom |0|0|0|oxi-addons-padding-left |10|10|10|oxi-addons-padding-right |10|10|10| ||oxi-addons-preview-BG |0| oxi-addons-hover-family |0| oxi-addons-hover-font-weight |100| oxi-addons-hover-font-style |normal|||#|| ||#||oxi-addons-text ||#||Read More||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#||oxi-addons-hover-text ||#||Sign Up||#|||',
                'Style 5 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-5OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#0eebeb| oxi-addons-hover-color |#7f05eb| || oxi-addons-family |Averia+Libre| oxi-addons-font-weight |500| oxi-addons-font-style |normal| |||| |||| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|oxi-addons-padding-top |0|0|0|oxi-addons-padding-bottom |0|0|500|oxi-addons-padding-left |0|0|0|oxi-addons-padding-right |0|0|0| ||oxi-addons-preview-BG |0| oxi-addons-hover-family |0| oxi-addons-hover-font-weight |500| oxi-addons-hover-font-style |normal|||#|| ||#||oxi-addons-text ||#||Register Now||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#||oxi-addons-hover-text ||#||Sign Up||#|||',
                'Style 6 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-6OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#d90082| oxi-addons-hover-color |#00aed1| oxi-addons-border-color |#d90082| oxi-addons-family |Open+Sans| oxi-addons-font-weight |600| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |rgba(234,234,234,1.00)| oxi-addons-border-size |3|3|3| oxi-addons-border-hover-color |#00aed1|||#|| ||#||oxi-addons-text ||#||Read More||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 6 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-6OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#28b531| oxi-addons-hover-color |#d1002a| oxi-addons-border-color |#28b531| oxi-addons-family |Montserrat| oxi-addons-font-weight |700| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |rgba(234,234,234,1.00)| oxi-addons-border-size |4|4|4| oxi-addons-border-hover-color |#d1002a|||#|| ||#||oxi-addons-text ||#||Learn More||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 7 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-7OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#d90082| oxi-addons-hover-color |#00aed1| oxi-addons-border-color |#d90082| oxi-addons-family |Montserrat| oxi-addons-font-weight |600| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |#ffffff| oxi-addons-border-size |2|2|2| oxi-addons-border-hover-color |#00aed1|||#|| ||#||oxi-addons-text ||#||Read More||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 7 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-7OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#b215eb| oxi-addons-hover-color |#51d117| oxi-addons-border-color |#b215eb| oxi-addons-family |Montserrat| oxi-addons-font-weight |700| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |#ffffff| oxi-addons-border-size |3|3|3| oxi-addons-border-hover-color |#51d117|||#|| ||#||oxi-addons-text ||#||Send||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 8 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-8OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |25|25|25| oxi-addons-color |#f83b00| oxi-addons-hover-color |#139bf5| oxi-addons-border-color |#f83b00| oxi-addons-family |Roboto| oxi-addons-font-weight |500| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |20|20|20| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |#ffffff| oxi-addons-border-size |3|3|2| oxi-addons-border-hover-color |#139bf5|||#|| ||#||oxi-addons-text ||#||Learn More||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 8 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-8OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |25|25|25| oxi-addons-color |#e918f0| oxi-addons-hover-color |#0c1bf0| oxi-addons-border-color |#e918f0| oxi-addons-family |Roboto| oxi-addons-font-weight |500| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |30|30|30| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |#ffffff| oxi-addons-border-size |3|3|2| oxi-addons-border-hover-color |#0c1bf0|||#|| ||#||oxi-addons-text ||#||Read More||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 9 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-9OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |25|25|25| oxi-addons-color |#ffffff| oxi-addons-hover-color |#ffffff| oxi-addons-bg-color |#9400d9| oxi-addons-family |Open+Sans| oxi-addons-font-weight |600| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |25|25|25| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//| oxi-addons-bg-hover-color |rgba(5,139,166,1.00)|oxi-addons-preview-BG |#ffffff|||#|| ||#||oxi-addons-text ||#||Learn More||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#||oxi-addons-hover-text ||#||Sign Up||#|||',
                'Style 9 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-9OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |25|25|25| oxi-addons-color |#ffffff| oxi-addons-hover-color |#ffffff| oxi-addons-bg-color |rgba(201, 12, 12, 1)| oxi-addons-family |Montserrat| oxi-addons-font-weight |600| oxi-addons-font-style |italic| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |35|35|35| oxi-addons-margin-top |0|0|0| oxi-addons-margin-left |0|0|0|oxi-addons-animation||.5:false:false:500:10:0.2|.5//| oxi-addons-bg-hover-color |rgba(255,94,0,1.00)|oxi-addons-preview-BG |#ffffff|||#|| ||#||oxi-addons-text ||#||Click Here||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#||oxi-addons-hover-text ||#||Register||#|||',
                'Style 10 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-10OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |25|25|25| oxi-addons-color |#0fd11f| oxi-addons-hover-color |#e66f0e| oxi-addons-border-color |#0fd11f| oxi-addons-family |Open Sans| oxi-addons-font-weight |700| oxi-addons-font-style |normal| oxi-addons-border-width |130|130|130| oxi-addons-border-2nd-size |4|4|4| oxi-addons-margin-top |30|30|30| oxi-addons-margin-left |30|30|30|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |#ffffff| oxi-addons-border-size |2|2|2| oxi-addons-border-2nd-color |#e66f0e| oxi-addons-border-2nd-width |115|115|115| oxi-addons-border-radius |50|50|50|||#|| ||#||oxi-addons-text ||#||SUBMIT||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 10 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-10OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#00a4f7| oxi-addons-hover-color |#e60ed4| oxi-addons-border-color |#00a4f7| oxi-addons-family |Roboto| oxi-addons-font-weight |800| oxi-addons-font-style |normal| oxi-addons-border-width |130|130|130| oxi-addons-border-2nd-size |4|4|4| oxi-addons-margin-top |30|30|30| oxi-addons-margin-left |30|30|30|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |rgba(0,0,0,1.00)| oxi-addons-border-size |2|2|2| oxi-addons-border-2nd-color |#e60ed4| oxi-addons-border-2nd-width |115|115|115| oxi-addons-border-radius |50|50|50|||#|| ||#||oxi-addons-text ||#||SEND||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 11 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-11OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#f5970a| oxi-addons-hover-color |#ff00cc| oxi-addons-border-color |#f5970a| oxi-addons-family |Lato| oxi-addons-font-weight |700| oxi-addons-font-style |italic| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |5|5|5| oxi-addons-margin-left |5|5|5|oxi-addons-animation||.5:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |rgba(0,0,0,1.00)| oxi-addons-border-size |2|2|2| oxi-addons-border-hover-color |#ff00cc|||#|| ||#||oxi-addons-text ||#||Login||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 11 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-11OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#51d117| oxi-addons-hover-color |#0f87ff| oxi-addons-border-color |#51d117| oxi-addons-family |Montserrat| oxi-addons-font-weight |600| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |5|5|5| oxi-addons-margin-left |5|5|5|oxi-addons-animation|zoomIn|1:false:false:500:10:0.2|.5//|||oxi-addons-preview-BG |#ffffff| oxi-addons-border-size |2|2|2| oxi-addons-border-hover-color |#0f87ff|||#|| ||#||oxi-addons-text ||#||Sign Up||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 12 Set 1OXIIMPORTlink_effectsOXIIMPORTstyle-12OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#e6810e| oxi-addons-hover-color |#aa0af5| oxi-addons-border-color |#ff7300| oxi-addons-family |Open Sans| oxi-addons-font-weight |600| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |10|10|10| oxi-addons-margin-left |10|10|10|oxi-addons-animation||.5|.5//|||oxi-addons-preview-BG |#ffffff| oxi-addons-border-size |2|2|2| oxi-addons-border-hover-color |#ff7300|||#|| ||#||oxi-addons-text ||#||Register Now||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
                'Style 12 Set 2OXIIMPORTlink_effectsOXIIMPORTstyle-12OXIIMPORToxi-addons-link-opening || oxi-addons-font-size |30|30|25| oxi-addons-color |#d90082| oxi-addons-hover-color |#00aed1| oxi-addons-border-color |#d90082| oxi-addons-family |Open+Sans| oxi-addons-font-weight |600| oxi-addons-font-style |normal| oxi-addons-padding-top |10|10|10| oxi-addons-padding-left |10|10|10| oxi-addons-margin-top |10|10|10| oxi-addons-margin-left |10|10|10|oxi-addons-animation||.5|.5//|||oxi-addons-preview-BG |#ffffff| oxi-addons-border-size |2|2|2| oxi-addons-border-hover-color |#74868a|||#|| ||#||oxi-addons-text ||#||Click Here||#||oxi-addons-id ||#||#||#||oxi-addons-link ||#||#||#|||',
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
                        echo '<div class="oxi-addons-col-6 oxiequalHeight"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
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
                        echo '<div class="oxi-addons-col-6 oxiequalHeight" id="' . $expludedata[2] . '"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
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

