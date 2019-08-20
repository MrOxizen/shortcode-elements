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
$freeimport = array('style-1');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file =  Array(
              'Style 1 Demo 1OXIIMPORTdual_buttonOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(235,235,235,1.00)|oxi-addons-button-text-align |center|oxi-addons-button-margin-top |0|0|0|oxi-addons-button-margin-bottom |0|0|0|oxi-addons-button-margin-left |0|0|0|oxi-addons-button-margin-right |0|0|0|oxi_addons-button-animation||0:false:false:500:10:0.2|0//|oxi_addons-button-left-opening |_blank|oxi_addons-button-Right-opening |_blank|oxi_addons-button-left-font-size|16|15|14| oxi_addons-button-left-color |#ffffff| oxi_addons-button-left-bg-color |rgba(23, 186, 63, 1)|oxi-addons-button-left-border-size-top |0|0|0|oxi-addons-button-left-border-size-bottom |0|0|0|oxi-addons-button-left-border-size-left |0|0|0|oxi-addons-button-left-border-size-right |0|0|0|oxi-addons-button-left-border |solid|#000000||oxi-addons-button-left-border-radius-top |3|3|3|oxi-addons-button-left-border-radius-bottom |3|3|3|oxi-addons-button-left-border-radius-left |3|3|3|oxi-addons-button-left-border-radius-right |3|3|3|oxi_addons-button-left-f-family |Roboto|700|oxi_addons-button-left-f-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0):1|oxi-addons-button-left-padding-top |8|8|6|oxi-addons-button-left-padding-bottom |8|8|6|oxi-addons-button-left-padding-left |15|15|11|oxi-addons-button-left-padding-right |33|33|27|oxi-addons-button-left-margin-top |0|0|0|oxi-addons-button-left-margin-bottom |0|0|0|oxi-addons-button-left-margin-left |0|0|0|oxi-addons-button-left-margin-right |10|10|10|oxi_addons-button-left-hover-color |#ffffff| oxi_addons-button-left-hover-bg-color |rgba(15, 162, 207, 1)|oxi-addons-button-left-hover-border-size-top |0|0|0|oxi-addons-button-left-hover-border-size-bottom |0|0|0|oxi-addons-button-left-hover-border-size-left |0|0|0|oxi-addons-button-left-hover-border-size-right |0|0|0|oxi-addons-button-left-hover-border |dotted|#a60000||oxi-addons-button-left-hover-border-radius-top |0|0|0|oxi-addons-button-left-hover-border-radius-bottom |0|0|0|oxi-addons-button-left-hover-border-radius-left |0|0|0|oxi-addons-button-left-hover-border-radius-right |0|0|0|oxi_addons-button-left-icon-color |#ffffff|oxi_addons-button-left-icon-size|17|15|12|oxi_addons-button-left-icon-position |left|oxi_addons-button-left-icon-h-color |#ffffff|oxi_addons-button-Right-font-size|16|15|14| oxi_addons-button-Right-color |#ffffff| oxi_addons-button-Right-bg-color |rgba(237, 3, 124, 1)|oxi-addons-Right-button-border-size-top |0|0|0|oxi-addons-Right-button-border-size-bottom |0|0|0|oxi-addons-Right-button-border-size-left |0|0|0|oxi-addons-Right-button-border-size-right |0|0|0|oxi-addons-button-Right-border |dotted|#121212||oxi-addons-button-Right-border-radius-top |3|3|3|oxi-addons-button-Right-border-radius-bottom |3|3|3|oxi-addons-button-Right-border-radius-left |3|3|3|oxi-addons-button-Right-border-radius-right |3|3|3|oxi_addons-button-Right-f-family |Roboto|700|oxi_addons-button-Right-f-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0):1|oxi-addons-button-Right-padding-top |8|8|6|oxi-addons-button-Right-padding-bottom |8|8|6|oxi-addons-button-Right-padding-left |33|33|27|oxi-addons-button-Right-padding-right |15|15|11|oxi-addons-button-Right-margin-top |0|0|0|oxi-addons-button-Right-margin-bottom |0|0|0|oxi-addons-button-Right-margin-left |10|10|10|oxi-addons-button-Right-margin-right |0|0|0|oxi_addons-button-Right-hover-color |#ffffff| oxi_addons-button-Right-hover-bg-color |rgba(177,25,207,1.00)|oxi-addons-button-Right-hover-border-size-top |0|0|0|oxi-addons-button-Right-hover-border-size-bottom |0|0|0|oxi-addons-button-Right-hover-border-size-left |0|0|0|oxi-addons-button-Right-hover-border-size-right |0|0|0|oxi-addons-button-Right-hover-border |dotted|#db5555||oxi-addons-button-Right-hover-border-radius-top |0|0|0|oxi-addons-button-Right-hover-border-radius-bottom |0|0|0|oxi-addons-button-Right-hover-border-radius-left |0|0|0|oxi-addons-button-Right-hover-border-radius-right |0|0|0|oxi_addons-button-Right-icon-color |#ffffff|oxi_addons-button-Right-icon-size|17|0|0|oxi_addons-button-Right-icon-position |right|oxi_addons-button-Right-icon-h-color |#ffffff|oxi_addons-button-middle-font-size|13|13|12|oxi_addons-button-middle-color |#ffffff|oxi_addons-button-middle-bg-color |rgba(0,0,0,1.00)|oxi_addons-button-middle-f-family |Roboto|600|oxi_addons-button-middle-f-style |normal:1.3|left:0()0()0()#ffffff:1|oxi-addons-button-middle-padding-top |0|0|0|oxi-addons-button-middle-padding-bottom |0|0|0|oxi-addons-button-middle-padding-left |0|0|0|oxi-addons-button-middle-padding-right |0|0|0|oxi-addons-button-middle-border-radius-top |50|50|50|oxi-addons-button-middle-border-radius-bottom |50|50|50|oxi-addons-button-middle-border-radius-left |50|50|50|oxi-addons-button-middle-border-radius-right |50|50|50|||||oxi_addons-button-max-width|400|400|400|oxi-middle-icon |text|||#|| ||#||oxi_addons-button-left-text ||#||Button Left||#||oxi_addons-button-Right-text ||#||Button Right||#||oxi_addons-button-middle-text ||#||OR||#||oxi_addons-button-left-icon ||#||fas fa-angle-double-left||#||oxi_addons-button-Right-icon ||#||fas fa-angle-double-right||#||oxi_addons-button-left-id ||#||56||#||oxi_addons-button-Right-id ||#||96||#||oxi_addons-button-left-link ||#||#||#||oxi_addons-button-Right-link ||#||#||#||||#|||',
              'Style 1 Demo 2OXIIMPORTdual_buttonOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(235,235,235,1.00)|oxi-addons-button-text-align |center|oxi-addons-button-margin-top |0|0|0|oxi-addons-button-margin-bottom |0|0|0|oxi-addons-button-margin-left |0|0|0|oxi-addons-button-margin-right |0|0|0|oxi_addons-button-animation||0:false:false:500:10:0.2|0//|oxi_addons-button-left-opening |_blank|oxi_addons-button-Right-opening |_blank|oxi_addons-button-left-font-size|16|15|14| oxi_addons-button-left-color |#2d9ec6| oxi_addons-button-left-bg-color |rgba(255,255,255,1.00)|oxi-addons-button-left-border-size-top |2|2|2|oxi-addons-button-left-border-size-bottom |2|2|2|oxi-addons-button-left-border-size-left |2|2|2|oxi-addons-button-left-border-size-right |2|2|2|oxi-addons-button-left-border |solid|#2d9ec6||oxi-addons-button-left-border-radius-top |50|50|50|oxi-addons-button-left-border-radius-bottom |3|3|3|oxi-addons-button-left-border-radius-left |50|50|50|oxi-addons-button-left-border-radius-right |3|3|3|oxi_addons-button-left-f-family |Roboto|600|oxi_addons-button-left-f-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0):1|oxi-addons-button-left-padding-top |8|8|6|oxi-addons-button-left-padding-bottom |8|8|6|oxi-addons-button-left-padding-left |15|15|11|oxi-addons-button-left-padding-right |33|33|27|oxi-addons-button-left-margin-top |0|0|0|oxi-addons-button-left-margin-bottom |0|0|0|oxi-addons-button-left-margin-left |0|0|0|oxi-addons-button-left-margin-right |10|10|10|oxi_addons-button-left-hover-color |#ffffff| oxi_addons-button-left-hover-bg-color |rgba(45,158,198,1.00)|oxi-addons-button-left-hover-border-size-top |0|0|0|oxi-addons-button-left-hover-border-size-bottom |3|3|3|oxi-addons-button-left-hover-border-size-left |0|0|0|oxi-addons-button-left-hover-border-size-right |0|0|0|oxi-addons-button-left-hover-border |solid|#217594||oxi-addons-button-left-hover-border-radius-top |50|50|50|oxi-addons-button-left-hover-border-radius-bottom |0|0|0|oxi-addons-button-left-hover-border-radius-left |50|50|50|oxi-addons-button-left-hover-border-radius-right |0|0|0|oxi_addons-button-left-icon-color |#2d9ec6|oxi_addons-button-left-icon-size|17|15|12|oxi_addons-button-left-icon-position |left|oxi_addons-button-left-icon-h-color |#ffffff|oxi_addons-button-Right-font-size|16|15|14| oxi_addons-button-Right-color |#2d9ec6| oxi_addons-button-Right-bg-color |rgba(255,255,255,1.00)|oxi-addons-Right-button-border-size-top |2|2|2|oxi-addons-Right-button-border-size-bottom |2|2|2|oxi-addons-Right-button-border-size-left |2|2|2|oxi-addons-Right-button-border-size-right |2|2|2|oxi-addons-button-Right-border |solid|#2d9ec6||oxi-addons-button-Right-border-radius-top |3|3|3|oxi-addons-button-Right-border-radius-bottom |50|50|50|oxi-addons-button-Right-border-radius-left |3|3|3|oxi-addons-button-Right-border-radius-right |50|50|50|oxi_addons-button-Right-f-family |Roboto|600|oxi_addons-button-Right-f-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0):1|oxi-addons-button-Right-padding-top |8|8|6|oxi-addons-button-Right-padding-bottom |8|8|6|oxi-addons-button-Right-padding-left |33|33|27|oxi-addons-button-Right-padding-right |15|15|11|oxi-addons-button-Right-margin-top |0|0|0|oxi-addons-button-Right-margin-bottom |0|0|0|oxi-addons-button-Right-margin-left |10|10|10|oxi-addons-button-Right-margin-right |0|0|0|oxi_addons-button-Right-hover-color |#ffffff| oxi_addons-button-Right-hover-bg-color |rgba(45,158,198,1.00)|oxi-addons-button-Right-hover-border-size-top |0|0|0|oxi-addons-button-Right-hover-border-size-bottom |3|3|3|oxi-addons-button-Right-hover-border-size-left |0|0|0|oxi-addons-button-Right-hover-border-size-right |0|0|0|oxi-addons-button-Right-hover-border |solid|#217594||oxi-addons-button-Right-hover-border-radius-top |0|0|0|oxi-addons-button-Right-hover-border-radius-bottom |50|50|50|oxi-addons-button-Right-hover-border-radius-left |0|0|0|oxi-addons-button-Right-hover-border-radius-right |50|50|50|oxi_addons-button-Right-icon-color |#2d9ec6|oxi_addons-button-Right-icon-size|17|0|0|oxi_addons-button-Right-icon-position |right|oxi_addons-button-Right-icon-h-color |#ffffff|oxi_addons-button-middle-font-size|13|13|12|oxi_addons-button-middle-color |#ffffff|oxi_addons-button-middle-bg-color |rgba(18,18,18,1.00)|oxi_addons-button-middle-f-family |Roboto|600|oxi_addons-button-middle-f-style |normal:1.3|left:0()0()0()#ffffff:1|oxi-addons-button-middle-padding-top |0|0|0|oxi-addons-button-middle-padding-bottom |0|0|0|oxi-addons-button-middle-padding-left |0|0|0|oxi-addons-button-middle-padding-right |0|0|0|oxi-addons-button-middle-border-radius-top |50|50|50|oxi-addons-button-middle-border-radius-bottom |50|50|50|oxi-addons-button-middle-border-radius-left |50|50|50|oxi-addons-button-middle-border-radius-right |50|50|50|||||oxi_addons-button-max-width|400|400|400|oxi-middle-icon |icon|||#|| ||#||oxi_addons-button-left-text ||#||Button Left||#||oxi_addons-button-Right-text ||#||Button Right||#||oxi_addons-button-middle-text ||#||fas fa-allergies||#||oxi_addons-button-left-icon ||#||fas fa-angle-double-left||#||oxi_addons-button-Right-icon ||#||fas fa-angle-double-right||#||oxi_addons-button-left-id ||#||56||#||oxi_addons-button-Right-id ||#||96||#||oxi_addons-button-left-link ||#||#||#||oxi_addons-button-Right-link ||#||#||#||||#|||',
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

