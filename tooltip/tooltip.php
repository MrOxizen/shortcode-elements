<?php
if (!defined('ABSPATH')) {
    exit;
}

$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiimpport = '';
if (!empty($_GET['oxiimpport'])) {
    $oxiimpport = sanitize_text_field($_GET['oxiimpport']);
}

oxi_addons_user_capabilities();
OxiDataAdminImport($oxitype);
global $wpdb;
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_import = $wpdb->prefix . 'oxi_div_import';
$importstyle = $wpdb->get_results("SELECT * FROM $table_import WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
$freeimport = array('style-1');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = array(
    'Icon TooltipOXIIMPORTtooltipOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|oxi-tt-border-radius-top |0|0|0|oxi-tt-border-radius-bottom |0|0|0|oxi-tt-border-radius-left |0|0|0|oxi-tt-border-radius-right |5|5|5|oxi-tt-border-size-top |0|0|0|oxi-tt-border-size-bottom |0|0|0|oxi-tt-border-size-left |0|0|0|oxi-tt-border-size-right |0|0|0|oxi-tt-border |dashed|#f70000||oxi-tt-content-margin-top |0|0|0|oxi-tt-content-margin-bottom |0|0|0|oxi-tt-content-margin-left |0|0|0|oxi-tt-content-margin-right |0|0|0|oxi-tt-box-shadow |rgba(140, 140, 140, 0.49)|0|0|18|2|oxi-tt-icon-color |#2e2e2e|oxi-tt-icon-bg-color |rgba(255,255,255,1.00)|oxi-tt-icon-font-size |42|10|10|oxi-tt-icon-padding-top |20|20|20|oxi-tt-icon-padding-bottom |20|20|20|oxi-tt-icon-padding-left |20|20|20|oxi-tt-icon-padding-right |20|20|20|oxi-tt-icon-margin-top |0|0|0|oxi-tt-icon-margin-bottom |0|0|0|oxi-tt-icon-margin-left |0|0|0|oxi-tt-icon-margin-right |0|0|0|oxi-tt-icon-h-color |#22b8cf|oxi-tt-icon-h-bg-color |rgba(250,255,254,1.00)|oxi-tt-icon-width |100|100|100|oxi-tt-icon-height |100|100|100|oxi-addons-tt-text-d |right|oxi-tt-tooltip-color |#ffffff|oxi-tt-tooltip-padding-top |5|5|5|oxi-tt-tooltip-padding-bottom |5|5|5|oxi-tt-tooltip-padding-left |10|10|10|oxi-tt-tooltip-padding-right |10|10|10|oxi-tt-tooltip-font-size |14|14|14|oxi-tt-tooltip-font-family |5|100|oxi-tt-tooltip-font-style |normal:1.3|left:0()0()0()#ffffff:|oxi-tt-tooltip-bg-color |rgba(34,184,207,1.00)|oxi-tt-tooltip-border-radius-top |10|10|10|oxi-tt-tooltip-border-radius-bottom |10|10|10|oxi-tt-tooltip-border-radius-left |10|10|10|oxi-tt-tooltip-border-radius-right |10|10|10|oxi-tt-rows |oxi-addons-lg-col-4|oxi-addons-md-col-2|oxi-addons-xs-col-1|oxi-tt-tooltip-margin-top |0|0|0|oxi-tt-tooltip-margin-bottom |0|0|0|oxi-tt-tooltip-margin-left |7|7|7|oxi-tt-tooltip-margin-right |0|0|0|oxi-tt-opening-tab ||||#||##OXISTYLE##oxi-tt-icon-class ||#||fab fa-android||#|| oxi-tt-hover-text ||#||Android||#|| oxi-tt-icon-link ||#||#||#||##OXIDATA##oxi-tt-icon-class ||#||fas fa-dove||#|| oxi-tt-hover-text ||#||I am Dove||#|| oxi-tt-icon-link ||#||#||#||##OXIDATA##oxi-tt-icon-class ||#||fab fa-windows||#|| oxi-tt-hover-text ||#||I am Windows||#|| oxi-tt-icon-link ||#||#||#||##OXIDATA##oxi-tt-icon-class ||#||fab fa-apple||#|| oxi-tt-hover-text ||#||I am Apple||#|| oxi-tt-icon-link ||#||#||#||##OXIDATA##',
    'Image TooltipOXIIMPORTtooltipOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(227,227,227,1.00)|||||||||||||||||||||||||||||||||||||oxi-tt-content-margin-top |10|10|10|oxi-tt-content-margin-bottom |10|10|10|oxi-tt-content-margin-left |10|10|10|oxi-tt-content-margin-right |10|10|10|oxi-tt-box-shadow |rgba(140, 140, 140, 0.49)|0|0|18|2|||||||||||||||||||||||||||||||||||||||||||||||||||||oxi-addons-tt-text-d |right|oxi-tt-tooltip-color |#ffffff|oxi-tt-tooltip-padding-top |5|5|5|oxi-tt-tooltip-padding-bottom |5|5|5|oxi-tt-tooltip-padding-left |5|5|5|oxi-tt-tooltip-padding-right |5|5|5|oxi-tt-tooltip-font-size |18|16|13|oxi-tt-tooltip-font-family |Open+Sans|600|oxi-tt-tooltip-font-style |normal:1.3|left:0()0()0()#ffffff:|oxi-tt-tooltip-bg-color |#2b08d6|oxi-tt-tooltip-border-radius-top |16|16|16|oxi-tt-tooltip-border-radius-bottom |16|16|16|oxi-tt-tooltip-border-radius-left |16|16|16|oxi-tt-tooltip-border-radius-right |16|16|16|oxi-tt-rows |oxi-addons-lg-col-2|oxi-addons-md-col-1|oxi-addons-xs-col-1|oxi-tt-tooltip-margin-top |0|0|0|oxi-tt-tooltip-margin-bottom |0|0|0|oxi-tt-tooltip-margin-left |0|0|0|oxi-tt-tooltip-margin-right |0|0|0|oxi-tt-opening-tab ||oxi-tt-max-width |300|300|200|oxi-tt-tooltip-max-width |220|150|110|||#||##OXISTYLE##oxi-tt-bg-image ||#||https://www.oxilab.org/wp-content/uploads/2019/03/portfolio1.jpg||#|| oxi-tt-hover-text ||#||Bangladesh||#|| oxi-tt-icon-link ||#||#||#||##OXIDATA##oxi-tt-bg-image ||#||https://www.oxilab.org/wp-content/uploads/2019/03/blog3.jpg||#|| oxi-tt-hover-text ||#||Hong Kong||#|| oxi-tt-icon-link ||#||#||#||##OXIDATA##oxi-tt-bg-image ||#||https://www.oxilab.org/wp-content/uploads/2019/03/portfolio3.jpg||#|| oxi-tt-hover-text ||#||Singapore||#|| oxi-tt-icon-link ||#||#||#||##OXIDATA##oxi-tt-bg-image ||#||https://www.oxilab.org/wp-content/uploads/2019/03/portfolio4.jpg||#|| oxi-tt-hover-text ||#||Switzerland||#|| oxi-tt-icon-link ||#||#||#||##OXIDATA##',
    'Shortcode TooltipOXIIMPORTtooltipOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|||||||||||||||||||||||||||||||||||||oxi-tt-content-margin-top |0|0|0|oxi-tt-content-margin-bottom |0|0|0|oxi-tt-content-margin-left |0|0|0|oxi-tt-content-margin-right |0|0|0|oxi-tt-box-shadow |rgba(130, 130, 130, 0.49)|0|0|18|2|||||||||||||||||||||||||||||||||||||||||||||||||||||oxi-addons-tt-text-d |top|oxi-tt-tooltip-color |#ffffff|oxi-tt-tooltip-padding-top |7|7|7|oxi-tt-tooltip-padding-bottom |7|7|7|oxi-tt-tooltip-padding-left |7|7|7|oxi-tt-tooltip-padding-right |7|7|7|oxi-tt-tooltip-font-size |18|16|13|oxi-tt-tooltip-font-family |Lato|600|oxi-tt-tooltip-font-style |normal:1.3|left:0()0()0()#ffffff:|oxi-tt-tooltip-bg-color |#138ec2|oxi-tt-tooltip-border-radius-top |16|16|16|oxi-tt-tooltip-border-radius-bottom |16|16|16|oxi-tt-tooltip-border-radius-left |16|16|16|oxi-tt-tooltip-border-radius-right |16|16|16|oxi-tt-rows |oxi-addons-lg-col-2|oxi-addons-md-col-1|oxi-addons-xs-col-1|oxi-tt-tooltip-margin-top |-17|-17|-17|oxi-tt-tooltip-margin-bottom |0|0|0|oxi-tt-tooltip-margin-left |0|0|0|oxi-tt-tooltip-margin-right |0|0|0|oxi-tt-opening-tab ||oxi-tt-max-width |348|348|348|oxi-tt-tooltip-max-width |220|150|110|||#||##OXISTYLE##oxi-tt-sc-textarea ||#||||#|| oxi-tt-hover-text ||#||||#|| oxi-tt-sc-link ||#||||#||##OXIDATA##oxi-tt-sc-textarea ||#||||#|| oxi-tt-hover-text ||#||Food Menu Shortcode||#|| oxi-tt-sc-link ||#||#||#||##OXIDATA##',
);
if ($oxiimpport == 'import') {
    ?>
    <div class="wrap">
        <?php
        echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes');
        echo '<div class="oxi-addons-wrapper">
                <div class="oxi-addons-row">
                    <div class="oxi-addons-view-more-demo" style=" padding-top: 35px; padding-bottom: 35px; ">
                        <div class="oxi-addons-view-more-demo-data" >
                            <div class="oxi-addons-view-more-demo-icon">
                                <i class="fas fa-bullhorn oxi-icons"></i>
                            </div>
                            <div class="oxi-addons-view-more-demo-text">
                                <div class="oxi-addons-view-more-demo-heading">
                                    More Layouts
                                </div>
                                <div class="oxi-addons-view-more-demo-content">
                                    Thank you for using Shortcode Addons. As limitation of viewing Layouts or Design we added some layouts. Kindly check more  <a target="_blank" href="https://www.oxilab.org/shortcode-addons-features/' . str_replace('_', '-', $oxitype) . '" >' . oxi_addons_shortcode_name_converter($oxitype) . '</a> design from Oxilab.org. Copy <strong>export</strong> code and <strong>import</strong> it, get your preferable layouts.
                                </div>
                            </div>
                            <div class="oxi-addons-view-more-demo-button">
                                <a target="_blank" class="oxi-addons-more-layouts" href="https://www.oxilab.org/shortcode-addons-features/' . str_replace('_', '-', $oxitype) . '" >View layouts</a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>';
        ?>

        <div class="oxi-addons-wrapper">
            <div class="oxi-addons-row">
                <?php
                foreach ($file as $value) {
                    $expludedata = explode('OXIIMPORT', $value);
                    $datatrue = '';
                    foreach ($importstyle as $vals) {
                        if ($vals['name'] == $expludedata[2]) {
                            $datatrue = 'true';
                        }
                    }
                    if ($datatrue != 'true') {
                        $number = rand();
                        echo '<div class="oxi-addons-col-1"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo OxiDataAdminShortcode($oxitype, $value);
                        echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                        echo OxiDataAdminShortcodeName($value);
                        echo '       </div>';
                        echo '  <div class="oxi-addons-style-preview-bottom-right">
                                    <form method="post" style=" display: inline-block; ">
                                        ' . wp_nonce_field("oxi-addons-$expludedata[1]-style-active-nonce") . '
                                        <input type="hidden" name="oxiactivestyle" value="' . $expludedata[2] . '">
                                        <button class="btn btn-success" title="Active"  type="submit" value="Active" name="addonsstyleactive">Import Style</button>  
                                    </form> 
                                </div>';
                        echo '            </div>
                   </div>
                </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php
} else {
    $data = $wpdb->get_results("SELECT * FROM $table_name WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
    ?>
    <div class="wrap">
        <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
        <?php echo OxiAddonsAdmAdminShortcodeTable($data, $oxitype); ?>
        <div class="oxi-addons-wrapper">
            <div class="oxi-addons-row">
                <?php
                foreach ($file as $value) {
                    $expludedata = explode('OXIIMPORT', $value);
                    $datatrue = '';
                    foreach ($importstyle as $vals) {
                        if ($vals['name'] == $expludedata[2]) {
                            $datatrue = 'true';
                        }
                    }
                    if ($datatrue == 'true') {
                        $number = rand();
                        echo '<div class="oxi-addons-col-1" id="' . $expludedata[2] . '"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo OxiDataAdminShortcode($oxitype, $value);
                        echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                        echo OxiDataAdminShortcodeName($value);
                        echo '       </div>';
                        echo OxiDataAdminShortcodeControl($number, $value, $freeimport);
                        echo '            </div>
                   </div>
                </div>';
                    }
                }
                ?>
                <div class="oxi-addons-col-1 oxi-import">
                    <div class="oxi-addons-style-preview">
                        <div class="oxilab-admin-style-preview-top">
                            <a href="<?php echo admin_url("admin.php?page=oxi-addons&oxitype=$oxitype&oxiimpport=import"); ?>">
                                <div class="oxilab-admin-add-new-item">
                                    <span>
                                        <i class="fas fa-plus-circle oxi-icons"></i>  
                                        Add More Templates
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    echo OxiDataAdminShortcodeModal($oxitype);
}

