<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_mailChimp_style_5_shortcode($styledata = false, $listdata = false, $user = 'user') {
    OxiAddonsAjaxRequest();
    add_action('wp_print_scripts', 'OxiAddonsAjaxRequest');
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $e_title = $f_title = $l_title = '';
    $leftbutton = $rightbutton = $jquery = $E_placeholder = $icon = $FN_placeholder = $LN_placeholder = $error_msg = $success_msg = $loading_msg = $button_text = '';
    $rightbutton .= '<div class="oxi-addons-mailchimp-button-section">
                             <button type="submit" class="oxi-addons-mailchimp-button"  ' . OxiAddonsAnimation($styledata, 199) . '>' . OxiAddonsTextConvert($stylefiles[2]) . '</button>
                         </div>';
    if (!empty($stylefiles[18])) {
        $E_placeholder = 'placeholder="' . OxiAddonsTextConvert($stylefiles[18]) . '"';
    }
    if (!empty($stylefiles[20])) {
        $FN_placeholder = 'placeholder="' . OxiAddonsTextConvert($stylefiles[20]) . '"';
    }
    if (!empty($stylefiles[22])) {
        $LN_placeholder = 'placeholder="' . OxiAddonsTextConvert($stylefiles[22]) . '"';
    }
    if (!empty($stylefiles[16])) {
        $error_msg = OxiAddonsTextConvert($stylefiles[16]);
    }
    if (!empty($stylefiles[14])) {
        $success_msg = OxiAddonsTextConvert($stylefiles[14]);
    }
    if (!empty($stylefiles[12])) {
        $loading_msg = OxiAddonsTextConvert($stylefiles[12]);
    }
    if (!empty($stylefiles[2])) {
        $button_text = OxiAddonsTextConvert($stylefiles[2]);
    }
    if (!empty($stylefiles[10])) {
        $icon = oxi_addons_font_awesome($stylefiles[10]);
    }
    if (!empty($stylefiles[24])) {
        $e_title = '<label for="oxi-addons-mailchimp-email-' . $oxiid . '" class="oxi-addons-mailchimp-label">' .OxiAddonsTextConvert($stylefiles[24]). '</label>';
    }
    if (!empty($stylefiles[26])) {
        $f_title = '<label for="oxi-addons-mailchimp-Fname-' . $oxiid . '" class="oxi-addons-mailchimp-label">' . OxiAddonsTextConvert($stylefiles[26]). '</label>';
    }
    if (!empty($stylefiles[28])) {
        $l_title = '<label for="oxi-addons-mailchimp-Lname-' . $oxiid . '" class="oxi-addons-mailchimp-label">' . OxiAddonsTextConvert($stylefiles[28]). '</label>';
    }
    echo '<div class="oxi-addons-container">
                <div class="oxi-addons-row">
                    <div class="oxi-addons-mailchimp-' . $oxiid . '">
                        <div class="oxi-addons-mailchimp-alert">
                            <div class="oxi-addons-mailchimp-alert-text">
                            </div>
                        </div>
                        <form id="oxi-addons-mailchimp-full-content-' . $oxiid . '">
                            ';

    echo '<div class="oxi-addons-mailchimp-form">
            <div class="oxi-addons-mailchimp-form-input-sec">
                <div class="oxi-addons-mailchimp-form-sec">
                    '.$e_title.'
                    <input type="email"  class="oxi-addons-mailchimp-input" name="oxi-addons-mailchimp-email" id="oxi-addons-mailchimp-email-' . $oxiid . '"  ' . $E_placeholder . ' required="required">
                </div>
                 <div class="oxi-addons-mailchimp-form-sec">
                    '.$f_title.'
                   <input type="text"  class="oxi-addons-mailchimp-input" name="oxi-addons-mailchimp-Fname" id="oxi-addons-mailchimp-Fname-' . $oxiid . '"  ' . $FN_placeholder . ' required="required">
                </div>
                 <div class="oxi-addons-mailchimp-form-sec">
                    '.$l_title.'
                    <input type="text"  class="oxi-addons-mailchimp-input" name="oxi-addons-mailchimp-Lname" id="oxi-addons-mailchimp-Lname-' . $oxiid . '"  ' . $LN_placeholder . ' required="required">
                </div>
                ' . $rightbutton . '
            </div>
          </div>';
    echo '</form>
                    </div>
                </div>
            </div>';
    $buttontext = explode(":", $styledata[125]);
    $css = '
	.oxi-addons-mailchimp-' . $oxiid . ' {
            width: 100%;
            margin : 0 auto;
            ' . OxiAddonsBGImage($styledata, 15) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 19) . ';
            max-width : ' . $styledata[333] . 'px;
	}
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert{
           width: 100%;
           float: left;
           padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 269) . ';
           display:none;
        }
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 253) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 237) . ';
            border-style: ' . $styledata[227] . ';
            border-color: ' . $styledata[228] . ';
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 211) . '; 
            color: ' . $styledata[207] . ';
            background: ' . $styledata[209] . ';
            font-size : ' . $styledata[203] . 'px;
            ' . OxiAddonsFontSettings($styledata, 231) . '
        }
	
	.oxi-addons-mailchimp-' . $oxiid . '  #oxi-addons-mailchimp-full-content-' . $oxiid . '{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction : column;
	}
        
	.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form{
            width : 100%;
            display : flex;
            flex-direction: column;
            aling-items : center;
        }
	.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-input-sec{
            width : 100%;
            display : flex;
            justify-content: flex-start;
            flex-direction: column;
            overflow: hidden;
              
        }
	.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-form-sec{
            width : 100%;
            display : flex;
            justify-content: flex-start;
            flex-direction: column;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
        }
	.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-sec .oxi-addons-mailchimp-label{
            color : ' . $styledata[305] . ';
            font-size : ' . $styledata[307] . 'px;
            ' . OxiAddonsFontSettings($styledata, 311) . ';	
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 317) . ';
            margin : 0;
        }
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input{
            display: flex;
            flex : 1 1 auto ;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 57) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 289) . ';
            border-style: ' . $styledata[286] . ';
            border-color: ' . $styledata[53] . ';
            border-width: ' . $styledata[285] . 'px ;
            color: ' . $styledata[41] . ';
            background : '.$styledata[337].';
            font-size : ' . $styledata[35] . 'px;
            ' . OxiAddonsFontSettings($styledata, 43) . ';	 
            margin : 0;
            width : 100%;
        }
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input:focus{
            border-color: ' . $styledata[55] . ';
            
        }
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input::placeholder {
             color: ' . $styledata[39] . ';
        }
	.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section{
            display: flex;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 159) . ';
            text-align:  ' . $buttontext[0] . ';
            width: 100%;
            aling-items : center;
	}
	.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button{
            width: 100%;
            font-size: ' . $styledata[93] . 'px;
            color: ' . $styledata[97] . ';
            background: ' . $styledata[99] . ';
            border-width : ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';;
            border-style: ' . $styledata[117] . ';
            border-color: ' . $styledata[118] . ';
            ' . OxiAddonsFontSettings($styledata, 121) . ';
            text-align: center;            
            border-radius : ' . OxiAddonsPaddingMarginSanitize($styledata, 127) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 143) . ';
	}
	.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button:hover{
            cursor:pointer;
            color: ' . $styledata[175] . ';
            background: ' . $styledata[177] . ';
            border-style: ' . $styledata[179] . ';
            border-color: ' . $styledata[180] . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 183) . ';
	}
        @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi-addons-mailchimp-' . $oxiid . ' {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 20) . ';
                max-width : ' . $styledata[334] . 'px;
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 270) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 254) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 238) . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 212) . '; 
                font-size : ' . $styledata[204] . 'px;
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-form-sec{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 74) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-sec .oxi-addons-mailchimp-label{
                font-size : ' . $styledata[308] . 'px;
                paddong: ' . OxiAddonsPaddingMarginSanitize($styledata, 318) . ';

            }

            .oxi-addons-mailchimp-' . $oxiid . '  #oxi-addons-mailchimp-full-content-' . $oxiid . '{
                flex-direction : column;
                align-items : center;
            }
             .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form{
                flex-direction: column;
            }
           
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-input-sec{
                flex-direction : column;
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 58) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 290) . ';
                border-width: ' . $styledata[286] . 'px ;
                font-size : ' . $styledata[36] . 'px;
            }
            .oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 160) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button{
                
                font-size: ' . $styledata[94] . 'px;
                border-width : ' . OxiAddonsPaddingMarginSanitize($styledata, 102) . ';;
                border-radius : ' . OxiAddonsPaddingMarginSanitize($styledata, 128) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 144) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button:hover{
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 184) . ';
            }
	}
	@media only screen and (max-width : 668px){
             .oxi-addons-mailchimp-' . $oxiid . ' {
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . ';
                max-width : ' . $styledata[335] . 'px;
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 271) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 255) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 239) . ';
                border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 213) . '; 
                font-size : ' . $styledata[205] . 'px;
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-form-sec{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 75) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-sec .oxi-addons-mailchimp-label{
                font-size : ' . $styledata[309] . 'px;
                paddong: ' . OxiAddonsPaddingMarginSanitize($styledata, 319) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . '  #oxi-addons-mailchimp-full-content-' . $oxiid . '{
                flex-direction : column;
                align-items : center;
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form{
                flex-direction: column;
            }
	    .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-input-sec{
                flex-direction : column;
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 75) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 59) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 291) . ';
                border-width: ' . $styledata[287] . 'px ;
                 font-size : ' . $styledata[37] . 'px;
            }
            .oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button{
               
                font-size: ' . $styledata[95] . 'px;
                border-width : ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';;
                border-radius : ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 145) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button:hover{
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 185) . ';
            }
	}
	';

    $ajax_nonce = wp_create_nonce("oxi_addons_ajax_nonce");
    echo '<input type="hidden" id="oxi_addons_ajax_nonce" name="oxi_addons_ajax_nonce" value="' . $ajax_nonce . '">';
    $jquery .= "
        jQuery('#oxi-addons-mailchimp-full-content-$oxiid').submit(function (e) {
            e.preventDefault();
            jQuery('#oxi-addons-mailchimp-full-content-$oxiid  .oxi-addons-mailchimp-button').html('$icon  $loading_msg');
            var useremail = jQuery('#oxi-addons-mailchimp-email-$oxiid').val()+'||##MAIL##||'+jQuery('#oxi-addons-mailchimp-Fname-$oxiid').val()+'||##MAIL##||'+jQuery('#oxi-addons-mailchimp-Lname-$oxiid').val();
            jQuery(this)[0].reset();
            OxiAddonsAjaxDataProcess( $oxiid, 'oxi_mailChimp_style_5_request', useremail, 'mailChimp||style-5', '', function (data) {
                if (data === 'success') {
                    jQuery('.oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text').html('$success_msg');
                    jQuery('.oxi-addons-mailchimp-$oxiid .oxi-addons-mailchimp-alert').fadeIn();
                } else {
                    jQuery('.oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text').html('$error_msg');
                    jQuery('.oxi-addons-mailchimp-$oxiid .oxi-addons-mailchimp-alert').fadeIn();
                }
                jQuery('#oxi-addons-mailchimp-full-content-$oxiid .oxi-addons-mailchimp-button').html(' $button_text ');
            });
            return false;
        });";


    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js');
}

function oxi_mailChimp_style_5_request($styleid, $file) {

    global $wpdb;
    $table_name = $wpdb->prefix . 'oxi_div_style';
    $sqstyle = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $styleid), ARRAY_A);
    $stylefiles = explode('||#||', $sqstyle['css']);
    $all_input = explode('||##MAIL##||', $file);
    $email = $all_input[0];
    $Fname = $all_input[1];
    $Lname = $all_input[2];
    $list_id = $stylefiles[8];
    $api_key = $stylefiles[6];
    $data_center = substr($api_key, strpos($api_key, '-') + 1);
    $url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members';

    $json = json_encode([
        'email_address' => $email,
        'status' => 'subscribed', //pass 'subscribed' or 'pending'
        'merge_fields' =>
        [
            'FNAME' => $Fname,
            'LNAME' => $Lname,
        ]
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    $result = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($status_code == '200') {
        echo "success";
    } else {
        echo "error";
    }
}
