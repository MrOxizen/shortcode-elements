<?php
if (!defined('ABSPATH')) {
    exit;
}

oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
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
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddIconBoxes-rows') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-width') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-height') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddIconBoxes-body') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddIconBoxes-border') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-radius') . ''
                . ' OxiAddIconBoxes-Tab|' . sanitize_text_field($_POST['OxiAddIconBoxes-Tab']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-margin') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddIconBoxes-box-shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddIconBoxes-animation') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-H-FS') . ''
                . ' OxiAddIconBoxes-H-C|' . sanitize_text_field($_POST['OxiAddIconBoxes-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddIconBoxes-H-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-H-P') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-IMG-W') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-IMG-H') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddIconBoxes-IMG-animation') . ''
                . ' OxiAddIconBoxes-H-HO-C|' . sanitize_text_field($_POST['OxiAddIconBoxes-H-HO-C']) . '|'
                . '' . OxiAddonsBGImageSanitize('OxiAddIconBoxes-HO-body') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddIconBoxes-HO-shadow') . ''
                . '' . OxiAddonsADMHelpDataSerializeSanitrize() . ''
                . ' OxiAddIconBoxes-HO-BC|' . sanitize_text_field($_POST['OxiAddIconBoxes-HO-BC']) . '|'
        ;
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = 'OxiAddIconBoxes-IMG-title||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddIconBoxes-IMG-title']) . '||#||'
                . ' OxiAddIconBoxes-IMG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddIconBoxes-IMG']) . '||#|| '
                . 'OxiAddIconBoxes-IMG-link||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddIconBoxes-IMG-link']) . '||#||'
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
$listid = '';
$listitemdata = array("", "", "", "", "", "", "");
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
?>
<div class="wrap">
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '','','yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image and Heading Postion
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpDataSerialize($styledata[151]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                           General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddIconBoxes-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Set Your Icon Boxes Max Width', 'true', '.oxi-addons-icon-boxes-'. $oxiid .'', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-height', $styledata[11], $styledata[12], $styledata[13], 1, 'Height', 'Set Your Icon Boxes Max Height', 'true', '');
                                            echo OxiAddonsADMHelpBGImage('OxiAddIconBoxes-body', $styledata, 15, 'true', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-icon-box');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-border', 19, $styledata, 1, 'Border', 'Set Your Icon Boxes Border Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-icon-box', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAddIconBoxes-border', 35, $styledata, 'true', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-icon-box');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-radius', 39, $styledata, 1, 'Border Radius', 'Set Your Icon Boxes Border Radius Top Bottom and Left Right','true','.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-icon-box','border-radius');
                                            echo oxi_addons_adm_help_true_false('OxiAddIconBoxes-Tab', $styledata[55], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-padding', 57, $styledata, 1, 'Padding', 'Set Your Icon Boxes Paddins Top Bottom and Left Right','true','.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-icon-box .oxi-addons-icon-body','padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-margin', 73, $styledata, 1, 'Margin', 'Set Your Icon Boxes  Margin Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-'. $oxiid .'', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddIconBoxes-box-shadow', 89, $styledata, 'true', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-icon-box');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddIconBoxes-animation', 95, $styledata, 'true', '.oxi-addons-icon-boxes-'.$oxiid.'');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-H-FS', $styledata[99], $styledata[100], $styledata[101], 1, 'Font Size', 'Select Your Heading Font Size', 'true', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-icon-box .oxi-addons-icon-body .oxi-addons-heading', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-H-C', $styledata[103], '', 'Color', 'Select Your Heading Color', '', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-icon-box .oxi-addons-icon-body .oxi-addons-heading','color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddIconBoxes-H-F', 105, $styledata, 'true', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-icon-box .oxi-addons-icon-body .oxi-addons-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-H-P', 111, $styledata, 1, 'Padding', 'Set Your Heading Padding Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-icon-box .oxi-addons-icon-body .oxi-addons-heading', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image Setting 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-IMG-W', $styledata[127], $styledata[128], $styledata[129], 1, 'Width', 'Set Your Image Max Width', 'true', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-image .oxi-addons-img', 'width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-IMG-H', $styledata[131], $styledata[132], $styledata[133], 1, 'Height', 'Set Your Image Max Height', 'true', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-image .oxi-addons-img', 'height');
                                            echo oxi_addons_adm_help_Animation('OxiAddIconBoxes-IMG-animation', 135, $styledata, 'true', '.oxi-addons-icon-boxes-'.$oxiid.' .oxi-addons-image');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover  Setting 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-H-HO-C', $styledata[139], '', 'Heading Color', 'Select Your Heading Hover Color', '', '.oxi-addons-icon-boxes-'.$oxiid.':hover .oxi-addons-icon-box .oxi-addons-icon-body .oxi-addons-heading', 'color');
                                            echo OxiAddonsADMHelpBGImage('OxiAddIconBoxes-HO-body', $styledata, 141, 'true', '.oxi-addons-icon-boxes-'.$oxiid.':hover .oxi-addons-icon-box');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-HO-BC', $styledata[153], '', 'Border Color', 'Set your boxes Border color', '', '.oxi-addons-icon-boxes-'.$oxiid.':hover .oxi-addons-icon-box', 'border-color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover  Box Shadow 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddIconBoxes-HO-shadow', 145, $styledata, 'true', '.oxi-addons-icon-boxes-'.$oxiid.':hover .oxi-addons-icon-box');
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
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
                echo oxi_addons_list_rearrange('Image Boxes Rearrange', $listdata, 1,'title');
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
                        <?php echo oxi_image_boxes_style_1_shortcode($style, $listdata, 'admin') ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddIconBoxes-IMG-title', $listitemdata[1], 'Title', 'Give Your Title');
                    echo oxi_addons_adm_help_image_upload('OxiAddIconBoxes-IMG', $listitemdata[3], 'Image', 'Set Your Box Image', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddIconBoxes-IMG-link', $listitemdata[5], 'Desire Link', 'Set Your Desire Link If you wants, Unless make it blank.');
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
