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
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageComparison-G-W') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageComparison-G-margin') . ''
            . ' OxiAddonsImageComparison-G-offset |' . sanitize_text_field($_POST['OxiAddonsImageComparison-G-offset']) . '|'
            . '||#||'
            . ' OxiAddonsImageComparison-IMG-one ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsImageComparison-IMG-one']) . '||#|| '
            . ' OxiAddonsImageComparison-IMG-two ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsImageComparison-IMG-two']) . '||#|| '
            . ' OxiAddonsImageComparison-IMG-three ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsImageComparison-IMG-three']) . '||#|| '
            . ' OxiAddonsImageComparison-IMG-four ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsImageComparison-IMG-four']) . '||#|| '
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
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageComparison-G-W', $styledata[3], $styledata[4], $styledata[5], 1, 'Max-Width', 'Set Your Image Max Width', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'width');
                                            echo oxi_addons_adm_help_number('OxiAddonsImageComparison-G-offset', $styledata[23], 0.1, 'Coparison Offset', 'Set Your Image comparison Offset', 'false', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageComparison-G-margin', 7, $styledata, 1, 'Margin', 'Set Image Comparison body Padding', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsImageComparison-G-W', 'Width'),
                                                    array('OxiAddonsImageComparison-G-offset', 'Offset'),
                                                )
                                            );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Upload Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_body_image_upload('OxiAddonsImageComparison-IMG-one', $stylefiles[2], 'First Image', 'Upload First Image for image comparison', 'false');
                                            echo oxi_addons_adm_help_body_image_upload('OxiAddonsImageComparison-IMG-two', $stylefiles[4], 'Second Image', 'Upload Second Image for image comparison', 'false');
                                            echo oxi_addons_adm_help_body_image_upload('OxiAddonsImageComparison-IMG-three', $stylefiles[6], 'Third Image', 'Upload third Image for image comparison', 'false');
                                            echo oxi_addons_adm_help_body_image_upload('OxiAddonsImageComparison-IMG-four', $stylefiles[8], 'Fourth Image', 'Upload fourth Image for image comparison', 'false');

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