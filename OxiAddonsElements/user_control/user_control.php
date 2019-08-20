<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
oxi_addons_style_script();
wp_enqueue_script("jquery-ui-sortable");
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$table_name = $wpdb->prefix . 'oxi_div_style';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
$note = '';
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        if (current_user_can('manage_options')) {
            $data = sanitize_text_field($_POST['oxi-addons-user-data']);
            update_option('oxilab-user-elements-control', $data);
            $alldata = explode("{|}", sanitize_text_field($_POST['oxi-addons-user-data']));
            foreach ($alldata as $value) {
                if ($value != '') {
                    $peruserdata = sanitize_text_field($_POST['parmanent-' . $value]);
                    update_option($value, $peruserdata);
                }
            }
        } else {
            $note = 'ace';
        }
    }
}

if (!empty($_POST['data-upload']) && $_POST['data-upload'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-upload-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $valid = sanitize_text_field($_POST['validationServer02']);
        $location = sanitize_text_field($_POST['OxiAddons-type']);
        if ($valid == 'OXILAB') {
            $current_user = wp_get_current_user();
            if ($_FILES["validuploaddata"]["name"]) {
                $filename = $_FILES["validuploaddata"]["name"];
                $source = $_FILES["validuploaddata"]["tmp_name"];
                $type = $_FILES["validuploaddata"]["type"];
                $name = explode(".", $filename);
                date_default_timezone_set('Asia/Dhaka');
                $backupfilename = $name[0] . '(((1))' . $current_user->display_name . '(((1))' . $current_user->ID . '(((1))' . date('l--jS--F--Y--h-i-s--A') . '.zip';
                $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
                foreach ($accepted_types as $mime_type) {
                    if ($mime_type == $type) {
                        $okay = true;
                        break;
                    }
                }
                $continue = strtolower($name[1]) == 'zip' ? true : false;
                if (!$continue) {
                    $message = "The file you are trying to upload is not a .zip file. Please try again.";
                }
                $zip = new ZipArchive();
                if ($zip->open($source)) {
                    if ($location == 'Elements') {
                        $zip->extractTo(OxiAddonsElements);
                    } else {
                        $zip->extractTo(OxiAddonsCustomData);
                    }
                    $zip->close();
                }

                $destination_path = glob(get_home_path() . 'ShortcodeElements/')[0];
                $fileconpress = glob(get_home_path() . 'ShortcodeElements/')[0] . $filename;
                if (file_exists($fileconpress)) {
                    unlink($fileconpress);
                }
                move_uploaded_file($source, $fileconpress);
                $backupconpress = glob(get_home_path() . 'ShortcodeElementsBackup/')[0] . $backupfilename;
                copy($fileconpress, $backupconpress);

                echo '<div class="oxi-addons-import-requirement oxi-addons-import-requirement-successfully">
                        <div class="oxi-addons-import-requirement-data">
                            <div class="oxi-addons-import-requirement-icon">
                                <i class="fas fa-check-circle oxi-icons"></i>
                            </div>
                            <div class="oxi-addons-import-requirement-text">
                                <div class="oxi-addons-import-requirement-heading">
                                   ' . oxi_addons_shortcode_name_converter($name[0]) . ' install successfully 😃 😃
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        } else {
            $note = 'ace';
        }
    }
}
$upload = get_home_path();
$upload_dir = $upload . 'ShortcodeElements';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777);
}
$backup_dir = $upload . 'ShortcodeElementsBackup';
if (!is_dir($backup_dir)) {
    mkdir($backup_dir, 0777);
}
?>
<div class="wrap"> 
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <div class="oxi-addons-style-20-spacer"></div>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <?php
            if (!empty($_GET['type']) && $_GET['type'] == 'history') {
                $dirlink = get_home_path() . 'ShortcodeElementsBackup';
                $dircontent = array_diff(scandir($dirlink), array('..', '.'));
                $historydata = array();
                $max = 0;
                foreach ($dircontent as $filename) {
                    $zipcheck = strpos($filename, '.zip');
                    if ($zipcheck !== FALSE && $max < 100) {

                        if (filemtime($dirlink . '/' . $filename) === false) {
                            return false;
                        }
                        $dat = date("YmdHis", filemtime($dirlink . '/' . $filename));
                        $val = explode('(((1))', $filename);
                        $historydata[$dat][0] = $val[0];
                        $historydata[$dat][1] = $val[1];
                        $historydata[$dat][2] = str_replace(
                                array("--", "-", ".zip"), array(" ", ":", ""), $val[3]
                        );
                    }
                    $max++;
                }
                krsort($historydata);
                echo '<table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">File Name</th>
                            <th scope="col">Modified User</th>
                            <th scope="col">Date & Time</th>
                          </tr>
                        </thead>
                        <tbody>';
                $i = 0;
                foreach ($historydata as $value) {
                    echo '<tr>
                            <th scope="row">' . $i++ . '</th>
                            <td>' . oxi_addons_shortcode_name_converter($value[0]) . '</td>
                            <td>' . oxi_addons_shortcode_name_converter($value[1]) . '</td>
                            <td>' . $value[2] . '</td>
                          </tr>';
                }


                echo '     </tbody>
                      </table>';
            } else {
                ?>

                <?php
                if ($note != '') {
                    ?>
                    <div class="oxi-addons-import-requirement oxi-addons-import-requirement-successfully">
                        <div class="oxi-addons-import-requirement-data">
                            <div class="oxi-addons-import-requirement-icon">
                                <i class="fas fa-check-circle oxi-icons"></i>
                            </div>
                            <div class="oxi-addons-import-requirement-text">
                                <div class="oxi-addons-import-requirement-heading">
                                    দূরে গিয়া মরেন 
                                </div>
                                <div class="oxi-addons-import-requirement-content">
                                    খাইয়া দাইয়া কোন কাম ছিল না? আজাইরা কাম বাদ দিয়া কাজের কাম করেন। User Control  এ কাজ করা লাগব না নিজের কাজ করেন 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">

                        <?php
                        $userstore = get_option('oxilab-user-elements-control');
                        $userstore = explode('{|}', $userstore);
                        foreach ($userstore as $value) {
                            if ($value != '') {
                                ?>
                                <div class="oxi-addons-col-6" id="<?php echo $value; ?>">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            <?php echo str_replace('-', ' ', str_replace('oxi-user-data-', '', $value)); ?>
                                            <a href="#" class="oxi-user-control"><?php echo oxi_addons_admin_font_awesome('fa-trash'); ?></a>
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <div class="form-group row">  
                                                <div class="list-group col-sm-12" id="<?php echo $value; ?>-sortable">
                                                    <?php
                                                    $eachuser = get_option($value);
                                                    if ($eachuser != '') {
                                                        $serialize = explode('{|}', $eachuser);
                                                        foreach ($serialize as $serial) {
                                                            echo '<div class="list-group-item list-group-item-action" id="' . $serial . '">';
                                                            echo '' . oxi_addons_shortcode_name_converter($serial) . '';
                                                            echo '<a href="#" class="btn btn-outline-danger btn-sm float-right">' . oxi_addons_admin_font_awesome('fa-trash') . '</a>';
                                                            echo '</div>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="form-group row" style="padding-top: 10px;">       
                                                    <div class="col-sm-8 addons-dtm-laptop-lock" style="padding-right: 0px;">
                                                        <input type="text "class="form-control" style="padding-right: 4px; padding-left: 4px;" id="<?php echo $value; ?>-elements" value="" placeholder="Add new Category">
                                                    </div>
                                                    <div class="col-sm-4 addons-dtm-laptop-lock text-center">
                                                        <button type="button" id="<?php echo $value; ?>-btn" class="btn btn-info">Save</button>
                                                    </div>
                                                </div>
                                                <input type="hidden"  id="parmanent-<?php echo $value; ?>" name="parmanent-<?php echo $value; ?>" value="<?php echo $eachuser; ?>">
                                            </div>
                                        </div>                                               
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    jQuery(document).ready(function () {
                                        jQuery('#<?php echo $value; ?>-sortable').sortable({
                                            axis: 'y',
                                            opacity: 0.7,
                                            update: function (event, ui) {
                                                var list_sortable = jQuery(this).sortable('toArray').join('{|}');
                                                jQuery("#parmanent-<?php echo $value; ?>").val(list_sortable);
                                            }
                                        });
                                        jQuery('#<?php echo $value; ?>-btn').on('click', function () {
                                            var data = jQuery('#<?php echo $value; ?>-elements').val().split(' ').join('-');
                                            if (data === '') {
                                                var file = "<strong>Empty </strong> Elements not Accepted";
                                                jQuery.bootstrapGrowl(file, {});
                                                return false;
                                            } else {
                                                jQuery("#<?php echo $value; ?>-sortable").append('<div class="list-group-item list-group-item-action" id="' + data + '">' + data.split('-').join(' ') + '<a href="#" class="btn btn-outline-danger btn-sm float-right"><?php echo oxi_addons_admin_font_awesome('fa-trash'); ?></a> </div>');
                                                jQuery('#<?php echo $value; ?>-elements').val("");
                                                jQuery('#<?php echo $value; ?>-sortable').sortable();
                                                jQuery('#<?php echo $value; ?>-sortable').on('sortupdate', function () {
                                                    var list_sortable = jQuery(this).sortable('toArray').join('{|}');
                                                    jQuery("#parmanent-<?php echo $value; ?>").val(list_sortable);
                                                });
                                                jQuery('#<?php echo $value; ?>-sortable').trigger('sortupdate');
                                                var file = "<strong>New </strong> elements will works after saved Data";
                                                jQuery.bootstrapGrowl(file, {});
                                            }
                                        });
                                        jQuery('#<?php echo $value; ?>-sortable a').live('click', function () {
                                            r = confirm('Delete this Elements?');
                                            if (r) {
                                                jQuery(this).parent().remove();
                                                jQuery('#<?php echo $value; ?>-sortable').sortable();
                                                jQuery('#<?php echo $value; ?>-sortable').on('sortupdate', function () {
                                                    var list_sortable = jQuery(this).sortable('toArray').join('{|}');
                                                    jQuery("#parmanent-<?php echo $value; ?>").val(list_sortable);

                                                });
                                                jQuery('#<?php echo $value; ?>-sortable').trigger('sortupdate');
                                            }
                                        });
                                    });
                                </script>
                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div class="oxi-addons-setting-save">
                        <div class="oxi-addons-col-6" style="display: flex; align-items: center;">
                            <div class="oxi-addons-col-6 addons-dtm-laptop-lock" style="padding-right: 0px;">
                                <input type="text " class="form-control" style="padding-right: 4px; padding-left: 4px;" id="oxi-addons-new-user" value="" placeholder="Add new Users">
                            </div>
                            <div class="oxi-addons-col-6 addons-dtm-laptop-lock text-left" style="padding-left:10px">
                                <button type="button" id="oxi-addons-new-user-btn" class="btn btn-info" style="margin-top: 0px;">Save</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                        <input type="hidden"  id="oxi-addons-user-data" name="oxi-addons-user-data" value="<?php echo get_option('oxilab-user-elements-control'); ?>">
                        <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                        <?php wp_nonce_field("oxi-addons-nonce") ?>
                    </div>
                </form>
                <form method="post" id="oxi-addons-form" enctype="multipart/form-data">
                    <div class="oxi-addons-setting-save">
                        <div class="form-row">
                            <div class="col-md-2">
                                <select class="form-control" name="OxiAddons-type">
                                    <option value="Elements" selected="">Elements</option>
                                    <option value="Extention">Extention</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="validuploaddata">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="password" class="form-control is-valid" id="validationServer02"  name="validationServer02" placeholder="MD5 HASH" required>
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo admin_url('admin.php?page=oxi-addons&oxitype=user_control&type=history'); ?>" class="btn btn-info">History</a>
                                <input type="submit" class="btn btn-primary" name="data-upload" value="Save">
                                <?php wp_nonce_field("oxi-addons-upload-nonce") ?>
                            </div>
                        </div>
                    </div>
                </form>

                <style>
                    .form-row .col-md-2 .form-control{
                        height: calc(2.25rem + 2px);
                        padding: .375rem .75rem;
                        line-height: 1.5;
                    }
                    .oxi-addons-setting-save .form-row .btn{
                        margin-top: 0px;
                    }
                    .oxi-addons-setting-save .custom-file{
                        text-align: left;
                    }
                    .oxi-addons-content-div .oxi-head,
                    .list-group.col-sm-12 .list-group-item{
                        position: relative;
                        cursor:  move;
                    }
                    .oxi-addons-content-div-body  .form-group.row{
                        margin-left: 0;
                    }
                    a.oxi-user-control{
                        background: red;
                        color: white;
                        width: 24px;
                        height: 24px;
                        font-size: 12px;
                        display: inline-block;
                        border-radius: 2px;
                        line-height: 24px;
                        position: absolute;
                        transform: translateY(-50%);
                        top: 50%;
                        right: 10px;
                    }
                </style>
                <script type="text/javascript">
                    jQuery(".custom-file-input").on("change", function () {
                        var fileName = jQuery(this).val().split("\\").pop();
                        jQuery(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    });
                    jQuery(document).ready(function () {
                        jQuery('#oxi-addons-tabs-id-1').sortable({
                            axis: 'y',
                            opacity: 0.7,
                            update: function (event, ui) {
                                var list_sortable = jQuery(this).sortable('toArray').join('{|}');
                                jQuery("#oxi-addons-user-data").val(list_sortable);
                            }
                        });
                        jQuery('#oxi-addons-new-user-btn').on('click', function () {
                            var data = jQuery('#oxi-addons-new-user').val().split(' ').join('-');
                            if (data === '') {
                                var file = "<strong>Empty </strong> user name not Accepted";
                                jQuery.bootstrapGrowl(file, {});
                                return false;
                            } else {
                                jQuery("#oxi-addons-tabs-id-1").append('<div class="oxi-addons-col-6" id="oxi-user-data-' + data + '"> <div class="oxi-addons-content-div">  <div class="oxi-head">' + data.split('-').join(' ') + ' <a href="#" class="oxi-user-control"><?php echo oxi_addons_admin_font_awesome('fa-trash'); ?></a></div><div class="oxi-addons-content-div-body"></div>  </div></div>');
                                jQuery('#oxi-addons-new-user').val("");
                                jQuery('#oxi-addons-tabs-id-1').sortable();
                                jQuery('#oxi-addons-tabs-id-1').on('sortupdate', function () {
                                    var list_sortable = jQuery(this).sortable('toArray').join('{|}');
                                    jQuery("#oxi-addons-user-data").val(list_sortable);
                                });
                                jQuery('#oxi-addons-tabs-id-1').trigger('sortupdate');
                                var file = "<strong>New </strong> users will works after saved Data";
                                jQuery.bootstrapGrowl(file, {});
                            }
                        });
                        jQuery('.oxi-addons-content-div .oxi-head a').live('click', function () {
                            r = confirm('Delete this Users?');
                            if (r) {
                                jQuery(this).parent().parent().parent().remove();
                                jQuery('#oxi-addons-tabs-id-1').sortable();
                                jQuery('#oxi-addons-tabs-id-1').on('sortupdate', function () {
                                    var list_sortable = jQuery(this).sortable('toArray').join('{|}');
                                    jQuery("#oxi-addons-user-data").val(list_sortable);

                                });
                                jQuery('#oxi-addons-tabs-id-1').trigger('sortupdate');
                            }
                        });
                    });
                </script>


                <?php
            }
            ?>
        </div>
    </div>
</div>
