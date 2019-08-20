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
    if (!wp_verify_nonce($nonce, 'oxi-addons-footer-info-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' OxiAddonsOC-T-SB-BG |' . sanitize_text_field($_POST['OxiAddonsOC-T-SB-BG']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOC-T-SB-W') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-T-SB-P') . ''
                . ' OxiAddonsOC-T-FW-BG |' . sanitize_text_field($_POST['OxiAddonsOC-T-FW-BG']) . '|'
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOC-T-CI-FS') . ''
                . ' OxiAddonsOC-T-CI-C |' . sanitize_hex_color($_POST['OxiAddonsOC-T-CI-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-T-CI-P') . ''
                . ' OxiAddonsOC-T-C-TA |' . sanitize_text_field($_POST['OxiAddonsOC-T-C-TA']) . '|'
                . ' OxiAddonsOC-T-C-tab |' . sanitize_text_field($_POST['OxiAddonsOC-T-C-tab']) . '|'
                . ' ||||||||||||||||'
                . ' ||||||||||||||||'
                
               
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsOC-T-B-B') . ''
                . ' OxiAddonsOC-T-B-BC |' . sanitize_hex_color($_POST['OxiAddonsOC-T-B-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-T-B-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-T-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-T-B-M') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOC-T-CI-MW') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsOC-T-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsOC-T-animation') . ''
                . '||#||'
                . ' OxiAddonsOC-T-BT-O ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsOC-T-BT-O']) . '||#|| '
                . ' OxiAddonsOC-T-BT-TH ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOC-T-BT-TH']) . '||#|| '
                . ' OxiAddonsOC-T-C-T ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsOC-T-C-T']) . '||#|| '
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
                                <li  ref="#oxi-addons-tabs-2">Off Canvas Settings</li>
                                <li  ref="#oxi-addons-tabs-3">Off Canvas Content</li>
                            </ul>  
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_image_upload('OxiAddonsOC-T-BT-O', $stylefiles[2], 'Image', 'Set Your Event Banner Image', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsOC-T-CI-MW', $styledata[139], $styledata[140], $styledata[141], '1', 'Max Width', 'Set Your Body Max Width', 'true', '.oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-cross-icon', 'max-width');
                                            ?>
                                        </div>
                                     </div>
                                    <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsOC-T-B-Shadow', 143, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-row');
                                        ?>
                                    </div>
                                </div>
                                
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_border('OxiAddonsOC-T-B-B', $styledata[85], $styledata[86], 'Border', 'Set your Button Border Size and Type', 'true', ' .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-C-button-link', 'border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-T-B-BC', $styledata[89], '', 'Border Color', 'Set Your Button  Border Color', 'false', ' .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-C-button-link', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-T-B-BR', 91, $styledata, '1', 'Border Radius', 'Set your Button Border Radius', 'true', ' .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-C-button-link', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-T-B-P', 107, $styledata, '1', 'Padding', 'Set your Button Padding', 'true', ' .oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-C-button-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-T-B-M', 123, $styledata, '1', 'Margin', 'Set your Button Margin', 'true', ' .oxi-addons-OC-T-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                     </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsOC-T-animation', 149, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-row');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                               
                                
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                           SideBar Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                           <?php 
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-T-SB-BG', $styledata[3], 'rgba', 'Background', 'Set Your SideBar Background Color', 'false', '.oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsOC-T-SB-W', $styledata[5], $styledata[6], $styledata[7], '1', 'Width', 'Set Your SideBar Width', 'true', '.oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content', 'width');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsOC-T-C-tab', $styledata[51], 'Left', 'left', 'Right', 'right', 'Sidebar Position', 'Set Your Sidebar Position', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-T-SB-P', 9, $styledata, '1', 'Padding', 'Set your  SideBar Padding', 'true', '.oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-Content', 'padding');
                                             $NOJS = array(
                                            array('OxiAddonsOC-T-C-tab', 'SideBar Position'),
                                           
                                                );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?> 
                                            
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                           Full Width Background Color
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                           <?php 
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-T-FW-BG', $styledata[25], 'rgba', 'Background', 'Set Your Full Width Background Color', 'false', '.oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-conetent-overlay', 'background');
                                            ?> 
                                            
                                        </div>
                                    </div> 
                                </div> 
                                 <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                           Cross Icon Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                           <?php
                                           echo oxi_addons_adm_help_textbox('OxiAddonsOC-T-C-T', $stylefiles[6], 'Icon Class', 'Set Your Icon Class', 'false');
                                           echo oxi_addons_adm_help_number_dtm('OxiAddonsOC-T-CI-FS', $styledata[27], $styledata[28], $styledata[29], '1', 'Icon Size', 'Set Your Cross Icon Size', 'true', '.oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-cross-icon', 'font-size');
                                           echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-T-CI-C', $styledata[31], '', 'Icon Color', 'Set Your  Cross Icon Color', 'false', '.oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-cross-icon', 'background');
                                           echo oxi_addons_adm_help_Text_Align('OxiAddonsOC-T-C-TA', $styledata[49], 'Icon Position', 'Set Your Cross Icon Position', 'false', '.oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-cross-icon', 'text-align');
                                           echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-T-CI-P', 33, $styledata, '1', 'Padding', 'Set your  Cross Icon Padding', 'true', '.oxi-addons-OC-T-' . $oxiid . ' .oxi-addons-OC-T-cross-icon', 'padding');
                                           ?> 
                                            
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-3">
                                <div class="oxi-addons-col-12">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Off Canvas Content
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php echo oxi_addons_adm_help_form_textarea('OxiAddonsOC-T-BT-TH', $stylefiles[4], 'OffCanvas Content', 'Give Your OffCanvas Content Here. You can use Shortcode Here', 'false'); ?>
                                        </div>
                                    </div>  
                                </div> 
                            </div>
                            <div class="oxi-addons-setting-save">
                                <?php echo oxiaddonssettingsavedtmmode(); ?>
                                <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                                <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                                <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                                <?php wp_nonce_field("oxi-addons-footer-info-nonce") ?>
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