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
$listitemdata = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$listid = '';
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' ||'
                . ' OxiAddonsEW-G-MW |' . sanitize_text_field($_POST['OxiAddonsEW-G-MW']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-G-BS') . ''
                . ' OxiAddonsEW-BP-BG |' . sanitize_hex_color($_POST['OxiAddonsEW-BP-BG']) . '|'
                . ' OxiAddonsEW-BP-TC |' . sanitize_hex_color($_POST['OxiAddonsEW-BP-TC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-BP-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-BP-FS') . ''
                . '||||||'
                . '||||||'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-BH-F') . ''
                . ' OxiAddonsEW-BH-TC |' . sanitize_hex_color($_POST['OxiAddonsEW-BH-TC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-BH-FS') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-BH-P') . ''
                . ' OxiAddonsEW-SD-TC |' . sanitize_hex_color($_POST['OxiAddonsEW-SD-TC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-SD-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-SD-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-SD-P') . ''
                . ' OxiAddonsEW-BP-PS |' . sanitize_text_field($_POST['OxiAddonsEW-BP-PS']) . '|'
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-animation'). '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsEW-G-rows') . ''
                . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-G-3-BG') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-BP-RO') . ''
                . '||#||'
                . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = sanitize_textarea_field($_POST['oxilistid']);
        $data = ' ||#||OxiAddonsEW-BP-TB ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsEW-BP-TB']) . '||#|| '
                . ' OxiAddonsEW-BH ||#||' . sanitize_text_field($_POST['OxiAddonsEW-BH']) . '||#|| '
                . ' OxiAddonsEW-SD ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-SD']) . '||#|| ';
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
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER BY id ASC", $oxiid), ARRAY_A);
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
                                        General Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsEW-G-rows', $styledata, 144, 'false', '.oxi-addons-admin-edit-list');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-G-3-BG', $styledata, 148, 'true', ' .oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-row', 'background');
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-G-MW', $styledata[5], '', 'Max Width', 'Set your Box Max Width', 'true', '.oxi-addons-EW-wrapper-'. $oxiid .'', 'max-width');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-P', 7, $styledata, 1, 'Padding', 'Set your box body padding', 'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-M', 23, $styledata, 1, 'Margin', 'Set your box body margin', 'true', '.oxi-addons-EW-wrapper-'. $oxiid .'', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                       echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-G-BS', 39, $styledata, 'true', '.oxi-addons-EW-wrapper-'. $oxiid .'', 'box-shadow');
                                         ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                           echo oxi_addons_adm_help_Animation('OxiAddonsEW-animation',139,$styledata,'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-row');
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
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-BP-PS', $styledata[137], 'Left', 'left', 'Right', 'right', 'Position', 'Set Your Icon Body Position', 'true');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-BP-FS', $styledata[65], $styledata[66], $styledata[67], '', 'Font Size', 'Set Your Icon Size', 'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-price-main .oxi-addons-EW-image-overlay-price', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-BP-TC', $styledata[47], '', 'Icon Color', 'Set your Icon color', 'false', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-price-main .oxi-addons-EW-image-overlay-price', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-BP-BG', $styledata[45], '', 'Background Color', 'Set your Icon background color', 'false', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-price-main', 'background-color');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-BP-RO', $styledata[153], $styledata[154], $styledata[155], '', 'Rotate', 'Set Your Icon Rotate', 'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-price-main .oxi-addons-EW-image-overlay-price', 'transform');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-BP-P', 49, $styledata, 1, 'Padding', 'Set your Icon padding', 'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-price-main .oxi-addons-EW-image-overlay-price', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-BH-TC', $styledata[87], '', 'Color', 'Set your Box Text color', 'false', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-heading', 'color');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-BH-FS', $styledata[89], $styledata[90], $styledata[91], '', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-heading', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-BH-F', 81, $styledata, 'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-BH-P', 93, $styledata, 1, 'Padding', 'Set your box heading padding', 'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Short Details
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-SD-TC', $styledata[109], '', 'Color', 'Set your Short Details Text color', 'false', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-details', 'color');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-SD-FS', $styledata[111], $styledata[112], $styledata[113], '', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-details', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-SD-F', 115, $styledata, 'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-details');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-SD-P', 121, $styledata, 1, 'Padding', 'Set your Short Details padding', 'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-image .oxi-addons-EW-image-overlay .oxi-addons-EW-image-overlay-main .oxi-addons-EW-image-overlay-details', 'padding');
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
                echo oxi_addons_list_rearrange('Icon Boxes Rearrange', $listdata, 8, 'image')
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
                    <?php echo oxi_icon_boxes_style_7_shortcode($style, $listdata, 'admin'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Event Widgets Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                     echo oxi_addons_adm_help_textbox('OxiAddonsEW-BP-TB', $listitemdata[2], 'Icon Class', 'Set Your Icon Class', 'false');
                     echo oxi_addons_adm_help_textbox('OxiAddonsEW-BH', $listitemdata[4], 'Box Heading', 'Set Your Box Heading', 'false');
                     echo oxi_addons_adm_help_form_textarea('OxiAddonsEW-SD', $listitemdata[6], 'Info Text', 'Give Your Info text Here', 'false');
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

