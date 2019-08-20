<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';


if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
$listid = '';
$listitemdata = $bgdata = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-icon-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsTestimonial-rows') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsTestimonial-width') . ''
            . ' OxiAddonsTestimonial-BG-color |' . sanitize_text_field($_POST['OxiAddonsTestimonial-BG-color']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial-margin') . ''
            . ' OxiAddonsTestimonial-button-link-opening |' . sanitize_text_field($_POST['OxiAddonsTestimonial-button-link-opening']) . '|'
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsTestimonial-animation') . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddonsTestimonial-p-width') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsTestimonial-p-height') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial-p-radius') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsTestimonial-n-FS') . ''
            . ' OxiAddonsTestimonial-n-c |' . sanitize_hex_color($_POST['OxiAddonsTestimonial-n-c']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsTestimonial-nf') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial-n-padding') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsTestimonial-info-size') . ''
            . ' OxiAddonsTestimonial-info-color |' . sanitize_hex_color($_POST['OxiAddonsTestimonial-info-color']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsTestimonial-font-info') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial-info-padding') . ''
            . ' OxiAddonsTestimonial-nh-c |' . sanitize_hex_color($_POST['OxiAddonsTestimonial-nh-c']) . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddonsTestimonial-DC-FS') . ''
            . ' OxiAddonsTestimonial-designation-c |' . sanitize_hex_color($_POST['OxiAddonsTestimonial-designation-c']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsTestimonial-dc') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial-dc-padding') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsTestimonial-padding-bottom') . ''
            . 'OxiAddonsTestimonial-info-arrow|' . sanitize_text_field($_POST['OxiAddonsTestimonial-info-arrow']) . '|'
            . ' OxiAddonsTestimonial-info-arrow-color |' . sanitize_hex_color($_POST['OxiAddonsTestimonial-info-arrow-color']) . '|'
            . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int)$_POST['oxilistid'];
        $data = '   OxiAddonstestimonial-BG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonstestimonial-BG']) . '||#||'
            . ' OxiAddonstestimonial-wn ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonstestimonial-wn']) . '||#|| '
            . ' OxiAddonstestimonial-text||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonstestimonial-text']) . '||#|| '
            . ' OxiAddonstestimonial-url ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonstestimonial-url']) . '||#|| '
            . ' OxiAddonstestimonial-wd ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonstestimonial-wd']) . '||#|| '
            . '  ||#||';
        $data = sanitize_text_field($data);
        if ($oxilistid > 0) {
            $wpdb->query($wpdb->prepare("UPDATE $table_list SET files = %s WHERE id = %d", $data, $oxilistid));
        } else {
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files) VALUES (%d, %s, %s )", array($oxiid, 'oxi-addons', $data)));
        }
    }
}
if (!empty($_POST['OxiAddonsListFileDelete']) && is_numeric($_POST['oxi-item-id'])) {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileDelete' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileEdit' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
        $data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_list WHERE id = %d ", $item_id), ARRAY_A);
        $listitemdata = explode('||#||', $data['files']);
        $listid = $data['id'];
        echo '<script type="text/javascript"> jQuery(document).ready(function () {setTimeout(function() { jQuery("#oxi-addons-list-data-modal").modal("show")  }, 500); });</script>';
    }
}

OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ", $oxiid), ARRAY_A);
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
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsTestimonial-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Set Your Testimonial Max Width', 'true', '.oxi-testimonials-item-' . $oxiid . '', 'max-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial-BG-color', $styledata[11], 'rgba', 'Background Color', 'Select Your Background Color', 'false', ' .oxi-addons-container .oxi-testimonials-style-' . $oxiid . '-info', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial-margin', 13, $styledata, 1, 'Margin', 'Set Your Testimonial Margin', 'true', '.oxi-testimonials-' . $oxiid . '-padding', 'padding');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsTestimonial-button-link-opening', $styledata[29], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Profile Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial-p-width', $styledata[36], $styledata[37], $styledata[38], 1, 'Width', 'Set Your Testimonial Max Width', 'false', '.oxi-testimonials-style-' . $oxiid . '-image-parent', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial-p-height', $styledata[40], $styledata[41], $styledata[42], 1, 'Height', 'Set Your Testimonial Max height', 'false', '.oxi-testimonials-style-' . $oxiid . '-image:after', 'padding-bottom');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial-p-radius', 44, $styledata, 1, 'Border Radius', 'Set Your Testimonial Border Radius', 'true', '.oxi-testimonials-style-' . $oxiid . '-image img', 'border-radius');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial-padding-bottom', $styledata[146], $styledata[147], $styledata[148], 1, 'Padding Bottom', 'Set Your Testimonial Image Padding Bottom', 'true', '.oxi-testimonials-style-' . $oxiid . '-image-parent', 'padding-bottom');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsTestimonial-animation', 31, $styledata, 'true', 'oxi-testimonials-' . $oxiid . '-padding ');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Information
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial-info-size', $styledata[88], $styledata[89], $styledata[90], 1, 'Font Size', 'Select Your Information Font Size', 'false ', '.oxi-testimonials-style-' . $oxiid . '-info', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial-info-color', $styledata[92], '', 'Color', 'Select Your Information Color', 'false', '.oxi-testimonials-style-' . $oxiid . '-info', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsTestimonial-font-info', 94, $styledata, 'true', '.oxi-testimonials-style-' . $oxiid . '-info');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial-info-padding', 100, $styledata, 1, 'Padding', 'Set Your Information Padding', 'true', '.oxi-testimonials-style-' . $oxiid . '-info', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Bottom Arrow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('OxiAddonsTestimonial-info-arrow', $styledata[150], '', 'Arrow Height', 'Set Your Info Arrow Height', 'true', '.oxi-testimonials-style-' . $oxiid . '-info .oxi-before', 'bottom');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial-info-arrow-color', $styledata[152], '', 'Arrow Color', 'Select Your Info Arrow Color', 'false', '', '');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Name
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial-n-FS', $styledata[60], $styledata[61], $styledata[62], '1', 'Font Size', 'Set Testimonial Name Font Size', 'true', '.oxi-testimonials-style-' . $oxiid . '-name, a .oxi-testimonials-style-' . $oxiid . '-name', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial-n-c', $styledata[64], '', 'Color', 'Set your Name Color', 'false',  '.oxi-testimonials-style-' . $oxiid . '-name, a .oxi-testimonials-style-' . $oxiid . '-name', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial-nh-c', $styledata[116], '', 'Hover Color', 'Set your Name Color', 'false', '.oxi-testimonials-style-' . $oxiid . '-name, a .oxi-testimonials-style-' . $oxiid . '-name:hover', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsTestimonial-nf', 66, $styledata, 'true', '.oxi-testimonials-style-' . $oxiid . '-name, a .oxi-testimonials-style-' . $oxiid . '-name');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial-n-padding', 72, $styledata, 1, 'Padding', 'Set Your Name Padding', 'true', '.oxi-testimonials-style-' . $oxiid . '-name, a .oxi-testimonials-style-' . $oxiid . '-name', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Designation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial-DC-FS', $styledata[118], $styledata[119], $styledata[120], '1', 'Font Size', 'Set Testimonial Name Font Size', 'true', ' .oxi-testimonials-style-' . $oxiid . '-working', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial-designation-c', $styledata[122], '', 'Color', 'Set your Designation Color', 'false', ' .oxi-testimonials-style-' . $oxiid . '-working', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsTestimonial-dc', 124, $styledata, 'true', ' .oxi-testimonials-style-' . $oxiid . '-working');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial-dc-padding', 130, $styledata, 1, 'Padding', 'Set Your Designation Padding', 'true', ' .oxi-testimonials-style-' . $oxiid . '-working', 'padding');
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
                            <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-icon-nonce") ?>
                        </div>
                    </div>

                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Testimonial Rearrange', $listdata, 1, 'image');
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
                    <?php echo oxi_testimonial_style_14_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_model_image_upload('OxiAddonstestimonial-BG', $listitemdata[1], 'Background image', 'Set your background image', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonstestimonial-wn', $listitemdata[3], 'Name', 'Add Writer Name.', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonstestimonial-url', $listitemdata[7], 'URL', 'Set Testimonial Button Text', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonstestimonial-wd', $listitemdata[9], 'Designation', 'Add Writer Designation', 'false');
                    echo oxi_addons_adm_help_form_textarea('OxiAddonstestimonial-text', $listitemdata[5], 'Given Text:', 'Write Your Testimonial Details', 'false');
                    ?>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="oxilistid" name="oxilistid" value="<?php echo $listid; ?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="OxiAddonsListFile" id="OxiAddonsListFile" value="Submit">
                    <?php wp_nonce_field("OxiAddonsListData-nonce") ?>
                </div>
            </div>
        </div>
    </form>
</div>