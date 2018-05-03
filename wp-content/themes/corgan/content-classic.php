<?php
/**
 * The Classic template for displaying content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

$corgan_blog_style = explode('_', corgan_get_theme_option('blog_style'));
$corgan_columns = empty($corgan_blog_style[1]) ? 2 : max(2, $corgan_blog_style[1]);
$corgan_expanded = !corgan_sidebar_present() && corgan_is_on(corgan_get_theme_option('expand_content'));
$corgan_post_format = get_post_format();
$corgan_post_format = empty($corgan_post_format) ? 'standard' : str_replace('post-format-', '', $corgan_post_format);
$corgan_animation = corgan_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($corgan_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_classic post_layout_classic_'.esc_attr($corgan_columns).' post_format_'.esc_attr($corgan_post_format) ); ?>
	<?php echo (!corgan_is_off($corgan_animation) ? ' data-animation="'.esc_attr(corgan_get_animation_classes($corgan_animation)).'"' : ''); ?>
	>

	<?php

	// Featured image
	corgan_show_post_featured( array( 'thumb_size' => corgan_get_thumb_size(
													strpos(corgan_get_theme_option('body_style'), 'full')!==false 
														? ( $corgan_columns > 2 ? 'big' : 'huge' )
														: (	$corgan_columns > 2
															? ($corgan_expanded ? 'med' : 'small')
															: ($corgan_expanded ? 'big' : 'med')
															)
														)
										) );

	if ( !in_array($corgan_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php 
			do_action('corgan_action_before_post_title');

            // Post meta
            corgan_show_post_meta(array(
                    'categories' => false,
                    'date' => true,
                    'author' => false,
                    'edit' => false,
                    'seo' => false,
                    'share' => false,
                    'counters' => ''	//comments,likes,views - comma separated in any combination
                )
            );
			// Post title
			the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

			do_action('corgan_action_before_post_meta'); 
			?>
		</div><!-- .entry-header -->
		<?php
	}		
	?>

	<div class="post_content entry-content">
		<div class="post_content_inner">
			<?php
			$corgan_show_learn_more = true; //!in_array($corgan_post_format, array('link', 'aside', 'status', 'quote'));
			if (has_excerpt()) {
				the_excerpt();
			} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
				the_content( '' );
			} else if (in_array($corgan_post_format, array('link', 'aside', 'status', 'quote'))) {
				the_content();
			} else if (substr(get_the_content(), 0, 1)!='[') {
				the_excerpt();
			}
			?>
		</div>
		<?php
        // Post meta
        corgan_show_post_meta(array(
                'categories' => false,
                'date' => false,
                'author' => true,
                'edit' => false,
                'seo' => false,
                'share' => false,
                'counters' => 'views,comments'	//comments,likes,views - comma separated in any combination
            )
        );
		// More button
		if ( $corgan_show_learn_more ) {
			?><p><a class="more-link" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'corgan'); ?></a></p><?php
		}
		?>
	</div><!-- .entry-content -->

</article></div>