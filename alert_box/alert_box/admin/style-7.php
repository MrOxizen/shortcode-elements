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
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' OxiAddonsAL-SE-G-BG |' . sanitize_text_field($_POST['OxiAddonsAL-SE-G-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-SE-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-SE-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-SE-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAL-SE-G-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsAL-SE-G-animation') . ''
                . ' OxiAddonsAL-SE-I-BC |' . sanitize_text_field($_POST['OxiAddonsAL-SE-I-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-SE-I-FS') . ''
                . ' OxiAddonsAL-SE-I-C |' . sanitize_hex_color($_POST['OxiAddonsAL-SE-I-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-SE-I-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-SE-H-FS') . ''
                . ' OxiAddonsAL-SE-H-C|' . sanitize_hex_color($_POST['OxiAddonsAL-SE-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAL-SE-H-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-SE-H-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-SE-DE-FS') . ''
                . ' OxiAddonsAL-SE-DE-C |' . sanitize_hex_color($_POST['OxiAddonsAL-SE-DE-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAL-SE-DE-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-SE-DE-P') . ''
                . ' OxiAddonsAL-SE-CI-BC |' . sanitize_text_field($_POST['OxiAddonsAL-SE-CI-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-SE-CI-FS') . ''
                . ' OxiAddonsAL-SE-CI-C |' . sanitize_hex_color($_POST['OxiAddonsAL-SE-CI-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-SE-CI-P') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsAL-SE-I-RB-L') . ''
                . ' OxiAddonsAL-SE-I-RB-L-C |' . sanitize_hex_color($_POST['OxiAddonsAL-SE-I-RB-L-C']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsAL-SE-I-RB-R') . ''
                . ' OxiAddonsAL-SE-I-RB-R-C |' . sanitize_hex_color($_POST['OxiAddonsAL-SE-I-RB-R-C']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-SE-CI-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-SE-CI-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-SE-CI-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAL-SE-CI-B-Shadow') . ''
                . '' . OxiAddonsADMHelpTextShadowSanitize('OxiAddonsAL-SE-CI-T-Shadow') . ''
                
                . '||#||'
                . ' OxiAddonsAL-SE-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsAL-SE-I']) . '||#|| '
                . ' OxiAddonsAL-SE-HT ||#||' . sanitize_text_field($_POST['OxiAddonsAL-SE-HT']) . '||#|| '
                . ' OxiAddonsAL-SE-DE ||#||' . sanitize_text_field($_POST['OxiAddonsAL-SE-DE']) . '||#|| '
                . ' OxiAddonsAL-SE-CI ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsAL-SE-CI']) . '||#|| '
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
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-SE-G-BG', $styledata[3], 'rgba', 'Background', 'Set Your Body Background Color', 'false', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-row', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-SE-G-BR', 5, $styledata, '1', 'Border Radius', 'Set Your body Border Radius', 'true', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-SE-G-P', 21, $styledata, '1', 'Padding', 'Set Your body Padding', 'true', '.oxi-addons-AL-SE-' .$oxiid. ' .oxi-addonsAL-SE-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-SE-G-M', 37, $styledata, '1', 'Margin', 'Set Your body Margin', 'true', '.oxi-addons-AL-SE-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div><div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Description
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-SE-DE', $stylefiles[6], 'Description', 'Set Your Description', 'false', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-DC');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-SE-DE-FS', $styledata[115], $styledata[116], $styledata[117], '1', 'Font Size', 'Set Your Description Font Size', 'true', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-DC', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-SE-DE-C', $styledata[119], '', 'Color', 'Set Your Description Font Color', 'false', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-DC', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsAL-SE-DE-F', 121, $styledata, 'true', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-DC');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-SE-DE-P', 127, $styledata, '1', 'Padding', 'Set yor Description Text Padding', 'true', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-DC', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsAL-SE-G-B-Shadow', 53, $styledata, 'true', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsAL-SE-G-animation', 59, $styledata, '.oxi-addons-AL-SE-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-SE-HT', $stylefiles[4], 'Icon Class', 'Set Your Heading Text', 'false','.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-H');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-SE-H-FS', $styledata[87], $styledata[88], $styledata[89], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-H', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-SE-H-C', $styledata[91], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-H', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsAL-SE-H-F', 93, $styledata, 'true', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-H');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-SE-H-P', 99, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-H', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-SE-I', $stylefiles[2], 'Icon Class', 'Set Your Icon Class', 'false');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-SE-I-BC', $styledata[63], 'rgba', 'Background', 'Set Your Icon Color', 'false', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-col-one', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-SE-I-FS', $styledata[65], $styledata[66], $styledata[67], '1', 'Icon Size', 'Set Your Icon Size', 'true', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-F-icon', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-SE-I-C', $styledata[69], '', 'Color', 'Set Your Icon Color', 'false', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-F-icon', 'color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-SE-I-P', 71, $styledata, '1', 'Padding', 'Set Your Icon Padding', 'true', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-F-icon', 'padding');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Icon Right Border
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_border('OxiAddonsAL-SE-I-RB-L', $styledata[167], $styledata[168], 'Border Left', 'Set Your Icon Right Border left', 'true', '');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-SE-I-RB-L-C', $styledata[171], '', 'Border Left Color', 'Set Your Border Left Color', 'false', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-col-one', 'border-color');
                                        echo oxi_addons_adm_help_border('OxiAddonsAL-SE-I-RB-R', $styledata[173], $styledata[174], 'Border Right', 'Set Your Icon Right Border left', 'true', '');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-SE-I-RB-R-C', $styledata[177], '', 'Border Right Color', 'Set Your Border Right Color', 'false', '.oxi-addons-AL-SE-' . $oxiid . ' .oxi-addonsAL-SE-F-icon', 'border-color');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Cross Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-SE-CI', $stylefiles[8], 'Icon Class', 'Set Your Cross Icon Class', 'false');
                                        echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAL-SE-CI-W', $styledata[179], $styledata[180], $styledata[181], 'OxiAddonsAL-SE-CI-H', $styledata[183], $styledata[184], $styledata[185], 1, 'Width Height', 'Set Your Cross Icon Body width and Height', 'true', '', '');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-SE-CI-BC', $styledata[143], 'rgba', 'Background Hover', 'Set Your Cross Icon Background Hover Color', 'false', '.oxi-addons-AL-SE-' .$oxiid. ' .oxi-addonsAL-SE-L-icon .oxi-icons', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-SE-CI-FS', $styledata[145], $styledata[146], $styledata[147], '1', 'Cross Icon Size', 'Set Your Date Font Size', 'true', '.oxi-addons-AL-SE-' .$oxiid. ' .oxi-addonsAL-SE-L-icon .oxi-icons', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-SE-CI-C', $styledata[149], '', 'Color', 'Set Your Cross Icon Color', 'false', '.oxi-addons-AL-SE-' .$oxiid. ' .oxi-addonsAL-SE-L-icon .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-SE-CI-BR', 187, $styledata, '1', 'Border Radius', 'Set Your Cross Icon Border Radius', 'true', '.oxi-addons-AL-SE-' .$oxiid. ' .oxi-addonsAL-SE-L-icon .oxi-icons', 'border-radius');
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsAL-SE-CI-B-Shadow', 203, $styledata, 'true', '.oxi-addons-AL-SE-' .$oxiid. ' .oxi-addonsAL-SE-L-icon .oxi-icons');
                                        echo OxiAddonsADMHelpTextShadow('OxiAddonsAL-SE-CI-T-Shadow', 209, $styledata, 'true', '.oxi-addons-AL-SE-' .$oxiid. ' .oxi-addonsAL-SE-L-icon .oxi-icons', 'text-shadow');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-SE-CI-P', 151, $styledata, '1', 'Padding', 'Set Your Cross Icon Padding', 'true', '.oxi-addons-AL-SE-' .$oxiid. ' .oxi-addonsAL-SE-L-icon .oxi-icons', 'padding');
                                        $NOJS = array(
                                            array('OxiAddonsAL-SE-CI-W', 'Width'),
                                            array('OxiAddonsAL-SE-CI-H', 'Height')
                                        );
                                        echo OxiAddonsADMHelpNoJquery($NOJS);
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


