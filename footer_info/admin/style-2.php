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
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-2-G-MXW') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-2-G-SZ') . ''
                . ' OxiAddonsFI-2-G-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-2-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-2-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-2-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFI-2-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFI-2-Animation') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsFI-2-G-BG') . ''
                . ' OxiAddonsEWFI-2-I-TA |' . sanitize_text_field($_POST['OxiAddonsEWFI-2-I-TA']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-2-IS-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-2-I-FS') . ''
                . ' OxiAddonsFI-2-I-C |' . sanitize_hex_color($_POST['OxiAddonsFI-2-I-C']) . '|'
                . ' OxiAddonsFI-2-I-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-2-I-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-2-I-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-2-I-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-2-I-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-2-I-P') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFI-2-CB-BS') . ''
                . ' OxiAddonsFI-2-CB-BC |' . sanitize_hex_color($_POST['OxiAddonsFI-2-CB-BC']) . '|'
                . ' OxiAddonsEWFI-2-CB-TA |' . sanitize_text_field($_POST['OxiAddonsEWFI-2-CB-TA']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-2-CB-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-2-A1-FS') . ''
                . ' OxiAddonsFI-P-C |' . sanitize_hex_color($_POST['OxiAddonsFI-2-A1-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-2-A1-P2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-2-A1-M') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFI-2-A2-FS') . ''
                . ' OxiAddonsFI-E-C |' . sanitize_hex_color($_POST['OxiAddonsFI-2-A2-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFI-2-A2-E2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-2-A2-M') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFI-2-G-P') . ''
                
               
                . '||#||'
                . ' OxiAddonsFI-2-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsFI-2-I']) . '||#|| '
                . ' OxiAddonsFI-2-A1 ||#||' . sanitize_text_field($_POST['OxiAddonsFI-2-A1']) . '||#|| '
                . ' OxiAddonsFI-2-A2 ||#||' . sanitize_text_field($_POST['OxiAddonsFI-2-A2']) . '||#|| '
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
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsFI-2-G-BG', $styledata, 55, 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-2-G-MXW', $styledata[3], $styledata[4], $styledata[5], '1', 'Maximum Width', 'Set Max Width', 'false', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row', 'max-width');
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-2-G-SZ', $styledata[7], $styledata[8], 'Border', 'Set your body Border Size and Type', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-2-G-BC', $styledata[11], '', 'Border Color', 'Set Your body  Border Color', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-2-G-BR', 13, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-2-G-P', 205, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-2-G-M', 29, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi_addons_FI_2_' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsFI-2-B-Shadow', 45, $styledata, 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row', 'box-shadow');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon Section
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsEWFI-2-I-TA', $styledata[59], 'Text Align', 'Set your Icon Position', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-2-IS-P', 61, $styledata, '1', 'Padding', 'Set Icon Margin', 'false', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_textbox('OxiAddonsFI-2-I', $stylefiles[2], 'Icon Class', 'Set Your Icon Class', 'false');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-2-I-FS', $styledata[77], $styledata[78], $styledata[79], '1', 'Icon Size', 'Set Your Icon', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon .oxi-icons', 'font-size');
                                                echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-2-I-C', $styledata[81], '', 'Icon Color', 'Set Your Icon Font Color', 'false', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon .oxi-icons', 'color');
                                                echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-2-I-BC', $styledata[83], '', 'Background Color', 'Set Your Icon Background Color', 'false', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon .oxi-icons', 'background');
                                                echo oxi_addons_adm_help_number_double_dtm('OxiAddonsFI-2-I-W', $styledata[85], $styledata[86], $styledata[87], 'OxiAddonsFI-2-I-H', $styledata[89], $styledata[90], $styledata[91], 1, 'Width Height', 'Set Your Icon width and Height', 'true', '', '');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-2-I-BR', 93, $styledata, '1', 'Border Radius', 'Set Your Icon Border Radius', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon .oxi-icons', 'border-radius');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-2-I-P', 109, $styledata, '1', 'Padding', 'Set Your Icon Padding', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon .oxi-icons', 'padding');
                                                $NOJS = array(
                                                    array('OxiAddonsFI-2-I-W', 'Width'),
                                                    array('OxiAddonsFI-2-I-H', 'Height'),
                                                );
                                                echo OxiAddonsADMHelpNoJquery($NOJS);
                                                
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
                                            echo oxi_addons_adm_help_Animation('OxiAddonsFI-2-Animation', 51, $styledata, 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Body
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_border('OxiAddonsFI-2-CB-BS', $styledata[125], $styledata[126], 'Border', 'Set your Content Body Border Size and Type', 'false', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_content');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-2-CB-BC', $styledata[129], '', 'Border Color', 'Set Your Content body  Border Color', 'false', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_content', 'border-color');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsEWFI-2-CB-TA', $styledata[131], 'Text Align', 'Set your Content Body Text Align', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_content', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-2-CB-P', 133, $styledata, '1', 'Padding', 'Set your Content Body Padding', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_content', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Address One
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-2-A1', $stylefiles[4], 'Address One', 'Set Your Address One Text', 'false', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-2-A1-FS', $styledata[149], $styledata[150], $styledata[151], '1', 'Font Size', 'Set Your Address One font Size', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-2-A1-C', $styledata[153], '', 'Text Color', 'Set Your Address One Text Color', 'false', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-2-A1-P2', 155, $styledata, 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-2-A1-M', 161, $styledata, '1', 'Padding', 'Set your Address One Text Padding', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Address Two
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsFI-2-A2', $stylefiles[6], 'Address Two', 'Set Your Address Two Text', 'false', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A2');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsFI-2-A2-FS', $styledata[177], $styledata[178], $styledata[179], '1', 'Font Size', 'Set Your Address Two Font Size', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A2', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsFI-2-A2-C', $styledata[181], '', 'Font Color', 'Set Your Address Two Text Color', 'false', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A2', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsFI-2-A2-E2', 183, $styledata, 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A2');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsFI-2-A2-M', 189, $styledata, '1', 'Padding', 'Set your Address Two Padding', 'true', '.oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A2', 'padding');
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
                                <?php wp_nonce_field("oxi-addons-eventwidgets-nonce") ?>
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