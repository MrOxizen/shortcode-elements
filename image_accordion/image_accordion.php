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
                'style 01OXIIMPORTimage_accordionOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageAccordion-G-W |1000|1000|1000|OxiAddonsImageAccordion-G-P-top |0|0|0|OxiAddonsImageAccordion-G-P-bottom |0|0|0|OxiAddonsImageAccordion-G-P-left |0|0|0|OxiAddonsImageAccordion-G-P-right |0|0|0| OxiAddonsImageAccordion-overlay |rgba(32,33,33,0.37)| OxiAddonsImageAccordion-position |center| OxiAddonsImageAccordion-style |style_1|OxiAddonsImageAccordion-H-FS |18|18|18|OxiAddonsImageAccordion-H-F-family |Oswald|100|OxiAddonsImageAccordion-H-F-style |normal:1.3|center:0()0()0()#ffffff| OxiAddonsImageAccordion-H-C |#ffffff|OxiAddonsImageAccordion-H-P-top |0|0|0|OxiAddonsImageAccordion-H-P-bottom |0|0|0|OxiAddonsImageAccordion-H-P-left |0|0|0|OxiAddonsImageAccordion-H-P-right |0|0|0|OxiAddonsImageAccordion-SD-FS |18|18|18|OxiAddonsImageAccordion-SD-F-family |Oswald|100|OxiAddonsImageAccordion-SD-F-style |normal:1.3|center:0()0()0()#ffffff| OxiAddonsImageAccordion-SD-C |#ffffff|OxiAddonsImageAccordion-SD-P-top |0|0|0|OxiAddonsImageAccordion-SD-P-bottom |0|0|0|OxiAddonsImageAccordion-SD-P-left |0|0|0|OxiAddonsImageAccordion-SD-P-right |0|0|0| OxiAddonsBanner-link-Tab ||OxiAddonsImageAccordion-G-H |300|300|300|||#|||##OXISTYLE##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-210019-1.png||#|| OxiAddonsImageAccordion-H-TB ||#||Accordion Item Title||#|| OxiAddonsImageAccordion-SD-TA ||#||Accordion Short Details goes here||#|| OxiAddonsImageAccordion-link ||#||#||#|| ||#||##OXIDATA##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-210019.png||#|| OxiAddonsImageAccordion-H-TB ||#||Accordion Item Title||#|| OxiAddonsImageAccordion-SD-TA ||#||Accordion Short Details Goes Here||#|| OxiAddonsImageAccordion-link ||#||#||#|| ||#||##OXIDATA##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-210019-2.png||#|| OxiAddonsImageAccordion-H-TB ||#||Accordion Item Title||#|| OxiAddonsImageAccordion-SD-TA ||#||Accordion Short Details goes here||#|| OxiAddonsImageAccordion-link ||#||#||#|| ||#||##OXIDATA##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-210019-3.png||#|| OxiAddonsImageAccordion-H-TB ||#||Accordion Item Title||#|| OxiAddonsImageAccordion-SD-TA ||#||Accordion Short Details goes here||#|| OxiAddonsImageAccordion-link ||#||#||#|| ||#||##OXIDATA##',
                'style 02OXIIMPORTimage_accordionOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageAccordion-G-W |1000|1000|1000|OxiAddonsImageAccordion-G-P-top |0|0|0|OxiAddonsImageAccordion-G-P-bottom |0|0|0|OxiAddonsImageAccordion-G-P-left |0|0|0|OxiAddonsImageAccordion-G-P-right |0|0|0| OxiAddonsImageAccordion-overlay |rgba(32,33,33,0.37)| OxiAddonsImageAccordion-position |center| OxiAddonsImageAccordion-style |style_4|OxiAddonsImageAccordion-H-FS |32|32|32|OxiAddonsImageAccordion-H-F-family |Bree Serif|100|OxiAddonsImageAccordion-H-F-style |normal:1.3|center:0()0()0()#ffffff| OxiAddonsImageAccordion-H-C |#ffffff|OxiAddonsImageAccordion-H-P-top |0|0|0|OxiAddonsImageAccordion-H-P-bottom |0|0|0|OxiAddonsImageAccordion-H-P-left |0|0|0|OxiAddonsImageAccordion-H-P-right |0|0|0|OxiAddonsImageAccordion-SD-FS |18|18|18|OxiAddonsImageAccordion-SD-F-family |Bree Serif|100|OxiAddonsImageAccordion-SD-F-style |normal:1.3|center:0()0()0()#ffffff| OxiAddonsImageAccordion-SD-C |#ffffff|OxiAddonsImageAccordion-SD-P-top |0|0|0|OxiAddonsImageAccordion-SD-P-bottom |0|0|0|OxiAddonsImageAccordion-SD-P-left |0|0|0|OxiAddonsImageAccordion-SD-P-right |0|0|0| OxiAddonsBanner-link-Tab ||OxiAddonsImageAccordion-G-H |500|500|500|||#|||##OXISTYLE##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/2.jpg||#|| OxiAddonsImageAccordion-H-TB ||#||Accordion Item Title||#|| OxiAddonsImageAccordion-SD-TA ||#||Accordion Short Details goes here||#|| OxiAddonsImageAccordion-link ||#||#||#|| ||#||##OXIDATA##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/1.jpg||#|| OxiAddonsImageAccordion-H-TB ||#||Accordion Item Title||#|| OxiAddonsImageAccordion-SD-TA ||#||Accordion Short Details Goes Here||#|| OxiAddonsImageAccordion-link ||#||#||#|| ||#||##OXIDATA##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/3.jpg||#|| OxiAddonsImageAccordion-H-TB ||#||Accordion Item Title||#|| OxiAddonsImageAccordion-SD-TA ||#||Accordion Short Details goes here||#|| OxiAddonsImageAccordion-link ||#||#||#|| ||#||##OXIDATA##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/tech-image10.jpg||#|| OxiAddonsImageAccordion-H-TB ||#||Accordion Item Title||#|| OxiAddonsImageAccordion-SD-TA ||#||Accordion Short Details goes here||#|| OxiAddonsImageAccordion-link ||#||#||#|| ||#||##OXIDATA##',
                'style 03OXIIMPORTimage_accordionOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageAccordion-G-W |1000|1000|1000|OxiAddonsImageAccordion-G-H |600|600|600|OxiAddonsImageAccordion-G-P-top |0|0|0|OxiAddonsImageAccordion-G-P-bottom |0|0|0|OxiAddonsImageAccordion-G-P-left |0|0|0|OxiAddonsImageAccordion-G-P-right |0|0|0|OxiAddonsImageAccordion-H-FS |32|32|32|OxiAddonsImageAccordion-H-F-family |Bree Serif|100|OxiAddonsImageAccordion-H-F-style |normal:1.3|center:0()0()0()#ffffff| OxiAddonsImageAccordion-H-C |#ffffff|OxiAddonsImageAccordion-H-P-top |0|0|0|OxiAddonsImageAccordion-H-P-bottom |0|0|0|OxiAddonsImageAccordion-H-P-left |0|0|0|OxiAddonsImageAccordion-H-P-right |0|0|0|||#|||##OXISTYLE##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-712618-1.png||#|| OxiAddonsImageAccordion-IMG-one ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-712618.png||#|| OxiAddonsImageAccordion-H-TB ||#||Image Accordion||#|| ||#||##OXIDATA##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-1399287-1.png||#|| OxiAddonsImageAccordion-IMG-one ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-1399287.png||#|| OxiAddonsImageAccordion-H-TB ||#||Accordion Heading||#|| ||#||##OXIDATA##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-712618-2.png||#|| OxiAddonsImageAccordion-IMG-one ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-712618-3.png||#|| OxiAddonsImageAccordion-H-TB ||#||BMW Car||#|| ||#||##OXIDATA##OxiAddonsImageAccordion-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-210019-2.png||#|| OxiAddonsImageAccordion-IMG-one ||#||https://www.oxilab.org/wp-content/uploads/2019/04/pexels-photo-210019-3.png||#|| OxiAddonsImageAccordion-H-TB ||#||New Bike||#|| ||#||##OXIDATA##',
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

