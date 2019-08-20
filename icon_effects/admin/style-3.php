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
    if (!wp_verify_nonce($nonce, 'oxi-addons-icon-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi_addons-icon-link-opening |' . sanitize_text_field($_POST['oxi_addons-icon-link-opening']) . '|'
                . ' oxi_addons-icon-font-size |' . sanitize_text_field($_POST['oxi_addons-icon-font-size']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-font-size-tab']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-font-size-mobile']) . '|'
                . ' oxi_addons-icon-margin-top |' . sanitize_text_field($_POST['oxi_addons-icon-margin-top']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-margin-top-tab']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-margin-top-mobile']) . '|'
                . ' oxi_addons-icon-margin-left |' . sanitize_text_field($_POST['oxi_addons-icon-margin-left']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-margin-left-tab']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-margin-left-mobile']) . '|'
                . ' oxi_addons-icon-width |' . sanitize_text_field($_POST['oxi_addons-icon-width']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-width-tab']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-width-mobile']) . '|'
                . ' oxi_addons-icon-color |' . sanitize_text_field($_POST['oxi_addons-icon-color']) . '|'
                . ' oxi_addons-icon-bg-color |' . sanitize_text_field($_POST['oxi_addons-icon-bg-color']) . '|'
                . '' . oxi_addons_adm_help_animation_senitize('oxi_addons-icon-animation') . ''
                . ' oxi-addons-icon-border-radius |' . sanitize_text_field($_POST['oxi-addons-icon-border-radius']) . '|'
                . ' oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' oxi_addons-icon-hover-color |' . sanitize_text_field($_POST['oxi_addons-icon-hover-color']) . '|'
                . ' oxi_addons-icon-hover-bg-color |' . sanitize_text_field($_POST['oxi_addons-icon-hover-bg-color']) . '|'
                . ' oxi_addons-icon-padding |' . sanitize_text_field($_POST['oxi_addons-icon-padding']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-padding-tab']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-padding-mobile']) . '|'
                . ' oxi_addons-icon-border |' . sanitize_text_field($_POST['oxi_addons-icon-border']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-border-tab']) . '|' . sanitize_text_field($_POST['oxi_addons-icon-border-mobile']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddIconBoxes-rows') . ''
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
        $data = ' oxi_addons-icon-class ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi_addons-icon-class']) . '||#||'
                . 'oxi_addons-icon-id ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-icon-id']) . '||#||'
                . 'oxi_addons-icon-link ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons-icon-link']) . '||#||'
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
                                        Icon Effects Information
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddIconBoxes-rows', $styledata, 43, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-icon-link-opening', $styledata[1], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style');
                                        ?>
                                    </div>                                               
                                </div>                                            
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('oxi_addons-icon-animation', 23, $styledata, 'true', '.oxi-addons-container');
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
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-icon-font-size', $styledata[3], $styledata[4], $styledata[5], 1, 'Font Size', 'Your Icon Font Size', 'true', '.oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons', 'font-size');
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-icon-width', $styledata[15], $styledata[16], $styledata[17], 1, 'Width Height', 'Your Icon Width with Responsive Size', 'true', '.oxi-addons-container .oxi-icon-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-icon-color', $styledata[19], '', 'Color', 'Select Your Icon Color', '', '.oxi-addons-container .oxi-icon-' . $oxiid . '  .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-icon-bg-color', $styledata[21], 'rgba', 'Background Color', 'Select Your Icon Background Color', '', '.oxi-addons-container .oxi-icon-' . $oxiid . '', 'background');
                                        echo oxi_addons_adm_help_number('oxi-addons-icon-border-radius', $styledata[27], '1', 'Border Radius', 'Set Icon Border Radius', 'true', '.oxi-addons-container .oxi-icon-' . $oxiid . '', 'border-radius');
                                        echo oxi_addons_adm_help_number_double_dtm('oxi_addons-icon-margin-top', $styledata[7], $styledata[8], $styledata[9], 'oxi_addons-icon-margin-left', $styledata[11], $styledata[12], $styledata[13], '1', 'Margin', 'Set Your Icon  Margin Top Bottom and Left Right', 'true', '.oxi-addons-container .oxi-icon-' . $oxiid . '', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-icon-hover-color', $styledata[31], '', 'Color', 'Select Your Icon Hover Color', 'false', '.oxi-addons-container .oxi-icon-' . $oxiid . ':hover  .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-icon-hover-bg-color', $styledata[33], 'rgba', 'Background Color', 'Select Your Icon Hover Background Color', 'false', '.oxi-addons-container .oxi-icon-' . $oxiid . ':hover', 'background');
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-icon-padding', $styledata[35], $styledata[36], $styledata[37], 1, 'Padding', 'Your Icon Padding for Border with Responsive Size', 'true', '.oxi-addons-container .oxi-icon-' . $oxiid . ':after', 'padding');
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-icon-border', $styledata[39], $styledata[40], $styledata[41], 1, 'Border', 'Your Icon Border with Responsive Size', 'true', '.oxi-addons-container .oxi-icon-' . $oxiid . ':after', 'box-shadow');
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
                echo oxi_addons_list_rearrange('Icon Effect Rearrange', $listdata, 1, 'icon');
                ?>
            </div>
            <div class="oxi-addons-style-left-preview">
                <div class="oxi-addons-style-left-preview-heading">
                    <div class="oxi-addons-style-left-preview-heading-left">
                        Preview
                    </div>
                    <div class="oxi-addons-style-left-preview-heading-right">
                        <?php echo oxi_addons_adm_help_preview_color($styledata[29]); ?> 
                    </div>
                </div>
                <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                    <?php echo oxi_icon_effects_style_3_shortcode($style, $listdata, 'admin') ?>
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
                    echo oxi_addons_adm_help_textbox('oxi_addons-icon-class', $listitemdata[1], 'Font-Awesome', 'Write Your font awesome class or full tag');
                    echo oxi_addons_adm_help_textbox('oxi_addons-icon-id', $listitemdata[3], 'Button ID', 'Write If you want to Add any ID into Your Icon');
                    echo oxi_addons_adm_help_textbox('oxi_addons-icon-link', $listitemdata[5], 'Desire Link', 'Write If you want to Add and Link into Your Icon');
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

<script>
    jQuery(document).ready(function () {
        jQuery("#oxi_addons-icon-width").on("change", function () {
            var data = jQuery(this).val();
            jQuery('<style type="text/css">#oxi-addons-preview-data .oxi-addons-container .oxi-icon-<?php echo $oxiid; ?>{height:  ' + data + 'px; } </style>').appendTo("#oxi-addons-preview-data");
            jQuery('<style type="text/css">#oxi-addons-preview-data .oxi-addons-container .oxi-icon-<?php echo $oxiid; ?>:hover{height:  ' + data + 'px; max-width: ' + data + 'px; } </style>').appendTo("#oxi-addons-preview-data");
        });
        jQuery("#oxi_addons-icon-border").on("change", function () {
            var data = jQuery(this).val();
            var color = jQuery("#oxi_addons-icon-hover-bg-color").val();
            jQuery('<style type="text/css">#oxi-addons-preview-data  .oxi-addons-container .oxi-icon-<?php echo $oxiid; ?>:after{ box-shadow: 0 0 0   ' + data + 'px '+color+'; } </style>').appendTo("#oxi-addons-preview-data");
        });
    });
</script>