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
$listitemdata = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddCB-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddCB-width') . ''
                . '||||'
                . '||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCB-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCB-margin') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddCB-box-shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddCB-animation') . ''
                . ' OxiAddCB-button-al |' . sanitize_text_field($_POST['OxiAddCB-button-al']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddCB-heading-size') . ''
                . ' OxiAddCB-heading-color |' . sanitize_hex_color($_POST['OxiAddCB-heading-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddCB-heading') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCB-heading-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddCB-content-size') . ''
                . ' OxiAddCB-content-color |' . sanitize_hex_color($_POST['OxiAddCB-content-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddCB-content') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCB-content-padding') . ''
                . ' OxiAddCB-CH-color |' . sanitize_hex_color($_POST['OxiAddCB-CH-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddCB-I-height') . ''
                . ' OxiAddCB-BG-color |' . sanitize_text_field($_POST['OxiAddCB-BG-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddCB-button-size') . ''
                . ' OxiAddCB-button-color |' . sanitize_hex_color($_POST['OxiAddCB-button-color']) . '|'
                . ' OxiAddCB-button-al |' . sanitize_text_field($_POST['OxiAddCB-button-al']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddCB-button-padding') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddCB-b-animation') . ''
                . ' OxiAddCB-button-hover-color |' . sanitize_hex_color($_POST['OxiAddCB-button-hover-color']) . '|'
                . ' OxiAddCB-button-bgcolor |' . sanitize_text_field($_POST['OxiAddCB-button-bgcolor']) . '|'
                . ' OxiAddCB-button-hover-bgcolor |' . sanitize_text_field($_POST['OxiAddCB-button-hover-bgcolor']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddCB-button') . ''
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddIconBoxes-rows') . ''
                . ' OxiAddCB-button-link-opening |' . sanitize_text_field($_POST['OxiAddCB-button-link-opening']) . '|'
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
        $data = ' OxiAddCB-Front-IMG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddCB-Front-IMG']) . '||#||'
                . 'OxiAddCB-heading-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddCB-heading-text']) . '||#||'
                . 'OxiAddCB-content ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddCB-content']) . '||#||'
                . 'OxiAddCB-button-class ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddCB-button-class']) . '||#||'
                . 'OxiAddCB-button-id ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddCB-button-id']) . '||#||'
                . 'OxiAddCB-button-link ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddCB-button-link']) . '||#||'
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
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-tabs-id-1">General</li>
                                <li  ref="#oxi-tabs-id-2">button</li>
                            </ul>                            
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddIconBoxes-rows', $styledata, 163, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCB-width', $styledata[3], $styledata[4], $styledata[5], 1, 'Width', 'Set Your Content Boxes Max Width', 'true', '.oxi-addons-content-boxes-' . $oxiid . '', 'max-width');
                                             echo oxi_addons_adm_help_MiniColor('OxiAddCB-BG-color', $styledata[121], 'rgba', 'Background Color', 'Select Your Background Color', 'false', '.oxi-addons-content-boxes-' . $oxiid . '-data', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCB-padding', 15, $styledata, 1, 'Padding', 'Set Your Content Boxes Paddins ', 'true', '.oxi-addons-content-boxes-' . $oxiid . '-data', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCB-margin', 31, $styledata, 1, 'Margin', 'Set Your Content Boxes  Margin ', 'true', '.oxi-addons-content-boxes-' . $oxiid . '-data', 'margin');
                                            ?>
                                        </div> 
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddCB-box-shadow', 47, $styledata, 'true', '.oxi-addons-content-boxes-' . $oxiid . '-data');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddCB-animation', 53, $styledata, 'true', '.oxi-addons-content-boxes-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                              
                                </div>
                                <div class="oxi-addons-col-6">
                                      <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCB-I-height', $styledata[117], $styledata[118], $styledata[119], 1, 'Image Height', 'Select Your Image Height', 'false', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-images', 'height');
                                            ?>
                                        </div>
                                    </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCB-heading-size', $styledata[59], $styledata[60], $styledata[61], 1, 'Font Size', 'Select Your Heading Font Size', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-heading', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCB-heading-color', $styledata[63], '', 'Color', 'Select Your Heading Color', 'false', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-heading', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddCB-heading', 65, $styledata, 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCB-heading-padding', 71, $styledata, 1, 'Padding', 'Set Your Heading Padding', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-heading', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCB-content-size', $styledata[87], $styledata[88], $styledata[89], 1, 'Font Size', 'Select Your Content Font Size', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-content', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCB-content-color', $styledata[91], '', 'Color', 'Select Your Content Color', 'false', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-content', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCB-CH-color', $styledata[115], '', 'Hover Color', 'Select Your Content Hover Color', 'true', '.oxi-addons-content-boxes-' . $oxiid . ':hover .oxi-addons-content-boxes-content', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddCB-content', 93, $styledata, 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-content');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCB-content-padding', 99, $styledata, 1, 'padding', 'Set Your Content Padding', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-content', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-2">
                                <div class="oxi-addons-col-6">                                        
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Info
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddCB-button-link-opening', $styledata[167], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddCB-button-al', $styledata[129], 'Button Align', 'Set Your Button Align', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-button', 'text-align');
                                            ?>
                                        </div>
                                    </div>                                       
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                           echo oxi_addons_adm_help_Animation('OxiAddCB-b-animation', 147, $styledata,'true', '.oxi-addons-content-boxes-button');
                                           ?>
                                        </div>
                                    </div>    
                                </div>
                                <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddCB-button-size', $styledata[123], $styledata[124], $styledata[125], 1, 'Button Size', 'Select Your Button Text Size', 'true', '.oxi-addons-content-boxes-button .oxi-button-' . $oxiid . '', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCB-button-color', $styledata[127], '', 'Color', 'Select Your Button Text Color', 'false', '.oxi-addons-content-boxes-button .oxi-button-' . $oxiid . '', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCB-button-bgcolor', $styledata[153], 'rgba', 'Background Color', 'Select Your Button Background Color', 'false', '.oxi-addons-content-boxes-button .oxi-button-' . $oxiid . '', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddCB-button', 157, $styledata, 'true', '.oxi-addons-content-boxes-button .oxi-button-' . $oxiid . '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddCB-button-padding', 131, $styledata, 1, 'Padding', 'Set Your Button Padding', 'true', '.oxi-addons-content-boxes-button .oxi-button-' . $oxiid . '', 'padding');
                                           ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCB-button-hover-color', $styledata[151], '', ' Color', 'Select Your Button Hover Text Color', 'true', '.oxi-addons-container .oxi-button-' . $oxiid . ':hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddCB-button-hover-bgcolor', $styledata[155], 'rgba', 'Background Color', 'Select Your Button Hover Background Color', 'false', '.oxi-addons-container .oxi-button-' . $oxiid . ':hover', 'background');
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
                            <?php wp_nonce_field("OxiAddCB-nonce") ?>
                        </div>

                    </div>

                </form>

            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Content Boxes Rearrange', $listdata, 3, 'title');
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
                    <?php echo oxi_content_boxes_style_6_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_image_upload('OxiAddCB-Front-IMG', $listitemdata[1], 'Front-Image', 'upload Your Content Boxes Images');
                    echo oxi_addons_adm_help_textbox('OxiAddCB-heading-text', $listitemdata[3], 'Heading Text', 'Set your Heading text');
                    echo oxi_addons_adm_help_form_textarea('OxiAddCB-content', $listitemdata[5], 'Content', 'Write your content box short details', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddCB-button-class', $listitemdata[7], 'Button Text', 'Set your Button text');
                    echo oxi_addons_adm_help_textbox('OxiAddCB-button-id', $listitemdata[9], 'Button Id', 'Set your Button Id');
                    echo oxi_addons_adm_help_textbox('OxiAddCB-button-link', $listitemdata[11], 'Button Link', 'Set your button link');
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
