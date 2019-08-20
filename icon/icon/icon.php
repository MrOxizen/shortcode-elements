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
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <?php echo OxiAddonsAdmAdminShortcodeTable($data, $oxitype); ?> 
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <?php
            $file = Array(
                'Style 1 Demo 1OXIIMPORTiconOXIIMPORTstyle-1OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |40|40|40| oxi_addons-icon-margin-top |10|10|10| oxi_addons-icon-margin-left |10|10|10| oxi_addons-icon-width |80|80|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |linear-gradient(45deg, rgba(204,0,153,1.00) 0%,rgba(232,51,184,1.00) 100%)|oxi_addons-icon-animation||0.5|0.5//| oxi-addons-icon-border-radius |80|oxi-addons-preview-BG |#ffffff|OxiADDC-Item |oxi-addons-lg-col-3|oxi-addons-md-col-3|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##||#|| ||#||oxi_addons-icon-class ||#||fas fa-cloud-sun-rain||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-seedling||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-motorcycle||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##',
                'Style 1 Demo 2OXIIMPORTiconOXIIMPORTstyle-1OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |40|40|40| oxi_addons-icon-margin-top |10|10|10| oxi_addons-icon-margin-left |10|10|10| oxi_addons-icon-width |80|80|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |linear-gradient(45deg, rgba(78,0,224,1.00) 0%,rgba(118,65,217,1.00) 100%)|oxi_addons-icon-animation||0.5|0.5//| oxi-addons-icon-border-radius |80|oxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiADDC-Item |oxi-addons-lg-col-3|oxi-addons-md-col-3|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##||#|| ||#||oxi_addons-icon-class ||#||fab fa-jedi-order||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-anchor||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-fire-extinguisher||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##',
                'Style 2OXIIMPORTiconOXIIMPORTstyle-2OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |40|40|40| oxi_addons-icon-margin-top |20|20|20| oxi_addons-icon-margin-left |10|10|10| oxi_addons-icon-width |80|80|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(247,116,10,1.00)|oxi_addons-icon-animation||0.5|0.5//| oxi-addons-icon-border-radius |80|oxi-addons-preview-BG |rgba(255,255,255,1.00)| oxi_addons-icon-border-color |#f7740a| oxi_addons-icon-border-size |4|4|4| oxi_addons-icon-padding-top |5|5|5|OxiADDC-Item |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##||#|| ||#||oxi_addons-icon-class ||#||fas fa-grin-hearts||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-charging-station||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-cloud-sun-rain||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##',
                'Style 3OXIIMPORTiconOXIIMPORTstyle-3OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |40|40|40| oxi_addons-icon-margin-top |10|10|10| oxi_addons-icon-margin-left |10|10|10| oxi_addons-icon-width |80|80|80| oxi_addons-icon-color |#41ab6b| ||oxi_addons-icon-animation||0.5|0.5//| oxi-addons-icon-border-radius |80|oxi-addons-preview-BG |#ffffff| oxi_addons-icon-border-color |#41ab6b| oxi_addons-icon-border-size |4|4|4|OxiADDC-Item |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##||#|| ||#||oxi_addons-icon-class ||#||fas fa-cloud-sun-rain||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-seedling||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-charging-station||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##',
                'Style 4OXIIMPORTiconOXIIMPORTstyle-4OXIIMPORToxi_addons-icon-link-opening || oxi_addons-icon-font-size |40|40|40| oxi_addons-icon-margin-top |10|10|10| oxi_addons-icon-margin-left |10|10|10| oxi_addons-icon-width |80|80|80| oxi_addons-icon-color |#ffffff| oxi_addons-icon-bg-color |rgba(203,158,240,1.00)|oxi_addons-icon-animation||0.5|0.5//| oxi-addons-icon-border-radius |80|oxi-addons-preview-BG |#ffffff| oxi_addons-icon-border-color |#8d4bc2| oxi_addons-icon-border-size |8|8|8|OxiADDC-Item |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##||#|| ||#||oxi_addons-icon-class ||#||fas fa-cloud-sun-rain||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-motorcycle||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##||#|| ||#||oxi_addons-icon-class ||#||fas fa-grin-hearts||#||oxi_addons-icon-id ||#||||#||oxi_addons-icon-link ||#||#||#||||#|| ||#||##OXIDATA##',
            );
            foreach ($file as $value) {
                $number = rand();
                echo '<div class="oxi-addons-col-1"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                echo OxiDataAdminShortcode($oxitype, $value);
                echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
               echo OxiDataAdminShortcodeName($value);
                            echo '</div>';
                            echo OxiDataAdminShortcodeControl($number, $value, array('style-1','style-2','style-3'));
                            echo '</div>
                                </div>
                            </div>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>

<?php
echo OxiDataAdminShortcodeModal($oxitype);
