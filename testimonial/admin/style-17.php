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
            . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsTestimonial-rows')
            . oxi_addons_adm_help_single_size('OxiAddonsTestimonial-width')
            . ' OxiAddonsTestimonial-BG-color |' . sanitize_text_field($_POST['OxiAddonsTestimonial-BG-color']) . '|'
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial_border_width')
            . OxiAddonsADMHelpBorderSanitize('OxiAddonsTestimonial_border') . '|'
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial_B_radius')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial_padding')
            . 'OxiAddonsTestimonial_link_opening |' . sanitize_text_field($_POST['OxiAddonsTestimonial_link_opening']) . '|'

            . 'OxiAddonsTestimonial_H_BG |' . sanitize_text_field($_POST['OxiAddonsTestimonial_H_BG']) . '|'
            . OxiAddonsADMHelpBorderSanitize('OxiAddonsTestimonial_H_border') . '|'
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial_H_B_radius')

            . oxi_addons_adm_help_single_size('OxiAddonsTestimonial_img_width')
            . oxi_addons_adm_help_single_size('OxiAddonsTestimonial_img_height')

            . oxi_addons_adm_help_animation_senitize('OxiAddonsTestimonial_animation')

            . OxiAddonsADMBoxShadowSanitize('OxiAddonsTestimonial_BoxS')
            . OxiAddonsADMBoxShadowSanitize('OxiAddonsTestimonial_H_BoxS')

            . oxi_addons_adm_help_single_size('OxiAddonsTestimonial_details_size')
            . 'OxiAddonsTestimonial_details_color |' . sanitize_hex_color($_POST['OxiAddonsTestimonial_details_color']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsTestimonial_details_font')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial_details_padding')

            . oxi_addons_adm_help_single_size('OxiAddonsTestimonial_name_FS')
            . 'OxiAddonsTestimonial_name_C |' . sanitize_hex_color($_POST['OxiAddonsTestimonial_name_C']) . '|'
            . 'OxiAddonsTestimonial_name_H_C |' . sanitize_hex_color($_POST['OxiAddonsTestimonial_name_H_C']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsTestimonial_name_Font')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial_name_padding')

            . oxi_addons_adm_help_single_size('OxiAddonsTestimonial_DC_FS')
            . 'OxiAddonsTestimonial_D_color |' . sanitize_hex_color($_POST['OxiAddonsTestimonial_D_color']) . '|'
            . 'OxiAddonsTestimonial_company_color |' . sanitize_hex_color($_POST['OxiAddonsTestimonial_company_color']) . '|'
            . 'OxiAddonsTestimonial_company_HC |' . sanitize_hex_color($_POST['OxiAddonsTestimonial_company_HC']) . '|'
            . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsTestimonial_DC_font')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial_DC_padding')

            . oxi_addons_adm_help_single_size('OxiAddonsTestimonial_review_FS')
            . 'OxiAddonsTestimonial_review_color |' . sanitize_hex_color($_POST['OxiAddonsTestimonial_review_color']) . '|'
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTestimonial_review_padding')
            . 'OxiAddonsTestimonial_review_icon_color |' . sanitize_hex_color($_POST['OxiAddonsTestimonial_review_icon_color']) . '|'
            . '';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int)$_POST['oxilistid'];
        $data = '   OxiAddonstestimonial_img_U ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonstestimonial_img_U']) . '||#||'
            . ' OxiAddonstestimonial_W_name ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonstestimonial_W_name']) . '||#|| '
            . ' OxiAddonstestimonial_W_D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonstestimonial_W_D']) . '||#|| '
            . ' OxiAddonstestimonial_W_C ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonstestimonial_W_C']) . '||#|| '
            . ' OxiAddonstestimonial_WR ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonstestimonial_WR']) . '||#|| '
            . ' OxiAddonstestimonial_text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonstestimonial_text']) . '||#|| '
            . ' OxiAddonstestimonial_url ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonstestimonial_url']) . '||#|| '
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
// echo '<pre>';
// print_r($styledata);
// // print_r($stylefiles);
// echo '</pre>';
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
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsTestimonial-rows', $styledata, 3, 'false', '.oxi_addons_testimonial_container');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Set Your Testimonial Max Width', 'true', '.oxi_addons_testimonial_' . $oxiid . '_box', 'max-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial-BG-color', $styledata[11], 'rgba', 'Background Color', 'Select Your Heading Color', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial_border_width', 13, $styledata, 1, 'Border width', 'Set Your Testimonial Border width', 'true', '.oxi_addons_testimonial_' . $oxiid . '_box', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsTestimonial_border', 29, $styledata, 'true', '.oxi_addons_testimonial_' . $oxiid . '_box', 'border-style');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial_B_radius', 33, $styledata, 1, 'Border Radius', 'Set Your Testimonial Border Radius', 'true', '.oxi_addons_testimonial_' . $oxiid . '_box', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial_padding', 49, $styledata, 1, 'Padding', 'Set Your Testimonial Padding', 'true', '.oxi_addons_testimonial_container', 'padding');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsTestimonial_link_opening', $styledata[65], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial_H_BG', $styledata[67], 'rgba', 'Background Color', 'Select Your Heading Color', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box:hover', 'color');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsTestimonial_H_border', 69, $styledata, 'f', '.oxi_addons_testimonial_' . $oxiid . '_box:hover', 'border-style');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial_H_B_radius', 73, $styledata, 1, 'Border Radius', 'Set Your Testimonial Hover Border Radius', 'true', '.oxi_addons_testimonial_' . $oxiid . '_box:hover', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Profile Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial_img_width', $styledata[89], $styledata[90], $styledata[91], 1, 'Width', 'Set Your Testimonial Max Width', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_left', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial_img_height', $styledata[93], $styledata[94], $styledata[95], 1, 'Height', 'Set Your Testimonial Max height', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_top_left', 'padding-bottom');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsTestimonial_animation', 97, $styledata, 'true', '.oxi_addons_testimonial_' . $oxiid . '_box');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsTestimonial_BoxS', 101, $styledata, 'true', '.oxi_addons_testimonial_' . $oxiid . '_box');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsTestimonial_H_BoxS', 107, $styledata, 'true', '.oxi_addons_testimonial_' . $oxiid . '_box:hover');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">


                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Review Content
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial_details_size', $styledata[113], $styledata[114], $styledata[115], 1, 'Font Size', 'Select Your Information Font Size', 'false ', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_bottom_details', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial_details_color', $styledata[117], '', 'Color', 'Select Your Information Color', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_bottom_details', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsTestimonial_details_font', 119, $styledata, 'true', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_bottom_details');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial_details_padding', 125, $styledata, 1, 'Padding', 'Set Your Information Padding', 'true', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_bottom_details', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Name
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial_name_FS', $styledata[141], $styledata[142], $styledata[143], '2', 'Font Size', 'Set Testimonial Name Font Size', 'true', ' .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_name', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial_name_C', $styledata[145], '', 'Color', 'Set your Name Color', 'false', ' .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_name', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial_name_H_C', $styledata[147], '', 'Hover Color', 'Set your Name Color', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box:hover .oxi_addons_testimonial_name', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsTestimonial_name_Font', 149, $styledata, 'true', ' .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_name');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial_name_padding', 155, $styledata, 1, 'Padding', 'Set Your Name Padding', 'true',  ' .oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_name', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Designation And Company
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial_DC_FS', $styledata[171], $styledata[172], $styledata[173], '1', 'Font Size', 'Set Testimonial Name Font Size', 'true', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_working', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial_D_color', $styledata[175], '', 'Color', 'Set your Designation Color', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_working', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial_company_color', $styledata[177], '', 'Company Color', 'Set your Company Color', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_working a', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial_company_HC', $styledata[179], '', 'Company Hover Color', 'Set your Company Hover Color', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box:hover .oxi_addons_testimonial_working a', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsTestimonial_DC_font', 181, $styledata, 'true', '.oxi_addons_testimonial_' . $oxiid . '_box:hover .oxi_addons_testimonial_name');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial_DC_padding', 187, $styledata, 1, 'Padding', 'Set Your Designation Padding', 'true', '.oxi_addons_testimonial_' . $oxiid . '_box:hover .oxi_addons_testimonial_name', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Ratings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTestimonial_review_FS', $styledata[203], $styledata[204], $styledata[205], '2', 'Font Size', 'Set Testimonial Rating Font Size', 'true', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_rating', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial_review_color', $styledata[207], '', 'Color', 'Set your Rating Color', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_rating', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTestimonial_review_icon_color', $styledata[225], '', 'Star Color', 'Set your Rating Color', 'false', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_rating i', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTestimonial_review_padding', 209, $styledata, 1, 'Padding', 'Set Your Rating Padding', 'true', '.oxi_addons_testimonial_' . $oxiid . '_box .oxi_addons_testimonial_rating i', 'padding');
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
                    <?php echo oxi_testimonial_style_17_shortcode($style, $listdata, 'admin') ?>
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
                    echo oxi_addons_adm_help_model_image_upload('OxiAddonstestimonial_img_U', $listitemdata[1], 'Background image', 'Set your background image', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonstestimonial_W_name', $listitemdata[3], 'Name', 'Add Writer Name.', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonstestimonial_W_D', $listitemdata[5], 'Designation', 'Add Writer Designation', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonstestimonial_W_C', $listitemdata[7], 'Company Name ', 'Add Writer Company Name.', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonstestimonial_url', $listitemdata[13], 'Company URL', 'Set Testimonial Button Text', 'false');
                    echo oxi_addons_adm_help_number('OxiAddonstestimonial_WR', $listitemdata[9], '0.1', 'Writer Rating', 'Set Testimonial Heading Two', 'false');
                    echo oxi_addons_adm_help_form_textarea('OxiAddonstestimonial_text', $listitemdata[11], 'Given Text:', 'Write Your Testimonial Details', 'false');
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