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
$listitemdata = $bgdata = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-productbox-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsProductBoxes-rows') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-width') . ''
                . ' OxiAddonsProductBoxes-G-BG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-G-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsProductBoxes-G-B') . ''
                . ' OxiAddonsProductBoxes-G-BC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProductBoxes-BS') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsProductBoxes-animation') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-title-FS') . ''
                . ' OxiAddonsProductBoxes-title-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-title-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-title-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-title-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-price-FS') . ''
                . ' OxiAddonsProductBoxes-price-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-price-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-price-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-price-P') . ''
                . ' OxiAddonsProductBoxes-B-Tab |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-Tab']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-B-M') . ''
                . ' OxiAddonsProductBoxes-B-PS |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-PS']) . '|'
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-B-FS') . ''
                . ' OxiAddonsProductBoxes-B-TC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-B-TC']) . '|'
                . ' OxiAddonsProductBoxes-B-BG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-BG']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-B-F') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsProductBoxes-B-B') . ''
                . ' OxiAddonsProductBoxes-B-BC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-B-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-B-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProductBoxes-B-BS') . ''
                . ' OxiAddonsProductBoxes-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-B-HTC']) . '|'
                . ' OxiAddonsProductBoxes-B-HBG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-HBG']) . '|'
                . ' OxiAddonsProductBoxes-B-HBC |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-HBC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProductBoxes-B-HBS') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsProductBoxes-button-animation') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-box-redius') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-rating-FS') . ''
                . ' OxiAddonsProductBoxes-rating-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-rating-C']) . '|'
                . ' OxiAddonsProductBoxes-rating-PS |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-rating-PS']) . '|'
                . '||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-rating-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-image-height') . ''
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
                . ' OxiAddonsProductBoxes-title-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-title-TB']) . '||#|| '
                . ' OxiAddonsProductBoxes-price-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-price-TB']) . '||#|| '
                . ' OxiAddonsProductBoxes-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-B-BT']) . '||#|| '
                . ' OxiAddonsProductBoxes-B-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsProductBoxes-B-BL']) . '||#|| '
                . ' OxiAddonsProductBoxes-rating ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsProductBoxes-rating']) . '||#|| '
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
echo '<pre>';
print_r($styledata);
echo '</pre>';
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
                                <li ref="#oxi-addons-tabs-2">Button</li> 
                            </ul> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsProductBoxes-rows', $styledata, 3, 'false', '.oxi-addons-product-' . $oxiid . '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-width', $styledata[7], $styledata[8], $styledata[9], '1', 'Width', 'Set Product Boxes Max Width', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-main', 'max-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-G-BG', $styledata[11], 'rgba', 'Background Color', 'Set Product Boxes Background color', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-body', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsProductBoxes-G-B', $styledata[13], $styledata[14],'Border', 'Set Product Boxes Border Size and Type', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-body');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-G-BC', $styledata[17], '', 'Border Color', 'Set Border color', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-body', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-box-redius', 211, $styledata, 1, ' Border Redius', 'Set Your Box Redius', true, '.oxi-product4-' . $oxiid . ' .oxi-product4-body', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-P', 19, $styledata, 1, 'Padding', 'Set Your Product Boxes Padding', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-body', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-M', 35, $styledata, 1, 'Margin', 'Set Yout Product Boxes Margin', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-main', 'padding');
                                            ?>
                                        </div>                                               

                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProductBoxes-BS', 51, $styledata, 'true', ' .oxi-product4-' . $oxiid . ' .oxi-product4-body');
                                            ?>
                                        </div>
                                        
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsProductBoxes-animation', 57, $styledata, 'true', '.oxi-product4-body' ,'oxi-product4-body');
                                             $NOJS = array(
                                                array('OxiAddonsProductBoxes-animation', 'Animation'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>  
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-image-height', $styledata[255], $styledata[256], $styledata[257], '1', 'Height Ratio', 'Set Product Image Height Ratio', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-image::after', 'padding-bottom','%');
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-title-FS', $styledata[61], $styledata[62], $styledata[63], '1', 'Font Size', 'Set Product Boxes Heading One Font Size', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-title-C', $styledata[65], '', 'Color', 'Set Product Boxes Heading One Text color', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-title-F', 67, $styledata, 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-title-P', 73, $styledata, 1, 'Padding', 'Set Product Boxes Heading One Padding', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Rating
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-rating-FS', $styledata[227], $styledata[228], $styledata[229], '1', 'Font Size', 'Set Product Boxes Rating Font Size', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-rating', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-rating-C', $styledata[231], '', 'Color', 'Set Product Boxes Rating color', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-rating', 'color');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsProductBoxes-rating-PS', $styledata[233], 'Position', 'Set Rating Position', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-rating', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-rating-P', 239, $styledata, 1, 'Padding', 'Set Product Ratiing Padding', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-rating', 'padding');
                                            ?>
                                        </div>
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Price
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-price-FS', $styledata[89], $styledata[90], $styledata[91], '1', 'Font Size', 'Set Product Boxes Heading two Font Size', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-price', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-price-C', $styledata[93], '', 'Color', 'Set Product Boxes Heading two Text color', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-price', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-price-F', 95, $styledata, 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-price');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-price-P', 101, $styledata, 1, 'Padding', 'Set Product Boxes Heading two Padding', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-price', 'padding');
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
                                            echo oxi_addons_adm_help_true_false('OxiAddonsProductBoxes-B-Tab', $styledata[117], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'false');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsProductBoxes-B-PS', $styledata[151], 'Position', 'Set Banner button Position', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-P', 119, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button ', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-M', 135, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button', 'padding');
                                            ?>
                                        </div>
                                    </div>

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-B-FS', $styledata[153], $styledata[154], $styledata[155], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-TC', $styledata[157], '', 'Text Color', 'Set Banner Button Text color', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-BG', $styledata[159], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-B-F', 161, $styledata, 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button');
                                            echo oxi_addons_adm_help_border('OxiAddonsProductBoxes-B-B', $styledata[167], $styledata[168], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-BC', $styledata[171], '', 'Border Color', 'Set Border color', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-BR', 173, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProductBoxes-B-BS', 189, $styledata, 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button:hover');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">  
                                    <div class="oxi-addons-content-div">

                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsProductBoxes-button-animation', 207, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                             $NOJS = array(
                                                array('OxiAddonsProductBoxes-button-animation', 'Animation'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>

                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HTC', $styledata[195], '', 'Color', 'Set Banner Button Hover Text color', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HBG', $styledata[197], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HBC', $styledata[199], '', 'Border Color', 'Set Banner Button Hover Border color', 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button:hover', 'true');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProductBoxes-B-HBS', 201, $styledata, 'true', '.oxi-product4-' . $oxiid . ' .oxi-product4-button-button:hover');
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
                            <?php wp_nonce_field("oxi-productbox-nonce") ?>
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
                    <?php echo oxi_product_boxes_style_4_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_image_upload('OxiAddonsProductBoxes-BG', $listitemdata[1], 'Image', 'Set your Background  image', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-title-TB', $listitemdata[3], 'Title', 'Set Product Boxes title', 'false');
                    echo oxi_addons_adm_help_number('OxiAddonsProductBoxes-rating', $listitemdata[11], '.1', 'Rating', 'Set Your Food Menu Rating', 'false','','','',0,5);
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-price-TB', $listitemdata[5], 'Price', 'Write Your Product Price', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-B-BT', $listitemdata[7], 'Button Text', 'Set Product Boxes Button Text', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-B-BL', $listitemdata[9], 'Button Link', 'Set Product Boxes Button Link', 'false');
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
