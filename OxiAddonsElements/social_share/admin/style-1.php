<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
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
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsSocialShare-social-FS') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsSocialShare-social-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsSocialShare-social-H') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsSocialShare-social-Stroke') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsSocialShare-social-hover-Stroke') . ''
            . ' OxiAddonsSocialShare-facebook-controls |' . sanitize_text_field($_POST['OxiAddonsSocialShare-facebook-controls']) . '|'
            . ' OxiAddonsSocialShare-facebook-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-facebook-icon-color']) . '|'
            . ' OxiAddonsSocialShare-facebook-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-facebook-BG']) . '|'
            . ' OxiAddonsSocialShare-facebook-hover-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-facebook-hover-icon-color']) . '|'
            . ' OxiAddonsSocialShare-facebook-HBG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-facebook-HBG']) . '|'
            . ' OxiAddonsSocialShare-twitter-controls |' . sanitize_text_field($_POST['OxiAddonsSocialShare-twitter-controls']) . '|'
            . ' OxiAddonsSocialShare-twitter-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-twitter-icon-color']) . '|'
            . ' OxiAddonsSocialShare-twitter-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-twitter-BG']) . '|'
            . ' OxiAddonsSocialShare-twitter-hover-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-twitter-hover-icon-color']) . '|'
            . ' OxiAddonsSocialShare-twitter-HBG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-twitter-HBG']) . '|'
            . ' OxiAddonsSocialShare-google-controls |' . sanitize_text_field($_POST['OxiAddonsSocialShare-google-controls']) . '|'
            . ' OxiAddonsSocialShare-google-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-google-icon-color']) . '|'
            . ' OxiAddonsSocialShare-google-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-google-BG']) . '|'
            . ' OxiAddonsSocialShare-google-hover-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-google-hover-icon-color']) . '|'
            . ' OxiAddonsSocialShare-google-HBG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-google-HBG']) . '|'
            . ' OxiAddonsSocialShare-linkedin-controls |' . sanitize_text_field($_POST['OxiAddonsSocialShare-linkedin-controls']) . '|'
            . ' OxiAddonsSocialShare-linkedin-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-linkedin-icon-color']) . '|'
            . ' OxiAddonsSocialShare-linkedin-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-linkedin-BG']) . '|'
            . ' OxiAddonsSocialShare-linkedin-hover-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-linkedin-hover-icon-color']) . '|'
            . ' OxiAddonsSocialShare-linkedin-HBG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-linkedin-HBG']) . '|'
            . ' OxiAddonsSocialShare-pinterest-controls |' . sanitize_text_field($_POST['OxiAddonsSocialShare-pinterest-controls']) . '|'
            . ' OxiAddonsSocialShare-pinterest-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-pinterest-icon-color']) . '|'
            . ' OxiAddonsSocialShare-pinterest-BG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-pinterest-BG']) . '|'
            . ' OxiAddonsSocialShare-pinterest-hover-icon-color |' . sanitize_hex_color($_POST['OxiAddonsSocialShare-pinterest-hover-icon-color']) . '|'
            . ' OxiAddonsSocialShare-pinterest-HBG |' . sanitize_text_field($_POST['OxiAddonsSocialShare-pinterest-HBG']) . '|'
            . '||#||'
            . ' OxiAddonsSocialShare-facebook-icon ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsSocialShare-facebook-icon']) . '||#||'
            . ' OxiAddonsSocialShare-twitter-icon ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsSocialShare-twitter-icon']) . '||#||'
            . ' OxiAddonsSocialShare-google-icon ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsSocialShare-google-icon']) . '||#||'
            . ' OxiAddonsSocialShare-linkedin-icon ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsSocialShare-linkedin-icon']) . '||#||'
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

