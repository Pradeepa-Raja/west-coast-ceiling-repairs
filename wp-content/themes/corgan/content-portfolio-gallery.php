<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

$corgan_blog_style = explode('_', corgan_get_theme_option('blog_style'));
$corgan_columns = empty($corgan_blog_style[1]) ? 2 : max(2, $corgan_blog_style[1]);
$corgan_post_format = get_post_format();
$corgan_post_format = empty($corgan_post_format) ? 'standard' : str_replace('post-format-', '', $corgan_post_format);
$corgan_animation = corgan_get_theme_option('blog_animation');
$corgan_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($corgan_columns).' post_format_'.esc_attr($corgan_post_format) ); ?>
	<?php echo (!corgan_is_off($corgan_animation) ? ' data-animation="'.esc_attr(corgan_get_animation_classes($corgan_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($corgan_image[1]) && !empty($corgan_image[2])) echo intval($corgan_image[1]) .'x' . intval($corgan_image[2]); ?>"
	data-src="<?php if (!empty($corgan_image[0])) echo esc_url($corgan_image[0]); ?>"
	>

	<?php
	$corgan_image_hover = 'icon';	//corgan_get_theme_option('image_hover');
	if (in_array($corgan_image_hover, array('icons', 'zoom'))) $corgan_image_hover = 'dots';
	// Featured image
	corgan_show_post_featured(array(
		'hover' => $corgan_image_hover,
		'thumb_size' => corgan_get_thumb_size( strpos(corgan_get_theme_option('body_style'), 'full')!==false || $corgan_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. corgan_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => false,
									'seo' => false,
									'share' => true,
									'counters' => 'comments',
									'echo' => false
									))
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'corgan') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>