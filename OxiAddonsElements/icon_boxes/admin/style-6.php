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
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-height') . ''
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
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-icon-padding') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddIconBoxes-icon-animation') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddIconBoxes-heading-size') . ''
                . ' OxiAddIconBoxes-heading-color |' . sanitize_hex_color($_POST['OxiAddIconBoxes-heading-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddIconBoxes-heading') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddIconBoxes-heading-padding') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddIconBoxes-hover-body') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddIconBoxes-hover-border') . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddIconBoxes-hover-box-shadow') . ''
                . ' OxiAddIconBoxes-icon-hover-color |' . sanitize_hex_color($_POST['OxiAddIconBoxes-icon-hover-color']) . '|'
                . ' OxiAddIconBoxes-heading-hover-color |' . sanitize_hex_color($_POST['OxiAddIconBoxes-heading-hover-color']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddIconBoxes-rows') . ''
                . ' OxiAddIconBoxes-Tab|' . sanitize_text_field($_POST['OxiAddIconBoxes-Tab']) . '|'
                . '' . OxiAddonsADMHelpDataSerializeSanitrize() . ''
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
        $data = 'OxiAddIconBoxes-icon-title||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddIconBoxes-icon-title']) . '||#||'
                . 'OxiAddIconBoxes-Icon-Class||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddIconBoxes-Icon-Class']) . '||#||'
                . 'OxiAddIconBoxes-Icon-link||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddIconBoxes-Icon-link']) . '||#||'
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
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
                                        Icon & Heading Position
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpDataSerialize('icon,title');
                                        ?>
                                    </div> 
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddIconBoxes-rows', $styledata, 165, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-width', $styledata[3], $styledata[4], $styledata[5], 1, 'Width', 'Set Your Icon Boxes Max Width', 'true', '.oxi-icon-boxes-' . $oxiid . ' *{line-height:1}.oxi-icon-boxes-' . $oxiid . '', 'font-size');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-height', $styledata[7], $styledata[8], $styledata[9], 1, 'Height', 'Set Your Icon Boxes Max Height', 'true', '');
                                        echo OxiAddonsADMHelpBGImage('OxiAddIconBoxes-body', $styledata, 11, 'true', '.oxi-icon-boxes-' . $oxiid . ' .oxi-addons-icon-box');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-border', 15, $styledata, 1, 'Border', 'Set Your Icon Boxes Border Top Bottom and Left Right', 'true', '.oxi-icon-boxes-' . $oxiid . ' .oxi-addons-icon-box', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAddIconBoxes-border', 31, $styledata, 'true', '.oxi-icon-boxes-' . $oxiid . ' .oxi-addons-icon-box');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-radius', 35, $styledata, 1, 'Border Radius', 'Set Your Icon Boxes Border Radius Top Bottom and Left Right', 'true', '.oxi-icon-boxes-' . $oxiid . ' .oxi-addons-icon-box', 'border-radius');
                                        echo oxi_addons_adm_help_true_false('OxiAddIconBoxes-Tab', $styledata[169], 'Same Tab', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-padding', 51, $styledata, 1, 'Padding', 'Set Your Icon Boxes Paddins Top Bottom and Left Right', 'true', '.oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-body', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-margin', 67, $styledata, 1, 'Margin', 'Set Your Icon Boxes  Margin Top Bottom and Left Right', 'true', '.oxi-icon-boxes-' . $oxiid . '', 'padding');
                                        ?>
                                    </div> 
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddIconBoxes-box-shadow', 83, $styledata, 'true', '.oxi-icon-boxes-' . $oxiid . ' .oxi-addons-icon-box');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddIconBoxes-animation', 89, $styledata, 'true', '.oxi-icon-boxes-' . $oxiid . '');
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
                                        echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-icon-size', $styledata[93], $styledata[94], $styledata[95], 1, 'Size', 'Select Your Icon Size', 'true', '.oxi-icon-boxes-' . $oxiid . '  .oxi-icons', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-icon-color', $styledata[97], '', 'Color', 'Select Your Icon Color', '', '.oxi-icon-boxes-' . $oxiid . '  .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-icon-padding', 99, $styledata, 1, 'Padding', 'Set Your Icon Padding Top Bottom and Left Right', 'true', '.oxi-icon-boxes-' . $oxiid . '  .oxi-icons', 'padding');
                                         ?>
                                    </div>
                                    <div class="oxi-head">
                                        Icon Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                      echo oxi_addons_adm_help_Animation('OxiAddIconBoxes-icon-animation', 115, $styledata, 'true', '.oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-set');
                                      ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddIconBoxes-heading-size', $styledata[119], $styledata[120], $styledata[121], 1, 'Font Size', 'Select Your Heading Font Size', 'true', '.oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-heading-color', $styledata[123], '', 'Color', 'Select Your Heading Color', '', '.oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddIconBoxes-heading', 125, $styledata, 'true', '.oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddIconBoxes-heading-padding', 131, $styledata, 1, 'Padding', 'Set Your Heading Padding Top Bottom and Left Right', 'true', '.oxi-icon-boxes-' . $oxiid . '  .oxi-addons-icon-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpBGImage('OxiAddIconBoxes-hover-body', $styledata, 147, 'true', '.oxi-icon-boxes-' . $oxiid . ':hover .oxi-addons-icon-box');
                                        echo OxiAddonsADMhelpBorder('OxiAddIconBoxes-hover-border', 151, $styledata, 'true', '.oxi-icon-boxes-' . $oxiid . ':hover .oxi-addons-icon-box');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Hover Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddIconBoxes-hover-box-shadow', 155, $styledata, 'true', '.oxi-icon-boxes-' . $oxiid . ':hover .oxi-addons-icon-box');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Hover Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-icon-hover-color', $styledata[161], '', 'Color', 'Select Your Icon Color', '', '.oxi-icon-boxes-' . $oxiid . ':hover  .oxi-icons', 'color');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Hover Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddIconBoxes-heading-hover-color', $styledata[163], '', 'Color', 'Select Your Heading Color', '', '.oxi-icon-boxes-' . $oxiid . ':hover  .oxi-addons-icon-heading', 'color');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
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
                echo oxi_addons_list_rearrange('Icon Boxes Rearrange', $listdata, 1,'title');
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
                <div class="oxi-addons-style-left-preview" style="margin-top: 0; border-top: 0px;">
                    <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                        <?php echo oxi_icon_boxes_style_6_shortcode($style, $listdata, 'admin'); ?>
                    </div>
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
                    echo oxi_addons_adm_help_textbox('OxiAddIconBoxes-icon-title', $listitemdata[1], 'Title', 'Give Your Title');
                    echo oxi_addons_adm_help_textbox('OxiAddIconBoxes-Icon-Class', $listitemdata[3], 'Icon Class', 'Set Your icon class from Font Awesome Icon list.');
                    echo oxi_addons_adm_help_textbox('OxiAddIconBoxes-Icon-link', $listitemdata[5], 'Desire Link', 'Set Your Desire Link If you wants, Unless make it blank.');
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