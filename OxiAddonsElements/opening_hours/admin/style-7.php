<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
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
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsOH-SV-rows') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsOH-SV-G-BG') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsOH-SV-G-B') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SV-G-BS') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SV-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SV-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SV-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsOH-SV-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsOH-SV-animation') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-SV-H-FS') . ''
                . ' OxiAddonsOH-SV-H-C |' . sanitize_hex_color($_POST['OxiAddonsOH-SV-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsOH-SV-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SV-H-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-SV-D-FS') . ''
                . ' OxiAddonsOH-SV-D-C |' . sanitize_hex_color($_POST['OxiAddonsOH-SV-D-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsOH-SV-D') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SV-D-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-SV-G-MXW') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-SV-T-FS') . ''
                . ' OxiAddonsOH-SV-T-C |' . sanitize_hex_color($_POST['OxiAddonsOH-SV-T-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsOH-SV-T') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SV-T-P') . ''
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
        $data = '||#||OxiAddonsOH-SV-D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOH-SV-D']) . '||#|| '
                . ' OxiAddonsOH-SV-T ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOH-SV-T']) . '||#|| '
                . ' OxiAddonsOH-SV-TI ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOH-SV-TI']) . '||#|| ';
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
        $item_id = (int) $_POST['oxi-item-id'];
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
        $item_id = (int) $_POST['oxi-item-id'];
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsOH-SV-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-SV-G-MXW', $styledata[145], $styledata[146], $styledata[147], '1', 'Maximum Width', 'Set Max Width', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-row', 'max-width');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsOH-SV-G-BG', $styledata, 7, 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-row', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SV-G-BS', 15, $styledata, '1', 'Border Size', 'Set your body Border Width', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-row', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAddonsOH-SV-G-B', 11, $styledata, 'false', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-row', 'border-style');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SV-G-BR', 31, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SV-G-P', 47, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SV-G-M', 63, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsOH-SV-B-Shadow', 79, $styledata, 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-row');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                 <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Title Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-SV-T-FS', $styledata[149], $styledata[150], $styledata[151], '1', 'Font Size', 'Set Your Title Font Size', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-title', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-SV-T-C', $styledata[153], '', 'Color', 'Set Your Title Font Color', 'false', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-title', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsOH-SV-T', 155, $styledata, 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-title');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SV-T-P', 161, $styledata, '1', 'Padding', 'Set Your Title Text Padding', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-title', 'padding');
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Time Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-SV-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Time Font Size', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-date', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-SV-D-C', $styledata[121], '', 'Color', 'Set Your Time Color', 'false', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-date', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsOH-SV-D', 123, $styledata, 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-date');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SV-D-P', 129, $styledata, '1', 'Padding', 'Set your Time Padding', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-date', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Day Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-SV-H-FS', $styledata[89], $styledata[90], $styledata[91], '1', 'Font Size', 'Set Your Day Font Size', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . '  .oxi-addonsOH-SV-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-SV-H-C', $styledata[93], '', 'Color', 'Set Your Day Font Color', 'false', '.oxi-addonsOH-SV-wrapper-' . $oxiid . '  .oxi-addonsOH-SV-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsOH-SV-H', 95, $styledata, 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . '  .oxi-addonsOH-SV-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SV-H-P', 101, $styledata, '1', 'Padding', 'Set Your Day Text Padding', 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . '  .oxi-addonsOH-SV-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                               <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsOH-SV-animation', 85, $styledata, 'true', '.oxi-addonsOH-SV-wrapper-' . $oxiid . ' .oxi-addonsOH-SV-row');
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
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
                echo oxi_addons_list_rearrange('Opening Hours Rearrange', $listdata, 2, 'title');
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
                    <?php echo oxi_opening_hours_style_7_shortcode($style, $listdata, 'admin'); ?>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Opening Hours Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('OxiAddonsOH-SV-TI', $listitemdata[6], 'Title', 'Set Your Title Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsOH-SV-D', $listitemdata[2], 'Day Text', 'Set Your Day Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsOH-SV-T', $listitemdata[4], 'Times', 'Set Your Times', 'false');
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
