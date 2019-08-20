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
    if (!wp_verify_nonce($nonce, 'oxi-addons-counter-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . ' OxiAddPR-TC-Serial |' . sanitize_text_field($_POST['OxiAddPR-TC-Serial']) . '|'
            . ' ||'
            . ' ||'
            . ' ||'
            . '' . oxi_addons_adm_help_animation_senitize('OxiADDC-animation') . ''
            . ' OxiADDC-align |' . sanitize_text_field($_POST['OxiADDC-align']) . '|'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiADDC-Item') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiADDC-padding') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiADDC-T-size') . ''
            . ' OxiADDC-T-color |' . sanitize_text_field($_POST['OxiADDC-T-color']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiADDC-T') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiADDC-T-padding') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiADDC-N-size') . ''
            . ' OxiADDC-N-color |' . sanitize_text_field($_POST['OxiADDC-N-color']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiADDC-N') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiADDC-N-padding') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiADDC-I-size') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiADDC-I-width') . ''
            . ' OxiADDC-I-color |' . sanitize_text_field($_POST['OxiADDC-I-color']) . '|'
            . '' . OxiAddonsBGImageSanitize('OxiADDC-I-bg') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiADDC-I-border') . ''
            . '' . OxiAddonsADMHelpBorderSanitize('OxiADDC-I-border') . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiADDC-I-radius') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiADDC-I-margin') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiADDC-D-width') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiADDC-D-border') . ''
            . '' . OxiAddonsADMHelpBorderSanitize('OxiADDC-D-border') . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiADDC-D-padding') . ''
            . ' OxiADDC-D |' . sanitize_text_field($_POST['OxiADDC-D']) . '|'
            . ' counter-duration |' . sanitize_text_field($_POST['counter-duration']) . '|'
            . ' counter-delay |' . sanitize_text_field($_POST['counter-delay']) . '|'
            . '||#||  ||#||'
            . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = sanitize_textarea_field($_POST['oxilistid']);
        $data = 'OxiADDC-number||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiADDC-number']) . '||#||'
            . 'OxiADDC-title||#||' . OxiAddonsAdminUrlConvert($_POST['OxiADDC-title']) . '||#||'
            . 'OxiADDC-icon-class||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiADDC-icon-class']) . '||#||'
            . '||#||  ||#||';
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
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER by id ASC", $oxiid), ARRAY_A);
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
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-tabs-id-1">General</li>
                                <li ref="#oxi-tabs-id-2">Heading & Number</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Counter Data Serialize
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpDataSerialize($styledata[3]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Counter Information
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('counter-duration', $styledata[189], 0.1, 'Counter Duration', 'Counter Duration works as Second, Set how long you want to Count', 'true', '', '');
                                            echo oxi_addons_adm_help_number('counter-delay', $styledata[191], 0.01, 'Counter Delay', 'Counter Delay works for Counter deley, How long your property need to wait before Counting', 'true', '', '');
                                            echo oxi_addons_adm_help_Text_Align('OxiADDC-align', $styledata[15], 'Text Align', 'text align', 'true', '');
                                            echo OxiAddonsADMHelpItemPerRows('OxiADDC-Item', $styledata, 17, 'false', '.oxi-addons-admin-edit-list', 'true', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_padding_margin('OxiADDC-padding', 21, $styledata, 1, 'Padding', 'Set Your Icon Margin Top Bottom and Left Right', 'true', '.oxi-addons-counter-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiADDC-animation', 11, $styledata, 'true', '.oxi-addons-admin-edit-list');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiADDC-I-size', $styledata[93], $styledata[94], $styledata[95], 1, 'Size', 'Select Your Font Size', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-icons', 'font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiADDC-I-width', $styledata[97], $styledata[98], $styledata[99], 1, 'Width', 'Select Your Icon Body Size', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-icon', 'width');
                                            echo oxi_addons_adm_help_MiniColor('OxiADDC-I-color', $styledata[101], '', 'Color', 'Select Your Icon Color', '', '.oxi-addons-counter-' . $oxiid . ' .oxi-icons', 'color');
                                            echo OxiAddonsADMHelpBGImage('OxiADDC-I-bg', $styledata, 103, 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-icon');
                                            echo oxi_addons_adm_help_padding_margin('OxiADDC-I-border', 107, $styledata, 1, 'Border', 'Set Your Icon Border Top Bottom and Left Right', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-icon', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiADDC-I-border', 123, $styledata, 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-icon');
                                            echo oxi_addons_adm_help_padding_margin('OxiADDC-I-radius', 127, $styledata, 1, 'Border Radius', 'Set Your Icon Margin Top Bottom and Left Right', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-icon', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiADDC-I-margin', 143, $styledata, 1, 'Margin', 'Set Your Icon Padding Top Bottom and Left Right', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-icon', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Divider Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiADDC-D', $styledata[187], 'Yes', 'yes', 'No', '', 'Active Divider', 'Want to add Divider');
                                            echo oxi_addons_adm_help_number_dtm('OxiADDC-D-width', $styledata[159], $styledata[160], $styledata[161], 1, 'Width', 'Set Divider Max Width', 'true', ' .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-divider', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiADDC-D-border', $styledata[163], $styledata[164], $styledata[165], 1, 'Border', 'Set Divider Border Size', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-divider-left .oxi-divider', 'border-top-width');
                                            echo OxiAddonsADMhelpBorder('OxiADDC-D-border', 167, $styledata, '', '.oxi-addons-counter-' . $oxiid . ' .oxi-divider-left .oxi-divider');
                                            echo oxi_addons_adm_help_padding_margin('OxiADDC-D-padding', 171, $styledata, 1, 'Padding', 'Set Your Icon Margin Top Bottom and Left Right', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-divider', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiADDC-T-size', $styledata[37], $styledata[38], $styledata[39], 1, 'Font Size', 'Select Your Font Size', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-title', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiADDC-T-color', $styledata[41], '', 'Color', 'Select Your Title Color', '', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiADDC-T', 43, $styledata, 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiADDC-T-padding', 49, $styledata, 1, 'Padding', 'Set Your Title Padding Top Bottom and Left Right', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Number Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiADDC-N-size', $styledata[65], $styledata[66], $styledata[67], 1, 'Font Size', 'Select Your Font Size', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-number', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiADDC-N-color', $styledata[69], '', 'Color', 'Select Your Number Color', '', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-number', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiADDC-N', 71, $styledata, 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-number');
                                            echo oxi_addons_adm_help_padding_margin('OxiADDC-N-padding', 77, $styledata, 1, 'Padding', 'Set Your Number Padding Top Bottom and Left Right', 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-number', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-counter-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Counter Rearrange', $listdata, 3, 'title');
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
                    <?php echo oxi_counter_style_1_shortcode($style, $listdata, 'admin'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Counter Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textbox('OxiADDC-number', $listitemdata[1], 'Number', 'Give Your Counter Number, Unless make it blank');
                    echo oxi_addons_adm_help_modal_textbox('OxiADDC-title', $listitemdata[3], 'Title', 'Give Your Title Text, Unless make it blank');
                    echo oxi_addons_adm_help_modal_textbox('OxiADDC-icon-class', $listitemdata[5], 'Icon Class', 'Give Your Icon Class unless make it blank');
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