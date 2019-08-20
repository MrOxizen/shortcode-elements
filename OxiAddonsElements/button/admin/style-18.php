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
    if (!wp_verify_nonce($nonce, 'oxi-addons-button-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                .'oxi_addons-button-link-opening |' . sanitize_text_field($_POST['oxi_addons-button-link-opening']) . '|'
                . '||'
                . '' . oxi_addons_adm_help_single_size('oxi_addons-button-width') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-padding') . ''                
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-margin') . ''
                . '' . oxi_addons_adm_help_animation_senitize('oxi_addons-button-animation') . ''
                . '' . oxi_addons_adm_help_single_size('oxi_addons-button-font-size') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-button-fs') . ''
                . ' oxi_addons-button-color |' . sanitize_hex_color($_POST['oxi_addons-button-color']) . '|'
                . ' ||'
                . '||||||||'
                . '||||||||'
                . '||||'
                . '||||||||'
                . '||||||||'
                
                . ' oxi_addons-button-hover-color |' . sanitize_hex_color($_POST['oxi_addons-button-hover-color']) . '|'
                . ' ||'       
                . ' oxi_addons_icon_border_hover_color |' . sanitize_hex_color($_POST['oxi_addons_icon_border_hover_color']) . '|'
                
                . '' .oxi_addons_adm_help_single_size('oxi_addons-icon-size') . ''
                . 'oxi_addons-icon-color |' . sanitize_hex_color($_POST['oxi_addons-icon-color']). '|'
                . 'oxi_addons-icon-bg-color |' . sanitize_text_field($_POST['oxi_addons-icon-bg-color']). '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-icon-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('oxi-addons-icon-border-CS') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-btn-icon-border-radius') . ''
                . 'oxi_addons-hover-icon-color |' . sanitize_hex_color($_POST['oxi_addons-hover-icon-color']). '|'
                . 'oxi_addons-hover-icon-bg-color|' . sanitize_text_field($_POST['oxi_addons-hover-icon-bg-color']). '|'
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('oxi-addons-icon-width') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('oxi-addons-icon-height') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-icon-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-btn-padding') . ''
                . '||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . '||#||  ||#||'
                . 'oxi_addons-button-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-text']) . '||#||'
                . 'oxi_addons-button-id ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-id']) . '||#||'
                . 'oxi_addons-button-link ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons-button-link']) . '||#||'
                . 'oxi_addons-button-icon ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi_addons-button-icon']) . '||#||'
                . '|';


        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);

//echo '<pre>';
//print_r($styledata);
//echo '</pre>';
?>
<div class="wrap">    
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button Information
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-text', $stylefiles[3], 'Button Text', 'Write the text for the button here', 'false', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-icon', $stylefiles[9], 'Icon Class', 'Add Your Icon Class from Font Awesome Library', 'true');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-id', $stylefiles[5], 'Button ID', 'If you want to add CSS ID, write down here', 'true');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-link', $stylefiles[7], 'Desire Link', 'Add link/URL to link your button', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-button-link-opening', $styledata[3], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Select the Link Opening type', 'true');
                                        ?>
                                       
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Customize the button width with Responsive Size', 'fales', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-btn-body', 'width');                                        
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-padding', 11, $styledata, 1, 'Padding', 'Customize button padding either Easy or Advance mode', 'true', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-margin', 27, $styledata, 1, 'Margin', 'Customize button margin either Easy or Advance mode', 'true', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-body', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('oxi_addons-button-animation', 43, $styledata, 'true', '.oxi-button-' . $oxiid . '');
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
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-font-size', $styledata[47], $styledata[48], $styledata[49], 1, 'Font Size', 'Customize the button font size, based on Pixels', '', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt','font-size');
                                        echo OxiAddonsADMHelpFontSettings('oxi_addons-button-fs', 51, $styledata, 'true', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-color', $styledata[57], '', 'Color', 'Customize the Button active color', '', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-hover-color', $styledata[97], '', 'Hover Color', 'Customize the Button hover view color', 'true', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-txt', 'color');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-btn-padding', 175, $styledata, 1, 'Padding', 'Set your Button padding', 'true', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt', 'padding');
                                        ?>
                                    </div>
                                </div>   
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Icon Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-icon-size', $styledata[103], $styledata[48], $styledata[49], 1, 'Font Size', 'Customize the button font size, based on Pixels', '', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-icon','font-size');
                                        echo oxi_addons_adm_help_number_double_dtm('oxi-addons-icon-width', $styledata[151],$styledata[152],$styledata[153], 'oxi-addons-icon-height', $styledata[155],$styledata[156],$styledata[157], 1, 'Icon Width & Height', 'Set your icon Width Height', '','.Oxi-addons-btn-'.$oxiid.' .oxi-btn-icon','width') ;
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-icon-color', $styledata[107], '', 'Color', 'Customize the Button active color', '', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-icon', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-icon-bg-color', $styledata[109], 'rgba', 'Background Color', 'Customize the Button Active Background color, either in gradient or solid color mode', 'true', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-icon', 'background');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-icon-border', 111, $styledata, 1, 'Border', 'Set your border width', 'true', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-icon', 'border-width');
                                        echo OxiAddonsADMhelpBorder('oxi-addons-icon-border-CS', 127, $styledata, 'true','.Oxi-addons-btn-'.$oxiid.' .oxi-btn-icon');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-btn-icon-border-radius', 131, $styledata, 1, 'Border Radius', 'Set your border radius', 'true', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-icon', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-icon-padding', 159, $styledata, 1, 'Padding', 'Set your icon padding', 'true', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-icon-body', 'padding');
                                        ?>
                                    </div>
                                    <?php
                                        echo OxiAddonsADMHelpNoJquery(
                                            array(
                                                array('oxi-addons-icon-width', 'Icon Width'),
                                                array('oxi-addons-icon-height', 'Icon Height'),
                                            )
                                        );
                                    ?>
                                    <div class="oxi-head">
                                        Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-hover-icon-color', $styledata[147], '', 'Color', 'Customize the Button active color', '', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-icon', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-hover-icon-bg-color', $styledata[149], 'rgba', 'Background Color', 'Customize the Button Active Background color, either in gradient or solid color mode', 'fales', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-icon', 'background');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons_icon_border_hover_color', $styledata[101], '', 'Border Color ', 'Set Your Border Color', 'true','.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-icon','border-color') ;
                                        ?>
                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
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
                    <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
