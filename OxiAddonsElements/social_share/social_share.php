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
    'Style 01OXIIMPORTsocial_shareOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-G-Position |center|OxiAddonsSocialShare-G-M-top |0|0|0|OxiAddonsSocialShare-G-M-bottom |0|0|0|OxiAddonsSocialShare-G-M-left |0|0|0|OxiAddonsSocialShare-G-M-right |0|0|0|OxiAddonsSocialShare-social-FS |26|26|26|OxiAddonsSocialShare-social-W |80|80|80|OxiAddonsSocialShare-social-H |80|80|80|OxiAddonsSocialShare-social-Stroke |2|2|2|OxiAddonsSocialShare-social-hover-Stroke |10|10|10| OxiAddonsSocialShare-facebook-controls |true| OxiAddonsSocialShare-facebook-icon-color |#3b5999| OxiAddonsSocialShare-facebook-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-facebook-hover-icon-color |#ffffff| OxiAddonsSocialShare-facebook-HBG |rgba(59,89,153,1.00)| OxiAddonsSocialShare-twitter-controls |true| OxiAddonsSocialShare-twitter-icon-color |#55acee| OxiAddonsSocialShare-twitter-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-twitter-hover-icon-color |#ffffff| OxiAddonsSocialShare-twitter-HBG |rgba(85,172,238,1.00)| OxiAddonsSocialShare-google-controls |true| OxiAddonsSocialShare-google-icon-color |#dd4b39| OxiAddonsSocialShare-google-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-google-hover-icon-color |#ffffff| OxiAddonsSocialShare-google-HBG |rgba(221,75,57,1.00)| OxiAddonsSocialShare-linkedin-controls |true| OxiAddonsSocialShare-linkedin-icon-color |#0077b5| OxiAddonsSocialShare-linkedin-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-linkedin-hover-icon-color |#ffffff| OxiAddonsSocialShare-linkedin-HBG |rgba(0,119,181,1.00)| OxiAddonsSocialShare-pinterest-controls |true| OxiAddonsSocialShare-pinterest-icon-color |#bd081c| OxiAddonsSocialShare-pinterest-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-pinterest-hover-icon-color |#ffffff| OxiAddonsSocialShare-pinterest-HBG |rgba(189,8,28,1.00)|||#|| OxiAddonsSocialShare-facebook-icon ||#||fab fa-facebook||#|| OxiAddonsSocialShare-twitter-icon ||#||fab fa-twitter||#|| OxiAddonsSocialShare-google-icon ||#||fab fa-google||#|| OxiAddonsSocialShare-linkedin-icon ||#||fab fa-linkedin||#|| OxiAddonsSocialShare-pinterest-icon ||#||fab fa-pinterest||#|| ||#||##OXISTYLE##OxiAddonsSocialShare-random-icon ||#||fab fa-facebook||#|| OxiAddonsSocialShare-random-hidden-text ||#||facebook||#|| OxiAddonsSocialShare-random-icon-color ||#||#1d4099||#|| OxiAddonsSocialShare-random-BG ||#||rgba(255,255,255,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(29,64,153,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-twitter||#|| OxiAddonsSocialShare-random-hidden-text ||#||twitter||#|| OxiAddonsSocialShare-random-icon-color ||#||#55acee||#|| OxiAddonsSocialShare-random-BG ||#||rgba(255,255,255,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(85,172,238,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-linkedin||#|| OxiAddonsSocialShare-random-hidden-text ||#||linkedin||#|| OxiAddonsSocialShare-random-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-BG ||#||rgba(0,119,181,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#0077b5||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(255,255,255,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-google-plus||#|| OxiAddonsSocialShare-random-hidden-text ||#||google||#|| OxiAddonsSocialShare-random-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-BG ||#||rgba(221,75,57,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#dd4b39||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(255,255,255,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-pinterest||#|| OxiAddonsSocialShare-random-hidden-text ||#||pinterest||#|| OxiAddonsSocialShare-random-icon-color ||#||#bd081c||#|| OxiAddonsSocialShare-random-BG ||#||rgba(255,255,255,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(189, 8, 28, 1)||#|| ||#||##OXIDATA##',
    'Style 02OXIIMPORTsocial_shareOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-G-Position |center|OxiAddonsSocialShare-G-M-top |0|0|0|OxiAddonsSocialShare-G-M-bottom |0|0|0|OxiAddonsSocialShare-G-M-left |0|0|0|OxiAddonsSocialShare-G-M-right |0|0|0|OxiAddIconBoxes-box-shadow |rgba(196, 196, 196, 1)|0|6|15|-4|OxiAddIconBoxes-hover-box-shadow |rgba(196, 196, 196, 1)|0|0|0|0|OxiAddons-animation||2:false:false:500:10:0.2|0//|OxiAddonsSocialShare-button-FS |16|16|16| OxiAddonsSocialShare-width-type |false|OxiAddonsSocialShare-button-W |120|120|120|OxiAddonsSocialShare-button-F-family |Bree Serif|100|OxiAddonsSocialShare-button-F-style |normal|::|OxiAddonsSocialShare-Number-B |2|dotted||OxiAddonsSocialShare-BR-top |0|0|0|OxiAddonsSocialShare-BR-bottom |0|0|0|OxiAddonsSocialShare-BR-left |0|0|0|OxiAddonsSocialShare-BR-right |0|0|0|OxiAddonsSocialShare-button-P-top |3|3|3|OxiAddonsSocialShare-button-P-bottom |3|3|3|OxiAddonsSocialShare-button-P-left |10|10|10|OxiAddonsSocialShare-button-P-right |10|10|10|OxiAddonsSocialShare-button-M-top |5|5|5|OxiAddonsSocialShare-button-M-bottom |5|5|5|OxiAddonsSocialShare-button-M-left |5|5|5|OxiAddonsSocialShare-button-M-right |5|5|5|OxiAddonsSocialShare-hover-BR-top |0|0|0|OxiAddonsSocialShare-hover-BR-bottom |0|0|0|OxiAddonsSocialShare-hover-BR-left |0|0|0|OxiAddonsSocialShare-hover-BR-right |0|0|0|OxiAddonsSocialShare-button-icon-FS |20|20|20|OxiAddonsSocialShare-icon-P-top |0|0|0|OxiAddonsSocialShare-icon-P-bottom |0|0|0|OxiAddonsSocialShare-icon-P-left |0|0|0|OxiAddonsSocialShare-icon-P-right |10|10|10| FB-C |true| OxiAddonsSocialShare-facebook-icon-color |#ffffff| OxiAddonsSocialShare-facebook-BG |rgba(59,89,153,1.00)| OxiAddonsSocialShare-facebook-Number-BC |#3b5999| OxiAddonsSocialShare-facebook-hover-color |#3b5999| OxiAddonsSocialShare-facebook-hover-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-facebook-hover-border-color |#3b5999| OxiAddonsSocialShare-twitter-controls |true| OxiAddonsSocialShare-twitter-icon-color |#ffffff| OxiAddonsSocialShare-twitter-BG |rgba(85,172,238,1.00)| OxiAddonsSocialShare-twitter-Number-BC |#55acee| OxiAddonsSocialShare-twitter-hover-color |#55acee| OxiAddonsSocialShare-twitter-hover-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-twitter-hover-border-color |#55acee| OxiAddonsSocialShare-linkedin-controls |true| OxiAddonsSocialShare-linkedin-icon-color |#ffffff| OxiAddonsSocialShare-linkedin-BG |rgba(0,119,181,1.00)| OxiAddonsSocialShare-linkedin-Number-BC |#0077b5| OxiAddonsSocialShare-linkedin-hover-color |#0077b5| OxiAddonsSocialShare-linkedin-hover-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-linkedin-hover-border-color |#0077b5| OxiAddonsSocialShare-google-controls |true| OxiAddonsSocialShare-google-icon-color |#ffffff| OxiAddonsSocialShare-google-BG |rgba(221,75,57,1.00)| OxiAddonsSocialShare-google-Number-BC |#dd4b39| OxiAddonsSocialShare-google-hover-color |#dd4b39| OxiAddonsSocialShare-google-hover-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-google-hover-border-color |#dd4b39| OxiAddonsSocialShare-pinterest-controls |true| OxiAddonsSocialShare-pinterest-icon-color |#ffffff| OxiAddonsSocialShare-pinterest-BG |rgba(189,8,28,1.00)| OxiAddonsSocialShare-pinterest-Number-BC |#bd081c| OxiAddonsSocialShare-pinterest-hover-color |#bd081c| OxiAddonsSocialShare-pinterest-hover-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-pinterest-hover-border-color |#bd081c|||#|| OxiAddonsSocialShare-facebook-text ||#||Facebook||#|| OxiAddonsSocialShare-facebook-icon ||#||fab fa-facebook-f||#|| OxiAddonsSocialShare-twitter-text ||#||Twitter||#|| OxiAddonsSocialShare-twitter-icon ||#||fab fa-twitter||#|| OxiAddonsSocialShare-linkedin-text ||#||Linkedin||#|| OxiAddonsSocialShare-linkedin-icon ||#||fab fa-linkedin||#|| OxiAddonsSocialShare-google-text ||#||google +||#|| OxiAddonsSocialShare-google-icon ||#||fab fa-google||#|| OxiAddonsSocialShare-pinterest-text ||#||Pinterest||#|| OxiAddonsSocialShare-pinterest-icon ||#||fab fa-pinterest||#|| ||#||##OXISTYLE##OxiAddonsSocialShare-random-icon ||#||fab fa-facebook||#|| OxiAddonsSocialShare-random-hidden-text ||#||facebook||#|| OxiAddonsSocialShare-random-icon-color ||#||#1d4099||#|| OxiAddonsSocialShare-random-BG ||#||rgba(255,255,255,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(29,64,153,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-twitter||#|| OxiAddonsSocialShare-random-hidden-text ||#||twitter||#|| OxiAddonsSocialShare-random-icon-color ||#||#55acee||#|| OxiAddonsSocialShare-random-BG ||#||rgba(255,255,255,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(85,172,238,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-linkedin||#|| OxiAddonsSocialShare-random-hidden-text ||#||linkedin||#|| OxiAddonsSocialShare-random-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-BG ||#||rgba(0,119,181,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#0077b5||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(255,255,255,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-google-plus||#|| OxiAddonsSocialShare-random-hidden-text ||#||google||#|| OxiAddonsSocialShare-random-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-BG ||#||rgba(221,75,57,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#dd4b39||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(255,255,255,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-pinterest||#|| OxiAddonsSocialShare-random-hidden-text ||#||pinterest||#|| OxiAddonsSocialShare-random-icon-color ||#||#bd081c||#|| OxiAddonsSocialShare-random-BG ||#||rgba(255,255,255,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(189, 8, 28, 1)||#|| ||#||##OXIDATA##',
    'Style 03OXIIMPORTsocial_shareOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-G-Position |center|OxiAddonsSocialShare-G-M-top |0|0|0|OxiAddonsSocialShare-G-M-bottom |0|0|0|OxiAddonsSocialShare-G-M-left |0|0|0|OxiAddonsSocialShare-G-M-right |0|0|0|OxiAddIconBoxes-box-shadow |rgba(196, 196, 196, 1)|0|6|15|-4|OxiAddIconBoxes-hover-box-shadow |rgba(196, 196, 196, 1)|0|0|0|0|OxiAddons-animation||2:false:false:500:10:0.2|0//||||| ||OxiAddonsSocialShare-button-W |50|50|50|||||||OxiAddonsSocialShare-Number-B |2|solid||OxiAddonsSocialShare-BR-top |25|25|25|OxiAddonsSocialShare-BR-bottom |25|25|25|OxiAddonsSocialShare-BR-left |25|25|25|OxiAddonsSocialShare-BR-right |25|25|25|||||||||||||||||OxiAddonsSocialShare-button-M-top |5|5|5|OxiAddonsSocialShare-button-M-bottom |5|5|5|OxiAddonsSocialShare-button-M-left |5|5|5|OxiAddonsSocialShare-button-M-right |5|5|5|OxiAddonsSocialShare-hover-BR-top |5|5|5|OxiAddonsSocialShare-hover-BR-bottom |5|5|5|OxiAddonsSocialShare-hover-BR-left |5|5|5|OxiAddonsSocialShare-hover-BR-right |5|5|5|OxiAddonsSocialShare-button-icon-FS |18|18|18||||||||||||||||| FB-C |true| OxiAddonsSocialShare-facebook-icon-color |#ffffff| OxiAddonsSocialShare-facebook-BG |rgba(59,89,153,1.00)| OxiAddonsSocialShare-facebook-Number-BC |#3b5999| OxiAddonsSocialShare-facebook-hover-color |#3b5999| OxiAddonsSocialShare-facebook-hover-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-facebook-hover-border-color |#3b5999| OxiAddonsSocialShare-twitter-controls |true| OxiAddonsSocialShare-twitter-icon-color |#ffffff| OxiAddonsSocialShare-twitter-BG |rgba(85,172,238,1.00)| OxiAddonsSocialShare-twitter-Number-BC |#55acee| OxiAddonsSocialShare-twitter-hover-color |#55acee| OxiAddonsSocialShare-twitter-hover-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-twitter-hover-border-color |#55acee| OxiAddonsSocialShare-linkedin-controls |true| OxiAddonsSocialShare-linkedin-icon-color |#ffffff| OxiAddonsSocialShare-linkedin-BG |rgba(0,119,181,1.00)| OxiAddonsSocialShare-linkedin-Number-BC |#0077b5| OxiAddonsSocialShare-linkedin-hover-color |#0077b5| OxiAddonsSocialShare-linkedin-hover-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-linkedin-hover-border-color |#0077b5| OxiAddonsSocialShare-google-controls |true| OxiAddonsSocialShare-google-icon-color |#ffffff| OxiAddonsSocialShare-google-BG |rgba(221,75,57,1.00)| OxiAddonsSocialShare-google-Number-BC |#dd4b39| OxiAddonsSocialShare-google-hover-color |#dd4b39| OxiAddonsSocialShare-google-hover-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-google-hover-border-color |#dd4b39| OxiAddonsSocialShare-pinterest-controls |true| OxiAddonsSocialShare-pinterest-icon-color |#ffffff| OxiAddonsSocialShare-pinterest-BG |rgba(189,8,28,1.00)| OxiAddonsSocialShare-pinterest-Number-BC |#bd081c| OxiAddonsSocialShare-pinterest-hover-color |#bd081c| OxiAddonsSocialShare-pinterest-hover-BG |rgba(255,255,255,1.00)| OxiAddonsSocialShare-pinterest-hover-border-color |#bd081c|||#|| ||#||||#|| OxiAddonsSocialShare-facebook-icon ||#||fab fa-facebook-f||#||||#||||#|| OxiAddonsSocialShare-twitter-icon ||#||fab fa-twitter||#||||#||||#|| OxiAddonsSocialShare-linkedin-icon ||#||fab fa-linkedin||#|| ||#||||#|| OxiAddonsSocialShare-google-icon ||#||fab fa-google||#|| ||#||||#|| OxiAddonsSocialShare-pinterest-icon ||#||fab fa-pinterest||#|| ||#||##OXISTYLE##OxiAddonsSocialShare-random-icon ||#||fab fa-facebook||#|| OxiAddonsSocialShare-random-hidden-text ||#||facebook||#|| OxiAddonsSocialShare-random-icon-color ||#||#1d4099||#|| OxiAddonsSocialShare-random-BG ||#||rgba(255,255,255,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(29,64,153,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-twitter||#|| OxiAddonsSocialShare-random-hidden-text ||#||twitter||#|| OxiAddonsSocialShare-random-icon-color ||#||#55acee||#|| OxiAddonsSocialShare-random-BG ||#||rgba(255,255,255,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(85,172,238,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-linkedin||#|| OxiAddonsSocialShare-random-hidden-text ||#||linkedin||#|| OxiAddonsSocialShare-random-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-BG ||#||rgba(0,119,181,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#0077b5||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(255,255,255,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-google-plus||#|| OxiAddonsSocialShare-random-hidden-text ||#||google||#|| OxiAddonsSocialShare-random-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-BG ||#||rgba(221,75,57,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#dd4b39||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(255,255,255,1.00)||#|| ||#||##OXIDATA##OxiAddonsSocialShare-random-icon ||#||fab fa-pinterest||#|| OxiAddonsSocialShare-random-hidden-text ||#||pinterest||#|| OxiAddonsSocialShare-random-icon-color ||#||#bd081c||#|| OxiAddonsSocialShare-random-BG ||#||rgba(255,255,255,1.00)||#|| OxiAddonsSocialShare-random-hover-icon-color ||#||#ffffff||#|| OxiAddonsSocialShare-random-HBG ||#||rgba(189, 8, 28, 1)||#|| ||#||##OXIDATA##',
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









