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
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('oxi-addons-item-per-rows') . ''
                . '' . OxiAddonsBGImageSanitize('oxi-addons-box-icon-bg-or-img') . '|'
                . ' oxi-addons-box-width-icon |' . sanitize_text_field($_POST['oxi-addons-box-width-icon']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-margin') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('oxi-addons-box-shadow') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('oxi-addons-box-animation'). '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('oxi-addons-icon-font-size') . ''
                . ' oxi-addons-icon-color |' . sanitize_hex_color($_POST['oxi-addons-icon-color']) . '|'
                . ' oxi-addons-icon-bg-color |' . sanitize_hex_color($_POST['oxi-addons-icon-bg-color']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-icon-padding') . ''
                . oxi_addons_adm_help_single_size('oxi-addons-box-icon-width')
                . oxi_addons_adm_help_single_size('oxi-addons-box-icon-height')
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-icon-border-widht') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('oxi-addons-box-icon-border-color-and-type') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-icon-border-radius') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('oxi-addons-box-icon-animation'). '|'
                . ' oxi-addons-box-icon-align |' . sanitize_text_field($_POST['oxi-addons-box-icon-align']) . '|'
                . ' oxi-addons-box-heading-color |' . sanitize_hex_color($_POST['oxi-addons-box-heading-color']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('oxi-addons-box-heading-font-size') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi-addons-box-heading-font-settings') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-heading-padding') . ''
                . ' oxi-addons-box-desc-color |' . sanitize_hex_color($_POST['oxi-addons-box-desc-color']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('oxi-addons-box-desc-font-size') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi-addons-box-desc-font-settings') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-desc-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-border-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-border-widht') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('oxi-addons-box-border-color-and-type') . '|'
                . oxi_addons_adm_help_single_size('oxi-addons-box-width')
                . ' oxi-addons-fuad-background-color |' . sanitize_text_field($_POST['oxi-addons-fuad-background-color']) . '|'
                
                
                
                
                
                
                
                
                
                
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
        $data = ' oxi-addons-box-image-icon ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-addons-box-image-icon']) . '||#|| '
                .' ||#||oxi-addons-icon-class ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi-addons-icon-class']) . '||#|| '
                . ' oxi-addons-box-heding-tex ||#||' . sanitize_text_field($_POST['oxi-addons-box-heding-tex']) . '||#|| '
                . ' oxi-addons-box-text-description ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-addons-box-text-description']) . '||#|| ';
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



