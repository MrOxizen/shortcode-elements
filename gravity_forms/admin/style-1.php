<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!function_exists('is_plugin_active')) {
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            }
            if (!is_plugin_active('gravityforms/gravityforms.php')) {
                $cf7active =  "<div class='oxi-gf-active'>Please Install and Active Gravity Forms Plugin to Use Gravity Forms Element...!</div>";
            }
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddCForm-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {

        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_Max_W')
                . 'OxiAdd_gravity_BG |' . sanitize_text_field($_POST['OxiAdd_gravity_BG']) . '|'
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_Border_radius')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_P')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_M')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_Lab_FS')
                . 'OxiAdd_gravity_Lab_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_Lab_color']) . '|'
                . 'OxiAdd_gravity_Lab_S_color |' . sanitize_text_field($_POST['OxiAdd_gravity_Lab_S_color']) . '|'
                . '||'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_Lab_F')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_Lab_padding')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_dropdown_FS')
                . 'OxiAdd_gravity_dropdown_C |' . sanitize_hex_color($_POST['OxiAdd_gravity_dropdown_C']) . '|'
                . 'OxiAdd_gravity_dropdown_BG |' . sanitize_text_field($_POST['OxiAdd_gravity_dropdown_BG']) . '|'
                . 'OxiAdd_gravity_dropdown_option_C |' . sanitize_hex_color($_POST['OxiAdd_gravity_dropdown_option_C']) . '|'
                . 'OxiAdd_gravity_dropdown_option_BG |' . sanitize_text_field($_POST['OxiAdd_gravity_dropdown_option_BG']) . '|'
                . ' OxiAdd_gravity_dropdown_border |' . sanitize_text_field($_POST['OxiAdd_gravity_dropdown_border']) . '|'
                . ' OxiAdd_gravity_dropdown_border-type |' . sanitize_text_field($_POST['OxiAdd_gravity_dropdown_border-type']) . '|'
                . ' OxiAdd_gravity_dropdown_border_color |' . sanitize_text_field($_POST['OxiAdd_gravity_dropdown_border_color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_dropdown_F')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_dropdown_padding')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_Field_Font_size')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_textare_height')
                . 'OxiAdd_gravity_Field_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_Field_color']) . '|'
                . 'OxiAdd_gravity_Field_place_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_Field_place_color']) . '|'
                . 'OxiAdd_gravity_Field_BG |' . sanitize_text_field($_POST['OxiAdd_gravity_Field_BG']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_Field_Font')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_Field_border_width')
                . OxiAddonsADMHelpBorderSanitize('OxiAdd_gravity_Field_border_color') . '|'
                . 'OxiAdd_gravity_Field_error_B_C |' . sanitize_hex_color($_POST['OxiAdd_gravity_Field_error_B_C']) . '|'
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_Field_Border_radius')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_Field_padding')
                . 'OxiAdd_gravity_Field_Focus_B_C |' . sanitize_hex_color($_POST['OxiAdd_gravity_Field_Focus_B_C']) . '|'
                . OxiAddonsADMBoxShadowSanitize('OxiAdd_gravity_Field_Focus_box_shadow')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_checkbox_FS')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_checkbox_W')
                . 'OxiAdd_gravity_checkbox_box_color |' . sanitize_text_field($_POST['OxiAdd_gravity_checkbox_box']) . '|'
                . 'OxiAdd_gravity_checkbox_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_checkbox_color']) . '|'
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_checkbox_icon_FS')
                . 'OxiAdd_gravity_checkbox_icon_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_checkbox_icon_color']) . '|'
                . ' OxiAdd_gravity_checkbox_border |' . sanitize_text_field($_POST['OxiAdd_gravity_checkbox_border']) . '|'
                . ' OxiAdd_gravity_checkbox_border-type |' . sanitize_text_field($_POST['OxiAdd_gravity_checkbox_border-type']) . '|'
                . 'OxiAdd_gravity_checkbox_border_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_checkbox_border_color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_checkbox_Font')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_checkbox_B_R')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_checkbox_Padding')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_checkbox_M')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_radio_FS')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_radio_W')
                . 'OxiAdd_gravity_radio_box_color |' . sanitize_text_field($_POST['OxiAdd_gravity_radio_box']) . '|'
                . 'OxiAdd_gravity_radio_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_radio_color']) . '|'
                . '||||'
                . 'OxiAdd_gravity_radio_icon_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_radio_icon_color']) . '|'
                . ' OxiAdd_gravity_radio_border |' . sanitize_text_field($_POST['OxiAdd_gravity_radio_border']) . '|'
                . ' OxiAdd_gravity_radio_border-type |' . sanitize_text_field($_POST['OxiAdd_gravity_radio_border-type']) . '|'
                . 'OxiAdd_gravity_radio_border_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_radio_border_color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_radio_Font')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_radio_B_R')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_radio_Padding')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_radio_M')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_title_FS')
                . 'OxiAdd_gravity_title_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_title_color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_title_F')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_title_padding')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_des_FS')
                . 'OxiAdd_gravity_title_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_des_color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_des_F')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_des_padding')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_requ_FS')
                . 'OxiAdd_gravity_requ_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_requ_color']) . '|'
                . 'OxiAdd_gravity_requ_bg_color |' . sanitize_text_field($_POST['OxiAdd_gravity_requ_bg_color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_requ_F')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_requ_border')
                . OxiAddonsADMHelpBorderSanitize('OxiAdd_gravity_requ_border_color') . '|'
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_requ_BR')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_requ_padding')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_requ_margin')
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_error_msg_FS')
                . 'OxiAdd_gravity_error_msg_label_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_error_msg_label_color']) . '|'
                . 'OxiAdd_gravity_error_msg_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_error_msg_color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_error_msg_F')
                . '||||'
                . '||||'
                . '||||'
                . '||||'
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_Succ_FS')
                . 'OxiAdd_gravity_Succ_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_Succ_color']) . '|'
                . 'OxiAdd_gravity_Succ_BG |' . sanitize_text_field($_POST['OxiAdd_gravity_Succ_BG']) . '|'
                . ' OxiAdd_gravity_Succ_B |' . sanitize_text_field($_POST['OxiAdd_gravity_Succ_B']) . '|'
                . ' OxiAdd_gravity_Succ_B-type |' . sanitize_text_field($_POST['OxiAdd_gravity_Succ_B-type']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_Succ_F')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_Succ_BR')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_Succ_padding')
                . '||||'
                . '||||'
                . '||||'
                . '||||'
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_B_FS')
                . '||'
                . 'OxiAdd_gravity_B_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_B_color']) . '|'
                . 'OxiAdd_gravity_B_H_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_B_H_color']) . '|'
                . 'OxiAdd_gravity_B_BG |' . sanitize_text_field($_POST['OxiAdd_gravity_B_BG']) . '|'
                . 'OxiAdd_gravity_B_H_BG |' . sanitize_text_field($_POST['OxiAdd_gravity_B_H_BG']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_B_F')
                . '||||'
                . '||||'
                . '||||'
                . '||||'
                . 'OxiAdd_gravity_B_B_C |' . sanitize_hex_color($_POST['OxiAdd_gravity_B_B_C']) . '|'
                . 'OxiAdd_gravity_B_H_B_C |' . sanitize_hex_color($_POST['OxiAdd_gravity_B_H_B_C']) . '|'
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_B_B_R')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_B_P')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_B_M')
                . 'OxiAdd_gravity_Succ_B_C |' . sanitize_hex_color($_POST['OxiAdd_gravity_Succ_B_C']) . '|'
                . 'OxiAdd_gravity_radio_icon_border |' . sanitize_text_field($_POST['OxiAdd_gravity_radio_icon_border']) . '|'
                . ' OxiAdd_gravity_B_Bitton |' . sanitize_text_field($_POST['OxiAdd_gravity_B_Bitton']) . '|'
                . ' OxiAdd_gravity_B_Bitton-type |' . sanitize_text_field($_POST['OxiAdd_gravity_B_Bitton-type']) . '|'
                . ' OxiAdd_gravity_B_width |' . sanitize_text_field($_POST['OxiAdd_gravity_B_width']) . '|'
                .'||||'
                . oxi_addons_adm_help_single_size('OxiAdd_gravity_label_des_FS')
                . 'OxiAdd_gravity_title_color |' . sanitize_hex_color($_POST['OxiAdd_gravity_label_des_color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_gravity_label_des_F')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gravity_label_des_padding')
                . '||#||'
                . ' oxiadd-gravity-id ||#||' . sanitize_text_field($_POST['oxiadd-gravity-id']) . '||#|| '
                . ' oxiadd-gravity-title ||#||' . sanitize_text_field($_POST['oxiadd-gravity-title']) . '||#|| '
                . ' oxiadd-gravity-des ||#||' . sanitize_text_field($_POST['oxiadd-gravity-des']) . '||#|| '
                . ' oxiadd-gravity-ajax ||#||' . sanitize_text_field($_POST['oxiadd-gravity-ajax']) . '||#|| '
                . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
?>
<div class="wrap">    
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
                <?php echo  $cf7active;
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
            echo OxiAddonsInlineCSSData($oxicf7active);?>
            <div class="oxi-addons-style-20-spacer"></div>
            
            <div class="oxi-addons-style-left">
            
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-tabs-id-1">General</li>
                                <li  ref="#oxi-tabs-id-2">Title & Description</li>
                                <li  ref="#oxi-tabs-id-3">Alert & Error Settings</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">       
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('oxiadd-gravity-id', $stylefiles[2], 1, 'Gravity Form ID', 'Set Your Gravity Form ID', 'false');
                                            echo oxi_addons_adm_help_true_false('oxiadd-gravity-title', $stylefiles[4], 'True', 'true', 'False', 'false', 'Gravity Form Title', "Gravity Form Title", 'true');
                                            echo oxi_addons_adm_help_true_false('oxiadd-gravity-des', $stylefiles[6], 'True', 'true', 'False', 'false', 'Gravity Form Description', "Gravity Form Description", 'true');
                                            echo oxi_addons_adm_help_true_false('oxiadd-gravity-ajax', $stylefiles[8], 'True', 'true', 'False', 'false', 'Gravity Form Ajax', "Gravity Form Ajax", 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_Max_W', $styledata[3], $styledata[4], $styledata[5], 1, 'Max Width', 'Enter Your Form Max Width', 'false', '.oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form', 'max-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_BG', $styledata[7], 'rgba', 'Background Color', 'Select Form Background Color', 'false', '.oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_Border_radius', 9, $styledata, 1, 'Border Radius', 'Set Your Form Border Radius', 'false', '.oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_P', 25, $styledata, 1, 'Padding', 'Set Your Form Padding', 'false', '.oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_M', 41, $styledata, 1, 'Margin', 'Set Your Form Margin', 'false', '.oxi-addons-gr-form-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>                                               
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            All Label
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_Lab_FS', $styledata[57], $styledata[58], $styledata[59], 1, 'Font Size', 'Your Label Font Size', 'true', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .top_label .gfield_label, .gform_wrapper legend.gfield_label', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_Lab_color', $styledata[61], '', 'Color', 'Select your Label color', 'false', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .top_label .gfield_label, .gform_wrapper legend.gfield_label', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_Lab_S_color', $styledata[63], '', 'Required Label Color', 'Select Your Required Label Color', 'false', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_required', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_Lab_F', 67, $styledata, 'true', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .top_label .gfield_label, .gform_wrapper legend.gfield_label');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_Lab_padding', 73, $styledata, 1, 'Padding', 'Set Your Label Padding', 'true', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .top_label .gfield_label, .gform_wrapper legend.gfield_label', 'padding');
                                            ?>
                                        </div>                                               
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Select Box
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_dropdown_FS', $styledata[89], $styledata[90], $styledata[91], 1, 'Font Size', 'Set Your Select Box Font Size', 'true', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_left select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_right select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield input[type=radio],  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield select', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_dropdown_C', $styledata[93], '', 'Color', 'Select Your Select Box color', 'false', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_left select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_right select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield input[type=radio],  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield select', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_dropdown_BG', $styledata[95], 'rgba', 'Background Color', 'Select Your Select Box Background', 'false', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_left select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_right select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield input[type=radio],  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield select', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_dropdown_option_C', $styledata[97], '', 'Option Color', 'Select Your Select Box Option Color', 'false', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper select option','color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_dropdown_option_BG', $styledata[99], 'rgba', 'Option Background Color', 'Select Your Select Box Option Backgrond', 'false', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper select option','background');
                                            echo oxi_addons_adm_help_border('OxiAdd_gravity_dropdown_border', $styledata[101], $styledata[103], 'Border', 'Set Your Select Box Border', 'true', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_left select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_right select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield input[type=radio],  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield select', 'border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_dropdown_border_color', $styledata[105], '', 'Border Color', 'Select Your Select Box Border Color', 'true', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_left select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_right select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield input[type=radio],  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield select', 'border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_dropdown_F', 107, $styledata, 'true', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_left select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_right select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield input[type=radio],  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield select');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_dropdown_padding', 113, $styledata, 1, 'Padding', 'Set Your Padding', 'true', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_left select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield div.ginput_complex span.ginput_right select,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield input[type=radio],  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield select, #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper select option', 'padding');
                                            ?>
                                        </div>                                               
                                    </div>
                                </div>


                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Input & Textarea
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_Field_Font_size', $styledata[129], $styledata[130], $styledata[131], 1, 'Font Size', 'Set Select Your Input Field Font-size', 'true', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])', 'font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_textare_height', $styledata[133], $styledata[134], $styledata[135], 1, 'Textarea Height', 'Set Your Textarea Height', 'true', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper textarea.medium', 'height');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_Field_color', $styledata[137], '', 'Color', 'Select Your Input Field color', 'false', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_Field_place_color', $styledata[139], '', 'Placeholder Color', 'Select Your Input Placeholder  Color', 'false', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])::placeholder,#oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . '  .gform_wrapper textarea:focus, #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . '  .gform_wrapper textarea:placeholder', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_Field_BG', $styledata[141], 'rgba', 'Background Color', 'Select Your Input Field Background Color', 'false', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]) , #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . '  .gform_wrapper textarea', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_Field_Font', 143, $styledata, 'true', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_Field_border_width', 149, $styledata, 1, 'Border', 'Set Your Input Field Border', 'true', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAdd_gravity_Field_border_color', 165, $styledata, 'true', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])', 'border-style');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_Field_error_B_C', $styledata[169], '', 'Error Border Color', 'Select Your Input Field Border color', '  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper li.gfield_error input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), .gform_wrapper li.gfield_error textarea', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_Field_Border_radius', 171, $styledata, 1, 'Border Radius', 'Set Your Input Field Border Radius', 'true', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_Field_padding', 187, $styledata, 1, 'Padding', 'Set Your Input Field Padding', 'true', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])', 'padding');
                                            ?>
                                        </div>                                               
                                        <div class="oxi-head">
                                            Input Focus Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_Field_Focus_B_C', $styledata[203], '', 'Focus Border Color', 'Select Your Input Field Border Focus color', '', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]):focus ,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . '  .gform_wrapper textarea:focus','border-color');
                                            echo OxiAddonsADMhelpBoxShadow('OxiAdd_gravity_Field_Focus_box_shadow', 205, $styledata, 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]):focus ,  #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . '  .gform_wrapper textarea:focus');
                                            ?>
                                        </div>                                               
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Check Box
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_checkbox_FS', $styledata[211], $styledata[212], $styledata[213], 1, 'Font Size', 'Set Your Checkbox Label Font-Size', 'true',' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_checkbox li label, #oxi-addons-preview-data.oxi-addons-gr-form-' . $oxiid . ' .ginput_container_consent .gfield_consent_label','font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_checkbox_W', $styledata[215], $styledata[216], $styledata[217], 1, 'Checkbox Width&Height', 'Your Font Size', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_checkbox_box', $styledata[219], 'rgba', 'Checkbox Background', 'Set Your Checkbox Background Color', 'false','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_checkbox li label:before,  #oxi-addons-preview-data   .oxi-addons-gr-form-' . $oxiid . ' .ginput_container_consent .gfield_consent_label:before','background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_checkbox_color', $styledata[221], '', 'Text Color', 'Set Your Checkbox Text Color', 'false',' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_checkbox li label, #oxi-addons-preview-data.oxi-addons-gr-form-' . $oxiid . ' .ginput_container_consent .gfield_consent_label','color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_checkbox_icon_FS', $styledata[223], $styledata[224], $styledata[225], 1, 'Icon Font Size', 'Set Your Checkbox Icon Font Size', 'true','.oxi-addons-gr-form-' . $oxiid . ' .ginput_container_checkbox input[type=checkbox]:checked + label:before, #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .ginput_container_consent input[type=checkbox]:checked + label:before','font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_checkbox_icon_color', $styledata[227], '', 'Icon Color', 'Set Your Checkbox Icon Color', 'false','.oxi-addons-gr-form-' . $oxiid . ' .ginput_container_checkbox input[type=checkbox]:checked + label:before, #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .ginput_container_consent input[type=checkbox]:checked + label:before','color');
                                            echo oxi_addons_adm_help_border('OxiAdd_gravity_checkbox_border', $styledata[229], $styledata[231], 'Border', 'Set Your Checkbox Border', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_checkbox li label:before,  #oxi-addons-preview-data   .oxi-addons-gr-form-' . $oxiid . ' .ginput_container_consent .gfield_consent_label:before','border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_checkbox_border_color', $styledata[233], '', 'Border Color', 'Select Your Checkbox Border Color', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_checkbox li label:before,  #oxi-addons-preview-data   .oxi-addons-gr-form-' . $oxiid . ' .ginput_container_consent .gfield_consent_label:before','border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_checkbox_Font', 235, $styledata, 'true',' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_checkbox li label, #oxi-addons-preview-data.oxi-addons-gr-form-' . $oxiid . ' .ginput_container_consent .gfield_consent_label');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_checkbox_B_R', $styledata[241], $styledata[242], $styledata[243], 1, 'Border Radius', 'Set Your Checkbox Border Radius', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_checkbox li label:before,  #oxi-addons-preview-data   .oxi-addons-gr-form-' . $oxiid . ' .ginput_container_consent .gfield_consent_label:before','border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_checkbox_Padding', 245, $styledata, 1, 'Padding', 'Set Your Checkbox Full Padding', 'true', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper ul.gfield_checkbox', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_checkbox_M', 261, $styledata, 1, 'Margin', 'Set Your Checkbox Box Margin', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_checkbox li label:before,  #oxi-addons-preview-data   .oxi-addons-gr-form-' . $oxiid . ' .ginput_container_consent .gfield_consent_label:before','margin');
                                            ?>
                                        </div>                                               
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Radio
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_radio_FS', $styledata[277], $styledata[278], $styledata[279], 1, 'Font Size', 'Your Radio Label Font Size', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_checkbox li label, #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_radio li label','font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_radio_W', $styledata[281], $styledata[282], $styledata[283], 1, 'Radio Width & Height', 'Your Radio Box Width And Height ', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_radio_box', $styledata[285], 'rgba', 'Radio Background', 'Set Your Radio Box Background Color', 'false','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_radio li label:before','background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_radio_color', $styledata[287], '', 'Text Color', 'Set Your Radio Text Color', 'false','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_checkbox li label, #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_radio li label','color');
                                            echo oxi_addons_adm_help_number('OxiAdd_gravity_radio_icon_border', $styledata[655], 1, 'Icon Border', 'Set Your Radio Box Icon border', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_radio_icon_color', $styledata[293], '', 'Icon Color', 'Set Your Radio Box Icon Color', 'false',' .oxi-addons-gr-form-' . $oxiid . ' .ginput_container_radio .gfield_radio input[type=radio]:checked + label:before','background');
                                            echo oxi_addons_adm_help_border('OxiAdd_gravity_radio_border', $styledata[295], $styledata[297], 'Border', 'Set Your Radio Box Border', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_radio li label:before','border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_radio_border_color', $styledata[299], '', 'Border Color', 'Select Your Radio Box Border Color', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_radio li label:before','border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_radio_Font', 301, $styledata, 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_radio li label:before');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_radio_B_R', $styledata[307], $styledata[308], $styledata[309], 1, 'Border Radius', 'Your Radio Box Border Radius', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_radio li label:before','border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_radio_Padding', 311, $styledata, 1, 'Padding', 'Set Your Radio Box Padding', 'true', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_radio li label:before', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_radio_M', 327, $styledata, 1, 'Margin', 'Set Your Radio Box Margin', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_radio li label:before','margin');
                                            ?>
                                        </div>                                               
                                    </div>

                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_title_FS', $styledata[343], $styledata[344], $styledata[345], 1, 'Title Font Size', 'Set Your Error Alert Font-size', 'true','.oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form .gform_title','font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_title_color', $styledata[347], '', 'Color', 'Set Your Title Color', '','.oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form .gform_title','color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_title_F', 349, $styledata, 'true','.oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form .gform_title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_title_padding', 355, $styledata, 1, 'Padding', 'Set Your Title Padding', 'true','.oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form .gform_title','padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Label Description
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_label_des_FS', $styledata[667], $styledata[668], $styledata[669], 1, 'Title Font Size', 'Set Your Error Alert Font-size', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .field_sublabel_below .ginput_complex.ginput_container label, #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .field_sublabel_below div[class*=gfield_time_].ginput_container label','font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_label_des_color', $styledata[671], '', 'Color', 'Set Your Title Color', '','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .field_sublabel_below .ginput_complex.ginput_container label, #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .field_sublabel_below div[class*=gfield_time_].ginput_container label','color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_label_des_F', 673, $styledata, 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .field_sublabel_below .ginput_complex.ginput_container label, #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .field_sublabel_below div[class*=gfield_time_].ginput_container label');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_label_des_padding', 679, $styledata, 1, 'Padding', 'Set Your Title Padding', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .field_sublabel_below .ginput_complex.ginput_container label, #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .field_sublabel_below div[class*=gfield_time_].ginput_container label','padding');
                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Description
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_des_FS', $styledata[371], $styledata[372], $styledata[373], 1, 'Description Font Size', 'Set Your Error Alert Font-size', 'true',' .oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form .gform_wrapper span.gform_description','font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_des_color', $styledata[375], '', 'Color', 'Set Your Description Color', '',' .oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form .gform_wrapper span.gform_description','color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_des_F', 377, $styledata, 'true',' .oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form .gform_wrapper span.gform_description');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_des_padding', 383, $styledata, 1, 'Padding', 'Set Your Description Padding', 'true',' .oxi-addons-gr-form-' . $oxiid . ' .oxi-addons-gravity-form .gform_wrapper span.gform_description','padding');
                                            ?>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-3">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Error Alert
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_requ_FS', $styledata[399], $styledata[400], $styledata[401], 1, 'Font Size', 'Set Your Error Alert Font-size', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper div.validation_error','font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_requ_color', $styledata[403], '', 'Color', 'Set Your Error Alert Color', '','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper div.validation_error','color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_requ_bg_color', $styledata[405], '', 'Background Color', 'Set Your Error Alert Background Color', '','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper div.validation_error','background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_requ_F', 407, $styledata, 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper div.validation_error');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_requ_border', 413, $styledata, 1, 'Border', 'Set Your Error Alert Border', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper div.validation_error','border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAdd_gravity_requ_border_color', 429, $styledata, 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper div.validation_error','border-style');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_requ_BR', 433, $styledata, 1, 'Border Radius', 'Set Your Error Alert Border Radius', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper div.validation_error','border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_requ_padding', 449, $styledata, 1, 'Padding', 'Set Your Error Alert Padding', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper div.validation_error','padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_requ_margin', 465, $styledata, 1, 'Margin', 'Set Your Error Alert Margin', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper div.validation_error','margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Error Message
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_error_msg_FS', $styledata[481], $styledata[482], $styledata[483], 1, 'Font Size', 'Set Your Error Message Font Size', 'true', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .validation_message', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_error_msg_label_color', $styledata[485], '', 'Label Color', 'Set Your Error Label Color ', 'false','  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gfield_error .gfield_label ','color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_error_msg_color', $styledata[487], '', 'Message Color', 'Set Your Error Message Color', '', ' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .validation_message', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_error_msg_F', 489, $styledata, 'true',' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .validation_message');
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Success Alert
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_Succ_FS', $styledata[511], $styledata[512], $styledata[513], 1, 'Font Size', 'Set Your Success Alert Font Size', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_confirmation_wrapper','font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_Succ_color', $styledata[515], '', 'Color', 'Set Your Success Alert Color', 'false','.oxi-addons-gr-form-' . $oxiid . ' .gform_confirmation_wrapper','color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_Succ_BG', $styledata[517], 'rgba', 'Background', 'Set Your Success Alert Background', 'false','.oxi-addons-gr-form-' . $oxiid . ' .gform_confirmation_wrapper','background');
                                            echo oxi_addons_adm_help_border('OxiAdd_gravity_Succ_B', $styledata[519], $styledata[521], 'Border', 'Set Your Success Alert Border with size and different style', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_confirmation_wrapper','border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_Succ_B_C', $styledata[653], '', 'Border Color', 'Set Your Success Alert Border color', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_confirmation_wrapper','border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_Succ_F', 523, $styledata, 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_confirmation_wrapper');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_Succ_BR', 529, $styledata, 1, 'Border Radius', 'Set Your Success Alert Border Radius', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_confirmation_wrapper','border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_Succ_padding', 545, $styledata, 1, 'Padding', 'Set Your Success Alert Padding', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_confirmation_wrapper','padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Submit Button
                                        </div>
                                                                          <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_B_FS', $styledata[577], $styledata[578], $styledata[579], 1, 'Font Size', 'Your Button Font Size', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button,   #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit],    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button,    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]','font-size');
                                            echo oxi_addons_adm_help_true_false('OxiAdd_gravity_B_width', $styledata[661], 'Standard', 'standard', 'Full Width', 'full', 'Button Width', 'Set Your Border Width', 'false');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_B_color', $styledata[583], '', 'Color', 'Select Your Button Color', 'false','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button,   #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit],    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button,    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]','color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_B_H_color', $styledata[585], '', 'Hover Color', 'Select Your Button Color', 'false',' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button:hover, #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit]:hover,  #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button:hover,  #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]:hover','color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_B_BG', $styledata[587], 'rgba', 'Background', 'Select Your Button Color', '', '.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button,   #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit],    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button,    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_B_H_BG', $styledata[589], 'rgba', 'Hober Background', 'Select Your Button Color', '',' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button:hover, #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit]:hover,  #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button:hover,  #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]:hover','background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_gravity_B_F', 591, $styledata, 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button,   #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit],    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button,    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]');
                                            echo oxi_addons_adm_help_border('OxiAdd_gravity_B_Bitton', $styledata[657], $styledata[659], 'Border', 'Set Your Button Border with size and different style', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button,   #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit],    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button,    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]');
                                           
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_B_B_C', $styledata[613], '', 'Border Color', 'Select your active button Border color', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button,   #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit],    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button,    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]','border-color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_gravity_B_H_B_C', $styledata[615], '', 'Hover Border', 'Select your active button Border color', 'true',' .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button:hover, #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit]:hover,  #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button:hover,  #oxi-addons-preview-data  .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]:hover',' border-color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gravity_B_B_R', $styledata[617], $styledata[618], $styledata[619], 1, 'Border Radius', 'Your Button Border Radius', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button,   #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit],    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button,    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]','border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_B_P', 621, $styledata, 1, 'Padding', 'Set Your Button Size Top Bottom and Left Right', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input.button,   #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer input[type=submit],    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input.button,    #oxi-addons-preview-data .oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_page_footer input[type=submit]','padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_gravity_B_M', 637, $styledata, 1, 'Margin', 'Set Your Button Size Top Bottom and Left Right', 'true','.oxi-addons-gr-form-' . $oxiid . ' .gform_wrapper .gform_footer','padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("OxiAddCForm-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                ?>
            </div>
            <div class="oxi-addons-style-left-preview">
                <div class="oxi-addons-style-left-preview-heading">
                    <div class="oxi-addons-style-left-preview-heading-left">
                        Preview
                    </div>
                    <div class="oxi-addons-style-left-preview-heading-right">
                        <?php echo oxi_addons_adm_help_preview_color($styledata[1]); ?>
                    </div>
                </div>
                <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                    <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$jquery .= "jQuery('#oxi-addons-form-submit').submit(function (e) {
            var Id = jQuery('#oxiadd-gravity-id').val();
            if (Id === '') {
                alert('Kindly Set your Gravity ID Key');
                e.preventDefault();
                return false;
            }
        });";

echo OxiAddonsInlineCSSData($jquery, 'js');