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
    array(
        'https://www.shortcode-addons.com/wp-content/uploads/2019/06/cr7-1.png',
        'Style 1OXIIMPORTcontact_form_7OXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(9, 224, 9, 1)|OxiAddonsCF7-G-BG|rgba(255,255,255,1.00)|OxiAddCF-writing-color|| ||OxiAddonsCF7-G-BR-top |10|10|10|OxiAddonsCF7-G-BR-bottom |10|10|10|OxiAddonsCF7-G-BR-left |10|10|10|OxiAddonsCF7-G-BR-right |10|10|10|OxiAddonsCF7-G-P-top |20|20|20|OxiAddonsCF7-G-P-bottom |20|20|20|OxiAddonsCF7-G-P-left |20|20|20|OxiAddonsCF7-G-P-right |20|20|20|OxiAddonsCF7-G-M-top |40|40|40|OxiAddonsCF7-G-M-bottom |40|40|40|OxiAddonsCF7-G-M-left |40|40|40|OxiAddonsCF7-G-M-right |40|40|40|OxiAddonsCF7-B-Shadow |rgba(0, 0, 0, 1)|1|1|15|2|OxiAddonsCF7-animation||:false:false:500:10:0.2|14//| OxiAddonsCF7-IF-BG |rgba(219,216,216,1.00)|OxiAddonsCF7-IF-Height|40|30|30|OxiAddonsCF7-IF-Width|450|300|300|OxiAddonsCF7-IF-border |0|solid|| OxiAddonsCF7-IF-border-color |#0808c2|OxiAddonsCF7-IF-BR-top |50|50|50|OxiAddonsCF7-IF-BR-bottom |50|50|50|OxiAddonsCF7-IF-BR-left |50|50|50|OxiAddonsCF7-IF-BR-right |50|50|50|OxiAddonsCF7-IF-P-top |10|3|3|OxiAddonsCF7-IF-P-bottom |10|0|0|OxiAddonsCF7-IF-P-left |10|10|10|OxiAddonsCF7-IF-P-right |10|0|0|OxiAddonsCF7-IF-M-top |10|10|10|OxiAddonsCF7-IF-M-bottom |10|10|10|OxiAddonsCF7-IF-M-left |0|0|0|OxiAddonsCF7-IF-M-right |0|0|0|OxiAddonsCF7-IF-Shadow |rgba(255, 255, 255, 1)|0|0|0|0| OxiAddonsCF7-IF-F-BG |rgba(255,255,255,1.00)| |||| OxiAddonsCF7-IF-F-border-color |#9e0e35|OxiAddonsCF7-IF-F-Shadow |rgba(9, 224, 9, 1)|1|1|15|2|OxiAddonsCF7-B-font-size|18|18|16| OxiAddonsCF7-B-color |#ffffff| OxiAddonsCF7-B-H-color |#ffffff| OxiAddonsCF7-B-bg-color |rgba(17,214,3,1.00)| OxiAddonsCF7-B-bg-H-color |rgba(255,145,0,1.00)|OxiAddonsCF7-B-family |Actor|500|OxiAddonsCF7-B-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsCF7-B-border |0|solid|| OxiAddonsCF7-B-border-color |#e01414| OxiAddonsCF7-B-border-H-color |#1172f0|OxiAddonsCF7-B-border-radius|50|50|50|OxiAddonsCF7-B-padding-top |10|8|8|OxiAddonsCF7-B-padding-bottom |10|8|8|OxiAddonsCF7-B-padding-left |50|40|40|OxiAddonsCF7-B-padding-right |50|40|40|OxiAddonsCF7-B-margin-top |0|0|0|OxiAddonsCF7-B-margin-bottom |10|10|10|OxiAddonsCF7-B-margin-left |5|5|5|OxiAddonsCF7-B-margin-right |0|0|0|OxiAddonsCF7-TA-Height|150|120|120|OxiAddonsCF7-TA-Width|450|300|300|OxiAddonsCF7-TA-BR-top |20|20|20|OxiAddonsCF7-TA-BR-bottom |20|20|20|OxiAddonsCF7-TA-BR-left |20|20|20|OxiAddonsCF7-TA-BR-right |20|20|20|OxiAddonsCF7-T-FS |16|16|16| OxiAddonsCF7-T-C |#575454|OxiAddonsCF7-T-family |ABeeZee|500|OxiAddonsCF7-T-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsCF7-T-P-top |5|5|5|OxiAddonsCF7-T-P-bottom |5|5|5|OxiAddonsCF7-T-P-left |5|5|5|OxiAddonsCF7-T-P-right |5|5|5| OxiAddonsCF7-CB-BG |rgba(204,200,200,1.00)|OxiAddonsCF7-CB-Height|20|20|20|OxiAddonsCF7-CB-Width|20|20|20|OxiAddonsCF7-CB-border |0|solid|| OxiAddonsCF7-CB-border-color |#0808c2|OxiAddonsCF7-CB-BR-top |5|5|5|OxiAddonsCF7-CB-BR-bottom |5|5|5|OxiAddonsCF7-CB-BR-left |5|5|5|OxiAddonsCF7-CB-BR-right |5|5|5|OxiAddonsCF7-CB-P-top |0|0|0|OxiAddonsCF7-CB-P-bottom |0|0|0|OxiAddonsCF7-CB-P-left |0|0|0|OxiAddonsCF7-CB-P-right |0|0|0|OxiAddonsCF7-CB-M-top |25|25|25|OxiAddonsCF7-CB-M-bottom |10|10|10|OxiAddonsCF7-CB-M-left |10|10|10|OxiAddonsCF7-CB-M-right |30|30|30| OxiAddonsCF7-CBS-BG |rgba(9,230,27,1.00)| OxiAddonsCF7-CBS-C |#ffffff|OxiAddonsCF7-CBS-FN|16|20|20| OxiAddonsCF7-RB-BG |rgba(204,200,200,1.00)|OxiAddonsCF7-RB-Height|20|20|20|OxiAddonsCF7-RB-Width|20|20|20|OxiAddonsCF7-RB-border |0|solid|| OxiAddonsCF7-RB-border-color |#0808c2|OxiAddonsCF7-RB-BR-top |100|100|100|OxiAddonsCF7-RB-BR-bottom |100|100|100|OxiAddonsCF7-RB-BR-left |100|100|100|OxiAddonsCF7-RB-BR-right |100|100|100|OxiAddonsCF7-RB-M-top |9|9|9|OxiAddonsCF7-RB-M-bottom |4|4|4|OxiAddonsCF7-RB-M-left |4|4|4|OxiAddonsCF7-RB-M-right |5|5|5|OxiAddonsCF7-RB-P-top |25|25|25|OxiAddonsCF7-RB-P-bottom |15|15|15|OxiAddonsCF7-RB-P-left |10|10|10|OxiAddonsCF7-RB-P-right |25|25|25| OxiAddonsCF7-RBS-BG |rgba(9,230,27,1.00)| OxiAddonsCF7-RBS-C |#ffffff|OxiAddonsCF7-RBS-FN|50|50|50|OxiAddonsCF7-G-MW |500|500|500|||#|| oxiAddons-CF7-SC ||#||[contact-form-7 id="6" title="Contact form 1"]||#|| ||#||',
    ),
    
 );
if (!function_exists('is_plugin_active')) {
                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            }
            if (!is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
                $cf7active =  "<p style='width: 96%;
                        float: left;
                        font-size: 30px;
                        color: red;
                        background: #fff;
                        margin:28px;
                        padding: 20px;
                        box-shadow: 1px 1px 15px 2px #ddd;'>Please Install and Active Contact Form 7 Plugin...!</p>";
            }
if ($oxiimpport == 'import') {
    ?>
    <div class="wrap">
        
        <?php
         
        echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes');
        echo $cf7active;
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
                        echo '<div class="oxi-addons-col-1"  id="' . $expludedata[2] . '"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo '<img src="' . $value[0] . '" alt="" width="500">';
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
        <?php 
          echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); 
          echo $cf7active;
        ?>
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
                        echo '<div class="oxi-addons-col-1" id="' . $expludedata[2] . '"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo '<img src="' . $value[0] . '" alt="" width="500">';
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

