<?php

if (!defined('ABSPATH'))
	exit;

function oxi_button_style_12_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
	$oxiid = $styledata['id'];
	$stylefiles = explode('||#||', $styledata['css']);
	$css = '';
	$styledata = explode('|', $stylefiles[0]);
	$href = '';
	$target = '';
	$text= '';
	$button = $height_width = $normal =$hover ='';
	
	if ($stylefiles[7] != '') {
		$href = 'href="' . OxiAddonsUrlConvert($stylefiles[7]) . '"';
		
		if ($styledata[1] != '') {
			$target = 'target="' . $styledata[1] . '"';
		}
		}
		if ( $stylefiles[3] != '') {
			$text =  '<span class="oxi-button-btn">'.$stylefiles[3].'</span>';
		}
		
		if ($stylefiles[5] != '') {
			$id = 'id="' . $stylefiles[5] . '"';
		}
		if($stylefiles[5] != '' || $stylefiles[7] != ''){
			$button = '<a ' . $target . ' ' . $href . ' ' . OxiAddonsAnimation($styledata, 59) . ' class="   oxi-button-' . $oxiid . ' ' . $styledata[125] . '" '.$id.'>'.$text.'</a>';
		}
		if ($styledata[119] == 'top') {
			$normal = '  
			  top: 0;
			  border-radius: 0 0 50% 50%;';
			$hover = ' 
			  height: 180%;
			  top: 100;';
			$height_width = '
				left: 0;
				height : 0%;
			  width: 100%;';
		}elseif ($styledata[119] == 'bottom') {
		    $normal = '
				bottom: 0;
				border-radius: 50% 50% 0 0;';
			$hover = ' 
				height: 180%;
				bottom: 100;
				';
				$height_width = '
					left: 0;
					height : 0%;
					 width: 100%;';
		}elseif ($styledata[119] == 'left') {
		    $normal = '
				left: 0;
				border-radius: 0 50% 50%  0;';
			$hover = ' 
				width: 180%;
				left: 100;
				';
			$height_width = '
				left : 0;
			    height: 100%;
				 width: 0;
			';
		}else{
		    $normal = '
				right: 0;
				border-radius :50% 0 0 50%  ;';
			$hover = ' 
				width: 180%;
				right: 100;
				';
			$height_width = '
				right: 0;
			    height: 100%;
				 width: 0;
			';
		}
		
	echo '
	<div class="oxi-addons-container">
                <div class="oxi-addons-row">
                    <div class="oxi-addons-align-' . $oxiid . '">';
	echo $button;
	echo '</div>
        </div>
    </div>
';
        $textalign = explode(':', $styledata[11]);
	$css = ' .oxi-addons-align-' . $oxiid . '{
                    text-align: '.$textalign[0].';
		}
			.oxi-addons-container .oxi-button-' . $oxiid . '{  
				overflow: hidden;
				box-shadow: none;
				-webkit-backface-visibility: hidden;
				-moz-backface-visibility: hidden;
				backface-visibility: hidden;
				max-width: '.$styledata[29] .'px;
				width: 100%;
				position:relative;
				font-size: '.$styledata[3].'px;
				' . OxiAddonsFontSettings($styledata, 7) . ';
					text-align: center;
				margin : '. OxiAddonsPaddingMarginSanitize($styledata, 67).';
				display: inline-flex;
				justify-content: center;
				align-items :center;
			}
			.oxi-addons-container .oxi-button-' . $oxiid . ':focus{
				border : 0;
				outline : 0;
			}
			.oxi-addons-container  .oxi-button-' . $oxiid . ' span.oxi-button-btn{
				width :100%;
				float : left;
				color:' . $styledata[33] . ';
				background:' . $styledata[35] . ';
				border-width  : '. OxiAddonsPaddingMarginSanitize($styledata, 83).';
				border-style  : '. $styledata[38] . ';
				border-color  : '. $styledata[39] . ';
				border-radius : '. $styledata[41] . 'px;
				
				cursor: pointer;
				transition: 0.2s;
				position: relative;
				overflow: hidden;
					padding : '. OxiAddonsPaddingMarginSanitize($styledata, 13).';
				z-index: 0;
				display: flex;
				justify-content : center;
				align-items :center;
			
			  }

			.oxi-addons-container .oxi-button-' . $oxiid . ':hover  span.oxi-button-btn{
				
				color: '. $styledata[127] . ';
			}

			.oxi-button-' . $oxiid . ' .oxi-button-btn::before{
			  content: "";
			  position: absolute;
			  
			  '.$height_width.'
			  background: '.$styledata[45].';
			  z-index: -1;
			  transition: 0.4s;
			}
			.oxi-button-' . $oxiid . ' .oxi-button-btn::before{
				'.$normal.'
			}

			.oxi-addons-container .oxi-button-' . $oxiid . ':hover .oxi-button-btn::before{
			 '.$hover.'
			  color: '. $styledata[127] . ';
			}
		@media only screen and (min-width : 669px) and (max-width : 993px){
                    .oxi-addons-align-' . $oxiid . '{
                        text-align: center ;
                    }
			.oxi-addons-container .oxi-button-' . $oxiid . '{  
			
				max-width: '.$styledata[30] .'px;
				
				font-size: '.$styledata[4].'px;
				margin : '. OxiAddonsPaddingMarginSanitize($styledata, 68).';
			
			}
			.oxi-addons-container  .oxi-button-' . $oxiid . ' span.oxi-button-btn{
				border-width  : '. OxiAddonsPaddingMarginSanitize($styledata, 84).';
				padding : '. OxiAddonsPaddingMarginSanitize($styledata, 14).';
			  }
		 }
		@media only screen and (max-width : 668px){
                    .oxi-addons-align-' . $oxiid . '{
                            text-align: center;
                    }
                        .oxi-addons-container .oxi-button-' . $oxiid . '{  
			
				max-width: '.$styledata[31] .'px;
				
				font-size: '.$styledata[5].'px;
				margin : '. OxiAddonsPaddingMarginSanitize($styledata, 69).';
			
			}
			.oxi-addons-container  .oxi-button-' . $oxiid . ' span.oxi-button-btn{
				border-width  : '. OxiAddonsPaddingMarginSanitize($styledata, 85).';
				padding : '. OxiAddonsPaddingMarginSanitize($styledata, 15).';
			  }
		 }
		';
        echo OxiAddonsInlineCSSData($css);
}
