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
$listitemdata = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$listid = '';
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' ||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SV-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SV-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SV-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFM-SV-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsFM-SV-animation') . ''
                . ' OxiAddonsFM-SV-DM-BG |' . sanitize_text_field($_POST['OxiAddonsFM-SV-DM-BG']) . '|'
                . ' ||||'
                . ' ||||'
                . ' ||||'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsFM-SV-DM-B') . ''
                . ' OxiAddonsFM-SV-DM-BC |' . sanitize_hex_color($_POST['OxiAddonsFM-SV-DM-BC']) . '|'
                . ' ||||||||||||||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SV-DM-M') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-SV-D-FS') . ''
                . ' OxiAddonsFM-SV-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-SV-D-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-SV-D') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SV-D-P') . ''
                . ' ||||'
                . ' OxiAddonsFM-SV-G-MW |' . sanitize_text_field($_POST['OxiAddonsFM-SV-G-MW']) . '|'
                . ' ||||||'
                . ' ||||||||||||||||'
                . ' OxiAddonsFM-SV-I-HR |' . sanitize_text_field($_POST['OxiAddonsFM-SV-I-HR']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-SV-H-FS') . ''
                . ' OxiAddonsFM-SV-D-C |' . sanitize_hex_color($_POST['OxiAddonsFM-SV-H-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-SV-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SV-H-P') . ''
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsFM-SV-rows') . ''
                . ' ||'
                . ' OxiAddonsFM-SV-G-Tab |' . sanitize_text_field($_POST['OxiAddonsFM-SV-G-Tab']) . '|'
                . ' ||||'
                . ' OxiAddonsFM-SV-G-ST |' . sanitize_text_field($_POST['OxiAddonsFM-SV-G-ST']) . '|'
                . ' ||'
                . ' ||||||||||||||||'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-SV-R-FS') . ''
                . ' OxiAddonsFM-SV-R-C |' . sanitize_hex_color($_POST['OxiAddonsFM-SV-R-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SV-R-P') . ''
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsFM-SV-IN-FS') . ''
                . ' OxiAddonsFM-SV-IN-C |' . sanitize_hex_color($_POST['OxiAddonsFM-SV-IN-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsFM-SV-IN2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SV-IN-P') . ''
                . ' OxiAddonsFM-SV-RA-RP |' . sanitize_text_field($_POST['OxiAddonsFM-SV-RA-RP']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsFM-SV-CB-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsFM-SV-I-Shadow') . ''
                . '||#||'
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
        $data = ' ||#||OxiAddonsFM-SV-H ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-SV-H']) . '||#|| '
                . ' OxiAddonsFM-SV-I ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFM-SV-I']) . '||#|| '
                . ' OxiAddonsFM-SV-D ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-SV-D']) . '||#|| '
                . ' OxiAddonsFM-SV-B-URL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsFM-SV-B-URL']) . '||#|| '
                . ' OxiAddonsFM-SV-IN ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-SV-IN']) . '||#|| '
                . ' OxiAddonsFM-SV-R ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsFM-SV-R']) . '||#|| ';
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
        $item_id = (int) $_POST['oxi-item-id'];
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
        $item_id = (int) $_POST['oxi-item-id'];
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
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddonsFM-SV-rows', $styledata, 203, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number('OxiAddonsFM-SV-G-MW', $styledata[149], '1', 'Max Width', 'Set your Box Max Width', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsFM-SV-G-Tab', $styledata[209], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'How to decorte Your Link Opening Style', 'true');
                                        echo oxi_addons_adm_help_true_false('OxiAddonsFM-SV-G-ST', $styledata[215], 'Style One', 'styleone', 'Style Two', 'styletwo', 'Select Style', 'Select Layout Style which style do you want', 'true');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SV-G-P', 23, $styledata, '1', 'Padding', 'Set Your body Padding', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-row', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SV-G-M', 39, $styledata, '1', 'Margin', 'Set Your body Margin', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                       Content Body Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        if($styledata[215]!=='styleone'){
                                        ?>
                                        <input type="hidden" name="OxiAddonsFM-SV-DM-BG" value="<?php echo $styledata[65]?>">
                                        <?php
                                        }else{
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SV-DM-BG', $styledata[65], 'rgba', 'Background', 'Set Your Background Color. It will work only style One', 'false', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-content-body', 'background');
                                        }
                                        echo oxi_addons_adm_help_border('OxiAddonsFM-SV-DM-B', $styledata[79], $styledata[80], 'Border', 'Set your Content Body Border Size and Type', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-content-body', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SV-DM-BC', $styledata[83], '', 'Border Color', 'Set Your Content Body  Border Color', 'false', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-content-body', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SV-G-BR', 7, $styledata, '1', 'Border Radius', 'Set your Content body Border Radius', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-content-body', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SV-DM-M', 101, $styledata, '1', 'Padding', 'Set your Content Body Margin', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-content-body', 'Padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SV-CB-M', 287, $styledata, '1', 'Margin', 'Set Your Content body Margin', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-content-body', 'margin');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsFM-SV-B-Shadow', 55, $styledata, 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-content-body');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsFM-SV-animation', 61, $styledata, 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Image
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number('OxiAddonsFM-SV-I-HR', $styledata[173], 1, 'Height Ratio', 'Set your Height bsed on Width ratio, EX. 100 means same size as width', 'false', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-image:after', 'padding-bottom');
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsFM-SV-I-Shadow', 303, $styledata, 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-image');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-SV-H-FS', $styledata[175], $styledata[176], $styledata[177], '1', 'Font Size', 'Set Your Heading Font Size', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SV-H-C', $styledata[179], '', 'Color', 'Set Your Heading Font Color', 'false', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-SV-H', 181, $styledata, 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SV-H-P', 187, $styledata, '1', 'Padding', 'Set yor Heading Text Padding', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Price
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-SV-D-FS', $styledata[117], $styledata[118], $styledata[119], 1, 'Font Size', 'Set Your Price Font Size', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-price', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SV-D-C', $styledata[121], '', 'Color', 'Set Your Price Color', 'false', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-price', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-SV-D', 123, $styledata, 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-price');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SV-D-P', 129, $styledata, '1', 'Padding', 'Set your Price Padding', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-price', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Rating
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-SV-R-FS', $styledata[235], $styledata[236], $styledata[237], 1, 'Font Size', 'Set Your Rating Font Size', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-rating', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SV-R-C', $styledata[239], '', 'Color', 'Set Your Rating Color', 'false', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-rating', 'color');
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsFM-SV-RA-RP', $styledata[285], 'Rating Position', 'Set Your Rating Position', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-rating', 'text-align');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SV-R-P', 241, $styledata, '1', 'Padding', 'Set your Rating Padding', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-rating', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Info
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsFM-SV-IN-FS', $styledata[257], $styledata[258], $styledata[259], 1, 'Font Size', 'Set Your Info Font Size', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-info', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsFM-SV-IN-C', $styledata[261], '', 'Color', 'Set Your Info Color', 'false', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-info', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsFM-SV-IN2', 263, $styledata, 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-info');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsFM-SV-IN-P', 269, $styledata, '1', 'Padding', 'Set your Info Padding', 'true', '.oxi-addonsFM-SV-wrapper-' . $oxiid . ' .oxi-addonsFM-SV-info', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <?php wp_nonce_field("oxi-addons-eventwidgets-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Food Menu Rearrange', $listdata, 4, 'image');
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
                     <?php echo oxi_food_menu_style_7_shortcode($style, $listdata, 'admin'); ?>
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
                    <h4 class="modal-title">Food Menu Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-SV-H', $listitemdata[2], 'Food Name', 'Set Your Food Name, Supported native Language', 'false');
                    echo oxi_addons_adm_help_model_image_upload('OxiAddonsFM-SV-I', $listitemdata[4], 'Banner Image', 'Set Your Food Menu Image', 'false');
                    echo oxi_addons_adm_help_number('OxiAddonsFM-SV-R', $listitemdata[12], '.1', 'Rating', 'Set Your Food Menu Rating', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-SV-D', $listitemdata[6], 'Price', 'Set Your Food Menu Price', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsFM-SV-B-URL', $listitemdata[8], 'Link', 'Set Your Food Menu Link', 'false');
                    echo oxi_addons_adm_help_form_textarea('OxiAddonsFM-SV-IN', $listitemdata[10], 'Info', 'Set Your Food Menu Info', 'false')
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
