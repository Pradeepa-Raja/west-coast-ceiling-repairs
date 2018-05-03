<?php
/**
 * The template 'Style 2' to displaying related posts
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

// Thumb image
$corgan_thumb_image = has_post_thumbnail() 
			? wp_get_attachment_image_src(get_post_thumbnail_id(), corgan_get_thumb_size('medium')) 
			: ( (float) wp_get_theme()->get('Version') > 1.0
					? corgan_get_no_image_placeholder()
					: ''
				);
if (is_array($corgan_thumb_image)) $corgan_thumb_image = $corgan_thumb_image[0];
$corgan_link = get_permalink();
$corgan_hover = corgan_get_theme_option('image_hover');
?>
<div class="related_item related_item_style_2">
	<?php if (!empty($corgan_thumb_image)) { ?>
		<div class="post_featured<?php
					if (has_post_thumbnail()) echo ' hover_'.esc_attr($corgan_hover); 
					echo ' ' . esc_attr(corgan_add_inline_style('background-image:url('.esc_url($corgan_thumb_image).');'));
					?>">
			<?php
			if (has_post_thumbnail()) {
				?><div class="mask"></div><?php
				corgan_hovers_add_icons($corgan_hover);
			}
			?>
		</div>
	<?php } ?>
	<div class="post_header entry-header">
		<?php
		if ( in_array(get_post_type(), array( 'post', 'attachment' ) ) ) {
			?><span class="post_date"><a href="<?php echo esc_url($corgan_link); ?>"><?php echo corgan_get_date(); ?></a></span><?php
		}
		?>
		<h6 class="post_title entry-title"><a href="<?php echo esc_url($corgan_link); ?>"><?php echo the_title(); ?></a></h6>
	</div>
</div>
