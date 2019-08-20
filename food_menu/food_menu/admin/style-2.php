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
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TW-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TW-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TW-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFM-TW-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFM-TW-animation') . ''
                . ' ||'
                . ' ||||'
                . ' ||||'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFM-TW-DM-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFM-TW-DM-B') . ''
                . ' OxiAddonsFM-TW-DM-BC |' . sanitize_hex_color($_POST['OxiAddonsFM-TW-DM-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TW-DM-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TW-DM-M') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-TW-D-FS') . ''
                . ' OxiAddonsFM-TW-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-TW-D-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-TW-D') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TW-D-P') . ''
                . ' ||||'
                . ' OxiAddonsFM-TW-G-MW |' . sanitize_text_field($_POST['OxiAddonsFM-TW-G-MW']) . '|'
                . ' ||||||'
                . ' ||||||||||||||||'
                . ' OxiAddonsFM-TW-I-HR |' . sanitize_text_field($_POST['OxiAddonsFM-TW-I-HR']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-TW-H-FS') . ''
                . ' OxiAddonsFM-TW-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-TW-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-TW-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TW-H-P') . ''
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsFM-TW-rows') . ''
                . ' OxiAddonsFM-TW-G-BGC |' . sanitize_text_field($_POST['OxiAddonsFM-TW-G-BGC']) . '|'
                . ' OxiAddonsFM-TW-G-Tab |' . sanitize_text_field($_POST['OxiAddonsFM-TW-G-Tab']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFM-TW-BI-B') . ''
                . ' OxiAddonsFM-TW-BI-BC |' . sanitize_hex_color($_POST['OxiAddonsFM-TW-BI-BC']) . '|'
                . ' OxiAddonsFM-TW-BI-IP |' . sanitize_text_field($_POST['OxiAddonsFM-TW-BI-IP']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TW-BI-M') . ''
                
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-TW-R-FS') . ''
                . ' OxiAddonsFM-TW-R-C |' . sanitize_hex_color($_POST['OxiAddonsFM-TW-R-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TW-R-P') . ''
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-TW-IN-FS') . ''
                . ' OxiAddonsFM-TW-IN-C |' . sanitize_hex_color($_POST['OxiAddonsFM-TW-IN-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-TW-IN2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-TW-IN-P') . ''
                . ' OxiAddonsFM-TW-RA-RP |' . sanitize_text_field($_POST['OxiAddonsFM-TW-RA-RP']) . '|'
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
        $data = ' ||#||OxiAddonsFM-TW-H ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-TW-H']) . '||#|| '
                . ' OxiAddonsFM-TW-I ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFM-TW-I']) . '||#|| '
                . ' OxiAddonsFM-TW-D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-TW-D']) . '||#|| '
                . ' OxiAddonsFM-TW-B-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFM-TW-B-URL']) . '||#|| '
                . ' oxiAddonsFM-IN ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxiAddonsFM-IN']) . '||#|| '
                . ' OxiAddonsFM-TW-R ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-TW-R']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsFM-TW-rows', $styledata, 203, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number('OxiAddonsFM-TW-G-MW', $styledata[149], '', 'Max Width', 'Set your Box Max Width', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-row', 'max-width');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TW-G-BGC', $styledata[207], 'rgba', 'Background', 'Set Your Body Color', 'false', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-row', 'background');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsFM-TW-G-Tab', $styledata[209], 'Same Tab', '', 'New Bab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TW-G-BR', 7, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TW-G-P', 23, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TW-G-M', 39, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Content Body Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsFM-TW-DM-BG', $styledata, 75, 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-content-body', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsFM-TW-DM-B', $styledata[79], $styledata[80], 'Border', 'Set your Content Body Border Size and Type', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-content-body', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TW-DM-BC', $styledata[83], '', 'Border Color', 'Set Your Content Body  Border Color', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-content-body', 'border-color');
                                         echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TW-DM-M', 101, $styledata, '1', 'Padding', 'Set your Content Body Margin', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-content-body', 'Padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsFM-TW-B-Shadow', 55, $styledata, 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsFM-TW-animation', 61, $styledata, 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-row');
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
                                        echo oxi_addons_adm_help_number('OxiAddonsFM-TW-I-HR', $styledata[173], 1, 'Height Ratio', 'Set your Height based on Width ratio, EX. 100 means same size as width', 'false', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-image img', 'padding-bottom');
                                        echo oxi_addons_adm_help_border('OxiAddonsFM-TW-BI-B', $styledata[211], $styledata[212], 'Border', 'Set your Image Border Size and Type', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-image img', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TW-BI-BC', $styledata[215], '', 'Border Color', 'Set Your Image  Border Color', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-image img', 'border-color');
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsFM-TW-BI-IP', $styledata[217], 'Image Position', 'Set Your Image Position', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-image', 'text-align');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TW-DM-BR', 85, $styledata, '1', 'Border Radius', 'Set your Image Border Radius', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-image img', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TW-BI-M', 219, $styledata, '1', 'Margin', 'Set your Image Border Radius', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-image img', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-TW-H-FS', $styledata[175], $styledata[176], $styledata[177], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TW-H-C', $styledata[179], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-TW-H', 181, $styledata, 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TW-H-P', 187, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Price
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-TW-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Price Font Size', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-price', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TW-D-C', $styledata[121], '', 'Color', 'Set Your Price Color', 'false', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-price', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-TW-D', 123, $styledata, 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-price');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TW-D-P', 129, $styledata, '1', 'Padding', 'Set your Price Padding', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . ' .oxi-addonsFM-ON-price', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Rating
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-TW-R-FS', $styledata[235], $styledata[236], $styledata[237], 1, 'Font Size', 'Set Your Rating Font Size', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-rating', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TW-R-C', $styledata[239], '', 'Color', 'Set Your Rating Color', 'false', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-rating', 'color');
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsFM-TW-RA-RP', $styledata[285], 'Rating Position', 'Set Your Rating Position', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-rating', 'text-align');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TW-R-P', 241, $styledata, '1', 'Padding', 'Set your Rating Padding', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-rating', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Info
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-TW-IN-FS', $styledata[257], $styledata[258], $styledata[259], 1, 'Font Size', 'Set Your Info Font Size', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-info', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-TW-IN-C', $styledata[261], '', 'Color', 'Set Your Info Color', 'false', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-info', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-TW-IN2', 263, $styledata, 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-info');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-TW-IN-P', 269, $styledata, '1', 'Padding', 'Set your Info Padding', 'true', '.oxi-addonsFM-ON-wrapper-' . $oxiid . '  .oxi-addonsFM-ON-info', 'padding');
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
                echo oxi_addons_list_rearrange('Food Rearrange', $listdata, 4, 'image');
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
                    <?php echo oxi_food_menu_style_2_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-TW-H', $listitemdata[2], 'Food Name', 'Set Your Food Name, Supported native Language', 'false');
                    echo oxi_addons_adm_help_model_image_upload('OxiAddonsFM-TW-I', $listitemdata[4], 'Banner Image', 'Set Your Food Menu Image', 'false');
                    echo oxi_addons_adm_help_number('OxiAddonsFM-TW-R', $listitemdata[12], '.1', 'Rating', 'Set Your Food Menu Rating', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-TW-D', $listitemdata[6], 'Price', 'Set Your Food Menu Price', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-TW-B-URL', $listitemdata[8], 'Link', 'Set Your Food Menu Link', 'false');
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
