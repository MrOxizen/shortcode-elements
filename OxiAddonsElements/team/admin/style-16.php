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
    if (!wp_verify_nonce($nonce, 'oxi-addons-team-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        echo '';
        if (isset($_POST['social_icons_name'])) {
            $iconname = array_map('esc_attr', $_POST['social_icons_name']);
            $icon_class = array_map('esc_attr', $_POST['social_icons_class']);
            $SCColor = array_map('esc_attr', $_POST['SCColor']);
            $SCBGColor = array_map('esc_attr', $_POST['SCBGColor']);
            $SCBColor = array_map('esc_attr', $_POST['SCBColor']);
            $SCHColor = array_map('esc_attr', $_POST['SCHColor']);
            $SCBGHColor = array_map('esc_attr', $_POST['SCBGHColor']);
            $SCBHColor = array_map('esc_attr', $_POST['SCBHColor']);
            $count = count($iconname);
            $socialindata = '';
            for ($i = 0; $i < $count; $i++) {
                if (!empty($iconname[$i])) {
                    $socialindata .= $iconname[$i] . '{|}{|}';
                    $socialindata .= OxiAddonsAdminFontAwesomeSenitize($icon_class[$i]) . '{|}{|}';
                    $socialindata .= $SCColor[$i] . '{|}{|}';
                    $socialindata .= $SCBGColor[$i] . '{|}{|}';
                    $socialindata .= $SCBColor[$i] . '{|}{|}';
                    $socialindata .= $SCHColor[$i] . '{|}{|}';
                    $socialindata .= $SCBGHColor[$i] . '{|}{|}';
                    $socialindata .= $SCBHColor[$i] . '{|}||{|}';
                }
            }
        }
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddons-rows') . ''
                . ' OxiAddons-name-BGC|' . sanitize_text_field($_POST['OxiAddons-name-BGC']) . '|'
                . ' OxiAddons-dig-BGC|' . sanitize_text_field($_POST['OxiAddons-dig-BGC']) . '|'
                . '||||||||||||||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-margin') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddons-W') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddons-H') . ''
                . '|||||||'
                . '|||||||'
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddons-animation') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddons-name-fs') . ''
                . ' OxiAddons-name-C|' . sanitize_hex_color($_POST['OxiAddons-name-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-name') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-name-padding') . ''
                . ' Social-Style|' . sanitize_text_field($_POST['Social-Style']) . '|'
                . ' Social-Hover-Style|' . sanitize_text_field($_POST['Social-Hover-Style']) . '|'
                . ' Social-Style-design|' . sanitize_text_field($_POST['Social-Style-design']) . '|'
                . ' OxiAddons-transform-propertyX|' . sanitize_text_field($_POST['OxiAddons-transform-propertyX']) . '|'
                . ' OxiAddons-transform-propertyY|' . sanitize_text_field($_POST['OxiAddons-transform-propertyY']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-social-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddons-dig-fs') . ''
                . ' OxiAddons-dig-C|' . sanitize_text_field($_POST['OxiAddons-dig-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-dig') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-dig-padding') . ''
                . 'OxiAddons-dig-margin-bottom|' . sanitize_text_field($_POST['OxiAddons-dig-margin-bottom']) . '|'
                . '||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-social-margin') . ''
                . '||||'
                . '' . oxi_addons_adm_help_single_size('OxiAddons-social-fs') . ''
                . 'OxiAddCB-content-al|' . sanitize_text_field($_POST['OxiAddCB-content-al']) . '|'
                . '||||'
                . ' OxiAddons-hover-BG|' . sanitize_text_field($_POST['OxiAddons-hover-BG']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddons-social-width') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddons-social-height') . ''
                . '||||||||||||||||'
                . '' . oxi_addons_adm_help_single_size('OxiAddons-social-border-size') . ''
                . '||||||||||||'
                . '||||||||||||||||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-social-border-radius') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-social-icon-margin') . ''
                . '||#||'
                . $socialindata;
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];

        if (isset($_POST['socail-modal-icons'])) {
            $icon = array_map('esc_attr', $_POST['socail-modal-icons']);
            $icon_link = array_map('esc_attr', $_POST['social-icon-modal-link']);
            $count = count($icon);
            $socialdata = '';
            for ($i = 0; $i < $count; $i++) {
                if (!empty($icon[$i])) {
                    $socialdata .= OxiAddonsAdminFontAwesomeSenitize($icon[$i]) . '{|}{|}';
                    $socialdata .= $icon_link[$i] . '{|}||{|}';
                }
            }
        }
        $data = 'OxiAddteamname||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddteamname']) . '||#||'
                . 'OxiAddteamdeg ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddteamdeg']) . '||#|| '
                . 'OxiAddons-IMG||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddons-IMG']) . '||#||'
                . 'OxiAddons-social||#||' . OxiAddonsADMHelpTextSenitize($socialdata) . '||#||'
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
$listid = '';
$listitemdata = array("", "", "", "", "", "", "", "{|}{|}{|}{|}#fff{|}{|}#7a00b3{|}{|}#fff{|}{|}#b3008f{|}{|}", "");
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">      
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li  ref="#oxi-addons-tabs-2">Social Icons</li>  
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs"  id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddons-rows', $styledata, 3, 'false', '.oxi-addons-admin-edit-list');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddons-hover-BG', $styledata[185], 'rgba', 'Background Color', 'Select Your Hover Background Color');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddCB-content-al', $styledata[179], 'Content Align', 'Set Your Button Align', 'true', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-margin', 27, $styledata, 1, 'Margin', 'Set Your Team  Margin Top Bottom and Left Right', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Transform Property
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('OxiAddons-transform-propertyX', $styledata[103], 1, 'TransformX', 'Set Your Team Transform Property X numvber', 'FALSE');
                                            echo oxi_addons_adm_help_number('OxiAddons-transform-propertyY', $styledata[105], 1, 'TransformY', 'Set Your Team Transform Property Y numvber', 'FALSE');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Profile Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-W', $styledata[43], $styledata[44], $styledata[45], 1, 'Width', 'Select Your Image Width at Pixel', '');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-H', $styledata[47], $styledata[48], $styledata[49], 1, 'Height', 'Select Your Image Height at Pixel', '');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddons-animation', 65, $styledata, 'true', '.oxi-addons-icon-boxes-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Team Name 
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-name-fs', $styledata[69], $styledata[70], $styledata[71], 1, 'Font Size', 'Set Your Team Name Font Size', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddons-name-C', $styledata[73], 'hex', 'Color', 'Select Your Heading Color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddons-name-BGC', $styledata[7], 'rgba', 'Background Color', 'Select Your Heading Background Color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddons-name', 75, $styledata);
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-name-padding', 81, $styledata, 1, 'Margin', 'Set Your Team Name Padding Top Bottom and Left Right', 'true');
                                            ?>
                                        </div>
                                    </div>                                    
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Team Designation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-dig-fs', $styledata[123], $styledata[124], $styledata[125], 1, 'Font Size', 'Set Your Team Name Font Size', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddons-dig-C', $styledata[127], 'hex', 'Color', 'Select Your Heading Hover Color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddons-dig-BGC', $styledata[9], 'rgba', 'Background Color', 'Select Your Designation Color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddons-dig', 129, $styledata);
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-dig-padding', 135, $styledata, 1, 'Padding', 'Set Your Team Name Padding Top Bottom and Left Right', 'true');
                                            echo oxi_addons_adm_help_number('OxiAddons-dig-margin-bottom', $styledata[151], 1, 'Margin Bottom', 'Set Your Team Designation Margin Bottom', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Social Box
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-social-width', $styledata[187], $styledata[188], $styledata[189], 1, 'Width', 'Set Your Social icon Box Width Size', 'False');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-social-height', $styledata[191], $styledata[192], $styledata[193], 1, 'Height', 'Set Your Social icon Box Height Size', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-social-padding', 107, $styledata, 1, 'Padding', 'Set Your Team Name Padding Top Bottom and Left Right', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-social-margin', 155, $styledata, 1, 'Margin', 'Set Your Team Name Margin Top Bottom and Left Right', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Social Icons
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-social-fs', $styledata[175], $styledata[176], $styledata[177], 1, 'Font Size', 'Set Your Team Name Font Size', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddons-social-border-size', $styledata[211], $styledata[212], $styledata[213], 1, 'Border Size', 'Set Your Team Name Font Size', 'true');
                                            ?>
                                            <div class="form-group row">
                                                <label for="Social-Style" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Social Border Style">Border Style </label>
                                                <div class="col-sm-3 addons-dtm-laptop-lock">
                                                    <select class="form-control" id="Social-Style" name="Social-Style">
                                                        <optgroup label="Normal">
                                                            <option value="Left Right Top Bottom" <?php echo selected('Left Right Top Bottom', $styledata[97], true); ?>>All Side</option>
                                                        </optgroup>
                                                        <optgroup label="Unique">
                                                            <option value="Left" <?php echo selected('Left', $styledata[97], true); ?>>Left</option>
                                                            <option value="Right" <?php echo selected('Right', $styledata[97], true); ?>>Right</option>
                                                            <option value="Top" <?php echo selected('Top', $styledata[97], true); ?>>Top</option>
                                                            <option value="Bottom" <?php echo selected('Bottom', $styledata[97], true); ?>>Bottom</option>
                                                        </optgroup>
                                                        <optgroup label="Multiple">
                                                            <option value="Left Top" <?php echo selected('Left Top', $styledata[97], true); ?>>Left Top</option>
                                                            <option value="Left Right" <?php echo selected('Left Right', $styledata[97], true); ?>>Left Right</option>
                                                            <option value="Left Bottom" <?php echo selected('Left Bottom', $styledata[97], true); ?>>Left Bottom</option>
                                                            <option value="Top Bottom" <?php echo selected('Top Bottom', $styledata[97], true); ?>>Top Bottom</option>
                                                            <option value="Top Right" <?php echo selected('Top Right', $styledata[97], true); ?>>Top Right</option>
                                                            <option value="Right Bottom" <?php echo selected('Right Bottom', $styledata[97], true); ?>>Right Bottom</option>
                                                        </optgroup>
                                                        <optgroup label="Custom">
                                                            <option value="Left Top Right" <?php echo selected('Left Top Right', $styledata[97], true); ?>>Left Top Right</option>
                                                            <option value="Left Bottom Right" <?php echo selected('Left Bottom Right', $styledata[97], true); ?>>Left Bottom Right</option>
                                                            <option value="Top Left Bottom" <?php echo selected('Top Left Bottom', $styledata[97], true); ?>>Top Left Bottom</option>
                                                            <option value="Top Right Bottom" <?php echo selected('Top Right Bottom', $styledata[97], true); ?>>Top Right Bottom</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 addons-dtm-laptop-lock">
                                                    <select class="form-control" id="Social-Style-design" name="Social-Style-design">                                                       
                                                        <option value="dotted" <?php echo selected('dotted', $styledata[101], true); ?>>Dotted</option>
                                                        <option value="dashed" <?php echo selected('dashed', $styledata[101], true); ?>>Dashed</option>
                                                        <option value="solid" <?php echo selected('solid', $styledata[101], true); ?>>Solid</option>
                                                        <option value="double" <?php echo selected('double', $styledata[101], true); ?>>Double</option>
                                                        <option value="groove" <?php echo selected('groove', $styledata[101], true); ?>>Groove</option>
                                                        <option value="ridge" <?php echo selected('ridge', $styledata[101], true); ?>>Ridge</option>
                                                        <option value="inset" <?php echo selected('inset', $styledata[101], true); ?>>Inset</option>
                                                        <option value="outset" <?php echo selected('outset', $styledata[101], true); ?>>Outset</option>
                                                        <option value="none" <?php echo selected('none', $styledata[101], true); ?>>None</option>                                                        
                                                        <option value="hidden" <?php echo selected('hidden', $styledata[101], true); ?>>Hidden</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-social-border-radius', 243, $styledata, 1, 'Border Radius', 'Set Your Team Name Border Radius Top Bottom and Left Right', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddons-social-icon-margin', 259, $styledata, 1, 'Margin', 'Set Your Team Name Margin Top Bottom and Left Right', 'true');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Hover Social Icons
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <div class="form-group row">
                                                <label for="Social-Hover-Style" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Social Border Style">Border Hover Style </label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control" id="Social-Hover-Style" name="Social-Hover-Style">
                                                        <optgroup label="Normal">
                                                            <option value="Left Right Top Bottom"  <?php echo selected('Left Right Top Bottom', $styledata[99], true); ?>>All Side</option>
                                                        </optgroup>
                                                        <optgroup label="Unique">
                                                            <option value="Left" <?php echo selected('Left', $styledata[99], true); ?>>Left</option>
                                                            <option value="Right" <?php echo selected('Right', $styledata[99], true); ?>>Right</option>
                                                            <option value="Top" <?php echo selected('Top', $styledata[99], true); ?>>Top</option>
                                                            <option value="Bottom" <?php echo selected('Bottom', $styledata[99], true); ?>>Bottom</option>
                                                        </optgroup>
                                                        <optgroup label="Multiple">
                                                            <option value="Left Top" <?php echo selected('Left Top', $styledata[99], true); ?>>Left Top</option>
                                                            <option value="Left Right" <?php echo selected('Left Right', $styledata[99], true); ?>>Left Right</option>
                                                            <option value="Left Bottom" <?php echo selected('Left Bottom', $styledata[99], true); ?>>Left Bottom</option>
                                                            <option value="Top Bottom" <?php echo selected('Top Bottom', $styledata[99], true); ?>>Top Bottom</option>
                                                            <option value="Top Right" <?php echo selected('Top Right', $styledata[99], true); ?>>Top Right</option>
                                                            <option value="Right Bottom" <?php echo selected('Right Bottom', $styledata[99], true); ?>>Right Bottom</option>
                                                        </optgroup>
                                                        <optgroup label="Custom">
                                                            <option value="Left Top Right" <?php echo selected('Left Top Right', $styledata[99], true); ?>>Left Top Right</option>
                                                            <option value="Left Bottom Right" <?php echo selected('Left Bottom Right', $styledata[99], true); ?>>Left Bottom Right</option>
                                                            <option value="Top Left Bottom" <?php echo selected('Top Left Bottom', $styledata[99], true); ?>>Top Left Bottom</option>
                                                            <option value="Top Right Bottom" <?php echo selected('Top Right Bottom', $styledata[99], true); ?>>Top Right Bottom</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2"> 
                                <div class="oxi-addons-content-div-body">
                                    <div class="list-group ui-sortable" style="margin-bottom: 15px" id="oxi_addons_social_icons_body">
                                        <?php
                                        $socialdata = explode("{|}||{|}", $stylefiles[1]);
                                        foreach ($socialdata as $value) {
                                            if (!empty($value)) {
                                                $socialalldata = explode("{|}{|}", $value);
                                                echo '  <ul class="list-group-item list-group-item-action">
                                                            <li class="form-group row">
                                                                <div class="col-sm-3">
                                                                    <input class="form-control mb-2" type="text" value="' . $socialalldata[0] . '"  name="social_icons_name[]" placeholder="Icon Name">
                                                                    <input class="form-control" type="text" value="' . $socialalldata[1] . '"  name="social_icons_class[]" placeholder="Icon Class">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group row ">
                                                                        <label for="SCColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Color">Color</label>
                                                                        <div class="col-sm-6 addons-dtm-laptop-lock">
                                                                            <input type="text" class="form-control oxi-addons-minicolor" name="SCColor[]" value="' . $socialalldata[2] . '">  
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row ">
                                                                        <label for="SCBGColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Background Color">Background</label>
                                                                        <div class="col-sm-6 addons-dtm-laptop-lock">
                                                                            <input type="text" data-format="rgb" data-opacity="true" class="form-control oxi-addons-minicolor" name="SCBGColor[]" value="' . $socialalldata[3] . '">  
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row ">
                                                                        <label for="SCBColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Border Color">Border Color</label>
                                                                        <div class="col-sm-6 addons-dtm-laptop-lock">
                                                                            <input type="text" class="form-control oxi-addons-minicolor" name="SCBColor[]" value="' . $socialalldata[4] . '">  
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group row ">
                                                                        <label for="SCHColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Color">Hover Color</label>
                                                                        <div class="col-sm-6 addons-dtm-laptop-lock">
                                                                            <input type="text" class="form-control oxi-addons-minicolor" name="SCHColor[]" value="' . $socialalldata[5] . '">  
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row ">
                                                                        <label for="SCBGHColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Background Color">Hover Background</label>
                                                                        <div class="col-sm-6 addons-dtm-laptop-lock">
                                                                            <input type="text" data-format="rgb" data-opacity="true" class="form-control oxi-addons-minicolor" name="SCBGHColor[]" value="' . $socialalldata[6] . '">  
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row ">
                                                                        <label for="SCBHColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Border Color">Hover Border</label>
                                                                        <div class="col-sm-6 addons-dtm-laptop-lock">
                                                                            <input type="text" class="form-control oxi-addons-minicolor" name="SCBHColor[]" value="' . $socialalldata[7] . '">  
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-sm-1 align-center">
                                                                    <a href="#" class="btn btn-outline-danger btn-sm">' . oxi_addons_admin_font_awesome('fa-trash') . '</a>
                                                                </div>
                                                            </li>
                                                        </ul>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 d-flex justify-content-center">
                                            <button class="btn btn-outline-info btn-sm" id="social-data-new-btn">Add New Social Icons</button>
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
                            <?php wp_nonce_field("oxi-addons-team-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Team Rearrange', $listdata, 1, 'title');
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
                <div class="oxi-addons-style-left-preview" style="margin-top: 0; border-top: 0">
                    <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                        <?php echo oxi_team_style_16_shortcode($style, $listdata, 'admin') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('OxiAddteamname', $listitemdata[1], 'Name', 'Give Your Team Members Name');
                    echo oxi_addons_adm_help_textbox('OxiAddteamdeg', $listitemdata[3], 'Designation', 'Give Your Team Name');
                    echo oxi_addons_adm_help_model_image_upload('OxiAddons-IMG', $listitemdata[5], 'Profile Image', 'Set Your Team Profile Image', 'false');
                    ?>
                    <div class="oxi-addons-content-div">
                        <div class="oxi-head">
                            Social Icons
                        </div>
                        <div class="oxi-addons-content-div-body">
                            <div class="list-group ui-sortable" style="margin-bottom: 15px" id="oxi_addons_social_icons_modal">
                                <?php
                                $socialmodaloutput = explode("{|}||{|}", $listitemdata[7]);
                                foreach ($socialmodaloutput as $value) {
                                    if (!empty($value)) {
                                        $socialmodaldata = explode("{|}{|}", $value);
                                        $socialalldata = explode("{|}||{|}", $stylefiles[1]);
                                        $selecteddata = '';
                                        foreach ($socialalldata as $val) {
                                            if (!empty($val)) {
                                                $socialallsingledata = explode("{|}{|}", $val);
                                                $selecteddata .= '<option value="' . $socialallsingledata[1] . '" ';
                                                if ($socialallsingledata[1] == $socialmodaldata[0]) {
                                                    $selecteddata .= 'selected';
                                                }
                                                $selecteddata .= '>' . $socialallsingledata[0] . '</option>';
                                            }
                                        }

                                        echo '<ul class="list-group-item list-group-item-action"> 
                                                <li class="form-group row mb-0">          
                                                    <div class="col-sm-5">              
                                                        <div class="form-group row mb-0">  
                                                            <label for="socail-modal-icons[]" class="col-sm-6 control-label mb-0  pt-1" oxi-addons-tooltip="Select social icon from selected menu">Social Icons</label>    
                                                            <div class="col-sm-6">                                 
                                                                <select class="form-control" id="socail-modal-icons[]" name="socail-modal-icons[]">   
                                                                    ' . $selecteddata . '    
                                                                </select>                  
                                                            </div>            
                                                        </div>                  
                                                    </div>                  
                                                    <div class="col-sm-5">  
                                                        <div class=" form-group row  mb-0"> 
                                                            <label for="oxi_addons-button-link" class="col-sm-6 col-form-label mb-0" oxi-addons-tooltip="Add link/URL to link your Social Icons" style="">Social Link</label>    
                                                            <div class="col-sm-6">                           
                                                                <input class="form-control" type="text" value="' . $socialmodaldata[1] . '" id="social-icon-modal-link[]" name="social-icon-modal-link[]">    
                                                            </div>          
                                                        </div>        
                                                    </div>               
                                                    <div class="col-sm-2">    
                                                        <a href="#" class="btn btn-outline-danger btn-sm">' . oxi_addons_admin_font_awesome('fa-trash') . '</a>     
                                                    </div>       
                                                </li>    
                                            </ul>';
                                    }
                                }

                                $socialoutput = explode("{|}||{|}", $stylefiles[1]);
                                ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <button class="btn btn-outline-info btn-sm" id="social-modal-new-btn">Add New Social Icons</button>
                                </div>
                            </div>
                        </div>
                    </div>
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

<?php
$Socialnewdata = '<ul class="list-group-item list-group-item-action">
                        <li class="form-group row">
                            <div class="col-sm-3">
                                <input class="form-control  mb-2" type="text" value=""  name="social_icons_name[]" placeholder="Icon Name">
                                <input class="form-control" type="text" value=""  name="social_icons_class[]" placeholder="Icon Class">
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row ">
                                    <label for="SCColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Color">Color</label>
                                    <div class="col-sm-6 addons-dtm-laptop-lock">
                                        <input type="text" class="form-control oxi-addons-minicolor" name="SCColor[]" value="#FFF">  
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="SCBGColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Background Color">Background</label>
                                    <div class="col-sm-6 addons-dtm-laptop-lock">
                                        <input type="text" data-format="rgb" data-opacity="true" class="form-control oxi-addons-minicolor" name="SCBGColor[]" value="rgba(128, 128, 128, 1)">  
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="SCBColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Border Color">Border Color</label>
                                    <div class="col-sm-6 addons-dtm-laptop-lock">
                                        <input type="text" class="form-control oxi-addons-minicolor" name="SCBColor[]" value="rgba(128, 128, 128, 1)">  
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row ">
                                    <label for="SCHColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Color">Hover Color</label>
                                    <div class="col-sm-6 addons-dtm-laptop-lock">
                                        <input type="text" class="form-control oxi-addons-minicolor" name="SCHColor[]" value="#FFF">  
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="SCBGHColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Background Color">Hover Background</label>
                                    <div class="col-sm-6 addons-dtm-laptop-lock">
                                        <input type="text" data-format="rgb" data-opacity="true" class="form-control oxi-addons-minicolor" name="SCBGHColor[]" value="rgba(180, 51, 219, 1)">  
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="SCBHColor" class="col-sm-6 control-label"  oxi-addons-tooltip="Select Your Social Border Color">Hover Border</label>
                                    <div class="col-sm-6 addons-dtm-laptop-lock">
                                        <input type="text" class="form-control oxi-addons-minicolor" name="SCBHColor[]" value="rgba(180, 51, 219, 1)">  
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-1 align-center">
                                <a href="#" class="btn btn-outline-danger btn-sm">' . oxi_addons_admin_font_awesome('fa-trash') . '</a>
                            </div>
                        </li>
                    </ul>';
$socialdata = explode("{|}||{|}", $stylefiles[1]);
$socialmodalnew = '';
foreach ($socialdata as $value) {
    if (!empty($value)) {
        $socialalldata = explode("{|}{|}", $value);
        $socialmodalnew .= '<option value="' . $socialalldata[1] . '">' . $socialalldata[0] . '</option>';
    }
}
$modalsocial = '<ul class="list-group-item list-group-item-action">
                    <li class="form-group row  mb-0">
                        <div class="col-sm-5">
                            <div class="form-group row mb-0">
                                <label for="socail-modal-icons[]" class="col-sm-6 control-label mb-0  pt-1" oxi-addons-tooltip="Select social icon from selected menu">Social Icons</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="socail-modal-icons[]" name="socail-modal-icons[]">
                                        ' . $socialmodalnew . '
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-5">
                            <div class=" form-group row mb-0">
                                <label for="oxi_addons-button-link" class="col-sm-6 col-form-label mb-0" oxi-addons-tooltip="Add link/URL to link your Social Icons" style="">Social Link</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" value="#" id="social-icon-modal-link[]" name="social-icon-modal-link[]">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                              <a href="#" class="btn btn-outline-danger btn-sm">' . oxi_addons_admin_font_awesome('fa-trash') . '</a>
                        </div>
                    </li>
                </ul>';
$Socialnewdata = preg_replace("/\r\n|\r|\n/", ' ', $Socialnewdata);
$modalsocial = preg_replace("/\r\n|\r|\n/", ' ', $modalsocial);
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#social-data-new-btn').on('click', function () {
            jQuery("#oxi_addons_social_icons_body").append('<?php echo $Socialnewdata; ?>');
            jQuery('.oxi-addons-minicolor').each(function () {
                jQuery(this).minicolors({
                    control: jQuery(this).attr('data-control') || 'hue',
                    defaultValue: jQuery(this).attr('data-defaultValue') || '',
                    format: jQuery(this).attr('data-format') || 'hex',
                    keywords: jQuery(this).attr('data-keywords') || 'transparent' || 'initial' || 'inherit',
                    inline: jQuery(this).attr('data-inline') === 'true',
                    letterCase: jQuery(this).attr('data-letterCase') || 'lowercase',
                    opacity: jQuery(this).attr('data-opacity'),
                    position: jQuery(this).attr('data-position') || 'bottom left',
                    swatches: jQuery(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                    change: function (value, opacity) {
                        if (!value)
                            return;
                        if (opacity)
                            value += ', ' + opacity;
                        if (typeof console === 'object') {
                            console.log(value);
                        }
                    },
                    theme: 'bootstrap'
                });
            });
            return false;
        });
        jQuery('#oxi_addons_social_icons_body a').live('click', function () {
            r = confirm('Delete this Category?');
            if (r) {
                var id = jQuery(this).parent().find('.form-group.row');
                jQuery(this).closest('ul').remove();
            }
        });
        jQuery('#social-modal-new-btn').on('click', function () {
            jQuery("#oxi_addons_social_icons_modal").append('<?php echo $modalsocial; ?>');
            return false;
        });
        jQuery('#oxi_addons_social_icons_modal a').live('click', function () {
            r = confirm('Delete this Category?');
            if (r) {
                var id = jQuery(this).parent().find('.form-group.row');
                jQuery(this).closest('ul').remove();
            }
        });

    });
</script>
 