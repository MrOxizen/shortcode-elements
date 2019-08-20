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
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsOH-FI-rows') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsOH-FI-G-BG') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsOH-FI-G-B') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-FI-G-BS') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-FI-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-FI-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-FI-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsOH-FI-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsOH-FI-animation') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-FI-H-FS') . ''
                . ' OxiAddonsOH-FI-H-C |' . sanitize_hex_color($_POST['OxiAddonsOH-FI-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsOH-FI-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-FI-H-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-FI-D-FS') . ''
                . ' OxiAddonsOH-FI-D-C |' . sanitize_hex_color($_POST['OxiAddonsOH-FI-D-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsOH-FI-D') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-FI-D-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-FI-G-MXW') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-FI-G-HBS') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsOH-FI-G-HB') . '|'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsOH-FI-G-HBG') . ''
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
        $data = '||#||OxiAddonsOH-FI-D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOH-FI-D']) . '||#|| '
                . ' OxiAddonsOH-FI-T ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOH-FI-T']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsOH-FI-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-FI-G-MXW', $styledata[145], $styledata[146], $styledata[147], '1', 'Maximum Width', 'Set Max Width', 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row', 'max-width');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsOH-FI-G-BG', $styledata, 7, 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-FI-G-BS', 15, $styledata, '1', 'Border Size', 'Set your body Border Width', 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAddonsOH-FI-G-B', 11, $styledata, 'false', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row', 'border-style');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-FI-G-BR', 31, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-FI-G-P', 47, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-FI-G-M', 63, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsOH-FI-G-HBG', $styledata, 169, 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-FI-G-HBS', 149, $styledata, '1', 'Border Size', 'Set your body Border Width', 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row:hover', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAddonsOH-FI-G-HB', 165, $styledata, 'false', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row:hover', 'border-style');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsOH-FI-B-Shadow', 79, $styledata, 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Day Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-FI-H-FS', $styledata[89], $styledata[90], $styledata[91], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . '  .oxi-addonsOH-FI-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-FI-H-C', $styledata[93], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addonsOH-FI-wrapper-' . $oxiid . '  .oxi-addonsOH-FI-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsOH-FI-H', 95, $styledata, 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . '  .oxi-addonsOH-FI-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-FI-H-P', 101, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . '  .oxi-addonsOH-FI-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Time Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-FI-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Price Font Size', 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-date', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-FI-D-C', $styledata[121], '', 'Color', 'Set Your Price Color', 'false', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-date', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsOH-FI-D', 123, $styledata, 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-date');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-FI-D-P', 129, $styledata, '1', 'Padding', 'Set your Price Padding', 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-date', 'padding');
                                        ?>
                                    </div>
                                </div>
                               <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsOH-FI-animation', 85, $styledata, 'true', '.oxi-addonsOH-FI-wrapper-' . $oxiid . ' .oxi-addonsOH-FI-row');
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
                    <?php echo oxi_opening_hours_style_5_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsOH-FI-D', $listitemdata[2], 'Day Text', 'Set Your Day Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsOH-FI-T', $listitemdata[4], 'Times', 'Set Your Times', 'false');
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
