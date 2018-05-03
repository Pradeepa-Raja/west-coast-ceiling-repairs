<?php
/**
 * ThemeREX Shortcodes
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

// Don't load directly
if ( ! defined( 'TRX_ADDONS_VERSION' ) ) {
	die( '-1' );
}

// Include files with shortcodes
if (!function_exists('trx_addons_sc_load')) {
	add_action( 'after_setup_theme', 'trx_addons_sc_load', 6 );
	add_action( 'trx_addons_action_save_options', 'trx_addons_sc_load', 6 );
	function trx_addons_sc_load() {
		static $loaded = false;
		if ($loaded) return;
		$loaded = true;
		$trx_addons_shortcodes = apply_filters('trx_addons_sc_list', array(
			'action',
			'anchor',
			'blogger',
			'button',
			'content',
			'countdown',
			'form',
			'googlemap',
			'icons',
			'price',
			'promo',
			'skills',
			'socials',
			'table',
			'title'
			)
		);
		if (is_array($trx_addons_shortcodes) && count($trx_addons_shortcodes) > 0) {
			foreach ($trx_addons_shortcodes as $s) {
				if ( ($fdir = trx_addons_get_file_dir("shortcodes/{$s}/{$s}.php")) != '') { include_once $fdir; }
			}
		}
	}
}


	
// Load required styles and scripts for the frontend
if ( !function_exists( 'trx_addons_sc_load_scripts_front' ) ) {
	add_action("wp_enqueue_scripts", 'trx_addons_sc_load_scripts_front');
	function trx_addons_sc_load_scripts_front() {
		if (trx_addons_is_on(trx_addons_get_option('debug_mode'))) {
			trx_addons_enqueue_style( 'trx_addons-sc', trx_addons_get_file_url('shortcodes/shortcodes.css'), array(), null );
			trx_addons_enqueue_script( 'trx_addons-sc', trx_addons_get_file_url('shortcodes/shortcodes.js'), array('jquery'), null, true );
		}
	}
}

	
// Merge shortcode's specific styles into single stylesheet
if ( !function_exists( 'trx_addons_sc_merge_styles' ) ) {
	add_action("trx_addons_filter_merge_styles", 'trx_addons_sc_merge_styles');
	function trx_addons_sc_merge_styles($list) {
		$list[] = 'shortcodes/shortcodes.css';
		return $list;
	}
}

	
// Merge shortcode's specific scripts into single file
if ( !function_exists( 'trx_addons_sc_merge_scripts' ) ) {
	add_action("trx_addons_filter_merge_scripts", 'trx_addons_sc_merge_scripts');
	function trx_addons_sc_merge_scripts($list) {
		$list[] = 'shortcodes/shortcodes.js';
		return $list;
	}
}


// Shortcodes parts
//---------------------------------------

// Prepare Id, custom CSS and other parameters in the shortcode's atts
if (!function_exists('trx_addons_sc_prepare_atts')) {
	function trx_addons_sc_prepare_atts($sc, $atts, $defa) {
		// Merge atts with default values
		$atts = trx_addons_html_decode(shortcode_atts(apply_filters('trx_addons_sc_atts', $defa, $sc), $atts));
		// Unsafe item description
		if (!empty($atts['description']))
			$atts['description'] = trim( vc_value_from_safe( $atts['description'] ) );
		// Generate id (if empty)
        if (empty($atts['id']))
        	$atts['id'] = str_replace('trx_', '', $sc) . '_' . str_replace('.', '', mt_rand());
		// Add custom CSS class
		if (!empty($atts['css'])) {
			$atts['class'] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
											(!empty($atts['class']) ? $atts['class'] . ' ' : '') . vc_shortcode_custom_css_class( $atts['css'], ' ' ),
											$sc,
											$atts);
			$atts['css'] = '';
		}
 		return apply_filters('trx_addons_filter_sc_prepare_atts', $atts, $sc);
	}
}

// Enqueue iconed fonts
if (!function_exists('trx_addons_enqueue_icons')) {
	function trx_addons_enqueue_icons($list='') {
		if (!empty($list) && function_exists('vc_icon_element_fonts_enqueue')) {
			$list = explode(',', $list);
			foreach ($list as $icon_type)
				vc_icon_element_fonts_enqueue($icon_type);
		}
	}
}

// Display title, subtitle and description for some shortcodes
if (!function_exists('trx_addons_sc_show_titles')) {
    function trx_addons_sc_show_titles($sc, $args, $size='') {
        if (($fdir = trx_addons_get_file_dir('templates/tpl.sc_titles.php')) != '') {
            set_query_var('trx_addons_args_sc_show_titles', compact('sc', 'args', 'size') );
            include $fdir;
        }
    }
}

// Display link button or image for some shortcodes
if (!function_exists('trx_addons_sc_show_links')) {
    function trx_addons_sc_show_links($sc, $args) {
        if (($fdir = trx_addons_get_file_dir('templates/tpl.sc_links.php')) != '') {
            set_query_var('trx_addons_args_sc_show_links', compact('sc', 'args') );
            include $fdir;
        }
    }
}

// Show post meta block: post date, author, categories, counters, etc.
if ( !function_exists('trx_addons_sc_show_post_meta') ) {
    function trx_addons_sc_show_post_meta($sc, $args=array()) {
        if (($fdir = trx_addons_get_file_dir('templates/tpl.sc_post_meta.php')) != '') {
            set_query_var('trx_addons_args_sc_show_post_meta', compact('sc', 'args') );
            include $fdir;
        }
    }
}
?>