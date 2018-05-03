<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

corgan_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	?><div class="posts_container"><?php
	
	$corgan_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$corgan_sticky_out = is_array($corgan_stickies) && count($corgan_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($corgan_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	while ( have_posts() ) { the_post(); 
		if ($corgan_sticky_out && !is_sticky()) {
			$corgan_sticky_out = false;
			?></div><?php
		}
		get_template_part( 'content', $corgan_sticky_out && is_sticky() ? 'sticky' : 'excerpt' );
	}
	if ($corgan_sticky_out) {
		$corgan_sticky_out = false;
		?></div><?php
	}
	
	?></div><?php

	corgan_show_pagination();

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>