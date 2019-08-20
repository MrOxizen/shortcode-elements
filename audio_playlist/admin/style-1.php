<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-eventwidgets-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . OxiAddonsBGImageSanitize('OxiAddonsAudioPlaylist-G-BG') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-G-W') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-G-R') . ''
            . ' ' . oxi_addons_adm_help_animation_senitize('OxiAddonsAudioPlaylist-G-Animation') . '|'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAudioPlaylist-G-BS') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-title-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAudioPlaylist-title-F') . ''
            . ' OxiAddonsAudioPlaylist-title-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-title-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-title-P') . ''
            . ' OxiAddonsAudioPlaylist-audio-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-audio-BG']) . '|'
            . ' OxiAddonsAudioPlaylist-audio-play-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-audio-play-controls']) . '|'
            . ' OxiAddonsAudioPlaylist-audio-volume-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-audio-volume-controls']) . '|'
            . ' OxiAddonsAudioPlaylist-audio-shuffle-repeat |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-audio-shuffle-repeat']) . '|'
            . ' OxiAddonsAudioPlaylist-audio-time-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-audio-time-controls']) . '|'
            . '||'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-PBS-FS') . ''
            . ' OxiAddonsAudioPlaylist-PBS-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-PBS-C']) . '|'
            . ' OxiAddonsAudioPlaylist-PBS-active-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-PBS-active-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-PBS-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-PBS-Back-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-PBS-Back-H') . ''
            . ' OxiAddonsAudioPlaylist-PBS-back-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-PBS-back-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-PBS-Back-BR') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-play-FS') . ''
            . ' OxiAddonsAudioPlaylist-play-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-play-C']) . '|'
            . '||'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-play-M') . ''
            . ' OxiAddonsAudioPlaylist-pause-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-pause-C']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-play-pause-Back-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-play-pause-Back-H') . ''
            . ' OxiAddonsAudioPlaylist-play-pause-back-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-play-pause-back-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-play-pause-back-BR') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-stop-FS') . ''
            . ' OxiAddonsAudioPlaylist-stop-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-stop-C']) . '|'
            . ' OxiAddonsAudioPlaylist-stop-active-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-stop-active-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-stop-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-stop-Back-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-stop-Back-H') . ''
            . ' OxiAddonsAudioPlaylist-stop-back-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-stop-back-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-stop-back-BR') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-next-FS') . ''
            . ' OxiAddonsAudioPlaylist-next-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-next-C']) . '|'
            . ' OxiAddonsAudioPlaylist-next-active-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-next-active-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-next-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-next-Back-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-next-Back-H') . ''
            . ' OxiAddonsAudioPlaylist-next-back-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-next-back-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-next-back-BR') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-progress-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-progress-H') . ''
            . ' OxiAddonsAudioPlaylist-progress-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-progress-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-progress-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-progress-M') . ''
            . ' OxiAddonsAudioPlaylist-loding |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-loding']) . '|'
            . ' OxiAddonsAudioPlaylist-current-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-current-BG']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-current-time-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAudioPlaylist-current-time-F') . ''
            . ' OxiAddonsAudioPlaylist-current-time-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-current-time-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-current-time-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-duration-time-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAudioPlaylist-duration-time-F') . ''
            . ' OxiAddonsAudioPlaylist-duration-time-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-duration-time-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-duration-time-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-PV-min-FS') . ''
            . ' OxiAddonsAudioPlaylist-PV-min-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-PV-min-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-PV-min-M') . ''
            . ' OxiAddonsAudioPlaylist-mute-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-mute-C']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-min-V-Back-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-min-V-Back-H') . ''
            . ' OxiAddonsAudioPlaylist-min-V-back-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-min-V-back-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-min-V-back-BR') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-PV-max-FS') . ''
            . ' OxiAddonsAudioPlaylist-PV-max-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-PV-max-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-PV-max-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-max-V-Back-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-max-V-Back-H') . ''
            . ' OxiAddonsAudioPlaylist-max-V-back-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-max-V-back-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-max-V-back-BR') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-V-progress-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-V-progress-H') . ''
            . ' OxiAddonsAudioPlaylist-v-progress-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-v-progress-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-v-progress-R') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-v-progress-M') . ''
            . ' OxiAddonsAudioPlaylist-v-progress-active-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-v-progress-active-BG']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-repeat-FS') . ''
            . ' OxiAddonsAudioPlaylist-repeat-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-repeat-C']) . '|'
            . ' OxiAddonsAudioPlaylist-repeat-active-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-repeat-active-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-repeat-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-repeat-Back-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-repeat-Back-H') . ''
            . ' OxiAddonsAudioPlaylist-repeat-back-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-repeat-back-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-repeat-back-BR') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-shuffle-FS') . ''
            . ' OxiAddonsAudioPlaylist-shuffle-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-shuffle-C']) . '|'
            . ' OxiAddonsAudioPlaylist-shuffle-active-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-shuffle-active-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-shuffle-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-shuffle-Back-W') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-shuffle-Back-H') . ''
            . ' OxiAddonsAudioPlaylist-shuffle-back-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-shuffle-back-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-shuffle-back-BR') . ''
            . ' OxiAddonsAudioPlaylist-playlist-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-playlist-BG']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-playlist-P') . ''
            . ' OxiAddonsAudioPlaylist-playlist-item-BG |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-playlist-item-BG']) . '|'
            . ' OxiAddonsAudioPlaylist-playlist-item-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-playlist-item-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAudioPlaylist-playlist-item-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-playlist-item-P') . ''
            . ' OxiAddonsAudioPlaylist-playlist-item-hover |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-playlist-item-hover']) . '|'
            . ' OxiAddonsAudioPlaylist-playlist-item-Bg |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-playlist-item-Bg']) . '|'
            . ' OxiAddonsAudioPlaylist-playlist-item-color |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-playlist-item-color']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-FR-height') . ''
            . ' OxiAddonsAudioPlaylist-PV-max-active-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-PV-max-active-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-audio-padding') . ''
            . ' OxiAddonsAudioPlaylist-Prev-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-Prev-controls']) . '|'
            . ' OxiAddonsAudioPlaylist-play-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-play-controls']) . '|'
            . ' OxiAddonsAudioPlaylist-Stop-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-Stop-controls']) . '|'
            . ' OxiAddonsAudioPlaylist-Next-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-Next-controls']) . '|'
            . ' OxiAddonsAudioPlaylist-progress-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-progress-controls']) . '|'
            . ' OxiAddonsAudioPlaylist-V-progress-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-V-progress-controls']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-playlist-item-FS') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-subtitle-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsAudioPlaylist-subtitle-F') . ''
            . ' OxiAddonsAudioPlaylist-subtitle-C |' . sanitize_hex_color($_POST['OxiAddonsAudioPlaylist-subtitle-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAudioPlaylist-subtitle-P') . ''
            . ' OxiAddonsAudioPlaylist-audio-playlist-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-audio-playlist-controls']) . '|'
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAudioPlaylist-PBS-BS') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAudioPlaylist-play-BS') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAudioPlaylist-stop-BS') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAudioPlaylist-next-BS') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAudioPlaylist-repeat-BS') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAudioPlaylist-shuffle-BS') . ''
            . ' OxiAddonsAudioPlaylist-repeat-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-repeat-controls']) . '|'
            . ' OxiAddonsAudioPlaylist-shuffle-controls |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-shuffle-controls']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAudioPlaylist-playlist-line-width') . ''
            . ' OxiAddonsAudioPlaylist-playlist-line-color |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-playlist-line-color']) . '|'
            . ' OxiAddonsAudioPlaylist-icon-type-previous |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-icon-type-previous']) . '|'
            . ' OxiAddonsAudioPlaylist-icon-type-play |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-icon-type-play']) . '|'
            . ' OxiAddonsAudioPlaylist-icon-type-pause |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-icon-type-pause']) . '|'
            . ' OxiAddonsAudioPlaylist-icon-type-stop |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-icon-type-stop']) . '|'
            . ' OxiAddonsAudioPlaylist-icon-type-next |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-icon-type-next']) . '|'
            . ' OxiAddonsAudioPlaylist-icon-type-min-volume |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-icon-type-min-volume']) . '|'
            . ' OxiAddonsAudioPlaylist-icon-type-mute-volume |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-icon-type-mute-volume']) . '|'
            . ' OxiAddonsAudioPlaylist-icon-type-max-volume |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-icon-type-max-volume']) . '|'
            . ' OxiAddonsAudioPlaylist-icon-type-repeat |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-icon-type-repeat']) . '|'
            . ' OxiAddonsAudioPlaylist-icon-type-shuffle |' . sanitize_text_field($_POST['OxiAddonsAudioPlaylist-icon-type-shuffle']) . '|'
            . '||#||'
            . ' OxiAddonsAudioPlaylist-title-TA ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-title-TA']) . '||#|| '
            . ' OxiAddonsAudioPlaylist-PBS-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-PBS-I']) . '||#|| '
            . ' OxiAddonsAudioPlaylist-play-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-play-I']) . '||#|| '
            . ' OxiAddonsAudioPlaylist-pause-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-pause-I']) . '||#|| '
            . ' OxiAddonsAudioPlaylist-stop-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-stop-I']) . '||#|| '
            . ' OxiAddonsAudioPlaylist-next-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-next-I']) . '||#|| '
            . ' OxiAddonsAudioPlaylist-PV-min-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-PV-min-I']) . '||#|| '
            . ' OxiAddonsAudioPlaylist-mute-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-mute-I']) . '||#|| '
            . ' OxiAddonsAudioPlaylist-repeat-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-repeat-I']) . '||#|| '
            . ' OxiAddonsAudioPlaylist-shuffle-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-shuffle-I']) . '||#|| '
            . ' OxiAddonsAudioPlaylist-PV-max-I ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudioPlaylist-PV-max-I']) . '||#|| '
            . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

