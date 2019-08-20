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
                . ' ||||'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsOH-F-G-BG') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsOH-F-G-B') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-F-G-BS') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-F-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-F-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-F-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsOH-F-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsOH-F-animation') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-F-H-FS') . ''
                . ' OxiAddonsOH-F-H-C |' . sanitize_hex_color($_POST['OxiAddonsOH-F-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsOH-F-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-F-H-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-F-D-FS') . ''
                . ' OxiAddonsOH-F-D-C |' . sanitize_hex_color($_POST['OxiAddonsOH-F-D-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsOH-F-D') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-F-D-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-F-G-MXW') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-F-I-FS') . ''
                . ' OxiAddonsOH-F-I-C |' . sanitize_hex_color($_POST['OxiAddonsOH-F-I-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-F-I-M') . ''
                
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsOH-F-rows') . ''
                . ' OxiAddonsOH-F-I-BG |' . sanitize_text_field($_POST['OxiAddonsOH-F-I-BG']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-F-I-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-F-I-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-F-I-BR') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsOH-F-I-B') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-F-I-BS') . ''
                . '||#||'
                . 'OxiAddonsOH-F-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsOH-F-I']) . '||#|| '
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
        $data = '||#||OxiAddonsOH-F-D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOH-F-D']) . '||#|| '
                . ' OxiAddonsOH-F-T ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOH-F-T']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsOH-F-rows', $styledata, 171, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-F-G-MXW', $styledata[145], $styledata[146], $styledata[147], '1', 'Maximum Width', 'Set Max Width', 'true', '.oxi-addonsOH-wrapper-' . $oxiid . ' .oxi-addonsOH-row', 'max-width');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsOH-F-G-BG', $styledata, 7, 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-row', 'background');
                                        echo OxiAddonsADMhelpBorder('OxiAddonsOH-F-G-B', 11, $styledata, 'false', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-row', 'border-style');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-F-G-BS', 15, $styledata, '1', 'Border Size', 'Set your body Border Width', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-row', 'border-width');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-F-G-BR', 31, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-F-G-P', 47, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-F-G-M', 63, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsOH-F-B-Shadow', 79, $styledata, 'true', '.oxi-addonsOH-wrapper-' . $oxiid . ' .oxi-addonsOH-row');
                                        ?>
                                    </div>
                                </div>
                                 <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsOH-F-animation', 85, $styledata, 'true', '.oxi-addonsOH-wrapper-' . $oxiid . ' .oxi-addonsOH-row');
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
                                        echo oxi_addons_adm_help_textbox('OxiAddonsOH-F-I', $stylefiles[2], 'Icon Class', 'Set Your Icon Class', 'false');
                                         echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-F-I-W', $styledata[177], $styledata[178], $styledata[179], '1', 'Width', 'Set Icon Width', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons', 'max-width');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-F-I-H', $styledata[181], $styledata[182], $styledata[183], '1', 'Height', 'Set Icon Height', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons', 'height');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-F-I-BG', $styledata[175], 'rgba', 'Background', 'Set Your Icon Background Color', 'false', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-F-I-FS', $styledata[149], $styledata[150], $styledata[151], '1', 'Icon Size', 'Set Your Icon Size', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-F-I-C', $styledata[153], '', 'Color', 'Set Your Icon Color', 'false', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-F-I-BS', 205, $styledata, '1', 'Border Size', 'Set your Icon body Border Width', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAddonsOH-F-I-B', 201, $styledata, 'false', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons', 'border-style');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-F-I-BR', 185, $styledata, '1', 'Border Radius', 'Set your Icon body Border Radius', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-F-I-M', 155, $styledata, '1', 'Margin', 'Set Your Icon Margin', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-icon .oxi-icons', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Day Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-F-H-FS', $styledata[89], $styledata[90], $styledata[91], '1', 'Font Size', 'Set Your Day Font Size', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-heading-text', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-F-H-C', $styledata[93], '', 'Color', 'Set Your Day Font Color', 'false', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-heading-text', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsOH-F-H', 95, $styledata, 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-heading-text');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-F-H-P', 101, $styledata, '1', 'Margin', 'Set yor Day Body Margin', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-heading-text', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Time Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                         echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-F-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Time Font Size', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-date', 'font-size');
                                         echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-F-D-C', $styledata[121], '', 'Color', 'Set Your Time Color', 'false', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-date', 'color');
                                         echo OxiAddonsADMHelpFontSettings('OxiAddonsOH-F-D', 123, $styledata, 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-date');
                                         echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-F-D-P', 129, $styledata, '1', 'Padding', 'Set your Time Padding', 'true', '.oxi-addonsOH-F-wrapper-' . $oxiid . ' .oxi-addonsOH-F-date', 'padding');
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
                    <?php echo oxi_opening_hours_style_4_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsOH-F-D', $listitemdata[2], 'Day Text', 'Set Your Day Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsOH-F-T', $listitemdata[4], 'Times', 'Set Your Times', 'false');
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
