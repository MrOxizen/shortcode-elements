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
$freeimport = array('style-1', 'style-2', 'style-3', 'style-4');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = array(
    'Style 1 Demo 1OXIIMPORTheadingOXIIMPORTstyle-1OXIIMPORToxi_addons-heading-text ||#||This is Heading||#||oxi_addons-heading-text-align |center|oxi-addons-heading-padding-top |0|0|0|oxi-addons-heading-padding-bottom |0|0|0|oxi-addons-heading-padding-left |0|0|0|oxi-addons-heading-padding-right |0|0|0| oxi_addons-heading-font-size |60|60|60| oxi_addons-heading-tag |h2| oxi_addons-heading-color |#252b25| oxi_addons-heading-family |open sans| oxi_addons-heading-font-weight |600| oxi_addons-heading-font-style |initial| oxi_addons-heading-margin-top |0|0|0| oxi_addons-heading-margin-bottom |0|0|0| oxi-addons-heading-border|0|solid|#595959|oxi_addons-heading-animation||:false:false:500:10:0.2|2//|||||||||||||oxi-addons-preview-BG ||',
    'Style 1 Demo 2OXIIMPORTheadingOXIIMPORTstyle-1OXIIMPORToxi_addons-heading-text ||#||This is Heading||#||oxi_addons-heading-text-align |center|oxi-addons-heading-padding-top |0|0|0|oxi-addons-heading-padding-bottom |5|5|5|oxi-addons-heading-padding-left |0|0|0|oxi-addons-heading-padding-right |0|0|0| oxi_addons-heading-font-size |60|60|60| oxi_addons-heading-tag |h1| oxi_addons-heading-color |#2e2a2e| oxi_addons-heading-family |Alegreya+Sans+SC| oxi_addons-heading-font-weight |600| oxi_addons-heading-font-style |normal| oxi_addons-heading-margin-top |0|0|0| oxi_addons-heading-margin-bottom |0|0|0| oxi-addons-heading-border|3|solid|#292729|oxi_addons-heading-animation|swing|0.5:false:false:500:10:0.2|0.7//|||||||||||||oxi-addons-preview-BG ||',
    'Style 2OXIIMPORTheadingOXIIMPORTstyle-2OXIIMPORToxi_addons-heading-text ||#||Create a Heading Style||#||heading-image ||#||https://www.oxilab.org/wp-content/uploads/2019/04/180168-nature-landscape-animals-trees-sunset-silhouette-birds-photo_manipulation-deer-horizon-reflection-orange.jpg||#||oxi_addons-heading-text-align |center|oxi-addons-heading-padding-top |10|10|10|oxi-addons-heading-padding-bottom |10|10|10|oxi-addons-heading-padding-left |0|10|10|oxi-addons-heading-padding-right |10|10|10| oxi_addons-heading-font-size |60|60|60| oxi_addons-heading-tag |h1| || oxi_addons-heading-family |Adamina| oxi_addons-heading-font-weight |bold| oxi_addons-heading-font-style |normal| oxi_addons-heading-margin-top |0|0|0| oxi_addons-heading-margin-bottom |0|0|0| oxi-addons-heading-border|0|solid|#d600c4|oxi_addons-heading-animation|wobble|:false:false:500:10:0.2|2//|||||||||||||oxi-addons-preview-BG ||',
    'Style 3OXIIMPORTheadingOXIIMPORTstyle-3OXIIMPORToxi_addons-heading-text ||#||This Is <span>Headings</span>||#||oxi_addons-heading-text-align |center|oxi-addons-heading-padding-top |0|0|0|oxi-addons-heading-padding-bottom |10|10|10|oxi-addons-heading-padding-left |0|0|0|oxi-addons-heading-padding-right |0|0|0| oxi_addons-heading-font-size |55|55|55| oxi_addons-heading-tag |h1| oxi_addons-heading-color |#595959| oxi_addons-heading-family |Open+Sans| oxi_addons-heading-font-weight |600| oxi_addons-heading-font-style |initial| oxi_addons-heading-margin-top |0|0|0| oxi_addons-heading-margin-bottom |0|0|0| oxi-addons-heading-border|2|solid|#595959|oxi_addons-heading-animation||:false:false:500:10:0.2|2//|oxi_addons-heading-span-color|#d4c711| oxi_addons-heading-span-family |Lato| oxi_addons-heading-span-font-weight |700| oxi_addons-heading-span-font-style |normal|||||oxi-addons-preview-BG ||',
    'Style 4OXIIMPORTheadingOXIIMPORTstyle-4OXIIMPORT||||||||||||||||||||||||||||||||||oxi_addons-heading-font-size|50|50|50| oxi_addons-heading-tag |h1|oxi_addons-heading-color|#6fab30|oxi-addons-heading-font-S-family |Montserrat|600|oxi-addons-heading-font-S-style |normal:1.3|center:1.3()()():|oxi-addons-heading-padding-top |0|10|10|oxi-addons-heading-padding-bottom |0|10|10|oxi-addons-heading-padding-left |0|10|10|oxi-addons-heading-padding-right |0|10|10|oxi_addons-content-font-size|20|20|20|||oxi_addons-content-color|#706868|oxi-addons-content-font-S-family |Amiri|100|oxi-addons-content-font-S-style |normal:1.3|center:1.3()()():|oxi-addons-content-padding-top |0|0|0|oxi-addons-content-padding-bottom |0|0|0|oxi-addons-content-padding-left |0|0|0|oxi-addons-content-padding-right |0|0|0|oxi_addons-heading-animation||:false:false:500:10:0.2|1//|oxi-addons-preview-BG ||||||||||||||||||#||||#||oxi_addons-heading-text ||#||Elementor Builder||#||xi_addons-content-text ||#||Lorem ipsum dolor sit amet, consectetur adipisicin elit sed. For example, helper text on light backgrounds could apply the following opacity levels and default hexes:||#|||',
    'Style 5OXIIMPORTheadingOXIIMPORTstyle-5OXIIMPORToxi-addons-preview-BG ||oxi_addons-heading-font-size|50|30|20|oxi_addons-heading-color|#0f0f0f| oxi_addons-heading-tag |h1| oxi_addons-heading-BG-color|rgba(118, 240, 142, 0.34)|oxi-addons-heading-font-S-family |Aldrich|100|oxi-addons-heading-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-border-C-S |solid|#3eb39c||oxi-addons-heading-margin-top |0|0|0|oxi-addons-heading-margin-bottom |0|0|0|oxi-addons-heading-margin-left |0|0|0|oxi-addons-heading-margin-right |0|0|0|oxi-addons-heading-padding-top |10|10|10|oxi-addons-heading-padding-bottom |10|10|10|oxi-addons-heading-padding-left |20|20|20|oxi-addons-heading-padding-right |20|20|20|oxi_addons-content-font-size|22|22|22|oxi_addons-content-color|#3d3b3b|oxi-addons-content-font-S-family |Abel|100|oxi-addons-content-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-content-padding-top |10|10|10|oxi-addons-content-padding-bottom |0|0|0|oxi-addons-content-padding-left |0|0|0|oxi-addons-content-padding-right |0|0|0|oxi_addons-heading-animation||0:false:false:500:10:0.2|0//|oxi-addons-heading-border-height |5|5|5|||||oxi-addons-main-border-width |5|5|5| oxi_addons-heading-border-color|rgba(124, 235, 147, 1)|||||||||||||||||#||||#||oxi_addons-heading-text ||#||Middle Align Heading||#||xi_addons-content-text ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut blandit tortor. Nam ac sodales lectus. Donec tincidunt magna lorem||#|||',
    'Style 6OXIIMPORTheadingOXIIMPORTstyle-6OXIIMPORT||||||||||||||||||||||||||||||||||oxi_addons-heading-font-size|50|40|35| oxi_addons-heading-tag |h1|oxi_addons-heading-color|#000000|oxi-addons-heading-font-S-family |Raleway|600|oxi-addons-heading-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-heading-padding-top |10|10|10|oxi-addons-heading-padding-bottom |10|10|10|oxi-addons-heading-padding-left |10|10|10|oxi-addons-heading-padding-right |10|10|10|oxi_addons-content-font-size|22|18|15|||oxi_addons-content-color|#2b2a2a|oxi-addons-content-font-S-family |Montserrat|600|oxi-addons-content-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-content-padding-top |10|10|10|oxi-addons-content-padding-bottom |10|10|10|oxi-addons-content-padding-left |10|10|10|oxi-addons-content-padding-right |10|10|10|oxi_addons-heading-animation|pulse|1:false:false:500:10:0.2|0.2//|oxi-addons-bg-img-padding-top |0|0|0|oxi-addons-bg-img-padding-bottom |0|0|0|oxi-addons-bg-img-padding-left |0|0|0|oxi-addons-bg-img-padding-right |0|0|0|oxi-addons-preview-BG ||||||||||||||||||#||||#||oxi_addons-heading-text ||#||Middle <span style="color:#902712;"> Align </span> Heading||#||oxi_addons-content-text ||#||SUB TITLE HERE||#||oxi-add-bg-img ||#||https://www.oxilab.org/wp-content/uploads/2019/03/maxresdefault-1.jpg||#|||',
    'Style 7OXIIMPORTheadingOXIIMPORTstyle-7OXIIMPORT||oxi-addons-G-padding-top |0|0|0|oxi-addons-G-padding-bottom |0|0|0|oxi-addons-G-padding-left |0|0|0|oxi-addons-G-padding-right |0|0|0|oxi_addons-G-margin-top |0|0|0|oxi_addons-G-margin-bottom |0|0|0|oxi_addons-G-margin-left |0|0|0|oxi_addons-G-margin-right |0|0|0|oxi_addons-heading-font-size|50|40|35| oxi_addons-heading-tag |h1|oxi_addons-heading-color|#121212|oxi-addons-heading-font-S-family |Aldrich|100|oxi-addons-heading-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-heading-padding-top |0|0|0|oxi-addons-heading-padding-bottom |0|0|0|oxi-addons-heading-padding-left |0|0|0|oxi-addons-heading-padding-right |0|0|0|oxi_addons-content-font-size|22|18|15|||oxi_addons-content-color|#383737|oxi-addons-content-font-S-family |Montserrat|bold|oxi-addons-content-font-S-style |italic:1.3|center:0()0()2()#ffffff:|oxi-addons-content-padding-top |10|10|10|oxi-addons-content-padding-bottom |10|10|10|oxi-addons-content-padding-left |10|10|10|oxi-addons-content-padding-right |10|10|10|oxi_addons-heading-animation||:false:false:500:10:0.2|//|oxi-addons-bg-img-padding-top |-40|-40|-40|oxi-addons-bg-img-padding-bottom |-45|-45|-45|oxi-addons-bg-img-padding-left |0|0|0|oxi-addons-bg-img-padding-right |0|0|0|oxi-addons-preview-BG ||oxi-addons-image-align|center|oxi-addons-img-width |400|100|80|oxi-addons-img-height |100|80|100|oxi-addons-bg-img-position |2|||||||#||||#||oxi_addons-heading-text ||#||Middle Align Heading||#||oxi_addons-content-text ||#||SUB TITLE HERE||#||oxi-add-bg-img ||#||https://www.oxilab.org/wp-content/uploads/2019/03/divider-2461548__340.png||#|||',
    'Style 8OXIIMPORTheadingOXIIMPORTstyle-8OXIIMPORT||||||||||||||||||||||||||||||||||oxi_addons-heading-font-size|50|40|35| oxi_addons-heading-tag |h1|oxi_addons-heading-color|#141414|oxi-addons-heading-font-S-family |Lato|100|oxi-addons-heading-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-heading-padding-top |0|0|0|oxi-addons-heading-padding-bottom |0|0|0|oxi-addons-heading-padding-left |0|0|0|oxi-addons-heading-padding-right |0|0|0|oxi_addons-content-font-size|22|20|15|||oxi_addons-content-color|#333131|oxi-addons-content-font-S-family |Raleway|500|oxi-addons-content-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-content-padding-top |0|0|0|oxi-addons-content-padding-bottom |0|0|0|oxi-addons-content-padding-left |0|0|0|oxi-addons-content-padding-right |0|0|0|oxi_addons-heading-animation||1:false:false:500:10:0.2|1//|oxi-addons-preview-BG ||oxi_addons-watermark-font-size|115|80|50|||oxi_addons-watermark-color |rgba(50, 132, 153, 0.2)|oxi-addons-watermark-font-S-family |Alegreya Sans SC|600|oxi-addons-watermark-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-watermark-padding-top |41|41|41|oxi-addons-watermark-padding-bottom |0|0|0|oxi-addons-watermark-padding-left |0|0|0|oxi-addons-watermark-padding-right |0|0|0|||||||||||||||||#||||#||oxi_addons-heading-text ||#||Elementor Align Heading||#||xi_addons-content-text ||#||SUB TITLE HERE||#||xi_addons-watermark-text ||#||Elementor||#|||',
    'Style 9OXIIMPORTheadingOXIIMPORTstyle-9OXIIMPORT||||||||||||||||||||||||||||||||||oxi_addons-heading-font-size|50|40|35| oxi_addons-heading-tag |h1|oxi_addons-heading-color|#1f0c0c|oxi-addons-heading-font-S-family |Alegreya Sans SC|100|oxi-addons-heading-font-S-style |normal:1.3|left:0()0()2()#ffffff:|oxi-addons-heading-padding-top |0|0|0|oxi-addons-heading-padding-bottom |0|0|0|oxi-addons-heading-padding-left |0|0|0|oxi-addons-heading-padding-right |0|0|0|oxi_addons-content-font-size|22|20|15|||oxi_addons-content-color|#4d4d4d|oxi-addons-content-font-S-family |Raleway|100|oxi-addons-content-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-content-padding-top |0|0|0|oxi-addons-content-padding-bottom |0|0|0|oxi-addons-content-padding-left |0|0|0|oxi-addons-content-padding-right |0|0|0|oxi_addons-heading-animation||1:false:false:500:10:0.2|.5//|oxi-addons-preview-BG ||||||oxi-addons-heading-line-color|rgba(212, 55, 55, 1)|oxi-addons-heading-line-width |100|50|30|oxi-addons-heading-line-height |3|3|3|||||||||||||||||#||||#||oxi_addons-heading-text ||#||Middle Align Heading||#||oxi_addons-content-text ||#||SUBTITLE||#|||',
    'Style 10OXIIMPORTheadingOXIIMPORTstyle-10OXIIMPORT||||||||||||||||||oxi_addons-line-margin-top |0|0|0|oxi_addons-line-margin-bottom |0|0|0|oxi_addons-line-margin-left |0|0|0|oxi_addons-line-margin-right |0|0|0|oxi_addons-heading-font-size|50|40|35| oxi_addons-heading-tag |h1|oxi_addons-heading-color|#1a1919|oxi-addons-heading-font-S-family |Belleza|100|oxi-addons-heading-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-heading-padding-top |0|0|0|oxi-addons-heading-padding-bottom |0|0|0|oxi-addons-heading-padding-left |10|10|10|oxi-addons-heading-padding-right |10|10|10|oxi_addons-content-font-size|22|20|15|||oxi_addons-content-color|#424141|oxi-addons-content-font-S-family |open sans|100|oxi-addons-content-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-content-padding-top |0|0|0|oxi-addons-content-padding-bottom |0|0|0|oxi-addons-content-padding-left |10|10|10|oxi-addons-content-padding-right |10|10|10|oxi_addons-heading-animation||1:false:false:500:10:0.2|1//|oxi-addons-preview-BG |rgba(252, 252, 252, 1)|oxi-addons-heading-line-color |rgba(135, 135, 135, 1)|oxi-addons-heading-line-width |130|oxi-addons-heading-line-height|3|oxi-addons-line-position|3|||||||||||||||||#||||#||oxi_addons-heading-text ||#||Daily Design Showcase||#||xi_addons-content-text ||#||Lorem ipsum||#|||',
    'Style 11OXIIMPORTheadingOXIIMPORTstyle-11OXIIMPORToxi-addons-preview-BG |rgba(219, 219, 219, 0.39)|oxi_addons-heading-font-size|50|30|25|oxi_addons-heading-color|#1f1f1f| oxi_addons-heading-tag |h4| oxi_addons-heading-BG-color|rgba(60, 217, 123, 1)|oxi-addons-heading-font-S-family |ABeeZee|500|oxi-addons-heading-font-S-style |normal:1.3|center:0()0()2()#ffffff:|oxi-addons-border-C-S |solid|#34c76a||oxi-addons-border-width |2|2|2|||||||||||||oxi-addons-heading-padding-top |0|0|0|oxi-addons-heading-padding-bottom |5|5|5|oxi-addons-heading-padding-left |10|10|10|oxi-addons-heading-padding-right |20|20|20|oxi_addons-content-font-size|16|16|16|oxi_addons-content-color|#545151|oxi-addons-content-font-S-family |Montserrat|100|oxi-addons-content-font-S-style |normal:1.3|center:0()0()0()#ffffff:|oxi-addons-content-padding-top |8|8|8|oxi-addons-content-padding-bottom |0|0|0|oxi-addons-content-padding-left |0|0|0|oxi-addons-content-padding-right |0|0|0|oxi_addons-heading-animation||0:false:false:500:10:0.2|0//|||||||||||||||||#||||#||oxi_addons-heading-text ||#||Heading||#||xi_addons-content-text ||#||Lorem ipsum dolor sit amet, consectetur adipisicin elit sed.Lorem ipsum dolor sit amet, consectetur adipisicin elit sed.Lorem ipsum dolor sit amet, consectetur adipisicin elit sed.||#|||',
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
