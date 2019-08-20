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
                . ' OxiAddonsOC-TH-SB-BG |' . sanitize_text_field($_POST['OxiAddonsOC-TH-SB-BG']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOC-TH-SB-W') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-TH-SB-P') . ''
                . ' OxiAddonsOC-TH-FW-BG |' . sanitize_text_field($_POST['OxiAddonsOC-TH-FW-BG']) . '|'
                
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsOC-TH-CI-FS') . ''
                . ' OxiAddonsOC-TH-CI-C |' . sanitize_hex_color($_POST['OxiAddonsOC-TH-CI-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsOC-TH-CI-P') . ''
                . ' OxiAddonsOC-TH-C-TA |' . sanitize_text_field($_POST['OxiAddonsOC-TH-C-TA']) . '|'
                . ' OxiAddonsOC-TH-C-tab |' . sanitize_text_field($_POST['OxiAddonsOC-TH-C-tab']) . '|'
                
               
                
                . '||#||'
                . ' OxiAddonsOC-TH-BT-O ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOC-TH-BT-O']) . '||#|| '
                . ' OxiAddonsOC-TH-BT-TH ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsOC-TH-BT-TH']) . '||#|| '
                . ' OxiAddonsOC-TH-C-T ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsOC-TH-C-T']) . '||#|| '
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
                                <div class="oxi-addons-col-12">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Short Code
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_form_textarea('OxiAddonsOC-TH-BT-O', $stylefiles[2], 'Short Code', 'Give Your OffCanvas Content Here. You can use Shortcode Here', 'false'); 
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
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-TH-SB-BG', $styledata[3], 'rgba', 'Background', 'Set Your SideBar Background Color', 'false', '.oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsOC-TH-SB-W', $styledata[5], $styledata[6], $styledata[7], '1', 'Width', 'Set Your SideBar Width', 'true', '.oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content', 'width');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsOC-TH-C-tab', $styledata[51], 'Left', 'left', 'Right', 'right', 'Sidebar Position', 'Set Your Sidebar Position', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-TH-SB-P', 9, $styledata, '1', 'Padding', 'Set your  SideBar Padding', 'true', '.oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-Content', 'padding');
                                             $NOJS = array(
                                            array('OxiAddonsOC-TH-C-tab', 'SideBar Position'),
                                           
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
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-TH-FW-BG', $styledata[25], 'rgba', 'Background', 'Set Your Full Width Background Color', 'false', '.oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-conetent-overlay', 'background');
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
                                           echo oxi_addons_adm_help_textbox('OxiAddonsOC-TH-C-T', $stylefiles[6], 'Icon Class', 'Set Your Icon Class', 'false');
                                           echo oxi_addons_adm_help_number_dtm('OxiAddonsOC-TH-CI-FS', $styledata[27], $styledata[28], $styledata[29], '1', 'Icon Size', 'Set Your Cross Icon Size', 'true', '.oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-cross-icon', 'font-size');
                                           echo oxi_addons_adm_help_MiniColor('OxiAddonsOC-TH-CI-C', $styledata[31], '', 'Icon Color', 'Set Your  Cross Icon Color', 'false', '.oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-cross-icon', 'background');
                                           echo oxi_addons_adm_help_Text_Align('OxiAddonsOC-TH-C-TA', $styledata[49], 'Icon Position', 'Set Your Cross Icon Position', 'false', '.oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-cross-icon', 'text-align');
                                           echo oxi_addons_adm_help_padding_margin('OxiAddonsOC-TH-CI-P', 33, $styledata, '1', 'Padding', 'Set your  Cross Icon Padding', 'true', '.oxi-addons-OC-TH-' . $oxiid . ' .oxi-addons-OC-TH-cross-icon', 'padding');
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
                                            <?php echo oxi_addons_adm_help_form_textarea('OxiAddonsOC-TH-BT-TH', $stylefiles[4], 'OffCanvas Content', 'Give Your OffCanvas Content Here. You can use Shortcode Here', 'false'); ?>
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