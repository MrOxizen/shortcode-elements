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
                . 'OxiAddonsPriceTable-G-BG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-G-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsPriceTable-G-CT') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-BW') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsPriceTable-G-Animation') . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsPriceTable-G-BS') . ''
                . 'OxiAddonsPriceTable-ribon |' . sanitize_text_field($_POST['OxiAddonsPriceTable-ribon']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-H') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-ribon-F') . ''
                . ' OxiAddonsPriceTable-ribon-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-ribon-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-ribon-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-P-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-P-F') . ''
                . ' OxiAddonsPriceTable-P-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-P-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-P-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-T-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-T-F') . ''
                . ' OxiAddonsPriceTable-T-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-T-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-T-P') . ''
                . ' OxiAddonsPriceTable-B-Tab |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-Tab']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-B-P') . ''
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-B-FS') . ''
                . ' OxiAddonsPriceTable-B-TC |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-B-TC']) . '|'
                . ' OxiAddonsPriceTable-B-BG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-BG']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-B-F') . ''
                . ' OxiAddonsPriceTable-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-B-HTC']) . '|'
                . ' OxiAddonsPriceTable-B-HBG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-HBG']) . '|'
                . ' OxiAddonsPriceTable-ribon-BG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-ribon-BG']) . '|'
                . ' OxiAddonsPriceTable-ribon-position |' . sanitize_text_field($_POST['OxiAddonsPriceTable-ribon-position']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-top-left') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-top-right') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-rotate') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-G-Max-Width') . ''
                . '||#||'
                . ' OxiAddonsPriceTable-scale ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-scale']) . '||#|| '
                . ' OxiAddonsPriceTable-hover-scale ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-hover-scale']) . '||#|| '
                . ' OxiAddonsPriceTable-hover-position ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-hover-position']) . '||#|| '
                . ' OxiAddonsPriceTable-ribon-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-ribon-TB']) . '||#|| '
                . ' OxiAddonsPriceTable-P-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-P-TB']) . '||#|| '
                . ' OxiAddonsPriceTable-T-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-T-TA']) . '||#|| '
                . ' OxiAddonsPriceTable-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-B-BT']) . '||#|| '
                . ' OxiAddonsPriceTable-B-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsPriceTable-B-BL']) . '||#|| '
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
                                <li ref="#oxi-addons-tabs-2">Button</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-G-Max-Width', $styledata[230], $styledata[231], $styledata[232], '1', 'Max-Width', 'Set Your Price Table Width', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'max-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-G-BG', $styledata[3], 'rgba', 'Background', 'Set Your Price Table Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'background');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsPriceTable-G-CT', 5, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'border');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-BW', 9, $styledata, 1, 'Border Width', 'Set Your Price Table  Border Width', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'border-width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-BR', 25, $styledata, 1, 'Border Radius', 'Set Your Price Table  Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'border-radius');
                                            echo  oxi_addons_adm_help_number('OxiAddonsPriceTable-scale',$stylefiles[2],'0.01','Scale','Set Price table Scale','.oxi-addons-wrapper-' . $oxiid . '','transform');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-P', 41, $styledata, 1, 'Padding', 'Set Your Price Table  Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-M', 57, $styledata, 1, 'Margin', 'Set Yout Price Table  Margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'padding');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsPriceTable-scale', 'Scale'),
                                                )
                                            );
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover Scale and Hover Position
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo  oxi_addons_adm_help_number('OxiAddonsPriceTable-hover-scale',$stylefiles[4],'0.01','Hover Scale','Set your Price Table Hover Scale','.oxi-addons-wrapper-' . $oxiid . ':hover','transform');
                                            echo  oxi_addons_adm_help_number('OxiAddonsPriceTable-hover-position',$stylefiles[6],'0.01','Hover Position','Set your Price Table hover Position','.oxi-addons-wrapper-' . $oxiid . ':hover','transform');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsPriceTable-hover-scale', 'Hover Scale'),
                                                    array('OxiAddonsPriceTable-hover-position', 'Translate'),
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
                                            echo oxi_addons_adm_help_Animation('OxiAddonsPriceTable-G-Animation', 73, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsPriceTable-G-BS', 78, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Ribon Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsPriceTable-ribon', $styledata[84], 'True', 'true', 'False', 'false', 'Ribon', 'Set Price table Ribon Show or Not', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsPriceTable-ribon-position', $styledata[216], 'Left', 'left', 'Right', 'right', 'Ribon Position', 'Set Your Price Table Ribon Position', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-ribon-TB', $stylefiles[8], 'Text', 'Write Your Ribon Text', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-W', $styledata[86], $styledata[87], $styledata[87], '1', 'Width', 'Set Your Price Table Ribon Width', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-H', $styledata[90], $styledata[91], $styledata[92], '1', 'Height', 'Set Your Price Table Ribon Height', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'height');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-top-left', $styledata[218], $styledata[219], $styledata[220], '1', 'Left Or Right', 'Set Your Price Table Ribon Position Left Or Right. If right you must select Ribon position right', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'left');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-top-right', $styledata[222], $styledata[223], $styledata[224], '1', 'Top', 'Set Your Price Table Ribon Position Top', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'top');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-rotate', $styledata[226], $styledata[227], $styledata[228], '1', 'Rotate', 'Write Your Ribon Rotate Angle', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-FS', $styledata[94], $styledata[95], $styledata[96], '1', 'Font Size', 'Set Your Price Table Ribon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-ribon-C', $styledata[104], '', 'Color', 'Set Your Price Table Ribon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-ribon-BG', $styledata[214], 'rgba', 'Background Color', 'Set Your Price Table Ribon Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-ribon-F', 98, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-ribon-P', 106, $styledata, 1, 'Padding', 'Set Your Price Table Ribon Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'padding');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Price Box  Title Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-T-TA', $stylefiles[12], 'Price', 'Write Your Price title', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-T-FS', $styledata[150], $styledata[151], $styledata[152], '2', 'Font Size', 'Set Price Title Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-T-C', $styledata[160], '', 'Color', 'Set Price Title Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-T-F', 154, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-T-P', 162, $styledata, 1, 'Padding', 'Set Price Title Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Price Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-P-TB', $stylefiles[10], 'Price', 'Write Your Price for Price Table', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-P-FS', $styledata[122], $styledata[123], $styledata[124], '1', 'Font Size', 'Set Price Table Price text Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-P-C', $styledata[132], '', 'Color', 'Set Price Table Price Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-P-F', 126, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-P-P', 134, $styledata, 1, 'Padding', 'Set Price Table Price Text Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price', 'padding');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-B-BT', $stylefiles[14], 'Button Text', 'Set Price Table Button Text', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-B-BL', $stylefiles[16], 'Button Link', 'Set Price Table Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsPriceTable-B-Tab', $styledata[178], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-B-P', 180, $styledata, 1, 'Padding', 'Set Price Table Button padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-B-FS', $styledata[196], $styledata[197], $styledata[198], '', 'Font Size', 'Set Price Table Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-TC', $styledata[200], '', 'Text Color', 'Set Price Table Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-BG', $styledata[202], 'rgba', 'Background Color', 'Set Price Table Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-B-F', 204, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-HTC', $styledata[210], '', 'Color', 'Set Price Table Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-HBG', $styledata[212], 'rgba', 'Background Color', 'Set Price Table Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-button .oxi-addons-link:hover', 'background');
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
<script>
    jQuery(document).ready(function () {
        jQuery("#OxiAddonsPriceTable-ribon-rotate").on("change", function () {
            var val = jQuery(this).val();
            jQuery("<style type = 'text/css'>#oxi-addons-preview-data .oxi-addons-wrapper-<?php echo $oxiid; ?> .oxi-addons-ribon{ transform: rotate(" + val + "deg); } </style>").appendTo("#oxi-addons-preview-data");
        });
    });
</script>