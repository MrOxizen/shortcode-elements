<?php

if (!defined('ABSPATH')) {
	exit;
}

function oxi_tooltip_style_3_shortcode($styledata = false, $listdata = false, $user = 'user') {
	$oxiid = $styledata['id'];
	$stylefiles = explode('||#||', $styledata['css']);
	$styledata = explode('|', $stylefiles[0]);
	$css = $pos = $afterpos = '';
	if ($styledata[113] == 'top') {
		$pos = 'top: 0%;
				left: 50%;
				transform : translate(-50%,-100%);';
		$afterpos = '	top: 100%;
				left: 50%;
				border-color: ' . $styledata[143] . ' transparent transparent transparent;
				transform : translateX(-50%);';
	}
	if ($styledata[113] == 'right') {
		$pos = 'top: 50%;
				left: 100%;
				transform : translateY(-50%);';
		$afterpos = '	top: 50%;
				left: 0%;
				border-color: transparent ' . $styledata[143] . '  transparent transparent;
				transform: translateY(-50%) translateX(-100%);';
	}
	if ($styledata[113] == 'left') {
		$pos = 'top: 50%;
				left: 0%;
				transform : translate(-100%,-50%);';
		$afterpos = '	top: 50%;
				left: 100%;
				border-color: transparent   transparent transparent  ' . $styledata[143] . ' ;
				transform: translateY(-50%) translateX(0%);';
	}
	if ($styledata[113] == 'bottom') {
		$pos = 'top: 100%;
				left: 50%; 
				transform : translateX(-50%);';
		$afterpos = '	top: 0%;
				left:50%;
				border-color: transparent   transparent ' . $styledata[143] . ' transparent;
				transform: translateY(-100%) translateX(-50%);';
	}
	if ($styledata[113] == 'center') {
		$pos = 'top: 50%;
				left: 50%;
				
				transform : translate(-50%,-50%);';
		$afterpos = 'display : none;';
	}
	echo '
<div class="oxi-addons-container ">
    <div class="oxi-addons-row">
        <div class="oxi-addons-vr-tooltip-section ">
            <div class="oxi-addons-vr-tooltip-full-content oxi-addons-vr-' . $oxiid . '">
                    ';
            foreach ($listdata as $one_item) {
                    $heading = $shortcode = $tooltiptext = '';
                    $listfiles = explode('||#||', $one_item['files']);
                    if(!empty($listfiles[3])){
                            $tooltiptext = '<span class="oxi-addons-vr-tooltiptext">' . OxiAddonsTextConvert($listfiles[3]) . '</span>';
                    }
                    if (!empty($listfiles[1])) {
                            $shortcode = '<div class="oxi-addons-tt-SC-section">
						' . OxiAddonsTextConvert($listfiles[1]) . '
					</div>';
                    }else{
                            $shortcode = '<div class="oxi-addons-tt-SC-section">
						<h3 style = "padding:52px 30px; color : red "> *Add Shortcode For Tooltip.</h3>	
					</div>';
                            $tooltiptext = '';
                    }
                    echo'
                    <div class="' . OxiAddonsItemRows($styledata, 161) . 'oxi-addons-tt-' . $oxiid . '-' . $one_item['id'] . ' ' . OxiAddonsAdminDefine($user) . '">				
                            <div class="oxi-tt-center">

                             <a href="' . OxiAddonsUrlConvert($listfiles[5]) . '" target="' . $styledata[181] . '">
                                    <div class="oxi-addons-vr-tooltip">
					<div class="oxi-addons-tt-img">
						<div class="oxi-addons-tt-img-section">
							' . $shortcode . '
							' . $tooltiptext . '
						</div>
					</div>
                                    </div>
                            </a>	';
                    if ($user == 'admin') {
                            echo '  <div class="oxi-addons-admin-absulote">
					<div class="oxi-addons-admin-absulate-edit">
						<form method="post"> ' . wp_nonce_field("OxiAddonsListFileEdittooltipdata") . '
							<input type="hidden" name="oxi-item-id" value="' . $one_item['id'] . '">
							<button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
						</form>
					</div>
					<div class="oxi-addons-admin-absulate-delete">
						<form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletetooltipdata") . '
							<input type="hidden" name="oxi-item-id" value="' . $one_item['id'] . '">
							<button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
						</form>
					</div>
				</div>';
                    }
                    echo '</div>';
                    echo '</div>';
            }
            echo '</div>
        </div>
    </div>
</div>';
	$css .= '
	.oxi-addons-vr-' . $oxiid . '{
		width :100%;
		float : left ;
	}
	.oxi-tt-center{
		width :100%;
		float : left ;
		text-align : center;
	}
		.oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip-section{
		width: 100%;
		float:left;
		padding : 0;
	}
	.oxi-addons-vr-' . $oxiid . ' .oxi-addons-vr-tooltip-full-content{
		width: 100%;
		float:left;
		text-align: center;
		}
	.oxi-addons-vr-' . $oxiid . ' .oxi-addons-vr-tooltip {
		display :inline-block;
		position: relative;
		background : ' . $styledata[63] . ';
			
                ' . OxiAddonsBoxShadowSanitize($styledata, 55) . ';
		margin :' . OxiAddonsPaddingMarginSanitize($styledata, 39) . ';
	}
	.oxi-addons-vr-' . $oxiid . ' .oxi-addons-tt-SC-section{
		width :100%;
		float :left;
		max-width : ' . $styledata[183] . 'px;
		position:relative;
		
	}
	
	
	 .oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext {
		width : 100%;
		display:none;
		color:' . $styledata[115] . ';
		background:' . $styledata[143] . ';
		text-align: center;
		padding :' . OxiAddonsPaddingMarginSanitize($styledata, 117) . ';
		margin :' . OxiAddonsPaddingMarginSanitize($styledata, 165) . ';
		position: absolute;
		z-index: 1;
		' . $pos . '
		' . OxiAddonsFontSettings($styledata, 140) . '
		font-size : ' . $styledata[133] . 'px;
		max-width : ' . $styledata[187] . 'px;
		border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 145) . ';
			
	  }

	 .oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip .oxi-addons-vr-tooltiptext::after {
		content: "";
		position: absolute;
		' . $afterpos . '
		border-width: 5px;
		border-style: solid;
	  }

	 .oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip:hover .oxi-addons-vr-tooltiptext {
		display:block;
	  }
	@media only screen and (min-width : 669px) and (max-width : 993px){
		.oxi-addons-vr-' . $oxiid . ' .oxi-addons-vr-tooltip {
			margin :' . OxiAddonsPaddingMarginSanitize($styledata, 40) . ';
		}
		.oxi-addons-vr-' . $oxiid . ' .oxi-addons-tt-SC-section{
		max-width : ' . $styledata[184] . 'px;
		}
		
	 .oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext {
		padding :' . OxiAddonsPaddingMarginSanitize($styledata, 118) . ';
		margin :' . OxiAddonsPaddingMarginSanitize($styledata, 166) . ';
		font-size : ' . $styledata[134] . 'px;
		max-width : ' . $styledata[188] . 'px;
		border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 146) . ';
			
	  }
	}
	@media only screen and (max-width : 668px){
		.oxi-addons-vr-' . $oxiid . ' .oxi-addons-vr-tooltip {
			margin :' . OxiAddonsPaddingMarginSanitize($styledata, 41) . ';
		}
		.oxi-addons-vr-' . $oxiid . ' .oxi-addons-tt-SC-section{
		max-width : ' . $styledata[185] . 'px;
		}
		
	 .oxi-addons-vr-' . $oxiid . '  .oxi-addons-vr-tooltip span.oxi-addons-vr-tooltiptext {
		padding :' . OxiAddonsPaddingMarginSanitize($styledata, 119) . ';
		margin :' . OxiAddonsPaddingMarginSanitize($styledata, 167) . ';
		font-size : ' . $styledata[135] . 'px;
		max-width : ' . $styledata[189] . 'px;
		border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 147) . ';
			
	  }
	}
	';

	echo OxiAddonsInlineCSSData($css);
}
