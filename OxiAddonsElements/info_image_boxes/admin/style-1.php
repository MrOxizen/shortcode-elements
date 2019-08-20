<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';


if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
$listid = '';
$listitemdata = $bgdata = array("", "", "", "", "", "", "", "", "", "", "", "");

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-Image-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsInfoImageBoxes-rows') . ''
                . ' OxiAddonsInfoImageBoxes-G-BG |' . sanitize_text_field($_POST['OxiAddonsInfoImageBoxes-G-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsInfoImageBoxes-G-B') . ''
                . ' OxiAddonsInfoImageBoxes-G-BC |' . sanitize_hex_color($_POST['OxiAddonsInfoImageBoxes-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoImageBoxes-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoImageBoxes-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoImageBoxes-G-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsInfoImageBoxes-animation') . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsInfoImageBoxes-BS') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsInfoImageBoxes-IMG-width') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsInfoImageBoxes-IMG-height') . ''
                . ' oxiAddonsInfoImageBoxes-IMG-PS |' . sanitize_text_field($_POST['oxiAddonsInfoImageBoxes-IMG-PS']) . '|'
                . ' OxiAddonsInfoImageBoxes-IMG-Bg |' . sanitize_text_field($_POST['OxiAddonsInfoImageBoxes-IMG-Bg']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsInfoImageBoxes-IMG-B') . ''
                . ' OxiAddonsInfoImageBoxes-IMG-BC |' . sanitize_hex_color($_POST['OxiAddonsInfoImageBoxes-IMG-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoImageBoxes-IMG-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoImageBoxes-IMG-P') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsInfoImageBoxes-I-BS') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsInfoImageBoxes-H-FS') . ''
                . ' OxiAddonsInfoImageBoxes-H-C |' . sanitize_hex_color($_POST['OxiAddonsInfoImageBoxes-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsInfoImageBoxes-H-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoImageBoxes-H-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsInfoImageBoxes-H-Span-FS') . ''
                . ' OxiAddonsInfoImageBoxes-H-C |' . sanitize_hex_color($_POST['OxiAddonsInfoImageBoxes-H-Span-C']) . '|'
                . '||||||'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsInfoImageBoxes-SD-FS') . ''
                . ' OxiAddonsInfoImageBoxes-SD-C |' . sanitize_hex_color($_POST['OxiAddonsInfoImageBoxes-SD-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsInfoImageBoxes-SD-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsInfoImageBoxes-SD-P') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsInfoImageBoxes-H-BS') . ''
                . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = '   OxiAddonsInfoImageBoxes-BG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsInfoImageBoxes-BG']) . '||#||'
                . ' OxiAddonsInfoImageBoxes-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsInfoImageBoxes-H-TB']) . '||#|| '
                . ' OxiAddonsInfoImageBoxes-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsInfoImageBoxes-SD-TA']) . '||#|| '
                . ' OxiAddonsInfoImageBoxes-Info-Link ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsInfoImageBoxes-Info-Link']) . '||#|| '
                . ' OxiAddonsInfoImageBoxes-Info-Tab ||#||' . sanitize_text_field($_POST['OxiAddonsInfoImageBoxes-Info-Tab']) . '||#|| '
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
        $item_id = (int) $_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileEdit' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int) $_POST['oxi-item-id'];
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
//echo '<pre>';
//print_r($styledata);
//echo '</pre>';
?>
<div class="wrap">    
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">


                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsInfoImageBoxes-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoImageBoxes-G-BG', $styledata[7], 'rgba', 'Background Color', 'Set Info Image boxes background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsInfoImageBoxes-G-B', $styledata[9], $styledata[10], 'Border', 'Set Info Image boxes Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoImageBoxes-G-BC', $styledata[13], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoImageBoxes-G-BR', 15, $styledata, 1, 'Border Radius', 'Set Info Image boxes Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoImageBoxes-G-P', 31, $styledata, 1, 'Padding', 'Set Your Info Image boxes Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoImageBoxes-G-M', 47, $styledata, 1, 'Margin', 'Set Yout Info Image boxes Margin', 'true', '.oxi-addons-parent-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>    
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsInfoImageBoxes-BS', 68, $styledata, '', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                        ?>
                                    </div>  
                                    <div class="oxi-head">
                                        Hover Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsInfoImageBoxes-H-BS', 198, $styledata, '', '.oxi-addons-main-wrapper-' . $oxiid . ':hover');
                                        ?>
                                    </div>  
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsInfoImageBoxes-animation', 63, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                        ?>  
                                    </div>                                       
                                </div>    
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Image Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsInfoImageBoxes-IMG-width', $styledata[74], $styledata[75], $styledata[76], 1, 'Width', 'Set Your Image Width', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main .oxi-addons-img');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsInfoImageBoxes-IMG-height', $styledata[78], $styledata[79], $styledata[80], 1, 'Height', 'Set Your Image  Height', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main .oxi-addons-img');
                                        echo oxi_addons_adm_help_Text_Align('oxiAddonsInfoImageBoxes-IMG-PS', $styledata[82], 'Position', 'Set Your Image Position', 'false');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoImageBoxes-IMG-Bg', $styledata[84], 'rgba', 'Background Color', 'Set Your Image Background Color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main .oxi-addons-img', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsInfoImageBoxes-IMG-B', $styledata[86], $styledata[87], 'Border', 'Set Your Image Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main .oxi-addons-img', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoImageBoxes-IMG-BC', $styledata[90], '', 'Border Color', 'Set your Image Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main .oxi-addons-img', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoImageBoxes-IMG-radius', 92, $styledata, 1, 'Border Radius', 'Set Your Image Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main .oxi-addons-img', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoImageBoxes-IMG-P', 108, $styledata, 1, 'Padding', 'Set your Image padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main .oxi-addons-img', 'padding');
                                        echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsInfoImageBoxes-IMG-PS', 'Position'),
                                                )
                                        );
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Image Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsInfoImageBoxes-I-BS', 124, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi-Images');
                                        ?>
                                    </div>
                                </div>   
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsInfoImageBoxes-H-FS', $styledata[130], $styledata[131], $styledata[132], '1', 'Font Size', 'Set Info Image boxes Heading Font Size', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoImageBoxes-H-C', $styledata[134], '', 'Color', 'Set Info Image boxes Heading  Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsInfoImageBoxes-H-F', 136, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoImageBoxes-H-P', 142, $styledata, 1, 'Padding', 'Set Info Image boxes Heading  Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading', 'padding');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Heading Span Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsInfoImageBoxes-H-Span-FS', $styledata[158], $styledata[159], $styledata[160], '1', 'Font Size', 'Set Info Image boxes Heading Span Font Size', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading span', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoImageBoxes-H-Span-C', $styledata[162], '', 'Color', 'Set Info Image boxes Heading Span Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading span', 'color');
                                        ?>
                                    </div>
                                </div> 
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Short Details
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsInfoImageBoxes-SD-FS', $styledata[170], $styledata[171], $styledata[172], '2', 'Font Size', 'Set Info Image boxes Short details Font Size', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-details', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsInfoImageBoxes-SD-C', $styledata[174], '', 'Color', 'Set Info Image boxes Short Details Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-details', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsInfoImageBoxes-SD-F', 176, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-details');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsInfoImageBoxes-SD-P', 182, $styledata, 1, 'Padding', 'Set Info Image boxes Short Details Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-details', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-Image-nonce") ?>
                        </div>

                    </div>
                </form> 
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Info Image boxes Rearrange', $listdata, 1, 'image');
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
                    <?php echo oxi_info_image_boxes_style_1_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_image_upload('OxiAddonsInfoImageBoxes-BG', $listitemdata[1], 'background image', 'Set your background image', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsInfoImageBoxes-H-TB', $listitemdata[3], 'Heading One', 'Set Info Image boxes Heading One', 'false');
                    echo oxi_addons_adm_help_form_textarea('OxiAddonsInfoImageBoxes-SD-TA', $listitemdata[5], 'Short Details', 'Write Your Product Short Details', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsInfoImageBoxes-Info-Link', $listitemdata[7], 'Link', 'Write Your Info Image boxes Link', 'false');
                    echo oxi_addons_adm_help_true_false('OxiAddonsInfoImageBoxes-Info-Tab', $listitemdata[9], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'false');
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
