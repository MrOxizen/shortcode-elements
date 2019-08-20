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
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TH-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TH-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TH-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFM-TH-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFM-TH-animation') . ''
                . ' ||'
                . ' ||||'
                . ' ||||'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFM-TH-DM-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFM-TH-DM-B') . ''
                . ' OxiAddonsFM-TH-DM-BC |' . sanitize_hex_color($_POST['OxiAddonsFM-TH-DM-BC']) . '|'
                . ' ||||||||||||||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TH-DM-M') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-TH-D-FS') . ''
                . ' OxiAddonsFM-TH-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-TH-D-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-TH-D') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TH-D-P') . ''
                . ' ||||'
                . ' OxiAddonsFM-TH-G-MW |' . sanitize_text_field($_POST['OxiAddonsFM-TH-G-MW']) . '|'
                . ' ||||||'
                . ' ||||||||||||||||'
                . ' ||'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-TH-H-FS') . ''
                . ' OxiAddonsFM-TH-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-TH-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-TH-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TH-H-P') . ''
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsFM-TH-rows') . ''
                . ' ||'
                . ' OxiAddonsFM-TH-G-Tab |' . sanitize_text_field($_POST['OxiAddonsFM-TH-G-Tab']) . '|'
                . ' ||||'
                . ' ||'
                . ' ||'
                . ' ||||||||||||||||'

                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFM-TH-PR-B') . ''
                . ' OxiAddonsFM-TH-PR-BC |' . sanitize_hex_color($_POST['OxiAddonsFM-TH-PR-BC']) . '|'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFM-TH-G-BGC') . ''
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
        $data = ' ||#||OxiAddonsFM-TH-H ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-TH-H']) . '||#|| '
                . ' OxiAddonsFM-TH-D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-TH-D']) . '||#|| '
                . ' OxiAddonsFM-TH-B-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFM-TH-B-URL']) . '||#|| ';
                
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsFM-TH-rows', $styledata, 203, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number('OxiAddonsFM-TH-G-MW', $styledata[149], '1', 'Max Width', 'Set your Box Max Width', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-row', 'max-width');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsFM-TH-G-BGC', $styledata, 241, 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-row', 'background');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsFM-TH-G-Tab', $styledata[209], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TH-G-BR', 7, $styledata, '1', 'Border Radius', 'Set yor body Border Radius', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TH-G-P', 23, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TH-G-M', 39, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Content Body Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsFM-TH-DM-BG', $styledata, 75, 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-content-body', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsFM-TH-DM-B', $styledata[79], $styledata[80], 'Border', 'Set your Content Body Border Size and Type', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-content-body', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TH-DM-BC', $styledata[83], '', 'Border Color', 'Set Your Content Body  Border Color', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-content-body', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TH-DM-M', 101, $styledata, '1', 'Padding', 'Set your Content Body Padding', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-content-body', 'Padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsFM-TH-B-Shadow', 55, $styledata, 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-row');
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
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-TH-H-FS', $styledata[175], $styledata[176], $styledata[177], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TH-H-C', $styledata[179], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-TH-H', 181, $styledata, 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TH-H-P', 187, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-heading-body', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Price
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-TH-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Price Font Size', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TH-D-C', $styledata[121], '', 'Color', 'Set Your Price Color', 'false', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price', 'color');
                                        echo oxi_addons_adm_help_border('OxiAddonsFM-TH-PR-B', $styledata[235], $styledata[236], 'Border', 'Set your Price Border Size and Type', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price:after', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TH-PR-BC', $styledata[239], '', 'Border Color', 'Set Your Price  Border Color', 'false', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price:after', 'border-color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-TH-D', 123, $styledata, 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TH-D-P', 129, $styledata, '1', 'Padding', 'Set your Price Padding', 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-TH-price', 'padding');
                                        ?>
                                    </div>
                                </div>
                                 <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsFM-TH-animation', 61, $styledata, 'true', '.oxi-addonsFM-wrapper-' . $oxiid . ' .oxi-addonsFM-row');
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
                    <?php echo oxi_food_menu_style_9_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-TH-H', $listitemdata[2], 'Food Name', 'Set Your Food Name, Supported native Language', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-TH-D', $listitemdata[4], 'Price', 'Set Your Food Menu Price', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-TH-B-URL', $listitemdata[6], 'Link', 'Set Your Food Menu Link', 'false');
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
