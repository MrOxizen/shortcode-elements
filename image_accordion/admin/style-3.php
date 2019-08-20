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

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddCB-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageAccordion-G-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageAccordion-G-H') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageAccordion-G-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageAccordion-H-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsImageAccordion-H-F') . ''
            . ' OxiAddonsImageAccordion-H-C |' . sanitize_hex_color($_POST['OxiAddonsImageAccordion-H-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageAccordion-H-P') . ''

            . '||#||'
            . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
$listid = '';
$listitemdata = array("", "", "", "", "", "", "", "", "", "", "", "");
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int)$_POST['oxilistid'];
        $data = ' OxiAddonsImageAccordion-IMG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsImageAccordion-IMG']) . '||#|| '
            . ' OxiAddonsImageAccordion-IMG-one ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsImageAccordion-IMG-one']) . '||#|| '
            . ' OxiAddonsImageAccordion-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsImageAccordion-H-TB']) . '||#|| '
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
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageAccordion-G-W', $styledata[3], $styledata[4], $styledata[5], 1, 'Max-Width', 'Set Your Image Max Width', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-accordion ', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageAccordion-G-H', $styledata[7], $styledata[8], $styledata[9], 1, 'Max-height', 'Set Your Image Max Width', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion .oxi-link', 'height');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageAccordion-G-P', 11, $styledata, '1', 'Margin', 'Set Image Accordion Margin ', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-accordion ', 'padding');
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageAccordion-H-FS', $styledata[27], $styledata[28], $styledata[29], '1', 'Font Size', 'Set Banner Banner Heading Font Size', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading ', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsImageAccordion-H-C', $styledata[37], '', 'Color', 'Set Banner  Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading ', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsImageAccordion-H-F', 31, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading ', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageAccordion-H-P', 39, $styledata, 1, 'Padding', 'Set Banner  Heading Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading ', 'padding');
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
                            <?php wp_nonce_field("OxiAddCB-nonce") ?>
                        </div>

                    </div>

                </form>

            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open('Add New Rows');
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
                    <?php echo oxi_image_accordion_style_3_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_body_image_upload('OxiAddonsImageAccordion-IMG', $listitemdata[1], 'Upload Image', 'Upload first Image for image  Accordion', 'false');
                    echo oxi_addons_adm_help_body_image_upload('OxiAddonsImageAccordion-IMG-one', $listitemdata[3], 'Upload Image', 'Upload second Image for image  Accordion', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsImageAccordion-H-TB', $listitemdata[5], 'Heading', 'Set image  Accordion Heading', 'false');
                    ?> 
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="oxilistid" name="oxilistid" value="<?php echo $listid; ?>">
                    <input type="hidden" id="oxilistcatdata" name="oxilistcatdata" value="<?php echo $stylefiles[2]; ?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="OxiAddonsListFile" id="OxiAddonsListFile" value="Submit">
                    <?php wp_nonce_field("OxiAddonsListData-nonce") ?>
                </div>
            </div>
        </div>
    </form>
</div>