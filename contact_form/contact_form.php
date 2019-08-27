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
    'Style 1 Demo 1OXIIMPORTcontact_formOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)| OxiAddCF-color |#9e9e9e| OxiAddCF-writing-color |#9500c2| OxiAddCF-border |2| OxiAddCF-border-type |solid| OxiAddCF-border-color |#a6a6a6| OxiAddCF-border-H-color |#a000d1| OxiAddCF-error-color |#f70042|OxiAddCF-padding-top |10|10|10|OxiAddCF-padding-bottom |10|10|10|OxiAddCF-padding-left |5|5|5|OxiAddCF-padding-right |10|10|10|OxiAddCForm-margin-top |10|10|10|OxiAddCForm-margin-bottom |10|10|10|OxiAddCForm-margin-left |20|20|20|OxiAddCForm-margin-right |10|10|10| OxiAddCF-style |style-1|OxiAddCF-G-padding-top |10|10|10|OxiAddCF-G-padding-bottom |10|10|10|OxiAddCF-G-padding-left |10|10|10|OxiAddCF-G-padding-right |10|10|10|OxiAddCD-animation||2|0//|||||||||||||OxiAddCForm-font-size|16|16|16|OxiAddCForm-family |Roboto|300| OxiAddCForm-style |normal|left|||||||||||||||||||||||OxiAddCForm-success-font-size|16|16|16| OxiAddCForm-success-color |#ffffff| OxiAddCForm-success-bg-color |rgba(60,0,179,1.00)|OxiAddCForm-success-family |Open+Sans|300| OxiAddCForm-success-style |normal|center| OxiAddCF-success-border |0| OxiAddCF-success-border-type |dotted| OxiAddCF-success-border-color |#ffffff|OxiAddCForm-success-border-radius|15|15|15|OxiAddCForm-success-padding-top |15|15|15|OxiAddCForm-success-padding-bottom |15|15|15|OxiAddCForm-success-padding-left |15|15|15|OxiAddCForm-success-padding-right |15|15|15|OxiAddCForm-success-margin-top |15|15|15|OxiAddCForm-success-margin-bottom |15|15|15|OxiAddCForm-success-margin-left |15|15|15|OxiAddCForm-success-margin-right |15|15|15|||||||||||||||||OxiAddCForm-T-font-size|35|35|35|OxiAddCForm-T-width|350|350|350| OxiAddCForm-T-color |#595959|OxiAddCForm-T-family |Open+Sans|600| OxiAddCForm-T-style |normal|center|OxiAddCForm-T-padding-top |15|15|15|OxiAddCForm-T-padding-bottom |15|15|15|OxiAddCForm-T-padding-left |15|15|15|OxiAddCForm-T-padding-right |15|15|15|OxiAddCForm-C-font-size|14|14|14|OxiAddCForm-C-width|500|350|0| OxiAddCForm-C-color |#949494|OxiAddCForm-C-family |Open+Sans|300| OxiAddCForm-C-style |normal|center|OxiAddCForm-C-padding-top |10|10|10|OxiAddCForm-C-padding-bottom |10|10|10|OxiAddCForm-C-padding-left |10|10|10|OxiAddCForm-C-padding-right |10|10|10|OxiAddCForm-B-font-size|16|16|16| OxiAddCForm-B-color |#ffffff| OxiAddCForm-B-H-color |#ffffff| OxiAddCForm-B-bg-color |rgba(147,0,184,1.00)| OxiAddCForm-B-bg-H-color |rgba(0,109,163,1.00)|OxiAddCForm-B-family |Open+Sans|300| OxiAddCForm-B-style |normal|center| OxiAddCF-B-border |0| OxiAddCF-B-border-type |dotted| OxiAddCF-B-border-color |#ffffff|OxiAddCForm-B-border-radius|50|50|50|OxiAddCForm-B-padding-top |10|10|10|OxiAddCForm-B-padding-bottom |10|10|10|OxiAddCForm-B-padding-left |20|20|20|OxiAddCForm-B-padding-right |20|20|20|OxiAddCForm-B-margin-top |30|30|30|OxiAddCForm-B-margin-bottom |20|20|20|OxiAddCForm-B-margin-left |20|20|20|OxiAddCForm-B-margin-right |20|20|20| OxiAddCF-B-border-H-color |#ffffff|||||||||||||||||||#|| ||#||OxiAddCForm-name-text||#||Name||#||OxiAddCForm-name-error-text||#||Name is Requried||#||OxiAddCForm-email-text||#||Email||#||OxiAddCForm-email-error-text||#||Valid Email is Requried: ex abc@xyz.com||#||OxiAddCForm-massage-text||#||Massage||#||OxiAddCForm-massage-error-text||#||Massage is Requried||#||OxiAddCForm-success-text||#||Thank you so very much for all of your invaluable assistance with planning our annual conference.||#||OxiAddCForm-T-text||#||||#||OxiAddCForm-C-text||#||||#||OxiAddCForm-B-text||#||Send Your Massage||#||OxiAddCForm-admin-email||#||||#|||',
    'style 1 Demo 2OXIIMPORTcontact_formOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)| OxiAddCF-color |#9e9e9e| OxiAddCF-writing-color |#000000| OxiAddCF-border |2| OxiAddCF-border-type |dotted| OxiAddCF-border-color |#a6a6a6| OxiAddCF-border-H-color |#a000d1| OxiAddCF-error-color |#f70042|OxiAddCF-padding-top |9|9|9|OxiAddCF-padding-bottom |9|9|9|OxiAddCF-padding-left |9|9|9|OxiAddCF-padding-right |9|9|9|OxiAddCForm-margin-top |26|26|26|OxiAddCForm-margin-bottom |26|26|26|OxiAddCForm-margin-left |26|26|26|OxiAddCForm-margin-right |26|26|26| OxiAddCF-style |style-2|OxiAddCF-G-padding-top |10|10|10|OxiAddCF-G-padding-bottom |10|10|10|OxiAddCF-G-padding-left |10|10|10|OxiAddCF-G-padding-right |10|10|10|OxiAddCD-animation||2|0//|||||||||||||OxiAddCForm-font-size|14|14|14|OxiAddCForm-family |Roboto|300| OxiAddCForm-style |normal|left|||||||||||||||||||||||OxiAddCForm-success-font-size|16|16|16| OxiAddCForm-success-color |#ffffff| OxiAddCForm-success-bg-color |rgba(60, 0, 179, 1)|OxiAddCForm-success-family |Open+Sans|300| OxiAddCForm-success-style |normal|center| OxiAddCF-success-border |0| OxiAddCF-success-border-type |dotted| OxiAddCF-success-border-color |#ffffff|OxiAddCForm-success-border-radius|15|15|15|OxiAddCForm-success-padding-top |15|15|15|OxiAddCForm-success-padding-bottom |15|15|15|OxiAddCForm-success-padding-left |15|15|15|OxiAddCForm-success-padding-right |15|15|15|OxiAddCForm-success-margin-top |15|15|15|OxiAddCForm-success-margin-bottom |15|15|15|OxiAddCForm-success-margin-left |15|15|15|OxiAddCForm-success-margin-right |15|15|15|||||||||||||||||OxiAddCForm-T-font-size|35|35|35|OxiAddCForm-T-width|350|350|350| OxiAddCForm-T-color |#595959|OxiAddCForm-T-family |Open+Sans|600| OxiAddCForm-T-style |normal|center|OxiAddCForm-T-padding-top |15|15|15|OxiAddCForm-T-padding-bottom |15|15|15|OxiAddCForm-T-padding-left |15|15|15|OxiAddCForm-T-padding-right |15|15|15|OxiAddCForm-C-font-size|14|14|14|OxiAddCForm-C-width|500|500|500| OxiAddCForm-C-color |#949494|OxiAddCForm-C-family |Open+Sans|300| OxiAddCForm-C-style |normal|center|OxiAddCForm-C-padding-top |10|10|10|OxiAddCForm-C-padding-bottom |10|10|10|OxiAddCForm-C-padding-left |10|10|10|OxiAddCForm-C-padding-right |10|10|10|OxiAddCForm-B-font-size|16|16|16| OxiAddCForm-B-color |#ffffff| OxiAddCForm-B-H-color |#ffffff| OxiAddCForm-B-bg-color |rgba(147, 0, 184, 1)| OxiAddCForm-B-bg-H-color |rgba(0, 109, 163, 1)|OxiAddCForm-B-family |Open+Sans|300| OxiAddCForm-B-style |normal|center| OxiAddCF-B-border |0| OxiAddCF-B-border-type |dotted| OxiAddCF-B-border-color |#ffffff|OxiAddCForm-B-border-radius|50|50|50|OxiAddCForm-B-padding-top |10|10|10|OxiAddCForm-B-padding-bottom |10|10|10|OxiAddCForm-B-padding-left |20|20|20|OxiAddCForm-B-padding-right |20|20|20|OxiAddCForm-B-margin-top |30|30|30|OxiAddCForm-B-margin-bottom |20|20|20|OxiAddCForm-B-margin-left |20|20|20|OxiAddCForm-B-margin-right |20|20|20| OxiAddCF-B-border-H-color |#ffffff|||||||||||||||||||#|| ||#||OxiAddCForm-name-text||#||Name||#||OxiAddCForm-name-error-text||#||Name is Requried||#||OxiAddCForm-email-text||#||Email||#||OxiAddCForm-email-error-text||#||Valid Email is Requried: ex abc@xyz.com||#||OxiAddCForm-massage-text||#||Massage||#||OxiAddCForm-massage-error-text||#||Massage is Requried||#||OxiAddCForm-success-text||#||Thank you so very much for all of your invaluable assistance with planning our annual conference.||#||OxiAddCForm-T-text||#||New Mail||#||OxiAddCForm-C-text||#||Send your email with this address||#||OxiAddCForm-B-text||#||Send Your Massage||#||OxiAddCForm-admin-email||#||||#|||',
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

