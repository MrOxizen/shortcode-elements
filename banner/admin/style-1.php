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
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-G-P') . ''
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-Animation') . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-H-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-H-F') . ''
            . ' OxiAddonsBanner-H-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-H-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-SD-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-SD-F') . ''
            . ' OxiAddonsBanner-SD-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-SD-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-SD-P') . ''
            . ' OxiAddonsBanner-B-Left-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Left-Tab']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-Left-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-B-Left-F') . ''
            . ' OxiAddonsBanner-B-Left-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Left-TC']) . '|'
            . ' OxiAddonsBanner-B-Left-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Left-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Left-BR') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-Left-BS') . ''
            . ' OxiAddonsBanner-B-Left-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Left-HTC']) . '|'
            . ' OxiAddonsBanner-B-Left-HBG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Left-HBG']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsBanner-B-Left-B') . ''
            . ' OxiAddonsBanner-B-Left-BC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Left-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Left-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Left-M') . ''
            . ' OxiAddonsBanner-B-Left-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Right-Tab']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-Right-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-B-Right-F') . ''
            . ' OxiAddonsBanner-B-Right-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Right-TC']) . '|'
            . ' OxiAddonsBanner-B-Right-I-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Right-I-TC']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-Right-I-FS') . '||'
            . ' OxiAddonsBanner-B-Right-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Right-HTC']) . '|'
            . ' OxiAddonsBanner-B-Right-HIC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Right-HIC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Right-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Right-M') . ''
            . '||'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-Left-HBS') . ''
            . '||||||'
            . ' OxiAddonsBanner-G-BG-PS |' . sanitize_text_field($_POST['OxiAddonsBanner-G-BG-PS']) . '|'
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-B-Left-Animation') . '|'
            . ' OxiAddonsBanner-B-Left-HBC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Left-HBC']) . '|'
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-B-Right-Animation') . '|'
            . ' OxiAddonsBanner-G-BPS |' . sanitize_text_field($_POST['OxiAddonsBanner-G-BPS']) . '|'
            . '' . OxiAddonsBGImageSanitize('OxiAddonsBanner-G-BG') . ''
            . '||#||'
            . ' OxiAddonsBanner-G-F-IMG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-G-F-IMG']) . '||#|| '
            . ' OxiAddonsBanner-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-H-TB']) . '||#|| '
            . ' OxiAddonsBanner-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-SD-TA']) . '||#|| '
            . ' OxiAddonsBanner-B-Left-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-B-Left-BT']) . '||#|| '
            . ' OxiAddonsBanner-B-Left-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-B-Left-BL']) . '||#|| '
            . ' OxiAddonsBanner-B-Left-I-TB ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsBanner-B-Left-I-TB']) . '||#|| '
            . ' OxiAddonsBanner-B-Right-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-B-Right-BT']) . '||#|| '
            . ' OxiAddonsBanner-B-Right-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-B-Right-BL']) . '||#|| '
            . ' OxiAddonsBanner-B-Right-I-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-B-Right-I-TB']) . '||#|| '
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
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li ref="#oxi-addons-tabs-2">Button Left</li>
                                <li ref="#oxi-addons-tabs-3">Button Right</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-G-BG-PS', $styledata[232], 'Left', 'left', 'Right', 'right', 'Image Position', 'Set Image and content position of banner', 'true');
                                            echo oxi_addons_adm_help_image_upload('OxiAddonsBanner-G-F-IMG', $stylefiles[2], 'Front Image', 'Set Your Banner Front Image', 'false');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-G-BPS', $styledata[246], 'Button Position', 'Set Your Button Position', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-button', 'text-align');
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsBanner-G-BG', $styledata, 248, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-G-P', 3, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Front Image Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-Animation', 19, $styledata, 'true', '.oxi-addons-wrapper-right');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-H-TB', $stylefiles[4], 'Heading', 'Set Heading', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-left .oxi-addons-wrapper-heading');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-H-FS', $styledata[24], $styledata[25], $styledata[26], '1', 'Font Size', 'Set Banner Banner Heading Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-heading', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-H-C', $styledata[34], '', 'Color', 'Set Banner  Heading Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-heading', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-H-F', 28, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-heading', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-H-P', 36, $styledata, 1, 'Padding', 'Set Banner  Heading Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-heading', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Short Details
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddonsBanner-SD-TA', $stylefiles[6], 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-left .oxi-addons-wrapper-details');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-SD-FS', $styledata[52], $styledata[53], $styledata[54], '2', 'Font Size', 'Set Banner Short details Font Size', 'true', ' .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-details', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-SD-C', $styledata[62], '', 'Color', 'Set Banner Short Details Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-details', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-SD-F', 56, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-details');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-SD-P', 64, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-details', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6">

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Left
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Left-BT', $stylefiles[8], 'Button Text', 'Set Banner Button Text', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Left-BL', $stylefiles[10], 'Button Link', 'Set Banner Button Link', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Left-I-TB', $stylefiles[12], 'Icon', 'Set FontAwesome Icon class Name for Button', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Left-Tab', $styledata[80], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-P', 128, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-M', 144, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Left-Animation', 234, $styledata, 'true', '.oxi-addons-button-left');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-Left-FS', $styledata[82], $styledata[83], $styledata[84], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-TC', $styledata[92], '', 'Text Color', 'Set Banner Button Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-BG', $styledata[94], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-Left-B', $styledata[122], $styledata[123], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-BC', $styledata[126], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsBanner-B-Left-F', 86, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-BR', 96, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HTC', $styledata[118], '', 'Hover Color', 'Set Banner Button Hover Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HBG', $styledata[120], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HBC', $styledata[239], '', 'Hover Border Color', 'Set Hover Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Left-BS', 112, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link-left');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Left-HBS', 220, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link-left');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-3">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Right
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Right-BT', $stylefiles[14], 'Button Text', 'Set Banner Button Text', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-right');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Right-BL', $stylefiles[16], 'Button Link', 'Set Banner Button Link', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Right-I-TB', $stylefiles[18], 'Icon', 'Set FontAwesome Icon class Name for Button', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Right-Tab', $styledata[160], 'Same Tab', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-P', 186, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-right', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-M', 202, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-link-right', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Right-Animation', 241, $styledata, 'true', '.oxi-addons-button-right');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-Right-FS', $styledata[162], $styledata[163], $styledata[164], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-link-right', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-TC', $styledata[172], '', 'Text Color', 'Set Banner Button Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-link-right', 'color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsBanner-B-Right-F', 166, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-link-right');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HTC', $styledata[182], '', 'Text Color', 'Set Banner Button Text Hover color', '', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-link-right:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HIC', $styledata[184], '', 'Icon Color', 'Set Banner Button Icon Hover color', '', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-link-right:hover .oxi-addons-button-link-right-icon .oxi-icons', 'color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Icon Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-Right-I-FS', $styledata[176], $styledata[177], $styledata[178], '', 'Font Size', 'Set Icon Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-right-icon .oxi-icons', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-I-TC', $styledata[174], '', 'Icon Color', 'Set Banner Icon Text Color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-right-icon .oxi-icons', 'color');
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