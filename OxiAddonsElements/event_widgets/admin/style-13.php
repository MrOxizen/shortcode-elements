<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
$listid = '';
$listitemdata = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddIconBoxes-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsBanner-G-border') . ''
            . ' OxiAddonsBanner-G-border-width |' . sanitize_text_field($_POST['OxiAddonsBanner-G-border-width']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-M') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-animation') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-MO-FS') . ''
            . ' OxiAddonsEW-MO-C |' . sanitize_hex_color($_POST['OxiAddonsEW-MO-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-MO-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-MO-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-Day-FS') . ''
            . ' OxiAddonsEW-Day-C |' . sanitize_hex_color($_POST['OxiAddonsEW-Day-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-Day-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-Day-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-Time-FS') . ''
            . ' OxiAddonsEW-Time-C |' . sanitize_hex_color($_POST['OxiAddonsEW-Time-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-Time-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-Time-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-LS-FS') . ''
            . ' OxiAddonsEW-LS-C |' . sanitize_hex_color($_POST['OxiAddonsEW-LS-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-LS-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-LS-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-Line-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-Line-H') . ''
            . ' OxiAddonsEW-Line-BG |' . sanitize_text_field($_POST['OxiAddonsEW-Line-BG']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-T-FS') . ''
            . ' OxiAddonsEW-T-C |' . sanitize_hex_color($_POST['OxiAddonsEW-T-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-T-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-T-P') . ''
            . ' OxiAddonsEW-T-HB-C |' . sanitize_hex_color($_POST['OxiAddonsEW-T-HB-C']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-SD-FS') . ''
            . ' OxiAddonsEW-SD-C |' . sanitize_hex_color($_POST['OxiAddonsEW-SD-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-SD-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-SD-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-image-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-image-H') . ''
            . ' OxiAddonsEW-Line-topbottom |' . sanitize_text_field($_POST['OxiAddonsEW-Line-topbottom']) . '|'
            . ' OxiAddonsEW-BG |' . sanitize_text_field($_POST['OxiAddonsEW-BG']) . '|'
            . '||#||'
            . ' OxiAddonsEW-Time-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsEW-Time-I']) . '||#|| '
            . ' OxiAddonsEW-LS-I ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsEW-LS-I']) . '||#|| '
            . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int)$_POST['oxilistid'];
        $data = '||#||  ||#||'
            . ' OxiAddonsEW-M-time ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-time']) . '||#||'
            . ' OxiAddonsEW-M-title ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-title']) . '||#|| '
            . ' OxiAddonsEW-M-image ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-M-image']) . '||#|| '
            . ' OxiAddonsEW-M-location ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-location']) . '||#|| '
            . ' OxiAddonsEW-M-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-text']) . '||#|| '
            . ' OxiAddonsEW-M-month ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-month']) . '||#||'
            . ' OxiAddonsEW-M-day ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-day']) . '||#||'
            . ' OxiAddonsEW-M-link ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-link']) . '||#||'
            . '  ||#||  ||#||'
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
        $item_id = (int)$_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileEdit' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
        $data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_list WHERE id = %d ", $item_id), ARRAY_A);
        $listitemdata = explode('||#||', $data['files']);
        $listid = $data['id'];
        echo '<script type="text/javascript"> jQuery(document).ready(function () {setTimeout(function() { jQuery("#oxi-addons-list-data-modal").modal("show")  }, 500); });</script>';
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER BY id ASC", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
// echo '<pre>';
// print_r($styledata);
// echo '</pre>';
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
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-BG', $styledata[234], '', 'Background Color', 'Set Line Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-content-wrapper .oxi-addons-line::before', 'background');
                                        echo OxiAddonsADMhelpBorder('OxiAddonsBanner-G-border', 3, $styledata, 'false', '', '');
                                        echo oxi_addons_adm_help_number('OxiAddonsBanner-G-border-width', $styledata[6], '0.5', 'Border Top', 'Set Border top Width', 'true', '', '');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-P', 8, $styledata, '1', 'Padding', 'Set your body Padding', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-M', 24, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-event-main', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-animation', 40, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-events');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Month Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-MO-FS', $styledata[44], $styledata[45], $styledata[46], '1', 'Font Size', 'Set Month Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-month', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-MO-C', $styledata[48], '', 'Color', 'Set Your Month Font Color', '', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-month', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-MO-F', 50, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-month');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-MO-P', 56, $styledata, '1', 'Padding', 'Set your Month Body Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-month', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Day Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-Day-FS', $styledata[72], $styledata[73], $styledata[74], '1', 'Font Size', 'Set Your Day Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-day', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-Day-C', $styledata[76], '', 'Color', 'Set Your Day Font Color', '', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-day', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-Day-F', 78, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-day');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-Day-P', 84, $styledata, '1', 'Padding', 'Set your Day body Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-day', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Time Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsEW-Time-I', $stylefiles[2], 'Icon', 'Set FontAwesome Icon For Time', 'false');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-Time-FS', $styledata[100], $styledata[101], $styledata[102], '1', 'Font Size', 'Set Your Time Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-time', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-Time-C', $styledata[104], '', 'Color', 'Set Your Time Font Color', '', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-time', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-Time-F', 106, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-time-text');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-Time-P', 112, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-time', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Location Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsEW-LS-I', $stylefiles[4], 'Icon', 'Set FontAwesome Icon For Location', 'false');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-LS-FS', $styledata[128], $styledata[129], $styledata[130], '1', 'Font Size', 'Set Your Location Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-location', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-LS-C', $styledata[132], '', 'Color', 'Set Your Location Font Color', '', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-location', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-LS-F', 134, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-location-text');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-LS-P', 140, $styledata, '1', 'Padding', 'Set your Location body Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-location', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Line Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_double_dtm('OxiAddonsEW-Line-W', $styledata[156], $styledata[157], $styledata[158], 'OxiAddonsEW-Line-H', $styledata[160], $styledata[161], $styledata[162], 1, 'Width Height', 'Set Line width and height | example: width:5px; height: 100px', 'true');
                                        echo oxi_addons_adm_help_number('OxiAddonsEW-Line-topbottom', $styledata[232], 1, 'Top Bottom', 'Set Line Position Top bottom positive value and negative value', 'false');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-Line-BG', $styledata[164], '', 'Color', 'Set Line Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-day::after', 'background');
                                        $NOJS = array(
                                            array('OxiAddonsEW-Line-W', 'Width'),
                                            array('OxiAddonsEW-Line-H', 'Height')
                                        );
                                        echo OxiAddonsADMHelpNoJquery($NOJS);
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Title Link Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-T-FS', $styledata[166], $styledata[167], $styledata[168], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-T-C', $styledata[170], '', 'Color', 'Set Your Heading Font Color', '', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-T-F', 172, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-T-P', 178, $styledata, '1', 'Padding', 'Set your Heading Text Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'padding');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Title Link Hover
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-T-HB-C', $styledata[194], '', 'Hover Color', 'Set Your Heading Font Color', '', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title .oxi-link:hover', 'color');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Short Details Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-SD-FS', $styledata[196], $styledata[197], $styledata[198], '1', 'Font Size', 'Set Your Info Text Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-details', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-SD-C', $styledata[200], '', 'Color', 'Set Your Info Text Font Color', '', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-details', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-SD-F', 202, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-details');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-SD-P', 208, $styledata, '1', 'Padding', 'Set your Info Text Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-details', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Image Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_double_dtm('OxiAddonsEW-image-W', $styledata[224], $styledata[225], $styledata[226], 'OxiAddonsEW-image-H', $styledata[228], $styledata[229], $styledata[230], 1, 'Width Height', 'Set Line width and height | example: width:5px; height: 100%', 'false');
                                        $NOJS = array(
                                            array('OxiAddonsEW-image-W', 'Width'),
                                            array('OxiAddonsEW-image-H', 'Height')
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
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <?php wp_nonce_field("OxiAddIconBoxes-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Event Widgets Rearrange', $listdata, 7, 'image');
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
                <div class="oxi-addons-style-left-preview" style="margin-top: 0; border-top: 0px;">
                    <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                        <?php echo oxi_event_widgets_style_13_shortcode($style, $listdata, 'admin'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M-time', $listitemdata[3], 'Time', 'Set your event Time With Text', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M-location', $listitemdata[9], 'Location', 'Set Event Location', '');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M-month', $listitemdata[13], 'Month', 'Set your event Month', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M-day', $listitemdata[15], 'Day', 'Set your event Day', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M-title', $listitemdata[5], 'Title', 'Set your event Title', 'false');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M-link', $listitemdata[17], 'Title Link', 'Set your event Title Link', 'false');
                    echo oxi_addons_adm_help_modal_textarea('OxiAddonsEW-M-text', $listitemdata[11], 'Short Details', 'Set Event Text Area', '');
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAddonsEW-M-image', $listitemdata[7], 'Event Image', 'Set Event Image');
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