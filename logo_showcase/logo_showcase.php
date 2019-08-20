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
    'Style 1OXIIMPORTlogo_showcaseOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG ||OxiAddonsLogoShowcase-rows |oxi-addons-lg-col-4|oxi-addons-md-col-2|oxi-addons-xs-col-1|OxiAddonsLogoShowcase-width|200|200|200|OxiAddonsLogoShowcase-Height|80|80|80|OxiAddonsLogoShowcase-padding-top |15|15|15|OxiAddonsLogoShowcase-padding-bottom |15|15|15|OxiAddonsLogoShowcase-padding-left |15|15|15|OxiAddonsLogoShowcase-padding-right |15|15|15|OxiAddonsLogoShowcase-margin-top |0|0|0|OxiAddonsLogoShowcase-margin-bottom |0|0|0|OxiAddonsLogoShowcase-margin-left |0|0|0|OxiAddonsLogoShowcase-margin-right |0|0|0| OxiAddonsLogoShowcase-animation||:false:false:500:10:0.2|//|| oxi_addons-icon-link-opening |_blank|OxiAddonsTestimonial-BS |rgba(189, 189, 189, 0)|0|5|10|0||##OXISTYLE##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/02/524px-JQuery_logo.svg_-200x49.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/02/elementor-logo-e1526055782474-200x68.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/02/logo2x-200x42.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/02/bb-logo-2x-200x42.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##',
    'Style 2OXIIMPORTlogo_showcaseOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG ||OxiAddonsLogoShowcase-rows |oxi-addons-lg-col-5|oxi-addons-md-col-2|oxi-addons-xs-col-1|OxiAddonsLogoShowcase-width|400|400|400|OxiAddonsLogoShowcase-Height|220|220|220|OxiAddonsLogoShowcase-padding-top |20|20|20|OxiAddonsLogoShowcase-padding-bottom |20|20|20|OxiAddonsLogoShowcase-padding-left |20|20|20|OxiAddonsLogoShowcase-padding-right |20|20|20|OxiAddonsLogoShowcase-margin-top |0|0|0|OxiAddonsLogoShowcase-margin-bottom |0|0|0|OxiAddonsLogoShowcase-margin-left |0|0|0|OxiAddonsLogoShowcase-margin-right |0|0|0| OxiAddonsLogoShowcase-animation||1:false:false:500:10:0.2|0.2//|| oxi_addons-icon-link-opening ||OxiAddonsTestimonial-BS |rgba(222, 222, 222, 1)|0|0|0|1| OxiAddonsLogoShowcase-grayscale |0| OxiAddonsLogoShowcase-hover-grayscale |100||##OXISTYLE##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/gieE69kzT.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/02/bb-logo-2x-200x42.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/111.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/avg-technologies-logo.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/02/elementor-logo-e1526055782474-200x68.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##',
    'Style 3OXIIMPORTlogo_showcaseOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG ||OxiAddonsLogoShowcase-rows |oxi-addons-lg-col-4|oxi-addons-md-col-2|oxi-addons-xs-col-1|OxiAddonsLogoShowcase-width|400|400|400|OxiAddonsLogoShowcase-Height|150|150|150|OxiAddonsLogoShowcase-padding-top |20|20|20|OxiAddonsLogoShowcase-padding-bottom |20|20|20|OxiAddonsLogoShowcase-padding-left |20|20|20|OxiAddonsLogoShowcase-padding-right |20|20|20|OxiAddonsLogoShowcase-margin-top |10|10|10|OxiAddonsLogoShowcase-margin-bottom |10|10|10|OxiAddonsLogoShowcase-margin-left |10|10|10|OxiAddonsLogoShowcase-margin-right |10|10|10| OxiAddonsLogoShowcase-animation||2:false:false:500:10:0.2|0.8//|| oxi_addons-icon-link-opening |_blank|OxiAddonsTestimonial-BS |rgba(191, 191, 191, 0.61)|1|2|5|1| OxiAddonsLogoShowcase-grayscale |10| OxiAddonsLogoShowcase-hover-grayscale |100| OxiAddonsLogoShowcase-scale |1| OxiAddonsLogoShowcase-scale-duration |0.2| OxiAddonsLogoShowcase-hover-scale |1.12| OxiAddlogoshowcase-bgcolor|rgba(255, 255, 255, 1)|OxiAddlogoshowcase-border-top |1|1|1|OxiAddlogoshowcase-border-bottom |1|1|1|OxiAddlogoshowcase-border-left |1|1|1|OxiAddlogoshowcase-border-right |1|1|1|OxiAddlogoshowcase-border |solid|#22631a||OxiAddlogoshowcase-radius-top |0|0|0|OxiAddlogoshowcase-radius-bottom |0|0|0|OxiAddlogoshowcase-radius-left |0|0|0|OxiAddlogoshowcase-radius-right |0|0|0||##OXISTYLE##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/02/524px-JQuery_logo.svg_-200x49.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/02/logo2x-200x42.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/02/Envato_Logo.svg_-200x38.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##OxiAddonsLogoShowcase-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/02/bb-logo-2x-200x42.png||#|| OxiAddonsLogoShowcase-BGL ||#||#||#|| ||#||##OXIDATA##'
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
