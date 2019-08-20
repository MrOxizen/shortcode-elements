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
$listitemdata = $bgdata = array("", "", "","","","","");

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-icon-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                .'OxiAddonsPriceTable-G-BG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-G-BG']) . '|' 
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsPriceTable-G-CT') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-BW') . '' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-BR') . '' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-P') . '' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-G-M') . '' 
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsPriceTable-G-Animation') . '|' 
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsPriceTable-G-BS') . '' 
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-feature-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-feature-F') . ''
                . ' OxiAddonsPriceTable-feature-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-feature-C']) . '|'
                . ' OxiAddonsPriceTable-feature-Second-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-feature-Second-C']) . '|'
                . '||'
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsPriceTable-feature-CT') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-feature-BW') . '' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-feature-P') . '' 
                .'OxiAddonsPriceTable-ribon |' . sanitize_text_field($_POST['OxiAddonsPriceTable-ribon']) . '|'
                . ' OxiAddonsPriceTable-ribon-position |' . sanitize_text_field($_POST['OxiAddonsPriceTable-ribon-position']) . '|' 
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-FS') . ''
                . ' OxiAddonsPriceTable-ribon-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-ribon-C']) . '|'
                . ' OxiAddonsPriceTable-ribon-BG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-ribon-BG']) . '|' 
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-ribon-F') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-H') . ''  
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-top-left') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-top-right') . ''   
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-ribon-rotate') . ''  
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-ribon-P') . ''
                . ' OxiAddonsPriceTable-B-Tab |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-Tab']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-B-M') . ''
                . ' OxiAddonsPriceTable-B-PS |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-PS']) . '|'
                . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-B-FS') . ''
                . ' OxiAddonsPriceTable-B-TC |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-B-TC']) . '|'
                . ' OxiAddonsPriceTable-B-BG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsPriceTable-B-B') . ''
                . ' OxiAddonsPriceTable-B-BC |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-B-BC']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-B-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-B-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsPriceTable-B-BS') . ''
                . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsPriceTable-B-Animation') . '|'
                . ' OxiAddonsPriceTable-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-B-HTC']) . '|'
                . ' OxiAddonsPriceTable-B-HBG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-HBG']) . '|'
                . ' OxiAddonsPriceTable-B-HBC |' . sanitize_text_field($_POST['OxiAddonsPriceTable-B-HBC']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsPriceTable-B-HBS') . ''  
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-G-Max-Width') . ''  
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-T-FS') . ''
                . ' OxiAddonsPriceTable-T-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-T-C']) . '|'
                . ' OxiAddonsPriceTable-T-BG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-T-BG']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-T-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-T-P') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsPriceTable-T-BS') . '' 
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-Pbox-width') . ''
                . ' OxiAddonsPriceTable-Pbox-PS |' . sanitize_text_field($_POST['OxiAddonsPriceTable-Pbox-PS']) . '|'
                . ' OxiAddonsPriceTable-Pbox-BG |' . sanitize_text_field($_POST['OxiAddonsPriceTable-Pbox-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsPriceTable-Pbox-B') . ''
                . ' OxiAddonsPriceTable-Pbox-BC |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-Pbox-BC']) . '|' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-Pbox-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsPriceTable-Pbox-BS') . '' 
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-P-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-P-F') . ''
                . ' OxiAddonsPriceTable-P-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-P-C']) . '|' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-P-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-P-Second-FS') . ''
                . ' OxiAddonsPriceTable-P-Second-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-P-Second-C']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsPriceTable-Psub-FS') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsPriceTable-Psub-F') . ''
                . ' OxiAddonsPriceTable-Psub-C |' . sanitize_hex_color($_POST['OxiAddonsPriceTable-Psub-C']) . '|' 
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-Psub-P') . ''  
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsPriceTable-Pbox-P') . ''  
                . ' OxiAddonsPriceTable-G-button-top-bottom |' . sanitize_text_field($_POST['OxiAddonsPriceTable-G-button-top-bottom']) . '|'

                . '||#||'
                . ' OxiAddonsPriceTable-scale ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-scale']) . '||#|| '
                . ' OxiAddonsPriceTable-hover-scale ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-hover-scale']) . '||#|| '
                . ' OxiAddonsPriceTable-hover-position ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-hover-position']) . '||#|| '
                . ' OxiAddonsPriceTable-ribon-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-ribon-TB']) . '||#|| '
                . ' OxiAddonsPriceTable-P-TB ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-P-TB']) . '||#|| ' 
                . ' OxiAddonsPriceTable-T-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-T-TA']) . '||#|| '
                . ' OxiAddonsPriceTable-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-B-BT']) . '||#|| '
                . ' OxiAddonsPriceTable-B-BL ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsPriceTable-B-BL']) . '||#|| '  
                . ' OxiAddonsPriceTable-Psub-TB ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsPriceTable-Psub-TB']) . '||#|| '  
                
                . ' ||#||';

                $data = sanitize_text_field($data);
                $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
            }
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = '  OxiAddonsPriceTable-feature ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsPriceTable-feature']) . '||#||'
                 . ' OxiAddonsPriceTable-feature-BG ||#||' . sanitize_text_field($_POST['OxiAddonsPriceTable-feature-BG']) . '||#||'
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '','',''); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li ref="#oxi-addons-tabs-2">Button Setting</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                              echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-G-Max-Width', $styledata[285], $styledata[286], $styledata[287], '1', 'Max-Width', 'Set Your Price Table Width', 'false', '.oxi-addons-main-wrapper-' . $oxiid . '', 'max-width');
                                              echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-G-BG', $styledata[3], 'rgba', 'Background', 'Set Your Price Table Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'background');
                                              echo OxiAddonsADMhelpBorder('OxiAddonsPriceTable-G-CT', 5, $styledata ,'true','.oxi-addons-wrapper-' . $oxiid . '','border');
                                              echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-BW', 9, $styledata, 1, 'Border Width', 'Set Your Price Table  Border Width', 'true','.oxi-addons-wrapper-' . $oxiid . '','border-width');
                                              echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-BR', 25, $styledata, 1, 'Border Radius', 'Set Your Price Table  Border Radius', 'true','.oxi-addons-wrapper-' . $oxiid . '','border-radius');
                                              echo  oxi_addons_adm_help_number('OxiAddonsPriceTable-scale',$stylefiles[2],'0.01','Scale','Set Price table Scale','.oxi-addons-wrapper-' . $oxiid . '','transform');
                                              echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-P', 41, $styledata, 1, 'Padding', 'Set Your Price Table  Padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main','padding');
                                              echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-G-M', 57, $styledata, 1, 'Margin', 'Set Yout Price Table  Margin', 'true','.oxi-addons-main-wrapper-' . $oxiid . '','padding');
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
                                            Ribon Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                                echo oxi_addons_adm_help_true_false('OxiAddonsPriceTable-ribon', $styledata[136], 'True', 'true', 'False', 'false', 'Ribon', 'Set your Price Table Ribon Show or Not', 'false');
                                                echo oxi_addons_adm_help_true_false('OxiAddonsPriceTable-ribon-position', $styledata[138], 'Left', 'left', 'Right', 'right', 'Ribon Position', 'Set Your Price Table Ribon Position', 'false');
                                                echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-ribon-TB', $stylefiles[8], 'Text', 'Write Your Ribon Text', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-FS', $styledata[140], $styledata[141], $styledata[142], '1', 'Font Size', 'Set Your Price table Ribon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'font-size');
                                                echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-ribon-C', $styledata[144], '', 'Color', 'Set Your Price Table Ribon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'color');
                                                echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-ribon-BG', $styledata[146], 'rgba', 'Background Color', 'Set Your Price Table Ribon Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'background');
                                                echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-ribon-F', 148, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-W', $styledata[154], $styledata[155], $styledata[156], '1', 'Width', 'Set Your Price Table Ribon Width', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'width');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-H', $styledata[158], $styledata[159], $styledata[160], '1', 'Height', 'Set Your Price Table Ribon Height', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'height');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-top-left', $styledata[162], $styledata[163], $styledata[164], '1', 'Left Or Right', 'Set Your Price Table Ribon Position Left Or Right. If right you must select Ribon position right', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'left');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-top-right', $styledata[166], $styledata[167], $styledata[168], '1', 'Top', 'Set Your Price Table Ribon Position Top', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'top');
                                                echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-ribon-rotate', $styledata[170], $styledata[171], $styledata[172], '1', 'Rotate', 'Write Your Price Table Ribon Rotate  Angle', 'true');
                                                echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-ribon-P', 174, $styledata, 1, 'Padding', 'Set Your Price Box Ribon Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-ribon', 'padding');
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
                                            Feature Area Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-feature-FS', $styledata[84], $styledata[85], $styledata[86], '1', 'Font Size', 'Set Price Table Feature Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-feature', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-feature-C', $styledata[94], '', 'Color', 'Set Price Table Feature Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-feature', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-feature-Second-C', $styledata[96], '', 'Secondary Color', 'Set Your Table Price Feature  Secondary Text color. You Need to write Text inside  html span tag', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-feature span', 'color');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsPriceTable-feature-CT', 100, $styledata ,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-feature','border');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-feature-BW', 104, $styledata, 1, 'Border Width', 'Set Your Price Table  Border Width', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-feature','border-width');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-feature-F', 88, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-feature');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-feature-P', 120, $styledata, 1, 'Padding', 'Set  Price Table Feature Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-feature', 'padding');
                                           ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6"> 
                                   
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Price Table Main Title
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-T-TA', $stylefiles[12], 'Price', 'Write Your Price Table title', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-title'); 
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-T-FS', $styledata[289], $styledata[290], $styledata[291], '2', 'Font Size', 'Set Price Table Title Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-T-C', $styledata[293], '', 'Color', 'Set Price Table Title Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-title', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-T-BG', $styledata[295], 'rgba', 'Background Color', 'Set Price Table Title Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-title', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-T-F', 297, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-T-P', 303, $styledata, 1, 'Padding', 'Set Price Table Title Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-heading-title', 'padding');
                                             ?>
                                        </div>
                                        <div class="oxi-head">
                                          Title Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsPriceTable-T-BS', 319, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title');
                                            ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Price Box
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                             echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-Pbox-width', $styledata[325], $styledata[326], $styledata[327], '1', 'Max Width', 'Set Price Table Price Text Box Width', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-box', 'font-size');
                                             echo oxi_addons_adm_help_Text_Align('OxiAddonsPriceTable-Pbox-PS', $styledata[329], 'Position', 'Set Price Table Price Text Box  Position', 'false');
                                             echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-Pbox-BG', $styledata[331], 'rgba', 'Background Color', 'Set Price Table Price Text Box  background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-box', 'background');
                                             echo oxi_addons_adm_help_border('OxiAddonsPriceTable-Pbox-B', $styledata[333], $styledata[334], 'Border', 'Set Price Table Price Text Box Border Size and Type', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-box');
                                             echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-Pbox-BC', $styledata[337], '', 'Border Color', 'Set  Price Table Price Text Box Border color', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-box','border-color');
                                             echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-Pbox-BR', 339, $styledata, 1, 'Border Radius', 'Set Price Table Price Text Box Border Radius', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-box','border-radius');
                                             echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-Pbox-P', 407, $styledata, 1, 'Padding', 'Set Price Table Price Text Box  Border Radius', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-box','border-radius');
                                             echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsPriceTable-Pbox-PS', 'Position'), 
                                                )
                                            );
                                          ?>
                                        </div>
                                        <div class="oxi-head">
                                          Price boxes Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsPriceTable-Pbox-BS', 355, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-box');
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
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-P-FS', $styledata[361], $styledata[362], $styledata[363], '1', 'Font Size', 'Set Price Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-P-C', $styledata[371], '', 'Color', 'Set Price Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-P-F', 365, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-P-P', 373, $styledata, 1, 'Padding', 'Set Headers  Price Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price', 'padding');
                                           ?>
                                        </div>
                                        <div class="oxi-head">
                                            Price Secondary Text Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                          echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-P-Second-FS', $styledata[389], $styledata[390], $styledata[391], '1', 'Font Size', 'Set Price Table Secondary Text Font Size. You Must Write inside html span tag in your price text', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price  span', 'font-size');
                                          echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-P-Second-C', $styledata[393], '', 'Secondary Color', 'Set Price Table Secondary Text color . You Must Write inside html span tag in your price text', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price  span', 'color');
                                        ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Price Subtitle Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-Psub-TB', $stylefiles[18], 'Price', 'Write Your  Price table Price Sub title', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-Psub-FS', $styledata[395], $styledata[396], $styledata[397], '1', 'Font Size', 'Set  Price Table Sub title Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-Psub-C', $styledata[405], '', 'Color', 'Set  Price Table Sub title Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsPriceTable-Psub-F', 399, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-Psub-P', 407, $styledata, 1, 'Padding', 'Set  Price Table Sub title Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-price-title', 'padding');
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
                                            echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-B-BT', $stylefiles[14], 'Button Text', 'Set Price Table Button Text', 'false','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-B-BL', $stylefiles[16], 'Button Link', 'Set Price Table Button Link', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsPriceTable-B-Tab', $styledata[190], 'Same Tab', '', 'Normal', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-B-P', 192, $styledata, 1, 'Padding', 'Set Price Table Button padding', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link','padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-B-M', 208, $styledata, 1, 'Margin', 'Set Price Table Button margin', 'true','.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-button','margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Position
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsPriceTable-B-PS', $styledata[224], 'Position', 'Set Price Table button Position', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-button', 'text-align');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsPriceTable-G-button-top-bottom', $styledata[439], 'Top', 'top', 'Bottom', 'bottom', 'Button Top Bottom', 'Set Your Button Top Or Bottom', 'false');
                                           ?>
                                        </div>
                                    </div> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsPriceTable-B-FS', $styledata[226], $styledata[227], $styledata[228], '', 'Font Size', 'Set Price Table Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-TC', $styledata[230], '', 'Text Color', 'Set Price Table Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-BG', $styledata[232], 'rgba', 'Background Color', 'Set Price Table Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsPriceTable-B-B', $styledata[234], $styledata[235], 'Border', 'Set Price Table Border Size and Type', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-BC', $styledata[238], '', 'Border Color', 'Set Border color', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link','border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsPriceTable-B-F', 240, $styledata, 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsPriceTable-B-BR', 246, $styledata, 1, 'Border Radius', 'Set Price Table Button Border Radius', 'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link','border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsPriceTable-B-BS', 262, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
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
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-HTC', $styledata[273], '', 'Color', 'Set Price Table Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-HBG', $styledata[275], 'rgba', 'Background Color', 'Set Price Table Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-B-HBC', $styledata[277], '', 'Border Color', 'Set Price Table Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover', 'border-color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsPriceTable-B-HBS', 279, $styledata,'true','.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover');
                                            ?> 
                                        </div>
                                    </div>   
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsPriceTable-B-Animation', 268, $styledata, 'true','.oxi-addons-button');
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
                echo oxi_addons_list_modal_open('Add New Feature');
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Price Table Rearrange', $listdata, 1, 'title');
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
                    <?php echo oxi_price_table_style_4_shortcode($style, $listdata, 'admin') ?>
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
                   echo oxi_addons_adm_help_textbox('OxiAddonsPriceTable-feature', $listitemdata[1], 'Feature', 'Write your Price Table Feature', 'false');
                   echo oxi_addons_adm_help_MiniColor('OxiAddonsPriceTable-feature-BG', $listitemdata[3], 'rgba', 'Background color', 'Set Price Table Feature background', 'false');
                                         
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