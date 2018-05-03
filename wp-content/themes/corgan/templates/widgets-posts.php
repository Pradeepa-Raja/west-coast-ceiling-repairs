<?php
/**
 * The template for displaying posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

$corgan_post_id    = get_the_ID();
$corgan_post_date  = corgan_get_date();
$corgan_post_title = get_the_title();
$corgan_post_link  = get_permalink();
$corgan_post_author_id   = get_the_author_meta('ID');
$corgan_post_author_name = get_the_author_meta('display_name');
$corgan_post_author_url  = get_author_posts_url($corgan_post_author_id, '');

$corgan_args = get_query_var('corgan_args_widgets_posts');
$corgan_show_date = isset($corgan_args['show_date']) ? (int) $corgan_args['show_date'] : 1;
$corgan_show_image = isset($corgan_args['show_image']) ? (int) $corgan_args['show_image'] : 1;
$corgan_show_author = isset($corgan_args['show_author']) ? (int) $corgan_args['show_author'] : 1;
$corgan_show_counters = isset($corgan_args['show_counters']) ? (int) $corgan_args['show_counters'] : 1;
$corgan_show_categories = isset($corgan_args['show_categories']) ? (int) $corgan_args['show_categories'] : 1;

$corgan_output = corgan_storage_get('corgan_output_widgets_posts');

$corgan_post_counters_output = '';
if ( $corgan_show_counters ) {
	$corgan_post_counters_output = '<span class="post_info_item post_info_counters">'
								. corgan_get_post_counters('comments')
							. '</span>';
}


$corgan_output .= '<article class="post_item with_thumb">';

if ($corgan_show_image) {
	$corgan_post_thumb = get_the_post_thumbnail($corgan_post_id, corgan_get_thumb_size('tiny'), array(
		'alt' => get_the_title()
	));
	if ($corgan_post_thumb) $corgan_output .= '<div class="post_thumb">' . ($corgan_post_link ? '<a href="' . esc_url($corgan_post_link) . '">' : '') . ($corgan_post_thumb) . ($corgan_post_link ? '</a>' : '') . '</div>';
}

$corgan_output .= '<div class="post_content">'
			. ($corgan_show_categories 
					? '<div class="post_categories">'
						. corgan_get_post_categories()
						. $corgan_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($corgan_post_link ? '<a href="' . esc_url($corgan_post_link) . '">' : '') . ($corgan_post_title) . ($corgan_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('corgan_filter_get_post_info', 
								'<div class="post_info">'
									. ($corgan_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($corgan_post_link ? '<a href="' . esc_url($corgan_post_link) . '" class="post_info_date">' : '') 
											. esc_html($corgan_post_date) 
											. ($corgan_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($corgan_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'corgan') . ' ' 
											. ($corgan_post_link ? '<a href="' . esc_url($corgan_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($corgan_post_author_name) 
											. ($corgan_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$corgan_show_categories && $corgan_post_counters_output
										? $corgan_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
corgan_storage_set('corgan_output_widgets_posts', $corgan_output);
?>