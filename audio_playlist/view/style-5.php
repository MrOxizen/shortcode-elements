<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_audio_playlist_style_5_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo wp_enqueue_media();
    echo oxi_addons_elements_stylejs('skin/pink-flag/css/jplayer-pink-flag-min', 'audio_playlist', 'css');
    echo oxi_addons_elements_stylejs('jplayer-playlist-min', 'audio_playlist', 'js');
    echo oxi_addons_elements_stylejs('jquery-jplayer-min', 'audio_playlist', 'js');
    $css = '';
    $jquery = '';
    echo '<div class="oxi-addons-container"> ';
    echo '<div class="oxi-addons-row"> ';
    if ($user == 'admin') {
        echo '<div class="oxi-addons-show-playlist-' . $oxiid . '">
                <div class="oxi-addons-playlist">
                    <h1>For Delete and edit playlist</h1>
                    <ul class="oxi-ul">';
        foreach ($listdata as $value) {
            $data = explode('||#||', $value['files']);
            echo '<li class="  ' . OxiAddonsAdminDefine($user) . '"> ' . $data[3] . '';
            echo '  <div class="oxi-addons-admin-absulote">
                        <div class="oxi-addons-admin-absulate-edit">
                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditaudio_playlistdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                            </form>
                        </div>
                        <div class="oxi-addons-admin-absulate-delete">
                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteaudio_playlistdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                            </form>
                        </div>
                    </div>';
        }
        echo '</li>';
        echo ' </ul>
                </div>
            </div>';
    }
    $suffle_repeat = $volume_control = $player_control = $time_control = $progress = $playlist = $title = $repeat = $shuffle = '';

    $previous_type = $play_type = $pause_type = $stop_type = $next_type = $min_volume_type = $mute_volume_type = $max_volume_type = $repeat_type = $shuffle_type = '';
    if ($styledata[804] == 'regular') {
        $previous_type = 'font-weight: 500;';
    } else {
        $previous_type = 'font-weight: 900;';
    }
    if ($styledata[806] == 'regular') {
        $play_type = 'font-weight: 500;';
    } else {
        $play_type = 'font-weight: 900;';
    }
    if ($styledata[808] == 'regular') {
        $pause_type = 'font-weight: 500;';
    } else {
        $pause_type = 'font-weight: 900;';
    }
    if ($styledata[810] == 'regular') {
        $stop_type = 'font-weight: 500;';
    } else {
        $stop_type = 'font-weight: 900;';
    }
    if ($styledata[812] == 'regular') {
        $next_type = 'font-weight: 500;';
    } else {
        $next_type = 'font-weight: 900;';
    }
    if ($styledata[814] == 'regular') {
        $min_volume_type = 'font-weight: 500;';
    } else {
        $min_volume_type = 'font-weight: 900;';
    }
    if ($styledata[816] == 'regular') {
        $mute_volume_type = 'font-weight: 500;';
    } else {
        $mute_volume_type = 'font-weight: 900;';
    }
    if ($styledata[818] == 'regular') {
        $max_volume_type = 'font-weight: 500;';
    } else {
        $max_volume_type = 'font-weight: 900;';
    }
    if ($styledata[820] == 'regular') {
        $repeat_type = 'font-weight: 500;';
    } else {
        $repeat_type = 'font-weight: 900;';
    }
    if ($styledata[822] == 'regular') {
        $shuffle_type = 'font-weight: 500;';
    } else {
        $shuffle_type = 'font-weight: 900;';
    }

    if ($stylefiles[2] != '') {
        $title = '
              <h1 class="oxi-title">  ' . OxiAddonsTextConvert($stylefiles[2]) . ' </h1> 
        ';
    }
    if ($styledata[794] == 'true') {
        $repeat = '
              <button class="jp-repeat" role="button" tabindex="0"></button>
        ';
    }
    if ($styledata[796] == 'true') {
        $shuffle = '
              <button class="jp-shuffle" role="button" tabindex="0"></button>
        ';
    }
    if ($styledata[88] == 'true') {
        $suffle_repeat = '
            <div class="jp-toggles"> 
                ' . $shuffle . ' 
                    <div class="oxi-addons-main-title"> 
                        ' . $title . '
                            <div class="oxi-album-name"> </div>
                    </div>
              ' . $repeat . '
            </div>
        ';
    }
    if ($styledata[722] == 'true') {
        $progress = '
             <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                    </div>
            <button class="jp-volume-max" role="button" tabindex="0"></button> 
        ';
    }
    if ($styledata[86] == 'true') {
        $volume_control = '
            <div class="oxi-jp-main oxi-jp-main-' . $oxiid . '">
                <div class="jp-volume-controls">
                    <button class="jp-mute" role="button" tabindex="0"></button>
                    ' . $progress . '
                </div> 
            </div>
        ';
    }
    $previous = $play = $stop = $next = $audio_progress = '';
    if ($styledata[712] == 'true') {
        $previous = '
         <button class="jp-previous" role="button" tabindex="0"></button>
        ';
    }
    if ($styledata[714] == 'true') {
        $play = '
           <button class="jp-play" role="button" tabindex="0"></button>
        ';
    }
    if ($styledata[716] == 'true') {
        $stop = '
             <button class="jp-stop" role="button" tabindex="0"></button>
        ';
    }
    if ($styledata[718] == 'true') {
        $next = '
          <button class="jp-next" role="button" tabindex="0"></button>
        ';
    }
    if ($styledata[720] == 'true') {
        $audio_progress = '
          <div class="jp-progress">
                <div class="jp-seek-bar">
                    <div class="jp-play-bar"></div>
                </div>
            </div>
        ';
    }
    if ($styledata[84] == 'true') {
        $player_control = '
          <div class="jp-controls">
               ' . $previous . '
               ' . $play . '
               ' . $stop . '
               ' . $next . '  
            </div>  
        ';
    }
    if ($styledata[90] == 'true') {
        $time_control = '
           <div class="oxi-jp-time">
                <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                   ' . $audio_progress . '
                <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
            </div> 
        ';
    }
    if ($styledata[756] != 'true') {
        $playlist = 'playlist_hide';
    }
    echo '<div class="oxi-addons-wrapper-' . $oxiid . ' ' . OxiAddonsAnimation($styledata, 43) . '">
           <div class="oxi-addons-audio-playlist">
             <div id="jquery_jplayer_' . $oxiid . '" class="jp-jplayer"></div> 
                <div id="jp_container_' . $oxiid . '" class="jp-audio" role="application" aria-label="media player">
                 <div class="oxi-addons-audio-img"></div>   
                <div class="oxi-addons-audio-main">
                         <div class="jp-type-playlist">
                            <div class="jp-gui jp-interface"> 
                                     ' . $suffle_repeat . '  
                                <div class="oxi-addons-time-progress">
                                    ' . $time_control . '  
                                </div>
                              
                                <div class="oxi-addons-inline-controls">
                                    <div class="oxi-addons-show-playlist" id="show-playlist-' . $oxiid . '">
                                            ' . oxi_addons_font_awesome('' . $stylefiles[24] . '') . '
                                    </div>
                                    <div class="jp-controls-holder">
                                        ' . $player_control . ' 
                                    </div>  
                                    <div class="oxi-addons-volume-query">
                                            ' . $volume_control . '  
                                            <div id="oxi-addons-volume-' . $oxiid . '" class="oxi-addons-volume"></div>
                                    </div> 
                                </div>
                            </div>
                             <div class="jp-playlist jp-playlist-' . $oxiid . ' ' . $playlist . '">
                                    <ul>
                                        <li>&nbsp;</li>
                                    </ul>
                                </div>
                            <div class="jp-no-solution">
                                <span>Update Required</span>
                                To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
         </div>
    </div>
