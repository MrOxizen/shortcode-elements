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
$freeimport = array('style-1', 'style-2', 'style-3', 'style-4');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file =array(
                'Style 1 OXIIMPORTanimated_textOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddons-font-size|36|36|36| OxiAddons-color |#2d509b|OxiAddons-F-family |Sarabun|bold|OxiAddons-F-style |normal:1.3|center| adddonsSpeed |2000| letterSpeed |70| OxiAddons-F-mode |Indovisual|||#||||#||This is how bubbleText works.||#||Animating each letter in a friendly way||#||Thanks for seeing it :)||#||It really matters to me ...||#||Regards,||#||Guedes, Washington L.||#||||#||||#|| OxiAddons-font-style ||#||||#||Hello, World!||#||||#||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Interface Design||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-magic||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Fully responsive||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-tv||#|| ||#||##OXIDATA##',
                'Style 2 OXIIMPORTanimated_textOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddons-font-size|36|36|36| OxiAddons-color |#2d509b|OxiAddons-F-family |Sarabun|bold|OxiAddons-F-style |normal:1.3|center| adddonsSpeed |2000| letterSpeed |10| OxiAddons-F-mode |Indovisual|||#||||#||This is how bubbleText works.||#||Animating each letter in a friendly way||#||Thanks for seeing it :)||#||It really matters to me ...||#||Regards,||#||Guedes, Washington L.||#||||#||||#|| OxiAddons-font-style ||#||||#||Hello, World!||#||||#||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Interface Design||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-magic||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Fully responsive||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-tv||#|| ||#||##OXIDATA##',
                'Style 3 OXIIMPORTanimated_textOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|oxi-addons-animat-time|3|oxi-addons-text-1st-color |#575757|oxi-addons-text-1st-size|70|0|30|oxi-addons-text-1st-font-family |Initial|700|oxi-addons-text-1st-font-style |normal:1.3|center|oxi-addons-text-2nd-color |#14d1d1|oxi-addons-text-2nd-size|30|0|20|oxi-addons-text-2st-font-family |Initial|100|oxi-addons-text-2st-font-style |normal:1.3|center|||#|| ||#||oxi-addons-text-1st ||#||WelCome In||#||oxi-addons-text-2nd ||#||OxiLab||#|||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Interface Design||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-magic||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Fully responsive||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-tv||#|| ||#||##OXIDATA##',
                'Style 4 OXIIMPORTanimated_textOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|oxi-addons-animat-time|.5|oxi-addons-text-2nd-color |#f52020|oxi-addons-text-2nd-size|50|50|50|oxi-addons-text-2st-font-family |Inherit|600|oxi-addons-text-2st-font-style |normal:1.3|left:0()0()0()#ffffff:|oxi-addons-text-padding-top |0|0|0|oxi-addons-text-padding-bottom |0|0|0|oxi-addons-text-padding-left |0|0|0|oxi-addons-text-padding-right |0|0|0|||#|| ||#||oxi-addons-text ||#||Hello World||#|||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Interface Design||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-magic||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Fully responsive||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-tv||#|| ||#||##OXIDATA##',
                'Style 5 OXIIMPORTanimated_textOXIIMPORTstyle-5OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|oxi-addons-animat-time|1.5|oxi-addons-text-1st-color |#277fd1|oxi-addons-text-1st-size|50|50|50|oxi-addons-text-1st-font-family |Aclonica|600|oxi-addons-text-1st-font-style |normal:1.3|center:0()0()0()#ffffff:1|oxi-addons-padding-top |0|0|0|oxi-addons-padding-bottom |0|0|0|oxi-addons-padding-left |0|0|0|oxi-addons-padding-right |0|0|0|oxi-addons-text-loop |infinite|||#|| ||#||oxi-addons-text-1st ||#||Hello World||#|||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Interface Design||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-magic||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Fully responsive||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-tv||#|| ||#||##OXIDATA##',
                'Style 6 OXIIMPORTanimated_textOXIIMPORTstyle-6OXIIMPORToxi-addons-preview-BG |rgba(150, 150, 150, 1)|oxi-addons-animat-time |10|oxi-addons-animat |stroke-offset|oxi-addons-animat-stroke-size|6|oxi-addons-text-1st-stroke-color |#eb7f7f|oxi-addons-text-2nd-stroke-color |#6edae0|oxi-addons-text-3rd-stroke-color |#5ce091|oxi-addons-text-4th-stroke-color |#be70db|oxi-addons-text-5th-stroke-color |#d9e04c|||||||||||||||||oxi-addons-text-1st-size |.5|oxi-addons-animat-margin-top|-5.5|oxi-addons-animat-margin-bottom|-15.5|oxi-addons-text-2nd-size |.9|||||||#|| ||#||oxi-addons-text-1st ||#||Hello||#||oxi-addons-text-2nd ||#||World||#|||##OXISTYLE##OxiAddInfoBanner-heading-text ||#||Customizable||#||OxiAddInfoBanner-content ||#||Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-edit||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Interface Design||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-magic||#|| ||#||##OXIDATA##OxiAddInfoBanner-heading-text ||#||Fully responsive||#||OxiAddInfoBanner-content ||#||Sed elit purus, blandit in neque sit amet, gravida lobortis velit. Duis semper ipsum augue, non dapibus tellus blandit quis. Cras tempor non mi et vestibulum.||#||OxiAddInfoBanner-i-class ||#||fas fa-tv||#|| ||#||##OXIDATA##',
                'Style 7OXIIMPORTanimated_textOXIIMPORTstyle-7OXIIMPORToxi-addons-preview-BG ||||||OxiAddonsAnimation-G-Padding-top |0|0|0|OxiAddonsAnimation-G-Padding-bottom |0|0|0|OxiAddonsAnimation-G-Padding-left |0|0|0|OxiAddonsAnimation-G-Padding-right |0|0|0|OxiAddonsAnimation-font-size |60|60|60| OxiAddonsAnimation-color |#ff7070|OxiAddonsAnimation-font-family-family |Bree Serif|400|OxiAddonsAnimation-font-family-style |normal:1.3|center:0()1()2()rgba(74, 74, 74, 0.64):2| oxi-addons-select-in-animation |bounceInDown| oxi-addons-select-in-position |shuffle| oxi-addons-select-out-animation |fadeOutRight| oxi-addons-select-out-position |shuffle|||#|| ||#||OxiAddPR-TC-Serial-animate ||#||Bangladesh {{}}Lorem Ipsum||#|||',
                'Style 8OXIIMPORTanimated_textOXIIMPORTstyle-8OXIIMPORToxi-addons-preview-BG ||||||OxiAddonsAnimation-G-Padding-top |0|0|0|OxiAddonsAnimation-G-Padding-bottom |0|0|0|OxiAddonsAnimation-G-Padding-left |0|0|0|OxiAddonsAnimation-G-Padding-right |0|0|0|OxiAddonsAnimation-font-size |100|100|30|OxiAddonsAnimation-font-family-family |Bree Serif|100|OxiAddonsAnimation-font-family-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 1):| OxiAddonsAnimation-color-first |#9825db| OxiAddonsAnimation-color-second |#279616| OxiAddonsAnimation-color-third |#17a5b5| OxiAddonsAnimation-color-fourth |#ff3030| OxiAddonsAnimation-color-fifth |#00f084|||#|| ||#||OxiAddonsAnimation-animate-text ||#||Lorem Ipsum||#|||',
                'Style 9OXIIMPORTanimated_textOXIIMPORTstyle-9OXIIMPORToxi-addons-preview-BG ||||||OxiAddonsAnimation-G-Padding-top |0|0|0|OxiAddonsAnimation-G-Padding-bottom |0|0|0|OxiAddonsAnimation-G-Padding-left |0|0|0|OxiAddonsAnimation-G-Padding-right |0|0|0|OxiAddonsAnimation-font-size |100|100|60|OxiAddonsAnimation-font-family-family |Bree Serif|100|OxiAddonsAnimation-font-family-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 1):1| OxiAddonsAnimation-color-first |#ffffff| OxiAddonsAnimation-color-second |#4897f7|OxiAddonsAnimation-G-margin-top |0|0|0|OxiAddonsAnimation-G-margin-bottom |0|0|0|OxiAddonsAnimation-G-margin-left |10|10|10|OxiAddonsAnimation-G-margin-right |10|10|10|||#|| ||#||OxiAddonsAnimation-animate-text ||#||Johan Due||#|||',
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

