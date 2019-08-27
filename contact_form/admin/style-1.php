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

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddCForm-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {

        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' OxiAddCF-color |' . sanitize_text_field($_POST['OxiAddCF-color']) . '|'
                . ' OxiAddCF-writing-color |' . sanitize_text_field($_POST['OxiAddCF-writing-color']) . '|'
                . ' OxiAddCF-border |' . sanitize_text_field($_POST['OxiAddCF-border']) . '|'
                . ' OxiAddCF-border-type |' . sanitize_text_field($_POST['OxiAddCF-border-type']) . '|'
                . ' OxiAddCF-border-color |' . sanitize_text_field($_POST['OxiAddCF-border-color']) . '|'
                . ' OxiAddCF-border-H-color |' . sanitize_text_field($_POST['OxiAddCF-border-H-color']) . '|'
                . ' OxiAddCF-error-color |' . sanitize_text_field($_POST['OxiAddCF-error-color']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCF-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCForm-margin') . ''
                . ' OxiAddCF-style |' . sanitize_text_field($_POST['OxiAddCF-style']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCF-G-padding') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddCD-animation') . ''
                . '||||||||||||'
                . '' . oxi_addons_adm_help_single_size('OxiAddCForm-font-size') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddCForm') . ''
                . '||||||||||||||||||||||'
                . '' . oxi_addons_adm_help_single_size('OxiAddCForm-success-font-size') . ''
                . ' OxiAddCForm-success-color |' . sanitize_text_field($_POST['OxiAddCForm-success-color']) . '|'
                . ' OxiAddCForm-success-bg-color |' . sanitize_text_field($_POST['OxiAddCForm-success-bg-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddCForm-success') . ''
                . ' OxiAddCF-success-border |' . sanitize_text_field($_POST['OxiAddCF-success-border']) . '|'
                . ' OxiAddCF-success-border-type |' . sanitize_text_field($_POST['OxiAddCF-success-border-type']) . '|'
                . ' OxiAddCF-success-border-color |' . sanitize_text_field($_POST['OxiAddCF-success-border-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddCForm-success-border-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCForm-success-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCForm-success-margin') . ''
                . '||||||||||||||||'
                . '' . oxi_addons_adm_help_single_size('OxiAddCForm-T-font-size') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddCForm-T-width') . ''
                . ' OxiAddCForm-T-color |' . sanitize_text_field($_POST['OxiAddCForm-T-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddCForm-T') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCForm-T-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddCForm-C-font-size') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddCForm-C-width') . ''
                . ' OxiAddCForm-C-color |' . sanitize_text_field($_POST['OxiAddCForm-C-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddCForm-C') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCForm-C-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddCForm-B-font-size') . ''
                . ' OxiAddCForm-B-color |' . sanitize_text_field($_POST['OxiAddCForm-B-color']) . '|'
                . ' OxiAddCForm-B-H-color |' . sanitize_text_field($_POST['OxiAddCForm-B-H-color']) . '|'
                . ' OxiAddCForm-B-bg-color |' . sanitize_text_field($_POST['OxiAddCForm-B-bg-color']) . '|'
                . ' OxiAddCForm-B-bg-H-color |' . sanitize_text_field($_POST['OxiAddCForm-B-bg-H-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddCForm-B') . ''
                . ' OxiAddCF-B-border |' . sanitize_text_field($_POST['OxiAddCF-B-border']) . '|'
                . ' OxiAddCF-B-border-type |' . sanitize_text_field($_POST['OxiAddCF-B-border-type']) . '|'
                . ' OxiAddCF-B-border-color |' . sanitize_text_field($_POST['OxiAddCF-B-border-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddCForm-B-border-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCForm-B-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCForm-B-margin') . ''
                . ' OxiAddCF-B-border-H-color |' . sanitize_text_field($_POST['OxiAddCF-B-border-H-color']) . '|'
                . '||||||||||||||||'
                . '||#||  ||#||'
                . 'OxiAddCForm-name-text||#||' . sanitize_text_field($_POST['OxiAddCForm-name-text']) . '||#||'
                . 'OxiAddCForm-name-error-text||#||' . sanitize_text_field($_POST['OxiAddCForm-name-error-text']) . '||#||'
                . 'OxiAddCForm-email-text||#||' . sanitize_text_field($_POST['OxiAddCForm-email-text']) . '||#||'
                . 'OxiAddCForm-email-error-text||#||' . sanitize_text_field($_POST['OxiAddCForm-email-error-text']) . '||#||'
                . 'OxiAddCForm-massage-text||#||' . sanitize_text_field($_POST['OxiAddCForm-massage-text']) . '||#||'
                . 'OxiAddCForm-massage-error-text||#||' . sanitize_text_field($_POST['OxiAddCForm-massage-error-text']) . '||#||'
                . 'OxiAddCForm-success-text||#||' . sanitize_text_field($_POST['OxiAddCForm-success-text']) . '||#||'
                . 'OxiAddCForm-T-text||#||' . sanitize_text_field($_POST['OxiAddCForm-T-text']) . '||#||'
                . 'OxiAddCForm-C-text||#||' . sanitize_text_field($_POST['OxiAddCForm-C-text']) . '||#||'
                . 'OxiAddCForm-B-text||#||' . sanitize_text_field($_POST['OxiAddCForm-B-text']) . '||#||'
                . 'OxiAddCForm-admin-email||#||' . sanitize_text_field($_POST['OxiAddCForm-admin-email']) . '||#||'
                . '|';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
//echo '<pre>';
//print_r($styledata);
//echo '</pre>';
?>
<div class="wrap">    
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-tabs-id-1">General</li>
                                <li  ref="#oxi-tabs-id-2">Additional</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Input Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCForm-font-size', $styledata[83], $styledata[84], $styledata[85], 1, 'Font Size', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="text"], .oxi-addons-form-warp-' . $oxiid . ' input[type="text"]:focus, .oxi-addons-form-warp-' . $oxiid . ' input[type="text"]:hover, .oxi-addons-form-warp-' . $oxiid . ' textarea, .oxi-addons-form-warp-' . $oxiid . ' textarea:focus, .oxi-addons-form-warp-' . $oxiid . ' textarea:hover', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCF-color', $styledata[3], '', 'Color', 'Select your active button Border color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-focus-input-' . $oxiid . '::after', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCF-writing-color', $styledata[5], '', 'Writing Color', 'Select your active button Border color', '', '.oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\'], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\']:focus, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\']:hover, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea:focus, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea:hover', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddCForm', 87, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\'], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\']:focus, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\']:hover, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea:focus, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea:hover');
                                            echo oxi_addons_adm_help_border('OxiAddCF-border', $styledata[7], $styledata[9], 'Border Bottom', 'Set your active button Border with size and different style', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\'], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\']:focus, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\']:hover, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea:focus, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea:hover', 'border-bottom');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCF-border-color', $styledata[11], '', 'Border Color', 'Select your active button Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\'], #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\']:focus, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' input[type=\'text\']:hover, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea:focus, #oxi-addons-preview-data .oxi-addons-form-warp-' . $oxiid . ' textarea:hover', 'border-color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCF-border-H-color', $styledata[13], '', 'Hover Border Color', 'Select your active button Border color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-focus-input-' . $oxiid . '::before', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCF-error-color', $styledata[15], '', 'Error Color', 'Select your active button Border color', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCF-padding', 17, $styledata, 1, 'Padding', 'Set Your Button Size Top Bottom and Left Right', 'true', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCForm-margin', 33, $styledata, 1, 'Margin', 'Set Your Button Size Top Bottom and Left Right');
                                            ?>
                                        </div>                                               
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <div class="form-group row">
                                                <label for="OxiAddCF-style" class="col-sm-6 control-label" oxi-addons-tooltip="Select Your Form Style">Form Style</label>
                                                <div class="col-sm-6 addons-dtm-laptop">
                                                    <select class="form-control" id="OxiAddCF-style" name="OxiAddCF-style">
                                                        <option value="style-1" <?php
                                                        if ($styledata[49] == 'style-1') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Style 1</option>
                                                        <option value="style-2" <?php
                                                        if ($styledata[49] == 'style-2') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Style 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddCForm-admin-email', $stylefiles[23], 'Admin Email', 'Set Your Admin Email');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCF-G-padding', 51, $styledata, 1, 'Padding', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>                                               
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddCD-animation', 67, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Name Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddCForm-name-text', $stylefiles[3], 'Name Text', 'Set Your Name Text');
                                            echo oxi_addons_adm_help_textbox('OxiAddCForm-name-error-text', $stylefiles[5], 'Name Error', 'Set Your Require Title Text');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Email Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddCForm-email-text', $stylefiles[7], 'Email Text', 'Set Your Email');
                                            echo oxi_addons_adm_help_textbox('OxiAddCForm-email-error-text', $stylefiles[9], 'Email Error', 'Set Your Require Email Text');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Massage Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddCForm-massage-text', $stylefiles[11], 'Massage Text', 'Set Your Message Text');
                                            echo oxi_addons_adm_help_textbox('OxiAddCForm-massage-error-text', $stylefiles[13], 'Massage Error', 'Set Your Require Message text');
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddCForm-T-text', $stylefiles[17], 'Title Text', 'Write Your title text', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCForm-T-font-size', $styledata[187], $styledata[188], $styledata[189], 1, 'Font Size', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-title', 'font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCForm-T-width', $styledata[191], $styledata[192], $styledata[193], 1, 'Max Width', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-title', 'max-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCForm-T-color', $styledata[195], '', 'Color', 'Select Your Heading Color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddCForm-T', 197, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCForm-T-padding', 203, $styledata, 1, 'Padding', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-title'), '';
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Success Massage 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddCForm-success-text', $stylefiles[15], 'Write Your success text.', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCForm-success-font-size', $styledata[115], $styledata[116], $styledata[117], 1, 'Font Size', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success-data', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCForm-success-color', $styledata[119], '', 'Color', 'Select Your Heading Color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success-data', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCForm-success-bg-color', $styledata[121], 'rgba', 'Background', 'Select Your Heading Color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success-data', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddCForm-success', 123, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success-data');
                                            echo oxi_addons_adm_help_border('OxiAddCF-success-border', $styledata[129], $styledata[131], 'Border', 'Set your active button Border with size and different style', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success-data', 'border-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCF-success-border-color', $styledata[133], '', 'Border Color', 'Select your active button Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success-data', 'border-color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCForm-success-border-radius', $styledata[135], $styledata[136], $styledata[137], 1, 'Border Radius', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success-data', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCForm-success-padding', 139, $styledata, 1, 'Padding', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success-data', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCForm-success-margin', 155, $styledata, 1, 'Margin', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddCForm-C-text', $stylefiles[19], 'Short Content', 'Write short content after title', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCForm-C-font-size', $styledata[219], $styledata[220], $styledata[221], 1, 'Font Size', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-content', 'font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCForm-C-width', $styledata[223], $styledata[224], $styledata[225], 1, 'Max Width', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-content', 'max-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCForm-C-color', $styledata[227], '', 'Color', 'Select Your Heading Color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-content', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddCForm-C', 229, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-content');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCForm-C-padding', 235, $styledata, 1, 'Padding', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-content', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Submit Button
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddCForm-B-text', $stylefiles[21], 'Button Text', 'Write Your Button text', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCForm-B-font-size', $styledata[251], $styledata[252], $styledata[253], 1, 'Font Size', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCForm-B-color', $styledata[255], '', 'Color', 'Select Your Heading Color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCForm-B-H-color', $styledata[257], '', 'Hover Color', 'Select Your Heading Color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn:hover, .oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn:focus', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCForm-B-bg-color', $styledata[259], 'rgba', 'Background', 'Select Your Heading Color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCForm-B-bg-H-color', $styledata[261], 'rgba', 'Hober Background', 'Select Your Heading Color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn:hover, .oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn:focus', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddCForm-B', 263, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn');
                                            echo oxi_addons_adm_help_border('OxiAddCF-B-border', $styledata[269], $styledata[271], 'Border', 'Set your active button Border with size and different style', 'true', ' .oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn', 'border-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCF-B-border-color', $styledata[273], '', 'Border Color', 'Select your active button Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn', 'border-color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCF-B-border-H-color', $styledata[311], '', 'Hover Border', 'Select your active button Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn:hover, .oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn:focus', 'border-color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCForm-B-border-radius', $styledata[275], $styledata[276], $styledata[277], 1, 'Border Radius', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCForm-B-padding', 279, $styledata, 1, 'Padding', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCForm-B-margin', 295, $styledata, 1, 'Margin', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-btn', 'margin');
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
