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
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FV-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FV-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FV-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFM-FV-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFM-FV-animation') . ''
                . ' ||'
                . ' ||||'
                . ' ||||'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFM-FV-DM-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFM-FV-DM-B') . ''
                . ' OxiAddonsFM-FV-DM-BC |' . sanitize_hex_color($_POST['OxiAddonsFM-FV-DM-BC']) . '|'
                . ' ||||||||||||||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FV-DM-M') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-FV-D-FS') . ''
                . ' OxiAddonsFM-FV-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-FV-D-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-FV-D') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FV-D-P') . ''
                . ' ||||'
                . ' OxiAddonsFM-FV-G-MW |' . sanitize_text_field($_POST['OxiAddonsFM-FV-G-MW']) . '|'
                . ' ||||||'
                . ' ||||||||||||||||'
                . ' OxiAddonsFM-FV-I-HR |' . sanitize_text_field($_POST['OxiAddonsFM-FV-I-HR']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-FV-H-FS') . ''
                . ' OxiAddonsFM-FV-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-FV-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-FV-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FV-H-P') . ''
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsFM-FV-rows') . ''
                . ' OxiAddonsFM-FV-G-BGC |' . sanitize_text_field($_POST['OxiAddonsFM-FV-G-BGC']) . '|'
                . ' OxiAddonsFM-FV-G-Tab |' . sanitize_text_field($_POST['OxiAddonsFM-FV-G-Tab']) . '|'
                . ' ||||'
                . ' ||'
                . ' ||'
                . ' ||||||||||||||||'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-FV-R-FS') . ''
                . ' OxiAddonsFM-FV-R-C |' . sanitize_hex_color($_POST['OxiAddonsFM-FV-R-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FV-R-P') . ''
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-FV-IN-FS') . ''
                . ' OxiAddonsFM-FV-IN-C |' . sanitize_hex_color($_POST['OxiAddonsFM-FV-IN-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-FV-IN2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-FV-IN-P') . ''
                . ' OxiAddonsFM-FV-RA-RP |' . sanitize_text_field($_POST['OxiAddonsFM-FV-RA-RP']) . '|'
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
        $data = ' ||#||OxiAddonsFM-FV-H ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-FV-H']) . '||#|| '
                . ' OxiAddonsFM-FV-I ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFM-FV-I']) . '||#|| '
                . ' OxiAddonsFM-FV-D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-FV-D']) . '||#|| '
                . ' OxiAddonsFM-FV-B-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFM-FV-B-URL']) . '||#|| '
                . ' OxiAddonsFM-FV-IN ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-FV-IN']) . '||#|| '
                . ' OxiAddonsFM-FV-R ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-FV-R']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsFM-FV-rows', $styledata, 203, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number('OxiAddonsFM-FV-G-MW', $styledata[149], '1', 'Max Width', 'Set your Box Max Width', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-row', 'max-width');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FV-G-BGC', $styledata[207], 'rgba', 'Background', 'Set Your Body Color', 'false', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-row', 'background');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsFM-FV-G-Tab', $styledata[209], 'Same Tab', '', 'New Tab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo oxi_addons_adm_help_border('OxiAddonsFM-FV-DM-B', $styledata[79], $styledata[80], 'Border', 'Set your Body Border Size and Type', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-row', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FV-DM-BC', $styledata[83], '', 'Border Color', 'Set Your Body  Border Color', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-row', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FV-G-BR', 7, $styledata, '1', 'Border Radius', 'Set yor body Border Radius', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FV-G-P', 23, $styledata, '1', 'Padding', 'Set Your body Padding', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FV-G-M', 39, $styledata, '1', 'Margin', 'Set Your body Margin', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Content Body Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsFM-FV-DM-BG', $styledata, 75, 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-content-body', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FV-DM-M', 101, $styledata, '1', 'Padding', 'Set your Content Body Margin', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-content-body', 'Padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsFM-FV-B-Shadow', 55, $styledata, 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsFM-FV-animation', 61, $styledata, 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-row');
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
                                        echo oxi_addons_adm_help_number('OxiAddonsFM-FV-I-HR', $styledata[173], 1, 'Height Ratio', 'Set your Height bsed on Width ratio, EX. 100 means same size as width', 'false', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-image:after', 'padding-bottom');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-FV-H-FS', $styledata[175], $styledata[176], $styledata[177], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FV-H-C', $styledata[179], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-FV-H', 181, $styledata, 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FV-H-P', 187, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Price
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-FV-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Price Font Size', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-price', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FV-D-C', $styledata[121], '', 'Color', 'Set Your Price Color', 'false', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-price', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-FV-D', 123, $styledata, 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-price');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FV-D-P', 129, $styledata, '1', 'Padding', 'Set your Price Padding', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-price', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Rating
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-FV-R-FS', $styledata[235], $styledata[236], $styledata[237], 1, 'Font Size', 'Set Your Rating Font Size', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-rating', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FV-R-C', $styledata[239], '', 'Color', 'Set Your Rating Color', 'false', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-rating', 'color');
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsFM-FV-RA-RP', $styledata[285], 'Rating Position', 'Set Your Rating Position', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-rating', 'text-align');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FV-R-P', 241, $styledata, '1', 'Padding', 'Set your Rating Padding', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-rating', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Info
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-FV-IN-FS', $styledata[257], $styledata[258], $styledata[259], 1, 'Font Size', 'Set Your Info Font Size', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-info', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-FV-IN-C', $styledata[261], '', 'Color', 'Set Your Info Color', 'false', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-info', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-FV-IN2', 263, $styledata, 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-info');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-FV-IN-P', 269, $styledata, '1', 'Padding', 'Set your Info Padding', 'true', '.oxi-addonsFM-FV-wrapper-' . $oxiid . ' .oxi-addonsFM-FV-info', 'padding');
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
                    <?php echo oxi_food_menu_style_5_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-FV-H', $listitemdata[2], 'Food Name', 'Set Your Food Name, Supported native Language', 'false');
                    echo oxi_addons_adm_help_model_image_upload('OxiAddonsFM-FV-I', $listitemdata[4], 'Banner Image', 'Set Your Food Menu Image', 'false');
                    echo oxi_addons_adm_help_number('OxiAddonsFM-FV-R', $listitemdata[12], '.1', 'Rating', 'Set Your Food Menu Rating', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-FV-D', $listitemdata[6], 'Price', 'Set Your Food Menu Price', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-FV-B-URL', $listitemdata[8], 'Link', 'Set Your Food Menu Link', 'false');
                    echo oxi_addons_adm_help_form_textarea('OxiAddonsFM-FV-IN', $listitemdata[10], 'Info', 'Set Your Food Menu Info', 'false')
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
