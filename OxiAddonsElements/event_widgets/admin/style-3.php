<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
$listitemdata = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$listid = '';
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . ' ||'
            . ' OxiAddonsEW-G-MW |' . sanitize_text_field($_POST['OxiAddonsEW-G-MW']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-G-BS') . ''
            . ' OxiAddonsEW-BP-BG |' . sanitize_hex_color($_POST['OxiAddonsEW-BP-BG']) . '|'
            . ' OxiAddonsEW-BP-TC |' . sanitize_hex_color($_POST['OxiAddonsEW-BP-TC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-BP-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-BP-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-BP-F') . ''
            . '||||||'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-BH-F') . ''
            . ' OxiAddonsEW-BH-TC |' . sanitize_hex_color($_POST['OxiAddonsEW-BH-TC']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-BH-FS') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-BH-P') . ''
            . ' OxiAddonsEW-SD-TC |' . sanitize_hex_color($_POST['OxiAddonsEW-SD-TC']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-SD-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-SD-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-SD-P') . ''
            . ' OxiAddonsEW-BI-HR |' . sanitize_text_field($_POST['OxiAddonsEW-BI-HR']) . '|'
            . ' OxiAddonsEW-BT-TC |' . sanitize_hex_color($_POST['OxiAddonsEW-BT-TC']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-BT-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-BT-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-BT-P') . ''
            . ' OxiAddonsEW-BTime-TC |' . sanitize_hex_color($_POST['OxiAddonsEW-BTime-TC']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-BTime-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-BTime-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-BTime-P') . ''
            . ' OxiAddonsEW-B-Tab |' . sanitize_text_field($_POST['OxiAddonsEW-B-Tab']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-B-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-B-F') . ''
            . ' OxiAddonsEW-B-BG |' . sanitize_hex_color($_POST['OxiAddonsEW-B-BG']) . '|'
            . ' OxiAddonsEW-B-TC |' . sanitize_hex_color($_POST['OxiAddonsEW-B-TC']) . '|'
            . ' OxiAddonsEW-B-HBC |' . sanitize_hex_color($_POST['OxiAddonsEW-B-HBC']) . '|'
            . ' OxiAddonsEW-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsEW-B-HTC']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-B-B') . ''
            . ' OxiAddonsEW-B-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-B-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-B-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-B-M') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-B-BR') . ''
            . ' OxiAddonsEW-BP-PS |' . sanitize_text_field($_POST['OxiAddonsEW-BP-PS']) . '|'
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-animation') . '|'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-G-rows') . ''
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-G-3-BG') . ''
            . '||#||'
            . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = sanitize_textarea_field($_POST['oxilistid']);
        $data = ' ||#||OxiAddonsEW-BP-TB ||#||' . sanitize_text_field($_POST['OxiAddonsEW-BP-TB']) . '||#|| '
            . ' OxiAddonsEW-BH ||#||' . sanitize_text_field($_POST['OxiAddonsEW-BH']) . '||#|| '
            . ' OxiAddonsEW-SD ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-SD']) . '||#|| '
            . ' OxiAddonsEW-BI ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-BI']) . '||#|| '
            . ' OxiAddonsEW-BT ||#||' . sanitize_text_field($_POST['OxiAddonsEW-BT']) . '||#|| '
            . ' OxiAddonsEW-BTime ||#||' . sanitize_text_field($_POST['OxiAddonsEW-BTime']) . '||#|| '
            . ' OxiAddonsEW-B-BT ||#||' . sanitize_text_field($_POST['OxiAddonsEW-B-BT']) . '||#|| '
            . ' OxiAddonsEW-B-BL ||#||' . sanitize_text_field($_POST['OxiAddonsEW-B-BL']) . '||#|| ';
        if ($oxilistid > 0) {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("UPDATE $table_list SET files = %s WHERE id = %d", $data, $oxilistid));
        } else {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files) VALUES (%d, %s, %s )", array($oxiid, 'oxi-addons', $data)));
        }
    }
}
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileEdit' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
        $data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_list WHERE id = %d ", $item_id), ARRAY_A);
        $listitemdata = explode('||#||', $data['files']);
        $listid = $data['id'];
        echo '<script type="text/javascript"> jQuery(document).ready(function () {setTimeout(function() { jQuery("#oxi-addons-list-data-modal").modal("show")  }, 500); });</script>';
    }
}
if (!empty($_POST['OxiAddonsListFileDelete']) && is_numeric($_POST['oxi-item-id'])) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileDelete' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER BY id ASC", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
?>
<div class="wrap">
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-G-rows', $styledata, 276, 'false', '.oxi-addons-admin-edit-list');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-G-3-BG', $styledata, 280, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body', 'background');
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-G-MW', $styledata[5], '', 'Max Width', 'Set your Box Max Width', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-P', 7, $styledata, 1, 'Padding', 'Set your box body padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-M', 23, $styledata, 1, 'Margin', 'Set your box body margin', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-G-BS', 39, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '', 'box-shadow');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-animation', 271, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Price Section
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-BP-F', 69, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-price-main .oxi-addons-EW-image-overlay-price');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-BP-PS', $styledata[269], 'Left', 'left', 'Right', 'right', 'Position', 'Set Your Price Body Position', 'true');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-BP-FS', $styledata[65], $styledata[66], $styledata[67], '', 'Font Size', 'Set Your Price Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-price-main .oxi-addons-EW-image-overlay-price', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-BP-TC', $styledata[47], '', 'Text Color', 'Set your Box price Text color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-price-main .oxi-addons-EW-image-overlay-price', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-BP-BG', $styledata[45], '', 'Background Color', 'Set your Box Price background color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-price-main', 'background-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-BP-P', 49, $styledata, 1, 'Padding', 'Set your box price padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-price-main .oxi-addons-EW-image-overlay-price', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-BH-TC', $styledata[87], '', 'Color', 'Set your Box Text color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-heading', 'color');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-BH-FS', $styledata[89], $styledata[90], $styledata[91], '', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-heading', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-BH-F', 81, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-BH-P', 93, $styledata, 1, 'Padding', 'Set your box heading padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Short Details
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-SD-TC', $styledata[109], '', 'Color', 'Set your Short Details Text color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-details', 'color');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-SD-FS', $styledata[111], $styledata[112], $styledata[113], '', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-details', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-SD-F', 115, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-details');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-SD-P', 121, $styledata, 1, 'Padding', 'Set your Short Details padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-details', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Banner Image
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-BI-HR', $styledata[137], '', 'Height Ratio', 'Set your Banner Image Height ratio', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image::after', 'padding-bottom');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Body Title
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-BT-TC', $styledata[139], '', 'Color', 'Set your  Body Title Text color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-title', 'color');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-BT-FS', $styledata[141], $styledata[142], $styledata[143], '', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-title', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-BT-F', 145, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-title');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-BT-P', 151, $styledata, 1, 'Padding', 'Set your  Body Title padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-title', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Body Time
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-BTime-TC', $styledata[167], '', 'Color', 'Set your  Body Time Text color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-time', 'color');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-BTime-FS', $styledata[169], $styledata[170], $styledata[171], '', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-time', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-BTime-F', 173, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-time');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-BTime-P', 179, $styledata, 1, 'Padding', 'Set your  Body Time padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-time', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-B-Tab', $styledata[195], 'Same Tab', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-B-FS', $styledata[197], $styledata[198], $styledata[199], '', 'Font Size', 'Set Your Button Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-button .oxi-addons-EW-body-button-link', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-B-F', 201, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-button');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-TC', $styledata[209], '', 'Text Color', 'Set your Button Text color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-button .oxi-addons-EW-body-button-link', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-BG', $styledata[207], '', 'Background Color', 'Set your Button background color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-button .oxi-addons-EW-body-button-link', 'background');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-HTC', $styledata[213], '', 'Hover Color', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body-button-link:hover', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-HBC', $styledata[211], '', 'Hover Background Color', 'Set your Button Hover Background color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-button .oxi-addons-EW-body-button-link:hover', 'background-color');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-B-B', $styledata[215], $styledata[216], 'Border', 'Set Your Border Size and Type', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-button .oxi-addons-EW-body-button-link', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-BC', $styledata[219], '', 'Border Color', 'Set your border color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-button .oxi-addons-EW-body-button-link', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-B-BR', 253, $styledata, 1, 'Border Rdius', 'Set your Button Border Radius', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-button .oxi-addons-EW-body-button-link', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-B-P', 221, $styledata, 1, 'Padding', 'Set your Button padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-button .oxi-addons-EW-body-button-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-B-M', 237, $styledata, 1, 'Margin', 'Set your Button margin', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-body .oxi-addons-EW-body-button .oxi-addons-EW-body-button-link', 'margin');

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <?php wp_nonce_field("oxi-addons-eventwidgets-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Event Widgets Rearrange', $listdata, 8, 'image')
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
                    <?php echo oxi_event_widgets_style_3_shortcode($style, $listdata, 'admin'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Event Widgets Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-BP-TB', $listitemdata[2], 'Price', 'Set Your Price', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-BH', $listitemdata[4], 'Box Heading', 'Set Your Box Heading', 'false');
                    echo oxi_addons_adm_help_modal_textarea('OxiAddonsEW-SD', $listitemdata[6], 'Info Text', 'Give Your Info text Here', 'false');
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAddonsEW-BI', $listitemdata[8], 'Banner Image', 'Set Your Event Banner Image', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-BT', $listitemdata[10], 'Box Heading', 'Set Your Box Heading', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-BTime', $listitemdata[12], 'Time Text', 'Set Your Time Text', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-B-BT', $listitemdata[14], 'Button Text', 'Set Your Button Text', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-B-BL', $listitemdata[16], 'Button Link', 'Set Your Button Link', 'false');
                    ?>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="oxilistid" name="oxilistid" value="<?php echo $listid; ?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="OxiAddonsListFile" id="OxiAddonsListFile" value="Submit">
                    <?php wp_nonce_field("OxiAddonsListData-nonce") ?>
                </div>
            </div>
        </div>
    </form>
</div>