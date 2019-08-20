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
$listitemdata = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$listid = '';
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-G-Max-Width') . ''
            . 'OxiAddonsPriceTable-G-BG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-G-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsPriceTable-G-BS') . ''
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsPriceTable-G-Animation') . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-feature-FS') . ''
            . ' OxiAddonsPriceTable-feature-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-feature-C']) . '|'
            . ' OxiAddonsPriceTable-feature-Second-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-feature-Second-C']) . '|'
            . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsPriceTable-feature-CT') . '|'
            . ' OxiAddonsPriceTable-feature-Border-Top |' . sanitize_text_field($_POST['OxiAddonsPriceTable-feature-Border-Top']) . '|'
            . ' OxiAddonsPriceTable-feature-Border-Bottom |' . sanitize_text_field($_POST['OxiAddonsPriceTable-feature-Border-Bottom']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-feature-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-feature-P') . ''
            . '||||'
            . '||'
            . '||||||||||||||||'
            . '||'
            . '||'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-T-FS') . ''
            . ' OxiAddonsPriceTable-T-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-T-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-T-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-T-P') . ''
            . '||||'
            . '||'
            . '||||||'
            . '||||||||||||||||'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-P-FS') . ''
            . ' OxiAddonsPriceTable-P-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-P-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-P-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-P-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-P-Second-FS') . ''
            . ' OxiAddonsPriceTable-P-Second-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-P-Second-C']) . '|'
            . ' OxiAddonsPriceTable-B-Tab |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-Tab']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-B-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-B-M') . ''
            . ' OxiAddonsPriceTable-B-PS |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-PS']) . '|'
            . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-B-FS') . ''
            . ' OxiAddonsPriceTable-B-TC |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-B-TC']) . '|'
            . ' OxiAddonsPriceTable-B-BG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsPriceTable-B-B') . ''
            . ' OxiAddonsPriceTable-B-BC |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-B-BC']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-B-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-B-BR') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsPriceTable-B-BS') . ''
            . ' OxiAddonsPriceTable-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-B-HTC']) . '|'
            . ' OxiAddonsPriceTable-B-HBG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-HBG']) . '|'
            . ' OxiAddonsPriceTable-B-HBC |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-HBC']) . '|'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsPriceTable-B-HBS') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsPriceTable-G-B') . ''
            . ' OxiAddonsPriceTable-G-BC |' . sanitize_text_field($_POST['OxiAddonsPriceTable-G-BC']) . '|'

            . '||#||'
            . ' OxiAddonsPriceTable-P-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-P-TB']) . '||#|| '
            . ' OxiAddonsPriceTable-T-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-T-TA']) . '||#|| '
            . ' OxiAddonsPriceTable-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-B-BT']) . '||#|| '
            . ' OxiAddonsPriceTable-B-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsPriceTable-B-BL']) . '||#|| '
            . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = sanitize_textarea_field($_POST['oxilistid']);
        $data = '||#||'
            . ' OxiAddonsPriceTable-Feature ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-Feature']) . '||#|| ';
        if ($oxilistid > 0) {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("UPDATE $table_list SET files = %s WHERE id = %d", $data, $oxilistid));
        } else {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files) VALUES (%d, %s, %s )", array($oxiid, 'oxi-addons', $data)));
        }
    }
}
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
    $nonce = $_REQUEST['_wpnonce'];
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
if (!empty($_POST['OxiAddonsListFileDelete']) && is_numeric($_POST['oxi-item-id'])) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileDelete' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
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
                        <ul class="oxi-addons-tabs-ul">
                            <li ref="#oxi-addons-tabs-1">General Setting</li>
                            <li ref="#oxi-addons-tabs-2">Button Setting</li>
                        </ul>
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-G-Max-Width', $styledata[3], $styledata[4], $styledata[5], '1', 'Max-Width', 'Set Your Price Table Width', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price-main', 'max-width');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-G-BG', $styledata[7], 'rgba', 'Background', 'Set Your Price Table Background Color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price-main', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsPriceTable-G-B', $styledata[312], $styledata[313], 'Border', 'Set Price Table Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-G-BC', $styledata[316], 'rgba', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-BR', 9, $styledata, 1, 'Border Radius', 'Set Your Price Table  Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price-main', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-P', 25, $styledata, 1, 'Padding', 'Set Your Price Table  Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price-main-body', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-M', 41, $styledata, 1, 'Margin', 'Set Yout Price Table  Margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsPriceTable-G-BS', 57, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price-main');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsPriceTable-G-Animation', 63, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Feature Area Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-feature-FS', $styledata[68], $styledata[69], $styledata[70], '1', 'Font Size', 'Set Price Table Feature Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-feature', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-feature-C', $styledata[72], '', 'Color', 'Set Price Table Feature Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-feature', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-feature-Second-C', $styledata[74], '', 'Secondary Color', 'Set Price Table Feature Secondary Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-feature span', 'color');
                                        echo OxiAddonsADMhelpBorder('OxiAddonsPriceTable-feature-CT', 76, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-li', 'border');
                                        echo oxi_addons_adm_help_number('OxiAddonsPriceTable-feature-Border-Top', $styledata[80], '1', 'Border Top', 'Set Price Table Feature border top', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-li', 'font-size');
                                        echo oxi_addons_adm_help_number('OxiAddonsPriceTable-feature-Border-Bottom', $styledata[82], '1', 'Border Bottom', 'Set Price Table Feature Border Bottom', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-li:last-child', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-feature-F', 84, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-feature');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-feature-P', 90, $styledata, 1, 'Padding', 'Set Price Table Feature  Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-feature', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Price Box Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-T-TA', $stylefiles[4], 'Title', 'Write Your Price Table  title', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price-title');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-T-FS', $styledata[132], $styledata[133], $styledata[134], '2', 'Font Size', 'Set  Price Table  Title Font Size', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price-title', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-T-C', $styledata[136], '', 'Color', 'Set Price Title Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price-title', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-T-F', 138, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price-title');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-T-P', 144, $styledata, 1, 'Padding', 'Set  Price Table  Title Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price-title', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Price Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textarea('OxiAddonsPriceTable-P-TB', $stylefiles[2], 'Price', 'Write Your Price for Price Table', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-P-FS', $styledata[188], $styledata[189], $styledata[190], '1', 'Font Size', 'Set Price Table Price Font Size', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-P-C', $styledata[192], '', 'Color', 'Set Price Table Price Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-P-F', 194, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-P-P', 200, $styledata, 1, 'Padding', 'Set Price Table Price Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price', 'padding');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Price Secondary Text Setting
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-P-Second-FS', $styledata[216], $styledata[217], $styledata[218], '1', 'Font Size', 'Set Price Table Secondary Text Font Size. You Must Write inside html span tag in your price text', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price > span', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-P-Second-C', $styledata[220], '', 'Secondary Color', 'Set Price Table Secondary Text color . You Must Write inside html span tag in your price text', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-price > span', 'color');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-B-BT', $stylefiles[6], 'Button Text', 'Set Price Table Button Text', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                        echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-B-BL', $stylefiles[8], 'Button Link', 'Set Price Table Button Link', 'false');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsPriceTable-B-Tab', $styledata[222], 'Same Tab', '', 'Normal', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-B-P', 224, $styledata, 1, 'Padding', 'Set Price Table Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-B-M', 240, $styledata, 1, 'Margin', 'Set Price Table Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button', 'margin');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Button Position
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsPriceTable-B-PS', $styledata[256], 'Position', 'Set Price Table button Position', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-button', 'text-align');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-B-FS', $styledata[258], $styledata[259], $styledata[260], '', 'Font Size', 'Set Price Table Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-TC', $styledata[262], '', 'Text Color', 'Set Price Table Button Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-BG', $styledata[264], 'rgba', 'Background Color', 'Set Price Table Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsPriceTable-B-B', $styledata[266], $styledata[267], 'Border', 'Set Price Table Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-BC', $styledata[270], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-color');
                                        echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsPriceTable-B-F', 272, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-B-BR', 278, $styledata, 1, 'Border Radius', 'Set Price Table Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-radius');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Button Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsPriceTable-B-BS', 294, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-HTC', $styledata[300], '', 'Color', 'Set Price Table Button Hover Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-HBG', $styledata[302], 'rgba', 'Background Color', 'Set Price Table Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover', 'background');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-HBC', $styledata[304], '', 'Border Color', 'Set Price Table Button Hover Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover', 'border-color');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Button Hover Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsPriceTable-B-HBS', 306, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover');
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
                            <?php wp_nonce_field("oxi-addons-eventwidgets-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open('Add New Feature');
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Price Table Rearrange', $listdata, 2, 'text');
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
                    <?php echo oxi_price_table_style_11_shortcode($style, $listdata, 'admin'); ?>
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
                    <h4 class="modal-title">Price Table Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textarea('OxiAddonsPriceTable-Feature', $listitemdata[2], 'Feature Text', 'Set Your Feature Text, Supported native Language', 'false');
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