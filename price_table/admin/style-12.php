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
    $listitemdata = array("", "", "");
    //Senitize for edit options
    if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
        if (!wp_verify_nonce($nonce, 'oxi-addons-price_table-nonce')) {
            die('Silence is better than unnecessary drama');
        } else {

            $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                    . 'oxi_addons_price_table_BG |' . sanitize_text_field($_POST['oxi_addons_price_table_BG']) . '|'
                    . oxi_addons_adm_help_single_size('oxi_addons_price_table_max_width')
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_border_width')
                    . OxiAddonsADMHelpBorderSanitize('oxi_addons_price_table_border') . '|'
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_BRadius')
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_padding')
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_margin')
                    . oxi_addons_adm_help_animation_senitize('oxi_addons_price_table_animation')
                    . OxiAddonsADMBoxShadowSanitize('oxi_addons_price_table_box_shadow')
                    . oxi_addons_adm_help_single_size('oxi_addons_price_table_title_font_size')
                    . 'oxi_addons_price_table_title_color |' . sanitize_text_field($_POST['oxi_addons_price_table_title_color']) . '|'
                    . 'oxi_addons_price_table_title_bg_color |' . sanitize_text_field($_POST['oxi_addons_price_table_title_bg_color']) . '|'
                    . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons_price_table_title_font')
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_title_padding')
                    . OxiAddonsADMBoxShadowSanitize('oxi_addons_price_table_title_box_shadow')
                    . oxi_addons_adm_help_single_size('oxi_addons_price_table_price_Fsize')
                    . 'oxi_addons_price_table_first_price_color |' . sanitize_text_field($_POST['oxi_addons_price_table_first_price_color']) . '|'
                    . 'oxi_addons_price_table_first_price_Second_color |' . sanitize_text_field($_POST['oxi_addons_price_table_first_price_Second_color']) . '|'
                    . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons_price_table_price_font')
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_price_padding')
                    . oxi_addons_adm_help_single_size('oxi_addons_price_table_feature_font_size')
                    . 'oxi_addons_price_table_feature_color |' . sanitize_text_field($_POST['oxi_addons_price_table_feature_color']) . '|'
                    . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons_price_table_feature_font')
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_feature_padding')
                    . 'oxi_addons_price_table_button_align |' . sanitize_text_field($_POST['oxi_addons_price_table_button_align']) . '|'
                    . 'oxi_addons_price_table_button_tab |' . sanitize_text_field($_POST['oxi_addons_price_table_button_tab']) . '|'
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_button_link_padding')
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_button_margin')
                    . oxi_addons_adm_help_single_size('oxi_addons_price_table_button_font_size')
                    . 'oxi_addons_price_table_button_color |' . sanitize_text_field($_POST['oxi_addons_price_table_button_color']) . '|'
                    . 'oxi_addons_price_table_button_bg_color |' . sanitize_text_field($_POST['oxi_addons_price_table_button_bg_color']) . '|'
                    . OxiAddonsADMHelpBorderSanitize('oxi_addons_price_table_button_border') . '|'
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_button_border_width')
                    . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons_price_table_button_font')
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_button_border_radius')  
                    . 'oxi_addons_price_table_button_hover_color |' . sanitize_text_field($_POST['oxi_addons_price_table_button_hover_color']) . '|'
                    . 'oxi_addons_price_table_button_hover_bg_color |' . sanitize_text_field($_POST['oxi_addons_price_table_button_hover_bg_color']) . '|'
                    . 'oxi_addons_price_table_button_hover_border_color |' . sanitize_text_field($_POST['oxi_addons_price_table_button_hover_border_color']) . '|'
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_button_hover_border_radius')
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_title_border_radius')
                    . oxi_addons_adm_help_single_size('oxi_addons_price_table_price_Second_Fsize')
                    . oxi_addons_adm_help_padding_margin_senitize('oxi_addons_price_table_inner_padding')
                    . '||#||'
                    . 'oxi_addons_price_table_title ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons_price_table_title']) . '||#||'
                    . 'oxi_addons_price_table_price ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons_price_table_price']) . '||#||'
                    . 'oxi_addons_price_table_button_text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons_price_table_button_text']) . '||#||'
                    . 'oxi_addons_price_table_button_link ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons_price_table_button_link']) . '||#||'
                    . 'oxi_addons_hover_position ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons_hover_position']) . '||#||'
                    .'';
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
        }
    }
    //Senitize for model data 
    if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
        if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
            die('You do not have sufficient permissions to access this page.');
        } else {
            $oxilistid = (int) $_POST['oxilistid'];
            $data = 'oxi_addons_price_feature ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons_price_feature']) . '||#||'
                    . '  ||#||';
            $data = sanitize_text_field($data);
            if ($oxilistid > 0) {
                $wpdb->query($wpdb->prepare("UPDATE $table_list SET files = %s WHERE id = %d", $data, $oxilistid));
            } else {
                $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files) VALUES (%d, %s, %s )", array($oxiid, 'oxi-addons', $data)));
            }
        }
    }
    //Code for delete items
    if (!empty($_POST['OxiAddonsListFileDelete']) && is_numeric($_POST['oxi-item-id'])) {
        if (!wp_verify_nonce($nonce, 'OxiAddonsListFileDelete' . $oxitype . 'data')) {
            die('You do not have sufficient permissions to access this page.');
        } else {
            $item_id = (int) $_POST['oxi-item-id'];
            $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
        }
    }
    //Code for edit data
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

    //Code for style explode
    OxiDataAdminStyleNameChange();
    $style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
    $stylefiles = explode('||#||', $style['css']);
    $styledata = explode('|', $stylefiles[0]);

    $listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ", $oxiid), ARRAY_A);
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
                                <li ref="#oxi-addons-tabs-2">Button Setting</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons_price_table_max_width', $styledata[5], $styledata[6], $styledata[7], '1', 'Max-Width', 'Set Your Price Table Width', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_box ', 'max-width');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_BG', $styledata[3], 'rgba', 'Background', 'Set Your Price Table Background Color', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body', 'background');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_border_width', 9, $styledata, 1, 'Border Width', 'Set Your Price Table  Border Width', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body', 'border-width');
                                            echo OxiAddonsADMhelpBorder('oxi_addons_price_table_border', 25, $styledata, 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body', 'style', 'Border');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_BRadius', 29, $styledata, 1, 'Border Radius', 'Set Your Price Table  Border Radius', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_padding', 45, $styledata, 1, 'Margin', 'Set Your Price Table  Margin', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_box ', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_inner_padding', 309, $styledata, 1, 'Content Box Padding', 'Set Your Price Table  Padding', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_margin', 61, $styledata, 1, 'Content Box Margin', 'Set Your Price Table  Margin', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body', 'margin');
                                        
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover Position
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                        echo  oxi_addons_adm_help_number('oxi_addons_hover_position', $stylefiles[10], 1, 'Hover Position','Set your Price Table hover Position','.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_box:hover .oxi_addons_price_box_content','transform');
                                        echo OxiAddonsADMHelpNoJquery(
                                            array(
                                                array('oxi_addons_hover_position', 'Hover Position'),
                                            )
                                        );
                                        ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('oxi_addons_price_table_animation', 77, $styledata, 'true', '.oxi_addons_price_box');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('oxi_addons_price_table_box_shadow', 81, $styledata, 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body');
                                            ?>
                                        </div>
                                    </div>   
                                </div>
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi_addons_price_table_title', $stylefiles[2], 'Title', 'Write Your Price Table title', 'false','.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_title');
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons_price_table_title_font_size', $styledata[87], $styledata[88], $styledata[89], 1, 'Font Size', 'Set Price Table Title Font Size', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_title_color', $styledata[91], '', 'Color', 'Set Price Table Title Text color', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_title', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_title_bg_color', $styledata[93], 'rgba', 'Background Color', 'Set Price Table Title Bakcground Color', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_title', 'background');              
                                            echo OxiAddonsADMHelpFontSettings('oxi_addons_price_table_title_font', 95, $styledata, 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_title');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_title_padding', 101, $styledata, 1, 'Padding', 'Set Price Table Title Padding', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_title', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_title_border_radius', 289, $styledata, 1, 'Border Radius', 'Set Price Table Title Border Radius', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_title', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Title Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('oxi_addons_price_table_title_box_shadow', 117, $styledata, 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_title');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Price Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi_addons_price_table_price', $stylefiles[4], 'Price', 'Write Your Price for Price Table', 'false','.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_headding');
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons_price_table_price_Fsize', $styledata[123], $styledata[124], $styledata[125], '1', 'Font Size', 'Set Price Table Price text Font Size', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_price_month', 'font-size');
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons_price_table_price_Second_Fsize', $styledata[305], $styledata[306], $styledata[307], '1', 'Second Font-Size', 'Set Price Table Price text Font Size', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_price_month span', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_first_price_color', $styledata[127], '', 'Color', 'Set Your Price Table Price Text color', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_headding', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_first_price_Second_color', $styledata[129], '', 'Secondary Color', 'Set Your Price Table Price  Secondary Text color. You Need to write Text inside  html span tag', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_headding span', 'color');
                                            echo OxiAddonsADMHelpFontSettings('oxi_addons_price_table_price_font', 131, $styledata, 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_headding');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_price_padding', 137, $styledata, 1, 'Padding', 'Set Price Table  Price Padding', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_headding', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Feature Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons_price_table_feature_font_size', $styledata[153], $styledata[154], $styledata[155], '1', 'Font Size', 'Set Price Price Table Font Size', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_content .oxi_addons_price_feature', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_feature_color', $styledata[157], '', 'Color', 'Set Price Table Feature Text color', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_content .oxi_addons_price_feature', 'color'); 
                                            echo OxiAddonsADMHelpFontSettings('oxi_addons_price_table_feature_font', 159, $styledata, 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_content .oxi_addons_price_feature');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_feature_padding', 165, $styledata, 1, 'Padding', 'Set Price Table  Price Padding', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_content .oxi_addons_price_feature', 'padding');
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
                                            echo oxi_addons_adm_help_textbox('oxi_addons_price_table_button_text', $stylefiles[6], 'Button Text', 'Set Price Table Button Text', 'false','.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link ');
                                            echo oxi_addons_adm_help_textbox('oxi_addons_price_table_button_link', $stylefiles[8], 'Button Link', 'Set Price Table Button Link', 'false', '');
                                            echo oxi_addons_adm_help_Text_Align('oxi_addons_price_table_button_align', $styledata[181], 'Position', 'Set Price Table button Position', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_button', 'text-align');
                                            echo oxi_addons_adm_help_true_false('oxi_addons_price_table_button_tab', $styledata[183], 'Same Tab', '', 'Normal', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_button_link_padding', 185, $styledata, 1, 'Padding', 'Set Price Table Button padding', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_button_margin', 201, $styledata, 1, 'Margin', 'Set Price Table Button margin', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_button', 'margin');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('oxi_addons_price_table_button_link', 'Link Set'),
                                                    array('oxi_addons_price_table_button_tab', 'Opening Style'),
                                                )
                                            );
                                            ?>
                                        </div> 
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons_price_table_button_font_size', $styledata[217], $styledata[218], $styledata[219], '', 'Font Size', 'Set Price Table Button Font Size', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_button_color', $styledata[221], '', 'Text Color', 'Set Price Table Button Text color', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_button_bg_color', $styledata[223], 'rgba', 'Background Color', 'Set Price Table Button background color', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link', 'background');
                                            echo OxiAddonsADMhelpBorder('oxi_addons_price_table_button_border', 225, $styledata, 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link', 'style','');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_button_border_width', 229, $styledata, 1, 'Border Width', 'Set Your Price Table  Border Width', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link', 'border-width');
                                            echo OxiAddonsADMHelpButtonFontSettings('oxi_addons_price_table_button_font', 245, $styledata, 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_button_border_radius', 251, $styledata, 1, 'Border Radius', 'Set Price Table Button Border Radius', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link', 'border-radius');
                                        
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
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_button_hover_color', $styledata[267], '', 'Color', 'Set Price Table Button Hover Text color', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_button_hover_bg_color', $styledata[269], 'rgba', 'Background Color', 'Set Price Table Button Hover Background color', 'false', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons_price_table_button_hover_border_color', $styledata[271], '', 'Border Color', 'Set Price Table Button Hover Border color', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link:hover', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('oxi_addons_price_table_button_hover_border_radius', 273, $styledata, 1, 'Border Radius', 'Set Price Table Button Border Radius', 'true', '.oxi_addons_price_' . $oxiid . '_container .oxi_addons_price_body_link:hover', 'border-radius');
                                            ?>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-price_table-nonce") ?>
                        </div>
                    </div>

                </form>
            </div>
            <div class="oxi-addons-style-right">
            <?php
            //Code for modal box
            echo oxi_addons_list_modal_open();
            echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
            echo oxi_addons_shortcode_call($oxitype, $oxiid);
            echo oxi_addons_list_rearrange('Image Boxes Rearrange', $listdata, 1, 'title');
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
                    <?php
                    //parameter pass
                    echo oxi_price_table_style_12_shortcode($style, $listdata, 'admin');
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!--modal content-->
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
                echo oxi_addons_adm_help_modal_textbox('oxi_addons_price_feature', $listitemdata[1], 'Feature', 'Write your Price Table Feature', 'false');
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