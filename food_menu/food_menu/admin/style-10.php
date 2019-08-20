<?php
if (!defined('ABSPATH')) {
    exit;
}
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
$listitemdata = array('', '', '', '', '', '', '', '', '', '', '', '',);


if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-demo_package-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                //  to box setting
                . oxi_addons_adm_help_single_size('oxi-addons-food-box-width')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-food-box-border-radius')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-food-box-padding')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-food-box-margin')
                . OxiAddonsADMHelpBorderSanitize('oxi-addons-food-box-border-style')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-food-box-border-width')
                . OxiAddonsADMBoxShadowSanitize('oxi-addons-food-box-shadow')
                . 'oxi-addons-content-bg-color |' . sanitize_text_field($_POST['oxi-addons-content-bg-color']) . '|'
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-food-content-border-radius')
                . OxiAddonsADMHelpBorderSanitize('oxi-addons-food-content-border-style')
                . oxi_addons_adm_help_single_size('oxi-addons-content-box-width')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-food-content-padding')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-food-content-margin')
                . oxi_addons_adm_help_single_size('oxi-box-food-heading-font-size')
                . 'oxi-box-food-heading-font-color |' . sanitize_text_field($_POST['oxi-box-food-heading-font-color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('oxi-box-food-heading-font-settings')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-box-food-heading-font-padding')
                . oxi_addons_adm_help_single_size('oxi-box-food-title-font-size')
                . 'oxi-box-food-title-font-color |' . sanitize_text_field($_POST['oxi-box-food-title-font-color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('oxi-box-food-title-font-settings')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-box-food-title-font-padding')
                . oxi_addons_adm_help_single_size('oxi-box-food-price-font-size')
                . 'oxi-box-food-price-font-color |' . sanitize_text_field($_POST['oxi-box-food-price-font-color']) . '|'
                . OxiAddonsADMHelpFontSettingsSanitize('oxi-box-food-price-font-settings')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-box-food-price-font-padding')
                . ' oxi-box-food-button-link-opening |' . sanitize_text_field($_POST['oxi-box-food-button-link-opening']) . '|'
                . ' oxi-box-food-button-align |' . sanitize_text_field($_POST['oxi-box-food-button-align']) . '|'
                . oxi_addons_adm_help_single_size('oxi-box-food-button-size')
                . 'oxi-box-food-button-color |' . sanitize_text_field($_POST['oxi-box-food-button-color']) . '|'
                . 'oxi-box-food-button-bgcolor |' . sanitize_text_field($_POST['oxi-box-food-button-bgcolor']) . '|'
                . oxi_addons_adm_help_padding_margin_senitize('oxi-box-food-button-border-width')
                . OxiAddonsADMHelpBorderSanitize('oxi-box-food-button-border-style')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-box-food-button-border-radius')
                . OxiAddonsADMHelpFontSettingsSanitize('oxi-box-food-button-font-settings')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-box-food-button-padding')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-box-food-button-margin')
                . 'oxi-box-food-button-hover-bgcolor |' . sanitize_text_field($_POST['oxi-box-food-button-hover-bgcolor']) . '|'
                . 'oxi-box-food-button-hover-color |' . sanitize_text_field($_POST['oxi-box-food-button-hover-color']) . '|'
                . OxiAddonsADMHelpBorderSanitize('oxi-box-food-button-border-hover-style')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-box-food-button-border-hover-radius')
                . '' . oxi_addons_adm_help_animation_senitize('oxi-addons-food-box-animation') . ''
                . '' . oxi_addons_adm_help_animation_senitize('oxi-box-food-button-animation') . ''
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('oxi-addons-box-food-item-per-row') . ''
                . oxi_addons_adm_help_single_size('oxi-addons-food-box-height')
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-food-content-border-width')
                
                
                
                
                . '||#||oxi-event-image||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-event-image']) . '||#|| '
                . '||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}


