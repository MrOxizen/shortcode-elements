<?php
if (!defined('ABSPATH')) {
    exit;
}

oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);

$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageScroll-G-Padding') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageScroll-IMG-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageScroll-IMG-H') . ''
            . ' OxiAddonsImageScroll-IMG-transition|' . sanitize_text_field($_POST['OxiAddonsImageScroll-IMG-transition']) . '|'
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsImageScroll-IMG-animation') . '|'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsImageScroll-IMG-shadow') . ''
            . '||'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsImageScroll-IMG-H-shadow') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageScroll-G-BR') . ''
            . ' OxiAddonsImageScroll-IMG-Tab |' . sanitize_text_field($_POST['OxiAddonsImageScroll-IMG-Tab']) . '|'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsImageScroll-rows') . ''
            . ' ||#||';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
$listid = '';
$listitemdata =  array("", "", "", "", "", "", "", "", "", "", "", "");

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int)$_POST['oxilistid'];
        $data = 'OxiAddonsImageScroll-IMG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsImageScroll-IMG']) . '||#||'
            . ' OxiAddonsImageScroll-IMG-link ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsImageScroll-IMG-link']) . '||#|| '
            . ' OxiAddonsImageScroll-IMG-H-Diraction ||#||' . sanitize_text_field($_POST['OxiAddonsImageScroll-IMG-H-Diraction']) . '||#|| '

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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
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
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsImageScroll-rows', $styledata, 66, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsImageScroll-IMG-Tab', $styledata[64], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'false');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageScroll-G-BR', 48, $styledata, 1, 'Border Radius', 'Set Image Scroll body Position', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageScroll-G-Padding', 3, $styledata, 1, 'Margin', 'Set Image Scroll body Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image box setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageScroll-IMG-W', $styledata[19], $styledata[20], $styledata[21], 1, 'Width', 'Set Your Image Max Width', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main', 'width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageScroll-IMG-H', $styledata[23], $styledata[24], $styledata[25], 1, 'Height', 'Set Your Image Max Height', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main', 'height');
                                            echo oxi_addons_adm_help_number('OxiAddonsImageScroll-IMG-transition', $styledata[27], 1, 'Transition Duration', 'Set Your Image Scroll Transtion Duration', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-img', 'transition');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsImageScroll-IMG-animation', 29, $styledata, 'true', '.oxi-addons-icon-boxes-' . $oxiid . '');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsImageScroll-IMG-shadow', 34, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsImageScroll-IMG-H-shadow', 42, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-image-main:hover');
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
                            <?php wp_nonce_field("oxi-addons-eventwidgets-nonce") ?>
                        </div>

                    </div>

                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php 
                echo oxi_addons_list_modal_open();
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
                <div class="oxi-addons-style-left-preview" style="margin-top: 0; border-top: 0">
                    <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                        <?php echo oxi_image_scroll_style_1_shortcode($style, $listdata, 'admin') ?>
                    </div>
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
                    echo oxi_addons_adm_help_image_upload('OxiAddonsImageScroll-IMG', $listitemdata[1], 'Upload Image', 'Upload Front Image for image scroll', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsImageScroll-IMG-link', $listitemdata[3], 'Image Link', 'Set Your image scroll image link', 'false');
                    ?>
                    <div class=" form-group row">
                        <label for="OxiAddonsImageScroll-IMG-H-Diraction" class="col-sm-6 control-label" oxi-addons-tooltip="Image Scroll Direction Top Or Bottom">Scroll Direction </label>
                        <div class="col-sm-6 addons-dtm-laptop-lock">
                            <select class="form-control " id="OxiAddonsImageScroll-IMG-H-Diraction" name="OxiAddonsImageScroll-IMG-H-Diraction">
                                <option value="bottom" <?php
                                                        if ($listitemdata[5] == 'bottom') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Top To Bottom</option>
                                <option value="top" <?php
                                                    if ($listitemdata[5] == 'top') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Bottom To Top</option>
                            </select>
                        </div>
                    </div>
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