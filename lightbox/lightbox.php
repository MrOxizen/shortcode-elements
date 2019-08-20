
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
$file = $file = Array(
    array(
        'style1simpleimage',
        'ID to Image LightBoxOXIIMPORTlightboxOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-color|rgba(255, 255, 255, 1)||||| OxiAddLightbox-full-bg |rgba(28, 28, 28, 0.67)|||||||||||||||||||||||||OxiAddLightbox-box-shadow |rgba(105, 105, 105, 0.66)|2|2|6|2| OxiAddLightbox-icon-color |#baabab| OxiAddLightbox-z-index |9999| OxiAddLightbox-icon-color |#8b219e|||#|| ||#||OxiAddLightbox-class ||#||#style1simpleimage||#||OxiAddLightbox-image ||#||https://www.oxilab.org/wp-content/uploads/2018/12/Girl-with-guitar-nature.jpg||#|||',
    ),
    array(
        's2s3',
        'ID to Video LightboxOXIIMPORTlightboxOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-color|rgba(255, 255, 255, 1)||||| OxiAddLightbox-full-bg |rgba(77, 77, 77, 0.67)|||||||||||||||||||||||||OxiAddLightbox-box-shadow |rgba(138, 138, 138, 0.68)|3|3|7|3| OxiAddLightbox-icon-color |#ad5353| OxiAddLightbox-z-index |9999| OxiAddLightbox-icon-color |#300d0d|||#|| ||#||OxiAddLightbox-class ||#||#s2s3||#||OxiAddLightbox-video ||#||https://www.youtube.com/watch?v=1-xGerv5FOk||#|||',
    ),
    array(
        'oxiiframedemo',
        'ID to IFrameOXIIMPORTlightboxOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-color|rgba(255, 255, 255, 1)||||| OxiAddLightbox-full-bg |rgba(29, 237, 206, 0.5)|||||||||||||||||||||||||OxiAddLightbox-box-shadow |rgba(194, 194, 194, 0.63)|2|2|8|2| OxiAddLightbox-icon-color |#ccc6c6| OxiAddLightbox-z-index |9999| OxiAddLightbox-icon-color |#cc9f9f|||#|| ||#||OxiAddLightbox-class ||#||#oxiiframedemo||#||OxiAddLightbox-link ||#||https://imagedesign.pro/||#|||'
    ),
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
                    $expludedata = explode('OXIIMPORT', $value[1]);
                    $datatrue = '';
                    foreach ($importstyle as $vals) {
                        if ($vals['name'] == $expludedata[2]) {
                            $datatrue = 'true';
                        }
                    }
                    if ($datatrue != 'true') {
                        $number = rand();
                        echo '<div class="oxi-addons-col-1 oxiequalHeight"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo OxiDataAdminShortcode($oxitype, $value[1]);
                        echo '<button type="button" class="btn btn-info" id="' . $value[0] . '">';
                        echo OxiDataAdminShortcodeName($value[1]);
                        echo '</button>';
                        echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                        echo OxiDataAdminShortcodeName($value[1]);
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
                    $expludedata = explode('OXIIMPORT', $value[1]);
                    $datatrue = '';
                    foreach ($importstyle as $vals) {
                        if ($vals['name'] == $expludedata[2]) {
                            $datatrue = 'true';
                        }
                    }
                    if ($datatrue == 'true') {
                        $number = rand();
                        echo '<div class="oxi-addons-col-1 oxiequalHeight" id="' . $expludedata[2] . '"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo OxiDataAdminShortcode($oxitype, $value[1]);
                        echo '<button type="button" class="btn btn-info" id="' . $value[0] . '">';
                        echo OxiDataAdminShortcodeName($value[1]);
                        echo '</button>';
                        echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                        echo OxiDataAdminShortcodeName($value[1]);
                        echo '       </div>';
                        echo OxiDataAdminShortcodeControl($number, $value[1], $freeimport);
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