</div>
        ';

    $jquery .= '
    var myPlaylist = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_' . $oxiid . '",
        cssSelectorAncestor: "#jp_container_' . $oxiid . '", 
	}, [  
        '
?>
    <?php

    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $jquery .= '		{
                            title:"' . OxiAddonsTextConvert($data[3]) . '",
                            mp3:"' . OxiAddonsUrlConvert($data[1]) . '", 
                        },  
            '
    ?>
        <?php

    }
    $jquery .= '
        ], {
            supplied: "mp3",
            wmode: "window",
            useStateClassSkin: true,
            autoBlur: false, 
            keyEnabled: true,  
             verticalVolume: true, 
            play: function(e) {
                jQuery("#jp_container_' . $oxiid . ' .oxi-album-name").html(e.jPlayer.status.media.title);
		},
		ready: function(){
                var getCurrentSong = jQuery("#jp_container_' . $oxiid . '").find(".jp-playlist-item.jp-playlist-current").text();
		    jQuery("#jp_container_' . $oxiid . ' .oxi-album-name").html(getCurrentSong);
		},
            audioFullScreen: true
        });    
    ';

    $jquery .= '
        jQuery("#oxi-addons-volume-' . $oxiid . '").on("click",function(){
            jQuery(".oxi-jp-main-' . $oxiid . '").fadeToggle(100);
        });
        jQuery("#show-playlist-' . $oxiid . ' > .oxi-icons").on("click",function(){
            jQuery(".jp-playlist-' . $oxiid . '").slideToggle(100);
        });
 ';
    $css .= '.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-inline-controls{
                display: flex;
                float: left;
                width: 100%
            }
          .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-show-playlist{
                float: left;
                width: 100%;
                display: flex;
                align-items: center;
            }
          .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-show-playlist > .oxi-icons{
                 color: ' . $styledata[828] . ';
                 font-size: ' . $styledata[824] . 'px;
                 cursor: pointer;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-time-progress{ 
                 width: 100%;
                 float: left; 
            }
           .oxi-addons-wrapper-' . $oxiid . ' .playlist_hide {
                display: none;
            }
            .oxi-addons-show-playlist-' . $oxiid . ' {
                    width: 100%;
                    float: left;
                    display: flex;
                    justify-content: center;
                    position: relative;
                } 
            .oxi-addons-show-playlist-' . $oxiid . '  .oxi-addons-playlist {
                max-width: 500px;
                width: 100%; 
                border: 1px solid #f0f0f0;
                padding: 10px;
                box-shadow: 0px 4px 5px -3px #5c5c5c80;
                clear: both;
                float: left;
                }
            .oxi-addons-show-playlist-' . $oxiid . '  .oxi-addons-playlist > h1{
                    width: 100%;
                    float: left;
                    font-size: 22px;
                    text-transform: capitalize;
                    text-align: center; 
                    font-weight: bold;
                    color: #494949;
                    margin-bottom: 15px;
            }
            .oxi-addons-show-playlist-' . $oxiid . '  .oxi-addons-playlist .oxi-ul{
                    list-style: none;
                    width: 100%; 
                    float: left; 
                    margin: 0;
                    padding: 0; 
            }
            .oxi-addons-show-playlist-' . $oxiid . '  .oxi-addons-playlist .oxi-ul li{
                 background: #f6f6f6;
                 padding: 5px 10px;
                 color: #333;
            } 
            .oxi-addons-wrapper-' . $oxiid . '{ 
                width: 100%;
                float: left; 
                display: flex;
                justify-content:center; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 11) . '; 
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist{
                max-width: ' . $styledata[7] . 'px;
                width: 100%;  
                ' . OxiAddonsBoxShadowSanitize($styledata, 48) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 27) . ';  
                overflow: hidden;
                position: relative;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-main{
                width: 100%;
                float: left;       
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-controls button,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-toggles button,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-controls button { 
                text-indent: 0px !important; 
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .jp-audio, .jp-audio-stream{ 
                border-top: 0px solid #554461;
                border-left: 0px solid #554461; 
                border-right: 0px solid #180a1f;
                border-bottom: 0px solid #180a1f; 
                background-color: #a63eee;
                padding: 0px;
                width: 100%;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-interface {
                position: static;
                width: 100%; 
                background: ' . $styledata[82] . ' !important; 
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 696) . ';
                overflow: hidden;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-controls {
                background: none;
                  padding: 0;
                overflow: hidden;
                width: 100%;
                height: auto;
                display: flex; 
                justify-content: center;
                align-items: center;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar-value{
                position: relative; 
            } 

            .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute:focus,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-state-muted .jp-volume-controls .jp-mute,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-state-muted .jp-volume-controls .jp-mute:focus,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-repeat ,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-repeat:focus ,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-state-looped .jp-repeat:focus, 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle:focus,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-state-shuffled .jp-shuffle:focus,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-controls .jp-volume-max,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-controls .jp-volume-max:focus,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous:focus,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-state-playing div.jp-type-playlist .jp-play,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-state-playing div.jp-type-playlist .jp-play:focus,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play:focus,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop:focus,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next:focus {
                background: none;
                position: relative;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute{
                background: ' . $styledata[430] . ' !important;
                top: 0;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 432) . ';
                width: ' . $styledata[422] . 'px;
                height: ' . $styledata[426] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 404) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute::before{
                content: "\\' . $stylefiles[14] . '";
                font-family: "Font Awesome\ 5 Free";  
                ' . $min_volume_type . '
                color: ' . $styledata[402] . ' !important; 
                font-size: ' . $styledata[398] . 'px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%); 
            }  
                .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls, .jp-audio-stream .jp-volume-controls {
                height: auto;
                display: flex;
                width: 100%;
                justify-content: space-around;
                justify-content: center; 
                flex-direction: column-reverse; 
                align-items: center;
            }
            .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-volume-query{ 
                width: 100%; 
                float: left; 
                display: flex; 
                align-items: center; 
                justify-content: flex-end; 
                position: relative;
            }
            .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-volume-query > .oxi-jp-main{  
                position: absolute;
                bottom: 50px; 
                right: -2px;
                display: none;
            } 
            .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-volume::before{
                content: "\\' . $stylefiles[22] . '";
                font-family: "Font Awesome\ 5 Free";  
                ' . $max_volume_type . '
                color: ' . $styledata[452] . ' !important; 
                font-size: ' . $styledata[448] . 'px; 
                cursor:pointer;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-state-muted .jp-volume-controls .jp-mute::before{
                content: "\\' . $stylefiles[16] . '";
                     ' . $mute_volume_type . '
                color: ' . $styledata[420] . ' !important; 
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-volume-max, .jp-audio-stream .jp-volume-controls .jp-volume-max{
                background: ' . $styledata[478] . ' !important;
                top: 0;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 480) . ';
                width: ' . $styledata[470] . 'px;
                height: ' . $styledata[474] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 454) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-controls .jp-volume-max::before{
                content: "\\' . $stylefiles[22] . '";
                font-family: "Font Awesome\ 5 Free";  
                ' . $max_volume_type . '
                color: ' . $styledata[452] . ' !important; 
                font-size: ' . $styledata[448] . 'px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%); 
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-controls .jp-volume-max:focus::before{ 
                color: ' . $styledata[694] . ' !important; 
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar {
                background: ' . $styledata[504] . ';
                position: static;
                width: ' . $styledata[496] . 'px;
                height: ' . $styledata[500] . 'px;
                max-width: 100%;
                padding: 0 !important;
                overflow: hidden;
                cursor: pointer;
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 506) . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 522) . ';
                  display: flex;
                flex-direction: column-reverse;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar-value {
                background: ' . $styledata[538] . ';
                height: ' . $styledata[500] . 'px;
            }
            .oxi-addons-wrapper-' . $oxiid . '  .jp-audio .jp-controls-holder { 
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                width: 100%;
                float: left;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-jp-time{
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .oxi-addons-wrapper-' . $oxiid . '  .jp-current-time { 
                width: auto;  
                font-size: ' . $styledata[342] . 'px;
                ' . OxiAddonsFontSettings($styledata, 346) . ';
                color: ' . $styledata[352] . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 354) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-duration {
                width: auto;
                font-size: ' . $styledata[370] . 'px;
                ' . OxiAddonsFontSettings($styledata, 374) . ';
                color: ' . $styledata[380] . ';
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 382) . ';
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .jp-playlist-item{
                display: block;
            }  
        

 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous{
                background: ' . $styledata[126] . ' !important; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 128) . ';
                width: ' . $styledata[118] . 'px;
                height: ' . $styledata[122] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';
                    ' . OxiAddonsBoxShadowSanitize($styledata, 758) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous::before{
                content: "\\' . $stylefiles[4] . '";
                font-family: "Font Awesome\ 5 Free";  
                ' . $previous_type . '
                color: ' . $styledata[98] . ' !important; 
                font-size: ' . $styledata[94] . 'px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%); 
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous:focus::before{ 
                color: ' . $styledata[100] . ' !important; 
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-state-playing div.jp-type-playlist .jp-play {
                background: ' . $styledata[178] . ' !important; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 180) . ';
                width: ' . $styledata[170] . 'px;
                height: ' . $styledata[174] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 152) . ';
                    ' . OxiAddonsBoxShadowSanitize($styledata, 764) . ';
            } 

            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play::before,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-state-playing div.jp-type-playlist .jp-play::before {
                content: "\\' . $stylefiles[6] . '";
                font-family: "Font Awesome\ 5 Free";  
                ' . $play_type . '
                color: ' . $styledata[148] . ' !important; 
                font-size: ' . $styledata[144] . 'px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%); 
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .jp-state-playing div.jp-type-playlist .jp-play::before{
                content: "\\' . $stylefiles[8] . '";
                 ' . $pause_type . '
                color: ' . $styledata[168] . ' !important; 
            }   
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop:focus{
                background: ' . $styledata[228] . ' !important; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 230) . ';
                width: ' . $styledata[220] . 'px;
                height: ' . $styledata[224] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 204) . ';
                    ' . OxiAddonsBoxShadowSanitize($styledata, 770) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop::before,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop:focus::before {
                content: "\\' . $stylefiles[10] . '";
                font-family: "Font Awesome\ 5 Free";  
                ' . $stop_type . '
                color: ' . $styledata[200] . ' !important; 
                font-size: ' . $styledata[196] . 'px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%); 
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop:focus::before{  
                color: ' . $styledata[202] . ' !important; 
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next:focus{
                background: ' . $styledata[278] . ' !important; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 280) . ';
                width: ' . $styledata[270] . 'px;
                height: ' . $styledata[274] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 254) . ';
                    ' . OxiAddonsBoxShadowSanitize($styledata, 776) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next::before,
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next:focus::before {
                content: "\\' . $stylefiles[12] . '";
                font-family: "Font Awesome\ 5 Free";  
                ' . $next_type . '
                color: ' . $styledata[250] . ' !important; 
                font-size: ' . $styledata[246] . 'px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%); 
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next:focus::before{ 
                color: ' . $styledata[252] . ' !important; 
            } 

            .oxi-addons-wrapper-' . $oxiid . ' .jp-repeat{
                background: ' . $styledata[572] . ' !important; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 574) . ';
                width: ' . $styledata[564] . 'px;
                height: ' . $styledata[568] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 548) . ';
                    ' . OxiAddonsBoxShadowSanitize($styledata, 782) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-repeat::before{ 
                content: "\\' . $stylefiles[18] . '";
                font-family: "Font Awesome\ 5 Free";  
                ' . $repeat_type . '
                color: ' . $styledata[544] . ' !important; 
                font-size: ' . $styledata[540] . 'px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%); 
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-repeat:focus::before{  
                color: ' . $styledata[546] . ' !important; 
            }

            .oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle{
                background: ' . $styledata[622] . ' !important; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 624) . ';
                width: ' . $styledata[614] . 'px;
                height: ' . $styledata[618] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 598) . ';
                    ' . OxiAddonsBoxShadowSanitize($styledata, 788) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle::before{ 
                content: "\\' . $stylefiles[20] . '";
                font-family: "Font Awesome\ 5 Free";  
                ' . $shuffle_type . '
                color: ' . $styledata[594] . ' !important; 
                font-size: ' . $styledata[590] . 'px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%); 
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle:focus::before{  
                color: ' . $styledata[596] . ' !important; 
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-controls-holder {
                 height: auto !important; 
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-toggles {
                width: 100%;
                display: flex;
                justify-content: space-between;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-progress {
                background: ' . $styledata[304] . ' !important; 
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 306) . ';
                width: ' . $styledata[296] . 'px;
                height: ' . $styledata[300] . 'px;
                margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 322) . ';
                overflow: hidden;
                padding: 0 !important;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-seek-bar {
                background: ' . $styledata[338] . ' !important; 
                width: 0;
                height: 100%;
                overflow: hidden;
                cursor: pointer;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .jp-play-bar {
                background: ' . $styledata[340] . ' !important;  
                width: 0;
                height: 100%;
                overflow: hidden;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-playlist{
                background: ' . $styledata[640] . ' !important;  
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 642) . ';
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-playlist li {
                position: relative;
                background: ' . $styledata[658] . ' !important;   
                ' . OxiAddonsFontSettings($styledata, 662) . '; 
                border-top: none;
                border-bottom: none;
                overflow: hidden;
                margin: 0;
                padding: 0 !important;
            } 
            .oxi-addons-wrapper-' . $oxiid . ' .jp-playlist li .jp-playlist-item{  
                font-size: ' . $styledata[724] . 'px;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 668) . '!important;
                color: ' . $styledata[660] . ' !important;  
            }   
            .oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current {
                background: ' . $styledata[686] . ' !important;   
                margin: 0px; 
                border-top: none;
                border-bottom: none;
                position: relative;
            }
            .oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current::before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                width: ' . $styledata[798] . 'px;
                height: 100%;
                background: ' . $styledata[802] . '; 
            }
            .oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current a.jp-playlist-current {
                color: ' . $styledata[688] . '!important;  
                font-size: ' . $styledata[724] . 'px;
            }
            .oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist .jp-playlist-item:hover {
                color: ' . $styledata[684] . ' !important;   
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-img{ 
              width: 100%;
                float: left; 
                position: relative;
                ' . OxiAddonsBGImage($styledata, 3) . '; 
                background-position: center center;  
                max-height: 100%;
                display: flex; 
                align-items: center;
                flex-direction: column;
                justify-content: flex-end;
                height: ' . $styledata[690] . 'px;
            }  
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-img .oxi-addons-img{
                width: 100%;
                height: 100%;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-main-title{
                width: 100%;
                float: left;
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-title{
                width: 100%;
                float: left;
                font-size: ' . $styledata[54] . 'px;
                ' . OxiAddonsFontSettings($styledata, 58) . ';
                color: ' . $styledata[64] . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 66) . ';
            }
            .oxi-addons-wrapper-' . $oxiid . ' .oxi-album-name{
                width: 100%;
                float: left;
                font-size: ' . $styledata[728] . 'px;
                ' . OxiAddonsFontSettings($styledata, 732) . ';
                color: ' . $styledata[738] . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 740) . ';
            }


            @media only screen and (min-width : 669px) and (max-width : 993px){ 
                 .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-show-playlist > .oxi-icons{ 
                 font-size: ' . $styledata[825] . 'px;
             }
                .oxi-addons-wrapper-' . $oxiid . '{ 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 12) . '; 
                }
                .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist{
                    max-width: ' . $styledata[8] . 'px;
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 28) . ';  
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .jp-interface { 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 93) . ';
                }   
                .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 433) . ';
                    width: ' . $styledata[423] . 'px;
                    height: ' . $styledata[427] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 405) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute::before{ 
                    font-size: ' . $styledata[399] . 'px; 
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-volume-max, .jp-audio-stream .jp-volume-controls .jp-volume-max{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 481) . ';
                    width: ' . $styledata[471] . 'px;
                    height: ' . $styledata[475] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 455) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-controls .jp-volume-max::before{ 
                    font-size: ' . $styledata[449] . 'px; 
                }   
                .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar { 
                    width: ' . $styledata[497] . 'px;
                    height: ' . $styledata[501] . 'px; 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 507) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 523) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar-value { 
                    height: ' . $styledata[501] . 'px;
                } 
                .oxi-addons-wrapper-' . $oxiid . '  .jp-current-time {  
                    font-size: ' . $styledata[343] . 'px;  
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 355) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-duration { 
                    font-size: ' . $styledata[371] . 'px;  
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 383) . ';
                }    
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
                    width: ' . $styledata[119] . 'px;
                    height: ' . $styledata[123] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous::before{ 
                    font-size: ' . $styledata[95] . 'px; 
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-state-playing div.jp-type-playlist .jp-play { 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 181) . ';
                    width: ' . $styledata[171] . 'px;
                    height: ' . $styledata[175] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 153) . ';
                } 
    
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play::before,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-state-playing div.jp-type-playlist .jp-play::before { 
                    font-size: ' . $styledata[145] . 'px; 
                }   
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop:focus{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 231) . ';
                    width: ' . $styledata[221] . 'px;
                    height: ' . $styledata[225] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 205) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop::before,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop:focus::before { 
                    font-size: ' . $styledata[197] . 'px; 
                }  
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next:focus{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 281) . ';
                    width: ' . $styledata[271] . 'px;
                    height: ' . $styledata[275] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 255) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next::before,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next:focus::before { 
                    font-size: ' . $styledata[247] . 'px; 
                }  
                .oxi-addons-wrapper-' . $oxiid . ' .jp-repeat{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 575) . ';
                    width: ' . $styledata[565] . 'px;
                    height: ' . $styledata[569] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 549) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-repeat::before{  
                    font-size: ' . $styledata[541] . 'px; 
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 625) . ';
                    width: ' . $styledata[615] . 'px;
                    height: ' . $styledata[619] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 599) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle::before{  
                    font-size: ' . $styledata[591] . 'px; 
                }   
                .oxi-addons-wrapper-' . $oxiid . ' .jp-progress { 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 307) . ';
                    width: ' . $styledata[297] . 'px;
                    height: ' . $styledata[301] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 323) . '; 
                }   
                .oxi-addons-wrapper-' . $oxiid . ' .jp-playlist{  
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 643) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-playlist li {   
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 669) . ' !important; 
                } 
                .oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current { 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 669) . '; 
                } 
                .oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current a.jp-playlist-current {
                    font-size: ' . $styledata[725] . 'px;
                }
                
                .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-img{ 
                    height: ' . $styledata[691] . 'px;
                }  
                .oxi-addons-wrapper-' . $oxiid . ' .oxi-title{ 
                    font-size: ' . $styledata[55] . 'px; 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 67) . ';
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .oxi-album-name{ 
                    font-size: ' . $styledata[729] . 'px; 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 741) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current::before { 
                    width: ' . $styledata[799] . 'px; 
                }
            }
            @media only screen and (max-width : 668px){
                 .oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-show-playlist > .oxi-icons{ 
                    font-size: ' . $styledata[826] . 'px;
                }
                .oxi-addons-wrapper-' . $oxiid . '{ 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . '; 
                }
                .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist{
                    max-width: ' . $styledata[9] . 'px;
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';  
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .jp-interface { 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 94) . ';
                }   
                .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 434) . ';
                    width: ' . $styledata[424] . 'px;
                    height: ' . $styledata[428] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 406) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute::before{ 
                    font-size: ' . $styledata[400] . 'px; 
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-volume-max, .jp-audio-stream .jp-volume-controls .jp-volume-max{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 482) . ';
                    width: ' . $styledata[472] . 'px;
                    height: ' . $styledata[476] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 456) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-controls .jp-volume-max::before{ 
                    font-size: ' . $styledata[450] . 'px; 
                }   
                .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar { 
                    width: ' . $styledata[498] . 'px;
                    height: ' . $styledata[502] . 'px; 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 508) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 524) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar-value { 
                    height: ' . $styledata[502] . 'px;
                } 
                .oxi-addons-wrapper-' . $oxiid . '  .jp-current-time {  
                    font-size: ' . $styledata[344] . 'px;  
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 356) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-duration { 
                    font-size: ' . $styledata[372] . 'px;  
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 384) . ';
                }    
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 130) . ';
                    width: ' . $styledata[120] . 'px;
                    height: ' . $styledata[124] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 104) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous::before{ 
                    font-size: ' . $styledata[96] . 'px; 
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-state-playing div.jp-type-playlist .jp-play { 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 182) . ';
                    width: ' . $styledata[172] . 'px;
                    height: ' . $styledata[176] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 154) . ';
                } 
    
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play::before,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-state-playing div.jp-type-playlist .jp-play::before { 
                    font-size: ' . $styledata[146] . 'px; 
                }   
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop:focus{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 232) . ';
                    width: ' . $styledata[222] . 'px;
                    height: ' . $styledata[226] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 206) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop::before,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop:focus::before { 
                    font-size: ' . $styledata[198] . 'px; 
                }  
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next:focus{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 282) . ';
                    width: ' . $styledata[272] . 'px;
                    height: ' . $styledata[276] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 256) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next::before,
                .oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next:focus::before { 
                    font-size: ' . $styledata[248] . 'px; 
                }  
                .oxi-addons-wrapper-' . $oxiid . ' .jp-repeat{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 576) . ';
                    width: ' . $styledata[566] . 'px;
                    height: ' . $styledata[570] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 550) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-repeat::before{  
                    font-size: ' . $styledata[542] . 'px; 
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle{ 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 626) . ';
                    width: ' . $styledata[616] . 'px;
                    height: ' . $styledata[620] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 600) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle::before{  
                    font-size: ' . $styledata[592] . 'px; 
                }   
                .oxi-addons-wrapper-' . $oxiid . ' .jp-progress { 
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 308) . ';
                    width: ' . $styledata[298] . 'px;
                    height: ' . $styledata[302] . 'px;
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 324) . '; 
                }   
                .oxi-addons-wrapper-' . $oxiid . ' .jp-playlist{  
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 644) . ';
                }
                .oxi-addons-wrapper-' . $oxiid . ' .jp-playlist li {   
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 670) . ' !important; 
                } 
                .oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current { 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 670) . '; 
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-img{ 
                      height: ' . $styledata[692] . 'px;
                }  
                .oxi-addons-wrapper-' . $oxiid . ' .oxi-title{ 
                    font-size: ' . $styledata[56] . 'px; 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 68) . ';
                } 
                .oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current a.jp-playlist-current {
                    font-size: ' . $styledata[726] . 'px;
                } 
                .oxi-addons-wrapper-' . $oxiid . ' .oxi-album-name{ 
                    font-size: ' . $styledata[730] . 'px; 
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 742) . ';
                }
                 .oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current::before { 
                    width: ' . $styledata[800] . 'px; 
                }
            } ';
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-jquery-jplayer-min');
}
