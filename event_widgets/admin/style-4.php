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
$listitemdata = array("", "10.00AM - 12.00PM", "", "Business World Event Introduction ", "", "By <span>Conference</span> , Ceo of LogicHunt", "", "http://logichunt.net/demo/wordpress/emeet/wp-content/uploads/2018/07/speaker3-150x150.jpg", "", "<span>Location:</span> Hall 1, Building A , Golden Street <span>, Southafrica</span>", "", "Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddIconBoxes-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-G-BG') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-G-M') . ''
            . '' . OxiAddonsBGImageSanitize('OxiAddonsEW-IB-BG') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-IB-P') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsEW-B-Shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsEW-animation') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsEW-TB-FS') . ''
            . ' OxiAddonsEW-TB-C |' . sanitize_text_field($_POST['OxiAddonsEW-TB-C']) . '|'
            . ' OxiAddonsEW-TB-BG |' . sanitize_text_field($_POST['OxiAddonsEW-TB-BG']) . '|'
            . '||||'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-TB-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-TB-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-TB-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-T-FS') . ''
            . ' OxiAddonsEW-T-C |' . sanitize_text_field($_POST['OxiAddonsEW-T-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-T-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-T-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-A-FS') . ''
            . ' OxiAddonsEW-A-C |' . sanitize_text_field($_POST['OxiAddonsEW-A-C']) . '|'
            . ' OxiAddonsEW-A-SC |' . sanitize_text_field($_POST['OxiAddonsEW-A-SC']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-A-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-A-P') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsEW-AI-WH') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsEW-AI-B') . ''
            . ' OxiAddonsEW-AI-B-C |' . sanitize_text_field($_POST['OxiAddonsEW-AI-B-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-AI-BR') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-IT-FS') . ''
            . ' OxiAddonsEW-IT-C |' . sanitize_text_field($_POST['OxiAddonsEW-IT-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-IT') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-IT-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsEW-L-FS') . ''
            . ' OxiAddonsEW-L-C |' . sanitize_text_field($_POST['OxiAddonsEW-L-C']) . '|'
            . ' OxiAddonsEW-L-SC |' . sanitize_text_field($_POST['OxiAddonsEW-L-SC']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-L') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-L-P') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsEW-TB-F') . ''
            . ' OxiAddonsEW-AI-Position |' . sanitize_text_field($_POST['OxiAddonsEW-AI-Position']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsEW-AI-M') . ''
            . ' OxiAddonsEW-G-initial-open |' . sanitize_text_field($_POST['OxiAddonsEW-G-initial-open']) . '|'
            . '|';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int)$_POST['oxilistid'];
        $data = 'OxiAddonsEW-M-time ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-time']) . '||#||'
            . ' OxiAddonsEW-M-title ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-title']) . '||#|| '
            . ' OxiAddonsEW-M-author ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-author']) . '||#|| '
            . ' OxiAddonsEW-M-image||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsEW-M-image']) . '||#|| '
            . ' OxiAddonsEW-M-location||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-location']) . '||#|| '
            . ' OxiAddonsEW-M-text||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsEW-M-text']) . '||#|| '
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
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsAdminInitialOpen('OxiAddonsEW-G-initial-open', $styledata[295], 'Initial Opening', 'Set Which Events You want to Open Initially', 'false');
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-G-BG', $styledata, 3, 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-row', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-P', 7, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-G-M', 23, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-EV-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Info Body
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsEW-IB-BG', $styledata, 39, 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-head', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-IB-P', 43, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addons-EV-' . $oxiid . '  .oxi-addons-EV-title', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsEW-B-Shadow', 59, $styledata, 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsEW-animation', 65, $styledata, 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Time Body
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-TB-FS', $styledata[69], $styledata[70], $styledata[71], '1', 'Font Size', 'Set Your Time Font Size', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-time-body', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-TB-C', $styledata[73], '', 'Color', 'Set Your Time Font Color', '', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-time-body', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-TB-BG', $styledata[75], '', 'Background Color', 'Set Your Time Background Color', '', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-time-body', 'background');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-TB-F', 271, $styledata, 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-time-body');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-TB-BR', 81, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-time-body', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-TB-P', 97, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-time-body', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-TB-M', 113, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-time-body', 'margin');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Title
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-T-FS', $styledata[129], $styledata[130], $styledata[131], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-EV-' . $oxiid . '  .oxi-addons-EV-title-text', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-T-C', $styledata[133], '', 'Color', 'Set Your Heading Font Color', '', '.oxi-addons-EV-' . $oxiid . '  .oxi-addons-EV-title-text', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-T-F', 135, $styledata, 'true', '.oxi-addons-EV-' . $oxiid . '  .oxi-addons-EV-title-text');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-T-P', 141, $styledata, '1', 'Padding', 'Set your Heading Text Padding', 'true', '.oxi-addons-EV-' . $oxiid . '  .oxi-addons-EV-title-text', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Author
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-A-FS', $styledata[157], $styledata[158], $styledata[159], '1', 'Font Size', 'Set Your Author Font Size', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-title-author-info', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-A-C', $styledata[161], '', 'Color', 'Set Your Author Font Color', '', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-title-author-info', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-A-SC', $styledata[163], '', 'Second Color', 'Set Your Author Name Font Color', '', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-title-author-info span', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-A-F', 165, $styledata, 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-title-author-info');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-A-P', 171, $styledata, '1', 'Padding', 'Set your Author Text Padding', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-title-author-info', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Author Image
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('OxiAddonsEW-AI-Position', $styledata[277], 'Left', 'left', 'Right', 'right', 'Image Position', 'Set Your Image Position as Left or Right', '');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-AI-WH', $styledata[187], $styledata[188], $styledata[189], '1', 'Width Height', 'Set Your Author Image Width Height Size', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-image .oxiimage', 'width');
                                        echo oxi_addons_adm_help_border('OxiAddonsEW-AI-B', $styledata[191], $styledata[192], 'Border', 'Set your Border Size and Type', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-image .oxiimage');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-AI-B-C', $styledata[195], '', 'Border Color', 'Set Your Border  Color', '', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-image .oxiimage', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-AI-BR', 197, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-image .oxiimage', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-AI-M', 279, $styledata, '1', 'Margin', 'Set your Image Margin', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-image', 'padding');
                                        ?>
                                    </div>
                                </div>

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Info Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-IT-FS', $styledata[213], $styledata[214], $styledata[215], '1', 'Font Size', 'Set Your Info Text Font Size', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-info-body p', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-IT-C', $styledata[217], '', 'Color', 'Set Your Info Text Font Color', '', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-info-body p', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-IT', 219, $styledata, 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-info-body p');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-IT-P', 225, $styledata, '1', 'Padding', 'Set your Info Text Padding', 'true', '.oxi-addons-EV-' . $oxiid . ' .oxi-addons-EV-info-body', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Location
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsEW-L-FS', $styledata[241], $styledata[242], $styledata[243], '1', 'Font Size', 'Set Your Info Text Font Size', 'true', '.oxi-addons-EV-' . $oxiid . '  .oxi-addons-EV-info-location', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-L-C', $styledata[245], '', 'Color', 'Set Your Info Text Font Color', '', '.oxi-addons-EV-' . $oxiid . '  .oxi-addons-EV-info-location', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsEW-L-SC', $styledata[247], '', 'Second Color', 'Set Your Info Text Font Color', '', '.oxi-addons-EV-' . $oxiid . '  .oxi-addons-EV-info-location span', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsEW-L', 249, $styledata, 'true', '.oxi-addons-EV-' . $oxiid . '  .oxi-addons-EV-info-location');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsEW-L-P', 255, $styledata, '1', 'Padding', 'Set your Info Text Padding', 'true', '.oxi-addons-EV-' . $oxiid . '  .oxi-addons-EV-info-location', 'padding');
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
                echo oxi_addons_quick_tutorials('yPu6qV5byu4');
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
                        <?php echo oxi_event_widgets_style_4_shortcode($style, $listdata, 'admin'); ?>
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
                    <div class="oxi-addons-col-1">
                        <div class="oxi-addons-content-div">
                            <div class="oxi-head">
                                Event Data
                            </div>
                            <div class="oxi-addons-content-div-body">
                                <?php
                                echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M-time', $listitemdata[1], 'Time', 'Set your event Time With Text', 'false');
                                echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M-title', $listitemdata[3], 'Title', 'Set your event Title', 'false');
                                echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M-author', $listitemdata[5], 'Author', 'Set your event Author Info', 'false');
                                echo oxi_addons_adm_help_modal_second_image_upload('OxiAddonsEW-M-image', $listitemdata[7], 'User Image', 'Set Author Image For this Event', '');
                                echo oxi_addons_adm_help_modal_textbox('OxiAddonsEW-M-location', $listitemdata[9], 'Location', 'Set Author Image For this Event', '');
                                ?>
                            </div>
                        </div>
                        <div class="oxi-addons-content-div">
                            <div class="oxi-head">
                                Event Info
                            </div>
                            <div class="oxi-addons-content-div-body">
                                <?php
                                echo oxi_addons_adm_help_model_rich_text_box('OxiAddonsEW-M-text', $listitemdata[11]);
                                ?>
                            </div>
                        </div>
                    </div>
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