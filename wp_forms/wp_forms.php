<?php

if (!defined('ABSPATH')) {
    exit;
}
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}
if (!is_plugin_active('wpforms-lite/wpforms.php')) {
    $wpforms_active = "<p class='wpforms_active'>Please Install And Activate WPForms Plugins</p>";
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
        'https://www.shortcode-addons.oxilab.org/wp-content/uploads/2019/06/ssss.png',
        'Style 1OXIIMPORTwp_formsOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(235, 235, 235, 1)|OxiAdd_WpF_Max_W|500|500|500|OxiAdd_WpF_BG |rgba(255, 255, 255, 1)|OxiAdd_WpF_B_W-top |0|0|0|OxiAdd_WpF_B_W-bottom |0|0|0|OxiAdd_WpF_B_W-left |0|0|0|OxiAdd_WpF_B_W-right |0|0|0|OxiAdd_WpF_Border |solid|#bababa||OxiAdd_WpF_B_R-top |10|10|10|OxiAdd_WpF_B_R-bottom |10|10|10|OxiAdd_WpF_B_R-left |10|10|10|OxiAdd_WpF_B_R-right |10|10|10|OxiAdd_WpF_P-top |20|20|20|OxiAdd_WpF_P-bottom |20|20|20|OxiAdd_WpF_P-left |20|20|20|OxiAdd_WpF_P-right |20|20|20|OxiAdd_WpF_M-top |5|0|0|OxiAdd_WpF_M-bottom |5|0|0|OxiAdd_WpF_M-left |5|0|0|OxiAdd_WpF_M-right |5|0|0|OxiAdd_WpF_box_shadow |rgba(179, 179, 179, 0.79):|0|2|5|2|OxiAdd_WpF_Lab_FS|13|13|13|OxiAdd_WpF_Lab_S_FS|12|12|12|OxiAdd_WpF_Lab_color |#555555|OxiAdd_WpF_Lab_S_color |#ff0000|OxiAdd_WpF_Lab_F-family |Poppins|300|OxiAdd_WpF_Lab_F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_WpF_Field_FS|16|16|16|OxiAdd_WpF_Field_color |#424242|OxiAdd_WpF_Field_BG |rgba(245, 245, 245, 1)|OxiAdd_WpF_Field_F-family |Poppins|300|OxiAdd_WpF_Field_F-style |normal:1.3|left:0()0()0()#ffffff:||||||||||||||||||||||||| OxiAdd_WpF_Field_border |3| OxiAdd_WpF_Field_border-type |solid| OxiAdd_WpF_Field_border_color |rgba(85, 85, 85, 1)| OxiAdd_WpF_Field_Focas_B_C |#d40c66| OxiAdd_WpF_Field_error_B_C |#ff0000|OxiAdd_WpF_Field_padding-top |5|5|5|OxiAdd_WpF_Field_padding-bottom |5|5|5|OxiAdd_WpF_Field_padding-left |5|5|5|OxiAdd_WpF_Field_padding-right |5|5|5|OxiAdd_WpF_Field_margin-top |0|0|0|OxiAdd_WpF_Field_margin-bottom |25|25|25|OxiAdd_WpF_Field_margin-left |0|0|0|OxiAdd_WpF_Field_margin-right |0|0|0|OxiAdd_WpF_radio_FS|16|16|16|OxiAdd_WpF_radio_Icon_FS|4|4|4|OxiAdd_WpF_radio_W|16|16|16|OxiAdd_WpF_radio_C |#d40c66|OxiAdd_WpF_radio_icon_C |rgba(255, 255, 255, 1)|OxiAdd_WpF_radio_text_color |#555555|OxiAdd_WpF_radio_F-family |Poppins|300|OxiAdd_WpF_radio_F-style |normal:1.3|left:0()0()0()#ffffff:|||||||OxiAdd_WpF_radio_B_R|50|50|50|OxiAdd_WpF_radio_P-top |0|0|25|OxiAdd_WpF_radio_P-bottom |10|10|10|OxiAdd_WpF_radio_P-left |0|0|0|OxiAdd_WpF_radio_P-right |0|0|16|OxiAdd_WpF_radio_M-top |0|0|0|OxiAdd_WpF_radio_M-bottom |0|0|0|OxiAdd_WpF_radio_M-left |0|0|0|OxiAdd_WpF_radio_M-right |10|10|10|OxiAdd_WpF_checkbox_FS|18|18|18|OxiAdd_WpF_checkbox_Icon_FS|16|16|16|OxiAdd_WpF_checkbox_W|16|16|16| OxiAdd_WpF_checkbox_C |#ffffff|OxiAdd_WpF_checkbox_input_C |rgba(212, 12, 102, 1)|OxiAdd_WpF_checkbox_text_color |#4a4a4a|OxiAdd_WpF_checkbox_F-family |Poppins|300|OxiAdd_WpF_checkbox_F-style |normal:1.3|left:0()0()0()#ffffff:| OxiAdd_WpF_checkbox_border |1| OxiAdd_WpF_checkbox_border-type |solid| OxiAdd_WpF_checkbox_border_color |#ad4f4f|OxiAdd_WpF_checkbox_B_R|0|0|0|OxiAdd_WpF_checkbox_P-top |0|0|25|OxiAdd_WpF_checkbox_P-bottom |10|10|10|OxiAdd_WpF_checkbox_P-left |0|0|0|OxiAdd_WpF_checkbox_P-right |0|0|16|OxiAdd_WpF_checkbox_M-top |0|0|0|OxiAdd_WpF_checkbox_M-bottom |0|0|0|OxiAdd_WpF_checkbox_M-left |0|0|0|OxiAdd_WpF_checkbox_M-right |10|10|10|OxiAdd_WpF_dropdown_FS|16|16|16|OxiAdd_WpF_dropdown_C |#424242|OxiAdd_WpF_dropdown_BG |rgba(235, 235, 235, 1)|OxiAdd_WpF_dropdown_option_C |#424242|OxiAdd_WpF_dropdown_option_BG |rgba(235, 235, 235, 1)| OxiAdd_WpF_dropdown_border |2| OxiAdd_WpF_dropdown_border-type |solid| OxiAdd_WpF_dropdown_border_color |#d6d6d6|OxiAdd_WpF_dropdown_F-family |Poppins|300|OxiAdd_WpF_dropdown_F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_WpF_dropdown_padding-top |5|5|5|OxiAdd_WpF_dropdown_padding-bottom |5|5|5|OxiAdd_WpF_dropdown_padding-left |5|5|5|OxiAdd_WpF_dropdown_padding-right |5|5|5|OxiAdd_WpF_dropdown_margin-top |10|10|10|OxiAdd_WpF_dropdown_margin-bottom |10|10|10|OxiAdd_WpF_dropdown_margin-left |10|10|10|OxiAdd_WpF_dropdown_margin-right |10|10|10|OxiAdd_WpF_title_FS|30|30|30|OxiAdd_WpF_title_color |#1f1e1e|OxiAdd_WpF_title_BG |rgba(255, 255, 255, 1)|OxiAdd_WpF_title_F-family |Poppins|600|OxiAdd_WpF_title_F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAdd_WpF_title_padding-top |0|0|0|OxiAdd_WpF_title_padding-bottom |20|20|20|OxiAdd_WpF_title_padding-left |20|20|20|OxiAdd_WpF_title_padding-right |20|20|20|OxiAdd_WpF_requ_FS|16|16|16|OxiAdd_WpF_requ_color |#ff0000|OxiAdd_WpF_requ_F-family |Poppins|100|OxiAdd_WpF_requ_F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAdd_WpF_requ_padding-top |0|0|0|OxiAdd_WpF_requ_padding-bottom |0|0|0|OxiAdd_WpF_requ_padding-left |0|0|0|OxiAdd_WpF_requ_padding-right |0|0|0|OxiAdd_WpF_Succ_FS|16|16|16|OxiAdd_WpF_Succ_color |#ffffff|OxiAdd_WpF_Succ_BG |rgba(60, 214, 13, 0.68)| OxiAdd_WpF_Succ_B |0| OxiAdd_WpF_Succ_B-type |none| OxiAdd_WpF_Succ_B_C |#a8a1a1|OxiAdd_WpF_Succ_B_R|15|15|15|OxiAdd_WpF_Succ_F-family |Poppins|100|OxiAdd_WpF_Succ_F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAdd_WpF_Succ_padding-top |15|15|15|OxiAdd_WpF_Succ_padding-bottom |15|15|15|OxiAdd_WpF_Succ_padding-left |15|15|15|OxiAdd_WpF_Succ_padding-right |15|15|15|OxiAdd_WpF_Succ_margin-top |20|20|20|OxiAdd_WpF_Succ_margin-bottom |20|20|20|OxiAdd_WpF_Succ_margin-left |0|0|0|OxiAdd_WpF_Succ_margin-right |0|0|0|||OxiAdd_WpF_B_FS|18|18|18|OxiAdd_WpF_B_color |#ffffff|OxiAdd_WpF_B_H_color |#d40c66|OxiAdd_WpF_B_BG |rgba(212, 12, 102, 1)|OxiAdd_WpF_B_H_BG |rgba(255, 255, 255, 1)|OxiAdd_WpF_B_B_W-top |1|1|1|OxiAdd_WpF_B_B_W-bottom |1|1|1|OxiAdd_WpF_B_B_W-left |1|1|1|OxiAdd_WpF_B_B_W-right |1|1|1|OxiAdd_WpF_B_B |solid|#ffffff||||OxiAdd_WpF_B_H_B_C |#d40c66|OxiAdd_WpF_B_B_R-top |5|5|5|OxiAdd_WpF_B_B_R-bottom |5|5|5|OxiAdd_WpF_B_B_R-left |5|5|5|OxiAdd_WpF_B_B_R-right |5|5|5|OxiAdd_WpF_B_F-family |Poppins|500|OxiAdd_WpF_B_F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAdd_WpF_B_P-top |8|8|8|OxiAdd_WpF_B_P-bottom |8|8|8|OxiAdd_WpF_B_P-left |40|40|40|OxiAdd_WpF_B_P-right |40|40|40|OxiAdd_WpF_B_M-top |0|0|0|OxiAdd_WpF_B_M-bottom |10|10|10|OxiAdd_WpF_B_M-left |0|0|0|OxiAdd_WpF_B_M-right |0|0|0|OxiAdd_WpF_B_Width |standard|||#|| OxiAdd_WpF_sc ||#||||#|| ||#||##OXISTYLE##OxiAddonstestimonial_img_U ||#||https://www.oxilab.org/wp-content/uploads/2019/05/330px-Larry_Page_in_the_European_Parliament_17.06.2009_cropped.jpg||#|| OxiAddonstestimonial_W_name ||#||Larry Page||#|| OxiAddonstestimonial_W_D ||#||Form||#|| OxiAddonstestimonial_W_C ||#||Google||#|| OxiAddonstestimonial_WR ||#||4.5||#|| OxiAddonstestimonial_text ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed interdum orci. Mauris sit amet turpis iaculis, mollis justo eget, dignissim ipsum.||#|| OxiAddonstestimonial_url ||#||#||#|| ||#||##OXIDATA##OxiAddonstestimonial_img_U ||#||https://www.oxilab.org/wp-content/uploads/2019/05/589228_v9_ba.jpg||#|| OxiAddonstestimonial_W_name ||#||Mark Zuckerberg||#|| OxiAddonstestimonial_W_D ||#||Form||#|| OxiAddonstestimonial_W_C ||#||Facebook||#|| OxiAddonstestimonial_WR ||#||4||#|| OxiAddonstestimonial_text ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed interdum orci. Mauris sit amet turpis iaculis, mollis justo eget, dignissim ipsum.||#|| OxiAddonstestimonial_url ||#||#||#|| ||#||##OXIDATA##OxiAddonstestimonial_img_U ||#||https://www.oxilab.org/wp-content/uploads/2019/05/330px-Jack_Dorsey_2014.jpg||#|| OxiAddonstestimonial_W_name ||#||Jack Dorsey||#|| OxiAddonstestimonial_W_D ||#||Form||#|| OxiAddonstestimonial_W_C ||#||Twitter||#|| OxiAddonstestimonial_WR ||#||5||#|| OxiAddonstestimonial_text ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed interdum orci. Mauris sit amet turpis iaculis, mollis justo eget, dignissim ipsum.||#|| OxiAddonstestimonial_url ||#||#||#|| ||#||##OXIDATA##',
    ),
 

);
if ($oxiimpport == 'import') {
    ?>
    <div class="wrap">
        <?php
        echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes');
        echo $wpforms_active;
        $wp_css = '
                .wpforms_active {
                    color: red;
                    font-size: 50px;
                    text-align: center;
                    background: #fff;
                    padding: 20px 10px;
                    margin: 100px 20px 50px 20px;
                    box-shadow: 0px 3px 10px 0px #696565;
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
        echo $wpforms_active;
        $wp_css = '
                .wpforms_active {
                    color: red;
                    font-size: 50px;
                    text-align: center;
                    background: #fff;
                    padding: 20px 10px;
                    margin: 100px 20px 50px 20px;
                    box-shadow: 0px 3px 10px 0px #696565;
                }';
        echo OxiAddonsInlineCSSData($wp_css);
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
