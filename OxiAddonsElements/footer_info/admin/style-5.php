<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-footer-info-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-5-G-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-5-G-SZ') . ''
                . ' OxiAddonsFI-5-G-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-5-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-5-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-5-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-5-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-5-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFI-5-Animation') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-5-I-MXW') . ''
                . ' OxiAddonsFI-5-I-Tab |' . sanitize_text_field($_POST['OxiAddonsFI-5-I-Tab']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-5-FT-FS') . ''
                . ' OxiAddonsFI-5-FT-C |' . sanitize_hex_color($_POST['OxiAddonsFI-5-FT-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-5-FT-FT2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-5-FT-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-5-I-P') . ''
     
                . '||#||'
                . ' OxiAddonsFI-5-Img ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFI-5-Img']) . '||#|| '
                . ' OxiAddonsFI-5-Img-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFI-5-Img-URL']) . '||#|| '
                . ' OxiAddonsFI-5-FT ||#||' . sanitize_text_field($_POST['OxiAddonsFI-5-FT']) . '||#|| '
                . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
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
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-5-G-BG', $styledata, 3, 'false', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-row', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-5-G-SZ', $styledata[7], $styledata[8], 'Border', 'Set your body Border Size and Type', 'true', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-row');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-5-G-BC', $styledata[11], '', 'Border Color', 'Set Your body  Border Color', 'true', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-row', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-5-G-BR', 13, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-row', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-5-G-P', 29, $styledata, '1', 'Padding', 'Set your body Margin', 'true', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-row', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-5-G-M', 45, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-FI-5-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-5-B-Shadow', 61, $styledata, 'true', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-row', 'box-shadow');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsFI-5-Animation', 67, $styledata, 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_row');
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
                                            echo oxi_addons_adm_help_image_upload('OxiAddonsFI-5-Img', $stylefiles[2], 'Image', 'Set Your Image', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-5-Img-URL', $stylefiles[4], 'Logo URL', 'Set Your Image URL', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsFI-5-I-Tab', $styledata[75], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-5-I-MXW', $styledata[71], $styledata[72], $styledata[73], '1', 'Maximum Width', 'Set Max Width', 'true', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-img', 'max-width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-5-I-P', 105, $styledata, '1', 'Padding', 'Set your Image padding', 'true', '.oxi-addons-FI-5-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Footer Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-5-FT', $stylefiles[6], 'Footer Text', 'Set Your Footer Text', 'false', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-content');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-5-FT-FS', $styledata[77], $styledata[78], $styledata[79], '1', 'Font Size', 'Set Your Footer Text Font Size', 'true', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-content', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-5-FT-C', $styledata[81], '', 'Text Color', 'Set Your Footer Text Color', 'false', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-content', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-5-FT-FT2', 83, $styledata, 'true', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-content');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-5-FT-P', 89, $styledata, '1', 'Padding', 'Set your Footer Text Padding', 'true', '.oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-content', 'padding');
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
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_quick_tutorials('yPu6qV5byu4');
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
                    <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>