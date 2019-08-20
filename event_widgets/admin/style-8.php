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
            . ' OxiAddonsEW-8-G-I-BC |' . sanitize_text_field($_POST['OxiAddonsEW-8-G-I-BC']) . '|'
            . ' OxiAddonsEW-8-G-I-MXW |' . sanitize_text_field($_POST['OxiAddonsEW-8-G-I-MXW']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-8-G-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-8-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-8-G-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-8-B-Shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-8-animation') . ''
            . ' OxiAddonsEW-8-EL-Tab |' . sanitize_hex_color($_POST['OxiAddonsEW-8-EL-Tab']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-8-H-FS') . ''
            . ' OxiAddonsEW-8-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-8-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-8-H-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-8-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-8-SH-FS') . ''
            . ' OxiAddonsEW-8-SH-C |' . sanitize_hex_color($_POST['OxiAddonsEW-8-SH-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-8-SH-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-8-SH-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-8-F-FS') . ''
            . ' OxiAddonsEW-8-F-C |' . sanitize_hex_color($_POST['OxiAddonsEW-8-F-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-8-F-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-8-F-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-8-F-M-FS') . ''
            . ' OxiAddonsEW-8-F-M-C |' . sanitize_hex_color($_POST['OxiAddonsEW-8-F-M-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-8-F-M-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-8-F-M-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-8-F-T-FS') . ''
            . ' OxiAddonsEW-8-F-T-C |' . sanitize_hex_color($_POST['OxiAddonsEW-8-F-T-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-8-F-T-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-8-F-T-P') . ''
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-8-G-rows') . ''
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
        $data = ' ||#||OxiAddonsEW-8-G-I ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-8-G-I']) . '||#|| '
            . ' OxiAddonsEW-8-EL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-8-EL']) . '||#|| '
            . ' OxiAddonsEW-8-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-8-H']) . '||#|| '
            . ' OxiAddonsEW-8-SH ||#||' . sanitize_text_field($_POST['OxiAddonsEW-8-SH']) . '||#|| '
            . ' OxiAddonsEW-8-F-D ||#||' . sanitize_text_field($_POST['OxiAddonsEW-8-F-D']) . '||#|| '
            . ' OxiAddonsEW-8-F-M ||#||' . sanitize_text_field($_POST['OxiAddonsEW-8-F-M']) . '||#|| '
            . ' OxiAddonsEW-8-F-T ||#||' . sanitize_text_field($_POST['OxiAddonsEW-8-F-T']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-8-G-rows', $styledata, 207, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-8-G-I-BC', $styledata[3], 'rgba', 'Overlay', 'Set Your Image Overlay Background Color', 'false', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-body', 'background');
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-8-G-I-MXW', $styledata[5], '1', 'Max Width', 'Set your Max Width, EX. 100 means same size as width', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-8-G-BR', 7, $styledata, '1', 'Border Radius', 'Set yor body Border Radius', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-img-body', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-8-G-P', 23, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-body', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-8-G-M', 39, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-8-B-Shadow', 55, $styledata, 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-img-body');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-8-animation', 61, $styledata, '.oxi-addons-EW-8-wrapper-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-8-H-FS', $styledata[67], $styledata[68], $styledata[69], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-H', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-8-H-C', $styledata[71], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-H', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-8-H-F', 73, $styledata, 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-H');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-8-H-P', 79, $styledata, '1', 'Padding', 'Set Your Heading Text Padding', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-H', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Sub Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-8-SH-FS', $styledata[95], $styledata[96], $styledata[97], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-SH', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-8-SH-C', $styledata[99], '', 'Color', 'Set Your Sub Heading Font Color', 'false', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-SH', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-8-SH-F', 101, $styledata, 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-SH');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-8-SH-P', 107, $styledata, '1', 'Padding', 'Set Your Sub Heading Text Padding', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-SH', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Event Link
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-8-EL-Tab', $styledata[65], 'Normal', '', 'New Bab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'false');
                                        ?>
                                    </div>
                                </div>

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Footer Date
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-8-F-FS', $styledata[123], $styledata[124], $styledata[125], '1', 'Font Size', 'Set Your Date Font Size', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-D', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-8-F-C', $styledata[127], '', 'Color', 'Set Your Date Font Color', 'false', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-D', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-8-F-F', 129, $styledata, 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-D');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-8-F-P', 135, $styledata, '1', 'Padding', 'Set your Date Text Padding', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-D', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Footer Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-8-F-M-FS', $styledata[151], $styledata[152], $styledata[153], '1', 'Font Size', 'Set Your Month Font Size', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-M', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-8-F-M-C', $styledata[155], '', 'Color', 'Set Your Month Font Color', 'false', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-M', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-8-F-M-F', 157, $styledata, 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-M');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-8-F-M-P', 163, $styledata, '1', 'Padding', 'Set your Month Text Padding', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-M', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Footer Time
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-8-F-T-FS', $styledata[179], $styledata[180], $styledata[181], '1', 'Font Size', 'Set Your Time Font Size', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-T', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-8-F-T-C', $styledata[183], '', 'Color', 'Set Your Time Font Color', 'false', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-T', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-8-F-T-F', 185, $styledata, 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-T');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-8-F-T-P', 191, $styledata, '1', 'Padding', 'Set your Time Text Padding', 'true', '.oxi-addons-EW-8-wrapper-' . $oxiid . ' .oxi-addons-EW-8-footer-T', 'padding');
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
                    <?php echo oxi_event_widgets_style_8_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAddonsEW-8-G-I', $listitemdata[2], 'Banner Image', 'Set Your Event Banner Image', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-8-EL', $listitemdata[4], 'Event Link', 'Set Your Event Link, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-8-H', $listitemdata[6], 'Heading Text', 'Set Your Heading Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-8-SH', $listitemdata[8], 'Sub Heading', 'Set Your Sub Heading Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-8-F-D', $listitemdata[10], 'Date', 'Set Your Date Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-8-F-M', $listitemdata[12], 'Month', 'Set Your Month Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-8-F-T', $listitemdata[14], 'Time', 'Set Your Time, Supported native Language', 'false');
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