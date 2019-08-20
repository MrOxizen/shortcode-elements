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
$listitemdata = array("", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsTabs-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . ' OxiAddons-G-Initial-O |' . sanitize_text_field($_POST['OxiAddons-G-Initial-O']) . '|'
            . ' OxiAddons-G-Animation |' . sanitize_text_field($_POST['OxiAddons-G-Animation']) . '|'
            . ' OxiAddonsTabs-G-Fixed-Header |' . sanitize_text_field($_POST['OxiAddonsTabs-G-Fixed-Header']) . '|'
            . ' OxiAddonsTabs-G-Tab |' . sanitize_text_field($_POST['OxiAddonsTabs-G-Tab']) . '|'
            . ' OxiAddonsTabs-H-body-BPS |' . sanitize_text_field($_POST['OxiAddonsTabs-H-body-BPS']) . '|'
            . ' OxiAddonsTabs-H-body-BG |' . sanitize_text_field($_POST['OxiAddonsTabs-H-body-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsTabs-H-body-B') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTabs-H-body-BW') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTabs-H-body-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTabs-H-body-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsTabs-H-BS') . ''
            . ' OxiAddonsTabs-H-C |' . sanitize_hex_color($_POST['OxiAddonsTabs-H-C']) . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddonsTabs-H-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsTabs-H-F') . ''
            . '|||'
            . '||||||||||||||||'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTabs-H-P') . ''
            . ' OxiAddonsTabs-C-BG |' . sanitize_text_field($_POST['OxiAddonsTabs-C-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsTabs-C-B') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTabs-C-BW') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTabs-C-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTabs-C-P') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsTabs-C-BS') . ''
            . ' OxiAddonsTabs-C-C |' . sanitize_hex_color($_POST['OxiAddonsTabs-C-C']) . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddonsTabs-C-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsTabs-C-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsTabs-G-M') . ''
            . ' OxiAddonsTabs-Active-C |' . sanitize_hex_color($_POST['OxiAddonsTabs-Active-C']) . '|'
            . ' OxiAddonsTabs-Active-BG |' . sanitize_text_field($_POST['OxiAddonsTabs-Active-BG']) . '|'
            . '||#||'
            . 'OxiAddonsTabs-G-Fixed-Header-Box||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsTabs-G-Fixed-Header-Box']) . '||#||'
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
        $data = ' OxiAddonsTabs-heading-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsTabs-heading-text']) . '||#||'
            . 'OxiAddonsTabs-heading-link ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsTabs-heading-link']) . '||#||'
            . 'OxiAddonsTabs-content ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsTabs-content']) . '||#||'
            . 'OxiAddonsTabs-heading-icon ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsTabs-heading-icon']) . '||#||'

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
// echo '</pre>';
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
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <div class="form-group row">
                                                <label for="OxiAddons-G-Initial-O" class="col-sm-6 control-label" oxi-addons-tooltip="Set Tab Initial Opening">Initial Opening</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="OxiAddons-G-Initial-O" name="OxiAddons-G-Initial-O">
                                                        <?php
                                                        $i = 0;
                                                        foreach ($listdata as $value) {
                                                            echo '<option value="' . $i . '" ' . selected($i, $styledata[3]) . '> ' . explode('||#||', $value['files'])[1] . '</option>';
                                                            $i++;
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="OxiAddons-G-Animation" oxi-addons-tooltip="Set Tab Content Changing Animation" class="col-sm-6 control-label">Tabbing Animation </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="OxiAddons-G-Animation" name="OxiAddons-G-Animation">
                                                        <option value="slide" <?php
                                                                                if ($styledata[5] == 'slide') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Slide</option>
                                                        <option value="fade" <?php
                                                                                if ($styledata[5] == 'fade') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Fade</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsTabs-G-Fixed-Header', $styledata[7], 'True', 'true', 'False', 'false', 'Fixed Header', 'Set Tabs Fixed Header True Or False', 'true');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsTabs-G-Fixed-Header-Box', $stylefiles[2], 'Fixed Header Size', 'Set Fixed Header Size for Responsive Tabs with Accordions');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsTabs-G-Tab', $styledata[9], 'Same Tab', '', 'New Tab', 'new-tab', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTabs-G-M', 190, $styledata, 1, 'Margin', 'Set Tab Body Margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading Body Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsTabs-H-body-BPS', $styledata[11], 'Heading Postion', 'Set Your Heading Position', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-tab-header', 'text-align');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTabs-H-body-BG', $styledata[13], 'rgba', 'Background Color', 'Set Tabs Heading Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header', 'Background');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsTabs-H-body-B', 15, $styledata, 'false');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTabs-H-body-BW', 18, $styledata, 1, 'Border Width', 'Set Tab Heading Border Width', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header', 'border-width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTabs-H-body-BR', 34, $styledata, 1, 'Border Radius', 'Set Tab Heading Border radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTabs-H-body-M', 50, $styledata, 1, 'Margin', 'Set Tab Heading Margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header', 'padding');

                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsTabs-H-body-BPS', 'Heading Position'),
                                                )
                                            );
                                            ?>

                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsTabs-H-BS', 66, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-right .oxi-addons-link:hover');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Heading Text Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTabs-H-C', $styledata[72], '', 'Color', 'Set Tabs Heading Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header', 'color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTabs-H-FS', $styledata[74], $styledata[75], $styledata[76], '', 'Font Size', 'Set Tab Heading Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header', 'font-size');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsTabs-H-F', 78, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTabs-H-P', 103, $styledata, 1, 'Padding', 'Set Tab Heading Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header', 'padding');
                                            ?>
                                        </div>

                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Tab Active Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTabs-Active-C', $styledata[206], '', 'Color', 'Set Tabs Header Active color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTabs-Active-BG', $styledata[208], 'rgba', 'Background Color', 'Set Tabs Header Active Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active', 'color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Body Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTabs-C-BG', $styledata[119], 'rgba', 'Background Color', 'Set Tabs Content Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body', 'color');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsTabs-C-B', 121, $styledata, 'false');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTabs-C-BW', 124, $styledata, 1, 'Border Width', 'Set Tab Heading Border Width', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTabs-C-BR', 140, $styledata, 1, 'Border Radius', 'Set Tab Content Border radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsTabs-C-P', 156, $styledata, 1, 'Padding', 'Set Tab Content Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsTabs-C-BS', 172, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Content Text Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsTabs-C-C', $styledata[178], '', 'Color', 'Set Tabs Content Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body', 'color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsTabs-C-FS', $styledata[180], $styledata[181], $styledata[182], '', 'Font Size', 'Set Tab Content Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body', 'font-size');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsTabs-C-F', 184, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body');
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
                            <?php wp_nonce_field("OxiAddonsTabs-nonce") ?>
                        </div>

                    </div>

                </form>

            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Icon Boxes Rearrange', $listdata, 1, 'title');
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
                    <?php echo oxi_tabs_style_14_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsTabs-heading-text', $listitemdata[1], 'Tabs Heading', 'Set your Tabs Heading text');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsTabs-heading-icon', $listitemdata[7], 'Heading Icon', 'Set your Tabs Heading Icon');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsTabs-heading-link', $listitemdata[3], 'Tabs Link', 'As you want to add link. Unless make it blank. Link will works only at site not edit page');
                    ?>
                    <div class="form-group">
                        <label for="OxiAddonsTabs-heading-link">Details:</label>
                        <?php
                        echo oxi_addons_adm_help_model_rich_text_box('OxiAddonsTabs-content', $listitemdata[5]);
                        ?>
                        <small class="form-text text-muted">Add Your Tab Content</small>
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