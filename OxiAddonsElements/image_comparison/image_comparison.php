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
$file = array(
                'Style 01OXIIMPORTimage_comparisonOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageComparison-G-W |800|800|800|OxiAddonsImageComparison-G-margin-top |0|0|0|OxiAddonsImageComparison-G-margin-bottom |0|0|0|OxiAddonsImageComparison-G-margin-left |0|0|0|OxiAddonsImageComparison-G-margin-right |0|0|0| OxiAddonsImageComparison-G-offset |0.5| OxiAddonsImageComparison-HS-C |#ffffff| OxiAddonsImageComparison-overlay |true| OxiAddonsImageComparison-move |false| OxiAddonsImageComparison-position |true| OxiAddonsImageComparison-hover |false|OxiAddonsImageComparison-B-FS |16|16|16| OxiAddonsImageComparison-B-TC |#ffffff| OxiAddonsImageComparison-B-BG |rgba(158,9,9,0.44)|OxiAddonsImageComparison-B-B |1|none|| OxiAddonsImageComparison-B-BC |#707070|OxiAddonsImageComparison-B-F-family |Crate+Round|100|OxiAddonsImageComparison-B-F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsImageComparison-B-BR-top |5|5|5|OxiAddonsImageComparison-B-BR-bottom |5|5|5|OxiAddonsImageComparison-B-BR-left |5|5|5|OxiAddonsImageComparison-B-BR-right |5|5|5|OxiAddonsImageComparison-B-P-top |5|5|5|OxiAddonsImageComparison-B-P-bottom |5|5|5|OxiAddonsImageComparison-B-P-left |15|15|15|OxiAddonsImageComparison-B-P-right |15|15|15|||#|| OxiAddonsImageComparison-B-text-before ||#||Before||#|| OxiAddonsImageComparison-B-text-after ||#||After||#|| OxiAddonsImageComparison-IMG-Before ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-210019-1.png||#|| OxiAddonsImageComparison-IMG-After ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-210019.png||#|| ||#||',
                'Style 02OXIIMPORTimage_comparisonOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageComparison-G-W |800|800|800|OxiAddonsImageComparison-G-margin-top |0|0|0|OxiAddonsImageComparison-G-margin-bottom |0|0|0|OxiAddonsImageComparison-G-margin-left |0|0|0|OxiAddonsImageComparison-G-margin-right |0|0|0| OxiAddonsImageComparison-G-offset |50| OxiAddonsImageComparison-HS-bg || OxiAddonsImageComparison-arrow-C |#5e5e5e|||||||OxiAddonsImageComparison-B-FS |16|16|16| OxiAddonsImageComparison-B-TC |#ffffff| OxiAddonsImageComparison-B-BG |rgba(255,64,96,0.78)|OxiAddonsImageComparison-B-B |1|none|| OxiAddonsImageComparison-B-BC |#707070|OxiAddonsImageComparison-B-F-family |Crate+Round|100|OxiAddonsImageComparison-B-F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsImageComparison-B-BR-top |2|2|2|OxiAddonsImageComparison-B-BR-bottom |2|2|2|OxiAddonsImageComparison-B-BR-left |2|2|2|OxiAddonsImageComparison-B-BR-right |2|2|2|OxiAddonsImageComparison-B-P-top |5|5|5|OxiAddonsImageComparison-B-P-bottom |5|5|5|OxiAddonsImageComparison-B-P-left |15|15|15|OxiAddonsImageComparison-B-P-right |15|15|15|OxiAddonsImageComparison-handle-width |50|50|50|OxiAddonsImageComparison-handle-height |50|50|50|OxiAddonsImageComparison-handle-radius-top |50|50|50|OxiAddonsImageComparison-handle-radius-bottom |50|50|50|OxiAddonsImageComparison-handle-radius-left |50|50|50|OxiAddonsImageComparison-handle-radius-right |50|50|50|||#|| OxiAddonsImageComparison-B-text-before ||#||Before||#|| OxiAddonsImageComparison-B-text-after ||#||After||#|| OxiAddonsImageComparison-IMG-Before ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-210019-3.png||#|| OxiAddonsImageComparison-IMG-After ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-210019-2.png||#|| ||#||',
                'Style 03OXIIMPORTimage_comparisonOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageComparison-G-W |600|600|600|OxiAddonsImageComparison-G-margin-top |0|0|0|OxiAddonsImageComparison-G-margin-bottom |0|0|0|OxiAddonsImageComparison-G-margin-left |0|0|0|OxiAddonsImageComparison-G-margin-right |0|0|0| OxiAddonsImageComparison-G-offset |50|||#|| OxiAddonsImageComparison-IMG-one ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-712618-3.png||#|| OxiAddonsImageComparison-IMG-two ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-712618-2.png||#|| OxiAddonsImageComparison-IMG-three ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-712618-1.png||#|| OxiAddonsImageComparison-IMG-four ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-712618.png||#|| ||#||',
                'Style 04OXIIMPORTimage_comparisonOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageComparison-G-W |800|800|800|OxiAddonsImageComparison-H-W |35|35|35|OxiAddonsImageComparison-G-margin-top |0|0|0|OxiAddonsImageComparison-G-margin-bottom |0|0|0|OxiAddonsImageComparison-G-margin-left |0|0|0|OxiAddonsImageComparison-G-margin-right |0|0|0|OxiAddonsImageComparison_H_transition |3.5|3.5|3.5|||#||oxi_addons_font_view_img ||#||https://images.pexels.com/photos/237018/pexels-photo-237018.jpeg?cs=srgb&dl=asphalt-beauty-colorful-237018.jpg&fm=jpg||#|| oxi_addons_hover_view_img ||#||https://s3-ap-northeast-1.amazonaws.com/cdn.travel-star.jp/production/imgs/images/000/200/994/original.?1548999161||#|| ||#||',
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

