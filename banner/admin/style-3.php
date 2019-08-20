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
                . '' . OxiAddonsBGImageSanitize('OxiAddonsBanner-G-BG') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-G-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-H-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-H-F') . ''
                . ' OxiAddonsBanner-H-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-H-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-H-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-H-Animation') . '|'
                . ' OxiAddonsBanner-IT-PS |' . sanitize_text_field($_POST['OxiAddonsBanner-IT-PS']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-IT-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-IT-Animation') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-I-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-I-Animation') . '|'
                . ' OxiAddonsBanner-B-Left-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Left-Tab']) . '|'
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-Left-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-B-Left-F') . ''
                . ' OxiAddonsBanner-B-Left-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Left-TC']) . '|'
                . ' OxiAddonsBanner-B-Left-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Left-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Left-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-Left-BS') . ''
                . ' OxiAddonsBanner-B-Left-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Left-HTC']) . '|'
                . ' OxiAddonsBanner-B-Left-HBG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Left-HBG']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-Left-HBS') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsBanner-B-Left-B') . ''
                . ' OxiAddonsBanner-B-Left-BC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Left-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Left-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Left-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-B-Left-Animation') . '|'
                . ' OxiAddonsBanner-B-Right-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Right-Tab']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-Right-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-B-Right-F') . ''
                . ' OxiAddonsBanner-B-Right-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Right-TC']) . '|'
                . ' OxiAddonsBanner-B-Right-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Right-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Right-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-Right-BS') . ''
                . ' OxiAddonsBanner-B-Right-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Right-HTC']) . '|'
                . ' OxiAddonsBanner-B-Right-HBG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Right-HBG']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-Right-HBS') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsBanner-B-Right-B') . ''
                . ' OxiAddonsBanner-B-Right-BC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Right-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Right-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Right-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-B-Right-Animation') . '|'
                . ' OxiAddonsBanner-I-IL-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-I-IL-Tab']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-IT-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-IT-F') . ''
                . ' OxiAddonsBanner-IT-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-IT-TC']) . '|'
                . ' OxiAddonsBanner-IT-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-IT-HTC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-I-FS') . ''
                . ' OxiAddonsBanner-I-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-I-TC']) . '|'
                . ' OxiAddonsBanner-I-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-I-HTC']) . '|'
                . ' OxiAddonsBanner-G-BPS |' . sanitize_text_field($_POST['OxiAddonsBanner-G-BPS']) . '|'
                . ' OxiAddonsBanner-B-Left-HBC |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Left-HBC']) . '|'
                . ' OxiAddonsBanner-B-Right-HBC |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Right-HBC']) . '|'
                . '||#||'
                . ' OxiAddonsBanner-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-H-TB']) . '||#|| '
                . ' OxiAddonsBanner-IT ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsBanner-IT']) . '||#|| '
                . ' OxiAddonsBanner-I-IB ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-I-IB']) . '||#|| '
                . ' OxiAddonsBanner-I-IL ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-I-IL']) . '||#|| '
                . ' OxiAddonsBanner-B-Left-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-B-Left-BT']) . '||#|| '
                . ' OxiAddonsBanner-B-Left-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-B-Left-BL']) . '||#|| '
                . ' OxiAddonsBanner-B-Right-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-B-Right-BT']) . '||#|| '
                . ' OxiAddonsBanner-B-Right-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-B-Right-BL']) . '||#|| '
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
                                <li  ref="#oxi-addons-tabs-2">Button Left</li> 
                                <li  ref="#oxi-addons-tabs-3">Button Right</li>
                            </ul> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsBanner-G-BG', $styledata, 3, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-G-P', 7, $styledata, 1, 'Padding', 'Set Banner  padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Position
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-G-BPS', $styledata[306], 'Position', 'Set Your Button Position', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-button', 'text-align');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-H-TB', $stylefiles[2], 'Heading', 'Set Banner Heading', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-H-FS', $styledata[23], $styledata[24], $styledata[25], '1', 'Font Size', 'Set Banner Heading Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-H-C', $styledata[33], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-H-F', 27, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-H-P', 35, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Heading Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                           echo oxi_addons_adm_help_Animation('OxiAddonsBanner-H-Animation', 51, $styledata, 'true');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-I-IB', $stylefiles[6], 'Icon', 'Set FontAwesome Icon class Name for Button', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-I-IL', $stylefiles[8], 'Icon Link', 'Set Banner Icon Link', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '   .oxi-addons-button-link .oxi-addons-text');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-I-IL-Tab', $styledata[100], 'Same Tab', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-I-FS', $styledata[298], $styledata[299], $styledata[300], '', 'Font Size', 'Set Banner Icon Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '   .oxi-addons-button-link .oxi-addons-text', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-I-TC', $styledata[302], '', 'Icon Color', 'Set Banner Icon color', '', '.oxi-addons-main-wrapper-' . $oxiid . '   .oxi-addons-button-link .oxi-addons-text', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-I-HTC', $styledata[304], '', 'Hover Color', 'Set Banner Hover Icon color', '', '.oxi-addons-main-wrapper-' . $oxiid . '   .oxi-addons-button-link .oxi-addons-text:hover', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-I-P', 79, $styledata, 1, 'Padding', 'Set Banner icon front Image padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '   .oxi-addons-button-link .oxi-addons-icon', 'padding');
                                            ?>
                                        </div> 
                                        <div class="oxi-head">
                                            Icon Position
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-IT-PS', $styledata[56], 'Position', 'Set banner icon position', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-icon', 'text-align');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Icon Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_Animation('OxiAddonsBanner-I-Animation', 95, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-text');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-IT', $stylefiles[4], 'Icon Text', 'Set Banner Icon Text', 'false','.oxi-addons-main-wrapper-' . $oxiid . '   .oxi-addons-button-link .oxi-addons-text');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-IT-FS', $styledata[284], $styledata[285], $styledata[286], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '   .oxi-addons-button-link .oxi-addons-icon', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-IT-TC', $styledata[294], '', 'Text Color', 'Set Banner icon Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-link .oxi-addons-icon', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-IT-HTC', $styledata[296], '', 'Hover Color', 'Set Banner icon Hover Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link .oxi-addons-icon:hover', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-IT-F', 288, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '   .oxi-addons-button-link .oxi-addons-icon');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-IT-P', 58, $styledata, 1, 'Padding', 'Set Banner front Image padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link .oxi-addons-text', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Icon Text Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                           echo oxi_addons_adm_help_Animation('OxiAddonsBanner-IT-Animation', 74, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-icon');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Left-BT', $stylefiles[10], 'Button Text', 'Set Banner Button Text', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Left-BL', $stylefiles[12], 'Button Link', 'Set Banner Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Left-Tab', $styledata[100], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-P', 154, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-M', 170, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Left-BS', 132, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Left-HBS', 142, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link:hover');
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-Left-FS', $styledata[102], $styledata[103], $styledata[104], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-TC', $styledata[112], '', 'Text Color', 'Set Banner Button Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-BG', $styledata[114], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-Left-B', $styledata[148], $styledata[149], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-BC', $styledata[152], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsBanner-B-Left-F', 106, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-BR', 116, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HTC', $styledata[138], '', 'Color', 'Set Banner Button Hover Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HBG', $styledata[140], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HBC', $styledata[308], '', 'Border Color', 'Set Banner Button Border Hover Text color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-left .oxi-addons-button-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Left-Animation', 186, $styledata, 'true', '.oxi-addons-button-left');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Right-BT', $stylefiles[14], 'Button Text', 'Set Banner Button Text', 'false','.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Right-BL', $stylefiles[16], 'Button Link', 'Set Banner Button Link', '');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Right-Tab', $styledata[191], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-P', 245, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-M', 261, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Right-BS', 223, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Right-HBS', 233, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link:hover');
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-Right-FS', $styledata[193], $styledata[194], $styledata[195], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-TC', $styledata[203], '', 'Text Color', 'Set Banner Button Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-BG', $styledata[205], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-Right-B', $styledata[239], $styledata[240], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-BC', $styledata[243], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsBanner-B-Right-F', 197, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-BR', 207, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HTC', $styledata[229], '', ' Color', 'Set Banner Button Hover Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HBG', $styledata[231], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HBC', $styledata[310], '', 'Border Color', 'Set Button Border Hover color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button-right .oxi-addons-button-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Right-Animation', 277, $styledata, 'true', '.oxi-addons-button-right');
                                            ?>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
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