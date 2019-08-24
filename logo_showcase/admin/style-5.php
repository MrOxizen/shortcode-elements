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
$listitemdata = $bgdata = array("", "", "", "", "", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-icon-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsLogoShowcase-rows') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddonsLogoShowcase-width') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddonsLogoShowcase-Height') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsLogoShowcase-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsLogoShowcase-margin') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsLogoShowcase-animation') . '|'
                . ' oxi_addons-icon-link-opening |' . sanitize_text_field($_POST['oxi_addons-icon-link-opening']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsTestimonial-BS') . ''
                . 'OxiAddonsLogoShowcase-BG |' . sanitize_text_field($_POST['OxiAddonsLogoShowcase-BG']) . '|'
                . 'OxiAddonsLogoShowcase-BG-hover |' . sanitize_text_field($_POST['OxiAddonsLogoShowcase-BG-hover']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsTestimonial-HBS') . ''
                . 'OxiAddonsLogoShowcase-tt-text-d |' . sanitize_text_field($_POST['OxiAddonsLogoShowcase-tt-text-d']) . '|'
                . 'OxiAddonsLogoShowcase-tt-tooltip-color |' . sanitize_hex_color($_POST['OxiAddonsLogoShowcase-tt-tooltip-color']) . '|'
                . 'OxiAddonsLogoShowcase-tt-tooltip-bg-color |' . sanitize_text_field($_POST['OxiAddonsLogoShowcase-tt-tooltip-bg-color']) . '|'
                . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsLogoShowcase-tt-tooltip-padding')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsLogoShowcase-tt-tooltip-margin')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsLogoShowcase-tt-tooltip-border-radius')
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsLogoShowcase-tt-tooltip-font-size')
                . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsLogoShowcase-tt-tooltip-font')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsLogoShowcase-border-width')
                . OxiAddonsADMHelpBorderSanitize('OxiAddonsLogoShowcase-border')
                . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsLogoShowcase-border-redius')
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
        $data = '   OxiAddonsLogoShowcase-BG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsLogoShowcase-BG']) . '||#||'
                . ' OxiAddonsLogoShowcase-BGL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsLogoShowcase-BGL']) . '||#|| '
                . ' OxiAddonsLogoShowcase-tooltip-text ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsLogoShowcase-tooltip-text']) . '||#|| '
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
//echo '<pre>';
//print_r($styledata);
//echo '</pre>';
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
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li  ref="#oxi-addons-tabs-2">Tooltip Setting</li> 
                            </ul> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsLogoShowcase-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_true_false('oxi_addons-icon-link-opening', $styledata[52], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsLogoShowcase-border', 150, $styledata, 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsLogoShowcase-border-width', 134, $styledata, 1, 'Border-width', 'Set Your Logo Border', 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '', 'border-width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsLogoShowcase-border-redius', 153, $styledata, 1, 'Border-Redius', 'Set Your Logo Border Redius', 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsLogoShowcase-margin', 31, $styledata, 1, 'Margin', 'Set Yout Logo showcase Margin', 'true', '.oxi-addons-container .oxi-addons-logo-showcase-row-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>                                               
                                    </div> 

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsLogoShowcase-animation', 47, $styledata, 'true', '.oxi-addons-logo-showcase-row-' . $oxiid . '');
                                            ?>  
                                        </div>
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsTestimonial-BS', 54, $styledata, 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div> 
                                </div>   
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Logo Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsLogoShowcase-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Select Your Logo Width ', '', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsLogoShowcase-Height', $styledata[11], $styledata[12], $styledata[13], 1, 'Height Ratio', 'Select Your Logo Height Ratio', '', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':after', 'padding-bottom', '%', 0, 1000);
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsLogoShowcase-padding', 15, $styledata, 1, 'Padding', 'Set Your Logo Showcase Padding', 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-img', 'padding');
                                            ?>  
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Background Color Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsLogoShowcase-BG', $styledata[60], 'rgba', 'Background Color', 'Set Product Boxes Background color', 'false', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsLogoShowcase-BG-hover', $styledata[62], 'rgba', 'Hover Background Color', 'Set Logo Background color', 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':hover', 'background');
                                            ?>  
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsTestimonial-HBS', 64, $styledata, 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Tooltip Text
                                        </div>

                                        <div class="oxi-addons-content-div-body">
                                            <div class=" form-group row">
                                                <label for="OxiAddonsLogoShowcase-tt-text-d" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Tooltip Position">Tooltip Position</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control" id="oxi-addons-tt-text-d" name="OxiAddonsLogoShowcase-tt-text-d">
                                                        <option value="top" <?php selected($styledata[70], 'top'); ?>>Top</option>
                                                        <option value="bottom" <?php selected($styledata[70], 'bottom'); ?>>Bottom</option>
                                                        <option value="left" <?php selected($styledata[70], 'left'); ?>>Left</option>
                                                        <option value="right" <?php selected($styledata[70], 'right'); ?>>Right</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            $NOJS2 = array(
                                                array('OxiAddonsLogoShowcase-tt-text-d', 'Tooltip Position')
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS2);
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsLogoShowcase-tt-tooltip-color', $styledata[72], '', 'Color', 'Set Your Tooltip Color', 'false', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsLogoShowcase-tt-tooltip-bg-color', $styledata[74], 'rgba', 'Background Color', 'Set Your Tooltip Background Color', 'false', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsLogoShowcase-tt-tooltip-padding', 76, $styledata, 1, 'Padding', 'Set Your Tooltip Padding', 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsLogoShowcase-tt-tooltip-margin', 92, $styledata, 1, 'Margin', 'Set Your Tooltip Margin', 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext', 'margin');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsLogoShowcase-tt-tooltip-border-radius', 108, $styledata, 1, 'Border Radius', 'Set Your Tooltip Border Radius', 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Typography
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsLogoShowcase-tt-tooltip-font-size', $styledata[124], $styledata[125], $styledata[126], 1, 'Font Size', 'Set your Tooltip Font Size', 'false', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext', 'font-size');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsLogoShowcase-tt-tooltip-font', 128, $styledata, 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext');
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
                            <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-icon-nonce") ?>
                        </div>
                    </div>

                </form> 
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Logo Showcase Rearrange', $listdata, 1, 'image');
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
                    <?php echo oxi_logo_showcase_style_5_shortcode($style, $listdata, 'admin') ?>
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
                    echo oxi_addons_adm_help_image_upload('OxiAddonsLogoShowcase-BG', $listitemdata[1], 'Image', 'Set your background Logo Image', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsLogoShowcase-BGL', $listitemdata[3], 'Link', 'Set Logo Showcase Image Link', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsLogoShowcase-tooltip-text', $listitemdata[5], 'Tooltip Text', 'Set Logo Tooltip Text', 'false');
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
