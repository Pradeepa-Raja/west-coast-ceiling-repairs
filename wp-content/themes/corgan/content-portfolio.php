<?php
/**
 * The Portfolio template for displaying content
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

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($corgan_columns).' post_format_'.esc_attr($corgan_post_format) ); ?>
	<?php echo (!corgan_is_off($corgan_animation) ? ' data-animation="'.esc_attr(corgan_get_animation_classes($corgan_animation)).'"' : ''); ?>
	>

	<?php
	$corgan_image_hover = corgan_get_theme_option('image_hover');
	// Featured image
	corgan_show_post_featured(array(
		'thumb_size' => corgan_get_thumb_size(strpos(corgan_get_theme_option('body_style'), 'full')!==false || $corgan_columns < 3 ? 'masonry-big' : 'masonry'),
		'show_no_image' => true,
		'class' => $corgan_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $corgan_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>