<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

// Thumb image
$corgan_thumb_image = has_post_thumbnail() 
			? wp_get_attachment_image_src(get_post_thumbnail_id(), corgan_get_thumb_size('portrait')) 
			: ( (float) wp_get_theme()->get('Version') > 1.0
					? corgan_get_no_image_placeholder()
					: ''
				);
if (is_array($corgan_thumb_image)) $corgan_thumb_image = $corgan_thumb_image[0];
$corgan_link = get_permalink();
?>
<div class="related_item related_item_style_1">
	<?php if (!empty($corgan_thumb_image)) { ?>
		<div class="post_featured <?php echo esc_attr(corgan_add_inline_style('background-image:url('.esc_url($corgan_thumb_image).');')); ?>">
			<div class="post_header entry-header">
				<div class="post_categories"><?php the_category( '' ); ?></div>
				<h6 class="post_title entry-title"><a href="<?php echo esc_url($corgan_link); ?>"><?php echo the_title(); ?></a></h6>
				<?php
				if ( in_array(get_post_type(), array( 'post', 'attachment' ) ) ) {
					?><span class="post_date"><a href="<?php echo esc_url($corgan_link); ?>"><?php echo corgan_get_date(); ?></a></span><?php
				}
				?>
			</div>
		</div>
	<?php } ?>
</div>
