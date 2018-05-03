<?php
/**
 * The template to displaying popup with Theme Icons
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

$corgan_icons = corgan_get_list_icons();
if (is_array($corgan_icons)) {
	?>
	<div class="corgan_list_icons">
		<?php
		foreach($corgan_icons as $icon) {
			?><span class="<?php echo esc_attr($icon); ?>" title="<?php echo esc_attr($icon); ?>"></span><?php
		}
		?>
	</div>
	<?php
}
?>