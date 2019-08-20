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
$freeimport = array('style-1', 'style-2', 'style-3');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = array(
    'Style 1OXIIMPORTgoogle_chartOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG ||OxiAddonsgooglechart-G-MW |600|600|600|OxiAddonsgooglechart-G-P-top |0|0|0|OxiAddonsgooglechart-G-P-bottom |0|0|0|OxiAddonsgooglechart-G-P-left |0|0|0|OxiAddonsgooglechart-G-P-right |0|0|0|OxiAddonsgooglechart-B-W |800|800|800|OxiAddonsgooglechart-B-H |450|450|450|OxiAddonsgooglechart-OFF-FS |14|14|14| OxiAddonsgooglechart-OFF-C |#7f8280| |||||| |||||||||||||||| OxiAddonsgooglechart-G-Animation||2:false:false:500:10:0.2|0//||OxiAddonsgooglechart-YA-FS |14|14|14| OxiAddonsgooglechart-YA-C |#4f4e4b|OxiAddonsgooglechart-XA-FS |14|14|14| OxiAddonsgooglechart-XA-C |#4f4e4b| OxiAddonsgooglechart-TT-BG |rgba(21,157,230,0.77)| OxiAddonsgooglechart-TLT-C |#ffffff|OxiAddonsgooglechart-TLT-FS |14|14|14| OxiAddonsgooglechart-TBT-C |#ffffff|OxiAddonsgooglechart-TBT-FS |12|12|12|OxiAddonsgooglechart-CB-BW |3|3|3|||#|| OxiAddonsgooglechart-OFF-I ||#||OFF Votes||#|| ||#||##OXISTYLE##||#||OxiAddonsgooglechart-text ||#||Blue||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(59,182,239,0.61)||#|| OxiAddonsgooglechart-bar-BC ||#||#0c95d4||#|| oxiAddonsgooglechart-value ||#||4||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Pink||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(242,27,199,0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#f21bc7||#|| oxiAddonsgooglechart-value ||#||5||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Yellow||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(226,242,0,0.59)||#|| OxiAddonsgooglechart-bar-BC ||#||#cde303||#|| oxiAddonsgooglechart-value ||#||8||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Orange||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(240,138,22,0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#e6810e||#|| oxiAddonsgooglechart-value ||#||11||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Red||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(250,5,5,0.66)||#|| OxiAddonsgooglechart-bar-BC ||#||#ff0000||#|| oxiAddonsgooglechart-value ||#||14||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Green||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(46,240,12,0.61)||#|| OxiAddonsgooglechart-bar-BC ||#||#27c40c||#|| oxiAddonsgooglechart-value ||#||18||#|| ||#||##OXIDATA##',
    'Style 2OXIIMPORTgoogle_chartOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG ||OxiAddonsgooglechart-G-MW |600|600|600|OxiAddonsgooglechart-G-P-top |0|0|0|OxiAddonsgooglechart-G-P-bottom |0|0|0|OxiAddonsgooglechart-G-P-left |0|0|0|OxiAddonsgooglechart-G-P-right |0|0|0|OxiAddonsgooglechart-B-W |800|800|800|OxiAddonsgooglechart-B-H |600|600|600|OxiAddonsgooglechart-OFF-FS |14|14|14| OxiAddonsgooglechart-OFF-C |#7f8280| |||||| |||||||||||||||| OxiAddonsgooglechart-G-Animation||2:false:false:500:10:0.2|0//||OxiAddonsgooglechart-YA-FS |14|14|14| OxiAddonsgooglechart-YA-C |#4f4e4b|OxiAddonsgooglechart-XA-FS |14|14|14| OxiAddonsgooglechart-XA-C |#4f4e4b| OxiAddonsgooglechart-TT-BG |rgba(21,157,230,0.77)| OxiAddonsgooglechart-TLT-C |#ffffff|OxiAddonsgooglechart-TLT-FS |14|14|14| OxiAddonsgooglechart-TBT-C |#ffffff|OxiAddonsgooglechart-TBT-FS |12|12|12|OxiAddonsgooglechart-CB-BW |3|3|3|||#|| OxiAddonsgooglechart-OFF-I ||#||OFF Votes||#|| ||#||##OXISTYLE##||#||OxiAddonsgooglechart-text ||#||Pink||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(242,27,199,0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#f21bc7||#|| oxiAddonsgooglechart-value ||#||5||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Yellow||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(226,242,0,0.59)||#|| OxiAddonsgooglechart-bar-BC ||#||#cde303||#|| oxiAddonsgooglechart-value ||#||8||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Orange||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(240,138,22,0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#e6810e||#|| oxiAddonsgooglechart-value ||#||11||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Red||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(250,5,5,0.66)||#|| OxiAddonsgooglechart-bar-BC ||#||#ff0000||#|| oxiAddonsgooglechart-value ||#||14||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Green||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(46,240,12,0.61)||#|| OxiAddonsgooglechart-bar-BC ||#||#27c40c||#|| oxiAddonsgooglechart-value ||#||18||#|| ||#||##OXIDATA##',
    'Style 3OXIIMPORTgoogle_chartOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG ||OxiAddonsgooglechart-G-MW |600|600|600|OxiAddonsgooglechart-G-P-top |0|0|0|OxiAddonsgooglechart-G-P-bottom |0|0|0|OxiAddonsgooglechart-G-P-left |0|0|0|OxiAddonsgooglechart-G-P-right |0|0|0|OxiAddonsgooglechart-B-W |800|800|800|OxiAddonsgooglechart-B-H |450|450|450|OxiAddonsgooglechart-OFF-FS |14|14|14| OxiAddonsgooglechart-OFF-C |#0fb1d1| |||||| |||||||||||||||| OxiAddonsgooglechart-G-Animation||2:false:false:500:10:0.2|0//||OxiAddonsgooglechart-YA-FS |14|14|14| OxiAddonsgooglechart-YA-C |#4f4e4b|OxiAddonsgooglechart-XA-FS |14|14|14| OxiAddonsgooglechart-XA-C |#4f4e4b| OxiAddonsgooglechart-TT-BG |rgba(21, 157, 230, 0.77)| OxiAddonsgooglechart-TLT-C |#ffffff|OxiAddonsgooglechart-TLT-FS |14|14|14| OxiAddonsgooglechart-TBT-C |#ffffff|OxiAddonsgooglechart-TBT-FS |12|12|12|OxiAddonsgooglechart-CB-BW |2|2|2|| OxiAddonsgooglechart-G-CBG |rgba(16,155,230,0.39)|OxiAddonsgooglechart-G-BW |2|2|2| OxiAddonsgooglechart-G-BC |#0f80bd|||#|| OxiAddonsgooglechart-OFF-I ||#||Colors||#|| ||#||##OXISTYLE##||#||OxiAddonsgooglechart-text ||#||Blue||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(57,179,240,0.00)||#|| OxiAddonsgooglechart-bar-BC ||#||#05a7f2||#|| oxiAddonsgooglechart-value ||#||16||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Pink||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(242, 27, 199, 0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#f21bc7||#|| oxiAddonsgooglechart-value ||#||10||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Yellow||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(226,242,0,0.59)||#|| OxiAddonsgooglechart-bar-BC ||#||#cde303||#|| oxiAddonsgooglechart-value ||#||14||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Orange||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(240,138,22,0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#e6810e||#|| oxiAddonsgooglechart-value ||#||4||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Red||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,0,0,0.57)||#|| OxiAddonsgooglechart-bar-BC ||#||#ff0000||#|| oxiAddonsgooglechart-value ||#||14||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Green||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(46,240,12,0.61)||#|| OxiAddonsgooglechart-bar-BC ||#||#27c40c||#|| oxiAddonsgooglechart-value ||#||13||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Purple||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(131,7,184,0.46)||#|| OxiAddonsgooglechart-bar-BC ||#||#8307b8||#|| oxiAddonsgooglechart-value ||#||2||#|| ||#||##OXIDATA##',
    'Style 4OXIIMPORTgoogle_chartOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG ||OxiAddonsgooglechart-G-MW |600|600|600|OxiAddonsgooglechart-G-P-top |20|20|20|OxiAddonsgooglechart-G-P-bottom |20|20|20|OxiAddonsgooglechart-G-P-left |20|20|20|OxiAddonsgooglechart-G-P-right |20|20|20|OxiAddonsgooglechart-B-W |800|800|800|OxiAddonsgooglechart-B-H |450|450|450|OxiAddonsgooglechart-OFF-FS |14|14|14| OxiAddonsgooglechart-OFF-C |#31bdbb| |||||| |||||||||||||||| OxiAddonsgooglechart-G-Animation||2|0//|| |||| || |||| || OxiAddonsgooglechart-TT-BG |rgba(21, 157, 230, 0.77)| || |||| OxiAddonsgooglechart-TBT-C |#ffffff|OxiAddonsgooglechart-TBT-FS |12|12|12|OxiAddonsgooglechart-CB-BW |2|2|2||||#|| ||#||##OXISTYLE##||#||OxiAddonsgooglechart-text ||#||Blue||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(5,152,237,1.00)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||500||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Orange||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,103,8,0.67)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||300||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Green||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(28,143,7,0.67)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||250||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Red||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,5,22,0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||350||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Pink||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,71,209,1.00)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||100||#|| ||#||##OXIDATA##',
    'Style 5OXIIMPORTgoogle_chartOXIIMPORTstyle-5OXIIMPORToxi-addons-preview-BG ||OxiAddonsgooglechart-G-MW |600|600|600|OxiAddonsgooglechart-G-P-top |20|20|20|OxiAddonsgooglechart-G-P-bottom |20|20|20|OxiAddonsgooglechart-G-P-left |20|20|20|OxiAddonsgooglechart-G-P-right |20|20|20|OxiAddonsgooglechart-B-W |800|800|800|OxiAddonsgooglechart-B-H |450|450|450|OxiAddonsgooglechart-OFF-FS |14|14|14| OxiAddonsgooglechart-OFF-C |#31bdbb| |||||| |||||||||||||||| OxiAddonsgooglechart-G-Animation||2|0//|| |||| || |||| || OxiAddonsgooglechart-TT-BG |rgba(21, 157, 230, 0.77)| || |||| OxiAddonsgooglechart-TBT-C |#ffffff|OxiAddonsgooglechart-TBT-FS |12|12|12|OxiAddonsgooglechart-CB-BW |2|2|2||||#|| ||#||##OXISTYLE##||#||OxiAddonsgooglechart-text ||#||Blue||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(5,152,237,1.00)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||500||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Orange||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,103,8,0.67)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||300||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Green||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(28,143,7,0.67)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||250||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Red||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,5,22,0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||350||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Pink||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,71,209,1.00)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||100||#|| ||#||##OXIDATA##',
    'Style 6OXIIMPORTgoogle_chartOXIIMPORTstyle-6OXIIMPORToxi-addons-preview-BG ||OxiAddonsgooglechart-G-MW |600|600|600|OxiAddonsgooglechart-G-P-top |20|20|20|OxiAddonsgooglechart-G-P-bottom |20|20|20|OxiAddonsgooglechart-G-P-left |20|20|20|OxiAddonsgooglechart-G-P-right |20|20|20|OxiAddonsgooglechart-B-W |800|800|800|OxiAddonsgooglechart-B-H |450|450|450|OxiAddonsgooglechart-OFF-FS |14|14|14| OxiAddonsgooglechart-OFF-C |#31bdbb| |||||| |||||||||||||||| OxiAddonsgooglechart-G-Animation||2|0//|| |||| || |||| || OxiAddonsgooglechart-TT-BG |rgba(21, 157, 230, 0.77)| || |||| OxiAddonsgooglechart-TBT-C |#ffffff|OxiAddonsgooglechart-TBT-FS |12|12|12|OxiAddonsgooglechart-CB-BW |2|2|2||||#|| ||#||##OXISTYLE##||#||OxiAddonsgooglechart-text ||#||Blue||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(5,152,237,1.00)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||500||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Orange||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,103,8,0.67)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||300||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Green||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(28,143,7,0.67)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||250||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Red||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,5,22,0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||350||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Pink||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,71,209,1.00)||#|| OxiAddonsgooglechart-bar-BC ||#||#ffffff||#|| oxiAddonsgooglechart-value ||#||100||#|| ||#||##OXIDATA##',
    'Style 7OXIIMPORTgoogle_chartOXIIMPORTstyle-7OXIIMPORToxi-addons-preview-BG ||OxiAddonsgooglechart-G-MW |600|600|600|OxiAddonsgooglechart-G-P-top |20|20|20|OxiAddonsgooglechart-G-P-bottom |20|20|20|OxiAddonsgooglechart-G-P-left |20|20|20|OxiAddonsgooglechart-G-P-right |20|20|20|OxiAddonsgooglechart-B-W |600|600|600|OxiAddonsgooglechart-B-H |450|450|450|OxiAddonsgooglechart-OFF-FS |14|14|14| OxiAddonsgooglechart-OFF-C |#0fb1d1| |||||| |||||||||||||||| OxiAddonsgooglechart-G-Animation||2|0//|| |||| || |||| || OxiAddonsgooglechart-TT-BG |rgba(21, 157, 230, 0.77)| OxiAddonsgooglechart-TLT-C |#ffffff|OxiAddonsgooglechart-TLT-FS |14|14|14| OxiAddonsgooglechart-TBT-C |#ffffff|OxiAddonsgooglechart-TBT-FS |12|12|12|OxiAddonsgooglechart-CB-BW |2|2|2|| OxiAddonsgooglechart-G-CBG |rgba(16,155,230,0.39)|OxiAddonsgooglechart-G-BW |2|2|2| OxiAddonsgooglechart-G-BC |#0f80bd|||#|| OxiAddonsgooglechart-OFF-I ||#||Colors||#|| ||#||##OXISTYLE##||#||OxiAddonsgooglechart-text ||#||Blue||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(57,179,240,0.00)||#|| OxiAddonsgooglechart-bar-BC ||#||#05a7f2||#|| oxiAddonsgooglechart-value ||#||16||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Pink||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(242, 27, 199, 0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#f21bc7||#|| oxiAddonsgooglechart-value ||#||10||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Yellow||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(226,242,0,0.59)||#|| OxiAddonsgooglechart-bar-BC ||#||#cde303||#|| oxiAddonsgooglechart-value ||#||14||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Orange||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(240,138,22,0.63)||#|| OxiAddonsgooglechart-bar-BC ||#||#e6810e||#|| oxiAddonsgooglechart-value ||#||4||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Red||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(255,0,0,0.57)||#|| OxiAddonsgooglechart-bar-BC ||#||#ff0000||#|| oxiAddonsgooglechart-value ||#||14||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Green||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(46,240,12,0.61)||#|| OxiAddonsgooglechart-bar-BC ||#||#27c40c||#|| oxiAddonsgooglechart-value ||#||13||#|| ||#||##OXIDATA##||#||OxiAddonsgooglechart-text ||#||Purple||#|| OxiAddonsgooglechart-bar-BGC ||#||rgba(131,7,184,0.46)||#|| OxiAddonsgooglechart-bar-BC ||#||#8307b8||#|| oxiAddonsgooglechart-value ||#||14||#|| ||#||##OXIDATA##',

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
