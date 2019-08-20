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
                . '' . OxiAddonsBGImageSanitize('OxiAddonsBanner-G-BG') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-G-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-I-FS') . ''
                . ' OxiAddonsBanner-I-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-I-TC']) . '|'
                . ' OxiAddonsBanner-I-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-I-HTC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-I-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-I-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-H-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-H-F') . ''
                . ' OxiAddonsBanner-H-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-H-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-H-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-H-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-Line-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-Line-H') . ''
                . ' OxiAddonsBanner-Line-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-Line-BG']) . '|'
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-Line-Animation') . '|'
                . ' OxiAddonsBanner-B-Tab |' . sanitize_text_field($_POST['OxiAddonsBanner-B-Tab']) . '|'
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-B-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-B-F') . ''
                . ' OxiAddonsBanner-B-TC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-TC']) . '|'
                . ' OxiAddonsBanner-B-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-BS') . ''
                . ' OxiAddonsBanner-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-HTC']) . '|'
                . ' OxiAddonsBanner-B-HBG |' . sanitize_text_field($_POST['OxiAddonsBanner-B-HBG']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsBanner-B-HBS') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsBanner-B-B') . ''
                . ' OxiAddonsBanner-B-BC |' . sanitize_hex_color($_POST['OxiAddonsBanner-B-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-B-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-B-Animation') . '|'
                . ' OxiAddonsBanner-I-PS |' . sanitize_text_field($_POST['OxiAddonsBanner-I-PS']) . '|'
                . ' OxiAddonsBanner-B-PS |' . sanitize_text_field($_POST['OxiAddonsBanner-B-PS']) . '|'
                . ' OxiAddonsBanner-B-HBC |' . sanitize_text_field($_POST['OxiAddonsBanner-B-HBC']) . '|'
                . '||#||'
                . ' OxiAddonsBanner-I-IB ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsBanner-I-IB']) . '||#|| '
                . ' OxiAddonsBanner-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-H-TB']) . '||#|| '
                . ' OxiAddonsBanner-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-B-BT']) . '||#|| '
                . ' OxiAddonsBanner-B-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-B-BL']) . '||#|| '
                . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
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
                                <li  ref="#oxi-addons-tabs-2">Button</li>  
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsBanner-G-BG', $styledata, 3, 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-G-P', 7, $styledata, 1, 'Padding', 'Set Banner  padding', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-I-IB', $stylefiles[2], 'Icon', 'Set FontAwesome Icon class Name for Button', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-I-FS', $styledata[23], $styledata[24], $styledata[25], '', 'Font Size', 'Set Banner Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-icon .oxi-addons-icon', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-I-TC', $styledata[27], '', 'Icon Color', 'Set Banner Icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-icon .oxi-addons-icon', 'color');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-I-PS', $styledata[191], 'Position', 'Set Banner Icon Position', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-icon', 'text-align');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-I-HTC', $styledata[29], '', 'Hover Color', 'Set Banner Hover Icon color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-icon .oxi-addons-icon .oxi-icons:hover', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-I-P', 31, $styledata, 1, 'Padding', 'Set Banner icon front Image padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-icon .oxi-addons-icon', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-I-Animation', 47, $styledata, 'true', '.oxi-addons-icon');
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-H-TB', $stylefiles[4], 'Heading', 'Set Banner Heading', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-heading');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-H-FS', $styledata[52], $styledata[53], $styledata[54], '1', 'Font Size', 'Set Banner Heading Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-heading', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-H-C', $styledata[62], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-heading', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-H-F', 56, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-H-P', 64, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-heading', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-H-Animation', 80, $styledata, 'true', '.oxi-addons-main-heading');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            line
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsBanner-Line-W', $styledata[85], $styledata[86], $styledata[87], 'OxiAddonsBanner-Line-H', $styledata[89], $styledata[90], $styledata[91], 1, 'Width Height', 'Set Banner Line width and height | example: width:5px; height: 100%', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-Line-BG', $styledata[93], '', 'Background', 'Set Banner Line Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-icon .oxi-addons-line::before', 'background');
                                            echo OxiAddonsADMHelpNoJquery(
                                                    array(
                                                        array('OxiAddonsBanner-Line-W', 'width'),
                                                        array('OxiAddonsBanner-Line-H', 'height'),
                                                    )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-Line-Animation', 95, $styledata, 'true', '.oxi-addons-line');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-BT', $stylefiles[6], 'Button Text', 'Set Banner Button Text', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsBanner-B-BL', $stylefiles[8], 'Button Link', 'Set Banner Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsBanner-B-Tab', $styledata[100], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-P', 154, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-M', 170, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-BS', 132, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsBanner-B-HBS', 142, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link:hover');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Position
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-B-PS', $styledata[193], 'Position', 'Set Banner button Position', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button', 'text-align');
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-B-FS', $styledata[102], $styledata[103], $styledata[104], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-TC', $styledata[112], '', 'Text Color', 'Set Banner Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-BG', $styledata[114], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsBanner-B-B', $styledata[148], $styledata[149], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-BC', $styledata[152], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-B-F', 106, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-B-BR', 116, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'border-radius');
                                            ?>
                                        </div>
                                         <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-HTC', $styledata[138], '', 'Color', 'Set Banner Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-HBG', $styledata[140], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-B-HBC', $styledata[195], '', 'Border Color', 'Set Banner Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link:hover', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsBanner-B-Animation', 186, $styledata, 'true', '.oxi-addons-main-button');
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
                            <?php wp_nonce_field("oxi-addons-eventwidgets-nonce") ?>
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