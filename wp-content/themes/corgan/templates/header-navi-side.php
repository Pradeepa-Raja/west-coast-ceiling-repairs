<?php
/**
 * The template for displaying side menu
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */
?>
<div class="menu_side_wrap scheme_<?php echo esc_attr(corgan_is_inherit(corgan_get_theme_option('menu_scheme')) 
																	? (corgan_is_inherit(corgan_get_theme_option('header_scheme')) 
																		? corgan_get_theme_option('color_scheme') 
																		: corgan_get_theme_option('header_scheme')) 
																	: corgan_get_theme_option('menu_scheme')); ?>">
	<span class="menu_side_button icon-menu-2"></span>

	<div class="menu_side_inner">
		<?php
		// Logo
		get_template_part( 'templates/header-logo' );
		// Main menu button
		?>
		<div class="toc_menu_item">
			<a href="#" class="toc_menu_description menu_mobile_description"><span class="toc_menu_description_title"><?php esc_html_e('Main menu', 'corgan'); ?></span></a>
			<a class="menu_mobile_button toc_menu_icon icon-menu-2" href="#"></a>
		</div>		
		<?php
		// Main menu
		$corgan_corgan_menu_main = corgan_get_nav_menu('menu_main');
		if (empty($corgan_corgan_menu_main)) $corgan_corgan_menu_main = corgan_get_nav_menu();
		// Store menu layout for the mobile menu
		set_query_var('corgan_menu_main', $corgan_corgan_menu_main);
		?>
	</div>
	
</div><!-- /.menu_side_wrap -->