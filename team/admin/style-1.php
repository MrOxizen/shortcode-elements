<?php
if (!defined('ABSPATH')) {
    exit;
}

oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-team-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddons-rows') . ''
            . '' . OxiAddonsBGImageSanitize('OxiAddons-BG') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-padding') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-margin') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddons-W') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddons-H') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddons-box-shadow') . '|'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddons-hover-box-shadow') . '|'
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddons-animation') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddons-name-fs') . ''
            . ' OxiAddons-name-C|' . sanitize_hex_color($_POST['OxiAddons-name-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-name') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-name-padding') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddons-named-w') . ''
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddons-named-b') . ''
            . 'OxiAddons-named|' . sanitize_text_field($_POST['OxiAddons-named']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-named-padding') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddons-dig-fs') . ''
            . ' OxiAddons-dig-C|' . sanitize_text_field($_POST['OxiAddons-dig-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-dig') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-dig-padding') . ''
            . ' OxiAddons-social-position|' . sanitize_text_field($_POST['OxiAddons-social-position']) . '|'
            . ' OxiAddons-social-P-BG|' . sanitize_text_field($_POST['OxiAddons-social-P-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-social-margin') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddons-social-ribbon') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddons-social-fs') . ''
            . ' OxiAddons-social-IC-color|' . sanitize_text_field($_POST['OxiAddons-social-IC-color']) . '|'
            . ' OxiAddons-social-C|' . sanitize_text_field($_POST['OxiAddons-social-C']) . '|'
            . ' OxiAddons-social-IC-BG|' . sanitize_text_field($_POST['OxiAddons-social-IC-BG']) . '|'
            . ' OxiAddons-social-BG|' . sanitize_text_field($_POST['OxiAddons-social-BG']) . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddons-social-width') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddons-social-height') . ''
            . ' OxiAddons-named-w|' . sanitize_text_field($_POST['OxiAddons-named-w']) . '|'
            . ' OxiAddons-named-jc|' . sanitize_text_field($_POST['OxiAddons-named-jc']) . '|'
            . '||||'
            . ' OxiAddons-social-IC-H-color|' . sanitize_text_field($_POST['OxiAddons-social-IC-H-color']) . '|'
            . ' OxiAddons-social-HC|' . sanitize_text_field($_POST['OxiAddons-social-HC']) . '|'
            . ' OxiAddons-social-IC-H-BG|' . sanitize_text_field($_POST['OxiAddons-social-IC-H-BG']) . '|'
            . ' OxiAddons-social-HBG|' . sanitize_text_field($_POST['OxiAddons-social-HBG']) . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int)$_POST['oxilistid'];

        if (isset($_POST['social_icons_class'])) {
            $icon = array_map('esc_attr', $_POST['social_icons_class']);
            $icon_link = array_map('esc_attr', $_POST['social_icons_url']);
            $LTColor = array_map('esc_attr', $_POST['LTColor']);
            $LTBGcolor = array_map('esc_attr', $_POST['LTBGcolor']);
            $LTHcolor = array_map('esc_attr', $_POST['LTHcolor']);
            $LTHBGcolor = array_map('esc_attr', $_POST['LTHBGcolor']);
            $count = count($icon);
            $socialdata = '';
            for ($i = 0; $i < $count; $i++) {
                if (!empty($icon[$i])) {
                    $socialdata .= OxiAddonsAdminFontAwesomeSenitize($icon[$i]) . '{|}{|}';
                    $socialdata .= $icon_link[$i] . '{|}{|}';
                    $socialdata .= $LTColor[$i] . '{|}{|}';
                    $socialdata .= $LTBGcolor[$i] . '{|}{|}';
                    $socialdata .= $LTHcolor[$i] . '{|}{|}';
                    $socialdata .= $LTHBGcolor[$i] . '{|}||{|}';
                }
            }
        }
        $data = 'OxiAddteamname||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddteamname']) . '||#||'
            . 'OxiAddteamdeg ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddteamdeg']) . '||#|| '
            . 'OxiAddons-IMG||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddons-IMG']) . '||#||'
            . 'OxiAddons-social||#||' . OxiAddonsADMHelpTextSenitize($socialdata) . '||#||'
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
        $item_id = (int)$_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
