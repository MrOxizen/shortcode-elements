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
            . ' ||'
            . ' OxiAddons-price-table-11-G-I-MXW |' . sanitize_text_field($_POST['OxiAddons-price-table-11-G-I-MXW']) . '|'
            . ' OxiAddons-price-table-11-G-Tab |' . sanitize_text_field($_POST['OxiAddons-price-table-11-G-Tab']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-G-PD') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-G-BR') . ''
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||||'
            . '||||||||'
            . '||||'
            . '||'
            . '||||||'
            . ' OxiAddons-price-table-11-CB-BG |' . sanitize_hex_color($_POST['OxiAddons-price-table-11-CB-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-CB-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-price-table-11-H-FS') . ''
            . ' OxiAddons-price-table-11-H-C |' . sanitize_hex_color($_POST['OxiAddons-price-table-11-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-price-table-11-H-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-H-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-price-table-11-LI-FS') . ''
            . ' OxiAddons-price-table-11-LI-C |' . sanitize_hex_color($_POST['OxiAddons-price-table-11-LI-C']) . '|'
            . ' OxiAddons-price-table-11-LI-BC |' . sanitize_text_field($_POST['OxiAddons-price-table-11-LI-BC']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-price-table-11-LI-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-price-table-11-LI-H') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-LI-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-LI-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-price-table-11-AT-FS') . ''
            . ' OxiAddons-price-table-11-AT-C |' . sanitize_hex_color($_POST['OxiAddons-price-table-11-AT-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-price-table-11-AT-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-AT-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-price-table-11-DET-FS') . ''
            . ' OxiAddons-price-table-11-DET-C |' . sanitize_hex_color($_POST['OxiAddons-price-table-11-DET-C']) . '|'
            . ' OxiAddons-price-table-11-DET-hC |' . sanitize_hex_color($_POST['OxiAddons-price-table-11-DET-hC']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddons-price-table-11-DET-B') . ''
            . ' OxiAddons-price-table-11-DET-BC |' . sanitize_hex_color($_POST['OxiAddons-price-table-11-DET-BC']) . '|'
            . ' OxiAddons-price-table-11-DET-Tab |' . sanitize_hex_color($_POST['OxiAddons-price-table-11-DET-Tab']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-price-table-11-DET-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-DET-M') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-DET-P') . ''
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddons-price-table-11-rows') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddons-price-table-11-animation') . ''
            . ' OxiAddons-price-table-11-DET-BG-C |' . sanitize_text_field($_POST['OxiAddons-price-table-11-DET-BG-C'])
            . '|' . OxiAddonsBGImageSanitize('OxiAddons-price-table-11-G-BI')
            . ' OxiAddons-price-table-11-DET-BG-hC |' . sanitize_text_field($_POST['OxiAddons-price-table-11-DET-BG-hC']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-price-table-11-sub-H-FS') . ''
            . ' OxiAddons-price-table-11-H-C |' . sanitize_hex_color($_POST['OxiAddons-price-table-11-sub-H-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-price-table-11-sub-H-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-sub-H-P') . ''
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-border-radius')
            . OxiAddonsADMBoxShadowSanitize('OxiAddons-price-table-box-shadow')
            . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-price-table-11-AT-Margin')
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-price-table-11-G-I-height-ration') . ''
            . '||#|| OxiAddons-price-table-11-H ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddons-price-table-11-H']) . '||#|| '
            . ' OxiAddons-price-table-11-sub-H ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddons-price-table-11-sub-H']) . '||#|| '
            . ' OxiAddons-price-table-11-DET ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddons-price-table-11-DET']) . '||#|| '
            . ' OxiAddons-price-table-11-DEURL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddons-price-table-11-DEURL']) . '||#|| '
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
            . ' ||#||' . '||#|| '
            . '  ||#||' . '||#|| '
            . '  ||#||' . '||#|| '
            . ' OxiAddons-price-table-11-LI ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddons-price-table-11-LI']) . '||#|| '
            . ' OxiAddons-price-table-11-AT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddons-price-table-11-AT']) . '||#|| ';
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddons-price-table-11-rows', $styledata, 397, 'false', '.oxi-addons-admin-edit-list');
                                        echo OxiAddonsADMHelpBGImage('OxiAddons-price-table-11-G-BI', $styledata, 407, 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-imagebody', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddons-price-table-11-G-I-height-ration', $styledata[479], $styledata[480], $styledata[481], '1', 'Height Ratio', 'Height Ratio', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-imagebody:after', 'padding-bottom');

                                        echo oxi_addons_adm_help_number('OxiAddons-price-table-11-G-I-MXW', $styledata[5], '1', 'Max Width', 'Set your Max Width, EX. 100 means same size as width', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_true_false('OxiAddons-price-table-11-G-Tab', $styledata[7], 'Left', 'left', 'Right', 'right', 'Image Position', 'Set Your Image Position', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-G-BR', 25, $styledata, '1', 'Border Radius', 'Set your Border Radius', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-row', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-G-PD', 9, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddons-price-table-box-shadow', 457, $styledata, 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-fullbody');
                                        ?>
                                    </div>
                                </div>

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Content Body
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-CB-BG', $styledata[221], '', 'Background', 'Set Your Content Body Backgorund Color', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-row', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-CB-P', 223, $styledata, '1', 'Padding', 'Set your Border Radius', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-contentbody', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddons-price-table-11-animation', 401, $styledata, 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-row');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Feature Area
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddons-price-table-11-AT-FS', $styledata[315], $styledata[316], $styledata[317], '1', 'Font Size', 'Set Your Feature Area Font Size', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-text', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-AT-C', $styledata[319], '', 'Color', 'Set Your Feature Area Font Color', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-text', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddons-price-table-11-AT-F', 321, $styledata, 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-text');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-AT-P', 327, $styledata, '1', 'Padding', 'Set Your Feature Area Text Padding', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-text', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-AT-Margin', 463, $styledata, '1', 'Margin', 'Set Your Full Feature Area Margin', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-full-add-sec', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddons-price-table-11-LI-FS', $styledata[267], $styledata[268], $styledata[269], '1', 'Icon Size', 'Set Your Location Icon', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-icon .oxi-icons', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-LI-C', $styledata[271], '', 'Icon Color', 'Set Your Icon Font Color', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-icon .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-LI-BC', $styledata[273], 'rgba', 'Background Color', 'Set Your Icon Background Color', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-icon .oxi-icons', 'background');
                                        echo oxi_addons_adm_help_number_double_dtm('OxiAddons-price-table-11-LI-W', $styledata[275], $styledata[276], $styledata[277], 'OxiAddons-price-table-11-LI-H', $styledata[279], $styledata[280], $styledata[281], 1, 'Width Height', 'Set Your Icon width and Height', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-icon .oxi-icons', 'height');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-LI-BR', 283, $styledata, '1', 'Border Radius', 'Set Your Icon Border Radius', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-icon .oxi-icons', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-LI-P', 299, $styledata, '1', 'Padding', 'Set Your Icon Padding', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-address-icon .oxi-icons', 'padding');
                                        $NOJS = array(
                                            array('OxiAddons-price-table-11-LI-W', 'Width'),
                                            array('OxiAddons-price-table-11-LI-H', 'Height'),
                                        );
                                        echo OxiAddonsADMHelpNoJquery($NOJS);
                                        ?>
                                    </div>
                                </div>



                            </div>
                            <div class="oxi-addons-col-6">


                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddons-price-table-11-H', $stylefiles[2], 'Heading Text', 'Set Your heading Text, Supported native Language', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-heading');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddons-price-table-11-H-FS', $styledata[239], $styledata[240], $styledata[241], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-H-C', $styledata[243], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddons-price-table-11-H-F', 245, $styledata, 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-H-P', 251, $styledata, '1', 'Padding', 'Set Your Heading Text Padding', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Sub Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddons-price-table-11-sub-H', $stylefiles[4], 'Sub Heading Text', 'Set Your Sub Heading Text', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-sub-heading');

                                        echo oxi_addons_adm_help_number_dtm('OxiAddons-price-table-11-sub-H-FS', $styledata[413], $styledata[414], $styledata[415], '1', 'Font Size', 'Set Your Sub Heading Font Size', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-sub-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-sub-H-C', $styledata[417], '', 'Color', 'Set Your Sub Heading Font Color', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-sub-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddons-price-table-11-sub-H-F', 419, $styledata, 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-sub-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-sub-H-P', 425, $styledata, '1', 'Padding', 'Set Your Sub Heading Text Padding', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-sub-headingg', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddons-price-table-11-DET', $stylefiles[6], 'Button Text', 'Set Your Button Text, Supported native Language', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link');
                                        echo oxi_addons_adm_help_textbox('OxiAddons-price-table-11-DEURL', $stylefiles[8], 'Button URL', 'Set Your Button Url', 'false');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddons-price-table-11-DET-FS', $styledata[343], $styledata[344], $styledata[345], '1', 'Font Size', 'Set Your Button Font Size', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-DET-C', $styledata[347], '', 'Color', 'Set Your Button Color', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-DET-BG-C', $styledata[405], 'rgba', 'Background Color', 'Set Your Button Background Color', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddons-price-table-11-DET-B', $styledata[351], $styledata[352], 'Border', 'Set your Button Border Size and Type', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link', 'border-bottom');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-DET-BC', $styledata[355], '', 'Border Color', 'Set Your Button Border Color', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link', 'border-color');
                                        echo oxi_addons_adm_help_true_false('OxiAddons-price-table-11-DET-Tab', $styledata[357], 'Same Tab', '', 'New Tab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddons-price-table-11-DET-F', 359, $styledata, 'true', ' .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-DET-P', 381, $styledata, '1', 'Padding', 'Set Your Button Padding', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-11-DET-M', 365, $styledata, '1', 'Margin', 'Set Your Button Margin', 'true', ' .oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-price-table-border-radius', 441, $styledata, '1', 'Border Radius', 'Set Your Button Border Radius', 'true', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link', 'border-radius');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Button Hover
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-DET-hC', $styledata[349], '', 'Hover Color', 'Set Your Button  Color', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link:hover', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-price-table-11-DET-BG-hC', $styledata[411], 'rgba', 'Background Hover Color', 'Set Your Button Background Hover Color', 'false', '.oxi-addons-price-table-wrapper-' . $oxiid . ' .oxi-addons-price-table-button-link:hover', 'background');
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
                echo oxi_addons_list_rearrange('Price Table Rearrange', $listdata, 10, 'text');
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
                    <?php echo oxi_price_table_style_8_shortcode($style, $listdata, 'admin'); ?>
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
                    echo oxi_addons_adm_help_modal_textbox('OxiAddons-price-table-11-LI', $listitemdata[8], 'Icon Class', 'Set Your Icon Class', 'false');
                    echo oxi_addons_adm_help_modal_textarea('OxiAddons-price-table-11-AT', $listitemdata[10], 'Feature Text', 'Set Your Feature Text, Supported native Language', 'false');
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