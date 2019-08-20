<?php
if (!defined('ABSPATH')) {
    exit;
}
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-post-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $postauthor = oxi_addons_adm_help_multipledatasenitize('OxiAddonsDP-post-author');
        $postcat = oxi_addons_adm_help_multipledatasenitize('OxiAddonsDP-category');
        $posttags = oxi_addons_adm_help_multipledatasenitize('OxiAddonsDP-tags');
        $postexclude = oxi_addons_adm_help_multipledatasenitize('OxiAddonsDP-Exclude');
        $postinclude = oxi_addons_adm_help_multipledatasenitize('OxiAddonsDP-include');
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsDP-rows') . ''
            . ' OxiAddonsDP-show-image |' . sanitize_text_field($_POST['OxiAddonsDP-show-image']) . '|'
            . ' OxiAddonsDP-show-title |' . sanitize_text_field($_POST['OxiAddonsDP-show-title']) . '|'
            . ' OxiAddonsDP-show-excerpt |' . sanitize_text_field($_POST['OxiAddonsDP-show-excerpt']) . '|'
            . ' OxiAddonsDP-excerpt-word |' . sanitize_text_field($_POST['OxiAddonsDP-excerpt-word']) . '|'
            . ' OxiAddonsDP-show-meta |' . sanitize_text_field($_POST['OxiAddonsDP-show-meta']) . '|'
            . ' OxiAddonsDP-meta-position |' . sanitize_text_field($_POST['OxiAddonsDP-meta-position']) . '|'
            . ' OxiAddonsDP-Post-S-BG |' . sanitize_text_field($_POST['OxiAddonsDP-Post-S-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsDP-Post-S-B') . ''
            . ' OxiAddonsDP-Post-S-BC |' . sanitize_text_field($_POST['OxiAddonsDP-Post-S-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-Post-S-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-Post-S-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-Post-S-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsDP-box-shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsDP-animation') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsDP-title-FS') . ''
            . ' OxiAddonsDP-title-C |' . sanitize_hex_color($_POST['OxiAddonsDP-title-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDP-title-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-title-P') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsDP-excerpt-FS') . ''
            . ' OxiAddonsDP-excerpt-C |' . sanitize_hex_color($_POST['OxiAddonsDP-excerpt-C']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDP-excerpt-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-excerpt-P') . ''
            . '||'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDP-Meta-S-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-Meta-S-P') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsDP-Meta-N-FS') . ''
            . ' OxiAddonsDP-Meta-N-C |' . sanitize_hex_color($_POST['OxiAddonsDP-Meta-N-C']) . '|'
            . ' OxiAddonsDP-Meta-NH-C |' . sanitize_hex_color($_POST['OxiAddonsDP-Meta-NH-C']) . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddonsDP-Meta-D-FS') . ''
            . ' OxiAddonsDP-Meta-D-C |' . sanitize_hex_color($_POST['OxiAddonsDP-Meta-D-C']) . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddonsDP-Meta-IMG-W') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddonsDP-Meta-IMG-H') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-Meta-IMG-BR') . ''
            . ' OxiAddonsDP-thumb-type |' . sanitize_text_field($_POST['OxiAddonsDP-thumb-type']) . '|'
            . ' OxiAddonsDP-title-Hover-C |' . sanitize_hex_color($_POST['OxiAddonsDP-title-Hover-C']) . '|'
            . ' OxiAddonsDP-show-tab |' . sanitize_text_field($_POST['OxiAddonsDP-show-tab']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-Meta-name-p') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-Meta-date-p') . ''
            . ' OxiAddonsDP-thumb-over-BG |' . sanitize_text_field($_POST['OxiAddonsDP-thumb-over-BG']) . '|'
            . ' OxiAddonsDP-thumb-over-icon-color |' . sanitize_hex_color($_POST['OxiAddonsDP-thumb-over-icon-color']) . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddonsDP-thumb-over-icon-size') . ''
            . ' OxiAddonsDP-thumb |' . sanitize_text_field($_POST['OxiAddonsDP-thumb']) . '|'
            . ' OxiAddonsDP-B-Tab |' . sanitize_text_field($_POST['OxiAddonsDP-B-Tab']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-B-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-B-M') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsDP-B-FS') . ''
            . ' OxiAddonsDP-B-TC |' . sanitize_hex_color($_POST['OxiAddonsDP-B-TC']) . '|'
            . ' OxiAddonsDP-B-BG |' . sanitize_text_field($_POST['OxiAddonsDP-B-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsDP-B-B') . ''
            . ' OxiAddonsDP-B-BC |' . sanitize_hex_color($_POST['OxiAddonsDP-B-BC']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsDP-B-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsDP-B-BR') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsDP-B-BS') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsDP-B-HBS') . ''
            . ' OxiAddonsDP-B-HTC |' . sanitize_hex_color($_POST['OxiAddonsDP-B-HTC']) . '|'
            . ' OxiAddonsDP-B-HBG |' . sanitize_text_field($_POST['OxiAddonsDP-B-HBG']) . '|'
            . ' OxiAddonsDP-B-HBC |' . sanitize_hex_color($_POST['OxiAddonsDP-B-HBC']) . '|'
            . ' OxiAddonsDP-B-BT-show |' . sanitize_text_field($_POST['OxiAddonsDP-B-BT-show']) . '|'
            . ' OxiAddonsDP-B-BT-PS |' . sanitize_text_field($_POST['OxiAddonsDP-B-BT-PS']) . '|'
            . ' OxiAddonsDP-title-Tag |' . sanitize_text_field($_POST['OxiAddonsDP-title-Tag']) . '|'
            . '|||'
            . 'OxiAddonsDP-post-type||#||' . sanitize_text_field($_POST['OxiAddonsDP-post-type']) . '||#||'
            . 'OxiAddonsDP-post-author||#||' . $postauthor . '||#||'
            . 'OxiAddonsDP-category||#||' . $postcat . '||#||'
            . 'OxiAddonsDP-tags||#||' . $posttags . '||#||'
            . 'OxiAddonsDP-Exclude||#||' . $postexclude . '||#||'
            . 'OxiAddonsDP-post-per-page ||#||' . sanitize_text_field($_POST['OxiAddonsDP-post-per-page']) . '||#||'
            . 'OxiAddonsDP-post-offset ||#||' . sanitize_text_field($_POST['OxiAddonsDP-post-offset']) . '||#||'
            . 'OxiAddonsDP-post-order-by ||#||' . sanitize_text_field($_POST['OxiAddonsDP-post-order-by']) . '||#||'
            . 'OxiAddonsDP-post-order-type ||#||' . sanitize_text_field($_POST['OxiAddonsDP-post-order-type']) . '||#||'
            . 'OxiAddonsDP-include||#||' . $postinclude . '||#||'
            . 'OxiAddonsDP-post-img-size ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsDP-post-img-size']) . '||#||'
            . 'OxiAddonsDP-layout-type ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsDP-layout-type']) . '||#||'
            . ' ||#||||#||'
            . 'OxiAddonsDP-thumb-over-icon ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsDP-thumb-over-icon']) . '||#||'
            . 'OxiAddonsDP-thumb-over-animation ||#||' . sanitize_text_field($_POST['OxiAddonsDP-thumb-over-animation']) . '||#||'
            . 'OxiAddonsDP-Avatars||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsDP-Avatars']) . '||#||'
            . 'OxiAddonsDP-image-source ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddonsDP-image-source']) . '||#||'
            . ' OxiAddonsDP-B-BT ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddonsDP-B-BT']) . '||#|| '

            . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
