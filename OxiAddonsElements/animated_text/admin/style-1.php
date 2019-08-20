<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$animitedata = '';
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddons-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        if (isset($_POST['animitedATXT'])) {
            $animitedATXT = array_map('esc_attr', $_POST['animitedATXT']);
            $count = count($animitedATXT);
            for ($i = 0; $i < $count; $i++) {
                if (!empty($animitedATXT[$i])) {
                    $animitedata .= OxiAddonsAdminFontAwesomeSenitize($animitedATXT[$i]) . '||#||';
                }
            }
        }
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddons-font-size') . ''
                . ' OxiAddons-color |' . sanitize_hex_color($_POST['OxiAddons-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-F') . ''
                . ' adddonsSpeed |' . sanitize_text_field($_POST['adddonsSpeed']) . '|'
                . ' letterSpeed |' . sanitize_text_field($_POST['letterSpeed']) . '|'
                . ' OxiAddons-F-mode |' . sanitize_text_field($_POST['OxiAddons-F-mode']) . '|'
                . '||#||||#||'
                . $animitedata
                . '||#||||#|| OxiAddons-font-style ||#||||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsinitialtext']) . '||#||||#||'
                . '';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||||#||', $style['css']);
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
                                        Animated Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <div class="list-group ui-sortable" style="margin-bottom: 15px" id="oxi_addons_text_body">
                                            <?php
                                            $aniTXT = explode("||#||", $stylefiles[1]);
                                            foreach ($aniTXT as $value) {
                                                if (!empty($value)) {
                                                    echo '<ul class="list-group-item list-group-item-action">
                                                            <li class="form-group row mb-0">
                                                                <div class="col-sm-10">
                                                                  <div class="form-group row mb-0">
                                                                    <div class="col-sm-12 align-center">
                                                                        <input type="text" class="form-control " name="animitedATXT[]" value="' . $value . '">  
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-sm-2 align-center">
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
                                                <button class="btn btn-outline-info btn-sm" id="oxi-text-data-new-btn">Add New Text</button>
                                            </div>
                                        </div>
                                    </div>                                               
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number('adddonsSpeed', $styledata[15], 1, 'Speed', 'Set speed from start till the end');
                                        echo oxi_addons_adm_help_number('letterSpeed', $styledata[17], 1, 'Letter Speed', 'Set Your Letter Speed');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Font Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddonsinitialtext', $stylefiles[3], 'Initials Text', 'Set your Initials Text');
                                        echo oxi_addons_adm_help_true_false('OxiAddons-F-mode', $styledata[19], 'Parent', '', 'Indovisual', 'Indovisual', 'Font Size Mode', 'Set Parent If you want to view Font Size From Parent');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddons-font-size', $styledata[3], $styledata[4], $styledata[5], 1, 'Font Size', 'Your Animated Text Font Size', 'false', '.oxi-addons-drop-caps-' . $oxiid . '', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-color', $styledata[7], '', 'Color', 'Select Your Animated Text Color', 'false', '.oxi-addons-drop-caps-' . $oxiid . '', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddons-F', 9, $styledata, 'true', '.oxi-addons-AT-P-' . $oxiid . '');
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
                            <?php wp_nonce_field("OxiAddons-nonce") ?>
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
    jQuery(document).ready(function () {
        jQuery('#oxi-text-data-new-btn').on('click', function () {
            jQuery("#oxi_addons_text_body").append('<ul class="list-group-item list-group-item-action"> <li class="form-group row mb-0"><div class="col-sm-10"> <div class="form-group row mb-0"> <div class="col-sm-12 align-center"> <input type="text" class="form-control " name="animitedATXT[]" value="">    </div>  </div> </div>  <div class="col-sm-2 align-center">  <a href="#" class="btn btn-outline-danger btn-sm"><?php echo oxi_addons_admin_font_awesome('fa-trash'); ?></a> </div>  </li> </ul>');
            return false;
        });
        jQuery('#oxi_addons_text_body a').live('click', function () {
            r = confirm('Delete this Category?');
            if (r) {
                var id = jQuery(this).parent().find('.form-group.row');
                jQuery(this).closest('ul').remove();
            }
        });

    });
</script>