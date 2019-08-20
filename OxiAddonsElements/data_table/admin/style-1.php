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

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddCB-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsDataTable-G-BG') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-G-W') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-G-Padding') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsDataTable-G-BS') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-TH-FS') . ''
                . ' OxiAddonsDataTable-TH-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-TH-C']) . '|'
                . ' OxiAddonsDataTable-TH-BG |' . sanitize_text_field($_POST['OxiAddonsDataTable-TH-BG']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDataTable-TH-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-TH-P') . ''
                . ' OxiAddonsDataTable-TH-AI-I |' . sanitize_text_field($_POST['OxiAddonsDataTable-TH-AI-I']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-TH-AI-FS') . ''
                . ' OxiAddonsDataTable-TH-AI-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-TH-AI-C']) . '|'
                . ' ||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-TH-AI-P') . ''
                . ' OxiAddonsDataTable-TH-DI-I |' . sanitize_text_field($_POST['OxiAddonsDataTable-TH-DI-I']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-TH-DI-FS') . ''
                . ' OxiAddonsDataTable-TH-DI-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-TH-DI-C']) . '|'
                . ' ||'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-TH-DI-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-TB-FS') . ''
                . ' ||'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDataTable-TB-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-TB-P') . ''
                . ' OxiAddonsDataTable-TB-even-BG |' . sanitize_text_field($_POST['OxiAddonsDataTable-TB-even-BG']) . '|'
                . ' OxiAddonsDataTable-TB-odd-BG |' . sanitize_text_field($_POST['OxiAddonsDataTable-TB-odd-BG']) . '|'
                . ' OxiAddonsDataTable-SE |' . sanitize_text_field($_POST['OxiAddonsDataTable-SE']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-SE-FS') . ''
                . ' OxiAddonsDataTable-SE-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-SE-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDataTable-SE-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-SE-P') . ''
                . ' OxiAddonsDataTable-SE-SB-I |' . sanitize_text_field($_POST['OxiAddonsDataTable-SE-SB-I']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-SE-SB-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-SE-SB-H') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-SE-SB-FS') . ''
                . ' OxiAddonsDataTable-SE-SB-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-SE-SB-C']) . '|'
                . ' OxiAddonsDataTable-SE-SB-BG |' . sanitize_text_field($_POST['OxiAddonsDataTable-SE-SB-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsDataTable-SE-SB-B') . ''
                . ' OxiAddonsDataTable-SE-SB-BC |' . sanitize_hex_color($_POST['OxiAddonsDataTable-SE-SB-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-SE-SBP') . ''
                . ' OxiAddonsDataTable-PDF |' . sanitize_text_field($_POST['OxiAddonsDataTable-PDF']) . '|'
                . ' OxiAddonsDataTable-EXCEL |' . sanitize_text_field($_POST['OxiAddonsDataTable-EXCEL']) . '|'
                . ' OxiAddonsDataTable-COPY |' . sanitize_text_field($_POST['OxiAddonsDataTable-COPY']) . '|'
                . ' OxiAddonsDataTable-PRINT |' . sanitize_text_field($_POST['OxiAddonsDataTable-PRINT']) . '|'
                . ' OxiAddonsDataTable-CSV |' . sanitize_text_field($_POST['OxiAddonsDataTable-CSV']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-B-FS') . ''
                . ' OxiAddonsDataTable-B-TC |' . sanitize_hex_color($_POST['OxiAddonsDataTable-B-TC']) . '|'
                . ' OxiAddonsDataTable-B-BG |' . sanitize_text_field($_POST['OxiAddonsDataTable-B-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsDataTable-B-B') . ''
                . ' OxiAddonsDataTable-B-BC |' . sanitize_hex_color($_POST['OxiAddonsDataTable-B-BC']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDataTable-B-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-B-BR') . ''
                . ' OxiAddonsDataTable-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsDataTable-B-HTC']) . '|'
                . ' OxiAddonsDataTable-B-HBG |' . sanitize_text_field($_POST['OxiAddonsDataTable-B-HBG']) . '|'
                . ' OxiAddonsDataTable-B-HBC |' . sanitize_hex_color($_POST['OxiAddonsDataTable-B-HBC']) . '|'
                . ' OxiAddonsDataTable-SB |' . sanitize_text_field($_POST['OxiAddonsDataTable-SB']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-SB-FS') . ''
                . ' OxiAddonsDataTable-SB-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-SB-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDataTable-SB-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-SB-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-input-W') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-input-H') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-input-FS') . ''
                . ' OxiAddonsDataTable-input-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-input-C']) . '|'
                . ' OxiAddonsDataTable-input-BG |' . sanitize_text_field($_POST['OxiAddonsDataTable-input-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsDataTable-input-B') . ''
                . ' OxiAddonsDataTable-input-BC |' . sanitize_hex_color($_POST['OxiAddonsDataTable-input-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-input-P') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsDataTable-input-BS') . ''
                . ' OxiAddonsDataTable-SED |' . sanitize_text_field($_POST['OxiAddonsDataTable-SED']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-SED-FS') . ''
                . ' OxiAddonsDataTable-SED-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-SED-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDataTable-SED-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-SED-P') . ''
                . ' OxiAddonsDataTable-PN |' . sanitize_text_field($_POST['OxiAddonsDataTable-PN']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-PN-FS') . ''
                . ' OxiAddonsDataTable-PN-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-PN-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDataTable-PN-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-PN-P') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDataTable-PN-B-FS') . ''
                . ' OxiAddonsDataTable-PN-B-TC |' . sanitize_hex_color($_POST['OxiAddonsDataTable-PN-B-TC']) . '|'
                . ' OxiAddonsDataTable-PN-B-BG |' . sanitize_text_field($_POST['OxiAddonsDataTable-PN-B-BG']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsDataTable-PN-B-B') . ''
                . ' OxiAddonsDataTable-PN-B-BC |' . sanitize_hex_color($_POST['OxiAddonsDataTable-PN-B-BC']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDataTable-PN-B-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-PN-B-BR') . ''
                . ' OxiAddonsDataTable-PN-Active |' . sanitize_text_field($_POST['OxiAddonsDataTable-PN-Active']) . '|'
                . ' OxiAddonsDataTable-PN-HTC |' . sanitize_hex_color($_POST['OxiAddonsDataTable-PN-HTC']) . '|'
                . ' OxiAddonsDataTable-PN-HBG |' . sanitize_text_field($_POST['OxiAddonsDataTable-PN-HBG']) . '|'
                . ' OxiAddonsDataTable-PN-HBC |' . sanitize_hex_color($_POST['OxiAddonsDataTable-PN-HBC']) . '|'
                . ' OxiAddonsDataTable-icon-type-select |' . sanitize_text_field($_POST['OxiAddonsDataTable-icon-type-select']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-B-M') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-PN-B-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDataTable-PN-B-M') . ''
                . ' OxiAddonsDataTable-PN-H-Active-c |' . sanitize_hex_color($_POST['OxiAddonsDataTable-PN-H-Active-c']) . '|'
                . ' OxiAddonsDataTable-PN-H-Active |' . sanitize_text_field($_POST['OxiAddonsDataTable-PN-H-Active']) . '|'
                . ' OxiAddonsDataTable-PN-Active-c |' . sanitize_hex_color($_POST['OxiAddonsDataTable-PN-Active-c']) . '|'
                . ' ||'
                . ' OxiAddonsDataTable-icon-show |' . sanitize_text_field($_POST['OxiAddonsDataTable-icon-show']) . '|'
                . ' OxiAddonsDataTable-TH-B-left-W |' . sanitize_text_field($_POST['OxiAddonsDataTable-TH-B-left-W']) . '|'
                . ' OxiAddonsDataTable-TH-B-right-W |' . sanitize_text_field($_POST['OxiAddonsDataTable-TH-B-right-W']) . '|'
                . ' OxiAddonsDataTable-TH-B-top-W |' . sanitize_text_field($_POST['OxiAddonsDataTable-TH-B-top-W']) . '|'
                . ' OxiAddonsDataTable-TH-B-bottom-W |' . sanitize_text_field($_POST['OxiAddonsDataTable-TH-B-bottom-W']) . '|'
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsDataTable-TH-B') . ''
                . ' OxiAddonsDataTable-TB-B-left-W |' . sanitize_text_field($_POST['OxiAddonsDataTable-TB-B-left-W']) . '|'
                . ' OxiAddonsDataTable-TB-B-right-W |' . sanitize_text_field($_POST['OxiAddonsDataTable-TB-B-right-W']) . '|'
                . ' OxiAddonsDataTable-TB-B-top-W |' . sanitize_text_field($_POST['OxiAddonsDataTable-TB-B-top-W']) . '|'
                . ' OxiAddonsDataTable-TB-B-bottom-W |' . sanitize_text_field($_POST['OxiAddonsDataTable-TB-B-bottom-W']) . '|'
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsDataTable-TB-B') . ''
                . ' OxiAddonsDataTable-TB-even-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-TB-even-C']) . '|'
                . ' OxiAddonsDataTable-TB-odd-C |' . sanitize_hex_color($_POST['OxiAddonsDataTable-TB-odd-C']) . '|'
                . ' OxiAddonsDataTable-TH-ASC-DESC |' . sanitize_text_field($_POST['OxiAddonsDataTable-TH-ASC-DESC']) . '|'
                . '||#||'
                . 'OxiAddPR-TC-Serial-cat||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddPR-TC-Serial-cat']) . '||#||'
                . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
