<?php
/**
 * The template for displaying main menu
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */
$corgan_header_image = get_query_var('corgan_header_image');
?>
<div class="top_panel_fixed_wrap"></div>
<div class="top_panel_navi 
			<?php if ($corgan_header_image!='') echo ' with_bg_image'; ?>
			scheme_<?php echo esc_attr(corgan_is_inherit(corgan_get_theme_option('menu_scheme')) 
												? (corgan_is_inherit(corgan_get_theme_option('header_scheme')) 
													? corgan_get_theme_option('color_scheme') 
													: corgan_get_theme_option('header_scheme')) 
												: corgan_get_theme_option('menu_scheme')); ?>">
	<div class="menu_main_wrap clearfix menu_hover_<?php echo esc_attr(corgan_get_theme_option('menu_hover')); ?>">
		<div class="content_wrap">
            <div class="columns_wrap columns_fluid">
                <div class="column-1_4 column-logo">
			<?php
			// Filter header components
			$corgan_header_parts = apply_filters('corgan_filter_header_parts', array(
				'logo' => true,
				'menu' => true,
				'search' => false
				),
				'menu_main');
			
			// Logo
			if (!empty($corgan_header_parts['logo'])) {
				get_template_part( 'templates/header-logo' );
			}
            ?></div><div class="column-2_4">
            <?php
			
			// Main menu
			if (!empty($corgan_header_parts['menu'])) {
				$corgan_corgan_menu_main = corgan_get_nav_menu('menu_main');
				if (empty($corgan_corgan_menu_main)) $corgan_corgan_menu_main = corgan_get_nav_menu();
				corgan_show_layout($corgan_corgan_menu_main);
				// Store menu layout for the mobile menu
				set_query_var('corgan_menu_main', $corgan_corgan_menu_main);
			}
            ?>
            </div><div class="column-1_4">
                <?php
                if (corgan_get_theme_option('show_button_header') == '1' ) {
                    $header_button = corgan_get_theme_option('button_header_text');
                    $header_link = corgan_get_theme_option('button_header_link');
                    if ((!empty($header_button)) && (!empty($header_link))) echo '<div class="sc_item_button top_panel_nav_button"><a class="sc_button sc_button_icon_left sc_button_hover_slide_left" href="'
                        . esc_html($header_link) .'">' . esc_html($header_button) . '</a></div>';
                }

                if ( (corgan_get_theme_option('show_cart_header') == '1') && !(is_checkout() || is_cart()) ) {
                    ?>
                    <div class="contact_field contact_cart"><?php
                        get_template_part('templates/contact-info-cart');
                        ?>
                    </div>
                <?php
                }
                ?>

            </div></div>
		</div>
	</div>
</div><!-- /.top_panel_navi -->