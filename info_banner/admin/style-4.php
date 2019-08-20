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
                . ' OxiAddonsInfoBanner-G-BG-PS |' . sanitize_text_field($_POST['OxiAddonsInfoBanner-G-BG-PS']) . '|'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsInfoBanner-G-BG') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoBanner-G-P') . '' 
                . '' . oxi_addons_adm_help_single_size('OxiAddInfoBanner-icon-size') . ''
                . ' OxiAddInfoBanner-icon-color |' . sanitize_hex_color($_POST['OxiAddInfoBanner-icon-color']) . '|' 
                . ' OxiAddInfoBanner-icon-Bg |' . sanitize_text_field($_POST['OxiAddInfoBanner-icon-Bg']) . '|'
                . ' OxiAddInfoBanner-icon-position |' . sanitize_text_field($_POST['OxiAddInfoBanner-icon-position']) . '|' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-icon-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-icon-radius') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddInfoBanner-icon-box-shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddInfoBanner-icon-animation') . '' 
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsInfoBanner-H-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsInfoBanner-H-F') . ''
                . ' OxiAddonsInfoBanner-H-C |' . sanitize_hex_color($_POST['OxiAddonsInfoBanner-H-C']) . '|'
                . ' OxiAddonsInfoBanner-H-S-C |' . sanitize_hex_color($_POST['OxiAddonsInfoBanner-H-S-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoBanner-H-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsInfoBanner-H-Animation') . '|' 
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsInfoBanner-SD-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsInfoBanner-SD-F') . ''
                . ' OxiAddonsInfoBanner-SD-C |' . sanitize_hex_color($_POST['OxiAddonsInfoBanner-SD-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoBanner-SD-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsInfoBanner-SD-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsInfoBanner-F-IMG-W') . '' 
                . ' OxiAddInfoBanner-IMG-Auto |' . sanitize_text_field($_POST['OxiAddInfoBanner-IMG-Auto']) . '|' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoBanner-F-IMG-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsInfoBanner-F-IMG-Animation') . '|'
                . ' OxiAddonsInfoBanner-B-Tab |' . sanitize_text_field($_POST['OxiAddonsInfoBanner-B-Tab']) . '|'
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsInfoBanner-B-FS') . ''
                . ' OxiAddonsInfoBanner-G-BPS |' . sanitize_text_field($_POST['OxiAddonsInfoBanner-G-BPS']) . '|' 
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsInfoBanner-B-F') . ''
                . ' OxiAddonsInfoBanner-B-TC |' . sanitize_hex_color($_POST['OxiAddonsInfoBanner-B-TC']) . '|'
                . ' OxiAddonsInfoBanner-B-BG |' . sanitize_text_field($_POST['OxiAddonsInfoBanner-B-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoBanner-B-BR') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsInfoBanner-B-B') . ''
                . ' OxiAddonsInfoBanner-B-BC |' . sanitize_hex_color($_POST['OxiAddonsInfoBanner-B-BC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsInfoBanner-B-BS') . ''
                . ' OxiAddonsInfoBanner-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsInfoBanner-B-HTC']) . '|'
                . ' OxiAddonsInfoBanner-B-HBG |' . sanitize_text_field($_POST['OxiAddonsInfoBanner-B-HBG']) . '|'
                . ' OxiAddonsInfoBanner-B-HBC |' . sanitize_hex_color($_POST['OxiAddonsInfoBanner-B-HBC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsInfoBanner-B-HBS') . '' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoBanner-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoBanner-B-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsInfoBanner-B-Animation') . '|'  
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddInfoBanner-icon-width') . '' 
                . '||#||' 
                . 'OxiAddInfoBanner-i-class ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddInfoBanner-i-class']) . '||#||'
                . ' OxiAddonsInfoBanner-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsInfoBanner-H-TB']) . '||#|| '
                . ' OxiAddonsInfoBanner-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsInfoBanner-SD-TA']) . '||#|| '
                . ' OxiAddonsInfoBanner-F-IMG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsInfoBanner-F-IMG']) . '||#|| '
                . ' OxiAddonsInfoBanner-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsInfoBanner-B-BT']) . '||#|| '
                . ' OxiAddonsInfoBanner-B-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsInfoBanner-B-BL']) . '||#|| ' 
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '','',''); ?>
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
                                            echo oxi_addons_adm_help_true_false('OxiAddonsInfoBanner-G-BG-PS', $styledata[3], 'Left', 'left', 'Right', 'right', 'Position Reverse', 'Set Image and content position of banner', 'false');
                                             echo OxiAddonsADMHelpBGImage('OxiAddonsInfoBanner-G-BG', $styledata, 5, 'true','.oxi-addons-wrapper-' . $oxiid . '','background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoBanner-G-P', 9, $styledata, 1, 'Padding', 'Set Banner  padding', 'true','.oxi-addons-wrapper-' . $oxiid . '','padding');
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                           Icon Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_textbox('OxiAddInfoBanner-i-class', $stylefiles[2], 'Icon Class', 'Set your Icon Class');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddInfoBanner-icon-size', $styledata[25], $styledata[26], $styledata[27], 1, 'Font Size', 'Select Your Icon Font Size', 'true', '  .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'font-size');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddInfoBanner-icon-width', $styledata[267], $styledata[268], $styledata[269], 1, 'Width', 'Select Your Icon Width And Height', 'true');
                                                echo oxi_addons_adm_help_MiniColor('OxiAddInfoBanner-icon-color', $styledata[29], '', 'Color', 'Select Your Icon Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'color');
                                                echo oxi_addons_adm_help_MiniColor('OxiAddInfoBanner-icon-Bg', $styledata[31], 'rgba', 'Background Color', 'Select Your content box Background Color', 'true', '  .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'background');
                                                echo oxi_addons_adm_help_Text_Align('OxiAddInfoBanner-icon-position', $styledata[33], 'Text-align', 'Set Your Icon Postion', 'true');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-icon-radius', 51, $styledata, 1, 'Border Radius', 'Set Your Content Boxes Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'border-radius');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-icon-padding', 35, $styledata, 1, 'Padding', 'Set Your Icon Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'padding');
                                                echo OxiAddonsADMhelpBoxShadow('OxiAddInfoBanner-icon-box-shadow', 67, $styledata, 'true', '  .oxi-addons-wrapper-' . $oxiid . '.oxi-addons-content-boxes-icon .oxi-icons');
                                                echo OxiAddonsADMHelpNoJquery(
                                                    array(
                                                    array('OxiAddInfoBanner-icon-width','width and height'), 
                                                    array('OxiAddInfoBanner-icon-position','Icon Position'), 
                                                )
                                            );
                                              ?>
                                        </div>
                                        <div class="oxi-head">
                                          Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                             echo oxi_addons_adm_help_Animation('OxiAddInfoBanner-icon-animation', 73, $styledata, 'true', '.oxi-addons-content-boxes-icon');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Banner Front Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_image_upload('OxiAddonsInfoBanner-F-IMG', $stylefiles[8], 'Front Image', 'Set Your Front Image', 'false');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddonsInfoBanner-F-IMG-W',$styledata[145],$styledata[146],$styledata[147],'1','Width','Set Image Width','true');
                                                echo oxi_addons_adm_help_true_false('OxiAddInfoBanner-IMG-Auto', $styledata[149], 'Auto', 'auto', 'Manual', 'manual', 'Manual Or Auto', 'Set Manual width Or auto Width', 'true');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoBanner-F-IMG-P', 151, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-left','padding');
                                                echo OxiAddonsADMHelpNoJquery(
                                                    array(
                                                        array('OxiAddonsInfoBanner-F-IMG-W','width'), 
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_Animation('OxiAddonsInfoBanner-F-IMG-Animation', 167, $styledata, 'true','.oxi-addons-image');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsInfoBanner-H-TB', $stylefiles[4], 'Heading ', 'Set Banner Heading', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsInfoBanner-H-FS', $styledata[77], $styledata[78], $styledata[79], '1', 'Font Size', 'Set Banner Heading Font Size', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoBanner-H-C', $styledata[87], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoBanner-H-S-C', $styledata[89], '', 'Second Color', 'Set Banner Heading Text Span color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two > span', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsInfoBanner-H-F', 81, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoBanner-H-P', 91, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two','padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                           Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsInfoBanner-H-Animation', 107, $styledata, 'true','.oxi-addons-heading-two');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Short Details
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddonsInfoBanner-SD-TA', $stylefiles[6], 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsInfoBanner-SD-FS', $styledata[112], $styledata[113], $styledata[114], '2', 'Font Size', 'Set Banner Short details Font Size', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail', 'font-size');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsInfoBanner-SD-F', 116, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoBanner-SD-C', $styledata[122], '', 'Color', 'Set Banner Short Details Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoBanner-SD-P', 124, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-short-detail','padding');
                                           ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_Animation('OxiAddonsInfoBanner-SD-Animation', 140, $styledata, 'true','.oxi-addons-short-detail');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsInfoBanner-B-BT', $stylefiles[10], 'Button Text', 'Set Banner Button Text', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsInfoBanner-B-BL', $stylefiles[12], 'Button Link', 'Set Banner Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsInfoBanner-B-Tab', $styledata[172], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoBanner-B-P', 230, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link','padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoBanner-B-M', 246, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link','margin');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsInfoBanner-B-FS', $styledata[174], $styledata[175], $styledata[176], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoBanner-B-TC', $styledata[186], '', 'Text Color', 'Set Banner Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoBanner-B-BG', $styledata[188], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsInfoBanner-B-B', $styledata[206], $styledata[207], 'Border', 'Set Banner Border Size and Type', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoBanner-B-BC', $styledata[210], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsInfoBanner-B-F', 180, $styledata, 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoBanner-B-BR', 190, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link','border-radius');
                                            ?>
                                        </div>
                                    </div> 

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Position
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                             echo oxi_addons_adm_help_Text_Align('OxiAddonsInfoBanner-G-BPS', $styledata[178], 'Button Position', 'Set Your Button Position', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-button', 'text-align');
                                             ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsInfoBanner-B-Animation', 262, $styledata, 'true','.oxi-addons-button-left');
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
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsInfoBanner-B-BS', 212, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoBanner-B-HTC', $styledata[218], '', 'Color', 'Set Banner Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoBanner-B-HBG', $styledata[220], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoBanner-B-HBC', $styledata[222], '', 'Border Color', 'Set Banner Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsInfoBanner-B-HBS', 224, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover');
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