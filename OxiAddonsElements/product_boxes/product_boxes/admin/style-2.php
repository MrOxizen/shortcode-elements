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
$listitemdata = $bgdata = array("", "", "", "", "", "", "", "", "", "","", "", "", "","", "", "", "", "", "");

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
                . ' OxiAddonsProductBoxes-title-Tab |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-title-Tab']) . '|'
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
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProductBoxes-B-FS') . ''
                . ' OxiAddonsProductBoxes-B-TC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-B-TC']) . '|'
                . ' OxiAddonsProductBoxes-B-BG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-BG']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProductBoxes-B-F') . ''
                . ' OxiAddonsProductBoxes-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-B-HTC']) . '|'
                . ' OxiAddonsProductBoxes-B-HBG |' . sanitize_text_field($_POST['OxiAddonsProductBoxes-B-HBG']) . '|'
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsProductBoxes-CB-B') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProductBoxes-CB-BW') . ''
                . ' OxiAddonsProductBoxes-title-HC |' . sanitize_hex_color($_POST['OxiAddonsProductBoxes-title-HC']) . '|'
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
        $data = '   OxiAddonsProductBoxes-F-BG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsProductBoxes-F-BG']) . '||#||'
                . ' OxiAddonsProductBoxes-H-BG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsProductBoxes-H-BG']) . '||#|| '
                . ' OxiAddonsProductBoxes-title-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProductBoxes-title-TB']) . '||#|| '
                . ' OxiAddonsProductBoxes-title-L ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsProductBoxes-title-L']) . '||#|| '
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '','',''); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">                            
                            <div class="oxi-addons-tabs-content-tabs">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsProductBoxes-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-G-BG', $styledata[7], 'rgba', 'Background Color', 'Set Product Boxes Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '', 'color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-pb-width', $styledata[172], $styledata[173], $styledata[174], '1', 'Width', 'Set Product Boxes Max Width', 'true', '', 'max-width');
                                            echo oxi_addons_adm_help_border('OxiAddonsProductBoxes-G-B', $styledata[9], $styledata[10], 'Border', 'Set Product Boxes Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-G-BC', $styledata[13], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-P', 15, $styledata, 1, 'Padding', 'Set Your Product Boxes Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-G-M', 31, $styledata, 1, 'Margin', 'Set Yout Product Boxes Margin', 'true', '.oxi-addons-parent-wrapper-'.$oxiid.'', 'padding');
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
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsProductBoxes-title-Tab', $styledata[57], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-title-FS', $styledata[59], $styledata[60], $styledata[61], '1', 'Font Size', 'Set Product Boxes Heading One Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-title-C', $styledata[63], '', 'Color', 'Set Product Boxes Heading One Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-title-HC', $styledata[170], '', 'Hover Color', 'Set Product Boxes Heading One Text Hover color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link:hover', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-title-F', 65, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-title-P', 71, $styledata, 1, 'Padding', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Price
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-price-FS', $styledata[87], $styledata[88], $styledata[89], '1', 'Font Size', 'Set Product Boxes Heading two Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-price-C', $styledata[91], '', 'Color', 'Set Product Boxes Heading two Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-price-F', 93, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-price-P', 99, $styledata, 1, 'Padding', 'Set Product Boxes Heading two Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsProductBoxes-B-Tab', $styledata[115], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'false');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-B-P', 117, $styledata, 1, 'Padding', 'Set Product Boxes Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'padding');
                                            ?>
                                        </div> 
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProductBoxes-B-FS', $styledata[133], $styledata[134], $styledata[135], '', 'Font Size', 'Set Product Boxes Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-TC', $styledata[137], '', 'Text Color', 'Set Product Boxes Button Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-BG', $styledata[139], 'rgba', 'Background Color', 'Set Product Boxes Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProductBoxes-B-F', 141, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link');
                                            ?>
                                        </div> 
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HTC', $styledata[147], '', 'Color', 'Set Product Boxes Button Hover Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProductBoxes-B-HBG', $styledata[149], 'rgba', 'Background Color', 'Set Product Boxes Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link:hover', 'background');
                                            ?>
                                        </div> 
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Context Box Border
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBorder('OxiAddonsProductBoxes-CB-B',151 , $styledata, 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content', 'border');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProductBoxes-CB-BW', 154, $styledata, 1, 'Border width', 'Set Product Boxes content border width', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content', 'border-width');
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
                    <?php echo oxi_product_boxes_style_2_shortcode($style, $listdata, 'admin') ?>
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
                    echo oxi_addons_adm_help_image_upload('OxiAddonsProductBoxes-F-BG', $listitemdata[1], 'Front Image', 'Set your Front  image', 'false');
                    echo oxi_addons_adm_help_image_upload('OxiAddonsProductBoxes-H-BG', $listitemdata[3], 'Hover Image', 'Set your Hover image', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-title-TB', $listitemdata[5], 'Title', 'Set Product Boxes title', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-title-L', $listitemdata[7], 'Title Link', 'Set Product Boxes title Link', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-price-TB', $listitemdata[9], 'Price', 'Write Your Product Price', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-B-BT', $listitemdata[11], 'Button Text', 'Set Product Boxes Button Text', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsProductBoxes-B-BL', $listitemdata[13], 'Button Link', 'Set Product Boxes Button Link', 'false');
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
