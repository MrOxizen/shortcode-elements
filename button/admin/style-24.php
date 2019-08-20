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
                . 'oxi_addons-button-link-opening |' . sanitize_text_field($_POST['oxi_addons-button-link-opening']) . '|'
                . 'oxi-addons-icon-animation |' . sanitize_text_field($_POST['oxi-addons-icon-animation']) . '|'
                . '' . oxi_addons_adm_help_single_size('oxi_addons-button-width') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-margin') . ''
                . '' . oxi_addons_adm_help_animation_senitize('oxi_addons-button-animation') . ''
                . '' . oxi_addons_adm_help_single_size('oxi_addons-button-font-size') . ''
                . ' oxi_addons-button-color |' . sanitize_hex_color($_POST['oxi_addons-button-color']) . '|'
                . ' oxi_addons-button-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-bg-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-button-f') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_btn_border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('oxi-addons-btn-CS') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_btn_border_radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-txt-padding') . ''
                . ' oxi_addons-button-hover-color |' . sanitize_hex_color($_POST['oxi_addons-button-hover-color']) . '|'
                . ' oxi_addons-button-hover-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-hover-bg-color']) . '|'
                . '' . OxiAddonsADMHelpBorderSanitize('oxi_addons_button_hoverCS') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-hover-border-radius') . ''
                . ' oxi_addons-button-icon-color |' . sanitize_hex_color($_POST['oxi_addons-button-icon-color']) . '|'
                . ' oxi_addons-button-icon-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-icon-bg-color']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-btn-icon-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('oxi_addons_btn_icon-CS') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-btn-icon-border-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-btn-icon-padding') . ''
                . ' oxi_addons-button-hover-icon-color |' . sanitize_hex_color($_POST['oxi_addons-button-hover-icon-color']) . '|'
                . 'oxi-addons-icon-position |' . sanitize_text_field($_POST['oxi-addons-icon-position']) . '|'
                . '||||'
                . '' . oxi_addons_adm_help_single_size('oxi_addons-icon-font-size') . ''
                . '||||'
                . '' . oxi_addons_adm_help_single_size('oxi-addons-btn-icon-width') . ''
                . '' . oxi_addons_adm_help_single_size('oxi-addons-btn-icon-height') . ''
                . '||'
                . '||'
                . '||'
                . '||'
                .'|||||||||||||||'
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
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-text', $stylefiles[3], 'Button Text', 'Write the text for the button here', 'false', '.oxi-addons-container .oxi-button-' . $oxiid . '');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-icon', $stylefiles[9], 'Icon Class', 'Add Your Icon Class from Font Awesome Library', 'true');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-id', $stylefiles[5], 'Button ID', 'If you want to add CSS ID, write down here', 'true');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-link', $stylefiles[7], 'Desire Link', 'Add link/URL to link your button');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-button-link-opening', $styledata[3], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Select the Link Opening type', 'true');
                                        ?>
                                        <div class=" form-group row">
                                            <label for="oxi-addons-icon-animation" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Icon Position">Icon Animation</label>
                                            <div class="col-sm-6 addons-dtm-laptop-lock">
                                                <select class="form-control" id="oxi-addons-icon-animation" name="oxi-addons-icon-animation">
                                                    <option value="1" <?php selected( $styledata[5], 1 ); ?>>Bounce Top to Bottom </option>
                                                    <option value="2" <?php selected( $styledata[5], 2 ); ?>>Bounce Right to Left</option>
                                                    <option value="3" <?php selected( $styledata[5], 3 ); ?>>Shake</option>
                                                    <option value="4" <?php selected( $styledata[5], 4 ); ?>>Zoom</option>
                                                    <option value="5" <?php selected( $styledata[5], 5 ); ?>>Skew</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label for="oxi-addons-icon-position" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Icon Position">Icon Position</label>
                                            <div class="col-sm-6 addons-dtm-laptop-lock">
                                                <select class="form-control" id="oxi-addons-icon-position" name="oxi-addons-icon-position">
                                                    <option value="1" <?php selected( $styledata[195], 1 ); ?>>Right</option>
                                                    <option value="2" <?php selected( $styledata[195], 2 ); ?>>Left</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('oxi-addons-icon-animation', 'Icon animation'),
                                                    array('oxi-addons-icon-position', 'Icon position'),
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
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Customize the button width with Responsive Size', 'fales', '.oxi-button-' . $oxiid . '', 'width');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-padding', 11, $styledata, 1, 'Padding', 'Customize button Padding either Easy or Advance mode', 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-body', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-margin', 27, $styledata, 1, 'Margin', 'Customize button margin either Easy or Advance mode', 'true', '.oxi-addons-align-' . $oxiid . '', 'padding');
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
                                        Button Setting 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-font-size', $styledata[47], $styledata[48], $styledata[49], 1, 'Font Size', 'Customize the button font size, based on Pixels', '', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-txt', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-color', $styledata[51], '', 'Color', 'Customize the Button active color', 'false', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-txt', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-bg-color', $styledata[53], 'rgba', 'Background Color', 'Customize the Button Active Background color, either in gradient or solid color mode', 'true', '.oxi-button-' . $oxiid . '', 'background');

                                        echo OxiAddonsADMHelpFontSettings('oxi_addons-button-f', 55, $styledata, 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-txt');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons_btn_border', 61, $styledata, 1, 'Border', 'Set your button border', 'true', '.oxi-button-' . $oxiid . '', 'padding');
                                        echo OxiAddonsADMhelpBorder('oxi-addons-btn-CS', 77, $styledata, 'true', '.oxi-button-' . $oxiid . '', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons_btn_border_radius', 81, $styledata, 1, 'Border Radius', 'Set your button border radius', 'true', '.oxi-button-' . $oxiid . '','border-radius');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-txt-padding', 97, $styledata, 1, 'Padding', 'Customize button padding either Easy or Advance mode', 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-txt', 'padding');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Hover View
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-hover-color', $styledata[113], '', 'Color', 'Customize the Button hover view color', '', '.oxi-button-' . $oxiid . ':hover .oxi-btn-txt', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-hover-bg-color', $styledata[115], 'rgba', 'Background Color', 'Customize the Button Hover Background color, either in gradient or solid color mode', 'true', '.oxi-button-' . $oxiid . ':hover', 'background');
                                        echo OxiAddonsADMhelpBorder('oxi_addons_button_hoverCS', 117, $styledata, 'true', '.oxi-button-' . $oxiid . ':hover');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-hover-border-radius', 121, $styledata, 1, 'Border Radius', 'Set your button border radius', 'true', '.oxi-button-' . $oxiid . ':hover','border-radius');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Icon Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-icon-font-size', $styledata[201], $styledata[202], $styledata[203], 1, 'Icon Size', 'Customize the icon font size, based on Pixels', '', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-bg-round', 'font-size');
                                        echo oxi_addons_adm_help_number_double_dtm('oxi-addons-btn-icon-width', $styledata[209], $styledata[210], $styledata[211], 'oxi-addons-btn-icon-height', $styledata[213], $styledata[214], $styledata[215], 1, 'Width & Height', 'Set your icon width and height', 'false', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-bg-round', 'width');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-icon-color', $styledata[137], '', 'Color', 'Customize your icon active color', '', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-icon', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-icon-bg-color', $styledata[139], 'rgba', 'Background Color', 'Customize icon Active Background color, either in gradient or solid color mode', 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-bg-round', 'background');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-btn-icon-border', 141, $styledata, 1, 'Border', 'Set your icon border', 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-bg-round','border-width');
                                        echo OxiAddonsADMhelpBorder('oxi_addons_btn_icon-CS', 157, $styledata, 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-bg-round','') ;
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-btn-icon-border-radius', 161, $styledata, 1, 'Border Radius', 'Set your icon border radius', 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-bg-round','border-radius');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-btn-icon-padding', 177, $styledata, 1, 'Padding', 'Set your icon border radius', 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-btn-bg-round','padding');
                                        ?>
                                        <?php
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('oxi-addons-btn-icon-width', 'Icon width'),
                                                    array('oxi-addons-btn-icon-height', 'Icon height'),
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Hover View
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-hover-icon-color', $styledata[193], 'true', 'Color', 'Customize icon hover  color', '', '.oxi-button-' . $oxiid . ':hover .oxi-btn-bg-round', 'color');
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
