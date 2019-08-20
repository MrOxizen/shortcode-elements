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
                . '' . OxiAddonsBGImageSanitize('OxiaddonsInfoBanner-G-BG') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiaddonsInfoBanner-G-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiaddonsInfoBanner-H-O-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiaddonsInfoBanner-H-O-F') . ''
                . ' OxiaddonsInfoBanner-H-O-C |' . sanitize_hex_color($_POST['OxiaddonsInfoBanner-H-O-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiaddonsInfoBanner-H-O-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiaddonsInfoBanner-H-O-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiaddonsInfoBanner-H-T-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiaddonsInfoBanner-H-T-F') . ''
                . ' OxiaddonsInfoBanner-H-T-C |' . sanitize_hex_color($_POST['OxiaddonsInfoBanner-H-T-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiaddonsInfoBanner-H-T-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiaddonsInfoBanner-H-T-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiaddonsInfoBanner-Line-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiaddonsInfoBanner-Line-H') . ''
                . ' OxiaddonsInfoBanner-Line-BG |' . sanitize_text_field($_POST['OxiaddonsInfoBanner-Line-BG']) . '|'
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiaddonsInfoBanner-Line-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiaddonsInfoBanner-SD-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiaddonsInfoBanner-SD-F') . ''
                . ' OxiaddonsInfoBanner-SD-C |' . sanitize_hex_color($_POST['OxiaddonsInfoBanner-SD-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiaddonsInfoBanner-SD-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiaddonsInfoBanner-SD-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiaddonsInfoBanner-F-IMG-W') . ''
                . '||||' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiaddonsInfoBanner-F-IMG-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiaddonsInfoBanner-F-IMG-Animation') . '|'
                . ' OxiaddonsInfoBanner-B-Tab |' . sanitize_text_field($_POST['OxiaddonsInfoBanner-B-Tab']) . '|'
                . oxi_addons_adm_help_number_dtm_senitize('OxiaddonsInfoBanner-B-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiaddonsInfoBanner-B-F') . ''
                . ' OxiaddonsInfoBanner-B-TC |' . sanitize_hex_color($_POST['OxiaddonsInfoBanner-B-TC']) . '|'
                . ' OxiaddonsInfoBanner-B-BG |' . sanitize_text_field($_POST['OxiaddonsInfoBanner-B-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiaddonsInfoBanner-B-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiaddonsInfoBanner-B-BS') . ''
                . ' OxiaddonsInfoBanner-B-HTC |' . sanitize_hex_color($_POST['OxiaddonsInfoBanner-B-HTC']) . '|'
                . ' OxiaddonsInfoBanner-B-HBG |' . sanitize_text_field($_POST['OxiaddonsInfoBanner-B-HBG']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiaddonsInfoBanner-B-HBS') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiaddonsInfoBanner-B-B') . ''
                . ' OxiaddonsInfoBanner-B-BC |' . sanitize_hex_color($_POST['OxiaddonsInfoBanner-B-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiaddonsInfoBanner-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiaddonsInfoBanner-B-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiaddonsInfoBanner-B-Animation') . '|' 
                . ' OxiaddonsInfoBanner-G-BG-PS |' . sanitize_text_field($_POST['OxiaddonsInfoBanner-G-BG-PS']) . '|'
                . ' OxiaddonsInfoBanner-G-BPS |' . sanitize_text_field($_POST['OxiaddonsInfoBanner-G-BPS']) . '|'
                . ' OxiaddonsInfoBanner-B-HBC |' . sanitize_hex_color($_POST['OxiaddonsInfoBanner-B-HBC']) . '|'
                . ' OxiAddInfoBanner-IMG-Auto |' . sanitize_text_field($_POST['OxiAddInfoBanner-IMG-Auto']) . '|' 
                . ' OxiaddonsInfoBanner-H-S-C |' . sanitize_hex_color($_POST['OxiaddonsInfoBanner-H-S-C']) . '|'
                . '||#||'
                . ' OxiaddonsInfoBanner-H-O-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiaddonsInfoBanner-H-O-TB']) . '||#|| '
                . ' OxiaddonsInfoBanner-H-T-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiaddonsInfoBanner-H-T-TB']) . '||#|| '
                . ' OxiaddonsInfoBanner-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiaddonsInfoBanner-SD-TA']) . '||#|| '
                . ' OxiaddonsInfoBanner-F-IMG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiaddonsInfoBanner-F-IMG']) . '||#|| '
                . ' OxiaddonsInfoBanner-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiaddonsInfoBanner-B-BT']) . '||#|| '
                . ' OxiaddonsInfoBanner-B-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiaddonsInfoBanner-B-BL']) . '||#|| ' 
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '','','yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li  ref="#oxi-addons-tabs-2">Button</li>  
                            </ul> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiaddonsInfoBanner-G-BG-PS', $styledata[257], 'Left', 'left', 'Right', 'right', 'Position Reverse', 'Set Image and content position of banner', 'false');
                                            echo oxi_addons_adm_help_Text_Align('OxiaddonsInfoBanner-G-BPS', $styledata[259], 'Button Position', 'Set Your Button Position', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-button', 'text-align');
                                            echo OxiAddonsADMHelpBGImage('OxiaddonsInfoBanner-G-BG', $styledata, 3, 'true','.oxi-addons-wrapper-' . $oxiid . '','background');
                                            echo oxi_addons_adm_help_padding_margin('OxiaddonsInfoBanner-G-P', 7, $styledata, 1, 'Padding', 'Set Banner  padding', 'true','.oxi-addons-wrapper-' . $oxiid . '','padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Banner Front Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_image_upload('OxiaddonsInfoBanner-F-IMG', $stylefiles[8], 'Front Image', 'Set Your Event Author', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiaddonsInfoBanner-F-IMG-W',$styledata[137],$styledata[138],$styledata[139],'1','Width','Set Image Width','false');
                                            echo oxi_addons_adm_help_true_false('OxiAddInfoBanner-IMG-Auto', $styledata[263], 'Auto', 'auto', 'Manual', 'manual', 'Manual Or Auto', 'Set Manual width Or auto Width', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiaddonsInfoBanner-F-IMG-P', 145, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left','padding');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiaddonsInfoBanner-F-IMG-W','width'), 
                                                )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                           Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                              echo oxi_addons_adm_help_Animation('OxiaddonsInfoBanner-F-IMG-Animation', 161, $styledata, 'true','.oxi-addons-image');
                                             ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading One
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiaddonsInfoBanner-H-O-TB', $stylefiles[2], 'Heading One', 'Set Banner Heading', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-one');
                                            echo oxi_addons_adm_help_number_dtm('OxiaddonsInfoBanner-H-O-FS', $styledata[23], $styledata[24], $styledata[25], '1', 'Font Size', 'Set Banner Heading Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-one', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-H-O-C', $styledata[33], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-one', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiaddonsInfoBanner-H-O-F', 27, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-one');
                                            echo oxi_addons_adm_help_padding_margin('OxiaddonsInfoBanner-H-O-P', 35, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-one','padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                           Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiaddonsInfoBanner-H-O-Animation', 51, $styledata, 'true','.oxi-addons-heading-one');
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading Two
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiaddonsInfoBanner-H-T-TB', $stylefiles[4], 'Heading Two', 'Set Banner Heading', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two');
                                            echo oxi_addons_adm_help_number_dtm('OxiaddonsInfoBanner-H-T-FS', $styledata[56], $styledata[57], $styledata[58], '1', 'Font Size', 'Set Banner Heading Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-H-T-C', $styledata[66], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-H-S-C', $styledata[265], '', 'Second Color', 'Set Banner Heading Text Span color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two > span', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiaddonsInfoBanner-H-T-F', 60, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two');
                                            echo oxi_addons_adm_help_padding_margin('OxiaddonsInfoBanner-H-T-P', 68, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two','padding');
                                           ?>
                                        </div> 
                                        <div class="oxi-head">
                                           Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiaddonsInfoBanner-H-T-Animation', 84, $styledata, 'true','.oxi-addons-heading-two');
                                            ?>
                                        </div>

                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            line
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiaddonsInfoBanner-Line-W', $styledata[89], $styledata[90], $styledata[91], 'OxiaddonsInfoBanner-Line-H', $styledata[93], $styledata[94], $styledata[95], 1, 'Width Height', 'Set Banner Line width and height | example: width:5px; height: 100%', 'false');
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-Line-BG', $styledata[97], '', 'Background', 'Set Banner Line Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-line::after', 'background');
                                           echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiaddonsInfoBanner-Line-W','width'), 
                                                )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiaddonsInfoBanner-Line-Animation', 99, $styledata, 'true','.oxi-addons-line');
                                             ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Short Details
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiaddonsInfoBanner-SD-TA', $stylefiles[6], 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail');
                                            echo oxi_addons_adm_help_number_dtm('OxiaddonsInfoBanner-SD-FS', $styledata[104], $styledata[105], $styledata[106], '2', 'Font Size', 'Set Banner Short details Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-SD-C', $styledata[114], '', 'Color', 'Set Banner Short Details Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiaddonsInfoBanner-SD-F', 108, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail');
                                            echo oxi_addons_adm_help_padding_margin('OxiaddonsInfoBanner-SD-P', 116, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail','padding');
                                             ?>
                                        </div>
                                        <div class="oxi-head">
                                           Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                           echo oxi_addons_adm_help_Animation('OxiaddonsInfoBanner-SD-Animation', 132, $styledata, 'true','.oxi-addons-short-detail');
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
                                            echo oxi_addons_adm_help_textbox('OxiaddonsInfoBanner-B-BT', $stylefiles[10], 'Button Text', 'Set Banner Button Text', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_textbox('OxiaddonsInfoBanner-B-BL', $stylefiles[12], 'Button Link', 'Set Banner Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiaddonsInfoBanner-B-Tab', $styledata[166], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiaddonsInfoBanner-B-P', 220, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link','padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiaddonsInfoBanner-B-M', 236, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link','margin');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiaddonsInfoBanner-B-FS', $styledata[168], $styledata[169], $styledata[170], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-B-TC', $styledata[178], '', 'Text Color', 'Set Banner Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-B-BG', $styledata[180], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiaddonsInfoBanner-B-B', $styledata[214], $styledata[215], 'Border', 'Set Banner Border Size and Type', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-B-BC', $styledata[218], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link', 'border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiaddonsInfoBanner-B-F', 172, $styledata, 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiaddonsInfoBanner-B-BR', 182, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link','border-radius');
                                            ?>
                                        </div>
                                    </div> 

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiaddonsInfoBanner-B-Animation', 252, $styledata, 'true','.oxi-addons-button-left');
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
                                            echo OxiAddonsADMhelpBoxShadow('OxiaddonsInfoBanner-B-BS', 198, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-B-HTC', $styledata[204], '', 'Color', 'Set Banner Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-B-HBG', $styledata[206], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiaddonsInfoBanner-B-HBC', $styledata[261], '', 'Border Color', 'Set Banner Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiaddonsInfoBanner-B-HBS', 208, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover');
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