<?php
/**
 * The template to display block with post meta
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.6.08
 */

extract(get_query_var('trx_addons_args_sc_show_post_meta'));

$args = array_merge(array(
	'categories' => false,
	'tags' => false,
	'date' => false,
	'edit' => false,
    'author'=> false,
	'seo' => false,
	'share' => false,
	'counters' => ''
	), $args);
?><div class="<?php echo esc_attr($sc); ?>_post_meta post_meta"><?php
	// Post categories
	if ( !empty($args['categories']) ) {
		?><span class="post_meta_item post_categories"><?php the_category( ', ' ); ?></span><?php
	}
	// Post tags
	if ( !empty($args['tags']) ) {
		the_tags( '<span class="post_meta_item post_tags">', ', ', '</span>' );
	}
	// Post date
	if ( !empty($args['date']) && in_array( get_post_type(), array( 'post', 'page', 'attachment' ) ) ) {
		?><span class="post_meta_item post_date<?php if (!empty($args['seo'])) echo ' date updated'; ?>"<?php if (!empty($args['seo'])) echo ' itemprop="datePublished"'; ?>><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_date(); ?></a></span><?php
	}
    // Post author
    if ( !empty($args['author']) &&  in_array( get_post_type(), array( 'post', 'page', 'attachment' ) ) ) {
        echo '<span class="author_name post_meta_item icon-user-1">' . esc_html(get_the_author()) . '</span>';

    }
	// Post counters
	if ( !empty($args['counters']) ) {
		echo str_replace('post_counters_item', 'post_meta_item post_counters_item', trx_addons_get_post_counters($args['counters']));
	}

	// Edit page link
	if ( !empty($args['edit']) ) {
		edit_post_link( esc_html__( 'Edit', 'corgan' ), '<span class="post_meta_item post_edit">', '</span>' );
	}
?></div><!-- .post_meta --><?php
