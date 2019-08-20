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
$freeimport = array('style-1','style-2');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = array(
    'Style 1OXIIMPORTinfo_image_boxesOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddonsInfoImageBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1| OxiAddonsInfoImageBoxes-G-BG |rgba(255,255,255,1.00)|OxiAddonsInfoImageBoxes-G-B |0|none|| OxiAddonsInfoImageBoxes-G-BC |#ffffff|OxiAddonsInfoImageBoxes-G-BR-top |0|0|0|OxiAddonsInfoImageBoxes-G-BR-bottom |0|0|0|OxiAddonsInfoImageBoxes-G-BR-left |0|0|0|OxiAddonsInfoImageBoxes-G-BR-right |0|0|0|OxiAddonsInfoImageBoxes-G-P-top |20|20|20|OxiAddonsInfoImageBoxes-G-P-bottom |40|40|40|OxiAddonsInfoImageBoxes-G-P-left |10|10|10|OxiAddonsInfoImageBoxes-G-P-right |10|10|10|OxiAddonsInfoImageBoxes-G-M-top |10|10|10|OxiAddonsInfoImageBoxes-G-M-bottom |10|10|10|OxiAddonsInfoImageBoxes-G-M-left |10|10|10|OxiAddonsInfoImageBoxes-G-M-right |10|10|10| OxiAddonsInfoImageBoxes-animation||0.5:false:false:500:10:0.2|0.5//||OxiAddonsInfoImageBoxes-BS |rgba(255, 255, 255, 1)|0|0|0|0|OxiAddonsInfoImageBoxes-IMG-width |78|78|78|OxiAddonsInfoImageBoxes-IMG-height |104|104|104| oxiAddonsInfoImageBoxes-IMG-PS |center| OxiAddonsInfoImageBoxes-IMG-Bg |rgba(13,171,179,0.00)|OxiAddonsInfoImageBoxes-IMG-B |1|none|| OxiAddonsInfoImageBoxes-IMG-BC |#e6e6e6|OxiAddonsInfoImageBoxes-IMG-radius-top |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-bottom |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-left |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-right |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-top |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-bottom |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-left |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-right |0|0|0|OxiAddonsInfoImageBoxes-I-BS |rgba(255, 255, 255, 1)|0|0|0|0|OxiAddonsInfoImageBoxes-H-FS |28|28|28| OxiAddonsInfoImageBoxes-H-C |#333333|OxiAddonsInfoImageBoxes-H-F-family |Lato|700|OxiAddonsInfoImageBoxes-H-F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsInfoImageBoxes-H-P-top |9|9|9|OxiAddonsInfoImageBoxes-H-P-bottom |9|9|9|OxiAddonsInfoImageBoxes-H-P-left |9|9|9|OxiAddonsInfoImageBoxes-H-P-right |9|9|9|OxiAddonsInfoImageBoxes-H-Span-FS |26|26|26| OxiAddonsInfoImageBoxes-H-C |#006eeb|||||||OxiAddonsInfoImageBoxes-SD-FS |18|18|18| OxiAddonsInfoImageBoxes-SD-C |#7a7a7a|OxiAddonsInfoImageBoxes-SD-F-family |Roboto|100|OxiAddonsInfoImageBoxes-SD-F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsInfoImageBoxes-SD-P-top |10|10|10|OxiAddonsInfoImageBoxes-SD-P-bottom |10|10|10|OxiAddonsInfoImageBoxes-SD-P-left |10|10|10|OxiAddonsInfoImageBoxes-SD-P-right |10|10|10|OxiAddonsInfoImageBoxes-H-BS |rgba(137, 173, 255, 0.35)|0|10|55|5||##OXISTYLE##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/landing-icon-13-hover15841.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||<span>One click</span> Export||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||Contrary to popular belief, Lorem Ipsum is not simply random text.||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||_blank||#|| ||#||##OXIDATA##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/landing-icon-20-hover568.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||<span>Creative </span> Design||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||Contrary to popular belief, Lorem Ipsum is not simply random text.||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||||#|| ||#||##OXIDATA##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/landing-icon-16-hover.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||<span>Lorem</span> Ipsum||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||Contrary to popular belief, Lorem Ipsum is not simply random text.||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||||#|| ||#||##OXIDATA##',
    'Style 2OXIIMPORTinfo_image_boxesOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddonsInfoImageBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1| OxiAddonsInfoImageBoxes-G-BG |rgba(255,255,255,0.00)|OxiAddonsInfoImageBoxes-G-B |1|none|| OxiAddonsInfoImageBoxes-G-BC |#f5c9c9|OxiAddonsInfoImageBoxes-G-BR-top |0|0|0|OxiAddonsInfoImageBoxes-G-BR-bottom |0|0|0|OxiAddonsInfoImageBoxes-G-BR-left |0|0|0|OxiAddonsInfoImageBoxes-G-BR-right |0|0|0|OxiAddonsInfoImageBoxes-G-P-top |20|20|20|OxiAddonsInfoImageBoxes-G-P-bottom |20|20|20|OxiAddonsInfoImageBoxes-G-P-left |10|10|10|OxiAddonsInfoImageBoxes-G-P-right |10|10|10|OxiAddonsInfoImageBoxes-G-M-top |0|0|0|OxiAddonsInfoImageBoxes-G-M-bottom |0|0|0|OxiAddonsInfoImageBoxes-G-M-left |0|0|0|OxiAddonsInfoImageBoxes-G-M-right |0|0|0| OxiAddonsInfoImageBoxes-animation||0.5:false:false:500:10:0.2|0.5//||OxiAddonsInfoImageBoxes-BS |rgba(252, 252, 252, 1)|0|0|0|0|OxiAddonsInfoImageBoxes-IMG-width |50|50|50|OxiAddonsInfoImageBoxes-IMG-height |50|50|50| oxiAddonsInfoImageBoxes-IMG-PS |top| OxiAddonsInfoImageBoxes-IMG-Bg |rgba(255,74,171,0.00)|OxiAddonsInfoImageBoxes-IMG-B |1|none|| OxiAddonsInfoImageBoxes-IMG-BC |#e6e6e6|OxiAddonsInfoImageBoxes-IMG-radius-top |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-bottom |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-left |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-right |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-top |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-bottom |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-left |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-right |0|0|0|OxiAddonsInfoImageBoxes-I-BS |rgba(255, 255, 255, 1)|0|0|0|0|OxiAddonsInfoImageBoxes-H-FS |26|26|26| OxiAddonsInfoImageBoxes-H-C |#666666|OxiAddonsInfoImageBoxes-H-F-family |Open+Sans|700|OxiAddonsInfoImageBoxes-H-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsInfoImageBoxes-H-P-top |0|0|0|OxiAddonsInfoImageBoxes-H-P-bottom |10|10|10|OxiAddonsInfoImageBoxes-H-P-left |10|10|10|OxiAddonsInfoImageBoxes-H-P-right |5|5|5|OxiAddonsInfoImageBoxes-H-Span-FS |24|24|24| OxiAddonsInfoImageBoxes-H-C |#2382cf|||||||OxiAddonsInfoImageBoxes-SD-FS |18|18|18| OxiAddonsInfoImageBoxes-SD-C |#666666|OxiAddonsInfoImageBoxes-SD-F-family |Roboto|100|OxiAddonsInfoImageBoxes-SD-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsInfoImageBoxes-SD-P-top |5|5|5|OxiAddonsInfoImageBoxes-SD-P-bottom |5|5|5|OxiAddonsInfoImageBoxes-SD-P-left |10|10|10|OxiAddonsInfoImageBoxes-SD-P-right |5|5|5|OxiAddonsInfoImageBoxes-H-BS |rgba(184, 184, 184, 1)|0|0|0|0| oxiAddonsInfoImageBoxes-IMG-PS-horizoltal |left||##OXISTYLE##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/helicopter.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||<span>TrackList</span> Returns||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||||#|| ||#||##OXIDATA##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/1631728.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||<span>Creative </span> Design||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||||#|| ||#||##OXIDATA##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/nurse.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||<span>Registered </span> Nurse||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||||#|| ||#||##OXIDATA##',
    'Style 3OXIIMPORTinfo_image_boxesOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddonsInfoImageBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1| OxiAddonsInfoImageBoxes-G-BG |linear-gradient(90deg, rgba(0,212,245,1.00) 0%,rgba(3,95,217,0.96) 100%)|OxiAddonsInfoImageBoxes-G-B |0|none|| OxiAddonsInfoImageBoxes-G-BC |#ffffff|OxiAddonsInfoImageBoxes-G-BR-top |0|0|0|OxiAddonsInfoImageBoxes-G-BR-bottom |0|0|0|OxiAddonsInfoImageBoxes-G-BR-left |0|0|0|OxiAddonsInfoImageBoxes-G-BR-right |0|0|0|OxiAddonsInfoImageBoxes-G-P-top |20|20|20|OxiAddonsInfoImageBoxes-G-P-bottom |20|20|20|OxiAddonsInfoImageBoxes-G-P-left |10|10|10|OxiAddonsInfoImageBoxes-G-P-right |10|10|10|OxiAddonsInfoImageBoxes-G-M-top |13|13|13|OxiAddonsInfoImageBoxes-G-M-bottom |13|13|13|OxiAddonsInfoImageBoxes-G-M-left |13|13|13|OxiAddonsInfoImageBoxes-G-M-right |13|13|13| OxiAddonsInfoImageBoxes-animation||0.5:false:false:500:10:0.2|0.5//||OxiAddonsInfoImageBoxes-BS |rgba(214, 214, 214, 0.7)|0|5|10|0|OxiAddonsInfoImageBoxes-IMG-width |100|100|100|OxiAddonsInfoImageBoxes-IMG-height |100|100|100| oxiAddonsInfoImageBoxes-IMG-PS |center| OxiAddonsInfoImageBoxes-IMG-Bg |rgba(255,74,171,0.00)|OxiAddonsInfoImageBoxes-IMG-B |1|none|| OxiAddonsInfoImageBoxes-IMG-BC |#e6e6e6|OxiAddonsInfoImageBoxes-IMG-radius-top |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-bottom |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-left |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-right |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-top |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-bottom |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-left |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-right |0|0|0|OxiAddonsInfoImageBoxes-I-BS |rgba(255, 255, 255, 1)|0|0|0|0|OxiAddonsInfoImageBoxes-H-FS |26|26|26| OxiAddonsInfoImageBoxes-H-C |#ffffff|OxiAddonsInfoImageBoxes-H-F-family |Roboto|700|OxiAddonsInfoImageBoxes-H-F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsInfoImageBoxes-H-P-top |10|10|10|OxiAddonsInfoImageBoxes-H-P-bottom |10|10|10|OxiAddonsInfoImageBoxes-H-P-left |10|10|10|OxiAddonsInfoImageBoxes-H-P-right |5|5|5||||| ||||||||OxiAddonsInfoImageBoxes-SD-FS |18|18|18| OxiAddonsInfoImageBoxes-SD-C |#ffffff|OxiAddonsInfoImageBoxes-SD-F-family |Roboto|300|OxiAddonsInfoImageBoxes-SD-F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsInfoImageBoxes-SD-P-top |5|5|5|OxiAddonsInfoImageBoxes-SD-P-bottom |5|5|5|OxiAddonsInfoImageBoxes-SD-P-left |10|10|10|OxiAddonsInfoImageBoxes-SD-P-right |5|5|5|OxiAddonsInfoImageBoxes-H-BS |rgba(222, 222, 222, 1)|0|8|12|0| OxiAddonsInfoImageBoxes-G-hover-BG |linear-gradient(90deg, rgba(2,179,176,1.00) 0%,rgba(0,191,48,0.96) 98%)| OxiAddonsInfoImageBoxes-H-hover-C |#ffffff| OxiAddonsInfoImageBoxes-SD-hover-C |#ffffff||##OXISTYLE##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/kisspng-responsive-web-design-web-development-computer-ico-marketplace-5ac080d79e7ac6.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||Web Design||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||_blank||#|| ||#||##OXIDATA##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/Developers-01.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||Development||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||||#|| ||#||##OXIDATA##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/write.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||Graphic Design||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||||#|| ||#||##OXIDATA##',
    'Style 4OXIIMPORTinfo_image_boxesOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddonsInfoImageBoxes-rows |oxi-addons-lg-col-2|oxi-addons-md-col-1|oxi-addons-xs-col-1| OxiAddonsInfoImageBoxes-G-BG |linear-gradient(45deg, rgba(214,0,182,1.00) 0%,rgba(255,66,66,0.93) 100%)|OxiAddonsInfoImageBoxes-G-B ||dotted|| OxiAddonsInfoImageBoxes-G-BC ||OxiAddonsInfoImageBoxes-G-BR-top |5|5|5|OxiAddonsInfoImageBoxes-G-BR-bottom |5|5|5|OxiAddonsInfoImageBoxes-G-BR-left |5|5|5|OxiAddonsInfoImageBoxes-G-BR-right |5|5|5|OxiAddonsInfoImageBoxes-G-P-top |30|30|30|OxiAddonsInfoImageBoxes-G-P-bottom |30|30|30|OxiAddonsInfoImageBoxes-G-P-left |10|10|10|OxiAddonsInfoImageBoxes-G-P-right |10|10|10|OxiAddonsInfoImageBoxes-G-M-top |10|10|10|OxiAddonsInfoImageBoxes-G-M-bottom |10|10|10|OxiAddonsInfoImageBoxes-G-M-left |10|10|10|OxiAddonsInfoImageBoxes-G-M-right |10|10|10| OxiAddonsInfoImageBoxes-animation||0.5:false:false:500:10:0.2|0.5//||OxiAddonsInfoImageBoxes-BS |rgba(0, 0, 0, 0.21)|0|0|15|0|OxiAddonsInfoImageBoxes-IMG-width |90|90|90|OxiAddonsInfoImageBoxes-IMG-height |90|90|90| oxiAddonsInfoImageBoxes-IMG-PS |top| OxiAddonsInfoImageBoxes-IMG-Bg |rgba(255,74,171,0.00)|OxiAddonsInfoImageBoxes-IMG-B |1|none|| OxiAddonsInfoImageBoxes-IMG-BC |#e6e6e6|OxiAddonsInfoImageBoxes-IMG-radius-top |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-bottom |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-left |0|0|0|OxiAddonsInfoImageBoxes-IMG-radius-right |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-top |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-bottom |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-left |0|0|0|OxiAddonsInfoImageBoxes-IMG-P-right |0|0|0|OxiAddonsInfoImageBoxes-I-BS |rgba(255, 255, 255, 1)|0|0|0|0|OxiAddonsInfoImageBoxes-H-FS |26|25|22| OxiAddonsInfoImageBoxes-H-C |#ffffff|OxiAddonsInfoImageBoxes-H-F-family |Roboto|700|OxiAddonsInfoImageBoxes-H-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsInfoImageBoxes-H-P-top |0|0|0|OxiAddonsInfoImageBoxes-H-P-bottom |10|10|10|OxiAddonsInfoImageBoxes-H-P-left |15|15|15|OxiAddonsInfoImageBoxes-H-P-right |5|5|5|||||||||||||OxiAddonsInfoImageBoxes-SD-FS |18|16|14| OxiAddonsInfoImageBoxes-SD-C |#ffffff|OxiAddonsInfoImageBoxes-SD-F-family |Roboto|100|OxiAddonsInfoImageBoxes-SD-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsInfoImageBoxes-SD-P-top |5|5|5|OxiAddonsInfoImageBoxes-SD-P-bottom |5|5|5|OxiAddonsInfoImageBoxes-SD-P-left |15|15|15|OxiAddonsInfoImageBoxes-SD-P-right |5|5|5|OxiAddonsInfoImageBoxes-H-BS |rgba(222, 222, 222, 1)|0|8|12|0| oxiAddonsInfoImageBoxes-IMG-PS-horizoltal |left| OxiAddonsInfoImageBoxes-G-hover-BG |linear-gradient(225deg, rgba(19,191,47,1.00) 0%,rgba(30,157,168,1.00) 100%)| OxiAddonsInfoImageBoxes-H-hover-C |#ffffff| OxiAddonsInfoImageBoxes-SD-hover-C |#ffffff||##OXISTYLE##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/promotion.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||Lorem Ipsum||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||||#|| ||#||##OXIDATA##OxiAddonsInfoImageBoxes-BG ||#||https://www.oxilab.org/wp-content/uploads/2019/04/Developers-01.png||#|| OxiAddonsInfoImageBoxes-H-TB ||#||Returns Audio||#|| OxiAddonsInfoImageBoxes-SD-TA ||#||It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.||#|| OxiAddonsInfoImageBoxes-Info-Link ||#||#||#|| OxiAddonsInfoImageBoxes-Info-Tab ||#||||#|| ||#||##OXIDATA##',
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
