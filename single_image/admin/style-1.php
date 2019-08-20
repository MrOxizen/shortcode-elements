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
    if (!wp_verify_nonce($nonce, 'OxiAddSI-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-margin') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddSI-box-shadow') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIN-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddSIN-border') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIN-radius') . ''
                . '' . OxiAddonsADMinnerBoxShadowSanitize('OxiAddSIN-image') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIH-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddSIH-border') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIH-radius') . ''
                . '' . OxiAddonsADMinnerBoxShadowSanitize('OxiAddSIH-image') . ''
                . ' OxiAddSIR|' . sanitize_text_field($_POST['OxiAddSIR']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddSIR-size') . ''
                . ' OxiAddSIR-color|' . sanitize_text_field($_POST['OxiAddSIR-color']) . '|'
                . ' OxiAddSIR-bgcolor|' . sanitize_text_field($_POST['OxiAddSIR-bgcolor']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddSIR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIR-padding') . ''
                . ' OxiAddSIN-G|' . sanitize_text_field($_POST['OxiAddSIN-G']) . '|'
                . ' OxiAddSIH-G|' . sanitize_text_field($_POST['OxiAddSIH-G']) . '|'
                . ' OxiAddSIH-bgcolor|' . sanitize_text_field($_POST['OxiAddSIH-bgcolor']) . '|'
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddSI-animation') . ''
                . ' OxiAddSIN-bgcolor|' . sanitize_text_field($_POST['OxiAddSIN-bgcolor']) . '|'
                . ' OxiAddSIR-position|' . sanitize_text_field($_POST['OxiAddSIR-position']) . '|'
                . ' OxiAddSIR-width|' . sanitize_text_field($_POST['OxiAddSIR-width']) . '|'
                . ' OxiAddSIR-top|' . sanitize_text_field($_POST['OxiAddSIR-top']) . '|'
                . ' OxiAddSIR-left|' . sanitize_text_field($_POST['OxiAddSIR-left']) . '|'
                . '||'
                . '||'
                . '||#||  ||#||'
                . 'OxiAddSI-class ||#||' . sanitize_text_field($_POST['OxiAddSI-class']) . '||#||'
                . 'OxiAddSI-image ||#||' . sanitize_text_field(OxiAddonsAdminUrlConvert($_POST['OxiAddSI-image'])) . '||#||'
                . 'OxiAddSIR-text ||#||' . sanitize_text_field($_POST['OxiAddSIR-text']) . '||#||'
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
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
                                        Image Upload
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_body_image_upload('OxiAddSI-image', $stylefiles[5], 'Image Upload', 'Upload Your Image here Which Will show Lightbox', 'false');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddSI-class', $stylefiles[3], 'ID', 'Set your Your Image ID', 'false');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddSI-padding', 3, $styledata, 1, 'Padding', 'Set Your Image Padding Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddSI-margin', 19, $styledata, 1, 'Margin', 'Set Your Image Margin Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . '', 'padding');
                                        ?>
                                    </div> 
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddSI-box-shadow', 35, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddSI-animation', 159, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Normal View
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number('OxiAddSIN-G', $styledata[153], 1, 'Grayscale', 'Set Your GrayScale Value as colorfull is 0 and black-white is 100', '');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddSIN-bgcolor', $styledata[163], 'rgba', 'Background', 'Select Your Image Background', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image::before', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddSIN-border', 41, $styledata, 1, 'Border', 'Set Your Single Image Border Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAddSIN-border', 57, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddSIN-radius', 61, $styledata, 1, 'Border Radius', 'Set Your Image Border Radius Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image, #oxi-addons-preview-data .oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image img', 'border-radius');
                                        echo OxiAddonsADMhelpInnerBoxShadow('OxiAddSIN-image', 77, $styledata, 'true');
                                        $NOJS = array(
                                            array('OxiAddSIN-image-inner', 'Inner Shadow'),
                                            array('OxiAddSIN-image-color', 'Inner Shadow'),
                                            array('OxiAddSIN-G', 'Grayscale'),
                                        );
                                        echo OxiAddonsADMHelpNoJquery($NOJS);
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Hover View 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number('OxiAddSIH-G', $styledata[155], 1, 'Grayscale', 'Set Your GrayScale Value as colorfull is 0 and black-white is 100', '', '');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddSIH-bgcolor', $styledata[157], 'rgba', 'Background', 'Select Your Image Hover Background', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover::before', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddSIH-border', 81, $styledata, 1, 'Border', 'Set Your Single Image Border Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAddSIH-border', 97, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddSIH-radius', 101, $styledata, 1, 'Border Radius', 'Set Your Image Border Radius Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover', 'border-radius');
                                        echo OxiAddonsADMhelpInnerBoxShadow('OxiAddSIH-image', 117, $styledata, 'true');
                                        $NOJS = array(
                                            array('OxiAddSIH-G', 'Grayscale'),
                                            array('OxiAddSIH-image-inner', 'Inner Shadow'),
                                            array('OxiAddSIH-image-color', 'Inner Shadow'),
                                        );
                                        echo OxiAddonsADMHelpNoJquery($NOJS);
                                        ?>


                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Ribbon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('OxiAddSIR', $styledata[121], 'Yes', 'block', 'No', 'none', 'Active Ribbon', 'Want to add ribbon');
                                        echo oxi_addons_adm_help_textbox('OxiAddSIR-text', $stylefiles[7], 'Text', "Set text for Ribbon",'fales','.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content');
                                        echo oxi_addons_adm_help_true_false('OxiAddSIR-position', $styledata[165], 'Left', 'left', 'Right', 'right', 'Ribbon Position', 'Ribbon Position', 'true');
                                        echo oxi_addons_adm_help_number('OxiAddSIR-width', $styledata[167], 1, 'Width', 'Set Your Ribbon Width', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon', 'width');
                                        echo oxi_addons_adm_help_number_double('OxiAddSIR-top', $styledata[169], 'OxiAddSIR-left', $styledata[171], 1, 'Top Left', 'true');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddSIR-size', $styledata[123], $styledata[124], $styledata[125], 1, 'Font Size', 'Select Your Font Size', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddSIR-color', $styledata[127], '', 'Color', 'Select Your Ribbon Color', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddSIR-bgcolor', $styledata[129], 'rgba', 'Background', 'Select Your Ribbon Background', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content', 'background');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddSIR', 131, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddSIR-padding', 137, $styledata, 1, 'Padding', 'Set Your Ribbon Padding Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image-ribbon-content', 'padding');
                                        $NOJS = array(
                                            array('OxiAddSIR-top', 'Top'),
                                            array('OxiAddSIR-left', 'left'),
                                        );
                                        echo OxiAddonsADMHelpNoJquery($NOJS);
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
                            <?php wp_nonce_field("OxiAddSI-nonce") ?>
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
<script type="text/javascript">
    jQuery("#OxiAddSIR-bgcolor").on("change", function () {
        var value1 = jQuery(this).val();
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-addons-single-image-container-<?php echo $oxiid; ?> .oxi-addons-single-image-ribbon:before{border-color:" + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-addons-single-image-container-<?php echo $oxiid; ?> .oxi-addons-single-image-ribbon:after{border-color:" + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
    });

</script>
