<?php
/**
 * The template for displaying 'Header menu'
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

$corgan_header_image = get_query_var('corgan_header_image');

$corgan_corgan_menu_header = corgan_get_nav_menu('menu_header');

// Store menu layout for the mobile menu
set_query_var('corgan_menu_header', $corgan_corgan_menu_header);

if (!empty($corgan_corgan_menu_header)) {
	?>
	<div class="top_panel_navi_header 
				<?php if ($corgan_header_image!='') echo ' with_bg_image'; ?>
				scheme_<?php echo esc_attr(corgan_is_inherit(corgan_get_theme_option('header_scheme')) 
													? corgan_get_theme_option('color_scheme') 
													: corgan_get_theme_option('header_scheme')
											); ?>">
		<div class="menu_header_wrap clearfix menu_hover_<?php echo esc_attr(corgan_get_theme_option('menu_hover')); ?>">
			<div class="content_wrap">
				<?php corgan_show_layout($corgan_corgan_menu_header); ?>
			</div>
		</div>
	</div><!-- /.top_panel_navi_top -->
	<?php
}
?>