// echo '<pre>';
// print_r($styledata);
// echo '</pre>';

?>
<div class="wrap">
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <script>
                jQuery(document).ready(function() {
                    jQuery('#OxiAddCB-post-type').on("change", function(e) {
                        e.preventDefault();
                        var data = "<strong>Query Conditions</strong> will works after saved Data";
                        jQuery.bootstrapGrowl(data, {});
                        jQuery('#oxi-addons-post-author').val("");
                    });
                    // dependancy for select Select Page or post;

                    function OxiPostTypeDependencyInput(data) {
                        if (data === 'page') {
                            jQuery('.oxiposttagcondition').slideUp();
                            jQuery('.oxipostcategorycondition').slideUp();
                        } else {
                            jQuery('.oxiposttagcondition').slideDown();
                            jQuery('.oxipostcategorycondition').slideDown();
                        }
                    }
                    OxiPostTypeDependencyInput(jQuery('#OxiAddonsDP-post-type').val());
                    jQuery('#OxiAddonsDP-post-type').change(function() {
                        OxiPostTypeDependencyInput(jQuery(this).val());
                    });
                    // dependancy for select Excepr true false;

                    function OxiPostExcerptDependencyInput(data) {
                        if (data === 'hide') {
                            jQuery('.OxiExcerptcustomsize').slideUp();
                        } else {
                            jQuery('.OxiExcerptcustomsize').slideDown();
                        }
                    }
                    OxiPostExcerptDependencyInput("<?php echo $styledata[11]; ?>");
                    jQuery('input[name="OxiAddonsDP-show-excerpt"]').change(function() {
                        OxiPostExcerptDependencyInput(jQuery(this).val());
                    });
                    // dependancy for select Show image or not;

                    function OxiPostShowIMGDependencyInput(data) {
                        if (data === 'hide') {
                            jQuery('.OxiShowIMGcustomsize').slideUp();
                        } else {
                            jQuery('.OxiShowIMGcustomsize').slideDown();

                        }
                    }
                    OxiPostShowIMGDependencyInput("<?php echo $styledata[7]; ?>");
                    jQuery('input[name="OxiAddonsDP-show-image"]').change(function() {
                        OxiPostShowIMGDependencyInput(jQuery(this).val());
                    });
                    //Post Thumbnail  Equal height custom;

                    function OxiPostShowThumDependencyInput(data) {
                        if (data === 'false') {
                            jQuery('.OxiShowThumcustomsize').slideUp();
                        } else {
                            jQuery('.OxiShowThumcustomsize').slideDown();

                        }
                    }
                    OxiPostShowThumDependencyInput("<?php echo $styledata[203]; ?>");
                    jQuery('input[name="OxiAddonsDP-thumb-type"]').change(function() {
                        OxiPostShowThumDependencyInput(jQuery(this).val());
                    });
                    //Show avater; 
                    function OxiPostShowAvaterDependencyInput(data) {
                        if (data === 'custom') {
                            jQuery('.OxiShowAvatercustomsize').slideDown();
                        } else {
                            jQuery('.OxiShowAvatercustomsize').slideUp();
                        }
                    }
                    OxiPostShowAvaterDependencyInput("<?php echo $stylefiles[31]; ?>");
                    jQuery('input[name="OxiAddonsDP-Avatars"]').change(function() {
                        OxiPostShowAvaterDependencyInput(jQuery(this).val());
                    });
                    //Show Meta; 
                    function OxiPostShowMetaDependencyInput(data) {
                        if (data === 'hide') {
                            jQuery('.OxiShowMetacustomsize').slideUp();
                        } else {
                            jQuery('.OxiShowMetacustomsize').slideDown();
                        }
                    }
                    OxiPostShowMetaDependencyInput("<?php echo $styledata[15]; ?>");
                    jQuery('input[name="OxiAddonsDP-show-meta"]').change(function() {
                        OxiPostShowMetaDependencyInput(jQuery(this).val());
                    });

                });
            </script>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <ul class="oxi-addons-tabs-ul">
                                <li ref="#oxi-addons-tabs-1">General Setting</li>
                                <li ref="#oxi-addons-tabs-2">Style</li>
                                <li ref="#oxi-addons-tabs-3">Button</li>
                            </ul>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Query
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            $arraytags = $arrayuser = array();
                                            $arraydata = get_post_types(array('public' => true, 'show_in_nav_menus' => true), 'names');

                                            echo oxi_addons_adm_help_select('OxiAddonsDP-post-type', $stylefiles[1], 'Post Type', 'Select Post Type', $arraydata);

                                            $users = get_users();
                                            if ($users) {
                                                foreach ($users as $user) {
                                                    $arrayuser[$user->ID] = $user->display_name;
                                                }
                                            }
                                            echo oxi_addons_adm_help_multiple_selection_style_1('OxiAddonsDP-post-author', $stylefiles[3], 'Author', 'Select Author Type to Display Post', $arrayuser);
                                            if ($stylefiles[1] == 'post') {
                                                $categories = get_terms(array(
                                                    'taxonomy' => $stylefiles[1] == 'post' ? 'category' : $stylefiles[1] . '_category',
                                                    'hide_empty' => true,
                                                ));
                                                foreach ($categories as $categorie) {
                                                    $arraycategories[$categorie->term_id] = $categorie->name;
                                                }
                                                echo oxi_addons_adm_help_multiple_selection_style_1('OxiAddonsDP-category', $stylefiles[5], 'Category', 'Select Category to Display Post', $arraycategories, 'oxipostcategorycondition');
                                            }
                                            if ($stylefiles[1] == 'post') {
                                                $tags = get_terms(array(
                                                    'taxonomy' => $stylefiles[1] . '_tag',
                                                    'hide_empty' => true,
                                                ));
                                                foreach ($tags as $tag) {
                                                    $arraytags[$tag->term_id] = $tag->name;
                                                }
                                                echo oxi_addons_adm_help_multiple_selection_style_1('OxiAddonsDP-tags', $stylefiles[7], 'Tags', 'Select Tags to Display Post', $arraytags, 'oxiposttagcondition');
                                            }


                                            $post_list = get_posts(array(
                                                'post_type' => $stylefiles[1],
                                                'orderby' => 'date',
                                                'order' => 'DESC',
                                                'posts_per_page' => -1,
                                            ));

                                            $posts = array();

                                            if (!empty($post_list) && !is_wp_error($post_list)) {
                                                foreach ($post_list as $post) {
                                                    $posts[$post->ID] = $post->post_title;
                                                }
                                            }

                                            echo oxi_addons_adm_help_multiple_selection_style_1('OxiAddonsDP-include', $stylefiles[19], 'Selected Only', 'Select Post title Only for Show Post', $posts);
                                            echo oxi_addons_adm_help_multiple_selection_style_1('OxiAddonsDP-Exclude', $stylefiles[9], 'Exclude Post', 'Select Post title for Hide Post', $posts);
                                            echo oxi_addons_adm_help_number('OxiAddonsDP-post-per-page', $stylefiles[11], 1, 'Posts Per Page', 'Set Post Show for per page');
                                            echo oxi_addons_adm_help_number('OxiAddonsDP-post-offset', $stylefiles[13], 1, 'Offset', 'Set Offset ');
                                            $orderby = array(
                                                'ID' => 'Post ID',
                                                'author' => 'Post Author',
                                                'title' => 'Title',
                                                'date' => 'Date',
                                                'modified' => 'Last Modified Date',
                                                'parent' => 'Parent Id',
                                                'rand' => 'Random',
                                                'comment_count' => 'Comment Count',
                                                'menu_order' => 'Menu Order',
                                            );
                                            echo oxi_addons_adm_help_select('OxiAddonsDP-post-order-by', $stylefiles[15], 'Order By', 'Select Order By for display post', $orderby);
                                            $ordertype = array(
                                                'asc' => 'Ascending',
                                                'desc' => 'Descending',
                                            );
                                            echo oxi_addons_adm_help_select('OxiAddonsDP-post-order-type', $stylefiles[17], 'Order Type', 'Select Show Post Ace or Desc', $ordertype);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            layout Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDP-layout-type', $stylefiles[23], 'Normal', '', 'Masonry', 'Masonry', 'Layout Type', 'Layout Type as Equal height or Masonry', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDP-show-tab', $styledata[207], 'Normal', '', 'New Tab', '_blank', 'Link Style', 'Opening Tab Same Tap or Another Tab', 'false');
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsDP-rows', $styledata, 3, 'false', '.oxi-addons-parent');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDP-show-image', $styledata[7], 'True', 'show', 'False', 'hide', 'Show Image', 'Post Image Show Or Not', 'false');
                                            $default_image_sizes = get_intermediate_image_sizes();
                                            foreach ($default_image_sizes as $size) {
                                                $image_sizes[$size] = oxi_addons_shortcode_name_converter($size) . ' - ' . intval(get_option("{$size}_size_w")) . ' x ' . intval(get_option("{$size}_size_h"));
                                            }
                                            echo oxi_addons_adm_help_select('OxiAddonsDP-post-img-size', $stylefiles[21], 'Image Size', 'Select Show Post post image thumbnail size', $image_sizes, 'OxiShowIMGcustomsize');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDP-show-title', $styledata[9], 'True', 'show', 'False', 'hide', 'Show Title', 'Post Title Show Or Not', 'false');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDP-show-excerpt', $styledata[11], 'True', 'show', 'False', 'hide', 'Show Excerpt', 'Post Excerpt Show Or Not', 'false');
                                            echo oxi_addons_adm_help_number('OxiAddonsDP-excerpt-word', $styledata[13], 1, 'Excerpt Word', 'Set how much word to show in post', '', '', '', '', '', '', 'OxiExcerptcustomsize');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDP-show-meta', $styledata[15], 'True', 'show', 'False', 'hide', 'Show Meta', 'Post Meta Show Or Not', 'false');

                                            $metapos = array(
                                                'header' => 'Entry Header',
                                                'footer' => 'Entry Footer',
                                            );
                                            echo oxi_addons_adm_help_select('OxiAddonsDP-meta-position', $styledata[17], 'Meta Position', 'Select to Show Meta Positon', $metapos, 'OxiShowMetacustomsize');
                                            ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-2">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Post Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-Post-S-BG', $styledata[19], 'rgba', 'Background', 'Select Your Content box Background Color', '', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__wrapper', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsDP-Post-S-B', $styledata[21], $styledata[22], 'Border', 'Set Post Border Size and Type', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__wrapper');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-Post-S-BC', $styledata[25], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__wrapper', 'border-color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-Post-S-BR', 27, $styledata, 1, 'Border Radius', 'Set Post Button Border Radius', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__wrapper', 'border-radius');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-Post-S-P', 43, $styledata, 1, 'Padding', 'Set Post  padding', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__article', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-Post-S-M', 59, $styledata, 1, 'Margin', 'Set Post  Margin', 'true', '.oxi-addons__main-wrapper-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsDP-box-shadow', 75, $styledata, 'true', '');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddonsDP-animation', 81, $styledata, 'true', '');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Post Thumbnail
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDP-thumb-type', $styledata[203], 'True', 'true', 'False', 'false', 'Image Equal Height', 'Set Image Thumbnail Height Auto or All Size will Same', 'false');
                                            echo oxi_addons_adm_help_number('OxiAddonsDP-thumb', $styledata[249], 1, 'Thumbnail Height', 'Set Post thambnail Height by percent %', '', '', '', '', '', '', 'OxiShowThumcustomsize');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Post Thumbnail Overlay
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_textbox('OxiAddonsDP-thumb-over-icon', $stylefiles[27], 'Icon', 'Write FontAwesome Icon Class Name or full Icon Tag');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDP-thumb-over-icon-size', $styledata[245], $styledata[246], $styledata[247], '1', 'Icon Size', 'Set Post Thumbnail Overlay Icon  Size', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__overlay .oxi-icons', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-thumb-over-icon-color', $styledata[243], '', 'Icon Color', 'Set Post Thumbnail Overlay Icon Color', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__overlay .oxi-icons', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-thumb-over-BG', $styledata[241], 'rgba', 'Background', 'Select Post thumbnail overlay Background', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__overlay', 'background');
                                            $animation = array(
                                                'fade' => 'Fade In',
                                                'left' => 'Left to Right',
                                                'top' => 'Top to Bottom',
                                                'right' => 'Right to Left',
                                                'bottom' => 'Bottom to top',
                                            );
                                            echo oxi_addons_adm_help_select('OxiAddonsDP-thumb-over-animation', $stylefiles[29], 'Animation Type', 'Select post thumbnail animation type', $animation);

                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Post title
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Heading_Tag('OxiAddonsDP-title-Tag', $styledata[343], 'Select Tag', 'Select Heading Tag', 'false');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDP-title-FS', $styledata[85], $styledata[86], $styledata[87], '1', 'Font Size', 'Set Post Title title Font Size', 'false', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-title-C', $styledata[89], '', 'Color', 'Set Post Title Text color', 'false', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-title-Hover-C', $styledata[205], '', 'Hover Color', 'Set Post Title Title Hover Text color', 'false', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-link:hover', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDP-title-F', 91, $styledata, 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-title-P', 97, $styledata, 1, 'Padding', 'Set Post Title Short Details Padding', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-link', 'padding');
                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Excerpt Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDP-excerpt-FS', $styledata[113], $styledata[114], $styledata[115], '1', 'Font Size', 'Set Post excerpt Setting Font Size', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__details', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-excerpt-C', $styledata[117], '', 'Color', 'Set Post excerpt Setting Text color', 'false', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__details', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDP-excerpt-F', 119, $styledata, 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__details');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-excerpt-P', 125, $styledata, 1, 'Padding', 'Set Post excerpt Setting Padding', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__details', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Meta Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsDP-Meta-S-F', 143, $styledata, 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-name > .oxi-name');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-Meta-S-P', 149, $styledata, 1, 'Padding', 'Set Post Meta  Padding', 'false', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-info', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Meta name
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDP-Meta-N-FS', $styledata[165], $styledata[166], $styledata[167], '2', 'Font Size', 'Set Post Meta Name Font Size', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-name > .oxi-name', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-Meta-N-C', $styledata[169], '', 'Color', 'Set Post Meta Name Text color', 'false', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-name > .oxi-name', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-Meta-name-p', 209, $styledata, 1, 'Padding', 'Set Post Meta Name  Padding', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-name', 'padding');

                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Meta name Hover
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-Meta-NH-C', $styledata[171], '', 'Color', 'Set Post Meta Name Hover Text color', 'false', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-name > .oxi-name:hover', 'color');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Meta Date
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDP-Meta-D-FS', $styledata[173], $styledata[174], $styledata[175], '2', 'Font Size', 'Set Post Meta Date Font Size', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-date > .oxi-time', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-Meta-D-C', $styledata[177], '', 'Color', 'Set Post Meta Date Text color', 'false', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-date > .oxi-time', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-Meta-date-p', 225, $styledata, 1, 'Padding', 'Set Post Meta Date  Padding', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-date', 'padding');

                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Meta Avater Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDP-Avatars', $stylefiles[31], 'Auto', '', 'Custom', 'custom', 'Avatars Type', 'Set Your Post Avatars type Auto or Manual', 'false');
                                            echo oxi_addons_adm_help_image_upload('OxiAddonsDP-image-source', $stylefiles[33], 'Avatars Image', 'Set Your Avatars Image', 'false', 'OxiShowAvatercustomsize');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDP-Meta-IMG-W', $styledata[179], $styledata[180], $styledata[181], '1', 'Width', 'Set Post Meta Avater width', 'false', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-left > .oxi-addons__avater', 'width');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDP-Meta-IMG-H', $styledata[183], $styledata[184], $styledata[185], '1', 'Height', 'Set Post Meta Avater height', 'false', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-left > .oxi-addons__avater', 'height');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-Meta-IMG-BR', 187, $styledata, 1, 'Border Radius', 'Set Post Meta Image Radius', 'true', '.oxi-addons__main-wrapper-' . $oxiid . ' .oxi-addons__meta-left > .oxi-addons__avater', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-3">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Text_Align('OxiAddonsDP-B-BT-PS', $styledata[341], 'Button Position', 'Set Your Meta Position', 'false', '', '');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDP-B-BT-show', $styledata[339], 'True', 'show', 'False', 'hide', 'Show Button', 'Post Button Show Or Not', 'false');
                                            echo oxi_addons_adm_help_textbox('OxiAddonsDP-B-BT', $stylefiles[35], 'Button Text', 'Set Banner Button Text', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_true_false('OxiAddonsDP-B-Tab', $styledata[251], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'false');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-B-P', 253, $styledata, 1, 'Padding', 'Set Banner Button padding', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-B-M', 269, $styledata, 1, 'Margin', 'Set Banner Button margin', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'margin');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsDP-B-FS', $styledata[285], $styledata[286], $styledata[287], '', 'Font Size', 'Set Banner Button Font Size', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-B-TC', $styledata[289], '', 'Text Color', 'Set Banner Button Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-B-BG', $styledata[291], 'rgba', 'Background Color', 'Set Banner Button background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'background');
                                            echo oxi_addons_adm_help_border('OxiAddonsDP-B-B', $styledata[293], $styledata[294], 'Border', 'Set Banner Border Size and Type', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-B-BC', $styledata[297], '', 'Border Color', 'Set Border color', '', '', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'border-color');
                                            echo OxiAddonsADMHelpButtonFontSettings('OxiAddonsDP-B-F', 299, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsDP-B-BR', 305, $styledata, 1, 'Border Radius', 'Set Banner Button Border Radius', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link', 'border-radius');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Hover Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-B-HTC', $styledata[333], '', 'Color', 'Set Banner Button Hover Text color', '', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link:hover', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-B-HBG', $styledata[335], 'rgba', 'Background Color', 'Set Banner Button Hover Background color', 'false', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link:hover', 'background');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsDP-B-HBC', $styledata[337], '', 'Border Color', 'Set Banner Button Hover Border  color', 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link:hover', 'border-color');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Button Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsDP-B-BS', 321, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . '.oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Button Hover Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsDP-B-HBS', 327, $styledata, 'true', '.oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-content-button .oxi-addons-button-middle .oxi-addons-button-link:hover');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-setting-save">
                                <?php echo oxiaddonssettingsavedtmmode(); ?>
                                <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                                <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                                <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                                <?php wp_nonce_field("oxi-addons-post-nonce") ?>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                ?>
            </div>
            <div class="oxi-addons-style-left-preview">
                <div class="oxi-addons-style-left-preview-heading">
                    <div class="oxi-addons-style-left-preview-heading-left">
                        Preview
                    </div>
                    <div class="oxi-addons-style-left-preview-heading-right">
                        <?php echo oxi_addons_adm_help_preview_color($styledata[1]); ?>
                    </div>
                </div>
                <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                    <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>