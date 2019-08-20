<?php
if (!defined('ABSPATH')) {
    exit;
}
if (!function_exists('is_plugin_active')) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if (!is_plugin_active('gravityforms/gravityforms.php')) {
    $cf7active = "<div class='oxi-gf-active'>Please Install and Active Gravity Forms Plugin to Use Gravity Forms Element...!</div>";
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
        'https://www.shortcode-addons.com/wp-content/uploads/2019/06/ss.png',
        'Style 1 OXIIMPORTgravity_formsOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAdd_gravity_Max_W|680|680|680|OxiAdd_gravity_BG |rgba(237, 237, 237, 1)|OxiAdd_gravity_Border_radius-top |3|3|3|OxiAdd_gravity_Border_radius-bottom |3|3|3|OxiAdd_gravity_Border_radius-left |3|3|3|OxiAdd_gravity_Border_radius-right |3|3|3|OxiAdd_gravity_P-top |40|40|40|OxiAdd_gravity_P-bottom |40|40|40|OxiAdd_gravity_P-left |65|65|65|OxiAdd_gravity_P-right |65|65|65|OxiAdd_gravity_M-top |4|4|4|OxiAdd_gravity_M-bottom |4|4|4|OxiAdd_gravity_M-left |5|5|5|OxiAdd_gravity_M-right |5|5|5|OxiAdd_gravity_Lab_FS|15|15|15|OxiAdd_gravity_Lab_color |#292929|OxiAdd_gravity_Lab_S_color |#fa0000|||OxiAdd_gravity_Lab_F-family |Open+Sans|600|OxiAdd_gravity_Lab_F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_gravity_Lab_padding-top |10|10|10|OxiAdd_gravity_Lab_padding-bottom |10|10|10|OxiAdd_gravity_Lab_padding-left |5|5|5|OxiAdd_gravity_Lab_padding-right |5|5|5|OxiAdd_gravity_dropdown_FS|15|15|15|OxiAdd_gravity_dropdown_C |#5c5c5c|OxiAdd_gravity_dropdown_BG |rgba(255, 255, 255, 1)|OxiAdd_gravity_dropdown_option_C |#808080|OxiAdd_gravity_dropdown_option_BG |rgba(245, 245, 245, 1)| OxiAdd_gravity_dropdown_border |1| OxiAdd_gravity_dropdown_border-type |solid| OxiAdd_gravity_dropdown_border_color |#999999|OxiAdd_gravity_dropdown_F-family |Open+Sans|600|OxiAdd_gravity_dropdown_F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_gravity_dropdown_padding-top |12|12|12|OxiAdd_gravity_dropdown_padding-bottom |12|12|12|OxiAdd_gravity_dropdown_padding-left |12|12|12|OxiAdd_gravity_dropdown_padding-right |12|12|12|OxiAdd_gravity_Field_Font_size|15|15|15|OxiAdd_gravity_textare_height|80|80|80|OxiAdd_gravity_Field_color |#4a4a4a|OxiAdd_gravity_Field_place_color |#c4c4c4|OxiAdd_gravity_Field_BG |rgba(255, 255, 255, 1)|OxiAdd_gravity_Field_Font-family |Poppins|400|OxiAdd_gravity_Field_Font-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_gravity_Field_border_width-top |1|1|1|OxiAdd_gravity_Field_border_width-bottom |1|1|1|OxiAdd_gravity_Field_border_width-left |1|1|1|OxiAdd_gravity_Field_border_width-right |1|1|1|OxiAdd_gravity_Field_border_color |solid|#cccccc||OxiAdd_gravity_Field_error_B_C |#ff0000|OxiAdd_gravity_Field_Border_radius-top |0|0|0|OxiAdd_gravity_Field_Border_radius-bottom |0|0|0|OxiAdd_gravity_Field_Border_radius-left |0|0|0|OxiAdd_gravity_Field_Border_radius-right |0|0|0|OxiAdd_gravity_Field_padding-top |17|17|17|OxiAdd_gravity_Field_padding-bottom |17|17|17|OxiAdd_gravity_Field_padding-left |17|17|17|OxiAdd_gravity_Field_padding-right |17|17|17|OxiAdd_gravity_Field_Focus_B_C |#828282|OxiAdd_gravity_Field_Focus_box_shadow |rgba(232, 232, 232, 1):|0|0|13|0|OxiAdd_gravity_checkbox_FS|16|16|16|OxiAdd_gravity_checkbox_W|20|20|20|OxiAdd_gravity_checkbox_box_color |rgba(255, 255, 255, 1)|OxiAdd_gravity_checkbox_color |#686868|OxiAdd_gravity_checkbox_icon_FS|20|20|20|OxiAdd_gravity_checkbox_icon_color |#b7b7b7| OxiAdd_gravity_checkbox_border |1| OxiAdd_gravity_checkbox_border-type |solid|OxiAdd_gravity_checkbox_border_color |#cccccc|OxiAdd_gravity_checkbox_Font-family |Poppins|500|OxiAdd_gravity_checkbox_Font-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_gravity_checkbox_B_R|2|2|2|OxiAdd_gravity_checkbox_Padding-top |17|17|17|OxiAdd_gravity_checkbox_Padding-bottom |17|17|17|OxiAdd_gravity_checkbox_Padding-left |17|17|17|OxiAdd_gravity_checkbox_Padding-right |17|17|17|OxiAdd_gravity_checkbox_M-top |0|0|0|OxiAdd_gravity_checkbox_M-bottom |0|0|0|OxiAdd_gravity_checkbox_M-left |0|0|0|OxiAdd_gravity_checkbox_M-right |12|12|12|OxiAdd_gravity_radio_FS|16|16|16|OxiAdd_gravity_radio_W|20|20|20|OxiAdd_gravity_radio_box_color |rgba(255, 255, 255, 1)|OxiAdd_gravity_radio_color |#686868|||||OxiAdd_gravity_radio_icon_color |#b7b7b7| OxiAdd_gravity_radio_border |1| OxiAdd_gravity_radio_border-type |solid|OxiAdd_gravity_radio_border_color |#cccccc|OxiAdd_gravity_radio_Font-family |Poppins|500|OxiAdd_gravity_radio_Font-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_gravity_radio_B_R|50|50|50|OxiAdd_gravity_radio_Padding-top |0|0|0|OxiAdd_gravity_radio_Padding-bottom |0|0|0|OxiAdd_gravity_radio_Padding-left |0|0|0|OxiAdd_gravity_radio_Padding-right |0|0|0|OxiAdd_gravity_radio_M-top |0|0|0|OxiAdd_gravity_radio_M-bottom |0|0|0|OxiAdd_gravity_radio_M-left |0|0|0|OxiAdd_gravity_radio_M-right |12|12|12|OxiAdd_gravity_title_FS|32|32|32|OxiAdd_gravity_title_color |#333333|OxiAdd_gravity_title_F-family |Poppins|700|OxiAdd_gravity_title_F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAdd_gravity_title_padding-top |3|3|3|OxiAdd_gravity_title_padding-bottom |3|3|3|OxiAdd_gravity_title_padding-left |3|3|3|OxiAdd_gravity_title_padding-right |3|3|3|OxiAdd_gravity_des_FS|14|14|14|OxiAdd_gravity_title_color |#707070|OxiAdd_gravity_des_F-family |Roboto|500|OxiAdd_gravity_des_F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAdd_gravity_des_padding-top |20|20|20|OxiAdd_gravity_des_padding-bottom |20|20|20|OxiAdd_gravity_des_padding-left |25|25|25|OxiAdd_gravity_des_padding-right |25|25|25|OxiAdd_gravity_requ_FS|15|15|15|OxiAdd_gravity_requ_color |#c20404|OxiAdd_gravity_requ_bg_color |#ffffff|OxiAdd_gravity_requ_F-family |Poppins|700|OxiAdd_gravity_requ_F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAdd_gravity_requ_border-top |1|1|1|OxiAdd_gravity_requ_border-bottom |1|1|1|OxiAdd_gravity_requ_border-left |1|1|1|OxiAdd_gravity_requ_border-right |1|1|1|OxiAdd_gravity_requ_border_color |solid|#850505||OxiAdd_gravity_requ_BR-top |0|0|0|OxiAdd_gravity_requ_BR-bottom |0|0|0|OxiAdd_gravity_requ_BR-left |0|0|0|OxiAdd_gravity_requ_BR-right |0|0|0|OxiAdd_gravity_requ_padding-top |18|18|18|OxiAdd_gravity_requ_padding-bottom |18|18|18|OxiAdd_gravity_requ_padding-left |18|18|18|OxiAdd_gravity_requ_padding-right |18|18|18|OxiAdd_gravity_requ_margin-top |0|0|0|OxiAdd_gravity_requ_margin-bottom |0|0|0|OxiAdd_gravity_requ_margin-left |0|0|0|OxiAdd_gravity_requ_margin-right |0|0|0|OxiAdd_gravity_error_msg_FS|13|13|13|OxiAdd_gravity_error_msg_label_color |#c20404|OxiAdd_gravity_error_msg_color |#c20404|OxiAdd_gravity_error_msg_F-family |Poppins|700|OxiAdd_gravity_error_msg_F-style |normal:1.3|left:0()0()0()#ffffff:|||||||||||||||||OxiAdd_gravity_Succ_FS|15|15|15|OxiAdd_gravity_Succ_color |#00bd55|OxiAdd_gravity_Succ_BG |rgba(255, 255, 255, 1)| OxiAdd_gravity_Succ_B |2| OxiAdd_gravity_Succ_B-type |solid|OxiAdd_gravity_Succ_F-family |Poppins|600|OxiAdd_gravity_Succ_F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAdd_gravity_Succ_BR-top |0|0|0|OxiAdd_gravity_Succ_BR-bottom |0|0|0|OxiAdd_gravity_Succ_BR-left |0|0|0|OxiAdd_gravity_Succ_BR-right |0|0|0|OxiAdd_gravity_Succ_padding-top |18|18|18|OxiAdd_gravity_Succ_padding-bottom |18|18|18|OxiAdd_gravity_Succ_padding-left |18|18|18|OxiAdd_gravity_Succ_padding-right |18|18|18|||||||||||||||||OxiAdd_gravity_B_FS|16|16|16|||OxiAdd_gravity_B_color |#ffffff|OxiAdd_gravity_B_H_color |#ffffff|OxiAdd_gravity_B_BG |rgba(46, 48, 46, 1)|OxiAdd_gravity_B_H_BG |rgba(15, 15, 15, 1)|OxiAdd_gravity_B_F-family |Poppins|400|OxiAdd_gravity_B_F-style |normal:1.3|center:0()0()0()#ffffff:|||||||||||||||||OxiAdd_gravity_B_B_C |#fafafa|OxiAdd_gravity_B_H_B_C |#ffffff|OxiAdd_gravity_B_B_R|0|0|0|OxiAdd_gravity_B_P-top |10|10|10|OxiAdd_gravity_B_P-bottom |10|10|10|OxiAdd_gravity_B_P-left |40|40|40|OxiAdd_gravity_B_P-right |40|40|40|OxiAdd_gravity_B_M-top |10|10|10|OxiAdd_gravity_B_M-bottom |10|10|10|OxiAdd_gravity_B_M-left |0|0|0|OxiAdd_gravity_B_M-right |0|0|0|OxiAdd_gravity_Succ_B_C |#00bd55|OxiAdd_gravity_radio_icon_border |4| OxiAdd_gravity_B_Bitton |0| OxiAdd_gravity_B_Bitton-type |solid| OxiAdd_gravity_B_width |full|||||OxiAdd_gravity_label_des_FS|13|13|13|OxiAdd_gravity_title_color |#2b2b2b|OxiAdd_gravity_label_des_F-family |Poppins|500|OxiAdd_gravity_label_des_F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_gravity_label_des_padding-top |7|7|7|OxiAdd_gravity_label_des_padding-bottom |7|7|7|OxiAdd_gravity_label_des_padding-left |5|5|5|OxiAdd_gravity_label_des_padding-right |5|5|5|||#|| oxiadd-gravity-id ||#||||#|| oxiadd-gravity-title ||#||false||#|| oxiadd-gravity-des ||#||false||#|| oxiadd-gravity-ajax ||#||true||#|| ||#||##OXISTYLE##OxiAddonstestimonial_img_U ||#||https://www.oxilab.org/wp-content/uploads/2019/05/330px-Larry_Page_in_the_European_Parliament_17.06.2009_cropped.jpg||#|| OxiAddonstestimonial_W_name ||#||Larry Page||#|| OxiAddonstestimonial_W_D ||#||Form||#|| OxiAddonstestimonial_W_C ||#||Google||#|| OxiAddonstestimonial_WR ||#||4.5||#|| OxiAddonstestimonial_text ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed interdum orci. Mauris sit amet turpis iaculis, mollis justo eget, dignissim ipsum.||#|| OxiAddonstestimonial_url ||#||#||#|| ||#||##OXIDATA##OxiAddonstestimonial_img_U ||#||https://www.oxilab.org/wp-content/uploads/2019/05/589228_v9_ba.jpg||#|| OxiAddonstestimonial_W_name ||#||Mark Zuckerberg||#|| OxiAddonstestimonial_W_D ||#||Form||#|| OxiAddonstestimonial_W_C ||#||Facebook||#|| OxiAddonstestimonial_WR ||#||4||#|| OxiAddonstestimonial_text ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed interdum orci. Mauris sit amet turpis iaculis, mollis justo eget, dignissim ipsum.||#|| OxiAddonstestimonial_url ||#||#||#|| ||#||##OXIDATA##OxiAddonstestimonial_img_U ||#||https://www.oxilab.org/wp-content/uploads/2019/05/330px-Jack_Dorsey_2014.jpg||#|| OxiAddonstestimonial_W_name ||#||Jack Dorsey||#|| OxiAddonstestimonial_W_D ||#||Form||#|| OxiAddonstestimonial_W_C ||#||Twitter||#|| OxiAddonstestimonial_WR ||#||5||#|| OxiAddonstestimonial_text ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed interdum orci. Mauris sit amet turpis iaculis, mollis justo eget, dignissim ipsum.||#|| OxiAddonstestimonial_url ||#||#||#|| ||#||##OXIDATA##',
    ),
   

);
if ($oxiimpport == 'import') {
    ?>
    <div class="wrap">
        <?php
        echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes');
        echo $cf7active;
        $oxicf7active = '
             .oxi-gf-active{
                font-size: 27px;
                color: red;
                margin: 96px 20px 10px 18px;
                padding: 20px;
                background: #ffe9e9;
                font-weight: 700;
                display: flex;
                justify-content: center;
                align-items: center;
                border: 1px solid red;
             }    


            ';
        echo OxiAddonsInlineCSSData($oxicf7active);
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
                        echo '<img src="' . $value[0] . '" alt="" width="680">';
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
        $oxicf7active = '
                    .oxi-gf-active{
                         font-size: 27px;
                        color: red;
                        margin: 96px 20px 10px 18px;
                        padding: 20px;
                        background: #ffe9e9;
                        font-weight: 700;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border: 1px solid red;
                    }    


            ';
        echo OxiAddonsInlineCSSData($oxicf7active);
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
                        echo '<img src="' . $value[0] . '" alt="" width="680">';
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

$css = '#style-1 .oxi-addons-style-preview-top{ background : #8a8a8a}';

 echo OxiAddonsInlineCSSData($css);



