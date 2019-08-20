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
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddcarousel-rows') . ''
                . 'oxi_addons-auto-play |' . sanitize_text_field($_POST['oxi_addons-auto-play']) . '|'
                . 'oxi_addons-auto-play-time |' . sanitize_text_field($_POST['oxi_addons-auto-play-time']) . '|'
                . 'oxi_addons-center-mode |' . sanitize_text_field($_POST['oxi_addons-center-mode']) . '|'
                . 'oxi_addons-pause-in-hover |' . sanitize_text_field($_POST['oxi_addons-pause-in-hover']) . '|'
                . 'oxi_addons-looping |' . sanitize_text_field($_POST['oxi_addons-looping']) . '|'
                . 'oxi_addons-mouse-draggable |' . sanitize_text_field($_POST['oxi_addons-mouse-draggable']) . '|'
                . 'oxi_addons-right-to-left |' . sanitize_text_field($_POST['oxi_addons-right-to-left']) . '|'
                . 'oxi_addons-content-position |' . sanitize_text_field($_POST['oxi_addons-content-position']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-M') . ''
                . 'oxi_addons-pag |false|'
                . '||||'
                . '||||'
                . '||||'
                . '||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||'
                . 'oxi_addons-nav |false|'
                . ''
                . '||'
                . '||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||'
              
                . ' |' . sanitize_text_field($_POST['oxi_addons-marge']) . '|'
                . ' |' . sanitize_text_field($_POST['oxi_addons-stagepadding']) . '|'
                . ' |' . sanitize_text_field($_POST['oxi_addons-auto-height']) . '|'
                . '||'
                . '||'
                . '||'
                . '||'
                . '||'
                . '||||||||||||||||'
                . '||#||||#||||#||'
                . '||#||||#|| '
                . '||#|| ||#|| ';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = ' oxi_addons-carousel-data ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-carousel-data']) . '||#||'
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
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Basic Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddcarousel-rows', $styledata, 3, 'false', '');
                                     ?>
                                        <div class="form-group row" >
                                            <label for="oxi_addons-content-position" class="col-sm-6 control-label" oxi-addons-tooltip="Select Your carousel Content Position">Content Position</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="oxi_addons-content-position" name="oxi_addons-content-position">
                                                    <option value="flex-start" <?php
                                                    if ($styledata[21] == 'flex-start') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Top</option>
                                                    <option value="center"  <?php
                                                    if ($styledata[21] == 'center') {
                                                        echo 'selected';
                                                    }
                                                    ?> >Middle</option>
                                                    <option value="flex-end"  <?php
                                                    if ($styledata[21] == 'flex-end') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Bottom</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons-M', 23, $styledata, 1, 'Margin', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                        ?>
                                    </div>                                               
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                              <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Condition
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('oxi_addons-auto-play', $styledata[7], 'On', 'true', 'Off', 'false', 'Auto Play', 'Set Your Carousel Autoplay', '');
                                        echo oxi_addons_adm_help_number('oxi_addons-auto-play-time', $styledata[9], 0.01, 'Auto Play Duration', 'Set Your Carousel Auto Play Duration', 'true', '', '');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-center-mode', $styledata[11], 'On', 'true', 'Off', 'false', 'Center Mode', 'Set Your Carousel Center Mode Yes nor Not', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-pause-in-hover', $styledata[13], 'On', 'true', 'Off', 'false', 'Pause in Hover', 'Set Your Carousel Pause in Hover', 'false');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-looping', $styledata[15], 'On', 'true', 'Off', 'false', 'Infinite Loop', 'Off/On infinite loop Mode', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-marge', $styledata[233], 'On', 'true', 'Off', 'false', 'Marge', 'Set Your Carousel Marge', 'true');
                                        echo oxi_addons_adm_help_number('oxi_addons-stagepadding', $styledata[235], 1, 'Stage padding', 'Set Your Carousel Stage Padding', 'true', '', '');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-auto-height', $styledata[237], 'On', 'true', 'Off', 'false', 'Auto Height', 'Auto Height True False', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-mouse-draggable', $styledata[17], 'On', 'true', 'Off', 'false', 'Mouse Draggable', 'Mouse Draggable True False', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-right-to-left', $styledata[19], 'Yes', 'true', 'No', 'false', 'Right to left', 'yes if you want carousel Right to Left Direction', 'true');
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
                echo oxi_addons_list_modal_open('Add New Data');
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Carousel Rearrange', $listdata, 1, 'title');
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
                    <?php echo oxi_carousel_style_1_shortcode($style, $listdata, 'admin') ?>
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
                    <h4 class="modal-title">Carousel Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_form_textarea('oxi_addons-carousel-data', $listitemdata[1], 'Add Shortcode', 'Add yout Content or Shortcode here');
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
