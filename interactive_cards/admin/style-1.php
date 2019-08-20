<?php
if (!defined('ABSPATH')) {
    exit;
}
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-button-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
  
    $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-max-width')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-full-margin')
            . OxiAddonsADMBoxShadowSanitize('oxi-cards-full-box-shadow')
            . oxi_addons_adm_help_animation_senitize('oxi-call-button-animation')
            . 'oxi-cards-front-bg-color |' . sanitize_text_field($_POST['oxi-cards-front-bg-color']) . '|'
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-front-image-width')
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-front-image-height')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-front-padding')
            . 'oxi-cards-CI-position |' . sanitize_text_field($_POST['oxi-cards-CI-position']) . '|'
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-CI-W')
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-CI-H')
            . 'oxi-cards-front-C |' . sanitize_hex_color($_POST['oxi-cards-front-C']) . '|'
            . 'oxi-cards-front-CI-BC |' . sanitize_text_field($_POST['oxi-cards-front-CI-BC']) . '|'
            . oxi_addons_adm_help_number_dtm_senitize('oxi-cards-front-CI-FS')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-front-CI-BR')
            . oxi_addons_adm_help_padding_margin_senitize('oxi-cards-front-CI-P')
            . 'oxi-addons-loader-on-off |' . sanitize_text_field($_POST['oxi-addons-loader-on-off']) . '|'
            . 'oxi-addons-loader-style |' . sanitize_text_field($_POST['oxi-addons-loader-style']) . '|'
            . 'oxi-addons-loader-color |' . sanitize_hex_color($_POST['oxi-addons-loader-color']) . '|'
            . 'oxi-addons-loader-speed |' . sanitize_text_field($_POST['oxi-addons-loader-speed']) . '|'
            . '||#||'
            . 'oxi-cards-front-image ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-cards-front-image']) . '||#||'
            . 'oxi-cards-front-CI ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi-cards-front-CI']) . '||#||'
            . 'oxi-cards-shortcode ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi-cards-shortcode']) . '||#||'
    ;
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
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li  ref="#oxi-addons-tabs-2">Back Part</li> 
                            </ul> 
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1" >
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('oxi-cards-max-width', $styledata[3], $styledata[4], $styledata[5], 1, 'Max Width', 'Set your Max Width, EX. 100 means same size as width', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC', 'max-width');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-full-margin', 7, $styledata, 1, 'Margin', 'Set Your Body Margin', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Loader
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('oxi-addons-loader-on-off', $styledata[109], 'On', 'on', 'Off', 'off', 'Loader On/Off', 'Set Your Loader On / Off', 'false');
                                            ?>
                                            <div class=" form-group row">
                                                <label for="oxi-addons-tt-text-d" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Loader Style">Loader Style</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control" id="oxi-addons-loader-style" name="oxi-addons-loader-style">
                                                        <option value="style-1" <?php selected($styledata[111], 'style-1'); ?>>Style 1</option>
                                                        <option value="style-2" <?php selected($styledata[111], 'style-2'); ?>>Style 2</option>
                                                        <option value="style-3" <?php selected($styledata[111], 'style-3'); ?>>Style 3</option>
                                                        <option value="style-4" <?php selected($styledata[111], 'style-4'); ?>>Style 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('oxi-addons-loader-color', $styledata[113], '', 'Color', 'Set Your Loader Color', 'true');
                                            echo oxi_addons_adm_help_number('oxi-addons-loader-speed', $styledata[115], 1, 'Loading Duration ', 'Set Your Loading Duration', 'false')
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('oxi-cards-full-box-shadow', 23, $styledata, 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('oxi-call-button-animation', 29, $styledata, 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Front Part 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_image_upload('oxi-cards-front-image', $stylefiles[2], 'Front Part Image', 'Set Your Front Part Image.', 'false');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-front-bg-color', $styledata[33], 'rgba', 'Background Color', 'Set Your Front Part Background Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC .oxi-addons-ICfull-content', 'background');
                                            echo oxi_addons_adm_help_number_double_dtm('oxi-cards-front-image-width', $styledata[35], $styledata[36], $styledata[37], 'oxi-cards-front-image-height', $styledata[39], $styledata[40], $styledata[41], 1, 'Image Width & Height', 'Set Your Front Image Width And Height.', 'false');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-front-padding', 43, $styledata, 1, 'Padding', 'Set Your Front Part Padding', 'true', '.oxi-addons-container  .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-addons-IC .oxi-addons-ICfull-content', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Cross Icon
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('oxi-cards-front-CI', $stylefiles[4], 'Icon Class', 'Set Your Cross Icon Class', 'false');
                                            echo oxi_addons_adm_help_true_false('oxi-cards-CI-position', $styledata[59], 'Top-Left', 'top_left', 'Top-Right', 'top_right', 'Cross Icon Position', 'Set Your Cross Icon Position', 'false');
                                            echo oxi_addons_adm_help_number_double_dtm('oxi-cards-CI-W', $styledata[61], $styledata[62], $styledata[63], 'oxi-cards-CI-H', $styledata[65], $styledata[66], $styledata[67], 1, 'Width Height', 'Set Your Cross Icon Body width and Height', 'true');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-front-C', $styledata[69], '', 'Color', 'Set Your Cross Icon Color', 'false', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-close-icon', 'color');
                                            echo oxi_addons_adm_help_MiniColor('oxi-cards-front-CI-BC', $styledata[71], 'rgba', 'Background ', 'Set Your Cross Icon Background Color', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-close-icon ', 'background');
                                            echo oxi_addons_adm_help_number_dtm('oxi-cards-front-CI-FS', $styledata[73], $styledata[74], $styledata[75], '1', 'Cross Icon Size', 'Set Your Icon Font Size', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-close-icon', 'font-size');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-front-CI-BR', 77, $styledata, '1', 'Border Radius', 'Set Your Cross Icon Border Radius', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-close-icon', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('oxi-cards-front-CI-P', 93, $styledata, '1', 'Margin', 'Set Your Cross Icon Margin', 'true', '.oxi-addons-container .oxi-addons-Interactive-card-' . $oxiid . ' .oxi-close-icon', 'margin');
                                            $NOJS = array(
                                                array('oxi-cards-CI-W', 'Width'),
                                                array('oxi-cards-CI-H', 'Height'),
                                                array('oxi-cards-front-image-width', 'Width'),
                                                array('oxi-cards-front-image-height', 'Height'),
                                            );
                                            echo OxiAddonsADMHelpNoJquery($NOJS);
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-12">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Shortcode Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('oxi-cards-shortcode', $stylefiles[6], 'false');
                                            ?>
                                        </div>
                                    </div>  
                                </div> 
                            </div>
                            <div class="oxi-addons-setting-save">
                                <?php echo oxiaddonssettingsavedtmmode(); ?>
                                <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                                <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                                <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php $styledata[1] ?>">
                                <?php wp_nonce_field("oxi-addons-button-nonce") ?>
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
                    <?php echo oxi_interactive_cards_style_1_shortcode($style); ?>
                </div>
            </div>
        </div>
    </div>
</div>