$listid = '';
$listitemdata = '';
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $oxilistcatdatain = OxiAddonsADMHelpTextSenitize($_POST['oxilistcatdata']);
        $oxicatarray = explode('{{}}', $oxilistcatdatain);
        $catddtt = '';
        foreach ($oxicatarray as $value) {
            $catddtt .= OxiStringToClassReplacce($value);
            $catddtt .= '{{||}}';
            $catddtt .= OxiAddonsADMHelpTextSenitize($_POST[OxiStringToClassReplacce($value)]);
            $catddtt .= '{{}}';
        }
        $data = sanitize_text_field($catddtt);
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
        $listitemdata = $data['files'];
        $listid = $data['id'];
        echo '<script type="text/javascript"> jQuery(document).ready(function () {setTimeout(function() { jQuery("#oxi-addons-list-data-modal").modal("show")  }, 500); });</script>';
    }
}

OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
// echo '<pre>';
// print_r($styledata);
// echo '</pre>';
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
                                <li ref="#oxi-tabs-id-1">General Setting</li>
                                <li ref="#oxi-tabs-id-2">DataTable Body Setting</li>
                                <li ref="#oxi-tabs-id-3">Input and button</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Column Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <div class=" form-group row">
                                                <div class="list-group col-sm-12" id="oxi_addons_table_content-cat">
                                                    <?php
                                                    if ($stylefiles[2] != '') {
                                                        $serialize = explode('{{}}', $stylefiles[2]);
                                                        foreach ($serialize as $value) {
                                                            if (!empty($value)) {
                                                                echo '<div class="list-group-item list-group-item-action d-flex justify-content-between"  id="' . $value . '">';
                                                                echo '<div class="oxi-addons-item"> 
                                                                                 ' . OxiAddonsTextConvert($value) . '  
                                                                        </div>';
                                                                echo '<div class="oxi-addons-button"><button type="button" id="delete-item" class="btn btn-outline-danger btn-sm float-right">' . oxi_addons_admin_font_awesome('fa-trash') . '</button></div>';
                                                                echo '</div>';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class=" form-group row">
                                                <div class="col-sm-8 addons-dtm-laptop-lock" style="padding-right: 0px;">
                                                    <input type="text " class="form-control" style="padding-right: 4px; padding-left: 4px;" id="category-data-new" value="" placeholder="Add new Category">
                                                </div>
                                                <div class="col-sm-4 addons-dtm-laptop-lock text-center">
                                                    <button type="button" id="category-data-new-btn" class="btn btn-info">Save</button>
                                                </div>
                                            </div>
                                            <input type="hidden" name="OxiAddPR-TC-Serial-cat" id="OxiAddPR-TC-Serial-cat" value="<?php echo $stylefiles[2]; ?>">
                                            <style>
                                                .list-group.col-sm-12.ui-sortable {
                                                    padding-right: 15px;
                                                    padding-left: 15px;
                                                }
                                            </style>
                                            <script type="text/javascript">
                                                jQuery(document).ready(function () {
                                                    jQuery('#oxi_addons_table_content-cat').sortable({
                                                        axis: 'y',
                                                        opacity: 0.7,
                                                        update: function (event, ui) {
                                                            var list_sortable = jQuery(this).sortable('toArray').join('{{}}');
                                                            jQuery("#OxiAddPR-TC-Serial-cat").val(list_sortable);
                                                        }
                                                    });
                                                    jQuery('#oxi_addons_table_content-cat #delete-item').live('click', function () {
                                                        r = confirm('Delete this Category?');
                                                        if (r) {
                                                            jQuery(this).closest('.list-group-item-action').remove();
                                                            jQuery('#oxi_addons_table_content-cat').sortable();
                                                            jQuery('#oxi_addons_table_content-cat').on('sortupdate', function () {
                                                                var list_sortable = jQuery(this).sortable('toArray').join('{{}}');
                                                                jQuery("#OxiAddPR-TC-Serial-cat").val(list_sortable);
                                                            });
                                                            jQuery('#oxi_addons_table_content-cat').trigger('sortupdate');
                                                        }
                                                    });
                                                    jQuery('#category-data-new-btn').on('click', function () {
                                                        var data = jQuery('#category-data-new').val();
                                                        data = data.replace(/"/g, '\\&quot;').replace(/'/g, '\\&apos;');
                                                        if (data === '') {
                                                            var file = "<strong>Empty </strong> Category name not Accepted";
                                                            jQuery.bootstrapGrowl(file, {});
                                                            return false;
                                                        } else {
                                                            jQuery("#oxi_addons_table_content-cat").append('<div class="list-group-item list-group-item-action ui-sortable-handle  d-flex justify-content-between" id="' + data + '">' + data.replace(/\\&quot;/g, '"').replace(/\\&apos;/g, "'") + '<div class="oxi-addons-button"><button type="button" id="delete-item" class="btn btn-outline-danger btn-sm float-right"><i class="far fa-trash-alt oxi-icons"></i</button></div></div>');
                                                            jQuery('#category-data-new').val("");
                                                            jQuery('#oxi_addons_table_content-cat').sortable();
                                                            jQuery('#oxi_addons_table_content-cat').on('sortupdate', function () {
                                                                var list_sortable = jQuery(this).sortable('toArray').join('{{}}');
                                                                jQuery("#OxiAddPR-TC-Serial-cat").val(list_sortable);
                                                            });
                                                            jQuery('#oxi_addons_table_content-cat').trigger('sortupdate');
                                                            var file = "<strong>New </strong> Category will works after saved Data";
                                                            jQuery.bootstrapGrowl(file, {});
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsDataTable-G-BG', $styledata, 3, 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-G-W', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Set Your Image Max Width', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-G-BR', 11, $styledata, 1, 'Border Radius', 'Set Image Scroll body Position', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-G-Padding', 27, $styledata, 1, 'Padding', 'Set Image Scroll body Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsDataTable-G-BS', 43, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Table Head Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDataTable-TH-ASC-DESC', $styledata[565], 'True', 'true', 'False', 'false', 'ASC DESC Visibility ', 'Datatable Header Ascending and Descending Visibility', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-TH-FS', $styledata[49], $styledata[50], $styledata[51], '1', 'Font Size', 'Set DataTable Head Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' table.dataTable .oxi_datatable_thead .oxi_datatable_th', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-TH-C', $styledata[53], '', 'Color', 'Set DataTable Head Text color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' table.dataTable .oxi_datatable_thead .oxi_datatable_th', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-TH-BG', $styledata[55], 'rgba', 'Background Color', 'Set DataTable Head Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .dataTable thead', 'color');
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsDataTable-TH-B-left-W', $styledata[539], $styledata[539], $styledata[539], 'OxiAddonsDataTable-TH-B-right-W', $styledata[541], $styledata[541], $styledata[541], 1, 'Border Left Right', 'Set Border left right width', 'true');
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsDataTable-TH-B-top-W', $styledata[543], $styledata[543], $styledata[543], 'OxiAddonsDataTable-TH-B-bottom-W', $styledata[545], $styledata[545], $styledata[545], 1, 'Border Top Bottom', 'Set Border Top Bottom width', 'true');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsDataTable-TH-B', 547, $styledata, 'false');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDataTable-TH-F', 57, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' table.dataTable .oxi_datatable_thead .oxi_datatable_th');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-TH-P', 63, $styledata, 1, 'Padding', 'Set DataTable Head Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' table.dataTable .oxi_datatable_thead .oxi_datatable_th', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Ascending Icon Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsDataTable-TH-AI-I', $styledata[79], 'Icon', 'Set Datatable Ascending Icon FontAwesome Code not Class', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-TH-AI-FS', $styledata[81], $styledata[82], $styledata[83], '1', 'Font Size', 'Set Datatable Ascending Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .table.dataTable thead .sorting:after', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-TH-AI-C', $styledata[85], '', 'Color', 'Set Datatable Ascending Icon Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .table.dataTable thead .sorting:after', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-TH-AI-P', 89, $styledata, 1, 'Margin', 'Set Datatable Ascending Icon Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .table.dataTable .oxi_datatable_thead .sorting:after', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Descending Icon Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsDataTable-TH-DI-I', $styledata[105], 'Icon', 'Set Datatable Descending Icon FontAwesome code not class', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-TH-DI-FS', $styledata[107], $styledata[108], $styledata[109], '1', 'Font Size', 'Set Datatable Descending Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' table.dataTable thead .sorting:before', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-TH-DI-C', $styledata[111], '', 'Color', 'Set Datatable Descending Icon Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' table.dataTable thead .sorting:before', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-TH-DI-P', 115, $styledata, 1, 'Margin', 'Set  Datatable Descending Icon Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' table.dataTable .oxi_datatable_thead .sorting:before', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Table Body Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-TB-FS', $styledata[131], $styledata[132], $styledata[133], '1', 'Font Size', 'Set Datatable Body Text Font Size', 'false', '.oxi-addons-wrapper-' . $oxiid . ' table.dataTable .oxi_datatable_body > tr > td', 'font-size');
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsDataTable-TB-B-left-W', $styledata[550], $styledata[550], $styledata[550], 'OxiAddonsDataTable-TB-B-right-W', $styledata[552], $styledata[552], $styledata[552], 1, 'Border Left Right', 'Set Border left right width', 'true');
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsDataTable-TB-B-top-W', $styledata[554], $styledata[554], $styledata[554], 'OxiAddonsDataTable-TB-B-bottom-W', $styledata[556], $styledata[556], $styledata[556], 1, 'Border Top Bottom', 'Set Border Top Bottom width', 'true');
                                            echo OxiAddonsADMhelpBorder('OxiAddonsDataTable-TB-B', 558, $styledata, 'false');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDataTable-TB-F', 137, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' table.dataTable .oxi_datatable_body > tr > td');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-TB-P', 143, $styledata, 1, 'Padding', 'Set  Datatable Body Every TD Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' table.dataTable .oxi_datatable_body > tr > td', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Even Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-TB-even-C', $styledata[561], '', 'color', 'Set Datatable Even Text Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-TB-even-BG', $styledata[159], 'rgba', 'Background', 'Set Datatable Even Body Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two', 'color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Odd Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-TB-odd-C', $styledata[563], '', 'Color', 'Set Datatable Odd Text Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-TB-odd-BG', $styledata[161], 'rgba', 'Background', 'Set Datatable Odd Body Background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-right .oxi-addons-heading-two', 'color');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-3">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Show and Entries Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDataTable-SE', $styledata[163], 'True', 'true', 'False', 'false', 'Show Entries', 'Datatable Show Entries Button Show or not', 'true');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsDataTable-icon-show" class="col-sm-6 control-label" oxi-addons-tooltip="Set Item that's you can show in the datatable">Item's Show</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsDataTable-icon-show" name="OxiAddonsDataTable-icon-show">
                                                        <option value="5" <?php
                                                        if ($styledata[537] == '5') {
                                                            echo 'selected';
                                                        }
                                                        ?>>5</option>
                                                        <option value="10" <?php
                                                        if ($styledata[537] == '10') {
                                                            echo 'selected';
                                                        }
                                                        ?>>10</option>
                                                        <option value="20" <?php
                                                        if ($styledata[537] == '20') {
                                                            echo 'selected';
                                                        }
                                                        ?>>20</option>
                                                        <option value="30" <?php
                                                        if ($styledata[537] == '30') {
                                                            echo 'selected';
                                                        }
                                                        ?>>30</option>
                                                        <option value="50" <?php
                                                        if ($styledata[537] == '50') {
                                                            echo 'selected';
                                                        }
                                                        ?>>50</option>
                                                        <option value="80" <?php
                                                        if ($styledata[537] == '80') {
                                                            echo 'selected';
                                                        }
                                                        ?>>80</option>
                                                        <option value="100" <?php
                                                        if ($styledata[537] == '100') {
                                                            echo 'selected';
                                                        }
                                                        ?>>100</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-SE-FS', $styledata[165], $styledata[166], $styledata[167], '1', 'Font Size', 'Set Datatable show and entries Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length > .oxi_show_entries_label', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-SE-C', $styledata[169], '', 'Color', 'Set Datatable show and entries Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length > .oxi_show_entries_label', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDataTable-SE-F', 171, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length > .oxi_show_entries_label');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-SE-P', 177, $styledata, 1, 'Padding', 'Set Datatable show and entries Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Select Box Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsDataTable-SE-SB-I', $styledata[193], 'Appearance Icon', 'Set Datatable show entries select box appearance icon', 'false');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsDataTable-icon-type-select" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsDataTable-icon-type-select" name="OxiAddonsDataTable-icon-type-select">
                                                        <option value="solid" <?php
                                                        if ($styledata[463] == 'solid') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Solid</option>
                                                        <option value="regular" <?php
                                                        if ($styledata[463] == 'regular') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-SE-SB-W', $styledata[195], $styledata[196], $styledata[197], 1, 'Width', 'Set Datatable show entries select box Max Width', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length .oxi_datatable_select_box', 'width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-SE-SB-H', $styledata[199], $styledata[200], $styledata[201], 1, 'Height', 'Set Datatable show entries select box Max Height', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length .oxi_datatable_select_box', 'height');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-SE-SB-FS', $styledata[203], $styledata[204], $styledata[205], '1', 'Font Size', 'Set Datatable show entries select box Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length .oxi_datatable_select_box', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-SE-SB-C', $styledata[207], '', 'Color', 'Set Datatable show entries select box Text color', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length .oxi_datatable_select_box', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-SE-SB-BG', $styledata[209], 'rgba', 'Background', 'Set Datatable show entries select box Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length .oxi_datatable_select_box', 'color');
                                            echo oxi_addons_adm_help_border('OxiAddonsDataTable-SE-SB-B', $styledata[211], $styledata[212], 'Border', 'Set Datatable show entries select box Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length .oxi_datatable_select_box', 'border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-SE-SB-BC', $styledata[215], '', 'Border Color', 'Set Datatable show entries select box  Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length .oxi_datatable_select_box', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-SE-SBP', 217, $styledata, 1, 'Border-radius', 'Set Datatable show entries select box Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_length .oxi_datatable_select_box', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Export Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDataTable-PDF', $styledata[233], 'True', 'true', 'False', 'false', 'PDF Button', 'Datatable PDF Button Show or not', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDataTable-EXCEL', $styledata[235], 'True', 'true', 'False', 'false', 'EXCEL Button', 'Datatable EXCEL Button Show or not', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDataTable-COPY', $styledata[237], 'True', 'true', 'False', 'false', 'COPY Button', 'Datatable COPY Button Show or not', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDataTable-PRINT', $styledata[239], 'True', 'true', 'False', 'false', 'PRINT Button', 'Datatable PRINT Button Show or not', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDataTable-CSV', $styledata[241], 'True', 'true', 'False', 'false', 'CSV Button', 'Datatable CSV Button Show or not', 'true');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-B-FS', $styledata[243], $styledata[244], $styledata[245], '', 'Font Size', 'Set Datatable Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_export_button', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-B-TC', $styledata[247], '', 'Text Color', 'Set Datatable Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_export_button', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-B-BG', $styledata[249], 'rgba', 'Background Color', 'Set Datatable Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_export_button', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsDataTable-B-B', $styledata[251], $styledata[252], 'Border', 'Set Datatable Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_export_button');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-B-BC', $styledata[255], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_export_button', 'border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDataTable-B-F', 257, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_export_button');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-B-BR', 263, $styledata, 1, 'Border Radius', 'Set Datatable Button Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_export_button', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-B-P', 465, $styledata, 1, 'Padding', 'Set Datatable Button Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_export_button', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-B-M', 481, $styledata, 1, 'Margin', 'Set Datatable Button Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_export_button', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-B-HTC', $styledata[279], '', 'Color', 'Set Datatable Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_export_button:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-B-HBG', $styledata[281], 'rgba', 'Background Color', 'Set Datatable Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_export_button:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-B-HBC', $styledata[283], '', 'Border Color', 'Set Datatable Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_export_button:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Show Datatable Info
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDataTable-SED', $styledata[359], 'True', 'true', 'False', 'false', 'Show Entries', 'Datatable Showing entries Details  Button Show or not', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-SED-FS', $styledata[361], $styledata[362], $styledata[363], '1', 'Font Size', 'Set  Showing entries Details  Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_info', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-SED-C', $styledata[365], '', 'Color', 'Set  Showing entries Details  Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_info', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDataTable-SED-F', 367, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_info');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-SED-P', 373, $styledata, 1, 'Padding', 'Set Showing entries Details  Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi_datatable_info', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Search Box Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDataTable-SB', $styledata[285], 'True', 'true', 'False', 'false', 'Show Search box', 'Datatable Show Search Box Show or not', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-SB-FS', $styledata[287], $styledata[288], $styledata[289], '1', 'Font Size', 'Set Datatable Text Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter > .oxi_filter_label', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-SB-C', $styledata[291], '', 'Color', 'Set Datatable Text Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter > .oxi_filter_label', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDataTable-SB-F', 293, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter > .oxi_filter_label');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-SB-P', 299, $styledata, 1, 'Padding', 'Set Datatable Search Box Text Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter > .oxi_filter_label', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Input Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-input-W', $styledata[315], $styledata[316], $styledata[317], 1, 'Width', 'Set Datatable Search Box Max Width', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter  .oxi_filter_input', 'width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-input-H', $styledata[319], $styledata[320], $styledata[321], 1, 'Height', 'Set Datatable Search Box Max Height', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter  .oxi_filter_input', 'height');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-input-FS', $styledata[323], $styledata[324], $styledata[325], '1', 'Font Size', 'Set Datatable Search Box Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter  .oxi_filter_input', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-input-C', $styledata[327], '', 'Color', 'Set Datatable Search Box Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter  .oxi_filter_input', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-input-BG', $styledata[329], 'rgba', 'Background', 'Set Datatable Search Box Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter  .oxi_filter_input', 'color');
                                            echo oxi_addons_adm_help_border('OxiAddonsDataTable-input-B', $styledata[331], $styledata[332], 'Border', 'Set Datatable Search Box Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter  .oxi_filter_input', 'border');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-input-BC', $styledata[335], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter  .oxi_filter_input', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-input-P', 337, $styledata, 1, 'Border Radius', 'Set  Datatable Search Box Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_filter  .oxi_filter_input', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsDataTable-input-BS', 353, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link');
                                            ?>
                                        </div>
                                    </div>

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Previous Next Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDataTable-PN', $styledata[389], 'True', 'true', 'False', 'false', 'Preview Next', 'Datatable Preview Next Button Show or not', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-PN-FS', $styledata[391], $styledata[392], $styledata[393], '1', 'Font Size', 'Set Datatable Preview Next Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_datatable_previous', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-C', $styledata[395], '', 'Color', 'Set Datatable Preview Next Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDataTable-PN-F', 397, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_datatable_previous');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-PN-P', 403, $styledata, 1, 'Padding', 'Set Datatable Preview Next Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi_datatable_previous', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Previous Next Hover
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-H-Active-c', $styledata[529], '', 'Color', 'Set Datatable Prev Next  Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_wrapper .dataTables_paginate .paginate_button:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-H-Active', $styledata[531], 'rgba', 'Background Color', 'Set Datatable Prev Next  Background color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .dataTables_wrapper .dataTables_paginate .paginate_button:hover', 'background');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDataTable-PN-B-FS', $styledata[419], $styledata[420], $styledata[421], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-B-TC', $styledata[423], '', 'Text Color', 'Set Datatable Button Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-B-BG', $styledata[425], 'rgba', 'Background Color', 'Set Datatable Button background color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsDataTable-PN-B-B', $styledata[427], $styledata[428], 'Border', 'Set Datatable Border Size and Type', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-B-BC', $styledata[431], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button', 'border-color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDataTable-PN-B-F', 433, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-PN-B-BR', 439, $styledata, 1, 'Border Radius', 'Set Datatable Button Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-PN-B-P', 497, $styledata, 1, 'Padding', 'Set Datatable Previous Next Button Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDataTable-PN-B-M', 513, $styledata, 1, 'Margin', 'Set Datatable Previous Next   Button Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Previous Active Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-Active-c', $styledata[533], '', 'Color', 'Set Datatable Prev Next button active Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button.current:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-Active', $styledata[455], 'rgba', 'Background Color', 'Set Datatable Button Active Color', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .dataTables_paginate span .paginate_button.current:hover', 'background');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-HTC', $styledata[457], '', 'Color', 'Set Datatable Button Hover Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-HBG', $styledata[459], 'rgba', 'Background Color', 'Set Datatable Button Hover Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDataTable-PN-HBC', $styledata[461], '', 'Border Color', 'Set Datatable Button Hover Border color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button-left .oxi-addons-button-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("OxiAddCB-nonce") ?>
                        </div>

                    </div>

                </form>

            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open('Add New Rows');
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
                    <?php echo oxi_data_table_style_1_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    if ($stylefiles[2] != '') {
                        $listarray = [];
                        $serialize = explode('{{}}', $stylefiles[2]);
                        foreach ($serialize as $value) {
                            $listarray[OxiStringToClassReplacce($value)] = '';
                        }
                        $listfiles = explode('{{}}', $listitemdata);
                        foreach ($listfiles as $val) {
                            if ($val != '' && $val != '{{}}') {
                                $tdvalue = explode('{{||}}', $val);
                                $listarray[$tdvalue[0]] = $tdvalue[1];
                            }
                        }
                        foreach ($serialize as $value) {
                            if (!empty($value)) {
                                echo oxi_addons_adm_help_textbox(OxiStringToClassReplacce($value), $listarray[OxiStringToClassReplacce($value)], OxiAddonsTextConvert($value), 'Write your ' . oxi_addons_shortcode_name_converter($value) . ' Data');
                            }
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="oxilistid" name="oxilistid" value="<?php echo $listid; ?>">
                    <input type="hidden" id="oxilistcatdata" name="oxilistcatdata" value="<?php echo $stylefiles[2]; ?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="OxiAddonsListFile" id="OxiAddonsListFile" value="Submit">
                    <?php wp_nonce_field("OxiAddonsListData-nonce") ?>
                </div>
            </div>
        </div>
    </form>
</div>