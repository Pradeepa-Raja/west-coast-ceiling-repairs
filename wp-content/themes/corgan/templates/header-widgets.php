<?php
/**
 * The template for displaying Header widgets area
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

// Header sidebar
$corgan_header_name = corgan_get_theme_option('header_widgets');
$corgan_header_present = !corgan_is_off($corgan_header_name) && is_active_sidebar($corgan_header_name);
if ($corgan_header_present) { 
	corgan_storage_set('current_sidebar', 'header');
	$corgan_header_wide = corgan_get_theme_option('header_wide');
	ob_start();
	do_action( 'corgan_action_before_sidebar' );
	if ( !dynamic_sidebar($corgan_header_name) ) {
		// Put here html if user no set widgets in sidebar
	}
	do_action( 'corgan_action_after_sidebar' );
	$corgan_widgets_output = ob_get_contents();
	ob_end_clean();
	$corgan_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $corgan_widgets_output);
	$corgan_need_columns = strpos($corgan_widgets_output, 'columns_wrap')===false;
	if ($corgan_need_columns) {
		$corgan_columns = max(0, (int) corgan_get_theme_option('header_columns'));
		if ($corgan_columns == 0) $corgan_columns = min(6, max(1, substr_count($corgan_widgets_output, '<aside ')));
		if ($corgan_columns > 1)
			$corgan_widgets_output = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($corgan_columns).' widget ', $corgan_widgets_output);
		else
			$corgan_need_columns = false;
	}
	?>
	<div class="header_widgets_wrap widget_area<?php echo !empty($corgan_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
		<div class="header_widgets_wrap_inner widget_area_inner">
			<?php 
			if (!$corgan_header_wide) { 
				?><div class="content_wrap"><?php
			}
			if ($corgan_need_columns) {
				?><div class="columns_wrap"><?php
			}
			corgan_show_layout($corgan_widgets_output);
			if ($corgan_need_columns) {
				?></div>	<!-- /.columns_wrap --><?php
			}
			if (!$corgan_header_wide) {
				?></div>	<!-- /.content_wrap --><?php
			}
			?>
		</div>	<!-- /.header_widgets_wrap_inner -->
	</div>	<!-- /.header_widgets_wrap -->
<?php
}
?>