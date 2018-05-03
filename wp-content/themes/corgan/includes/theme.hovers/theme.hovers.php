<?php
/**
 * Generate custom CSS for theme hovers
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('corgan_hovers_theme_setup3')) {
	add_action( 'after_setup_theme', 'corgan_hovers_theme_setup3', 3 );
	function corgan_hovers_theme_setup3() {
		// Add 'Menu hover' option
		corgan_storage_set_array_before('options', 'search_style', array(
			'menu_hover' => array(
				"title" => esc_html__('Menu hover', 'corgan'),
				"desc" => wp_kses_data( __('Select hover effect to decorate main menu', 'corgan') ),
				"std" => 'fade',
				"options" => array(
					'fade'			=> esc_html__('Fade',		'corgan'),
					'fade_box'		=> esc_html__('Fade Box',	'corgan'),
					'slide_line'	=> esc_html__('Slide Line',	'corgan'),
					'slide_box'		=> esc_html__('Slide Box',	'corgan'),
					'zoom_line'		=> esc_html__('Zoom Line',	'corgan'),
					'path_line'		=> esc_html__('Path Line',	'corgan'),
					'roll_down'		=> esc_html__('Roll Down',	'corgan'),
					'color_line'	=> esc_html__('Color Line',	'corgan'),
				),
				"type" => "hidden"
				),
			'menu_animation_in' => array( 
				"title" => esc_html__('Submenu show animation', 'corgan'),
				"desc" => wp_kses_data( __('Select animation to show submenu ', 'corgan') ),
				"std" => "fadeInUpSmall",
				"options" => corgan_get_list_animations_in(),
				"type" => "select"
				),
			'menu_animation_out' => array( 
				"title" => esc_html__('Submenu hide animation', 'corgan'),
				"desc" => wp_kses_data( __('Select animation to hide submenu ', 'corgan') ),
				"std" => "fadeOutDownSmall",
				"options" => corgan_get_list_animations_out(),
				"type" => "select"
				)
			)
		);
		// Add 'Buttons hover' option
		corgan_storage_set_array_before('options', 'sidebar_widgets', array(
			'button_hover' => array(
				"title" => esc_html__("Button's hover", 'corgan'),
				"desc" => wp_kses_data( __('Select hover effect to decorate all theme buttons', 'corgan') ),
				"std" => 'slide_left',
				"options" => array(
					'default'		=> esc_html__('Fade',				'corgan'),
					'slide_left'	=> esc_html__('Slide from Left',	'corgan'),
					'slide_right'	=> esc_html__('Slide from Right',	'corgan'),
					'slide_top'		=> esc_html__('Slide from Top',		'corgan'),
					'slide_bottom'	=> esc_html__('Slide from Bottom',	'corgan'),
//					'arrow'			=> esc_html__('Arrow',				'corgan'),
				),
				"type" => "select"
			),
			'image_hover' => array(
				"title" => esc_html__("Image's hover", 'corgan'),
				"desc" => wp_kses_data( __('Select hover effect to decorate all theme images', 'corgan') ),
				"std" => 'dots',
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'corgan')
				),
				"options" => array(
					'dots'	=> esc_html__('Dots',	'corgan'),
					'icon'	=> esc_html__('Icon',	'corgan'),
					'icons'	=> esc_html__('Icons',	'corgan'),
					'zoom'	=> esc_html__('Zoom',	'corgan'),
					'fade'	=> esc_html__('Fade',	'corgan'),
					'slide'	=> esc_html__('Slide',	'corgan'),
					'pull'	=> esc_html__('Pull',	'corgan'),
					'border'=> esc_html__('Border',	'corgan')
				),
				"type" => "select"
			) )
		);
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('corgan_hovers_theme_setup9')) {
	add_action( 'after_setup_theme', 'corgan_hovers_theme_setup9', 9 );
	function corgan_hovers_theme_setup9() {
		add_action( 'wp_enqueue_scripts',		'corgan_hovers_frontend_scripts', 1010 );
		add_filter( 'corgan_filter_localize_script','corgan_hovers_localize_script' );
		add_filter( 'corgan_filter_merge_scripts',	'corgan_hovers_merge_scripts' );
		add_filter( 'corgan_filter_merge_styles',	'corgan_hovers_merge_styles' );
		add_filter( 'corgan_filter_get_css', 		'corgan_hovers_get_css', 10, 3 );
	}
}
	
// Enqueue hover styles and scripts
if ( !function_exists( 'corgan_hovers_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'corgan_hovers_frontend_scripts', 1010 );
	function corgan_hovers_frontend_scripts() {
		if ( corgan_is_on(corgan_get_theme_option('debug_mode')) && file_exists(corgan_get_file_dir('includes/theme.hovers/jquery.slidemenu.js')) && in_array(corgan_get_theme_option('menu_hover'), array('slide_line', 'slide_box')) )
			corgan_enqueue_script( 'slidemenu', corgan_get_file_url('includes/theme.hovers/jquery.slidemenu.js'), array('jquery') );
		if ( corgan_is_on(corgan_get_theme_option('debug_mode')) && file_exists(corgan_get_file_dir('includes/theme.hovers/theme.hovers.js')) )
			corgan_enqueue_script( 'corgan-hovers', corgan_get_file_url('includes/theme.hovers/theme.hovers.js'), array('jquery') );
		if ( corgan_is_on(corgan_get_theme_option('debug_mode')) && file_exists(corgan_get_file_dir('includes/theme.hovers/theme.hovers.css')) )
			corgan_enqueue_style( 'corgan-hovers',  corgan_get_file_url('includes/theme.hovers/theme.hovers.css'), array(), null );
	}
}

// Merge hover effects into single js
if (!function_exists('corgan_hovers_merge_scripts')) {
	//Handler of the add_filter( 'corgan_filter_merge_scripts', 'corgan_hovers_merge_scripts' );
	function corgan_hovers_merge_scripts($list) {
		$list[] = 'includes/theme.hovers/jquery.slidemenu.js';
		$list[] = 'includes/theme.hovers/theme.hovers.js';
		return $list;
	}
}

// Merge hover effects into single css
if (!function_exists('corgan_hovers_merge_styles')) {
	//Handler of the add_filter( 'corgan_filter_merge_styles', 'corgan_hovers_merge_styles' );
	function corgan_hovers_merge_styles($list) {
		$list[] = 'includes/theme.hovers/theme.hovers.css';
		return $list;
	}
}

// Add hover effect's vars into localize array
if (!function_exists('corgan_hovers_localize_script')) {
	//Handler of the add_filter( 'corgan_filter_localize_script','corgan_hovers_localize_script' );
	function corgan_hovers_localize_script($arr) {
		$arr['menu_hover'] = corgan_get_theme_option('menu_hover');
		$arr['menu_hover_color'] = corgan_get_scheme_color('text_hover', corgan_get_theme_option( 'menu_scheme' ));
		$arr['button_hover'] = corgan_get_theme_option('button_hover');
		return $arr;
	}
}

// Add hover icons on the featured image
if ( !function_exists('corgan_hovers_add_icons') ) {
	function corgan_hovers_add_icons($hover, $args=array()) {

		// Additional parameters
		$args = array_merge(array(
			'image' => null
		), $args);
	
		// Hover style 'Icons and 'Zoom'
		if (in_array($hover, array('icons', 'zoom'))) {
			if ($args['image'])
				$large_image = $args['image'];
			else {
				$attachment = wp_get_attachment_image_src( get_post_thumbnail_id(), 'masonry-big' );
				if (!empty($attachment[0]))
					$large_image = $attachment[0];
			}
			?>
			<div class="icons">
				<a href="<?php the_permalink(); ?>" aria-hidden="true" class="icon-link<?php if (empty($large_image)) echo ' single_icon'; ?>"></a>
				<?php if (!empty($large_image)) { ?>
				<a href="<?php echo esc_url($large_image); ?>" aria-hidden="true" class="icon-search" title="<?php echo esc_attr(get_the_title()); ?>"></a>
				<?php } ?>
			</div>
			<?php
	
		// Hover style 'Shop'
		} else if ($hover == 'shop') {
			global $product;
			?>
			<div class="icons">
				<a href="<?php the_permalink(); ?>" aria-hidden="true" class="shop_link icon-link"></a>
			</div>
			<?php

		// Hover style 'Icon'
		} else if ($hover == 'icon') {
			?><div class="icons"><a href="<?php the_permalink(); ?>" aria-hidden="true" class="icon-search-alt"></a></div><?php

		// Hover style 'Dots'
		} else if ($hover == 'dots') {
			?><a href="<?php the_permalink(); ?>" aria-hidden="true" class="icons"><span></span><span></span><span></span></a><?php

		// Hover style 'Fade', 'Slide', 'Pull', 'Border'
		} else if (in_array($hover, array('fade', 'pull', 'slide', 'border'))) {
			?>
			<div class="post_info">
				<div class="post_info_back">
					<h4 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<div class="post_descr">
						<?php
						corgan_show_post_meta(array(
									'categories' => false,
									'date' => true,
									'edit' => false,
									'seo' => false,
									'share' => false,
									'counters' => 'comments,views',
									'echo' => true
									));
						// Remove the condition below if you want display excerpt
						if (false) {
							?><div class="post_excerpt"><?php the_excerpt(); ?></div><?php
						}
						?>
					</div>
				</div>
			</div>
			<?php
		}
	}
}

// Add styles into CSS
if ( !function_exists( 'corgan_hovers_get_css' ) ) {
	//Handler of the add_filter( 'corgan_filter_get_css', 'corgan_hovers_get_css', 10, 3 );
	function corgan_hovers_get_css($css, $colors, $fonts) {
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS
CSS;
		}

		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

/* ================= MAIN MENU ITEM'S HOVERS ==================== */

