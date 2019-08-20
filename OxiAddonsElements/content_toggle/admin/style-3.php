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
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsCT-H-FS') . ''
                . ' OxiAddonsCT-H-C |' . sanitize_hex_color($_POST['OxiAddonsCT-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsCT-H-H2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCT-H-M') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsCT-AH-FS') . ''
                . ' OxiAddonsCT-AH-C |' . sanitize_hex_color($_POST['OxiAddonsCT-AH-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsCT-AH-H2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCT-AH-M') . ''
                . ' OxiAddonsCT-B-BG |' . sanitize_text_field($_POST['OxiAddonsCT-B-BG']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsCT-B-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsCT-B-H') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsCT-B-SZ') . ''
                . ' OxiAddonsCT-B-BC |' . sanitize_hex_color($_POST['OxiAddonsCT-B-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCT-B-BR') . ''
                . ' ||||||||||||||||'
                . ' ||'
                . ' ||||'
                . ' ||||'
                . ' ||||||'
                . ' ||||||||||||||||'
                . ' ||||||||||||||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCT-CB-M') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCT-B-M') . ''
                . ' OxiAddonsCT-H-AC |' . sanitize_hex_color($_POST['OxiAddonsCT-H-AC']) . '|'
                . ' OxiAddonsCT-AH-AC |' . sanitize_hex_color($_POST['OxiAddonsCT-AH-AC']) . '|'
                . '||#||'
                . ' OxiAddonsCT-H ||#||' . sanitize_text_field($_POST['OxiAddonsCT-H']) . '||#|| '
                . ' OxiAddonsCT-AH ||#||' . sanitize_text_field($_POST['OxiAddonsCT-AH']) . '||#|| '
                . ' OxiAddonsCT-C-O ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsCT-C-O']) . '||#|| '
                . ' OxiAddonsCT-C-T ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsCT-C-T']) . '||#|| '
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
                                <li  ref="#oxi-addons-tabs-2">Tab One</li>
                                <li  ref="#oxi-addons-tabs-3">Tab Two</li>
                            </ul>  
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Body Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCT-CB-M', 155, $styledata, '1', 'Padding', 'Set your Content Body Padding', 'false', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-CT-main-content', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCT-B-M', 159, $styledata, '1', 'Margin', 'Set your Body Margin', 'true', '.oxi-addons-CT-'.$oxiid.'', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button First Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsCT-H', $stylefiles[2], 'Header Text', 'Set Your Before Button Text', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCT-H-FS', $styledata[3], $styledata[4], $styledata[5], '1', 'Font Size', 'Set Your Before Button Text Font Size', 'true', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-before-text', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCT-H-C', $styledata[7], '', 'Text Color', 'Set Your Before Button Text Color', 'false', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-before-text', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsCT-H-H2', 9, $styledata, 'true', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-before-text');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCT-H-M', 15, $styledata, '1', 'Padding', 'Set your Before Button Text Padding', 'true', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-before-text', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button First Active Color
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCT-H-AC', $styledata[187], '', 'Text Color', 'Set Your Before Button Active Text Color', 'false', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-before-text.oxi-active', 'color');
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
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCT-B-BG', $styledata[59], 'rgba', 'Background', 'Set Your Button Background Color', 'false', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-switch', 'background');
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsCT-B-W', $styledata[61], $styledata[62], $styledata[63], 'OxiAddonsCT-B-H', $styledata[65], $styledata[66], $styledata[67], 1, 'Width Height', 'Set Your Button width and Height', 'true', '', '');
                                            echo oxi_addons_adm_help_border('OxiAddonsCT-B-SZ', $styledata[69], $styledata[70], 'Border', 'Set your Button Border Size and Type', 'true', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-switch');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCT-B-BC', $styledata[73], '', 'Border Color', 'Set Your Button  Border Color', 'true', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-switch', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCT-B-BR', 75, $styledata, '1', 'Border Radius', 'Set your Button Border Radius', 'true', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-switch', 'border-radius');
                                            $NOJS = array(
                                                array('OxiAddonsCT-B-W', 'Button Width'),
                                                array('OxiAddonsCT-B-H', 'Button Hight')
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        
                                    </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Second Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsCT-AH', $stylefiles[4], 'Header Text', 'Set Your  After Button Text', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCT-AH-FS', $styledata[31], $styledata[32], $styledata[33], '1', 'Font Size', 'Set Your  After Button Text Font Size', 'true', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-after-text', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCT-AH-C', $styledata[35], '', 'Text Color', 'Set Your  After Button Text Color', 'false', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-after-text', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsCT-AH-H2', 37, $styledata, 'true', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-after-text');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCT-AH-M', 43, $styledata, '1', 'Padding', 'Set your  After Button Text Padding', 'true', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-after-text', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                              Button Second Active Color
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCT-AH-AC', $styledata[189], '', 'Text Color', 'Set Your After Button Active Text Color', 'false', '.oxi-addons-CT-'.$oxiid.' .oxi-addons-after-text.oxi-active', 'color');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-12">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content One
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php echo oxi_addons_adm_help_form_textarea('OxiAddonsCT-C-O', $stylefiles[6], 'Info Text', 'Give Your Info text Here Or You can give Any Shortcode from our addons', 'false'); ?>
                                        </div>
                                    </div>  
                                </div> 
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-3">
                                <div class="oxi-addons-col-12">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Two
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php echo oxi_addons_adm_help_form_textarea('OxiAddonsCT-C-T', $stylefiles[8], 'Info Text', 'Give Your Info text Here Or You can give Any Shortcode from our addons', 'false'); ?>
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