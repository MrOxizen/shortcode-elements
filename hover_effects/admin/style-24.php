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
    if (!wp_verify_nonce($nonce, 'oxi-addons-button-effects-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' ||'
                . 'image-alignments|' . sanitize_text_field($_POST['image-alignments']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAdmin-Item') . ''
                . ' OxiAddCB-button-link-opening |' . sanitize_text_field($_POST['OxiAddCB-button-link-opening']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-margin') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAdmin-animation') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAdmin-box-shadow') . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAdmin-hover-box-shadow') . '|'
                . ' OxiAdmin-width |' . sanitize_text_field($_POST['OxiAdmin-width']) . '|'
                . ' OxiAdmin-height|' . sanitize_text_field($_POST['OxiAdmin-height']) . '|'
                . '' . OxiAddonsBGImageSanitize('OxiAdmin-I-bg') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-border-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-hover-border-radius') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAdmin-button-size') . ''
                . '||||'
                . ' OxiAdmin-button-color |' . sanitize_text_field($_POST['OxiAdmin-button-color']) . '|'
                . ' OxiAdmin-button-bgcolor |' . sanitize_text_field($_POST['OxiAdmin-button-bgcolor']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-button-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAdmin-button-border') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-button-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-button-margin') . ''
                . ' OxiAdmin-button-hover-color |' . sanitize_text_field($_POST['OxiAdmin-button-hover-color']) . '|'
                . ' OxiAdmin-button-hover-bgcolor |' . sanitize_text_field($_POST['OxiAdmin-button-hover-bgcolor']) . '|'
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAdmin-hover-button-border') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-hover-button-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-button-padding') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAdmin-button') . ''
                . ' button-animation |' . sanitize_text_field($_POST['button-animation']) . '|'
                . ' title-animation |' . sanitize_text_field($_POST['title-animation']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAdmin-title-size') . ''
                . ' OxiAdmin-title-color |' . sanitize_text_field($_POST['OxiAdmin-title-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAdmin-title') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-title-margin') . ''
                . ' content-animation |' . sanitize_text_field($_POST['content-animation']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAdmin-content-size') . ''
                . ' OxiAdmin-content-color |' . sanitize_text_field($_POST['OxiAdmin-content-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAdmin-content') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-content-margin') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAdmin-title-underline-size') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAdmin-title-underline-height') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAdmin-title-underline') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdmin-underline-margin') . '|'
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
        $data = 'OxiAdmin-file-first-icon||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAdmin-file-first-icon']) . '||#||'
                . 'OxiAdmin-file-desc||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAdmin-file-desc']) . '||#||'
                . 'OxiAdmin-file-button-text||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAdmin-file-button-text']) . '||#||'
                . 'OxiAdmin-file-hover-link||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAdmin-file-hover-link']) . '||#||'
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
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
                                            General Information
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            $imagealignments = $styledata[5];
                                            ?>
                                            <div class="form-group row form-group-sm">
                                                <label for="image-alignments" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Customize Your Hover Item Alignments">Alignments</label>
                                                <div class="col-sm-6 nopadding">
                                                    <select class="form-control" id="image-alignments" name="image-alignments">
                                                        <option value="justify-content: flex-start;" <?php
                                                        if ($imagealignments == 'justify-content: flex-start;') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Top</option>
                                                        <option value="justify-content: center;" <?php
                                                        if ($imagealignments == 'justify-content: center;') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Middle</option>
                                                        <option value="justify-content: flex-end;" <?php
                                                        if ($imagealignments == 'justify-content: flex-end;') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Bottom</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAdmin-Item', $styledata, 7, 'false', '.oxi-addons-admin-edit-list', 'true', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_true_false('OxiAddCB-button-link-opening', $styledata[11], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Customize your Link Opening Style');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-padding', 13, $styledata, 1, 'Padding', 'Set Your Image Padding Top Bottom and Left Right', 'true', '.oxi-button-hover-' . $oxiid . ' .oxi-button-info', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-margin', 29, $styledata, 1, 'Margin', 'Set Your Image Margin Top Bottom and Left Right', 'true', '.oxi-button-hover-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>                                               
                                    </div>  
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Image Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('OxiAdmin-width', $styledata[63], 1, 'Image Width', 'Set Image Width, While it also responsive based on height and width', 'false', 'oxi-button-hover-' . $oxiid . ' .oxi-button-hover-map-' . $oxiid . '', 'width', '');
                                            echo oxi_addons_adm_help_number('OxiAdmin-height', $styledata[65], 1, 'Image Height', 'Set Image Height, While it also responsive based on height and width', 'false', '', '', '');
                                            echo OxiAddonsADMHelpBGImage('OxiAdmin-I-bg', $styledata, 67, 'true', '.oxi-button-hover-' . $oxiid . ' .oxi-button-info', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-border-radius', 71, $styledata, 1, 'Border Radius', 'Set Your Image Border Radius Top Bottom and Left Right', 'true', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-hover-border-radius', 87, $styledata, 1, 'Hover Radius', 'Set Your Image Hover Border Radius Top Bottom and Left Right', 'true', '', '');
                                            ?>  
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAdmin-animation', 45, $styledata, 'true', '.oxi-button-hover-' . $oxiid . '');
                                            ?>  
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAdmin-box-shadow', 49, $styledata, 'true', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover  Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAdmin-hover-box-shadow', 56, $styledata, 'true', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover:hover');
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $animationarray = array(
                                    array('', 'None'),
                                    array('ihewc-fade-up', 'Fade Up'),
                                    array('ihewc-fade-down', 'Fade Down'),
                                    array('ihewc-fade-left', 'Fade Left'),
                                    array('ihewc-fade-right', 'Fade Right'),
                                    array('ihewc-fade-up-big', 'Fade Up Big'),
                                    array('ihewc-fade-down-big', 'Fade Down Big'),
                                    array('ihewc-fade-left-big', 'Fade Left Big'),
                                    array('ihewc-fade-right-big', 'Fade Right Big'),
                                    array('ihewc-zoom-in', 'Zoom In'),
                                    array('ihewc-zoom-out', 'Zoom Out'),
                                    array('ihewc-flip-x', 'Flip X'),
                                    array('ihewc-flip-y', 'Flip Y')
                                );
                                ?>
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <div class="form-group row form-group-sm oxi-addons-admin-lite-version">
                                                <label for="title-animation" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Select Animation style for Title">Animation</label>
                                                <div class="col-sm-6 nopadding">
                                                    <select class="form-control" id="title-animation" name="title-animation">
                                                        <?php
                                                        foreach ($animationarray as $value) {
                                                            echo '<option value="' . $value[0] . '" ' . selected($value[0], $styledata[215]) . '>' . $value[1] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdmin-title-size', $styledata[217], $styledata[218], $styledata[219], 1, 'Font Size', 'Select Your Title Text Size', 'true', '.oxi-hover-effects-' . $oxiid . ' .oxi-button-info h3.oxi-button-heading', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-title-color', $styledata[221], '', 'Color', 'Select Your Title Color', 'false', '.oxi-hover-effects-' . $oxiid . ' .oxi-button-info h3.oxi-button-heading', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdmin-title', 223, $styledata, 'true', '.oxi-hover-effects-' . $oxiid . ' .oxi-button-info h3.oxi-button-heading');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-title-margin', 229, $styledata, 1, 'Margin', 'Set Your Title Margin ', 'true', '.oxi-hover-effects-' . $oxiid . ' .oxi-button-info h3.oxi-button-heading', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Title Underline
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdmin-title-underline-size', $styledata[275], $styledata[276], $styledata[277], 1, 'Width', 'Select Your  Title Underline Width', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAdmin-title-underline-height', $styledata[279], $styledata[280], $styledata[281], 1, 'Height', 'Select Your  Title Underline Height', 'false');
                                            echo OxiAddonsADMhelpBorder('OxiAdmin-title-underline', 283, $styledata, 'true', '', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-underline-margin', 287, $styledata, 1, 'Margin', 'Set Your  Title Underline Margin ', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <div class="form-group row form-group-sm oxi-addons-admin-lite-version">
                                                <label for="content-animation" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Select Animation style for Content">Animation</label>
                                                <div class="col-sm-6 nopadding">
                                                    <select class="form-control" id="content-animation" name="content-animation">
                                                        <?php
                                                        foreach ($animationarray as $value) {
                                                            echo '<option value="' . $value[0] . '" ' . selected($value[0], $styledata[245]) . '>' . $value[1] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdmin-content-size', $styledata[247], $styledata[248], $styledata[249], 1, 'Font Size', 'Select Your Content Text Size', 'true', '.oxi-hover-effects-' . $oxiid . ' .oxi-button-info .oxi-button-content', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-content-color', $styledata[251], '', 'Color', 'Select Your Content Color', 'false', '.oxi-hover-effects-' . $oxiid . ' .oxi-button-info .oxi-button-content', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdmin-content', 253, $styledata, 'true', '.oxi-hover-effects-' . $oxiid . ' .oxi-button-info .oxi-button-content');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-content-margin', 259, $styledata, 1, 'Margin', 'Set Your Content Margin ', 'true', '.oxi-hover-effects-' . $oxiid . ' .oxi-button-info .oxi-button-content', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <div class="form-group row form-group-sm oxi-addons-admin-lite-version">
                                                <label for="button-animation" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Select Animation style for Button">Animation</label>
                                                <div class="col-sm-6 nopadding">
                                                    <select class="form-control" id="button-animation" name="button-animation">
                                                        <?php
                                                        foreach ($animationarray as $value) {
                                                            echo '<option value="' . $value[0] . '" ' . selected($value[0], $styledata[213]) . '>' . $value[1] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAdmin-button-size', $styledata[103], $styledata[104], $styledata[105], 1, 'Font Size', 'Select Your Button Text Size', 'true', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover a', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-button-color', $styledata[111], '', 'Color', 'Select Your Button Color', 'false', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover a', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-button-bgcolor', $styledata[113], 'rgba', 'Background Color', 'Select Your Button Background Color', 'false', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover a', 'background');
                                            echo OxiAddonsADMHelpFontSettings('OxiAdmin-button', 207, $styledata, 'true', '.oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-button-border', 115, $styledata, 1, 'Border', 'Set Your Button Border width', 'true', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover a', 'border-width');
                                            echo OxiAddonsADMhelpBorder('OxiAdmin-button-border', 131, $styledata, 'true', '.ihewc-hover-' . $oxiid . '  .img-btn.ihewc-button', 'border');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-button-radius', 135, $styledata, 1, 'Border Radius', 'Set Your Content Boxes Border Radius ', 'true', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover a', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-button-padding', 191, $styledata, 1, 'Padding', 'Set Your Button Padding ', 'true', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover a', 'paddings');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-button-margin', 151, $styledata, 1, 'Margin', 'Set Your Button Margin ', 'true', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover a', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Hover Button Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-button-hover-color', $styledata[167], '', ' Color', 'Select Your Button Hover Text Color', 'false', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover a:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAdmin-button-hover-bgcolor', $styledata[169], 'rgba', 'Background Color', 'Select Your Button Hover Background Color', 'false', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover a:hover', 'background');
                                            echo OxiAddonsADMhelpBorder('OxiAdmin-hover-button-border', 171, $styledata, 'true', '.ihewc-hover-' . $oxiid . ' a:hover');
                                            echo oxi_addons_adm_help_padding_margin('OxiAdmin-hover-button-radius', 175, $styledata, 1, 'Border Radius', 'Set Your Button Border Radius Top Bottom and Left Right', 'true', '.oxi-button-hover-' . $oxiid . ' .oxi-button-hover a:hover', 'border-radius');
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
                            <?php wp_nonce_field("oxi-addons-button-effects-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open('Create New Hover Effects');
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Hover Effects', $listdata, 9, 'image');
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
                    <?php echo oxi_hover_effects_style_24_shortcode($style, $listdata, 'admin'); ?>
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
                    <h4 class="modal-title">Hover Effects Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textbox('OxiAdmin-file-first-icon', $listitemdata[1], 'Title', 'Give Your Hover Effects Title, Unless make it blank');
                    echo oxi_addons_adm_help_modal_textarea('OxiAdmin-file-desc', $listitemdata[3], 'Content', 'Give Your content, Unless make it blank');
                    echo oxi_addons_adm_help_modal_textbox('OxiAdmin-file-button-text', $listitemdata[5], 'Button Text', 'Give Your Hover Effects Button Text, Unless make it blank');
                    echo oxi_addons_adm_help_modal_textbox('OxiAdmin-file-hover-link', $listitemdata[7], 'Link or Url', 'Give Your Link for first Icon, Unless make it blank');
                    echo oxi_addons_adm_help_modal_second_image_upload('OxiAdmin-file-image', $listitemdata[9], 'Image Url', 'Give Your Image URL');
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
