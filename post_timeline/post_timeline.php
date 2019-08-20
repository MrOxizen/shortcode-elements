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

$file = array(
    'Style 1OXIIMPORTpost_timelineOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)||||| OxiAddonsDP-show-image |show| OxiAddonsDP-show-title |show| OxiAddonsDP-show-excerpt |show| OxiAddonsDP-excerpt-word |20| OxiAddonsDP-show-meta |show| OxiAddonsDP-meta-position |footer| OxiAddonsDP-Post-S-BG |rgba(255, 255, 255, 1)|OxiAddonsDP-Post-S-B |5|solid|| OxiAddonsDP-Post-S-BC |#58bab0|OxiAddonsDP-Post-S-BR-top |0|0|0|OxiAddonsDP-Post-S-BR-bottom |0|0|0|OxiAddonsDP-Post-S-BR-left |0|0|0|OxiAddonsDP-Post-S-BR-right |0|0|0|OxiAddonsDP-Post-S-P-top |10|10|10|OxiAddonsDP-Post-S-P-bottom |10|10|10|OxiAddonsDP-Post-S-P-left |10|10|10|OxiAddonsDP-Post-S-P-right |10|10|10|OxiAddonsDP-Post-S-M-top |20|10|5|OxiAddonsDP-Post-S-M-bottom |20|10|5|OxiAddonsDP-Post-S-M-left |35|10|5|OxiAddonsDP-Post-S-M-right |35|10|5|OxiAddonsDP-box-shadow |rgba(232, 232, 232, 1):|0|1|2|1|OxiAddonsDP-animation||.5:false:false:500:10:0.2|.5//|OxiAddonsDP-title-FS|16|16|16| OxiAddonsDP-title-C |#525252|OxiAddonsDP-title-F-family |Roboto|400|OxiAddonsDP-title-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsDP-title-P-top |5|5|5|OxiAddonsDP-title-P-bottom |10|10|10|OxiAddonsDP-title-P-left |5|5|5|OxiAddonsDP-title-P-right |5|5|5|OxiAddonsDP-excerpt-FS|14|14|14| OxiAddonsDP-excerpt-C |#9c9c9c|OxiAddonsDP-excerpt-F-family |Poppins|400|OxiAddonsDP-excerpt-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsDP-excerpt-P-top |5|5|5|OxiAddonsDP-excerpt-P-bottom |10|10|10|OxiAddonsDP-excerpt-P-left |5|5|5|OxiAddonsDP-excerpt-P-right |5|5|5|||OxiAddonsDP-Meta-S-F-family |Poppins|100|OxiAddonsDP-Meta-S-F-style |normal:1|left:0()0()0()#ffffff:|OxiAddonsDP-Meta-S-P-top |10|10|10|OxiAddonsDP-Meta-S-P-bottom |10|10|10|OxiAddonsDP-Meta-S-P-left |10|10|10|OxiAddonsDP-Meta-S-P-right |10|10|10|OxiAddonsDP-Meta-N-FS|14|14|14| OxiAddonsDP-Meta-N-C |#58bab0| OxiAddonsDP-Meta-NH-C |#4de3d9|OxiAddonsDP-Meta-D-FS|12|12|12| OxiAddonsDP-Meta-D-C |#b0b0b0|OxiAddonsDP-Meta-IMG-W|50|50|50|OxiAddonsDP-Meta-IMG-H|50|50|50|OxiAddonsDP-Meta-IMG-BR-top |100|100|100|OxiAddonsDP-Meta-IMG-BR-bottom |100|100|100|OxiAddonsDP-Meta-IMG-BR-left |100|100|100|OxiAddonsDP-Meta-IMG-BR-right |100|100|100| OxiAddonsDP-thumb-type |true| OxiAddonsDP-title-Hover-C |#43b6d9| OxiAddonsDP-show-tab ||OxiAddonsDP-Meta-name-p-top |5|5|5|OxiAddonsDP-Meta-name-p-bottom |0|0|0|OxiAddonsDP-Meta-name-p-left |5|5|5|OxiAddonsDP-Meta-name-p-right |5|5|5|OxiAddonsDP-Meta-date-p-top |0|0|0|OxiAddonsDP-Meta-date-p-bottom |5|5|5|OxiAddonsDP-Meta-date-p-left |5|5|5|OxiAddonsDP-Meta-date-p-right |5|5|5| OxiAddonsDP-thumb-over-BG |rgba(59, 59, 59, 0.7)| OxiAddonsDP-thumb-over-icon-color |#ffffff|OxiAddonsDP-thumb-over-icon-size|22|22|22| OxiAddonsDP-thumb |60| OxiAddonsDP-B-Tab |_blank|OxiAddonsDP-B-P-top |6|6|6|OxiAddonsDP-B-P-bottom |6|6|6|OxiAddonsDP-B-P-left |15|15|15|OxiAddonsDP-B-P-right |15|15|15|OxiAddonsDP-B-M-top |5|5|5|OxiAddonsDP-B-M-bottom |5|5|5|OxiAddonsDP-B-M-left |5|5|5|OxiAddonsDP-B-M-right |5|5|5|OxiAddonsDP-B-FS |14|14|14| OxiAddonsDP-B-TC |#ffffff| OxiAddonsDP-B-BG |rgba(88, 186, 176, 1)|OxiAddonsDP-B-B |0|none|| OxiAddonsDP-B-BC |#dedede|OxiAddonsDP-B-F-family |Open Sans|400|OxiAddonsDP-B-F-style |normal|::|OxiAddonsDP-B-BR-top |50|50|50|OxiAddonsDP-B-BR-bottom |50|50|50|OxiAddonsDP-B-BR-left |50|50|50|OxiAddonsDP-B-BR-right |50|50|50|OxiAddonsDP-B-BS |rgba(87, 87, 87, 0.24):|0|5|10|-3|OxiAddonsDP-B-HBS |rgba(66, 66, 66, 0.5):|0|3|11|-2| OxiAddonsDP-B-HTC |#ffffff| OxiAddonsDP-B-HBG |rgba(55, 166, 159, 1)| OxiAddonsDP-B-HBC |#5c4444| OxiAddonsDP-B-BT-show |show| OxiAddonsDP-B-BT-PS |left| OxiAddonsDP-title-Tag |h1| OxiAddonsDP-arrow-size |15| OxiAddonsDP-bullet-PS |100| OxiAddonsDP-bullet-BG |rgba(42, 161, 153, 1)| OxiAddonsDP-bullet-W |20|OxiAddonsDP-bullet-BR-top |50|50|50|OxiAddonsDP-bullet-BR-bottom |50|50|50|OxiAddonsDP-bullet-BR-left |50|50|50|OxiAddonsDP-bullet-BR-right |50|50|50|OxiAddonsDP-bullet-box-shadow |rgba(88, 186, 179, 0.56):|0|0|0|3| OxiAddonsDP-Divider-BG |rgba(88, 186, 176, 1)| OxiAddonsDP-Divider-W |2||||OxiAddonsDP-post-type||#||post||#||OxiAddonsDP-post-author||#||1||#||OxiAddonsDP-category||#||||#||OxiAddonsDP-tags||#||||#||OxiAddonsDP-Exclude||#||||#||OxiAddonsDP-post-per-page ||#||2||#||OxiAddonsDP-post-offset ||#||||#||OxiAddonsDP-post-order-by ||#||ID||#||OxiAddonsDP-post-order-type ||#||asc||#||OxiAddonsDP-include||#||||#||OxiAddonsDP-post-img-size ||#||medium||#||OxiAddonsDP-layout-type ||#||||#|| ||#||||#||OxiAddonsDP-thumb-over-icon ||#||fas fa-arrow-right||#||OxiAddonsDP-thumb-over-animation ||#||left||#||OxiAddonsDP-Avatars||#||custom||#||OxiAddonsDP-image-source ||#||http://localhost/wordpress/wp-content/uploads/2019/06/img_avatar-e1560839893636.png||#|| OxiAddonsDP-B-BT ||#||Read more..||#|| ||#||',
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
           </div>'; ?>

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
                } ?>
            </div>
        </div>
    </div>

<?php
} else {
    $data = $wpdb->get_results("SELECT * FROM $table_name WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A); ?>
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
                } ?>
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
