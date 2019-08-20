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
                . ' OxiAddonsAL-4-G-BG |' . sanitize_text_field($_POST['OxiAddonsAL-4-G-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-4-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-4-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-4-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAL-4-G-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsAL-4-G-animation') . ''
                . ' ||'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-4-I-FS') . ''
                . ' OxiAddonsAL-4-I-C |' . sanitize_hex_color($_POST['OxiAddonsAL-4-I-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-4-I-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-4-H-FS') . ''
                . ' OxiAddonsAL-4H-C|' . sanitize_hex_color($_POST['OxiAddonsAL-4-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAL-4-H-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-4-H-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-4-DE-FS') . ''
                . ' OxiAddonsAL-4DE-C |' . sanitize_hex_color($_POST['OxiAddonsAL-4-DE-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAL-4-DE-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-4-DE-P') . ''
                . ' OxiAddonsAL-4-CI-BC |' . sanitize_text_field($_POST['OxiAddonsAL-4-CI-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-4-CI-FS') . ''
                . ' OxiAddonsAL-4-CI-C |' . sanitize_hex_color($_POST['OxiAddonsAL-4-CI-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-4-CI-P') . ''
                . ' ||'
                . ' ||||||||||||||||'
                . ' ||||||||||||||||'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-4-IB-B') . ''
                . ' OxiAddonsAL-4-IB-BC |' . sanitize_hex_color($_POST['OxiAddonsAL-4-IB-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-4-IB-P') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-4-G-B') . ''
                . ' OxiAddonsAL-4-G-BC |' . sanitize_hex_color($_POST['OxiAddonsAL-4-G-BC']) . '|'
                . '||#||'
                . ' OxiAddonsAL-4-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsAL-4-I']) . '||#|| '
                . ' OxiAddonsAL-4-HT ||#||' . sanitize_text_field($_POST['OxiAddonsAL-4-HT']) . '||#|| '
                . ' OxiAddonsAL-4-DE ||#||' . sanitize_text_field($_POST['OxiAddonsAL-4-DE']) . '||#|| '
                . ' OxiAddonsAL-4-CI ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsAL-4-CI']) . '||#|| '
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
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-4-G-BG', $styledata[3], 'rgba', 'Background', 'Set Your Body Background Color', 'false', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-row', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-4-G-B', $styledata[223], $styledata[224], 'Border', 'Set your Body Size and Type', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-row');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-4-G-BC', $styledata[227], '', 'Border Color', 'Set Your Body Border Color', 'false', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-row', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-4-G-BR', 5, $styledata, '1', 'Border Radius', 'Set Your body Border Radius', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-4-G-P', 21, $styledata, '1', 'Padding', 'Set Your body Padding', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-4-G-M', 37, $styledata, '1', 'Margin', 'Set Your body Margin', 'true', '.oxi-addons-AL-FO-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Inner Border
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-4-CI-BC', $styledata[143], 'rgba', 'Background', 'Set Your Inner Body Background', 'false', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-BI', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-4-IB-B', $styledata[201], $styledata[202], 'Border', 'Set your Inner Border Size and Type', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-BI');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-4-IB-BC', $styledata[205], '', 'Border Color', 'Set Your Inner Border Color', 'false', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-BI', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-4-IB-P', 207, $styledata, '1', 'Padding', 'Set Your Inner Border Padding', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-BI', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsAL-4-G-B-Shadow', 53, $styledata, 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsAL-4-G-animation', 59, $styledata, 'true', '.oxi-addons-AL-FO-' . $oxiid . '');
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
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-4-HT', $stylefiles[4], 'Icon Class', 'Set Your Heading Text', 'false','.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-H');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-4-H-FS', $styledata[87], $styledata[88], $styledata[89], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-H', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-4-H-C', $styledata[91], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-H', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsAL-4-H-F', 93, $styledata, 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-H');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-4-H-P', 99, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-H', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Description
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-4-DE', $stylefiles[6], 'Description', 'Set Your Description', 'false', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-DC');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-4-DE-FS', $styledata[115], $styledata[116], $styledata[117], '1', 'Font Size', 'Set Your Description Font Size', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-DC', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-4-DE-C', $styledata[119], '', 'Color', 'Set Your Description Font Color', 'false', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-DC', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsAL-4-DE-F', 121, $styledata, 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-DC');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-4-DE-P', 127, $styledata, '1', 'Padding', 'Set yor Description Text Padding', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-DC', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-4-I', $stylefiles[2], 'Icon Class', 'Set Your Icon Class', 'false');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-4-I-FS', $styledata[65], $styledata[66], $styledata[67], '1', 'Icon Size', 'Set Your Icon Size', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-F-icon', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-4-I-C', $styledata[69], '', 'Color', 'Set Your Icon Color', 'false', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-F-icon', 'color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-4-I-P', 71, $styledata, '1', 'Padding', 'Set Your Icon Padding', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-F-icon', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Cross Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-4-CI', $stylefiles[8], 'Icon Class', 'Set Your Cross Icon Class', 'false');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-4-CI-FS', $styledata[145], $styledata[146], $styledata[147], '1', 'Cross Icon Size', 'Set Your Date Font Size', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-L-icon', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-4-CI-C', $styledata[149], '', 'Color', 'Set Your Cross Icon Color', 'false', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-L-icon', 'color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-4-CI-P', 151, $styledata, '1', 'Padding', 'Set Your Cross Icon Padding', 'true', '.oxi-addons-AL-FO-' . $oxiid . ' .oxi-addonsAL-FO-L-icon', 'padding');
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


