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
    if (!wp_verify_nonce($nonce, 'OxiAddDropCaps-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = ' oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddTextBlocks-margin') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddTextBlocks-animation') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddTextBlocks-1st-font-size') . ''
                . ' OxiAddTextBlocks-1st-color |' . sanitize_hex_color($_POST['OxiAddTextBlocks-1st-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddTextBlocks-1st') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddTextBlocks-1st-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddTextBlocks-2nd-font-size') . ''
                . ' OxiAddTextBlocks-2nd-color |' . sanitize_hex_color($_POST['OxiAddTextBlocks-2nd-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddTextBlocks-2nd') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddTextBlocks-2nd-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddTextBlocks-3rd-font-size') . ''
                . ' OxiAddTextBlocks-3rd-color |' . sanitize_hex_color($_POST['OxiAddTextBlocks-3rd-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddTextBlocks-3rd') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddTextBlocks-3rd-padding') . ''
                . '||#||  ||#||'
                . 'OxiAddTextBlocks-1st-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddTextBlocks-1st-text']) . '||#||'
                . 'OxiAddTextBlocks-2nd-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddTextBlocks-2nd-text']) . '||#||'
                . 'OxiAddTextBlocks-3rd-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddTextBlocks-3rd-text']) . '||#||'
                . '|';
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
                                        General Information
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_padding_margin('OxiAddTextBlocks-margin', 3, $styledata, 1, 'Margin', 'Customize the Margin for the Text Blocks, either Easy or Advance mode', 'false', '.oxi-addons-text-blocks-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddTextBlocks-animation', 19, $styledata, 'true', '.oxi-addons-container');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        First Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddTextBlocks-1st-text', $stylefiles[3], 'Text', 'Write the First Text here','fales','.oxi-addons-text-blocks-1st-body-' . $oxiid . '');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddTextBlocks-1st-font-size', $styledata[23], $styledata[24], $styledata[25], 1, 'Font Size', 'Set the Font Size for the Text', 'true', '.oxi-addons-text-blocks-1st-body-' . $oxiid . '', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddTextBlocks-1st-color', $styledata[27], '', 'Color', 'Customize the Text Color. Pick the desire color from color picker', 'false', '.oxi-addons-text-blocks-1st-body-' . $oxiid . '', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddTextBlocks-1st', 29, $styledata, 'true', '.oxi-addons-text-blocks-1st-body-' . $oxiid . '');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddTextBlocks-1st-padding', 35, $styledata, 1, 'Padding', 'Customize the Padding for the First Text, either Easy or Advance mode', 'true', '.oxi-addons-text-blocks-1st-body-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Second Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddTextBlocks-2nd-text', $stylefiles[5], 'Text', 'Write the Second Text Here','fales','.oxi-addons-text-blocks-2nd-body-' . $oxiid . '');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddTextBlocks-2nd-font-size', $styledata[51], $styledata[52], $styledata[53], 1, 'Font Size', 'Set the Font Size for the Text', 'true', '.oxi-addons-text-blocks-2nd-body-' . $oxiid . '', 'font-sizte');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddTextBlocks-2nd-color', $styledata[55], '', 'Color', 'Customize the Text Color. Pick the desire color from color picker', 'false', '.oxi-addons-text-blocks-2nd-body-' . $oxiid . '', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddTextBlocks-2nd', 57, $styledata, 'true', '.oxi-addons-text-blocks-2nd-body-' . $oxiid . '');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddTextBlocks-2nd-padding', 63, $styledata, 1, 'Padding', 'Customize the Padding for the Second Text, either easy or advance mode', 'true', '.oxi-addons-text-blocks-2nd-body-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Third Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textarea('OxiAddTextBlocks-3rd-text', $stylefiles[7], 'Text', 'Write the Third Text here','fales','.oxi-addons-text-blocks-3rd-body-' . $oxiid . '');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddTextBlocks-3rd-font-size', $styledata[79], $styledata[80], $styledata[81], 1, 'Font Size', 'Set the Font Size for the Text', 'true', '.oxi-addons-text-blocks-3rd-body-' . $oxiid . '', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddTextBlocks-3rd-color', $styledata[83], '', 'Color', 'Customize the Text Color. Pick the desire color from color picker', 'false', '.oxi-addons-text-blocks-3rd-body-' . $oxiid . '', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddTextBlocks-3rd', 85, $styledata, 'true', '.oxi-addons-text-blocks-3rd-body-' . $oxiid . '');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddTextBlocks-3rd-padding', 91, $styledata, 1, 'Padding', 'Customize the Padding for the Third Text, either Easy or Advance mode', 'true', '.oxi-addons-text-blocks-3rd-body-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("OxiAddDropCaps-nonce") ?>
                        </div>

                    </div>

                </form>

            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
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
