   
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
    array(
        'https://www.shortcode-addons.com/wp-content/uploads/2019/07/1-Screenshot_2019-07-03-Available-Shortcodes-‹-admins-Blog-—-WordPress3.png',
    'Style 1OXIIMPORTgoogle_mapOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(250,250,250,1.00)|OxiAdd_gmap_width|100|100|100|OxiAdd_gmap_height|400|400|400|OxiAdd_gmap_padding-top |0|0|0|OxiAdd_gmap_padding-bottom |0|0|0|OxiAdd_gmap_padding-left |0|0|0|OxiAdd_gmap_padding-right |0|0|0|OxiAdd_gmap_margin-top |0|0|0|OxiAdd_gmap_margin-bottom |0|0|0|OxiAdd_gmap_margin-left |0|0|0|OxiAdd_gmap_margin-right |0|0|0|||||oxiAdd_gMap_linfo_FS-family |Arimo|100|oxiAdd_gMap_linfo_FS-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_gMap_animation||1:false:false:500:10:0.2|.5//|OxiAdd_gMap_zoom_level |14|OxiAdd_gMap_location_lat |23.745236|OxiAdd_gMap_location_lng |90.419740|OxiAdd_gMap_Api_Key |AIzaSyDlAo5x-hJzaQvHIUEBjzw0rNkpvbOY2d4|OxiAdd_gMap_marker_animet |1|Oxi_add_gMap_info_text_Font_size |14|oxi_add_gMap_info_window_width |200|oxi_add_gMap_info_window_height |100|Oxi_add_gMap_info_text_color |#c25555|||||||||||||||||||||||||#|| ||#||||#|| ||#||OxiAdd_place_title||#||Location title||#||OxiAdd_gMap_location_info||#||<h3>Heading </h3> <hr> Always set the map height explicitly to define the size of the div * element that contains the map.Always set the map height explicitly to define the size of the div * element that contains the map.Always set the map height explicitly to define the size of the div * element that contains the map.||#||||#|| ||#|||',
    ),
    array(
        'https://www.shortcode-addons.com/wp-content/uploads/2019/07/2-Screenshot_2019-07-03-Available-Shortcodes-‹-admins-Blog-—-WordPress2.png',
    'Style 2OXIIMPORTgoogle_mapOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255,250,250,1.00)|OxiAdd_gmap_width|100|100|100|OxiAdd_gmap_height|400|400|400|OxiAdd_gmap_padding-top |0|0|0|OxiAdd_gmap_padding-bottom |0|0|0|OxiAdd_gmap_padding-left |0|0|0|OxiAdd_gmap_padding-right |0|0|0|OxiAdd_gmap_margin-top |0|0|0|OxiAdd_gmap_margin-bottom |0|0|0|OxiAdd_gmap_margin-left |0|0|0|OxiAdd_gmap_margin-right |0|0|0|||||oxiAdd_gMap_linfo_FS-family |Arimo|100|oxiAdd_gMap_linfo_FS-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_gMap_animation||1:false:false:500:10:0.2|.5//|OxiAdd_gMap_zoom_level |14|OxiAdd_gMap_location_lat |23.8019584|OxiAdd_gMap_location_lng |90.3585545|OxiAdd_gMap_Api_Key |AIzaSyDd40qP9Qll71WJ0IBZtUrtAs--klcYLNo|OxiAdd_gMap_marker_animet |1|Oxi_add_gMap_info_text_Font_size |14|oxi_add_gMap_info_window_width |200|oxi_add_gMap_info_window_height |100|Oxi_add_gMap_info_text_color |#c25555|||||||||||||||||||||||||#|| ||#||||#|| ||#||OxiAdd_place_title||#||Location title||#||OxiAdd_gMap_location_info||#||<h3>Heading </h3> <hr> Always set the map height explicitly to define the size of the div * element that contains the map.Always set the map height explicitly to define the size of the div * element that contains the map.Always set the map height explicitly to define the size of the div * element that contains the map.||#||||#|| ||#|||',
    ),
    array(
        'https://www.shortcode-addons.com/wp-content/uploads/2019/07/3-Screenshot_2019-07-03-Available-Shortcodes-‹-admins-Blog-—-WordPress.png',
    'Style 3OXIIMPORTgoogle_mapOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(217,217,217,1.00)|OxiAdd_gMap_Api_Key |AIzaSyDd40qP9Qll71WJ0IBZtUrtAs--klcYLNo|OxiAdd_gmap_width|100|100|100|OxiAdd_gmap_height|400|400|400|||||||||||||||||||||||||||||||||OxiAdd_gMap_animation||10:false:false:500:10:0.2|10//|OxiAdd_gMap_zoom_level |14|Oxi_add_gMap_info_text_Font_size |15|oxi_add_gMap_info_window_width |250|||Oxi_add_gMap_info_text_color |#5c5c5c|oxiAdd_gMap_linfo_FS-family |Voltaire|100|oxiAdd_gMap_linfo_FS-style |normal:1.3|center:0()0()0()rgba(255, 255, 255, 0):|oxi-addons-gMaps-theme |2|oxi_addons_gMap_DefaultUI|false||||||||||##OXISTYLE##Oxi_add_gMap_Lat ||#||23.81123||#|| Oxi_add_gMap_lng ||#||90.356966||#|| Oxi_add_gMap_Location_title ||#||title 1||#|| Oxi_add_gMap_Location_information ||#||<h4>Google Map</h4> <hr> A very powerful Google Map implementation for Elementor with 8+ Map Types including Basic with Marker, Multiple Markers, Static, Polylines, Polygons, Overlay, Panorama and with Routes.A very powerful Google Map implementation for Elementor with 8+ Map Types including Basic with Marker, Multiple Markers, Static, Polylines, Polygons, Overlay, Panorama and with Routes.||#|| Oxi_add_gMap_icon_img ||#||https://www.oxilab.org/wp-content/uploads/2019/06/pointer-cross-christian-sign-map-place-church-512-e1560926589230.png||#|| Oxi_add_gMap_Location_Name ||#||Location 1||#|| ||#|| ||#|| ||#|| ||#|| ||#||##OXIDATA##Oxi_add_gMap_Lat ||#||23.802212||#|| Oxi_add_gMap_lng ||#||90.369305||#|| Oxi_add_gMap_Location_title ||#||title 2||#|| Oxi_add_gMap_Location_information ||#||<h4>Google Map</h4> <hr> A very powerful Google Map implementation for||#|| Oxi_add_gMap_icon_img ||#||https://www.oxilab.org/wp-content/uploads/2019/06/pointer-cross-christian-sign-map-place-church-512-e1561014250852.png||#|| Oxi_add_gMap_Location_Name ||#||Location 2||#|| ||#|| ||#|| ||#|| ||#|| ||#||##OXIDATA##Oxi_add_gMap_Lat ||#||23.79933||#|| Oxi_add_gMap_lng ||#||90.363782||#|| Oxi_add_gMap_Location_title ||#||title 3||#|| Oxi_add_gMap_Location_information ||#||info 3||#|| Oxi_add_gMap_icon_img ||#||https://www.oxilab.org/wp-content/uploads/2019/06/pointer-cross-christian-sign-map-place-church-512-e1561014250852.png||#|| Oxi_add_gMap_Location_Name ||#||Location 3||#|| ||#|| ||#|| ||#|| ||#|| ||#||##OXIDATA##Oxi_add_gMap_Lat ||#||23.805874||#|| Oxi_add_gMap_lng ||#||90.3333||#|| Oxi_add_gMap_Location_title ||#||title 4||#|| Oxi_add_gMap_Location_information ||#||<h4>Google Map</h4> <hr> A very powerful Google Map implementation for Elementor with 8+ Map Types including Basic with Marker, Multiple Markers, Static, Polylines, Polygons, Overlay, Panorama and with Routes.A very powerful Google Map implementation for Elementor with 8+ Map Types including Basic with Marker, Multiple Markers, Static, Polylines, Polygons, Overlay, Panorama and with Routes.||#|| Oxi_add_gMap_icon_img ||#||||#|| Oxi_add_gMap_Location_Name ||#||Location 4||#|| ||#|| ||#|| ||#|| ||#|| ||#||##OXIDATA##',
    ),
    array(
        'https://www.shortcode-addons.com/wp-content/uploads/2019/07/4-Screenshot_2019-07-03-Available-Shortcodes-‹-admins-Blog-—-WordPress1.png',
    'Style 4OXIIMPORTgoogle_mapOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAdd_gmap_width|50|50|50|OxiAdd_gmap_height|400|400|400|OxiAdd_gmap_padding-top |0|0|0|OxiAdd_gmap_padding-bottom |0|0|0|OxiAdd_gmap_padding-left |0|0|0|OxiAdd_gmap_padding-right |0|0|0|OxiAdd_gmap_margin-top |0|0|0|OxiAdd_gmap_margin-bottom |0|0|0|OxiAdd_gmap_margin-left |0|0|0|OxiAdd_gmap_margin-right |0|0|0|||||oxiAdd_gMap_linfo_FS-family |Arimo|100|oxiAdd_gMap_linfo_FS-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_gMap_animation||1:false:false:500:10:0.2|.5//|OxiAdd_gMap_zoom_level |14|OxiAdd_gMap_location_lat |23.8019584|OxiAdd_gMap_location_lng |90.3585545|OxiAdd_gMap_Api_Key |AIzaSyDlAo5x-hJzaQvHIUEBjzw0rNkpvbOY2d4|OxiAdd_gMap_marker_animet |2|Oxi_add_gMap_info_text_Font_size |14|oxi_add_gMap_info_window_width |200|oxi_add_gMap_info_window_height |100|Oxi_add_gMap_info_text_color |#c25555|||||||||||||||||||||||||#|| ||#||||#|| ||#||OxiAdd_place_title||#||Location title||#||OxiAdd_gMap_location_info||#||<h3>Heading </h3> <hr> Always set the map height explicitly to define the size of the div * element that contains the map.Always set the map height explicitly to define the size of the div * element that contains the map.Always set the map height explicitly to define the size of the div * element that contains the map.||#||||#|| ||#|||',
    )
);
if ($oxiimpport == 'import') {
    ?>
    <div class="wrap">
        <?php
        echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); 
        $wp_css = '
                .oxi-addons-center img {
                    width: 100%;
                }';
        echo OxiAddonsInlineCSSData($wp_css);
        
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
        <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes');?>
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
                        echo '<div class="oxi-addons-col-1" id="' . $expludedata[2] . '">
                        <div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
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
