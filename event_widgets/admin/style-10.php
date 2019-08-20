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
            . ' OxiAddonsEW-10-G-BGC |' . sanitize_hex_color($_POST['OxiAddonsEW-10-G-BGC']) . '|'
            . ' OxiAddonsEW-10-G-HR |' . sanitize_text_field($_POST['OxiAddonsEW-10-G-HR']) . '|'
            . ' OxiAddonsEW-10-G-I-MXW |' . sanitize_text_field($_POST['OxiAddonsEW-10-G-I-MXW']) . '|'
            . ' OxiAddonsEW-10-O-BGC |' . sanitize_text_field($_POST['OxiAddonsEW-10-O-BGC']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-10-O-B') . ''
            . ' OxiAddonsEW-10-O-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-10-O-BC']) . '|'
            . ' OxiAddonsEW-10-O-MIW |' . sanitize_text_field($_POST['OxiAddonsEW-10-O-MIW']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-10-D-H-FS') . ''
            . ' OxiAddonsEW-10-D-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-10-D-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-10-D-H-F') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-10-M-H-FS') . ''
            . ' OxiAddonsEW-10-M-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-10-M-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-10-M-H-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-10-M-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-10-H-FS') . ''
            . ' OxiAddonsEW-10-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-10-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-10-H-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-10-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-10-L-FS') . ''
            . ' OxiAddonsEW-10-L-C |' . sanitize_hex_color($_POST['OxiAddonsEW-10-L-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-10-L-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-10-L-P') . ''
            . ' OxiAddonsEW-10-F-BGC |' . sanitize_hex_color($_POST['OxiAddonsEW-10-F-BGC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-10-F-PD') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-10-FT-FS') . ''
            . ' OxiAddonsEW-10-FT-C |' . sanitize_hex_color($_POST['OxiAddonsEW-10-FT-C']) . '|'
            . ' OxiAddonsEW-10-FT-I-C |' . sanitize_hex_color($_POST['OxiAddonsEW-10-FT-I-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-10-FT-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-10-FT-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-10-AT-FS') . ''
            . ' OxiAddonsEW-10-AT-C |' . sanitize_hex_color($_POST['OxiAddonsEW-10-AT-C']) . '|'
            . ' OxiAddonsEW-10-AT-I-C |' . sanitize_hex_color($_POST['OxiAddonsEW-10-AT-I-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-10-AT-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-10-AT-P') . ''
            . ' OxiAddonsEW-10-H-HC |' . sanitize_hex_color($_POST['OxiAddonsEW-10-H-HC']) . '|'
            . ' OxiAddonsEW-10-L-HC |' . sanitize_hex_color($_POST['OxiAddonsEW-10-L-HC']) . '|'
            . ' OxiAddonsEW-10-H-Tab |' . sanitize_text_field($_POST['OxiAddonsEW-10-H-Tab']) . '|'
            . ' OxiAddonsEW-10-L-Tab |' . sanitize_text_field($_POST['OxiAddonsEW-10-L-Tab']) . '|'
            . ' OxiAddonsEW-10-O-Tab |' . sanitize_text_field($_POST['OxiAddonsEW-10-O-Tab']) . '|'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-10-G-rows') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-10-G-M') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-10-animation') . ''
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
        $data = ' ||#||OxiAddonsEW-10-G-BI ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-10-G-BI']) . '||#|| '
            . ' OxiAddonsEW-10-D-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-10-D-H']) . '||#|| '
            . ' OxiAddonsEW-10-M-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-10-M-H']) . '||#|| '
            . ' OxiAddonsEW-10-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-10-H']) . '||#|| '
            . ' OxiAddonsEW-10-HURL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-10-HURL']) . '||#|| '
            . ' OxiAddonsEW-10-L ||#||' . sanitize_text_field($_POST['OxiAddonsEW-10-L']) . '||#|| '
            . ' OxiAddonsEW-10-LU ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-10-LU']) . '||#|| '
            . ' OxiAddonsEW-10-FT ||#||' . sanitize_text_field($_POST['OxiAddonsEW-10-FT']) . '||#|| '
            . ' OxiAddonsEW-10-FT-I ||#||' . sanitize_text_field($_POST['OxiAddonsEW-10-FT-I']) . '||#|| '
            . ' OxiAddonsEW-10-AT ||#||' . sanitize_text_field($_POST['OxiAddonsEW-10-AT']) . '||#|| '
            . ' OxiAddonsEW-10-AT-I ||#||' . sanitize_text_field($_POST['OxiAddonsEW-10-AT-I']) . '||#|| ';
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
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
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-10-G-rows', $styledata, 203, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-G-BGC', $styledata[3], '', 'Background', 'Set Your Backgorund Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-imagebody', 'background');
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-10-G-HR', $styledata[5], '1', 'Height Ratio', 'Set your Height bsed on Width ratio, EX. 100 means same size as width', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-BG::after', 'padding-bottom');
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-10-G-I-MXW', $styledata[7], '1', 'Max Width', 'Set your Max Width, EX. 100 means same size as width', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-10-G-M', 207, $styledata, '1', 'Margin', 'Set yor  body Padding', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Overlay
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-O-BGC', $styledata[9], 'rgba', 'Background', 'Set Your Backgorund Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-IM-O', 'background');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-10-O-Tab', $styledata[201], 'Left', 'left', 'Right', 'right', 'Position', 'Set Your Overlay body Position', 'true');
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-10-O-MIW', $styledata[17], '1', 'Overlay Width', 'Set your Max Width, EX. 100 means same size as width', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-IM-O', 'min-width');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-10-O-B', $styledata[11], $styledata[12], 'Border', 'Set your Border Size and Type', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-BG', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-O-BC', $styledata[15], '', 'Border Color', 'Set Your Border Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-BG', 'border-color');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-10-animation', 223, $styledata, 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Day
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-10-D-H-FS', $styledata[19], $styledata[20], $styledata[21], '1', 'Font Size', 'Set Your Day Font Size', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-D', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-D-H-C', $styledata[23], '', 'Color', 'Set Your Day Font Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-D', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-10-D-H-F', 25, $styledata, 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-D');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-10-M-H-FS', $styledata[31], $styledata[32], $styledata[33], '1', 'Font Size', 'Set Your Month Font Size', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-M', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-M-H-C', $styledata[35], '', 'Color', 'Set Your Month Font Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-M', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-10-M-H-F', 37, $styledata, 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-M');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-10-M-H-P', 43, $styledata, '1', 'Padding', 'Set yor  Month Text Padding', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-M', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-10-H-FS', $styledata[59], $styledata[60], $styledata[61], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-H', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-H-C', $styledata[63], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-H', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-H-HC', $styledata[193], '', 'Hover Color', 'Set Your Heading Font Hover Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-H:hover', 'color');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-10-H-Tab', $styledata[197], 'Same Tab', '', 'New Bab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-10-H-F', 65, $styledata, 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-H');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-10-H-P', 71, $styledata, '1', 'Padding', 'Set yor  Heading Text Padding', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-H', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Link
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-10-L-FS', $styledata[87], $styledata[88], $styledata[89], '1', 'Font Size', 'Set Your Link Font Size', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-link', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-L-C', $styledata[91], '', 'Color', 'Set Your Link Font Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-link', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-L-HC', $styledata[195], '', 'Hover Color', 'Set Your Link Hover Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-link:hover', 'color');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-10-L-Tab', $styledata[199], 'Normal', '', 'New Bab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-10-L-F', 93, $styledata, 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-link');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-10-L-P', 99, $styledata, '1', 'Padding', 'Set yor  Link Text Padding', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-link', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Footer
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-F-BGC', $styledata[115], '', 'Background', 'Set Your Footer Backgorund Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-TL', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-10-F-PD', 117, $styledata, '1', 'Padding', 'Set your Footer Padding', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . '.oxi-addons-EW-10-F-TL', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Footer Time
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-10-FT-FS', $styledata[133], $styledata[134], $styledata[135], '1', 'Font Size', 'Set Your Time Font Size', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-T-T', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-FT-C', $styledata[137], '', 'Text Color', 'Set Your Time Font Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-T-T', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-FT-I-C', $styledata[139], '', 'Icon Color', 'Set Your Time Font Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-T-I', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-10-FT-F', 141, $styledata, 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-T-T');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-10-FT-P', 147, $styledata, '1', 'Padding', 'Set yor  Time Text Padding', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-T-T', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Footer Address
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-10-AT-FS', $styledata[163], $styledata[164], $styledata[165], '1', 'Font Size', 'Set Your Address Font Size', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-L-T', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-AT-C', $styledata[167], '', 'Text Color', 'Set Your Address Font Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-L-T', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-10-AT-I-C', $styledata[169], '', 'Icon Color', 'Set Your Address Font Color', 'false', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-L-I', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-10-AT-F', 171, $styledata, 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-L-T');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-10-AT-P', 177, $styledata, '1', 'Padding', 'Set yor  Address Text Padding', 'true', '.oxi-addons-EW-10-wrapper-' . $oxiid . ' .oxi-addons-EW-10-F-L-T', 'padding');
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
                echo oxi_addons_list_rearrange('Event Widgets Rearrange', $listdata, 2, 'image')
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
                    <?php echo oxi_event_widgets_style_10_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAddonsEW-10-G-BI', $listitemdata[2], 'Banner Image', 'Set Your Event Banner Image', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-10-FT', $listitemdata[16], 'Time Text', 'Set Your Time Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-10-FT-I', $listitemdata[18], 'Time Icon Class', 'Set Your Time Icon', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-10-AT', $listitemdata[20], 'Address Text', 'Set Your Address Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-10-AT-I', $listitemdata[22], 'Address Icon Class', 'Set Your Address Icon', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-10-D-H', $listitemdata[4], 'Day Text', 'Set Your Day Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-10-M-H', $listitemdata[6], 'Month Text', 'Set Your Month Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-10-H', $listitemdata[8], 'Heading Text', 'Set Your Heading Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-10-HURL', $listitemdata[10], 'URL', 'Set Your Url', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-10-L', $listitemdata[12], 'Link Text', 'Set Your Link Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-10-LU', $listitemdata[14], 'URL', 'Set Your Url,', 'false');
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