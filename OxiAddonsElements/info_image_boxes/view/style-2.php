<?php

if (!defined('ABSPATH'))
    exit;

function oxi_info_image_boxes_style_2_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $css = ''; 
    
    echo '<div class="oxi-addons-container"> <div class="oxi-addons-row">';
        foreach ($listdata as $value) {
            $data = explode('||#||', $value['files']);  
            $heading = $details = $button = $img_center = $img_ver_position = $images= $content = '';
             
            if($data[1] != ''){
                $images = '
                <div class="oxi-addons-image-main">
                    <img src="'.OxiAddonsUrlConvert($data[1]).'" alt="images" class="oxi-addons-img">
                </div> 
                ';
            } 
        if($data[3] != ''){
            $heading = '  <div class="oxi-addons-heading">
            ' . OxiAddonsTextConvert($data[3]) . '
            </div>';
        } 
        if($data[5] != ''){
            $details = '<div class="oxi-addons-details">
            ' . OxiAddonsTextConvert($data[5]) . '
            </div>';
        }   
            if($styledata[204] == 'left'){
                $img_ver_position = ' 
                    '.$images.'  
                    <div class="oxi-addons-main-content">
                        '.$heading.' 
                        '.$details.'  
                    </div>
                ';
            }else{
                $img_ver_position = '  
                <div class="oxi-addons-main-content">
                    '.$heading.' 
                    '.$details.'  
                </div>
                '.$images.'  
            ';
            }
            $content = '
            <div ' . OxiAddonsAnimation($styledata, 63) . '>
                <div class="oxi-addons-main-wrapper-' . $oxiid . ' oxi-addons-main-wrapper-' . $oxiid . '-'.$value['id'].'"  >
                   '.$img_ver_position.' 
                </div>
            </div>
            '; 
        echo '<div class="oxi-addons-parent-wrapper-'.$oxiid.' ' . OxiAddonsItemRows($styledata, 3) . '  ' . OxiAddonsAdminDefine($user) . '">'; 
                if($data[7] != '' ){
                    echo '<a  href="' . OxiAddonsUrlConvert($data[7]) . '" target="' . $styledata[9] . '" >
                         '.$content.'
                    </a>';
                  }else{
                     echo $content ;
                  }
                if ($user == 'admin') {
                echo '  <div class="oxi-addons-admin-absulote">
                            <div class="oxi-addons-admin-absulate-edit">
                                <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditinfo_image_boxesdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                </form>
                            </div>
                            <div class="oxi-addons-admin-absulate-delete">
                                <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteinfo_image_boxesdata") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                </form>
                            </div>
                        </div>'; 
                } 

          echo '</div>';
        }
      echo '</div></div>';
    if($styledata[82] == 'top'){
        $img_center = 'align-items: start;';
    }elseif($styledata[82] == 'middle'){
        $img_center = 'align-items: center;';
    }else{
        $img_center = 'align-items: end;';
    }

    $css .= '
    .oxi-addons-parent-wrapper-'.$oxiid.'{
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 47) . '; 
    }

    .oxi-addons-main-wrapper-' . $oxiid . '{   
        position: relative;
        display: flex; 
        width: 100%;
        float: left; 
        overflow: hidden;  
        background: '.$styledata[7].'; 
        border:  ' . $styledata[9] . 'px ' . $styledata[10] . ';
        border-color: ' . $styledata[13] . ';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';  
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . '; 
        ' . OxiAddonsBoxShadowSanitize($styledata, 68) . ';  
    }
    .oxi-addons-main-wrapper-' . $oxiid . ':hover{    
        ' . OxiAddonsBoxShadowSanitize($styledata, 198) . ';  
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main{
        width: auto; 
        display: flex; 
        '. $img_center .'  
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main .oxi-addons-img{ 
        display: flex; 
        align-items: center; 
        justify-content: center;
        width: ' . $styledata[74] . 'px;
        height: ' . $styledata[78] . 'px;     
        background: ' . $styledata[84] . ';
        border:  ' . $styledata[86] . 'px ' . $styledata[87] . ';
        border-color: ' . $styledata[90] . ';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 92) . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 124) . '
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 108) . ';    
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content{
        width: 100%;
        float: left;    
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading{
        font-size: ' . $styledata[130] . 'px;
        ' . OxiAddonsFontSettings($styledata, 136) . ';
        color: ' . $styledata[134] . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 142) . '; 
        width: 100%;
        float: left;
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading span{
        font-size: ' . $styledata[158] . 'px; 
        color: ' . $styledata[162] . '; 
        font-weight: bold;
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-details{
        font-size: ' . $styledata[170] . 'px;
        ' . OxiAddonsFontSettings($styledata, 176) . ';
        color: ' . $styledata[174] . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 182) . ';
        width: 100%;
        float: left; 
    }
  

    @media only screen and (min-width : 669px) and (max-width : 993px){
        
        .oxi-addons-parent-wrapper-'.$oxiid.'{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 48) . '; 
        }
        .oxi-addons-main-wrapper-' . $oxiid . '{    
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';  
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 32) . ';  
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main .oxi-addons-img{  
            width: ' . $styledata[75] . 'px;
            height: ' . $styledata[79] . 'px;      
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 93) . '; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 109) . ';    
        }  
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading{
            font-size: ' . $styledata[131] . 'px;  
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 143) . ';  
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading span{
            font-size: ' . $styledata[159] . 'px; 
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-details{
            font-size: ' . $styledata[171] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 183) . '; 
        }
    }
    @media only screen and (max-width : 668px){
        .oxi-addons-parent-wrapper-'.$oxiid.'{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . '; 
        }
        .oxi-addons-main-wrapper-' . $oxiid . '{    
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';  
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 33) . ';  
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-main .oxi-addons-img{  
            width: ' . $styledata[76] . 'px;
            height: ' . $styledata[80] . 'px;      
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 94) . '; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 110) . ';    
        }  
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading{
            font-size: ' . $styledata[132] . 'px;  
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 144) . ';  
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-heading span{
            font-size: ' . $styledata[160] . 'px; 
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-details{
            font-size: ' . $styledata[172] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 184) . '; 
        }
         
    }
';
$js = 'setTimeout(function () {oxiequalHeight(jQuery(".oxi-addons-main-wrapper-'.$oxiid.'"));}, 500);';
  echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($js,'js');
    
}
