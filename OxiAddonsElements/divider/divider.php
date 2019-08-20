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
$file = Array(
    'style 1 layout 1OXIIMPORTdividerOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-color |rgba(255, 255, 255, 1)| oxi-addons-divider |3|double|#0f9999|oxi-addons-divider-size|220|220|220| oxi-addons-divider-align |center|oxi-addons-divider-animation||1|0//|oxi-addons-divider-padding-top |2|1|1|oxi-addons-divider-padding-bottom |2|1|1|oxi-addons-divider-padding-left |2|1|1|oxi-addons-divider-padding-right |2|1|1|||#|| oxi_addons-divider-id ||#||||#|| ||#||',
    'Style 1 Layout 2OXIIMPORTdividerOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)| oxi-addons-divider |4|groove|#a3f01f|oxi-addons-divider-size|220|220|220| oxi-addons-divider-align |center|oxi-addons-divider-animation||1|0//|oxi-addons-divider-padding-top |2|2|2|oxi-addons-divider-padding-bottom |2|2|2|oxi-addons-divider-padding-left |2|2|2|oxi-addons-divider-padding-right |2|2|2|||#|| oxi_addons-divider-id ||#||||#|| ||#||',
    'style 2 layout 1OXIIMPORTdividerOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-color |rgba(255, 255, 255, 1)| oxi-addons-divider |2|solid|#a508cc|oxi-addons-divider-size|250|220|220| oxi-addons-divider-align |center|oxi-addons-divider-animation||2|0//infinite|oxi-addons-divider-padding-top |2|2|2|oxi-addons-divider-padding-bottom |2|2|2|oxi-addons-divider-padding-left |2|2|2|oxi-addons-divider-padding-right |2|2|2|oxi-addons-divider-font-size|20|20|20| oxi-addons-divider-font-color |#830c9e|oxi-addons-divider-font-position|50|50|50|oxi-addons-divider-font-padding-top |5|5|5|oxi-addons-divider-font-padding-bottom |5|5|5|oxi-addons-divider-font-padding-left |5|5|5|oxi-addons-divider-font-padding-right |5|5|5|||#|| oxi_addons-divider-id ||#||||#||||#|| oxi_addons-divider-icon ||#||fas fa-star||#|| ||#||',
    'Style 2 Layout 2OXIIMPORTdividerOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)| oxi-addons-divider |2|solid|#eb0909|oxi-addons-divider-size|230|230|230| oxi-addons-divider-align |center|oxi-addons-divider-animation||2|0//infinite|oxi-addons-divider-padding-top |2|2|2|oxi-addons-divider-padding-bottom |2|2|2|oxi-addons-divider-padding-left |2|2|2|oxi-addons-divider-padding-right |2|2|2|oxi-addons-divider-font-size|22|22|22| oxi-addons-divider-font-color |#eb0909|oxi-addons-divider-font-position|51|51|51|oxi-addons-divider-font-padding-top |5|5|5|oxi-addons-divider-font-padding-bottom |5|5|5|oxi-addons-divider-font-padding-left |5|5|5|oxi-addons-divider-font-padding-right |5|5|5|||#|| oxi_addons-divider-id ||#||||#||||#|| oxi_addons-divider-icon ||#||fas fa-smile||#|| ||#||',
    'style 3OXIIMPORTdividerOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-color |rgba(255, 255, 255, 1)| oxi-addons-divider |4|double|#d6a41a|oxi-addons-divider-size|350|220|220| oxi-addons-divider-align |center|oxi-addons-divider-animation||1|0//|oxi-addons-divider-padding-top |2|2|2|oxi-addons-divider-padding-bottom |2|2|2|oxi-addons-divider-padding-left |2|2|2|oxi-addons-divider-padding-right |2|2|2|oxi-addons-divider-font-size|25|20|20| oxi-addons-divider-font-color |#d6a41a|oxi-addons-divider-font-position|50|50|50|oxi-addons-divider-font-padding-top |20|7|7|oxi-addons-divider-font-padding-bottom |20|7|7|oxi-addons-divider-font-padding-left |20|7|7|oxi-addons-divider-font-padding-right |20|7|7| oxi-addons-divider-border |4|double|#d6a41a| oxi-addons-divider-border-radius |50|||#|| oxi_addons-divider-id ||#||||#||||#|| oxi_addons-divider-icon ||#||fas fa-bullseye||#|| ||#||',
    'Style 4OXIIMPORTdividerOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)| oxi-addons-divider |4|double|#eb15a4|oxi-addons-divider-size|300|300|300| oxi-addons-divider-align |center|oxi-addons-divider-animation||2:false:false:500:10:0.2|0//infinite|oxi-addons-divider-padding-top |4|4|4|oxi-addons-divider-padding-bottom |4|4|4|oxi-addons-divider-padding-left |4|4|4|oxi-addons-divider-padding-right |4|4|4|oxi-addons-divider-font-size|25|25|25| oxi-addons-divider-font-color |#eb15a4|oxi-addons-divider-font-position|50|50|50|oxi-addons-divider-font-padding-top |5|5|5|oxi-addons-divider-font-padding-bottom |5|5|5|oxi-addons-divider-font-padding-left |5|5|5|oxi-addons-divider-font-padding-right |5|5|5|||||||oxi-addons-divider-family |Open+Sans|400|oxi-addons-divider-style |normal:1|center:0()0()0()rgba(186, 186, 186, 1):|||#|| oxi_addons-divider-id ||#||||#||||#|| oxi_addons-divider-text ||#||Shortcode||#|| ||#||',
    'Style 5OXIIMPORTdividerOXIIMPORTstyle-5OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)| oxi-addons-divider |4|double|#1ab827|oxi-addons-divider-size|350|350|350| oxi-addons-divider-align |center|oxi-addons-divider-animation||1:false:false:500:10:0.2|0//|oxi-addons-divider-padding-top |2|2|2|oxi-addons-divider-padding-bottom |2|2|2|oxi-addons-divider-padding-left |2|2|2|oxi-addons-divider-padding-right |2|2|2|oxi-addons-divider-font-size|20|20|20| oxi-addons-divider-font-color |#1ab827|oxi-addons-divider-font-position|50|50|50|oxi-addons-divider-font-padding-top |5|5|5|oxi-addons-divider-font-padding-bottom |5|5|5|oxi-addons-divider-font-padding-left |15|5|5|oxi-addons-divider-font-padding-right |15|5|5| oxi-addons-divider-border |4|double|#1ab827| oxi-addons-divider-border-radius |50|oxi-addons-divider-family |Open+Sans|300|oxi-addons-divider-style |normal:1|center:0()0()0()#ffffff:|||#|| oxi_addons-divider-id ||#||||#||||#|| oxi_addons-divider-text ||#||Shortcode||#|| ||#||',
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










