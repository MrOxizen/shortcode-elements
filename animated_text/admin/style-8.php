<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '||||'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAnimation-G-Padding') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAnimation-font-size') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAnimation-font-family') . ''
            . ' OxiAddonsAnimation-color-first |' . sanitize_hex_color($_POST['OxiAddonsAnimation-color-first']) . '|'
            . ' OxiAddonsAnimation-color-second |' . sanitize_hex_color($_POST['OxiAddonsAnimation-color-second']) . '|'
            . ' OxiAddonsAnimation-color-third |' . sanitize_hex_color($_POST['OxiAddonsAnimation-color-third']) . '|'
            . ' OxiAddonsAnimation-color-fourth |' . sanitize_hex_color($_POST['OxiAddonsAnimation-color-fourth']) . '|'
            . ' OxiAddonsAnimation-color-fifth |' . sanitize_hex_color($_POST['OxiAddonsAnimation-color-fifth']) . '|'

            . '||#||  ||#||'
            . 'OxiAddonsAnimation-animate-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAnimation-animate-text']) . '||#||'
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
                                         echo oxi_addons_adm_help_padding_margin('OxiAddonsAnimation-G-Padding', 7, $styledata, 1, 'Padding', 'Set Text Padding', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Text Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsAnimation-animate-text', $stylefiles[3], 'Main Text', 'Write Wour main animate text');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAnimation-font-size', $styledata[23], $styledata[24], $styledata[25], 1, 'Font Size', 'set your Animation Text Font Size', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-h1', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsAnimation-font-family', 27, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-h1');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Text Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAnimation-color-first', $styledata[33], '', 'First Color', 'set your Animation First  Color', 'false', '', '');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAnimation-color-second', $styledata[35], '', 'Second Color', 'set your Animation Second Color', 'true', '', '');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAnimation-color-third', $styledata[37], '', 'Third Color', 'set your Animation Third Color', 'true', '', '');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAnimation-color-fourth', $styledata[39], '', 'Fourth Color', 'set your Animation Fourth Color', 'true', '', '');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAnimation-color-fifth', $styledata[41], '', 'Fifth Color', 'set your Animation Fifth Color', 'true', '', '');
                                        $NOJS = array(
                                            array('OxiAddonsAnimation-color-first', 'First color'),
                                            array('OxiAddonsAnimation-color-second', 'Second color'),
                                            array('OxiAddonsAnimation-color-third', 'Third color'),
                                            array('OxiAddonsAnimation-color-fourth', 'Fourth color'),
                                            array('OxiAddonsAnimation-color-fifth', 'Fifth color'),
                                        );
                                        echo OxiAddonsADMHelpNoJquery($NOJS);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
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