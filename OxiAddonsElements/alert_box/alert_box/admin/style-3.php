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
                . ' OxiAddonsAL-3-G-BG |' . sanitize_text_field($_POST['OxiAddonsAL-3-G-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-3-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-3-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-3-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAL-3-G-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsAL-3-G-animation') . ''
                . ' OxiAddonsAL-3-I-BC |' . sanitize_text_field($_POST['OxiAddonsAL-3-I-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-3-I-FS') . ''
                . ' OxiAddonsAL-3-I-C |' . sanitize_hex_color($_POST['OxiAddonsAL-3-I-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-3-I-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-3-H-FS') . ''
                . ' OxiAddonsAL-3-H-C|' . sanitize_hex_color($_POST['OxiAddonsAL-3-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAL-3-H-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-3-H-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-3-DE-FS') . ''
                . ' OxiAddonsAL-3-DE-C |' . sanitize_hex_color($_POST['OxiAddonsAL-3-DE-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAL-3-DE-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-3-DE-P') . ''
                . ' OxiAddonsAL-3-CI-BC |' . sanitize_text_field($_POST['OxiAddonsAL-3-CI-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-3-CI-FS') . ''
                . ' OxiAddonsAL-3-CI-C |' . sanitize_hex_color($_POST['OxiAddonsAL-3-CI-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-3-CI-P') . ''
                . ' OxiAddonsAL-3-C-BC |' . sanitize_text_field($_POST['OxiAddonsAL-3-C-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-3-C-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-3-C-M') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-3-IB-B') . ''
                . ' OxiAddonsAL-3-IB-BC |' . sanitize_hex_color($_POST['OxiAddonsAL-3-IB-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-3-IB-P') . ''
                . '||#||'
                . ' OxiAddonsAL-3-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsAL-3-I']) . '||#|| '
                . ' OxiAddonsAL-3-HT ||#||' . sanitize_text_field($_POST['OxiAddonsAL-3-HT']) . '||#|| '
                . ' OxiAddonsAL-3-DE ||#||' . sanitize_text_field($_POST['OxiAddonsAL-3-DE']) . '||#|| '
                . ' OxiAddonsAL-3-CI ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsAL-3-CI']) . '||#|| '
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
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-3-G-BG', $styledata[3], 'rgba', 'Background', 'Set Your Body Background Color', 'false', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-row', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-3-G-BR', 5, $styledata, '1', 'Border Radius', 'Set Your body Border Radius', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-3-G-P', 21, $styledata, '1', 'Padding', 'Set Your body Padding', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-3-G-M', 37, $styledata, '1', 'Margin', 'Set Your body Margin', 'true', '.oxi-addons-AL-TH-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Description
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-3-DE', $stylefiles[6], 'Description', 'Set Your Description', 'false','.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-DC');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-3-DE-FS', $styledata[115], $styledata[116], $styledata[117], '1', 'Font Size', 'Set Your Description Font Size', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-DC', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-3-DE-C', $styledata[119], '', 'Color', 'Set Your Description Font Color', 'false', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-DC', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsAL-3-DE-F', 121, $styledata, 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-DC');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-3-DE-P', 127, $styledata, '1', 'Padding', 'Set yor Description Text Padding', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-DC', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Inner Border
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-3-IB-B', $styledata[201], $styledata[202], 'Border', 'Set your Inner Border Size and Type', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-BI');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-3-IB-BC', $styledata[205], '', 'Border Color', 'Set Your Inner Border Color', 'false', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-BI', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-3-IB-P', 207, $styledata, '1', 'Padding', 'Set Your Inner Border Padding', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-BI', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsAL-3-G-B-Shadow', 53, $styledata, 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsAL-3-G-animation', 59, $styledata, 'true', '.oxi-addons-AL-TH-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Content
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-3-C-BC', $styledata[167], 'rgba', 'Background', 'Set Your Content Background Color', 'false', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-col-two', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-3-C-P', 169, $styledata, '1', 'Padding', 'Set yor Content Padding', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-col-two', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-3-C-M', 185, $styledata, '1', 'Margin', 'Set yor Content Margin', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-col-two', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-3-HT', $stylefiles[4], 'Icon Class', 'Set Your Heading Text', 'false','.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-H');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-3-H-FS', $styledata[87], $styledata[88], $styledata[89], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-H', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-3-H-C', $styledata[91], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-H', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsAL-3-H-F', 93, $styledata, 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-H');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-3-H-P', 99, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-H', 'padding');
                                        ?>
                                    </div>
                                </div>

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-3-I', $stylefiles[2], 'Icon Class', 'Set Your Icon Class', 'false');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-3-I-BC', $styledata[63], 'rgba', 'Background', 'Set Your Icon Color', 'false', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-col-one', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-3-I-FS', $styledata[65], $styledata[66], $styledata[67], '1', 'Icon Size', 'Set Your Icon Size', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-F-icon', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-3-I-C', $styledata[69], '', 'Color', 'Set Your Icon Color', 'false', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-F-icon', 'color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-3-I-P', 71, $styledata, '1', 'Padding', 'Set Your Icon Padding', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-F-icon', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Cross Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAL-3-CI', $stylefiles[8], 'Icon Class', 'Set Your Cross Icon Class', 'false');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-3-CI-BC', $styledata[143], 'rgba', 'Background', 'Set Your Cross Icon Background', 'false', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-col-three', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-3-CI-FS', $styledata[145], $styledata[146], $styledata[147], '1', 'Cross Icon Size', 'Set Your Date Font Size', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-L-icon', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-3-CI-C', $styledata[149], '', 'Color', 'Set Your Cross Icon Color', 'false', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-L-icon', 'color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-3-CI-P', 151, $styledata, '1', 'Padding', 'Set Your Cross Icon Padding', 'true', '.oxi-addons-AL-TH-' . $oxiid . ' .oxi-addonsAL-TH-L-icon', 'padding');
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


