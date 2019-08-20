<?php
if (!defined('ABSPATH')) {
	exit;
}
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';
if (!empty($_REQUEST['_wpnonce'])) {
	$nonce = $_REQUEST['_wpnonce'];
}
$listid = '';
$listitemdata = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
	if (!wp_verify_nonce($nonce, 'oxi-addons-button-nonce')) {
		die('You do not have sufficient permissions to access this page.');
	} else {

		$data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
				. '||||||||||||||||'
				.	'||||'
				. '||||||||||||||||'
				. oxi_addons_adm_help_padding_margin_senitize('oxi-tt-content-margin')
				. OxiAddonsADMBoxShadowSanitize('oxi-tt-box-shadow')
				. '||'
				. '||'
				. '||||||||||||||||'
				. '||||||||||||||||'
				. '||||||||||||||||'
				. 'oxi-addons-tt-text-d |' . sanitize_text_field($_POST['oxi-addons-tt-text-d']) . '|'
				. 'oxi-tt-tooltip-color |' . sanitize_hex_color($_POST['oxi-tt-tooltip-color']) . '|'
				. oxi_addons_adm_help_padding_margin_senitize('oxi-tt-tooltip-padding')
				. oxi_addons_adm_help_number_dtm_senitize('oxi-tt-tooltip-font-size')
				. OxiAddonsADMHelpFontSettingsSanitize('oxi-tt-tooltip-font')
				. 'oxi-tt-tooltip-bg-color |' . sanitize_hex_color($_POST['oxi-tt-tooltip-bg-color']) . '|'
				. oxi_addons_adm_help_padding_margin_senitize('oxi-tt-tooltip-border-radius')
				. OxiAddonsADMHelpItemPerRowsSanitize('oxi-tt-rows')
				. oxi_addons_adm_help_padding_margin_senitize('oxi-tt-tooltip-margin')
				. 'oxi-tt-opening-tab |' . sanitize_text_field($_POST['oxi-tt-opening-tab']) . '|'
				. oxi_addons_adm_help_number_dtm_senitize('oxi-tt-max-width')
				. oxi_addons_adm_help_number_dtm_senitize('oxi-tt-tooltip-max-width')
				. '||#||'
		;

		$data = sanitize_text_field($data);
		$wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
	}
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
	if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
		die('You do not have sufficient permissions to access this page.');
	} else {
		$oxilistid = (int) $_POST['oxilistid'];
		$data = 'oxi-tt-bg-image ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-tt-bg-image']) . '||#|| '
				. 'oxi-tt-hover-text ||#||' . sanitize_text_field($_POST['oxi-tt-hover-text']) . '||#|| '
				.'oxi-tt-icon-link ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi-tt-icon-link']) . '||#|| ';
		$data = sanitize_text_field($data);
		if ($oxilistid > 0) {
			$wpdb->query($wpdb->prepare("UPDATE $table_list SET files = %s WHERE id = %d", $data, $oxilistid));
		} else {
			$wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files) VALUES (%d, %s, %s )", array($oxiid, 'oxi-addons', $data)));
		}
	}
}
if (!empty($_POST['OxiAddonsListFileDelete']) && is_numeric($_POST['oxi-item-id'])) {
	if (!wp_verify_nonce($nonce, 'OxiAddonsListFileDelete' . $oxitype . 'data')) {
		die('You do not have sufficient permissions to access this page.');
	} else {
		$item_id = (int) $_POST['oxi-item-id'];
		$wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
	}
}
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
//	echo 'asdfho';
	if (!wp_verify_nonce($nonce, 'OxiAddonsListFileEdit' . $oxitype . 'data')) {
		die('You do not have sufficient permissions to access this page.');
	} else {
		echo 'asdfho';
		$item_id = (int) $_POST['oxi-item-id'];
		$data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_list WHERE id = %d ", $item_id), ARRAY_A);
		$listitemdata = explode('||#||', $data['files']);
		$listid = $data['id'];
		
		echo '<script type="text/javascript"> jQuery(document).ready(function () {setTimeout(function() { jQuery("#oxi-addons-list-data-modal").modal("show")  }, 500); });</script>';
	}
}

OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
//echo '<pre>';
//print_r($styledata);
//echo '</pre>';
?>

