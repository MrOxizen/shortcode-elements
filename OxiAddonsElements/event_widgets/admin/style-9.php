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
            . ' OxiAddonsEW-9-G-I-MXW |' . sanitize_text_field($_POST['OxiAddonsEW-9-G-I-MXW']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-9-G-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-9-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-9-G-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-9-B-Shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-9-animation') . ''
            . ' OxiAddonsEW-9-H-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-9-H-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-9-H-PD') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-9-H-FS') . ''
            . ' OxiAddonsEW-9-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-9-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-9-H-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-9-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-9-SH-FS') . ''
            . ' OxiAddonsEW-9-SH-C |' . sanitize_hex_color($_POST['OxiAddonsEW-9-SH-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-9-SH-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-9-SH-P') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-9-G-SZ') . ''
            . ' OxiAddonsEW-9-G-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-9-G-BC']) . '|'
            . ' OxiAddonsEW-9-G-BGC |' . sanitize_hex_color($_POST['OxiAddonsEW-9-G-BGC']) . '|'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-9-G-rows') . ''
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
        $data = ' ||#||OxiAddonsEW-9-G-I ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-9-G-I']) . '||#|| '
            . ' OxiAddonsEW-9-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-9-H']) . '||#|| '
            . ' OxiAddonsEW-9-HI ||#||' . sanitize_text_field($_POST['OxiAddonsEW-9-HI']) . '||#|| '
            . ' OxiAddonsEW-9-SH ||#||' . sanitize_text_field($_POST['OxiAddonsEW-9-SH']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-9-G-rows', $styledata, 145, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-9-G-BGC', $styledata[143], '', 'Background', 'Set Your Backgorund Color', 'false', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-content-body', 'background');
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-9-G-I-MXW', $styledata[3], '1', 'Max Width', 'Set your Max Width, EX. 100 means same size as width', 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-9-G-SZ', $styledata[137], $styledata[138], 'Border', 'Set your body Border Size and Type', 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-body', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-9-G-BC', $styledata[141], '', 'Border Color', 'Set Your body  Border Color', 'false', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-body', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-9-G-BR', 5, $styledata, '1', 'Radius', 'Set yor body Radius', 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-body', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-9-G-P', 21, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-content-body', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-9-G-M', 37, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-9-B-Shadow', 53, $styledata, 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-body');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-9-animation', 59, $styledata, '.oxi-addons-EW-9-wrapper-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Header
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-9-H-BC', $styledata[63], '', 'Backgorund', 'Set Your Header Backgorund Color', 'false', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-header', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-9-H-PD', 65, $styledata, '1', 'Padding', 'Set yor Header Padding', 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-header', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-9-H-FS', $styledata[81], $styledata[82], $styledata[83], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-HI', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-9-H-C', $styledata[85], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-HI', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-9-H-F', 87, $styledata, 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-HI');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-9-H-P', 93, $styledata, '1', 'Padding', 'Set yor  Heading Text Padding', 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-HI', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Description
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-9-SH-FS', $styledata[109], $styledata[110], $styledata[111], '1', 'Font Size', 'Set Your Description Font Size', 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-content-text', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-9-SH-C', $styledata[113], '', 'Color', 'Set Your Sub Description Font Color', 'false', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-content-text', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-9-SH-F', 115, $styledata, 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-content-text');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-9-SH-P', 121, $styledata, '1', 'Padding', 'Set your  Sub Description Text Padding', 'true', '.oxi-addons-EW-9-wrapper-' . $oxiid . ' .oxi-addons-EW-9-content-text', 'padding');
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
                    <?php echo oxi_event_widgets_style_9_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAddonsEW-9-G-I', $listitemdata[2], 'Banner Image', 'Set Your Event Banner Image', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-9-H', $listitemdata[4], 'Heading Text', 'Set Your Heading Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-9-HI', $listitemdata[6], 'Icon Class', 'Set Your Icon Class', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-9-SH', $listitemdata[8], 'Description', 'Set Your Description Text, Supported native Language', 'false');
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