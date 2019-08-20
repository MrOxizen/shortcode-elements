<?php

if (!defined('ABSPATH'))
    exit;

function oxi_lightbox_style_2_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    $jquery = '';
    oxi_addons_MagnificPopup();

    $css .= '.oxi-addons-lightbox-' . $oxiid . '.Oximfp-bg{
                    background: ' . $styledata[7] . ';
                    z-index: ' . ($styledata[41] - 1) . ';
                  }
                  .oxi-addons-lightbox-' . $oxiid . '.Oximfp-wrap{
                   z-index: ' . $styledata[41] . ';
                  }
                  .oxi-addons-lightbox-' . $oxiid . ' .Oximfp-content{
                    z-index: ' . ($styledata[41] + 2) . ';
                    }
                  .oxi-addons-lightbox-' . $oxiid . ' .Oximfp-close{
                      z-index: ' . ($styledata[41] + 3) . ';
                  }
                  .oxi-addons-lightbox-' . $oxiid . ' .Oximfp-figure::after{
                      ' . OxiAddonsBoxShadowSanitize($styledata, 33) . '
                  }
                 .oxi-addons-lightbox-' . $oxiid . ' .Oximfp-image-holder .Oximfp-close, 
                 .oxi-addons-lightbox-' . $oxiid . ' .Oximfp-iframe-holder .Oximfp-close{
                     color: ' . $styledata[39] . ';
                  }
                  .oxi-addons-lightbox-' . $oxiid . ' .Oximfp-preloader{
                     background: ' . $styledata[43] . ';
                  }';
    $jquery .= 'jQuery("' . $stylefiles[3] . '").OximagnificPopup({
                        items: [
                            {
                                src: "' . OxiAddonsUrlConvert($stylefiles[5]) . '",
                            }
                        ],
                        type: "iframe",
                        mainClass: "oxi-addons-lightbox-' . $oxiid . '",
                        callbacks: {
                                    beforeChange: function() {
                                     this.items[0].src = this.items[0].src + "?=" + Math.random(); 
                                    }
                        },
                        closeBtnInside: true,
                        closeOnContentClick: true,
                        tLoading: "",
                    });';

    wp_add_inline_script('oxi-addons-MagnificPopup', $jquery);
    wp_add_inline_style('oxi-addons', $css);
}
