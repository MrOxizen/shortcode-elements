<?php
if (!defined('ABSPATH')) {
    exit;
}
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-button-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
      
    $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-max-width')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-full-margin')
            . OxiAddonsADMBoxShadowSanitize('oxi-cards-full-box-shadow')
            . oxi_addons_adm_help_animation_senitize('oxi-call-button-animation')
            . 'oxi-cards-front-bg-color |' . sanitize_text_field($_POST['oxi-cards-front-bg-color']) . '|'
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-front-image-width')
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-front-image-height')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-front-padding')
            . 'oxi-cards-CI-position |' . sanitize_text_field($_POST['oxi-cards-CI-position']) . '|'
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-CI-W')
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-CI-H')
            . 'oxi-cards-front-C |' . sanitize_hex_color($_POST['oxi-cards-front-C']) . '|'
            . 'oxi-cards-front-CI-BC |' . sanitize_text_field($_POST['oxi-cards-front-CI-BC']) . '|'
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-front-CI-FS')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-front-CI-BR')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-front-CI-P')
            . '||||'
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-back-image-height-ratio')
            . 'oxi-cards-button-opening-type |' . sanitize_text_field($_POST['oxi-cards-button-opening-type']) . '|'
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-back-heading-font-size')
            . 'oxi-cards-back-heading-color |' . sanitize_hex_color($_POST['oxi-cards-back-heading-color']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('oxi-cards-back-heading-font')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-back-heading-padding')
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-back-sub-heading-font-size')
            . 'oxi-cards-back-sub-heading-color |' . sanitize_hex_color($_POST['oxi-cards-back-sub-heading-color']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('oxi-cards-back-sub-heading-font')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-back-sub-heading-padding')
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-button-font-size')
            . ' oxi-cards-button-color|' . sanitize_hex_color($_POST['oxi-cards-button-color']) . '|'
            . 'oxi-cards-button-bg-color |' . sanitize_text_field($_POST['oxi-cards-button-bg-color']) . '|'
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-button-border-width')
            . OxiAddonsADMHelpBorderSanitize('oxi-cards-button-border') . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('oxi-cards-button-font')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-button-border-radius')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-button-padding')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-button-margin')
            . ' oxi-cards-button-H-color|' . sanitize_hex_color($_POST['oxi-cards-button-H-color']) . '|'
            . 'oxi-cards-button-H-bg-color |' . sanitize_text_field($_POST['oxi-cards-button-H-bg-color']) . '|'
            . OxiAddonsADMHelpBorderSanitize('oxi-cards-button-border-hover') . '|'
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-button-H-border-radius')
            . 'oxi-cards-back-full-content-color |' . sanitize_text_field($_POST['oxi-cards-back-full-content-color']) . '|'
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-back-full-content-padding')
            . 'oxi-cards-button-align |' . sanitize_text_field($_POST['oxi-cards-button-align']) . '|'
            . 'oxi-addons-loader-on-off |' . sanitize_text_field($_POST['oxi-addons-loader-on-off']) . '|'
            . 'oxi-addons-loader-style |' . sanitize_text_field($_POST['oxi-addons-loader-style']) . '|'
            . 'oxi-addons-loader-color |' . sanitize_hex_color($_POST['oxi-addons-loader-color']) . '|'
            . 'oxi-addons-loader-speed |' . sanitize_text_field($_POST['oxi-addons-loader-speed']) . '|'
            . '||#||'
            . 'oxi-cards-front-image ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-cards-front-image']) . '||#||'
            . 'oxi-cards-front-CI ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi-cards-front-CI']) . '||#||'
            . ' ||#||||#||'
            . 'oxi-cards-button-text ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-cards-button-text']) . '||#||'
            . 'oxi-cards-button-url ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-cards-button-url']) . '||#||'
            . 'oxi-cards-back-heading ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-cards-back-heading']) . '||#||'
            . 'oxi-cards-back-sub-heading ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-cards-back-sub-heading']) . '||#||'
            . 'oxi-cards-back-image ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-cards-back-image']) . '||#||'
    ;
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
                                <li  ref="#oxi-addons-tabs-2">Back Part</li> 
                            </ul> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1" >
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi-cards-max-width', $styledata[3], $styledata[4], $styledata[5], 1, 'Max Width', 'Set your Max Width, EX. 100 means same size as width', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC', 'max-width');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-full-margin', 7, $styledata, 1, 'Margin', 'Set Your Body Margin', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Loader
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('oxi-addons-loader-on-off', $styledata[301], 'On', 'on', 'Off', 'off', 'Loader On/Off', 'Set Your Loader On / Off', 'false');
                                            ?>
                                            <div class=" form-group row">
                                                <label for="oxi-addons-tt-text-d" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Loader Style">Loader Style</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control" id="oxi-addons-loader-style" name="oxi-addons-loader-style">
                                                        <option value="style-1" <?php selected($styledata[303], 'style-1'); ?>>Style 1</option>
                                                        <option value="style-2" <?php selected($styledata[303], 'style-2'); ?>>Style 2</option>
                                                        <option value="style-3" <?php selected($styledata[303], 'style-3'); ?>>Style 3</option>
                                                        <option value="style-4" <?php selected($styledata[303], 'style-4'); ?>>Style 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi-addons-loader-color', $styledata[305], '', 'Color', 'Set Your Loader Color', 'true');
                                            echo oxi_addons_adm_help_number('oxi-addons-loader-speed', $styledata[307], 1, 'Loading Duration ', 'Set Your Loading Duration', 'false')
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('oxi-cards-full-box-shadow', 23, $styledata, 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('oxi-call-button-animation', 29, $styledata, 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Front Part 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_image_upload('oxi-cards-front-image', $stylefiles[2], 'Front Part Image', 'Set Your Front Part Image.', 'false');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-front-bg-color', $styledata[33], 'rgba', 'Background Color', 'Set Your Front Part Background Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC .oxi-addons-ICfull-content', 'background');
                                            echo oxi_addons_adm_help_number_double_dtm('oxi-cards-front-image-width', $styledata[35], $styledata[36], $styledata[37], 'oxi-cards-front-image-height', $styledata[39], $styledata[40], $styledata[41], 1, 'Image Width & Height', 'Set Your Front Image Width And Height.', 'false');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-front-padding', 43, $styledata, 1, 'Padding', 'Set Your Front Part Padding', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC .oxi-addons-ICfull-content', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Cross Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi-cards-front-CI', $stylefiles[4], 'Icon Class', 'Set Your Cross Icon Class', 'false');
                                            echo oxi_addons_adm_help_true_false('oxi-cards-CI-position', $styledata[59], 'Top-Left', 'top_left', 'Top-Right', 'top_right', 'Cross Icon Position', 'Set Your Cross Icon Position', 'false');
                                            echo oxi_addons_adm_help_number_double_dtm('oxi-cards-CI-W', $styledata[61], $styledata[62], $styledata[63], 'oxi-cards-CI-H', $styledata[65], $styledata[66], $styledata[67], 1, 'Width Height', 'Set Your Cross Icon Body width and Height', 'true');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-front-C', $styledata[69], '', 'Color', 'Set Your Cross Icon Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-close-icon', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-front-CI-BC', $styledata[71], 'rgba', 'Background ', 'Set Your Cross Icon Background Color', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-close-icon', 'background');
                                            echo oxi_addons_adm_help_number_dtm('oxi-cards-front-CI-FS', $styledata[73], $styledata[74], $styledata[75], '1', 'Cross Icon Size', 'Set Your Icon Font Size', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-close-icon', 'font-size');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-front-CI-BR', 77, $styledata, '1', 'Border Radius', 'Set Your Cross Icon Border Radius', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-close-icon', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-front-CI-P', 93, $styledata, '1', 'Margin', 'Set Your Cross Icon Margin', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-close-icon', 'margin');
                                            $NOJS = array(
                                                array('oxi-cards-CI-W', 'Width'),
                                                array('oxi-cards-CI-H', 'Height'),
                                                array('oxi-cards-front-image-width', 'Width'),
                                                array('oxi-cards-front-image-height', 'Height'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2" >
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Full Content Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-back-full-content-color', $styledata[281], '', 'Background Color', 'Set Your Full Content Background Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text', 'background');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-back-full-content-padding', 283, $styledata, 1, 'Padding', 'Set your Full Content Padding', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text', 'padding');
                                            ?>
                                        </div>
                                    </div>

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi-cards-button-text', $stylefiles[8], 'Button Text', 'Give your Button Text', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link ');
                                            echo oxi_addons_adm_help_textbox('oxi-cards-button-url', $stylefiles[10], 'Button Link', 'Give your Button Link', 'false');
                                            echo oxi_addons_adm_help_Text_Align('oxi-cards-button-align', $styledata[299], 'Button Align', 'Set Your Button Align', 'false');
                                            echo oxi_addons_adm_help_true_false('oxi-cards-button-opening-type', $styledata[117], 'Current Tab', '', 'New Tab', '_blank', 'Opening Type', 'Set the button link opening type as same tabs or new tabs', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Typography
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi-cards-button-font-size', $styledata[175], $styledata[176], $styledata[177], 1, 'Font Size', 'Set your Button Font Size', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link ', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-button-color', $styledata[179], '', 'Color', 'Set Your Button Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link ', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-button-bg-color', $styledata[181], 'rgba', 'Background Color', 'Set Your Button Background Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link ', 'background');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-button-border-width', 183, $styledata, 1, 'Border', 'Set Border for your Button', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link ', 'border-width');
                                            echo OxiAddonsADMhelpBorder('oxi-cards-button-border', 199, $styledata, 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link ', 'border-style');
                                            echo OxiAddonsADMHelpFontSettings('oxi-cards-button-font', 203, $styledata, 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link ');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-button-border-radius', 209, $styledata, 1, 'Border Radius', 'Set Border Radius for your Button', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link ', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-button-padding', 225, $styledata, 1, 'Padding', 'Set Padding for your Button', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link ', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-button-margin', 241, $styledata, 1, 'Margin', 'Set Margin for your Button', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link ', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Typography
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-button-H-color', $styledata[257], '', 'Color', 'Set Your Button Hover Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link:hover ', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-button-H-bg-color', $styledata[259], 'rgba', 'Background', 'Set Your Button Hover Background Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link:hover ', 'background');
                                            echo OxiAddonsADMhelpBorder('oxi-cards-button-border-hover', 261, $styledata, 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link:hover ', 'border-style');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-button-H-border-radius', 265, $styledata, 1, 'Border Radius', 'Set Border Radius for your Button Hover ', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner a.oxi-addons-back-link:hover ', ' border-radius');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_image_upload('oxi-cards-back-image', $stylefiles[16], 'Back Part Image', 'Set Your Back Part Image.', 'false');
                                            echo oxi_addons_adm_help_number_dtm('oxi-cards-back-image-height-ratio', $styledata[113], $styledata[114], $styledata[115], 1, 'Height Ratio', 'Set your Height Ratio', 'false');
                                            $NOJS = array(
                                                array('oxi-cards-back-image-height-ratio', 'Image Height'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?> 
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi-cards-back-heading', $stylefiles[12], 'Heading', 'Set Your Heading Title', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner h2.oxi-addons-back-title');
                                            echo oxi_addons_adm_help_number_dtm('oxi-cards-back-heading-font-size', $styledata[119], $styledata[120], $styledata[121], 1, 'Font Size', 'Set your Heading Font Size', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner h2.oxi-addons-back-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-back-heading-color', $styledata[123], '', 'Color', 'Set Your Heading Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner h2.oxi-addons-back-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('oxi-cards-back-heading-font', 125, $styledata, 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner h2.oxi-addons-back-title');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-back-heading-padding', 131, $styledata, 1, 'Padding', 'Set Your Heading Padding', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner h2.oxi-addons-back-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Details
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_form_textarea('oxi-cards-back-sub-heading', $stylefiles[14], 'Details', 'Set Your Details Title', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner p.oxi-addons-back-paragraph');
                                            echo oxi_addons_adm_help_number_dtm('oxi-cards-back-sub-heading-font-size', $styledata[147], $styledata[148], $styledata[149], 1, 'Font Size', 'Set your Details Font Size', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner p.oxi-addons-back-paragraph', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-back-sub-heading-color', $styledata[151], '', 'Color', 'Set Your Details Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner p.oxi-addons-back-paragraph', 'color');
                                            echo OxiAddonsADMHelpFontSettings('oxi-cards-back-sub-heading-font', 153, $styledata, 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner p.oxi-addons-back-paragraph');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-back-sub-heading-padding', 159, $styledata, 1, 'Padding', 'Set Your Details Padding', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-back-text-inner p.oxi-addons-back-paragraph', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-setting-save">
                                <?php echo oxiaddonssettingsavedtmmode(); ?>
                                <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                                <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                                <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php $styledata[1] ?>">
                                <?php wp_nonce_field("oxi-addons-button-nonce") ?>
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
                    <?php echo oxi_interactive_cards_style_3_shortcode($style); ?>
                </div>
            </div>
        </div>
    </div>
</div>