if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = ' oxi-addons-food-box-image ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-addons-food-box-image']) . '||#|| '
                . 'oxi-addons-food-box-heading-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-food-box-heading-text']) . '||#|| '
                . 'oxi-addons-food-box-item-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-food-box-item-text']) . '||#|| '
                . 'oxi-addons-food-box-price ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-food-box-price']) . '||#|| '                
                . 'oxi-addons-food-box-btn-txt ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-food-box-btn-txt']) . '||#|| '  
                . 'oxi-addons-food-box-btn-link ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-food-box-btn-link']) . '||#|| '              
        ;
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
echo '<pre>';
//print_r($styledata);
//print_r($stylefiles);
//print_r($listdata);
//print_r($listfile);
//print_r($listitemdata);
echo '</pre>';
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
                                <li ref="#oxi-addons-tabs-id-1">General</li>
                                <li  ref="#oxi-addons-tabs-id-2">Button</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('oxi-addons-box-food-item-per-row', $styledata, 337, 'false', '.oxi-box-wrap-' . $oxiid . '');
                                            echo oxi_addons_adm_help_number_dtm('oxi-addons-food-box-width', $styledata[3], $styledata[4], $styledata[5], 1, 'Width', 'Set Your Box Width', false, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box', 'max-width', 'px', '', '');
                                            echo oxi_addons_adm_help_number_dtm('oxi-addons-food-box-height', $styledata[341], $styledata[342], $styledata[343], 1, 'Height', 'Set Your Box Width', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box', 'height', 'px', '', '');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-food-box-border-width', 58, $styledata, 1, 'Border Width', 'Set Your Box Icon Border width', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-outer', 'border-width');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-food-box-border-radius', 7, $styledata, 1, 'Border Radius', 'Set Your Box Border Radius ', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-outer', 'border-radius');
                                            echo OxiAddonsADMhelpBorder('oxi-addons-food-box-border-style', 55, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-outer', 'border-style');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-food-box-padding', 23, $styledata, '1', 'Padding', 'Set your Box Padding', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-outer', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-food-box-margin', 39, $styledata, '1', 'Margin', 'Set your Box Margin', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-outer', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('oxi-addons-food-box-shadow', 74, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-outer');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('oxi-addons-food-box-animation', 329, $styledata, 'true', '');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Content Hover
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi-addons-content-bg-color', $styledata[80], 'rgba', 'Background', 'Set Your Hover Background Color', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-inner', 'background');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-food-content-border-width', 345, $styledata, 1, 'Border Width', 'Set Your Content Border Width', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-inner', 'border-width');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-food-content-border-radius', 82, $styledata, 1, 'Border Radius', 'Set Your Box Content Border Radius ', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-inner', 'border-radius');
                                            echo OxiAddonsADMhelpBorder('oxi-addons-food-content-border-style', 98, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box-inner', 'border-style');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-food-content-padding', 105, $styledata, '1', 'Padding', 'Set your Box Padding', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-box:hover .oxi-addons-box-sample', 'padding');                                            
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
                                            echo oxi_addons_adm_help_number_dtm('oxi-box-food-heading-font-size', $styledata[137], $styledata[138], $styledata[139], 1, 'Font Size', 'Select Your Heading Font Size', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-grid-item', 'font-size', 'px', '', '');
                                            echo oxi_addons_adm_help_MiniColor('oxi-box-food-heading-font-color', $styledata[141], '', 'Color', 'Set Your Heading Color', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-grid-item', 'color');
                                            echo OxiAddonsADMHelpFontSettings('oxi-box-food-heading-font-settings', 143, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-grid-item');
                                            echo oxi_addons_adm_help_padding_margin('oxi-box-food-heading-font-padding', 149, $styledata, '1', 'Padding', 'Set your Box Padding', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-grid-item', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">                                    
                                        <div class="oxi-head">
                                            Title
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi-box-food-title-font-size', $styledata[165], $styledata[166], $styledata[167], 1, 'Font Size', 'Select Your Food Item Font Size', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-food-name', 'font-size', 'px', '', '');
                                            echo oxi_addons_adm_help_MiniColor('oxi-box-food-title-font-color', $styledata[169], '', 'Color', 'Set Your Food Item Color', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-food-name', 'color');
                                            echo OxiAddonsADMHelpFontSettings('oxi-box-food-title-font-settings', 171, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-food-name');
                                            echo oxi_addons_adm_help_padding_margin('oxi-box-food-title-font-padding', 177, $styledata, '1', 'Padding', 'Set your Food Item Padding', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-food-name', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">                                    
                                        <div class="oxi-head">
                                            Price
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi-box-food-price-font-size', $styledata[193], $styledata[194], $styledata[195], 1, 'Font Size', 'Select Your price Font Size', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-price', 'font-size', 'px', '', '');
                                            echo oxi_addons_adm_help_MiniColor('oxi-box-food-price-font-color', $styledata[197], '', 'Color', 'Set Your Price Color', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-price', 'color');
                                            echo OxiAddonsADMHelpFontSettings('oxi-box-food-price-font-settings', 199, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-price');
                                            echo oxi_addons_adm_help_padding_margin('oxi-box-food-price-font-padding', 205, $styledata, '1', 'Padding', 'Set your Box Padding', true, '.oxi-box-wrap-'.$oxiid.' .oxi-addons-price', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Info
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('oxi-box-food-button-link-opening', $styledata[221], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style');                                            
                                            echo oxi_addons_adm_help_Text_Align('oxi-box-food-button-align', $styledata[223], 'Button Align', 'Set Your Button Align', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-btn', 'text-align');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('oxi-box-food-button-animation', 333, $styledata, 'true', '.oxi-addons-content-boxes-button');
                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi-box-food-button-size', $styledata[225], $styledata[226], $styledata[227], 1, 'Button Font Size', 'Select Your Button Text Size', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi-box-food-button-color', $styledata[229], '', 'Color', 'Select Your Icon Color', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-box-food-button-bgcolor', $styledata[231], 'rgba', 'Background Color', 'Select Your Button Background Color', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor', 'background');
                                            echo oxi_addons_adm_help_padding_margin('oxi-box-food-button-border-width', 233, $styledata, 1, 'Border width', 'Set Your Content Boxes Border width', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor', 'border-width');
                                            echo OxiAddonsADMhelpBorder('oxi-box-food-button-border-style', 249, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor', 'border');
                                            echo oxi_addons_adm_help_padding_margin('oxi-box-food-button-border-radius', 252, $styledata, 1, 'Border Radius', 'Set Your Content Boxes Border Radius', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor', 'border-radius');
                                            echo OxiAddonsADMHelpFontSettings('oxi-box-food-button-font-settings', 268, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor');
                                            echo oxi_addons_adm_help_padding_margin('oxi-box-food-button-padding', 274, $styledata, 1, 'Padding', 'Set Your Button Padding', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi-box-food-button-margin', 290, $styledata, 1, 'Margin', 'Set Your Heading Margin', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-btn', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi-box-food-button-hover-color', $styledata[308], '', 'Color', 'Select Your Button Hover Text Color', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-box-food-button-hover-bgcolor', $styledata[306], 'rgba', 'Background Color', 'Select Your Button Hover Background Color', 'false', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor:hover', 'background');
                                            echo OxiAddonsADMhelpBorder('oxi-box-food-button-border-hover-style', 310, $styledata, 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor:hover', 'border');
                                            echo oxi_addons_adm_help_padding_margin('oxi-box-food-button-border-hover-radius', 313, $styledata, 1, 'Border Radius', 'Set Your Content Boxes Hover Border Radius', 'true', '.oxi-box-wrap-'.$oxiid.' .oxi-addons-button-anchor:hover', 'border-radius');
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <?php wp_nonce_field("oxi-addons-demo_package-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open('Add New Events');
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Event Rearrange', $listdata, 3, 'title');
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
                    <?php echo oxi_food_menu_style_10_shortcode($style, $listdata, 'admin'); ?>
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
                    <h4 class="modal-title">Event Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                        echo oxi_addons_adm_help_model_image_upload('oxi-addons-food-box-image', $listitemdata[1], 'Image', 'Set Image', false);
                        echo oxi_addons_adm_help_textbox('oxi-addons-food-box-heading-text', $listitemdata[3], 'Heading', 'Write your Icon Class', false);
                        echo oxi_addons_adm_help_textbox('oxi-addons-food-box-item-text', $listitemdata[5], 'Item', 'Write your Heading Text', false);
                        echo oxi_addons_adm_help_textbox('oxi-addons-food-box-price', $listitemdata[7], 'Price', 'Write your Descriptions Text', false);
                        echo oxi_addons_adm_help_textbox('oxi-addons-food-box-btn-txt', $listitemdata[9], 'Button', 'Write your Icon Class', false);                    
                        echo oxi_addons_adm_help_textbox('oxi-addons-food-box-btn-link', $listitemdata[11], 'Button Link', 'Write your Button Link', false);
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
