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
            .'OxiAddonsHeaders-G-PS |' . sanitize_text_field($_POST['OxiAddonsHeaders-G-PS']) . '|' 
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-G-M') . ''
            . ' OxiAddonsHeaders-B-PS |' . sanitize_text_field($_POST['OxiAddonsHeaders-B-PS']) . '|'
            . ' OxiAddonsHeaders-LS-BGC |' . sanitize_text_field($_POST['OxiAddonsHeaders-LS-BGC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-LS-P') . ''
            . '' . OxiAddonsBGImageSanitize('OxiAddonsHeaders-RS-BG') . '' 
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsHeaders-N-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsHeaders-N-F') . ''
            . ' OxiAddonsHeaders-N-C |' . sanitize_hex_color($_POST['OxiAddonsHeaders-N-C']) . '|'
            . ' OxiAddonsHeaders-N-BG |' . sanitize_text_field($_POST['OxiAddonsHeaders-N-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-N-P') . ''
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsHeaders-N-Animation') . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsHeaders-H-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsHeaders-H-F') . ''
            . ' OxiAddonsHeaders-H-C |' . sanitize_hex_color($_POST['OxiAddonsHeaders-H-C']) . '|' 
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-H-P') . ''
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsHeaders-H-Animation') . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsHeaders-SD-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsHeaders-SD-F') . ''
            . ' OxiAddonsHeaders-SD-C |' . sanitize_hex_color($_POST['OxiAddonsHeaders-SD-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-SD-P') . ''
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsHeaders-SD-Animation') . '|'  
            . ' OxiAddonsHeaders-B-L-Tab |' . sanitize_text_field($_POST['OxiAddonsHeaders-B-L-Tab']) . '|' 
            . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsHeaders-B-L-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsHeaders-B-L-F') . ''
            . ' OxiAddonsHeaders-B-L-TC |' . sanitize_hex_color($_POST['OxiAddonsHeaders-B-L-TC']) . '|'
            . ' OxiAddonsHeaders-B-L-BG |' . sanitize_text_field($_POST['OxiAddonsHeaders-B-L-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-B-L-BR') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsHeaders-B-L-BS') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsHeaders-B-L-B') . ''
            . ' OxiAddonsHeaders-B-L-BC |' . sanitize_hex_color($_POST['OxiAddonsHeaders-B-L-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-B-L-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-B-L-M') . ''
            . ' OxiAddonsHeaders-B-L-HTC |' . sanitize_hex_color($_POST['OxiAddonsHeaders-B-L-HTC']) . '|'
            . ' OxiAddonsHeaders-B-L-HBG |' . sanitize_text_field($_POST['OxiAddonsHeaders-B-L-HBG']) . '|'
            . ' OxiAddonsHeaders-B-L-HBC |' . sanitize_text_field($_POST['OxiAddonsHeaders-B-L-HBC']) . '|'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsHeaders-B-L-HBS') . ''
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsHeaders-B-L-Animation') . '|'
            . ' OxiAddonsHeaders-B-L-Tab |' . sanitize_text_field($_POST['OxiAddonsHeaders-B-R-Tab']) . '|' 
            . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsHeaders-B-R-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsHeaders-B-R-F') . ''
            . ' OxiAddonsHeaders-B-R-TC |' . sanitize_hex_color($_POST['OxiAddonsHeaders-B-R-TC']) . '|'
            . ' OxiAddonsHeaders-B-R-BG |' . sanitize_text_field($_POST['OxiAddonsHeaders-B-R-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-B-R-BR') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsHeaders-B-R-BS') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsHeaders-B-R-B') . ''
            . ' OxiAddonsHeaders-B-R-BC |' . sanitize_hex_color($_POST['OxiAddonsHeaders-B-R-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-B-R-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-B-R-M') . ''
            . ' OxiAddonsHeaders-B-R-HTC |' . sanitize_hex_color($_POST['OxiAddonsHeaders-B-R-HTC']) . '|'
            . ' OxiAddonsHeaders-B-R-HBG |' . sanitize_text_field($_POST['OxiAddonsHeaders-B-R-HBG']) . '|'
            . ' OxiAddonsHeaders-B-R-HBC |' . sanitize_text_field($_POST['OxiAddonsHeaders-B-R-HBC']) . '|'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsHeaders-B-R-HBS') . ''
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsHeaders-B-R-Animation') . '|' 
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsHeaders-N-M') . ''
            . '||#||' 
            . ' OxiAddonsHeaders-N-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsHeaders-N-TB']) . '||#|| '
            . ' ||#|| ||#|| '
            . ' OxiAddonsHeaders-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsHeaders-H-TB']) . '||#|| '
            . ' OxiAddonsHeaders-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsHeaders-SD-TA']) . '||#|| ' 
            . ' OxiAddonsHeaders-B-L-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsHeaders-B-L-BT']) . '||#|| '
            . ' OxiAddonsHeaders-B-L-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsHeaders-B-L-BL']) . '||#|| ' 
            . ' OxiAddonsHeaders-B-R-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsHeaders-B-R-BT']) . '||#|| '
            . ' OxiAddonsHeaders-B-R-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsHeaders-B-R-BL']) . '||#|| ' 
            . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);


