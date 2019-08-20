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
    if (!wp_verify_nonce($nonce, 'oxi-addons-footer-info-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-G-MXW') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-G-SZ') . ''
                . ' OxiAddonsFI-G-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFI-Animation') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-HS-BG') . ''
                . ' OxiAddonsEWFI-HS-TA |' . sanitize_text_field($_POST['OxiAddonsEWFI-HS-TA']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-HS-M') . ''
                . ' OxiAddonsFI-I-C |' . sanitize_hex_color($_POST['OxiAddonsFI-I-C']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-I-IS') . ''
                . ' OxiAddonsFI-I-IP |' . sanitize_text_field($_POST['OxiAddonsFI-I-IP']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-I-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-H-FS') . ''
                . ' OxiAddonsFI-H-C |' . sanitize_hex_color($_POST['OxiAddonsFI-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-H-H2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-H-M') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-CB-BG') . ''
                . ' OxiAddonsEWFI-CB-TA |' . sanitize_text_field($_POST['OxiAddonsEWFI-CB-TA']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-CB-M') . '' 
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-P-FS') . ''
                . ' OxiAddonsFI-P-C |' . sanitize_hex_color($_POST['OxiAddonsFI-P-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-P-P2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-P-M') . '' 
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-E-FS') . ''
                . ' OxiAddonsFI-E-C |' . sanitize_hex_color($_POST['OxiAddonsFI-E-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-E-E2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-E-M') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-G-BR') . ''
                
                . '||#||'
                . ' OxiAddonsFI-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsFI-I']) . '||#|| '
                . ' OxiAddonsFI-H ||#||' . sanitize_text_field($_POST['OxiAddonsFI-H']) . '||#|| '
                . ' OxiAddonsFI-P ||#||' . sanitize_text_field($_POST['OxiAddonsFI-P']) . '||#|| '
                . ' OxiAddonsFI-E ||#||' . sanitize_text_field($_POST['OxiAddonsFI-E']) . '||#|| '
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
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-G-MXW', $styledata[3], $styledata[4], $styledata[5], '1', 'Maximum Width', 'Set Max Width', 'false', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_row', 'max-width');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-G-SZ', $styledata[7], $styledata[8], 'Border', 'Set your body Border Size and Type', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_row');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-G-BC', $styledata[11], '', 'Border Color', 'Set Your body  Border Color', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_row', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-G-BR', 191, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_row', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-G-M', 13, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi_addons_FI_1_' .$oxiid. '', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-B-Shadow', 29, $styledata, 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_row', 'box-shadow');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Header Section
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-HS-BG', $styledata, 39, 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_header_body', 'background');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsEWFI-HS-TA', $styledata[43], 'Text Align', 'Set your Header Section Text Align', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_header_body', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-HS-M', 45, $styledata, '1', 'Padding', 'Set Header Section Margin', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_header_body', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-I', $stylefiles[2], 'Icon Class', 'Set Your Icon Class', 'false');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-I-C', $styledata[61], '', 'Icon Color', 'Set Your Icon Color', 'false', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_icon .oxi-icons', 'color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-I-IS', $styledata[63], $styledata[64], $styledata[65], '1', 'Icon Size', 'Set Your Icon Size Size', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_icon .oxi-icons', 'font-size');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsFI-I-IP', $styledata[67], 'Icon Position', 'Set your Icon Position', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_icon .oxi-icons', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-I-P', 69, $styledata, '1', 'Padding', 'Set your Icon Padding', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_icon .oxi-icons', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Header Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-H', $stylefiles[4], 'Header Text', 'Set Your Header Text', 'false', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_T');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-H-FS', $styledata[85], $styledata[86], $styledata[87], '1', 'Font Size', 'Set Your Header Text Font Size', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_T', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-H-C', $styledata[89], '', 'Text Color', 'Set Your Header Text Color', 'false', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_T', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-H-H2', 91, $styledata, 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_T');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-H-M', 97, $styledata, '1', 'Padding', 'Set your Header Text Padding', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_T', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                                <div class="oxi-addons-col-6">
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsFI-Animation', 35, $styledata, 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_row');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Body
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-CB-BG', $styledata, 113, 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_footer_body', 'background');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsEWFI-CB-TA', $styledata[117], 'Text Align', 'Set your Content Body Text Align', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_footer_body', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-CB-M', 119, $styledata, '1', 'Padding', 'Set Content Body Margin', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_footer_body', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Text One
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-P', $stylefiles[6], 'Text One', 'Set Your Text One', 'false', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_phone');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-P-FS', $styledata[135], $styledata[136], $styledata[137], '1', 'Font Size', 'Set Your Text One Font Size', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_phone', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-P-C', $styledata[139], '', 'Text Color', 'Set Your Text One Font Color', 'false', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_phone', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-P-P2', 141, $styledata, 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_phone');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-P-M', 147, $styledata, '1', 'Padding', 'Set your Text One Font Padding', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_phone', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Text Two
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-E', $stylefiles[8], 'Text Two', 'Set Your Text Two', 'false', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_email');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-E-FS', $styledata[163], $styledata[164], $styledata[165], '1', 'Font Size', 'Set Your Text Two Font Size', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_email', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-E-C', $styledata[167], '', 'Font Color', 'Set Your Text Two Font Color', 'false', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_email', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-E-E2', 169, $styledata, 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_email');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-E-M', 175, $styledata, '1', 'Padding', 'Set your Text Two Padding', 'true', '.oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_email', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="oxi-addons-setting-save">
                                <?php echo oxiaddonssettingsavedtmmode(); ?>
                                <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                                <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                                <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                                <?php wp_nonce_field("oxi-addons-footer-info-nonce") ?>
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
                    <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
            
        </div>
    </div>
</div>