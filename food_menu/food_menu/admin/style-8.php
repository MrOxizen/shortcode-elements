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
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SI-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SI-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SI-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFM-SI-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFM-SI-animation') . ''
                . ' ||'
                . ' ||||'
                . ' ||||'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFM-SI-DM-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFM-SI-DM-B') . ''
                . ' OxiAddonsFM-SI-DM-BC |' . sanitize_hex_color($_POST['OxiAddonsFM-SI-DM-BC']) . '|'
                . ' ||||||||||||||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SI-DM-M') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-SI-D-FS') . ''
                . ' OxiAddonsFM-SI-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-SI-D-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-SI-D') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SI-D-P') . ''
                . ' ||||'
                . ' OxiAddonsFM-SI-G-MW |' . sanitize_text_field($_POST['OxiAddonsFM-SI-G-MW']) . '|'
                . ' ||||||'
                . ' ||||||||||||||||'
                . ' ||'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-SI-H-FS') . ''
                . ' OxiAddonsFM-SI-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-SI-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-SI-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SI-H-P') . ''
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsFM-SI-rows') . ''
                . ' OxiAddonsFM-SI-G-BGC |' . sanitize_text_field($_POST['OxiAddonsFM-SI-G-BGC']) . '|'
                . ' OxiAddonsFM-SI-G-Tab |' . sanitize_text_field($_POST['OxiAddonsFM-SI-G-Tab']) . '|'
                . ' ||||||||||||||||'
                . ' ||'
                . ' ||'
                . ' ||||||||||||||||'
                . ' ||||'
                . ' ||'
                . ' ||||'
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-SI-IN-FS') . ''
                . ' OxiAddonsFM-SI-IN-C |' . sanitize_hex_color($_POST['OxiAddonsFM-SI-IN-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-SI-IN2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SI-IN-P') . ''
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
        $data = ' ||#||OxiAddonsFM-SI-H ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-SI-H']) . '||#|| '
                . ' ||#||||#|| '
                . ' OxiAddonsFM-SI-D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-SI-D']) . '||#|| '
                . ' OxiAddonsFM-SI-B-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFM-SI-B-URL']) . '||#|| '
                . ' OxiAddonsFM-SI ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-SI']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsFM-SI-rows', $styledata, 203, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number('OxiAddonsFM-SI-G-MW', $styledata[149], '1', 'Max Width', 'Set your Box Max Width', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-row', 'max-width');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SI-G-BGC', $styledata[207], 'rgba', 'Background', 'Set Your Body Color', 'false', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-row', 'background');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsFM-SI-G-Tab', $styledata[209], 'Normal', '', 'New Bab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SI-G-BR', 7, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SI-G-P', 23, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SI-G-M', 39, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Content Body Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsFM-SI-DM-BG', $styledata, 75, 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-content-body', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsFM-SI-DM-B', $styledata[79], $styledata[80], 'Border', 'Set your Content Body Border Size and Type', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-content-body', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SI-DM-BC', $styledata[83], '', 'Border Color', 'Set Your Content Body  Border Color', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-content-body', 'border-color');
                                         echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SI-DM-M', 101, $styledata, '1', 'Padding', 'Set your Content Body Margin', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-content-body', 'Padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsFM-SI-B-Shadow', 55, $styledata, 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsFM-SI-animation', 61, $styledata, 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-row');
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
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-SI-H-FS', $styledata[175], $styledata[176], $styledata[177], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SI-H-C', $styledata[179], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-SI-H', 181, $styledata, 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SI-H-P', 187, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Info
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-SI-IN-FS', $styledata[257], $styledata[258], $styledata[259], 1, 'Font Size', 'Set Your Info Font Size', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-info', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SI-IN-C', $styledata[261], '', 'Color', 'Set Your Info Color', 'false', '.oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-info', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-SI-IN2', 263, $styledata, 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-info');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SI-IN-P', 269, $styledata, '1', 'Padding', 'Set your Info Padding', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . '  .oxi-addonsFM-SI-info', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Price
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-SI-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Price Font Size', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-price', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SI-D-C', $styledata[121], '', 'Color', 'Set Your Price Color', 'false', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-price', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-SI-D', 123, $styledata, 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-price');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SI-D-P', 129, $styledata, '1', 'Padding', 'Set your Price Padding', 'true', '.oxi-addonsFM-SI-wrapper-' . $oxiid . ' .oxi-addonsFM-SI-price', 'padding');
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
                echo oxi_addons_list_rearrange('Food Menu Rearrange', $listdata, 2, 'title');
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
                    <?php echo oxi_food_menu_style_8_shortcode($style, $listdata, 'admin'); ?>
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
                    <h4 class="modal-title">Food Menu Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-SI-H', $listitemdata[2], 'Food Name', 'Set Your Food Name, Supported native Language', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-SI-D', $listitemdata[6], 'Price', 'Set Your Food Menu Price', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-SI-B-URL', $listitemdata[8], 'Link', 'Set Your Food Menu Link', 'false');
                    echo oxi_addons_adm_help_form_textarea('OxiAddonsFM-SI', $listitemdata[10], 'Info', 'Set Your Food Menu Info', 'false')
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
