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
                . '||||'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-3-G-SZ') . ''
                . ' OxiAddonsFI-3-G-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-3-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-3-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-3-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-3-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFI-3-Animation') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-3-G-BG') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-3-G-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-3-C-FS') . ''
                . ' OxiAddonsFI-3-C-C |' . sanitize_hex_color($_POST['OxiAddonsFI-3-C-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-3-C-C2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-3-C-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-3-A-FS') . ''
                . ' OxiAddonsFI-3-A-C |' . sanitize_hex_color($_POST['OxiAddonsFI-3-A-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-3-A-A2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-3-A-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-3-P-FS') . ''
                . ' OxiAddonsFI-3-P-C |' . sanitize_hex_color($_POST['OxiAddonsFI-3-P-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-3-P-P2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-3-P-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-3-E-FS') . ''
                . ' OxiAddonsFI-3-E-C |' . sanitize_hex_color($_POST['OxiAddonsFI-3-E-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-3-E-E2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-3-E-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-3-I-FS') . ''
                . ' OxiAddonsFI-3-I-C |' . sanitize_hex_color($_POST['OxiAddonsFI-3-I-C']) . '|'
                . ' OxiAddonsFI-3-I-HC |' . sanitize_hex_color($_POST['OxiAddonsFI-3-I-HC']) . '|'
                . ' OxiAddonsFI-3-I-Tab |' . sanitize_text_field($_POST['OxiAddonsFI-3-I-Tab']) . '|'
                . ' OxiAddonsFI-3-I-TA |' . sanitize_text_field($_POST['OxiAddonsFI-3-I-TA']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-3-I-P') . ''
                . '||#||'
                . ' OxiAddonsFI-3-C ||#||' . sanitize_text_field($_POST['OxiAddonsFI-3-C']) . '||#|| '
                . ' OxiAddonsFI-3-A ||#||' . sanitize_text_field($_POST['OxiAddonsFI-3-A']) . '||#|| '
                . ' OxiAddonsFI-3-P ||#||' . sanitize_text_field($_POST['OxiAddonsFI-3-P']) . '||#|| '
                . ' OxiAddonsFI-3-E ||#||' . sanitize_text_field($_POST['OxiAddonsFI-3-E']) . '||#|| '
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
        $data = ' ||#||OxiAddonsFI-3-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsFI-3-I']) . '||#|| '
                . ' OxiAddonsFI-3-I-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFI-3-I-URL']) . '||#|| ';
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
                        <div class="oxi-addons-tabs-wrapper"> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-3-G-BG', $styledata, 55, 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_row', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-3-G-SZ', $styledata[7], $styledata[8], 'Border', 'Set your body Border Size and Type', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_row');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-3-G-BC', $styledata[11], '', 'Border Color', 'Set Your body  Border Color', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_row', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-3-G-BR', 13, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_row', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-3-G-P', 59, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_row', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-3-G-M', 29, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi_addons_FI_3_' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-3-B-Shadow', 45, $styledata, 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_row', 'box-shadow');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsFI-3-Animation', 51, $styledata, 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_row');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Contact
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-3-C', $stylefiles[2], 'Contact Text', 'Set Your Contact Text', 'false', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_contact');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-3-C-FS', $styledata[75], $styledata[76], $styledata[77], '1', 'Font Size', 'Set Your Contact font Size', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_contact', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-3-C-C', $styledata[79], '', 'Text Color', 'Set Your Contact Text Color', 'false', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_contact', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-3-C-C2', 81, $styledata, 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_contact');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-3-C-P', 87, $styledata, '1', 'Padding', 'Set your Contact Text Padding', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_contact', 'padding');
                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Address
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-3-A', $stylefiles[4], 'Address Text', 'Set Your Address Text', 'false', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_address');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-3-A-FS', $styledata[103], $styledata[104], $styledata[105], '1', 'Font Size', 'Set Your Address font Size', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_address', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-3-A-C', $styledata[107], '', 'Text Color', 'Set Your Address Text Color', 'false', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_address', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-3-A-A2', 109, $styledata, 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_address');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-3-A-P', 115, $styledata, '1', 'Padding', 'Set your Address Text Padding', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_address', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Phone Number
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-3-P', $stylefiles[6], 'Phone Number', 'Set Your Phone Number or Other Text', 'false', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_phone');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-3-P-FS', $styledata[131], $styledata[132], $styledata[133], '1', 'Font Size', 'Set Your Phone Number font Size', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_phone', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-3-P-C', $styledata[135], '', 'Text Color', 'Set Your Phone Number Color', 'false', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_phone', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-3-P-P2', 137, $styledata, 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_phone');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-3-P-P', 143, $styledata, '1', 'Padding', 'Set your Phone Number Padding', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_phone', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Email Address
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-3-E', $stylefiles[8], 'Email Address', 'Set Your Email Address', 'false', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_email');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-3-E-FS', $styledata[159], $styledata[160], $styledata[161], '1', 'Font Size', 'Set Your Email Address font Size', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_email', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-3-E-C', $styledata[163], '', 'Text Color', 'Set Your Email Address Color', 'false', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_email', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-3-E-E2', 165, $styledata, 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_email');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-3-E-P', 171, $styledata, '1', 'Padding', 'Set your Email Address Padding', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_email', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-3-I-FS', $styledata[187], $styledata[188], $styledata[189], '1', 'Icon Size', 'Set Your Location Icon', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_icon-area .oxi-icons', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-3-I-C', $styledata[191], '', 'Icon Color', 'Set Your Icon Font Color', 'false', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_icon-area .oxi-icons', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-3-I-HC', $styledata[193], '', 'Hover Color', 'Set Your Icon Font Color', 'false', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_icon-area .oxi-icons:hover', 'color');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsFI-3-I-Tab', $styledata[195], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsFI-3-I-TA', $styledata[197], 'Icon Position', 'Set your Icon Position', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_icon-area', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-3-I-P', 199, $styledata, '1', 'Padding', 'Set Your Icon Padding', 'true', '.oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_icon-area .oxi-icons', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="oxi-addons-setting-save">
                                <?php echo oxiaddonssettingsavedtmmode(); ?>
                                <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                                <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                                <input type="submit" class="btn btn-success" name="data-submit" value="Save">
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
                    <?php echo oxi_footer_info_style_3_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsFI-3-I', $listitemdata[2], 'Icon Class', 'Set Your Social Icon Class', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFI-3-I-URL', $listitemdata[4], 'URL', 'Set Your Social Icon URL', 'false');
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