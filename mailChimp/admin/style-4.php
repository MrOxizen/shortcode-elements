<?php
if (!defined('ABSPATH')) {
    exit;
}
oxi_addons_user_capabilities();
global $wpdb;
$jquery = $css = '';
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-button-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '||'
                . '||'
                . '||||'
                . '||||'
                . OxiAddonsBGImageSanitize('oxi-mailchimp-bg-image')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-full-padding')
                . oxi_addons_adm_help_single_size('oxi-mailchimp-orm-font-size')
                . 'oxi-mailchimp-color |' . sanitize_hex_color($_POST['oxi-mailchimp-color']) . '|'
                . 'oxi-mailchimp-writing-color |' . sanitize_hex_color($_POST['oxi-mailchimp-writing-color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('oxi-mailchimp-font')
                . '||||'
                . 'oxi-mailchimp-border-color |' . sanitize_hex_color($_POST['oxi-mailchimp-border-color']) . '|'
                . 'oxi-mailchimp-border-H-color |' . sanitize_hex_color($_POST['oxi-mailchimp-border-H-color']) . '|'
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-form-padding')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-form-margin')
                . '||||'
                . oxi_addons_adm_help_single_size('oxi-mailchimp-button-font-size')
                . 'oxi-mailchimp-button-color |' . sanitize_hex_color($_POST['oxi-mailchimp-button-color']) . '|'
                . ' oxi-mailchimp-button-bg-color |' . sanitize_text_field($_POST['oxi-mailchimp-button-bg-color']) . '|'
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-button-border-width')
                . OxiAddonsADMHelpBorderSanitize('oxi-mailchimp-button-border') . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('oxi-mailchimp-button-font')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-button-border-radius')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-button-padding')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-button-margin')
                . 'oxi-mailchimp-H-color |' . sanitize_hex_color($_POST['oxi-mailchimp-H-color']) . '|'
                . 'oxi-mailchimp-H-bg-color |' . sanitize_text_field($_POST['oxi-mailchimp-H-bg-color']) . '|'
                . OxiAddonsADMHelpBorderSanitize('oxi-mailchimp-border-hover') . '|'
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-H-border-radius')
                . oxi_addons_adm_help_animation_senitize('oxi-mailchimp-animation')
                . oxi_addons_adm_help_single_size('oxi-mailchimp-alert-font-size')
                . 'oxi-mailchimp-alert-color |' . sanitize_hex_color($_POST['oxi-mailchimp-alert-color']) . '|'
                . 'oxi-mailchimp-alert-bg-color |' . sanitize_text_field($_POST['oxi-mailchimp-alert-bg-color']) . '|'
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-alert-border-width')
                . OxiAddonsADMHelpBorderSanitize('oxi-mailchimp-alert-border') . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('oxi-mailchimp-alert-font')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-alert-border-radius')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-alert-padding')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-alert-margin')
                . OxiAddonsADMHelpBorderSizeType('oxi-mailchimp-border')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-form-bR')
                . 'oxi-mailchimp-title-color |' . sanitize_hex_color($_POST['oxi-mailchimp-title-color']) . '|'
                . oxi_addons_adm_help_single_size('oxi-mailchimp-title-font-size')
                . OxiAddonsADMHelpFontSettingsSanitize('oxi-mailchimp-title-font')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-mailchimp-title-padding')
                 . 'oxi-mailchimp-form-bg-color |' . sanitize_text_field($_POST['oxi-mailchimp-form-bg-color']) . '|'
                . '||#||'
                . 'oxi-mailchimp-button-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-mailchimp-button-text']) . '||#||'
                . '||#|| ||#||'
                . 'oxi-API-key ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-API-key']) . '||#||'
                . 'oxi-list-id ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-list-id']) . '||#||'
                . 'oxi-addons-mailchimp-loading-icon-class ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi-addons-mailchimp-loading-icon-class']) . '||#||'
                . 'oxi-addons-mailchimp-loading-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-mailchimp-loading-text']) . '||#||'
                . 'oxi-addons-mailchimp-alert-text-success ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-mailchimp-alert-text-success']) . '||#||'
                . 'oxi-addons-mailchimp-alert-text-error ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-mailchimp-alert-text-error']) . '||#||'
                . 'oxi-mailchimp-place-holder-email ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-mailchimp-place-holder-email']) . '||#||'
                . 'oxi-mailchimp-place-holder-fname ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-mailchimp-place-holder-fname']) . '||#||'
                . 'oxi-mailchimp-place-holder-lname ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-mailchimp-place-holder-lname']) . '||#||'
                . 'oxi-mailchimp-title-email-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-mailchimp-title-email-text']) . '||#||'
                . 'oxi-mailchimp-title-fname-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-mailchimp-title-fname-text']) . '||#||'
                . 'oxi-mailchimp-title-lname-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-mailchimp-title-lname-text']) . '||#||'

        ;
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);

$list_id = $stylefiles[8];
$api_key = $stylefiles[6];
$data_center = substr($api_key, strpos($api_key, '-') + 1);
$url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members';
$admin_email = get_option('admin_email');
$json = json_encode([
    'email_address' => $admin_email,
    'status' => 'subscribed', //pass 'subscribed' or 'pending'
    'merge_fields' =>
    [
        'FNAME' => '',
        'LNAME' => '',
    ]
        ]);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