$listid = '';
$listitemdata = array("", "", "", "", "", "", "", "{|}{|}{|}{|}#fff{|}{|}#7a00b3{|}{|}#fff{|}{|}#b3008f{|}{|}", "");
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileEdit' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
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
                                <li ref="#oxi-addons-tabs-2">Social Icons</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddons-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo OxiAddonsADMHelpBGImage('OxiAddons-BG', $styledata, 7, 'true', '.oxi-addons-team-' . $oxiid . ' .member-info', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-padding', 11, $styledata, 1, 'Padding', 'Set Your Team Paddins Top Bottom and Left Right', 'true', '.oxi-addons-team-' . $oxiid . ' .member-info', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-margin', 27, $styledata, 1, 'Margin', 'Set Your Team  Margin Top Bottom and Left Right', 'true', '.oxi-addons-team-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Profile Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-W', $styledata[43], $styledata[44], $styledata[45], 1, 'Width', 'Select Your Image Width at Pixel', '', ' .oxi-addons-team-' . $oxiid . ' .oxi-team-show-body', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-H', $styledata[47], $styledata[48], $styledata[49], 1, 'Height', 'Select Your Image Height at Pixel', '', '.oxi-addons-team-' . $oxiid . ' .oxi-team-pic-size:after', 'padding-bottom');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddons-box-shadow', 51, $styledata, 'true', '.oxi-addons-team-' . $oxiid . ' .oxi-team-show');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddons-hover-box-shadow', 58, $styledata, 'true', '.oxi-addons-team-' . $oxiid . ' .oxi-team-show:hover');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddons-animation', 65, $styledata, 'true', '.oxi-addons-icon-boxes-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Team Name
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-name-fs', $styledata[69], $styledata[70], $styledata[71], 1, 'Font Size', 'Set Your Team Name Font Size', 'true', '.oxi-addons-team-' . $oxiid . ' .member-name', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddons-name-C', $styledata[73], 'hex', 'Color', 'Select Your Heading Color', 'false', '.oxi-addons-team-' . $oxiid . ' .member-name ', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddons-name', 75, $styledata, 'true', '.oxi-addons-team-' . $oxiid . ' .member-name ');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-name-padding', 81, $styledata, 1, 'Margin', 'Set Your Team Name Padding Top Bottom and Left Right', 'true', '.oxi-addons-team-' . $oxiid . ' .member-name ', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Team Name Divider
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Justify_Align('OxiAddons-named-jc', $styledata[197], 'Text Align', 'Set Your Divider Algin Left Right Center', 'true', '.oxi-addons-team-' . $oxiid . ' .member-divider ', 'justify-content');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-named-w', $styledata[97], $styledata[98], $styledata[99], 1, 'Width', 'Set Your Team Name Divider Width', 'true', '.oxi-addons-team-' . $oxiid . ' .member-divider  div', 'max-width');
                                            echo oxi_addons_adm_help_border('OxiAddons-named-b', $styledata[101], $styledata[102], 'Border', 'Set Your Divider As border Settings', 'true', '.oxi-addons-team-' . $oxiid . ' .member-divider  div', 'border-top');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddons-named', $styledata[105], 'hex', 'Border Color', 'Select Your Team Name Divider Color', '.oxi-addons-team-' . $oxiid . ' .member-divider  div', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-named-padding', 107, $styledata, 1, 'Margin', 'Set Your Team Name Margin Top Bottom and Left Right', 'true', '.oxi-addons-team-' . $oxiid . ' .member-divider ', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Team Dignation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-dig-fs', $styledata[123], $styledata[124], $styledata[125], 1, 'Font Size', 'Set Your Team Name Font Size', 'true', '.oxi-addons-team-' . $oxiid . ' span.member-role', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddons-dig-C', $styledata[127], 'hex', 'Color', 'Select Your Heading Hover Color', '.oxi-addons-team-' . $oxiid . ' span.member-role', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddons-dig', 129, $styledata, 'true', '.oxi-addons-team-' . $oxiid . ' span.member-role');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-dig-padding', 135, $styledata, 1, 'Padding', 'Set Your Team Name Padding Top Bottom and Left Right', 'true', '.oxi-addons-team-' . $oxiid . ' span.member-role', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Social Box
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-social-width', $styledata[187], $styledata[188], $styledata[189], 1, 'Width', 'Set Your Social icon Box Width Size', 'true', ' .oxi-addons-team-' . $oxiid . ' .member-icons', 'width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-social-height', $styledata[191], $styledata[192], $styledata[193], 1, 'Width', 'Set Your Social icon Box Width Size', 'true', '.oxi-addons-team-' . $oxiid . ' .member-icon .oxi-icons', 'line-height');
                                            echo oxi_addons_adm_help_true_false('OxiAddons-social-position', $styledata[151], 'Left', '', 'Right', 'oxi-team-right', 'Icon Position', 'Set your Icon Position Left or Right');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddons-social-P-BG', $styledata[153], 'rgba', 'Background', 'Select Your Socail Box Background Color', ' .oxi-addons-team-' . $oxiid . ' .member-icons', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-social-margin', 155, $styledata, 1, 'Margin', 'Set Your Team Name Margin Top Bottom and Left Right', 'true', ' .oxi-addons-team-' . $oxiid . ' .member-icons', 'padding');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-social-ribbon', $styledata[171], $styledata[172], $styledata[173], 1, 'Social Ribbon', 'Set Your Social Ribbon Size', 'true', ' .oxi-addons-team-' . $oxiid . ' .member-icons', 'left');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Social Icons
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-social-fs', $styledata[175], $styledata[176], $styledata[177], 1, 'Font Size', 'Set Your Team Name Font Size', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddons-social-IC-color', $styledata[179], 'Normal', 'normal', 'Separately', 'separately', 'Color Type', 'Set your Icon Color Normal or Separately.');
                                            if ($styledata[179] == 'normal') {
                                                echo oxi_addons_adm_help_MiniColor('OxiAddons-social-C', $styledata[181], 'hex', 'Color', 'Select Your Heading Hover Color');
                                            } else {
                                                echo OxiAddonsADMHelpInputHidden('OxiAddons-social-C', $styledata[181]);
                                            }
                                            echo oxi_addons_adm_help_true_false('OxiAddons-social-IC-BG', $styledata[183], 'Normal', 'normal', 'Separately', 'separately', 'Background Color Type', 'Set your Icon Color Normal or Separately.');
                                            if ($styledata[183] == 'normal') {
                                                echo oxi_addons_adm_help_MiniColor('OxiAddons-social-BG', $styledata[185], 'rgba', 'Background', 'Select Your Heading Hover Color');
                                            } else {
                                                echo OxiAddonsADMHelpInputHidden('OxiAddons-social-BG', $styledata[185]);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover Social Icons
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddons-social-IC-H-color', $styledata[203], 'Normal', 'normal', 'Separately', 'separately', 'Color Type', 'Set your Icon Color Normal or Separately.');
                                            if ($styledata[203] == 'normal') {
                                                echo oxi_addons_adm_help_MiniColor('OxiAddons-social-HC', $styledata[205], 'hex', 'Color', 'Select Your Heading Hover Color');
                                            } else {
                                                echo OxiAddonsADMHelpInputHidden('OxiAddons-social-HC', $styledata[205]);
                                            }
                                            echo oxi_addons_adm_help_true_false('OxiAddons-social-IC-H-BG', $styledata[207], 'Normal', 'normal', 'Separately', 'separately', 'Background Color Type', 'Set your Icon Color Normal or Separately.');
                                            if ($styledata[207] == 'normal') {
                                                echo oxi_addons_adm_help_MiniColor('OxiAddons-social-HBG', $styledata[209], 'rgba', 'Background', 'Select Your Heading Hover Color');
                                            } else {
                                                echo OxiAddonsADMHelpInputHidden('OxiAddons-social-HBG', $styledata[209]);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <?php

                                ?>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-team-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Team Rearrange', $listdata, 1, 'title');
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
                <div class="oxi-addons-style-left-preview" style="margin-top: 0; border-top: 0">
                    <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                        <?php echo oxi_team_style_1_shortcode($style, $listdata, 'admin') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textbox('OxiAddteamname', $listitemdata[1], 'Name', 'Give Your Team Members Name');
                    echo oxi_addons_adm_help_modal_textbox('OxiAddteamdeg', $listitemdata[3], 'Designation', 'Give Your Team Name');
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAddons-IMG', $listitemdata[5], 'Profile Image', 'Set Your Team Profile Image', 'false');
                    ?>
                    <div class="oxi-addons-content-div">
                        <div class="oxi-head">
                            Social Icons
                        </div>
                        <div class="oxi-addons-content-div-body">
                            <div class="list-group ui-sortable" style="margin-bottom: 15px" id="oxi_addons_sicial_icons_body">
                                <?php
                                $socialoutput = explode("{|}||{|}", $listitemdata[7]);

                                foreach ($socialoutput as $value) {
                                    if (!empty($value)) {
                                        $sociallistdata = explode("{|}{|}", $value);
                                        if ($styledata[179] == 'separately') {
                                            $LTcolor = '<div class="form-group row ">
                                                        <label for="LTColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Color">Color</label>
                                                        <div class="col-sm-6 addons-dtm-laptop-lock">
                                                            <input type="text" class="form-control oxi-addons-minicolor" name="LTColor[]" value="' . $sociallistdata[2] . '">  
                                                        </div>
                                                    </div>';
                                        } else {
                                            $LTcolor = ' ' . OxiAddonsADMHelpInputHidden('LTColor[]', $sociallistdata[2]) . '';
                                        }
                                        if ($styledata[183] == 'separately') {
                                            $LTBGcolor = '  <div class="form-group row ">
                                                            <label for="LTBGcolor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Background Color">Background</label>
                                                            <div class="col-sm-6 addons-dtm-laptop-lock">
                                                                <input type="text" data-format="rgb" data-opacity="true" class="form-control oxi-addons-minicolor" name="LTBGcolor[]" value="' . $sociallistdata[3] . '">  
                                                            </div>
                                                        </div>';
                                        } else {
                                            $LTBGcolor = ' ' . OxiAddonsADMHelpInputHidden('LTBGcolor[]', $sociallistdata[3]) . '';
                                        }
                                        if ($styledata[203] == 'separately') {
                                            $LTHcolor = '<div class="form-group row ">
                                                        <label for="LTHcolor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Hover Color">Hover Color</label>
                                                        <div class="col-sm-6 addons-dtm-laptop-lock">
                                                            <input type="text" class="form-control oxi-addons-minicolor" name="LTHcolor[]" value="' . $sociallistdata[4] . '">  
                                                        </div>
                                                    </div>';
                                        } else {
                                            $LTHcolor = ' ' . OxiAddonsADMHelpInputHidden('LTHcolor[]', $sociallistdata[3]) . '';
                                        }
                                        if ($styledata[207] == 'separately') {
                                            $LTHBGcolor = '  <div class="form-group row ">
                                                            <label for="LTHBGcolor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Icon Background Color">Hover Background</label>
                                                            <div class="col-sm-6 addons-dtm-laptop-lock">
                                                                <input type="text" data-format="rgb" data-opacity="true" class="form-control oxi-addons-minicolor" name="LTHBGcolor[]" value="' . $sociallistdata[5] . '">  
                                                            </div>
                                                        </div>';
                                        } else {
                                            $LTHBGcolor = ' ' . OxiAddonsADMHelpInputHidden('LTHBGcolor[]', $sociallistdata[5]) . '';
                                        }
                                        echo '<ul class="list-group-item list-group-item-action">
                                                    <li class="form-group row">
                                                        <div class="col-sm-5">
                                                            <input class="form-control mb-2" type="text" value="' . $sociallistdata[0] . '"  name="social_icons_class[]" placeholder="Icon Class">
                                                            <input class="form-control" type="text" value="' . $sociallistdata[1] . '"  name="social_icons_url[]" placeholder="Desire Url">
                                                        </div>
                                                        <div class="col-sm-5">
                                                            ' . ($LTcolor) . '
                                                            ' . ($LTBGcolor) . '
                                                            ' . $LTHcolor . '
                                                            ' . $LTHBGcolor . '
                                                        </div>
                                                        <div class="col-sm-2 align-center">
                                                            <a href="#" class="btn btn-outline-danger btn-sm">' . oxi_addons_admin_font_awesome('fa-trash') . '</a>
                                                        </div>
                                                    </li>
                                                </ul>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <button class="btn btn-outline-info btn-sm" id="social-data-new-btn">Add New Social Icons</button>
                                </div>
                            </div>
                        </div>
                    </div>
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

<?php
$ListJQUERY = '';
if ($styledata[179] == 'separately') {
    $ListJQUERY .= '<div class="form-group row "> <label for="LTColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Color">Color</label> <div class="col-sm-6 addons-dtm-laptop-lock"> <input type="text" class="form-control oxi-addons-minicolor" name="LTColor[]" value="#ffffff">   </div></div>';
} else {
    $ListJQUERY .= '<input type="hidden"  name="LTColor[]" value="#ffffff">';
}
if ($styledata[183] == 'separately') {
    $ListJQUERY .= '  <div class="form-group row "> <label for="LTBGcolor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Background Color">Background</label> <div class="col-sm-6 addons-dtm-laptop-lock">  <input type="text" data-format="rgb" data-opacity="true"  class="form-control oxi-addons-minicolor" name="LTBGcolor[]" value="#b3008f">  </div>  </div>';
} else {
    $ListJQUERY .= '<input type="hidden"  name="LTBGcolor[]" value="#b3008f">';
}
if ($styledata[203] == 'separately') {
    $ListJQUERY .= '<div class="form-group row "> <label for="LTHcolor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Hover Color">Hover Color</label>    <div class="col-sm-6 addons-dtm-laptop-lock"> <input type="text" class="form-control oxi-addons-minicolor" name="LTHcolor[]" value="#ffffff">    </div> </div>';
} else {
    $ListJQUERY .= '<input type="hidden"  name="LTHcolor[]" value="#ffffff">';
}
if ($styledata[207] == 'separately') {
    $ListJQUERY .= ' <div class="form-group row "> <label for="LTHBGcolor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Icon Background Color">Hover Background</label> <div class="col-sm-6 addons-dtm-laptop-lock"> <input type="text" data-format="rgb" data-opacity="true"  class="form-control oxi-addons-minicolor" name="LTHBGcolor[]" value="#b3008f">   </div> </div>';
} else {
    $ListJQUERY .= '<input type="hidden"  name="LTBGcolor[]" value="#b3008f">';
}
?>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#social-data-new-btn').on('click', function() {
            jQuery("#oxi_addons_sicial_icons_body").append('<ul class="list-group-item list-group-item-action"><li class="form-group row"><div class="col-sm-5"><input class="form-control mb-2" type="text" value=""  name="social_icons_class[]" placeholder="Icon Class"><input class="form-control" type="text" value=""  name="social_icons_url[]" placeholder="Desire Url"> </div> <div class="col-sm-5">  <?php echo $ListJQUERY; ?> </div><div class="col-sm-2 align-center"> <a href="#" class="btn btn-outline-danger btn-sm"><?php echo oxi_addons_admin_font_awesome('fa-trash'); ?></a> </div></li> </ul>');
            jQuery('.oxi-addons-minicolor').each(function() {
                jQuery(this).minicolors({
                    control: jQuery(this).attr('data-control') || 'hue',
                    defaultValue: jQuery(this).attr('data-defaultValue') || '',
                    format: jQuery(this).attr('data-format') || 'hex',
                    keywords: jQuery(this).attr('data-keywords') || 'transparent' || 'initial' || 'inherit',
                    inline: jQuery(this).attr('data-inline') === 'true',
                    letterCase: jQuery(this).attr('data-letterCase') || 'lowercase',
                    opacity: jQuery(this).attr('data-opacity'),
                    position: jQuery(this).attr('data-position') || 'bottom left',
                    swatches: jQuery(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                    change: function(value, opacity) {
                        if (!value)
                            return;
                        if (opacity)
                            value += ', ' + opacity;
                        if (typeof console === 'object') {
                            console.log(value);
                        }
                    },
                    theme: 'bootstrap'
                });
            });
            return false;
        });
        jQuery('#oxi_addons_sicial_icons_body a').live('click', function() {
            r = confirm('Delete this Category?');
            if (r) {
                var id = jQuery(this).parent().find('.form-group.row');
                jQuery(this).closest('ul').remove();
            }
        });

    });
</script>