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
    if (!wp_verify_nonce($nonce, 'OxiAddCForm-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {

        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsCF7-G-BG') . ''
                . ' ||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsCF7-B-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsCF7-animation') . ''

                
                . ' OxiAddonsCF7-IF-BG |' . sanitize_text_field($_POST['OxiAddonsCF7-IF-BG']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-IF-Height') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-IF-Width') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsCF7-IF-border') . ''
                . ' OxiAddonsCF7-IF-border-color |' . sanitize_text_field($_POST['OxiAddonsCF7-IF-border-color']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-IF-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-IF-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-IF-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsCF7-IF-Shadow') . ''
                . ' OxiAddonsCF7-IF-F-BG |' . sanitize_text_field($_POST['OxiAddonsCF7-IF-F-BG']) . '|'
                . ' ||||'
                . ' OxiAddonsCF7-IF-F-border-color |' . sanitize_text_field($_POST['OxiAddonsCF7-IF-F-border-color']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsCF7-IF-F-Shadow') . ''
                
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-B-font-size') . ''
                . ' OxiAddonsCF7-B-color |' . sanitize_text_field($_POST['OxiAddonsCF7-B-color']) . '|'
                . ' OxiAddonsCF7-B-H-color |' . sanitize_text_field($_POST['OxiAddonsCF7-B-H-color']) . '|'
                . ' OxiAddonsCF7-B-bg-color |' . sanitize_text_field($_POST['OxiAddonsCF7-B-bg-color']) . '|'
                . ' OxiAddonsCF7-B-bg-H-color |' . sanitize_text_field($_POST['OxiAddonsCF7-B-bg-H-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsCF7-B') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsCF7-B-border') . ''
                . ' OxiAddonsCF7-B-border-color |' . sanitize_text_field($_POST['OxiAddonsCF7-B-border-color']) . '|'
                . ' OxiAddonsCF7-B-border-H-color |' . sanitize_text_field($_POST['OxiAddonsCF7-B-border-H-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-B-border-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-B-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-B-margin') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-TA-Height') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-TA-Width') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-TA-BR') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsCF7-T-FS') . ''
                . ' OxiAddonsCF7-T-C |' . sanitize_hex_color($_POST['OxiAddonsCF7-T-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsCF7-T') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-T-P') . ''
                
                
                
                . ' OxiAddonsCF7-CB-BG |' . sanitize_text_field($_POST['OxiAddonsCF7-CB-BG']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-CB-Height') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-CB-Width') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsCF7-CB-border') . ''
                . ' OxiAddonsCF7-CB-border-color |' . sanitize_text_field($_POST['OxiAddonsCF7-CB-border-color']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-CB-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-CB-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-CB-M') . ''
                
                . ' OxiAddonsCF7-CBS-BG |' . sanitize_text_field($_POST['OxiAddonsCF7-CBS-BG']) . '|'
                . ' OxiAddonsCF7-CBS-C |' . sanitize_text_field($_POST['OxiAddonsCF7-CBS-C']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-CBS-FN') . ''
                
                 . ' OxiAddonsCF7-RB-BG |' . sanitize_text_field($_POST['OxiAddonsCF7-RB-BG']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-RB-Height') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-RB-Width') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsCF7-RB-border') . ''
                . ' OxiAddonsCF7-RB-border-color |' . sanitize_text_field($_POST['OxiAddonsCF7-RB-border-color']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-RB-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-RB-M') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCF7-RB-P') . ''
                
                . ' OxiAddonsCF7-RBS-BG |' . sanitize_text_field($_POST['OxiAddonsCF7-RBS-BG']) . '|'
                . ' OxiAddonsCF7-RBS-C |' . sanitize_text_field($_POST['OxiAddonsCF7-RBS-C']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddonsCF7-RBS-FN') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsCF7-G-MW') . ''
                
                
                
                . '||#||'
                . ' oxiAddons-CF7-SC ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxiAddons-CF7-SC']) . '||#|| '
                . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
//echo "<pre>";
//print_r($styledata);
//echo "</pre>";
?>
<style>
    
</style>
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
                                <li ref="#oxi-tabs-id-1">General</li>
                                <li ref="#oxi-tabs-id-2">Other Fields Settings</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Contact Form Shortcode
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                             <?php echo oxi_addons_adm_help_form_textarea('oxiAddons-CF7-SC', $stylefiles[2], 'Info Text', 'Give Your Info text Here Or You can give Any Shortcode from our addons', 'false'); ?>
                                        </div>                                               
                                    </div>
                                    
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                           Body Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsCF7-G-BG', $styledata, 3, 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-full-body', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-G-MW', $styledata[409], $styledata[410], $styledata[411], '1', 'Max Width', 'Set Your Title Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-full-body', 'max-width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-G-BR', 9, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-full-body', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-G-P', 25, $styledata, '1', 'Padding', 'Set yor body Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-full-body', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-G-M', 41, $styledata, '1', 'Margin', 'Set yor body Margin', 'true', '.oxi-addons-form-warp-' . $oxiid . ' ', 'padding');
                                            ?>
                                        </div> 
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsCF7-B-Shadow', 57, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-full-body');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsCF7-animation', 63, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-T-FS', $styledata[237], $styledata[238], $styledata[239], '1', 'Font Size', 'Set Your Title Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' label', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-T-C', $styledata[241], '', 'Color', 'Set Your Title Font Color', 'false', '.oxi-addons-form-warp-' . $oxiid . ' label', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsCF7-T', 243, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' label');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-T-P', 249, $styledata, '1', 'Padding', 'Set yor Title Text Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' label', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Text Area Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-TA-Height', $styledata[213], $styledata[214], $styledata[215], 1, 'Height', 'Your Text Area Height', 'false', '.oxi-addons-form-warp-' . $oxiid . ' textarea', 'height');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-TA-Width', $styledata[217], $styledata[218], $styledata[219], 1, 'Width', 'Your Text Area Width', 'false', '.oxi-addons-form-warp-' . $oxiid . ' textarea', 'width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-TA-BR', 221, $styledata, '1', 'Border Radius', 'Set your Text Area Border Radius', 'true', '.oxi-addons-form-warp-' . $oxiid . ' textarea', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Input Field Style 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-IF-BG', $styledata[67], 'rgba', 'Background', 'Select Your Input Field Background Color', '', '', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-IF-Height', $styledata[69], $styledata[70], $styledata[71], 1, 'Height', 'Your Input Field Height', 'true', '', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-IF-Width', $styledata[73], $styledata[74], $styledata[75], 1, 'Width', 'Your Input Field Width', 'true', '', '');
                                            echo oxi_addons_adm_help_border('OxiAddonsCF7-IF-border', $styledata[77], $styledata[78], 'Border', 'Set your Input Field with size and different style', 'true', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-IF-border-color', $styledata[81], '', 'Border Color', 'Select your Input Field Border color', 'true', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-IF-BR', 83, $styledata, '1', 'Border Radius', 'Set your Input Field Border Radius', 'true', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-IF-P', 99, $styledata, '1', 'Padding', 'Set your Input Field Padding', 'true', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-IF-M', 115, $styledata, '1', 'Margin', 'Set your Input Field Margin', 'true', '', '');
                                            $NOJS = array(
                                                array('OxiAddonsCF7-IF-BG', 'Background'),
                                                array('OxiAddonsCF7-IF-Height', 'Height'),
                                                array('OxiAddonsCF7-IF-Width', 'Width'),
                                                array('OxiAddonsCF7-IF-border', 'Border'),
                                                array('OxiAddonsCF7-IF-border-color', 'Border Color'),
                                                array('OxiAddonsCF7-IF-BR', 'Border Radius'),
                                                array('OxiAddonsCF7-IF-P', 'Padding'),
                                                array('OxiAddonsCF7-IF-Shadow', 'Box Shadow'),
                                                array('OxiAddonsCF7-IF-M', 'Margin')
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsCF7-IF-Shadow', 131, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-row');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Input Field Focus Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-IF-F-BG', $styledata[137], 'rgba', 'Background', 'Select Your Input Field Focus Background Color', '', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success-data', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-IF-F-border-color', $styledata[143], '', 'Border Color', 'Select your Input Field Focus Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' .oxi-addons-form-success-data', 'border-color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Focus Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsCF7-IF-F-Shadow', 145, $styledata, 'true', '.oxi-addons-EW-wrapper-' . $oxiid . ' .oxi-addons-EW-row');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Submit Button
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-B-font-size', $styledata[151], $styledata[152], $styledata[153], 1, 'Font Size', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-B-color', $styledata[155], '', 'Color', 'Select Your Heading Color', '', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-B-bg-color', $styledata[159], 'rgba', 'Background', 'Select Your Button Color', '', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsCF7-B', 163, $styledata, 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]');
                                            echo oxi_addons_adm_help_border('OxiAddonsCF7-B-border', $styledata[169], $styledata[170], 'Border', 'Set your active button Border with size and different style', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]', 'border-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-B-border-color', $styledata[173], '', 'Border Color', 'Select your active button Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]', 'border-color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-B-border-radius', $styledata[177], $styledata[178], $styledata[179], 1, 'Border Radius', 'Your Button Font Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-B-padding', 181, $styledata, 1, 'Padding', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-B-margin', 197, $styledata, 1, 'Margin', 'Set Your Button Size Top Bottom and Left Right', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-B-H-color', $styledata[157], '', 'Hover Color', 'Select Your Button Hover Color', '', '.oxi-addons-form-warp-' . $oxiid . '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-B-bg-H-color', $styledata[161], 'rgba', 'Hover Background', 'Select Your Button Background Color', '', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-B-border-H-color', $styledata[175], '', 'Hover Border', 'Select your Hover button Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type=submit]:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            CheckBox Settings 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-CB-BG', $styledata[265], 'rgba', 'Background', 'Select Your CheckBox Background Color', '', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]:before', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-CB-Height', $styledata[267], $styledata[268], $styledata[269], 1, 'Height', 'Your CheckBox Height', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]:before', 'height');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-CB-Width', $styledata[271], $styledata[272], $styledata[273], 1, 'Width', 'Your CheckBox Width', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]:before', 'width');
                                            echo oxi_addons_adm_help_border('OxiAddonsCF7-CB-border', $styledata[275], $styledata[276], 'Border', 'Set your CheckBox Border with size and different style', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]:before', 'border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-CB-border-color', $styledata[279], '', 'Border Color', 'Select your CheckBox Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]:before', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-CB-BR', 281, $styledata, '1', 'Border Radius', 'Set your CheckBox Border Radius', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]:before', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-CB-P', 297, $styledata, '1', 'Padding', 'Set your CheckBox Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]:before', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-CB-M', 313, $styledata, '1', 'Margin', 'Set your CheckBox Margin', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            CheckBox Checked
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-CBS-BG', $styledata[329], 'rgba', 'Background', 'Select Your CheckBox background Color when it is checked', '', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]:checked:before ', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-CBS-C', $styledata[331], '', 'Check Color', 'Select Your CheckBox icon Color when it is checked', '', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]:checked:before ', 'color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-CBS-FN', $styledata[333], $styledata[268], $styledata[269], 1, 'Check Size', 'Your CheckBox Icon Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="checkbox"]:checked:before ', 'font-size');
                                            ?>
                                        </div>  
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Radio Button Settings 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-RB-BG', $styledata[337], 'rgba', 'Background', 'Select Your CheckBox Background Color', '', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]:before', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-RB-Height', $styledata[339], $styledata[340], $styledata[341], 1, 'Height', 'Your CheckBox Height', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]:before', 'height');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-RB-Width', $styledata[343], $styledata[344], $styledata[345], 1, 'Width', 'Your CheckBox Width', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]:before', 'width');
                                            echo oxi_addons_adm_help_border('OxiAddonsCF7-RB-border', $styledata[347], $styledata[348], 'Border', 'Set your CheckBox Border with size and different style', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]:before', 'border-width');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-RB-border-color', $styledata[351], '', 'Border Color', 'Select your CheckBox Border color', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]:before', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-RB-BR', 353, $styledata, '1', 'Border Radius', 'Set your CheckBox Border Radius', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]:before', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-RB-P', 385, $styledata, '1', 'Margin', 'Set your CheckBox Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]', 'Margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                             Radio Button Checked
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-RBS-BG', $styledata[401], 'rgba', 'Background', 'Select Your CheckBox background Color when it is checked', '', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]:checked:before', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCF7-RBS-C', $styledata[403], '', 'Check Color', 'Select Your CheckBox icon Color when it is checked', '', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]:checked:before', 'color');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCF7-RBS-FN', $styledata[405], $styledata[406], $styledata[407], 1, 'Check Size', 'Your CheckBox Icon Size', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]:checked:before', 'font-size');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCF7-RB-M', 369, $styledata, '1', 'Padding', 'Set your CheckBox Padding', 'true', '.oxi-addons-form-warp-' . $oxiid . ' input[type="radio"]:checked:before', 'padding');
                                            
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
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("OxiAddCForm-nonce") ?>
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
