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
                'Style 01OXIIMPORTimage_scrollOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageScroll-G-Padding-top |0|0|0|OxiAddonsImageScroll-G-Padding-bottom |0|0|0|OxiAddonsImageScroll-G-Padding-left |0|0|0|OxiAddonsImageScroll-G-Padding-right |0|0|0|OxiAddonsImageScroll-IMG-W |800|800|800|OxiAddonsImageScroll-IMG-H |400|400|400| OxiAddonsImageScroll-IMG-transition|6| OxiAddonsImageScroll-IMG-animation||0.5:false:false:500:10:0.2|0.5//||OxiAddonsImageScroll-IMG-shadow |rgba(79, 79, 79, 0.44)|0|12|30|-6|||OxiAddonsImageScroll-IMG-H-shadow |rgba(36, 36, 36, 0.48)|0|14|40|0|OxiAddonsImageScroll-G-BR-top |0|0|0|OxiAddonsImageScroll-G-BR-bottom |0|0|0|OxiAddonsImageScroll-G-BR-left |0|0|0|OxiAddonsImageScroll-G-BR-right |0|0|0| OxiAddonsImageScroll-IMG-Tab ||OxiAddonsImageScroll-rows |oxi-addons-lg-col-1|oxi-addons-md-col-1|oxi-addons-xs-col-1| ||#||##OXISTYLE##OxiAddonsImageScroll-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/03/screencapture-frontend-themextar-net-demos-appko_app_landing_page-2019-03-27-16_25_32.jpg||#|| OxiAddonsImageScroll-IMG-link ||#||#||#|| OxiAddonsImageScroll-IMG-H-Diraction ||#||top||#|| ||#||##OXIDATA##',
                'Style 02OXIIMPORTimage_scrollOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageScroll-G-Padding-top |0|0|0|OxiAddonsImageScroll-G-Padding-bottom |0|0|0|OxiAddonsImageScroll-G-Padding-left |0|0|0|OxiAddonsImageScroll-G-Padding-right |0|0|0|OxiAddonsImageScroll-IMG-W |800|800|800|OxiAddonsImageScroll-IMG-H |400|400|400| OxiAddonsImageScroll-IMG-transition|5| OxiAddonsImageScroll-IMG-animation||0.5:false:false:500:10:0.2|0.5//||OxiAddonsImageScroll-IMG-shadow |rgba(128, 128, 128, 0.41)|0|15|45|0|||OxiAddonsImageScroll-IMG-H-shadow |rgba(105, 105, 105, 0.48)|0|15|50|0|OxiAddonsImageScroll-G-BR-top |10|10|10|OxiAddonsImageScroll-G-BR-bottom |10|10|10|OxiAddonsImageScroll-G-BR-left |10|10|10|OxiAddonsImageScroll-G-BR-right |10|10|10| OxiAddonsImageScroll-IMG-Tab ||OxiAddonsImageScroll-rows |oxi-addons-lg-col-1|oxi-addons-md-col-1|oxi-addons-xs-col-1| ||#||##OXISTYLE##OxiAddonsImageScroll-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/03/New-Project-2.png||#|| OxiAddonsImageScroll-IMG-link ||#||#||#|| OxiAddonsImageScroll-IMG-H-Diraction ||#||top||#|| ||#||##OXIDATA##',
                'Style 03OXIIMPORTimage_scrollOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageScroll-G-Padding-top |0|0|0|OxiAddonsImageScroll-G-Padding-bottom |0|0|0|OxiAddonsImageScroll-G-Padding-left |0|0|0|OxiAddonsImageScroll-G-Padding-right |0|0|0|||||OxiAddonsImageScroll-IMG-H |350|350|350||| OxiAddonsImageScroll-IMG-animation||0.5:false:false:500:10:0.2|0.5//|||||||||||||||||||||||||||||||| OxiAddonsImageScroll-IMG-Tab ||OxiAddonsImageScroll-rows |oxi-addons-lg-col-1|oxi-addons-md-col-1|oxi-addons-xs-col-1| ||#||##OXISTYLE##OxiAddonsImageScroll-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/03/screencapture-themesitem-demos-html-Hunt-demo-index2-html-2019-03-25-11_29_33.jpg||#|| OxiAddonsImageScroll-IMG-link ||#||||#|| ||#||##OXIDATA##',
                'Style 04OXIIMPORTimage_scrollOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG ||OxiAddonsImageScroll-G-Padding-top |0|0|0|OxiAddonsImageScroll-G-Padding-bottom |0|0|0|OxiAddonsImageScroll-G-Padding-left |0|0|0|OxiAddonsImageScroll-G-Padding-right |0|0|0|OxiAddonsImageScroll-IMG-W |800|800|800|OxiAddonsImageScroll-IMG-H |400|400|400| OxiAddonsImageScroll-IMG-transition|6| OxiAddonsImageScroll-IMG-animation||0.5:false:false:500:10:0.2|0.5//||OxiAddonsImageScroll-IMG-shadow |rgba(79, 79, 79, 0.44)|0|12|30|-6|||OxiAddonsImageScroll-IMG-H-shadow |rgba(36, 36, 36, 0.48)|0|14|40|0|OxiAddonsImageScroll-G-BR-top |0|0|0|OxiAddonsImageScroll-G-BR-bottom |0|0|0|OxiAddonsImageScroll-G-BR-left |0|0|0|OxiAddonsImageScroll-G-BR-right |0|0|0|||OxiAddonsImageScroll-rows |oxi-addons-lg-col-1|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddonsImageScroll-title-FS |18|18|18|OxiAddonsImageScroll-title-F-family |Roboto Slab|100|OxiAddonsImageScroll-title-F-style |normal:1.3|center:0()0()0()#ffffff:| OxiAddonsImageScroll-title-C |#ffffff|OxiAddonsImageScroll-title-P-top |10|10|10|OxiAddonsImageScroll-title-P-bottom |10|10|10|OxiAddonsImageScroll-title-P-left |5|5|5|OxiAddonsImageScroll-title-P-right |5|5|5| OxiAddonsImageScroll-B-Tab ||OxiAddonsImageScroll-B-FS |16|16|16|OxiAddonsImageScroll-B-F-family |Bree Serif|100|OxiAddonsImageScroll-B-F-style |normal:1.3|left:0()0()0()#ffffff:| OxiAddonsImageScroll-B-TC |#696969| OxiAddonsImageScroll-B-BG |rgba(255,255,255,1.00)|OxiAddonsImageScroll-B-B |0|none|| OxiAddonsImageScroll-B-BC |#bf5e5e|OxiAddonsImageScroll-B-BR-top |1|1|1|OxiAddonsImageScroll-B-BR-bottom |1|1|1|OxiAddonsImageScroll-B-BR-left |1|1|1|OxiAddonsImageScroll-B-BR-right |1|1|1|OxiAddonsImageScroll-B-P-top |8|8|8|OxiAddonsImageScroll-B-P-bottom |8|8|8|OxiAddonsImageScroll-B-P-left |20|20|20|OxiAddonsImageScroll-B-P-right |20|20|20| OxiAddonsImageScroll-B-HTC |#ffffff| OxiAddonsImageScroll-B-HBG |rgba(255,82,125,1.00)| OxiAddonsImageScroll-B-HBC |#ffffff|OxiAddonsImageScroll-B-HBR-top |6|6|6|OxiAddonsImageScroll-B-HBR-bottom |6|6|6|OxiAddonsImageScroll-B-HBR-left |6|6|6|OxiAddonsImageScroll-B-HBR-right |6|6|6| OxiAddonsImageScroll-title-bg |rgba(255,82,125,1.00)| OxiAddonsImageScroll-G-bg |rgba(23,23,23,0.00)|||#|| OxiAddonsImageScroll-B-BT ||#||Show More||#|| ||#||##OXISTYLE##OxiAddonsImageScroll-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/03/screencapture-bdevs-co-pohat-pohat-ppc-services-html-2019-03-27-16_27_30.jpg||#|| OxiAddonsImageScroll-IMG-link ||#||#||#|| OxiAddonsImageScroll-IMG-H-Diraction ||#||top||#|| OxiAddonsImageScroll-title-TA ||#||Web Development||#|| ||#||##OXIDATA##',
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

