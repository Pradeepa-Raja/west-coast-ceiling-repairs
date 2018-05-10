<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

						// Widgets area inside page content
						corgan_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					corgan_create_widgets_area('widgets_below_page');

					$corgan_body_style = corgan_get_theme_option('body_style');
					if ($corgan_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			$corgan_footer_scheme =  corgan_is_inherit(corgan_get_theme_option('footer_scheme')) ? corgan_get_theme_option('color_scheme') : corgan_get_theme_option('footer_scheme');
            ?>
			
			<footer class="site_footer_wrap scheme_<?php echo esc_attr($corgan_footer_scheme); ?>">
				<?php
                // Footer call to action
               /* if (corgan_get_theme_option('call_in_footer')=='1') {

                    $call_title = corgan_get_theme_option('call_title');
                    $call_text = corgan_get_theme_option('call_text');
                    $call_button = corgan_get_theme_option('call_button');
                    $call_link = corgan_get_theme_option('call_link');

                    if (!empty($call_title) || !empty($call_text) || !empty($call_button) || !empty($call_link)) {
                        ?>
                        <div class="call_wrap">
                            <div class="call_wrap_inner">
                                <div class="content_wrap">
                                    <?php if (!empty($call_title)) echo '<h2 class="call-title">' . esc_html($call_title) . '</h2>'; ?>
                                    <?php if (!empty($call_text)) echo '<div class="call-text">' . esc_html($call_text) . '</div>'; ?>
                                    <?php if ((!empty($call_button)) && (!empty($call_link))) echo '<div class="sc_item_button"><a class="sc_button sc_button_default sc_button_size_large sc_button_icon_left sc_button_hover_slide_left" href="'
                                        . esc_html($call_link) .'">' . esc_html($call_button) . '</a></div>'; ?>

                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }*/

				// Footer sidebar
				$corgan_footer_name = corgan_get_theme_option('footer_widgets');
				$corgan_footer_present = !corgan_is_off($corgan_footer_name) && is_active_sidebar($corgan_footer_name);
				if ($corgan_footer_present) { 
					corgan_storage_set('current_sidebar', 'footer');
					$corgan_footer_wide = corgan_get_theme_option('footer_wide');
					ob_start();
					do_action( 'corgan_action_before_sidebar' );
					if ( !dynamic_sidebar($corgan_footer_name) ) {
						// Put here html if user no set widgets in sidebar
					}
					do_action( 'corgan_action_after_sidebar' );
					$corgan_out = ob_get_contents();
					ob_end_clean();
					$corgan_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $corgan_out);
					$corgan_need_columns = true;	//or check: strpos($corgan_out, 'columns_wrap')===false;
					if ($corgan_need_columns) {
						$corgan_columns = max(0, (int) corgan_get_theme_option('footer_columns'));
						if ($corgan_columns == 0) $corgan_columns = min(6, max(1, substr_count($corgan_out, '<aside ')));
						if ($corgan_columns > 1)
							$corgan_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($corgan_columns).' widget ', $corgan_out);
						else
							$corgan_need_columns = false;
					}
					?>
					<div class="footer_wrap widget_area<?php echo !empty($corgan_footer_wide) ? ' footer_fullwidth' : ''; ?>">
						<div class="footer_wrap_inner widget_area_inner">
							<?php 
							if (!$corgan_footer_wide) { 
								?><div class="content_wrap"><?php
							}
							if ($corgan_need_columns) {
								?><div class="columns_wrap"><?php
							}
							corgan_show_layout($corgan_out);
							if ($corgan_need_columns) {
								?></div><!-- /.columns_wrap --><?php
							}
							if (!$corgan_footer_wide) {
								?></div><!-- /.content_wrap --><?php
							}
							?>
						</div><!-- /.footer_wrap_inner -->
					</div><!-- /.footer_wrap -->
				<?php
				}
	
				// Logo
				if (corgan_is_on(corgan_get_theme_option('logo_in_footer'))) {
					$corgan_logo_image = '';
					if (corgan_get_retina_multiplier(2) > 1)
						$corgan_logo_image = corgan_get_theme_option( 'logo_footer_retina' );
					if (empty($corgan_logo_image)) 
						$corgan_logo_image = corgan_get_theme_option( 'logo_footer' );
					$corgan_logo_text   = get_bloginfo( 'name' );
					if (!empty($corgan_logo_image) || !empty($corgan_logo_text)) {
						?>
						<div class="logo_footer_wrap">
							<div class="logo_footer_wrap_inner">
								<?php
								if (!empty($corgan_logo_image)) {
									$corgan_attr = corgan_getimagesize($corgan_logo_image);
									echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($corgan_logo_image).'" class="logo_footer_image" alt=""'.(!empty($corgan_attr[3]) ? sprintf(' %s', $corgan_attr[3]) : '').'></a>' ;
								} else if (!empty($corgan_logo_text)) {
									echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($corgan_logo_text) . '</a></h1>';
								}
								?>
							</div>
						</div>
						<?php
					}
				}

				// Socials
				if ( corgan_is_on(corgan_get_theme_option('socials_in_footer')) && ($corgan_output = corgan_get_socials_links()) != '') {
					?>
					<div class="socials_footer_wrap socials_wrap">
						<div class="socials_footer_wrap_inner">
							<?php corgan_show_layout($corgan_output); ?>
						</div>
					</div>
					<?php
				}


				
				// Copyright area
				$corgan_copyright_scheme = corgan_is_inherit(corgan_get_theme_option('copyright_scheme')) ? $corgan_footer_scheme : corgan_get_theme_option('copyright_scheme');
				?> 
				<div class="copyright_wrap scheme_<?php echo esc_attr($corgan_copyright_scheme); ?>">
					<div class="copyright_wrap_inner">
						<div class="content_wrap">
                            <?php

                            // Footer menu
                            $corgan_menu_footer = corgan_get_nav_menu('menu_footer');
                            if (!empty($corgan_menu_footer)) {
                                corgan_show_layout($corgan_menu_footer);
                            }


                            ?>
							<div class="copyright_text">
								
							© 2018, West Coast Ceiling Repairs Designed by <a href="https://www.predikkta.com/" target="_blank">Predikkta</a>
							</div>
						</div>
					</div>
				</div>

			</footer><!-- /.site_footer_wrap -->
			
		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (corgan_is_on(corgan_get_theme_option('debug_mode')) && file_exists(corgan_get_file_dir('images/makeup.jpg'))) { ?>
		<img src="<?php echo esc_url(corgan_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php wp_footer(); ?>

</body>
</html>