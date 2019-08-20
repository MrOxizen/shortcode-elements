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
    if (!wp_verify_nonce($nonce, 'oxi-addons-footer-info-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-6-G-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-6-G-SZ') . ''
                . ' OxiAddonsFI-6-G-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-6-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-6-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-6-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-6-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-6-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFI-6-Animation') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-6-I-BG') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-6-I-FS') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-6-I-WH') . ''
                . ' OxiAddonsFI-6-I-C |' . sanitize_hex_color($_POST['OxiAddonsFI-6-I-C']) . '|'
                . ' OxiAddonsFI-6-I-HC |' . sanitize_hex_color($_POST['OxiAddonsFI-6-I-HC']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-6-I-SZ') . ''
                . ' OxiAddonsFI-6-I-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-6-I-BC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-6-I-Shadow') . ''
                . ' OxiAddonsFI-6-I-Tab |' . sanitize_text_field($_POST['OxiAddonsFI-6-I-Tab']) . '|'
                . ' OxiAddonsFI-6-I-TA |' . sanitize_text_field($_POST['OxiAddonsFI-6-I-TA']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-6-I-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-6-I-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-6-I-M') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-6-FT-FS') . ''
                . ' OxiAddonsFI-6-FT-C |' . sanitize_hex_color($_POST['OxiAddonsFI-6-FT-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-6-FT-FT2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-6-FT-P') . ''
                
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-6-I-HBG') . ''
                . ' OxiAddonsFI-6-I-HBC |' . sanitize_hex_color($_POST['OxiAddonsFI-6-I-HBC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-6-IH-Shadow') . ''
     
                . '||#||'
                . ' OxiAddonsFI-6-FT ||#||' . sanitize_text_field($_POST['OxiAddonsFI-6-FT']) . '||#|| '
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
        $data = ' ||#||OxiAddonsFI-6-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsFI-6-I']) . '||#|| '
                . ' OxiAddonsFI-6-I-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFI-6-I-URL']) . '||#|| ';
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
        echo '<script type="text/javascript"> jQuery(document).ready(function () {setTimeout(function() { jQuery("#oxi-addons-list-data-modal").modal("show")  }, 600); });</script>';
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
                        <div class="oxi-addons-tabs-wrapper"> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-6-G-BG', $styledata, 3, 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-row', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-6-G-SZ', $styledata[7], $styledata[8], 'Border', 'Set your body Border Size and Type', 'false', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-row');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-6-G-BC', $styledata[11], '', 'Border Color', 'Set Your body  Border Color', 'false', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-row', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-6-G-BR', 13, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-row', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-6-G-P', 29, $styledata, '1', 'Padding', 'Set your body Margin', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-row', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-6-G-M', 45, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-FI-6-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-6-B-Shadow', 61, $styledata, 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-row', 'box-shadow');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsFI-6-Animation', 67, $styledata, 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-row');
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-6-I-BG', $styledata, 71, 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-6-I-FS', $styledata[75], $styledata[76], $styledata[77], '1', 'Icon Size', 'Set Your Icon', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons', 'font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-6-I-WH', $styledata[79], $styledata[80], $styledata[81], '1', 'Width Height', 'Set Your Icon Width Height', 'true', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-6-I-C', $styledata[83], '', 'Icon Color', 'Set Your Icon Color', 'false', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons', 'color');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-6-I-SZ', $styledata[87], $styledata[88], 'Border', 'Set your Icon Border Size and Type', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-6-I-BC', $styledata[91], '', 'Border Color', 'Set Your Icon  Border Color', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons', 'border-color');
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-6-I-Shadow', 93, $styledata, 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons', 'box-shadow');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsFI-6-I-Tab', $styledata[99], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsFI-6-I-TA', $styledata[101], 'Icon Position', 'Set your Icon Position', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-6-I-BR', 103, $styledata, '1', 'Border Radius', 'Set your Icon Border Radius', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-6-I-P', 119, $styledata, '1', 'Padding', 'Set Your Icon Padding', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-6-I-M', 135, $styledata, '1', 'Margin', 'Set Your Icon Margin', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons', 'margin');
                                            $NOJS = array(
                                                array('OxiAddonsFI-6-I-WH', 'Width Height')
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon Hover
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-6-I-HBG', $styledata, 179, 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-6-I-HC', $styledata[85], '', 'Icon Hover Color', 'Set Your Icon Hover Color', 'false', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-6-I-HBC', $styledata[183], '', 'Border Hover Color', 'Set Your Icon Border Hover Color', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons:hover', 'border-color');
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-6-IH-Shadow', 185, $styledata, 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-social-icon .oxi-icons:hover', 'box-shadow');
                                            
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Footer Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-6-FT', $stylefiles[2], 'Footer Text', 'Set Your Footer Text', 'false','.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-footer-text');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-6-FT-FS', $styledata[151], $styledata[152], $styledata[153], '1', 'Font Size', 'Set Your Footer Text Font Size', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-footer-text', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-6-FT-C', $styledata[155], '', 'Text Color', 'Set Your Footer Text Color', 'false', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-footer-text', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-6-FT-FT2', 157, $styledata, 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-content');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-6-FT-P', 163, $styledata, '1', 'Padding', 'Set your Footer Text Padding', 'true', '.oxi-addons-FI-6-' . $oxiid . ' .oxi-addons-FI-6-footer-text', 'padding');
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
                                <?php wp_nonce_field("oxi-addons-footer-info-nonce") ?>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open('Add new Social Icons', 'Create new');
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Icon Rearrange', $listdata, 2, 'icon');
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
                    <?php echo oxi_footer_info_style_6_shortcode($style, $listdata, 'admin'); ?>
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
                    <h4 class="modal-title">Social Icon</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('OxiAddonsFI-6-I', $listitemdata[2], 'Icon Class', 'Set Your Social Icon Class', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFI-6-I-URL', $listitemdata[4], 'URL', 'Set Your Social Icon URL', 'false');
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