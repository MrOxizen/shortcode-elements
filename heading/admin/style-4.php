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
    if (!wp_verify_nonce($nonce, 'oxi-addons-heading-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = '||'
                . '||||||||'
                . '||||||||'
                . '||||||||'
                . '||||||||'
                . ''. oxi_addons_adm_help_single_size('oxi_addons-heading-font-size') . ''
                . ' oxi_addons-heading-tag |' . sanitize_text_field($_POST['oxi_addons-heading-tag']) . '|'
                . 'oxi_addons-heading-color|' . sanitize_text_field($_POST['oxi_addons-heading-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi-addons-heading-font-S'). ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-heading-padding') . ''
                . '' . oxi_addons_adm_help_single_size('oxi_addons-content-font-size') . ''
                . '||'
                . 'oxi_addons-content-color|' . sanitize_hex_color($_POST['oxi_addons-content-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi-addons-content-font-S') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-content-padding') . ''
                . '' . oxi_addons_adm_help_animation_senitize('oxi_addons-heading-animation') . ''
                . 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '||||||||||||||'
                . '||#||'.'||#||'
                . 'oxi_addons-heading-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-heading-text']) . '||#||'
                . 'xi_addons-content-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-content-text']) . '||#||'
                . '|';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);

//echo '<pre>';
//print_r($styledata);
//echo '</pre>'
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
                            <div class="oxi-addons-tabs-content-tabs">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php 
                                            echo oxi_addons_adm_help_textarea('oxi_addons-heading-text', $stylefiles[3], '', '.oxi-addons-Content-body-'.$oxiid.'  .oxi-addons-Heading-text'); 
                                            ?>
                                        </div>
                                            <div class="oxi-head">
                                                Font Settings
                                            </div>
                                            <div class="oxi-addons-content-div-body">
                                                <?php
                                                echo oxi_addons_adm_help_number_dtm('oxi_addons-heading-font-size', $styledata[35], $styledata[36], $styledata[37], 1, 'Font Size', 'Your Heading Font Size', 'false', '.oxi-addons-Heading-body-'.$oxiid.' .oxi-addons-Heading-text', 'font-size');
                                                echo oxi_addons_adm_help_Heading_Tag('oxi_addons-heading-tag', $styledata[39], 'Heading Tag', 'Select Your Heading tag normaly Heading 3 will Selected');
                                                echo oxi_addons_adm_help_MiniColor('oxi_addons-heading-color', $styledata[41], '', 'Color', 'Select Your Heading Color', 'false', '.oxi-addons-Heading-body-'.$oxiid.' .oxi-addons-Heading-text', 'color');
                                                echo OxiAddonsADMHelpFontSettings('oxi-addons-heading-font-S', 43, $styledata, 'true','.oxi-addons-Heading-body-'.$oxiid.' .oxi-addons-Heading-text');
                                                echo oxi_addons_adm_help_padding_margin('oxi-addons-heading-padding', 49, $styledata, 1, 'Padding', 'Set heading Padding', 'true','.oxi-addons-Heading-body-'.$oxiid.' .oxi-addons-Heading-text','padding');
                                               ?>
                                            </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6"> 
                                    
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php echo oxi_addons_adm_help_textarea('oxi_addons-content-text', $stylefiles[5], 'false','.oxi-addons-Content-body-'.$oxiid.'  .oxi-addons-Content-text'); ?>
                                        </div>
                                        <div class="oxi-head">
                                            Font Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-content-font-size', $styledata[65], $styledata[66], $styledata[67], 1, 'Font Size', 'Your Heading Font Size', 'false', '.oxi-addons-Content-body-'.$oxiid.'  .oxi-addons-Content-text', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-content-color', $styledata[71], '', 'Color', 'Select Your Heading Color', 'false', '.oxi-addons-Content-body-'.$oxiid.'  .oxi-addons-Content-text', 'color');
                                            echo OxiAddonsADMHelpFontSettings('oxi-addons-content-font-S',73, $styledata, 'true','.oxi-addons-Content-body-'.$oxiid.'  .oxi-addons-Content-text'); 
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-content-padding', 79, $styledata, 1, 'Padding', 'Set padding for content', '','.oxi-addons-Content-body-'.$oxiid.'  .oxi-addons-Content-text','padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('oxi_addons-heading-animation', 95, $styledata, 'true', '.oxi-addons-container-' . $oxiid . '');
                                            ?>                                              
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[99]; ?>">
                            <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-heading-nonce") ?>
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
                        <?php echo oxi_addons_adm_help_preview_color($styledata[99]); ?>  
                    </div>
                </div>
                <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                 <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>