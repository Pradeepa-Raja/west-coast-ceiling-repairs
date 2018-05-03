<?php
/**
 * The template to display "Header 1"
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

$corgan_header_css = $corgan_header_image = '';
$corgan_header_video = wp_is_mobile() ? '' : corgan_get_theme_option('header_video');
if (true || empty($corgan_header_video)) {
	$corgan_header_image = get_header_image();
	if (corgan_is_on(corgan_get_theme_option('header_image_override')) && apply_filters('corgan_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($corgan_cat_img = corgan_get_category_image()) != '')
				$corgan_header_image = $corgan_cat_img;
		} else if (is_singular() || corgan_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$corgan_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($corgan_header_image)) $corgan_header_image = $corgan_header_image[0];
			} else
				$corgan_header_image = '';
		}
	}
}

// Store header image for navi
set_query_var('corgan_header_image', $corgan_header_image || $corgan_header_video);

?><header class="top_panel top_panel_style_1<?php
					echo !empty($corgan_header_image) || !empty($corgan_header_video) ? ' with_bg_image' : ' without_bg_image';
					if ($corgan_header_video!='') echo ' with_bg_video';
					if ($corgan_header_image!='') echo ' '.esc_attr(corgan_add_inline_style('background-image: url('.esc_url($corgan_header_image).');'));
					if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
					if (corgan_is_on(corgan_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
					?> scheme_<?php echo esc_attr(corgan_is_inherit(corgan_get_theme_option('header_scheme')) 
													? corgan_get_theme_option('color_scheme') 
													: corgan_get_theme_option('header_scheme'));
					?>"><?php
	
	// Main menu
	if (corgan_get_theme_option("menu_style") == 'top') {
		// Mobile menu button
		?><a class="menu_mobile_button icon-menu-2"></a><?php
		// Navigation panel
		get_template_part( 'templates/header-navi' );
	}

	// Page title and breadcrumbs area
	get_template_part( 'templates/header-title');

	// Header widgets area
	get_template_part( 'templates/header-widgets' );

	// Header for single posts
	get_template_part( 'templates/header-single' );

?></header>