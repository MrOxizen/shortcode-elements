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
$listitemdata = array("", "", "", "", "", "", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddInfoBanner-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . 'OxiAdd_gMap_Api_Key |' . sanitize_text_field($_POST['OxiAdd_gMap_Api_Key']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAdd_gmap_width') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAdd_gmap_height') . ''
                . '||||||||'
                . '||||||||'
                . '||||||||'
                . '||||||||'
                . '' . oxi_addons_adm_help_animation_senitize('OxiAdd_gMap_animation') . ''
                . 'OxiAdd_gMap_zoom_level |' . sanitize_text_field($_POST['OxiAdd_gMap_zoom_level']) . '|'
                . 'Oxi_add_gMap_info_text_Font_size |' . sanitize_text_field($_POST['Oxi_add_gMap_info_text_Font_size']) . '|'
                . 'oxi_add_gMap_info_window_width |' . sanitize_text_field($_POST['oxi_add_gMap_info_window_width']) . '|'
                . '||'
                . 'Oxi_add_gMap_info_text_color |' . sanitize_hex_color($_POST['Oxi_add_gMap_info_text_color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxiAdd_gMap_linfo_FS') . ''
                . 'oxi-addons-gMaps-theme |' . sanitize_text_field($_POST['oxi-addons-gMaps-theme']) . '|'
                . 'oxi_addons_gMap_DefaultUI|' . sanitize_text_field($_POST['oxi_addons_gMap_DefaultUI']) . '|'
                . '|||||||||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}


if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data =   ' Oxi_add_gMap_Lat ||#||' . OxiAddonsADMHelpTextSenitize($_POST['Oxi_add_gMap_Lat']) . '||#||'
                .' Oxi_add_gMap_lng ||#||' . OxiAddonsADMHelpTextSenitize($_POST['Oxi_add_gMap_lng']) . '||#||'
                .' Oxi_add_gMap_Location_title ||#||' . OxiAddonsADMHelpTextSenitize($_POST['Oxi_add_gMap_Location_title']) . '||#||'
                .' Oxi_add_gMap_Location_information ||#||' . OxiAddonsADMHelpTextSenitize($_POST['Oxi_add_gMap_Location_information']) . '||#||'
                .' Oxi_add_gMap_icon_img ||#||' . OxiAddonsAdminUrlConvert($_POST['Oxi_add_gMap_icon_img']) . '||#||'
                .' Oxi_add_gMap_Location_Name ||#||' . OxiAddonsADMHelpTextSenitize($_POST['Oxi_add_gMap_Location_Name']) . '||#||'
                . ' ||#|| ||#||'
                . ' ||#|| ||#||'
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
if (!empty($_POST['OxiAddonsListFileEditdata']) && is_numeric($_POST['oxi-item-id'])) {
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
                            <div class="oxi-addons-tabs-content-tabs">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAdd_gMap_Api_Key', $styledata[3], 'Api Key', 'Set your Google Maps Api Key', 'false', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gmap_width', $styledata[5], $styledata[6], $styledata[7], 1, 'Width', 'Set your maps Width as a % value', 'false', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdd_gmap_height', $styledata[9], $styledata[10], $styledata[11], 1, 'Height', 'Set your maps Width a px value', 'false', '');
                                            
                                             ?>
                                        </div>                                               
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAdd_gMap_animation', 45, $styledata, 'true', '.oxi-addons-drop-caps-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Maps Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('OxiAdd_gMap_zoom_level', $styledata[49], 1, 'Zoom Level', 'Set your maps zoom level', '', '', '');
                                            echo oxi_addons_adm_help_true_false('oxi_addons_gMap_DefaultUI', $styledata[67], 'No', 'true', 'Yes', 'false', 'Default Map UI', 'Select the Maps UI', 'true');
                                            ?>
                                            <div class=" form-group row">
                                            <label for="oxi-addons-gMaps-theme" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Theme Color ">Color Themes</label>
                                            <div class="col-sm-6 addons-dtm-laptop-lock">
                                                <select class="form-control" id="oxi-addons-gMaps-theme" name="oxi-addons-gMaps-theme">
                                                    <option value="1" <?php selected( $styledata[65], 1 ); ?>>Standard</option>
                                                    <option value="2" <?php selected( $styledata[65], 2 ); ?>>Silver</option>
                                                    <option value="3" <?php selected( $styledata[65], 3 ); ?>>Retro</option>
                                                    <option value="4" <?php selected( $styledata[65], 4 ); ?>>Dark</option>
                                                    <option value="5" <?php selected( $styledata[65], 5 ); ?>>Night</option>
                                                    <option value="6" <?php selected( $styledata[65], 6 ); ?>>Aubergine</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('oxi-addons-gMaps-theme', 'Icon Position'),
                                                )
                                            );
                                        ?>
                                        </div>
                                   
                                        <div class="oxi-head">
                                            Info Window
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('Oxi_add_gMap_info_text_Font_size', $styledata[51], 1, 'Font Size', 'Set your info window text size', 'false', '', '');
                                            echo oxi_addons_adm_help_number('oxi_add_gMap_info_window_width', $styledata[53], 1, 'Width ', 'Set your info window width ', 'true', '');
                                            echo oxi_addons_adm_help_MiniColor('Oxi_add_gMap_info_text_color', $styledata[57], '', 'Color', 'Set info-window text color', 'false', '', '');
                                            echo OxiAddonsADMHelpFontSettings('oxiAdd_gMap_linfo_FS', 59, $styledata, 'true', '');
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
                            <?php wp_nonce_field("OxiAddInfoBanner-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Location List Rearrange', $listdata, 11, 'title');
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
                    <?php echo oxi_google_map_style_3_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('Oxi_add_gMap_Lat', $listitemdata[1], 'Latitude ', 'Set your Latitude');
                    echo oxi_addons_adm_help_textbox('Oxi_add_gMap_lng', $listitemdata[3], 'Longitude', 'Set your Longitude');
                    echo oxi_addons_adm_help_textbox('Oxi_add_gMap_Location_title', $listitemdata[5], 'Title', 'Set your Location Title');
                    echo oxi_addons_adm_help_textbox('Oxi_add_gMap_Location_Name', $listitemdata[11], 'Name', 'Set your Location Name');
                    echo oxi_addons_adm_help_modal_textarea('Oxi_add_gMap_Location_information', $listitemdata[7], 'Information', 'Set your Location Information');
                    echo oxi_addons_adm_help_image_upload('Oxi_add_gMap_icon_img', $listitemdata[9], 'Icon Image', 'Set Your Icon Image');
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
<?php
$jquery .= "jQuery('#oxi-addons-form-submit').submit(function (e) {
            var API = jQuery('#OxiAdd_gMap_Api_Key').val();
          
            if (API === '' || API === 'AIzaSyDd40qP9Qll71WJ0IBZtUrtAs--klcYLNo') {
                alert('Kindly Set your Google API Key !');
                e.preventDefault();
                return false;
            } 
        });";

echo OxiAddonsInlineCSSData($jquery, 'js');


