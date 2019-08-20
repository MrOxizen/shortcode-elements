<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}
if (!is_plugin_active('wpforms-lite/wpforms.php')) {
    $wpforms_active = "<p class='wpforms_active'>Please Install And Activate WPForms Plugins</p>";
}

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}


if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddCForm-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {

        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_Max_W')
            . 'OxiAdd_WpF_BG |' . sanitize_text_field($_POST['OxiAdd_WpF_BG']) . '|'
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_B_W')
            . OxiAddonsADMHelpBorderSanitize('OxiAdd_WpF_Border') . '|'
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_B_R')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_P')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_M')
            . OxiAddonsADMBoxShadowSanitize('OxiAdd_WpF_box_shadow')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_Lab_FS')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_Lab_S_FS')
            . 'OxiAdd_WpF_Lab_color |' . sanitize_hex_color($_POST['OxiAdd_WpF_Lab_color']) . '|'
            . 'OxiAdd_WpF_Lab_S_color |' . sanitize_text_field($_POST['OxiAdd_WpF_Lab_S_color']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_WpF_Lab_F')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_Field_FS')
            . 'OxiAdd_WpF_Field_color |' . sanitize_hex_color($_POST['OxiAdd_WpF_Field_color']) . '|'
            . 'OxiAdd_WpF_Field_BG |' . sanitize_text_field($_POST['OxiAdd_WpF_Field_BG']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_WpF_Field_F')
            . '||||||||||||||||||||||||'
            . ' OxiAdd_WpF_Field_border |' . sanitize_text_field($_POST['OxiAdd_WpF_Field_border']) . '|'
            . ' OxiAdd_WpF_Field_border-type |' . sanitize_text_field($_POST['OxiAdd_WpF_Field_border-type']) . '|'
            . ' OxiAdd_WpF_Field_border_color |' . sanitize_text_field($_POST['OxiAdd_WpF_Field_border_color']) . '|'
            . ' OxiAdd_WpF_Field_Focas_B_C |' . sanitize_text_field($_POST['OxiAdd_WpF_Field_Focas_B_C']) . '|'
            . ' OxiAdd_WpF_Field_error_B_C |' . sanitize_text_field($_POST['OxiAdd_WpF_Field_error_B_C']) . '|'
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_Field_padding')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_Field_margin')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_radio_FS')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_radio_Icon_FS')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_radio_W')
            . 'OxiAdd_WpF_radio_C |' . sanitize_text_field($_POST['OxiAdd_WpF_radio_C']) . '|'
            . 'OxiAdd_WpF_radio_icon_C |' . sanitize_text_field($_POST['OxiAdd_WpF_radio_icon_C']) . '|'
            . 'OxiAdd_WpF_radio_text_color |' . sanitize_hex_color($_POST['OxiAdd_WpF_radio_text_color']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_WpF_radio_F')
            . '||||||'
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_radio_B_R')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_radio_P')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_radio_M')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_checkbox_FS')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_checkbox_Icon_FS')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_checkbox_W')
            . ' OxiAdd_WpF_checkbox_C |' . sanitize_hex_color($_POST['OxiAdd_WpF_checkbox_C']) . '|'
            . 'OxiAdd_WpF_checkbox_input_C |' . sanitize_text_field($_POST['OxiAdd_WpF_checkbox_input_C']) . '|'
            . 'OxiAdd_WpF_checkbox_text_color |' . sanitize_hex_color($_POST['OxiAdd_WpF_checkbox_text_color']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_WpF_checkbox_F')
            . ' OxiAdd_WpF_checkbox_border |' . sanitize_text_field($_POST['OxiAdd_WpF_checkbox_border']) . '|'
            . ' OxiAdd_WpF_checkbox_border-type |' . sanitize_text_field($_POST['OxiAdd_WpF_checkbox_border-type']) . '|'
            . ' OxiAdd_WpF_checkbox_border_color |' . sanitize_text_field($_POST['OxiAdd_WpF_checkbox_border_color']) . '|'
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_checkbox_B_R')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_checkbox_P')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_checkbox_M')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_dropdown_FS')
            . 'OxiAdd_WpF_dropdown_C |' . sanitize_hex_color($_POST['OxiAdd_WpF_dropdown_C']) . '|'
            . 'OxiAdd_WpF_dropdown_BG |' . sanitize_text_field($_POST['OxiAdd_WpF_dropdown_BG']) . '|'
            . 'OxiAdd_WpF_dropdown_option_C |' . sanitize_hex_color($_POST['OxiAdd_WpF_dropdown_option_C']) . '|'
            . 'OxiAdd_WpF_dropdown_option_BG |' . sanitize_text_field($_POST['OxiAdd_WpF_dropdown_option_BG']) . '|'
            . ' OxiAdd_WpF_dropdown_border |' . sanitize_text_field($_POST['OxiAdd_WpF_dropdown_border']) . '|'
            . ' OxiAdd_WpF_dropdown_border-type |' . sanitize_text_field($_POST['OxiAdd_WpF_dropdown_border-type']) . '|'
            . ' OxiAdd_WpF_dropdown_border_color |' . sanitize_text_field($_POST['OxiAdd_WpF_dropdown_border_color']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_WpF_dropdown_F')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_dropdown_padding')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_dropdown_margin')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_title_FS')
            . 'OxiAdd_WpF_title_color |' . sanitize_hex_color($_POST['OxiAdd_WpF_title_color']) . '|'
            . 'OxiAdd_WpF_title_BG |' . sanitize_text_field($_POST['OxiAdd_WpF_title_BG']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_WpF_title_F')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_title_padding')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_requ_FS')
            . 'OxiAdd_WpF_requ_color |' . sanitize_hex_color($_POST['OxiAdd_WpF_requ_color']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_WpF_requ_F')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_requ_padding')
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_Succ_FS')
            . 'OxiAdd_WpF_Succ_color |' . sanitize_hex_color($_POST['OxiAdd_WpF_Succ_color']) . '|'
            . 'OxiAdd_WpF_Succ_BG |' . sanitize_text_field($_POST['OxiAdd_WpF_Succ_BG']) . '|'
            . ' OxiAdd_WpF_Succ_B |' . sanitize_text_field($_POST['OxiAdd_WpF_Succ_B']) . '|'
            . ' OxiAdd_WpF_Succ_B-type |' . sanitize_text_field($_POST['OxiAdd_WpF_Succ_B-type']) . '|'
            . ' OxiAdd_WpF_Succ_B_C |' . sanitize_text_field($_POST['OxiAdd_WpF_Succ_B_C']) . '|'
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_Succ_B_R')
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_WpF_Succ_F')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_Succ_padding')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_Succ_margin')
            . '||'
            . oxi_addons_adm_help_single_size('OxiAdd_WpF_B_FS')
            . 'OxiAdd_WpF_B_color |' . sanitize_hex_color($_POST['OxiAdd_WpF_B_color']) . '|'
            . 'OxiAdd_WpF_B_H_color |' . sanitize_hex_color($_POST['OxiAdd_WpF_B_H_color']) . '|'
            . 'OxiAdd_WpF_B_BG |' . sanitize_text_field($_POST['OxiAdd_WpF_B_BG']) . '|'
            . 'OxiAdd_WpF_B_H_BG |' . sanitize_text_field($_POST['OxiAdd_WpF_B_H_BG']) . '|'
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_B_B_W')
            . OxiAddonsADMHelpBorderSanitize('OxiAdd_WpF_B_B') . '|'
            . '||'
            . 'OxiAdd_WpF_B_H_B_C |' . sanitize_hex_color($_POST['OxiAdd_WpF_B_H_B_C']) . '|'
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_B_B_R')
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAdd_WpF_B_F')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_B_P')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_WpF_B_M')
            . 'OxiAdd_WpF_B_Width |' . sanitize_text_field($_POST['OxiAdd_WpF_B_Width']) . '|'

            . '||#||'
            . ' OxiAdd_WpF_sc ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAdd_WpF_sc']) . '||#|| '
            . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
