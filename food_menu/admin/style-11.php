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
$listid = '';
$listitemdata = array('', '', '', '', '', '', '', '', '', '', '', '',);


if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-demo_package-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                //  to box setting
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('oxi-addons-box-food-item-per-rows') . ''
                . oxi_addons_adm_help_single_size('oxi-addons-box-width')
                . oxi_addons_adm_help_single_size('oxi-addons-box-height')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-border-width')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-border-radius')
                . OxiAddonsADMHelpBorderSanitize('oxi-addons-box-border-style')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-padding')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-margin')
                . OxiAddonsADMBoxShadowSanitize('oxi-addons-box-shadow')
                . oxi_addons_adm_help_single_size('oxi-box-heading-font-size')
                . 'oxi-box-heading-font-color |' . sanitize_text_field($_POST['oxi-box-heading-font-color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('oxi-box-heading-font-settings')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-box-heading-font-padding')                
                . oxi_addons_adm_help_single_size('oxi-box-desc-font-size')
                . 'oxi-box-desc-font-color |' . sanitize_text_field($_POST['oxi-box-desc-font-color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('oxi-box-desc-font-settings')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-box-desc-font-padding')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-img-padding')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-img-border-width')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-box-img-border-radius')
                . OxiAddonsADMHelpBorderSanitize('oxi-addons-box-img-border-style')
                . oxi_addons_adm_help_single_size('oxi-addons-box-img-height')
                . '' . oxi_addons_adm_help_animation_senitize('oxi-addons-box-animation') . ''
                . '' . OxiAddonsBGImageSanitize('oxi-addons-background-image') . ''
                . '||#||oxi-event-image||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-event-image']) . '||#|| '
                . '||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}


if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = ' oxi-addons-box-image-down ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-addons-box-image-down']) . '||#|| '
                . 'oxi-addons-box-heading-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-box-heading-text']) . '||#|| '
                . 'oxi-addons-box-desc-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-box-desc-text']) . '||#|| '
        ;
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
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
echo '<pre>';
//print_r($styledata);
//print_r($stylefiles);
//print_r($listdata);
//print_r($listfile);
//print_r($listitemdata);
echo '</pre>';
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
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo OxiAddonsADMHelpItemPerRows('oxi-addons-box-food-item-per-rows', $styledata, 3, 'false', '.oxi-box-wrap-' . $oxiid . '');
                                                echo oxi_addons_adm_help_number_dtm('oxi-addons-box-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Set Your Box Width', false, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-main', 'max-width', 'px', '', '');                                                
                                                echo OxiAddonsADMHelpBGImage('oxi-addons-background-image', $styledata, 203, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-main', 'background');
                                                echo oxi_addons_adm_help_padding_margin('oxi-addons-box-border-width', 15, $styledata, 1, 'Border Width', 'Set Your Box Border width', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-main', 'border-width');
                                                echo OxiAddonsADMhelpBorder('oxi-addons-box-border-style', 47, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-main', 'border-style');
                                                echo oxi_addons_adm_help_padding_margin('oxi-addons-box-border-radius', 31, $styledata, 1, 'Border Radius', 'Set Your Box Border Radius ', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-main', 'border-radius');
                                                echo oxi_addons_adm_help_padding_margin('oxi-addons-box-padding', 50, $styledata, '1', 'Padding', 'Set your Box Padding', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-main', 'padding');
                                                echo oxi_addons_adm_help_padding_margin('oxi-addons-box-margin', 66, $styledata, '1', 'Margin', 'Set your Box Margin', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-outer', 'padding');                                            
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo OxiAddonsADMhelpBoxShadow('oxi-addons-box-shadow', 82, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-main');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_Animation('oxi-addons-box-animation', 199, $styledata, 'true', '');
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
                                                echo oxi_addons_adm_help_number_dtm('oxi-box-heading-font-size', $styledata[88], $styledata[89], $styledata[90], 1, 'Font Size', 'Select Your Heading Font Size', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-heading', 'font-size', 'px', '', '');
                                                echo oxi_addons_adm_help_MiniColor('oxi-box-heading-font-color', $styledata[92], '', 'Color', 'Set Your Heading Color', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-heading', 'color');
                                                echo OxiAddonsADMHelpFontSettings('oxi-box-heading-font-settings', 94, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-heading');
                                                echo oxi_addons_adm_help_padding_margin('oxi-box-heading-font-padding', 100, $styledata, '1', 'Padding', 'Set your Heading Text Padding', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-heading', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">                                    
                                        <div class="oxi-head">
                                            Descriptions
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_number_dtm('oxi-box-desc-font-size', $styledata[116], $styledata[117], $styledata[118], 1, 'Font Size', 'Select Your Food Descriptions Font Size', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-desc', 'font-size', 'px', '', '');
                                                echo oxi_addons_adm_help_MiniColor('oxi-box-desc-font-color', $styledata[120], '', 'Color', 'Set Your Food Item Color', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-desc', 'color');
                                                echo OxiAddonsADMHelpFontSettings('oxi-box-desc-font-settings', 122, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-desc');
                                                echo oxi_addons_adm_help_padding_margin('oxi-box-desc-font-padding', 128, $styledata, '1', 'Padding', 'Set your Food Item Padding', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-desc', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">                                    
                                        <div class="oxi-head">
                                            Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_number_dtm('oxi-addons-box-img-height', $styledata[195], $styledata[196], $styledata[197], 1, 'Height', 'Set Your Image height', false, '.oxi-box-wrap-'.$oxiid.'  .oxi-addons-box-food-img-area', 'height', 'px', '', '');
                                                echo oxi_addons_adm_help_padding_margin('oxi-addons-box-img-border-width', 160, $styledata, 1, 'Border Width', 'Set Your Box Image Border width', 'true', '.oxi-box-wrap-'.$oxiid.'  .oxi-addons-box-food-img-area', 'border-width');
                                                echo OxiAddonsADMhelpBorder('oxi-addons-box-img-border-style', 192, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.'  .oxi-addons-box-food-img-area', 'border-style');
                                                echo oxi_addons_adm_help_padding_margin('oxi-addons-box-img-border-radius', 176, $styledata, 1, 'Border Radius', 'Set Your Box Image Border Radius ', 'true', '.oxi-box-wrap-'.$oxiid.'  .oxi-addons-box-food-img-area', 'border-radius');
                                                echo oxi_addons_adm_help_padding_margin('oxi-addons-box-img-padding', 144, $styledata, '1', 'Padding', 'Set your Box Image Padding', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-food-img-area-outer', 'padding');                                                
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <?php wp_nonce_field("oxi-addons-demo_package-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                    echo oxi_addons_list_modal_open('Add New Events');
                    echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                    echo oxi_addons_shortcode_call($oxitype, $oxiid);
                    echo oxi_addons_list_rearrange('Event Rearrange', $listdata, 3, 'title');
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
                    <?php echo oxi_food_menu_style_11_shortcode($style, $listdata, 'admin'); ?>
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
                    <h4 class="modal-title">Event Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                        echo oxi_addons_adm_help_model_image_upload('oxi-addons-box-image-down', $listitemdata[1], 'Image', 'Set Image', false);
                        echo oxi_addons_adm_help_textbox('oxi-addons-box-heading-text', $listitemdata[3], 'Heading', 'Write your Icon Class', false);
                        echo oxi_addons_adm_help_textbox('oxi-addons-box-desc-text', $listitemdata[5], 'Item', 'Write your Heading Text', false);                        
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
