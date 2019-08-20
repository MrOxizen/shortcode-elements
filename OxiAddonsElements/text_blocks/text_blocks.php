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
    'Style 1OXIIMPORTtext_blocksOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddTextBlocks-margin-top |0|0|0|OxiAddTextBlocks-margin-bottom |0|0|0|OxiAddTextBlocks-margin-left |0|0|0|OxiAddTextBlocks-margin-right |0|0|0|OxiAddTextBlocks-animation||3:false:false:500:10:0.2|0//|OxiAddTextBlocks-1st-font-size|40|40|40| OxiAddTextBlocks-1st-color |#949494|OxiAddTextBlocks-1st-family |Ubuntu|300|OxiAddTextBlocks-1st-style |normal:1|center:0()0()0()rgba(255, 255, 255, 0):|OxiAddTextBlocks-1st-padding-top |0|0|0|OxiAddTextBlocks-1st-padding-bottom |0|0|0|OxiAddTextBlocks-1st-padding-left |0|0|0|OxiAddTextBlocks-1st-padding-right |0|0|0|OxiAddTextBlocks-2nd-font-size|80|50|50| OxiAddTextBlocks-2nd-color |#ff8293|OxiAddTextBlocks-2nd-family |Ubuntu|100|OxiAddTextBlocks-2nd-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 0):|OxiAddTextBlocks-2nd-padding-top |0|0|0|OxiAddTextBlocks-2nd-padding-bottom |0|0|0|OxiAddTextBlocks-2nd-padding-left |0|0|0|OxiAddTextBlocks-2nd-padding-right |0|0|0|OxiAddTextBlocks-3rd-font-size|30|30|30| OxiAddTextBlocks-3rd-color |#6e6e6e|OxiAddTextBlocks-3rd-family |Ubuntu|300|OxiAddTextBlocks-3rd-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 0):|OxiAddTextBlocks-3rd-padding-top |0|0|0|OxiAddTextBlocks-3rd-padding-bottom |0|0|0|OxiAddTextBlocks-3rd-padding-left |0|0|0|OxiAddTextBlocks-3rd-padding-right |0|0|0|||#|| ||#||OxiAddTextBlocks-1st-text ||#||FUSION||#||OxiAddTextBlocks-2nd-text ||#||BUILDER||#||OxiAddTextBlocks-3rd-text ||#||DRAG & DROP TO <span style="color: #ff8293; font-family: Roboto;"> EASILY </span> CREATE CUSTOM PAGE||#|||',
    'Style 2OXIIMPORTtext_blocksOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,0.75)|OxiAddTextBlocks-margin-top |0|0|0|OxiAddTextBlocks-margin-bottom |0|0|0|OxiAddTextBlocks-margin-left |0|0|0|OxiAddTextBlocks-margin-right |0|0|0|OxiAddTextBlocks-animation||10:false:false:500:10:0.2|10//|OxiAddTextBlocks-1st-font-size|50|50|50| OxiAddTextBlocks-1st-color |#737373|OxiAddTextBlocks-1st-family |Ubuntu|400|OxiAddTextBlocks-1st-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0):|OxiAddTextBlocks-1st-padding-top |0|0|0|OxiAddTextBlocks-1st-padding-bottom |0|0|0|OxiAddTextBlocks-1st-padding-left |0|0|0|OxiAddTextBlocks-1st-padding-right |0|0|0|OxiAddTextBlocks-2nd-font-size|18|18|18| OxiAddTextBlocks-2nd-color |#ed7e4e|OxiAddTextBlocks-2nd-family |Roboto|400|OxiAddTextBlocks-2nd-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0):|OxiAddTextBlocks-2nd-padding-top |0|0|0|OxiAddTextBlocks-2nd-padding-bottom |0|0|0|OxiAddTextBlocks-2nd-padding-left |0|0|0|OxiAddTextBlocks-2nd-padding-right |0|0|0|OxiAddTextBlocks-border-width|50|50|50|OxiAddTextBlocks-border |solid|#ed7e4e|2|OxiAddTextBlocks-border-padding-top |6|6|6|OxiAddTextBlocks-border-padding-bottom |6|6|6|OxiAddTextBlocks-border-padding-left |3|3|3|OxiAddTextBlocks-border-padding-right |0|0|0|||||OxiAddTextBlocks-max-width|600|600|600|||#|| ||#||OxiAddTextBlocks-1st-text ||#||We are<br>Web design <span style=" color: #ed7e4e; font-weight: bold; "> Agency </span>||#||OxiAddTextBlocks-2nd-text ||#||19 years of Experience||#||OxiAddTextBlocks-style ||#||contentborderheading||#|||',
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
