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
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-BF-W') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-BF-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-BF-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-H-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-H-F') . ''
                . ' OxiAddonsBanner-H-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-H-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-H-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-H-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-SD-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-SD-F') . ''
                . ' OxiAddonsBanner-SD-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-SD-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-SD-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-SD-Animation') . '|'
                . ' OxiAddonsBanner-B-Left-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Left-Tab']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-Left-FS') . ''
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
                . ' OxiAddonsBanner-B-Middle-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Middle-Tab']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-Middle-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-B-Middle-F') . ''
                . ' OxiAddonsBanner-B-Middle-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Middle-TC']) . '|'
                . ' OxiAddonsBanner-B-Middle-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Middle-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Middle-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-Middle-BS') . ''
                . ' OxiAddonsBanner-B-Middle-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Middle-HTC']) . '|'
                . ' OxiAddonsBanner-B-Middle-HBG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Middle-HBG']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-Middle-HBS') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsBanner-B-Middle-B') . ''
                . ' OxiAddonsBanner-B-Middle-BC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Middle-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Middle-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-Middle-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-B-Middle-Animation') . '|'
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
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-G-P') . ''
                . ' OxiAddonsBanner-BF-PS |' . sanitize_text_field($_POST['OxiAddonsBanner-BF-PS']) . '|'
                . ' OxiAddonsBanner-B-Left-HBC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Left-HBC']) . '|'
                . ' OxiAddonsBanner-B-Middle-HBC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Middle-HBC']) . '|'
                . ' OxiAddonsBanner-B-Right-HBC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-Right-HBC']) . '|'
                . ' OxiAddonsBanner-G-BPS |' . sanitize_text_field($_POST['OxiAddonsBanner-G-BPS']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-BF-H') . ''
                . '||#||'
                . ' OxiAddonsBanner-BF-BG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-BF-BG']) . '||#|| '
                . ' OxiAddonsBanner-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-H-TB']) . '||#|| '
                . ' OxiAddonsBanner-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-SD-TA']) . '||#|| '
                . ' OxiAddonsBanner-B-Left-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-B-Left-BT']) . '||#|| '
                . ' OxiAddonsBanner-B-Left-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-B-Left-BL']) . '||#|| '
                . ' OxiAddonsBanner-B-Left-I-TB ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsBanner-B-Left-I-TB']) . '||#|| '
                . ' OxiAddonsBanner-B-Middle-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-B-Middle-BT']) . '||#|| '
                . ' OxiAddonsBanner-B-Middle-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-B-Middle-BL']) . '||#|| '
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
                                <li  ref="#oxi-addons-tabs-3">Button Middle</li>
                                <li  ref="#oxi-addons-tabs-4">Button Right</li>
                            </ul> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsBanner-G-BG', $styledata, 3, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' ', 'background');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-G-BPS', $styledata[395], 'Button Position', 'Set Your Button Position', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-G-P', 371, $styledata, 1, 'Padding', 'Set Banner  padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Logo
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_image_upload('OxiAddonsBanner-BF-BG', $stylefiles[2], 'Front Logo', 'Set Banner Front Logo', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-BF-W', $styledata[7], $styledata[8], $styledata[9], '1', 'Width', 'Set Banner Logo Image width', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-image .oxi-addons-image', 'width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-BF-H', $styledata[397], $styledata[398], $styledata[399], '1', 'Height', 'Set Banner Logo Image height', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-image .oxi-addons-image', 'height');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-BF-PS', $styledata[387], 'Position', 'Set banner front Logo position', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-image', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-BF-P', 11, $styledata, 1, 'Padding', 'Set Banner front Image padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-image', 'padding');
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-BF-Animation', 27, $styledata, 'true');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-H-TB', $stylefiles[4], 'Heading', 'Set Banner Heading', 'false','.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-H-FS', $styledata[32], $styledata[33], $styledata[34], '1', 'Font Size', 'Set Banner Heading Font Size', 'true', ' .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-H-C', $styledata[42], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-H-F', 36, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-H-P', 44, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading', 'padding');
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-H-Animation', 60, $styledata, 'true', '.oxi-addons-content-heading');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Short Details
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddonsBanner-SD-TA', $stylefiles[6],  'false','.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-detail');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-SD-FS', $styledata[65], $styledata[66], $styledata[67], '2', 'Font Size', 'Set Banner Short details Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-detail', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-SD-C', $styledata[75], '', 'Color', 'Set Banner Short Details Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-detail', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-SD-F', 69, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-detail');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-SD-P', 77, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '.oxi-addons-content .oxi-addons-content-detail', 'padding');
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-SD-Animation', 93, $styledata, 'true', '.oxi-addons-content-detail');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Left-BT', $stylefiles[8], 'Button Text', 'Set Banner Button Text', 'false','.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Left-BL', $stylefiles[10], 'Button Link', 'Set Banner Button Link', 'true');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Left-I-TB', $stylefiles[12], 'Icon', 'Set FontAwesome Icon class Name for Button', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Left-Tab', $styledata[98], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-P', 152, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-M', 168, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link', 'margin');
                                            ?>
                                        </div> 
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Left-BS', 130, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box Shadow 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Left-HBS', 140, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link:hover');
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-Left-FS', $styledata[100], $styledata[101], $styledata[102], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-BG', $styledata[112], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-TC', $styledata[110], '', 'Text Color', 'Set Banner Button Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-Left-B', $styledata[146], $styledata[147], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-BC', $styledata[150], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsBanner-B-Left-F', 104, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-BR', 114, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link', 'border-radius');
                                            ?>
                                        </div> 
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HTC', $styledata[136], '', 'Hover Color', 'Set Banner Button Hover Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HBG', $styledata[138], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HBC', $styledata[389], '', 'Border Color', 'Set Banner Button Hover Border  color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-left .oxi-addons-button-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Left-Animation', 184, $styledata, 'true', '.oxi-addons-button-left');
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-3">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Middle
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Middle-BT', $stylefiles[14], 'Button Text', 'Set Banner Button Text', 'false','.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Middle-BL', $stylefiles[16], 'Button Link', 'Set Banner Button Link', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Middle-Tab', $styledata[189], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Middle-P', 243, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Middle-M', 259, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'margin');
                                            ?>
                                        </div> 
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-Middle-FS', $styledata[191], $styledata[192], $styledata[193], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Middle-TC', $styledata[201], '', 'Text Color', 'Set Banner Button Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Middle-BG', $styledata[203], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-Middle-B', $styledata[237], $styledata[238], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Middle-BC', $styledata[241], '', 'Border Color', 'Set Border color', '', '', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsBanner-B-Middle-F', 195, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Middle-BR', 205, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'border-radius');
                                            ?>
                                        </div> 
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Middle-HTC', $styledata[227], '', 'Color', 'Set Banner Button Hover Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Middle-HBG', $styledata[229], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Middle-HBC', $styledata[391], '', 'Border Color', 'Set Banner Button Hover Border  color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link:hover', 'border-color');
                                            ?>
                                        </div> 
                                    </div>
                                </div> 
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                         <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Middle-BS', 221, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '.oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box Shadow 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Middle-HBS', 231, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link:hover');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Middle-Animation', 275, $styledata, 'true', '.oxi-addons-button-middle');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-4">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Right
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Right-BT', $stylefiles[18], 'Button Text', 'Set Banner Button Text', 'false','.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Right-BL', $stylefiles[20], 'Button Link', 'Set Banner Button Link', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Right-Tab', $styledata[280], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-M', 350, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link', 'margin');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-P', 334, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link', 'padding');
                                            ?>
                                        </div> 
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-Right-FS', $styledata[282], $styledata[283], $styledata[284], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-TC', $styledata[292], '', 'Text Color', 'Set Banner Button Text color', '', '', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-BG', $styledata[294], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-Right-B', $styledata[328], $styledata[329], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-BC', $styledata[332], '', 'Border Color', 'Set Border color', '', '', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsBanner-B-Right-F', 286, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-BR', 296, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HTC', $styledata[318], '', 'Hover Color', 'Set Banner Button Hover Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HBG', $styledata[320], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HBC', $styledata[393], '', 'Hover Border Color', 'Set Banner Button Hover Border  color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                </div> 
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Right-BS', 312, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box Shadow 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Right-HBS', 322, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-right .oxi-addons-button-link:hover');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Right-Animation', 366, $styledata, 'true', '.oxi-addons-button-right');
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