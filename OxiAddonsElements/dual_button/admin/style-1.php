<?php
if (!defined('ABSPATH'))
	exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';

if (!empty($_REQUEST['_wpnonce'])) {
	$nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
	if (!wp_verify_nonce($nonce, 'oxi-addons-button-nonce')) {
		die('You do not have sufficient permissions to access this page.');
	} else {
		$data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
				.'oxi-addons-button-text-align |' . sanitize_text_field($_POST['oxi-addons-button-text-align']) . '|'
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-margin') . ''
				. '' . oxi_addons_adm_help_animation_senitize('oxi_addons-button-animation') . ''
				.'oxi_addons-button-left-opening |' . sanitize_text_field($_POST['oxi_addons-button-left-opening']) . '|'
				.'oxi_addons-button-Right-opening |' . sanitize_text_field($_POST['oxi_addons-button-Right-opening']) . '|'
				. '' . oxi_addons_adm_help_single_size('oxi_addons-button-left-font-size') . ''
				. ' oxi_addons-button-left-color |' . sanitize_hex_color($_POST['oxi_addons-button-left-color']) . '|'
				. ' oxi_addons-button-left-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-left-bg-color']) . '|'
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-left-border-size') . ''
				.OxiAddonsADMHelpBorderSanitize('oxi-addons-button-left-border').'|'
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-left-border-radius') . ''
				. '' . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-button-left-f') . ''
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-left-padding') . ''
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-left-margin') . ''
				. 'oxi_addons-button-left-hover-color |' . sanitize_hex_color($_POST['oxi_addons-button-left-hover-color']) . '|'
				. ' oxi_addons-button-left-hover-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-left-hover-bg-color']) . '|'
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-left-hover-border-size') . ''
				.OxiAddonsADMHelpBorderSanitize('oxi-addons-button-left-hover-border').'|'
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-left-hover-border-radius') . ''
				. 'oxi_addons-button-left-icon-color |' . sanitize_hex_color($_POST['oxi_addons-button-left-icon-color']) . '|'
				. '' . oxi_addons_adm_help_single_size('oxi_addons-button-left-icon-size') . ''
				.'oxi_addons-button-left-icon-position |' . sanitize_text_field($_POST['oxi_addons-button-left-icon-position']) . '|'
				. 'oxi_addons-button-left-icon-h-color |' . sanitize_hex_color($_POST['oxi_addons-button-left-icon-h-color']) . '|'
				
				. '' . oxi_addons_adm_help_single_size('oxi_addons-button-Right-font-size') . ''
				. ' oxi_addons-button-Right-color |' . sanitize_hex_color($_POST['oxi_addons-button-Right-color']) . '|'
				. ' oxi_addons-button-Right-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-Right-bg-color']) . '|'
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-Right-button-border-size') . ''
				.OxiAddonsADMHelpBorderSanitize('oxi-addons-button-Right-border').'|'
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-Right-border-radius') . ''
				. '' . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-button-Right-f') . ''
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-Right-padding') . ''
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-Right-margin') . ''
				. 'oxi_addons-button-Right-hover-color |' . sanitize_hex_color($_POST['oxi_addons-button-Right-hover-color']) . '|'
				. ' oxi_addons-button-Right-hover-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-Right-hover-bg-color']) . '|'
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-Right-hover-border-size') . ''
				.OxiAddonsADMHelpBorderSanitize('oxi-addons-button-Right-hover-border').'|'
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-Right-hover-border-radius') . ''
				. 'oxi_addons-button-Right-icon-color |' . sanitize_hex_color($_POST['oxi_addons-button-Right-icon-color']) . '|'
				. '' . oxi_addons_adm_help_single_size('oxi_addons-button-Right-icon-size') . ''
				.'oxi_addons-button-Right-icon-position |' . sanitize_text_field($_POST['oxi_addons-button-Right-icon-position']) . '|'
				. 'oxi_addons-button-Right-icon-h-color |' . sanitize_hex_color($_POST['oxi_addons-button-Right-icon-h-color']) . '|'
				. '' . oxi_addons_adm_help_single_size('oxi_addons-button-middle-font-size') . ''
				. 'oxi_addons-button-middle-color |' . sanitize_hex_color($_POST['oxi_addons-button-middle-color']) . '|'
				. 'oxi_addons-button-middle-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-middle-bg-color']) . '|'
				. '' . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-button-middle-f') . ''
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-middle-padding') . ''
				. '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-middle-border-radius') . ''
				. '||||'
				. '' . oxi_addons_adm_help_single_size('oxi_addons-button-max-width') . ''
				. 'oxi-middle-icon |' . sanitize_text_field($_POST['oxi-middle-icon']) . '|'
				. '||#||  ||#||'
				. 'oxi_addons-button-left-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-left-text']) . '||#||'
				. 'oxi_addons-button-Right-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-Right-text']) . '||#||'
				. 'oxi_addons-button-middle-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-middle-text']) . '||#||'
				. 'oxi_addons-button-left-icon ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi_addons-button-left-icon']) . '||#||'
				. 'oxi_addons-button-Right-icon ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['oxi_addons-button-Right-icon']) . '||#||'
				. 'oxi_addons-button-left-id ||#||' . sanitize_text_field($_POST['oxi_addons-button-left-id']) . '||#||'
				. 'oxi_addons-button-Right-id ||#||' . sanitize_text_field($_POST['oxi_addons-button-Right-id']) . '||#||'
				. 'oxi_addons-button-left-link ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons-button-left-link']) . '||#||'
				. 'oxi_addons-button-Right-link ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons-button-Right-link']) . '||#||'
				.'||#||'
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
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
										echo oxi_addons_adm_help_Text_Align('oxi-addons-button-text-align', $styledata[3], 'Button Align', 'Set Your Button Alignment', 'false','.oxi-addons-align-' . $oxiid . '','text-align');
										echo oxi_addons_adm_help_padding_margin('oxi-addons-button-margin', 5, $styledata, 1, 'Margin', 'Customize button margin either Easy or Advance mode', 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group', 'margin');
									    echo oxi_addons_adm_help_number_dtm('oxi_addons-button-max-width', $styledata[343], $styledata[344], $styledata[345], 1, 'Max Width', 'Customize the button Max-width with Responsive Size', 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group', 'max-width');
                                       	?>
                                    </div>
                                </div>
								<div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
										echo oxi_addons_adm_help_Animation('oxi_addons-button-animation', 21, $styledata, 'true', '.oxi-button-' . $oxiid . '' );
										?>
                                    </div>
                                </div>

								<div class="oxi-addons-content-div">
                                    <div class="oxi-head">
										Button Left 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
										echo oxi_addons_adm_help_textbox('oxi_addons-button-left-text', $stylefiles[3], 'Button Left Text', 'Write the text for the button left here', 'false', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1)');
										echo oxi_addons_adm_help_textbox('oxi_addons-button-left-icon', $stylefiles[9], 'Button Left Icon Class', 'Add Your Button Left Icon Class from Font Awesome Library', 'true');
										echo oxi_addons_adm_help_textbox('oxi_addons-button-left-id', $stylefiles[13], 'Button Left ID', 'If you want to add CSS ID, write down here', 'true');
										echo oxi_addons_adm_help_textbox('oxi_addons-button-left-link', $stylefiles[17], 'Button Left Link', 'Add link/URL to link your left button'), '';
										echo oxi_addons_adm_help_true_false('oxi_addons-button-left-opening', $styledata[25], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Select the Button Left Link Opening type', 'true');
										?>
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
									<div class="oxi-head">
                                        Button Left Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
										echo oxi_addons_adm_help_number_dtm('oxi_addons-button-left-font-size', $styledata[29], $styledata[30], $styledata[31], 1, 'Font Size', 'Customize the Button Left font size, based on Pixels', '', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1)', 'font-size');
										echo oxi_addons_adm_help_MiniColor('oxi_addons-button-left-color', $styledata[33], '', 'Color', 'Customize the Button Left active color', 'false', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1)', 'color');
										echo oxi_addons_adm_help_MiniColor('oxi_addons-button-left-bg-color', $styledata[35], 'rgba', 'Background Color', 'Customize the Button Left Active Background color, either in gradient or solid color mode', 'false', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1)', 'background');
										echo oxi_addons_adm_help_padding_margin('oxi-addons-button-left-border-size', 37, $styledata, 1, 'Border', 'Set your active button left Border with size and different style', 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1)', 'border-width');
										echo OxiAddonsADMhelpBorder('oxi-addons-button-left-border', 53, $styledata, 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1)','border-style');
										echo oxi_addons_adm_help_padding_margin('oxi-addons-button-left-border-radius', 57,$styledata, 1, 'Border Radius', 'Set border radius. 0 value for angular border, 50 for rounded', 'true','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1)','border-radius');
										echo OxiAddonsADMHelpFontSettings('oxi_addons-button-left-f', 73, $styledata, 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1)');
										echo oxi_addons_adm_help_padding_margin('oxi-addons-button-left-padding', 79, $styledata, 1, 'Padding', 'Set Your Left Button Padding Either Easy or Advance Mode', 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1)', 'padding');
								
										?>
                                    </div>

                                    <div class="oxi-head">
                                        Button Left Hover 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
										echo oxi_addons_adm_help_MiniColor('oxi_addons-button-left-hover-color', $styledata[111], '', ' Color', 'Customize the Button left Hover  color, either in gradient or solid color mode', 'false');
										echo oxi_addons_adm_help_MiniColor('oxi_addons-button-left-hover-bg-color', $styledata[113], 'rgba', 'Background Color', 'Customize the Button left Hover Background color, either in gradient or solid color mode', 'false', '  .oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1):hover', 'background');
										echo oxi_addons_adm_help_padding_margin('oxi-addons-button-left-hover-border-size', 115, $styledata, 1, 'Border', 'Set your button left Border with size and different style for hover view', 'true', '  .oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1):hover', 'border-width');
										echo OxiAddonsADMhelpBorder('oxi-addons-button-left-hover-border', 131, $styledata, 'true', '  .oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1):hover','border-style');
										echo oxi_addons_adm_help_padding_margin('oxi-addons-button-left-hover-border-radius', 135,$styledata, 1, 'Border Radius', 'Set border radius for hover view. 0 value for angular border, 50 for rounded', 'true','  .oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1):hover','border-radius');
										?>
                                    </div> 
                                </div>   
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button Left Icon 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
										echo oxi_addons_adm_help_MiniColor('oxi_addons-button-left-icon-color', $styledata[151], '', 'Color', 'Select Your Icon Color', '', ' .oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1) .oxi-left-icon .oxi-icons ', 'color');
										echo oxi_addons_adm_help_number_dtm('oxi_addons-button-left-icon-size', $styledata[153], $styledata[154], $styledata[155], 1, 'Icon Size', 'Your Button Icon Size', '', ' .oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1) .oxi-left-icon .oxi-icons ', 'font-size');
										echo oxi_addons_adm_help_true_false('oxi_addons-button-left-icon-position', $styledata[157], 'Left', 'left', 'Right', 'right', 'Button Icon Position', 'Set Your Button Icon Position', 'true');
										echo oxi_addons_adm_help_padding_margin('oxi-addons-button-left-margin', 95, $styledata, 1, 'Padding', 'Set Your Left Button Icon Padding', 'true','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1) .oxi-left-icon .oxi-icons ','padding');
										?>
                                    </div>                                                
                                    <div class="oxi-head">
                                        Button Left Hover Icon 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
										echo oxi_addons_adm_help_MiniColor('oxi_addons-button-left-icon-h-color', $styledata[159], '', 'Color', 'Select Your Left Button Hover Icon Color', 'false','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(1):hover .oxi-icons','color');
										?>
                                    </div>                                                
                                </div>


                            </div>
                            <div class="oxi-addons-col-6" > 
								<div class="oxi-addons-content-div" id="Middle_text">
                                    <div class="oxi-head">
										Middle Text
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
										echo oxi_addons_adm_help_true_false('oxi-middle-icon', $styledata[347], 'Icon', 'icon', 'Text', 'text','Text / Icon', 'Select The Middle Side Text / Icon', 'false');
										echo oxi_addons_adm_help_textbox('oxi_addons-button-middle-text', $stylefiles[7], 'Text / Icon Class', 'Write the text for the Button Middle Text / Icon Class', 'false','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group-before');			
										echo oxi_addons_adm_help_number_dtm('oxi_addons-button-middle-font-size', $styledata[293], $styledata[294], $styledata[295], 1, 'Font Size', 'Customize the Button Middle font size, based on Pixels', 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group-before', 'font-size');
										echo oxi_addons_adm_help_MiniColor('oxi_addons-button-middle-color', $styledata[297], '', 'Color', 'Customize the Button Middle active color', 'false', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group-before', 'color');
										echo oxi_addons_adm_help_MiniColor('oxi_addons-button-middle-bg-color',$styledata[299], 'rgba', 'Background Color', 'Customize the Button Middle Active Background color, either in gradient or solid color mode', 'false','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group-before','background');
										echo OxiAddonsADMHelpFontSettings('oxi_addons-button-middle-f',301, $styledata, 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group-before');
										echo oxi_addons_adm_help_padding_margin('oxi-addons-button-middle-padding', 307, $styledata, 1, 'Padding', 'Customize Button Middle Padding either Easy or Advance mode', 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group-before','padding');
										echo oxi_addons_adm_help_padding_margin('oxi-addons-button-middle-border-radius', 323, $styledata, 1, 'Border Radius', 'Customize Button Middle Border Radius either Easy or Advance mode', 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group-before','border-radius');
										?>
                                    </div>                                               
                                </div>
								
								<div class="oxi-addons-content-div">
                                    <div class="oxi-head">
										Button Right 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
										echo oxi_addons_adm_help_textbox('oxi_addons-button-Right-text', $stylefiles[5], 'Button Right Text', 'Write the text for the button Right here', 'false', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2)');
										echo oxi_addons_adm_help_textbox('oxi_addons-button-Right-icon', $stylefiles[11], 'Button Right Icon Class', 'Add Your Button Right Icon Class from Font Awesome Library', 'true');
										echo oxi_addons_adm_help_textbox('oxi_addons-button-Right-id', $stylefiles[15], 'Button Right ID', 'If you want to add CSS ID, write down here', 'true');
										echo oxi_addons_adm_help_textbox('oxi_addons-button-Right-link', $stylefiles[19], 'Button Right Link', 'Add link/URL to link your left button'), '';
										echo oxi_addons_adm_help_true_false('oxi_addons-button-Right-opening', $styledata[27], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Select the Button Right Link Opening type', 'true');
										?>
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
									<div class="oxi-head">
                                        Button Right Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
											echo oxi_addons_adm_help_number_dtm('oxi_addons-button-Right-font-size', $styledata[161], $styledata[162], $styledata[163], 1, 'Font Size', 'Customize the Button Right font size, based on Pixels', '', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2) ', 'font-size');
											echo oxi_addons_adm_help_MiniColor('oxi_addons-button-Right-color', $styledata[165], '', 'Color', 'Customize the Button Right active color', 'false', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2) ', 'color');
											echo oxi_addons_adm_help_MiniColor('oxi_addons-button-Right-bg-color', $styledata[167], 'rgba', 'Background Color', 'Customize the Button Right Active Background color, either in gradient or solid color mode', 'false', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2) ', 'background');
											echo oxi_addons_adm_help_padding_margin('oxi-addons-Right-button-border-size', 169, $styledata, 1, 'Border', 'Set your active button Right Border with size and different style', 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2) ', 'border-width');
											echo OxiAddonsADMhelpBorder('oxi-addons-button-Right-border', 185, $styledata, 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2) ','border-style');
											echo oxi_addons_adm_help_padding_margin('oxi-addons-button-Right-border-radius', 189,$styledata, 1, 'Border Radius', 'Set border radius. 0 value for angular border, 50 for rounded', 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2) ','border-radius');
											echo OxiAddonsADMHelpFontSettings('oxi_addons-button-Right-f', 205, $styledata, 'true',  '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2) ');
											echo oxi_addons_adm_help_padding_margin('oxi-addons-button-Right-padding', 211, $styledata, 1, 'Padding', 'Customize button Right padding either Easy or Advance mode', 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2) ','padding');
										?>
                                    </div>

                                    <div class="oxi-head">
                                        Button Right Hover 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
											echo oxi_addons_adm_help_MiniColor('oxi_addons-button-Right-hover-color', $styledata[243], '', 'Color', 'Customize the Button Right Hover color, either in gradient or solid color mode', 'false','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2):hover','color');
											echo oxi_addons_adm_help_MiniColor('oxi_addons-button-Right-hover-bg-color', $styledata[245], 'rgba', 'Background Color', 'Customize the Button Right Hover Background color, either in gradient or solid color mode', 'false','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2):hover','backgroud');
											echo oxi_addons_adm_help_padding_margin('oxi-addons-button-Right-hover-border-size', 247, $styledata, 1, 'Border', 'Set your button Right Border with size and different style for hover view', 'true','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2):hover','border-width');
											echo OxiAddonsADMhelpBorder('oxi-addons-button-Right-hover-border', 263, $styledata, 'true', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2):hover');
											echo oxi_addons_adm_help_padding_margin('oxi-addons-button-Right-hover-border-radius',267, $styledata, '1', 'Border Radius', 'Set Your Right Button Border Radius for hover view. 0 value for angular border, 50 for rounded', 'true','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2):hover', 'border-radius');
										?>
                                    </div> 
                                </div>   
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button Right Icon 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
											echo oxi_addons_adm_help_MiniColor('oxi_addons-button-Right-icon-color', $styledata[283], '', 'Color', 'Select Your Right Button Icon Color', '', ' .oxi-addons-container .oxi-button-' . $oxiid . ' .oxi-icons', 'color');
											echo oxi_addons_adm_help_number_dtm('oxi_addons-button-Right-icon-size', $styledata[285], $styledata[287], $styledata[289], 1, 'Icon Size', 'Your Right Button Icon Size', 'false', '.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2) .oxi-icons ', 'font-size');
											echo oxi_addons_adm_help_true_false('oxi_addons-button-Right-icon-position', $styledata[289], 'Left', 'left', 'Right', 'right', 'Button Icon Position', 'Set Your Right Button Icon Position', 'true');

											echo oxi_addons_adm_help_padding_margin('oxi-addons-button-Right-margin', 227, $styledata, 1, 'Padding', 'Set Your Right Button Icon Padding', 'true','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2) .oxi-icons','padding');
										?>
                                    </div>
									<div class="oxi-head">
                                        Button Right Hover Icon 
                                    </div>
                                    <div class="oxi-addons-content-div-body">
										<?php
											echo oxi_addons_adm_help_MiniColor('oxi_addons-button-Right-icon-h-color', $styledata[291], '', 'Color', 'Select Your Right Button Hover Icon Color', 'false','.oxi-button-' . $oxiid . ' .oxi-addons-btn-group > a:nth-of-type(2):hover .oxi-icons ','color');
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
							<?php wp_nonce_field("oxi-addons-button-nonce") ?>
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
