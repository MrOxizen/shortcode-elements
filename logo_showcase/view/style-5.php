<?php

if (!defined('ABSPATH'))
    exit;

function oxi_logo_showcase_style_5_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css =$pos = $afterpos = '';
	 if($styledata[70] == 'top'){
		 $pos = 'top: 0%;
				left: 50%;
				transform : translate(-50%,-100%);';
		$afterpos = 'top: 100%;
					left: 50%;
					border-color: '.$styledata[74].' transparent transparent transparent;
					transform : translateX(-50%);';
	 }
	 if($styledata[70] == 'right'){
		 $pos = 'top: 50%;
				left: 100%;
				transform : translateY(-50%);';
		 $afterpos = 'top: 50%;
					left: 0%;
					border-color: transparent '.$styledata[74].'  transparent transparent;
					transform: translateY(-50%) translateX(-100%);'; 
	 }
	 if($styledata[70] == 'left'){
		 $pos = 'top: 50%;
				left: 0%;
				transform : translate(-100%,-50%);';
		 $afterpos = 'top: 50%;
					left: 100%;
					border-color: transparent   transparent transparent  '.$styledata[74].' ;
					transform: translateY(-50%) translateX(0%);'; 
	 }
	 if($styledata[70] == 'bottom'){
		 $pos = 'top: 100%;
				left: 50%; 
				transform : translateX(-50%);';
		 $afterpos = 'top: 0%;
					left:50%;
					border-color: transparent   transparent '.$styledata[74].' transparent;
					transform: translateY(-100%) translateX(-50%);'; 
	 }
    echo '<div class="oxi-addons-container"> <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $link = $tooltip = '';
        if ($data[3] != '') {
             if ($data[5] != '') {
                 $tooltip = '<span class="oxi-addons-logoshowcase-tooltiptext">' . OxiAddonsTextConvert($data[5]) . '</span>
                     ';
             }
            $link = '<a href="' . OxiAddonsUrlConvert($data[3]) . '" target="' . $styledata[52] . '" class="oxi-addons-logo-showcase-img-' . $oxiid . '">
                        <img src="' . OxiAddonsUrlConvert($data[1]) . '" class="oxi-addons-img">
                            '.$tooltip.'
                     </a>';
        } elseif ($data[3] == '') {
            $link = '<div class="oxi-addons-logo-showcase-img-' . $oxiid . '"><img src="' . OxiAddonsUrlConvert($data[1]) . '" class="oxi-addons-img"></div>';
        };

        echo '  <div class="oxi-addons-logo-showcase-row-' . $oxiid . ' ' . OxiAddonsItemRows($styledata, 3) . ' ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 47) . '>                       
                            ' . $link . '
                                
                                ';

        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                                <div class="oxi-addons-admin-absulate-edit">
                                    <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditlogo_showcasedata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                    </form>
                                </div>
                                <div class="oxi-addons-admin-absulate-delete">
                                    <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletelogo_showcasedata") . '
                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                        <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                    </form>
                                </div>
                            </div>';
        }
        echo'</div>';
    }
    echo'</div></div>';
    $css .= '.oxi-addons-container .oxi-addons-logo-showcase-row-' . $oxiid . '{
                position:relative;                
                display: flex;
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';       
            } 
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '{
                max-width: ' . $styledata[7] . 'px;
                width:100%;
                margin: 0 auto;
                float: left;
                position: relative;
                ' . OxiAddonsBoxShadowSanitize($styledata, 54) . ';
                background: ' . $styledata[60] . ';
                  border-style: ' . $styledata[150] . ';
                border-color: ' . $styledata[151] . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 134) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
                }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':hover{
                background: ' . $styledata[62] . ';
                ' . OxiAddonsBoxShadowSanitize($styledata, 64) . ';
             }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':after{
                display:block;
                content: "";  
                width:100%;
                padding-bottom:' . $styledata[11] . '%;
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-img{
                position:absolute;                
                top:0;
                left:0;
                width:100%;
                height:100%;  
                padding:' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';        
            }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext{
            position : absolute;
            color: ' . $styledata[72] . ';
            background : ' . $styledata[74] . ';
            z-index : 99;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 76) . ';        
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 92) . '; 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 108) . '; 
            font-size:  ' . $styledata[124] . 'px;
            ' . OxiAddonsFontSettings($styledata, 128) . '
            '.$pos.'
            display: none;
            } 
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':hover .oxi-addons-logoshowcase-tooltiptext{
               display: block;
             }
            .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext:after{
            content :"";
            position : absolute;
            border-width : 5px ;
            border-style : solid;
            '.$afterpos.'
           }
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-container .oxi-addons-logo-showcase-row-' . $oxiid . '{             
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 32) . ';       
                } 
                .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '{
                    max-width: ' . $styledata[8] . 'px;              
                }
                .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':after{              
                    padding-bottom:' . ($styledata[12] / $styledata[8]) * 100 . '%;
                }
                .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-img{                
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';        
                }
                 .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext{
                  
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 77) . ';        
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 93) . '; 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 109) . '; 
                    font-size:  ' . $styledata[125] . 'px;
                    
                    } 
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-container .oxi-addons-logo-showcase-row-' . $oxiid . '{             
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';       
                } 
                .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . '{
                    max-width: ' . $styledata[9] . 'px;              
                }
                .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ':after{              
                    padding-bottom:' . ($styledata[13] / $styledata[9]) * 100 . '%;
                }
                .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-img{                
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';        
                }
                 .oxi-addons-container .oxi-addons-logo-showcase-img-' . $oxiid . ' .oxi-addons-logoshowcase-tooltiptext{
                  
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 78) . ';        
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 94) . '; 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 110) . '; 
                    font-size:  ' . $styledata[126] . 'px;
                    
                    } 
        }
           ';
    echo OxiAddonsInlineCSSData($css);
}
