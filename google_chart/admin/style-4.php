<?php
if (!defined('ABSPATH'))
    exit;
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
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsgooglechart-G-MW') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsgooglechart-G-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsgooglechart-B-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsgooglechart-B-H') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsgooglechart-OFF-FS') . ''   
            . ' OxiAddonsgooglechart-OFF-C |' . sanitize_hex_color($_POST['OxiAddonsgooglechart-OFF-C']) . '|'
            . ' ||||||'
            . ' ||||||||||||||||'
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsgooglechart-G-Animation') . '|'
            . ' ||||'
            . ' ||'
            . ' ||||'
            . ' ||'
                
            . ' OxiAddonsgooglechart-TT-BG |' . sanitize_text_field($_POST['OxiAddonsgooglechart-TT-BG']) . '|'    
                
            . ' ||'    
            . ' ||||'    
            . ' OxiAddonsgooglechart-TBT-C |' . sanitize_hex_color($_POST['OxiAddonsgooglechart-TBT-C']) . '|'    
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsgooglechart-TBT-FS') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsgooglechart-CB-BW') . '|'

                
                
                
          
                
            . '||#||'
             . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

$listid = '';
$listitemdata = $bgdata = array("", "", "", "", "", "", "", "", "", "", "", "");
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int)$_POST['oxilistid'];
        $data = '||#||OxiAddonsgooglechart-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsgooglechart-text']) . '||#|| '
                . ' OxiAddonsgooglechart-bar-BGC ||#||' . sanitize_text_field($_POST['OxiAddonsgooglechart-bar-BGC']) . '||#||'
                . ' OxiAddonsgooglechart-bar-BC ||#||' . sanitize_hex_color($_POST['OxiAddonsgooglechart-bar-BC']) . '||#||'
                . ' oxiAddonsgooglechart-value ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxiAddonsgooglechart-value']) . '||#|| '
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
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsgooglechart-G-MW', $styledata[3], $styledata[4], $styledata[5], 1, 'Max Width', 'Set Google Chart body max width', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist', 'max-width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsgooglechart-G-P', 7, $styledata, 1, 'Margin', 'Set Google Chart Body Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist', 'border-radius');
                                            $NOJS = array(
                                                array('OxiAddonsgooglechart-G-MW', 'Max Width'),
                                                array('OxiAddonsgooglechart-G-P', 'Margin'),
                                                );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsgooglechart-G-Animation', 59, $styledata, 'true', 'oxi-addons-wrapper-' . $oxiid . '');
                                            $NOJS = array(
                                                array('OxiAddonsgooglechart-G-Animation', 'Animation'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Chart Body Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsgooglechart-B-W', $styledata[23], $styledata[24], $styledata[25], 1, 'Max Width', 'Set Google Chart max width', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist', 'max-width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsgooglechart-B-H', $styledata[27], $styledata[28], $styledata[29], 1, 'Max Height', 'Set Google Chart max Height', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist', 'max-height');
                                            $NOJS = array(
                                                array('OxiAddonsgooglechart-B-W', 'Max Width'),
                                                array('OxiAddonsgooglechart-B-H', 'Max Height'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>
                                     
                                     
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                           Top Text Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                             echo oxi_addons_adm_help_number_dtm('OxiAddonsgooglechart-OFF-FS', $styledata[31], $styledata[32], $styledata[33], '1', 'Font Size', 'Set Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-title', 'font-size');
                                             echo oxi_addons_adm_help_MiniColor('OxiAddonsgooglechart-OFF-C', $styledata[35], '', 'Color', 'Set Google Chart Top  text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'color');
                                             $NOJS = array(
                                                array('OxiAddonsgooglechart-OFF-FS', 'Font Size'),
                                                array('OxiAddonsgooglechart-OFF-C', 'Color'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                             ?>
                                        </div>
                                    </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                          Chart Pointer Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                             echo oxi_addons_adm_help_number_dtm('OxiAddonsgooglechart-CB-BW', $styledata[90], $styledata[91], $styledata[92], '1', 'Border Width', 'Set Chart Pointer Border Width', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-title', 'font-size');
                                             $NOJS = array(
                                                array('OxiAddonsgooglechart-CB-BW', 'Border Width'),
                                               );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                             ?>
                                        </div>
                                    </div>
                                     <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                          ToolTip Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                             echo oxi_addons_adm_help_MiniColor('OxiAddonsgooglechart-TT-BG', $styledata[76], 'rgba', 'Background Color', 'Set ToolTip Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'color');
                                             $NOJS = array(
                                                array('OxiAddonsgooglechart-TT-BG', 'Background Color'),
                                               );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                             ?>
                                        </div>
                                       
                                        <div class="oxi-head">
                                          ToolTip body Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                             echo oxi_addons_adm_help_MiniColor('OxiAddonsgooglechart-TBT-C', $styledata[84], '', 'Color', 'Set ToolTip body  text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'color');
                                             echo oxi_addons_adm_help_number_dtm('OxiAddonsgooglechart-TBT-FS', $styledata[86], $styledata[87], $styledata[88], '1', 'Font Size', 'Set Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-title', 'font-size');
                                             $NOJS = array(
                                                array('OxiAddonsgooglechart-TBT-C', 'Color'),
                                                array('OxiAddonsgooglechart-TBT-FS', 'Font Size'),
                                               );
                                             echo OxiAddonsADMHelpNoJquery($NOJS);
                                             ?>
                                        </div>
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
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                 for($i = 0; $i<5; $i++){
                        $abc = count($listdata);
                        if($abc == $i){
                            echo oxi_addons_list_modal_open();
                        }
                    }
                    if($abc == 5){
                         echo '<p style="color:red;border: 1px solid #ddd; padding: 10px;background: #fff;font-weight: bold;">You Can\'t Insert More Than 5 Elements<p>';
                     }
                  
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Chart Rearrange', $listdata, 2, 'title');
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
                    <?php echo oxi_google_chart_style_4_shortcode($style, $listdata, 'admin') ?>
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
                    echo oxi_addons_adm_help_textbox('OxiAddonsgooglechart-text', $listitemdata[2], 'Text', 'Set Your Google Chart title', 'false');
                    echo oxi_addons_adm_help_number('oxiAddonsgooglechart-value', $listitemdata[8], 1, 'Value', 'Set Your Chart Value', 'false');
                    echo oxi_addons_adm_help_MiniColor('OxiAddonsgooglechart-bar-BGC', $listitemdata[4], 'rgba', 'Background', 'Set Google Chart Bar Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'color');
                    echo oxi_addons_adm_help_MiniColor('OxiAddonsgooglechart-bar-BC', $listitemdata[6], '', 'Border Color', 'Set Google Chart Bar Border Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'color');
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