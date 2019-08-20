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
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-7-G-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-7-G-SZ') . ''
                . ' OxiAddonsFI-7-G-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-7-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-7-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-7-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-7-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-7-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFI-7-Animation') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-7-I-BG') . ''
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-7-FT-FS') . ''
                . ' OxiAddonsFI-7-FT-C |' . sanitize_hex_color($_POST['OxiAddonsFI-7-FT-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-7-FT-FT2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-7-FT-P') . ''
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-7-FU-FS') . ''
                . ' OxiAddonsFI-7-FU-C|' . sanitize_hex_color($_POST['OxiAddonsFI-7-FU-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-7-FU-FU2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-7-FU-P') . ''
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-7-I-FS') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-7-I-WH') . ''
                . ' OxiAddonsFI-7-I-C |' . sanitize_hex_color($_POST['OxiAddonsFI-7-I-C']) . '|'
                . ' OxiAddonsFI-7-I-HC |' . sanitize_hex_color($_POST['OxiAddonsFI-7-I-HC']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-7-I-SZ') . ''
                . ' OxiAddonsFI-7-I-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-7-I-BC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-7-I-Shadow') . ''
                . ' OxiAddonsFI-7-I-Tab |' . sanitize_text_field($_POST['OxiAddonsFI-7-I-Tab']) . '|'
                . ' OxiAddonsFI-7-I-TA |' . sanitize_text_field($_POST['OxiAddonsFI-7-I-TA']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-7-I-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-7-I-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-7-I-M') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-7-I-HBG') . ''
                . ' OxiAddonsFI-7-I-HBC |' . sanitize_hex_color($_POST['OxiAddonsFI-7-I-HBC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-7-IH-Shadow') . ''
     
                . '||#||'
                . ' OxiAddonsFI-7-FT ||#||' . sanitize_text_field($_POST['OxiAddonsFI-7-FT']) . '||#|| '
                . ' OxiAddonsFI-7-FU ||#||' . sanitize_text_field($_POST['OxiAddonsFI-7-FU']) . '||#|| '
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
        $data = ' ||#||OxiAddonsFI-7-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsFI-7-I']) . '||#|| '
                . ' OxiAddonsFI-7-I-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFI-7-I-URL']) . '||#|| ';
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
        echo '<script type="text/javascript"> jQuery(document).ready(function () {setTimeout(function() { jQuery("#oxi-addons-list-data-modal").modal("show")  }, 700); });</script>';
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
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-7-G-BG', $styledata, 3, 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-row', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-7-G-SZ', $styledata[7], $styledata[8], 'Border', 'Set your body Border Size and Type', 'false', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-row');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-7-G-BC', $styledata[11], '', 'Border Color', 'Set Your body  Border Color', 'false', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-row', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-7-G-BR', 13, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-row', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-7-G-P', 29, $styledata, '1', 'Padding', 'Set your body Margin', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-row', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-7-G-M', 45, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-FI-7-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-7-B-Shadow', 61, $styledata, 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-row', 'box-shadow');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsFI-7-Animation', 67, $styledata, 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-row');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Footer Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-7-FT', $stylefiles[2], 'Footer Text', 'Set Your Footer Text', 'false', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-header-text');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-7-FT-FS', $styledata[75], $styledata[76], $styledata[77], '1', 'Font Size', 'Set Your Footer Text Font Size', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-header-text', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-7-FT-C', $styledata[79], '', 'Text Color', 'Set Your Footer Text Color', 'false', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-header-text', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-7-FT-FT2', 81, $styledata, 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-header-text');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-7-FT-P', 87, $styledata, '1', 'Padding', 'Set your Footer Text Padding', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-header-text', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Follow Us Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-7-FU', $stylefiles[4], 'Footer Text', 'Set Your Follow Us Text', 'false', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-us');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-7-FU-FS', $styledata[103], $styledata[104], $styledata[105], '1', 'Font Size', 'Set Your Follow Us Text Font Size', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-us', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-7-FU-C', $styledata[107], '', 'Text Color', 'Set Your Follow Us Text Color', 'false', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-us', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-7-FU-FU2', 109, $styledata, 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-us');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-7-FU-P', 115, $styledata, '1', 'Padding', 'Set your Follow Us Text Padding', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-us', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Social Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-7-I-BG', $styledata, 71, 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-7-I-FS', $styledata[131], $styledata[132], $styledata[133], '1', 'Icon Size', 'Set Your Social Icon', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons', 'font-size');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-7-I-WH', $styledata[135], $styledata[136], $styledata[137], '1', 'Width Height', 'Set Your Social Icon Width Height', 'true', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-7-I-C', $styledata[139], '', 'Icon Color', 'Set Your Icon Font Color', 'false', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons', 'color');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-7-I-SZ', $styledata[143], $styledata[144], 'Border', 'Set your Social Icon Border Size and Type', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-7-I-BC', $styledata[147], '', 'Border Color', 'Set Your Social Icon  Border Color', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons', 'border-color');
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-7-I-Shadow', 149, $styledata, 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons', 'box-shadow');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsFI-7-I-Tab', $styledata[155], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsFI-7-I-TA', $styledata[157], 'Icon Position', 'Set your Social Icon Position', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-7-I-BR', 159, $styledata, '1', 'Border Radius', 'Set your Social Icon Border Radius', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-7-I-P', 175, $styledata, '1', 'Padding', 'Set Your Social Icon Padding', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-7-I-M', 191, $styledata, '1', 'Margin', 'Set Your Social Icon Margin', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons', 'margin');
                                            $NOJS = array(
                                                array('OxiAddonsFI-7-I-WH', 'Width Height')
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
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-7-I-HBG', $styledata, 207, 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-7-I-HC', $styledata[141], '', 'Icon Hover Color', 'Set Your Social Icon Font Color', 'false', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-7-I-HBC', $styledata[211], '', 'Border Hover Color', 'Set Your Social Icon  Border Color', 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons:hover', 'border-color');
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-7-IH-Shadow', 213, $styledata, 'true', '.oxi-addons-FI-7-' . $oxiid . ' .oxi-addons-FI-7-follow-icon .oxi-icons:hover', 'box-shadow');
                                            
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
                    <?php echo oxi_footer_info_style_7_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsFI-7-I', $listitemdata[2], 'Icon Class', 'Set Your Social Icon Class', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFI-7-I-URL', $listitemdata[4], 'URL', 'Set Your Social Icon URL', 'false');
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