<?php
/**
 * The template to display image and page description
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

$corgan_image = corgan_get_theme_option('header_title_image');
$corgan_text = corgan_get_theme_option('header_title_text');
if (!empty($corgan_image) || !empty($corgan_text)) {
	?>
	<div class="top_panel_title_2_wrap">
		<div class="content_wrap">
			<div class="top_panel_title_2">
				<?php
				if (!empty($corgan_image)) {
					$corgan_attr = corgan_getimagesize($corgan_image);
					echo '<div class="top_panel_title_2_image"><img src="'.esc_url($corgan_image).'" alt=""'.(!empty($corgan_attr[3]) ? sprintf(' %s', $corgan_attr[3]) : '').'></div>';
				}
				corgan_show_layout($corgan_text, '<div class="top_panel_title_2_text">', '</div>');
				?>
			</div>
		</div>
	</div>
	<?php
}
?>