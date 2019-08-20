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
$listitemdata = $bgdata = array("", "", "", "", "", "", "", "", "", "", "", "");

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-icon-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsProductBoxes-rows') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-G-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsProductBoxes-animation') . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProductBoxes-BS') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-O-H-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-O-H-F') . ''
                . ' OxiAddonsProductBoxes-O-H-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-O-H-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-O-H-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsProductBoxes-O-H-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-T-H-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-T-H-F') . ''
                . ' OxiAddonsProductBoxes-T-H-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-T-H-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-T-H-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsProductBoxes-T-H-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-SD-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-SD-F') . ''
                . ' OxiAddonsProductBoxes-SD-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-SD-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-SD-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsProductBoxes-SD-Animation') . '|'
                . ' OxiAddonsProductBoxes-B-PS |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-PS']) . '|'
                . ' OxiAddonsProductBoxes-B-Tab |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-Tab']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-B-M') . ''
                . ' OxiAddonsProductBoxes-B-BG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-BG']) . '|'
                . ' OxiAddonsProductBoxes-B-TC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-B-TC']) . '|'
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-B-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-B-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-B-BR') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsProductBoxes-B-B') . ''
                . ' OxiAddonsProductBoxes-B-BC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-B-BC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProductBoxes-B-BS') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsProductBoxes-B-Animation') . '|'
                . ' OxiAddonsProductBoxes-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-B-HTC']) . '|'
                . ' OxiAddonsProductBoxes-B-HBG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-HBG']) . '|'
                . ' OxiAddonsProductBoxes-B-HBC |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-HBC']) . '|'
                . ' OxiAddonsProductBoxes-pb-bg |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-pb-bg']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProductBoxes-B-HBS') . ''                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-pb-width') . ''
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
        $data = '   OxiAddonsProductBoxes-BG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsProductBoxes-BG']) . '||#||'
                . ' OxiAddonsProductBoxes-O-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-O-H-TB']) . '||#|| '
                . ' OxiAddonsProductBoxes-T-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-T-H-TB']) . '||#|| '
                . ' OxiAddonsProductBoxes-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-SD-TA']) . '||#|| '
                . ' OxiAddonsProductBoxes-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-B-BT']) . '||#|| '
                . ' OxiAddonsProductBoxes-B-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsProductBoxes-B-BL']) . '||#|| '
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
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li  ref="#oxi-addons-tabs-2">Button</li> 
                            </ul> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsProductBoxes-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-pb-bg', $styledata[238], 'rgba', 'Background Color', 'Set Product Boxes Heading One Text color', 'false', '', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-pb-width', $styledata[246], $styledata[247], $styledata[248], '1', 'Width', 'Set Product Boxes Max Width', 'true', '', 'max-width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-P', 7, $styledata, 1, 'Padding', 'Set Your Product Boxes Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-M', 23, $styledata, 1, 'Margin', 'Set Yout Product Boxes Margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . 'oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-admin-edit-list', 'padding');
                                            ?>
                                        </div>                                               
                                    </div>                                            
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsProductBoxes-animation', 39, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                            ?>  
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProductBoxes-BS', 44, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-overlay');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading one
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-O-H-FS', $styledata[50], $styledata[51], $styledata[52], '1', 'Font Size', 'Set Product Boxes Heading One Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-heading-one', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-O-H-C', $styledata[60], '', 'Color', 'Set Product Boxes Heading One Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-heading-one', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-O-H-F', 54, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-O-H-P', 62, $styledata, 1, 'Padding', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-heading-one', 'padding');
                                            echo oxi_addons_adm_help_Animation('OxiAddonsProductBoxes-O-H-Animation', 78, $styledata, 'true', '.oxi-addons-heading-one');
                                            ?>
                                        </div>
                                    </div>

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading two
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-T-H-FS', $styledata[83], $styledata[84], $styledata[85], '1', 'Font Size', 'Set Product Boxes Heading two Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-heading-two', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-T-H-C', $styledata[93], '', 'Color', 'Set Product Boxes Heading two Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-heading-two', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-T-H-F', 87, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content .oxi-addons-content-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-T-H-P', 95, $styledata, 1, 'Padding', 'Set Product Boxes Heading two Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-heading-two', 'padding');
                                            echo oxi_addons_adm_help_Animation('OxiAddonsProductBoxes-T-H-Animation', 111, $styledata, 'true', '.oxi-addons-heading-two');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-SD-FS', $styledata[116], $styledata[117], $styledata[118], '2', 'Font Size', 'Set Product Boxes Short details Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-details', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-SD-C', $styledata[126], '', 'Color', 'Set Product Boxes Short Details Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-details', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-SD-F', 120, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-details');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-SD-P', 128, $styledata, 1, 'Padding', 'Set Product Boxes Short Details Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-details', 'padding');
                                            echo oxi_addons_adm_help_Animation('OxiAddonsProductBoxes-SD-Animation', 144, $styledata, 'true', '.oxi-addons-details');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Position
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsProductBoxes-B-PS', $styledata[149], 'Position', 'Set Banner button Position', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button', 'text-align');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsProductBoxes-B-Tab', $styledata[151], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'false');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-P', 153, $styledata, 1, 'Padding', 'Set Product Boxes Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-M', 169, $styledata, 1, 'Margin', 'Set Product Boxes Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link', 'margin');
                                            ?>
                                        </div> 
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-B-FS', $styledata[189], $styledata[190], $styledata[191], '', 'Font Size', 'Set Product Boxes Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-TC', $styledata[187], '', 'Text Color', 'Set Product Boxes Button Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-BG', $styledata[185], 'rgba', 'Background Color', 'Set Product Boxes Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsProductBoxes-B-B', $styledata[215], $styledata[217], 'Border', 'Set Product Boxes Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-BC', $styledata[219], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsProductBoxes-B-F', 193, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-BR', 199, $styledata, 1, 'Border Radius', 'Set Product Boxes Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link', 'border-radius');
                                            ?>
                                        </div> 
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProductBoxes-B-BS', 221, $styledata, '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link');
                                            ?>
                                        </div>
                                    </div>
                                </div> 
                                <div class="oxi-addons-col-6">

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsProductBoxes-B-Animation', 227, $styledata, 'true', '.oxi-addons-button');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HTC', $styledata[232], '', 'Color', 'Set Product Boxes Button Hover Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HBG', $styledata[234], 'rgba', 'Background Color', 'Set Product Boxes Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HBC', $styledata[236], '', 'Border Color', 'Set Product Boxes Button Hover Border  color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link:hover', 'border-color');
                                            ?>
                                        </div> 
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Box Shadow 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProductBoxes-B-HBS', 240, $styledata, '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper .oxi-addons-button .oxi-addons-button-link:hover');
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
                echo oxi_addons_list_rearrange('Product Boxes Rearrange', $listdata, 1, 'image');
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
                    <?php echo oxi_product_boxes_style_1_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_image_upload('OxiAddonsProductBoxes-BG', $listitemdata[1], 'background image', 'Set your background image', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-O-H-TB', $listitemdata[3], 'Heading One', 'Set Product Boxes Heading One', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-T-H-TB', $listitemdata[5], 'Heading two', 'Set Product Boxes Heading Two', 'false');
                    echo oxi_addons_adm_help_form_textarea('OxiAddonsProductBoxes-SD-TA', $listitemdata[7], 'Description:', 'Write Your Product Short Details', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-B-BT', $listitemdata[9], 'Button Text', 'Set Product Boxes Button Text', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-B-BL', $listitemdata[11], 'Button Link', 'Set Product Boxes Button Link', 'false');
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
