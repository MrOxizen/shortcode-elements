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
            . ' OxiAddonsEW-6-G-C |' . sanitize_hex_color($_POST['OxiAddonsEW-6-G-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-6-G-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-6-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-6-G-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-6-B-Shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-6-animation') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-6-NY-FS') . ''
            . ' OxiAddonsEW-6-NY-C |' . sanitize_hex_color($_POST['OxiAddonsEW-6-NY-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-6-NY-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-6-NY-P') . ''
            . ' OxiAddonsEW-6-DT-B |' . sanitize_hex_color($_POST['OxiAddonsEW-6-DT-B']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-6-DT-FS') . ''
            . ' OxiAddonsEW-6-DT-C |' . sanitize_hex_color($_POST['OxiAddonsEW-6-DT-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-6-DT-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-6-DT-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-6-T-FS') . ''
            . ' OxiAddonsEW-6-T-C |' . sanitize_hex_color($_POST['OxiAddonsEW-6-T-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-6-T-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-6-T-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-6-M-FS') . ''
            . ' OxiAddonsEW-6-M-C |' . sanitize_hex_color($_POST['OxiAddonsEW-6-M-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-6-M-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-6-M-P') . ''
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW--6-G-rows') . ''
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
        $data = ' ||#||OxiAddonsEW-6-N ||#||' . sanitize_text_field($_POST['OxiAddonsEW-6-N']) . '||#|| '
            . ' OxiAddonsEW-6-Y ||#||' . sanitize_text_field($_POST['OxiAddonsEW-6-Y']) . '||#|| '
            . ' OxiAddonsEW-6-D ||#||' . sanitize_text_field($_POST['OxiAddonsEW-6-D']) . '||#|| '
            . ' OxiAddonsEW-6-M ||#||' . sanitize_text_field($_POST['OxiAddonsEW-6-M']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW--6-G-rows', $styledata, 177, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-6-G-C', $styledata[3], '', 'Background', 'Set Your Body Background Color', 'false', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-content-box', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-6-G-BR', 5, $styledata, '1', 'Border Radius', 'Set yor body Border Radius', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-body', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-6-G-P', 21, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-content-box', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-6-G-M', 37, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-6-B-Shadow', 53, $styledata, 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-body', 'box-shadow');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Name
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-6-NY-FS', $styledata[63], $styledata[64], $styledata[65], '1', 'Font Size', 'Set Your Name Font Size', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-H', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-6-NY-C', $styledata[67], '', 'Color', 'Set Your Name Font Color', 'false', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-H', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-6-NY-F', 69, $styledata, 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-H');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-6-NY-P', 75, $styledata, '1', 'Padding', 'Set yor Name Text Padding', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-H', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Time
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-6-T-FS', $styledata[121], $styledata[122], $styledata[123], '1', 'Font Size', 'Set Your Time Font Size', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-SH', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-6-T-C', $styledata[125], '', 'Color', 'Set Your Time Font Color', 'false', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-SH', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-6-T-F', 127, $styledata, 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-SH');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-6-T-P', 133, $styledata, '1', 'Padding', 'Set yor Time Text Padding', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-SH', 'padding');
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
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-6-animation', 59, $styledata, 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Date and Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-6-DT-B', $styledata[91], '', 'Background', 'Set Your Date and Month Font Color', 'false', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-body', 'background');                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Date
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-6-DT-FS', $styledata[93], $styledata[94], $styledata[95], '1', 'Font Size', 'Set Your Date Font Size', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-D', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-6-DT-C', $styledata[97], '', 'Color', 'Set Your Date Font Color', 'false', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-D', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-6-DT-F', 99, $styledata, 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-D');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-6-DT-P', 105, $styledata, '1', 'Padding', 'Set yor Date Text Padding', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-D', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-6-M-FS', $styledata[149], $styledata[150], $styledata[151], '1', 'Font Size', 'Set Your Month Font Size', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-M', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-6-M-C', $styledata[153], '', 'Color', 'Set Your Month Font Color', 'false', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-M', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-6-M-F', 155, $styledata, 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-M');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-6-M-P', 161, $styledata, '1', 'Padding', 'Set yor  Month Text Padding', 'true', '.oxi-addons-EW-6-wrapper-' . $oxiid . ' .oxi-addons-EW-6-M', 'padding');
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
                echo oxi_addons_list_rearrange('Event Widgets Rearrange', $listdata, 2, 'title')
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
                    <?php echo oxi_event_widgets_style_6_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-6-N', $listitemdata[2], 'Name', 'Set Your Name, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-6-Y', $listitemdata[4], 'Time', 'Set Your Time Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-6-D', $listitemdata[6], 'Date', 'Set Your Date Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-6-M', $listitemdata[8], 'Month', 'Set Your Month Text, Supported native Language', 'false');
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