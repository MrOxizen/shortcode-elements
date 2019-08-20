<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_17_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $css = '';
    $styledata = explode('|', $stylefiles[0]);
    $href = '';
    $target = '';
    $jquery = '';
    if ($stylefiles[7] != '') {
        $href = 'href="' . OxiAddonsUrlConvert($stylefiles[7]) . '"';
        if ($styledata[3] != '') {
            $target = 'target="' . $styledata[3] . '"';
        }
    }
    $icon = '';
    $text = '';
    if ($stylefiles[9] != '') {
       $icon = '<div class="oxi-btn-icon-body">   
                    <div class="oxi-btn-icon">  ' . oxi_addons_font_awesome($stylefiles[9]) . ' </div>
                </div>';
    }
    if ($stylefiles[3] != '') {
       $text = '<div class="oxi-btn-txt">  ' . OxiAddonsTextConvert($stylefiles[3]) . '</div>';
    }
    
    
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-row">
                <div class="Oxi-addons-btn-'.$oxiid.'" >
                    <div class="Oxi-btn-body">
                        <div class="Oxi-btn-align" ' . OxiAddonsAnimation($styledata, 43) . '>
                            <a ' . $target . ' ' . $href . ' class="Oxi-btn Oxi-btn-style" id="' . $stylefiles[5] . '" > 
                                '.$text.'
                            </a> 
                      </div>
                    </div>
                </div>
            </div>
          </div>';
    
        $pdRight = $styledata[187];
        $pdleft = $styledata[183];
        $btnPd = $pdRight + $pdleft;
    
    $iconWidth ='';
    if($styledata[191] == 1){
        $iconWidth = 'bold';
    }else{
        $iconWidth = 'normal';
    }
    
    
    $textalign = explode(':', $styledata[55]);
    $css .='.Oxi-addons-btn-'.$oxiid.' {   
                    float: left;
                    width: 100%;
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-body{
                --width: '.$styledata[7].'px; 	
                text-align: '.$textalign[0].';
                padding: '. OxiAddonsPaddingMarginSanitize($styledata, 27).';
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align{
                background: '.$styledata[59].';
                border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 61).';
                border-style: '.$styledata[77].';
                border-color: '.$styledata[78].';
                border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 81).';
                display: inline-flex;
                justify-content: center;
                align-items: center;
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn{
                position: relative;
                border: none;
                width: var(--width);
                max-width: 100%;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                padding: '. OxiAddonsPaddingMarginSanitize($styledata, 11).';
            }
           
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-txt{
                color: '.$styledata[97].';
            }
            
            .Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt{
                font-size:'.$styledata[47].'px;
                '. OxiAddonsFontSettings($styledata, 51).';
                text-align: center;
                color:'.$styledata[57].';
                padding:'. OxiAddonsPaddingMarginSanitize($styledata, 175).';
                position: relative;
                transition-duration: .3s;
            }
            .Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt:before{
                content: "\\' . $stylefiles[9] . '";
                font-family: "Font Awesome\ 5 Free";
                display: inline-block;
                vertical-align: middle;
                font-weight: '.$iconWidth.';
                position: absolute;
                left: -20px;
                transition-duration: .3s;
                font-size: '.$styledata[103].'px;
                color: '.$styledata[107].';
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-txt::before{
                content: "\\' . $stylefiles[11] . '";
                font-family: "Font Awesome\ 5 Free";
                display: inline-block;
                vertical-align: middle;
                font-weight: '.$iconWidth.';
                position: absolute;
                left: 100%;
                color: '.$styledata[147].';
            }
            .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-txt{
                display: inline-block;
                margin-left: -'.$btnPd.'px;
            }
            
            @media only screen and (min-width : 669px) and (max-width : 993px){
                   .Oxi-addons-btn-'.$oxiid.' {   
                           float: left;
                           width: 100%;
                   }';
    
                $pdRight = $styledata[188];
                $pdleft = $styledata[184];
                $btnPd = $pdRight + $pdleft;

            $css .= '.Oxi-addons-btn-'.$oxiid.'{ 	
                           display: flex;
                           justify-content: center;
                   }
                   .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-body{
                       --width: '.$styledata[8].'px; 	
                       display: flex;
                       justify-content: center;
                       padding: '. OxiAddonsPaddingMarginSanitize($styledata, 28).';
                   }
                   .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align{
                       border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 62).';
                       border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 82).';
                       display: flex;
                       justify-content: center;
                       align-items: center;
                   }
                   .Oxi-addons-btn-'.$oxiid.' .Oxi-btn{
                       position: relative;
                       border: none;
                       width: var(--width);
                       max-width: 100%;
                       display: inline-flex;
                       justify-content: center;
                       align-items: center;
                       padding: '. OxiAddonsPaddingMarginSanitize($styledata, 12).';
                   }

                   .Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt{
                       font-size:'.$styledata[48].'px;
                       padding:'. OxiAddonsPaddingMarginSanitize($styledata, 176).';
                       position: relative;
                       transition-duration: .3s;
                   }
                   .Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt:before{
                       content: "\\' . $stylefiles[9] . '";
                       font-family: "Font Awesome\ 5 Free";
                       display: inline-block;
                       vertical-align: middle;
                       font-weight: '.$iconWidth.';
                       position: absolute;
                       left: -20px;
                       transition-duration: .3s;
                       font-size: '.$styledata[104].'px;
                       display: flex;
                       justify-content: center;
                       align-items: center;
                   }
                   
                   .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-txt{
                       display: inline-block;
                       margin-left: -'.$btnPd.'px;
                   }
            }
            @media only screen and (max-width : 668px){
                .Oxi-addons-btn-'.$oxiid.' {   
                           float: left;
                           width: 100%;
                   }';
    
                $pdRight = $styledata[189];
                $pdleft = $styledata[185];
                $btnPd = $pdRight + $pdleft;

            $css .= '.Oxi-addons-btn-'.$oxiid.'{ 	
                           display: flex;
                           justify-content: center;
                   }
                   .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-body{
                       --width: '.$styledata[8].'px; 	
                       display: flex;
                       justify-content: center;
                       padding: '. OxiAddonsPaddingMarginSanitize($styledata, 29).';
                   }
                   .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align{
                       border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 63).';
                       border-radius: '. OxiAddonsPaddingMarginSanitize($styledata, 83).';
                       display: flex;
                       justify-content: center;
                       align-items: center;
                   }
                   .Oxi-addons-btn-'.$oxiid.' .Oxi-btn{
                       position: relative;
                       border: none;
                       width: var(--width);
                       max-width: 100%;
                       display: inline-flex;
                       justify-content: center;
                       align-items: center;
                       padding: '. OxiAddonsPaddingMarginSanitize($styledata, 13).';
                   }

                   .Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt{
                       font-size:'.$styledata[49].'px;
                       padding:'. OxiAddonsPaddingMarginSanitize($styledata, 177).';
                       position: relative;
                       transition-duration: .3s;
                   }
                   .Oxi-addons-btn-'.$oxiid.' .oxi-btn-txt:before{
                       content: "\\' . $stylefiles[9] . '";
                       font-family: "Font Awesome\ 5 Free";
                       display: inline-block;
                       vertical-align: middle;
                       font-weight: '.$iconWidth.';
                       position: absolute;
                       left: -20px;
                       transition-duration: .3s;
                       font-size: '.$styledata[105].'px;
                       display: flex;
                       justify-content: center;
                       align-items: center;
                   }
                   
                   .Oxi-addons-btn-'.$oxiid.' .Oxi-btn-align:hover .oxi-btn-txt{
                       display: inline-block;
                       margin-left: -'.$btnPd.'px;
                   }
            }';

    echo OxiAddonsInlineCSSData($css);
}
