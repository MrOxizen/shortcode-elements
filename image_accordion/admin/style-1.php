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
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageAccordion-G-P') . ''
            . ' OxiAddonsImageAccordion-overlay |' . sanitize_text_field($_POST['OxiAddonsImageAccordion-overlay']) . '|'
            . ' OxiAddonsImageAccordion-position |' . sanitize_text_field($_POST['OxiAddonsImageAccordion-position']) . '|'
            . ' OxiAddonsImageAccordion-style |' . sanitize_text_field($_POST['OxiAddonsImageAccordion-style']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageAccordion-H-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsImageAccordion-H-F') . ''
            . ' OxiAddonsImageAccordion-H-C |' . sanitize_hex_color($_POST['OxiAddonsImageAccordion-H-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageAccordion-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageAccordion-SD-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsImageAccordion-SD-F') . ''
            . ' OxiAddonsImageAccordion-SD-C |' . sanitize_hex_color($_POST['OxiAddonsImageAccordion-SD-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsImageAccordion-SD-P') . ''
            . ' OxiAddonsBanner-link-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-link-Tab']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsImageAccordion-G-H') . ''
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
            . ' OxiAddonsImageAccordion-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsImageAccordion-H-TB']) . '||#|| '
            . ' OxiAddonsImageAccordion-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsImageAccordion-SD-TA']) . '||#|| '
            . ' OxiAddonsImageAccordion-link ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsImageAccordion-link']) . '||#|| '
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
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageAccordion-G-W', $styledata[3], $styledata[4], $styledata[5], 1, 'Max-Width', 'Set Your Image Max Width', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-accordion ', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageAccordion-G-H', $styledata[87], $styledata[88], $styledata[89], 1, 'Max-height', 'Set Your Image Max Width', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion .oxi-link', 'height');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-link-Tab', $styledata[85], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageAccordion-G-P', 7, $styledata, '1', 'Margin', 'Set Image Accordion Margin ', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-accordion ', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Overlay Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsImageAccordion-overlay', $styledata[23], 'rgba', 'Overlay Color', 'Set Image Accordion Overlay Color', 'false', '.oxi-addons-accordion .oxi-addons-accordion-ul:hover > li:hover .oxi-link', 'background');
                                            ?>
                                            <div class=" form-group row">
                                                <label for="OxiAddonsImageAccordion-position" class="col-sm-6 control-label" oxi-addons-tooltip="Image Scroll Direction Top Or Bottom"> Text Position</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control " id="OxiAddonsImageAccordion-position" name="OxiAddonsImageAccordion-position">
                                                        <option value="top" <?php
                                                                            if ($styledata[25] == 'top') {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>Top</option>
                                                        <option value="center" <?php
                                                                                if ($styledata[25] == 'center') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Center</option>
                                                        <option value="bottom" <?php
                                                                                if ($styledata[25] == 'bottom') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Bottom</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" form-group row">
                                                <label for="OxiAddonsImageAccordion-style" class="col-sm-6 control-label" oxi-addons-tooltip="Image Scroll Direction Top Or Bottom"> Animation Style</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control " id="OxiAddonsImageAccordion-style" name="OxiAddonsImageAccordion-style">
                                                        <option value="default" <?php
                                                                                if ($styledata[27] == 'default') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Default</option>
                                                        <option value="style_1" <?php
                                                                                if ($styledata[27] == 'style_1') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Style 01</option>
                                                        <option value="style_2" <?php
                                                                                if ($styledata[27] == 'style_2') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Style 02</option>
                                                        <option value="style_3" <?php
                                                                                if ($styledata[27] == 'style_3') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Style 03</option>
                                                        <option value="style_4" <?php
                                                                                if ($styledata[27] == 'style_4') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Style 04</option>
                                                    </select>
                                                </div>
                                            </div>
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageAccordion-H-FS', $styledata[29], $styledata[30], $styledata[31], '1', 'Font Size', 'Set Banner Banner Heading Font Size', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading ', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsImageAccordion-H-C', $styledata[39], '', 'Color', 'Set Banner  Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading ', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsImageAccordion-H-F', 33, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading ', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageAccordion-H-P', 41, $styledata, 1, 'Padding', 'Set Banner  Heading Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-heading ', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Short Details
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsImageAccordion-SD-FS', $styledata[57], $styledata[58], $styledata[59], '2', 'Font Size', 'Set Banner Short details Font Size', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-details', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsImageAccordion-SD-C', $styledata[67], '', 'Color', 'Set Banner Short Details Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-details', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsImageAccordion-SD-F', 61, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-details');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsImageAccordion-SD-P', 69, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true', '', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-accordion  .oxi-addons-details', 'padding');
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
                    <?php echo oxi_image_accordion_style_1_shortcode($style, $listdata, 'admin') ?>
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
                    echo oxi_addons_adm_help_body_image_upload('OxiAddonsImageAccordion-IMG', $listitemdata[1], 'Upload', 'Upload Image for image  Accordion', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsImageAccordion-link', $listitemdata[7], 'Link', 'Set image  Accordion link', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsImageAccordion-H-TB', $listitemdata[3], 'Heading', 'Set image  Accordion Heading', 'false');
                    ?>
                    <div class="form-group">
                        <label for="OxiAddonsImageAccordion-SD-TA">Short Details</label>
                        <textarea class="form-control" name="OxiAddonsImageAccordion-SD-TA" id="OxiAddonsImageAccordion-SD-TA" cols="10" rows="5"><?php echo $listitemdata[5] ?></textarea>
                    </div>
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