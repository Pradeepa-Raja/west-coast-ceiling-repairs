<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the Visual Composer to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$corgan_content = '';
$corgan_blog_archive_mask = '%%CONTENT%%';
$corgan_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $corgan_blog_archive_mask);
if ( have_posts() ) {
	the_post(); 
	if (($corgan_content = apply_filters('the_content', get_the_content())) != '') {
		if (($corgan_pos = strpos($corgan_content, $corgan_blog_archive_mask)) !== false) {
			$corgan_content = preg_replace('/(\<p\>\s*)?'.$corgan_blog_archive_mask.'(\s*\<\/p\>)/i', $corgan_blog_archive_subst, $corgan_content);
		} else
			$corgan_content .= $corgan_blog_archive_subst;
		$corgan_content = explode($corgan_blog_archive_mask, $corgan_content);
	}
}

// Make new query
$corgan_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$corgan_args = corgan_query_add_posts_and_cats($corgan_args, '', corgan_get_theme_option('post_type'), corgan_get_theme_option('parent_cat'));
$corgan_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($corgan_page_number > 1) {
	$corgan_args['paged'] = $corgan_page_number;
	$corgan_args['ignore_sticky_posts'] = true;
}
$corgan_ppp = corgan_get_theme_option('posts_per_page');
if ((int) $corgan_ppp != 0)
	$corgan_args['posts_per_page'] = (int) $corgan_ppp;

query_posts( $corgan_args );

// Set query vars in the new query!
if (is_array($corgan_content) && count($corgan_content) == 2) {
	set_query_var('blog_archive_start', $corgan_content[0]);
	set_query_var('blog_archive_end', $corgan_content[1]);
}

get_template_part('index');
?>