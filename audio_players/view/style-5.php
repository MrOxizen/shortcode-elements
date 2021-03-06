<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_audio_players_style_5_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo wp_enqueue_media();
    echo oxi_addons_elements_stylejs('mediaelement-min', 'audio_players', 'js');
    $css = '';
    $title = $image = $author = $audio = '';
    if ($stylefiles[12] != '') {
        $title = '<div class="oxi-addons-title">
                    ' . OxiAddonsTextConvert($stylefiles[12]) . '
                 </div>';
    }
    if ($stylefiles[16] != '') {
        $image = '<div class="oxi-addons-image">
                    <img class="oxi-img" src="' . OxiAddonsUrlConvert($stylefiles[16]) . '" alt="front image">
                </div>';
    }
    if ($stylefiles[14] != '') {
        $author = '<div class="oxi-addons-author">
                    ' . OxiAddonsTextConvert($stylefiles[14]) . '
                </div>';
    }
    if ($stylefiles[2] != '') {
        $audio = ' <audio controls id="mediaplayer">
                    <source src="' . OxiAddonsUrlConvert($stylefiles[2]) . '" />
                </audio>';
    }


    echo '<div class="oxi-addons-container">
        <div class="oxi-addons-row">
            <div class="oxi-addons-wrapper-' . $oxiid . ' ' . OxiAddonsAnimation($styledata, 51) . '">
               <div class="oxi-addons-audio-main">
               ' . $image . '
                <div class="oxi-addons-audio">
                    <div class="oxi-addons-main-content"> 
                        ' . $title . '
                        ' . $author . '
                    </div>
                    ' . $audio . '
                </div>   
               </div>
            </div>
        </div>
        </div>
        ';
    $jquery = '';
    if ($styledata[34] == 'true' || $styledata[36] == 'true' || $styledata[38] == 'true' || $styledata[40] == 'true') {
        $jquery .= '  jQuery(".oxi-addons-wrapper-' . $oxiid . ' #mediaplayer").mediaelementplayer({
                features: [';

        if ($styledata[34] == 'true') {
            $jquery .= '"playpause",';
        }
        if ($styledata[36] == 'true') {
            $jquery .= '"current",';
        }
        if ($styledata[38] == 'true') {
            $jquery .= '"progress",';
        }
        if ($styledata[40] == 'true') {
            $jquery .= '"volume"';
        }
        $jquery .= '],
       success: function (mediaElement, domObject) {
            mediaElement.setVolume(0.8);
        }
    }); ';
    } else {
        $css = '.oxi-addons-container .oxi-addons-wrapper-' . $oxiid . ' #mediaplayer{display: none}';
    }




    if ($styledata[416] == 'false') {
        $show_progress_handle = 'display: none';
    } else {
        $show_progress_handle = 'display: block';
    }
    if ($styledata[418] == 'false') {
        $show_volume_handle = 'display: none';
    } else {
        $show_volume_handle = 'display: block';
    }

    $css .= '
        .oxi-addons-wrapper-' . $oxiid . '{ 
            width: 100%;
            float: left; 
            overflow: hidden;
            display: flex;
            justify-content:center; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . '; 
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio{
            width: 100%; 
            ' . OxiAddonsBGImage($styledata, 3) . ';   
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-content{
          width: 100%;
          float: left;
          text-align: center;
        }
   
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-main{ 
            display: flex;
            ' . OxiAddonsBoxShadowSanitize($styledata, 472) . ';
            overflow: hidden;
            width: 100%;
            max-width: ' . $styledata[7] . 'px;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 58) . '  !important;   
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-img{ 
            width: 100%;
            max-width: ' . $styledata[408] . 'px;
            height: ' . $styledata[412] . 'px;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 456) . ';  
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title{
            width: 100%;
            float: left;
            font-size: ' . $styledata[478] . 'px;
            ' . OxiAddonsFontSettings($styledata, 482) . ';
            color: ' . $styledata[488] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 490) . ';
           
        }
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-author{
            width: 100%;
            float: left;
            font-size: ' . $styledata[506] . 'px;
            ' . OxiAddonsFontSettings($styledata, 510) . ';
            color: ' . $styledata[516] . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 518) . ';
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-author span{
            font-weight: bold;
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-controls { 
            padding: 0px; 
        }
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-button > button {
            background: none !important;
            top: auto !important;
            margin: 0 !important; 
        }
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-container, 
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-controls {
            background: ' . $styledata[32] . ' !important;
            height: ' . $styledata[42] . 'px !important;
            display: flex;
            align-items: center;
        }
        .mejs-container {
            clear: both;
            max-width: 100%;
            width: 100% !important;
        }

        .oxi-addons-wrapper-' . $oxiid . ' .mejs-playpause-button{  
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 96) . ';
            height: ' . $styledata[534] . 'px ;
            width: ' . $styledata[538] . 'px;
            background: ' . $styledata[542] . ';
            display: flex; 
            justify-content: center;
            position: absolute;  
            left: ' . $styledata[368] . '% !important;
            bottom: ' . $styledata[372] . '% !important;
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-play button::after,
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-replay button::after,
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-pause button::after{ 
            font-family: "Font Awesome\ 5 Free";
            font-size: ' . $styledata[74] . 'px;
            font-weight: 900;
            line-height: 1; 
            content: "\\' . $stylefiles[6] . '";
            position: absolute; 
            left: 0px;
            top: 0px;  
            color: ' . $styledata[78] . ' !important; 
        }
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-replay button::after { 
            content: "\\' . $stylefiles[6] . '";
            font-family: "Font Awesome\ 5 Free";  
            font-weight: 900;
            color: ' . $styledata[78] . ' !important;
            font-size: ' . $styledata[74] . 'px;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-playpause-button > button { 
            height: ' . $styledata[74] . 'px !important; 
            width: ' . $styledata[74] . 'px !important;
              
        }
     
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-pause button::after { 
            content: "\\' . $stylefiles[4] . '";
            font-family: "Font Awesome\ 5 Free";  
            font-weight: 900;
            color: ' . $styledata[116] . ' !important;
            font-size: ' . $styledata[112] . 'px;
            height: ' . $styledata[74] . 'px !important; 
            width: ' . $styledata[74] . 'px !important; 
            display: flex;
            align-items: center;
            justify-content:center;
        }
    
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-time {  
             display: none !important;
        }  

        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-rail { 
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 180) . '; 
            padding: 0 !important;
        }

        .mejs-button, .mejs-time, .mejs-time-rail { 
            display: flex;
            align-items: center;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-total { 
            background: ' . $styledata[162] . ' !important; 
        }
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-current ,
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-total ,
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-loaded , 
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-buffering {
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 164) . ' !important;
            height: ' . $styledata[420] . 'px;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-hovered{
            display: none !important;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 80) . ' !important;
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-handle {
            ' . $show_progress_handle . ';
            position: absolute;
            width: ' . $styledata[196] . 'px;
            height: ' . $styledata[200] . 'px;
            left: ' . $styledata[204] . 'px;
            top: ' . $styledata[208] . 'px;
            background: ' . $styledata[212] . ';
            border:  ' . $styledata[214] . 'px ' . $styledata[215] . ';
            border-color: ' . $styledata[218] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 220) . ' !important;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-loaded { 
            background: ' . $styledata[236] . ' !important; 
        }
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-current { 
            background: ' . $styledata[238] . ' !important; 
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float {  
            width: ' . $styledata[264] . 'px;
            height: ' . $styledata[268] . 'px;
            font-size: ' . $styledata[242] . 'px;  
            ' . OxiAddonsFontSettings($styledata, 250) . ';
            color: ' . $styledata[248] . ';
            background: ' . $styledata[246] . '; 
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 272) . '; 
        }
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-time-float-current{
            width: ' . $styledata[264] . 'px;
            height: ' . $styledata[268] . 'px; 
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float-corner {   
            border-color: ' . $styledata[246] . ' transparent transparent; 
        }  
        .mejs-time-handle-content { 
            display: none !important;
        }

        .oxi-addons-wrapper-' . $oxiid . ' .mejs-mute button,
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-unmute button{   
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 310) . ' !important;
        }

        .oxi-addons-wrapper-' . $oxiid . ' .mejs-mute button::after,
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-unmute button::after{ 
            font-family: "Font Awesome\ 5 Free";
            font-size: ' . $styledata[288] . 'px;
            line-height: 1; 
            font-weight: 900;
            content: "\\' . $stylefiles[8] . '";
            position: absolute; 
            left: 0px;
            top: 0px;  
            color: ' . $styledata[292] . ' !important; 
        }
 
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-mute button::after { 
            content: "\\' . $stylefiles[10] . '"; 
            font-family: "Font Awesome\ 5 Free";  
            font-weight: 900;
            color: ' . $styledata[330] . ' !important;
            font-size: ' . $styledata[326] . 'px;  
        } 
        .oxi-addons-wrapper-' . $oxiid . ' .mejs-volume-button{
            font-size: 10px;
            height: 40px !important;
            line-height: 10px;
            margin: 0;
            width: 40px; 
        } 
        .oxi-addons-wrapper-' . $oxiid . '  .mejs-controls .mejs-horizontal-volume-slider{
            display: none !important;
        }
        

        @media only screen and (min-width : 669px) and (max-width : 993px){ 
            .oxi-addons-wrapper-' . $oxiid . '{  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 12) . '; 
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-main{
                max-width: ' . $styledata[8] . 'px;  
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-main{  
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 59) . ';   
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-img{ 
                max-width: ' . $styledata[409] . 'px;
                height: ' . $styledata[413] . 'px;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 457) . ';  
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title{ 
                font-size: ' . $styledata[479] . 'px;  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 491) . ';
               
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-author{ 
                font-size: ' . $styledata[507] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 519) . ';
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-container, 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-controls { 
                height: ' . $styledata[43] . 'px !important; 
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-playpause-button{  
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 97) . ';
                width: ' . $styledata[539] . 'px !important;
                height: ' . $styledata[535] . 'px !important; 
                left: ' . $styledata[389] . '% !important;
                 bottom: ' . $styledata[372] . '% !important;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-play button::after,
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-replay button::after,
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-pause button::after{  
                font-size: ' . $styledata[75] . 'px; 
            }
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-replay button::after {  
                font-size: ' . $styledata[75] . 'px;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-playpause-button > button { 
                height: ' . $styledata[75] . 'px !important; 
                width: ' . $styledata[75] . 'px !important; 
            }
         
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-pause button::after {  
                font-size: ' . $styledata[113] . 'px;
                height: ' . $styledata[75] . 'px !important; 
                width: ' . $styledata[75] . 'px !important;  
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-rail { 
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 181) . '; 
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-current ,
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-total ,
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-loaded , 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-buffering {
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 165) . ' !important;
                height: ' . $styledata[421] . 'px;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float{
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 81) . ' !important;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-handle { 
                width: ' . $styledata[197] . 'px;
                height: ' . $styledata[201] . 'px;
                left: ' . $styledata[205] . 'px;
                top: ' . $styledata[209] . 'px; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 221) . ' !important;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float {  
                width: ' . $styledata[265] . 'px;
                height: ' . $styledata[269] . 'px;
                font-size: ' . $styledata[243] . 'px;   
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 273) . '; 
            }
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-time-float-current{
                width: ' . $styledata[265] . 'px;
                height: ' . $styledata[269] . 'px;  
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-mute button,
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-unmute button{   
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 311) . ' !important ;
            }
    
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-mute button::after,
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-unmute button::after{  
                font-size: ' . $styledata[289] . 'px; 
            }
     
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-mute button::after {  
                font-size: ' . $styledata[327] . 'px;  
            }   
        }
        @media only screen and (max-width : 668px){
            .oxi-addons-wrapper-' . $oxiid . '{  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . '; 
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-main{
                max-width: ' . $styledata[9] . 'px;  
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-main{  
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 60) . ';   
                flex-direction: column;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-img{ 
                max-width: 100%;
                height: 100%;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 458) . ';  
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title{ 
                font-size: ' . $styledata[480] . 'px;  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 492) . ';
               
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-author{ 
                font-size: ' . $styledata[508] . 'px; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 520) . ';
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-container, 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-controls { 
                height: ' . $styledata[44] . 'px !important; 
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-playpause-button{  
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 98) . ';
                width: ' . $styledata[540] . 'px !important;
                height: ' . $styledata[536] . 'px !important;  
                position: static;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-play button::after,
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-replay button::after,
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-pause button::after{  
                font-size: ' . $styledata[76] . 'px !important; 
            }
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-replay button::after {  
                font-size: ' . $styledata[78] . 'px !important;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-playpause-button > button { 
                height: ' . $styledata[78] . 'px !important; 
                width: ' . $styledata[78] . 'px !important; 
            }
         
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-pause button::after {  
                font-size: ' . $styledata[114] . 'px !important;
                height: ' . $styledata[78] . 'px !important; 
                width: ' . $styledata[78] . 'px !important;  
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-rail { 
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 181) . '; 
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-current ,
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-total ,
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-loaded , 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-buffering {
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 166) . ' !important;
                height: ' . $styledata[422] . 'px !important;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float{
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 81) . ' !important;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-handle { 
                width: ' . $styledata[198] . 'px !important;
                height: ' . $styledata[202] . 'px !important;
                left: ' . $styledata[206] . 'px !important;
                top: ' . $styledata[210] . 'px !important; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 221) . ' !important;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-time-float {  
                width: ' . $styledata[266] . 'px !important;
                height: ' . $styledata[270] . 'px !important;
                font-size: ' . $styledata[244] . 'px !important;   
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 274) . '; 
            }
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-time-float-current{
                width: ' . $styledata[266] . 'px !important;
                height: ' . $styledata[270] . 'px !important;  
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-mute button,
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-unmute button{   
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 312) . ' !important;
            }
    
            .oxi-addons-wrapper-' . $oxiid . ' .mejs-mute button::after,
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-unmute button::after{  
                font-size: ' . $styledata[290] . 'px !important; 
            }
     
            .oxi-addons-wrapper-' . $oxiid . '  .mejs-mute button::after {  
                font-size: ' . $styledata[328] . 'px !important;  
            }   
        }
        ';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-mediaelement-min');
}
