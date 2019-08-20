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
        $data =  'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . 'oxi_addons-button-link-opening |' . sanitize_text_field($_POST['oxi_addons-button-link-opening']) . '|'
                . ' oxi_addons-button-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-bg-color']) . '|'
                . ' oxi_addons-button-hover-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-hover-bg-color']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-border-W') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('oxi-addons-button-border-SC') . '|'
                .'||' 
                . '||||||||'
                . '||||||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-margin') . ''
                . '' . oxi_addons_adm_help_animation_senitize('oxi_addons-button-animation') . ''
                .'oxi_addons-text-color |' .sanitize_text_field($_POST['oxi_addons-text-color']) . '|' 
                .'oxi_addons-text-hover-color |' .sanitize_text_field($_POST['oxi_addons-text-hover-color']) . '|' 
                . '' . oxi_addons_adm_help_single_size('oxi-addons-font-size') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-text-FS') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-text-padding') . ''
                
                .'oxi_addons-button-icon-color |' .sanitize_text_field($_POST['oxi_addons-button-icon-color']) . '|' 
                .'oxi_addons-button-icon-hover-color |' .sanitize_text_field($_POST['oxi_addons-button-icon-hover-color']) . '|' 
                . '' . oxi_addons_adm_help_single_size('oxi_addons-button-icon-size') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-icon-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-border-radius-all') . ''
                . 'oxi-addons-Button-position|' . sanitize_text_field($_POST['oxi-addons-Button-position']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-hover-border-W') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('oxi-addons-button-hover-border-SC') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-hover-border-radius-all') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddButton-button-shadow') . '' 
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddButton-button-hover-shadow') . ''
                . 'oxi-addons-icon-position|' . sanitize_text_field($_POST['oxi-addons-icon-position']) . '|'
                
                . 'oxi_addons-2nd-text-color|' . sanitize_hex_color($_POST['oxi_addons-2nd-text-color']) . '|'
                . 'oxi_addons-2nd-text-hover-color|' . sanitize_hex_color($_POST['oxi_addons-2nd-text-hover-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('oxi-addons-2nd-text-font-size') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-2nd-text-FS') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-2nd-text-padding') . ''
                . '' . oxi_addons_adm_help_single_size('oxi_addons-line-width') . ''
                . '' . oxi_addons_adm_help_single_size('oxi_addons-line-height') . ''
                . 'oxi-addons-line-color |' . sanitize_text_field($_POST['oxi-addons-line-color']) . '|'
                . 'oxi-addons-line-hover-color |' . sanitize_text_field($_POST['oxi-addons-line-hover-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('oxi_addons-button-width') . ''
                . '||'
                . '||'
                . '||'
                . '||'
                . '||'
                
                . '||#||  ||#||'
                . 'oxi_addons-button-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-text']) . '||#||'
                . 'oxi_addons-button-id ||#||' . sanitize_text_field($_POST['oxi_addons-button-id']) . '||#||'
                . 'oxi_addons-button-link ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons-button-link']) . '||#||'
                . 'oxi_addons-button-icon ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi_addons-button-icon']) . '||#||'
                . 'oxi_addons-button-text2 ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-text2']) . '||#||'
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype,'', '', ''); ?>
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
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-text', $stylefiles[3], 'Button Text 1', 'Write the 1st text for the button here', 'false','.oxi-addons-container .oxi-button-' . $oxiid . '');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-text2', $stylefiles[11], 'Button Text 2', 'Write the 2nd text for the button here', 'false','.oxi-addons-container .oxi-button-' . $oxiid . '');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-icon', $stylefiles[9], 'Icon Class', 'Add Your Icon Class from Font Awesome Library', 'true');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-id', $stylefiles[5], 'Button ID', 'If you want to add CSS ID, write down here', 'true');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-link', $stylefiles[7], 'Desire Link', 'Add link/URL to link your button','true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-button-link-opening', $styledata[3], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Select the Link Opening type', 'true');
                                        ?>
                                        <div class=" form-group row">
                                            <label for="oxi-addons-Button-position" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Button Position">Button Position</label>
                                            <div class="col-sm-6 addons-dtm-laptop-lock">
                                                <select class="form-control" id="oxi-addons-Button-position" name="oxi-addons-Button-position">
                                                    <option value="1" <?php selected( $styledata[153], 1 ); ?>>Left</option>
                                                    <option value="2" <?php selected( $styledata[153], 2 ); ?>>Right</option>
                                                    <option value="3" <?php selected( $styledata[153], 3 ); ?>>Center</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label for="oxi-addons-icon-position" class="col-sm-6 control-label" oxi-addons-tooltip="Set your icon Position">Icon Position</label>
                                            <div class="col-sm-6 addons-dtm-laptop-lock">
                                                <select class="form-control" id="oxi-addons-icon-position" name="oxi-addons-icon-position">
                                                    <option value="1" <?php selected( $styledata[203], 1 ); ?>>Left</option>
                                                    <option value="2" <?php selected( $styledata[203], 2 ); ?>>Right</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <?php
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('oxi-addons-Button-position', 'Button position'),
                                                    array('oxi-addons-icon-position', 'Icon Position'),
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
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-bg-color', $styledata[5], 'rgba', 'Background Color', 'Customize the Button Active Background color, either in gradient or solid color mode', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align', 'background');
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-width', $styledata[247], $styledata[248], $styledata[249], 1, 'Width', 'Customize the button width with Responsive Size', 'fales', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-'. $oxiid .'', 'width');                                        
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-border-W', 9, $styledata, 1, 'Border', 'Set your active button Border with size and different style', 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align', 'border-width');
                                        echo OxiAddonsADMhelpBorder('oxi-addons-button-border-SC', 25, $styledata, 'fales', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-border-radius-all',137, $styledata, 1, 'Border Radius', 'Set border radius. 0 value for angular border, 50 for rounded', 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-padding', 121, $styledata, 1, 'Padding', 'Customize button padding either Easy or Advance mode', 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-'. $oxiid .'', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-margin', 47, $styledata, 1, 'Margin', 'Customize button margin either Easy or Advance mode', 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align', 'margin');
                                        
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Hover Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-hover-bg-color', $styledata[7], 'rgba', 'Background Color', 'Customize the Button Active Background color, either in gradient or solid color mode', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover', 'background');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-hover-border-W', 155, $styledata, 1, 'Border', 'Set your active button Border with size and different style', 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover', 'border-width');
                                        echo OxiAddonsADMhelpBorder('oxi-addons-button-hover-border-SC', 171, $styledata, 'fales', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-hover-border-radius-all',175, $styledata, 1, 'Border Radius', 'Set border radius. 0 value for angular border, 50 for rounded', 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover', 'border-radius');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Midline Style
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-line-width', $styledata[235], $styledata[236], $styledata[237], 1, 'Width', 'Customize the line width with Responsive Size', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-btn-icon:after', 'width');
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-line-height', $styledata[239], $styledata[240], $styledata[241], 1, 'Height', 'Customize the line height with Responsive Size', 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-btn-icon:after', 'height');
                                            echo oxi_addons_adm_help_MiniColor('oxi-addons-line-color', $styledata[243], 'rgba', 'Color', 'set your line color', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-btn-icon:after', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-addons-line-hover-color', $styledata[245], 'rgba', 'Color', 'set your line color', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-btn-icon:after', 'color');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('oxi_addons-button-animation', 63, $styledata, 'true', '.oxi-button-' . $oxiid . '', '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        1st Text Setting 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-text-color', $styledata[67], '', 'Color', 'Customize the Button active color', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-text', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-text-hover-color', $styledata[69], '', 'Hover Color', 'Customize the Button active color', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover .oxi-button-text', 'color');
                                        echo oxi_addons_adm_help_number_dtm('oxi-addons-font-size', $styledata[71], $styledata[72], $styledata[73], 1, 'Font Size', 'Customize the button font size, based on Pixels', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-text', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('oxi_addons-text-FS', 75, $styledata, 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-text');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-text-padding', 81, $styledata, 1, 'Padding', 'Set your  text padding', 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-text', 'padding');
                                       ?>
                                    </div>
                                </div>   
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        2nd Text Setting 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-2nd-text-color', $styledata[205], '', 'Color', 'Customize the Button active color', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-text2', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-2nd-text-hover-color', $styledata[207], '', 'Hover Color', 'Customize the Button active color', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover .oxi-button-text2', 'color');
                                        echo oxi_addons_adm_help_number_dtm('oxi-addons-2nd-text-font-size', $styledata[209], $styledata[210], $styledata[211], 1, 'Font Size', 'Customize the button font size, based on Pixels', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-text2', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('oxi_addons-2nd-text-FS', 213, $styledata, 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-text2');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-2nd-text-padding', 219, $styledata, 1, 'Padding', 'Set your  text padding', 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-text2', 'padding');
                                       ?>
                                    </div>
                                </div>   
                                  
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Icon Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-icon-color', $styledata[97], 'rgba', 'Color', 'Select Your Icon Color', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-icon', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-icon-hover-color', $styledata[99], '', 'Hover Color', 'Select Your Icon Color', '', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover .oxi-button-icon', 'color');
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-icon-size', $styledata[101], $styledata[102], $styledata[103], 1, 'Icon Size', 'Your Button Icon Size', '', ' .oxi-addons-button-body-' . $oxiid . ' .oxi-button-icon', 'font-size');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-icon-padding', 105, $styledata, 1, 'Padding', 'Set your  icon padding', 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-button-icon', 'padding');
                                        ?>
                                    </div>                                                
                                </div>
                                <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddButton-button-shadow', 191, $styledata, 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddButton-button-hover-shadow', 197, $styledata, 'true', '.oxi-addons-button-body-' . $oxiid . ' .oxi-addons-align:hover');
                                            ?>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
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
