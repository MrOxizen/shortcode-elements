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
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-H-O-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-H-O-F') . ''
                . ' OxiAddonsBanner-H-O-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-H-O-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-H-O-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-H-O-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-H-OB-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-H-OB-F') . ''
                . ' OxiAddonsBanner-H-OB-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-H-OB-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-H-OB-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-Line-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-Line-H') . ''
                . ' OxiAddonsBanner-Line-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-Line-BG']) . '|'
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-Line-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-H-T-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-H-T-F') . ''
                . ' OxiAddonsBanner-H-T-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-H-T-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-H-T-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-H-T-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-SD-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-SD-F') . ''
                . ' OxiAddonsBanner-SD-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-SD-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-SD-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-SD-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-F-IMG-W') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-F-IMG-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-F-IMG-Animation') . '|'
                . ' OxiAddonsBanner-B-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Tab']) . '|'
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-B-F') . ''
                . ' OxiAddonsBanner-B-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-TC']) . '|'
                . ' OxiAddonsBanner-B-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-BS') . ''
                . ' OxiAddonsBanner-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-HTC']) . '|'
                . ' OxiAddonsBanner-B-HBG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-HBG']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-HBS') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsBanner-B-B') . ''
                . ' OxiAddonsBanner-B-BC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-B-Animation') . '|'
                . ' OxiAddonsBanner-G-BG-PS |' . sanitize_text_field($_POST['OxiAddonsBanner-G-BG-PS']) . '|'
                . ' OxiAddonsBanner-B-PS |' . sanitize_text_field($_POST['OxiAddonsBanner-B-PS']) . '|'
                . ' OxiAddonsBanner-B-HBC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-HBC']) . '|'
                . '||#||'
                . ' OxiAddonsBanner-H-O-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-H-O-TB']) . '||#|| '
                . ' OxiAddonsBanner-H-OB-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-H-OB-TB']) . '||#|| '
                . ' OxiAddonsBanner-H-T-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-H-T-TB']) . '||#|| '
                . ' OxiAddonsBanner-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-SD-TA']) . '||#|| '
                . ' OxiAddonsBanner-F-IMG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-F-IMG']) . '||#|| '
                . ' OxiAddonsBanner-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-B-BT']) . '||#|| '
                . ' OxiAddonsBanner-B-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-B-BL']) . '||#|| '
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
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-G-BG-PS', $styledata[281], 'Left', 'left', 'Right', 'right', 'Position Reverse', 'Set Image and content position of banner', 'false');
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsBanner-G-BG', $styledata, 3, 'true','.oxi-addons-wrapper-' . $oxiid . '','background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-G-P', 7, $styledata, 1, 'Padding', 'Set Banner  padding', 'true','.oxi-addons-wrapper-' . $oxiid . '','padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Short Details
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddonsBanner-SD-TA', $stylefiles[8], 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-SD-FS', $styledata[132], $styledata[133], $styledata[134], '2', 'Font Size', 'Set Banner Short details Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-SD-C', $styledata[142], '', 'Color', 'Set Banner Short Details Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-SD-F', 136, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-SD-P', 144, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details','padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Short Details Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-SD-Animation', 160, $styledata, 'true','.oxi-addons-details');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Line
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsBanner-Line-W', $styledata[84], $styledata[85], $styledata[86], 'OxiAddonsBanner-Line-H', $styledata[88], $styledata[89], $styledata[90], 1, 'Width Height', 'Set Banner Line width and height | example: width:5px; height: 100%', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-Line-BG', $styledata[92], '', 'Background', 'Set Banner Line Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line::before', 'background');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsBanner-Line-W','width'),
                                                    array('OxiAddonsBanner-Line-H','height'),
                                                )
                                            );
                                            ?>
                                        </div>
                                         <div class="oxi-head">
                                            Line Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-Line-Animation', 94, $styledata, 'true','.oxi-addons-line');
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                                <div class="oxi-addons-col-6">
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Front Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_image_upload('OxiAddonsBanner-F-IMG', $stylefiles[10], 'Image', 'Set Your Banner Front Image', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-F-IMG-W', $styledata[165], $styledata[166], $styledata[167], 1, 'Width', 'Set Banner Line width','true','.oxi-addons-wrapper-' . $oxiid . '   .oxi-addons-images .oxi-addons-img','width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-F-IMG-P', 169, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true','.oxi-addons-wrapper-' . $oxiid . '   .oxi-addons-images','padding');
                                            ?>
                                        </div>
                                         <div class="oxi-head">
                                            Front Image Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-F-IMG-Animation', 185, $styledata, 'true','.oxi-addons-images');
                                            ?>
                                        </div>
                                    </div> 
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading One
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-H-O-TB', $stylefiles[2], 'Heading', 'Set Banner Heading', 'false','.oxi-addons-wrapper-' . $oxiid . '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main  .oxi-addons-heading');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-H-O-C', $styledata[33], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading', 'color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-H-O-FS', $styledata[23], $styledata[24], $styledata[25], '1', 'Font Size', 'Set Banner Heading Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading', 'font-size');                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-H-O-F', 27, $styledata);
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-H-O-P', 35, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading','padding');
                                           
                                            ?>
                                        </div>
                                         <div class="oxi-head">
                                            Heading One Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                             echo oxi_addons_adm_help_Animation('OxiAddonsBanner-H-O-Animation', 51, $styledata, 'true','.oxi-addons-heading');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Sub Heading Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-H-OB-TB', $stylefiles[4], 'Heading', 'Set Banner Heading bold Text', 'false','.oxi-addons-wrapper-' . $oxiid . '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main  .oxi-addons-text-bold');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-H-OB-FS', $styledata[56], $styledata[57], $styledata[58], '1', 'Font Size', 'Set Banner Heading bold text Font Size', 'true', ' .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading .oxi-addons-text-bold', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-H-OB-C', $styledata[66], '', 'Color', 'Set Banner Heading Text color', 'false', ' .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading .oxi-addons-text-bold', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-H-OB-F', 60, $styledata,'true',' .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading .oxi-addons-text-bold');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-H-OB-P', 68, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true',' .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading .oxi-addons-text-bold','padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading Two
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-H-T-TB', $stylefiles[6], 'Heading', 'Set Banner Heading', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main  .oxi-addons-heading-two');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-H-T-FS', $styledata[99], $styledata[100], $styledata[101], '1', 'Font Size', 'Set Banner Heading Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading-two', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-H-T-C', $styledata[109], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading-two', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-H-T-F', 103, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading-two');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-H-T-P', 111, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading-two','padding');
                                            
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Heading Two Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-H-T-Animation', 127, $styledata, 'true','.oxi-addons-heading-two');
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-BT', $stylefiles[12], 'Button Text', 'Set Banner Button Text', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-BL', $stylefiles[14], 'Button Link', 'Set Banner Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Tab', $styledata[190], 'Normal', '', 'Normal', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-P', 244, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link','padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-M', 260, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link','margin');
                                            ?>
                                        </div>
                                    </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-BS', 222, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-HBS', 232, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Position
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-B-PS', $styledata[283], 'Position', 'Set Banner button Position', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button', 'text-align');
                                            ?>
                                        </div>
                                    </div>

                                </div>  

                                <div class="oxi-addons-col-6"> 
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-FS', $styledata[192], $styledata[193], $styledata[194], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-TC', $styledata[202], '', 'Text Color', 'Set Banner Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-BG', $styledata[204], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-B', $styledata[238], $styledata[239], 'Border', 'Set Banner Border Size and Type', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-BC', $styledata[242], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-B-F', 196, $styledata, 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-BR', 206, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link','border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-HTC', $styledata[228], '', 'Color', 'Set Banner Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-HBG', $styledata[230], 'rgba', 'Backgroud Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-HBC', $styledata[285], '', 'Border Color', 'Set Banner Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Animation', 276, $styledata, 'true','.oxi-addons-link');
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