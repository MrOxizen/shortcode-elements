<?php

if (!defined('ABSPATH'))
    exit;

function oxi_animated_text_style_7_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = $jquery ='';

      echo oxi_addons_elements_stylejs( 'animate', 'animated_text', 'css');
      echo oxi_addons_elements_stylejs( 'jquery-fittext', 'animated_text', 'js');
      echo oxi_addons_elements_stylejs( 'jquery-lettering', 'animated_text', 'js');
      echo oxi_addons_elements_stylejs( 'jquery-textillate', 'animated_text', 'js');


    echo '  <div class="oxi-addons-container">
                <div class="oxi-addons-row">
                      <div class="oxi-addons-wrapper-' . $oxiid . '">
                         <div class="oxi-addons-tlt">
                            <ul class="texts" style="display: none"> ';
                                  if ($stylefiles[3] != '') {
                                      $serialize = explode('{{}}', $stylefiles[3]);
                                      foreach ($serialize as $key => $value) {
                                       echo '<li data-id="oxi-' . $key . '">'.$value.'</li>';
                                      }
                                  }  
                         echo '</ul>
                          </div>
                      </div>
                </div>
            </div>'; 
    $jquery .= '
            jQuery(function (){   
                var animateClasses = "flash bounce shake tada swing wobble pulse flip flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeInUpBig fadeInDownBig fadeInLeftBig fadeInRightBig fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight fadeOutUpBig fadeOutDownBig fadeOutLeftBig fadeOutRightBig bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight hinge rollIn rollOut";
                var $form = jQuery("#oxi-addons-form-submit");
                var  $viewport = jQuery(".oxi-addons-wrapper-' . $oxiid . '"); 
                var getFormData = function () {
                  var data = {
                    loop: true,
                    in: { },
                    out: { }
                  }; 
                  $form.find("[data-key=\'effect\']").each(function () {
                    var $this = jQuery(this);
                    var key = $this.data("key");
                    var type = $this.data("type"); 
                    data[type][key] = $this.val(); 
                  });

                  $form.find("[data-key=\'type\']").each(function () {
                    var $this = jQuery(this);
                    var key = $this.data("key");
                    var type = $this.data("type");
                    var val = $this.val(); 
                      data[type].shuffle = (val === "shuffle");
                      data[type].reverse = (val === "reverse");
                      data[type].sync = (val === "sync");
                  });

                  return data;
                };

                jQuery.each(animateClasses.split(" "), function (i, value) {
                  var type = "[data-type]";
                  var option = "<option value=\'"+value+"\'>"+value+"</option>"; 
                  if (/Out/.test(value) || value === "hinge") {
                    type = "[data-type=\'out\']";
                  } else if (/In/.test(value)) {
                    type = "[data-type=\'in\']";
                  } 
                  if (type) {
                    $form.find("[data-key=\'effect\']" + type).append(option);
                  }
                }); 
                $form.find("[data-key=\'effect\'][data-type=\'in\']").val("' . $styledata[35] . '");
                $form.find("[data-key=\'effect\'][data-type=\'out\']").val("' . $styledata[39] . '"); 
                
                var $tlt = $viewport.find(".oxi-addons-tlt"); 
                $form.on( "change", function () {
                  var obj = getFormData();
                  $tlt.textillate(obj);
                }).trigger("change"); 
                
                var obj = getFormData();
                  $tlt.textillate(obj);
              });
    ';   
    $aling = '';
    $ex = explode(':',$styledata[33]);
    if($ex[0]==='center'){
      $aling = 'justify-content: center;';
    }elseif($ex[0]==='left'){
      $aling = 'justify-content: flex-start;';
    } elseif ($ex[0] === 'right') {
      $aling = 'justify-content: flex-end;';
    }
    $css .= ' 
      .oxi-addons-wrapper-' . $oxiid . '{
          width: 100%;
          display: flex; 
          overflow: hidden; 
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . '; 
      } 
      .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-tlt{ 
          width: 100%;
          display: flex;  
          '.$aling.'
      } 
      .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-tlt *{ 
           font-size: ' . $styledata[ 23] . 'px;
          ' . OxiAddonsFontSettings($styledata, 29) . ';
          color: ' . $styledata[ 27] . '; 
      }  
    @media only screen and (min-width : 669px) and (max-width : 993px){
        .oxi-addons-wrapper-' . $oxiid . '{ 
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 8) . '; 
      }  
      .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-tlt *{ 
           font-size: ' . $styledata[24] . 'px; 
      } 
    }
    @media only screen and (max-width : 668px){
      .oxi-addons-wrapper-' . $oxiid . '{ 
          padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 9) . '; 
      }  
      .oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-tlt *{ 
           font-size: ' . $styledata[25] . 'px; 
      } 
    }'; 
  
  echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-jquery-textillate');
}
