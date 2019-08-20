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
    if (!wp_verify_nonce($nonce, 'OxiAddLightbox-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '||'
            . '||'
            . ' OxiAddLightbox-full-bg |' . sanitize_text_field($_POST['OxiAddLightbox-full-bg']) . '|'
            . '||||'
            . '||||'
            . '||||'
            . '||||'
            . '||||'
            . '||||'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddLightbox-box-shadow') . ''
            . ' OxiAddLightbox-icon-color |' . sanitize_hex_color($_POST['OxiAddLightbox-icon-color']) . '|'
            . ' OxiAddLightbox-z-index |' . sanitize_text_field($_POST['OxiAddLightbox-z-index']) . '|'
            . ' OxiAddLightbox-icon-color |' . sanitize_hex_color($_POST['OxiAddLightbox-preloader']) . '|'
            . '||#||  ||#||'
            . 'OxiAddLightbox-class ||#||' . sanitize_text_field($_POST['OxiAddLightbox-class']) . '||#||'
            . 'OxiAddLightbox-image ||#||' . sanitize_text_field(OxiAddonsAdminUrlConvert($_POST['OxiAddLightbox-image'])) . '||#||'
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
                                        echo oxi_addons_adm_help_body_image_upload('OxiAddLightbox-image', $stylefiles[5], 'Image Upload', 'Upload Your Image here Which Will show Lightbox', 'false');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddLightbox-class', $stylefiles[3], 'Class or Id', 'Set your Light Box Class or Id for opening Lightbox');
                                        echo oxi_addons_adm_help_number('OxiAddLightbox-z-index', $styledata[41], 1, 'Z Index', 'Set Custom Z Index Value if you want');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddLightbox-full-bg', $styledata[7], 'rgba', 'Background', 'Set Your Full body Background Color', '', '.acxgvsd, .oxi-addons-lightbox-' . $oxiid . '.Oximfp-bg.Oximfp-ready', 'background');
                                        echo OxiAddonsADMHelpNoJquery(
                                            array(
                                                array('OxiAddLightbox-z-index', 'Z-index'),
                                            )
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddLightbox-box-shadow', 33, $styledata, 'true', '.oxi-addons-lightbox-' . $oxiid . ',.oxi-addons-lightbox-' . $oxiid . ' .Oximfp-content .Oximfp-figure::after');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Closing Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddLightbox-icon-color', $styledata[39], '', 'Color', 'Select Your Closing Icon Color', '', '.oxi-addons-lightbox-' . $oxiid . ', .oxi-addons-lightbox-' . $oxiid . '.Oximfp-ready .Oximfp-image-holder .Oximfp-close, .oxi-addons-lightbox-' . $oxiid . '.Oximfp-ready .Oximfp-iframe-holder .Oximfp-close', 'color');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Preloader
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddLightbox-preloader', $styledata[43], '', 'Color', 'Select Your Preloader Color', '', '.oxi-addons-lightbox-' . $oxiid . ', .oxi-addons-lightbox-' . $oxiid . ' .Oximfp-container .Oximfp-preloader', 'background');
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
                            <?php wp_nonce_field("OxiAddLightbox-nonce") ?>
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
                    <div class="oxi-addons-container">
                        <div class="oxi-addons-row">
                            <div class="d-flex justify-content-center">
                                <button type="button" style="margin-right: 10px;" <?php
                                    if (strpos($stylefiles[3], '.') !== false) {
                                        echo 'class="btn btn-info float-right ' . str_replace('.', ' ', $stylefiles[3]) . '"';
                                    } else {
                                        echo 'class="btn btn-info float-right" id="' . str_replace('#', '', $stylefiles[3]) . '"';
                                    }
                                    ?>>Open Lightbox</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>