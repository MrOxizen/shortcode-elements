<?php

if (!defined('ABSPATH')) {
	exit;
}

function oxi_call_to_action_style_6_shortcode($styledata = false, $listdata = false, $user = 'user') {
	$oxiid = $styledata['id'];
	$stylefiles = explode('||#||', $styledata['css']);
	$styledata = explode('|', $stylefiles[0]);
	$leftbutton = $rightbutton = $heading = $sub_heading = $icon = '';
	$css = '';
	if (!empty($stylefiles[6])) {
		$heading = '<h1 class="oxi-addons-call-to-action-heading">
						' . OxiAddonsTextConvert($stylefiles[6]) . '
					</h1>';
	}
	if (!empty($stylefiles[10])) {
		$icon = '<div class="oxi-bt-col-lg-2 oxi-bt-col-md-12 oxi-bt-col-sm-12"> 
							<div class="oxi-addons-call-to-action-icon-section">
							' . oxi_addons_font_awesome($stylefiles[10]) . '
							 </div>
				   </div>';
	}
	if (!empty($stylefiles[8])) {
		$sub_heading = '<div class="oxi-addons-call-to-action-sub-heading">
						' . OxiAddonsTextConvert($stylefiles[8]) . '
					</div>';
	}
	if ($styledata[229] == 'left') {
		$leftbutton .= '<div class="oxi-bt-col-lg-3 oxi-bt-col-md-12 oxi-bt-col-sm-12" ' . OxiAddonsAnimation($styledata, 117) . '> 
							<div class="oxi-addons-call-to-action-button-section">
								<a href="' . OxiAddonsUrlConvert($stylefiles[4]) . '" class="oxi-addons-call-to-action-button" target="' . $styledata[3] . '">' . OxiAddonsTextConvert($stylefiles[2]) . '</a>
							</div>
						</div>';
	} else {
		$rightbutton .= '<div class="oxi-bt-col-lg-3 oxi-bt-col-md-12 oxi-bt-col-sm-12" ' . OxiAddonsAnimation($styledata, 117) . '> 
							<div class="oxi-addons-call-to-action-button-section">
								<a href="' . OxiAddonsUrlConvert($stylefiles[4]) . '" class="oxi-addons-call-to-action-button" target="' . $styledata[3] . '">' . OxiAddonsTextConvert($stylefiles[2]) . '</a>
							</div>
						</div>';
	}


	echo '<div class="oxi-addons-container">
                    <div class="oxi-addons-row">
                        <div class=" oxi-addons-call-to-action-' . $oxiid . '">
                            <div class="oxi-addons-call-to-action-full-content">
				';
	if (!empty($stylefiles[2])) {
		echo $leftbutton;
	}
		if ($styledata[229] == 'right') {
			echo $icon;	
		}
	echo '
				
				<div class="oxi-bt-col-lg-7 oxi-bt-col-md-12 oxi-bt-col-sm-12"> 
			
					' . $heading . '
					' . $sub_heading . '
				</div>
				';
		if ($styledata[229] == 'left') {
			echo $icon;	
		}
	if (!empty($stylefiles[2])) {
		echo $rightbutton;
	}
	echo '
				
			</div>
			</div>
			</div>
		</div>';
	$buttontext = explode(":", $styledata[47]);
	$css .= '
	.oxi-addons-call-to-action-' . $oxiid . ' {
		width: 100%;
		float:left;
		padding :' . OxiAddonsPaddingMarginSanitize($styledata, 231) . ';
	}
	.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-full-content{
		width: 100%;
		height : auto;
		padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 125) . ';
		' . OxiAddonsBGImage($styledata, 121) . ';
		display: flex;
		justify-content: center;
		align-items: center;
		max-width : ' . $styledata[247] . 'px;
		position :relative;
		margin : 0 auto;
		 ' . OxiAddonsBoxShadowSanitize($styledata, 251) . ';
			 border-radius : ' . OxiAddonsPaddingMarginSanitize($styledata, 267) . ';
	}
	.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-sub-heading{
		width: 100%;
		float:left;
		font-size: ' . $styledata[187] . 'px;
		color: ' . $styledata[185] . ';
		' . OxiAddonsFontSettings($styledata, 191) . ';		
		padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 197) . ';
		margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 213) . ';
	}
		.oxi-addons-call-to-action-' . $oxiid . ' h1.oxi-addons-call-to-action-heading{
		width: 100%;
		float:left;
		font-size: ' . $styledata[143] . 'px;
		color: ' . $styledata[141] . ';
		' . OxiAddonsFontSettings($styledata, 147) . ';		
		padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
		margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 169) . ';
		letter-spacing : 1px;
	}
	.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section{
		width: 100%;
		float:left;
		display: inline-block;
		padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 81) . ';
		text-align:  ' . $buttontext[0] . ';
	}
	.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button{
		font-size: ' . $styledata[11] . 'px;
		color: ' . $styledata[15] . ';
		background: ' . $styledata[17] . ';
		border-width : ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';;
		border-style: ' . $styledata[39] . ';
		border-color: ' . $styledata[40] . ';
		' . OxiAddonsFontSettings($styledata, 43) . ';
			text-align:center;
		border-radius : ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . ';
		padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 65) . ';
		transition: 0.4s ease-in-out;
		

	}
	.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button:hover{
		color: ' . $styledata[19] . ';
		background: ' . $styledata[21] . ';
		border-style: ' . $styledata[97] . ';
		border-color: ' . $styledata[98] . ';
		border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';
	}	
	.oxi-addons-call-to-action-' . $oxiid . ' .oxi-addons-call-to-action-icon-section{
		width: 100%;
		float:left;
	}
	.oxi-addons-call-to-action-' . $oxiid . ' .oxi-addons-call-to-action-icon-section .oxi-icons{
		font-size : ' . $styledata[285] . 'px;
		color :' . $styledata[289] . ';
		padding : ' . OxiAddonsPaddingMarginSanitize($styledata, 291) . ';
		margin : ' . OxiAddonsPaddingMarginSanitize($styledata, 307) . ';
	}
	@media only screen and (min-width : 669px) and (max-width : 993px){
		.oxi-addons-call-to-action-' . $oxiid . ' {		
			padding :' . OxiAddonsPaddingMarginSanitize($styledata, 232) . ';
		}
		.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-full-content{
			flex-direction: column;
			padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 126) . ';
			max-width : ' . $styledata[248] . 'px;
				text-align :center;
		}
		.oxi-addons-call-to-action-' . $oxiid . ' h1.oxi-addons-call-to-action-heading{
			font-size: ' . $styledata[144] . 'px;
			padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 154) . ';
			margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 170) . ';
			text-align :center;
		}
		.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-sub-heading{			
			font-size: ' . $styledata[188] . 'px;	
			padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 198) . ';
			margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 214) . ';
			text-align :center;
		}
		.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section{
			padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 82) . ';
		}
		.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button{
			font-size: ' . $styledata[12] . 'px;
			border-width : ' . OxiAddonsPaddingMarginSanitize($styledata, 24) . ';							
			border-radius : ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . ';
			padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 66) . ';
		}
		.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button:hover{
			border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
		}	
		.oxi-addons-call-to-action-' . $oxiid . ' .oxi-addons-call-to-action-icon-section .oxi-icons{
			font-size : ' . $styledata[286] . 'px;
			text-align :center;	
			padding : ' . OxiAddonsPaddingMarginSanitize($styledata, 292) . ';
			margin : ' . OxiAddonsPaddingMarginSanitize($styledata, 308) . ';
		}
	
	
	}
	@media only screen and (max-width : 668px){
		.oxi-addons-call-to-action-' . $oxiid . ' {		
			padding :' . OxiAddonsPaddingMarginSanitize($styledata, 233) . ';
		}
		.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-full-content{
		    flex-direction: column;
			padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 127) . ';
			max-width : ' . $styledata[249] . 'px;
			text-align :center;
		}  
		.oxi-addons-call-to-action-' . $oxiid . ' h1.oxi-addons-call-to-action-heading{
			font-size: ' . $styledata[145] . 'px;
			padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 155) . ';
			margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 171) . ';
			text-align :center;
		}
		.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-sub-heading{
			
			font-size: ' . $styledata[189] . 'px;	
			padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 199) . ';
			margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 215) . ';
			text-align :center;
		}
		.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section{
			padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 83) . ';
		}
		.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button{
			font-size: ' . $styledata[13] . 'px;
			border-width : ' . OxiAddonsPaddingMarginSanitize($styledata, 25) . ';							
			border-radius : ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . ';
			padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 67) . ';
		}
		.oxi-addons-call-to-action-' . $oxiid . '  .oxi-addons-call-to-action-button-section a.oxi-addons-call-to-action-button:hover{
			border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
		}	
		.oxi-addons-call-to-action-' . $oxiid . ' .oxi-addons-call-to-action-icon-section .oxi-icons{
			font-size : ' . $styledata[287] . 'px;
			text-align :center;
			padding : ' . OxiAddonsPaddingMarginSanitize($styledata, 293) . ';
			margin : ' . OxiAddonsPaddingMarginSanitize($styledata, 309) . ';		
		}
	}
	
	';

	echo OxiAddonsInlineCSSData($css);
}
