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
                . ' oxi_addons-button-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-bg-color']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-btn-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('oxi-addons-border-CS') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-btn-border-radius') . ''
                . ' oxi_addons-button-hover-color |' . sanitize_hex_color($_POST['oxi_addons-button-hover-color']) . '|'
                . ' ||'       
                . ' ||'
                . '' .oxi_addons_adm_help_single_size('oxi_addons-icon-size') . ''
                . 'oxi_addons-icon-color |' . sanitize_hex_color($_POST['oxi_addons-icon-color']). '|'
                . '||'
                . '||||||||'
                . '||||||||'
                . '||||'
                . '||||||||'
                . '||||||||'
                . 'oxi_addons-hover-icon-color |' . sanitize_hex_color($_POST['oxi_addons-hover-icon-color']). '|'
                . '||'
                . '||||||||'
                . '||||||||'
                . '||||||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-btn-padding') . ''
                . 'oxi-addons-icon-position|' . sanitize_text_field($_POST['oxi-addons-icon-position']) . '|'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . '||#||  ||#||'
                . 'oxi_addons-button-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-text']) . '||#||'
                . 'oxi_addons-button-id ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-id']) . '||#||'
                . 'oxi_addons-button-link ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons-button-link']) . '||#||'
                . 'oxi_addons-button-icon ||#||' . sanitize_text_field($_POST['oxi_addons-button-icon']) . '||#||'
                . 'oxi_addons-button-hover-icon ||#||' . sanitize_text_field($_POST['oxi_addons-button-hover-icon']) . '||#||'
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
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-icon', $stylefiles[9], 'Icon Unicode', 'Add Your Icon Unicode from Font Awesome Library', 'true');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-hover-icon', $stylefiles[11], 'Icon Unicode', 'Add Your Hover Icon Unicode from Font Awesome Library', 'true');
                                        ?>
                                        <div class=" form-group row">
                                            <label for="oxi-addons-icon-position" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Icon Position">Icon Width</label>
                                            <div class="col-sm-6 addons-dtm-laptop-lock">
                                                <select class="form-control" id="oxi-addons-icon-position" name="oxi-addons-icon-position">
                                                    <option value="1" <?php selected( $styledata[191], 1 ); ?>>Bold</option>
                                                    <option value="2" <?php selected( $styledata[191], 2 ); ?>>Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-id', $stylefiles[5], 'Button ID', 'If you want to add CSS ID, write down here', 'true');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-link', $stylefiles[7], 'Desire Link', 'Add link/URL to link your button', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-button-link-opening', $styledata[3], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Select the Link Opening type', 'true');
                                        ?>
                                        <?php
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('oxi-addons-icon-position', 'Icon Style'), 
                                                )
                                            );
                                        ?>
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Customize the button width with Responsive Size', 'fales', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn', 'width');                                        
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
                                        Button Text Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-font-size', $styledata[47], $styledata[48], $styledata[49], 1, 'Font Size', 'Customize the button font size, based on Pixels', '', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt','font-size');
                                        echo OxiAddonsADMHelpFontSettings('oxi_addons-button-fs', 51, $styledata, 'true', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-color', $styledata[57], '', 'Color', 'Customize the Button active color', '', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-hover-color', $styledata[97], '', 'Hover Color', 'Customize the Button hover view color', '', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-txt', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-bg-color', $styledata[59], 'rgba', 'Background Color', 'Customize the Button Active Background color, either in gradient or solid color mode', 'fales', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align', 'background');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-btn-border', 61, $styledata, 1, 'Border', 'Set your border width', 'true', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align', 'border-width');
                                        echo OxiAddonsADMhelpBorder('oxi-addons-border-CS', 77, $styledata, 'true','.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-btn-border-radius', 81, $styledata, 1, 'Border Radius', 'Set your border radius', 'true', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align', 'border-radius');
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
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-icon-size', $styledata[103], $styledata[104], $styledata[105], 1, 'Font Size', 'Customize the button font size, based on Pixels', '', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt:before','font-size');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-icon-color', $styledata[107], '', 'Color', 'Customize the Button active color', '', '.Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt:before', 'color');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-hover-icon-color', $styledata[147], '', 'Color', 'Customize the Button active color', '', '.Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-txt::before', 'color');
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