/* fade box */
/*
.menu_hover_fade_box .menu_main_nav > li.current-menu-item > a,
.menu_hover_fade_box .menu_main_nav > li.current-menu-parent > a,
.menu_hover_fade_box .menu_main_nav > li.current-menu-ancestor > a,
*/
.menu_hover_fade_box .menu_main_nav > a:hover,
.menu_hover_fade_box .menu_main_nav > li > a:hover,
.menu_hover_fade_box .menu_main_nav > li.sfHover > a {
	color: {$colors['alter_link']};
	background-color: {$colors['alter_bg_color']};
}

/* slide_line */
.menu_hover_slide_line .menu_main_nav > li#blob {
	background-color: {$colors['text_link']};
}

/* slide_box */
.menu_hover_slide_box .menu_main_nav > li#blob {
	background-color: {$colors['alter_bg_color']};
}

/* zoom_line */
.menu_hover_zoom_line .menu_main_nav > li > a:before {
	background-color: {$colors['text_link']};
}

/* path_line */
.menu_hover_path_line .menu_main_nav > li:before,
.menu_hover_path_line .menu_main_nav > li:after,
.menu_hover_path_line .menu_main_nav > li > a:before,
.menu_hover_path_line .menu_main_nav > li > a:after {
	background-color: {$colors['text_link']};
}

