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
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsProductBoxes-G-B') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-G-BW') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-box-redius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProductBoxes-BS') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsProductBoxes-animation') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-image-height') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-image-scale') . ''
                . ' OxiAddonsProductBoxes-C-BG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-C-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-C-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-title-FS') . ''
                . ' OxiAddonsProductBoxes-title-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-title-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-title-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-title-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-rating-FS') . ''
                . ' OxiAddonsProductBoxes-rating-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-rating-C']) . '|'
                . ' OxiAddonsProductBoxes-rating-PS |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-rating-PS']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-rating-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-price-FS') . ''
                . ' OxiAddonsProductBoxes-price-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-price-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-price-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-price-P') . ''
                . ' OxiAddonsProductBoxes-B-Tab |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-Tab']) . '|'
                . ' OxiAddonsProductBoxes-B-PSLR |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-PSLR']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-B-M') . ''
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-B-FS') . ''
                . ' OxiAddonsProductBoxes-B-TC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-B-TC']) . '|'
                . ' OxiAddonsProductBoxes-B-BG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-BG']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-B-F') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsProductBoxes-B-B') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-B-BW') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-B-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProductBoxes-B-BS') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsProductBoxes-button-animation') . ''
                . ' OxiAddonsProductBoxes-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-B-HTC']) . '|'
                . ' OxiAddonsProductBoxes-B-HBG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-HBG']) . '|'
                . ' OxiAddonsProductBoxes-B-HBC |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-HBC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProductBoxes-B-HBS') . ''
                . ' OxiAddonsProductBoxes-B-PSTB |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-PSTB']) . '|'
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
        $data = ' OxiAddonsProductBoxes-BG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsProductBoxes-BG']) . '||#||'
                . ' OxiAddonsProductBoxes-title-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-title-TB']) . '||#|| '
                . ' OxiAddonsProductBoxes-price-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-price-TB']) . '||#|| '
                . ' OxiAddonsProductBoxes-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-B-BT']) . '||#|| '
                . ' OxiAddonsProductBoxes-B-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsProductBoxes-B-BL']) . '||#|| '
                . ' OxiAddonsProductBoxes-rating ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsProductBoxes-rating']) . '||#|| '
                . ' OxiAddonsProductBoxes-B-BI ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsProductBoxes-B-BI']) . '||#|| '
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
//echo '<pre>';
//print_r($styledata);
//echo '</pre>';
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-width', $styledata[7], $styledata[8], $styledata[9], '1', 'Width', 'Set Product Boxes Max Width', 'false', '.oxi-product5-' . $oxiid . ' .oxi-product5-main', 'max-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-G-BG', $styledata[11], 'rgba', 'Background Color', 'Set Product Boxes Background color', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-body', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-BW', 16, $styledata, 1, 'Border Width', 'Set Your Product Boxes Border Width', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-body', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsProductBoxes-G-B', 13, $styledata, 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-body');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-box-redius', 32, $styledata, 1, ' Border Redius', 'Set Your Box Redius', true, '.oxi-product5-' . $oxiid . ' .oxi-product5-body', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-P', 48, $styledata, 1, 'Padding', 'Set Your Product Boxes Padding', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-body', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-M', 64, $styledata, 1, 'Margin', 'Set Yout Product Boxes Margin', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-main', 'padding');
                                            ?>
                                        </div>                                               

                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProductBoxes-BS', 80, $styledata, 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-body');
                                            ?>
                                        </div>

                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsProductBoxes-animation', 86, $styledata, 'true', '');
                                            $NOJS = array(
                                                array('OxiAddonsProductBoxes-animation', 'Animation'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>  
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-image-height', $styledata[90], $styledata[91], $styledata[92], '1', 'Height Ratio', 'Set Product Image Height Ratio', 'false', ' .oxi-product5-' . $oxiid . ' .oxi-product5-image::after', 'padding-bottom', '%');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-image-scale', $styledata[94], $styledata[95], $styledata[96], '0.1', 'Hover Scale', 'Set Image Hover Scale', 'true', '', 'transform','',0,2);
                                            $NOJS = array(
                                                array('OxiAddonsProductBoxes-image-scale', 'Hover Scale'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-C-BG', $styledata[98], 'rgba', 'Background Color', 'Set Content Background color', 'false', '.oxi-product5-' . $oxiid . ' .oxi-product5-content', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-C-P', 100, $styledata, 1, 'Padding', 'Set Content Box Padding', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-content', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-title-FS', $styledata[116], $styledata[117], $styledata[118], '1', 'Font Size', 'Set Product Boxes Heading One Font Size', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-title-C', $styledata[120], '', 'Color', 'Set Product Boxes Heading One Text color', 'false', '.oxi-product5-' . $oxiid . ' .oxi-product5-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-title-F', 122, $styledata, 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-title-P', 128, $styledata, 1, 'Padding', 'Set Product Boxes Heading One Padding', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Rating
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-rating-FS', $styledata[144], $styledata[145], $styledata[146], '1', 'Font Size', 'Set Product Boxes Rating Font Size', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-rating', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-rating-C', $styledata[148], '', 'Color', 'Set Product Boxes Rating color', 'false', '.oxi-product5-' . $oxiid . ' .oxi-product5-rating', 'color');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsProductBoxes-rating-PS', $styledata[150], 'Position', 'Set Rating Position', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-rating', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-rating-P', 152, $styledata, 1, 'Padding', 'Set Product Ratiing Padding', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-rating', 'padding');
                                            ?>
                                        </div>
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Price
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-price-FS', $styledata[168], $styledata[169], $styledata[170], '1', 'Font Size', 'Set Product Boxes Heading two Font Size', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-price', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-price-C', $styledata[172], '', 'Color', 'Set Product Boxes Heading two Text color', 'false', '.oxi-product5-' . $oxiid . ' .oxi-product5-price', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-price-F', 174, $styledata, 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-price');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-price-P', 180, $styledata, 1, 'Padding', 'Set Product Boxes Heading two Padding', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-price', 'padding');
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
                                            echo oxi_addons_adm_help_true_false('OxiAddonsProductBoxes-B-Tab', $styledata[196], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_Justify_Align('OxiAddonsProductBoxes-B-PSLR', $styledata[198], 'Justify Position', 'Set Banner button Justify Position', 'false', '.oxi-product5-' . $oxiid . ' .oxi-product5-button', 'justify-content');
                                            ?>
                                            <div class=" form-group row">
                                                <label for="OxiAddonsProductBoxes-B-PSTB" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Button Aling position">Button Align Position</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control" id="OxiAddonsProductBoxes-B-PSTB" name="OxiAddonsProductBoxes-B-PSTB">
                                                        <option value='flex-start' <?php selected($styledata[303], 'flex-start'); ?>>Top</option>
                                                        <option value="center" <?php selected($styledata[303], 'center'); ?>>Middle</option>
                                                        <option value='flex-end' <?php selected($styledata[303], 'flex-end'); ?>>Bottom</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            $NOJS = array(
                                                array('OxiAddonsProductBoxes-B-PSTB', 'Button Aling position'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-P', 200, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button  ', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-M', 216, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-button', 'padding');
                                            ?>
                                        </div>
                                    </div>

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-B-FS', $styledata[232], $styledata[233], $styledata[234], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-TC', $styledata[236], '', 'Text Color', 'Set Banner Button Text color', 'false', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-BG', $styledata[238], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-B-F', 240, $styledata, 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsProductBoxes-B-B', 246, $styledata, 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-BW', 249, $styledata, 1, 'Border Width', 'Set Your Product Boxes Border Width', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button', 'border-width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-BR', 265, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProductBoxes-B-BS', 281, $styledata, 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button');
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
                                            echo oxi_addons_adm_help_Animation('OxiAddonsProductBoxes-button-animation', 287, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
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
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HTC', $styledata[291], '', 'Color', 'Set Banner Button Hover Text color', 'false', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HBG', $styledata[293], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HBC', $styledata[295], '', 'Border Color', 'Set Banner Button Hover Border color', 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button:hover', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Box shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProductBoxes-B-HBS', 297, $styledata, 'true', '.oxi-product5-' . $oxiid . ' .oxi-product5-button-button:hover');
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
                    <?php echo oxi_product_boxes_style_5_shortcode($style, $listdata, 'admin') ?>
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
                    echo oxi_addons_adm_help_number('OxiAddonsProductBoxes-rating', $listitemdata[11], '.1', 'Rating', 'Set Your Food Menu Rating', 'false', '', '', '', 0, 5);
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-price-TB', $listitemdata[5], 'Price', 'Write Your Product Price', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-B-BI', $listitemdata[13], 'Button Icon', 'Set Product Boxes Button Icon', 'false');
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
