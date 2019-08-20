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
        $data = 'oxi_addons-heading-text ||#||' . OxiAddonsADMHelpTextSenitize(htmlspecialchars($_POST['oxi_addons-heading-text'])) . '||#||'
                . 'oxi_addons-heading-text-align |' . sanitize_text_field($_POST['oxi_addons-heading-text-align']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-heading-padding') . ''
                . ' oxi_addons-heading-font-size |' . sanitize_text_field($_POST['oxi_addons-heading-font-size']) . '|' . sanitize_text_field($_POST['oxi_addons-heading-font-size-tab']) . '|' . sanitize_text_field($_POST['oxi_addons-heading-font-size-mobile']) . '|'
                . ' oxi_addons-heading-tag |' . sanitize_text_field($_POST['oxi_addons-heading-tag']) . '|'
                . ' oxi_addons-heading-color |' . sanitize_hex_color($_POST['oxi_addons-heading-color']) . '|'
                . ' oxi_addons-heading-family |' . sanitize_text_field($_POST['oxi_addons-heading-family']) . '|'
                . ' oxi_addons-heading-font-weight |' . sanitize_text_field($_POST['oxi_addons-heading-font-weight']) . '|'
                . ' oxi_addons-heading-font-style |' . sanitize_text_field($_POST['oxi_addons-heading-font-style']) . '|'
                . ' oxi_addons-heading-margin-top |' . sanitize_text_field($_POST['oxi_addons-heading-margin-top']) . '|' . sanitize_text_field($_POST['oxi_addons-heading-margin-top-tab']) . '|' . sanitize_text_field($_POST['oxi_addons-heading-margin-top-mobile']) . '|'
                . ' oxi_addons-heading-margin-bottom |' . sanitize_text_field($_POST['oxi_addons-heading-margin-bottom']) . '|' . sanitize_text_field($_POST['oxi_addons-heading-margin-bottom-tab']) . '|' . sanitize_text_field($_POST['oxi_addons-heading-margin-bottom-mobile']) . '|'
                . ' oxi-addons-heading-border|' . sanitize_text_field($_POST['oxi-addons-heading-border']) . '|' . sanitize_text_field($_POST['oxi-addons-heading-border-type']) . '|' . sanitize_hex_color($_POST['oxi-addons-heading-border-color']) . '|'
                . '' . oxi_addons_adm_help_animation_senitize('oxi_addons-heading-animation') . ''
                . 'oxi_addons-heading-span-color|' . sanitize_hex_color($_POST['oxi_addons-heading-span-color']) . '|'
                . ' oxi_addons-heading-span-family |' . sanitize_text_field($_POST['oxi_addons-heading-span-family']) . '|'
                . ' oxi_addons-heading-span-font-weight |' . sanitize_text_field($_POST['oxi_addons-heading-span-font-weight']) . '|'
                . ' oxi_addons-heading-span-font-style |' . sanitize_text_field($_POST['oxi_addons-heading-span-font-style']) . '|'
                . '||||'
                . 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$styledata = explode('||#||', $style['css']);
$data = $styledata[1];
$styledata = explode('|', $styledata[2]);
?>
<div class="wrap">    
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '','','yes'); ?>
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
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('oxi_addons-heading-text-align', $styledata[1], 'Text Align', 'Confirm Your Heading Position', '.oxi-addons-container-' . $oxiid . '', 'false', '.oxi-addons-container-' . $oxiid . '', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('oxi-addons-heading-padding', 3, $styledata, 1, 'Padding', 'Set Your Heading Padding', 'true', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '', 'padding');
                                            echo oxi_addons_adm_help_number_double_dtm('oxi_addons-heading-margin-top', $styledata[33], $styledata[34], $styledata[35], 'oxi_addons-heading-margin-bottom', $styledata[37], $styledata[38], $styledata[39], '1', 'Margin Top Bottom', 'Set Your Heading Margin Top Bottom', 'false', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Bottom Border
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_border('oxi-addons-heading-border', $styledata[41], $styledata[42], 'Border', 'Set Your heading Border Bottom with Size and Type', 'false', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '');
                                            echo oxi_addons_adm_help_MiniColor('oxi-addons-heading-border-color', $styledata[43], '', 'Border Color', 'Select Your Heading Border Color', 'true', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '', 'border-color');
                                            ?> 
                                        </div>                                                
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('oxi_addons-heading-animation', 45, $styledata, 'true', '.oxi-addons-container-' . $oxiid . '');
                                            ?>      
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div oxi-addons-content-div-textarea">
                                        <div class="oxi-head">
                                            Heading Text
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php echo oxi_addons_adm_help_textarea('oxi_addons-heading-text', $data,'fales','.oxi-addons-heading-' . $oxiid . ''); ?>
                                        </div>
                                        <div class="oxi-info">
                                            Write Your Heading Text Here 
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Font Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi_addons-heading-font-size', $styledata[19], $styledata[20], $styledata[21], 1, 'Font Size', 'Your Heading Font Size', 'false', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '', 'font-size');
                                            echo oxi_addons_adm_help_Heading_Tag('oxi_addons-heading-tag', $styledata[23], 'Heading Tag', 'Select Your Heading tag normaly Heading 3 will Selected');
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-heading-color', $styledata[25], '', 'Color', 'Select Your Heading Color', 'true', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '', 'color');
                                            echo oxi_addons_adm_help_Font_Family('oxi_addons-heading-family', $styledata[27], 'Font Family', 'Select Your Font Family', 'false', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '');
                                            echo oxi_addons_adm_help_Font_Weight('oxi_addons-heading-font-weight', $styledata[29], 'Font Weight', 'Select Your Heading Font Wight', 'true', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '');
                                            echo oxi_addons_adm_help_Font_Style('oxi_addons-heading-font-style', $styledata[31], 'Font Style', 'Select Your Font Style', 'true', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Span Font Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi_addons-heading-span-color', $styledata[49], '', 'Second Color', 'Select Your Heading Span Color', 'false', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . ' span', 'color');
                                            echo oxi_addons_adm_help_Font_Family('oxi_addons-heading-span-family', $styledata[51], 'Font Family', 'Select Your Font Family', 'false', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . ' span');
                                            echo oxi_addons_adm_help_Font_Weight('oxi_addons-heading-span-font-weight', $styledata[53], 'Font Weight', 'Select Your Heading Font Wight', 'true', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . ' span');
                                            echo oxi_addons_adm_help_Font_Style('oxi_addons-heading-span-font-style', $styledata[55], 'Font Style', 'Select Your Font Style', 'true', '.oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . ' span');
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
                        <?php echo oxi_addons_adm_help_preview_color($styledata[61]); ?>                           
                    </div>
                </div>
                <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                  <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>