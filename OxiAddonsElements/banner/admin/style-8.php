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
                . ' OxiAddonsBanner-OV-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-OV-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-OV-P') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-OV-BS') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-H-O-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-H-O-F') . ''
                . ' OxiAddonsBanner-H-O-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-H-O-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-H-O-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-H-O-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-H-T-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-H-T-F') . ''
                . ' OxiAddonsBanner-H-T-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-H-T-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-H-T-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-H-T-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-Line-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-Line-H') . ''
                . ' OxiAddonsBanner-Line-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-Line-BG']) . '|'
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-Line-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-SD-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-SD-F') . ''
                . ' OxiAddonsBanner-SD-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-SD-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-SD-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-SD-Animation') . '|'
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
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-Right-FS') . ''
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
                . ' OxiAddonsBanner-G-BP |' . sanitize_text_field($_POST['OxiAddonsBanner-G-BP']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-OV-W') . ''
                . ' OxiAddonsBanner-OV-PS |' . sanitize_text_field($_POST['OxiAddonsBanner-OV-PS']) . '|'
                . ' OxiAddonsBanner-B-Left-HBC |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Left-HBC']) . '|'
                . ' OxiAddonsBanner-B-Right-HBC |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Right-HBC']) . '|'
                . '||#||'
                . ' OxiAddonsBanner-H-O-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-H-O-TB']) . '||#|| '
                . ' OxiAddonsBanner-H-T-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-H-T-TB']) . '||#|| '
                . ' OxiAddonsBanner-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-SD-TA']) . '||#|| '
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
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
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsBanner-G-BG', $styledata, 3, 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'background');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-G-BP', $styledata[343], 'Button Position', 'Set Your Banner Button Position', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-G-P', 7, $styledata, 1, 'Padding', 'Set Banner  padding', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Overlay
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-OV-BG', $styledata[23], 'rgba', 'Background', 'Set Banner Overlay Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-bg', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-OV-W', $styledata[345], $styledata[346], $styledata[347], '', 'Width', 'Set Your Banner Over width', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-bg', 'width');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-OV-PS', $styledata[349], 'Position', 'Set Your Overlay Position', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'text-align');
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-OV-BS', 41, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-bg');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-OV-P', 25, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-bg', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Line
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsBanner-Line-W', $styledata[113], $styledata[114], $styledata[115], 'OxiAddonsBanner-Line-H', $styledata[117], $styledata[118], $styledata[118], 1, 'Width Height', 'Set Banner Line width and height | example: width:5px; height: 100%', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-Line-BG', $styledata[121], '', 'Background', 'Set Banner Line Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-line::before', 'background');
                                            echo OxiAddonsADMHelpNoJquery(
                                                    array(
                                                        array('OxiAddonsBanner-Line-W', 'width'),
                                                        array('OxiAddonsBanner-Line-H', 'height'),
                                                    )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                           Line Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                           echo oxi_addons_adm_help_Animation('OxiAddonsBanner-Line-Animation', 123, $styledata, 'true', '.oxi-addons-line');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading One
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-H-O-TB', $stylefiles[2], 'Heading One', 'Set Banner Heading', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-heading-one');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-H-O-FS', $styledata[47], $styledata[48], $styledata[49], '1', 'Font Size', 'Set Banner Heading Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-heading-one', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-H-O-C', $styledata[57], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-heading-one', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-H-O-F', 51, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-heading-one');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-H-O-P', 59, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-header .oxi-addons-heading-one', 'padding');
                                            
                                            ?>
                                        </div>
                                         <div class="oxi-head">
                                            Heading Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-H-O-Animation', 75, $styledata, 'true', '.oxi-addons-heading-one');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading Two
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-H-T-TB', $stylefiles[4], 'Heading Two', 'Set Banner Heading', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-two');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-H-T-FS', $styledata[80], $styledata[81], $styledata[82], '1', 'Font Size', 'Set Banner Heading Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-two', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-H-T-C', $styledata[90], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-two', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-H-T-F', 84, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-two');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-H-T-P', 92, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-two', 'padding');
                                            
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Heading Two Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-H-T-Animation', 108, $styledata, 'true', '.oxi-addons-heading-two');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Short Details
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddonsBanner-SD-TA', $stylefiles[6], 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-details');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-SD-FS', $styledata[128], $styledata[129], $styledata[130], '2', 'Font Size', 'Set Banner Short details Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-details', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-SD-C', $styledata[138], '', 'Color', 'Set Banner Short Details Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-details', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-SD-F', 132, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-details');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-SD-P', 140, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-details', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Details Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-SD-Animation', 156, $styledata, 'true', '.oxi-addons-details');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Left-BT', $stylefiles[8], 'Button Text', 'Set Banner Button Text', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Left-BL', $stylefiles[10], 'Button Link', 'Set Banner Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Left-Tab', $styledata[161], 'normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-P', 215, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-M', 231, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Left-BS', 193, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Left-HBS', 203, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link:hover');
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-Left-FS', $styledata[163], $styledata[164], $styledata[165], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-TC', $styledata[173], '', 'Text Color', 'Set Banner Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-BG', $styledata[175], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-Left-B', $styledata[209], $styledata[210], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link', 'border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-BC', $styledata[213], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsBanner-B-Left-F', 167, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Left-BR', 177, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HTC', $styledata[199], '', 'Color', 'Set Banner Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HBG', $styledata[201], '', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Left-HBC', $styledata[351], '', 'Border Color', 'Set Banner Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Left-Animation', 247, $styledata, 'true', '.oxi-addons-button-left .oxi-addons-link');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Right-BT', $stylefiles[12], 'Button Text', 'Set Banner Button Text', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-Right-BL', $stylefiles[14], 'Button Link', 'Set Banner Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Right-Tab', $styledata[252], 'Normal', '', 'Normal', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-P', 306, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-M', 322, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Right-BS', 284, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link');
                                            ?>
                                        </div>
                                         <div class="oxi-head">
                                            Button Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-Right-HBS', 294, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link:hover');
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-Right-FS', $styledata[254], $styledata[255], $styledata[256], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-TC', $styledata[264], '', 'Text Color', 'Set Banner Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-BG', $styledata[266], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-Right-B', $styledata[300], $styledata[301], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-BC', $styledata[304], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsBanner-B-Right-F', 258, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-Right-BR', 268, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HTC', $styledata[290], '', 'Color', 'Set Banner Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HBG', $styledata[292], '', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-Right-HBC', $styledata[353], '', 'Border Color', 'Set Banner Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Right-Animation', 338, $styledata, 'true', '.oxi-addons-button-right .oxi-addons-link');
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