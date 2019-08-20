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
    if (!wp_verify_nonce($nonce, 'OxiAddDropCaps-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = ' oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddTextBlocks-margin') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddTextBlocks-animation') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddTextBlocks-1st-font-size') . ''
            . ' OxiAddTextBlocks-1st-color |' . sanitize_hex_color($_POST['OxiAddTextBlocks-1st-color']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddTextBlocks-1st') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddTextBlocks-1st-padding') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddTextBlocks-2nd-font-size') . ''
            . ' OxiAddTextBlocks-2nd-color |' . sanitize_hex_color($_POST['OxiAddTextBlocks-2nd-color']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddTextBlocks-2nd') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddTextBlocks-2nd-padding') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddTextBlocks-border-width') . ''
            . '' . OxiAddonsADMHelpBorderSanitize('OxiAddTextBlocks-border') . '' . sanitize_text_field($_POST['OxiAddTextBlocks-border']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddTextBlocks-border-padding') . ''
            . '||||'
            . '' . oxi_addons_adm_help_single_size('OxiAddTextBlocks-max-width') . ''
            . '||#||  ||#||'
            . 'OxiAddTextBlocks-1st-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddTextBlocks-1st-text']) . '||#||'
            . 'OxiAddTextBlocks-2nd-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddTextBlocks-2nd-text']) . '||#||'
            . 'OxiAddTextBlocks-style ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddTextBlocks-style']) . '||#||'
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
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General Information
                                    </div>
                                    <div class="oxi-addons-content-div-body">

                                        <div class="form-group row">
                                            <label for="OxiAddTextBlocks-style" class="col-sm-6 control-label" oxi-addons-tooltip="Set the order of the Text block’s Property (Heading, Border, Content)"> Blocks Style</label>
                                            <div class="col-sm-6 addons-dtm-laptop">
                                                <select class="form-control" id="OxiAddTextBlocks-style" name="OxiAddTextBlocks-style">
                                                    <option value="headingbordercontent" <?php
                                                                                            if ($stylefiles[7] == 'headingbordercontent') {
                                                                                                echo 'selected';
                                                                                            }
                                                                                            ?>>Heading > Border > Content</option>
                                                    <option value="contentborderheading" <?php
                                                                                            if ($stylefiles[7] == 'contentborderheading') {
                                                                                                echo 'selected';
                                                                                            }
                                                                                            ?>>Content > Border > Heading</option>
                                                    <option value="headingcontentborder" <?php
                                                                                            if ($stylefiles[7] == 'headingcontentborder') {
                                                                                                echo 'selected';
                                                                                            }
                                                                                            ?>>Heading > Content > Border</option>
                                                    <option value="contentheadingborder" <?php
                                                                                            if ($stylefiles[7] == 'contentheadingborder') {
                                                                                                echo 'selected';
                                                                                            }
                                                                                            ?>>Content > Heading >Border</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddTextBlocks-max-width', $styledata[107], $styledata[108], $styledata[109], 1, 'Max Width', 'Customize the maximum width for the Text Blocks.', 'false', '.oxi-addons-text-blocks-' . $oxiid . '-body', 'max-width');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddTextBlocks-margin', 3, $styledata, 1, 'Margin', 'Customize the Margin for the Text Blocks, either Easy or Advance mode', 'true', '.oxi-addons-text-blocks-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddTextBlocks-animation', 19, $styledata, 'true', '.oxi-addons-container');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        First Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textarea('OxiAddTextBlocks-1st-text', $stylefiles[3], 'Heading', 'Write the Heading Text Here', 'fales', '.oxi-addons-text-blocks-heading-' . $oxiid . '');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddTextBlocks-1st-font-size', $styledata[23], $styledata[24], $styledata[25], 1, 'Font Size', 'Set the Font Size for the Heading ', 'true', '.oxi-addons-text-blocks-heading-' . $oxiid . '', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddTextBlocks-1st-color', $styledata[27], '', 'Color', 'Customize the Heading text Color. Pick the desire color from color picker', 'false', '.oxi-addons-text-blocks-heading-' . $oxiid . '', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddTextBlocks-1st', 29, $styledata, 'true', '.oxi-addons-text-blocks-heading-' . $oxiid . '');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddTextBlocks-1st-padding', 35, $styledata, 1, 'Padding', 'Customize the Padding for the Heading Text, either Easy or Advance mode', 'true', '.oxi-addons-text-blocks-heading-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Content
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        oxi_addons_adm_help_textarea('OxiAddTextBlocks-2nd-text', $stylefiles[5], 'fales', '.oxi-addons-text-blocks-content-' . $oxiid . '');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddTextBlocks-2nd-font-size', $styledata[51], $styledata[52], $styledata[53], 1, 'Font Size', 'Set the Font Size for the Content', 'true', '.oxi-addons-text-blocks-content-' . $oxiid . '', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddTextBlocks-2nd-color', $styledata[55], '', 'Color', 'Customize the Text Color. Pick the desire color from color picker', 'false', '.oxi-addons-text-blocks-content-' . $oxiid . '', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddTextBlocks-2nd', 57, $styledata, 'true', '.oxi-addons-text-blocks-content-' . $oxiid . '');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddTextBlocks-2nd-padding', 63, $styledata, 1, 'Padding', 'Customize the Padding for the Content Text, either Easy or Advance mode', 'true', '.oxi-addons-text-blocks-content-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Border
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddTextBlocks-border-width', $styledata[79], $styledata[80], $styledata[81], 1, 'Border Width', 'Set the width for the border', 'false', '.oxi-addons-text-blocks-border-' . $oxiid . ' .oxi-addons-text-block-border', 'width');
                                        echo oxi_addons_adm_help_number('OxiAddTextBlocks-border', $styledata[85], 1, 'Border Size', 'Customize border size with different style', '', '');
                                        echo OxiAddonsADMhelpBorder('OxiAddTextBlocks-border', 83, $styledata);
                                        echo oxi_addons_adm_help_padding_margin('OxiAddTextBlocks-border-padding', 87, $styledata, 1, 'Padding', 'Set the padding for border, either Easy or Advance mode.', 'true', '.oxi-addons-text-blocks-border-' . $oxiid . '', 'padding');
                                        echo OxiAddonsADMHelpNoJquery(
                                            array(
                                                array('OxiAddTextBlocks-border', 'border'),
                                            )
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("OxiAddDropCaps-nonce") ?>
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