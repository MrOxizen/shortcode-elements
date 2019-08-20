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
    if (!wp_verify_nonce($nonce, 'OxiAddSI-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-padding') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSI-margin') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddSI-box-shadow') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIN-radius') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddSIH-radius') . ''
            . ' OxiAddSIN-G|' . sanitize_text_field($_POST['OxiAddSIN-G']) . '|'
            . ' OxiAddSIH-G|' . sanitize_text_field($_POST['OxiAddSIH-G']) . '|'
            . ' OxiAddSIH-bgcolor|' . sanitize_text_field($_POST['OxiAddSIH-bgcolor']) . '|'
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddSI-animation') . ''
            . ' OxiAddSIN-bgcolor|' . sanitize_text_field($_POST['OxiAddSIN-bgcolor']) . '|'
            . ' OxiAddSIN-S|' . sanitize_text_field($_POST['OxiAddSIN-S']) . '|'
            . ' OxiAddSIN-animaton-D|' . sanitize_text_field($_POST['OxiAddSIN-animaton-D']) . '|'
            . ' OxiAddSIH-S|' . sanitize_text_field($_POST['OxiAddSIH-S']) . '|'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddSIH-box-shadow') . ''
            . '||'
            . '||'
            . '||#||  ||#||'
            . 'OxiAddSI-class ||#||' . sanitize_text_field($_POST['OxiAddSI-class']) . '||#||'
            . 'OxiAddSI-image ||#||' . sanitize_text_field(OxiAddonsAdminUrlConvert($_POST['OxiAddSI-image'])) . '||#||'
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
                        <div class="oxi-addons-tabs-wrapper">
                            <div class="oxi-addons-tabs-content-tabs">
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
                                            echo oxi_addons_adm_help_Animation('OxiAddSI-animation', 79, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . '');
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
                                            echo oxi_addons_adm_help_number('OxiAddSIN-G', $styledata[73], 1, 'Grayscale', 'Set Your GrayScale Value as colorfull is 0 and black-white is 100', '', '');
                                            echo oxi_addons_adm_help_number('OxiAddSIN-S', $styledata[85], 0.1, 'Scale', 'Set Your Scale Value as ZoomIn is 0 to vanis and 1 to start the image', 'true', '', '');
                                            echo oxi_addons_adm_help_number('OxiAddSIN-animaton-D', $styledata[87], 0.1, 'Animation-Duration', 'Set Your Scale Animation Duration Value for zooming the image', 'true', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSIN-bgcolor', $styledata[83], 'rgba', 'Background', 'Select Your Image Background', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image::before', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSIN-radius', 41, $styledata, 1, 'Border Radius', 'Set Your Image Border Radius Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image, #oxi-addons-preview-data .oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image img ', 'border-radius');
                                            $NOJS = array(
                                                array('OxiAddSIN-G', 'Grayscale'),
                                                array('OxiAddSIN-S', 'Scale'),
                                                array('OxiAddSIN-animaton-D', 'Animation-Duration'),
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
                                            echo oxi_addons_adm_help_number('OxiAddSIH-G', $styledata[75], 1, 'Grayscale', 'Set Your GrayScale Value as colorfull is 0 and black-white is 100', '', '');
                                            echo oxi_addons_adm_help_number('OxiAddSIH-S', $styledata[89], 0.1, 'Scale', 'Set Your Scale Value as More ZoomIn in your image', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover img', 'transform');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddSIH-bgcolor', $styledata[77], 'rgba', 'Background', 'Select Your Image Hover Background', '', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover::before', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddSIH-radius', 57, $styledata, 1, 'Border Radius', 'Set Your Image Border Radius Top Bottom and Left Right', 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover, #oxi-addons-preview-data .oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover img, #oxi-addons-preview-data .oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover::before  ', 'border-radius');
                                            $NOJS = array(
                                                array('OxiAddSIH-G', 'Grayscale'),
                                                array('OxiAddSIH-S', 'Scale'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddSIH-box-shadow', 91, $styledata, 'true', '.oxi-addons-single-image-container-' . $oxiid . ' .oxi-addons-single-image:hover');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
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
    jQuery("#OxiAddSIR-bgcolor").on("change", function() {
        var value1 = jQuery(this).val();
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-addons-single-image-container-<?php echo $oxiid; ?> .oxi-addons-single-image-ribbon:before{border-color:" + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-addons-single-image-container-<?php echo $oxiid; ?> .oxi-addons-single-image-ribbon:after{border-color:" + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
    });
</script>