/* roll_down */
.menu_hover_roll_down .menu_main_nav > li > a:before {
	background-color: {$colors['text_link']};
}

/* color_line */
.menu_hover_color_line .menu_main_nav > li > a:before {
	background-color: {$colors['text_dark']};
}
.menu_hover_color_line .menu_main_nav > li > a:after,
.menu_hover_color_line .menu_main_nav > li.menu-item-has-children > a:after {
	background-color: {$colors['text_link']};
}
.menu_hover_color_line .menu_main_nav > li.sfHover > a,
.menu_hover_color_line .menu_main_nav > li > a:hover,
.menu_hover_color_line .menu_main_nav > li > a:focus {
	color: {$colors['text_link']};
}


/* ================= BUTTON'S HOVERS ==================== */

/* Slide */
.sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_link']} 50%, {$colors['text_hover']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_hover']} !important; }
.sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['text_link']} 50%, {$colors['text_hover']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_hover']} !important; }
.sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['text_link']} 50%, {$colors['text_hover']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_hover']} !important; }
.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['text_link']} 50%, {$colors['text_hover']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_hover']} !important; }


.sc_price_link.sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }
.sc_price_link.sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.sc_price_link.sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.sc_price_link.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }

.inv_button.sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }
.inv_button.sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.inv_button.sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.inv_button.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }


