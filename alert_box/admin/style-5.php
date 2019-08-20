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
                . ' OxiAddonsAL-FI-G-BG |' . sanitize_text_field($_POST['OxiAddonsAL-FI-G-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAL-FI-G-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsAL-FI-G-animation') . ''
                . ' OxiAddonsAL-FI-I-BC |' . sanitize_text_field($_POST['OxiAddonsAL-FI-I-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-FI-I-FS') . ''
                . ' OxiAddonsAL-FI-I-C |' . sanitize_hex_color($_POST['OxiAddonsAL-FI-I-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-I-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-FI-H-FS') . ''
                . ' OxiAddonsAL-FI-H-C|' . sanitize_hex_color($_POST['OxiAddonsAL-FI-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAL-FI-H-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-H-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-FI-DE-FS') . ''
                . ' OxiAddonsAL-FI-DE-C |' . sanitize_hex_color($_POST['OxiAddonsAL-FI-DE-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAL-FI-DE-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-DE-P') . ''
                . ' OxiAddonsAL-FI-CI-BC |' . sanitize_text_field($_POST['OxiAddonsAL-FI-CI-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-FI-CI-FS') . ''
                . ' OxiAddonsAL-FI-CI-C |' . sanitize_hex_color($_POST['OxiAddonsAL-FI-CI-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-CI-P') . ''
                . ' OxiAddonsAL-FI-CG-BG |' . sanitize_text_field($_POST['OxiAddonsAL-FI-CG-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsAL-FI-CG-B') . ''
                . ' OxiAddonsAL-FI-CG-BC |' . sanitize_hex_color($_POST['OxiAddonsAL-FI-CG-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-CG-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-CG-P') . ''
                . ' ||||||||||||||||'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAL-FI-CG-B-Shadow') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-FI-CB-IS') . ''
                . ' OxiAddonsAL-FI-CB-IC2 |' . sanitize_hex_color($_POST['OxiAddonsAL-FI-CB-IC2']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-CB-IP') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-FI-CT-FS') . ''
                . ' OxiAddonsAL-FI-CT-C|' . sanitize_hex_color($_POST['OxiAddonsAL-FI-CT-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAL-FI-CT-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAL-FI-CT-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAL-FI-CT-MAX') . ''
                . ' OxiAddonsAL-FI-CB-ICP |' . sanitize_text_field($_POST['OxiAddonsAL-FI-CB-ICP']) . '|'
                . '||#||'
                . ' OxiAddonsAL-FI-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsAL-FI-I']) . '||#|| '
                . ' OxiAddonsAL-FI-HT ||#||' . sanitize_text_field($_POST['OxiAddonsAL-FI-HT']) . '||#|| '
                . ' OxiAddonsAL-FI-DE ||#||' . sanitize_text_field($_POST['OxiAddonsAL-FI-DE']) . '||#|| '
                . ' OxiAddonsAL-FI-CI ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsAL-FI-CI']) . '||#|| '
                . ' OxiAddonsAL-FI-CB-IC ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsAL-FI-CB-IC']) . '||#|| '
                . ' OxiAddonsAL-FI-CB-HT ||#||' . sanitize_text_field($_POST['OxiAddonsAL-FI-CB-HT']) . '||#|| '
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
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-id-1">General Setting</li>
                                <li  ref="#oxi-addons-tabs-id-2">Alert Box</li> 
                            </ul> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-CG-BG', $styledata[167], 'rgba', 'Background', 'Set Your Body Background Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-box', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-FI-CT-MAX', $styledata[279], $styledata[280], $styledata[281], '1', 'Max Width', 'Set Your Click Box Max Width', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-box', 'max-width');
                                            echo oxi_addons_adm_help_border('OxiAddonsAL-FI-CG-B', $styledata[169], $styledata[170], 'Border', 'Set your Body Size and Type', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-box');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-CG-BC', $styledata[173], '', 'Border Color', 'Set Your Body Border Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-box', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-CG-BR', 175, $styledata, '1', 'Border Radius', 'Set Your body Border Radius', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-box', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-CG-P', 191, $styledata, '1', 'Padding', 'Set Your body Padding', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-box', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-G-M', 37, $styledata, '1', 'Margin', 'Set Your body Margin', 'true', '.oxi-addons-AL-FI-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsAL-FI-CG-B-Shadow', 223, $styledata, 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-box');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAL-FI-CB-IC', $stylefiles[10], 'Icon Class', 'Set Your Click Box Icon Class', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-FI-CB-IS', $styledata[229], $styledata[230], $styledata[231], '1', 'Icon Size', 'Set Your Icon Size', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-icon .oxi-icons', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-CB-IC2', $styledata[233], '', 'Icon Color', 'Set Your Icon Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-icon .oxi-icons', 'color');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsAL-FI-CB-ICP', $styledata[283], 'Icon Position', 'Set Your Icon Position', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-A-C', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-CB-IP', 235, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-icon', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAL-FI-CB-HT', $stylefiles[12], 'Text', 'Set Your Click Box Text', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-text');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-FI-CT-FS', $styledata[251], $styledata[252], $styledata[253], '1', 'Font Size', 'Set Your Click Box Text Font Size', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-text', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-CT-C', $styledata[255], '', 'Font Color', 'Set Your Click Box Text Font Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-text', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAL-FI-CT-F', 257, $styledata, 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-text');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-CT-P', 263, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-click-text', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Alert Box
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-G-BG', $styledata[3], 'rgba', 'Background', 'Set Your Body Background Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-row', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-G-BR', 5, $styledata, '1', 'Border Radius', 'Set Your body Border Radius', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-row', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-G-P', 21, $styledata, '1', 'Padding', 'Set Your body Padding', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-col-two', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Description
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAL-FI-DE', $stylefiles[6], 'Description', 'Set Your Description', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-DC');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-FI-DE-FS', $styledata[115], $styledata[116], $styledata[117], '1', 'Font Size', 'Set Your Description Font Size', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-DC', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-DE-C', $styledata[119], '', 'Color', 'Set Your Description Font Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-DC', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAL-FI-DE-F', 121, $styledata, 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-DC');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-DE-P', 127, $styledata, '1', 'Padding', 'Set yor Description Text Padding', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-DC', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsAL-FI-G-B-Shadow', 53, $styledata, 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-row');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsAL-FI-G-animation', 59, $styledata, 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-row');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAL-FI-HT', $stylefiles[4], 'Icon Class', 'Set Your Heading Text', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-H');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-FI-H-FS', $styledata[87], $styledata[88], $styledata[89], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-H', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-H-C', $styledata[91], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-H', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAL-FI-H-F', 93, $styledata, 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-H');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-H-P', 99, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-H', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAL-FI-I', $stylefiles[2], 'Icon Class', 'Set Your Icon Class', 'false');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-I-BC', $styledata[63], 'rgba', 'Background', 'Set Your Icon Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-col-one', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-FI-I-FS', $styledata[65], $styledata[66], $styledata[67], '1', 'Icon Size', 'Set Your Icon Size', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-F-icon', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-I-C', $styledata[69], '', 'Color', 'Set Your Icon Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-F-icon', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-I-P', 71, $styledata, '1', 'Padding', 'Set Your Icon Padding', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-F-icon', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Cross Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAL-FI-CI', $stylefiles[8], 'Icon Class', 'Set Your Cross Icon Class', 'false');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-CI-BC', $styledata[143], 'rgba', 'Background Hover', 'Set Your Cross Icon Background Hover Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-col-three:hover', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAL-FI-CI-FS', $styledata[145], $styledata[146], $styledata[147], '1', 'Cross Icon Size', 'Set Your Date Font Size', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-L-icon', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAL-FI-CI-C', $styledata[149], '', 'Color', 'Set Your Cross Icon Color', 'false', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-L-icon', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAL-FI-CI-P', 151, $styledata, '1', 'Padding', 'Set Your Cross Icon Padding', 'true', '.oxi-addons-AL-FI-' . $oxiid . ' .oxi-addonsAL-FI-L-icon', 'padding');
                                            ?>
                                        </div>
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


