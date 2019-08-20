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
$listitemdata = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$listid = '';
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-counter-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' image-effects |' . sanitize_text_field($_POST['image-effects']) . '|'
                . ' image-alignments |' . sanitize_text_field($_POST['image-alignments']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAdmin-Item') . ''
                . ' OxiAdmin-width |' . sanitize_text_field($_POST['OxiAdmin-width']) . '|'
                . ' OxiAdmin-height|' . sanitize_text_field($_POST['OxiAdmin-height']) . '|'
                . ' OxiAdmin-I-bg|' . sanitize_text_field($_POST['OxiAdmin-I-bg']) . '|||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-margin') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAdmin-animation') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAdmin-box-shadow') . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAdmin-hover-box-shadow') . '|'
                . ' title-animation |' . sanitize_text_field($_POST['title-animation']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAdmin-T-size') . ''
                . ' OxiAdmin-T-color |' . sanitize_text_field($_POST['OxiAdmin-T-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAdmin-T') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-T-padding') . ''
                . ' desc-animation|' . sanitize_text_field($_POST['desc-animation']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAdmin-N-size') . ''
                . ' OxiAdmin-N-color |' . sanitize_text_field($_POST['OxiAdmin-N-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAdmin-N') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-N-padding') . ''
                . ' button-animation|' . sanitize_text_field($_POST['button-animation']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAdmin-button-size') . ''
                . ' OxiAdmin-button-color |' . sanitize_text_field($_POST['OxiAdmin-button-color']) . '|'
                . ' OxiAdmin-button-bgcolor |' . sanitize_text_field($_POST['OxiAdmin-button-bgcolor']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-button-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAdmin-button-border') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-button-radius') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAdmin-button') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-button-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-button-margin') . ''
                . ' OxiAdmin-button-hover-color |' . sanitize_text_field($_POST['OxiAdmin-button-hover-color']) . '|'
                . ' OxiAdmin-button-hover-bgcolor |' . sanitize_text_field($_POST['OxiAdmin-button-hover-bgcolor']) . '|'
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAdmin-hover-button-border') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-hover-button-radius') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAdmin-button-box-shadow') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAdmin-button-hover-box-shadow') . ''
                . ' OxiAddCB-button-link-opening |' . sanitize_text_field($_POST['OxiAddCB-button-link-opening']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-border-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-hover-border-radius') . ''
                . '||#||  ||#||'
                . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = sanitize_textarea_field($_POST['oxilistid']);
        $data = 'OxiAdmin-file-title||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAdmin-file-title']) . '||#||'
                . 'OxiAdmin-file-desc||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAdmin-file-desc']) . '||#||'
                . 'OxiAdmin-file-button||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAdmin-file-button']) . '||#||'
                . 'OxiAdmin-file-link||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAdmin-file-link']) . '||#||'
                . 'OxiAdmin-file-image||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAdmin-file-image']) . '||#||'
                . '||#||  ||#||';
        if ($oxilistid > 0) {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("UPDATE $table_list SET files = %s WHERE id = %d", $data, $oxilistid));
        } else {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files) VALUES (%d, %s, %s )", array($oxiid, 'oxi-addons', $data)));
        }
    }
}