//echo '<pre>';
//print_r($styledata);
//print_r($stylefiles);
//print_r($listdata);
//print_r($listfile);
//print_r($listitemdata);
//echo '</pre>';



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
                                            echo OxiAddonsADMHelpItemPerRows('oxi-addons-item-per-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_number_dtm('oxi-addons-box-width', $styledata[224], $styledata[225], $styledata[226], 1, 'Max Width', 'Set your Box Max Width', false, '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main', 'max-width', 'px', 150, 1000);                                            
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-box-border-widht', 204, $styledata, 1, 'Border-width', 'Set Your Content Boxes Border width', 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main', 'border-width');
                                            echo OxiAddonsADMhelpBorder('oxi-addons-box-border-color-and-type', 220, $styledata, 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-box-border-radius', 188, $styledata, 1, 'Border Radius', 'Set Your Content Boxes Border Radius', 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-box-padding', 14, $styledata, 1, 'Padding', 'Set your box body padding', 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-box-margin', 30, $styledata, 1, 'Margin', 'Set your box body margin', 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main-outer', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                            echo OxiAddonsADMhelpBoxShadow('oxi-addons-box-shadow', 46, $styledata, 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-main', 'box-shadow');
                                         ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Box Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                           echo oxi_addons_adm_help_Animation('oxi-addons-box-animation',52,$styledata,'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-row');
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
                                            echo oxi_addons_adm_help_number_dtm('oxi-addons-icon-font-size', $styledata[57], $styledata[58], $styledata[59], '', 'Font Size', 'Set Your Icon Size', 'true', '.oxi-box-wrap-' . $oxiid . ' i', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi-addons-icon-color', $styledata[61], '', 'Icon Color', 'Set your Icon color', 'false', '.oxi-box-wrap-' . $oxiid . ' i', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-addons-fuad-background-color', $styledata[228], 'rgba', 'Background Color', 'Set your Icon background color', 'true', '.oxi-box-wrap-' . $oxiid . ' i', 'background');                                        
                                            echo oxi_addons_adm_help_number_dtm('oxi-addons-box-icon-width', $styledata[81], $styledata[82], $styledata[83], 1, 'Width', 'Set Your Icon Box Width', true, '.oxi-box-wrap-' . $oxiid . ' i', 'width', 'px', '', '');
                                            echo oxi_addons_adm_help_number_dtm('oxi-addons-box-icon-height', $styledata[85], $styledata[86], $styledata[87], 1, 'Height', 'Set Your Icon Box Height', true, '.oxi-box-wrap-' . $oxiid . ' i', 'height', 'px', '', '');
                                            echo oxi_addons_adm_help_Text_Align('oxi-addons-box-icon-align', $styledata[130], 'Icon Align', 'Set Your Icon Align', 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-icon-inner', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-box-icon-border-widht', 89, $styledata, 1, 'Border-width', 'Set Your Content Boxes Border width', 'true', '.oxi-box-wrap-' . $oxiid . ' i', 'border-width');
                                            echo OxiAddonsADMhelpBorder('oxi-addons-box-icon-border-color-and-type', 105, $styledata, 'true', '.oxi-box-wrap-' . $oxiid . ' i', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-box-icon-border-radius', 109, $styledata, 1, 'Border Radius', 'Set Your Content Boxes Border Radius', 'true', '.oxi-box-wrap-' . $oxiid . ' i', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-icon-padding', 65, $styledata, 1, 'Padding', 'Set your Icon padding', 'true', '.oxi-box-wrap-' . $oxiid . ' i', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Icon Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                           echo oxi_addons_adm_help_Animation('oxi-addons-box-icon-animation',125,$styledata,'true', '.oxi-addons-EW-wrapper-'. $oxiid .' .oxi-addons-EW-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi-addons-box-heading-color', $styledata[132], '', 'Color', 'Set your Box Text color', 'false', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-heading', 'color');
                                            echo oxi_addons_adm_help_number_dtm('oxi-addons-box-heading-font-size', $styledata[134], $styledata[135], $styledata[136], '', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-heading', 'font-size');
                                            echo OxiAddonsADMHelpFontSettings('oxi-addons-box-heading-font-settings', 138, $styledata, 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-heading');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-box-heading-padding', 144, $styledata, 1, 'Padding', 'Set your box heading padding', 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Short Details
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi-addons-box-desc-color', $styledata[160], '', 'Color', 'Set your Short Details Text color', 'false', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-desc', 'color');
                                            echo oxi_addons_adm_help_number_dtm('oxi-addons-box-desc-font-size', $styledata[162], $styledata[163], $styledata[164], '', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-desc', 'font-size');
                                            echo OxiAddonsADMHelpFontSettings('oxi-addons-box-desc-font-settings', 166, $styledata, 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-desc');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-box-desc-padding', 172, $styledata, 1, 'Padding', 'Set your Short Details padding', 'true', '.oxi-box-wrap-' . $oxiid . ' .oxi-addons-desc', 'padding');
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
                echo oxi_addons_list_rearrange('Icon Boxes Rearrange', $listdata, 1, 'image')
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
                    <?php echo oxi_icon_boxes_style_8_shortcode($style, $listdata, 'admin'); ?>
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
                     echo oxi_addons_adm_help_model_image_upload('oxi-addons-box-image-icon', $listitemdata[1], 'Background Image', 'Set Image', false);
                     echo oxi_addons_adm_help_textbox('oxi-addons-icon-class', $listitemdata[4], 'Icon Class', 'Set Your Icon Class', 'false');
                     echo oxi_addons_adm_help_textbox('oxi-addons-box-heding-tex', $listitemdata[6], 'Box Heading', 'Set Your Box Heading', 'false');
                     echo oxi_addons_adm_help_form_textarea('oxi-addons-box-text-description', $listitemdata[8], 'Info Text', 'Give Your Info text Here', 'false');
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


