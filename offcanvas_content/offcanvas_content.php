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
    'Button To OffCanvasOXIIMPORToffcanvas_contentOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG || OxiAddonsOC-SB-BG |rgba(255,255,255,1.00)|OxiAddonsOC-SB-W |350|350|350|OxiAddonsOC-SB-P-top |20|20|20|OxiAddonsOC-SB-P-bottom |20|20|20|OxiAddonsOC-SB-P-left |20|20|20|OxiAddonsOC-SB-P-right |20|20|20| OxiAddonsOC-FW-BG |rgba(0,0,0,0.41)|OxiAddonsOC-CI-FS |20|20|20| OxiAddonsOC-CI-C |#000000|OxiAddonsOC-CI-P-top |20|20|20|OxiAddonsOC-CI-P-bottom |20|20|20|OxiAddonsOC-CI-P-left |20|20|20|OxiAddonsOC-CI-P-right |20|20|20| OxiAddonsOC-C-TA |right| OxiAddonsOC-C-tab |left| |||||||||||||||| ||||||||||||||||OxiAddonsOC-B-FS |20|20|20| OxiAddonsOC-B-C |#000000| OxiAddonsOC-B-BG |rgba(240,9,9,0.00)| OxiAddonsOC-B-H-C |#ffffff| OxiAddonsOC-B-H-BG |rgba(252,0,0,1.00)|OxiAddonsOC-B-family |ABeeZee|100|OxiAddonsOC-B-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsOC-B-B |2|solid|| OxiAddonsOC-B-BC |#0534f2| OxiAddonsOC-B-BC-H |#09cf02|OxiAddonsOC-B-BR-top |50|50|50|OxiAddonsOC-B-BR-bottom |50|50|50|OxiAddonsOC-B-BR-left |50|50|50|OxiAddonsOC-B-BR-right |50|50|50|OxiAddonsOC-B-P-top |10|10|10|OxiAddonsOC-B-P-bottom |10|10|10|OxiAddonsOC-B-P-left |30|30|30|OxiAddonsOC-B-P-right |30|30|30|OxiAddonsOC-B-M-top |0|0|0|OxiAddonsOC-B-M-bottom |0|0|0|OxiAddonsOC-B-M-left |0|0|0|OxiAddonsOC-B-M-right |0|0|0|OxiAddonsOC-BI-FS |20|20|20| OxiAddonsOC-BI-C |#000000|OxiAddonsOC-BI-P-top |5|5|5|OxiAddonsOC-BI-P-bottom |5|5|5|OxiAddonsOC-BI-P-left |5|5|5|OxiAddonsOC-BI-P-right |5|5|5|||#|| OxiAddonsOC-BT-O ||#||Click Here||#|| OxiAddonsOC-BT-T ||#||fas fa-clock||#|| OxiAddonsOC-BT-TH ||#||Please Insert Shortcode Here and Make a Nice Design......||#|| OxiAddonsOC-CI ||#||fas fa-times||#|| ||#||',
    'Image To OffCanvasOXIIMPORToffcanvas_contentOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG || OxiAddonsOC-T-SB-BG |rgba(255,255,255,1.00)|OxiAddonsOC-T-SB-W |300|300|300|OxiAddonsOC-T-SB-P-top |20|20|20|OxiAddonsOC-T-SB-P-bottom |20|20|20|OxiAddonsOC-T-SB-P-left |20|20|20|OxiAddonsOC-T-SB-P-right |20|20|20| OxiAddonsOC-T-FW-BG |rgba(0,0,0,0.41)|OxiAddonsOC-T-CI-FS |20|20|20| OxiAddonsOC-T-CI-C |#000000|OxiAddonsOC-T-CI-P-top |20|20|20|OxiAddonsOC-T-CI-P-bottom |20|20|20|OxiAddonsOC-T-CI-P-left |20|20|20|OxiAddonsOC-T-CI-P-right |20|20|20| OxiAddonsOC-T-C-TA |right| OxiAddonsOC-T-C-tab |left| |||||||||||||||| ||||||||||||||||OxiAddonsOC-T-B-B |5|solid|| OxiAddonsOC-T-B-BC |#ffffff|OxiAddonsOC-T-B-BR-top |5|5|5|OxiAddonsOC-T-B-BR-bottom |5|5|5|OxiAddonsOC-T-B-BR-left |5|5|5|OxiAddonsOC-T-B-BR-right |5|5|5|OxiAddonsOC-T-B-P-top |0|0|0|OxiAddonsOC-T-B-P-bottom |0|0|0|OxiAddonsOC-T-B-P-left |0|0|0|OxiAddonsOC-T-B-P-right |0|0|0|OxiAddonsOC-T-B-M-top |0|0|0|OxiAddonsOC-T-B-M-bottom |0|0|0|OxiAddonsOC-T-B-M-left |0|0|0|OxiAddonsOC-T-B-M-right |0|0|0|OxiAddonsOC-T-CI-MW |300|300|300|OxiAddonsOC-T-B-Shadow |rgba(189, 174, 174, 1)|1|1|15|2|OxiAddonsOC-T-animation||2:false:false:500:10:0.2|0//|||#|| OxiAddonsOC-T-BT-O ||#||https://www.oxilab.org/wp-content/uploads/2019/03/arcteck.jpg||#|| OxiAddonsOC-T-BT-TH ||#||Insert Short Code Here and Make A Nice Design.....||#|| OxiAddonsOC-T-C-T ||#||fas fa-times||#|| ||#||',
    'Shortcode To OffCanvasOXIIMPORToffcanvas_contentOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG || OxiAddonsOC-SB-BG |rgba(255,255,255,1.00)|OxiAddonsOC-SB-W |300|300|300|OxiAddonsOC-SB-P-top |20|20|20|OxiAddonsOC-SB-P-bottom |20|20|20|OxiAddonsOC-SB-P-left |20|20|20|OxiAddonsOC-SB-P-right |20|20|20| OxiAddonsOC-FW-BG |rgba(255,10,10,0.41)|OxiAddonsOC-CI-FS |20|20|20| OxiAddonsOC-CI-C |#000000|OxiAddonsOC-CI-P-top |20|20|20|OxiAddonsOC-CI-P-bottom |20|20|20|OxiAddonsOC-CI-P-left |20|20|20|OxiAddonsOC-CI-P-right |20|20|20| OxiAddonsOC-C-TA |right| OxiAddonsOC-C-tab |left| |||||||||||||||| ||||||||||||||||||#|| OxiAddonsOC-BT-O ||#||<span style="font-size:24px;color:green">Please insert a Shortcode or text here...</span>||#|| OxiAddonsOC-BT-TH ||#||Insert Short Code Here and Make A Nice Design.....||#|| OxiAddonsOC-C-T ||#||fas fa-times||#|| ||#||',
   
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

