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
    if (!wp_verify_nonce($nonce, 'oxi-addons-divider-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' oxi-addons-divider |' . sanitize_text_field($_POST['oxi-addons-divider']) . '|' . sanitize_text_field($_POST['oxi-addons-divider-type']) . '|' . sanitize_text_field($_POST['oxi-addons-divider-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('oxi-addons-divider-size') . ''
                . ' oxi-addons-divider-align |' . sanitize_text_field($_POST['oxi-addons-divider-align']) . '|'
                . '' . oxi_addons_adm_help_animation_senitize('oxi-addons-divider-animation') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-divider-padding') . ''
                . '' . oxi_addons_adm_help_single_size('oxi-addons-divider-font-size') . ''
                . ' oxi-addons-divider-font-color |' . sanitize_text_field($_POST['oxi-addons-divider-font-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('oxi-addons-divider-font-position') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-divider-font-padding') . ''
                . '||#|| oxi_addons-divider-id ||#||' . sanitize_text_field($_POST['oxi_addons-divider-id']) . '||#||'
                . '||#|| oxi_addons-divider-icon ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi_addons-divider-icon']) . '||#||'
                . '  ||#||';
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

                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Divider Information
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_border('oxi-addons-divider', $styledata[3], $styledata[4], 'Border', 'Set Your Divider with Size and Type', 'true');
                                        echo oxi_addons_adm_help_MiniColor('oxi-addons-divider-color', $styledata[5], '', 'Color', 'Select Your Divider Color', '', '');
                                        echo oxi_addons_adm_help_number_dtm('oxi-addons-divider-size', $styledata[7], $styledata[8], $styledata[9], 1, 'Size', 'Your Divider Width', 'true', '.oxi-divider-' . $oxiid . '', 'max-width');
                                        oxi_addons_adm_help_Text_Align('oxi-addons-divider-align', $styledata[11], 'Align', 'Set Your Divider Align', '', '');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-divider-padding', 17, $styledata, 1, 'Padding', 'Set Your divider Padding Top Bottom and Left Right', 'true', '.oxi-divider-' . $oxiid . '', 'padding');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-divider-id', $stylefiles[2], 'Divider ID', 'Write If you want to Add any ID into Your Divider', 'true');
                                        ?>
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('oxi-addons-divider-animation', 13, $styledata, 'true', 'oxi-addons-container');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Icon Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('oxi_addons-divider-icon', $stylefiles[5], 'Icon', 'Write font Awesome icon Class', 'false');
                                        echo oxi_addons_adm_help_number_dtm('oxi-addons-divider-font-size', $styledata[33], $styledata[34], $styledata[35], 1, 'Size', 'Your Divider Icon or Text Size', 'true', '.oxi-divider-' . $oxiid . ' .oxi-icons', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('oxi-addons-divider-font-color', $styledata[37], '', 'Color', 'Select Your Divider Icon or Text Color', '', '.oxi-divider-' . $oxiid . ' .oxi-icons', 'color');
                                        echo oxi_addons_adm_help_number_dtm('oxi-addons-divider-font-position', $styledata[39], $styledata[40], $styledata[41], 1, 'Position', 'Set you Divider Icon or Text Position where 0 is left and 100 is right', 'true', '');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-divider-font-padding', 43, $styledata, 1, 'Padding', 'Set Your divider Icon or Text Padding Top Bottom and Left Right', 'true', '.oxi-divider-' . $oxiid . ' .oxi-icons', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-divider-nonce") ?>
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
<script type="text/javascript">
    jQuery("#oxi-addons-divider").on("change", function () {
        var value1 = jQuery(this).val();
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-divider-<?php echo $oxiid; ?> .oxi-divider-left .oxi-divider{border-top-width: " + value1 + "px; } </style>").appendTo("#oxi-addons-preview-data");
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-divider-<?php echo $oxiid; ?> .oxi-divider-right .oxi-divider{border-top-width:" + value1 + "px; } </style>").appendTo("#oxi-addons-preview-data");
    });
    jQuery("#oxi-addons-divider-color").on("change", function () {
        var value1 = jQuery(this).val();
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-divider-<?php echo $oxiid; ?> .oxi-divider-left .oxi-divider{border-top-color: " + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-divider-<?php echo $oxiid; ?> .oxi-divider-right .oxi-divider{border-top-color:" + value1 + "; } </style>").appendTo("#oxi-addons-preview-data");
    });
    jQuery("#oxi-addons-divider-align").on("change", function () {
        var value1 = jQuery(this).val();
        if (value1 === 'left') {
            var data = 'margin: 0 auto 0 0 !important;';
        } else if (value1 === 'center') {
            var data = 'margin: 0 auto !important;';
        } else {
            var data = 'margin: 0 0 0 auto !important;';
        }
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-divider-<?php echo $oxiid; ?>{" + data + " } </style>").appendTo("#oxi-addons-preview-data");
    });
    jQuery("#oxi-addons-divider-font-position").on("change", function () {
        var value1 = parseInt(jQuery(this).val(), 10);
        var value2 = 100 - value1;
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-divider-<?php echo $oxiid; ?> .oxi-divider-left{width: " + value1 + "%; } </style>").appendTo("#oxi-addons-preview-data");
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-divider-<?php echo $oxiid; ?> .oxi-divider-right{width:" + value2 + "%; } </style>").appendTo("#oxi-addons-preview-data");
    });
</script>
