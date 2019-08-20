<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' OxiAddonsSocialShare-G-Position |' . sanitize_text_field($_POST['OxiAddonsSocialShare-G-Position']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsSocialShare-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddIconBoxes-box-shadow') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddIconBoxes-hover-box-shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddons-animation') . ''
                . '||||'
                . ' ||'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsSocialShare-button-W') . ''
                . '||||||'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsSocialShare-Number-B') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsSocialShare-BR') . ''
                . '||||||||||||||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsSocialShare-button-M') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsSocialShare-hover-BR') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsSocialShare-button-icon-FS') . ''
               . '||||||||||||||||'
                . ' FB-C |' . sanitize_text_field($_POST['OxiAddonsSocialShare-facebook-controls']) . '|'
                . ' OxiAddonsSocialShare-facebook-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-facebook-icon-color']) . '|'
                . ' OxiAddonsSocialShare-facebook-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-facebook-BG']) . '|'
                . ' OxiAddonsSocialShare-facebook-Number-BC |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-facebook-Number-BC']) . '|'
                . ' OxiAddonsSocialShare-facebook-hover-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-facebook-hover-color']) . '|'
                . ' OxiAddonsSocialShare-facebook-hover-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-facebook-hover-BG']) . '|'
                . ' OxiAddonsSocialShare-facebook-hover-border-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-facebook-hover-border-color']) . '|'
                . ' OxiAddonsSocialShare-twitter-controls |' . sanitize_text_field($_POST['OxiAddonsSocialShare-twitter-controls']) . '|'
                . ' OxiAddonsSocialShare-twitter-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-twitter-icon-color']) . '|'
                . ' OxiAddonsSocialShare-twitter-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-twitter-BG']) . '|'
                . ' OxiAddonsSocialShare-twitter-Number-BC |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-twitter-Number-BC']) . '|'
                . ' OxiAddonsSocialShare-twitter-hover-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-twitter-hover-color']) . '|'
                . ' OxiAddonsSocialShare-twitter-hover-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-twitter-hover-BG']) . '|'
                . ' OxiAddonsSocialShare-twitter-hover-border-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-twitter-hover-border-color']) . '|'
                . ' OxiAddonsSocialShare-linkedin-controls |' . sanitize_text_field($_POST['OxiAddonsSocialShare-linkedin-controls']) . '|'
                . ' OxiAddonsSocialShare-linkedin-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-linkedin-icon-color']) . '|'
                . ' OxiAddonsSocialShare-linkedin-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-linkedin-BG']) . '|'
                . ' OxiAddonsSocialShare-linkedin-Number-BC |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-linkedin-Number-BC']) . '|'
                . ' OxiAddonsSocialShare-linkedin-hover-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-linkedin-hover-color']) . '|'
                . ' OxiAddonsSocialShare-linkedin-hover-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-linkedin-hover-BG']) . '|'
                . ' OxiAddonsSocialShare-linkedin-hover-border-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-linkedin-hover-border-color']) . '|'
                . ' OxiAddonsSocialShare-google-controls |' . sanitize_text_field($_POST['OxiAddonsSocialShare-google-controls']) . '|'
                . ' OxiAddonsSocialShare-google-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-google-icon-color']) . '|'
                . ' OxiAddonsSocialShare-google-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-google-BG']) . '|'
                . ' OxiAddonsSocialShare-google-Number-BC |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-google-Number-BC']) . '|'
                . ' OxiAddonsSocialShare-google-hover-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-google-hover-color']) . '|'
                . ' OxiAddonsSocialShare-google-hover-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-google-hover-BG']) . '|'
                . ' OxiAddonsSocialShare-google-hover-border-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-google-hover-border-color']) . '|'
                . ' OxiAddonsSocialShare-pinterest-controls |' . sanitize_text_field($_POST['OxiAddonsSocialShare-pinterest-controls']) . '|'
                . ' OxiAddonsSocialShare-pinterest-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-pinterest-icon-color']) . '|'
                . ' OxiAddonsSocialShare-pinterest-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-pinterest-BG']) . '|'
                . ' OxiAddonsSocialShare-pinterest-Number-BC |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-pinterest-Number-BC']) . '|'
                . ' OxiAddonsSocialShare-pinterest-hover-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-pinterest-hover-color']) . '|'
                . ' OxiAddonsSocialShare-pinterest-hover-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-pinterest-hover-BG']) . '|'
                . ' OxiAddonsSocialShare-pinterest-hover-border-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-pinterest-hover-border-color']) . '|'
                . '||#||'
                . ' ||#||||#||'
                . ' OxiAddonsSocialShare-facebook-icon ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsSocialShare-facebook-icon']) . '||#||'
                . '||#||||#||'
                . ' OxiAddonsSocialShare-twitter-icon ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsSocialShare-twitter-icon']) . '||#||'
                . '||#||||#||'
                . ' OxiAddonsSocialShare-linkedin-icon ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsSocialShare-linkedin-icon']) . '||#||'
                . '  ||#||||#||'
                . ' OxiAddonsSocialShare-google-icon ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsSocialShare-google-icon']) . '||#||'
                . '  ||#||||#||'
                . ' OxiAddonsSocialShare-pinterest-icon ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsSocialShare-pinterest-icon']) . '||#||'
                . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}



OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);

$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);

