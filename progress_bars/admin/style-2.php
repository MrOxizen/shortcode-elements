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
$listitemdata = $bgdata = array("", "", "", "", "", "", "", "","","","","");

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-icon-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsProgressBar-rows') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProgressBar-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProgressBar-G-M') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsProgressBar-animation') . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProgressBar-BS') . ''
                . ' OxiAddonsProgressBar-G-BG |' . sanitize_text_field($_POST['OxiAddonsProgressBar-G-BG']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProgressBar-PN-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProgressBar-PN-F') . ''
                . ' OxiAddonsProgressBar-PN-C |' . sanitize_hex_color($_POST['OxiAddonsProgressBar-PN-C']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProgressBar-PN-P') . '' 
                . '||'
                . '||' 
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProgressBar-Progress-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsProgressBar-Progress-F') . ''
                . ' OxiAddonsProgressBar-Progress-C |' . sanitize_hex_color($_POST['OxiAddonsProgressBar-Progress-C']) . '|' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProgressBar-Progress-P') . '' 
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProgressBar-PBS-B-height') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsProgressBar-PBS-F-height') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProgressBar-PBS-B-BR') . '' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsProgressBar-PBS-F-BR') . '' 
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsProgressBar-PBS-BS') . ''
                . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = '   OxiAddonsProgressBar-Percent-setting ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProgressBar-Percent-setting']) . '||#||'  
                . ' OxiAddonsProgressBar-P-name ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProgressBar-P-name']) . '||#|| ' 
                . ' OxiAddonsProgressBar-P-B-color ||#||' . sanitize_text_field($_POST['OxiAddonsProgressBar-P-B-color']) . '||#|| ' 
                . ' OxiAddonsProgressBar-P-F-color ||#||' . sanitize_text_field($_POST['OxiAddonsProgressBar-P-F-color']) . '||#|| '  
                . ' OxiAddonsProgressBar-animate ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsProgressBar-animate']) . '||#|| ' 
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
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsProgressBar-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProgressBar-G-BG', $styledata[50], 'rgba', 'Background', 'Set Your Progress Bar Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProgressBar-G-P', 7, $styledata, 1, 'Padding', 'Set Your Progress Bar Padding', 'true','.oxi-addons-main-wrapper-' . $oxiid . '','padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProgressBar-G-M', 23, $styledata, 1, 'Margin', 'Set Yout Progress Bar Margin', 'true','.oxi-addons-parent-wrapper-'.$oxiid.'','padding');
                                          ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsProgressBar-BS', 44, $styledata,'','.oxi-addons-main-wrapper-' . $oxiid . '');
                                        ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsProgressBar-animation', 39, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Progress Bar Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProgressBar-PBS-B-height', $styledata[112], $styledata[113], $styledata[114], '1', 'Back Max-Height', 'Set Your Progress Bar Back Part Max Height', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-bar', 'padding');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProgressBar-PBS-F-height', $styledata[116], $styledata[117], $styledata[118], '1', 'Front Max-Height', 'Set Your Progress Bar Front Part Max Height', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-line', 'height');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProgressBar-PBS-B-BR', 120, $styledata, 1, 'Back Border radius', 'Set Yout Progress Bar Back Part Border Radius', 'true','.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-bar','border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProgressBar-PBS-F-BR', 136, $styledata, 1, 'Front Border radius', 'Set Yout Progress Bar Front Part Border Radius', 'true','.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-line','border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Progress Bar Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsProgressBar-PBS-BS', 152, $styledata,'true','.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-bar');
                                        ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Progress Name setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProgressBar-PN-FS', $styledata[52], $styledata[53], $styledata[54], '1', 'Font Size', 'Set Your Progress Bar title Font Size', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProgressBar-PN-C', $styledata[62], '', 'Color', 'Set Your Progress Bar title Color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProgressBar-PN-F', 56, $styledata,'true','.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProgressBar-PN-P', 64, $styledata, 1, 'Padding', 'Set Your Progress Bar title  Padding', 'true','.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-title','padding');
                                             ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Progress Percent Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsProgressBar-Progress-FS', $styledata[84], $styledata[85], $styledata[86], '2', 'Font Size', 'Set Your Progress Bar percentage Font Size', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-percentage', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsProgressBar-Progress-C', $styledata[94], '', 'Color', 'Set Your Progress Bar percentage color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-percentage', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsProgressBar-Progress-F', 88, $styledata,'true','.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-percentage');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsProgressBar-Progress-P', 96, $styledata, 1, 'Padding', 'Set Your Progress Bar percentage Padding', 'true','.oxi-addons-main-wrapper-' . $oxiid . '  .oxi-addons-progress-percentage','padding');
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
                            <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-icon-nonce") ?>
                        </div>
                    </div>

                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Price Table Rearrange',$listdata,1,'title');
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
                    <?php echo oxi_progress_bars_style_2_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                     echo oxi_addons_adm_help_textbox('OxiAddonsProgressBar-Percent-setting', $listitemdata[1], 'Percent', 'Set Your Progress Bar Percent', 'false');
                     echo oxi_addons_adm_help_textbox('OxiAddonsProgressBar-P-name', $listitemdata[3], 'Progress Name', 'Set Your Progress Bar Progress Name', 'false');
                     echo oxi_addons_adm_help_MiniColor('OxiAddonsProgressBar-P-B-color', $listitemdata[5], 'rgba', 'Back Color', 'Set Progress Bar Back Background Color', 'false');
                     echo oxi_addons_adm_help_MiniColor('OxiAddonsProgressBar-P-F-color', $listitemdata[7], 'rgba', 'Front Color', 'Set Progress Bar Front Color', 'false');
                      echo oxi_addons_adm_help_textbox('OxiAddonsProgressBar-animate', $listitemdata[9], 'Animate Speed', 'Set Your Progress Bar Animate Speed', 'false');
                     
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