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
                . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddcategory-rows') . ''
                . 'cat-parent |' . sanitize_text_field($_POST['cat-parent']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_cat-M-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_cat-D-P') . ''
                . '' . oxi_addons_adm_help_single_size('oxi_cat-font-size') . ''
                . 'oxi_cat-width-mode |' . sanitize_text_field($_POST['oxi_cat-width-mode']) . '|'
                . '' . oxi_addons_adm_help_single_size('oxi_cat-width') . ''
                . 'oxi_cat-C |' . sanitize_text_field($_POST['oxi_cat-C']) . '|'
                . 'oxi_cat-BG |' . sanitize_text_field($_POST['oxi_cat-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_cat-B') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsBanner-B') . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi_cat-F') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_cat-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_cat-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_cat-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('oxi_cat-BS') . ''
                . 'oxi_cat-H-C |' . sanitize_text_field($_POST['oxi_cat-H-C']) . '|'
                . 'oxi_cat-H-BG |' . sanitize_text_field($_POST['oxi_cat-H-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_cat-B') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAddonsBanner-H-B') . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi_cat-H-BR') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('oxi_cat-H-BS') . ''
                . '||#||OxiAddPR-TC-Serial-cat||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddPR-TC-Serial-cat']) . '||#||'
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
        $oxiaddonscategory = '';
        if (!empty($_POST['oxi-addons-category'])) {
            $numItems = count($_POST['oxi-addons-category']);
            if ($numItems > 0) {
                foreach ($_POST['oxi-addons-category'] as $value) {
                    $oxiaddonscategory .= sanitize_text_field($value) . '{{}}';
                }
            }
        }
        $data = ' oxi_addons-cat-data ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-cat-data']) . '||#||'
                . ' oxi_addons-cat-data ||#||' . OxiAddonsADMHelpTextSenitize($oxiaddonscategory) . '||#||'
                . ' oxi_addons-cat-width ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-cat-width']) . '||#||'
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

