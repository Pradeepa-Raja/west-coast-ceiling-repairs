<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js scheme_<?php
										 // Class scheme_xxx need in the <html> as context for the <body>!
										 echo esc_attr(corgan_get_theme_option('color_scheme'));
										 ?>">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>

	<?php do_action( 'corgan_action_before' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">

			<?php
			// Desktop header
			$corgan_header_style = corgan_get_theme_option("header_style");
			if (strpos($corgan_header_style, 'header-custom-')===0) $corgan_header_style = 'header-custom';
			get_template_part( "templates/{$corgan_header_style}");

			// Side menu
			if (in_array(corgan_get_theme_option('menu_style'), array('left', 'right'))) {
				get_template_part( 'templates/header-navi-side' );
			}

			// Mobile header
			get_template_part( 'templates/header-mobile');
			?>

			<div class="page_content_wrap scheme_<?php echo esc_attr(corgan_get_theme_option('color_scheme')); ?>">

				<?php if (corgan_get_theme_option('body_style') != 'fullscreen') { ?>
				<div class="content_wrap">
				<?php } ?>

					<?php
					// Widgets area above page content
					corgan_create_widgets_area('widgets_above_page');
					?>				

					<div class="content">
						<?php
						// Widgets area inside page content
						corgan_create_widgets_area('widgets_above_content');
						?>				
