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
$listitemdata = array("", "", "", "", "", "", "", "","", "", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-icon-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
        . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddcarousel-rows') . ''
        . 'oxi_addons-flip-direction |' . sanitize_text_field($_POST['oxi_addons-flip-direction']) . '|'
        . 'oxi_addons-flip-effect |' . sanitize_text_field($_POST['oxi_addons-flip-effect']) . '|'
        . 'oxi_addons-flipping-time |' . sanitize_text_field($_POST['oxi_addons-flipping-time']) . '|'
        . oxi_addons_adm_help_single_size('oxi_addons-flip-box-front-width')
        . oxi_addons_adm_help_single_size('oxi_addons-flip-box-front-height')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-border-R')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-full-margin')
        . oxi_addons_adm_help_animation_senitize('oxi_addons-flip-animation')
        . OxiAddonsADMBoxShadowSanitize('oxi_addons-flip-box-shadow')
        . OxiAddonsADMBoxShadowSanitize('oxi_addons-flip-h-box-shadow')
        . OxiAddonsBGImageSanitize('oxi_addons-flip-box-front-image')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-front-border-width')
        . OxiAddonsADMHelpBorderSanitize('oxi_addons-flip-box-front-border') . '|'
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-front-padding')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-front-margin')    
        . oxi_addons_adm_help_single_size('oxi_addons-flip-box-front-icon-width')
        . oxi_addons_adm_help_single_size('oxi_addons-flip-box-front-icon-font-size')
        . 'oxi_addons-flip-box-front-icon-color |' . sanitize_hex_color($_POST['oxi_addons-flip-box-front-icon-color']) . '|'
        . 'oxi_addons-flip-box-front-icon-bg-color |' . sanitize_text_field($_POST['oxi_addons-flip-box-front-icon-bg-color']) . '|'
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-front-icon-border-width')
        . OxiAddonsADMHelpBorderSanitize('oxi_addons-flip-box-front-icon-border') . '|'
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-front-icon-border-radius')       
        . oxi_addons_adm_help_single_size('oxi_addons-flip-box-front-heading-font-size')
        . 'oxi_addons-flip-box-front-heading-color |' . sanitize_hex_color($_POST['oxi_addons-flip-box-front-heading-color']) . '|'
        . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-flip-box-front-heading-font')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-front-heading-padding')       
        . oxi_addons_adm_help_single_size('oxi_addons-flip-box-front-info-font-size')
        . 'oxi_addons-flip-box-front-info-color |' . sanitize_hex_color($_POST['oxi_addons-flip-box-front-info-color']) . '|'
        . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-flip-box-front-info-font')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-front-info-padding')      
        . OxiAddonsBGImageSanitize('oxi_addons-flip-box-back-image')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-back-border-width')
        . OxiAddonsADMHelpBorderSanitize('oxi_addons-flip-box-back-border') . '|'
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-back-padding')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-back-margin')
        . oxi_addons_adm_help_single_size('oxi_addons-flip-box-back-heading-font-size')
        . 'oxi_addons-flip-box-back-heading-color |' . sanitize_hex_color($_POST['oxi_addons-flip-box-back-heading-color']) . '|'
        . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-flip-box-back-heading-font')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-back-heading-padding')       
        . oxi_addons_adm_help_single_size('oxi_addons-flip-box-back-info-font-size')
        . 'oxi_addons-flip-box-back-info-color |' . sanitize_hex_color($_POST['oxi_addons-flip-box-back-info-color']) . '|'
        . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-flip-box-back-info-font')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-back-info-padding')
        . oxi_addons_adm_help_single_size('oxi_addons-flip-box-back-button-font-size')
        . 'oxi_addons-flip-box-back-button-color |' . sanitize_hex_color($_POST['oxi_addons-flip-box-back-button-color']) . '|'
        . 'oxi_addons-flip-box-back-button-bg-color |' . sanitize_text_field($_POST['oxi_addons-flip-box-back-button-bg-color']) . '|'
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-back-button-border-width')
        . OxiAddonsADMHelpBorderSanitize('oxi_addons-flip-box-back-button-border') . '|'
        . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-flip-box-back-button-font')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-back-button-border-radius')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-back-button-padding')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-back-button-margin')
        . 'oxi_addons-flip-box-back-button-H-color |' . sanitize_hex_color($_POST['oxi_addons-flip-box-back-button-H-color']) . '|'
        . 'oxi_addons-flip-box-back-button-H-bg-color |' . sanitize_text_field($_POST['oxi_addons-flip-box-back-button-H-bg-color']) . '|'
        . OxiAddonsADMHelpBorderSanitize('oxi_addons-flip-box-back-border-button-hover') . '|'
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-button-back-H-border-radius')
        . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-flip-box-front-icon-padding')
        . '';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = ' oxi_addons-flip-box-front-part-icon ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi_addons-flip-box-front-part-icon']) . '||#|| '
                . ' oxi_addons-flip-box-front-part-heading ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-flip-box-front-part-heading']) . '||#|| '
                . ' oxi_addons-flip-box-front-part-SD ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-flip-box-front-part-SD']) . '||#|| '
                . ' oxi_addons-flip-box-back-part-heading ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-flip-box-back-part-heading']) . '||#|| '
                . ' oxi_addons-flip-box-back-part-SD ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-flip-box-back-part-SD']) . '||#|| '
                . ' oxi_addons-flip-box-back-part-button-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-flip-box-back-part-button-text']) . '||#|| '
                . '  oxi_addons-flip-box-back-part-button-url ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons-flip-box-back-part-button-url']) . '||#|| '
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li  ref="#oxi-addons-tabs-2">Front</li>
                                <li  ref="#oxi-addons-tabs-3">Backend</li>
                            </ul> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Basic Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddcarousel-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            ?>
                                            <div class="form-group row" >
                                                <label for="oxi_addons-flip-direction" class="col-sm-6 control-label" oxi-addons-tooltip="Select Your Flip Direction">Flip Direction</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="oxi_addons-flip-direction" name="oxi_addons-flip-direction">
                                                        <option value="oxi-addons-flip-box-flip-top-to-bottom" <?php
                                                        if ($styledata[7] == 'oxi-addons-flip-box-flip-top-to-bottom') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Top to Bottom</option>
                                                        <option value="oxi-addons-flip-box-flip-bottom-to-top"  <?php
                                                        if ($styledata[7] == 'oxi-addons-flip-box-flip-bottom-to-top') {
                                                            echo 'selected';
                                                        }
                                                        ?> >Bottom to Top</option>
                                                        <option value="oxi-addons-flip-box-flip-left-to-right"  <?php
                                                        if ($styledata[7] == 'oxi-addons-flip-box-flip-left-to-right') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Left to Right</option>
                                                        <option value="oxi-addons-flip-box-flip-right-to-left"  <?php
                                                        if ($styledata[7] == 'oxi-addons-flip-box-flip-right-to-left') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Right to Left</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" >
                                                <label for="oxi_addons-flip-effect" class="col-sm-6 control-label" oxi-addons-tooltip="Select Your Flip Effects">Flip Effects</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="oxi_addons-flip-effect" name="oxi_addons-flip-effect">
                                                        <option value="easing_easeInOutExpo" <?php
                                                        if ($styledata[9] == 'easing_easeInOutExpo') {
                                                            echo 'selected';
                                                        }
                                                        ?>>EaseInOutExpo</option>
                                                        <option value="easing_easeInOutCirc"  <?php
                                                        if ($styledata[9] == 'easing_easeInOutCirc') {
                                                            echo 'selected';
                                                        }
                                                        ?> >EaseInOutCirc</option>
                                                        <option value="easing_easeOutBack"  <?php
                                                        if ($styledata[9] == 'easing_easeOutBack') {
                                                            echo 'selected';
                                                        }
                                                        ?>>EaseOutBack</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_number('oxi_addons-flipping-time', $styledata[11], 0.01, 'Flipping Time', 'Set Your Boxes Flipping Time', 'true', '', '');
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-flip-box-front-width', $styledata[13], $styledata[14], $styledata[15], 1, 'Width', 'Set Your Front Width', 'false','.oxi-addons-flip-box-' . $oxiid . '','max-width');
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-flip-box-front-height', $styledata[17], $styledata[18], $styledata[19], 1, 'Height', 'Set Your Front Height', 'false','.oxi-addons-flip-box-' . $oxiid . '', 'height');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-border-R', 21, $styledata, 1, 'Border Radius', 'Set Your Border Radius', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section','border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-full-margin', 37, $styledata, 1, 'Margin', 'Set Your Full Part Margin', 'true','.oxi-addons-flip-box-' . $oxiid . '' ,'padding');
                                            ?>
                                        </div>                                               
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('oxi_addons-flip-animation', 53, $styledata, 'true','oxi-addons-flip-box-' . $oxiid . '');
                                            ?>
                                        </div>                                              
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('oxi_addons-flip-box-shadow', 57, $styledata, 'true',' .oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-' . $oxiid . '');
                                            ?>
                                        </div> 
                                        <div class="oxi-head">
                                            Hover Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('oxi_addons-flip-h-box-shadow', 63, $styledata, 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-style:hover .oxi-addons-flip-box-front-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6">

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('oxi_addons-flip-box-front-image', $styledata, 69, 'false', '.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section', 'background');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-front-border-width', 73, $styledata, 1, 'Border', 'Set Your Front Border Width', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section','border-width');
                                            echo OxiAddonsADMhelpBorder('oxi_addons-flip-box-front-border', 89, $styledata, 'true', '.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section', 'border-style');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-front-padding', 93, $styledata, 1, 'Padding', 'Set Your Front Padding', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section','padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-front-margin', 109, $styledata, 1, 'Margin', 'Set Your Front Margin', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-section-box','padding');
                                            ?>
                                        </div>                                              
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-flip-box-front-icon-width', $styledata[125], $styledata[126], $styledata[127], 1, 'Icon Width', 'Set Your Front Icon Width', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons', 'width');
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-flip-box-front-icon-font-size', $styledata[129], $styledata[130], $styledata[131], 1, 'Font Size', 'Set Your Front Icon Size', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons','font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-flip-box-front-icon-color', $styledata[133], '', 'Color', 'Set Your Front Icon Color', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons','color');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-flip-box-front-icon-bg-color', $styledata[135], 'rgba', 'Backgroud', 'Set Your Front Icon Background Color', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons','background');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-front-icon-border-width', 137, $styledata, 1, 'Border', 'Set Your Front Icon Border Width', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons','border-width');
                                            echo OxiAddonsADMhelpBorder('oxi_addons-flip-box-front-icon-border', 153, $styledata, 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons','border-style');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-front-icon-border-radius', 157, $styledata, 1, 'Border Radius', 'Set Your Front Icon Border Radius', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon .oxi-icons','border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-front-icon-padding', 447, $styledata, 1, 'Padding', 'Set Your Front Icon Padding', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-icon','padding');
                                            ?>
                                        </div>                                              
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-flip-box-front-heading-font-size', $styledata[173], $styledata[174], $styledata[175], 1, 'Font Size', 'Set Your Front Heading Font Size', 'false', '.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-flip-box-front-heading-color', $styledata[177], '', 'Color', 'Set Your Front Heading Color', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding','color');
                                            echo OxiAddonsADMHelpFontSettings('oxi_addons-flip-box-front-heading-font', 179, $styledata, 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-front-heading-padding', 185, $styledata, 1, 'Padding', 'Set Your Front Heading Padding', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-headding','padding');
                                            ?>
                                        </div>                                              
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Front Info
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-flip-box-front-info-font-size', $styledata[201], $styledata[202], $styledata[203], 1, 'Font Size', 'Set Your Back Part Font Size', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-info','font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-flip-box-front-info-color', $styledata[205], '', 'Color', 'Set Your Back Part Color', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-info','color');
                                            echo OxiAddonsADMHelpFontSettings('oxi_addons-flip-box-front-info-font', 207, $styledata, 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-info');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-front-info-padding', 213, $styledata, 1, 'Padding', 'Set Your Back Part Padding', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-front-info','padding');
                                            ?>
                                        </div>                                              
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-3">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('oxi_addons-flip-box-back-image', $styledata, 229, 'false', '.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section', 'background');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-back-border-width', 233, $styledata, 1, 'Border', 'Set Your Back Part Border', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section','border-width');
                                            echo OxiAddonsADMhelpBorder('oxi_addons-flip-box-back-border', 249, $styledata, 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-back-padding', 253, $styledata, 1, 'Padding', 'Set Your Back Part Padding', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section','padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-back-margin', 269, $styledata, 1, 'Margin', 'Set Your Back Part Margin', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-section-box','padding');
                                            ?>
                                        </div>                                              
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-flip-box-back-heading-font-size', $styledata[285], $styledata[286], $styledata[287], 1, 'Font Size', 'Set Your Front Heading Font Size', 'false', '.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-flip-box-back-heading-color', $styledata[289], '', 'Color', 'Set Your Front Heading Color', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding','color');
                                            echo OxiAddonsADMHelpFontSettings('oxi_addons-flip-box-back-heading-font', 291, $styledata, 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-back-heading-padding', 297, $styledata, 1, 'Padding', 'Set Your Front Heading Padding', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-headding','padding');
                                            ?>
                                        </div>                                              
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Backend Info
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-flip-box-back-info-font-size', $styledata[313], $styledata[314], $styledata[315], 1, 'Font Size', 'Set Your Back Part Font Size', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info','font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-flip-box-back-info-color', $styledata[317], '', 'Color', 'Set Your Back Part Color', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info','color');
                                            echo OxiAddonsADMHelpFontSettings('oxi_addons-flip-box-back-info-font', 319, $styledata, 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-back-info-padding', 325, $styledata, 1, 'Padding', 'Set Your Back Part Padding', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-info','padding');
                                            ?>
                                        </div>                                              
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Typography
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-flip-box-back-button-font-size', $styledata[341], $styledata[342], $styledata[343], 1, 'Font Size', 'Set Your Back Part Button Font Size', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link','font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-flip-box-back-button-color', $styledata[345], '', 'Color', 'Set Your Back Part Button Color', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link','color');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-flip-box-back-button-bg-color', $styledata[347], 'rgba', 'Background Color', 'Set Your Back Part Button Background Color', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link','background');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-back-button-border-width', 349, $styledata, 1, 'Border', 'Set Border for Your Back Part Button ', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link','border-width');
                                            echo OxiAddonsADMhelpBorder('oxi_addons-flip-box-back-button-border', 365, $styledata, 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link','border-style');
                                            echo OxiAddonsADMHelpFontSettings('oxi_addons-flip-box-back-button-font', 369, $styledata, 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-back-button-border-radius', 375, $styledata, 1, 'Border Radius', 'Set Border Radius for Your Back Part Button ', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link','border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-back-button-padding', 391, $styledata, 1, 'Padding', 'Set Padding for Your Back Part Button ', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link','padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-back-button-margin', 407, $styledata, 1, 'Margin', 'Set Margin for Your Back Part Button ', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-button','padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Typography
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-flip-box-back-button-H-color', $styledata[423], '', 'Color', 'Set Your Back Part Button Hover Color', 'false','.oxi-addons-flip-box-' . $oxiid . '.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link:hover','color');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-flip-box-back-button-H-bg-color', $styledata[425], 'rgba', 'Background', 'Set Your Back Part Button Hover Background Color', 'false','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link:hover','background');
                                            echo OxiAddonsADMhelpBorder('oxi_addons-flip-box-back-border-button-hover', 427, $styledata, 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link:hover','border-style');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons-flip-box-button-back-H-border-radius', 431, $styledata, 1, 'Border Radius', 'Set Border Radius for Your Back Part Button Hover', 'true','.oxi-addons-flip-box-' . $oxiid . ' .oxi-addons-flip-box-back-link:hover','border-radius');
                                            
                                            $NOJS = array(
                                                array('oxi_addons-flipping-time', 'Flipping Time'),
                                                array('oxi_addons-flip-box-front-height', 'Height'),
                                                array('oxi_addons-flip-box-border-R', 'Border Radius'),
                                                array('oxi_addons-flip-box-front-icon-width', 'Icon Height & Width'),
                                                array('oxi_addons-flip-box-front-image-ratio', 'Image Ratio'),
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
                                <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                                <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                                <?php wp_nonce_field("oxi-addons-icon-nonce") ?>
                            </div>
                        </div>
                    </div>

                </form> 
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open('Add New Item');
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Filp Box Rearrange', $listdata, 3, 'title');
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
                    <?php echo oxi_flip_boxes_style_13_shortcode($style, $listdata, 'admin') ?>
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
                    <h4 class="modal-title">Front Box Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textbox('oxi_addons-flip-box-front-part-icon', $listitemdata[1], 'Icon Class', 'Set Your Front Icon Class', 'false');
                    echo oxi_addons_adm_help_modal_textbox('oxi_addons-flip-box-front-part-heading', $listitemdata[3], 'Heading', 'Set Your Front Heading', 'false');
                    echo oxi_addons_adm_help_modal_textarea('oxi_addons-flip-box-front-part-SD', $listitemdata[5], 'Short Details', 'Set Your Front Part Short Details ', 'false');
                    ?>
                </div>
                <div class="modal-header">                    
                    <h4 class="modal-title">Back Box Data</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textbox('oxi_addons-flip-box-back-part-heading', $listitemdata[7], 'Heading', 'Set Your Back Heading', 'false');
                    echo oxi_addons_adm_help_modal_textarea('oxi_addons-flip-box-back-part-SD', $listitemdata[9], 'Short Details', 'Set Your Back Part Short Details ', 'false');
                    echo oxi_addons_adm_help_modal_textbox('oxi_addons-flip-box-back-part-button-text', $listitemdata[11], 'Button Text', 'Set Your Back Part Button Text', 'false');
                    echo oxi_addons_adm_help_modal_textbox('oxi_addons-flip-box-back-part-button-url', $listitemdata[13], 'Button Link', 'Set Your Back Part Button Link', 'false');
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
