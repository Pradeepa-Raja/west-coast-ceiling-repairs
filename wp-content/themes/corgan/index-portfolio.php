<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

corgan_storage_set('blog_archive', true);

// Load scripts for both 'Gallery' and 'Portfolio' layouts!
corgan_enqueue_script( 'classie', corgan_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
corgan_enqueue_script( 'imagesloaded', corgan_get_file_url('js/theme.gallery/imagesloaded.min.js'), array(), null, true );
corgan_enqueue_script( 'masonry', corgan_get_file_url('js/theme.gallery/masonry.min.js'), array(), null, true );
corgan_enqueue_script( 'corgan-gallery-script', corgan_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$corgan_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$corgan_sticky_out = is_array($corgan_stickies) && count($corgan_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$corgan_show_filters = corgan_get_theme_option('show_filters');
	$corgan_tabs = array();
	if (!corgan_is_off($corgan_show_filters)) {
		$corgan_cat = corgan_get_theme_option('parent_cat');
		$corgan_post_type = corgan_get_theme_option('post_type');
		$corgan_taxonomy = corgan_get_post_type_taxonomy($corgan_post_type);
		$corgan_args = array(
			'type'			=> $corgan_post_type,
			'child_of'		=> $corgan_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $corgan_taxonomy,
			'pad_counts'	=> false
		);
		$corgan_portfolio_list = get_terms($corgan_args);
		if (is_array($corgan_portfolio_list) && count($corgan_portfolio_list) > 0) {
			$corgan_tabs[$corgan_cat] = esc_html__('All', 'corgan');
			foreach ($corgan_portfolio_list as $corgan_term) {
				if (isset($corgan_term->term_id)) $corgan_tabs[$corgan_term->term_id] = $corgan_term->name;
			}
		}
	}
	if (count($corgan_tabs) > 0) {
		$corgan_portfolio_filters_ajax = true;
		$corgan_portfolio_filters_active = $corgan_cat;
		$corgan_portfolio_filters_id = 'portfolio_filters';
		if (!is_customize_preview())
			wp_enqueue_script('jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true);
		?>
		<div class="portfolio_filters corgan_tabs corgan_tabs_ajax">
			<ul class="portfolio_titles corgan_tabs_titles">
				<?php
				foreach ($corgan_tabs as $corgan_id=>$corgan_title) {
					?><li><a href="<?php echo esc_url(corgan_get_hash_link(sprintf('#%s_%s_content', $corgan_portfolio_filters_id, $corgan_id))); ?>" data-tab="<?php echo esc_attr($corgan_id); ?>"><?php echo esc_html($corgan_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$corgan_ppp = corgan_get_theme_option('posts_per_page');
			if (corgan_is_inherit($corgan_ppp)) $corgan_ppp = '';
			foreach ($corgan_tabs as $corgan_id=>$corgan_title) {
				$corgan_portfolio_need_content = $corgan_id==$corgan_portfolio_filters_active || !$corgan_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $corgan_portfolio_filters_id, $corgan_id)); ?>"
					class="portfolio_content corgan_tabs_content"
					data-blog-template="<?php echo esc_attr(corgan_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(corgan_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($corgan_ppp); ?>"
					data-post-type="<?php echo esc_attr($corgan_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($corgan_taxonomy); ?>"
					data-cat="<?php echo esc_attr($corgan_id); ?>"
					data-parent-cat="<?php echo esc_attr($corgan_cat); ?>"
					data-need-content="<?php echo (false===$corgan_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($corgan_portfolio_need_content) 
						corgan_show_portfolio_posts(array(
							'cat' => $corgan_id,
							'parent_cat' => $corgan_cat,
							'taxonomy' => $corgan_taxonomy,
							'post_type' => $corgan_post_type,
							'page' => 1,
							'sticky' => $corgan_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		corgan_show_portfolio_posts(array(
			'cat' => $corgan_id,
			'parent_cat' => $corgan_cat,
			'taxonomy' => $corgan_taxonomy,
			'post_type' => $corgan_post_type,
			'page' => 1,
			'sticky' => $corgan_sticky_out
			)
		);
	}

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>