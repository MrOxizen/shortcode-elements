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
$freeimport = array('style-1', 'style-2');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file =  array(
            'Style 1OXIIMPORTcontent_toggleOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG ||OxiAddonsCT-H-FS |22|22|22| OxiAddonsCT-H-C |#059e19|OxiAddonsCT-H-H2-family |Lato|500|OxiAddonsCT-H-H2-style |normal:1.3|center:0()0()0()#ffffff|OxiAddonsCT-H-M-top |0|0|0|OxiAddonsCT-H-M-bottom |0|0|0|OxiAddonsCT-H-M-left |0|0|0|OxiAddonsCT-H-M-right |10|10|10|OxiAddonsCT-AH-FS |22|22|22| OxiAddonsCT-AH-C |#5e5b07|OxiAddonsCT-AH-H2-family |Lato|500|OxiAddonsCT-AH-H2-style |normal:1.3|center:0()0()0()#ffffff|OxiAddonsCT-AH-M-top |0|0|0|OxiAddonsCT-AH-M-bottom |0|0|0|OxiAddonsCT-AH-M-left |10|10|10|OxiAddonsCT-AH-M-right |0|0|0| OxiAddonsCT-B-BG |linear-gradient(90deg, rgba(50,204,8,1.00) 29%,rgba(187,214,13,1.00) 77%)|OxiAddonsCT-B-W |80|80|80|OxiAddonsCT-B-H |40|40|40|OxiAddonsCT-B-SZ |0|solid|| OxiAddonsCT-B-BC |#f52323|OxiAddonsCT-B-BR-top |100|100|100|OxiAddonsCT-B-BR-bottom |100|100|100|OxiAddonsCT-B-BR-left |100|100|100|OxiAddonsCT-B-BR-right |100|100|100| |||||||||||||||| OxiAddonsCT-B-I-BG |rgba(255,255,255,1.00)|OxiAddonsCT-B-I-W |31|31|31|OxiAddonsCT-B-I-H |30|30|30|OxiAddonsCT-B-I-Shadow |rgba(84, 81, 81, 1)|0|0|2|0|OxiAddonsCT-B-I-BR-top |100|100|100|OxiAddonsCT-B-I-BR-bottom |100|100|100|OxiAddonsCT-B-I-BR-left |100|100|100|OxiAddonsCT-B-I-BR-right |100|100|100|OxiAddonsCT-B-I-M |44|44|44|OxiAddonsCT-CB-M-top |30|30|30|OxiAddonsCT-CB-M-bottom |0|0|0|OxiAddonsCT-CB-M-left |0|0|0|OxiAddonsCT-CB-M-right |0|0|0|OxiAddonsCT-B-M-top |10|10|10|OxiAddonsCT-B-M-bottom |10|10|10|OxiAddonsCT-B-M-left |10|10|10|OxiAddonsCT-B-M-right |10|10|10|||#|| OxiAddonsCT-H ||#||Limited||#|| OxiAddonsCT-AH ||#||Unlimited||#|| OxiAddonsCT-C-O ||#||||#|| OxiAddonsCT-C-T ||#||||#|| ||#||',
            'Style 2OXIIMPORTcontent_toggleOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG ||OxiAddonsCT-H-FS |22|22|22| OxiAddonsCT-H-C |#005d82|OxiAddonsCT-H-H2-family |Lato|500|OxiAddonsCT-H-H2-style |normal:1.3|center:0()0()0()#ffffff|OxiAddonsCT-H-M-top |0|0|0|OxiAddonsCT-H-M-bottom |0|0|0|OxiAddonsCT-H-M-left |0|0|0|OxiAddonsCT-H-M-right |10|10|10|OxiAddonsCT-AH-FS |22|22|22| OxiAddonsCT-AH-C |#8500c2|OxiAddonsCT-AH-H2-family |Lato|500|OxiAddonsCT-AH-H2-style |normal:1.3|center:0()0()0()#ffffff|OxiAddonsCT-AH-M-top |0|0|0|OxiAddonsCT-AH-M-bottom |0|0|0|OxiAddonsCT-AH-M-left |10|10|10|OxiAddonsCT-AH-M-right |0|0|0| OxiAddonsCT-B-BG |linear-gradient(90deg, rgba(149,14,179,1.00) 15%,rgba(255,8,8,1.00) 100%)|OxiAddonsCT-B-W |80|80|80|OxiAddonsCT-B-H |40|40|40|OxiAddonsCT-B-SZ |0|solid|| OxiAddonsCT-B-BC |#f52323|OxiAddonsCT-B-BR-top |100|100|100|OxiAddonsCT-B-BR-bottom |100|100|100|OxiAddonsCT-B-BR-left |100|100|100|OxiAddonsCT-B-BR-right |100|100|100| |||||||||||||||| OxiAddonsCT-B-I-BG |rgba(255,255,255,1.00)|OxiAddonsCT-B-I-W |31|31|31|OxiAddonsCT-B-I-H |30|30|30|OxiAddonsCT-B-I-Shadow |rgba(84, 81, 81, 1)|0|0|2|0|OxiAddonsCT-B-I-BR-top |100|100|100|OxiAddonsCT-B-I-BR-bottom |100|100|100|OxiAddonsCT-B-I-BR-left |100|100|100|OxiAddonsCT-B-I-BR-right |100|100|100|OxiAddonsCT-B-I-M |44|44|44|OxiAddonsCT-CB-M-top |30|30|30|OxiAddonsCT-CB-M-bottom |0|0|0|OxiAddonsCT-CB-M-left |0|0|0|OxiAddonsCT-CB-M-right |0|0|0|OxiAddonsCT-B-M-top |10|10|10|OxiAddonsCT-B-M-bottom |10|10|10|OxiAddonsCT-B-M-left |10|10|10|OxiAddonsCT-B-M-right |10|10|10| OxiAddonsCT-H-AC |#ff0303| OxiAddonsCT-AH-AC |#ff0505|||#|| OxiAddonsCT-H ||#||Limited||#|| OxiAddonsCT-AH ||#||Unlimited||#|| OxiAddonsCT-C-O ||#||||#|| OxiAddonsCT-C-T ||#||||#|| ||#||',
            'Style 3OXIIMPORTcontent_toggleOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG ||OxiAddonsCT-H-FS |22|22|22| OxiAddonsCT-H-C |#c7c7c7|OxiAddonsCT-H-H2-family |Lato|500|OxiAddonsCT-H-H2-style |normal:1.3|center:0()0()0()#ffffff:1|OxiAddonsCT-H-M-top |0|0|0|OxiAddonsCT-H-M-bottom |0|0|0|OxiAddonsCT-H-M-left |0|0|0|OxiAddonsCT-H-M-right |10|10|10|OxiAddonsCT-AH-FS |22|22|22| OxiAddonsCT-AH-C |#c7c7c7|OxiAddonsCT-AH-H2-family |Lato|500|OxiAddonsCT-AH-H2-style |normal:1.3|center:0()0()0()#ffffff:1|OxiAddonsCT-AH-M-top |0|0|0|OxiAddonsCT-AH-M-bottom |0|0|0|OxiAddonsCT-AH-M-left |10|10|10|OxiAddonsCT-AH-M-right |0|0|0| OxiAddonsCT-B-BG |rgba(255,255,255,1.00)|OxiAddonsCT-B-W |247|247|247|OxiAddonsCT-B-H |45|45|45|OxiAddonsCT-B-SZ |1|solid|| OxiAddonsCT-B-BC |#464746|OxiAddonsCT-B-BR-top |100|100|100|OxiAddonsCT-B-BR-bottom |100|100|100|OxiAddonsCT-B-BR-left |100|100|100|OxiAddonsCT-B-BR-right |100|100|100| |||||||||||||||| || |||| |||| |||||| |||||||||||||||| ||||||||||||||||OxiAddonsCT-CB-M-top |14|14|14|OxiAddonsCT-CB-M-bottom |25|25|25|OxiAddonsCT-CB-M-left |0|0|0|OxiAddonsCT-CB-M-right |0|0|0|OxiAddonsCT-B-M-top |25|25|25|OxiAddonsCT-B-M-bottom |0|0|0|OxiAddonsCT-B-M-left |0|0|0|OxiAddonsCT-B-M-right |20|20|20| OxiAddonsCT-H-AC |#464746| OxiAddonsCT-AH-AC |#464746|||#|| OxiAddonsCT-H ||#||Limited||#|| OxiAddonsCT-AH ||#||Unlimited||#|| OxiAddonsCT-C-O ||#||||#|| OxiAddonsCT-C-T ||#||||#|| ||#||',
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

