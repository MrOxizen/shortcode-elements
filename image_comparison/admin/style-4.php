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
            . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageComparison-G-W')
            . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageComparison-H-W')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageComparison-G-margin')
            . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageComparison_H_transition')
            . '||#||'
            . 'oxi_addons_font_view_img ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons_font_view_img']) . '||#|| '
            . 'oxi_addons_hover_view_img ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons_hover_view_img']) . '||#|| '
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageComparison-G-W', $styledata[3], $styledata[4], $styledata[5], 1, 'Max-Width', 'Set Your Image Max Width', 'false', '.oxi_addons_image_'.$oxiid.'_box', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageComparison-H-W', $styledata[7], $styledata[8], $styledata[9], 1, 'Hover Width', 'Set Your Image Hover Width', 'false', '.oxi_addons_image_'.$oxiid.'_box', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageComparison_H_transition', $styledata[27], $styledata[28], $styledata[29], 0.1, 'Hover Transition', 'Set Your Image Hover Transition', 'true', '.oxi_addons_image_'.$oxiid.'_box .oxi_addons_font_view_img', 'transition');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageComparison-G-margin', 11, $styledata, 1, 'Margin', 'Set Image Comparison body Padding', 'true', '.oxi_addons_image_'.$oxiid.'_box', 'padding');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsImageComparison-H-W', 'Hover Width'),
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
                                            echo oxi_addons_adm_help_image_upload('oxi_addons_font_view_img', $stylefiles[2] , 'Font Image', 'Upload Font Image for image comparison', 'f');
                                            echo oxi_addons_adm_help_image_upload('oxi_addons_hover_view_img', $stylefiles[4] , 'Hover Image', 'Upload Hover Image for image comparison', 'f');
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