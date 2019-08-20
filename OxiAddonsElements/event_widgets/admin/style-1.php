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
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-G-BG') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-B-Shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-animation') . ''
            . ' OxiAddonsEW-DM-AN |' . sanitize_text_field($_POST['OxiAddonsEW-DM-AN']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-DM-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-DM-H') . ''
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-DM-BG') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-DM-B') . ''
            . ' OxiAddonsEW-DM-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-DM-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-DM-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-DM-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-D-FS') . ''
            . ' OxiAddonsEW-D-C |' . sanitize_hex_color($_POST['OxiAddonsEW-D-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-D') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-D-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-M-FS') . ''
            . ' OxiAddonsEW-D-C |' . sanitize_hex_color($_POST['OxiAddonsEW-M-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-M') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-M-P') . ''
            . ' OxiAddonsEW-I-HR |' . sanitize_text_field($_POST['OxiAddonsEW-I-HR']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-H-FS') . ''
            . ' OxiAddonsEW-D-C |' . sanitize_hex_color($_POST['OxiAddonsEW-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-H') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-IT-FS') . ''
            . ' OxiAddonsEW-D-C |' . sanitize_hex_color($_POST['OxiAddonsEW-IT-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-IT') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-IT-P') . ''
            . ' OxiAddonsEW-B-Tab |' . sanitize_hex_color($_POST['OxiAddonsEW-B-Tab']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-B-FS') . ''
            . ' OxiAddonsEW-B-C |' . sanitize_hex_color($_POST['OxiAddonsEW-B-C']) . '|'
            . ' OxiAddonsEW-B-BG |' . sanitize_text_field($_POST['OxiAddonsEW-B-BG']) . '|'
            . ' OxiAddonsEW-B-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-B-H-C']) . '|'
            . ' OxiAddonsEW-B-H-BG |' . sanitize_text_field($_POST['OxiAddonsEW-B-H-BG']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-B') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-B-B') . ''
            . ' OxiAddonsEW-DM-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-B-BC']) . '|'
            . ' OxiAddonsEW-DM-BC-H |' . sanitize_hex_color($_POST['OxiAddonsEW-B-BC-H']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-B-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-B-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-B-M') . ''
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-rows') . ''
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
        $data = ' ||#||OxiAddonsEW-D ||#||' . sanitize_text_field($_POST['OxiAddonsEW-D']) . '||#|| '
            . ' OxiAddonsEW-M ||#||' . sanitize_text_field($_POST['OxiAddonsEW-M']) . '||#|| '
            . ' OxiAddonsEW-I ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-I']) . '||#|| '
            . ' OxiAddonsEW-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-H']) . '||#|| '
            . ' OxiAddonsEW-IT ||#||' . sanitize_text_field($_POST['OxiAddonsEW-IT']) . '||#|| '
            . ' OxiAddonsEW-B ||#||' . sanitize_text_field($_POST['OxiAddonsEW-B']) . '||#|| '
            . ' OxiAddonsEW-B-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-B-URL']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-rows', $styledata, 307, 'false', '.oxi-addons-admin-edit-list');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-G-BG', $styledata, 3, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-content', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-BR', 7, $styledata, '1', 'Border Radius', 'Set yor body Border Radius', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-P', 23, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-content', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-M', 39, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-B-Shadow', 55, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-animation', 61, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Date And Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsEW-DM-AN', $styledata[65], 'Position', 'Set Your Date and Month Body Position', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image-date', '');
                                        echo oxi_addons_adm_help_number_double_dtm('OxiAddonsEW-DM-W', $styledata[67], $styledata[68], $styledata[69], 'OxiAddonsEW-DM-H', $styledata[71], $styledata[72], $styledata[73], 1, 'Width Height', 'Set Your Date & Month Body width and Height', 'true', '', '');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-DM-BG', $styledata, 75, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image-date', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-DM-B', $styledata[79], $styledata[80], 'Border', 'Set your Date and Month Border Size and Type', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image-date', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-DM-BC', $styledata[83], '', 'Border Color', 'Set Your Date and Month  Border Color', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image-date', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-DM-BR', 85, $styledata, '1', 'Border Radius', 'Set your date and Month Border Radius', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image-date', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-DM-M', 101, $styledata, '1', 'Margin', 'Set your date and Month Margin', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image-date', 'margin');
                                        $NOJS = array(
                                            array('OxiAddonsEW-DM-AN', 'Position'),
                                            array('OxiAddonsEW-DM-W', 'Width'),
                                            array('OxiAddonsEW-DM-H', 'Height'),
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
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Date Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-D-date', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-D-C', $styledata[121], '', 'Color', 'Set Your Date Color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-D-date', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-D', 123, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-D-date');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-D-P', 129, $styledata, '1', 'Padding', 'Set your Date Padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-D-date', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-M-FS', $styledata[145], $styledata[146], $styledata[147], '1', 'Font Size', 'Set Your Month Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-D-month', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-M-C', $styledata[149], '', 'Color', 'Set Your Month Color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-D-month', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-M', 151, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-D-month');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-M-P', 157, $styledata, '1', 'Padding', 'Set your Month Padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-D-month', 'padding');
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
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-I-HR', $styledata[173], 1, 'Height Ratio', 'Set your Height bsed on Width ratio, EX. 100 means same size as width', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-image:after', 'padding-bottom');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-H-FS', $styledata[175], $styledata[176], $styledata[177], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-H-C', $styledata[179], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-H', 181, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-H-P', 187, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Info Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-IT-FS', $styledata[203], $styledata[204], $styledata[205], '1', 'Font Size', 'Set Your Info Text Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-text', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-IT-C', $styledata[207], '', 'Color', 'Set Your Info Text Font Color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-text', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-IT', 209, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-text');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-IT-P', 215, $styledata, '1', 'Padding', 'Set yor Info Text Padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-text', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-B-Tab', $styledata[231], 'Same Tab', '', 'New Bab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-B-FS', $styledata[233], $styledata[234], $styledata[235], '1', 'Font Size', 'Set Your Button Font Size', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-C', $styledata[237], '', 'Color', 'Set Your Button  Color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-BG', $styledata[239], 'rgba', 'Background', 'Set Your Button  Background', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link', 'background');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-H-C', $styledata[241], '', 'Hover Color', 'Set Your Button Hover Color', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link:hover', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-H-BG', $styledata[243], 'rgba', 'Hover Background', 'Set Your Button Hover Background', 'false', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link:hover', 'background');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-B', 245, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-B-B', $styledata[251], $styledata[252], 'Border', 'Set your Botton Border Size and Type', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-BC', $styledata[255], '', 'Border Color', 'Set Your Button  Border Color', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link', 'border-color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-B-BC-H', $styledata[257], '', 'Border Hover', 'Set Your Button  Border  Hover Color', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link:hover', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-B-BR', 259, $styledata, '1', 'Border Radius', 'Set your Button Border Radius', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-B-P', 275, $styledata, '1', 'Padding', 'Set your Button Padding', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-B-M', 291, $styledata, '1', 'Margin', 'Set your Button Margin', 'true', '.oxi-addons-EW-wrapper-' . $oxiid . '  .oxi-addons-EW-C-button-link', 'margin');
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
                </div>
                <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                    <?php echo oxi_event_widgets_style_1_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-D', $listitemdata[2], 'Date', 'Set Your Event Date, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M', $listitemdata[4], 'Month', 'Set Your Event Month, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAddonsEW-I', $listitemdata[6], 'Banner Image', 'Set Your Event Banner Image', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-H', $listitemdata[8], 'Heading Text', 'Set Your Heading Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textarea('OxiAddonsEW-IT', $listitemdata[10], 'Info Text', 'Give Your Info text Here', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-B', $listitemdata[12], 'Button Text', 'Set Your Button Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-B-URL', $listitemdata[14], 'Button Link', 'Set Your Button Link', 'false');
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