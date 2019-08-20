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
                . '' . OxiAddonsBGImageSanitize('OxiAddonsOH-SX-G-BG') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsOH-SX-G-B') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SX-G-BS') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SX-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SX-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SX-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsOH-SX-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsOH-SX-animation') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-SX-H-FS') . ''
                . ' ||'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsOH-SX-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SX-H-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-SX-D-FS') . ''
                . ' ||'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsOH-SX-D') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SX-D-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOH-SX-G-MXW') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsOH-SX-CB-B') . ''
                . ' OxiAddonsOH-SX-CB-BC |' . sanitize_hex_color($_POST['OxiAddonsOH-SX-CB-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOH-SX-CB-P') . ''
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
        $data = '||#||OxiAddonsOH-SX-D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOH-SX-D']) . '||#|| '
                . ' OxiAddonsOH-SX-T ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOH-SX-T']) . '||#|| '
                . ' OxiAddonsOH-SX-H-C ||#||' . sanitize_hex_color($_POST['OxiAddonsOH-SX-H-C']) . '||#|| '
                . ' OxiAddonsOH-SX-D-C ||#||' . sanitize_hex_color($_POST['OxiAddonsOH-SX-D-C']) . '||#||';
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
//echo "<pre>";
//print_r($styledata);
//echo "</pre>";
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
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-SX-G-MXW', $styledata[145], $styledata[146], $styledata[147], '1', 'Maximum Width', 'Set Max Width', 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row', 'max-width');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsOH-SX-G-BG', $styledata, 7, 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row', 'background');
                                        echo OxiAddonsADMhelpBorder('OxiAddonsOH-SX-G-B', 11, $styledata, 'false', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row', 'border-style');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SX-G-BS', 15, $styledata, '1', 'Border Size', 'Set your body Border Width', 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row', 'border-width');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SX-G-BR', 31, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SX-G-P', 47, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SX-G-M', 63, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                     <div class="oxi-head">
                                        Content Body
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_border('OxiAddonsOH-SX-CB-B', $styledata[149], $styledata[150], 'Border Bottom', 'Set your Content Body Border Bottom Size and Type', 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-content');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-SX-CB-BC', $styledata[153], '', 'Border Color', 'Set Your Content Body Border Color', 'false', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-content', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SX-CB-P', 155, $styledata, '1', 'Padding', 'Set your Content Body Padding', 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-content', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsOH-SX-B-Shadow', 79, $styledata, 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row');
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
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-SX-H-FS', $styledata[89], $styledata[90], $styledata[91], '1', 'Font Size', 'Set Your Day Font Size', 'false', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-heading-text', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsOH-SX-H', 95, $styledata, 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-heading-text');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SX-H-P', 101, $styledata, '1', 'Margin', 'Set yor Day Body Margin', 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-heading-text', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Time Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                         echo oxi_addons_adm_help_number_dtm('OxiAddonsOH-SX-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Time Font Size', 'false', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-date', 'font-size');
                                         echo OxiAddonsADMHelpFontSettings('OxiAddonsOH-SX-D', 123, $styledata, 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-date');
                                         echo oxi_addons_adm_help_padding_margin('OxiAddonsOH-SX-D-P', 129, $styledata, '1', 'Padding', 'Set your Time Padding', 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-date', 'padding');
                                        ?>
                                    </div>
                                </div>
                                 <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsOH-SX-animation', 85, $styledata, 'true', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-row');
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
                    <?php echo oxi_opening_hours_style_8_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsOH-SX-D', $listitemdata[2], 'Day Text', 'Set Your Day Text, Supported native Language', 'false');
                    echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-SX-H-C', $listitemdata[6], '', 'Color', 'Set Your Day Font Color', 'false', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-heading-text', 'color');
                    echo oxi_addons_adm_help_textbox('OxiAddonsOH-SX-T', $listitemdata[4], 'Times', 'Set Your Times', 'false');
                    echo oxi_addons_adm_help_MiniColor('OxiAddonsOH-SX-D-C', $listitemdata[8], '', 'Color', 'Set Your Time Color', 'false', '.oxi-addonsOH-SX-wrapper-' . $oxiid . ' .oxi-addonsOH-SX-date', 'color');
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
