oxi_addons_adm_help_modal_textbox<?php
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
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-7-G-SZ') . ''
            . ' OxiAddonsEW-7-G-BC |' . sanitize_hex_color($_POST['OxiAddonsEW-7-G-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-7-G-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-7-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-7-G-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-7-B-Shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-7-animation') . ''
            . ' OxiAddonsEW-7-I-HR |' . sanitize_text_field($_POST['OxiAddonsEW-7-I-HR']) . '|'
            . ' OxiAddonsEW-7-I-BC |' . sanitize_text_field($_POST['OxiAddonsEW-7-I-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-7-I-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-7-H-FS') . ''
            . ' OxiAddonsEW-7-H-C |' . sanitize_hex_color($_POST['OxiAddonsEW-7-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-7-H-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-7-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-7-T-FS') . ''
            . ' OxiAddonsEW-7-T-C |' . sanitize_hex_color($_POST['OxiAddonsEW-7-T-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-7-T-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-7-T-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-7-AD-FS') . ''
            . ' OxiAddonsEW-7-AD-C |' . sanitize_hex_color($_POST['OxiAddonsEW-7-AD-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-7-AD-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-7-AD-P') . ''
            . ' OxiAddonsEW-7-L-Tab |' . sanitize_hex_color($_POST['OxiAddonsEW-7-L-Tab']) . '|'
            . '||||'
            . ' OxiAddonsEW-7-L-C |' . sanitize_hex_color($_POST['OxiAddonsEW-7-L-C']) . '|'
            . ' OxiAddonsEW-7-L-HC |' . sanitize_hex_color($_POST['OxiAddonsEW-7-L-HC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-7-L-P') . ''
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-7-G-rows') . ''
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
        $data = ' ||#||OxiAddonsEW-7-I ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-7-I']) . '||#|| '
            . ' OxiAddonsEW-7-H ||#||' . sanitize_text_field($_POST['OxiAddonsEW-7-H']) . '||#|| '
            . ' OxiAddonsEW-7-T ||#||' . sanitize_text_field($_POST['OxiAddonsEW-7-T']) . '||#|| '
            . ' OxiAddonsEW-7-IC ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsEW-7-IC']) . '||#|| '
            . ' OxiAddonsEW-7-AD ||#||' . sanitize_text_field($_POST['OxiAddonsEW-7-AD']) . '||#|| '
            . ' OxiAddonsEW-7-ICA ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsEW-7-ICA']) . '||#|| '
            . ' OxiAddonsEW-7-L ||#||' . sanitize_text_field($_POST['OxiAddonsEW-7-L']) . '||#|| '
            . ' OxiAddonsEW-7-LURL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-7-LURL']) . '||#|| '
            . ' OxiAddonsEW-7-ICL ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsEW-7-ICL']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-7-G-rows', $styledata, 197, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-7-G-SZ', $styledata[3], $styledata[4], 'Border', 'Set your body Border Size and Type', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-image');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-7-G-BC', $styledata[7], '', 'Border Color', 'Set Your body  Border Color', 'false', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-image', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-7-G-BR', 9, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-image', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-7-G-P', 25, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-image', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-7-G-M', 41, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Banner Image
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-7-I-HR', $styledata[67], '1', 'Height Ratio', 'Set your Height bsed on Width ratio, EX. 100 means same size as width', 'false', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-image::after', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-7-B-Shadow', 57, $styledata, 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-image', 'box-shadow');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-7-animation', 63, $styledata, '.oxi-addons-EW-7-wrapper-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Image Overlay
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-7-I-BC', $styledata[69], 'rgba', 'Background', 'Set Your Image Overlay Background Color', 'false', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-body', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-7-I-P', 71, $styledata, '1', 'Padding', 'Set yor Image Overlay Background Padding', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-body', 'padding');
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
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-7-H-FS', $styledata[87], $styledata[88], $styledata[89], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-H', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-7-H-C', $styledata[91], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-H', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-7-H-F', 93, $styledata, 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-H');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-7-H-P', 99, $styledata, '1', 'Padding', 'Set yor  Heading Text Padding', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-H', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Time Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-7-T-FS', $styledata[115], $styledata[116], $styledata[117], '1', 'Font Size', 'Set Your Time Font Size', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-time', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-7-T-C', $styledata[119], '', 'Color', 'Set Your Time Font Color', 'false', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-time', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-7-T-F', 121, $styledata, 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-time');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-7-T-P', 127, $styledata, '1', 'Padding', 'Set yor  Time Text Padding', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-time', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Address Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-7-AD-FS', $styledata[143], $styledata[144], $styledata[145], '1', 'Font Size', 'Set Your Address Font Size', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-address', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-7-AD-C', $styledata[147], '', 'Color', 'Set Your Address Font Color', 'false', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-address', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-7-AD-F', 149, $styledata, 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-address');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-7-AD-P', 155, $styledata, '1', 'Padding', 'Set yor Address Text Padding', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-address', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Link
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-7-L-C', $styledata[177], '', 'Color', 'Set Your Link Font Color', 'false', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-link-C', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-7-L-HC', $styledata[179], '', 'Hover Color', 'Set Your Link Hover Color', 'false', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-link:hover .oxi-addons-EW-7-link-C', 'color');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-7-L-Tab', $styledata[171], 'Same Tab', '', 'New Bab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-7-L-P', 181, $styledata, '1', 'Padding', 'Set yor  Link Text Padding', 'true', '.oxi-addons-EW-7-wrapper-' . $oxiid . ' .oxi-addons-EW-7-link', 'padding');
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
                    <?php echo oxi_event_widgets_style_7_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAddonsEW-7-I', $listitemdata[2], 'Banner Image', 'Set Your Event Banner Image', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-7-H', $listitemdata[4], 'Heading Text', 'Set Your Heading Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-7-T', $listitemdata[6], 'Time Text', 'Set Your Time Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-7-IC', $listitemdata[8], 'Time Icon Class', 'Set Your Time Icon Class', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-7-AD', $listitemdata[10], 'Address', 'Set Your Address Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-7-ICA', $listitemdata[12], 'Address Icon Class', 'Set Your Address Icon Class', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-7-L', $listitemdata[14], 'Link Text', 'Set Your Link Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-7-ICL', $listitemdata[18], 'Link Icon Class', 'Set Your Link Icon Class, Supported native Language', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-7-LURL', $listitemdata[16], 'URL', 'Set Your Url', 'false');
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