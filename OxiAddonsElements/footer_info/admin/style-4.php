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
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-4-G-SZ') . ''
                . ' OxiAddonsFI-4-G-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-4-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-4-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-4-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-4-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFI-4-Animation') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-4-B1-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-4-B1-SZ') . ''
                . ' OxiAddonsFI-4-B1-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-4-B1-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-4-L-FS') . ''
                . ' OxiAddonsFI-4-L-C |' . sanitize_hex_color($_POST['OxiAddonsFI-4-L-C']) . '|'
                . ' OxiAddonsFI-4-L-Tab |' . sanitize_text_field($_POST['OxiAddonsFI-4-L-Tab']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-4-L-BS') . ''
                . ' OxiAddonsFI-4-L-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-4-L-BC']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-3-E-E2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-4-L-P') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-4-B2-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-4-B2-SZ') . ''
                . ' OxiAddonsFI-4-B2-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-4-B2-BC']) . '|'               
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-4-A-FS') . ''
                . ' OxiAddonsFI-4-A-C |' . sanitize_hex_color($_POST['OxiAddonsFI-4-A-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-4-A-A2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-4-A-P') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-4-B3-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-4-B3-SZ') . ''
                . ' OxiAddonsFI-4-B3-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-4-B3-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-4-I-FS') . ''
                . ' OxiAddonsFI-4-I-C |' . sanitize_hex_color($_POST['OxiAddonsFI-4-I-C']) . '|'
                . ' OxiAddonsFI-4-I-HC |' . sanitize_hex_color($_POST['OxiAddonsFI-4-I-HC']) . '|'
                . ' OxiAddonsFI-4-I-Tab |' . sanitize_text_field($_POST['OxiAddonsFI-4-I-Tab']) . '|'
                . ' OxiAddonsFI-4-I-TA |' . sanitize_text_field($_POST['OxiAddonsFI-4-I-TA']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-4-I-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-4-G-P') . ''
                . '||#||'
                . ' OxiAddonsFI-4-L ||#||' . sanitize_text_field($_POST['OxiAddonsFI-4-L']) . '||#|| '
                . ' OxiAddonsFI-4-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFI-4-URL']) . '||#|| '
                . ' OxiAddonsFI-4-A ||#||' . sanitize_text_field($_POST['OxiAddonsFI-4-A']) . '||#|| '
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
        $data = ' ||#||OxiAddonsFI-4-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsFI-4-I']) . '||#|| '
                . ' OxiAddonsFI-4-I-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFI-4-I-URL']) . '||#|| ';
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
                        <div class="oxi-addons-tabs-wrapper"> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-4-G-SZ', $styledata[3], $styledata[4], 'Border', 'Set your body Border Size and Type', 'false', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-row');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-4-G-BC', $styledata[7], '', 'Border Color', 'Set Your body  Border Color', 'false', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-row', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-4-G-BR', 9, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-row', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-4-G-P', 173, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-1,.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-2, .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-3', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-4-G-M', 25, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-FI-4-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-4-B-Shadow', 41, $styledata, 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-row', 'box-shadow');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsFI-4-Animation', 47, $styledata, 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-1,.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-2, .oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-3');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box One
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-4-B1-BG', $styledata, 51, 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-1', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-4-B1-SZ', $styledata[55], $styledata[56], 'Border', 'Set your Box One Border Size and Type', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-1');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-4-B1-BC', $styledata[59], '', 'Border Color', 'Set Your Box One Border Color', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-1', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Logo
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-4-L', $stylefiles[2], 'Logo Text', 'Set Your Logo Text', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-4-URL', $stylefiles[4], 'Logo URL', 'Set Your Logo URL', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-4-L-FS', $styledata[61], $styledata[62], $styledata[63], '1', 'Logo Font Size', 'Set Your Logo font Size', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-logo', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-4-L-C', $styledata[65], '', 'Logo Color', 'Set Your Logo Color', 'false', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-logo', 'color');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-4-L-BS', $styledata[69], $styledata[70], 'Border', 'Set your Logo Border Size and Type', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-logo');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-4-L-BC', $styledata[73], '', 'Border Color', 'Set Your Logo  Border Color', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-logo', 'border-color');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsFI-4-L-Tab', $styledata[67], 'Same Tab', '', 'New Tab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-3-E-E2', 75, $styledata, 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-logo');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-4-L-P', 81, $styledata, '1', 'Padding', 'Set your Logo Padding', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-logo', 'padding');
                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Two
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-4-B2-BG', $styledata, 97, 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-2', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-4-B2-SZ', $styledata[101], $styledata[102], 'Border', 'Set your Box Two Border Size and Type', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-2');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-4-B2-BC', $styledata[105], '', 'Border Color', 'Set Your Box Two  Border Color', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-2', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Contact
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-4-A', $stylefiles[6], 'Contact Text', 'Set Your Contact Text', 'false', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-Address');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-4-A-FS', $styledata[107], $styledata[108], $styledata[109], '1', 'Font Size', 'Set Your Contact font Size', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-Address', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-4-A-C', $styledata[111], '', 'Text Color', 'Set Your Contact Text Color', 'false', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-Address', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-4-A-A2', 113, $styledata, 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-Address');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-4-A-P', 119, $styledata, '1', 'Padding', 'Set your Contact Padding', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-Address', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Three
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-4-B3-BG', $styledata, 135, 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-3', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-4-B3-SZ', $styledata[139], $styledata[140], 'Border', 'Set your Three Border Size and Type', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-3');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-4-B3-BC', $styledata[143], '', 'Border Color', 'Set Your Three Border Color', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-col-3', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-4-I-FS', $styledata[145], $styledata[146], $styledata[147], '1', 'Icon Size', 'Set Your Location Icon', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-icon .oxi-icons', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-4-I-C', $styledata[149], '', 'Icon Color', 'Set Your Icon Font Color', 'false', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-icon .oxi-icons', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-4-I-HC', $styledata[151], '', 'Hover Color', 'Set Your Icon Font Color', 'false', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-icon .oxi-icons:hover', 'color');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsFI-4-I-Tab', $styledata[153], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsFI-4-I-TA', $styledata[155], 'Icon Position', 'Set your Icon Position', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-icon', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-4-I-P', 157, $styledata, '1', 'Padding', 'Set Your Icon Padding', 'true', '.oxi-addons-FI-4-' . $oxiid . ' .oxi-addons-FI-4-icon .oxi-icons', 'padding');
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
                    <?php echo oxi_footer_info_style_4_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsFI-4-I', $listitemdata[2], 'Icon Class', 'Set Your Social Icon Class', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFI-4-I-URL', $listitemdata[4], 'URL', 'Set Your Social Icon URL', 'false');
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