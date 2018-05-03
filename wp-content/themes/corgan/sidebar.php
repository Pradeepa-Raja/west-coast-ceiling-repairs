<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

$corgan_sidebar_position = corgan_get_theme_option('sidebar_position');
if (corgan_sidebar_present()) {
	$corgan_sidebar_name = corgan_get_theme_option('sidebar_widgets');
	corgan_storage_set('current_sidebar', 'sidebar');
	?>
	<div class="sidebar <?php echo esc_attr($corgan_sidebar_position); ?> widget_area<?php if (!corgan_is_inherit(corgan_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(corgan_get_theme_option('sidebar_scheme')); ?>" role="complementary">
		<div class="sidebar_inner">
			<?php
			ob_start();
			do_action( 'corgan_action_before_sidebar' );
			if ( !dynamic_sidebar($corgan_sidebar_name) ) {
				// Put here html if user no set widgets in sidebar
			}
			do_action( 'corgan_action_after_sidebar' );
			$corgan_out = ob_get_contents();
			ob_end_clean();
			corgan_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $corgan_out));
			?>
		</div><!-- /.sidebar_inner -->
	</div><!-- /.sidebar -->
	<?php
}
?>