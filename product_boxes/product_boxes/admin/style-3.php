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
    if (!wp_verify_nonce($nonce, 'oxi-addons-icon-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsProductBoxes-rows') . ''
                . ' OxiAddonsProductBoxes-G-BG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-G-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsProductBoxes-G-B') . ''
                . ' OxiAddonsProductBoxes-G-BC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-G-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsProductBoxes-animation') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProductBoxes-BS') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-title-FS') . ''
                . ' OxiAddonsProductBoxes-title-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-title-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-title-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-title-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-price-FS') . ''
                . ' OxiAddonsProductBoxes-price-C |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-price-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-price-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-price-P') . ''
                . ' OxiAddonsBanner-B-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Tab']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-M') . ''
                . ' OxiAddonsBanner-B-PS |' . sanitize_text_field($_POST['OxiAddonsBanner-B-PS']) . '|'
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-FS') . ''
                . ' OxiAddonsBanner-B-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-TC']) . '|'
                . ' OxiAddonsBanner-B-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsBanner-B-B') . ''
                . ' OxiAddonsBanner-B-BC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-BC']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-B-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-BS') . ''
                . ' OxiAddonsBanner-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-HTC']) . '|'
                . ' OxiAddonsBanner-B-HBG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-HBG']) . '|'
                . ' OxiAddonsBanner-B-HBC |' . sanitize_text_field($_POST['OxiAddonsBanner-B-HBC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-HBS') . ''
                . ' OxiAddonsProductBoxes-Over-BG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-Over-BG']) . '|'
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
                . ' OxiAddonsProductBoxes-title-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-title-TB']) . '||#|| '
                . ' OxiAddonsProductBoxes-price-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-price-TB']) . '||#|| '
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
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsProductBoxes-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-G-BG', $styledata[7], 'rgba', 'Background Color', 'Set Product Boxes Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '', 'color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-pb-width', $styledata[205], $styledata[205], $styledata[206], '1', 'Width', 'Set Product Boxes Max Width', 'true', '', 'max-width');
                                            echo oxi_addons_adm_help_border('OxiAddonsProductBoxes-G-B', $styledata[9], $styledata[10], 'Border', 'Set Product Boxes Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-G-BC', $styledata[13], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-P', 15, $styledata, 1, 'Padding', 'Set Your Product Boxes Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-M', 31, $styledata, 1, 'Margin', 'Set Yout Product Boxes Margin', 'true', '.oxi-addons-parent-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>                                               
                                    </div>                                            
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsProductBoxes-animation', 47, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                            ?>  
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProductBoxes-BS', 51, $styledata, '', '.oxi-addons-main-wrapper-' . $oxiid . '');
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-title-FS', $styledata[57], $styledata[58], $styledata[59], '1', 'Font Size', 'Set Product Boxes Heading One Font Size', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-title-C', $styledata[61], '', 'Color', 'Set Product Boxes Heading One Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-title-F', 63, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-title-P', 69, $styledata, 1, 'Padding', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Price
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-price-FS', $styledata[85], $styledata[86], $styledata[87], '1', 'Font Size', 'Set Product Boxes Heading two Font Size', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-price-C', $styledata[89], '', 'Color', 'Set Product Boxes Heading two Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-price-F', 91, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-price-P', 97, $styledata, 1, 'Padding', 'Set Product Boxes Heading two Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price', 'padding');
                                            ?>
                                        </div>
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Overaly Background
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-Over-BG', $styledata[203], 'rgba', 'Background Color', 'Set Product Boxes Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content', 'background');
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
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Tab', $styledata[113], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'false');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-P', 115, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-M', 131, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Position
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-B-PS', $styledata[147], 'Position', 'Set Banner button Position', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button', 'text-align');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-FS', $styledata[149], $styledata[150], $styledata[151], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-TC', $styledata[153], '', 'Text Color', 'Set Banner Button Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-BG', $styledata[155], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-B-F', 163, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-linkt');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-B', $styledata[157], $styledata[158], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-BC', $styledata[161], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-BR', 169, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-BS', 185, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-HTC', $styledata[191], '', 'Color', 'Set Banner Button Hover Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-HBG', $styledata[193], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-HBC', $styledata[195], '', 'Border Color', 'Set Banner Button Hover Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link:hover', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Box shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-HBS', 197, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link:hover');
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
                echo oxi_addons_list_rearrange('Product Boxes Rearrange', $listdata, 1, 'title');
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
                    <?php echo oxi_product_boxes_style_3_shortcode($style, $listdata, 'admin') ?>
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