.vc_btn3.sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['bg_color']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }
.vc_btn3.sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['bg_color']} 50%, {$colors['text_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.vc_btn3.sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['bg_color']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.vc_btn3.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['bg_color']} 50%, {$colors['text_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }


.sc_button_hover_slide_left.sc_button_bordered_button {	background: linear-gradient(to right,	{$colors['text_link']} 50%, transparent 50%) no-repeat scroll right bottom / 210% 100% transparent !important; }
.sc_button_hover_slide_right.sc_button_bordered_button {  background: linear-gradient(to left,	{$colors['text_link']} 50%, transparent 50%) no-repeat scroll left bottom / 210% 100% transparent !important; }
.sc_button_hover_slide_top.sc_button_bordered_button {	background: linear-gradient(to bottom,	{$colors['text_link']} 50%, transparent 50%) no-repeat scroll right bottom / 100% 210% transparent !important; }
.sc_button_hover_slide_bottom.sc_button_bordered_button {	background: linear-gradient(to top,		{$colors['text_link']} 50%, transparent 50%) no-repeat scroll right top / 100% 210% transparent !important; }

.sc_button_hover_slide_left.add_to_cart_button {	background: linear-gradient(to right,	{$colors['text_link']} 50%, transparent 50%) no-repeat scroll right bottom / 210% 100% transparent !important; }
.sc_button_hover_slide_right.add_to_cart_button {  background: linear-gradient(to left,	{$colors['text_link']} 50%, transparent 50%) no-repeat scroll left bottom / 210% 100% transparent !important; }
.sc_button_hover_slide_top.add_to_cart_button {	background: linear-gradient(to bottom,	{$colors['text_link']} 50%, transparent 50%) no-repeat scroll right bottom / 100% 210% transparent !important; }
.sc_button_hover_slide_bottom.add_to_cart_button {	background: linear-gradient(to top,		{$colors['text_link']} 50%, transparent 50%) no-repeat scroll right top / 100% 210% transparent !important; }

.sc_button_hover_slide_left.more-link {	background: linear-gradient(to right,	{$colors['text_link']} 50%, transparent 50%) no-repeat scroll right bottom / 210% 100% transparent !important; }
.sc_button_hover_slide_right.more-link {  background: linear-gradient(to left,	{$colors['text_link']} 50%, transparent 50%) no-repeat scroll left bottom / 210% 100% transparent !important; }
.sc_button_hover_slide_top.more-link {	background: linear-gradient(to bottom,	{$colors['text_link']} 50%, transparent 50%) no-repeat scroll right bottom / 100% 210% transparent !important; }
.sc_button_hover_slide_bottom.more-link {	background: linear-gradient(to top,		{$colors['text_link']} 50%, transparent 50%) no-repeat scroll right top / 100% 210% transparent !important; }


.top_panel_nav_button .sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_link']} 50%, {$colors['bg_color']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }
.top_panel_nav_button .sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['text_link']} 50%, {$colors['bg_color']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.top_panel_nav_button .sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['text_link']} 50%, {$colors['bg_color']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.top_panel_nav_button .sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['text_link']} 50%, {$colors['bg_color']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }


.sc_button_hover_style_dark.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_dark']} !important; }
.sc_button_hover_style_dark.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_dark']} !important; }
.sc_button_hover_style_dark.sc_button_hover_slide_top {			background: linear-gradient(to bottom,	{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_dark']} !important; }
.sc_button_hover_style_dark.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_dark']} !important; }


.sc_button_hover_style_hover.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_style_hover.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_style_hover.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.sc_button_hover_style_hover.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }


.sc_button_hover_style_alterbd.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['text_link']} 50%, {$colors['bg_color']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['alter_bd_color']} !important; }
.sc_button_hover_style_alterbd.sc_button_hover_slide_right {	background: linear-gradient(to left,	{$colors['alter_link']} 50%, {$colors['alter_bd_color']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['alter_bd_color']} !important; }
.sc_button_hover_style_alterbd.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['alter_link']} 50%, {$colors['alter_bd_color']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['alter_bd_color']} !important; }
.sc_button_hover_style_alterbd.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['alter_link']} 50%, {$colors['alter_bd_color']} 50%) no-repeat scroll right top / 100% 210% {$colors['alter_bd_color']} !important; }


.sc_button_hover_slide_left:hover,
.sc_button_hover_slide_left.active,
.ui-state-active .sc_button_hover_slide_left,
.vc_active .sc_button_hover_slide_left,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_left,
li.active .sc_button_hover_slide_left {		background-position: left bottom !important; }

