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
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FO-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FO-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FO-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFM-FO-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFM-FO-animation') . ''
                . ' ||'
                . ' ||||'
                . ' ||||'
                . ' ||||'
                . ' ||||'
                . ' ||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FO-DM-BR') . ''
                . ' ||||||||||||||||'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-FO-D-FS') . ''
                . ' OxiAddonsFM-FO-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-FO-D-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-FO-D') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FO-D-P') . ''
                . ' ||||'
                . ' OxiAddonsFM-FO-G-MW |' . sanitize_text_field($_POST['OxiAddonsFM-FO-G-MW']) . '|'
                . ' ||||||'
                . ' ||||||||||||||||'
                . ' OxiAddonsFM-FO-I-HR |' . sanitize_text_field($_POST['OxiAddonsFM-FO-I-HR']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-FO-H-FS') . ''
                . ' OxiAddonsFM-FO-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-FO-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-FO-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FO-H-P') . ''
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsFM-FO-rows') . ''
                . ' OxiAddonsFM-FO-G-BGC |' . sanitize_text_field($_POST['OxiAddonsFM-FO-G-BGC']) . '|'
                . ' OxiAddonsFM-FO-G-Tab |' . sanitize_text_field($_POST['OxiAddonsFM-FO-G-Tab']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFM-FO-BI-B') . ''
                . ' OxiAddonsFM-FO-BI-BC |' . sanitize_hex_color($_POST['OxiAddonsFM-FO-BI-BC']) . '|'
                . ' ||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FO-BI-M') . ''
                
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-FO-R-FS') . ''
                . ' OxiAddonsFM-FO-R-C |' . sanitize_hex_color($_POST['OxiAddonsFM-FO-R-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FO-R-P') . ''
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-FO-IN-FS') . ''
                . ' OxiAddonsFM-FO-IN-C |' . sanitize_hex_color($_POST['OxiAddonsFM-FO-IN-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-FO-IN2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FO-IN-P') . ''
                . ' OxiAddonsFM-FO-R-RP |' . sanitize_text_field($_POST['OxiAddonsFM-FO-R-RP']) . '|'
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
        $data = ' ||#||OxiAddonsFM-FO-H ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-FO-H']) . '||#|| '
                . ' OxiAddonsFM-FO-I ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFM-FO-I']) . '||#|| '
                . ' OxiAddonsFM-FO-D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-FO-D']) . '||#|| '
                . ' OxiAddonsFM-FO-B-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFM-FO-B-URL']) . '||#|| '
                . ' oxiAddonsFM-IN ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxiAddonsFM-IN']) . '||#|| '
                . ' OxiAddonsFM-FO-R ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-FO-R']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsFM-FO-rows', $styledata, 203, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number('OxiAddonsFM-FO-G-MW', $styledata[149], '1', 'Max Width', 'Set your Box Max Width', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-row', 'max-width');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FO-G-BGC', $styledata[207], 'rgba', 'Background', 'Set Your Body Color', 'false', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-row', 'background');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsFM-FO-G-Tab', $styledata[209], 'Same Tab', '', 'New Bab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FO-G-BR', 7, $styledata, '1', 'Border Radius', 'Set yor body Border Radius', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FO-G-P', 23, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FO-G-M', 39, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsFM-FO-B-Shadow', 55, $styledata, 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsFM-FO-animation', 61, $styledata, 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-row');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Image
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number('OxiAddonsFM-FO-I-HR', $styledata[173], 1, 'Width', 'Set your Height bsed on Width ratio, EX. 100 means same size as width', 'false', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image img', 'padding-bottom');
                                        echo oxi_addons_adm_help_border('OxiAddonsFM-FO-BI-B', $styledata[211], $styledata[212], 'Border', 'Set your Image Border Size and Type', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image img', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FO-BI-BC', $styledata[215], '', 'Border Color', 'Set Your Image  Border Color', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image img', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FO-DM-BR', 85, $styledata, '1', 'Border Radius', 'Set your Image Border Radius', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image img', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FO-BI-M', 219, $styledata, '1', 'Margin', 'Set your Image Border Radius', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-image img', 'border-radius');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-FO-H-FS', $styledata[175], $styledata[176], $styledata[177], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FO-H-C', $styledata[179], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-FO-H', 181, $styledata, 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FO-H-P', 187, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Price
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-FO-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Price Font Size', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-price', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FO-D-C', $styledata[121], '', 'Color', 'Set Your Price Color', 'false', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-price', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-FO-D', 123, $styledata, 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-price');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FO-D-P', 129, $styledata, '1', 'Padding', 'Set your Price Padding', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-price', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Rating
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                       
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-FO-R-FS', $styledata[235], $styledata[236], $styledata[237], 1, 'Font Size', 'Set Your Rating Font Size', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-category', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FO-R-C', $styledata[239], '', 'Color', 'Set Your Rating Color', 'false', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-category', 'color');
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsFM-FO-R-RP', $styledata[285], 'Rating Position', 'Set Your Rating Position', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-category', 'text-align');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FO-R-P', 241, $styledata, '1', 'Padding', 'Set your Rating Padding', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-category', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Info
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-FO-IN-FS', $styledata[257], $styledata[258], $styledata[259], 1, 'Font Size', 'Set Your Info Font Size', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-info', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FO-IN-C', $styledata[261], '', 'Color', 'Set Your Info Color', 'false', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-info', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-FO-IN2', 263, $styledata, 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-info');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FO-IN-P', 269, $styledata, '1', 'Padding', 'Set your Info Padding', 'true', '.oxi-addonsFM-wrapper-FO-' . $oxiid . ' .oxi-addonsFM-FO-info', 'padding');
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
                echo oxi_addons_list_rearrange('Food Menu Rearrange', $listdata, 4, 'image');
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
                    <?php echo oxi_food_menu_style_4_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-FO-H', $listitemdata[2], 'Food Name', 'Set Your Food Name, Supported native Language', 'false');
                    echo oxi_addons_adm_help_model_image_upload('OxiAddonsFM-FO-I', $listitemdata[4], 'Image', 'Set Your Food Menu Image', 'false');
                    echo oxi_addons_adm_help_number('OxiAddonsFM-FO-R', $listitemdata[12], '.1', 'Rating', 'Set Your Food Menu Rating', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-FO-D', $listitemdata[6], 'Price', 'Set Your Food Menu Price', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-FO-B-URL', $listitemdata[8], 'Link', 'Set Your Food Menu Link', 'false');
                    echo oxi_addons_adm_help_form_textarea('oxiAddonsFM-IN', $listitemdata[10], 'Info', 'Set Your Food Menu Info', 'false')
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