// echo '<pre>';
// print_r($styledata);
// echo '</pre>';
?>
<div class="wrap">
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <?php  echo $wpforms_active;
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
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-tabs-id-1">General</li>
                                <li ref="#oxi-tabs-id-2">Additional</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_form_textarea('OxiAdd_WpF_sc', $stylefiles[2], 'Shortcode Here', 'Give Your Info text Here Or You can give Any Shortcode from our addons', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_Max_W', $styledata[3], $styledata[4], $styledata[5], 1, 'Max Width', 'Enter You Max Width', 'f', '.oxi-addons-form-warp-' . $oxiid . '', 'max-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_BG', $styledata[7], 'rgba', 'Background Color', 'Select your Background color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-contact-wp-form', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_B_W', 9, $styledata, 1, 'Border Width', 'Set Your Border Width', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-contact-wp-form', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAdd_WpF_Border', 25, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-contact-wp-form', 'style', 'border');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_B_R', 29, $styledata, 1, 'Border radio', 'Set Your Border radio', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-contact-wp-form', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_P', 45, $styledata, 1, 'Padding', 'Set Your Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-contact-wp-form', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_M', 61, $styledata, 1, 'Margin', 'Set Your Margin', 'true', '.oxi-addons-form-warp-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAdd_WpF_box_shadow', 77, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-contact-wp-form');
                                            ?>
                                        </div>
                                    </div>

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            All Label
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_Lab_FS', $styledata[83], $styledata[84], $styledata[85], 1, 'Font Size', 'Your Label Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field-label', 'font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_Lab_S_FS', $styledata[87], $styledata[88], $styledata[89], 1, 'Second Font Size', 'Your Second Label Font Size', 'true', '..oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field-label span.wpforms-required-label', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_Lab_color', $styledata[91], '', 'Color', 'Select your Label color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field-label', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_Lab_S_color', $styledata[93], '', 'Second Color', 'Select your Label color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field-label span.wpforms-required-label', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_WpF_Lab_F', 95, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field-label');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Input & Textarea
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_Field_FS', $styledata[101], $styledata[102], $styledata[103], 1, 'Font Size', 'Your Input Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=date], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=datetime], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=datetime-local], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=email], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=month], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=number], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=password], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=range], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=search], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=tel], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=text], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=time], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=url], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=week], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form textarea', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_Field_color', $styledata[105], '', 'Color', 'Select your Input color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=date], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=datetime], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=datetime-local], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=email], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=month], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=number], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=password], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=range], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=search], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=tel], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=text], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=time], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=url], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=week], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form textarea', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_Field_BG', $styledata[107], 'rgba', 'Background Color', 'Select your Input Background', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=date], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=datetime], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=datetime-local], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=email], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=month], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=number], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=password], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=range], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=search], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=tel], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=text], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=time], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=url], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=week], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form textarea', 'background');
                                            echo oxi_addons_adm_help_border('OxiAdd_WpF_Field_border', $styledata[139], $styledata[141], 'Border Bottom', 'Set your  Input Border with size and different style', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field:not(.wpforms-field-checkbox):not(.wpforms-field-select):not(.wpforms-field-radio):not(.wpforms-field-name)', 'border-bottom');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_Field_border_color', $styledata[143], 'rgba', 'Border Color', 'Select your Input Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field:not(.wpforms-field-checkbox):not(.wpforms-field-select):not(.wpforms-field-radio):not(.wpforms-field-name)', 'border-color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_Field_Focas_B_C', $styledata[145], '', 'Focas Border Color', 'Select your Input Focas Border color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field:not(.wpforms-field-checkbox):not(.wpforms-field-select):not(.wpforms-field-radio):not(.wpforms-field-name)::after', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_Field_error_B_C', $styledata[147], '', 'Error Border Color', 'Select your Input Error Border color', '    .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-has-error:not(.wpforms-field-checkbox):not(.wpforms-field-select):not(.wpforms-field-radio):not(.wpforms-field-name)::after', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_WpF_Field_F', 109, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=date], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=datetime], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=datetime-local], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=email], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=month], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=number], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=password], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=range], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=search], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=tel], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=text], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=time], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=url], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=week], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form textarea');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_Field_padding', 149, $styledata, 1, 'Padding', 'Set Your Input Title Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=date], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=datetime], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=datetime-local], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=email], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=month], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=number], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=password], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=range], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=search], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=tel], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=text], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=time], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=url], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=week], #oxi-addons-preview-data  .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form textarea', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_Field_margin', 165, $styledata, 1, 'Margin', 'Set Your Input Title Margin', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field:not(.wpforms-field-checkbox):not(.wpforms-field-select):not(.wpforms-field-radio)', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Radio Box
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_radio_FS', $styledata[181], $styledata[182], $styledata[183], 1, 'Font Size', 'Your Radio Box Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-radio .wpforms-field-label-inline', 'font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_radio_Icon_FS', $styledata[185], $styledata[186], $styledata[187], 1, 'Icon Font Size', 'Your Radio Box Icon Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-radio input[type=radio]:checked + .wpforms-field-label-inline:before', 'box-shadow');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_radio_W', $styledata[189], $styledata[190], $styledata[191], 1, 'Box Width&Height', 'Your Radio Box Width&Height', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-radio .wpforms-field-label-inline:before', 'width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_radio_C', $styledata[193], '', 'Color', 'Select your color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-radio input[type=radio]:checked + .wpforms-field-label-inline:before', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_radio_icon_C', $styledata[195], 'rgba', 'Icon Color', 'Select your Radio Box color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-radio input[type=radio]:checked + .wpforms-field-label-inline:before', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_radio_text_color', $styledata[197], '', 'Text Color', 'Select your Radio Box Text color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-radio .wpforms-field-label-inline', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_WpF_radio_F', 199, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-radio .wpforms-field-label-inline');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_radio_B_R', $styledata[211], $styledata[212], $styledata[213], 1, 'Border radio', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-radio .wpforms-field-label-inline:before', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_radio_P', 215, $styledata, 1, 'Padding', 'Set Your Radio Box Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-radio li', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_radio_M', 231, $styledata, 1, 'Margin', 'Set Your Radio Box Margin', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-radio .wpforms-field-label-inline:before', 'margin');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAdd_WpF_radio_W', 'Width & Height'),
                                                )
                                            );

                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Check Box
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_checkbox_FS', $styledata[247], $styledata[248], $styledata[249], 1, 'Font Size', 'Your Check Box Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox .wpforms-field-label-inline', 'font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_checkbox_Icon_FS', $styledata[251], $styledata[252], $styledata[253], 1, 'Icon Font Size', 'Your Check Box Icon Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox .wpforms-field-label-inline:before', 'font');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_checkbox_W', $styledata[255], $styledata[256], $styledata[257], 1, 'Box Width&Height', 'Your Check Box Width&Height', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox .wpforms-field-label-inline:before', 'width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_checkbox_C', $styledata[259], '', 'Icon Color', 'Select your Check Box Icon color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox input[type=checkbox]:checked + .wpforms-field-label-inline:before', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_checkbox_input_C', $styledata[261], 'rgba', 'Box Color', 'Select your Check Box color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox .wpforms-field-label-inline:before', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_checkbox_text_color', $styledata[263], '', 'Text Color', 'Select your Check Box Text color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox .wpforms-field-label-inline', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_WpF_checkbox_F', 265, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox .wpforms-field-label-inline');
                                            echo oxi_addons_adm_help_border('OxiAdd_WpF_checkbox_border', $styledata[271], $styledata[273], 'Border', 'Set your Check Box Border with size and different style', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox .wpforms-field-label-inline:before', 'border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_checkbox_border_color', $styledata[275], '', 'Border Color', 'Select your Check Box Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox .wpforms-field-label-inline:before', 'border-color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_checkbox_B_R', $styledata[277], $styledata[278], $styledata[279], 1, 'Border radio', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox .wpforms-field-label-inline:before', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_checkbox_P', 281, $styledata, 1, 'Padding', 'Set Your Check Box Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox li', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_checkbox_M', 297, $styledata, 1, 'Margin', 'Set Your Check Box Margin', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-field.wpforms-field-checkbox .wpforms-field-label-inline:before', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Dropdown
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_dropdown_FS', $styledata[313], $styledata[314], $styledata[315], 1, 'Font Size', 'Your Dropdown Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_dropdown_C', $styledata[317], '', 'Color', 'Select your Dropdown  color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_dropdown_BG', $styledata[319], 'rgba', ' Dropdown Background', 'Select your Background', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_dropdown_option_C', $styledata[321], '', 'Option Color', 'Select your Dropdown Option color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select option', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_dropdown_option_BG', $styledata[323], 'rgba', 'Option Background', 'Select your Backgrond', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select option', 'background');
                                            echo oxi_addons_adm_help_border('OxiAdd_WpF_dropdown_border', $styledata[325], $styledata[327], 'Border', 'Set your Dropdown Border with size and different style', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select, .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select option .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select option', 'border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_dropdown_border_color', $styledata[329], '', 'Border Color', 'Select your Dropdown Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select, .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select option .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select option', 'border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_WpF_dropdown_F', 331, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_dropdown_padding', 337, $styledata, 1, 'Padding', 'Set Your Dropdown Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select', 'margin');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_dropdown_margin', 353, $styledata, 1, 'Option Padding', 'Set Your Dropdown Margin', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form select option', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Form Title
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_title_FS', $styledata[369], $styledata[370], $styledata[371], 1, 'Font Size', 'Your Title Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .wpforms-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_title_color', $styledata[373], '', 'Color', 'Select Your Title Color', '', '.oxi-addons-form-warp-' . $oxiid . ' .wpforms-title', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_title_BG', $styledata[375], 'rgba', 'Background', 'Select Your Title Background', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .wpforms-title', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_WpF_title_F', 377, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' .wpforms-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_title_padding', 383, $styledata, 1, 'Padding', 'Set Your Title Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .wpforms-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Required Alert
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_requ_FS', $styledata[399], $styledata[400], $styledata[401], 1, 'Font Size', 'Your Required Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form label.wpforms-error', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_requ_color', $styledata[403], '', 'Color', 'Select Your Required Color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form label.wpforms-error', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_WpF_requ_F', 405, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form label.wpforms-error');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_requ_padding', 411, $styledata, 1, 'Padding', 'Set Your Required Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form label.wpforms-error', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Success Alert
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_Succ_FS', $styledata[427], $styledata[428], $styledata[429], 1, 'Font Size', 'Your Success Font Size', 'true', '.wpforms-confirmation-container-full p', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_Succ_color', $styledata[431], '', 'Color', 'Select Your Success Color', '', '.wpforms-confirmation-container-full p', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_Succ_BG', $styledata[433], 'rgba', 'Background', 'Select Your Success Background', '', '.wpforms-confirmation-container-full p', 'background');
                                            echo oxi_addons_adm_help_border('OxiAdd_WpF_Succ_B', $styledata[435], $styledata[437], 'Border','Set your Success Border with size and different style', 'true', '.wpforms-confirmation-container-full p');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_Succ_B_C', $styledata[439], '', 'Border Color', 'Select your Success Border color', 'true', '.wpforms-confirmation-container-full p', 'border-color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_Succ_B_R', $styledata[441], $styledata[442], $styledata[443], 1, 'Border radio', 'Set Your Success Border radio ', 'true', '.wpforms-confirmation-container-full p', 'border-radius');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_WpF_Succ_F', 445, $styledata, 'true', '.wpforms-confirmation-container-full p');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_Succ_padding', 451, $styledata, 1, 'Padding', 'Set Your Success Padding', 'true', '.wpforms-confirmation-container-full p', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_Succ_margin', 467, $styledata, 1, 'Margin', 'Set Your Success Margin', 'true', '.wpforms-confirmation-container-full p', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Submit Button
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAdd_WpF_B_Width',$styledata[575],'Standard','standard', 'Full Width', 'full', 'Button Width', 'Set Your Button Width', 'f');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_WpF_B_FS', $styledata[485], $styledata[486], $styledata[487], 1, 'Font Size', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_B_color', $styledata[489], '', 'Color', 'Select Your Button Color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_B_H_color', $styledata[491], '', 'Hover Color', 'Select Your Button Color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit]:hover, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit]:hover, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_B_BG', $styledata[493], 'rgba', 'Background', 'Select Your Button Color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_B_H_BG', $styledata[495], 'rgba', 'Hober Background', 'Select Your Button Color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit]:hover, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit]:hover, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button:hover', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_B_B_W', 497, $styledata, 1, 'Border Width', 'Set Your Border Width', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAdd_WpF_B_B', 513, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button', 'border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdd_WpF_B_H_B_C', $styledata[519], 'true', 'Hover Border Color', 'Select Your Button Color', '', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit]:hover, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit]:hover, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button:hover', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_B_B_R', 521, $styledata, 1, 'Border radio', 'Set Your Border radio', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button', 'border-radius');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdd_WpF_B_F', 537, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_B_P', 543, $styledata, 1, 'Padding', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdd_WpF_B_M', 559, $styledata, 1, 'Margin', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form input[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form button[type=submit], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' div.wpforms-container-full .wpforms-form .wpforms-page-button', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
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
            var shortcode = jQuery('#OxiAdd_WpF_sc').val();
             if (shortcode  === '') {
                alert('Kindly Set Your Shortcode');
                e.preventDefault();
                return false;
            }
        });";

echo OxiAddonsInlineCSSData($jquery, 'js');