.sc_button_hover_slide_right:hover,
.sc_button_hover_slide_right.active,
.ui-state-active .sc_button_hover_slide_right,
.vc_active .sc_button_hover_slide_right,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_right,
li.active .sc_button_hover_slide_right {	background-position: right bottom !important; }

.sc_button_hover_slide_top:hover,
.sc_button_hover_slide_top.active,
.ui-state-active .sc_button_hover_slide_top,
.vc_active .sc_button_hover_slide_top,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_top,
li.active .sc_button_hover_slide_top {		background-position: right top !important; }

.sc_button_hover_slide_bottom:hover,
.sc_button_hover_slide_bottom.active,
.ui-state-active .sc_button_hover_slide_bottom,
.vc_active .sc_button_hover_slide_bottom,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_bottom,
li.active .sc_button_hover_slide_bottom {	background-position: right bottom !important; }


/* ================= IMAGE'S HOVERS ==================== */

/* Common styles */
.post_featured .mask {
	background-color: {$colors['text_dark_07']};
}

/* Dots */
.post_featured.hover_dots:hover .mask {
	background-color: {$colors['text_dark_07']};
}
.post_featured.hover_dots .icons span {
	background-color: {$colors['text_link']};
}
.post_featured.hover_dots .post_info {
	color: {$colors['inverse_text']};
}

/* Icon */
.post_featured.hover_icon .icons a {
	color: {$colors['text_link']};
}
.post_featured.hover_icon a:hover {
	color: {$colors['inverse_text']};
}

/* Icon and Icons */
.post_featured.hover_icons .icons a {
	background-color: {$colors['bg_color_07']};
	color: {$colors['text_dark']};
}
.post_featured.hover_icons a:hover {
	background-color: {$colors['bg_color']};
	color: {$colors['text_link']};
}

/* Fade */
.post_featured.hover_fade .post_info,
.post_featured.hover_fade .post_info a,
.post_featured.hover_fade .post_info .post_meta_item,
.post_featured.hover_fade .post_info .post_meta .post_meta_item:before,
.post_featured.hover_fade .post_info .post_meta .post_meta_item:hover:before {
	color: {$colors['inverse_text']};
}
.post_featured.hover_fade .post_info a:hover {
	color: {$colors['text_link']};
}

/* Slide */
.post_featured.hover_slide .post_info,
.post_featured.hover_slide .post_info a,
.post_featured.hover_slide .post_info .post_meta_item,
.post_featured.hover_slide .post_info .post_meta .post_meta_item:before,
.post_featured.hover_slide .post_info .post_meta .post_meta_item:hover:before {
	color: {$colors['inverse_text']};
}
.post_featured.hover_slide .post_info a:hover {
	color: {$colors['text_link']};
}
.post_featured.hover_slide .post_info .post_title:after {
	background-color: {$colors['inverse_text']};
}

/* Pull */
.post_featured.hover_pull .post_info,
.post_featured.hover_pull .post_info a {
	color: {$colors['inverse_text']};
}
.post_featured.hover_pull .post_info a:hover {
	color: {$colors['text_link']};
}
.post_featured.hover_pull .post_info .post_descr {
	background-color: {$colors['text_dark']};
}

/* Border */
.post_featured.hover_border .post_info,
.post_featured.hover_border .post_info a,
.post_featured.hover_border .post_info .post_meta_item,
.post_featured.hover_border .post_info .post_meta .post_meta_item:before,
.post_featured.hover_border .post_info .post_meta .post_meta_item:hover:before {
	color: {$colors['inverse_text']};
}
.post_featured.hover_border .post_info a:hover {
	color: {$colors['text_link']};
}
.post_featured.hover_border .post_info:before,
.post_featured.hover_border .post_info:after {
	border-color: {$colors['inverse_text']};
}

/* Shop */
.post_featured.hover_shop .icons a {
	color: {$colors['bg_color']};
	border-color: {$colors['text_link']} !important;
	background-color: transparent;
}
.post_featured.hover_shop .icons a:hover {
	color: {$colors['inverse_text']};
	border-color: {$colors['text_link']} !important;
	background-color: {$colors['text_link']};
}

CSS;
		}
		
		return $css;
	}
}
?>