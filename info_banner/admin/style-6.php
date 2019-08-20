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
$listitemdata = array("", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddInfoBanner-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|' 
                . ' OxiAddInfoBanner-frontIMG |' . OxiAddonsAdminUrlConvert($_POST['OxiAddInfoBanner-frontIMG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-padding') . '' 
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddIconBoxes-CB-rows') . ''
                . ' OxiAddInfoBanner-CB-Bg |' . sanitize_text_field($_POST['OxiAddInfoBanner-CB-Bg']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddInfoBanner-CB-B') . ''
                . ' OxiAddInfoBanner-CB-BC |' . sanitize_hex_color($_POST['OxiAddInfoBanner-CB-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-CB-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-CB-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-CB-margin') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddInfoBanner-box-shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddInfoBanner-animation') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddInfoBanner-icon-size') . ''
                . ' OxiAddInfoBanner-icon-color |' . sanitize_hex_color($_POST['OxiAddInfoBanner-icon-color']) . '|' 
                . ' OxiAddInfoBanner-icon-position |' . sanitize_text_field($_POST['OxiAddInfoBanner-icon-position']) . '|' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-icon-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddInfoBanner-heading-size') . ''
                . ' OxiAddInfoBanner-heading-color |' . sanitize_hex_color($_POST['OxiAddInfoBanner-heading-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddInfoBanner-heading') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-heading-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddInfoBanner-content-size') . ''
                . ' OxiAddInfoBanner-content-color |' . sanitize_hex_color($_POST['OxiAddInfoBanner-content-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddInfoBanner-content') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-content-padding') . ''  
                . ' OxiAddInfoBanner-icon-Bg |' . sanitize_text_field($_POST['OxiAddInfoBanner-icon-Bg']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-icon-radius') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddInfoBanner-icon-box-shadow') . ''
                . '||||'
                . '' . OxiAddonsBGImageSanitize('OxiAddInfoBanner-G-BG') . ''
                . ' OxiAddInfoBanner-G-BG-PS |' . sanitize_text_field($_POST['OxiAddInfoBanner-G-BG-PS']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-G-P') . ''
                . ' OxiAddInfoBanner-IMG-Auto |' . sanitize_text_field($_POST['OxiAddInfoBanner-IMG-Auto']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddInfoBanner-IMG-W') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-icon-margin') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddInfoBanner-icon-title-size') . ''
                . ' OxiAddInfoBanner-icon-title-color |' . sanitize_hex_color($_POST['OxiAddInfoBanner-icon-title-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddInfoBanner-icon-title') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-icon-title-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddInfoBanner-title-content-size') . ''
                . ' OxiAddInfoBanner-title-content-color |' . sanitize_hex_color($_POST['OxiAddInfoBanner-title-content-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddInfoBanner-title-content') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfoBanner-title-content-padding') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddInfoBanner-icon-width') . ''
                . '||#||'  
                . ' OxiAddonsInfoBanner-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsInfoBanner-H-TB']) . '||#|| '
                . ' OxiAddonsInfoBanner-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsInfoBanner-SD-TA']) . '||#|| ' 
                . ' ||#||'; 
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}


if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = ' OxiAddInfoBanner-i-title ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddInfoBanner-i-title']) . '||#||' 
                . 'OxiAddInfoBanner-i-class ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddInfoBanner-i-class']) . '||#||'
                . 'OxiAddInfoBanner-i-content ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddInfoBanner-i-content']) . '||#||'
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
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php 
                                              echo oxi_addons_adm_help_true_false('OxiAddInfoBanner-G-BG-PS', $styledata[203], 'Left', 'left', 'Right', 'right', 'Position Reverse', 'Set Image and content position of banner', 'false');
                                              echo OxiAddonsADMHelpBGImage('OxiAddInfoBanner-G-BG', $styledata, 199, 'true',' .oxi-addons-main-wrapper-' . $oxiid . '','background');
                                              echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-G-P', 205, $styledata, 1, 'Padding', 'Set Banner  padding', 'true',' .oxi-addons-main-wrapper-' . $oxiid . '','padding');
                                            ?>
                                        </div> 
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Front Image Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php 
                                                echo oxi_addons_adm_help_body_image_upload('OxiAddInfoBanner-frontIMG', $styledata[3], 'Front Image', 'Set Your top Front Image ', 'false'); 
                                                echo oxi_addons_adm_help_number_dtm('OxiAddInfoBanner-IMG-W',$styledata[223],$styledata[224],$styledata[225],'1','Width','Set Image Width','false');
                                               echo oxi_addons_adm_help_true_false('OxiAddInfoBanner-IMG-Auto', $styledata[221], 'Auto', 'auto', 'Manual', 'manual', 'Manual Or Auto', 'Set Manual width Or auto Width', 'false');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-padding', 5, $styledata, 1, 'Padding', 'Set Your Content Boxes Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'padding');
                                                echo OxiAddonsADMHelpNoJquery(
                                                    array(
                                                        array('OxiAddInfoBanner-IMG-W','width'), 
                                                    )
                                                );
                                            ?>
                                        </div> 
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Box Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddIconBoxes-CB-rows', $styledata, 21, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfoBanner-CB-Bg', $styledata[25], 'rgba', 'Background Color', 'Select Your content box Background Color', 'false', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddInfoBanner-CB-B', $styledata[27], $styledata[28], 'Border', 'Set content Boxes Border Size and Type', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfoBanner-CB-BC', $styledata[31], '', 'Border Color', 'Set content boxes Border color', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main', 'border-color');
                                             echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-CB-radius', 33, $styledata, 1, 'Border Radius', 'Set Your Content Boxes Border Radius', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-CB-padding', 49, $styledata, 1, 'Padding', 'Set Your Content Boxes Padding', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-CB-margin', 65, $styledata, 1, 'Margin', 'Set Your Content Boxes  Margin','true', '.oxi-addons-content-boxes-' . $oxiid . '', 'padding');
                                            ?>
                                        </div> 
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo OxiAddonsADMhelpBoxShadow('OxiAddInfoBanner-box-shadow', 81, $styledata, 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_Animation('OxiAddInfoBanner-animation', 87, $styledata, 'true', '.oxi-addons-content-boxes-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_number_dtm('OxiAddInfoBanner-icon-size', $styledata[91], $styledata[92], $styledata[93], 1, 'Font Size', 'Select Your Icon Font Size', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'font-size');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddInfoBanner-icon-width', $styledata[299], $styledata[300], $styledata[301], 1, 'Width', 'Select Your Icon Width And Height', 'true');
                                                echo oxi_addons_adm_help_MiniColor('OxiAddInfoBanner-icon-color', $styledata[95], '', 'Color', 'Select Your Icon Color', 'false', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'color');
                                                echo oxi_addons_adm_help_MiniColor('OxiAddInfoBanner-icon-Bg', $styledata[171], 'rgba', 'Background Color', 'Select Your content box Background Color', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'background');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-icon-radius', 173, $styledata, 1, 'Border Radius', 'Set Your Content Boxes Border Radius', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'border-radius');
                                                echo oxi_addons_adm_help_Text_Align('OxiAddInfoBanner-icon-position', $styledata[97], 'Text-align', 'Set Your Icon Postion', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon', 'text-align');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-icon-padding', 99, $styledata, 1, 'Padding', 'Set Your Icon Padding', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'padding');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-icon-margin', 227, $styledata, 1, 'Margin', 'Set Your Icon Padding', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons', 'margin');
                                                echo OxiAddonsADMhelpBoxShadow('OxiAddInfoBanner-icon-box-shadow', 189, $styledata, 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon .oxi-icons');
                                                echo OxiAddonsADMHelpNoJquery(
                                                    array(
                                                        array('OxiAddInfoBanner-icon-width','width and height'), 
                                                        array('OxiAddInfoBanner-icon-position','Icon Position'), 
                                                    )
                                                );
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                           Icon Title Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddInfoBanner-icon-title-size', $styledata[243], $styledata[244], $styledata[245], 1, 'Font Size', 'Select Your icon title Font Size', 'false', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfoBanner-icon-title-color', $styledata[247], '', 'Color', 'Select Your icon title Color', 'false', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddInfoBanner-icon-title', 249, $styledata, 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-icon-title-padding', 255, $styledata, 1, 'Padding', 'Set Your icon title Padding', 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-icon-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                           Icon Title Content
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_number_dtm('OxiAddInfoBanner-title-content-size', $styledata[271], $styledata[272], $styledata[273], 1, 'Font Size', 'Select Your Title Content Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content', 'font-size');
                                                 echo oxi_addons_adm_help_MiniColor('OxiAddInfoBanner-title-content-color', $styledata[275], '', 'Color', 'Select Your Title Content Color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content', 'color');
                                                echo OxiAddonsADMHelpFontSettings('OxiAddInfoBanner-title-content', 277, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-title-content-padding', 283, $styledata, 1, 'Padding', 'Set Your Title Content Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content', 'padding');
                                           ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsInfoBanner-H-TB', $stylefiles[2], 'Heading Two', 'Set Banner Heading', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddInfoBanner-heading-size', $styledata[115], $styledata[116], $styledata[117], 1, 'Font Size', 'Select Your Heading Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-heading', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfoBanner-heading-color', $styledata[119], '', 'Color', 'Select Your Heading Color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-heading', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddInfoBanner-heading', 121, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-heading-padding', 127, $styledata, 1, 'Padding', 'Set Your Heading Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-heading', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddonsInfoBanner-SD-TA', $stylefiles[4], 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddInfoBanner-content-size', $styledata[143], $styledata[144], $styledata[145], 1, 'Font Size', 'Select Your Content Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfoBanner-content-color', $styledata[147], '', 'Color', 'Select Your Content Color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddInfoBanner-content', 149, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfoBanner-content-padding', 155, $styledata, 1, 'Padding', 'Set Your Content Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-boxes-content', 'padding');
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
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("OxiAddInfoBanner-nonce") ?>
                        </div>

                    </div>

                </form>

            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Icon Boxes Rearrange', $listdata, 1, 'title');
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
                    <?php echo oxi_info_banner_style_6_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('OxiAddInfoBanner-i-class', $listitemdata[3], 'Icon Class', 'Set your Icon Class');
                    echo oxi_addons_adm_help_textbox(' OxiAddInfoBanner-i-title', $listitemdata[1], 'Icon Text', 'Set your Icon text');
                    echo oxi_addons_adm_help_form_textarea('OxiAddInfoBanner-i-content', $listitemdata[5], 'Content', 'Write your Icon content', 'false');
                
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









