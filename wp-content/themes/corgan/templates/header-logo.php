<?php
/**
 * The template for displaying Logo or Site name and slogan in the Header
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

// Site logo
$corgan_logo_image = '';
if (corgan_get_retina_multiplier(2) > 1)
	$corgan_logo_image = corgan_get_theme_option( 'logo_retina' );
if (empty($corgan_logo_image)) 
	$corgan_logo_image = corgan_get_theme_option( 'logo' );
$corgan_logo_text   = get_bloginfo( 'name' );
$corgan_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($corgan_logo_image) || !empty($corgan_logo_text)) {
	?><a class="logo" href="<?php echo is_front_page() ? '#' : esc_url(home_url('/')); ?>"><?php
		if (!empty($corgan_logo_image)) {
			$corgan_attr = corgan_getimagesize($corgan_logo_image);
			echo '<img src="'.esc_url($corgan_logo_image).'" class="logo_main" alt=""'.(!empty($corgan_attr[3]) ? sprintf(' %s', $corgan_attr[3]) : '').'>' ;
		} else {
			corgan_show_layout(corgan_prepare_macros($corgan_logo_text), '<span class="logo_text">', '</span>');
			corgan_show_layout(corgan_prepare_macros($corgan_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>