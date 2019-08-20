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
    if (!wp_verify_nonce($nonce, 'oxi-addons-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-link-opening |' . sanitize_text_field($_POST['oxi-addons-link-opening']) . '|'
                . ' oxi-addons-font-size |' . sanitize_text_field($_POST['oxi-addons-font-size']) . '|' . sanitize_text_field($_POST['oxi-addons-font-size-tab']) . '|' . sanitize_text_field($_POST['oxi-addons-font-size-mobile']) . '|'
                . ' oxi-addons-color |' . sanitize_text_field($_POST['oxi-addons-color']) . '|'
                . ' oxi-addons-hover-color |' . sanitize_text_field($_POST['oxi-addons-hover-color']) . '|'
                . ' ||'
                . ' oxi-addons-family |' . sanitize_text_field($_POST['oxi-addons-family']) . '|'
                . ' oxi-addons-font-weight |' . sanitize_text_field($_POST['oxi-addons-font-weight']) . '|'
                . ' oxi-addons-font-style |' . sanitize_text_field($_POST['oxi-addons-font-style']) . '|'
                . ' ||||'
                . ' ||||'
                . ' oxi-addons-margin-top |' . sanitize_text_field($_POST['oxi-addons-margin-top']) . '|' . sanitize_text_field($_POST['oxi-addons-margin-top-tab']) . '|' . sanitize_text_field($_POST['oxi-addons-margin-top-mobile']) . '|'
                . ' oxi-addons-margin-left |' . sanitize_text_field($_POST['oxi-addons-margin-left']) . '|' . sanitize_text_field($_POST['oxi-addons-margin-left-tab']) . '|' . sanitize_text_field($_POST['oxi-addons-margin-left-mobile']) . '|'
                . '' . oxi_addons_adm_help_animation_senitize('oxi-addons-animation') . ''
                . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-padding')
                . ' ||'
                . 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' oxi-addons-hover-family |' . sanitize_text_field($_POST['oxi-addons-hover-family']) . '|'
                . ' oxi-addons-hover-font-weight |' . sanitize_text_field($_POST['oxi-addons-hover-font-weight']) . '|'
                . ' oxi-addons-hover-font-style |' . sanitize_text_field($_POST['oxi-addons-hover-font-style']) . '|'
                . '||#||  ||#||'
                . 'oxi-addons-text ||#||' . sanitize_text_field($_POST['oxi-addons-text']) . '||#||'
                . 'oxi-addons-id ||#||' . sanitize_text_field($_POST['oxi-addons-id']) . '||#||'
                . 'oxi-addons-link ||#||' . sanitize_text_field(OxiAddonsAdminUrlConvert($_POST['oxi-addons-link'])) . '||#||'
                . 'oxi-addons-hover-text ||#||' . sanitize_text_field($_POST['oxi-addons-hover-text']) . '||#||'
                . '|';
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
    <?php     echo OxiAddonsAdmAdminMenu($oxitype, '', '',''); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-content-tabs active">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Link Information
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('oxi-addons-text', $stylefiles[3], 'Link Text', 'Write your Link Text Here');
                                        echo oxi_addons_adm_help_textbox('oxi-addons-hover-text', $stylefiles[9], 'Hover Text', 'Write your Link Hover Text Here');
                                        echo oxi_addons_adm_help_textbox('oxi-addons-id', $stylefiles[5], 'link ID', 'Write If you want to Add any ID into Your Link', 'true');
                                        echo oxi_addons_adm_help_textbox('oxi-addons-link', $stylefiles[7], 'Desire Link', 'Write If you want to Add and Link into Your Link', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi-addons-link-opening', $styledata[1], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style', 'true');
                                        ?>
                                    </div>                                               
                                </div>                                          
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('oxi-addons-animation', 35, $styledata, 'true', '.oxi-links-effects-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_nonjs_popup('oxi-addons-margin-top', 'Margin');
                                        echo oxi_addons_adm_help_nonjs_popup('oxi-addons-margin-left', 'Margin');
                                        echo oxi_addons_adm_help_number_dtm('oxi-addons-font-size', $styledata[3], $styledata[4], $styledata[5], 1, 'Font Size', 'Your Links Font Size', 'true', '.oxi-links-effects-' . $oxiid . '', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('oxi-addons-color', $styledata[7], '', 'Color', 'Select Your Links Color', '', '.oxi-links-effects-' . $oxiid . '', 'color');
                                        echo oxi_addons_adm_help_Font_Family('oxi-addons-family', $styledata[13], 'Font Family', 'Select Your Font Family', 'true', '.oxi-links-effects-' . $oxiid . '', 'font-family');
                                        echo oxi_addons_adm_help_Font_Weight('oxi-addons-font-weight', $styledata[15], 'Font Weight', 'Select Your Font Weight', 'true', '.oxi-links-effects-' . $oxiid . '', 'font-weight');
                                        echo oxi_addons_adm_help_Font_Style('oxi-addons-font-style', $styledata[17], 'Font Style', 'Select Your Font Style', 'true', '.oxi-links-effects-' . $oxiid . '', 'font-style');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-padding', 39,$styledata, 1, 'Padding', 'Set button Padding', 'true', '', '');
                                        echo oxi_addons_adm_help_number_double_dtm('oxi-addons-margin-top', $styledata[27], $styledata[28], $styledata[29], 'oxi-addons-margin-left', $styledata[31], $styledata[32], $styledata[33], '1', 'Margin', 'Set Your Links Margin Top Bottom and Left Right');
                                        ?>
                                    </div>
                                </div> 
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi-addons-hover-color', $styledata[9], '', 'Color', 'Select Your Links Hover Color');
                                        echo oxi_addons_adm_help_Font_Family('oxi-addons-hover-family', $styledata[43], 'Font Family', 'Select Your Font Family', 'true', '.oxi-links-effects-' . $oxiid . '-span::before', 'font-family');
                                        echo oxi_addons_adm_help_Font_Weight('oxi-addons-hover-font-weight', $styledata[45], 'Font Weight', 'Select Your Font Wight', 'true', '.oxi-links-effects-' . $oxiid . '-span::before', 'font-weight');
                                        echo oxi_addons_adm_help_Font_Style('oxi-addons-hover-font-style', $styledata[47], 'Font Style', 'Select Your Font Style', 'true', '.oxi-links-effects-' . $oxiid . '-span::before', 'font-style');
                                        ?>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-nonce") ?>
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
                        <?php echo oxi_addons_adm_help_preview_color($styledata[41]); ?> 
                    </div>
                </div>
                <div class="oxi-addons-preview-data oxi-addons-center" id="oxi-addons-preview-data">
                    <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery("#oxi-addons-hover-color").on("change", function () {
        var value1 = jQuery(this).val();
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-links-effects-<?php echo $oxiid; ?>-span::before{color: " + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-links-effects-<?php echo $oxiid; ?>:hover .oxi-links-effects-<?php echo $oxiid; ?>:focus{color:" + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
    });
</script>