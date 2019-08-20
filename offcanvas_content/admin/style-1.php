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
                . ' OxiAddonsOC-SB-BG |' . sanitize_text_field($_POST['OxiAddonsOC-SB-BG']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOC-SB-W') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-SB-P') . ''
                . ' OxiAddonsOC-FW-BG |' . sanitize_text_field($_POST['OxiAddonsOC-FW-BG']) . '|'
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOC-CI-FS') . ''
                . ' OxiAddonsOC-CI-C |' . sanitize_hex_color($_POST['OxiAddonsOC-CI-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-CI-P') . ''
                . ' OxiAddonsOC-C-TA |' . sanitize_text_field($_POST['OxiAddonsOC-C-TA']) . '|'
                . ' OxiAddonsOC-C-tab |' . sanitize_text_field($_POST['OxiAddonsOC-C-tab']) . '|'
                . ' ||||||||||||||||'
                . ' ||||||||||||||||'
                
                
                
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOC-B-FS') . ''
                . ' OxiAddonsOC-B-C |' . sanitize_hex_color($_POST['OxiAddonsOC-B-C']) . '|'
                . ' OxiAddonsOC-B-BG |' . sanitize_text_field($_POST['OxiAddonsOC-B-BG']) . '|'
                . ' OxiAddonsOC-B-H-C |' . sanitize_hex_color($_POST['OxiAddonsOC-B-H-C']) . '|'
                . ' OxiAddonsOC-B-H-BG |' . sanitize_text_field($_POST['OxiAddonsOC-B-H-BG']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsOC-B') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsOC-B-B') . ''
                . ' OxiAddonsOC-B-BC |' . sanitize_hex_color($_POST['OxiAddonsOC-B-BC']) . '|'
                . ' OxiAddonsOC-B-BC-H |' . sanitize_hex_color($_POST['OxiAddonsOC-B-BC-H']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-B-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-B-M') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOC-BI-FS') . ''
                . ' OxiAddonsOC-BI-C |' . sanitize_hex_color($_POST['OxiAddonsOC-BI-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-BI-P') . ''

                . '||#||'
                . ' OxiAddonsOC-BT-O ||#||' . sanitize_text_field($_POST['OxiAddonsOC-BT-O']) . '||#|| '
                . ' OxiAddonsOC-BT-T ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsOC-BT-T']) . '||#|| '
                . ' OxiAddonsOC-BT-TH ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOC-BT-TH']) . '||#|| '
                . ' OxiAddonsOC-CI ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsOC-CI']) . '||#|| '
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
                                <li  ref="#oxi-addons-tabs-2">Off Canvas Settings</li>
                                <li  ref="#oxi-addons-tabs-3">Off Canvas Content</li>
                            </ul>  
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsOC-BT-O', $stylefiles[2], 'Button Text', 'Set Your Button Text, Supported native Language', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsOC-BT-T', $stylefiles[4], 'Icon Class', 'Set Your Social Icon Class', 'false');
                                            ?>
                                        </div>
                                     </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsOC-B-FS', $styledata[85], $styledata[86], $styledata[87], '1', 'Font Size', 'Set Your Button Font Size', 'true', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-text', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-B-C', $styledata[89], '', 'Color', 'Set Your Button  Color', 'false', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-text', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-B-BG', $styledata[91], 'rgba', 'Background', 'Set Your Button  Background', 'false', ' .oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-link', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsOC-B', 97, $styledata, 'true', ' .oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-button');
                                            echo oxi_addons_adm_help_border('OxiAddonsOC-B-B', $styledata[103], $styledata[104], 'Border', 'Set your Button Border Size and Type', 'true', ' .oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-link', 'border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-B-BC', $styledata[107], '', 'Border Color', 'Set Your Button  Border Color', 'true', ' .oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-link', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-B-BR', 111, $styledata, '1', 'Border Radius', 'Set your Button Border Radius', 'true', ' .oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-link', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-B-P', 127, $styledata, '1', 'Padding', 'Set your Button Padding', 'true', ' .oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-B-M', 143, $styledata, '1', 'Margin', 'Set your Button Margin', 'true', ' .oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-link', 'margin');
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
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-B-H-C', $styledata[93], '', 'Hover Color', 'Set Your Button Hover Color', 'false', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-B-H-BG', $styledata[95], 'rgba', 'Hover Background', 'Set Your Button Hover Background', 'false', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-B-BC-H', $styledata[109], '', 'Border Hover', 'Set Your Button  Border  Hover Color', 'true', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-link:hover', 'border-color');
                                            ?>
                                        </div>
                                     </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsOC-BI-FS', $styledata[159], $styledata[160], $styledata[161], '1', 'Icon Size', 'Set Your Button Icon Size', 'true', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-icon', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-BI-C', $styledata[163], '', 'Icon Color', 'Set Your  Button Icon Color', 'false', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-icon', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-BI-P', 165, $styledata, '1', 'Padding', 'Set your Button Icon Border Padding', 'true', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-C-button-icon', 'padding');
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
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-SB-BG', $styledata[3], 'rgba', 'Background', 'Set Your SideBar Background Color', 'false', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-Content', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsOC-SB-W', $styledata[5], $styledata[6], $styledata[7], '1', 'Width', 'Set Your SideBar Width', 'true', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-Content', 'width');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsOC-C-tab', $styledata[51], 'Left', 'left', 'Right', 'right', 'Sidebar Position', 'Set Your Sidebar Position', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-SB-P', 9, $styledata, '1', 'Padding', 'Set your  SideBar Padding', 'true', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-Content', 'padding');
                                             $NOJS = array(
                                            array('OxiAddonsOC-C-tab', 'SideBar Position'),
                                           
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
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-FW-BG', $styledata[25], 'rgba', 'Background', 'Set Your Full Width Background Color', 'false', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-conetent-overlay', 'background');
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
                                           echo oxi_addons_adm_help_textbox('OxiAddonsOC-CI', $stylefiles[8], 'Icon Class', 'Set Your Icon Class', 'false');
                                           echo oxi_addons_adm_help_number_dtm('OxiAddonsOC-CI-FS', $styledata[27], $styledata[28], $styledata[29], '1', 'Icon Size', 'Set Your Cross Icon Size', 'true', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-cross-icon', 'font-size');
                                           echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-CI-C', $styledata[31], '', 'Icon Color', 'Set Your  Cross Icon Color', 'false', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-cross-icon', 'background');
                                           echo oxi_addons_adm_help_Text_Align('OxiAddonsOC-C-TA', $styledata[49], 'Icon Position', 'Set Your Cross Icon Position', 'false', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-cross-icon', 'text-align');
                                           echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-CI-P', 33, $styledata, '1', 'Padding', 'Set your  Cross Icon Padding', 'true', '.oxi-addons-OC-' . $oxiid . ' .oxi-addons-OC-cross-icon', 'padding');
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
                                            <?php echo oxi_addons_adm_help_form_textarea('OxiAddonsOC-BT-TH', $stylefiles[6], 'OffCanvas Content', 'Give Your OffCanvas Content Here. You can use Shortcode Here', 'false'); ?>
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