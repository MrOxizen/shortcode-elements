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
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . 'oxi-addons-animat-time|' . sanitize_text_field($_POST['oxi-addons-animat-time']) . '|' 
                . 'oxi-addons-text-2nd-color |' . sanitize_hex_color($_POST['oxi-addons-text-2nd-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('oxi-addons-text-2nd-size') . ''
                . '' .OxiAddonsADMHelpFontSettingsSanitize('oxi-addons-text-2st-font') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-text-padding') . '' 
                . '||#||  ||#||'
                . 'oxi-addons-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-addons-text']) . '||#||'
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
//print_r($stylefiles);
//echo '</pre>'
?>
<div class="wrap">  
    <?php     echo OxiAddonsAdmAdminMenu($oxitype, '', '','yes'); ?>
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
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number("oxi-addons-animat-time", $styledata[3], 0.1, "Speed", "Set text animat time duration", " ");
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Text Information 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('oxi-addons-text', $stylefiles[3], 'Second Text', 'Write Wour animat text');
                                        echo oxi_addons_adm_help_MiniColor('oxi-addons-text-2nd-color', $styledata[5], '', 'Text Color', 'Set your text color', '');
                                        echo oxi_addons_adm_help_number_dtm('oxi-addons-text-2nd-size', $styledata[7], $styledata[8], $styledata[9], 1, 'Font Size', 'Set your font size', 'true');
                                        echo OxiAddonsADMHelpFontSettings('oxi-addons-text-2st-font', 11, $styledata, 'true');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-text-padding', 17, $styledata, 1, 'Padding', 'Padding for text', '', '') ;
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
                        <?php echo oxi_addons_adm_help_preview_color($styledata[1]); ?> 
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
//    jQuery("#oxi-addons-icon-color").on("change", function () {
//        var value1 = jQuery(this).val();
//        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-links-effects-<?php echo $oxiid; ?>::before{color: " + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
//        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-links-effects-<?php echo $oxiid; ?>::after{color:" + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
//    });
</script>