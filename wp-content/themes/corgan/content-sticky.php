<?php
/**
 * The Sticky template for displaying sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

$corgan_columns = max(1, min(3, count(get_option( 'sticky_posts' ))));
$corgan_post_format = get_post_format();
$corgan_post_format = empty($corgan_post_format) ? 'standard' : str_replace('post-format-', '', $corgan_post_format);
$corgan_animation = corgan_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($corgan_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_'.esc_attr($corgan_post_format) ); ?>
	<?php echo (!corgan_is_off($corgan_animation) ? ' data-animation="'.esc_attr(corgan_get_animation_classes($corgan_animation)).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	corgan_show_post_featured(array(
		'thumb_size' => corgan_get_thumb_size($corgan_columns==1 ? 'big' : ($corgan_columns==2 ? 'med' : 'avatar'))
	));

	if ( !in_array($corgan_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			corgan_show_post_meta();
			?>
		</div><!-- .entry-header -->
		<?php
	}
    // Post content area
    ?><div class="post_content_inner"><?php
            if (has_excerpt()) {
                the_excerpt();
            } else if (strpos(get_the_content('!--more'), '!--more')!==false) {
                the_content( '' );
            } else if (in_array($corgan_post_format, array('link', 'aside', 'status', 'quote'))) {
                the_content();
            } else if (substr(get_the_content(), 0, 1)!='[') {
                the_excerpt();
            }
            ?></div><?php
	?>
</article></div>