// echo '<pre>';
// print_r($styledata);
// echo '</pre>'
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
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsSocialShare-G-M', 5, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsSocialShare-social-FS', $styledata[21], $styledata[22], $styledata[23], '', 'Icon Font Size', 'Set Social share Icon Font Size', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsSocialShare-social-W', $styledata[25], $styledata[26], $styledata[27], '', 'Max-width', 'Set Social share Button Max Width', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsSocialShare-social-H', $styledata[29], $styledata[30], $styledata[31], '', 'Max-height', 'Set Social share Button Max Height', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsSocialShare-social-Stroke', $styledata[33], $styledata[34], $styledata[35], '', 'Stroke Width', 'Set Social Share Hover Stroke Width', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsSocialShare-social-hover-Stroke', $styledata[37], $styledata[38], $styledata[39], '', 'Hover Stroke Width', 'Set Social Share Hover Stroke Width', 'true');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-social-FS', 'Icon Font Size'),
                                                array('OxiAddonsSocialShare-social-W', 'Width'),
                                                array('OxiAddonsSocialShare-social-H', 'Height'),
                                                array('OxiAddonsSocialShare-social-Stroke', 'Stroke Width'),
                                                array('OxiAddonsSocialShare-social-hover-Stroke', 'Stroke Hover Width'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
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
                                            echo oxi_addons_adm_help_true_false('OxiAddonsSocialShare-facebook-controls', $styledata[41], 'True', 'true', 'False', 'false', 'Facebook Control', 'Social Share Button Show or not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsSocialShare-facebook-icon', $stylefiles[2], 'Social Icon', 'Write your Social Icon');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-facebook-icon-color', $styledata[43], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'true', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-facebook-BG', $styledata[45], 'rgba', 'Background Color', 'Set Social share Button background color', 'true', '', '');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-facebook-icon-color', 'Color'),
                                                array('OxiAddonsSocialShare-facebook-BG', 'Background'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-facebook-hover-icon-color', $styledata[47], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'false', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-facebook-HBG', $styledata[49], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left:hover', 'background');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-facebook-hover-icon-color', 'Hover color'),
                                                array('OxiAddonsSocialShare-facebook-HBG', 'Hover Background'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Twitter Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsSocialShare-twitter-controls', $styledata[51], 'True', 'true', 'False', 'false', 'Twitter Control', 'Social Share Button Show or not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsSocialShare-twitter-icon', $stylefiles[4], 'Social Icon', 'Write your Social Icon');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-twitter-icon-color', $styledata[53], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'true', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-twitter-BG', $styledata[55], 'rgba', 'Background Color', 'Set Social share Button background color', 'true', '', '');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-twitter-icon-color', 'Color'),
                                                array('OxiAddonsSocialShare-twitter-BG', 'Background'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-twitter-hover-icon-color', $styledata[57], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'false', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-twitter-HBG', $styledata[59], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left:hover', 'background');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-twitter-hover-icon-color', 'Hover color'),
                                                array('OxiAddonsSocialShare-twitter-HBG', 'Hover Background'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Google+ Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsSocialShare-google-controls', $styledata[61], 'True', 'true', 'False', 'false', 'Google Control', 'Social Share Button Show or not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsSocialShare-google-icon', $stylefiles[6], 'Social Icon', 'Write your Social Icon');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-google-icon-color', $styledata[63], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'true', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-google-BG', $styledata[65], 'rgba', 'Background Color', 'Set Social share Button background color', 'true', '', '');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-google-icon-color', 'Color'),
                                                array('OxiAddonsSocialShare-google-BG', 'Background'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-google-hover-icon-color', $styledata[67], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'false', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-google-HBG', $styledata[69], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left:hover', 'background');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-google-hover-icon-color', 'Hover color'),
                                                array('OxiAddonsSocialShare-google-HBG', 'Hover Background'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Linkedin Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsSocialShare-linkedin-controls', $styledata[71], 'True', 'true', 'False', 'false', 'Linkedin Control', 'Audio Play Icon Show or not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsSocialShare-linkedin-icon', $stylefiles[8], 'Social Icon', 'Write your Social Icon');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-linkedin-icon-color', $styledata[73], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'true', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-linkedin-BG', $styledata[75], 'rgba', 'Background Color', 'Set Social share Button background color', 'true', '', '');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-linkedin-icon-color', 'Color'),
                                                array('OxiAddonsSocialShare-linkedin-BG', 'Background'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php

                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-linkedin-hover-icon-color', $styledata[77], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'false', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-linkedin-HBG', $styledata[79], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left:hover', 'background');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-linkedin-hover-icon-color', 'Hover color'),
                                                array('OxiAddonsSocialShare-linkedin-HBG', 'Hover Background'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Pinterest Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsSocialShare-pinterest-controls', $styledata[81], 'True', 'true', 'False', 'false', 'Pinterest Control', 'Audio Play Icon Show or not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsSocialShare-pinterest-icon', $stylefiles[10], 'Social Icon', 'Write your Social Icon');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-pinterest-icon-color', $styledata[83], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'true', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-pinterest-BG', $styledata[85], 'rgba', 'Background Color', 'Set Social share Button background color', 'true', '', '');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-pinterest-icon-color', 'Color'),
                                                array('OxiAddonsSocialShare-pinterest-BG', 'Background'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-pinterest-hover-icon-color', $styledata[87], '', 'Icon & Circle Color', 'Set Social share Icon And Circle color', 'false', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsSocialShare-pinterest-HBG', $styledata[89], 'rgba', 'Hover Back. Color', 'Set Banner Button Hover Background color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button-link-left:hover', 'background');
                                            $NOJS = array(
                                                array('OxiAddonsSocialShare-pinterest-hover-icon-color', 'Hover color'),
                                                array('OxiAddonsSocialShare-pinterest-HBG', 'Hover Background'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
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