$listid = '';
$listitemdata = $bgdata = array("", "", "", "", "", "", "", "", "", "", "", "");
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int)$_POST['oxilistid'];
        $data = '   OxiAddonsAudio-upload-audio ||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddonsAudio-upload-audio']) . '||#||'
            . ' OxiAddonsAudio-subtitle ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsAudio-subtitle']) . '||#|| '
            . '  ||#||';
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
        $item_id = (int)$_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileEdit' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
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
// echo '<pre>';
// print_r($styledata);
// echo '</pre>';
?>
<div class="wrap">
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li ref="#oxi-addons-tabs-2">Audio Player Setting</li>
                                <li ref="#oxi-addons-tabs-3">Audio PlayList Setting</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-G-W', $styledata[7], $styledata[8], $styledata[9], 1, 'Max Width', 'Set audio body max width', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist', 'max-width');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-G-P', 11, $styledata, 1, 'Padding', 'Set Audio Body area  padding', 'false', '.oxi-addons-wrapper-' . $oxiid . '', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-G-R', 27, $styledata, 1, 'Border-radius', 'Set Audio Body Area Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsAudioPlaylist-G-Animation', 43, $styledata, 'true', 'oxi-addons-wrapper-' . $oxiid . '');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsAudioPlaylist-G-BS', 48, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Audio Title
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textarea('OxiAddonsAudioPlaylist-title-TA', $stylefiles[2], 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-title');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-title-FS', $styledata[54], $styledata[55], $styledata[56], '2', 'Font Size', 'Set Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-title-C', $styledata[64], '', 'Color', 'Set Audio title  text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAudioPlaylist-title-F', 58, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-title-P', 66, $styledata, 1, 'Padding', 'Set Audio title  Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Audio Sub Title
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-subtitle-FS', $styledata[728], $styledata[55], $styledata[56], '2', 'Font Size', 'Set Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-album-name', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-subtitle-C', $styledata[738], '', 'Color', 'Set Audio subtitle  text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-album-name', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAudioPlaylist-subtitle-F', 732, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-album-name');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-subtitle-P', 740, $styledata, 1, 'Padding', 'Set Audio subtitle  Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-album-name', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Front Image
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsAudioPlaylist-G-BG', $styledata, 3, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-FR-height', $styledata[690], $styledata[691], $styledata[692], '2', 'Max Height', 'Set Your Image Max height by Percent', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-img::after', 'max-height');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6">

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Upload Audio and setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-audio-BG', $styledata[82], 'rgba', 'Background Color', 'Set Previous Icon background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-interface', 'background');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-audio-play-controls', $styledata[84], 'True', 'true', 'False', 'false', 'Player Control', 'Audio Player Play, Pause, Stop controls Button Show or not', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-audio-playlist-controls', $styledata[756], 'True', 'true', 'False', 'false', 'Playlist Control', 'Audio Play Pause controls Button Show or not', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-audio-volume-controls', $styledata[86], 'True', 'true', 'False', 'false', 'Volume Control', 'Audio Play volume controls Show or not', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-audio-shuffle-repeat', $styledata[88], 'True', 'true', 'False', 'false', 'Shuffle & Repeat', 'Audio Shuffle & repeat controls show or not', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-audio-time-controls', $styledata[90], 'True', 'true', 'False', 'false', 'Time Controls', 'Audio Play list Time control show or not', 'true');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-audio-padding', 696, $styledata, 1, 'Padding', 'Set Audio playbody and playlist padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-interface', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Current Time Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-current-time-FS', $styledata[342], $styledata[343], $styledata[344], '2', 'Font Size', 'Set Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .jp-current-time', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-current-time-C', $styledata[352], '', 'Color', 'Set Audio time  color', 'false', '.oxi-addons-wrapper-' . $oxiid . '  .jp-current-time', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAudioPlaylist-current-time-F', 346, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '  .jp-current-time');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-current-time-P', 354, $styledata, 1, 'Margin', 'Set Audio Time Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .jp-current-time', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Duration Time Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-duration-time-FS', $styledata[370], $styledata[371], $styledata[372], '2', 'Font Size', 'Set Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-duration', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-duration-time-C', $styledata[380], '', 'Color', 'Set Audio time  color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-duration', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAudioPlaylist-duration-time-F', 374, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-duration');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-duration-time-P', 382, $styledata, 1, 'Margin', 'Set Audio Time  Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-duration', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Previous Icon Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudioPlaylist-PBS-I', $stylefiles[4], 'Icon', 'Set FontAwesome Icon Code for Previous Icon', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-Prev-controls', $styledata[712], 'True', 'true', 'False', 'false', 'Previous Control', 'Audio Previous Icon Show or not', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-PBS-FS', $styledata[94], $styledata[95], $styledata[96], '2', 'Font Size', 'Set Audio Previous Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous::before', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-PBS-C', $styledata[98], '', 'Color', 'Set Audio Previous  icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous::before', 'color');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsAudioPlaylist-icon-type-previous" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsAudioPlaylist-icon-type-previous" name="OxiAddonsAudioPlaylist-icon-type-previous">
                                                        <option value="solid" <?php
                                                                                if ($styledata[804] == 'solid') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Solid</option>
                                                        <option value="regular" <?php
                                                                                if ($styledata[804] == 'regular') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-PBS-active-C', $styledata[100], '', 'Active Color', 'Set Audio Previous Icon active color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous:focus::before', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-PBS-M', 102, $styledata, 1, 'Margin', 'Set Audio Previous Icon margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Previous Icon background setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudioPlaylist-PBS-Back-W', $styledata[118], $styledata[119], $styledata[120], 'OxiAddonsAudioPlaylist-PBS-Back-H', $styledata[122], $styledata[123], $styledata[124], 1, 'Width Height', 'Set Previous Button width and height', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-PBS-back-BG', $styledata[126], 'rgba', 'Background Color', 'Set Previous Icon background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-PBS-Back-BR', 128, $styledata, 1, 'Border Radius', 'Set Previous Icon Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-previous', 'margin');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsAudioPlaylist-PBS-Back-W', 'width'),
                                                    array('OxiAddonsAudioPlaylist-PBS-Back-H', 'height'),
                                                )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsAudioPlaylist-PBS-BS', 758, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Play Icon Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudioPlaylist-play-I', $stylefiles[6], 'Play Icon', 'Set FontAwesome Icon Code for Play Icon', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-play-controls', $styledata[714], 'True', 'true', 'False', 'false', 'Play Control', 'Audio Play Icon Show or not', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-play-FS', $styledata[144], $styledata[145], $styledata[146], '2', 'Font Size', 'Set Audio Play Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play::before', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-play-C', $styledata[148], '', 'Color', 'Set Audio Play Icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play::before', 'color');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsAudioPlaylist-icon-type-play" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsAudioPlaylist-icon-type-play" name="OxiAddonsAudioPlaylist-icon-type-play">
                                                        <option value="solid" <?php
                                                                                if ($styledata[806] == 'solid') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Solid</option>
                                                        <option value="regular" <?php
                                                                                if ($styledata[806] == 'regular') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-play-M', 152, $styledata, 1, 'Margin', 'Set Audio Play Icon margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Pause Icon Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudioPlaylist-pause-I', $stylefiles[8], 'Pause Icon', 'Set FontAwesome Icon Code for Pause Icon', 'false');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-pause-C', $styledata[168], '', 'Color', 'Set Audio Pause Icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-state-playing div.jp-type-playlist .jp-play::before', 'color');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsAudioPlaylist-icon-type-pause" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsAudioPlaylist-icon-type-pause" name="OxiAddonsAudioPlaylist-icon-type-pause">
                                                        <option value="solid" <?php
                                                                                if ($styledata[808] == 'solid') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Solid</option>
                                                        <option value="regular" <?php
                                                                                if ($styledata[808] == 'regular') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="oxi-head">
                                            Pause Icon Background Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudioPlaylist-play-pause-Back-W', $styledata[170], $styledata[171], $styledata[172], 'OxiAddonsAudioPlaylist-play-pause-Back-H', $styledata[174], $styledata[175], $styledata[176], 1, 'Width Height', 'Set Play and Pasue icon Background width and height', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-play-pause-back-BG', $styledata[178], 'rgba', 'Background Color', 'Set Play Pause Icon background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-play-pause-back-BR', 180, $styledata, 1, 'Border Radius', 'Set Play Pause Icon Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-play', 'margin');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsAudioPlaylist-play-pause-Back-W', 'width'),
                                                    array('OxiAddonsAudioPlaylist-play-pause-Back-H', 'height'),
                                                )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsAudioPlaylist-play-BS', 764, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Stop Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudioPlaylist-stop-I', $stylefiles[10], 'Stop Icon', 'Set FontAwesome Icon Code for Stop Icon', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-Stop-controls', $styledata[716], 'True', 'true', 'False', 'false', 'Stop Control', 'Audio Stop Icon Show or not', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-stop-FS', $styledata[196], $styledata[197], $styledata[198], '2', 'Font Size', 'Set Audio Stop Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop::before', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-stop-C', $styledata[200], '', 'Color', 'Set Audio Stop Icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop::before', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-stop-active-C', $styledata[202], '', 'Active Color', 'Set Audio Play button active color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop:focus::before', 'color');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsAudioPlaylist-icon-type-stop" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsAudioPlaylist-icon-type-stop" name="OxiAddonsAudioPlaylist-icon-type-stop">
                                                        <option value="solid" <?php
                                                                                if ($styledata[810] == 'solid') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Solid</option>
                                                        <option value="regular" <?php
                                                                                if ($styledata[810] == 'regular') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-stop-M', 204, $styledata, 1, 'Margin', 'Set Audio Play button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Stop Icon background setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudioPlaylist-stop-Back-W', $styledata[220], $styledata[221], $styledata[222], 'OxiAddonsAudioPlaylist-stop-Back-H', $styledata[224], $styledata[225], $styledata[226], 1, 'Width Height', 'Set Stop width and height', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-stop-back-BG', $styledata[228], 'rgba', 'Background Color', 'Set Previous Button background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-stop-back-BR', 230, $styledata, 1, 'Border Radius', 'Set Previous Button Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-stop', 'border-radius');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsAudioPlaylist-stop-Back-W', 'width'),
                                                    array('OxiAddonsAudioPlaylist-stop-Back-H', 'height'),
                                                )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsAudioPlaylist-stop-BS', 770, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist');
                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Next Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudioPlaylist-next-I', $stylefiles[12], 'next Icon', 'Set FontAwesome Icon Code for next Icon', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-Next-controls', $styledata[718], 'True', 'true', 'False', 'false', 'Next Control', 'Audio Next Icon Show or not', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-next-FS', $styledata[246], $styledata[247], $styledata[248], '2', 'Font Size', 'Set Audio next Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next::before', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-next-C', $styledata[250], '', 'Color', 'Set Audio Next Icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next::before', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-next-active-C', $styledata[252], '', 'Active Color', 'Set Audio Next Icon active color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next:focus::before', 'color');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsAudioPlaylist-icon-type-next" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsAudioPlaylist-icon-type-next" name="OxiAddonsAudioPlaylist-icon-type-next">
                                                        <option value="solid" <?php
                                                                                if ($styledata[812] == 'solid') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Solid</option>
                                                        <option value="regular" <?php
                                                                                if ($styledata[812] == 'regular') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-next-M', 254, $styledata, 1, 'Margin', 'Set Audio Next Icon margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Next Icon background setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudioPlaylist-next-Back-W', $styledata[270], $styledata[271], $styledata[272], 'OxiAddonsAudioPlaylist-next-Back-H', $styledata[274], $styledata[275], $styledata[276], 1, 'Width Height', 'Set Next Icon width and height', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-next-back-BG', $styledata[278], 'rgba', 'Background Color', 'Set Previous Button background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-next-back-BR', 280, $styledata, 1, 'Border Radius', 'Set Previous Button Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-type-playlist .jp-next', 'border-radius');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsAudioPlaylist-next-Back-W', 'width'),
                                                    array('OxiAddonsAudioPlaylist-next-Back-H', 'height'),
                                                )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsAudioPlaylist-next-BS', 776, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Audio Progress Bar Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudioPlaylist-progress-W', $styledata[296], $styledata[297], $styledata[298], 'OxiAddonsAudioPlaylist-progress-H', $styledata[300], $styledata[301], $styledata[302], 1, 'Width Height', 'Set Audio Progress Bar  width and height', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-progress-controls', $styledata[720], 'True', 'true', 'False', 'false', 'Progress', 'Audio Progress Bar Show or not', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-progress-BG', $styledata[304], 'rgba', 'Background Color', 'Set Audio Progress Bar Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-progress', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-progress-BR', 306, $styledata, 1, 'Border Radius', 'Set Audio Progress Bar Border Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-progress', 'margin');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-progress-M', 322, $styledata, 1, 'Margin', 'Set Audio Progress Bar margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-progress', 'margin');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsAudioPlaylist-progress-W', 'width'),
                                                    array('OxiAddonsAudioPlaylist-progress-H', 'height'),
                                                )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Progress Bar Loading
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-loding', $styledata[338], 'rgba', 'Loading Color', 'Set Progress Bar loading background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-seek-bar', 'background');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Progress current value setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-current-BG', $styledata[340], '', 'Current Color', 'Set Audio Progress Bar Loading Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-play-bar', 'background');
                                            ?>
                                        </div>
                                    </div>

                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Min Volume Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudioPlaylist-PV-min-I', $stylefiles[14], 'volume Icon', 'Set FontAwesome Icon Code for minimum volume Icon', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-PV-min-FS', $styledata[398], $styledata[399], $styledata[400], '2', 'Font Size', 'Set Audio minimum volume Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute::before', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-PV-min-C', $styledata[402], '', 'Color', 'Set Audio minimum volume Icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute::before', 'color');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsAudioPlaylist-icon-type-min-volume" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsAudioPlaylist-icon-type-min-volume" name="OxiAddonsAudioPlaylist-icon-type-min-volume">
                                                        <option value="solid" <?php
                                                                                if ($styledata[814] == 'solid') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Solid</option>
                                                        <option value="regular" <?php
                                                                                if ($styledata[814] == 'regular') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-PV-min-M', 404, $styledata, 1, 'Margin', 'Set Audio minimum volume Icon margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .mejs-mute button, .oxi-addons-wrapper-' . $oxiid . '  .mejs-unmute button', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Mute Volume Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudioPlaylist-mute-I', $stylefiles[16], 'Mute Icon', 'Set FontAwesome Icon Code for mute Icon', 'false');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-mute-C', $styledata[420], '', 'Color', 'Set Mute Icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-state-muted .jp-volume-controls .jp-mute::before', 'color');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsAudioPlaylist-icon-type-mute-volume" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsAudioPlaylist-icon-type-mute-volume" name="OxiAddonsAudioPlaylist-icon-type-mute-volume">
                                                        <option value="solid" <?php
                                                                                if ($styledata[816] == 'solid') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Solid</option>
                                                        <option value="regular" <?php
                                                                                if ($styledata[816] == 'regular') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="oxi-head">
                                            Min Volume background setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudioPlaylist-min-V-Back-W', $styledata[422], $styledata[423], $styledata[424], 'OxiAddonsAudioPlaylist-min-V-Back-H', $styledata[426], $styledata[427], $styledata[428], 1, 'Width Height', 'Set Minimun volume Icon background width and height', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-min-V-back-BG', $styledata[430], 'rgba', 'Background Color', 'Set Minimun Volume Icon background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-min-V-back-BR', 432, $styledata, 1, 'Border Radius', 'Set Minimun Volume Icon Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-mute', 'border-radius');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsAudioPlaylist-min-V-Back-W', 'width'),
                                                    array('OxiAddonsAudioPlaylist-min-V-Back-H', 'height'),
                                                )
                                            );
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Max Volume Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudioPlaylist-PV-max-I', $stylefiles[22], 'volume Icon', 'Set FontAwesome Icon Code for  Maximum volume Icon', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-PV-max-FS', $styledata[448], $styledata[449], $styledata[450], '2', 'Font Size', 'Set Audio Maximum volume Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-volume-max, .jp-audio-stream .jp-volume-controls .jp-volume-max', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-PV-max-C', $styledata[452], '', 'Color', 'Set Audio Maximum volume Icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-volume-max, .jp-audio-stream .jp-volume-controls .jp-volume-max', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-PV-max-active-C', $styledata[694], '', 'Active Color', 'Set Audio Maximum volume Icon Active color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-volume-max, .jp-audio-stream .jp-volume-controls .jp-volume-max', 'color');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsAudioPlaylist-icon-type-max-volume" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsAudioPlaylist-icon-type-max-volume" name="OxiAddonsAudioPlaylist-icon-type-max-volume">
                                                        <option value="solid" <?php
                                                                                if ($styledata[818] == 'solid') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Solid</option>
                                                        <option value="regular" <?php
                                                                                if ($styledata[818] == 'regular') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-PV-max-M', 454, $styledata, 1, 'Margin', 'Set Audio Maximum volume Icon margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-volume-max, .jp-audio-stream .jp-volume-controls .jp-volume-max', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Max Volume background setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudioPlaylist-max-V-Back-W', $styledata[470], $styledata[471], $styledata[472], 'OxiAddonsAudioPlaylist-max-V-Back-H', $styledata[474], $styledata[475], $styledata[476], 1, 'Width Height', 'Set Maximum volume Icon background width and height', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-max-V-back-BG', $styledata[478], 'rgba', 'Background Color', 'Set Maximum Volume Icon background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-volume-max, .jp-audio-stream .jp-volume-controls .jp-volume-max', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-max-V-back-BR', 480, $styledata, 1, 'Border Radius', 'Set Maximum Volume Icon Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-audio .jp-volume-controls .jp-volume-max, .jp-audio-stream .jp-volume-controls .jp-volume-max', 'margin');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsAudioPlaylist-max-V-Back-W', 'width'),
                                                    array('OxiAddonsAudioPlaylist-max-V-Back-H', 'height'),
                                                )
                                            );
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">

                                        <div class="oxi-head">
                                            Volume Progress Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudioPlaylist-V-progress-W', $styledata[496], $styledata[497], $styledata[498], 'OxiAddonsAudioPlaylist-V-progress-H', $styledata[500], $styledata[501], $styledata[502], 1, 'Width Height', 'Set Width Height Progress time handle', 'true');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-V-progress-controls', $styledata[722], 'True', 'true', 'False', 'false', 'Volume Progress', 'Audio Progress Bar Show or not', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-v-progress-BG', $styledata[504], 'rgba', 'Background Color', 'Set Audio volume Progress Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-v-progress-R', 506, $styledata, 1, 'Border Radius', 'Set Audio  volume Progress border radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-v-progress-M', 522, $styledata, 1, 'Margin', 'Set Audio  volume Progress margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar', 'margin');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsAudioPlaylist-V-progress-W', 'width'),
                                                    array('OxiAddonsAudioPlaylist-V-progress-H', 'height'),
                                                )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Volume Progress active Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-v-progress-active-BG', $styledata[538], 'rgba', 'Background Color', 'Set Audio volume Progress active Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-volume-bar-value', 'background');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-3">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Audio Repeat Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudioPlaylist-repeat-I', $stylefiles[18], 'repeat Icon', 'Set FontAwesome Icon Code for repeat Icon', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-repeat-controls', $styledata[794], 'True', 'true', 'False', 'false', 'Play Control', 'Audio Repeat Icon Show or not', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-repeat-FS', $styledata[540], $styledata[541], $styledata[542], '2', 'Font Size', 'Set Audio repeat Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-repeat::before', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-repeat-C', $styledata[544], '', 'Color', 'Set Audio repeat Icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-repeat::before', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-repeat-active-C', $styledata[546], '', 'Active Color', 'Set Audio Play button active color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-repeat:focus::before', 'color');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsAudioPlaylist-icon-type-repeat" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsAudioPlaylist-icon-type-repeat" name="OxiAddonsAudioPlaylist-icon-type-repeat">
                                                        <option value="solid" <?php
                                                                                if ($styledata[820] == 'solid') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Solid</option>
                                                        <option value="regular" <?php
                                                                                if ($styledata[820] == 'regular') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-repeat-M', 548, $styledata, 1, 'Margin', 'Set Audio Play button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-repeat', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Repeat Icon background setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudioPlaylist-repeat-Back-W', $styledata[564], $styledata[565], $styledata[566], 'OxiAddonsAudioPlaylist-repeat-Back-H', $styledata[568], $styledata[569], $styledata[570], 1, 'Width Height', 'Set repeat width and height', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-repeat-back-BG', $styledata[572], 'rgba', 'Background Color', 'Set Previous Button background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-repeat', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-repeat-back-BR', 574, $styledata, 1, 'Border Radius', 'Set Previous Button Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-repeat', 'border-radius');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsAudioPlaylist-repeat-BS', 782, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Audio shuffle Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsAudioPlaylist-shuffle-I', $stylefiles[20], 'shuffle Icon', 'Set FontAwesome Icon Code for shuffle Icon', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsAudioPlaylist-shuffle-controls', $styledata[796], 'True', 'true', 'False', 'false', 'Play Control', 'Audio shuffle Icon Show or not', 'true');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-shuffle-FS', $styledata[590], $styledata[591], $styledata[592], '2', 'Font Size', 'Set Audio shuffle Icon Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle::before', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-shuffle-C', $styledata[594], '', 'Color', 'Set Audio shuffle Icon color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle::before', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-shuffle-active-C', $styledata[596], '', 'Active Color', 'Set Audio Play button active color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle:focus::before', 'color');
                                            ?>
                                            <div class="form-group row">
                                                <label for="OxiAddonsAudioPlaylist-icon-type-shuffle" class="col-sm-6 control-label" oxi-addons-tooltip="Set your Font awesome icon Type Solid Or Regular ">Icon type</label>
                                                <div class="col-sm-6 addons-dtm-laptop-lock">
                                                    <select class="form-control oxi-addons-font-weight" id="OxiAddonsAudioPlaylist-icon-type-shuffle" name="OxiAddonsAudioPlaylist-icon-type-shuffle">
                                                        <option value="solid" <?php
                                                                                if ($styledata[822] == 'solid') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Solid</option>
                                                        <option value="regular" <?php
                                                                                if ($styledata[822] == 'regular') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Regular</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-shuffle-M', 598, $styledata, 1, 'Margin', 'Set Audio Play button margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle', 'margin');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Shuffle Icon background setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_double_dtm('OxiAddonsAudioPlaylist-shuffle-Back-W', $styledata[614], $styledata[615], $styledata[616], 'OxiAddonsAudioPlaylist-shuffle-Back-H', $styledata[618], $styledata[619], $styledata[620], 1, 'Width Height', 'Set shuffle width and height', 'true');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-shuffle-back-BG', $styledata[622], 'rgba', 'Background Color', 'Set Previous Button background Color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-shuffle-back-BR', 624, $styledata, 1, 'Border Radius', 'Set Previous Button Radius', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle', 'margin');
                                            echo OxiAddonsADMHelpNoJquery(
                                                array(
                                                    array('OxiAddonsAudioPlaylist-shuffle-Back-W', 'width'),
                                                    array('OxiAddonsAudioPlaylist-shuffle-Back-H', 'height'),
                                                )
                                            );
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsAudioPlaylist-shuffle-BS', 788, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-audio-playlist');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Playlist Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-playlist-BG', $styledata[640], 'rgba', 'Background Color', 'Set Audio Playlist Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-playlist', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-playlist-P', 642, $styledata, 1, 'Padding', 'Set Audio Playlist  Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-playlist', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Playlist Item Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-playlist-item-FS', $styledata[724], $styledata[725], $styledata[726], '2', 'Font Size', 'Set Audio title  Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-shuffle::before', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-playlist-item-C', $styledata[660], '', 'Color', 'Set Audio Playlist Item text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-playlist li', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-playlist-item-BG', $styledata[658], 'rgba', 'Background Color', 'Set Audio Playlist Item Background color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-playlist li', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsAudioPlaylist-playlist-item-F', 662, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-playlist li');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsAudioPlaylist-playlist-item-P', 668, $styledata, 1, 'Padding', 'Set Audio Playlist Item Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .jp-playlist li', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Playlist Item Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-playlist-item-hover', $styledata[684], '', 'Hover Color', 'Set Audio Playlist Item text Hover color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .jp-playlist li:hover', 'color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Playlist Item Active Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-playlist-item-Bg', $styledata[686], 'rgba', 'Background Color', 'Set Audio Playlist Item text Active color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-playlist-item-color', $styledata[688], '', 'Color', 'Set Audio Playlist Item text Hover color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current', 'color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Playlist Item Line Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsAudioPlaylist-playlist-line-color', $styledata[802], 'rgba', 'Color', 'Set Audio Playlist Item line color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' div.jp-type-playlist div.jp-playlist li.jp-playlist-current', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsAudioPlaylist-playlist-line-width', $styledata[798], $styledata[799], $styledata[800], '1', 'Line Width', 'Set Your playlist line width', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'font-size');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="oxi-addons-setting-save">
                        <?php echo oxiaddonssettingsavedtmmode(); ?>
                        <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                        <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                        <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                        <?php wp_nonce_field("oxi-addons-eventwidgets-nonce") ?>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
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
                    <?php echo oxi_audio_playlist_style_1_shortcode($style, $listdata, 'admin') ?>
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
                    echo oxi_addons_adm_help_image_upload('OxiAddonsAudio-upload-audio', $listitemdata[1], 'Audio', 'upload your audio file or link', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddonsAudio-subtitle', $listitemdata[3], 'Audio Title', 'Set Your Audio title', 'false');
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