if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
    $nonce = $_REQUEST['_wpnonce'];
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
if (!empty($_POST['OxiAddonsListFileDelete']) && is_numeric($_POST['oxi-item-id'])) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileDelete' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int) $_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER by id ASC", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
//echo '<pre>';
//print_r($styledata);
//echo '</pre>';
?>
<div class="wrap">    
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post"  id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Counter Information
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            $imageeffects = $styledata[3];
                                            $imagealignments = $styledata[5];
                                            ?>
                                            <div class="form-group row form-group-sm">
                                                <label for="image-effects" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Select effect style of your hover">Effects Style</label>
                                                <div class="col-sm-6">
                                                    <select  class="form-control" name="image-effects" id="image-effects">
                                                        <option <?php
                                                        if ($imageeffects == 'ihewc-lightspeed-in-left') {
                                                            echo 'selected';
                                                        }
                                                        ?> value="ihewc-lightspeed-in-left" class="sub-lightspeed-effects">Lightspeed in Left</option>
                                                        <option <?php
                                                        if ($imageeffects == 'ihewc-lightspeed-in-right') {
                                                            echo 'selected';
                                                        }
                                                        ?> value="ihewc-lightspeed-in-right" class="sub-lightspeed-effects">Lightspeed in Right</option>
                                                        <option <?php
                                                        if ($imageeffects == 'ihewc-lightspeed-out-left') {
                                                            echo 'selected';
                                                        }
                                                        ?> value="ihewc-lightspeed-out-left" class="sub-lightspeed-effects">Lightspeed Out Left</option>
                                                        <option <?php
                                                        if ($imageeffects == 'ihewc-lightspeed-out-right') {
                                                            echo 'selected';
                                                        }
                                                        ?> value="ihewc-lightspeed-out-right" class="sub-lightspeed-effects">Lightspeed Out Right</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row form-group-sm">
                                                <label for="image-alignments" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Customize Your Hover Item Alignments">Alignments</label>
                                                <div class="col-sm-6 nopadding">
                                                    <select class="form-control" id="image-alignments" name="image-alignments">
                                                        <option value="ihewc-layout-vertical-top" <?php
                                                        if ($imagealignments == 'ihewc-layout-vertical-top') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Top</option>
                                                        <option value="ihewc-layout-vertical-middle" <?php
                                                        if ($imagealignments == 'ihewc-layout-vertical-middle') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Middle</option>

                                                        <option value="ihewc-layout-vertical-bottom" <?php
                                                        if ($imagealignments == 'ihewc-layout-vertical-bottom') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Bottom </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAdmin-Item', $styledata, 7, 'false', '.oxi-addons-admin-edit-list', 'true', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_number('OxiAdmin-width', $styledata[11], 1, 'Image Width', 'Set Image Width, While it also responsive based on height and width', 'true', '.ihewc-hover-padding-' . $oxiid . '', 'width', '');
                                            echo oxi_addons_adm_help_number('OxiAdmin-height', $styledata[13], 1, 'Image Height', 'Set Image Height, While it also responsive based on height and width', 'true', '', '', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-I-bg', $styledata[15], 'rgba', 'Background Color', 'Select Your Image Hover Background Color', 'false', '.ihewc-hover-' . $oxiid . ':hover,  .oxi-addons-preview-data   .ihewc-hover-' . $oxiid . ':hover:before,  .oxi-addons-preview-data  .ihewc-hover-' . $oxiid . ':hover:after, .oxi-addons-preview-data  .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure,  .oxi-addons-preview-data  .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure:before,  .oxi-addons-preview-data  .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure:after, .oxi-addons-preview-data  .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure-caption,  .oxi-addons-preview-data  .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure-caption:before, .oxi-addons-preview-data  .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure-caption:after', 'background');
                                            echo oxi_addons_adm_help_true_false('OxiAddCB-button-link-opening', $styledata[249], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-padding', 19, $styledata, 1, 'Padding', 'Set Your Image Padding Top Bottom and Left Right', 'true', '.ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption-content', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-margin', 35, $styledata, 1, 'Margin', 'Set Your Image Margin Top Bottom and Left Right', 'true', '.ihewc-hover-padding-' . $oxiid . '', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-border-radius', 251, $styledata, 1, 'Border Radius', 'Set Your Image Border Radius Top Bottom and Left Right', 'true', '.ihewc-hover-' . $oxiid . ', .oxi-addons-preview-data .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure, .oxi-addons-preview-data .ihewc-hover-' . $oxiid . ' .ihewc-hover-image, .oxi-addons-preview-data  .ihewc-hover-' . $oxiid . ' .ihewc-hover-image img,  .oxi-addons-preview-data .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption,  .oxi-addons-preview-data .ihewc-hover-' . $oxiid . ' .ihewc-hover-figure .ihewc-hover-figure-caption-content', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-hover-border-radius', 267, $styledata, 1, 'Hover Radius', 'Set Your Image Hover Border Top Bottom and Left Right', 'true', '.ihewc-hover-' . $oxiid . ':hover, .oxi-addons-preview-data .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure, .oxi-addons-preview-data .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-image, .oxi-addons-preview-data .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-image img, .oxi-addons-preview-data .ihewc-hover-' . $oxiid . ':hover.ihewc-hover-figure .ihewc-hover-figure-caption, .oxi-addons-preview-data .ihewc-hover-' . $oxiid . ':hover .ihewc-hover-figure .ihewc-hover-figure-caption-content ', 'border-redius');
                                            ?>
                                        </div>                                               
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAdmin-animation', 51, $styledata, 'true', '.ihewc-hover-padding-' . $oxiid . '');
                                            ?>  
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAdmin-box-shadow', 55, $styledata, 'true', '.ihewc-hover-' . $oxiid . '');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover  Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAdmin-hover-box-shadow', 62, $styledata, 'true', '.ihewc-hover-' . $oxiid . ':hover');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php $titleanimation = $styledata[69] ?>
                                            <div class="form-group row form-group-sm oxi-addons-admin-lite-version">
                                                <label for="title-animation" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Select Animation style for Title">Animation</label>
                                                <div class="col-sm-6 nopadding">
                                                    <select class="form-control" id="title-animation" name="title-animation">
                                                        <option value="" <?php
                                                        if ($titleanimation == '') {
                                                            echo 'selected';
                                                        }
                                                        ?>>None</option>                
                                                        <option value="ihewc-fade-up" <?php
                                                        if ($titleanimation == 'ihewc-fade-up') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Up</option>
                                                        <option value="ihewc-fade-down" <?php
                                                        if ($titleanimation == 'ihewc-fade-down') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Down</option>
                                                        <option value="ihewc-fade-left" <?php
                                                        if ($titleanimation == 'ihewc-fade-left') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Left</option>
                                                        <option value="ihewc-fade-right" <?php
                                                        if ($titleanimation == 'ihewc-fade-right') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Right</option>
                                                        <option value="ihewc-fade-up-big" <?php
                                                        if ($titleanimation == 'ihewc-fade-up-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Up Big</option>
                                                        <option value="ihewc-fade-down-big" <?php
                                                        if ($titleanimation == 'ihewc-fade-down-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Down Big</option>
                                                        <option value="ihewc-fade-left-big" <?php
                                                        if ($titleanimation == 'ihewc-fade-left-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Left Big</option>
                                                        <option value="ihewc-fade-right-big" <?php
                                                        if ($titleanimation == 'ihewc-fade-right-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Right Big</option>
                                                        <option value="ihewc-zoom-in" <?php
                                                        if ($titleanimation == 'ihewc-zoom-in') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Zoom In</option>
                                                        <option value="ihewc-zoom-out" <?php
                                                        if ($titleanimation == 'ihewc-zoom-out') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Zoom Out</option>
                                                        <option value="ihewc-flip-x" <?php
                                                        if ($titleanimation == 'ihewc-flip-x') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Flip X</option>
                                                        <option value="ihewc-flip-y" <?php
                                                        if ($titleanimation == 'ihewc-flip-y') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Flip Y</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdmin-T-size', $styledata[71], $styledata[72], $styledata[73], 1, 'Font Size', 'Select Your Font Size', 'true', '.ihewc-hover-' . $oxiid . ' h3.ihewc-heading', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-T-color', $styledata[75], '', 'Color', 'Select Your Title Color', '', '.ihewc-hover-' . $oxiid . ' h3.ihewc-heading', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdmin-T', 77, $styledata, 'true', '.oxi-addons-counter-' . $oxiid . '.ihewc-hover-' . $oxiid . ' h3.ihewc-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-T-padding', 83, $styledata, 1, 'Padding', 'Set Your Title Padding Top Bottom and Left Right', 'true', '.ihewc-hover-' . $oxiid . ' h3.ihewc-heading', 'padding');
                                            ?>  
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Descriptions Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php $descanimation = $styledata[99] ?>
                                            <div class="form-group row form-group-sm oxi-addons-admin-lite-version">
                                                <label for="desc-animation" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Select Animation style for Description">Animation</label>
                                                <div class="col-sm-6 nopadding">
                                                    <select class="form-control" id="desc-animation" name="desc-animation">
                                                        <option value="" <?php
                                                        if ($descanimation == '') {
                                                            echo 'selected';
                                                        }
                                                        ?>>None</option>                
                                                        <option value="ihewc-fade-up" <?php
                                                        if ($descanimation == 'ihewc-fade-up') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Up</option>
                                                        <option value="ihewc-fade-down" <?php
                                                        if ($descanimation == 'ihewc-fade-down') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Down</option>
                                                        <option value="ihewc-fade-left" <?php
                                                        if ($descanimation == 'ihewc-fade-left') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Left</option>
                                                        <option value="ihewc-fade-right" <?php
                                                        if ($descanimation == 'ihewc-fade-right') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Right</option>
                                                        <option value="ihewc-fade-up-big" <?php
                                                        if ($descanimation == 'ihewc-fade-up-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Up Big</option>
                                                        <option value="ihewc-fade-down-big" <?php
                                                        if ($descanimation == 'ihewc-fade-down-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Down Big</option>
                                                        <option value="ihewc-fade-left-big" <?php
                                                        if ($descanimation == 'ihewc-fade-left-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Left Big</option>
                                                        <option value="ihewc-fade-right-big" <?php
                                                        if ($descanimation == 'ihewc-fade-right-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Right Big</option>
                                                        <option value="ihewc-zoom-in" <?php
                                                        if ($descanimation == 'ihewc-zoom-in') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Zoom In</option>
                                                        <option value="ihewc-zoom-out" <?php
                                                        if ($descanimation == 'ihewc-zoom-out') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Zoom Out</option>
                                                        <option value="ihewc-flip-x" <?php
                                                        if ($descanimation == 'ihewc-flip-x') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Flip X</option>
                                                        <option value="ihewc-flip-y" <?php
                                                        if ($descanimation == 'ihewc-flip-y') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Flip Y</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdmin-N-size', $styledata[101], $styledata[102], $styledata[103], 1, 'Font Size', 'Select Your Font Size', 'true', '.ihewc-hover-' . $oxiid . ' .ihewc-content', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-N-color', $styledata[105], '', 'Color', 'Select Your Title Color', '', '.oxi-addons-counter-' . $oxiid . '.ihewc-hover-' . $oxiid . ' .ihewc-content', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdmin-N', 107, $styledata, 'true', '.oxi-addons-counter-' . $oxiid . '.ihewc-hover-' . $oxiid . ' .ihewc-content');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-N-padding', 113, $styledata, 1, 'Padding', 'Set Your Title Padding Top Bottom and Left Right', 'true', '.ihewc-hover-' . $oxiid . ' .ihewc-content', 'padding');
                                            ?>  
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php $buttonanimation = $styledata[129] ?>
                                            <div class="form-group row form-group-sm oxi-addons-admin-lite-version">
                                                <label for="button-animation" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Select Animation style for Button">Animation</label>
                                                <div class="col-sm-6 nopadding">
                                                    <select class="form-control" id="button-animation" name="button-animation">
                                                        <option value="" <?php
                                                        if ($buttonanimation == '') {
                                                            echo 'selected';
                                                        }
                                                        ?>>None</option>                
                                                        <option value="ihewc-fade-up" <?php
                                                        if ($buttonanimation == 'ihewc-fade-up') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Up</option>
                                                        <option value="ihewc-fade-down" <?php
                                                        if ($buttonanimation == 'ihewc-fade-down') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Down</option>
                                                        <option value="ihewc-fade-left" <?php
                                                        if ($buttonanimation == 'ihewc-fade-left') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Left</option>
                                                        <option value="ihewc-fade-right" <?php
                                                        if ($buttonanimation == 'ihewc-fade-right') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Right</option>
                                                        <option value="ihewc-fade-up-big" <?php
                                                        if ($buttonanimation == 'ihewc-fade-up-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Up Big</option>
                                                        <option value="ihewc-fade-down-big" <?php
                                                        if ($buttonanimation == 'ihewc-fade-down-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Down Big</option>
                                                        <option value="ihewc-fade-left-big" <?php
                                                        if ($buttonanimation == 'ihewc-fade-left-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Left Big</option>
                                                        <option value="ihewc-fade-right-big" <?php
                                                        if ($buttonanimation == 'ihewc-fade-right-big') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Fade Right Big</option>
                                                        <option value="ihewc-zoom-in" <?php
                                                        if ($buttonanimation == 'ihewc-zoom-in') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Zoom In</option>
                                                        <option value="ihewc-zoom-out" <?php
                                                        if ($buttonanimation == 'ihewc-zoom-out') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Zoom Out</option>
                                                        <option value="ihewc-flip-x" <?php
                                                        if ($buttonanimation == 'ihewc-flip-x') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Flip X</option>
                                                        <option value="ihewc-flip-y" <?php
                                                        if ($buttonanimation == 'ihewc-flip-y') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Flip Y</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdmin-button-size', $styledata[131], $styledata[132], $styledata[133], 1, 'Button Size', 'Select Your Button Text Size', 'true', '.ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-button-color', $styledata[135], '', 'Color', 'Select Your Icon Color', 'false', '.ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-button-bgcolor', $styledata[137], 'rgba', 'Background Color', 'Select Your Button Background Color', 'false', '.ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-button-border', 139, $styledata, 1, 'Border', 'Set Your Content Boxes Border width', 'true', '.ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAdmin-button-border', 155, $styledata, 'true', '.ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button', 'border');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-button-radius', 159, $styledata, 1, 'Border Radius', 'Set Your Content Boxes Border Radius ', 'true', '.ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button', 'border-radius');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdmin-button', 175, $styledata, 'true', '.ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-button-padding', 181, $styledata, 1, 'Padding', 'Set Your Button Padding ', 'true', '.ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-button-margin', 197, $styledata, 1, 'Margin', 'Set Your Heading Margin ', 'true', '.ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-button-hover-color', $styledata[213], '', ' Color', 'Select Your Button Hover Text Color', 'false', '.ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-button-hover-bgcolor', $styledata[215], 'rgba', 'Background Color', 'Select Your Button Hover Background Color', 'false', '.ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:hover', 'background');
                                            echo OxiAddonsADMhelpBorder('OxiAdmin-hover-button-border', 217, $styledata, 'true', '.ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:hover');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-hover-button-radius', 221, $styledata, 1, 'Border Radius', 'Set Your Content Boxes Border Radius Top Bottom and Left Right', 'true', '.ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:hover', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAdmin-button-box-shadow', 237, $styledata, 'true', '.ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAdmin-button-hover-box-shadow', 243, $styledata, 'true', '.ihewc-hover-' . $oxiid . ' .ihewc-button.img-btn:hover');
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
                            <?php wp_nonce_field("oxi-addons-counter-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open('Create New Image Effects');
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Image Effects', $listdata, 1, 'title');
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
                    <?php echo oxi_image_effects_style_16_shortcode($style, $listdata, 'admin'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Image Effects Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textbox('OxiAdmin-file-title', $listitemdata[1], 'Title', 'Give Your Title Text, Unless make it blank');
                    echo oxi_addons_adm_help_modal_textarea('OxiAdmin-file-desc', $listitemdata[3], 'Description', 'Give Your Description Text, Unless make it blank');
                    echo oxi_addons_adm_help_modal_textbox('OxiAdmin-file-button', $listitemdata[5], 'Button Text', 'Give Your Button Text, Unless make it blank');
                    echo oxi_addons_adm_help_modal_textbox('OxiAdmin-file-link', $listitemdata[7], 'Link or Url', 'Give Your Link Text, Unless make it blank');
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAdmin-file-image', $listitemdata[9], 'Image Url', 'Give Your Title Text, Unless make it blank');
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
