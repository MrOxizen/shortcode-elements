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
    if (!wp_verify_nonce($nonce, 'OxiAddSI-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-padding') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-margin') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddSI-box-shadow') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIN-border') . ''
            . '' . OxiAddonsADMHelpBorderSanitize('OxiAddSIN-border') . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIN-radius') . ''
            . '' . OxiAddonsADMinnerBoxShadowSanitize('OxiAddSIN-image') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIH-border') . ''
            . '' . OxiAddonsADMHelpBorderSanitize('OxiAddSIH-border') . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIH-radius') . ''
            . '' . OxiAddonsADMinnerBoxShadowSanitize('OxiAddSIH-image') . ''
            . ' OxiAddSIR|' . sanitize_text_field($_POST['OxiAddSIR']) . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddSIR-size') . ''
            . ' OxiAddSIR-color|' . sanitize_text_field($_POST['OxiAddSIR-color']) . '|'
            . ' OxiAddSIR-bgcolor|' . sanitize_text_field($_POST['OxiAddSIR-bgcolor']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddSIR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIR-padding') . ''
            . ' OxiAddSIN-G|' . sanitize_text_field($_POST['OxiAddSIN-G']) . '|'
            . ' OxiAddSIH-G|' . sanitize_text_field($_POST['OxiAddSIH-G']) . '|'
            . ' OxiAddSIH-bgcolor|' . sanitize_text_field($_POST['OxiAddSIH-bgcolor']) . '|'
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddSI-animation') . ''
            . ' OxiAddSIN-bgcolor|' . sanitize_text_field($_POST['OxiAddSIN-bgcolor']) . '|'
            . ' OxiAddSIR-position|' . sanitize_text_field($_POST['OxiAddSIR-position']) . '|'
            . ' OxiAddSIR-width|' . sanitize_text_field($_POST['OxiAddSIR-width']) . '|'
            . ' OxiAddSIR-top|' . sanitize_text_field($_POST['OxiAddSIR-top']) . '|'
            . ' OxiAddSIR-left|' . sanitize_text_field($_POST['OxiAddSIR-left']) . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddSI-B-size') . ''
            . '||||'
            . ' OxiAddSI-B-color|' . sanitize_text_field($_POST['OxiAddSI-B-color']) . '|'
            . ' OxiAddSI-B-bgcolor|' . sanitize_text_field($_POST['OxiAddSI-B-bgcolor']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-B-border') . ''
            . '' . OxiAddonsADMHelpBorderSanitize('OxiAddSI-B-border') . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-B-radius') . ''
            . ' OxiAddSI-BH-color|' . sanitize_text_field($_POST['OxiAddSI-BH-color']) . '|'
            . ' OxiAddSI-BH-bgcolor|' . sanitize_text_field($_POST['OxiAddSI-BH-bgcolor']) . '|'
            . '' . OxiAddonsADMHelpBorderSanitize('OxiAddSI-BH-border') . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-BH-radius') . ''
            . ' OxiAddSI-LL|' . sanitize_text_field($_POST['OxiAddSI-LL']) . '|'
            . ' OxiAddSI-Link-open|' . sanitize_text_field($_POST['OxiAddSI-Link-open']) . '|'
            . ' OxiAddSI-L-index|' . sanitize_text_field($_POST['OxiAddSI-L-index']) . '|'
            . ' OxiAddSI-L-bg|' . sanitize_text_field($_POST['OxiAddSI-L-bg']) . '|'
            . ' OxiAddSI-L-color|' . sanitize_text_field($_POST['OxiAddSI-L-color']) . '|'
            . ' OxiAddSI-L-preloader|' . sanitize_text_field($_POST['OxiAddSI-L-preloader']) . '|'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddSI-L-shadow') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-B-padding') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddSI-B') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-BH-border') . ''
            . '||'
            . '||'
            . '||#||  ||#||'
            . 'OxiAddSI-class ||#||' . sanitize_text_field($_POST['OxiAddSI-class']) . '||#||'
            . 'OxiAddSI-image ||#||' . sanitize_text_field(OxiAddonsAdminUrlConvert($_POST['OxiAddSI-image'])) . '||#||'
            . 'OxiAddSIR-text ||#||' . sanitize_text_field($_POST['OxiAddSIR-text']) . '||#||'
            . 'OxiAddSI-button ||#||' . sanitize_text_field($_POST['OxiAddSI-button']) . '||#||'
            . 'OxiAddSI-Link ||#||' . sanitize_text_field($_POST['OxiAddSI-Link']) . '||#||'
            . 'OxiAddSI-L-image ||#||' . sanitize_text_field($_POST['OxiAddSI-L-image']) . '||#||'
            . '|';
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
                                <li ref="#oxi-addons-tabs-id-1">General</li>
                                <li ref="#oxi-addons-tabs-id-2"> Button, Link, Lightbox</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image Upload
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_body_image_upload('OxiAddSI-image', $stylefiles[5], 'Image Upload', 'Upload Your Image here Which Will show Lightbox', 'false');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddSI-class', $stylefiles[3], 'ID', 'Set your Your Image ID', 'false');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSI-padding', 3, $styledata, 1, 'Padding', 'Set Your Image Padding Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-row', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSI-margin', 19, $styledata, 1, 'Margin', 'Set Your Image Margin Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddSI-box-shadow', 35, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddSI-animation', 159, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Normal View
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('OxiAddSIN-G', $styledata[153], 1, 'Grayscale', 'Set Your GrayScale Value as colorfull is 0 and black-white is 100', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSIN-bgcolor', $styledata[163], 'rgba', 'Background', 'Select Your Image Background', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSIN-border', 41, $styledata, 1, 'Border', 'Set Your Single Image Border Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAddSIN-border', 57, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSIN-radius', 61, $styledata, 1, 'Border Radius', 'Set Your Image Border Radius Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image', 'border-radius');
                                            echo OxiAddonsADMhelpInnerBoxShadow('OxiAddSIN-image', 77, $styledata);
                                            $NOJS = array(
                                                array('OxiAddSIN-image-inner', 'Inner Shadow'),
                                                array('OxiAddSIN-image-color', 'Inner Shadow'),
                                                array('OxiAddSIN-G', 'Grayscale'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover View
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('OxiAddSIH-G', $styledata[155], 1, 'Grayscale', 'Set Your GrayScale Value as colorfull is 0 and black-white is 100', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSIH-bgcolor', $styledata[157], 'rgba', 'Background', 'Select Your Image Hover Background', '', '.oxi-addons-single-image-container-' . $oxiid . ':hover .oxi-addons-single-image-icon', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSIH-border', 81, $styledata, 1, 'Border', 'Set Your Single Image Border Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAddSIH-border', 97, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSIH-radius', 101, $styledata, 1, 'Border Radius', 'Set Your Image Border Radius Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover', 'border-radius');
                                            echo OxiAddonsADMhelpInnerBoxShadow('OxiAddSIH-image', 117, $styledata);
                                            $NOJS = array(
                                                array('OxiAddSIH-G', 'Grayscale'),
                                                array('OxiAddSIH-image-inner', 'Inner Shadow'),
                                                array('OxiAddSIH-image-color', 'Inner Shadow'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Ribbon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddSIR', $styledata[121], 'Yes', 'block', 'No', 'none', 'Active Ribbon', 'Want to add ribbon');
                                            echo oxi_addons_adm_help_textbox('OxiAddSIR-text', $stylefiles[7], 'Text', "Set text for Ribbon", 'fales', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content');
                                            echo oxi_addons_adm_help_true_false('OxiAddSIR-position', $styledata[165], 'Left', 'left', 'Right', 'right', 'Ribbon Position', 'Ribbon Position', 'true');
                                            echo oxi_addons_adm_help_number('OxiAddSIR-width', $styledata[167], 1, 'Width', 'Set Your Ribbon Width', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon', 'width');
                                            echo oxi_addons_adm_help_number_double('OxiAddSIR-top', $styledata[169], 'OxiAddSIR-left', $styledata[171], 1, 'Top Left', 'Set your Ribbon Padding Top and Left', 'true', '', '', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddSIR-size', $styledata[123], $styledata[124], $styledata[125], 1, 'Font Size', 'Select Your Font Size', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSIR-color', $styledata[127], '', 'Color', 'Select Your Ribbon Color', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSIR-bgcolor', $styledata[129], 'rgba', 'Background', 'Select Your Ribbon Background', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddSIR', 131, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSIR-padding', 137, $styledata, 1, 'Padding', 'Set Your Ribbon Padding Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content', 'padding');
                                            $NOJS = array(
                                                array('OxiAddSIR-top', 'Top'),
                                                array('OxiAddSIR-left', 'left'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddSI-button', $stylefiles[9], 'Button Text', "Set Your Button Text", 'false', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddSI-B-size', $styledata[173], $styledata[174], $styledata[175], 1, 'Font Size', 'Select Your Button Font Size', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSI-B-color', $styledata[181], '', 'Color', 'Select Your Button text Color', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSI-B-bgcolor', $styledata[183], 'rgba', 'Background', 'Select Your Button Background', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddSI-B', 279, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSI-B-border', 185, $styledata, 1, 'Border', 'Set Your Button Border Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAddSI-B-border', 201, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSI-B-radius', 205, $styledata, 1, 'Border Radius', 'Set Your Button Border Radius Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSI-B-padding', 263, $styledata, 1, 'Padding', 'Set Your Button Padding Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon Hover
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSI-BH-color', $styledata[221], '', 'Color', 'Select Your Button Color', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSI-BH-bgcolor', $styledata[223], 'rgba', 'Background', 'Select Your Button Background', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data:hover', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSI-BH-border', 285, $styledata, 1, 'Border', 'Set Your Button Border Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data:hover', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAddSI-BH-border', 225, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data:hover');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSI-BH-radius', 229, $styledata, 1, 'Border Radius', 'Set Your Button Border Radius Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-icon-data:hover', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            LightBox or Link
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddSI-LL', $styledata[245], 'Lightbox', 'lightbox', 'Link', 'link', 'Lightbox or Link?', 'Which one You want to add with', 'false');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Link Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddSI-Link', $stylefiles[11], 'Link Url', "Paste your Desire link Here");
                                            echo oxi_addons_adm_help_true_false('OxiAddSI-Link-open', $styledata[247], 'New Tab', '_blank', 'Same Tab', '', 'Link Open', 'select your link tab');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            LightBox
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_body_image_upload('OxiAddSI-L-image', $stylefiles[13], 'Image Upload', 'Upload Your Image here Which Will show Lightbox');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            LightBox Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('OxiAddSI-L-index', $styledata[249], 1, 'Z Index', 'Set Custom Z Index Value if you want', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSI-L-bg', $styledata[251], 'rgba', 'Background', 'Set Your Full body Background Color', '', '.oxi-addons-lightbox-' . $oxiid . ', .oxi-addons-lightbox-' . $oxiid . '.Oximfp-bg.Oximfp-ready', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSI-L-color', $styledata[253], '', 'Closing Color', 'Select Your Closing Icon Color', '', '.oxi-addons-lightbox-' . $oxiid . ' .Oximfp-image-holder .Oximfp-close, .oxi-addons-lightbox-' . $oxiid . ' .Oximfp-iframe-holder .Oximfp-close', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSI-L-preloader', $styledata[255], '', 'Preloader Color', 'Select Your Preloader Color', '', '.oxi-addons-lightbox-' . $oxiid . ' .Oximfp-preloader', 'background');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            LightBox Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddSI-L-shadow', 257, $styledata, 'true', '.oxi-addons-lightbox-' . $oxiid . ' .Oximfp-figure::after');
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
                            <?php wp_nonce_field("OxiAddSI-nonce") ?>
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
<script type="text/javascript">
    jQuery("#OxiAddSIR-bgcolor").on("change", function() {
        var value1 = jQuery(this).val();
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-addons-single-image-container-<?php echo $oxiid; ?> .oxi-addons-single-image-ribbon:before{border-color:" + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-addons-single-image-container-<?php echo $oxiid; ?> .oxi-addons-single-image-ribbon:after{border-color:" + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
    });
    jQuery("#OxiAddSI-I-width").on("change", function() {
        var value1 = jQuery(this).val();
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-addons-single-image-container-<?php echo $oxiid; ?> .oxi-addons-single-image-icon-data{height:" + value1 + "px; } </style>").appendTo("#oxi-addons-preview-data");
    });
</script>