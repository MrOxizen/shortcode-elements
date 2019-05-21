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
            . '' . OxiAddonsBGImageSanitize('OxiAddonsAudio-G-BG') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-G-W') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-G-P') . ''
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsAudio-G-Animation') . '|'
            . ' OxiAddonsAudio-audio-BG |' . sanitize_text_field($_POST['OxiAddonsAudio-audio-BG']) . '|'
            . ' OxiAddonsAudio-audio-playpause |' . sanitize_text_field($_POST['OxiAddonsAudio-audio-playpause']) . '|'
            . ' OxiAddonsAudio-audio-current |' . sanitize_text_field($_POST['OxiAddonsAudio-audio-current']) . '|'
            . ' OxiAddonsAudio-audio-volume |' . sanitize_text_field($_POST['OxiAddonsAudio-audio-volume']) . '|'
            . ' OxiAddonsAudio-audio-progress |' . sanitize_text_field($_POST['OxiAddonsAudio-audio-progress']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-audio-H') . ''
            . '||||||||||||'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-G-R') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-PBTN-FS') . ''
            . ' OxiAddonsAudio-PBTN-C |' . sanitize_hex_color($_POST['OxiAddonsAudio-PBTN-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-tooltip-R') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-PBTN-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-SBTN-FS') . ''
            . ' OxiAddonsAudio-SBTN-C |' . sanitize_hex_color($_POST['OxiAddonsAudio-SBTN-C']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-time-FS') . ''
            . ' OxiAddonsAudio-time-C |' . sanitize_hex_color($_POST['OxiAddonsAudio-time-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAudio-time-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-time-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-time-M') . ''
            . ' OxiAddonsAudio-progress-BG |' . sanitize_text_field($_POST['OxiAddonsAudio-progress-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-progress-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-progress-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-TH-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-TH-H') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-TH-LR') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-TH-TB') . ''
            . ' OxiAddonsAudio-TH-BG |' . sanitize_text_field($_POST['OxiAddonsAudio-TH-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsAudio-TH-B') . ''
            . ' OxiAddonsAudio-TH-BC |' . sanitize_hex_color($_POST['OxiAddonsAudio-TH-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-TH-BR') . ''
            . ' OxiAddonsAudio-loading-BG |' . sanitize_text_field($_POST['OxiAddonsAudio-loading-BG']) . '|'
            . ' OxiAddonsAudio-current-BG |' . sanitize_text_field($_POST['OxiAddonsAudio-current-BG']) . '|'
            . ' ||'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-tooltip-FS') . ''
            . ' OxiAddonsAudio-tooltip-BG |' . sanitize_text_field($_POST['OxiAddonsAudio-tooltip-BG']) . '|'
            . ' OxiAddonsAudio-tooltip-C |' . sanitize_hex_color($_POST['OxiAddonsAudio-tooltip-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAudio-tooltip-F') . ''
            . '||||||||'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-tooltip-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-tooltip-H') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-tooltip-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-PV-FS') . ''
            . ' OxiAddonsAudio-PV-C |' . sanitize_hex_color($_POST['OxiAddonsAudio-PV-C']) . '|'
            . '||||||||||||||||'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-PV-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-volume-FS') . ''
            . ' OxiAddonsAudio-volume-C |' . sanitize_hex_color($_POST['OxiAddonsAudio-volume-C']) . '|'
            . ' OxiAddonsAudio-v-progress-BG |' . sanitize_text_field($_POST['OxiAddonsAudio-v-progress-BG']) . '|'
            . '||||||||'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-V-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-V-H') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-v-progress-M') . ''
            . ' OxiAddonsAudio-v-progress-active-BG |' . sanitize_text_field($_POST['OxiAddonsAudio-v-progress-active-BG']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-VH-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-VH-H') . ''
            . '||||'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-VH-TB') . ''
            . ' OxiAddonsAudio-VH-BG |' . sanitize_text_field($_POST['OxiAddonsAudio-VH-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsAudio-VH-B') . ''
            . ' OxiAddonsAudio-VH-BC |' . sanitize_hex_color($_POST['OxiAddonsAudio-VH-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-VH-BR') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-FR-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-FR-H') . ''
            . ' OxiAddonsAudio-TH-handle |' . sanitize_text_field($_POST['OxiAddonsAudio-TH-handle']) . '|'
            . ' OxiAddonsAudio-VH-handle |' . sanitize_text_field($_POST['OxiAddonsAudio-VH-handle']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-progress-H') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-v-progress-R') . ''

            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-FR-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-FR-BR') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAudio-G-BS') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-title-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAudio-title-F') . ''
            . ' OxiAddonsAudio-title-C |' . sanitize_hex_color($_POST['OxiAddonsAudio-title-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-title-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudio-author-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAudio-author-F') . ''
            . ' OxiAddonsAudio-author-C |' . sanitize_hex_color($_POST['OxiAddonsAudio-author-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudio-author-P') . ''

            . '||#||'
            . ' OxiAddonsAudio-upload-audio ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsAudio-upload-audio']) . '||#|| '
            . ' OxiAddonsAudio-PBTN-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudio-PBTN-I']) . '||#|| '
            . ' OxiAddonsAudio-SBTN-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudio-SBTN-I']) . '||#|| '
            . ' OxiAddonsAudio-PV-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudio-PV-I']) . '||#|| '
            . ' OxiAddonsAudio-volume-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudio-volume-I']) . '||#|| '
            . ' OxiAddonsAudio-title-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudio-title-TA']) . '||#|| '
            . ' OxiAddonsAudio-author-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudio-author-TA']) . '||#|| '
            . ' OxiAddonsAudio-FR-img ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsAudio-FR-img']) . '||#|| '
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
                                <li ref="#oxi-addons-tabs-2">Audio Player Setting</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsAudio-G-BG', $styledata, 3, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-G-W', $styledata[7], $styledata[8], $styledata[9], 1, 'Max Width', 'Set audio body max width', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio', 'max-width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-G-P', 11, $styledata, 1, 'Padding', 'Set Audio Body area  padding', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-G-R', 58, $styledata, 1, 'Border-radius', 'Set Audio Body Area Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio', 'border-radius');
                                            ?>
                                        </div>

                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsAudio-G-Animation', 27, $styledata, 'true', 'oxi-addons-wrapper-' . $oxiid . '');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsAudio-G-BS', 472, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Front Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_body_image_upload('OxiAddonsAudio-FR-img', $stylefiles[16], 'Front Image', 'upload your front image', 'false');
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudio-FR-W', $styledata[408], $styledata[409], $styledata[410], 'OxiAddonsAudio-FR-H', $styledata[412], $styledata[413], $styledata[414], 1, 'Width & Height', 'Set Width Height Progress time handle', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-FR-BR', 456, $styledata, 1, 'Border Radius', 'Set Audio Front Image Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-img', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-FR-P', 440, $styledata, 1, 'Padding', 'Set Audio Front Image Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image', 'padding');
                                            $NOJS = array(
                                                array('OxiAddonsAudio-FR-W', 'Width'),
                                                array('OxiAddonsAudio-FR-H', 'Height'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Audio Title
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddonsAudio-title-TA', $stylefiles[12], 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-title-FS', $styledata[478], $styledata[479], $styledata[480], '2', 'Font Size', 'Set Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-title-C', $styledata[488], '', 'Color', 'Set Audio title  Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAudio-title-F', 482, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-title-P', 490, $styledata, 1, 'Padding', 'Set Audio title  Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Audio Author
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddonsAudio-author-TA', $stylefiles[14], 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-author-FS', $styledata[506], $styledata[507], $styledata[508], '2', 'Font Size', 'Set Audio Author  Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-author', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-author-C', $styledata[516], '', 'Color', 'Set Audio Author  Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-author', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAudio-author-F', 510, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-author');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-author-P', 518, $styledata, 1, 'Padding', 'Set Audio Author  Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-author', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Upload Audio and setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-audio-H', $styledata[42], $styledata[43], $styledata[44], 1, 'Height', 'Set Width Height Progress time handle', 'true');
                                            echo oxi_addons_adm_help_image_upload('OxiAddonsAudio-upload-audio', $stylefiles[2], 'Audio', 'upload your audio file', 'false');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-audio-BG', $styledata[32], 'rgba', 'Background Color', 'Set Audio Background Color', 'false', '.oxi-addons-wrapper-'.$oxiid.' .mejs-controls', 'background');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudio-audio-playpause', $styledata[34], 'True', 'true', 'False', 'false', 'Play-Pause', 'Audio Play Pause Button Show or not', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudio-audio-current', $styledata[36], 'True', 'true', 'False', 'false', 'Time', 'Audio Play Current Time Button Show or not', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudio-audio-volume', $styledata[38], 'True', 'true', 'False', 'false', 'Volume', 'Audio Play volume Show or not', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudio-audio-progress', $styledata[40], 'True', 'true', 'False', 'false', 'Progress Bar', 'Audio Play Progress Bar show or not', 'true');
                                            
                                            $NOJS = array(
                                                array('OxiAddonsAudio-audio-BG', 'Background Color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Audio Progress Bar Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-progress-H', $styledata[420], $styledata[421], $styledata[422], 1, 'Height', 'Set Width Height Progress time handle', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-progress-BG', $styledata[162], '', 'Background Color', 'Set Audio Progress Bar Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-total', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-progress-P', 164, $styledata, 1, 'border-radius', 'Set Audio Progress Bar Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-current , .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-total , .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-loaded ,.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-hovered, .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-buffering', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-progress-M', 180, $styledata, 1, 'Margin', 'Set Audio Progress Bar margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-rail', 'margin');
                                            
                                            $NOJS = array(
                                                array('OxiAddonsAudio-progress-H', 'Height'),
                                                array('OxiAddonsAudio-progress-BG', 'Progress Bar Background color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Progress Bar Time Handle
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudio-TH-handle', $styledata[416], 'True', 'true', 'False', 'false', 'Volume', 'Audio Play volume handle true or false', 'true');
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudio-TH-W', $styledata[196], $styledata[197], $styledata[198], 'OxiAddonsAudio-TH-H', $styledata[200], $styledata[201], $styledata[202], 1, 'Width Height', 'Set Width Height Progress time handle', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-TH-LR', $styledata[204], $styledata[205], $styledata[206], '1', 'Left-Right', 'Set Left Right Position of Progress handle', 'true', ' .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-handle', 'left');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-TH-TB', $styledata[208], $styledata[209], $styledata[210], '1', 'Top-Bottom', 'Set Top Bottom Position of Progress handle', 'true', ' .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-handle', 'top');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-TH-BG', $styledata[212], 'rgba', 'Background Color', 'Set Progress handle background color', 'false', ' .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-handle', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsAudio-TH-B', $styledata[214], $styledata[215], 'Border', 'Set Progress handle Border Size and Type', 'true', ' .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-handle');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-TH-BC', $styledata[218], '', 'Border Color', 'Set Progress handle Border color', 'true', ' .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-handle', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-TH-BR', 220, $styledata, 1, 'Border Radius', 'Set Progress handle Border Radius', 'true', ' .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-handle', 'border-radius');
                                            
                                            $NOJS = array(
                                                array('OxiAddonsAudio-TH-W', 'Width'),
                                                array('OxiAddonsAudio-TH-H', 'Height'),
                                                array('OxiAddonsAudio-TH-LR', 'Left-Right'),
                                                array('OxiAddonsAudio-TH-TB', 'Top-Bottom'),
                                                array('OxiAddonsAudio-TH-BG', 'Background Color'),
                                                array('OxiAddonsAudio-TH-B', 'Border'),
                                                array('OxiAddonsAudio-TH-BC', 'Border Color'),
                                                array('OxiAddonsAudio-TH-BR', 'Border Radius'),
                                                
                                                array('OxiAddonsAudio-loading-BG', 'Background Color'),
                                                array('OxiAddonsAudio-current-BG', 'Progress Bar Loading Background color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                            
                                        </div>
                                        <div class="oxi-head">
                                            Progress Loading setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-loading-BG', $styledata[236], '', 'Background Color', 'Set Audio Progress Bar Loading Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-loaded', 'background');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Progress current value setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-current-BG', $styledata[238], '', 'Background Color', 'Set Audio Progress Bar Loading Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-current', 'background');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Progress Tooltip Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudio-tooltip-W', $styledata[264], $styledata[265], $styledata[266], 'OxiAddonsAudio-tooltip-H', $styledata[268], $styledata[269], $styledata[270], 1, 'Width Height', 'Set Width Height Progress time handle', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-tooltip-FS', $styledata[242], $styledata[243], $styledata[244], '2', 'Font Size', 'Set progress tooltip Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-tooltip-BG', $styledata[246], 'rgba', 'Background Color', 'Set Audio progress tooltip Backgroud', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-tooltip-C', $styledata[248], '', 'Color', 'Set progress  tooltip  Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAudio-tooltip-F', 250, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-tooltip-R', 80, $styledata, 1, 'Border-radius', 'Set Audio progress tooltip border radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float', 'margin');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-tooltip-M', 272, $styledata, 1, 'Margin', 'Set Audio progress tooltip  Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float', 'margin');
                                            
                                            $NOJS = array(
                                                array('OxiAddonsAudio-tooltip-W', 'Width'),
                                                array('OxiAddonsAudio-tooltip-H', 'Height'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Time Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-time-FS', $styledata[118], $styledata[119], $styledata[120], '2', 'Font Size', 'Set Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-time', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-time-C', $styledata[122], '', 'Color', 'Set Audio time  Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-time', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAudio-time-F', 124, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-time');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-time-P', 130, $styledata, 1, 'Padding', 'Set Audio Time  Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-time', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-time-M', 146, $styledata, 1, 'Margin', 'Set Audio Time  Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-time', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Pause button setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudio-PBTN-I', $stylefiles[4], 'Play Icon', 'Set FontAwesome Icon Code  for Play Button', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-PBTN-FS', $styledata[74], $styledata[75], $styledata[76], '2', 'Font Size', 'Set Audio Play button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-play button::after, .oxi-addons-wrapper-' . $oxiid . '  .mejs-replay button::after, .oxi-addons-wrapper-' . $oxiid . '  .mejs-pause button::after', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-PBTN-C', $styledata[78], '', 'Color', 'Set Audio Play button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-replay button::after', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-PBTN-M', 96, $styledata, 1, 'Margin', 'Set Audio Play button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-playpause-button', 'margin');
                                            
                                            $NOJS = array(
                                                array('OxiAddonsAudio-PBTN-C', 'Color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Play button setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudio-SBTN-I', $stylefiles[6], 'Stop Icon', 'Set FontAwesome Icon Code for Stop Button', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-SBTN-FS', $styledata[112], $styledata[113], $styledata[114], '2', 'Font Size', 'Set Audio Stop button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-pause button::after', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-SBTN-C', $styledata[116], '', 'Color', 'Set Audio Stop button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-pause button::after', 'color');
                                            
                                            $NOJS = array(
                                                array('OxiAddonsAudio-SBTN-C', 'Color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Play Volume Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudio-PV-I', $stylefiles[8], 'volume Icon', 'Set FontAwesome Icon Code for Play volume button', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-PV-FS', $styledata[288], $styledata[289], $styledata[290], '2', 'Font Size', 'Set Audio Play volume button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-mute button::after', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-PV-C', $styledata[292], '', 'Color', 'Set Audio Play volume button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-mute button::after', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-PV-M', 310, $styledata, 1, 'Margin', 'Set Audio Play volume button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-mute button, .oxi-addons-wrapper-' . $oxiid . '  .mejs-unmute button', 'margin');
                                            $NOJS = array(
                                                array('OxiAddonsAudio-PV-C', 'Color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Stop Volume Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudio-volume-I', $stylefiles[10], 'Stop Icon', 'Set FontAwesome Icon Code for Stop volume Button', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-volume-FS', $styledata[326], $styledata[327], $styledata[328], '2', 'Font Size', 'Set Audio Stop volume Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-unmute button::after', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-volume-C', $styledata[330], '', 'Color', 'Set Audio Stop volume Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-unmute button::after', 'color');
                                            $NOJS = array(
                                                array('OxiAddonsAudio-volume-C', 'Color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Volume Progress Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudio-V-W', $styledata[342], $styledata[343], $styledata[344], 'OxiAddonsAudio-V-H', $styledata[346], $styledata[347], $styledata[348], 1, 'Width & Height', 'Set Width Height Progress time handle', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-v-progress-BG', $styledata[332], '', 'Background Color', 'Set Audio volume Progress Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-horizontal-volume-total', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-v-progress-R', 424, $styledata, 1, 'Border Radius', 'Set Audio  volume Progress border radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-horizontal-volume-total', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-v-progress-M', 350, $styledata, 1, 'Margin', 'Set Audio  volume Progress margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-horizontal-volume-total', 'margin');
                                            $NOJS = array(
                                                array('OxiAddonsAudio-V-W', 'Width '),
                                                array('OxiAddonsAudio-V-H', 'Height'),
                                                array('OxiAddonsAudio-v-progress-BG', 'Background Color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Volume Progress active Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-v-progress-active-BG', $styledata[366], '', 'Background Color', 'Set Audio volume Progress active Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-horizontal-volume-current', 'background');
                                            $NOJS = array(
                                                array('OxiAddonsAudio-v-progress-active-BG', 'Background Color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Volume Handle
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudio-VH-handle', $styledata[418], 'True', 'true', 'False', 'false', 'Volume', 'Audio Play volume handle true or false', 'true');
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudio-VH-W', $styledata[368], $styledata[369], $styledata[370], 'OxiAddonsAudio-VH-H', $styledata[372], $styledata[373], $styledata[374], 1, 'Width & Height', 'Set Width Height Progress time handle', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudio-VH-TB', $styledata[380], $styledata[381], $styledata[382], '1', 'Top-Bottom', 'Set Top Bottom Position of Progress handle', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-horizontal-volume-handle', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-VH-BG', $styledata[384], 'rgba', 'Background Color', 'Set Progress handle background color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-horizontal-volume-handle', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsAudio-VH-B', $styledata[386], $styledata[387], 'Border', 'Set Progress handle Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-horizontal-volume-handle');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudio-VH-BC', $styledata[390], '', 'Border Color', 'Set Progress handle Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-horizontal-volume-handle', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudio-VH-BR', 392, $styledata, 1, 'Border Radius', 'Set Progress handle Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .mejs-horizontal-volume-handle', 'border-radius');
                                            
                                            $NOJS = array(
                                                array('OxiAddonsAudio-VH-W', 'Width '),
                                                array('OxiAddonsAudio-VH-H', 'Height'),
                                                array('OxiAddonsAudio-VH-TB', 'Top-Bottom'),
                                                array('OxiAddonsAudio-VH-BG', 'Background Color'),
                                                array('OxiAddonsAudio-VH-B', 'Border'),
                                                array('OxiAddonsAudio-VH-BC', 'Border Color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
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