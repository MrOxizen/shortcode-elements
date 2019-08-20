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
$listitemdata = array("", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddIconBoxes-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-width') . ''
                . '||||'
                . '' . OxiAddonsBGImageSanitize('OxiAddIconBoxes-body') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddIconBoxes-border') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-margin') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddIconBoxes-box-shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddIconBoxes-animation') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-icon-size') . ''
                . ' OxiAddIconBoxes-icon-color |' . sanitize_hex_color($_POST['OxiAddIconBoxes-icon-color']) . '|'
                . ' OxiAddIconBoxes-icon-align |' . sanitize_text_field($_POST['OxiAddIconBoxes-icon-align']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-icon-border') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-heading-size') . ''
                . ' OxiAddIconBoxes-heading-color |' . sanitize_hex_color($_POST['OxiAddIconBoxes-heading-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddIconBoxes-heading') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-heading-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-content-size') . ''
                . ' OxiAddIconBoxes-content-color |' . sanitize_hex_color($_POST['OxiAddIconBoxes-content-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddIconBoxes-content') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-content-padding') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddIconBoxes-icon-animation') . ''
                . ' OxiAddIconBoxes-icon-bgcolor |' . sanitize_text_field($_POST['OxiAddIconBoxes-icon-bgcolor']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-icon-width') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddIconBoxes-icon-border') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-icon-radius') . ''
                . ' OxiAddIconBoxes-Tab|' . sanitize_text_field($_POST['OxiAddIconBoxes-Tab']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddIconBoxes-rows') . ''
                . '||#||  ||#||'
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
        $data = 'OxiAddIconBoxes-icon-class ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddIconBoxes-icon-class']) . '||#||'
                . 'OxiAddIconBoxes-heading-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddIconBoxes-heading-text']) . '||#||'
                . 'OxiAddIconBoxes-content ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddIconBoxes-content']) . '||#||'
                . 'OxiAddIconBoxes-link||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddIconBoxes-link']) . '||#||'
                . '  ||#||  ||#||'
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
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER by id ASC", $oxiid), ARRAY_A);
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
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddIconBoxes-rows', $styledata, 205, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-width', $styledata[3], $styledata[4], $styledata[5], 1, 'Width', 'Set Your Icon Boxes Max Width', 'true', '.oxi-addons-icon-boxes-' . $oxiid . '', 'width');
                                        echo OxiAddonsADMHelpBGImage('OxiAddIconBoxes-body', $styledata, 11, 'true', '.oxi-addons-icon-boxes-' . $oxiid . '-data');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-border', 15, $styledata, 1, 'Border', 'Set Your Icon Boxes Border Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-' . $oxiid . '-data', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAddIconBoxes-border', 31, $styledata, 'true', '.oxi-addons-icon-boxes-' . $oxiid . '-data');
                                        echo oxi_addons_adm_help_true_false('OxiAddIconBoxes-Tab', $styledata[203], 'Same Tab', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-radius', 35, $styledata, 1, 'Border Radius', 'Set Your Icon Boxes Border Radius Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-' . $oxiid . '-data', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-padding', 51, $styledata, 1, 'Padding', 'Set Your Icon Boxes Paddins Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-' . $oxiid . '-data', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-margin', 67, $styledata, 1, 'Margin', 'Set Your Icon Boxes  Margin Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-' . $oxiid . '-data', 'margin');
                                        ?>
                                    </div> 
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddIconBoxes-box-shadow', 83, $styledata, 'true', '.oxi-addons-icon-boxes-' . $oxiid . '-data');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddIconBoxes-animation', 89, $styledata, 'true', '.oxi-addons-icon-boxes-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Icon Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-icon-size', $styledata[93], $styledata[94], $styledata[95], 1, 'Size', 'Select Your Icon Size', 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-icons', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-icon-color', $styledata[97], '', 'Color', 'Select Your Icon Color', '', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-icon-bgcolor', $styledata[177], 'rgba', 'Background Color', 'Select Your Icon Background Color', '', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-icons', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-icon-width', $styledata[179], $styledata[180], $styledata[181], 1, 'Width Height', 'Select Your Icon Width Height', 'true', '');
                                        echo oxi_addons_adm_help_Text_Align('OxiAddIconBoxes-icon-align', $styledata[99], 'Icon Align', 'Set Your Icon Align', 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-icon', 'text-align');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-icon-border', 101, $styledata, 1, 'Border', 'Set Your Icon Boxes border Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-icons', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAddIconBoxes-icon-border', 183, $styledata, 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-icons');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-icon-radius', 187, $styledata, 1, 'Border Radius', 'Set Your Icon Boxes Border Radius Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-icons', 'border-radius');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Icon Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                     echo oxi_addons_adm_help_Animation('OxiAddIconBoxes-icon-animation', 173, $styledata, 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-icon');
                                     ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-heading-size', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Select Your Heading Font Size', 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-heading-color', $styledata[121], '', 'Color', 'Select Your Heading Color', '', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddIconBoxes-heading', 123, $styledata, 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-heading-padding', 129, $styledata, 1, 'Padding', 'Set Your Heading Padding Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-heading', 'padding');
                                        ?>
                                    </div>
                                </div><div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Content Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-content-size', $styledata[145], $styledata[146], $styledata[147], 1, 'Font Size', 'Select Your Content Font Size', 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-content', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-content-color', $styledata[149], '', 'Color', 'Select Your Content Color', '', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-content', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddIconBoxes-content', 151, $styledata, 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-content');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-content-padding', 157, $styledata, 1, 'padding', 'Set Your Content Padding Top Bottom and Left Right', 'true', '.oxi-addons-icon-boxes-' . $oxiid . ' .oxi-addons-icon-boxes-content', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <?php wp_nonce_field("OxiAddIconBoxes-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Icon Boxes Rearrange', $listdata, 3, 'title');
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
                    <?php echo oxi_icon_boxes_style_2_shortcode($style, $listdata, 'admin'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('OxiAddIconBoxes-icon-class', $listitemdata[1], 'Icon Class', 'Set your Icon Class');
                    echo oxi_addons_adm_help_textbox('OxiAddIconBoxes-heading-text', $listitemdata[3], 'Heading Text', 'Set your Heading text');
                    echo oxi_addons_adm_help_form_textarea('OxiAddIconBoxes-content', $listitemdata[5], 'Content', 'Set Your Icon Boxes Content');
                    echo oxi_addons_adm_help_textbox('OxiAddIconBoxes-link', $listitemdata[7], 'Desire Link', 'Set Your Desire Link If you wants, Unless make it blank.');
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