<?php
/**
 * The template for displaying Page title and Breadcrumbs
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

// Page (category, tag, archive, author) title

if ( corgan_need_page_title() ) {
	set_query_var('corgan_title_showed', true);
	$corgan_top_icon = corgan_get_category_icon();
	?>
	<div class="top_panel_title_wrap">
		<div class="content_wrap">
			<div class="top_panel_title">
				<div class="page_title">
					<?php

					// Blog/Post title
					$corgan_blog_title = corgan_get_blog_title();
					$corgan_blog_title_text = $corgan_blog_title_class = $corgan_blog_title_link = $corgan_blog_title_link_text = '';
					if (is_array($corgan_blog_title)) {
						$corgan_blog_title_text = $corgan_blog_title['text'];
						$corgan_blog_title_class = !empty($corgan_blog_title['class']) ? ' '.$corgan_blog_title['class'] : '';
						$corgan_blog_title_link = !empty($corgan_blog_title['link']) ? $corgan_blog_title['link'] : '';
						$corgan_blog_title_link_text = !empty($corgan_blog_title['link_text']) ? $corgan_blog_title['link_text'] : '';
					} else
						$corgan_blog_title_text = $corgan_blog_title;
					?>
					<h2 class="page_caption<?php echo esc_attr($corgan_blog_title_class); ?>"><?php
						if (!empty($corgan_top_icon)) {
							?><img src="<?php echo esc_url($corgan_top_icon); ?>" alt=""><?php
						}
						echo wp_kses_data($corgan_blog_title_text);
					?></h2>
					<?php
					if (!empty($corgan_blog_title_link) && !empty($corgan_blog_title_link_text)) {
						?><a href="<?php echo esc_url($corgan_blog_title_link); ?>" class="theme_button theme_button_small page_title_link"><?php echo esc_html($corgan_blog_title_link_text); ?></a><?php
					}
					
					// Category/Tag description
					if ( is_category() || is_tag() || is_tax() ) 
						the_archive_description( '<div class="page_description">', '</div>' );
					?>
				</div>
				<?php
				// Breadcrumbs
				if (corgan_is_on(corgan_get_theme_option('show_breadcrumbs'))) {
					corgan_show_layout(corgan_get_breadcrumbs(), '<div class="breadcrumbs">', '</div>');
				}
				?>
			</div>
		</div>
	</div>
	<?php
}
?>