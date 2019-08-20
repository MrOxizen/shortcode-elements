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
            . ' OxiAddonsEW-11-G-I-MXW |' . sanitize_text_field($_POST['OxiAddonsEW-11-G-I-MXW']) . '|'
            . ' OxiAddonsEW-11-G-Tab |' . sanitize_text_field($_POST['OxiAddonsEW-11-G-Tab']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-G-PD') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-G-BR') . ''
            . ' OxiAddonsEW-11-DM-AN |' . sanitize_text_field($_POST['OxiAddonsEW-11-DM-AN']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-DM-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-DM-H') . ''
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-11-DM-BG') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-11-DM-B') . ''
            . ' OxiAddonsEW-11-DM-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-11-DM-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-DM-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-DM-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-D-FS') . ''
            . ' OxiAddonsEW-11-D-C |' . sanitize_hex_color($_POST['OxiAddonsEW-11-D-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-11-DF') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-D-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-M-FS') . ''
            . ' OxiAddonsEW-11-M-C |' . sanitize_hex_color($_POST['OxiAddonsEW-11-M-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-11-MF') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-M-P') . ''
            . ' OxiAddonsEW-11-T-AN |' . sanitize_text_field($_POST['OxiAddonsEW-11-T-AN']) . '|'
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-11-T-BG') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-11-T-B') . ''
            . ' OxiAddonsEW-11-T-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-11-T-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-T-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-T-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-T-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-T-FS') . ''
            . ' OxiAddonsEW-11-T-C |' . sanitize_hex_color($_POST['OxiAddonsEW-11-T-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-11-TFS') . ''
            . ' OxiAddonsEW-11-CB-BG |' . sanitize_hex_color($_POST['OxiAddonsEW-11-CB-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-CB-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-H-FS') . ''
            . ' OxiAddonsEW-11-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-11-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-11-H-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-LI-FS') . ''
            . ' OxiAddonsEW-11-LI-C |' . sanitize_hex_color($_POST['OxiAddonsEW-11-LI-C']) . '|'
            . ' OxiAddonsEW-11-LI-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-11-LI-BC']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-LI-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-LI-H') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-LI-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-LI-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-AT-FS') . ''
            . ' OxiAddonsEW-11-AT-C |' . sanitize_hex_color($_POST['OxiAddonsEW-11-AT-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-11-AT-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-AT-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-11-DET-FS') . ''
            . ' OxiAddonsEW-11-DET-C |' . sanitize_hex_color($_POST['OxiAddonsEW-11-DET-C']) . '|'
            . ' OxiAddonsEW-11-DET-HC |' . sanitize_hex_color($_POST['OxiAddonsEW-11-DET-HC']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-11-DET-B') . ''
            . ' OxiAddonsEW-11-DET-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-11-DET-BC']) . '|'
            . ' OxiAddonsEW-11-DET-Tab |' . sanitize_hex_color($_POST['OxiAddonsEW-11-DET-Tab']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-11-DET-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-DET-M') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-11-DET-P') . ''
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-11-rows') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-11-animation') . ''
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
        $data = '||#||OxiAddonsEW-11-G-BI ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-11-G-BI']) . '||#|| '
            . ' OxiAddonsEW-11-D ||#||' . sanitize_text_field($_POST['OxiAddonsEW-11-D']) . '||#|| '
            . ' OxiAddonsEW-11-M ||#||' . sanitize_text_field($_POST['OxiAddonsEW-11-M']) . '||#|| '
            . ' OxiAddonsEW-11-TT ||#||' . sanitize_text_field($_POST['OxiAddonsEW-11-TT']) . '||#|| '
            . ' OxiAddonsEW-11-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-11-H']) . '||#|| '
            . ' OxiAddonsEW-11-LI ||#||' . sanitize_text_field($_POST['OxiAddonsEW-11-LI']) . '||#|| '
            . ' OxiAddonsEW-11-AT ||#||' . sanitize_text_field($_POST['OxiAddonsEW-11-AT']) . '||#|| '
            . ' OxiAddonsEW-11-DET ||#||' . sanitize_text_field($_POST['OxiAddonsEW-11-DET']) . '||#|| '
            . ' OxiAddonsEW-11-DEURL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-11-DEURL']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-11-rows', $styledata, 397, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-11-G-I-MXW', $styledata[5], '1', 'Max Width', 'Set your Max Width, EX. 100 means same size as width', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-11-G-Tab', $styledata[7], 'Left', 'left', 'Right', 'right', 'Body Position', 'Set Your body Position', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-G-BR', 25, $styledata, '1', 'Border Radius', 'Set your Border Radius', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-G-PD', 9, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Date and Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsEW-11-DM-AN', $styledata[41], 'Position', 'Set Your Date and Month Body Position', 'false', '.oxi-addons-EW-11-top', 'justify-content');
                                        echo oxi_addons_adm_help_number_double_dtm('OxiAddonsEW-11-DM-W', $styledata[43], $styledata[44], $styledata[45], 'OxiAddonsEW-11-DM-H', $styledata[47], $styledata[48], $styledata[49], 1, 'Width Height', 'Set Your Date & Month Body width and Height', 'true', '', '');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-11-DM-BG', $styledata, 51, 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-DM-body', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-11-DM-B', $styledata[55], $styledata[56], 'Border', 'Set your Date and Month Border Size and Type', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-DM-body', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-DM-BC', $styledata[59], '', 'Border Color', 'Set Your Date and Month  Border Color', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-DM-body', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-DM-BR', 61, $styledata, '1', 'Border Radius', 'Set your date and Month Border Radius', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-DM-body', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-DM-M', 77, $styledata, '1', 'Margin', 'Set your date and Month Margin', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-DM-body', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Date
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-11-D-FS', $styledata[93], $styledata[94], $styledata[95], 1, 'Font Size', 'Set Your Date Font Size', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-D', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-D-C', $styledata[97], '', 'Color', 'Set Your Date Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-D', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-11-DF', 99, $styledata, 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-D');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-D-P', 105, $styledata, '1', 'Padding', 'Set your Date Padding', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-D', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-11-M-FS', $styledata[121], $styledata[122], $styledata[123], '1', 'Font Size', 'Set Your Month Font Size', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-M', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-M-C', $styledata[125], '', 'Color', 'Set Your Month Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-M', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-11-MF', 127, $styledata, 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-M');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-M-P', 133, $styledata, '1', 'Padding', 'Set your Month Padding', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-M', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Time
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-11-T-FS', $styledata[209], $styledata[210], $styledata[211], '1', 'Font Size', 'Set Your Time Font Size', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-time', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-T-C', $styledata[213], '', 'Color', 'Set Your Time Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-time', 'color');
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsEW-11-T-AN', $styledata[149], 'Position', 'Set Your Time Position', 'false', '.oxi-addons-EW-11-bottom', 'justify-content');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-11-T-BG', $styledata, 151, 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-timebody', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-11-T-B', $styledata[155], $styledata[156], 'Border', 'Set your Time Border Size and Type', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-timebody');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-T-BC', $styledata[159], '', 'Border Color', 'Set Your Time  Time Color', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-timebody', 'border-color');
                                        echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsEW-11-TFS', 215, $styledata, 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-time');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-T-BR', 161, $styledata, '1', 'Border Radius', 'Set your Time Border Radius', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-timebody', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-T-P', 177, $styledata, '1', 'padding', 'Set your Time Margin', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-timebody', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-T-M', 193, $styledata, '1', 'Margin', 'Set your Time Margin', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-timebody', 'margin');
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
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-11-animation', 401, $styledata, 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Content Body
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-CB-BG', $styledata[221], '', 'Background', 'Set Your Content Body Backgorund Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-contentbody', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-CB-P', 223, $styledata, '1', 'Padding', 'Set your Border Radius', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-contentbody', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-11-H-FS', $styledata[239], $styledata[240], $styledata[241], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-H-C', $styledata[243], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-11-H-F', 245, $styledata, 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-H-P', 251, $styledata, '1', 'Padding', 'Set Your Heading Text Padding', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-heading', 'padding');
                                        ?>
                                    </div>
                                </div>

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Location Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-11-LI-FS', $styledata[267], $styledata[268], $styledata[269], '1', 'Icon Size', 'Set Your Location Icon', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-icon .oxi-icons', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-LI-C', $styledata[271], '', 'Icon Color', 'Set Your Icon Font Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-icon .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-LI-BC', $styledata[273], '', 'Background Color', 'Set Your Icon Background Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-icon .oxi-icons', 'background');
                                        echo oxi_addons_adm_help_number_double_dtm('OxiAddonsEW-11-LI-W', $styledata[275], $styledata[276], $styledata[277], 'OxiAddonsEW-11-LI-H', $styledata[279], $styledata[280], $styledata[281], 1, 'Width Height', 'Set Your Icon width and Height', 'true', '', '');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-LI-BR', 283, $styledata, '1', 'Border Radius', 'Set Your Icon Border Radius', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-icon .oxi-icons', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-LI-P', 299, $styledata, '1', 'Padding', 'Set Your Icon Padding', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-icon .oxi-icons', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Address
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-11-AT-FS', $styledata[315], $styledata[316], $styledata[317], '1', 'Font Size', 'Set Your Address Font Size', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-text', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-AT-C', $styledata[319], '', 'Color', 'Set Your Address Font Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-text', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-11-AT-F', 321, $styledata, 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-text');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-AT-P', 327, $styledata, '1', 'Padding', 'Set yor  Address Text Padding', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-address-text', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Details
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-11-DET-FS', $styledata[343], $styledata[344], $styledata[345], '1', 'Font Size', 'Set Your Details Font Size', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button-link', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-DET-C', $styledata[347], '', 'Color', 'Set Your Details Font Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button-link', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-DET-HC', $styledata[349], '', 'Hover Color', 'Set Your Details Font Hover Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button-link:hover', 'color');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-11-DET-B', $styledata[351], $styledata[352], 'Border', 'Set your Details Border Size and Type', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button-link', 'border-bottom');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-11-DET-BC', $styledata[355], '', 'Border Color', 'Set Your Details Border Color', 'false', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button-link', 'border-color');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-11-DET-Tab', $styledata[357], 'Same Tab', '', 'New Bab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-11-DET-F', 359, $styledata, 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-DET-P', 381, $styledata, '1', 'Padding', 'Set Your Details Padding', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-11-DET-M', 365, $styledata, '1', 'Margin', 'Set Your Details Margin', 'true', '.oxi-addons-EW-11-wrapper-' . $oxiid . ' .oxi-addons-EW-11-button', 'padding');
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
                echo oxi_addons_list_rearrange('Event Widgets Rearrange', $listdata, 2, 'image');
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
                    <?php echo oxi_event_widgets_style_11_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAddonsEW-11-G-BI', $listitemdata[2], 'Banner Image', 'Set Your Event Banner Image', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-11-D', $listitemdata[4], 'Date', 'Set Your Event Date, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-11-M', $listitemdata[6], 'Month', 'Set Your Event Month, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-11-TT', $listitemdata[8], 'Time', 'Set Your Event Time, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-11-H', $listitemdata[10], 'Heading Text', 'Set Your heading Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-11-LI', $listitemdata[12], 'Icon Class', 'Set Your Icon Class', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-11-AT', $listitemdata[14], 'Address Text', 'Set Your Address Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-11-DET', $listitemdata[16], 'Details Text', 'Set Your Details Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-11-DEURL', $listitemdata[18], 'URL', 'Set Your Details Url', 'false');
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