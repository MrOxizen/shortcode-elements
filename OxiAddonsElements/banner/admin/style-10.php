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
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-H-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-H-F') . ''
                . ' OxiAddonsBanner-H-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-H-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-H-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-H-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-Line-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-Line-H') . ''
                . ' OxiAddonsBanner-Line-BG |' . sanitize_text_field($_POST['OxiAddonsBanner-Line-BG']) . '|'
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-Line-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-SD-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsBanner-SD-F') . ''
                . ' OxiAddonsBanner-SD-C |' . sanitize_hex_color($_POST['OxiAddonsBanner-SD-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-SD-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-SD-Animation') . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-F-IMG-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsBanner-F-IMG-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsBanner-F-IMG-P') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsBanner-F-IMG-Animation') . '|'
                . ' OxiAddonsBanner-F-IMG-PS |' . sanitize_text_field($_POST['OxiAddonsBanner-F-IMG-PS']) . '|'
                . '||#||'
                . ' OxiAddonsBanner-H-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-H-TB']) . '||#|| '
                . ' OxiAddonsBanner-SD-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsBanner-SD-TA']) . '||#|| '
                . ' OxiAddonsBanner-F-IMG ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsBanner-F-IMG']) . '||#|| '
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
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsBanner-G-BG', $styledata, 3, 'true','.oxi-addons-wrapper-' . $oxiid . '','background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-G-P', 7, $styledata, 1, 'Padding', 'Set Banner  padding', 'true','.oxi-addons-wrapper-' . $oxiid . '','padding');
                                        ?>
                                    </div>
                                </div>
                                 <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Short Details
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textarea('OxiAddonsBanner-SD-TA', $stylefiles[4], 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-SD-FS', $styledata[71], $styledata[72], $styledata[73], '2', 'Font Size', 'Set Banner Short details Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-SD-C', $styledata[81], '', 'Color', 'Set Banner Short Details Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-SD-F', 75, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-SD-P', 83, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-details','padding');
                                        
                                        ?>
                                    </div>
                                     <div class="oxi-head">
                                        Short Details Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsBanner-SD-Animation', 99, $styledata, 'true','.oxi-addons-details');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Line
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_double_dtm('OxiAddonsBanner-Line-W', $styledata[56], $styledata[57], $styledata[58], 'OxiAddonsBanner-Line-H', $styledata[60], $styledata[61], $styledata[62], 1, 'Width Height', 'Set Banner Line width and height | example: width:5px; height: 100%', 'true');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-Line-BG', $styledata[64], '', 'Background', 'Set Banner Line Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-header .oxi-addons-line::before', 'background');
                                        echo OxiAddonsADMHelpNoJquery(
                                            array(
                                                array('OxiAddonsBanner-Line-W','width'),
                                                array('OxiAddonsBanner-Line-H','height'),
                                            )
                                        );
                                        ?>
                                    </div>
                                     <div class="oxi-head">
                                        Line Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                       echo oxi_addons_adm_help_Animation('OxiAddonsBanner-Line-Animation', 66, $styledata, 'true','.oxi-addons-line');
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Front Image
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Text_Align('OxiAddonsBanner-F-IMG-PS', $styledata[133], 'Position', 'Set Your Banner Front Image Position', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-images', 'text-align');
                                        echo oxi_addons_adm_help_image_upload('OxiAddonsBanner-F-IMG', $stylefiles[6], 'Image', 'Set Your Banner Front Image', 'true');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-F-IMG-W', $styledata[104], $styledata[105], $styledata[106], 1, 'Width', 'Set Banner Line width','true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-images .oxi-addons-img','width');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-F-IMG-P', 112, $styledata, 1, 'Padding', 'Set Banner Short Details Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-images','padding');
                                        
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                       Image Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                         echo oxi_addons_adm_help_Animation('OxiAddonsBanner-F-IMG-Animation', 128, $styledata, 'true','.oxi-addons-images');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsBanner-H-TB', $stylefiles[2], 'Heading', 'Set Banner Heading', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsBanner-H-C', $styledata[33], '', 'Color', 'Set Banner Heading Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading', 'color');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsBanner-H-FS', $styledata[23], $styledata[24], $styledata[25], '1', 'Font Size', 'Set Banner Heading Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsBanner-H-F', 27, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsBanner-H-P', 35, $styledata, 1, 'Padding', 'Set Banner  Banner Heading Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main .oxi-addons-heading','padding');
                                        ?>
                                    </div>
                                     <div class="oxi-head">
                                        Heading Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsBanner-H-Animation', 51, $styledata, 'true','.oxi-addons-heading');
                                        ?>
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