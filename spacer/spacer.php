<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
if (empty($_GET['styleid'])) {
    $oxiid = '';
} else {
    $oxiid = (int) $_GET['styleid'];
}
$data_value = array("0", "30", "20", "10");
$table_name = $wpdb->prefix . 'oxi_div_style';
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
if (!empty($_POST['submit']) && $_POST['submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-spacer-create-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxispacer = sanitize_text_field($_POST['style-name']);
        $oxistyleid = (int) $_POST['oxistyleid'];
        $style_name = 'style-1';
        $CSS = 'spacer-size |' . sanitize_text_field($_POST['spacer-size']) . '|' . sanitize_text_field($_POST['spacer-size-tab']) . '|' . sanitize_text_field($_POST['spacer-size-mobile']) . '|';
        if ($oxistyleid != '') {
            $data = $wpdb->update("$table_name", array("name" => $oxispacer, "css" => $CSS), array('id' => $oxistyleid), array('%s', '%s'), array('%d'));
        } else {
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_name} (name, style_name,  type, css) VALUES ( %s, %s, %s, %s )", array($oxispacer, $style_name, $oxitype, $CSS)));
        }
        $url = admin_url("admin.php?page=oxi-addons&oxitype=$oxitype");
        echo '<script type="text/javascript"> document.location.href = "' . $url . '"; </script>';
        exit;
    }
}
if (!empty($_POST['addonsdatadelete']) && is_numeric($_POST['oxideleteid'])) {
    if (!wp_verify_nonce($nonce, 'oxi-addons-' . $oxitype . '-del-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $id = (int) $_POST['oxideleteid'];
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %d", $id));
    }
}
if (!empty($oxiid) && $oxiid > 0) {
    $data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
    $data_value = explode('|', $data['css']);
    wp_add_inline_script('oxi-addons-vendor', 'jQuery("#style-name").val("' . $data['name'] . '");
                                                         jQuery("#oxistyleid").val("' . $data['id'] . '");
                                                         jQuery("#oxi-addons-create-modal").modal("show");');
}
$data = $wpdb->get_results("SELECT * FROM $table_name WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
wp_add_inline_script('oxi-addons-vendor', 'jQuery("#oxi-addons-style-1-create-new-item").click(function () {
                                                jQuery("#style-name").val("");
                                                jQuery("#oxistyleid").val("");
                                                jQuery("#oxi-addons-create-modal").modal("show");
                                            });;');
?>
<div class="wrap">
    <?php
    echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes');
    echo OxiAddonsAdmAdminShortcodeTable($data, $oxitype);
    ?>
    <div class="oxi-addons-wrapper">          
        <div class="oxi-addons-row">
            <div class="oxi-addons-col-1 oxi-addons-padding-20px">
                <div class="oxi-addons-style-1-create">
                    <div class="oxi-addons-style-1-create-top">                    
                        <div class="oxi-addons-style-1-create-new-item" id="oxi-addons-style-1-create-new-item">
                            <span>      
                                <?php
                                echo oxi_addons_admin_font_awesome('plus');
                                echo 'Create A New ';
                                echo oxi_addons_shortcode_name_converter($oxitype);
                                ?>
                            </span>
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-create-modal" >
    <form method="post" id="oxi-addons-form-submit">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo oxi_addons_shortcode_name_converter($oxitype); ?> Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('style-name', '', 'Name', 'Set Your Spacer Name');
                    echo oxi_addons_adm_help_number_dtm('spacer-size', $data_value[1], $data_value[2], $data_value[3], '1', 'Size', 'Give your Spacer Size In Pixel', '', '');
                    ?>
                </div>
                <?php
                echo oxi_addons_adm_help_form_dtm_mode();
                ?>
                <div class="modal-footer">
                    <input type="hidden" id="oxistyleid" name="oxistyleid" value="">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="submit" id="oxi-submit" value="Save">
                    <?php wp_nonce_field("oxi-addons-spacer-create-nonce") ?>
                </div>
            </div>
        </div>
    </form>
</div>