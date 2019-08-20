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
                array(
                    'style 1OXIIMPORTdrop_capsOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddDropCaps-padding-top |5|5|5|OxiAddDropCaps-padding-bottom |5|5|5|OxiAddDropCaps-padding-left |5|5|5|OxiAddDropCaps-padding-right |5|5|5|OxiAddDropCaps-margin-top |2|2|2|OxiAddDropCaps-margin-bottom |2|2|2|OxiAddDropCaps-margin-left |2|2|2|OxiAddDropCaps-margin-right |2|2|2|OxiAddDropCaps-animation||.5|.5//|OxiAddDropCaps-font-size|78|70|65| OxiAddDropCaps-color |#db00c9| OxiAddDropCaps-family |Inherit| OxiAddDropCaps-font-weight |600| OxiAddDropCaps-font-style |normal|||#|| ||#||OxiAddDropCaps-text ||#||A||#||OxiAddDropCaps-id ||#||nais||#||OxiAddDropCaps-position ||#||left||#|||',
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non ultricies neque, sed ultricies lorem. Donec vel sapien eu leo vulputate egestas vel ut eros. In nec nisi nibh. Mauris tincidunt commodo convallis. Aliquam vitae odio convallis nisi fermentum rhoncus. Cras maximus accumsan lorem, eu feugiat augue mollis sit amet.'
                ),
                array(
                    'style 2OXIIMPORTdrop_capsOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddDropCaps-padding-top |5|5|5|OxiAddDropCaps-padding-bottom |10|5|5|OxiAddDropCaps-padding-left |10|5|5|OxiAddDropCaps-padding-right |10|5|5|OxiAddDropCaps-margin-top |2|2|2|OxiAddDropCaps-margin-bottom |2|2|2|OxiAddDropCaps-margin-left |5|2|2|OxiAddDropCaps-margin-right |5|2|2|OxiAddDropCaps-animation||.5|.5//|OxiAddDropCaps-font-size|60|60|55| OxiAddDropCaps-color |#ffffff| OxiAddDropCaps-family |Oxygen| OxiAddDropCaps-font-weight |600| OxiAddDropCaps-font-style |normal| OxiAddDropCaps-bg-color |rgba(178, 0, 184, 1)| OxiAddDropCaps-border-radius |50|||#|| ||#||OxiAddDropCaps-text ||#||A||#||OxiAddDropCaps-id ||#||nais||#||OxiAddDropCaps-position ||#||left||#|||',
                    'Donec quis tellus tempor, consectetur velit et, sagittis est. Fusce elementum ornare sollicitudin. In hac habitasse platea dictumst. Pellentesque sit amet lorem tempor ipsum sodales tincidunt. Vestibulum venenatis in nisi nec tempor. Cras vel nibh blandit, consectetur sapien sit amet, pellentesque ex.'
                ),
                array(
                    'style 3OXIIMPORTdrop_capsOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddDropCaps-padding-top |5|5|5|OxiAddDropCaps-padding-bottom |10|5|5|OxiAddDropCaps-padding-left |10|5|5|OxiAddDropCaps-padding-right |10|5|5|OxiAddDropCaps-margin-top |2|2|2|OxiAddDropCaps-margin-bottom |2|2|2|OxiAddDropCaps-margin-left |5|2|2|OxiAddDropCaps-margin-right |5|2|2|OxiAddDropCaps-animation||0.5|0.5//|OxiAddDropCaps-font-size|60|60|55| OxiAddDropCaps-color |#9b00d4| OxiAddDropCaps-family |Oxygen| OxiAddDropCaps-font-weight |600| OxiAddDropCaps-font-style |normal| || OxiAddDropCaps-border-radius |0|OxiAddDropCaps-border-top |2|2|2|OxiAddDropCaps-border-bottom |2|2|2|OxiAddDropCaps-border-left |2|2|2|OxiAddDropCaps-border-right |2|2|2| OxiAddDropCaps-border||double|#9b00d4|||#|| ||#||OxiAddDropCaps-text ||#||A||#||OxiAddDropCaps-id ||#||nais||#||OxiAddDropCaps-position ||#||left||#|||',
                    'Sed nec dolor commodo, pulvinar tortor et, facilisis ex. Suspendisse fringilla justo et eros egestas, eget molestie mi pharetra. Nunc efficitur euismod leo a tempor. Cras eu lobortis nunc. Sed luctus, leo sed lobortis feugiat, felis nisi pharetra tellus, nec pretium diam ipsum a leo. Nam ultrices orci sed lacinia vestibulum.'
                ),
                array(
                    'Style 4 testOXIIMPORTdrop_capsOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddDropCaps-padding-top |20|20|20|OxiAddDropCaps-padding-bottom |25|25|25|OxiAddDropCaps-padding-left |20|20|20|OxiAddDropCaps-padding-right |20|20|20|OxiAddDropCaps-margin-top |20|20|20|OxiAddDropCaps-margin-bottom |20|20|20|OxiAddDropCaps-margin-left |20|20|20|OxiAddDropCaps-margin-right |20|20|20|OxiAddDropCaps-animation||0.5|0.5//|OxiAddDropCaps-font-size|59|59|59| OxiAddDropCaps-color |#000000| OxiAddDropCaps-family |Oxygen| OxiAddDropCaps-font-weight |600| OxiAddDropCaps-font-style |normal| || OxiAddDropCaps-border-radius |0|OxiAddDropCaps-border-top |0|0|0|OxiAddDropCaps-border-bottom |0|0|0|OxiAddDropCaps-border-left |0|0|0|OxiAddDropCaps-border-right |0|0|0| OxiAddDropCaps-border||solid|#ffffff|||||oxi-addons-bg-image-overlay |rgba(186,23,23,0.00)|||#|| ||#||OxiAddDropCaps-text ||#||A||#||OxiAddDropCaps-id ||#||adf||#||OxiAddDropCaps-position ||#||left||#||OxiAddons-drop-caps-IMG ||#||https://www.oxilab.org/wp-content/uploads/2019/03/063f69c09a51aa1dd340767887214d14-caligraphy-ornaments-frame-by-vexels.png||#|||',
                    'Sed nec dolor commodo, pulvinar tortor et, facilisis ex. Suspendisse fringilla justo et eros egestas, eget molestie mi pharetra. Nunc efficitur euismod leo a tempor. Cras eu lobortis nunc. Sed luctus, leo sed lobortis feugiat, felis nisi pharetra tellus, nec pretium diam ipsum a leo. Nam ultrices orci sed lacinia vestibulum.'
                )
            );
            foreach ($file as $value) {
                $number = rand();
                echo '<div class="oxi-addons-col-6"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center oxiequalHeight">';
                echo OxiDataAdminShortcode($oxitype, $value[0]);
                echo $value[1];
                echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                echo OxiDataAdminShortcodeName($value[0]);
                    echo '</div>';
                    echo OxiDataAdminShortcodeControl($number, $value[0], array('style-1'));
                    echo '</div>
                        </div>
                    </div>';
            }
            $css = '
            .oxi-addons-style-preview-top{ 
                font-size: 16px;
                font-family: ' . oxi_addons_font_familly('Open+Sans') . ' !important;
                text-align:left;
                }';
            wp_add_inline_style('oxi-addons', $css);
            ?>
        </div>
    </div>
</div>

<?php
echo OxiDataAdminShortcodeModal($oxitype);