// echo "<pre>";
// print_r($styledata);
// echo "</pre>";
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
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsHeaders-G-PS', $styledata[3], 'Left', 'left', 'Right', 'right', 'Position Reverse', 'Set Image and content position of The Headers Image and Content', 'false');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsHeaders-B-PS', $styledata[21], 'Button Position', 'Set Headers button Position', 'false');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-G-M', 5, $styledata, 1, 'Margin', 'Set Headers margin', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Left side Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-LS-BGC', $styledata[23], 'rgba', 'Background Color', 'Set Headers Button Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-wrapper-left-side', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-LS-P', 25, $styledata, 1, 'Padding', 'Set headers  padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-wrapper-left-side', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Right Side Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsHeaders-RS-BG', $styledata, 41, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-wrapper-right-side', 'background');
                                             ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Name
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsHeaders-N-TB', $stylefiles[2], 'Name', 'Write a Person Name', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-name');
//                                            echo oxi_addons_adm_help_textbox('OxiAddonsHeaders-N-Letter', $stylefiles[4], 'Letter Space', 'Set Name Letter Space ', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsHeaders-N-FS', $styledata[45], $styledata[46], $styledata[47], '1', 'Font Size', 'Set Headers Name Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-name', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-N-C', $styledata[55], '', 'Color', 'Set Headers Name Text color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-name', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-N-BG', $styledata[57], 'rgba', 'Background Color', 'Set Headers Name Background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-name', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsHeaders-N-F', 49, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-name');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-N-P', 59, $styledata, 1, 'Padding', 'Set Headers Name Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-name', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-N-M', 332, $styledata, 1, 'Margin', 'Set Headers  Name Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-name', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                           echo oxi_addons_adm_help_Animation('OxiAddonsHeaders-N-Animation', 75, $styledata, 'true', '.oxi-addons-heading-two');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsHeaders-H-TB', $stylefiles[6], 'Heading', 'Set Headers Heading', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading');
                                             echo oxi_addons_adm_help_number_dtm('OxiAddonsHeaders-H-FS', $styledata[80], $styledata[81], $styledata[82], '1', 'Font Size', 'Set Headers Heading Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-H-C', $styledata[90], '', 'Color', 'Set Headers Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsHeaders-H-F', 84, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-H-P', 92, $styledata, 1, 'Padding', 'Set Headers  Heading Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading', 'padding');
                                           ?>
                                        </div>
                                        <div class="oxi-head">
                                           Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsHeaders-H-Animation', 108, $styledata, 'true', '.oxi-addons-heading-two');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Short Details
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddonsHeaders-SD-TA', $stylefiles[8], 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-short-detail');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsHeaders-SD-FS', $styledata[113], $styledata[114], $styledata[115], '2', 'Font Size', 'Set Headers Short details Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-short-detail', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-SD-C', $styledata[123], '', 'Color', 'Set Headers Short Details Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-short-detail', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsHeaders-SD-F', 117, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-short-detail');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-SD-P', 125, $styledata, 1, 'Padding', 'Set Headers Short Details Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-short-detail', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsHeaders-SD-Animation', 141, $styledata, 'true', '.oxi-addons-short-detail');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsHeaders-B-L-BT', $stylefiles[10], 'Button Text', 'Set Headers Button Text', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsHeaders-B-L-BL', $stylefiles[12], 'Button Link', 'Set Headers Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsHeaders-B-L-Tab', $styledata[146], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-B-L-P', 190, $styledata, 1, 'Padding', 'Set Headers Button padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-B-L-M', 206, $styledata, 1, 'Margin', 'Set Headers Button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsHeaders-B-L-FS', $styledata[148], $styledata[149], $styledata[150], '', 'Font Size', 'Set Headers Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-L-TC', $styledata[158], '', 'Text Color', 'Set Headers Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-L-BG', $styledata[160], 'rgba', 'Background Color', 'Set Headers Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsHeaders-B-L-B', $styledata[184], $styledata[185], 'Border', 'Set Headers Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-L-BC', $styledata[188], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsHeaders-B-L-F', 152, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-B-L-BR', 162, $styledata, 1, 'Border Radius', 'Set Headers Button Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsHeaders-B-L-Animation', 234, $styledata, 'true', '.oxi-addons-main-button');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsHeaders-B-L-BS', 178, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-L-HTC', $styledata[222], '', 'Color', 'Set Headers Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-L-HBG', $styledata[224], 'rgba', 'Background Color', 'Set Headers Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-L-HBC', $styledata[226], '', 'Border Color', 'Set Headers Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left:hover', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Box shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsHeaders-B-L-HBS', 228, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-left:hover');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-3">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Left
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsHeaders-B-R-BT', $stylefiles[14], 'Button Text', 'Set Headers Button Text', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsHeaders-B-R-BL', $stylefiles[16], 'Button Link', 'Set Headers Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsHeaders-B-R-Tab', $styledata[239], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-B-R-P', 283, $styledata, 1, 'Padding', 'Set Headers Button padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-B-R-M', 299, $styledata, 1, 'Margin', 'Set Headers Button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsHeaders-B-R-FS', $styledata[241], $styledata[242], $styledata[243], '', 'Font Size', 'Set Headers Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-R-TC', $styledata[251], '', 'Text Color', 'Set Headers Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-R-BG', $styledata[253], 'rgba', 'Background Color', 'Set Headers Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsHeaders-B-R-B', $styledata[277], $styledata[278], 'Border', 'Set Headers Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-R-BC', $styledata[281], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsHeaders-B-R-F', 245, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsHeaders-B-R-BR', 255, $styledata, 1, 'Border Radius', 'Set Headers Button Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsHeaders-B-R-Animation', 327, $styledata, 'true', '.oxi-addons-main-button');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsHeaders-B-R-BS', 271, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-R-HTC', $styledata[315], '', 'Color', 'Set Headers Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-R-HBG', $styledata[317], 'rgba', 'Background Color', 'Set Headers Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsHeaders-B-R-HBC', $styledata[319], '', 'Border Color', 'Set Headers Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right:hover', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Box shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsHeaders-B-R-HBS', 321, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link-right:hover');
                                            ?>
                                        </div>
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

                </form>

            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_quick_tutorials('yPu6qV5byu4');
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