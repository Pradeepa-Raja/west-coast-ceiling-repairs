<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('corgan_mailchimp_theme_setup9')) {
	add_action( 'after_setup_theme', 'corgan_mailchimp_theme_setup9', 9 );
	function corgan_mailchimp_theme_setup9() {
		if (corgan_exists_mailchimp()) {
			add_action( 'wp_enqueue_scripts',							'corgan_mailchimp_frontend_scripts', 1100 );
			add_filter( 'corgan_filter_merge_styles',					'corgan_mailchimp_merge_styles');
			add_filter( 'corgan_filter_get_css',						'corgan_mailchimp_get_css', 10, 3);
		}
		if (is_admin()) {
			add_filter( 'corgan_filter_tgmpa_required_plugins',		'corgan_mailchimp_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'corgan_exists_mailchimp' ) ) {
	function corgan_exists_mailchimp() {
		return function_exists('__mc4wp_load_plugin') || defined('MC4WP_VERSION');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'corgan_mailchimp_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('corgan_filter_tgmpa_required_plugins',	'corgan_mailchimp_tgmpa_required_plugins');
	function corgan_mailchimp_tgmpa_required_plugins($list=array()) {
		if (in_array('mailchimp-for-wp', corgan_storage_get('required_plugins')))
			$list[] = array(
				'name' 		=> esc_html__('MailChimp for WP', 'corgan'),
				'slug' 		=> 'mailchimp-for-wp',
				'required' 	=> false
			);
		return $list;
	}
}



// Custom styles and scripts
//------------------------------------------------------------------------

// Enqueue custom styles
if ( !function_exists( 'corgan_mailchimp_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'corgan_mailchimp_frontend_scripts', 1100 );
	function corgan_mailchimp_frontend_scripts() {
		if (corgan_exists_mailchimp()) {
			if (corgan_is_on(corgan_get_theme_option('debug_mode')) && file_exists(corgan_get_file_dir('plugins/mailchimp-for-wp/mailchimp-for-wp.css')))
				corgan_enqueue_style( 'corgan-mailchimp-for-wp',  corgan_get_file_url('plugins/mailchimp-for-wp/mailchimp-for-wp.css'), array(), null );
		}
	}
}
	
// Merge custom styles
if ( !function_exists( 'corgan_mailchimp_merge_styles' ) ) {
	//Handler of the add_filter( 'corgan_filter_merge_styles', 'corgan_mailchimp_merge_styles');
	function corgan_mailchimp_merge_styles($list) {
		$list[] = 'plugins/mailchimp-for-wp/mailchimp-for-wp.css';
		return $list;
	}
}

// Add css styles into global CSS stylesheet
if (!function_exists('corgan_mailchimp_get_css')) {
	//Handler of the add_filter('corgan_filter_get_css', 'corgan_mailchimp_get_css', 10, 3);
	function corgan_mailchimp_get_css($css, $colors, $fonts) {
		
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

CSS;
		}
		
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

.mc4wp-form input[type="email"] {
	background-color: {$colors['bg_color_04']};
	color: {$colors['bg_color']};
}
.mc4wp-form .mc4wp-alert {
	color: {$colors['bg_color']};
}
.mc4wp-form input[type="email"]::-webkit-input-placeholder {
	color: {$colors['bg_color']};
}
.mc4wp-form input[type="submit"] {
	background: transparent !important;
	background-color: {$colors['bg_color']} !important;
	color: {$colors['text_link']};
}
.mc4wp-form input[type="submit"]:hover {
	background-color: {$colors['text_dark']} !important;
	color: {$colors['text_link']};
}

CSS;
		}

		return $css;
	}
}
?>