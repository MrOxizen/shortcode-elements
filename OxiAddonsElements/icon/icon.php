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
$freeimport = array('style-1', 'style-2', 'style-3');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = array(
    'Style 1 Demo 1OXIIMPORTiconOXIIMPORTstyle-1OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |40|40|40| oxi_addons-icon-margin-top |5|5|5| oxi_addons-icon-margin-left |5|5|5| oxi_addons-icon-width |80|80|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |linear-gradient(45deg, rgba(204,0,153,1.00) 0%,rgba(232,51,184,1.00) 100%)|oxi_addons-icon-animation||0.5:false:false:500:10:0.2|0.5//| oxi-addons-icon-border-radius |80|oxi-addons-preview-BG |#ffffff|OxiADDC-Item |oxi-addons-lg-col-3|oxi-addons-md-col-3|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##||#|| ||#||oxi_addons-icon-class ||#||fas fa-cloud-sun-rain||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-seedling||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-motorcycle||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##',
    'Style 1 Demo 2OXIIMPORTiconOXIIMPORTstyle-1OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |40|40|40| oxi_addons-icon-margin-top |5|5|5| oxi_addons-icon-margin-left |5|5|5| oxi_addons-icon-width |80|80|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |linear-gradient(45deg, rgba(78,0,224,1.00) 0%,rgba(118,65,217,1.00) 100%)|oxi_addons-icon-animation||0.5:false:false:500:10:0.2|0.5//| oxi-addons-icon-border-radius |50|oxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiADDC-Item |oxi-addons-lg-col-3|oxi-addons-md-col-3|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##||#|| ||#||oxi_addons-icon-class ||#||fab fa-jedi-order||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-anchor||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-fire-extinguisher||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##',
    'Style 2OXIIMPORTiconOXIIMPORTstyle-2OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |40|40|40| oxi_addons-icon-margin-top |12|12|12| oxi_addons-icon-margin-left |10|10|10| oxi_addons-icon-width |80|80|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(247,116,10,1.00)|oxi_addons-icon-animation||0.5:false:false:500:10:0.2|0.5//| oxi-addons-icon-border-radius |50|oxi-addons-preview-BG |rgba(255,255,255,1.00)| oxi_addons-icon-border-color |#f7740a| oxi_addons-icon-border-size |4|4|4| oxi_addons-icon-padding-top |5|5|5|OxiADDC-Item |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##||#|| ||#||oxi_addons-icon-class ||#||fas fa-grin-hearts||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-charging-station||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-cloud-sun-rain||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##',
    'Style 3OXIIMPORTiconOXIIMPORTstyle-3OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |40|40|40| oxi_addons-icon-margin-top |5|5|5| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |80|80|80| oxi_addons-icon-color |#41ab6b| ||oxi_addons-icon-animation||0.5:false:false:500:10:0.2|0.5//| oxi-addons-icon-border-radius |80|oxi-addons-preview-BG |#ffffff| oxi_addons-icon-border-color |#41ab6b| oxi_addons-icon-border-size |4|4|4|OxiADDC-Item |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##||#|| ||#||oxi_addons-icon-class ||#||fas fa-cloud-sun-rain||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-seedling||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-charging-station||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##',
    'Style 4OXIIMPORTiconOXIIMPORTstyle-4OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |40|40|40| oxi_addons-icon-margin-top |5|5|5| oxi_addons-icon-margin-left |0|0|0| oxi_addons-icon-width |80|80|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(203,158,240,1.00)|oxi_addons-icon-animation||0.5:false:false:500:10:0.2|0.5//| oxi-addons-icon-border-radius |80|oxi-addons-preview-BG |#ffffff| oxi_addons-icon-border-color |#8d4bc2| oxi_addons-icon-border-size |8|8|8|OxiADDC-Item |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##||#|| ||#||oxi_addons-icon-class ||#||fas fa-cloud-sun-rain||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-motorcycle||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-grin-hearts||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##',
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
