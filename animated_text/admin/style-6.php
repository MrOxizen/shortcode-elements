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
    if (!wp_verify_nonce($nonce, 'oxi-addons-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . 'oxi-addons-animat-time |' . sanitize_text_field($_POST['oxi-addons-animat-time']) . '|'
                . 'oxi-addons-animat |' . sanitize_text_field($_POST['oxi-addons-animat']) . '|'
                . 'oxi-addons-animat-stroke-size|' . sanitize_text_field($_POST['oxi-addons-animat-stroke-size']) . '|'
                . 'oxi-addons-text-1st-stroke-color |' . sanitize_hex_color($_POST['oxi-addons-text-1st-stroke-color']) . '|'
                . 'oxi-addons-text-2nd-stroke-color |' . sanitize_hex_color($_POST['oxi-addons-text-2nd-stroke-color']) . '|'
                . 'oxi-addons-text-3rd-stroke-color |' . sanitize_hex_color($_POST['oxi-addons-text-3rd-stroke-color']) . '|'
                . 'oxi-addons-text-4th-stroke-color |' . sanitize_hex_color($_POST['oxi-addons-text-4th-stroke-color']) . '|'
                . 'oxi-addons-text-5th-stroke-color |' . sanitize_hex_color($_POST['oxi-addons-text-5th-stroke-color']) . '|'
                . '||||||||||||||||'
                . 'oxi-addons-text-1st-size |' . sanitize_text_field($_POST['oxi-addons-text-1st-size']) . '|'
                . 'oxi-addons-animat-margin-top|' . sanitize_text_field($_POST['oxi-addons-animat-margin-top']) . '|'
                . 'oxi-addons-animat-margin-bottom|' . sanitize_text_field($_POST['oxi-addons-animat-margin-bottom']) . '|'
                . 'oxi-addons-text-2nd-size |' . sanitize_text_field($_POST['oxi-addons-text-2nd-size']) . '|'
                . '||'
                . '||'
                . '||#||  ||#||'
                . 'oxi-addons-text-1st ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-text-1st']) . '||#||'
                . 'oxi-addons-text-2nd ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-text-2nd']) . '||#||'
                . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
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
                        <div class="oxi-addons-tabs-content-tabs active">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('oxi-addons-animat', $styledata[5], 'Yes', 'dure giya mor', 'No', 'stroke-offset', 'Disable Animation?', 'Wanna Animation or Not');
                                        echo oxi_addons_adm_help_number("oxi-addons-animat-time", $styledata[3], 1, "Speed", "Set text animat Speed", " ");
                                        echo oxi_addons_adm_help_number("oxi-addons-animat-stroke-size", $styledata[7], 1, "Stroke Width", "Set text stroke width", " ");
                                        echo oxi_addons_adm_help_number_double('oxi-addons-animat-margin-top', $styledata[37], 'oxi-addons-animat-margin-bottom', $styledata[39], 0.1, 'Margin Top Bottom', 'Set Margin top Bottom to SVG text', false, '.oxi-addons-animet-text-' . $oxiid . ' svg', 'margin-top', '.oxi-addons-animet-text-' . $oxiid . ' svg', 'margin-bottom', '%');
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Text Settings & Stroke Colors
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi-addons-text-1st-stroke-color', $styledata[9], '', '1st Color', 'Set your main text color', '');
                                        echo oxi_addons_adm_help_MiniColor('oxi-addons-text-2nd-stroke-color', $styledata[11], '', '2nd Color', 'Set your main text color', '');
                                        echo oxi_addons_adm_help_MiniColor('oxi-addons-text-3rd-stroke-color', $styledata[13], '', '3rd Color', 'Set your main text color', '');
                                        echo oxi_addons_adm_help_MiniColor('oxi-addons-text-4th-stroke-color', $styledata[15], '', '4th Color', 'Set your main text color', '');
                                        echo oxi_addons_adm_help_MiniColor('oxi-addons-text-5th-stroke-color', $styledata[17], '', '5th Color', 'Set your main text color', '');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        First Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('oxi-addons-text-1st', $stylefiles[3], 'Main Text', 'Write Wour mani animet text');
                                        echo oxi_addons_adm_help_number('oxi-addons-text-1st-size', $styledata[35], .1, 'Font Size', 'Set your font size with em value. Max value 0.1 to 1.00');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Second Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('oxi-addons-text-2nd', $stylefiles[5], 'Main Text', 'Write Wour mani animet text');
                                        echo oxi_addons_adm_help_number('oxi-addons-text-2nd-size', $styledata[41], .1, 'Font Size', 'Set your font size with em value. Max value 0.1 to 1.00');
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
                            <?php wp_nonce_field("oxi-addons-nonce") ?>
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
                <div class="oxi-addons-preview-data oxi-addons-center" id="oxi-addons-preview-data">
                    <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
