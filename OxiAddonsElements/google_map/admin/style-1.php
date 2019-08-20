<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddDropCaps-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAdd_gmap_width') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAdd_gmap_height') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gmap_padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdd_gmap_margin') . ''
                . '||||'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxiAdd_gMap_linfo_FS') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAdd_gMap_animation') . ''
                . 'OxiAdd_gMap_zoom_level |' . sanitize_text_field($_POST['OxiAdd_gMap_zoom_level']) . '|'
                . 'OxiAdd_gMap_location_lat |' . sanitize_text_field($_POST['OxiAdd_gMap_location_lat']) . '|'
                . 'OxiAdd_gMap_location_lng |' . sanitize_text_field($_POST['OxiAdd_gMap_location_lng']) . '|'
                . 'OxiAdd_gMap_Api_Key |' . sanitize_text_field($_POST['OxiAdd_gMap_Api_Key']) . '|'
                . 'OxiAdd_gMap_marker_animet |' . sanitize_text_field($_POST['OxiAdd_gMap_marker_animet']) . '|'
                . 'Oxi_add_gMap_info_text_Font_size |' . sanitize_text_field($_POST['Oxi_add_gMap_info_text_Font_size']) . '|'
                . 'oxi_add_gMap_info_window_width |' . sanitize_text_field($_POST['oxi_add_gMap_info_window_width']) . '|'
                . 'oxi_add_gMap_info_window_height |' . sanitize_text_field($_POST['oxi_add_gMap_info_window_height']) . '|'
                . 'Oxi_add_gMap_info_text_color |' . sanitize_hex_color($_POST['Oxi_add_gMap_info_text_color']) . '|'

                . '|||||||||||'
                . '|||||||||||'
                . '||#||  ||#||'
                . '||#||  ||#||'
                . 'OxiAdd_place_title||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAdd_place_title']) . '||#||'
                . 'OxiAdd_gMap_location_info||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAdd_gMap_location_info']) . '||#||'
                . '||#||  ||#||'
                . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);

//echo '<pre>';
//print_r($styledata);
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
                                        echo oxi_addons_adm_help_textbox('OxiAdd_gMap_location_lat', $styledata[59], 'Latitude', 'Set your location latitude', 'false', '');
                                        echo oxi_addons_adm_help_textbox('OxiAdd_gMap_location_lng', $styledata[61], 'Longitude', 'Set your location longitude', 'false', '');
                                        echo oxi_addons_adm_help_textbox('OxiAdd_gMap_Api_Key', $styledata[63], 'Api Key', 'Set your Google Maps Api Key', 'false', '');
                                        echo oxi_addons_adm_help_number_dtm('OxiAdd_gmap_width', $styledata[3], $styledata[4], $styledata[5], 1, 'Width', 'Set your maps Width', 'false', '');
                                        echo oxi_addons_adm_help_number_dtm('OxiAdd_gmap_height', $styledata[7], $styledata[8], $styledata[9], 1, 'Height', 'Set your maps Width', 'false', '');
                                        echo oxi_addons_adm_help_padding_margin('OxiAdd_gmap_padding', 11, $styledata, 1, 'Padding', 'Set Your Button Padding Top Bottom and Left ', 'true', '.oxi-addons-drop-caps-' . $oxiid . '', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAdd_gmap_margin', 27, $styledata, 1, 'Margin', 'Set Your Button  Margin Top Bottom and Left Right', 'true', '.oxi-addons-drop-caps-' . $oxiid . '', 'margin');
                                        ?>
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAdd_gMap_animation', 53, $styledata, 'true', '.oxi-addons-drop-caps-' . $oxiid . '');
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
                                        echo oxi_addons_adm_help_textbox('OxiAdd_place_title', $stylefiles[5], 'Place Title', 'Write your Location title','false','');
                                        echo oxi_addons_adm_help_number('OxiAdd_gMap_zoom_level', $styledata[57], 1, 'Zoom Level', 'Set your maps zoom level', 'false', '', '');
                                        echo OxiAddonsADMHelpFontSettings('oxiAdd_gMap_linfo_FS', 47, $styledata, 'true', '');
                                        echo oxi_addons_adm_help_true_false('OxiAdd_gMap_marker_animet', $styledata[65], 'Yes', 1, 'No', 2, 'Marker Animation', 'Select the ', 'true');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Info Window
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_form_textarea('OxiAdd_gMap_location_info', $stylefiles[7], 'Location Information', 'Give information about your location information', 'false','');
                                        echo oxi_addons_adm_help_number('Oxi_add_gMap_info_text_Font_size', $styledata[67], 1, 'Font Size', 'Set your info window text size', 'true', '', '');
                                        echo oxi_addons_adm_help_number_double('oxi_add_gMap_info_window_width', $styledata[69], 'oxi_add_gMap_info_window_height', $styledata[71], 1, 'Width & Height', 'Set your info window width & height', 'true', '');
                                        echo oxi_addons_adm_help_MiniColor('Oxi_add_gMap_info_text_color', $styledata[73], '', 'Color', 'Set info-window text color', 'false', '', '');
                                        echo OxiAddonsADMHelpFontSettings('oxiAdd_gMap_linfo_FS', 47, $styledata, 'true', '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("OxiAddDropCaps-nonce") ?>
                        </div>
                    </div> 
                </form>

            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
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
                <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$jquery .= "jQuery('#oxi-addons-form-submit').submit(function (e) {
            var API = jQuery('#OxiAdd_gMap_Api_Key').val();
          
            if (API === '' ) {
                alert('Kindly Set your Google API Key !');
                e.preventDefault();
                return false;
            } 
        });";

echo OxiAddonsInlineCSSData($jquery, 'js');