//echo '<pre>';
//print_r($styledata);
//echo '</pre>'
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
                                <li ref="#oxi-addons-tabs-2">Social Setting</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsSocialShare-G-Position', $styledata[3], 'Position', 'Set Your Social Share Button Position', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-wrapper-button', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsSocialShare-G-M', 5, $styledata, '1', 'Margin', 'Set body Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddIconBoxes-box-shadow', 21, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-share-circle');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddIconBoxes-hover-box-shadow', 27, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-share-circle:hover');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddons-animation', 33, $styledata, 'true', '.oxi-addons-main-share-circle');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Social Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            ?>
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsSocialShare-button-W', $styledata[43], $styledata[44], $styledata[45], '', 'Width Height', 'Set Social share width Height', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-share-circle', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsSocialShare-button-icon-FS', $styledata[121], $styledata[122], $styledata[123], '', 'Font Size', 'Set Social share Icon Font Size', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-icons', 'font-size');
                                            echo oxi_addons_adm_help_border('OxiAddonsSocialShare-Number-B', $styledata[53], $styledata[54], 'Border', 'Set Social share Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-share-circle');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsSocialShare-BR', 57, $styledata, 1, 'Border Radius', 'Set Social share Button Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-share-circle', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsSocialShare-button-M', 89, $styledata, 1, 'Margin', 'Set Social Share Button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-social', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsSocialShare-hover-BR', 105, $styledata, 1, 'Border Radius', 'Set Social share Button Hover Border Radius', '', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-share-circle:hover', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Facebook Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsSocialShare-facebook-controls', $styledata[141], 'True', 'true', 'False', 'false', 'Facebook Control', 'Social Share Button Show or not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsSocialShare-facebook-icon', $stylefiles[4], 'Social Icon', 'Write your Social Icon');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-facebook-icon-color', $styledata[143], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-facebook', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-facebook-BG', $styledata[145], 'rgba', 'Background Color', 'Set Social share Button background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-facebook', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-facebook-Number-BC', $styledata[147], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-facebook', 'border-color');
                                            ?>
                                        </div>

                                        <div class="oxi-head">
                                            Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-facebook-hover-color', $styledata[149], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-facebook:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-facebook-hover-BG', $styledata[151], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-facebook:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-facebook-hover-border-color', $styledata[153], '', 'Hover Border Color', 'Set Social share Icon And Circle color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-facebook:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Twitter Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsSocialShare-twitter-controls', $styledata[155], 'True', 'true', 'False', 'false', 'Twitter Control', 'Social Share Button Show or not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsSocialShare-twitter-icon', $stylefiles[8], 'Social Icon', 'Write your Social Icon');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-twitter-icon-color', $styledata[157], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-twitter', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-twitter-BG', $styledata[159], 'rgba', 'Background Color', 'Set Social share Button background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-twitter', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-twitter-Number-BC', $styledata[161], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-twitter', 'border-color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-twitter-hover-color', $styledata[163], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-twitter:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-twitter-hover-BG', $styledata[165], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-twitter:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-twitter-hover-border-color', $styledata[167], '', 'Hover Border Color', 'Set Social share Icon And Circle color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-twitter:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Linkedin Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsSocialShare-linkedin-controls', $styledata[169], 'True', 'true', 'False', 'false', 'Linkedin Control', 'Social Share Button Show or not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsSocialShare-linkedin-icon', $stylefiles[12], 'Social Icon', 'Write your Social Icon');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-linkedin-icon-color', $styledata[171], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-linkedin', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-linkedin-BG', $styledata[173], 'rgba', 'Background Color', 'Set Social share Button background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-linkedin', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-linkedin-Number-BC', $styledata[175], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-linkedin', 'border-color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-linkedin-hover-color', $styledata[177], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-linkedin:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-linkedin-hover-BG', $styledata[179], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-linkedin:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-linkedin-hover-border-color', $styledata[181], '', 'Hover Border Color', 'Set Social share Icon And Circle color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-linkedin:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Google Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsSocialShare-google-controls', $styledata[183], 'True', 'true', 'False', 'false', 'Google Control', 'Social Share Button Show or not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsSocialShare-google-icon', $stylefiles[16], 'Social Icon', 'Write your Social Icon');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-google-icon-color', $styledata[185], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-google', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-google-BG', $styledata[187], 'rgba', 'Background Color', 'Set Social share Button background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-google', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-google-Number-BC', $styledata[189], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-google', 'border-color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-google-hover-color', $styledata[191], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-google:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-google-hover-BG', $styledata[193], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-google:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-google-hover-border-color', $styledata[195], '', 'Hover Border Color', 'Set Social share Icon And Circle color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-google:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Pinterest Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsSocialShare-pinterest-controls', $styledata[197], 'True', 'true', 'False', 'false', 'Pinterest Control', 'Social Share Button Show or not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsSocialShare-pinterest-icon', $stylefiles[20], 'Social Icon', 'Write your Social Icon');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-pinterest-icon-color', $styledata[199], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-pinterest', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-pinterest-BG', $styledata[201], 'rgba', 'Background Color', 'Set Social share Button background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-pinterest', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-pinterest-Number-BC', $styledata[203], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-pinterest', 'border-color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-pinterest-hover-color', $styledata[205], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-pinterest:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-pinterest-hover-BG', $styledata[207], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-pinterest:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-pinterest-hover-border-color', $styledata[209], '', 'Hover Border Color', 'Set Social share Icon And Circle color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-pinterest:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-setting-save">
                                <?php echo oxiaddonssettingsavedtmmode(); ?>
                                <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                                <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                                <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                                <?php wp_nonce_field("oxi-addons-eventwidgets-nonce") ?>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
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
                    <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>