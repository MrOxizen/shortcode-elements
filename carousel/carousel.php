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
$freeimport = array('style-1', 'style-1');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = Array(
    array(
        'https://raw.githubusercontent.com/MrOxizen/shortcode-elements/master/carousel-image/Screenshot_1.png',
        'Simple Carousel OXIIMPORTcarouselOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddcarousel-rows |oxi-addons-lg-col-3|oxi-addons-md-col-2|oxi-addons-xs-col-1|oxi_addons-auto-play |true|oxi_addons-auto-play-time |2|oxi_addons-center-mode |false|oxi_addons-pause-in-hover |true|oxi_addons-looping |true|oxi_addons-mouse-draggable |true|oxi_addons-right-to-left |false|oxi_addons-content-position |center|oxi_addons-M-top |0|0|0|oxi_addons-M-bottom |0|0|0|oxi_addons-M-left |0|0|0|oxi_addons-M-right |0|0|0|oxi_addons-pag |false|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||oxi_addons-nav |false||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| |true| |0| |true|||||||||||||||||||||||||||||#||||#||||#||||#||||#|| ||#|| ||#||'
    ),
    array(
        'https://raw.githubusercontent.com/MrOxizen/shortcode-elements/master/carousel-image/Screenshot_3.png',
        'Carousel with Navigation OXIIMPORTcarouselOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddcarousel-rows |oxi-addons-lg-col-3|oxi-addons-md-col-2|oxi-addons-xs-col-1|oxi_addons-auto-play |true|oxi_addons-auto-play-time |2|oxi_addons-center-mode |false|oxi_addons-pause-in-hover |true|oxi_addons-looping |true|oxi_addons-mouse-draggable |true|oxi_addons-right-to-left |false|oxi_addons-content-position |flex-end|oxi_addons-M-top |10|10|10|oxi_addons-M-bottom |40|40|40|oxi_addons-M-left |0|0|0|oxi_addons-M-right |0|0|0|oxi_addons-pag |true|oxi_addons-pag-s2-position |bottom-middle|oxi_addons-pag-s1-top|10|10|10|oxi_addons-pag-s1-left|0|0|0|oxi_addons-pag-BG |rgba(194,194,194,1.00)|oxi_addons-pag-HBG |rgba(49, 194, 148, 1)|oxi_addons-pag-BR-top |5|5|5|oxi_addons-pag-BR-bottom |5|5|5|oxi_addons-pag-BR-left |5|5|5|oxi_addons-pag-BR-right |5|5|5|oxi_addons-pag-BR-H-top |5|5|5|oxi_addons-pag-BR-H-bottom |5|5|5|oxi_addons-pag-BR-H-left |5|5|5|oxi_addons-pag-BR-H-right |5|5|5|oxi_addons-pag-P-top |5|5|5|oxi_addons-pag-P-bottom |5|5|5|oxi_addons-pag-P-left |5|5|5|oxi_addons-pag-P-right |5|5|5|oxi_addons-pag-M-top |4|4|4|oxi_addons-pag-M-bottom |4|4|4|oxi_addons-pag-M-left |4|4|4|oxi_addons-pag-M-right |4|4|4|oxi_addons-nav |true|oxi_addons-nav-type |icon|||||oxi_addons-nav-style |style-1|oxi_addons-nav-s2-position |top-left|oxi_addons-nav-s1-top|50|50|50|oxi_addons-nav-s1-left|50|50|50|oxi_addons-nav-FS|14|14|14|oxi_addons-nav-C |#ffffff|oxi_addons-nav-HC |#ffffff|oxi_addons-nav-BG |rgba(108,194,50,1.00)|oxi_addons-nav-HBG |rgba(49, 194, 148, 1)|oxi_addons-nav-B |0|solid||oxi_addons-nav-BC |#ffffff|oxi_addons-nav-B-H |0|solid||oxi_addons-nav-BC |#ffffff|oxi_addons-nav-F-family |0|400| oxi_addons-nav-F-style |normal|center|oxi_addons-nav-BR-top |3|3|3|oxi_addons-nav-BR-bottom |3|3|3|oxi_addons-nav-BR-left |3|3|3|oxi_addons-nav-BR-right |3|3|3|oxi_addons-nav-BR-H-top |5|5|5|oxi_addons-nav-BR-H-bottom |5|5|5|oxi_addons-nav-BR-H-left |5|5|5|oxi_addons-nav-BR-H-right |5|5|5|oxi_addons-nav-P-top |10|10|10|oxi_addons-nav-P-bottom |10|10|10|oxi_addons-nav-P-left |10|10|10|oxi_addons-nav-P-right |10|10|10|oxi_addons-nav-M-top |5|5|5|oxi_addons-nav-M-bottom |5|5|5|oxi_addons-nav-M-left |5|5|5|oxi_addons-nav-M-right |5|5|5|oxi_addons-marge |true|oxi_addons-stagepadding |0|oxi_addons-auto-height |true|oxi_addons-nav-view|1|oxi_addons-pag-view|1|oxi_addons-pag-scale|1|oxi_addons-animation-in|fadeIn|oxi_addons-animation-out|fadeOut|oxi_addons-box-shadow |rgba(0, 0, 0, 0.25)|0|7|25|0|oxi_addons-hover-box-shadow |rgba(255, 255, 255, 1)|0|0|0|0|||#||oxi_addons-nav-left||#||fas fa-angle-left||#||oxi_addons-nav-right||#||fas fa-angle-right||#|| ||#|| ||#||'
    ),
    array(
        'https://raw.githubusercontent.com/MrOxizen/shortcode-elements/master/carousel-image/Screenshot_2.png',
        'Carousel with Pagination OXIIMPORTcarouselOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddcarousel-rows |oxi-addons-lg-col-3|oxi-addons-md-col-2|oxi-addons-xs-col-1|oxi_addons-auto-play |true|oxi_addons-auto-play-time |2|oxi_addons-center-mode |false|oxi_addons-pause-in-hover |true|oxi_addons-looping |true|oxi_addons-mouse-draggable |true|oxi_addons-right-to-left |false|oxi_addons-content-position |flex-end|oxi_addons-M-top |10|10|10|oxi_addons-M-bottom |40|40|40|oxi_addons-M-left |0|0|0|oxi_addons-M-right |0|0|0|oxi_addons-pag |true|oxi_addons-pag-s2-position |bottom-middle|oxi_addons-pag-s1-top|10|10|10|oxi_addons-pag-s1-left|0|0|0|oxi_addons-pag-BG |rgba(194,194,194,1.00)|oxi_addons-pag-HBG |rgba(49, 194, 148, 1)|oxi_addons-pag-BR-top |5|5|5|oxi_addons-pag-BR-bottom |5|5|5|oxi_addons-pag-BR-left |5|5|5|oxi_addons-pag-BR-right |5|5|5|oxi_addons-pag-BR-H-top |5|5|5|oxi_addons-pag-BR-H-bottom |5|5|5|oxi_addons-pag-BR-H-left |5|5|5|oxi_addons-pag-BR-H-right |5|5|5|oxi_addons-pag-P-top |5|5|5|oxi_addons-pag-P-bottom |5|5|5|oxi_addons-pag-P-left |5|5|5|oxi_addons-pag-P-right |5|5|5|oxi_addons-pag-M-top |4|4|4|oxi_addons-pag-M-bottom |4|4|4|oxi_addons-pag-M-left |4|4|4|oxi_addons-pag-M-right |4|4|4|oxi_addons-nav |true|oxi_addons-nav-type |icon|||||oxi_addons-nav-style |style-1|oxi_addons-nav-s2-position |top-left|oxi_addons-nav-s1-top|50|50|50|oxi_addons-nav-s1-left|50|50|50|oxi_addons-nav-FS|14|14|14|oxi_addons-nav-C |#ffffff|oxi_addons-nav-HC |#ffffff|oxi_addons-nav-BG |rgba(108,194,50,1.00)|oxi_addons-nav-HBG |rgba(49, 194, 148, 1)|oxi_addons-nav-B |0|solid||oxi_addons-nav-BC |#ffffff|oxi_addons-nav-B-H |0|solid||oxi_addons-nav-BC |#ffffff|oxi_addons-nav-F-family |0|400| oxi_addons-nav-F-style |normal|center|oxi_addons-nav-BR-top |3|3|3|oxi_addons-nav-BR-bottom |3|3|3|oxi_addons-nav-BR-left |3|3|3|oxi_addons-nav-BR-right |3|3|3|oxi_addons-nav-BR-H-top |5|5|5|oxi_addons-nav-BR-H-bottom |5|5|5|oxi_addons-nav-BR-H-left |5|5|5|oxi_addons-nav-BR-H-right |5|5|5|oxi_addons-nav-P-top |10|10|10|oxi_addons-nav-P-bottom |10|10|10|oxi_addons-nav-P-left |10|10|10|oxi_addons-nav-P-right |10|10|10|oxi_addons-nav-M-top |5|5|5|oxi_addons-nav-M-bottom |5|5|5|oxi_addons-nav-M-left |5|5|5|oxi_addons-nav-M-right |5|5|5|oxi_addons-marge |true|oxi_addons-stagepadding |0|oxi_addons-auto-height |true|oxi_addons-nav-view|1|oxi_addons-pag-view|1|oxi_addons-pag-scale|1|oxi_addons-animation-in|fadeIn|oxi_addons-animation-out|fadeOut|oxi_addons-box-shadow |rgba(0, 0, 0, 0.25)|0|7|25|0|oxi_addons-hover-box-shadow |rgba(255, 255, 255, 1)|0|0|0|0|||#||oxi_addons-nav-left||#||fas fa-angle-left||#||oxi_addons-nav-right||#||fas fa-angle-right||#|| ||#|| ||#||'
    ),
    array(
        'https://raw.githubusercontent.com/MrOxizen/shortcode-elements/master/carousel-image/Screenshot_4.png',
        'Carousel with Navigation & Pagination OXIIMPORTcarouselOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddcarousel-rows |oxi-addons-lg-col-3|oxi-addons-md-col-2|oxi-addons-xs-col-1|oxi_addons-auto-play |true|oxi_addons-auto-play-time |2|oxi_addons-center-mode |false|oxi_addons-pause-in-hover |true|oxi_addons-looping |true|oxi_addons-mouse-draggable |true|oxi_addons-right-to-left |false|oxi_addons-content-position |flex-end|oxi_addons-M-top |10|10|10|oxi_addons-M-bottom |40|40|40|oxi_addons-M-left |0|0|0|oxi_addons-M-right |0|0|0|oxi_addons-pag |true|oxi_addons-pag-s2-position |bottom-middle|oxi_addons-pag-s1-top|10|10|10|oxi_addons-pag-s1-left|0|0|0|oxi_addons-pag-BG |rgba(194,194,194,1.00)|oxi_addons-pag-HBG |rgba(49, 194, 148, 1)|oxi_addons-pag-BR-top |5|5|5|oxi_addons-pag-BR-bottom |5|5|5|oxi_addons-pag-BR-left |5|5|5|oxi_addons-pag-BR-right |5|5|5|oxi_addons-pag-BR-H-top |5|5|5|oxi_addons-pag-BR-H-bottom |5|5|5|oxi_addons-pag-BR-H-left |5|5|5|oxi_addons-pag-BR-H-right |5|5|5|oxi_addons-pag-P-top |5|5|5|oxi_addons-pag-P-bottom |5|5|5|oxi_addons-pag-P-left |5|5|5|oxi_addons-pag-P-right |5|5|5|oxi_addons-pag-M-top |4|4|4|oxi_addons-pag-M-bottom |4|4|4|oxi_addons-pag-M-left |4|4|4|oxi_addons-pag-M-right |4|4|4|oxi_addons-nav |true|oxi_addons-nav-type |icon|||||oxi_addons-nav-style |style-1|oxi_addons-nav-s2-position |top-left|oxi_addons-nav-s1-top|50|50|50|oxi_addons-nav-s1-left|50|50|50|oxi_addons-nav-FS|14|14|14|oxi_addons-nav-C |#ffffff|oxi_addons-nav-HC |#ffffff|oxi_addons-nav-BG |rgba(108,194,50,1.00)|oxi_addons-nav-HBG |rgba(49, 194, 148, 1)|oxi_addons-nav-B |0|solid||oxi_addons-nav-BC |#ffffff|oxi_addons-nav-B-H |0|solid||oxi_addons-nav-BC |#ffffff|oxi_addons-nav-F-family |0|400| oxi_addons-nav-F-style |normal|center|oxi_addons-nav-BR-top |3|3|3|oxi_addons-nav-BR-bottom |3|3|3|oxi_addons-nav-BR-left |3|3|3|oxi_addons-nav-BR-right |3|3|3|oxi_addons-nav-BR-H-top |5|5|5|oxi_addons-nav-BR-H-bottom |5|5|5|oxi_addons-nav-BR-H-left |5|5|5|oxi_addons-nav-BR-H-right |5|5|5|oxi_addons-nav-P-top |10|10|10|oxi_addons-nav-P-bottom |10|10|10|oxi_addons-nav-P-left |10|10|10|oxi_addons-nav-P-right |10|10|10|oxi_addons-nav-M-top |5|5|5|oxi_addons-nav-M-bottom |5|5|5|oxi_addons-nav-M-left |5|5|5|oxi_addons-nav-M-right |5|5|5|oxi_addons-marge |true|oxi_addons-stagepadding |0|oxi_addons-auto-height |true|oxi_addons-nav-view|1|oxi_addons-pag-view|1|oxi_addons-pag-scale|1|oxi_addons-animation-in|fadeIn|oxi_addons-animation-out|fadeOut|oxi_addons-box-shadow |rgba(0, 0, 0, 0.25)|0|7|25|0|oxi_addons-hover-box-shadow |rgba(255, 255, 255, 1)|0|0|0|0|||#||oxi_addons-nav-left||#||fas fa-angle-left||#||oxi_addons-nav-right||#||fas fa-angle-right||#|| ||#|| ||#||'
    )
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
                        echo '<div class="oxi-addons-col-1"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';

                        echo '<img src="' . $value[0] . '" alt="" width="100%">';
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
                        echo '<div class="oxi-addons-col-1" id="' . $expludedata[2] . '"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo '<img src="' . $value[0] . '" alt="" width="100%">';
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

