<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '||||'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAnimation-G-Padding') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAnimation-font-size') . ''
            . ' OxiAddonsAnimation-color |' . sanitize_hex_color($_POST['OxiAddonsAnimation-color']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAnimation-font-family') . ''
            . ' oxi-addons-select-in-animation |' . sanitize_text_field($_POST['oxi-addons-select-in-animation']) . '|'
            . ' oxi-addons-select-in-position |' . sanitize_text_field($_POST['oxi-addons-select-in-position']) . '|'
            . ' oxi-addons-select-out-animation |' . sanitize_text_field($_POST['oxi-addons-select-out-animation']) . '|'
            . ' oxi-addons-select-out-position |' . sanitize_text_field($_POST['oxi-addons-select-out-position']) . '|'
            . '||#||  ||#||'
            . 'OxiAddPR-TC-Serial-animate ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddPR-TC-Serial-animate']) . '||#||'
            . '|';
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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
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
                                        Animation Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <div class=" form-group row">
                                            <div class="list-group col-sm-12" id="oxi_addons_table_content-cat">
                                                <?php
                                                if ($stylefiles[3] != '') {
                                                    $serialize = explode('{{}}', $stylefiles[3]);
                                                    foreach ($serialize as $value) {
                                                        echo '<div class="list-group-item list-group-item-action" id="' . $value . '">';
                                                        echo '' . oxi_addons_shortcode_name_converter($value) . '';
                                                        echo '<button type="button" class="btn btn-outline-danger btn-sm float-right oxi-button">' . oxi_addons_admin_font_awesome('fa-trash') . '</button>';
                                                        echo '</div>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <div class="col-sm-8 addons-dtm-laptop-lock" style="padding-right: 0px;">
                                                <input type="text" name="animate-data" class="form-control" style="padding-right: 4px; padding-left: 4px;" id="category-data-new" value="" placeholder="Add new Category">
                                            </div>
                                            <div class="col-sm-4 addons-dtm-laptop-lock text-center">
                                                <button type="button" id="category-data-new-btn" class="btn btn-info">Save</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="OxiAddPR-TC-Serial-animate" id="OxiAddPR-TC-Serial-animate" value="<?php echo $stylefiles[3]; ?>">
                                        <style>
                                            .list-group.col-sm-12.ui-sortable {
                                                padding-right: 15px;
                                                padding-left: 15px;
                                            }
                                        </style>
                                        <script type="text/javascript">
                                            jQuery(document).ready(function() {
                                                jQuery('#oxi_addons_table_content-cat').sortable({
                                                    axis: 'y',
                                                    opacity: 0.7,
                                                    update: function(event, ui) {
                                                        var list_sortable = jQuery(this).sortable('toArray').join('{{}}');
                                                        jQuery("#OxiAddPR-TC-Serial-animate").val(list_sortable);
                                                    }
                                                });
                                                jQuery('#oxi_addons_table_content-cat .oxi-button').live('click', function() {
                                                    r = confirm('Delete this Category?');
                                                    if (r) {
                                                        jQuery(this).closest('div').remove();
                                                        jQuery('#oxi_addons_table_content-cat').sortable();
                                                        jQuery('#oxi_addons_table_content-cat').on('sortupdate', function() {
                                                            var list_sortable = jQuery(this).sortable('toArray').join('{{}}');
                                                            jQuery("#OxiAddPR-TC-Serial-animate").val(list_sortable);
                                                        });
                                                        jQuery('#oxi_addons_table_content-cat').trigger('sortupdate');
                                                    }
                                                });
                                                jQuery('#category-data-new-btn').on('click', function() {
                                                    var data = jQuery('#category-data-new').val();
                                                    if (data === '') {
                                                        var file = "<strong>Empty </strong> Category name not Accepted";
                                                        jQuery.bootstrapGrowl(file, {});
                                                        return false;
                                                    } else {
                                                        jQuery("#oxi_addons_table_content-cat").append('<div class="list-group-item list-group-item-action ui-sortable-handle" id="' + data + '">' + data + '<button type="button" class="btn btn-outline-danger btn-sm float-right"><i class="far fa-trash-alt oxi-icons"></i></button></div>');
                                                        jQuery('#category-data-new').val("");
                                                        jQuery('#oxi_addons_table_content-cat').sortable();
                                                        jQuery('#oxi_addons_table_content-cat').on('sortupdate', function() {
                                                            var list_sortable = jQuery(this).sortable('toArray').join('{{}}');
                                                            jQuery("#OxiAddPR-TC-Serial-animate").val(list_sortable);
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
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAnimation-G-Padding', 7, $styledata, 1, 'Padding', 'Set Text Padding', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">

                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        In Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <div class="form-group row">
                                            <label for="oxi-addons-select-in-animation" class="col-sm-6 control-label" oxi-addons-tooltip="Select Animation In Type">Animation In Type</label>
                                            <div class="input-group col-sm-6">
                                                <select data-key="effect" data-type="in" class="form-control oxi-addons-font-weight" id="oxi-addons-select-in-animation" name="oxi-addons-select-in-animation">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="oxi-addons-select-in-position" class="col-sm-6 control-label" oxi-addons-tooltip="Select Animation In Position">In Position</label>
                                            <div class="input-group col-sm-6">
                                                <select data-key="type" data-type="in" class="form-control oxi-addons-font-weight" id="oxi-addons-select-in-position" name="oxi-addons-select-in-position">
                                                    <option value="sequence" <?php
                                                                                if ($styledata[37] === 'sequence') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>sequence</option>
                                                    <option value="reverse" <?php
                                                                            if ($styledata[37] === 'reverse') {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>reverse</option>
                                                    <option value="sync" <?php
                                                                            if ($styledata[37] === 'sync') {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>sync</option>
                                                    <option value="shuffle" <?php
                                                                            if ($styledata[37] === 'shuffle') {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>shuffle</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="oxi-head">
                                        Out Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <div class="form-group row">
                                            <label for="oxi-addons-select-out-animation" class="col-sm-6 control-label" oxi-addons-tooltip="Select Animation Out Type">Animation Out Type</label>
                                            <div class="input-group col-sm-6">
                                                <select data-key="effect" data-type="out" class="form-control oxi-addons-font-weight" id="oxi-addons-select-out-animation" name="oxi-addons-select-out-animation">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="oxi-addons-select-out-position" class="col-sm-6 control-label" oxi-addons-tooltip="Select Animation Out Position">Out Position</label>
                                            <div class="input-group col-sm-6">
                                                <select data-key="type" data-type="out" class="form-control oxi-addons-font-weight" id="oxi-addons-select-out-position" name="oxi-addons-select-out-position">
                                                    <option value="sequence" <?php
                                                                                if ($styledata[41] === 'sequence') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>sequence</option>
                                                    <option value="reverse" <?php
                                                                            if ($styledata[41] === 'reverse') {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>reverse</option>
                                                    <option value="sync" <?php
                                                                            if ($styledata[41] === 'sync') {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>sync</option>
                                                    <option value="shuffle" <?php
                                                                            if ($styledata[41] === 'shuffle') {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>shuffle</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Text Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAnimation-font-size', $styledata[23], $styledata[24], $styledata[25], 1, 'Font Size', 'set your Animation Text Font Size', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-tlt *', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAnimation-color', $styledata[27], '', 'Color', 'set your Animation  Color', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-tlt *', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddonsAnimation-font-family', 29, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-tlt *');
                                        ?>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
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