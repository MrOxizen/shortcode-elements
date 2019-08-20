<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageComparison-G-W') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageComparison-G-margin') . ''
            . ' OxiAddonsImageComparison-G-offset |' . sanitize_text_field($_POST['OxiAddonsImageComparison-G-offset']) . '|'
            . ' OxiAddonsImageComparison-HS-bg |' . sanitize_text_field($_POST['OxiAddonsImageComparison-HS-bg']) . '|'
            . ' OxiAddonsImageComparison-arrow-C |' . sanitize_hex_color($_POST['OxiAddonsImageComparison-arrow-C']) . '|'
            . '||'
            . '||'
            . '||'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageComparison-B-FS') . ''
            . ' OxiAddonsImageComparison-B-TC |' . sanitize_hex_color($_POST['OxiAddonsImageComparison-B-TC']) . '|'
            . ' OxiAddonsImageComparison-B-BG |' . sanitize_text_field($_POST['OxiAddonsImageComparison-B-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsImageComparison-B-B') . ''
            . ' OxiAddonsImageComparison-B-BC |' . sanitize_hex_color($_POST['OxiAddonsImageComparison-B-BC']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsImageComparison-B-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageComparison-B-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageComparison-B-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageComparison-handle-width') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageComparison-handle-height') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageComparison-handle-radius') . ''
            . '||#||'
            . ' OxiAddonsImageComparison-B-text-before ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsImageComparison-B-text-before']) . '||#|| '
            . ' OxiAddonsImageComparison-B-text-after ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsImageComparison-B-text-after']) . '||#|| '
            . ' OxiAddonsImageComparison-IMG-Before ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsImageComparison-IMG-Before']) . '||#|| '
            . ' OxiAddonsImageComparison-IMG-After ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsImageComparison-IMG-After']) . '||#|| '
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageComparison-G-W', $styledata[3], $styledata[4], $styledata[5], 1, 'Max-Width', 'Set Your Image Max Width', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'width');
                                            echo oxi_addons_adm_help_number('OxiAddonsImageComparison-G-offset', $styledata[23], 0.1, 'Coparison Offset', 'Set Your Image comparison Offset', 'true', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageComparison-G-margin', 7, $styledata, 1, 'Margin', 'Set Image Scroll body Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsImageComparison-G-W', 'Width'),
                                                    array('OxiAddonsImageComparison-G-offset', 'Offset'),
                                                )
                                            );
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Handle Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsImageComparison-HS-bg', $styledata[25], 'rgba', 'Background Color', 'Set Image Comparison handle Background Color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-handle', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsImageComparison-arrow-C', $styledata[27], '', 'Arrow Color', 'Set Image Comparison handle  Arrow Color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-handle', 'color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageComparison-handle-width', $styledata[87], $styledata[88], $styledata[89], 1, 'Width', 'Set Your Image comparison Handle Width', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-handle', 'width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageComparison-handle-height', $styledata[91], $styledata[92], $styledata[93], 1, 'Height', 'Set Your  Image comparison Handle Width', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-handle', 'height');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageComparison-handle-radius', 95, $styledata, 1, 'Border Radius', 'Set Image Scroll body Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-handle', 'border-radius');

                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Upload Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_body_image_upload('OxiAddonsImageComparison-IMG-Before', $stylefiles[6], 'First Image', 'Upload First Image for image comparison', 'false');
                                            echo oxi_addons_adm_help_body_image_upload('OxiAddonsImageComparison-IMG-After', $stylefiles[8], 'Second Image', 'Upload Second Image for image comparison', 'false');

                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsImageComparison-B-text-before', $stylefiles[2], 'Before Button Text', 'Set Image Comparison Before Button Text', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsImageComparison-B-text-after', $stylefiles[4], 'After Button Text', 'Set Image Comparison After Button Text', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageComparison-B-FS', $styledata[35], $styledata[36], $styledata[37], '', 'Font Size', 'Set Image Comparison Before After Font size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-reveal[data-beer-label]::after, .beer-slider[data-beer-label]::after', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsImageComparison-B-TC', $styledata[39], '', 'Text Color', 'Set Image Comparison Button Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-reveal[data-beer-label]::after, .beer-slider[data-beer-label]::after', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsImageComparison-B-BG', $styledata[41], 'rgba', 'Background Color', 'Set Image Comparison Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-reveal[data-beer-label]::after, .beer-slider[data-beer-label]::after', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsImageComparison-B-B', $styledata[43], $styledata[44], 'Border', 'Set Image Comparison Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-reveal[data-beer-label]::after, .beer-slider[data-beer-label]::after');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsImageComparison-B-BC', $styledata[47], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-reveal[data-beer-label]::after, .beer-slider[data-beer-label]::after', 'border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsImageComparison-B-F', 49, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-reveal[data-beer-label]::after, .beer-slider[data-beer-label]::after');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageComparison-B-BR', 55, $styledata, 1, 'Border Radius', 'Set Image Comparison Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-reveal[data-beer-label]::after, .beer-slider[data-beer-label]::after', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageComparison-B-P', 71, $styledata, 1, 'Padding', 'Set Image Comparison Button Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .beer-reveal[data-beer-label]::after, .beer-slider[data-beer-label]::after', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-setting-save">
                                <?php echo oxiaddonssettingsavedtmmode(); ?>
                                <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                                <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                                <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                                <?php wp_nonce_field("oxi-addons-eventwidgets-nonce") ?>
                            </div>

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