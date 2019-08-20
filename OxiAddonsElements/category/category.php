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
$freeimport = array('style-1');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = Array(
    'Simple Category OXIIMPORTcategoryOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG ||OxiAddcategory-rows |oxi-addons-lg-col-4|oxi-addons-md-col-2|oxi-addons-xs-col-1|cat-parent |All|oxi_cat-M-P-top |10|10|10|oxi_cat-M-P-bottom |10|10|10|oxi_cat-M-P-left |10|10|10|oxi_cat-M-P-right |10|10|10|oxi_cat-D-P-top |10|10|10|oxi_cat-D-P-bottom |10|10|10|oxi_cat-D-P-left |10|10|10|oxi_cat-D-P-right |10|10|10|oxi_cat-font-size|18|18|18|oxi_cat-width-mode |dynamic|oxi_cat-width|120|120|120|oxi_cat-C |#8d8d8d|oxi_cat-BG |rgba(71,201,229,0.00)|oxi_cat-B-top |1|1|1|oxi_cat-B-bottom |1|1|1|oxi_cat-B-left |1|1|1|oxi_cat-B-right |1|1|1|OxiAddonsBanner-B |solid|#e6e6e6||oxi_cat-F-family |0|200| oxi_cat-F-style |normal|center|oxi_cat-BR-top |50|50|50|oxi_cat-BR-bottom |50|50|50|oxi_cat-BR-left |50|50|50|oxi_cat-BR-right |50|50|50|oxi_cat-P-top |6|6|6|oxi_cat-P-bottom |6|6|6|oxi_cat-P-left |18|18|18|oxi_cat-P-right |18|18|18|oxi_cat-M-top |8|8|8|oxi_cat-M-bottom |8|8|8|oxi_cat-M-left |8|8|8|oxi_cat-M-right |8|8|8|oxi_cat-BS |rgba(138, 138, 138, 1)|0|0|0|0|oxi_cat-H-C |#ffffff|oxi_cat-H-BG |rgba(71,201,229,1.00)|oxi_cat-B-top |1|1|1|oxi_cat-B-bottom |1|1|1|oxi_cat-B-left |1|1|1|oxi_cat-B-right |1|1|1|OxiAddonsBanner-H-B |solid|#47c9e5||oxi_cat-H-BR-top |20|20|20|oxi_cat-H-BR-bottom |20|20|20|oxi_cat-H-BR-left |20|20|20|oxi_cat-H-BR-right |20|20|20|oxi_cat-H-BS |rgba(69, 200, 230, 0.55)|0|10|25|0|||#||OxiAddPR-TC-Serial-cat||#||All{{}}Art{{}}Commercial{{}}Design{{}}Misc{{}}Mock-up{{}}Photography{{}}Tech||#||||#|| ||#||',
    'Multi Width OXIIMPORTcategoryOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG ||OxiAddcategory-rows |oxi-addons-lg-col-4|oxi-addons-md-col-2|oxi-addons-xs-col-1|cat-parent |All|oxi_cat-M-P-top |5|5|5|oxi_cat-M-P-bottom |5|5|5|oxi_cat-M-P-left |5|5|5|oxi_cat-M-P-right |5|5|5|oxi_cat-D-P-top |0|0|0|oxi_cat-D-P-bottom |0|0|0|oxi_cat-D-P-left |0|0|0|oxi_cat-D-P-right |0|0|0|oxi_cat-font-size|18|18|18|oxi_cat-width-mode |dynamic|oxi_cat-width|120|120|120|oxi_cat-C |#8d8d8d|oxi_cat-BG |rgba(71,201,229,0.00)|oxi_cat-B-top |1|1|1|oxi_cat-B-bottom |1|1|1|oxi_cat-B-left |1|1|1|oxi_cat-B-right |1|1|1|OxiAddonsBanner-B |solid|#e6e6e6||oxi_cat-F-family |0|200|oxi_cat-F-style |normal:1.3|center:0()0()0()#ffffff:|oxi_cat-BR-top |50|50|50|oxi_cat-BR-bottom |50|50|50|oxi_cat-BR-left |50|50|50|oxi_cat-BR-right |50|50|50|oxi_cat-P-top |6|6|6|oxi_cat-P-bottom |6|6|6|oxi_cat-P-left |18|18|18|oxi_cat-P-right |18|18|18|oxi_cat-M-top |8|8|8|oxi_cat-M-bottom |8|8|8|oxi_cat-M-left |8|8|8|oxi_cat-M-right |8|8|8|oxi_cat-BS |rgba(138, 138, 138, 1)|0|0|0|0|oxi_cat-H-C |#ffffff|oxi_cat-H-BG |rgba(71,201,229,1.00)|oxi_cat-B-top |1|1|1|oxi_cat-B-bottom |1|1|1|oxi_cat-B-left |1|1|1|oxi_cat-B-right |1|1|1|OxiAddonsBanner-H-B |solid|#47c9e5||oxi_cat-H-BR-top |20|20|20|oxi_cat-H-BR-bottom |20|20|20|oxi_cat-H-BR-left |20|20|20|oxi_cat-H-BR-right |20|20|20|oxi_cat-H-BS |rgba(69, 200, 230, 0.55)|0|10|25|0|||#||OxiAddPR-TC-Serial-cat||#||All{{}}Art{{}}Commercial{{}}Design{{}}Misc{{}}Mock-up{{}}Photography{{}}Tech||#||||#|| ||#||',
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

