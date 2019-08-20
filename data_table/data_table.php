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
    'style 01OXIIMPORTdata_tableOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG ||OxiAddonsDataTable-G-BG||||OxiAddonsDataTable-G-W |1100|1100|1100|OxiAddonsDataTable-G-BR-top |0|0|0|OxiAddonsDataTable-G-BR-bottom |0|0|0|OxiAddonsDataTable-G-BR-left |0|0|0|OxiAddonsDataTable-G-BR-right |0|0|0|OxiAddonsDataTable-G-Padding-top |5|5|5|OxiAddonsDataTable-G-Padding-bottom |5|5|5|OxiAddonsDataTable-G-Padding-left |5|5|5|OxiAddonsDataTable-G-Padding-right |5|5|5|OxiAddonsDataTable-G-BS |rgba(94, 94, 94, 1)|0|0|0|0|OxiAddonsDataTable-TH-FS |16|16|16| OxiAddonsDataTable-TH-C |#ffffff| OxiAddonsDataTable-TH-BG |rgba(79, 173, 255, 1)|OxiAddonsDataTable-TH-F-family |Bree Serif|100|OxiAddonsDataTable-TH-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsDataTable-TH-P-top |12|12|12|OxiAddonsDataTable-TH-P-bottom |12|12|12|OxiAddonsDataTable-TH-P-left |5|5|5|OxiAddonsDataTable-TH-P-right |5|5|5| OxiAddonsDataTable-TH-AI-I |f30c|OxiAddonsDataTable-TH-AI-FS |20|20|20| OxiAddonsDataTable-TH-AI-C |#ffffff| ||OxiAddonsDataTable-TH-AI-P-top |0|0|0|OxiAddonsDataTable-TH-AI-P-bottom |0|0|0|OxiAddonsDataTable-TH-AI-P-left |0|0|0|OxiAddonsDataTable-TH-AI-P-right |0|0|0| OxiAddonsDataTable-TH-DI-I |f309|OxiAddonsDataTable-TH-DI-FS |20|20|20| OxiAddonsDataTable-TH-DI-C |#ffffff| ||OxiAddonsDataTable-TH-DI-P-top |0|0|0|OxiAddonsDataTable-TH-DI-P-bottom |0|0|0|OxiAddonsDataTable-TH-DI-P-left |0|0|0|OxiAddonsDataTable-TH-DI-P-right |0|0|0|OxiAddonsDataTable-TB-FS |16|16|16| ||OxiAddonsDataTable-TB-F-family |Ubuntu|100|OxiAddonsDataTable-TB-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsDataTable-TB-P-top |12|12|12|OxiAddonsDataTable-TB-P-bottom |10|10|10|OxiAddonsDataTable-TB-P-left |8|8|8|OxiAddonsDataTable-TB-P-right |8|8|8| OxiAddonsDataTable-TB-even-BG |rgba(75, 166, 164, 1)| OxiAddonsDataTable-TB-odd-BG |rgba(83,181,184,1.00)| OxiAddonsDataTable-SE |true|OxiAddonsDataTable-SE-FS |16|16|16| OxiAddonsDataTable-SE-C |#737373|OxiAddonsDataTable-SE-F-family |Bree Serif|100|OxiAddonsDataTable-SE-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsDataTable-SE-P-top |0|0|0|OxiAddonsDataTable-SE-P-bottom |0|0|0|OxiAddonsDataTable-SE-P-left |15|15|15|OxiAddonsDataTable-SE-P-right |15|15|15| OxiAddonsDataTable-SE-SB-I |f0dd|OxiAddonsDataTable-SE-SB-W |80|80|80|OxiAddonsDataTable-SE-SB-H |30|30|30|OxiAddonsDataTable-SE-SB-FS |16|16|16| OxiAddonsDataTable-SE-SB-C |#949494| OxiAddonsDataTable-SE-SB-BG |rgba(255,255,255,1.00)|OxiAddonsDataTable-SE-SB-B |1|solid|| OxiAddonsDataTable-SE-SB-BC |#f2f2f2|OxiAddonsDataTable-SE-SBP-top |5|5|5|OxiAddonsDataTable-SE-SBP-bottom |5|5|5|OxiAddonsDataTable-SE-SBP-left |5|5|5|OxiAddonsDataTable-SE-SBP-right |5|5|5| OxiAddonsDataTable-PDF |true| OxiAddonsDataTable-EXCEL |true| OxiAddonsDataTable-COPY |true| OxiAddonsDataTable-PRINT |true| OxiAddonsDataTable-CSV |true|OxiAddonsDataTable-B-FS |16|16|16| OxiAddonsDataTable-B-TC |#4a4a4a| OxiAddonsDataTable-B-BG |rgba(252,252,252,1.00)|OxiAddonsDataTable-B-B |1|solid|| OxiAddonsDataTable-B-BC |#d9d9d9|OxiAddonsDataTable-B-F-family |Bree Serif|100|OxiAddonsDataTable-B-F-style |normal:1.3|center:0()0()0()#ffffff:|OxiAddonsDataTable-B-BR-top |5|5|5|OxiAddonsDataTable-B-BR-bottom |5|5|5|OxiAddonsDataTable-B-BR-left |5|5|5|OxiAddonsDataTable-B-BR-right |5|5|5| OxiAddonsDataTable-B-HTC |#f7f7f7| OxiAddonsDataTable-B-HBG |rgba(90,186,189,1.00)| OxiAddonsDataTable-B-HBC |#76b4bf| OxiAddonsDataTable-SB |true|OxiAddonsDataTable-SB-FS |16|16|16| OxiAddonsDataTable-SB-C |#6e6e6e|OxiAddonsDataTable-SB-F-family |Bree Serif|100|OxiAddonsDataTable-SB-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsDataTable-SB-P-top |0|0|0|OxiAddonsDataTable-SB-P-bottom |20|20|20|OxiAddonsDataTable-SB-P-left |0|0|0|OxiAddonsDataTable-SB-P-right |0|0|0|OxiAddonsDataTable-input-W |150|150|150|OxiAddonsDataTable-input-H |30|30|30|OxiAddonsDataTable-input-FS |16|16|16| OxiAddonsDataTable-input-C |#9e9e9e| OxiAddonsDataTable-input-BG |rgba(252,252,252,1.00)|OxiAddonsDataTable-input-B |1|solid|| OxiAddonsDataTable-input-BC |#e3e3e3|OxiAddonsDataTable-input-P-top |5|5|5|OxiAddonsDataTable-input-P-bottom |5|5|5|OxiAddonsDataTable-input-P-left |5|5|5|OxiAddonsDataTable-input-P-right |5|5|5|OxiAddonsDataTable-input-BS |rgba(115, 115, 115, 1)|0|0|0|0| OxiAddonsDataTable-SED |true|OxiAddonsDataTable-SED-FS |16|16|16| OxiAddonsDataTable-SED-C |#6ea7f5|OxiAddonsDataTable-SED-F-family |Bree Serif|100|OxiAddonsDataTable-SED-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsDataTable-SED-P-top |0|0|0|OxiAddonsDataTable-SED-P-bottom |0|0|0|OxiAddonsDataTable-SED-P-left |0|0|0|OxiAddonsDataTable-SED-P-right |0|0|0| OxiAddonsDataTable-PN |true|OxiAddonsDataTable-PN-FS |16|16|16| OxiAddonsDataTable-PN-C |#828282|OxiAddonsDataTable-PN-F-family |Bree Serif|100|OxiAddonsDataTable-PN-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsDataTable-PN-P-top |0|0|0|OxiAddonsDataTable-PN-P-bottom |0|0|0|OxiAddonsDataTable-PN-P-left |10|10|10|OxiAddonsDataTable-PN-P-right |10|10|10|OxiAddonsDataTable-PN-B-FS |16|16|16| OxiAddonsDataTable-PN-B-TC |#969696| OxiAddonsDataTable-PN-B-BG |rgba(245,245,245,1.00)|OxiAddonsDataTable-PN-B-B |0|solid|| OxiAddonsDataTable-PN-B-BC |#8a8a8a|OxiAddonsDataTable-PN-B-F-family |Bree Serif|100|OxiAddonsDataTable-PN-B-F-style |normal:1.3|left:0()0()0()#ffffff:|OxiAddonsDataTable-PN-B-BR-top |5|5|5|OxiAddonsDataTable-PN-B-BR-bottom |5|5|5|OxiAddonsDataTable-PN-B-BR-left |5|5|5|OxiAddonsDataTable-PN-B-BR-right |5|5|5| OxiAddonsDataTable-PN-Active |rgba(79, 173, 255, 1)| OxiAddonsDataTable-PN-HTC |#ffffff| OxiAddonsDataTable-PN-HBG |rgba(70,149,227,1.00)| OxiAddonsDataTable-PN-HBC |#ffffff| OxiAddonsDataTable-icon-type-select |solid|OxiAddonsDataTable-B-P-top |5|5|5|OxiAddonsDataTable-B-P-bottom |5|5|5|OxiAddonsDataTable-B-P-left |15|15|15|OxiAddonsDataTable-B-P-right |15|15|15|OxiAddonsDataTable-B-M-top |0|0|0|OxiAddonsDataTable-B-M-bottom |5|5|5|OxiAddonsDataTable-B-M-left |0|0|0|OxiAddonsDataTable-B-M-right |0|0|0|OxiAddonsDataTable-PN-B-P-top |8|8|8|OxiAddonsDataTable-PN-B-P-bottom |8|8|8|OxiAddonsDataTable-PN-B-P-left |20|20|20|OxiAddonsDataTable-PN-B-P-right |20|20|20|OxiAddonsDataTable-PN-B-M-top |15|15|15|OxiAddonsDataTable-PN-B-M-bottom |0|0|0|OxiAddonsDataTable-PN-B-M-left |2|2|2|OxiAddonsDataTable-PN-B-M-right |2|2|2| OxiAddonsDataTable-PN-H-Active-c |#ffffff| OxiAddonsDataTable-PN-H-Active |rgba(72,149,166,1.00)| OxiAddonsDataTable-PN-Active-c |#ffffff| || OxiAddonsDataTable-icon-show |5| OxiAddonsDataTable-TH-B-left-W |0| OxiAddonsDataTable-TH-B-right-W |1| OxiAddonsDataTable-TH-B-top-W |1| OxiAddonsDataTable-TH-B-bottom-W |0|OxiAddonsDataTable-TH-B |none|#cfcfcf| OxiAddonsDataTable-TB-B-left-W |0| OxiAddonsDataTable-TB-B-right-W |1| OxiAddonsDataTable-TB-B-top-W |1| OxiAddonsDataTable-TB-B-bottom-W |0|OxiAddonsDataTable-TB-B |solid|#60a6a8| OxiAddonsDataTable-TB-even-C |#ffffff| OxiAddonsDataTable-TB-odd-C |#ffffff| OxiAddonsDataTable-TH-ASC-DESC |true|||#||OxiAddPR-TC-Serial-cat||#||ID{{}}Name{{}}Phone{{}}Address{{}}Date||#|||##OXISTYLE##oxi-STCR-ID000{{||}}1{{}}oxi-STCR-Name000{{||}}Bradley{{}}oxi-STCR-Email000{{||}}oal99e@myglockner.com{{}}oxi-STCR-Phone000{{||}}202-555-0133{{}}oxi-STCR-Address000{{||}}2896 Counts Lane{{}}oxi-STCR-Date000{{||}}20-03-2019{{}}##OXIDATA##oxi-STCR-ID000{{||}}2{{}}oxi-STCR-Name000{{||}}Murphy{{}}oxi-STCR-Email000{{||}}oal99e@catchonline.ooo{{}}oxi-STCR-Phone000{{||}}+1-202-555-0133{{}}oxi-STCR-Address000{{||}}3545 Marcus Street{{}}oxi-STCR-Date000{{||}}25-03-2019{{}}##OXIDATA##oxi-STCR-ID000{{||}}3{{}}oxi-STCR-Name000{{||}}Jeri J Cardoza{{}}oxi-STCR-Email000{{||}}zll33000jo@thrubay.com{{}}oxi-STCR-Phone000{{||}}2939 Barrington Court{{}}oxi-STCR-Address000{{||}}2939 Barrington Court{{}}oxi-STCR-Date000{{||}}30-03-2019{{}}##OXIDATA##oxi-STCR-ID000{{||}}4{{}}oxi-STCR-Name000{{||}}John M Butkovich{{}}oxi-STCR-Email000{{||}}2ffn1mivsii@iffymedia.com{{}}oxi-STCR-Phone000{{||}}352-266-4128{{}}oxi-STCR-Address000{{||}}2443 Drainer Avenue{{}}oxi-STCR-Date000{{||}}31-03-2019{{}}##OXIDATA##oxi-STCR-ID000{{||}}5{{}}oxi-STCR-Name000{{||}}William W Polzin{{}}oxi-STCR-Email000{{||}}tpu5q10sgc@thrubay.com{{}}oxi-STCR-Phone000{{||}}419-771-6917{{}}oxi-STCR-Address000{{||}}1029 Broaddus Avenue{{}}oxi-STCR-Date000{{||}}05-03-2019{{}}##OXIDATA##oxi-STCR-ID000{{||}}6{{}}oxi-STCR-Name000{{||}}Elaine S Toney{{}}oxi-STCR-Email000{{||}}ceq7vqp8cvp@payspun.com{{}}oxi-STCR-Phone000{{||}}225-447-0676{{}}oxi-STCR-Address000{{||}}3882 Big Indian{{}}oxi-STCR-Date000{{||}}01-03-2019{{}}##OXIDATA##oxi-STCR-ID000{{||}}7{{}}oxi-STCR-Name000{{||}}Willie V Davis{{}}oxi-STCR-Email000{{||}}r3r31ib68g@payspun.com{{}}oxi-STCR-Phone000{{||}}956-760-7339{{}}oxi-STCR-Address000{{||}}3740 Carolina Avenue{{}}oxi-STCR-Date000{{||}}02-03-2019{{}}##OXIDATA##oxi-STCR-ID000{{||}}8{{}}oxi-STCR-Name000{{||}}Claudette T Palmer{{}}oxi-STCR-Email000{{||}}mmgbz521d3n@payspun.com{{}}oxi-STCR-Phone000{{||}}304-991-9958{{}}oxi-STCR-Address000{{||}}2750 Timbercrest Road{{}}oxi-STCR-Date000{{||}}06-03-2019{{}}##OXIDATA##oxi-STCR-ID000{{||}}9{{}}oxi-STCR-Name000{{||}}Jeannine D Ochoa{{}}oxi-STCR-Email000{{||}}rlw07ok11q@iffymedia.com{{}}oxi-STCR-Phone000{{||}}469-960-4704{{}}oxi-STCR-Address000{{||}}3272 Wilson Avenue{{}}oxi-STCR-Date000{{||}}09-03-2019{{}}##OXIDATA##oxi-STCR-ID000{{||}}10{{}}oxi-STCR-Name000{{||}}David D Avalos{{}}oxi-STCR-Email000{{||}}bz7h19bsrjl@claimab.com{{}}oxi-STCR-Phone000{{||}}714-725-8485{{}}oxi-STCR-Address000{{||}}1245 Hidden Valley Road{{}}oxi-STCR-Date000{{||}}10-04-2019{{}}##OXIDATA##',
    'Data table 2OXIIMPORTdata_tableOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG ||OxiAddonsDataTable-G-BG|rgba(255,255,255,1.00)|||OxiAddonsDataTable-G-W |1050|1050|1050|OxiAddonsDataTable-G-BR-top |0|0|0|OxiAddonsDataTable-G-BR-bottom |0|0|0|OxiAddonsDataTable-G-BR-left |0|0|0|OxiAddonsDataTable-G-BR-right |0|0|0|OxiAddonsDataTable-G-Padding-top |10|10|10|OxiAddonsDataTable-G-Padding-bottom |10|10|10|OxiAddonsDataTable-G-Padding-left |10|10|10|OxiAddonsDataTable-G-Padding-right |10|10|10|OxiAddonsDataTable-G-BS |rgba(94, 94, 94, 1)|0|0|0|0|OxiAddonsDataTable-TH-FS |16|16|16| OxiAddonsDataTable-TH-C |#ffffff| OxiAddonsDataTable-TH-BG |rgba(60, 142, 186, 1)|OxiAddonsDataTable-TH-F-family |Bree Serif|100|OxiAddonsDataTable-TH-F-style |normal:1.3|center:0()0()0()#ffffff|OxiAddonsDataTable-TH-P-top |20|20|20|OxiAddonsDataTable-TH-P-bottom |20|20|20|OxiAddonsDataTable-TH-P-left |5|5|5|OxiAddonsDataTable-TH-P-right |5|5|5| OxiAddonsDataTable-TH-AI-I |f30c|OxiAddonsDataTable-TH-AI-FS |16|16|16| OxiAddonsDataTable-TH-AI-C |#ffffff| ||OxiAddonsDataTable-TH-AI-P-top |0|0|0|OxiAddonsDataTable-TH-AI-P-bottom |0|0|0|OxiAddonsDataTable-TH-AI-P-left |0|0|0|OxiAddonsDataTable-TH-AI-P-right |0|0|0| OxiAddonsDataTable-TH-DI-I |f309|OxiAddonsDataTable-TH-DI-FS |16|16|16| OxiAddonsDataTable-TH-DI-C |#ffffff| ||OxiAddonsDataTable-TH-DI-P-top |0|0|0|OxiAddonsDataTable-TH-DI-P-bottom |0|0|0|OxiAddonsDataTable-TH-DI-P-left |0|0|0|OxiAddonsDataTable-TH-DI-P-right |0|0|0|OxiAddonsDataTable-TB-FS |16|16|16| ||OxiAddonsDataTable-TB-F-family |Open+Sans|100|OxiAddonsDataTable-TB-F-style |normal:1.3|center:0()0()0()#ffffff|OxiAddonsDataTable-TB-P-top |6|6|6|OxiAddonsDataTable-TB-P-bottom |6|6|6|OxiAddonsDataTable-TB-P-left |8|8|8|OxiAddonsDataTable-TB-P-right |8|8|8| OxiAddonsDataTable-TB-even-BG |rgba(255,255,255,1.00)| OxiAddonsDataTable-TB-odd-BG |rgba(250,250,250,1.00)| OxiAddonsDataTable-SE |false|OxiAddonsDataTable-SE-FS |16|16|16| OxiAddonsDataTable-SE-C |#737373|OxiAddonsDataTable-SE-F-family |Open+Sans|100|OxiAddonsDataTable-SE-F-style |normal:1.3|left:0()0()0()#ffffff|OxiAddonsDataTable-SE-P-top |0|0|0|OxiAddonsDataTable-SE-P-bottom |0|0|0|OxiAddonsDataTable-SE-P-left |15|15|15|OxiAddonsDataTable-SE-P-right |15|15|15| OxiAddonsDataTable-SE-SB-I |f0dd|OxiAddonsDataTable-SE-SB-W |100|100|100|OxiAddonsDataTable-SE-SB-H |25|25|25|OxiAddonsDataTable-SE-SB-FS |16|16|16| OxiAddonsDataTable-SE-SB-C |#949494| OxiAddonsDataTable-SE-SB-BG |rgba(255,255,255,1.00)|OxiAddonsDataTable-SE-SB-B |1|solid|| OxiAddonsDataTable-SE-SB-BC |#f2f2f2|OxiAddonsDataTable-SE-SBP-top |0|0|0|OxiAddonsDataTable-SE-SBP-bottom |0|0|0|OxiAddonsDataTable-SE-SBP-left |0|0|0|OxiAddonsDataTable-SE-SBP-right |0|0|0| OxiAddonsDataTable-PDF |false| OxiAddonsDataTable-EXCEL |false| OxiAddonsDataTable-COPY |false| OxiAddonsDataTable-PRINT |false| OxiAddonsDataTable-CSV |false|OxiAddonsDataTable-B-FS |16|16|16| OxiAddonsDataTable-B-TC |#4a4a4a| OxiAddonsDataTable-B-BG |rgba(252,252,252,1.00)|OxiAddonsDataTable-B-B |1|solid|| OxiAddonsDataTable-B-BC |#d9d9d9|OxiAddonsDataTable-B-F-family |Crate+Round|100|OxiAddonsDataTable-B-F-style |normal:1.3|center:0()0()0()#ffffff|OxiAddonsDataTable-B-BR-top |5|5|5|OxiAddonsDataTable-B-BR-bottom |5|5|5|OxiAddonsDataTable-B-BR-left |5|5|5|OxiAddonsDataTable-B-BR-right |5|5|5| OxiAddonsDataTable-B-HTC |#f7f7f7| OxiAddonsDataTable-B-HBG |rgba(90,186,189,1.00)| OxiAddonsDataTable-B-HBC |#76b4bf| OxiAddonsDataTable-SB |false|OxiAddonsDataTable-SB-FS |16|16|16| OxiAddonsDataTable-SB-C |#6e6e6e|OxiAddonsDataTable-SB-F-family |Crate+Round|100|OxiAddonsDataTable-SB-F-style |normal:1.3|left:0()0()0()#ffffff|OxiAddonsDataTable-SB-P-top |0|0|0|OxiAddonsDataTable-SB-P-bottom |0|0|0|OxiAddonsDataTable-SB-P-left |0|0|0|OxiAddonsDataTable-SB-P-right |0|0|0|OxiAddonsDataTable-input-W |150|150|150|OxiAddonsDataTable-input-H |25|25|25|OxiAddonsDataTable-input-FS |16|16|16| OxiAddonsDataTable-input-C |#9e9e9e| OxiAddonsDataTable-input-BG |rgba(252,252,252,1.00)|OxiAddonsDataTable-input-B |1|solid|| OxiAddonsDataTable-input-BC |#e3e3e3|OxiAddonsDataTable-input-P-top |5|5|5|OxiAddonsDataTable-input-P-bottom |5|5|5|OxiAddonsDataTable-input-P-left |5|5|5|OxiAddonsDataTable-input-P-right |5|5|5|OxiAddonsDataTable-input-BS |rgba(115, 115, 115, 1)|0|0|0|0| OxiAddonsDataTable-SED |false|OxiAddonsDataTable-SED-FS |16|16|16| OxiAddonsDataTable-SED-C |#919191|OxiAddonsDataTable-SED-F-family |Open+Sans|100|OxiAddonsDataTable-SED-F-style |normal:1.3|left:0()0()0()#ffffff|OxiAddonsDataTable-SED-P-top |0|0|0|OxiAddonsDataTable-SED-P-bottom |0|0|0|OxiAddonsDataTable-SED-P-left |0|0|0|OxiAddonsDataTable-SED-P-right |0|0|0| OxiAddonsDataTable-PN |false|OxiAddonsDataTable-PN-FS |16|16|16| OxiAddonsDataTable-PN-C |#828282|OxiAddonsDataTable-PN-F-family |Crate+Round|100|OxiAddonsDataTable-PN-F-style |normal:1.3|left:0()0()0()#ffffff|OxiAddonsDataTable-PN-P-top |3|3|3|OxiAddonsDataTable-PN-P-bottom |3|3|3|OxiAddonsDataTable-PN-P-left |3|3|3|OxiAddonsDataTable-PN-P-right |3|3|3|OxiAddonsDataTable-PN-B-FS |16|16|16| OxiAddonsDataTable-PN-B-TC |#969696| OxiAddonsDataTable-PN-B-BG |rgba(242,242,242,1.00)|OxiAddonsDataTable-PN-B-B |0|solid|| OxiAddonsDataTable-PN-B-BC |#8a8a8a|OxiAddonsDataTable-PN-B-F-family |Open+Sans|100|OxiAddonsDataTable-PN-B-F-style |normal:1.3|left:0()0()0()#ffffff|OxiAddonsDataTable-PN-B-BR-top |2|2|2|OxiAddonsDataTable-PN-B-BR-bottom |2|2|2|OxiAddonsDataTable-PN-B-BR-left |2|2|2|OxiAddonsDataTable-PN-B-BR-right |2|2|2| OxiAddonsDataTable-PN-Active |rgba(60, 142, 186, 1)| OxiAddonsDataTable-PN-HTC |#ffffff| OxiAddonsDataTable-PN-HBG |rgba(67,160,217,1.00)| OxiAddonsDataTable-PN-HBC |#ffffff| OxiAddonsDataTable-icon-type-select |solid|OxiAddonsDataTable-B-P-top |5|5|5|OxiAddonsDataTable-B-P-bottom |5|5|5|OxiAddonsDataTable-B-P-left |15|15|15|OxiAddonsDataTable-B-P-right |15|15|15|OxiAddonsDataTable-B-M-top |0|0|0|OxiAddonsDataTable-B-M-bottom |5|5|5|OxiAddonsDataTable-B-M-left |0|0|0|OxiAddonsDataTable-B-M-right |0|0|0|OxiAddonsDataTable-PN-B-P-top |5|5|5|OxiAddonsDataTable-PN-B-P-bottom |5|5|5|OxiAddonsDataTable-PN-B-P-left |15|15|15|OxiAddonsDataTable-PN-B-P-right |15|15|15|OxiAddonsDataTable-PN-B-M-top |0|0|0|OxiAddonsDataTable-PN-B-M-bottom |0|0|0|OxiAddonsDataTable-PN-B-M-left |5|5|5|OxiAddonsDataTable-PN-B-M-right |5|5|5| OxiAddonsDataTable-PN-H-Active-c |#ffffff| OxiAddonsDataTable-PN-H-Active |rgba(72,149,166,1.00)| OxiAddonsDataTable-PN-Active-c |#ffffff| || OxiAddonsDataTable-icon-show |5| OxiAddonsDataTable-TH-B-left-W |0| OxiAddonsDataTable-TH-B-right-W |1| OxiAddonsDataTable-TH-B-top-W |1| OxiAddonsDataTable-TH-B-bottom-W |0|OxiAddonsDataTable-TH-B |solid|#7398c4| OxiAddonsDataTable-TB-B-left-W |1| OxiAddonsDataTable-TB-B-right-W |0| OxiAddonsDataTable-TB-B-top-W |1| OxiAddonsDataTable-TB-B-bottom-W |0|OxiAddonsDataTable-TB-B |solid|#ededed| OxiAddonsDataTable-TB-even-C |#4a4a4a| OxiAddonsDataTable-TB-odd-C |#595959| OxiAddonsDataTable-TH-ASC-DESC |true|OxiAddonsDataTable-TB-icon-f |||| OxiAddonsDataTable-TB-icon-color ||OxiAddonsDataTable-TB-width |100|100|100|OxiAddonsDataTable-TB-height |100|100|100| OxiAddonsDataTable-TB-height-type |false|||#||OxiAddPR-TC-Serial-cat||#||Avater{{}}Name{{}}Product{{}}Quantity{{}}Status||#|||##OXISTYLE##oxi-STCR-Avater000{{||}}image||type||https://www.oxilab.org/wp-content/uploads/2018/05/2.jpg||type||||type||{{}}oxi-STCR-Name000{{||}}name||type||||type||||type||Johan Due{{}}oxi-STCR-Product000{{||}}name||type||||type||||type||Iphone X{{}}oxi-STCR-Quantity000{{||}}name||type||||type||||type||10{{}}oxi-STCR-Status000{{||}}name||type||||type||||type||Active{{}}##OXIDATA##oxi-STCR-Avater000{{||}}image||type||https://www.oxilab.org/wp-content/uploads/2018/05/3.jpg||type||||type||{{}}oxi-STCR-Name000{{||}}name||type||||type||||type||Etta Lensar{{}}oxi-STCR-Product000{{||}}name||type||||type||||type||Sumsung{{}}oxi-STCR-Quantity000{{||}}name||type||||type||||type||20{{}}oxi-STCR-Status000{{||}}name||type||||type||||type||Inactive{{}}##OXIDATA##oxi-STCR-Avater000{{||}}image||type||https://www.oxilab.org/wp-content/uploads/2018/05/6.jpg||type||||type||{{}}oxi-STCR-Name000{{||}}name||type||||type||||type||Etta Buster{{}}oxi-STCR-Product000{{||}}name||type||||type||||type||HP- Monitor{{}}oxi-STCR-Quantity000{{||}}name||type||||type||||type||10{{}}oxi-STCR-Status000{{||}}name||type||||type||||type||Active{{}}##OXIDATA##',
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