<div class="wrap">
	<?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
	<div class="oxi-addons-wrapper">
		<div class="oxi-addons-row">
			<div class="oxi-addons-style-20-spacer"></div>
			<div class="oxi-addons-style-left">
				<form method="post" id="oxi-addons-form-submit">
					<div class="oxi-addons-style-settings">
                         
							<div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">

								<div class="oxi-addons-col-6">
									<div class="oxi-addons-content-div">
										<div class="oxi-head">
											General Settings
										</div>

										<div class="oxi-addons-content-div-body">
											<?php
											echo OxiAddonsADMHelpItemPerRows('oxi-tt-rows', $styledata, 161, 'false', '.oxi-addons-admin-edit-list');
											echo oxi_addons_adm_help_number_dtm('oxi-tt-max-width', $styledata[183], $styledata[184], $styledata[185], 1, 'Max-Width', 'Set your Image Max-Width', 'false','.oxi-addons-vr-'.$oxiid.' .oxi-addons-tt-img-section','max-width');
											
											echo oxi_addons_adm_help_padding_margin('oxi-tt-content-margin', 39, $styledata, 1, 'Margin', 'Set Your Content Margin', 'true', '.oxi-addons-vr-' . $oxiid . ' .oxi-addons-vr-tooltip', 'margin');
											echo oxi_addons_adm_help_true_false('oxi-tt-opening-tab', '', 'Current Tab', '', 'New Tab', '_blank', 'Opening Type', 'Set the link opening type as same tabs or new tabs', 'true');
										
													?>
										</div>
									</div>
									<div class="oxi-addons-content-div">
										<div class="oxi-head">
											Box Shadow
										</div>
										<div class="oxi-addons-content-div-body">
											<?php
											echo OxiAddonsADMhelpBoxShadow('oxi-tt-box-shadow', 55, $styledata, 'true', '.oxi-addons-vr-' . $oxiid . ' .oxi-addons-vr-tooltip');
											?>
										</div>
									</div>
								</div>
								<div class="oxi-addons-col-6">
									
									<div class="oxi-addons-content-div">
										<div class="oxi-head">
											Tooltip Text
										</div>

										<div class="oxi-addons-content-div-body">
											<div class=" form-group row">
                                                <label for="oxi-addons-tt-text-d" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Tooltip Position">Tooltip Position</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control" id="oxi-addons-tt-text-d" name="oxi-addons-tt-text-d">
                                                        <option value="top" <?php selected($styledata[113], 'top'); ?>>Top</option>
                                                        <option value="bottom" <?php selected($styledata[113], 'bottom'); ?>>Bottom</option>
                                                        <option value="left" <?php selected($styledata[113], 'left'); ?>>Left</option>
                                                        <option value="right" <?php selected($styledata[113], 'right'); ?>>Right</option>
                                                        <option value="center" <?php selected($styledata[113], 'center'); ?>>Center</option>
                                                    </select>
                                                </div>
                                            </div>
											<?php
											$NOJS2 = array(
												array('oxi-addons-tt-text-d', 'Tooltip Position')
											);
											echo OxiAddonsADMHelpNoJquery($NOJS2);
											echo oxi_addons_adm_help_number_dtm('oxi-tt-tooltip-max-width', $styledata[187], $styledata[188], $styledata[189], 1, 'Max-Width', 'Set your Image Max-Width', 'false','.oxi-addons-vr-'.$oxiid.'  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext','max-width');
											
											echo oxi_addons_adm_help_MiniColor('oxi-tt-tooltip-color', $styledata[115], '', 'Color', 'Set Your Tooltip Color', 'false', '	 .oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext', 'color');
											echo oxi_addons_adm_help_MiniColor('oxi-tt-tooltip-bg-color', $styledata[143], '', 'Background Color', 'Set Your Tooltip Background Color', 'false', '	 .oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext', 'background');
											echo oxi_addons_adm_help_padding_margin('oxi-tt-tooltip-padding', 117, $styledata, 1, 'Padding', 'Set Your Tooltip Padding', 'true', '	 .oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext', 'padding');
											echo oxi_addons_adm_help_padding_margin('oxi-tt-tooltip-margin', 165, $styledata, 1, 'Margin', 'Set Your Tooltip Margin', 'true', '.oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext', 'margin');
											echo oxi_addons_adm_help_padding_margin('oxi-tt-tooltip-border-radius', 145, $styledata, 1, 'Border Radius', 'Set Your Tooltip Border Radius', 'true', '	 .oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext', 'border-radius');
											?>
										</div>
									</div>
									<div class="oxi-addons-content-div">
										<div class="oxi-head">
											Typography
										</div>
										<div class="oxi-addons-content-div-body">
											<?php
											echo oxi_addons_adm_help_number_dtm('oxi-tt-tooltip-font-size', $styledata[133], $styledata[134], $styledata[135], 1, 'Font Size', 'Set your Tooltip Font Size', 'false','.oxi-addons-vr-'.$oxiid.'  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext ','font-size');
											echo OxiAddonsADMHelpFontSettings('oxi-tt-tooltip-font', 137, $styledata, 'true', '.oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext');
											?>
										</div>

									</div>
								</div>
							
					
							</div>
					
						
						<div class="oxi-addons-setting-save">
							<?php echo oxiaddonssettingsavedtmmode(); ?>
							<button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
							<input type="submit" class="btn btn-success" name="data-submit" value="Save">
							<input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php $styledata[1] ?>">
							<?php wp_nonce_field("oxi-addons-button-nonce") ?>
						</div>

					</div>
				</form>
			</div>
			<div class="oxi-addons-style-right">
				<?php
				echo oxi_addons_list_modal_open('Add New Item');
				echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
				echo oxi_addons_shortcode_call($oxitype, $oxiid);

				echo oxi_addons_list_rearrange('Tooltip Rearrange', $listdata, 3, 'title');
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
					<?php echo oxi_tooltip_style_2_shortcode($style, $listdata, 'admin'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
					<?php
					echo oxi_addons_adm_help_image_upload('oxi-tt-bg-image', $listitemdata[1], 'Image Upload', 'Set Your Image','false');
					echo oxi_addons_adm_help_textbox('oxi-tt-icon-link', $listitemdata[5], 'Icon Link', 'Set Your Tooltip Icon Link', 'false');
					echo oxi_addons_adm_help_textbox('oxi-tt-hover-text', $listitemdata[3], 'Hover Text', 'Set Your Tooltip Hover Text', 'false');
					?>

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="oxilistid" name="oxilistid" value="<?php echo $listid; ?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="OxiAddonsListFile" id="OxiAddonsListFile" value="Submit">
					<?php wp_nonce_field("OxiAddonsListData-nonce") ?>
                </div>
            </div>
        </div>
    </form>
</div>