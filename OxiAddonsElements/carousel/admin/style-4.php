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
$listid = '';
$listitemdata = array("", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-icon-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddcarousel-rows') . ''
                . 'oxi_addons-auto-play |' . sanitize_text_field($_POST['oxi_addons-auto-play']) . '|'
                . 'oxi_addons-auto-play-time |' . sanitize_text_field($_POST['oxi_addons-auto-play-time']) . '|'
                . 'oxi_addons-center-mode |' . sanitize_text_field($_POST['oxi_addons-center-mode']) . '|'
                . 'oxi_addons-pause-in-hover |' . sanitize_text_field($_POST['oxi_addons-pause-in-hover']) . '|'
                . 'oxi_addons-looping |' . sanitize_text_field($_POST['oxi_addons-looping']) . '|'
                . 'oxi_addons-mouse-draggable |' . sanitize_text_field($_POST['oxi_addons-mouse-draggable']) . '|'
                . 'oxi_addons-right-to-left |' . sanitize_text_field($_POST['oxi_addons-right-to-left']) . '|'
                . 'oxi_addons-content-position |' . sanitize_text_field($_POST['oxi_addons-content-position']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-M') . ''
                . 'oxi_addons-pag |' . sanitize_text_field($_POST['oxi_addons-pag']) . '|'
                . 'oxi_addons-pag-s2-position |' . sanitize_text_field($_POST['oxi_addons-pag-s2-position']) . '|'
                . '' . oxi_addons_adm_help_single_size('oxi_addons-pag-s1-top') . ''
                . '' . oxi_addons_adm_help_single_size('oxi_addons-pag-s1-left') . ''
                . 'oxi_addons-pag-BG |' . sanitize_text_field($_POST['oxi_addons-pag-BG']) . '|'
                . 'oxi_addons-pag-HBG |' . sanitize_text_field($_POST['oxi_addons-pag-HBG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-pag-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-pag-BR-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-pag-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-pag-M') . ''
                . 'oxi_addons-nav |' . sanitize_text_field($_POST['oxi_addons-nav']) . '|'
                . 'oxi_addons-nav-type |' . sanitize_text_field($_POST['oxi_addons-nav-type']) . '|'
                . '||'
                . '||'
                . 'oxi_addons-nav-style |' . sanitize_text_field($_POST['oxi_addons-nav-style']) . '|'
                . 'oxi_addons-nav-s2-position |' . sanitize_text_field($_POST['oxi_addons-nav-s2-position']) . '|'
                . '' . oxi_addons_adm_help_single_size('oxi_addons-nav-s1-top') . ''
                . '' . oxi_addons_adm_help_single_size('oxi_addons-nav-s1-left') . ''
                . '' . oxi_addons_adm_help_single_size('oxi_addons-nav-FS') . ''
                . 'oxi_addons-nav-C |' . sanitize_text_field($_POST['oxi_addons-nav-C']) . '|'
                . 'oxi_addons-nav-HC |' . sanitize_text_field($_POST['oxi_addons-nav-HC']) . '|'
                . 'oxi_addons-nav-BG |' . sanitize_text_field($_POST['oxi_addons-nav-BG']) . '|'
                . 'oxi_addons-nav-HBG |' . sanitize_text_field($_POST['oxi_addons-nav-HBG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('oxi_addons-nav-B') . ''
                . 'oxi_addons-nav-BC |' . sanitize_text_field($_POST['oxi_addons-nav-BC']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('oxi_addons-nav-B-H') . ''
                . 'oxi_addons-nav-BC |' . sanitize_text_field($_POST['oxi_addons-nav-BC-H']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-nav-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-nav-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-nav-BR-H') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-nav-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_addons-nav-M') . ''
                . 'oxi_addons-marge |' . sanitize_text_field($_POST['oxi_addons-marge']) . '|'
                . 'oxi_addons-stagepadding |' . sanitize_text_field($_POST['oxi_addons-stagepadding']) . '|'
                . 'oxi_addons-auto-height |' . sanitize_text_field($_POST['oxi_addons-auto-height']) . '|'
                . 'oxi_addons-nav-view|' . sanitize_text_field($_POST['oxi_addons-nav-view']) . '|'
                . 'oxi_addons-pag-view|' . sanitize_text_field($_POST['oxi_addons-pag-view']) . '|'
                . 'oxi_addons-pag-scale|' . sanitize_text_field($_POST['oxi_addons-pag-scale']) . '|'
                . 'oxi_addons-animation-in|' . sanitize_text_field($_POST['oxi_addons-animation-in']) . '|'
                . 'oxi_addons-animation-out|' . sanitize_text_field($_POST['oxi_addons-animation-out']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('oxi_addons-box-shadow') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('oxi_addons-hover-box-shadow') . ''
                . '||#||oxi_addons-nav-left||#||' . OxiAddonsADMHelpTextSenitize(OxiAddonsAdminFontAwesomeSenitize($_POST['oxi_addons-nav-left'])) . '||#||'
                . 'oxi_addons-nav-right||#||' . OxiAddonsADMHelpTextSenitize(OxiAddonsAdminFontAwesomeSenitize($_POST['oxi_addons-nav-right'])) . '||#|| '
                . '||#|| ||#|| ';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = ' oxi_addons-carousel-data ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-carousel-data']) . '||#||'
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
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Basic Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddcarousel-rows', $styledata, 3, 'false', '');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-auto-play', $styledata[7], 'On', 'true', 'Off', 'false', 'Auto Play', 'Set Your Carousel Autoplay', '');
                                        echo oxi_addons_adm_help_number('oxi_addons-auto-play-time', $styledata[9], 0.01, 'Auto Play Duration', 'Set Your Carousel Auto Play Duration', 'true', '', '');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-center-mode', $styledata[11], 'On', 'true', 'Off', 'false', 'Center Mode', 'Set Your Carousel Center Mode Yes nor Not', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-pause-in-hover', $styledata[13], 'On', 'true', 'Off', 'false', 'Pause in Hover', 'Set Your Carousel Pause in Hover', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-looping', $styledata[15], 'On', 'true', 'Off', 'false', 'Infinite Loop', 'Off/On infinite loop Mode', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-marge', $styledata[233], 'On', 'true', 'Off', 'false', 'Marge', 'Set Your Carousel Marge', 'true');
                                        echo oxi_addons_adm_help_number('oxi_addons-stagepadding', $styledata[235], 1, 'Stage padding', 'Set Your Carousel Stage Padding', 'true', '', '');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-auto-height', $styledata[237], 'On', 'true', 'Off', 'false', 'Auto Height', 'Auto Height True False', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-mouse-draggable', $styledata[17], 'On', 'true', 'Off', 'false', 'Mouse Draggable', 'Mouse Draggable True False', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-right-to-left', $styledata[19], 'Yes', 'true', 'No', 'false', 'Right to left', 'yes if you want carousel Right to Left Direction', 'true');
                                        ?>
                                        <div class="form-group row" >
                                            <label for="oxi_addons-content-position" class="col-sm-6 control-label" oxi-addons-tooltip="Select Your carousel Content Position">Content Position</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="oxi_addons-content-position" name="oxi_addons-content-position">
                                                    <option value="flex-start" <?php
                                                    if ($styledata[21] == 'flex-start') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Top</option>
                                                    <option value="center"  <?php
                                                    if ($styledata[21] == 'center') {
                                                        echo 'selected';
                                                    }
                                                    ?> >Middle</option>
                                                    <option value="flex-end"  <?php
                                                    if ($styledata[21] == 'flex-end') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Bottom</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                        echo OxiAddonsADMHelpOnlyAnimation('oxi_addons-animation-in', $styledata[245], 'Animation In', 'Set Carousel In Animation', 'true', '');
                                        echo OxiAddonsADMHelpOnlyAnimation('oxi_addons-animation-out', $styledata[247], 'Animation Out', 'Set Carousel Out Animation', 'true', '');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons-M', 23, $styledata, 1, 'Margin', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                        ?>
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Pagination
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('oxi_addons-pag', $styledata[39], 'On', 'true', 'Off', 'false', 'Pagination', 'On/ Off Navigation', '');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-pag-view', $styledata[241], 'Always', '1', 'On Hover', '0', 'Viewing Type', 'Navigation Elements Type', '');
                                        ?>
                                        <div class="form-group row" >
                                            <label for="oxi_addons-pag-s2-position" class="col-sm-6 control-label" oxi-addons-tooltip="Select Your carousel Content Position">Pag Style</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="oxi_addons-pag-s2-position" name="oxi_addons-pag-s2-position">
                                                    <option value="top-left" <?php
                                                    if ($styledata[41] == 'top-left') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Top Left</option>
                                                    <option value="top-middle"  <?php
                                                    if ($styledata[41] == 'top-middle') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Top Middle</option>
                                                    <option value="top-right"  <?php
                                                    if ($styledata[41] == 'top-right') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Top Right</option>
                                                    <option value="bottom-left"  <?php
                                                    if ($styledata[41] == 'bottom-left') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Bottom Left</option>
                                                    <option value="bottom-middle"  <?php
                                                    if ($styledata[41] == 'bottom-middle') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Bottom Middle</option>
                                                    <option value="bottom-right"  <?php
                                                    if ($styledata[41] == 'bottom-right') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Bottom Right</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                        echo oxi_addons_adm_help_number_double_dtm('oxi_addons-pag-s1-top', $styledata[43], $styledata[44], $styledata[45], 'oxi_addons-pag-s1-left', $styledata[47], $styledata[48], $styledata[49], '1', 'Pagination Position', 'Set Your Nav position As Top Bottom And left Right', '');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-pag-BG', $styledata[51], 'rgba', 'Background', 'Set Product Boxes Heading One Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-pag-HBG', $styledata[53], 'rgba', 'Hover Background', 'Set Product Boxes Heading One Text Hover color', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link:hover', 'color');
                                        echo oxi_addons_adm_help_number('oxi_addons-pag-scale', $styledata[243], 0.01, 'Hover Scale', 'Set Your Carousel Hover Scale', 'true', '', '');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons-pag-BR', 55, $styledata, 1, 'Border Radius', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons-pag-BR-H', 71, $styledata, 1, 'Hover Border Radius', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons-pag-P', 87, $styledata, 1, 'Padding', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons-pag-M', 103, $styledata, 1, 'Margin', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                        ?>
                                    </div> 
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Navigation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('oxi_addons-nav', $styledata[119], 'On', 'true', 'Off', 'false', 'Navigation', 'On/ Off Navigation', '');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-nav-view', $styledata[239], 'Always', '1', 'On Hover', '0', 'Viewing Type', 'Navigation Viewing Type ', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-nav-type', $styledata[121], 'Text', 'text', 'Icon', 'icon', 'Navigation Type', 'Navigation Elements Type', '');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-nav-left', $stylefiles[2], 'Left Nav', 'Wtite your icon or Text for Left Nav', 'false');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-nav-right', $stylefiles[4], 'Right Nav', 'Wtite your icon or Text for Right Nav', 'false');
                                        ?>
                                        <div class="form-group row" >
                                            <label for="oxi_addons-nav-style" class="col-sm-6 control-label" oxi-addons-tooltip="Select Your carousel Navigation Position">Nav Style</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="oxi_addons-nav-style" name="oxi_addons-nav-style">
                                                    <option value="style-1"  <?php
                                                    if ($styledata[127] == 'style-1') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Style 1</option>
                                                    <option value="style-2" <?php
                                                    if ($styledata[127] == 'style-2') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Style 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                        if ($styledata[127] == 'style-2') {
                                            ?>
                                            <div class="form-group row" >
                                                <label for="oxi_addons-nav-s2-position" class="col-sm-6 control-label" oxi-addons-tooltip="Select Your carousel Navigation Style">Nav Style</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="oxi_addons-nav-s2-position" name="oxi_addons-nav-s2-position">
                                                        <option value="top-left"  <?php
                                                        if ($styledata[129] == 'top-left') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Top Left</option>
                                                        <option value="top-middle"  <?php
                                                        if ($styledata[129] == 'top-middle') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Top Middle</option>
                                                        <option value="top-right"  <?php
                                                        if ($styledata[129] == 'top-right') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Top Right</option>
                                                        <option value="bottom-left"  <?php
                                                        if ($styledata[129] == 'bottom-left') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Bottom Left</option>
                                                        <option value="bottom-middle"  <?php
                                                        if ($styledata[129] == 'bottom-middle') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Bottom Middle</option>
                                                        <option value="bottom-right"  <?php
                                                        if ($styledata[129] == 'bottom-right') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Bottom Right</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            echo OxiAddonsADMHelpInputHidden('oxi_addons-nav-s2-position', $styledata[129]);
                                        }
                                        echo oxi_addons_adm_help_number_double_dtm('oxi_addons-nav-s1-top', $styledata[131], $styledata[132], $styledata[133], 'oxi_addons-nav-s1-left', $styledata[135], $styledata[136], $styledata[137], '1', 'Nav Position', 'Set Your Nav position As Top Bottom And left Right', '');
                                        ?>
                                    </div> 
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Navigation Typography 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-nav-FS', $styledata[139], $styledata[140], $styledata[141], '1', 'Font Size', 'Set Font Size For Nav', 'true', '', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-nav-C', $styledata[143], '', 'Color', 'Set Product Boxes Heading One Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-nav-HC', $styledata[145], '', 'Hover Color', 'Set Product Boxes Heading One Text Hover color', 'f', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link:hover', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-nav-BG', $styledata[147], 'rgba', 'Background', 'Set Product Boxes Heading One Text color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-nav-HBG', $styledata[149], 'rgba', 'Hover Background', 'Set Product Boxes Heading One Text Hover color', 'f', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link:hover', 'color');
                                        echo oxi_addons_adm_help_border('oxi_addons-nav-B', $styledata[151], $styledata[152], 'Border', 'Set Product Boxes Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-nav-BC', $styledata[155], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'border-color');
                                        echo oxi_addons_adm_help_border('oxi_addons-nav-B-H', $styledata[157], $styledata[158], 'Hover Border', 'Set Product Boxes Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-nav-BC-H', $styledata[161], '', 'Hover Border Color', 'Set Border color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . '', 'border-color');
                                        echo OxiAddonsADMHelpFontSettings('oxi_addons-nav-F', 163, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons-nav-BR', 169, $styledata, 1, 'Border Radius', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons-nav-BR-H', 185, $styledata, 1, 'Hover  Border Radius', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons-nav-P', 201, $styledata, 1, 'Padding', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi_addons-nav-M', 217, $styledata, 1, 'Margin', 'Set Product Boxes Heading One Padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text .oxi-addons-text-link', 'padding');
                                        ?>
                                    </div> 
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Navigation Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('oxi_addons-box-shadow', 249, $styledata, 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Navigation Hover Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('oxi_addons-hover-box-shadow', 255, $styledata, 'true', '.oxi-addons-content-boxes-' . $oxiid . ' .oxi-addons-content-boxes-main');
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
                            <?php wp_nonce_field("oxi-addons-icon-nonce") ?>
                        </div>
                    </div>

                </form> 
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open('Add New Data');
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Carousel Rearrange', $listdata, 1, 'title');
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
                    <?php echo oxi_carousel_style_4_shortcode($style, $listdata, 'admin') ?>
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
                    <h4 class="modal-title">Carousel Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_form_textarea('oxi_addons-carousel-data', $listitemdata[1], 'Add Shortcode', 'Add yout Content or Shortcode here');
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
