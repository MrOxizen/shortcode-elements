<?php
if (!defined('ABSPATH'))
    exit;
$oxitype = sanitize_text_field($_GET['oxitype']);
oxi_addons_user_capabilities();
OxiDataAdminImport($oxitype);
global $wpdb;
$table_name = $wpdb->prefix . 'oxi_div_style';
$data = $wpdb->get_results("SELECT * FROM $table_name WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
?>
<div class="wrap">    
    <?php
    echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes');
    echo OxiAddonsAdmAdminShortcodeTable($data, $oxitype);
    ?>    
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <?php
            $file = Array(
                'style 1 layout 1OXIIMPORTdividerOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-color |rgba(255, 255, 255, 1)| oxi-addons-divider |3|double|#0f9999|oxi-addons-divider-size|220|220|220| oxi-addons-divider-align |center|oxi-addons-divider-animation||1|0//|oxi-addons-divider-padding-top |2|1|1|oxi-addons-divider-padding-bottom |2|1|1|oxi-addons-divider-padding-left |2|1|1|oxi-addons-divider-padding-right |2|1|1|||#|| oxi_addons-divider-id ||#||||#|| ||#||',
                'Style 1 Layout 2OXIIMPORTdividerOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)| oxi-addons-divider |4|groove|#a3f01f|oxi-addons-divider-size|220|220|220| oxi-addons-divider-align |center|oxi-addons-divider-animation||1|0//|oxi-addons-divider-padding-top |2|2|2|oxi-addons-divider-padding-bottom |2|2|2|oxi-addons-divider-padding-left |2|2|2|oxi-addons-divider-padding-right |2|2|2|||#|| oxi_addons-divider-id ||#||||#|| ||#||',
                'style 2 layout 1OXIIMPORTdividerOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-color |rgba(255, 255, 255, 1)| oxi-addons-divider |2|solid|#a508cc|oxi-addons-divider-size|250|220|220| oxi-addons-divider-align |center|oxi-addons-divider-animation||2|0//infinite|oxi-addons-divider-padding-top |2|2|2|oxi-addons-divider-padding-bottom |2|2|2|oxi-addons-divider-padding-left |2|2|2|oxi-addons-divider-padding-right |2|2|2|oxi-addons-divider-font-size|20|20|20| oxi-addons-divider-font-color |#830c9e|oxi-addons-divider-font-position|50|50|50|oxi-addons-divider-font-padding-top |5|5|5|oxi-addons-divider-font-padding-bottom |5|5|5|oxi-addons-divider-font-padding-left |5|5|5|oxi-addons-divider-font-padding-right |5|5|5|||#|| oxi_addons-divider-id ||#||||#||||#|| oxi_addons-divider-icon ||#||fas fa-star||#|| ||#||',
                'Style 2 Layout 2OXIIMPORTdividerOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)| oxi-addons-divider |2|solid|#eb0909|oxi-addons-divider-size|230|230|230| oxi-addons-divider-align |center|oxi-addons-divider-animation||2|0//infinite|oxi-addons-divider-padding-top |2|2|2|oxi-addons-divider-padding-bottom |2|2|2|oxi-addons-divider-padding-left |2|2|2|oxi-addons-divider-padding-right |2|2|2|oxi-addons-divider-font-size|22|22|22| oxi-addons-divider-font-color |#eb0909|oxi-addons-divider-font-position|51|51|51|oxi-addons-divider-font-padding-top |5|5|5|oxi-addons-divider-font-padding-bottom |5|5|5|oxi-addons-divider-font-padding-left |5|5|5|oxi-addons-divider-font-padding-right |5|5|5|||#|| oxi_addons-divider-id ||#||||#||||#|| oxi_addons-divider-icon ||#||fas fa-smile||#|| ||#||',
                'style 3OXIIMPORTdividerOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-color |rgba(255, 255, 255, 1)| oxi-addons-divider |4|double|#d6a41a|oxi-addons-divider-size|350|220|220| oxi-addons-divider-align |center|oxi-addons-divider-animation||1|0//|oxi-addons-divider-padding-top |2|2|2|oxi-addons-divider-padding-bottom |2|2|2|oxi-addons-divider-padding-left |2|2|2|oxi-addons-divider-padding-right |2|2|2|oxi-addons-divider-font-size|25|20|20| oxi-addons-divider-font-color |#d6a41a|oxi-addons-divider-font-position|50|50|50|oxi-addons-divider-font-padding-top |20|7|7|oxi-addons-divider-font-padding-bottom |20|7|7|oxi-addons-divider-font-padding-left |20|7|7|oxi-addons-divider-font-padding-right |20|7|7| oxi-addons-divider-border |4|double|#d6a41a| oxi-addons-divider-border-radius |50|||#|| oxi_addons-divider-id ||#||||#||||#|| oxi_addons-divider-icon ||#||fas fa-bullseye||#|| ||#||',
                'style 4OXIIMPORTdividerOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-color |rgba(255, 255, 255, 1)| oxi-addons-divider |4|double|#eb15a4|oxi-addons-divider-size|300|300|300| oxi-addons-divider-align |center|oxi-addons-divider-animation||2|0//infinite|oxi-addons-divider-padding-top |4|4|4|oxi-addons-divider-padding-bottom |4|4|4|oxi-addons-divider-padding-left |4|4|4|oxi-addons-divider-padding-right |4|4|4|oxi-addons-divider-font-size|25|25|25| oxi-addons-divider-font-color |#eb15a4|oxi-addons-divider-font-position|50|50|50|oxi-addons-divider-font-padding-top |5|5|5|oxi-addons-divider-font-padding-bottom |5|5|5|oxi-addons-divider-font-padding-left |5|5|5|oxi-addons-divider-font-padding-right |5|5|5||||||| oxi-addons-divider-family |Open+Sans| oxi-addons-divider-font-weight |600| oxi-addons-divider-font-style |normal|||#|| oxi_addons-divider-id ||#||||#||||#|| oxi_addons-divider-text ||#||Shortcode||#|| ||#||',
                'Style 5OXIIMPORTdividerOXIIMPORTstyle-5OXIIMPORToxi-addons-preview-color |rgba(255, 255, 255, 1)| oxi-addons-divider |4|double|#1ab827|oxi-addons-divider-size|350|350|350| oxi-addons-divider-align |center|oxi-addons-divider-animation||1|0//|oxi-addons-divider-padding-top |2|2|2|oxi-addons-divider-padding-bottom |2|2|2|oxi-addons-divider-padding-left |2|2|2|oxi-addons-divider-padding-right |2|2|2|oxi-addons-divider-font-size|20|20|20| oxi-addons-divider-font-color |#1ab827|oxi-addons-divider-font-position|50|50|50|oxi-addons-divider-font-padding-top |5|5|5|oxi-addons-divider-font-padding-bottom |5|5|5|oxi-addons-divider-font-padding-left |15|5|5|oxi-addons-divider-font-padding-right |15|5|5| oxi-addons-divider-border |4|double|#1ab827| oxi-addons-divider-border-radius |50| oxi-addons-divider-family |Open+Sans| oxi-addons-divider-font-weight |600| oxi-addons-divider-font-style |normal|||#|| oxi_addons-divider-id ||#||||#||||#|| oxi_addons-divider-text ||#||Shortcode||#|| ||#||',
            );
            foreach ($file as $value) {
                $number = rand();
                echo '<div class="oxi-addons-col-1"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center ">';
                echo OxiDataAdminShortcode($oxitype, $value);
                echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                echo OxiDataAdminShortcodeName($value);
                echo '            </div>';
                echo OxiDataAdminShortcodeControl($number, $value, array('style-1', 'style-2'));
                echo '        </div>
                     </div>
                     </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
echo OxiDataAdminShortcodeModal($oxitype);
