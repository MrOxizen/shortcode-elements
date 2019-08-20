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
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-5-G-BG') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-5-G-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-5-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-5-G-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-5-B-Shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-5-animation') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-5-DT-FS') . ''
            . ' OxiAddonsEW-5-DT-C |' . sanitize_hex_color($_POST['OxiAddonsEW-5-DT-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-5-DT-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-5-DT-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-5-NA-FS') . ''
            . ' OxiAddonsEW-5-NA-C |' . sanitize_hex_color($_POST['OxiAddonsEW-5-NA-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-5-NA-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-5-NA-P') . ''
            . ' OxiAddonsEW-5-G-MW |' . sanitize_text_field($_POST['OxiAddonsEW-5-G-MW']) . '|'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-5-G-rows') . ''
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
        $data = ' ||#||OxiAddonsEW-5-D ||#||' . sanitize_text_field($_POST['OxiAddonsEW-5-D']) . '||#|| '
            . ' OxiAddonsEW-5-T ||#||' . sanitize_text_field($_POST['OxiAddonsEW-5-T']) . '||#|| '
            . ' OxiAddonsEW-5-N ||#||' . sanitize_text_field($_POST['OxiAddonsEW-5-N']) . '||#|| '
            . ' OxiAddonsEW-5-AD ||#||' . sanitize_text_field($_POST['OxiAddonsEW-5-AD']) . '||#||';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-5-G-rows', $styledata, 123, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-5-G-MW', $styledata[121], '', 'Max Width', 'Set your Box Max Width', 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . '', 'max-width');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-5-G-BG', $styledata, 3, 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-row', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-5-G-BR', 7, $styledata, '1', 'Border Radius', 'Set yor body Border Radius', 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-5-G-P', 23, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-5-G-M', 39, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-5-B-Shadow', 55, $styledata, 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-row', 'box-shadow');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-5-animation', 61, $styledata, 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Date and Time
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-5-DT-FS', $styledata[65], $styledata[66], $styledata[67], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-Heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-5-DT-C', $styledata[69], '', 'Color', 'Set Your Date and Time Font Color', 'false', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-Heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-5-DT-F', 71, $styledata, 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-Heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-5-DT-P', 77, $styledata, '1', 'Padding', 'Set yor  Date and Time Text Padding', 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-Heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Name and Address
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-5-NA-FS', $styledata[93], $styledata[94], $styledata[95], '1', 'Font Size', 'Set Your Name and Address Font Size', 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-details', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-5-NA-C', $styledata[97], '', 'Color', 'Set Your Name and Address Font Color', 'false', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-details', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-5-NA-F', 99, $styledata, 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-details');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-5-NA-P', 105, $styledata, '1', 'Padding', 'Set yor Name and Address Text Padding', 'true', '.oxi-addons-EW-5-wrapper-' . $oxiid . ' .oxi-addons-EW-5-details', 'padding');
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
                    <?php echo oxi_event_widgets_style_5_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-5-D', $listitemdata[2], 'Date', 'Set Your Date Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-5-T', $listitemdata[4], 'Time', 'Set Your Time Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-5-N', $listitemdata[6], 'Name', 'Set Your Name Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-5-AD', $listitemdata[8], 'Address', 'Set Your Address Text, Supported native Language', 'false');
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