<?php
if (!defined('ABSPATH'))
    exit;

function oxi_section_divider_style_7_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $style = explode('|', $styledata['css']);
    $css = '';
    echo '<div class="oxi-addons-divider-' . $oxiid . '">
                 <div class="oxi-addons-divider">
                 </div>
            ';
    ?>

    <style>
        .oxi-addons-divider-<?php echo $oxiid; ?> .oxi-addons-divider{
            background-image: url("data:image/svg+xml,%3Csvg class='rocket-separator big_triangle_left_svg_separator' xmlns='http://www.w3.org/2000/svg' version='1.0' width='100%25' fill='%23<?php echo $style[11]; ?>' height='100%25' viewBox='0 0 1920 92' preserveAspectRatio='none'%3E%3Cpath d='M1920,7L1476,91,0,21V0H1920V7Z'%3E%3C/path%3E%3C/svg%3E");
            background-repeat:  repeat-x;
        }  
    </style>
    <?php
    echo '</div>';
    $css .= '
             .oxi-addons-divider-' . $oxiid . '{
                display: block;
                position: absolute;
                width: ' . $style[13] . '%;
                height: ' . $style[15] . 'px;
                pointer-events: none;
                margin-top: -1px;
                top:auto;
                bottom:auto;
                ' . $style[3] . ':0;
                z-index: 1;
             ';
    if ($style[3] == 'bottom') {
        $css .= '-webkit-transform: translate(0%, 0) scaleX(-1);
                        -ms-transform: translate(0%, 0) scaleX(-1);
                        -o-transform: translate(0%, 0) scaleX(-1);
                        transform: translate(0%, 0) scale(-1);';
    } else {
        $css .= '-webkit-transform: translate(0%, 0) scaleX(1);
                        -ms-transform: translate(0%, 0) scaleX(1);
                        -o-transform: translate(0%, 0) scaleX(1);
                        transform: translate(0%, 0) scale(1);';
    }
    $css .= '} .oxi-addons-divider-' . $oxiid . ' .oxi-addons-divider{
                display: block;
                position: absolute;
                width: 100%;
                height: 100%;
                pointer-events: none;
                background-size: 100% 100%;
                top: 0;
                bottom: 0;';
    if ($style[9] == 'yes') {
        $css .= '
                -webkit-animation: scroll 150s linear infinite;
                -moz-animation: scroll 150s linear infinite;
                -ms-animation: scroll 150s linear infinite;
                -o-animation: scroll 150s linear infinite;
                animation: scroll 150s linear infinite;';
    }

    $css .= '}
                @-webkit-keyframes scroll {
                    100%{
                        background-position: 10000px center;
                    }
                }

                @-moz-keyframes scroll {
                    100%{
                        background-position: 10000px center;
                    }
                }

                @-o-keyframes scroll {
                    100%{
                        background-position: 10000px center;
                    }
                }

                @keyframes scroll {
                    100%{
                        background-position: 10000px center;
                    }
                }';


   echo OxiAddonsInlineCSSData($css);
}
