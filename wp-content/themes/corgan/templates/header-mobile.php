<?php
/**
 * The template to show mobile menu
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile scheme_dark">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close icon-cancel"></a><?php

		// Logo
		get_template_part( 'templates/header-logo' );

		// Main menu
		corgan_show_layout(apply_filters('corgan_filter_menu_mobile_layout', str_replace(
					array('id="menu_main', 'id="menu-', 'class="menu_main'),
					array('id="menu_mobile', 'id="menu_mobile-', 'class="menu_mobile'),
					get_query_var('corgan_menu_main')
					)));
	
		?>
	</div>
</div>
