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
$listitemdata = array('', '', '', '', '', '#ffffff', '', '#7700c7', '', 'rgba(119, 0, 199, 1)', '', 'rgba(92,92,92,1.00)', '', '#7700c7', '', '#7700c7');
$listid = '';
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-social-icon-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '||||'
                . '' . oxi_addons_adm_help_number_dtm_senitize('oxi_addons-icon-width') . ''
                . '||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiADDSIC-margin') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiADDSIC-animation') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiADDSIC-size') . ''
                . ' OxiADDSIC-color-view |' . sanitize_text_field($_POST['OxiADDSIC-color-view']) . '|'
                . ' OxiADDSIC-color |' . sanitize_text_field($_POST['OxiADDSIC-color']) . '|'
                . ' OxiADDSIC-H-color-view |' . sanitize_text_field($_POST['OxiADDSIC-H-color-view']) . '|'
                . ' OxiADDSIC-H-color |' . sanitize_text_field($_POST['OxiADDSIC-H-color']) . '|'
                . ' OxiADDSIC-link-opening |' . sanitize_text_field($_POST['OxiADDSIC-link-opening']) . '|'
                . ' OxiADDSIC-bgcolor-view |' . sanitize_text_field($_POST['OxiADDSIC-bgcolor-view']) . '|'
                . ' OxiADDSIC-bgcolor |' . sanitize_text_field($_POST['OxiADDSIC-bgcolor']) . '|'
                . '||||'
                . '||||'
                . '' . oxi_addons_adm_help_single_size('OxiADDSIC-radius') . ''
                . ' OxiADDSIC-H-bgcolor-view ||'
                . ' OxiADDSIC-H-bgcolor ||'
                . '' . oxi_addons_adm_help_single_size('OxiADDSIC-H-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiADDSIC-H-border') . '|'
                . '' . oxi_addons_adm_help_single_size('OxiADDSIC-H-radius') . ''
                . ' OxiADDSIC-border-view ||'
                . ' OxiADDSIC-H-border-view |' . sanitize_text_field($_POST['OxiADDSIC-H-border-view']) . '|'
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
        $oxilistid = sanitize_textarea_field($_POST['oxilistid']);
        $data = 'OxiADDSIC-Icon-Class||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiADDSIC-Icon-Class']) . '||#||'
                . 'OxiADDSIC-Icon-link||#||' . OxiAddonsAdminUrlConvert($_POST['OxiADDSIC-Icon-link']) . '||#||'
                . 'OxiADDSIC-SP-icon-color||#||' . sanitize_textarea_field($_POST['OxiADDSIC-SP-icon-color']) . '||#||'
                . 'OxiADDSIC-SP-H-icon-color||#||' . sanitize_textarea_field($_POST['OxiADDSIC-SP-H-icon-color']) . '||#||'
                . 'OxiADDSIC-SP-icon-bgcolor||#||' . sanitize_textarea_field($_POST['OxiADDSIC-SP-icon-bgcolor']) . '||#||'
                . 'OxiADDSIC-SP-H-icon-bgcolor||#||||#||'
                . 'OxiADDSIC-SP-border-color||#||||#||'
                . 'OxiADDSIC-SP-H-border-color||#||' . sanitize_textarea_field($_POST['OxiADDSIC-SP-H-border-color']) . '||#||'
                . '||#||  ||#||';

        if ($oxilistid > 0) {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("UPDATE $table_list SET files = %s WHERE id = %d", $data, $oxilistid));
        } else {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files) VALUES (%d, %s, %s )", array($oxiid, 'oxi-addons', $data)));
        }
    }
}
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
    $nonce = $_REQUEST['_wpnonce'];
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
if (!empty($_POST['OxiAddonsListFileDelete']) && is_numeric($_POST['oxi-item-id'])) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileDelete' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int) $_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
?>
<div class="wrap">
    <?php
    echo OxiAddonsAdmAdminMenu($oxitype, '','','');
    ?>
    <div class="oxi-addons-wrapper">
        <ul class="oxilab-admin-menu">
            <li><a href="<?php echo oxi_addons_admin_menu_link('social_icons'); ?>">Social Icons Settings</a></li>            
            <li><a href="<?php echo oxi_addons_admin_menu_link(''); ?>">Shortcode Addons</a></li>
            <li><a href="<?php echo oxi_addons_admin_menu_link('import'); ?>">Import Addons</a></li>
            <li><a href="<?php echo oxi_addons_admin_menu_link('settings'); ?>">Settings</a></li>
            <li><a href="<?php echo oxi_addons_admin_menu_link('support'); ?>">Support</a></li>
        </ul>
    </div>
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
                                        Icon Information
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-icon-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width Height', 'Your Icon Width with Responsive Size', '', '');
                                        echo OxiAddonsADMHelpNoJquery('', 'oxi_addons-icon-width', 'Width Height');
                                        echo oxi_addons_adm_help_true_false('OxiADDSIC-link-opening', $styledata[45], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiADDSIC-margin', 13, $styledata, 1, 'Margin', 'Set Your Icon Margin Top Bottom and Left Right', 'fa', '.oxi-addons-social-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>                                               
                                </div>                                            
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiADDSIC-animation', 29, $styledata, 'true', 'oxi-addons-social-' . $oxiid . '');
                                        ?>  
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiADDSIC-size', $styledata[33], $styledata[34], $styledata[35], 1, 'Font Size', 'Your Icon Font Size', 'true', '.oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ' .oxi-icons', 'font-size');
                                        echo oxi_addons_adm_help_true_false('OxiADDSIC-color-view', $styledata[37], 'Separately', '', 'Common', 'common', 'Color View', 'Select your color view as added separately or select same Color at all Icons', 'true', '');
                                        echo oxi_addons_adm_help_MiniColor('OxiADDSIC-color', $styledata[39], '', 'Color', 'Select Your Icon Color', '', '.oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ' .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_true_false('OxiADDSIC-bgcolor-view', $styledata[47], 'Separately', '', 'Common', 'common', 'Background View', 'Select your color view as added separately or select same Color at all Icons', 'true');
                                        echo oxi_addons_adm_help_MiniColor('OxiADDSIC-bgcolor', $styledata[49], 'rgba', 'Background', 'Select Your Icon Background', '', '');
                                        echo oxi_addons_adm_help_number_dtm('OxiADDSIC-radius', $styledata[59], $styledata[60], $styledata[61], 1, 'Border Radius', 'Set your border', 'true', '.oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '', 'border-radius');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('OxiADDSIC-H-color-view', $styledata[41], 'Separately', '', 'Common', 'common', 'Color View', 'Select your color view as added separately or select same Color at all Icons', 'true');
                                        echo oxi_addons_adm_help_MiniColor('OxiADDSIC-H-color', $styledata[43], '', 'Color', 'Select Your Icon Hover Color', '', '.oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . ':hover .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_true_false('OxiADDSIC-H-border-view', $styledata[81], 'Separately', '', 'Common', 'common', 'Border View', 'Select your color view as added separately or select same Color at all Icons', 'true');
                                        echo oxi_addons_adm_help_number_dtm('OxiADDSIC-H-border', $styledata[67], $styledata[68], $styledata[69], 1, 'Border', 'Set your border', 'true', '');
                                        echo OxiAddonsADMhelpBorder('OxiADDSIC-H-border', 71, $styledata, '');
                                        echo oxi_addons_adm_help_number_dtm('OxiADDSIC-H-radius', $styledata[75], $styledata[76], $styledata[77], 1, 'Border Radius', 'Set your border', 'true', '.oxi-addons-social-' . $oxiid . ' .oxi-icon-' . $oxiid . '', 'border-radius');
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
                            <?php wp_nonce_field("oxi-addons-social-icon-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Social Icon Rearrange', $listdata, 1, 'icon');
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
                    <?php echo oxi_social_icons_style_14_shortcode($style, $listdata, 'admin'); ?>
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
                    <h4 class="modal-title">Icon Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('OxiADDSIC-Icon-Class', $listitemdata[1], 'Icon Class', 'Give Your Icon Class');
                    echo oxi_addons_adm_help_textbox('OxiADDSIC-Icon-link', $listitemdata[3], 'Icon Link', 'Give Your Icon Link');
                    if ($styledata[37] == '') {
                        echo oxi_addons_adm_help_MiniColor('OxiADDSIC-SP-icon-color', $listitemdata[5], '', 'Color', 'Select Your Icon Color', '', '');
                    } else {
                        OxiAddonsADMHelpInputHidden('OxiADDSIC-SP-icon-color', $listitemdata[5]);
                    }
                    if ($styledata[41] == '') {
                        echo oxi_addons_adm_help_MiniColor('OxiADDSIC-SP-H-icon-color', $listitemdata[7], '', 'Hover Color', 'Select Your Icon Color', '', '');
                    } else {
                        OxiAddonsADMHelpInputHidden('OxiADDSIC-SP-H-icon-color', $listitemdata[7]);
                    }
                    if ($styledata[47] == '') {
                        echo oxi_addons_adm_help_MiniColor('OxiADDSIC-SP-icon-bgcolor', $listitemdata[9], '', 'Background', 'Select Your Icon Color', '', '');
                    } else {
                        OxiAddonsADMHelpInputHidden('OxiADDSIC-SP-icon-bgcolor', $listitemdata[9]);
                    }
                    if ($styledata[81] == '') {
                        echo oxi_addons_adm_help_MiniColor('OxiADDSIC-SP-H-border-color', $listitemdata[15], '', 'Hover Border', 'Select Your Icon Color', '', '');
                    } else {
                        OxiAddonsADMHelpInputHidden('OxiADDSIC-SP-H-border-color', $listitemdata[15]);
                    }
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