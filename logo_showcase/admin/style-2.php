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
                . ' OxiAddonsLogoShowcase-grayscale |' . sanitize_text_field($_POST['OxiAddonsLogoShowcase-grayscale']) . '|'
                . ' OxiAddonsLogoShowcase-hover-grayscale |' . sanitize_text_field($_POST['OxiAddonsLogoShowcase-hover-grayscale']) . '|'
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
                            <div class="oxi-addons-tabs-content-tabs">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsLogoShowcase-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_true_false('oxi_addons-icon-link-opening', $styledata[52], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style');
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
                                            Normal Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('OxiAddonsLogoShowcase-grayscale', $styledata[60], 1, 'Grayscale', 'Set You Logo Image Grayscale for 0 to 100.', 'false', '', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsLogoShowcase-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Select Your Logo Width ', '', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsLogoShowcase-Height', $styledata[11], $styledata[12], $styledata[13], 1, 'Height', 'Select Your Logo Height ', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsLogoShowcase-padding', 15, $styledata, 1, 'Padding', 'Set Your Logo Showcase Padding', 'true', '.oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-img', 'padding');
                                            $NOJS = array(
                                                array('OxiAddonsLogoShowcase-grayscale', 'Grayscale'),
                                                array('OxiAddonsLogoShowcase-Height','Height'),

                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>  
                                        </div>
                                    </div> 
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('OxiAddonsLogoShowcase-hover-grayscale', $styledata[62], 1, 'Grayscale', 'Set You Logo Image Hover Grayscale for 0 to 100.', 'false', '', '');
                                            $NOJS = array(
                                                array('OxiAddonsLogoShowcase-hover-grayscale', 'Hover Grayscale')
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
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
                    <?php echo oxi_logo_showcase_style_2_shortcode($style, $listdata, 'admin') ?>
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
