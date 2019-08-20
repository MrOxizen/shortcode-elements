<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_google_chart_style_1_shortcode($styledata = false, $listdata = false, $user = 'user')
{
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo wp_enqueue_media();
    echo oxi_addons_elements_stylejs('chart-min', 'google_chart', 'css');
    echo oxi_addons_elements_stylejs('chart-min', 'google_chart', 'js');
    $css = '';
    $jquery = '';


    echo '
<div class="oxi-addons-container">
    <div class="oxi-addons-row">';
    if ($user == 'admin') {
        echo '<div class="oxi-addons-show-chartlist-' . $oxiid . '">
                <div class="oxi-addons-google-chart">
                    <h1>For Edit & Delete GooleChart Bar</h1>
                     <hr>
                    <ul class="oxi-ul">';
        foreach ($listdata as $value) {
            $data = explode('||#||', $value['files']);
            echo '<li class="  ' . OxiAddonsAdminDefine($user) . '">';
            if ($data[2] == '' || $data[4] == '' || $data[6] == '' || $data[8] == '') {
                echo '<p style="color:red">You Must Be Fillup All Fields..</p>';
            } else {
                echo '' . $data[2] . '';
            }
            echo '  <div class="oxi-addons-admin-absulote">
                        <div class="oxi-addons-admin-absulate-edit">
                            <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditgoogle_chartdata") . '
                                <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                            </form>
                        </div>
                        <div class="oxi-addons-admin-absulate-delete">
                            <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletegoogle_chartdata") . '
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
    echo '<div class="oxi-addons-chart-' . $oxiid . '" ' . OxiAddonsAnimation($styledata, 59) . '>
           <canvas id="oxi_addons_bar_chart_' . $oxiid . '" width="' . $styledata[23] . 'px" height="' . $styledata[27] . 'px"></canvas>
        </div>
      </div>
</div>
  
';

    $css = '.oxi-addons-chart-' . $oxiid . '{
     width: 100%;
     margin: 0 auto;
     max-width: ' . $styledata[3] . 'px;
     padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 7) . ';           
    }
    .oxi-addons-show-chartlist-' . $oxiid . '{
      width: 100%;
      float: left;
    }
    .oxi-addons-show-chartlist-' . $oxiid . ' .oxi-addons-google-chart{
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        padding: 10px;
        background: #efefef;
        margin-bottom: 20px;
    }
    .oxi-addons-show-chartlist-' . $oxiid . ' ul li{
        border-bottom: 0.8px solid #666;
        padding: 7px;
    }


    ';
    $oxi_addons_labels = '';
    foreach ($listdata as $value) {
        $data = explode("||#||", $value['files']);
        if ($data[2] != '' && $data[4] != '' && $data[6] != '' && $data[8] != '') {
            $oxi_addons_labels .= "'" . $data[2] . "', ";
        }
    }
    $oxi_addons_BG_C = '';
    foreach ($listdata as $value) {
        $data = explode("||#||", $value['files']);
        if ($data[2] != '' && $data[4] != '' && $data[6] != '' && $data[8] != '') {
            $oxi_addons_BG_C .= "'" . $data[4] . "', ";
        }
    }
    $oxi_addons_B_C = '';
    foreach ($listdata as $value) {
        $data = explode("||#||", $value['files']);
        if ($data[2] != '' && $data[4] != '' && $data[6] != '' && $data[8] != '') {
            $oxi_addons_B_C .= "'" . $data[6] . "', ";
        }
    }
    $oxi_addons_data = '';
    foreach ($listdata as $value) {
        $data = explode("||#||", $value['files']);
        if ($data[2] != '' && $data[4] != '' && $data[6] != '' && $data[8] != '') {
            $oxi_addons_data .= "'" . $data[8] . "', ";
        }
    }
    $jquery .= "var ctx = document.getElementById('oxi_addons_bar_chart_$oxiid');
        var oxi_addons_bar_chart_$oxiid = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:[$oxi_addons_labels],
            datasets: [{
                label: '" . OxiAddonsTextConvert($stylefiles[2]) . "',
                data: [
                    $oxi_addons_data
                ],
                backgroundColor: [
                    $oxi_addons_BG_C
                ],
                borderColor: [
                    $oxi_addons_B_C
                ],
                borderWidth: $styledata[90]
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: '$styledata[68]',
                        fontSize: $styledata[64]
                    },
                    
                }],
                xAxes: [{
                    ticks: {
                        fontColor: '$styledata[74]',
                        fontSize: $styledata[70]
                    },
                    
                }]
            },
            legend: {
                display: true,
                labels: {
                    fontColor: '$styledata[35]',
                    fontSize: $styledata[31]
                }
            },
            tooltips: {   
                    backgroundColor: '$styledata[76]',
                    titleFontColor: '$styledata[78]',
                    titleFontSize: $styledata[80],
                    bodyFontColor: '$styledata[84]',
                    bodyFontSize: $styledata[86]
                    },
            
        }
    });";
    echo OxiAddonsInlineCSSData($css);
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-chart-min');
};
