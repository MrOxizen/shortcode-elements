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
            . 'oxi-call-button-opening-type |' . sanitize_text_field($_POST['oxi-call-button-opening-type']) . '|'
            . 'oxi-call-button-text-align |' . sanitize_text_field($_POST['oxi-call-button-text-align']) . '|'
            . '||||'
            . oxi_addons_adm_help_single_size('oxi-call-button-font-size')
            . 'oxi-call-button-color |' . sanitize_hex_color($_POST['oxi-call-button-color']) . '|'
            . 'oxi-call-button-bg-color |' . sanitize_text_field($_POST['oxi-call-button-bg-color']) . '|'
            . 'oxi-call-button-H-color |' . sanitize_hex_color($_POST['oxi-call-button-H-color']) . '|'
            . 'oxi-call-button-H-bg-color |' . sanitize_text_field($_POST['oxi-call-button-H-bg-color']) . '|'
            . oxi_addons_adm_help_padding_margin_senitize('oxi-call-button-border-width')
            . OxiAddonsADMHelpBorderSanitize('oxi-call-button-border') . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('oxi-call-button-font')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-call-button-border-radius')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-call-button-padding')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-call-button-margin')
            . OxiAddonsADMHelpBorderSanitize('oxi-call-button-border-hover') . '|'
            . oxi_addons_adm_help_padding_margin_senitize('oxi-call-button-H-border-radius')
            . oxi_addons_adm_help_animation_senitize('oxi-call-button-animation')
            . OxiAddonsBGImageSanitize('oxi-call-action-bg-image')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-call-full-padding')
            . 'oxi-call-action-heading-color |' . sanitize_hex_color($_POST['oxi-call-action-heading-color']) . '|'
            . oxi_addons_adm_help_single_size('oxi-call-action-heading-font-size')
            . OxiAddonsADMHelpFontSettingsSanitize('oxi-call-action-heading-font')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-call-action-heading-padding')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-call-action-heading-margin')
            . 'oxi-call-action-sub-heading-color |' . sanitize_hex_color($_POST['oxi-call-action-sub-heading-color']) . '|'
            . oxi_addons_adm_help_single_size('oxi-call-action-sub-heading-font-size')
            . OxiAddonsADMHelpFontSettingsSanitize('oxi-call-action-sub-heading-font')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-call-action-sub-heading-padding')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-call-action-sub-heading-margin')
            . 'oxi-call-button-text-align |' . sanitize_text_field($_POST['oxi-call-button-text-align']) . '|'
            . '||#||'
            . 'oxi-call-button-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-call-button-text']) . '||#||'
            . 'oxi-call-button-url ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-call-button-url']) . '||#||'
            . 'oxi-call-action-heading ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-call-action-heading']) . '||#||'
            . 'oxi-call-action-sub-heading ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-call-action-sub-heading']) . '||#||'
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-content-tabs" >
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpBGImage('oxi-call-action-bg-image', $styledata, 121, 'false', '.oxi-addons-call-to-action-' . $oxiid . ' ', 'background');
                                        echo oxi_addons_adm_help_padding_margin('oxi-call-full-padding', 125, $styledata, 1, 'Padding', 'Set Your Body Padding', 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-full-content', 'padding');
                                        ?>
                                    </div>
                                </div><div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('oxi-call-action-heading', $stylefiles[6], 'Heading', 'Set Your Heading Title', 'false', '.oxi-addons-call-to-action-' . $oxiid . ' h1.oxi-addons-call-to-action-heading');
                                        echo oxi_addons_adm_help_number_dtm('oxi-call-action-heading-font-size', $styledata[143], $styledata[144], $styledata[145], 1, 'Font Size', 'Set your Heading Font Size', 'false', '.oxi-addons-call-to-action-' . $oxiid . ' h1.oxi-addons-call-to-action-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('oxi-call-action-heading-color', $styledata[141], '', 'Color', 'Set Your Heading Color', 'false', '.oxi-addons-call-to-action-' . $oxiid . ' h1.oxi-addons-call-to-action-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('oxi-call-action-heading-font', 147, $styledata, 'true', '.oxi-addons-call-to-action-' . $oxiid . ' h1.oxi-addons-call-to-action-heading');
                                        echo oxi_addons_adm_help_padding_margin('oxi-call-action-heading-padding', 153, $styledata, 1, 'Padding', 'Set Your Heading Padding', 'true', '.oxi-addons-call-to-action-' . $oxiid . ' h1.oxi-addons-call-to-action-heading', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi-call-action-heading-margin', 169, $styledata, 1, 'Margin', 'Set Your Heading Margin', 'true', '.oxi-addons-call-to-action-' . $oxiid . ' h1.oxi-addons-call-to-action-heading', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Sub Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textarea('oxi-call-action-sub-heading', $stylefiles[8], 'false', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-sub-heading');
                                        echo oxi_addons_adm_help_number_dtm('oxi-call-action-sub-heading-font-size', $styledata[187], $styledata[188], $styledata[189], 1, 'Font Size', 'Set your Sub Heading Font Size', 'false', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-sub-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('oxi-call-action-sub-heading-color', $styledata[185], '', 'Color', 'Set Your Paragraph Color', 'false', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-sub-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('oxi-call-action-sub-heading-font', 191, $styledata, 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-sub-heading');
                                        echo oxi_addons_adm_help_padding_margin('oxi-call-action-sub-heading-padding', 197, $styledata, 1, 'Padding', 'Set Your Paragraph Padding', 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-sub-heading', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi-call-action-sub-heading-margin', 213, $styledata, 1, 'Margin', 'Set Your Paragraph Margin', 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-sub-heading', 'margin');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('oxi-call-button-text', $stylefiles[2], 'Button Text', 'Give your Button Text', 'false', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button');
                                        echo oxi_addons_adm_help_textbox('oxi-call-button-url', $stylefiles[4], 'Button Link', 'Give your Button Link', 'false');
                                        echo oxi_addons_adm_help_true_false('oxi-call-button-opening-type', $styledata[3], 'Current Tab', '', 'New Tab', '_blank', 'Opening Type', 'Set the button link opening type as same tabs or new tabs', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi-call-button-text-align', $styledata[229], 'left', 'left', 'Right', '', 'Button Align', 'Set the button Align', 'true');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('oxi-call-button-animation', 117, $styledata, 'true', '.oxi-addons-call-to-action-' . $oxiid . '.oxi-bt-col-lg-6.oxi-bt-col-md-12.oxi-bt-col-sm-12');
                                        ?>
                                    </div>

                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button Typography
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi-call-button-font-size', $styledata[11], $styledata[12], $styledata[13], 1, 'Font Size', 'Set your Button Font Size', 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('oxi-call-button-color', $styledata[15], '', 'Color', 'Set Your Button Color', 'false', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi-call-button-bg-color', $styledata[17], 'rgba', 'Background Color', 'Set Your Button Background Color', 'false', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button', 'backgroud');
                                        echo oxi_addons_adm_help_padding_margin('oxi-call-button-border-width', 23, $styledata, 1, 'Border', 'Set Border for your Button', 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button', 'border-width');
                                        echo OxiAddonsADMhelpBorder('oxi-call-button-border', 39, $styledata, 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button', 'border-style');
                                        echo OxiAddonsADMHelpFontSettings('oxi-call-button-font', 43, $styledata, 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button');
                                        echo oxi_addons_adm_help_padding_margin('oxi-call-button-border-radius', 49, $styledata, 1, 'Border Radius', 'Set Border Radius for your Button', 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('oxi-call-button-padding', 65, $styledata, 1, 'Padding', 'Set Padding for your Button', 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi-call-button-margin', 81, $styledata, 1, 'Margin', 'Set Margin for your Button', 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button', 'margin');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Hover Typography
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi-call-button-H-color', $styledata[19], '', 'Color', 'Set Your Button Color', 'false', '.oxi-addons-call-to-action-' . $oxiid . ' .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button:hover', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi-call-button-H-bg-color', $styledata[21], 'rgba', 'Background', 'Set Your Button Background Color', 'false', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button:hover', 'background');
                                        echo OxiAddonsADMhelpBorder('oxi-call-button-border-hover', 97, $styledata, 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button:hover', 'border-style');
                                        echo oxi_addons_adm_help_padding_margin('oxi-call-button-H-border-radius', 101, $styledata, 1, 'Border Radius', 'Set Border Radius for your Button', 'true', '.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button:hover', 'border-radius');
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
                    <?php echo oxi_call_to_action_style_3_shortcode($style); ?>
                </div>
            </div>
        </div>
    </div>
</div>