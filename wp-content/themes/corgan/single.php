<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

get_header();

while ( have_posts() ) { the_post();

	get_template_part( 'content', get_post_format() );


	// Related posts
	corgan_show_related_posts(array(
										'orderby' => 'post_date',	// put here 'rand' if you want to show posts in random order
										'order' => 'DESC',
										'numberposts' => 2
										), 2);

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
?>