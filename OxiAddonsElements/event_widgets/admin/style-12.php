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
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-12-G-BG') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-12-G-MXW') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-12-G-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-12-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-12-G-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-12-B-Shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-12-animation') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-12-DT-FS') . ''
            . ' OxiAddonsEW-12-DT-C |' . sanitize_hex_color($_POST['OxiAddonsEW-12-DT-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-12-DT-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-12-DT-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-12-M-FS') . ''
            . ' OxiAddonsEW-12-M-C |' . sanitize_hex_color($_POST['OxiAddonsEW-12-M-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-12-M-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-12-M-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-12-H-FS') . ''
            . ' OxiAddonsEW-12-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-12-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-12-H-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-12-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-12-DE-FS') . ''
            . ' OxiAddonsEW-12-DE-C |' . sanitize_hex_color($_POST['OxiAddonsEW-12-DE-C']) . '|'
            . ' OxiAddonsEW-12-DE-IC |' . sanitize_hex_color($_POST['OxiAddonsEW-12-DE-IC']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-12-DE-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-12-DE-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-12-T-FS') . ''
            . ' OxiAddonsEW-12-T-C |' . sanitize_hex_color($_POST['OxiAddonsEW-12-T-C']) . '|'
            . ' OxiAddonsEW-12-T-IC |' . sanitize_hex_color($_POST['OxiAddonsEW-12-T-IC']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-12-T-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-12-T-P') . ''
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-12-rows') . ''
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
        $data = ' ||#||OxiAddonsEW-12-D ||#||' . sanitize_text_field($_POST['OxiAddonsEW-12-D']) . '||#|| '
            . ' OxiAddonsEW-12-M ||#||' . sanitize_text_field($_POST['OxiAddonsEW-12-M']) . '||#|| '
            . ' OxiAddonsEW-12-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-12-H']) . '||#|| '
            . ' OxiAddonsEW-12-DE ||#||' . sanitize_text_field($_POST['OxiAddonsEW-12-DE']) . '||#|| '
            . ' OxiAddonsEW-12-DE-I ||#||' . sanitize_text_field($_POST['OxiAddonsEW-12-DE-I']) . '||#|| '
            . ' OxiAddonsEW-12-T ||#||' . sanitize_text_field($_POST['OxiAddonsEW-12-T']) . '||#|| '
            . ' OxiAddonsEW-12-T-I ||#||' . sanitize_text_field($_POST['OxiAddonsEW-12-T-I']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-12-rows', $styledata, 213, 'false', '.oxi-addons-admin-edit-list');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-12-G-BG', $styledata, 3, 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-row', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-12-G-MXW', $styledata[7], $styledata[8], $styledata[9], '1', 'Maximum Width', 'Set Max Width', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-row', 'max-width');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-12-G-BR', 11, $styledata, '1', 'Border Radius', 'Set yor body Border Radius', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-12-G-P', 27, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-12-G-M', 43, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-12-B-Shadow', 59, $styledata, 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-12-animation', 65, $styledata, 'oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Date
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-12-DT-FS', $styledata[69], $styledata[70], $styledata[71], '1', 'Font Size', 'Set Your Date Font Size', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-D', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-12-DT-C', $styledata[73], '', 'Color', 'Set Your Date Font Color', 'false', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-D', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-12-DT-F', 75, $styledata, 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-D');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-12-DT-P', 81, $styledata, '1', 'Padding', 'Set yor Date Text Padding', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-D', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Month
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-12-M-FS', $styledata[97], $styledata[98], $styledata[99], '1', 'Font Size', 'Set Your Month Font Size', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-M', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-12-M-C', $styledata[101], '', 'Color', 'Set Your Month Font Color', 'false', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-M', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-12-M-F', 103, $styledata, 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-M');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-12-M-P', 109, $styledata, '1', 'Padding', 'Set yor  Month Text Padding', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-M', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-12-H-FS', $styledata[125], $styledata[126], $styledata[127], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-12-H-C', $styledata[129], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-12-H-F', 131, $styledata, 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-12-H-P', 137, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Designation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-12-DE-FS', $styledata[153], $styledata[154], $styledata[155], '1', 'Font Size', 'Set Your Designation Font Size', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-LT', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-12-DE-C', $styledata[157], '', 'Color', 'Set Your Designation Font Color', 'false', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-LT', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-12-DE-IC', $styledata[159], '', 'Icon Color', 'Set Your Designation Font Color', 'false', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-LI', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-12-DE-F', 161, $styledata, 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-LT');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-12-DE-P', 167, $styledata, '1', 'Padding', 'Set yor Designation Text Padding', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-LT', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Time
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-12-T-FS', $styledata[183], $styledata[184], $styledata[185], '1', 'Font Size', 'Set Your Time Font Size', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-TT', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-12-T-C', $styledata[187], '', 'Color', 'Set Your Time Font Color', 'false', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-TT', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-12-T-IC', $styledata[189], '', 'Icon Color', 'Set Your Time Font Color', 'false', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-TI', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-12-T-F', 191, $styledata, 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-TT');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-12-T-P', 197, $styledata, '1', 'Padding', 'Set yor Time Text Padding', 'true', '.oxi-addons-EW-12-wrapper-' . $oxiid . ' .oxi-addons-EW-12-TT', 'padding');
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
                echo oxi_addons_list_rearrange('Event Widgets Rearrange', $listdata, 6, 'title');
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
                    <?php echo oxi_event_widgets_style_12_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-12-D', $listitemdata[2], 'Date', 'Set Your Date Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-12-M', $listitemdata[4], 'Month', 'Set Your Month Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-12-H', $listitemdata[6], 'Heading', 'Set Your Heading Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-12-DE', $listitemdata[8], 'Name', 'Set Your Designation Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-12-DE-I', $listitemdata[10], 'Icon Class', 'Set Your Icon Class', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-12-T', $listitemdata[12], 'Time', 'Set Your Time text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-12-T-I', $listitemdata[14], 'Icon Class', 'Set Your Icon Class', 'false');
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