echo oxi_addons_single_style_scripts('scripts', 'multiselect');
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ", $oxiid), ARRAY_A);
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
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Category Menu
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <div class="form-group row" >
                                            <label for="cat-parent" class="col-sm-6 control-label" oxi-addons-tooltip="Set Your Parent Category">Parent Category</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="cat-parent" name="cat-parent">
                                                    <?php
                                                    if ($stylefiles[2] != '') {
                                                        $serialize = explode('{{}}', $stylefiles[2]);
                                                        foreach ($serialize as $value) {
                                                            echo '<option value="' . $value . '"';
                                                            if ($styledata[7] == $value) {
                                                                echo ' selected ';
                                                            }
                                                            echo '>' . oxi_addons_shortcode_name_converter($value) . '</option>';
                                                        }
                                                    } else {
                                                        echo '<option value="">Add Category First</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" form-group row">  
                                            <div class="list-group col-sm-12" id="oxi_addons_table_content-cat">
                                                <?php
                                                if ($stylefiles[2] != '') {
                                                    $serialize = explode('{{}}', $stylefiles[2]);
                                                    foreach ($serialize as $value) {
                                                        echo '<div class="list-group-item list-group-item-action" id="' . $value . '">';
                                                        echo '' . oxi_addons_shortcode_name_converter($value) . '';
                                                        if ($styledata[7] == $value) {
                                                            echo '***';
                                                        }
                                                        echo '<a href="#" class="btn btn-outline-danger btn-sm float-right">' . oxi_addons_admin_font_awesome('fa-trash') . '</a>';
                                                        echo '</div>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class=" form-group row">       
                                            <div class="col-sm-8 addons-dtm-laptop-lock" style="padding-right: 0px;">
                                                <input type="text "class="form-control" style="padding-right: 4px; padding-left: 4px;" id="category-data-new" value="" placeholder="Add new Category">
                                            </div>
                                            <div class="col-sm-4 addons-dtm-laptop-lock text-center">
                                                <button type="button" id="category-data-new-btn" class="btn btn-info">Save</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="OxiAddPR-TC-Serial-cat" id="OxiAddPR-TC-Serial-cat" value="<?php echo $stylefiles[2]; ?>">
                                        <style>
                                            .list-group.col-sm-12.ui-sortable{
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
                                                jQuery('#oxi_addons_table_content-cat a').live('click', function () {
                                                    r = confirm('Delete this Category?');
                                                    if (r) {
                                                        jQuery(this).closest('div').remove();
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
                                                    if (data === '') {
                                                        var file = "<strong>Empty </strong> Category name not Accepted";
                                                        jQuery.bootstrapGrowl(file, {});
                                                        return false;
                                                    } else {
                                                        jQuery("#oxi_addons_table_content-cat").append('<div class="list-group-item list-group-item-action ui-sortable-handle" id="' + data + '">' + data + '<a href="#" class="btn btn-outline-danger btn-sm float-right"><i class="far fa-trash-alt oxi-icons"></i></a></div>');
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
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Basic Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddcategory-rows', $styledata, 3, 'false', '');
                                        echo oxi_addons_adm_help_padding_margin('oxi_cat-M-P', 9, $styledata, 1, 'Menu Body Margin', 'Set Category Menu Body Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('oxi_cat-D-P', 25, $styledata, 1, 'Data Body Margin', 'Set Category Data Body Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-radius');
                                        ?>
                                    </div>                                               
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Category Menu
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_cat-font-size', $styledata[41], $styledata[42], $styledata[43], 1, 'Font Size', 'Customize the Category font size, based on Pixels', '', '', '');
                                        echo oxi_addons_adm_help_true_false('oxi_cat-width-mode', $styledata[45], 'Static', '', 'Dynamic', 'dynamic', 'Width Mode', 'Select the Category Menu Width Mode', 'true');
                                        echo oxi_addons_adm_help_number_dtm('oxi_cat-width', $styledata[47], $styledata[48], $styledata[49], 1, 'Width', 'Customize the Category Menu with Responsive Size', 'true', '.oxi-addons-container .oxi-button-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_MiniColor('oxi_cat-C', $styledata[51], '', 'Color', 'Set Menu background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'background');
                                        echo oxi_addons_adm_help_MiniColor('oxi_cat-BG', $styledata[53], 'rgba', 'Background Color', 'Set Menu background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'background');
                                        echo oxi_addons_adm_help_padding_margin('oxi_cat-B', 55, $styledata, 1, 'Border', 'Set Your Category Border', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-radius');
                                        echo OxiAddonsADMhelpBorder('OxiAddonsBanner-B', 71, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                        echo OxiAddonsADMHelpFontSettings('oxi_cat-F', 75, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                        echo oxi_addons_adm_help_padding_margin('oxi_cat-BR', 81, $styledata, 1, 'Border Radius', 'Set Category Menu Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('oxi_cat-P', 97, $styledata, 1, 'Padding', 'Set Category Menu Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('oxi_cat-M', 113, $styledata, 1, 'Margin', 'Set Category Menu Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-radius');
                                        ?>
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Category Menu Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('oxi_cat-BS', 129, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover');
                                        ?>
                                    </div>
                                </div> 
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Category Menu Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_cat-H-C', $styledata[135], '', 'Color', 'Set Menu background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'background');
                                        echo oxi_addons_adm_help_MiniColor('oxi_cat-H-BG', $styledata[137], 'rgba', 'Background Color', 'Set Menu background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'background');
                                        echo oxi_addons_adm_help_padding_margin('oxi_cat_H-B', 139, $styledata, 1, 'Border', 'Set Your Category Border', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-radius');
                                        echo OxiAddonsADMhelpBorder('OxiAddonsBanner-H-B', 155, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link');
                                        echo oxi_addons_adm_help_padding_margin('oxi_cat-H-BR', 159, $styledata, 1, 'Border Radius', 'Set Category Menu Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link', 'border-radius');
                                        ?>
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Category Menu Hover Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('oxi_cat-H-BS', 175, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-link:hover');
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
                echo oxi_addons_list_rearrange('Category Rearrange', $listdata, 1, 'title');
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
                    <?php echo oxi_category_style_2_shortcode($style, $listdata, 'admin') ?>
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
                    <h4 class="modal-title">Category Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_form_textarea('oxi_addons-cat-data', $listitemdata[1], 'Add Content', 'Add your Content or Shortcode here');
                    ?>
                    <div class="form-group row">
                        <label  class="col-sm-12 control-label" for="oxi_addons-cat-width">Item Width</label>
                        <div class="col-sm-12">
                            <select id="oxi_addons-cat-width" class="form-control"  name="oxi_addons-cat-width"> 
                                <?php
                                $multivalue = array(
                                    array('Same Width', ''),
                                    array('width2', 'grid-item--width2'),
                                    array('width3', 'grid-item--width3'),
                                    array('width4', 'grid-item--width4'),
                                );
                                foreach ($multivalue as $value) {
                                    echo '<option value="' . $value[1] . '" ' . ($listitemdata[5] == $value[1] ? 'selected' : '') . '>' . $value[0] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <small class="form-text text-muted col-sm-12">Select Category Data Width.</small>
                    </div>
                    <div class="form-group oxi-addons-form-multiselect">
                        <label for="oxi-addons-category">Category Select</label>
                        <select id="oxi-addons-category" class="oxi-static-class" name="oxi-addons-category[]" multiple="multiple"> 
                            <?php
                            $categorydata = explode('{{}}', $stylefiles[2]);
                            $oxilabselectdata = explode('{{}}', $listitemdata[3]);
                            foreach ($categorydata as $category) {
                                $selected = '';
                                if ($styledata[7] != $category) {
                                    foreach ($oxilabselectdata as $value) {
                                        if ($category == $value) {
                                            $selected = 'selected="selected"';
                                        }
                                    }
                                    echo '<option value="' . $category . '" ' . $selected . '>' . $category . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <small class="form-text text-muted">Select Category for this Data.</small>
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
