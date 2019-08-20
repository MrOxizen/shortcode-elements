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
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-2-G-BG') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-2-G-MXW') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-G-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-G-M') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-2-G-SZ') . ''
            . ' OxiAddonsEW-2-G-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-2-G-BC']) . '|'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-2-B-Shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-2-animation') . ''
            . ' OxiAddonsEW-2-DM-AN |' . sanitize_text_field($_POST['OxiAddonsEW-2-DM-AN']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-2-DM-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-2-DM-H') . ''
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-2-DM-BG') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-2-DM-B') . ''
            . ' OxiAddonsEW-2-G-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-2-DM-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-DM-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-DM-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-2-D-FS') . ''
            . ' OxiAddonsEW-2-D-C |' . sanitize_hex_color($_POST['OxiAddonsEW-2-D-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-2-D') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-D-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-2-M-FS') . ''
            . ' OxiAddonsEW-2-M-C |' . sanitize_hex_color($_POST['OxiAddonsEW-2-M-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-2-M') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-M-P') . ''
            . ' OxiAddonsEW-2-I-HR |' . sanitize_text_field($_POST['OxiAddonsEW-2-I-HR']) . '|'

            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-2-H-FS') . ''
            . ' OxiAddonsEW-2-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-2-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-2-H') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-H-P') . ''

            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-2-H2-FS') . ''
            . ' OxiAddonsEW-2-H2-C |' . sanitize_hex_color($_POST['OxiAddonsEW-2-H2-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-2-H2') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-H2-P') . ''

            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-2-L-FS') . ''
            . ' OxiAddonsEW-2-L-C |' . sanitize_hex_color($_POST['OxiAddonsEW-2-L-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-2-L') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-L-P') . ''

            . ' OxiAddonsEW-2-B-Tab |' . sanitize_text_field($_POST['OxiAddonsEW-2-B-Tab']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-2-B-FS') . ''
            . ' OxiAddonsEW-2-B-C |' . sanitize_hex_color($_POST['OxiAddonsEW-2-B-C']) . '|'
            . ' OxiAddonsEW-2-B-BG |' . sanitize_text_field($_POST['OxiAddonsEW-2-B-BG']) . '|'
            . ' OxiAddonsEW-2-B-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-2-B-H-C']) . '|'
            . ' OxiAddonsEW-2-B-H-BG |' . sanitize_text_field($_POST['OxiAddonsEW-2-B-H-BG']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-2-B') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-2-B-B') . ''
            . ' OxiAddonsEW-2-B-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-2-B-BC']) . '|'
            . ' OxiAddonsEW-2-B-BC-H|' . sanitize_hex_color($_POST['OxiAddonsEW-2-B-BC-H']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-B-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-B-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-2-B-M') . ''
            . ' OxiAddonsEW-2-B-TA |' . sanitize_text_field($_POST['OxiAddonsEW-2-B-TA']) . '|'
            . '||||'
            . ' OxiAddonsEW-2-L-I-C|' . sanitize_hex_color($_POST['OxiAddonsEW-2-L-I-C']) . '|'
            . ' OxiAddonsEW-2-L-I-TA |' . sanitize_text_field($_POST['OxiAddonsEW-2-L-I-TA']) . '|'
            . ' ||'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-2-G-rows') . ''
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
        $data = '||#||OxiAddonsEW-2-D ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-D']) . '||#|| '
            . ' OxiAddonsEW-2-M ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-M']) . '||#|| '
            . ' OxiAddonsEW-2-BG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-2-BG']) . '||#|| '
            . ' OxiAddonsEW-2-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-H']) . '||#|| '
            . ' OxiAddonsEW-2-H2 ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-H2']) . '||#|| '
            . ' OxiAddonsEW-2-L ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-L']) . '||#|| '
            . ' OxiAddonsEW-2-L-I ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-L-I']) . '||#|| '
            . ' OxiAddonsEW-2-B ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-B']) . '||#|| '
            . ' OxiAddonsEW-2-B-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-2-B-URL']) . '||#|| ';
        if ($oxilistid > 0) {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("UPDATE $table_list SET files = %s WHERE id = %d", $data, $oxilistid));
        } else {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files) VALUES (%d, %s, %s )", array($oxiid, 'oxi-addons', $data)));
        }
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = sanitize_textarea_field($_POST['oxilistid']);
        $data = '||#||OxiAddonsEW-2-D ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-D']) . '||#|| '
            . ' OxiAddonsEW-2-M ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-M']) . '||#|| '
            . ' OxiAddonsEW-2-BG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-2-BG']) . '||#|| '
            . ' OxiAddonsEW-2-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-H']) . '||#|| '
            . ' OxiAddonsEW-2-H2 ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-H2']) . '||#|| '
            . ' OxiAddonsEW-2-L ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-L']) . '||#|| '
            . ' OxiAddonsEW-2-L-I ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-L-I']) . '||#|| '
            . ' OxiAddonsEW-2-B ||#||' . sanitize_text_field($_POST['OxiAddonsEW-2-B']) . '||#|| '
            . ' OxiAddonsEW-2-B-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-2-B-URL']) . '||#|| ';
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
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-2-G-rows', $styledata, 357, 'false', '.oxi-addons-admin-edit-list');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-2-G-BG', $styledata, 3, 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-C-body', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-2-G-MXW', $styledata[7], $styledata[8], $styledata[9], '1', 'Maximum Width', 'Set Max Width', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-2-G-SZ', $styledata[59], $styledata[60], 'Border', 'Set your body Border Size and Type', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-wrapper-row');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-G-BC', $styledata[63], '', 'Border Color', 'Set Your body  Border Color', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-wrapper-row', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-G-BR', 11, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-wrapper-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-G-P', 27, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-C-body', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-G-M', 43, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . '', 'padding');

                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-2-B-Shadow', 65, $styledata, 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-wrapper-row', 'box-shadow');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-2-animation', 71, $styledata, 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-wrapper-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Date And Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsEW-2-DM-AN', $styledata[75], 'Position', 'Set Your Date and Month Body Position', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-date-month', 'text-align');
                                        echo oxi_addons_adm_help_number_double_dtm('OxiAddonsEW-2-DM-W', $styledata[77], $styledata[78], $styledata[79], 'OxiAddonsEW-2-DM-H', $styledata[81], $styledata[82], $styledata[83], 1, 'Width Height', 'Set Your Date & Month Body width and Height', 'true', '', '');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-2-DM-BG', $styledata, 85, 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-date-month', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-2-DM-B', $styledata[89], $styledata[90], 'Border', 'Set your Date and Month Border Size and Type', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-date-month', 'background');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-DM-BC', $styledata[93], '', 'Border Color', 'Set Your Date and Month  Border Color', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-date-month', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-DM-BR', 95, $styledata, '1', 'Border Radius', 'Set your date and Month Border Radius', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-date-month', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-DM-M', 111, $styledata, '1', 'Margin', 'Set your date and Month Margin', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-date-month', 'margin');
                                        $NOJS = array(
                                            array('OxiAddonsEW-2-DM-W', 'Width'),
                                            array('OxiAddonsEW-2-DM-H', 'Height')
                                        );
                                        echo OxiAddonsADMHelpNoJquery($NOJS);
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Date
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php

                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-2-D-FS', $styledata[127], $styledata[128], $styledata[129], '1', 'Font Size', 'Set Your Date Font Size', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-date', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-D-C', $styledata[131], '', 'Color', 'Set Your Date Color', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-date', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-2-D', 133, $styledata, 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-date');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-D-P', 139, $styledata, '1', 'Padding', 'Set your Date Padding', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-date', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-2-M-FS', $styledata[155], $styledata[156], $styledata[157], '1', 'Font Size', 'Set Your Month Font Size', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-month', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-M-C', $styledata[159], '', 'Color', 'Set Your Month text Color', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-month', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-2-M', 161, $styledata, 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-month');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-M-P', 167, $styledata, '1', 'Padding', 'Set your Month Padding', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-month', 'padding');
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
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-2-I-HR', $styledata[183], '1', 'Height Ratio', 'Set your Height bsed on Width ratio, EX. 100 means same size as width', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-image::after', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-2-H-FS', $styledata[185], $styledata[186], $styledata[187], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-H', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-H-C', $styledata[189], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-H', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-2-H', 191, $styledata, 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-H');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-H-P', 197, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-H', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Sub Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-2-H2-FS', $styledata[213], $styledata[214], $styledata[215], '1', 'Font Size', 'Set Your Sub Heading Font Size', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addon-EW-2-Adress', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-H2-C', $styledata[217], '', 'Color', 'Set Your Sub Heading Font Color', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addon-EW-2-Adress', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-2-H2', 219, $styledata, 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addon-EW-2-Adress');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-H2-P', 225, $styledata, '1', 'Padding', 'Set your Sub Heading Text Padding', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addon-EW-2-Adress', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Location Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-L-C', $styledata[245], '', 'Font Color', 'Set Your Location Font Color', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addon-EW-2-location', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-L-I-C', $styledata[351], '', 'Icon Color', 'Set Your Location Icon Color', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addon-EW-2-location-I', 'color');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-2-L-FS', $styledata[241], $styledata[242], $styledata[243], '1', 'Font Size', 'Set Your Location Font Size', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addon-EW-2-location', 'font-size');
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsEW-2-L-I-TA', $styledata[353], 'Position', 'Set your Location Align', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addon-EW-2-location', 'text-align');
                                        echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsEW-2-L', 247, $styledata, 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addon-EW-2-location');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-L-P', 253, $styledata, '1', 'Padding', 'Set yor Location Text Padding', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addon-EW-2-location', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-2-B-Tab', $styledata[269], 'Same Tab', '', 'New Bab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsEW-2-B-TA', $styledata[345], 'Button Text Align', 'Set your Button Align', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button', 'text-align');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-2-B-FS', $styledata[271], $styledata[272], $styledata[273], '1', 'Font Size', 'Set Your Button Font Size', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-B-C', $styledata[275], '', 'Color', 'Set Your Button  Color', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-B-H-C', $styledata[279], '', 'Hover Color', 'Set Your Button Hover Color', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link:hover', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-B-BG', $styledata[277], 'rgba', 'Background', 'Set Your Button  Background', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link', 'background');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-B-H-BG', $styledata[281], 'rgba', 'Hover Background', 'Set Your Button Hover Background', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link:hover', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-2-B-B', $styledata[289], $styledata[290], 'Border', 'Set your Botton Border Size and Type', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-B-BC', $styledata[293], '', 'Border Color', 'Set Your Button  Border Color', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link', 'border-color');
                                        echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsEW-2-B', 283, $styledata, 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-2-B-BC-H', $styledata[295], '', 'Border Hover', 'Set Your Button  Border  Hover Color', 'false', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link:hover', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-B-BR', 297, $styledata, '1', 'Border Radius', 'Set your Button Border Radius', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-B-P', 313, $styledata, '1', 'Padding', 'Set your Button Padding', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-2-B-M', 329, $styledata, '1', 'Margin', 'Set your Button Margin', 'true', '.oxi-addons-EW-2-wrapper-' . $oxiid . ' .oxi-addons-EW-2-button-link', 'margin');
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
                echo oxi_addons_list_rearrange('Event Widgets Rearrange', $listdata, 6, 'image');
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
                    <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                        <?php echo oxi_event_widgets_style_2_shortcode($style, $listdata, 'admin'); ?>
                    </div>
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
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-2-D', $listitemdata[2], 'Date', 'Set Your Event Date', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-2-M', $listitemdata[4], 'Month', 'Set Your Event Month', 'false');
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAddonsEW-2-BG', $listitemdata[6], 'Banner Image', 'Set Your Event Banner Image', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-2-H', $listitemdata[8], 'Heading Text', 'Set Your Heading Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-2-H2', $listitemdata[10], 'Sub Heading Text', 'Set Your Sub Heading Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-2-L', $listitemdata[12], 'Location Text', 'Set Your Location Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-2-L-I', $listitemdata[14], 'Icon Class', 'Set Your Location Icon', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-2-B', $listitemdata[16], 'Button Text', 'Set Your Button Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-2-B-URL', $listitemdata[18], 'Button Link', 'Set Your Button Link', 'false');
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