$result = curl_exec($ch);
$results = json_decode($result);
$rstdta = $results->status;
if ($rstdta == 401 || $results == 0) {
    $jquery .= "jQuery('#oxi-addons-mailchimb-alert-warning').html('Your API Key may be Invalid. Please Enter the Correct Api Key.');"
            . "jQuery('#oxi-addons-mailchimb-alert-warning').css('display','block');";
} else if ($rstdta == 404) {
    $jquery .= "jQuery('#oxi-addons-mailchimb-alert-warning').html('Your Audience Id may be Invalid. Please Enter the Correct Audience Id.');"
            . "jQuery('#oxi-addons-mailchimb-alert-warning').css('display','block');";
} else {
    $jquery = "jQuery('#oxi-addons-mailchimb-alert-warning').css('display','none');";
}
?>
<div class="wrap">
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <div class="alert alert-warning" id="oxi-addons-mailchimb-alert-warning" style="display:none" role="oxi-addons-alert">
                            </div>
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li  ref="#oxi-addons-tabs-2">Button </li>
                                <li  ref="#oxi-addons-tabs-3">Alert Box</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi-API-key', $stylefiles[6], 'API Key', 'Set Your MailChimp API Key', 'false', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section a.oxi-addons-mailchimp-button');
                                            echo oxi_addons_adm_help_textbox('oxi-list-id', $stylefiles[8], 'Audience Id', 'Set Your MailChimp Audience Id', 'false', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section a.oxi-addons-mailchimp-button');
                                            echo oxi_addons_adm_help_textbox('oxi-mailchimp-button-text', $stylefiles[2], 'Button Text', 'Give your MailChimp Button Text', 'false', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button');
                                            echo OxiAddonsADMHelpBGImage('oxi-mailchimp-bg-image', $styledata, 15, 'false', '.oxi-addons-mailchimp-' . $oxiid . '', 'background');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-full-padding', 19, $styledata, 1, 'Padding', 'Set Your Body Padding', 'true', '.oxi-addons-mailchimp-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title Typography
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                             echo oxi_addons_adm_help_number_dtm('oxi-mailchimp-title-font-size', $styledata[307], $styledata[308], $styledata[309], 1, 'Font Size', 'Your Input Field Title Font Size', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-sec .oxi-addons-mailchimp-label', 'font-size'); 
                                             echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-title-color', $styledata[305], '', 'Title Color', 'Select your Input Field Title color', 'false', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-sec .oxi-addons-mailchimp-label', 'color');
                                            echo OxiAddonsADMHelpFontSettings('oxi-mailchimp-title-font', 311, $styledata, 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-sec .oxi-addons-mailchimp-label');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-title-padding', 317, $styledata, 1, 'Padding', 'Set Your Input Field Title Padding', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-sec .oxi-addons-mailchimp-label', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Input Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi-mailchimp-orm-font-size', $styledata[35], $styledata[36], $styledata[37], 1, 'Font Size', 'Your Input Field Font Size', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-color', $styledata[39], '', 'Placeholder Color', 'Select your Input Field Placeholder color', 'false', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input::placeholder', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-writing-color', $styledata[41], '', 'Writing Color', 'Select your Active Input Field color', 'false', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input', 'color');
                                             echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-form-bg-color', $styledata[333], 'rgba', 'Background Color', 'Select your Input Field Background color', 'false', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input', 'background');
                                            echo OxiAddonsADMHelpFontSettings('oxi-mailchimp-font', 43, $styledata, 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input');
                                            echo oxi_addons_adm_help_border('oxi-mailchimp-border', $styledata[285], $styledata[286], 'Border', 'Set Your Active Input Field Border with size and different style', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input', 'border-width');
                                            echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-border-color', $styledata[53], '', 'Border Color', 'Select Your Input Field Border color', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input', 'border-color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-border-H-color', $styledata[55], '', 'Hover Border Color', 'Select your active Input Field Border Hover color', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input:focus', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-form-bR', 289, $styledata, 1, 'Border Radius', 'Set Your Input Field Border Radius', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-form-padding', 57, $styledata, 1, 'Padding', 'Set Your Input Field Padding', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-form-margin', 73, $styledata, 1, 'Margin', 'Set Your Input Field Maring','true','.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-form-sec','padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Email Field
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi-mailchimp-title-email-text', $stylefiles[24], 'Email Title', 'Set Your MailChimp Email Title Text', 'false');
                                            echo oxi_addons_adm_help_textbox('oxi-mailchimp-place-holder-email', $stylefiles[18], 'Email Placeholder', 'Set Your MailChimp Email Field Placeholder Text', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            First Name Field
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi-mailchimp-title-fname-text', $stylefiles[26], 'First Name Title', 'Set Your MailChimp First Name Title Text', 'false');
                                            echo oxi_addons_adm_help_textbox('oxi-mailchimp-place-holder-fname', $stylefiles[20], 'First Name Placeholder', 'Set Your MailChimp First Name Field Placeholder Text', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Last Name Field
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi-mailchimp-title-lname-text', $stylefiles[28], 'Last Name Title', 'Set Your MailChimp Last Name Title Text', 'false');
                                            echo oxi_addons_adm_help_textbox('oxi-mailchimp-place-holder-lname', $stylefiles[22], 'Last Name Placeholder', 'Set Your MailChimp Last Name Field Placeholder Text', 'true');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Typography
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            
                                            echo oxi_addons_adm_help_number_dtm('oxi-mailchimp-button-font-size', $styledata[93], $styledata[94], $styledata[95], 1, 'Font Size', 'Set your Button Font Size', 'true', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button', 'font-size');
                                            
                                            echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-button-color', $styledata[97], 'Color', 'Set Your Button Color', 'false', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-button-bg-color', $styledata[99], 'rgba', 'Background Color', 'Set Your Button Background Color', 'false', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button', 'backgroud');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-button-border-width', 101, $styledata, 1, 'Border', 'Set Border for your Button', 'true', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button', 'border-width');
                                            echo OxiAddonsADMhelpBorder('oxi-mailchimp-button-border', 117, $styledata, 'true', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button', 'border-style');
                                            echo OxiAddonsADMHelpFontSettings('oxi-mailchimp-button-font', 121, $styledata, 'true', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-button-border-radius', 127, $styledata, 1, 'Border Radius', 'Set Border Radius for your Button', 'true', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-button-padding', 143, $styledata, 1, 'Padding', 'Set Padding for your Button', 'true', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-button-margin', 159, $styledata, 1, 'Margin', 'Set Margin for your Button', 'true', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Typography
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-H-color', $styledata[175], '', 'Color', 'Set Your Button Color', 'false', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-H-bg-color', $styledata[177], 'rgba', 'Background', 'Set Your Button Background Color', 'false', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button:hover', 'background');
                                            echo OxiAddonsADMhelpBorder('oxi-mailchimp-border-hover', 179, $styledata, 'true', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button:hover', 'border-style');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-H-border-radius', 183, $styledata, 1, 'Border Radius', 'Set Border Radius for your Button', 'true', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button:hover', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('oxi-mailchimp-animation', 199, $styledata, 'true', '.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Loading
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi-addons-mailchimp-loading-icon-class', $stylefiles[10], 'Icon Class', 'Set Your MailChimp Icon Class', 'false');
                                            echo oxi_addons_adm_help_textbox('oxi-addons-mailchimp-loading-text', $stylefiles[12], 'Text', 'Set Your MailChimp Loading Text', 'false');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-3">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi-addons-mailchimp-alert-text-success', $stylefiles[14], 'Success Alert Text', 'Set Your MailChimp Success Alert Text', 'false');
                                            echo oxi_addons_adm_help_textbox('oxi-addons-mailchimp-alert-text-error', $stylefiles[16], 'Error Alert Text', 'Set Your MailChimp Error Alert Text', 'false');
                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Alert Box Typography
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi-mailchimp-alert-font-size', $styledata[203], $styledata[204], $styledata[205], 1, 'Font Size', 'Set your Alert Box Font Size', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-alert-color', $styledata[207], '', 'Color', 'Set Your Alert Box Color', 'false', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-mailchimp-alert-bg-color', $styledata[209], 'rgba', 'Background Color', 'Set Your Alert Box Background Color', 'false', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text', 'background');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-alert-border-width', 211, $styledata, 1, 'Border', 'Set Border for your Alert', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text', 'border-width');
                                            echo OxiAddonsADMhelpBorder('oxi-mailchimp-alert-border', 227, $styledata, 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text', 'border-style');
                                            echo OxiAddonsADMHelpFontSettings('oxi-mailchimp-alert-font', 231, $styledata, 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-alert-border-radius', 237, $styledata, 1, 'Border Radius', 'Set Border Radius for your Alert Box', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-alert-padding', 253, $styledata, 1, 'Padding', 'Set Padding for your Alert Box', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi-mailchimp-alert-margin', 269, $styledata, 1, 'Margin', 'Set Margin for your Alert Box', 'true', '.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-setting-save">
                                <?php echo oxiaddonssettingsavedtmmode(); ?>
                                <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                                <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                                <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php $styledata[1] ?>">
                                <?php wp_nonce_field("oxi-addons-button-nonce") ?>
                            </div>
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
                    <?php echo oxi_mailChimp_style_4_shortcode($style); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$jquery .= "jQuery('#oxi-addons-form-submit').submit(function (e) {
            var API = jQuery('#oxi-API-key').val();
            var listid = jQuery('#oxi-list-id').val();
            if (API === '' && listid === '') {
                alert('Kindly Set your API Key and List ID');
                e.preventDefault();
                return false;
            } else if (API === '') {
                alert('Kindly Set your API Key');
                e.preventDefault();
                return false;
            } else if (listid === '') {
                alert('Kindly Set your List ID Key');
                e.preventDefault();
                return false;
            }
        });";

echo OxiAddonsInlineCSSData($jquery, 'js');

