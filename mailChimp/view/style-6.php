<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_mailChimp_style_6_shortcode($styledata = false, $listdata = false, $user = 'user') {
    OxiAddonsAjaxRequest();
    add_action('wp_print_scripts', 'OxiAddonsAjaxRequest');
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $leftbutton = $heading = $rightbutton = $jquery = $jus = $placeholder = $icon = $error_msg = $success_msg = $loading_msg = $button_text = '';
   
        $rightbutton .= '<div class="oxi-addons-mailchimp-button-section">
                             <button type="submit" class="oxi-addons-mailchimp-button oximailChimpEqual-'.$oxiid.'"  ' . OxiAddonsAnimation($styledata, 199) . '>' . OxiAddonsTextConvert($stylefiles[2]) . '</button>
                         </div>';
    
    if($stylefiles[20] != ''){
    $heading = '<div class="oxi-addons-mailchimp-heading-text">
                    ' . OxiAddonsTextConvert($stylefiles[20]) . '
               </div>';
    }
    
    if (!empty($stylefiles[18])) {
        $placeholder = 'placeholder="' .OxiAddonsTextConvert($stylefiles[18]) . '"';
    }
    if (!empty($stylefiles[16])) {
        $error_msg =  OxiAddonsTextConvert($stylefiles[16])  ;
    }
    if (!empty($stylefiles[14])) {
        $success_msg =  OxiAddonsTextConvert($stylefiles[14])  ;
    }
    if (!empty($stylefiles[12])) {
        $loading_msg =  OxiAddonsTextConvert($stylefiles[12])  ;
    }
    if (!empty($stylefiles[2])) {
        $button_text = OxiAddonsTextConvert($stylefiles[2]);
    }
    if(!empty($stylefiles[10])){
        $icon =  oxi_addons_font_awesome($stylefiles[10]);
    }
    echo '<div class="oxi-addons-container">
                <div class="oxi-addons-row">
                    <div class="oxi-addons-mailchimp-' . $oxiid . '">
                        <div class="oxi-addons-mailchimp-alert">
                            <div class="oxi-addons-mailchimp-alert-text">
                            </div>
                        </div>
                        '.$heading.'
                        <form id="oxi-addons-mailchimp-full-content-' . $oxiid . '">
                            ';
   

    echo '<div class="oxi-addons-mailchimp-form">
            <div class="oxi-addons-mailchimp-form-input-sec">
                <input type="email"  class="oxi-addons-mailchimp-email oximailChimpEqual-'.$oxiid.'" name="oxi-addons-mailchimp-email" id="oxi-addons-mailchimp-email-' . $oxiid . '"  '.$placeholder.'  required="required">
            </div>
          </div>';
    if (!empty($stylefiles[2])) {
        echo $rightbutton;
    }
    echo '</form>
                    </div>
                </div>
            </div>';
    $buttontext = explode(":", $styledata[125]);
    if($buttontext[0] == 'left'){
        $jus ='justify-content : flex-start;';
    }elseif($buttontext[0] == 'center'){
        $jus ='justify-content : center;';
    }else{
        $jus ='justify-content : flex-end;';
    }
    $css = '
	.oxi-addons-mailchimp-' . $oxiid . ' {
            width: 100%;
            margin :0 auto;
            ' . OxiAddonsBGImage($styledata, 15) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 19) . ';
            max-width : '.$styledata[305].'px;
	}
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-alert{
           width: 100%;
           float: left;
           padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 269) . ';
           display:none;
        }
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-heading-text{
           width: 100%;
           float: left;
           font-size : '.$styledata[309].'px; 
           color : '.$styledata[313].'; 
            ' . OxiAddonsFontSettings($styledata, 315) . '
           padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 321) . ';
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
            flex-direction : row;
	}
	.oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form{
            width : 100%;
            display : flex;
            justify-content: flex-start;
            flex-direction: column;
            align-items :center;
        }
	
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-input-sec{
            width : 100%;
            display : flex;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 73) . ';
        }
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-email{
            display: flex;
            flex : 1 1 auto ;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 57) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 289) . ';
            border-style: ' . $styledata[286] . ';
            border-color: ' . $styledata[53] . ';
            border-width: ' . $styledata[285] . 'px ;
            color: ' . $styledata[41] . ';
            font-size : ' . $styledata[35] . 'px;
            ' . OxiAddonsFontSettings($styledata, 43) . ';	
            background : '.$styledata[337].';
            margin : 0;
            width : 100%;
        }
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-email:focus{
            border-color: ' . $styledata[55] . ';
            
        }
        .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-email::placeholder {
             color: ' . $styledata[39] . ';
        }
	.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section{
            display: flex;
            flex : 1 1 auto ;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 159) . ';
            text-align:  ' . $buttontext[0] . ';
            align-items :center;
        }
	.oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button{
            width: ' . $styledata[89] . 'px;
            max-width: 100%;
            font-size: ' . $styledata[93] . 'px;
            color: ' . $styledata[97] . ';
            background: ' . $styledata[99] . ';
            border-width : ' . OxiAddonsPaddingMarginSanitize($styledata, 101) . ';;
            border-style: ' . $styledata[117] . ';
            border-color: ' . $styledata[118] . ';
            ' . OxiAddonsFontSettings($styledata, 121) . ';
            text-align:center;            
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
                max-width : '.$styledata[306].'px;  
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
            .oxi-addons-mailchimp-' . $oxiid . '  #oxi-addons-mailchimp-full-content-' . $oxiid . '{
                flex-direction : column;
            }
           
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-input-sec{
                 padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 74) . ';
            }

            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-email{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 58) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 290) . ';
                border-width: ' . $styledata[286] . 'px ;
                 font-size : ' . $styledata[36] . 'px;
            }
            .oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 160) . ';
                width :100%;
                 '.$jus.'
            }
            .oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button{
                width: ' . $styledata[90] . 'px;
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
                max-width : '.$styledata[307].'px;  
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
            .oxi-addons-mailchimp-' . $oxiid . '  #oxi-addons-mailchimp-full-content-' . $oxiid . '{
                flex-direction : column;
            }
             .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form-input-sec{
                 padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 75) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . ' .oxi-addons-mailchimp-form .oxi-addons-mailchimp-email{
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 59) . ';
                border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 291) . ';
                border-width: ' . $styledata[287] . 'px ;
                 font-size : ' . $styledata[37] . 'px;
            }
            .oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section{
                width :100%;
           width :100%;
                 '.$jus.'      '.$jus.'
                padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
            }
            .oxi-addons-mailchimp-' . $oxiid . '  .oxi-addons-mailchimp-button-section button.oxi-addons-mailchimp-button{
                width: ' . $styledata[91] . 'px;
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
            var useremail = jQuery('#oxi-addons-mailchimp-email-$oxiid').val();
            jQuery(this)[0].reset();
            OxiAddonsAjaxDataProcess( $oxiid, 'oxi_mailChimp_style_6_request', useremail, 'mailChimp||style-6', '', function (data) {
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
        });
        setTimeout(function () {
            oxiequalouterHeight(jQuery('.oximailChimpEqual-$oxiid'));
        }, 1000);";


  echo OxiAddonsInlineCSSData($css);
  echo OxiAddonsInlineCSSData($jquery,'js');
}

function oxi_mailChimp_style_6_request($styleid, $file) {

    global $wpdb;
    $table_name = $wpdb->prefix . 'oxi_div_style';
    $sqstyle = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $styleid), ARRAY_A);
    $stylefiles = explode('||#||', $sqstyle['css']);
    $email = $file;
    $list_id = $stylefiles[8];
    $api_key = $stylefiles[6];

    $data_center = substr($api_key, strpos($api_key, '-') + 1);
    $url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members';

    $json = json_encode([
        'email_address' => $email,
        'status' => 'subscribed', //pass 'subscribed' or 'pending'
        'merge_fields' =>
        [
            'FNAME' => '',
            'LNAME' => '',
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
