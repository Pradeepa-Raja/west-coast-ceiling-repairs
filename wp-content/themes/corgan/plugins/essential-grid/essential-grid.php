<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('corgan_essential_grid_theme_setup9')) {
	add_action( 'after_setup_theme', 'corgan_essential_grid_theme_setup9', 9 );
	function corgan_essential_grid_theme_setup9() {
		if (corgan_exists_essential_grid()) {
			add_action( 'wp_enqueue_scripts', 							'corgan_essential_grid_frontend_scripts', 1100 );
			add_filter( 'corgan_filter_merge_styles',					'corgan_essential_grid_merge_styles' );
			add_filter( 'corgan_filter_get_css',						'corgan_essential_grid_get_css', 10, 3 );
		}
		if (is_admin()) {
			add_filter( 'corgan_filter_tgmpa_required_plugins',		'corgan_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'corgan_exists_essential_grid' ) ) {
	function corgan_exists_essential_grid() {
		return defined('EG_PLUGIN_PATH');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'corgan_essential_grid_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('corgan_filter_tgmpa_required_plugins',	'corgan_essential_grid_tgmpa_required_plugins');
	function corgan_essential_grid_tgmpa_required_plugins($list=array()) {
		if (in_array('essential-grid', corgan_storage_get('required_plugins'))) {
            $path = corgan_get_file_dir('plugins/essential-grid/essential-grid.zip');
			$list[] = array(
						'name' 		=> esc_html__('Essential Grid', 'corgan'),
						'slug' 		=> 'essential-grid',
                        'source'	=> !empty($path) ? $path : 'upload://essential-grid.zip',
						'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue plugin's custom styles
if ( !function_exists( 'corgan_essential_grid_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'corgan_essential_grid_frontend_scripts', 1100 );
	function corgan_essential_grid_frontend_scripts() {
		if (corgan_is_on(corgan_get_theme_option('debug_mode')) && file_exists(corgan_get_file_dir('plugins/essential-grid/essential-grid.css')))
			corgan_enqueue_style( 'corgan-essential-grid',  corgan_get_file_url('plugins/essential-grid/essential-grid.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'corgan_essential_grid_merge_styles' ) ) {
	//Handler of the add_filter('corgan_filter_merge_styles', 'corgan_essential_grid_merge_styles');
	function corgan_essential_grid_merge_styles($list) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}



// Add plugin's specific styles into color scheme
//------------------------------------------------------------------------

// Add styles into CSS
if ( !function_exists( 'corgan_essential_grid_get_css' ) ) {
	//Handler of the add_filter( 'corgan_filter_get_css', 'corgan_essential_grid_get_css', 10, 3 );
	function corgan_essential_grid_get_css($css, $colors, $fonts) {
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

CSS;
		}

		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

CSS;
		}
		
		return $css;
	}
}
?>