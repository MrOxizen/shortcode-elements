<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
$oxitype = sanitize_text_field($_GET['oxitype']);
$dts = '';
$dtss = -100;
$ssin = get_option('oxi_addons_smooth_scrolling');
if (empty($ssin)) {
    add_option('oxi_addons_smooth_scrolling', $dts);
}
$sspage = get_option('oxi_addons_smooth_scrolling_page');
if (empty($sspage)) {
    add_option('oxi_addons_smooth_scrolling_page', $dts);
}
$sspost = get_option('oxi_addons_smooth_scrolling_post');
if (empty($sspost)) {
    add_option('oxi_addons_smooth_scrolling_post', $dts);
}
$ssoffset = get_option('oxi_addons_smooth_scrolling_offset');
if (empty($ssoffset)) {
    add_option('oxi_addons_smooth_scrolling_offset', $dtss);
}
?>
<div class="wrap">
    <?php
    echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes');
    ?>
    <div class="oxi-addons-wrapper">          
        <div class="oxi-addons-row">
            <h1><?php _e('Smooth Scrolling Settings'); ?></h1>
            <p>Set Smooth Scrolling With Your Theme and Development.</p>
            <form method="post" action="options.php">
                <?php settings_fields('oxi-addons-smooth_scrolling-group'); ?>
                <?php do_settings_sections('oxi-addons-smooth_scrolling-group'); ?>
                <table class="form-table">
                    <tr valign="top">
                        <td scope="row">Smooth Scrolling?</td>
                        <td>
                            <input type="radio" name="oxi_addons_smooth_scrolling" value="yes" <?php checked('yes', get_option('oxi_addons_smooth_scrolling'), true); ?>>Active
                            <input type="radio" name="oxi_addons_smooth_scrolling" value="" <?php checked('', get_option('oxi_addons_smooth_scrolling'), true); ?>>No
                        </td>
                        <td>
                            <label class="description" for="oxi_addons_smooth_scrolling"><?php _e('Set Active if you want to Add Smooth Scrolling into Your Post or Page'); ?></label>
                        </td>
                    </tr>    
                    <tr valign="top">
                        <td scope="row">Smooth Scrolling at Post</td>
                        <td>
                            <input type="radio" name="oxi_addons_smooth_scrolling_post" value="yes" <?php checked('yes', get_option('oxi_addons_smooth_scrolling_post'), true); ?>>Yes
                            <input type="radio" name="oxi_addons_smooth_scrolling_post" value="" <?php checked('', get_option('oxi_addons_smooth_scrolling_post'), true); ?>>No
                        </td>
                        <td>
                            <label class="description" for="oxi_addons_smooth_scrolling_post"><?php _e('Set Smooth Scroling at your Post'); ?></label>
                        </td>
                    </tr> 
                    <tr valign="top">
                        <td scope="row">Smooth Scrolling at Page</td>
                        <td>
                            <input type="radio" name="oxi_addons_smooth_scrolling_page" value="yes" <?php checked('yes', get_option('oxi_addons_smooth_scrolling_page'), true); ?>>Yes
                            <input type="radio" name="oxi_addons_smooth_scrolling_page" value="" <?php checked('', get_option('oxi_addons_smooth_scrolling_page'), true); ?>>No
                        </td>
                        <td>
                            <label class="description" for="oxi_addons_smooth_scrolling_page"><?php _e('Set Smooth Scrolling at your Page'); ?></label>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td scope="row">Top Offset</td>
                        <td>
                            <input type="number" name="oxi_addons_smooth_scrolling_offset" value="<?php echo get_option('oxi_addons_smooth_scrolling_offset'); ?>">
                        </td>
                        <td>
                            <label class="description" for="oxi_addons_smooth_scrolling_offset"><?php _e('Set Smooth Scrolling Top Offset in Pixel'); ?></label>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
    </div>
</div>