<?php

if (!defined('ABSPATH'))
    exit;

function oxi_product_boxes_style_3_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $css = '';
    echo '<div class="oxi-addons-container">
          <div class="oxi-addons-row">';
    foreach ($listdata as $value) {
        $data = explode('||#||', $value['files']);
        $image = $price = $heading = $button = '';

        if ($data[1] != '') {
            $image = '
                <div class="oxi-addons-image-overlay">  
                    <div class="oxi-addons-front-img">
                        <img src="' . OxiAddonsUrlConvert($data[1]) . '" alt="images" class="oxi-addons-img">
                    </div>  
                </div> 
            ';
        }
        if ($data[3] != '') {
            $heading = ' 
                    <div class="oxi-addons-text"> 
                    ' . OxiAddonsTextConvert($data[3]) . ' 
                    </div> 
            ';
        }
        if ($data[5] != '') {
            $price = '
                <div class="oxi-addons-price">
                    ' . OxiAddonsTextConvert($data[5]) . '
                </div>
            ';
        }
        if ($data[9] != '' && $data[7] != '') {
            $button = '
                <div class="oxi-addons-button">
                    <a href="' . OxiAddonsUrlConvert($data[9]) . '" target="' . $styledata[113] . '" class="oxi-addons-button-link">
                        ' . OxiAddonsTextConvert($data[7]) . '
                    </a>
                </div>
            ';
        } elseif ($data[9] == '' && $data[7] != '') {
            $button = '
                <div class="oxi-addons-button">
                    <div class="oxi-addons-button-link">
                        ' . OxiAddonsTextConvert($data[7]) . '
                    </a>
                </div>
        ';
        }

        echo '<div class="oxi-addons-parent-wrapper-' . $oxiid . ' ' . OxiAddonsItemRows($styledata, 3) . '  ' . OxiAddonsAdminDefine($user) . '">';
        echo '<div class="oxi-addons-main-wrapper-' . $oxiid . '" ' . OxiAddonsAnimation($styledata, 47) . '>
               <div class="oxi-addons-body">
                   ' . $image . '
                   <div class="oxi-addons-main-content"> 
                        <div class="oxi-addons-overlay">
                        ' . $heading . '
                        ' . $price . '
                        ' . $button . ' 
                        </div>
                    </div>
               </div>
            </div>';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                        <div class="oxi-addons-admin-absulate-edit">
                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditproduct_boxesdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                            </form>
                        </div>
                        <div class="oxi-addons-admin-absulate-delete">
                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeleteproduct_boxesdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                            </form>
                        </div>
                    </div>';
        }

        echo '</div>';
    }
    echo '</div></div>';


    $css .= '
    .oxi-addons-parent-wrapper-' . $oxiid . '{
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . '; 
    }
    .oxi-addons-main-wrapper-' . $oxiid . '{  
        width: 100%;
        max-width:' . $styledata[205] . 'px;
        display:flex;
        margin:0 auto;
        background: ' . $styledata[7] . ';
        border:  ' . $styledata[9] . 'px ' . $styledata[10] . ';
        border-color: ' . $styledata[13] . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . '; 
        ' . OxiAddonsBoxShadowSanitize($styledata, 51) . ';
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body{  
        width: 100%;
        float: left;
        position: relative;
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-overlay{   
        width: 100%;
        float: left;
        position: relative;
        overflow: hidden;
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-image-overlay::before{   
        content: "";
        display: block;
        padding-bottom: 100%; 
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-front-img{  
        position: absolute;
        left: 0;
        top: 0; 
        width: 100%;
        height: 100%; 
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-front-img .oxi-addons-img{  
        width: 100%;
        height: 100%;
    } 
 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button{  
        width: 100%;
        float: left;
        z-index: 999;
        text-align: ' . $styledata[147] . ';
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link{  
        font-size: ' . $styledata[149] . 'px;
        color: ' . $styledata[153] . ';
        background: ' . $styledata[155] . ';
        border:  ' . $styledata[157] . 'px ' . $styledata[158] . ';
        border-color: ' . $styledata[161] . ';
        display: inline-block;
        ' . OxiAddonsFontSettings($styledata, 163) . ';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 169) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 115) . ';
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 131) . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 185) . ';
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link:hover{  
        color: ' . $styledata[191] . ';
        background: ' . $styledata[193] . ';
        border-color: ' . $styledata[195] . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 197) . ';
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content{    
        width: 100%;
        float: left;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0; 
    } 
   
    .oxi-addons-main-wrapper-' . $oxiid . ':hover .oxi-addons-main-content{   
        background: ' . $styledata[203] . '; 
    } 
   
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-overlay{    
        width: 100%;
        position: absolute;
        left: 0;
        top: 50%; 
        visibility: hidden;
        opacity: 0;
        
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ':hover .oxi-addons-main-content .oxi-addons-overlay{ 
        visibility: visible;
        opacity: 1;
        transform: translateY(-50%);
    }
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text{  
        width: 100%;
        float: left;
        font-size: ' . $styledata[57] . 'px;
        ' . OxiAddonsFontSettings($styledata, 63) . ';
        color: ' . $styledata[61] . ';
        display: inline-block;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
        line-height: 1;
        width: 100%;
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price{  
        font-size: ' . $styledata[85] . 'px;
        ' . OxiAddonsFontSettings($styledata, 91) . ';
        color: ' . $styledata[89] . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 97) . ';
        line-height: 1;
        width: 100%;
        float: left;
    }
   
    
  
    @media only screen and (min-width : 669px) and (max-width : 993px){
       
    .oxi-addons-main-wrapper-' . $oxiid . '{   
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 16) . ';         
        max-width:' . $styledata[205] . ';    
    }
     
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link{  
        font-size: ' . $styledata[150] . 'px; 
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 170) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 116) . ';
        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 132) . '; 
    }
 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text{   
        font-size: ' . $styledata[58] . 'px; 
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 70) . '; 
    } 
    .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price{  
        font-size: ' . $styledata[86] . 'px; 
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 98) . '; 
    }
   
    }
    @media only screen and (max-width : 668px){
        .oxi-addons-main-wrapper-' . $oxiid . '{   
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 17) . ';            
            max-width:' . $styledata[206] . ';
        }
         
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-button .oxi-addons-button-link{  
            font-size: ' . $styledata[151] . 'px; 
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 171) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 117) . ';
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 133) . '; 
        }
     
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-text{   
            font-size: ' . $styledata[59] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . '; 
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-content .oxi-addons-price{  
            font-size: ' . $styledata[87] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 99) . '; 
        }
    }';
    echo OxiAddonsInlineCSSData($css);
}
