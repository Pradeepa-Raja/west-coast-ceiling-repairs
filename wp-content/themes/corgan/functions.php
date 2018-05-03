<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

// Theme storage
$CORGAN_STORAGE = array(
	// Theme required plugin's slugs
	'required_plugins' => array(

		// Required plugins
		// DON'T COMMENT OR REMOVE NEXT LINES!
		'trx_addons',

		// Recommended (supported) plugins
		// If plugin not need - comment (or remove) it
		'essential-grid',
		'js_composer',
		'mailchimp-for-wp',
		'revslider',
		'woocommerce'
		)
);


//-------------------------------------------------------
//-- Theme init
//-------------------------------------------------------

// Theme init priorities:
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)

if ( !function_exists('corgan_theme_setup1') ) {
	add_action( 'after_setup_theme', 'corgan_theme_setup1', 1 );
	function corgan_theme_setup1() {
		// Set theme content width
		$GLOBALS['content_width'] = apply_filters( 'corgan_filter_content_width', 1170 );
	}
}

if ( !function_exists('corgan_theme_setup') ) {
	add_action( 'after_setup_theme', 'corgan_theme_setup' );
	function corgan_theme_setup() {

		// Add default posts and comments RSS feed links to head 
		add_theme_support( 'automatic-feed-links' );
		
		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(370, 0, false);

		// Add thumb sizes
		// ATTENTION! If you change list below - check filter's names in the 'trx_addons_filter_get_thumb_size' hook
		$thumb_sizes = apply_filters('corgan_filter_add_thumb_sizes', array(
			'corgan-thumb-huge'		=> array(1540, 1000, true), //single
			'corgan-thumb-big' 		=> array( 770, 500, true),  //blog
			'corgan-thumb-med' 		=> array( 370, 260, true),  //service
            'corgan-thumb-square' 		=> array( 370, 370, true),  //service2
			'corgan-thumb-tiny' 		=> array(  90,  90, true),
			'corgan-thumb-masonry-big' => array( 770,   0, false),		// Only downscale, not crop
			'corgan-thumb-masonry'		=> array( 370,   0, false),		// Only downscale, not crop
			)
		);
		$mult = corgan_get_theme_option('retina_ready', 1);
		if ($mult > 1) $GLOBALS['content_width'] = apply_filters( 'corgan_filter_content_width', 1170*$mult);
		foreach ($thumb_sizes as $k=>$v) {
			// Add Original dimensions
			add_image_size( $k, $v[0], $v[1], $v[2]);
			// Add Retina dimensions
			if ($mult > 1) add_image_size( $k.'-@retina', $v[0]*$mult, $v[1]*$mult, $v[2]);
		}
		
		// Custom header setup
		add_theme_support( 'custom-header', array(
			'header-text'=>false
			)
		);

		// Custom backgrounds setup
		add_theme_support( 'custom-background', array()	);
		
		// Supported posts formats
		add_theme_support( 'post-formats', array('gallery', 'video', 'audio', 'link', 'quote', 'image', 'status', 'aside', 'chat') ); 
 
 		// Autogenerate title tag
		add_theme_support('title-tag');
 		
		// Add theme menus
		add_theme_support('nav-menus');
		
		// Switch default markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
		
		// WooCommerce Support
		add_theme_support( 'woocommerce' );
		
		// Editor custom stylesheet - for user
		add_editor_style( array_merge(
			array(
				'css/editor-style.css',
				corgan_get_file_url('css/fontello/css/fontello-embedded.css')
			),
			corgan_theme_fonts_for_editor()
			)
		);	
		
		// Make theme available for translation
		// Translations can be filed in the /languages/ directory
		load_theme_textdomain( 'corgan', corgan_get_folder_dir('languages') );
	
		// Register navigation menu
		register_nav_menus(array(
			'menu_main' => esc_html__('Main Menu', 'corgan'),
			'menu_header' => esc_html__('Header Menu', 'corgan'),
			'menu_footer' => esc_html__('Footer Menu', 'corgan')
			)
		);

		// Excerpt filters
		add_filter( 'excerpt_length',						'corgan_excerpt_length' );
		add_filter( 'excerpt_more',							'corgan_excerpt_more' );
		
		// Add required meta tags in the head
		add_action('wp_head',		 						'corgan_wp_head', 1);
		
		// Add custom inline styles
		add_action('wp_footer',		 						'corgan_wp_footer');
		add_action('admin_footer',	 						'corgan_wp_footer');

		// Enqueue scripts and styles for frontend
		add_action('wp_enqueue_scripts', 					'corgan_wp_scripts', 1000);			//priority 1000 - load styles before the plugin's support custom styles (priority 1100)
		add_action('wp_footer',		 						'corgan_localize_scripts');
		add_action('wp_enqueue_scripts', 					'corgan_wp_scripts_responsive', 2000);	//priority 2000 - load responsive after all other styles
		
		// Add body classes
		add_filter( 'body_class',							'corgan_add_body_classes' );

		// Register sidebars
		add_action('widgets_init', 							'corgan_register_sidebars');

	}

}


//-------------------------------------------------------
//-- Thumb sizes
//-------------------------------------------------------
if ( !function_exists('corgan_image_sizes') ) {
	add_filter( 'image_size_names_choose', 'corgan_image_sizes' );
	function corgan_image_sizes( $sizes ) {
		$thumb_sizes = apply_filters('corgan_filter_add_thumb_sizes', array(
			'corgan-thumb-huge'		=> esc_html__( 'Fullsize image', 'corgan' ),
			'corgan-thumb-big'			=> esc_html__( 'Large image', 'corgan' ),
			'corgan-thumb-med'			=> esc_html__( 'Medium image', 'corgan' ),
			'corgan-thumb-tiny'		=> esc_html__( 'Small square avatar', 'corgan' ),
			'corgan-thumb-masonry-big'	=> esc_html__( 'Masonry Large (scaled)', 'corgan' ),
			'corgan-thumb-masonry'		=> esc_html__( 'Masonry (scaled)', 'corgan' ),
			)
		);
		$mult = corgan_get_theme_option('retina_ready', 1);
		foreach($thumb_sizes as $k=>$v) {
			$sizes[$k] = $v;
			if ($mult > 1) $sizes[$k.'-@retina'] = $v.' '.esc_html__('@2x', 'corgan' );
		}
		return $sizes;
	}
}


//-------------------------------------------------------
//-- Theme scripts and styles
//-------------------------------------------------------

// Load frontend scripts
if ( !function_exists( 'corgan_wp_scripts' ) ) {
	//Handler of the add_action('wp_enqueue_scripts', 'corgan_wp_scripts', 1000);
	function corgan_wp_scripts() {
		
		// Enqueue styles
		//------------------------
		
		// Links to selected fonts
		$links = corgan_theme_fonts_links();
		if (count($links) > 0) {
			foreach ($links as $slug => $link) {
				corgan_enqueue_style( sprintf('corgan-font-%s', $slug), $link );
			}
		}
		
		// Fontello styles must be loaded before main stylesheet
		// This style NEED the theme prefix, because style 'fontello' in some plugin contain different set of characters
		// and can't be used instead this style!
		corgan_enqueue_style( 'corgan-fontello',  corgan_get_file_url('css/fontello/css/fontello-embedded.css') );

		// Load main stylesheet
		$main_stylesheet = get_template_directory_uri() . '/style.css';
		corgan_enqueue_style( 'corgan-main', $main_stylesheet, array(), null );

		// Load child stylesheet (if different) after the main stylesheet and fontello icons (important!)
		$child_stylesheet = get_stylesheet_directory_uri() . '/style.css';
		if ($child_stylesheet != $main_stylesheet) {
			corgan_enqueue_style( 'corgan-child', $child_stylesheet, array('corgan-main'), null );
		}
		
		// Animations
		if ( (corgan_get_theme_option('blog_animation')!='none' || corgan_get_theme_option('menu_animation_in')!='none' || corgan_get_theme_option('menu_animation_out')!='none') && (corgan_get_theme_option('animation_on_mobile')=='yes' || !wp_is_mobile()) && (!function_exists('corgan_vc_is_frontend') || !corgan_vc_is_frontend()))
			corgan_enqueue_style( 'corgan-animation',	corgan_get_file_url('css/animation.css') );

		// Custom colors
		if ( !is_customize_preview() && !isset($_GET['color_scheme']) && corgan_is_off(corgan_get_theme_option('debug_mode')) )
			corgan_enqueue_style( 'corgan-colors', corgan_get_file_url('css/__colors.css') );
		else
			wp_add_inline_style( 'corgan-main', corgan_customizer_get_css() );

		// Merged styles
		if ( corgan_is_off(corgan_get_theme_option('debug_mode')) )
			corgan_enqueue_style( 'corgan-styles', corgan_get_file_url('css/__styles.css') );

		// Add post nav background
		corgan_add_bg_in_post_nav();

		// Disable loading JQuery UI CSS
		wp_deregister_style('jquery_ui');
		wp_deregister_style('date-picker-css');


		// Enqueue scripts	
		//------------------------
		
		// Modernizr will load in head before other scripts and styles
		if ( substr(corgan_get_theme_option('blog_style'), 0, 7) == 'gallery' || substr(corgan_get_theme_option('blog_style'), 0, 9) == 'portfolio' )
			corgan_enqueue_script( 'modernizr', corgan_get_file_url('js/theme.gallery/modernizr.min.js'), array(), null, false );
		
		// Merged scripts
		if ( corgan_is_off(corgan_get_theme_option('debug_mode')) )
			corgan_enqueue_script( 'corgan-init', corgan_get_file_url('js/__scripts.js'), array('jquery') );
		else {
			// Skip link focus
			corgan_enqueue_script( 'skip-link-focus-fix', corgan_get_file_url('js/skip-link-focus-fix.js') );
			// Superfish Menu
			corgan_enqueue_script( 'superfish', corgan_get_file_url('js/superfish.js'), array('jquery') );
			// Background video
			$header_video = corgan_get_theme_option('header_video');
			if (!empty($header_video) && !corgan_is_inherit($header_video))
				corgan_enqueue_script( 'bideo', corgan_get_file_url('js/bideo.js'), array() );
			// Theme scripts
			corgan_enqueue_script( 'corgan-utils', corgan_get_file_url('js/_utils.js'), array('jquery') );
			corgan_enqueue_script( 'corgan-init', corgan_get_file_url('js/_init.js'), array('jquery') );	
		}
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Media elements library	
		if (corgan_get_theme_setting('use_mediaelements')) {
			wp_enqueue_style ( 'mediaelement' );
			wp_enqueue_style ( 'wp-mediaelement' );
			wp_enqueue_script( 'mediaelement' );
			wp_enqueue_script( 'wp-mediaelement' );
		}
	}
}

// Add variables to the scripts in the frontend
if ( !function_exists( 'corgan_localize_scripts' ) ) {
	//Handler of the add_action('wp_footer', 'corgan_localize_scripts');
	function corgan_localize_scripts() {
		wp_localize_script( 'corgan-init', 'CORGAN_STORAGE', apply_filters( 'corgan_filter_localize_script', array(
			// AJAX parameters
			'ajax_url' => esc_url(admin_url('admin-ajax.php')),
			'ajax_nonce' => esc_attr(wp_create_nonce(admin_url('admin-ajax.php'))),
			
			// Site base url
			'site_url' => get_site_url(),
			
			// User logged in
			'user_logged_in' => is_user_logged_in() ? true : false,
			
			// Menu width for mobile mode
			'mobile_layout_width' => max(480, corgan_get_theme_option('mobile_layout_width')),

			// Stretch sidemenu to window height
			'menu_stretch' => corgan_is_on(corgan_get_theme_option('menu_stretch')),

			// Menu animation
			'menu_animation_in' => corgan_get_theme_option('menu_animation_in'),
            'menu_animation_out' => corgan_get_theme_option('menu_animation_out'),

			// Video background
			'background_video' => corgan_get_theme_option('header_video'),

			// Video and Audio tag wrapper
			'use_mediaelements' => corgan_get_theme_setting('use_mediaelements') ? true : false,

			// Messages max length
			'message_maxlength'	=> intval(corgan_get_theme_setting('message_maxlength')),
						
			// Site color scheme
			'site_scheme' => sprintf('scheme_%s', corgan_get_theme_option('color_scheme')),

			
			// Internal vars - do not change it!
			
			// Flag for review mechanism
			'admin_mode' => false,

			// E-mail mask
			'email_mask' => '^([a-zA-Z0-9_\\-]+\\.)*[a-zA-Z0-9_\\-]+@[a-z0-9_\\-]+(\\.[a-z0-9_\\-]+)*\\.[a-z]{2,6}$',
			
			// Strings for translation
			'strings' => array(
					'ajax_error'		=> esc_html__('Invalid server answer!', 'corgan'),
					'error_global'		=> esc_html__('Error data validation!', 'corgan'),
					'name_empty' 		=> esc_html__("The name can't be empty", 'corgan'),
					'name_long'			=> esc_html__('Too long name', 'corgan'),
					'email_empty'		=> esc_html__('Too short (or empty) email address', 'corgan'),
					'email_long'		=> esc_html__('Too long email address', 'corgan'),
					'email_not_valid'	=> esc_html__('Invalid email address', 'corgan'),
					'text_empty'		=> esc_html__("The message text can't be empty", 'corgan'),
					'text_long'			=> esc_html__('Too long message text', 'corgan'),
					'search_error'		=> esc_html__('Search error! Try again later.', 'corgan'),
					'send_complete'		=> esc_html__("Send message complete!", 'corgan'),
					'send_error'		=> esc_html__('Transmit failed!', 'corgan')
					)
			))
		);
	}
}

// Load responsive styles (priority 2000 - load it after main styles and plugins custom styles)
if ( !function_exists( 'corgan_wp_scripts_responsive' ) ) {
	//Handler of the add_action('wp_enqueue_scripts', 'corgan_wp_scripts_responsive', 2000);
	function corgan_wp_scripts_responsive() {
		corgan_enqueue_style( 'corgan-responsive', corgan_get_file_url('css/responsive.css') );
	}
}

//  Add meta tags and inline scripts in the header for frontend
if (!function_exists('corgan_wp_head')) {
	//Handler of the add_action('wp_head',	'corgan_wp_head', 1);
	function corgan_wp_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php
	}
}

// Add theme specified classes to the body
if ( !function_exists('corgan_add_body_classes') ) {
	//Handler of the add_filter( 'body_class', 'corgan_add_body_classes' );
	function corgan_add_body_classes( $classes ) {
		$blog_mode = corgan_storage_get('blog_mode');
		$classes[] = 'blog_mode_' . esc_attr($blog_mode);
		$classes[] = 'body_tag';	// Need for the .scheme_self
		$classes[] = 'body_style_' . esc_attr(corgan_get_theme_option('body_style'));
		$classes[] = 'scheme_' . esc_attr(corgan_get_theme_option('color_scheme'));
		if (in_array($blog_mode, array('post', 'page'))) {
			$classes[] = 'is_single';
		} else {
			$classes[] = ' is_stream';
			$classes[] = 'blog_style_'.esc_attr(corgan_get_theme_option('blog_style'));
		}
		if (corgan_sidebar_present()) {
			$classes[] = 'sidebar_show sidebar_' . esc_attr(corgan_get_theme_option('sidebar_position')) ;
		} else {
			$classes[] = 'sidebar_hide';
			if (corgan_is_on(corgan_get_theme_option('expand_content')))
				 $classes[] = 'expand_content';
		}
		if (corgan_is_on(corgan_get_theme_option('remove_margins')))
			 $classes[] = 'remove_margins';

		$classes[] = 'header_style_' . esc_attr(corgan_get_theme_option("header_style"));
		$classes[] = 'header_position_' . esc_attr(corgan_get_theme_option("header_position"));
		$classes[] = 'header_title_' . esc_attr(corgan_need_page_title() ? 'on' : 'off');

		$menu_style= corgan_get_theme_option("menu_style");
		$classes[] = 'menu_style_' . esc_attr($menu_style) . (in_array($menu_style, array('left', 'right'))	? ' menu_style_side' : '');
		$classes[] = 'no_layout';
		
		return $classes;
	}
}
	
// Load inline styles
if ( !function_exists( 'corgan_wp_footer' ) ) {
	//Handler of the add_action('wp_footer', 'corgan_wp_footer');
	//and add_action('admin_footer', 'corgan_wp_footer');
	function corgan_wp_footer() {
		// Get inline styles from storage
		if (($css = corgan_storage_get('inline_styles')) != '') {
			corgan_enqueue_style(  'corgan-inline-styles',  corgan_get_file_url('css/__inline.css') );
			wp_add_inline_style( 'corgan-inline-styles', $css );
		}
	}
}


//-------------------------------------------------------
//-- Sidebars and widgets
//-------------------------------------------------------

// Register widgetized areas
if ( !function_exists('corgan_register_sidebars') ) {
	// add_action('widgets_init', 'corgan_register_sidebars');
	function corgan_register_sidebars() {
		$sidebars = corgan_get_sidebars();
		if (is_array($sidebars) && count($sidebars) > 0) {
			foreach ($sidebars as $id=>$sb) {
				register_sidebar( array(
                                        'name'          => $sb['name'],
                                        'description'   => $sb['description'],
										'id'            => $id,
										'before_widget' => '<aside id="%1$s" class="widget %2$s">',
										'after_widget'  => '</aside>',
										'before_title'  => '<h4 class="widget_title">',
										'after_title'   => '</h4>'
										)
								);
			}
		}
	}
}


// Return theme specific widgetized areas
if ( !function_exists('corgan_get_sidebars') ) {
    function corgan_get_sidebars() {
        $list = apply_filters('corgan_filter_list_sidebars', array(
                'sidebar_widgets'		=> array(
                    'name' => esc_html__('Sidebar Widgets', 'corgan'),
                    'description' => esc_html__('Widgets to be shown on the main sidebar', 'corgan')
                ),
                'header_widgets'		=> array(
                    'name' => esc_html__('Header Widgets', 'corgan'),
                    'description' => esc_html__('Widgets to be shown at the top of the page (in the page header area)', 'corgan')
                ),
                'above_page_widgets'	=> array(
                    'name' => esc_html__('Above Page Widgets', 'corgan'),
                    'description' => esc_html__('Widgets to be shown below the header, but above the content and sidebar', 'corgan')
                ),
                'above_content_widgets' => array(
                    'name' => esc_html__('Above Content Widgets', 'corgan'),
                    'description' => esc_html__('Widgets to be shown above the content, near the sidebar', 'corgan')
                ),
                'below_content_widgets' => array(
                    'name' => esc_html__('Below Content Widgets', 'corgan'),
                    'description' => esc_html__('Widgets to be shown below the content, near the sidebar', 'corgan')
                ),
                'below_page_widgets' 	=> array(
                    'name' => esc_html__('Below Page Widgets', 'corgan'),
                    'description' => esc_html__('Widgets to be shown below the content and sidebar, but above the footer', 'corgan')
                ),
                'footer_widgets'		=> array(
                    'name' => esc_html__('Footer Widgets', 'corgan'),
                    'description' => esc_html__('Widgets to be shown at the bottom of the page (in the page footer area)', 'corgan')
                )
            )
        );
        $custom_sidebars_number = max(0, min(10, corgan_get_theme_setting('custom_sidebars')));
        if (count($custom_sidebars_number) > 0) {
            for ($i=1; $i <= $custom_sidebars_number; $i++) {
                $list['custom_widgets_'.intval($i)] = array(
                    'name' => sprintf(esc_html__('Custom Widgets %d', 'corgan'), $i),
                    'description' => esc_html__('An arbitrary set of widgets. Can be shown in any area of the site', 'corgan')
                );
            }
        }
        return $list;
    }
}



//-------------------------------------------------------
//-- Theme fonts
//-------------------------------------------------------

// Return links for all theme fonts
if ( !function_exists('corgan_theme_fonts_links') ) {
	function corgan_theme_fonts_links() {
		$links = array();
		
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		*/
		$google_fonts_enabled = ( 'off' !== _x( 'on', 'Google fonts: on or off', 'corgan' ) );
		$custom_fonts_enabled = ( 'off' !== _x( 'on', 'Custom fonts (included in the theme): on or off', 'corgan' ) );
		
		if ( ($google_fonts_enabled || $custom_fonts_enabled) && !corgan_storage_empty('load_fonts') ) {
			$load_fonts = corgan_storage_get('load_fonts');
			if (count($load_fonts) > 0) {
				$google_fonts = '';
				foreach ($load_fonts as $font) {
					$slug = corgan_get_load_fonts_slug($font['name']);
					$url  = corgan_get_file_url( sprintf('css/font-face/%s/stylesheet.css', $slug));
					if ($url != '') {
						if ($custom_fonts_enabled) {
							$links[$slug] = $url;
						}
					} else {
						if ($google_fonts_enabled) {
							$google_fonts .= ($google_fonts ? '%7C' : '')
											. str_replace(' ', '+', $font['name'])
											. ':' 
											. (empty($font['styles']) ? '400,400italic,700,700italic' : $font['styles']);
						}
					}
				}
				if ($google_fonts && $google_fonts_enabled) {
					$links['google_fonts'] = sprintf('%s://fonts.googleapis.com/css?family=%s&subset=%s', corgan_get_protocol(), $google_fonts, corgan_get_theme_option('load_fonts_subset'));
				}
			}
		}
		return $links;
	}
}

// Return links for WP Editor
if ( !function_exists('corgan_theme_fonts_for_editor') ) {
	function corgan_theme_fonts_for_editor() {
		$links = array_values(corgan_theme_fonts_links());
		if (is_array($links) && count($links) > 0) {
			for ($i=0; $i<count($links); $i++) {
				$links[$i] = str_replace(',', '%2C', $links[$i]);
			}
		}
		return $links;
	}
}


//-------------------------------------------------------
//-- The Excerpt
//-------------------------------------------------------
if ( !function_exists('corgan_excerpt_length') ) {
	function corgan_excerpt_length( $length ) {
		return max(1, corgan_get_theme_setting('max_excerpt_length'));
	}
}

if ( !function_exists('corgan_excerpt_more') ) {
	function corgan_excerpt_more( $more ) {
		return '&hellip;';
	}
}


function corgan_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'corgan_move_comment_field_to_bottom' );



//-------------------------------------------------------
//-- Include theme (or child) PHP-files
//-------------------------------------------------------

require_once trailingslashit( get_template_directory() ) . 'includes/utils.php';
require_once trailingslashit( get_template_directory() ) . 'includes/storage.php';
require_once trailingslashit( get_template_directory() ) . 'includes/lists.php';
require_once trailingslashit( get_template_directory() ) . 'includes/wp.php';

require_once trailingslashit( get_template_directory() ) . 'includes/theme.tags.php';
require_once trailingslashit( get_template_directory() ) . 'includes/theme.hovers/theme.hovers.php';

require_once trailingslashit( get_template_directory() ) . 'theme-specific/shortcodes.php';

if (is_admin()) {
	require_once trailingslashit( get_template_directory() ) . 'includes/tgmpa/class-tgm-plugin-activation.php';
	require_once trailingslashit( get_template_directory() ) . 'includes/admin.php';
}

require_once trailingslashit( get_template_directory() ) . 'theme-options/theme.customizer.php';

// Plugins support
if (is_array($CORGAN_STORAGE['required_plugins']) && count($CORGAN_STORAGE['required_plugins']) > 0) {
	foreach ($CORGAN_STORAGE['required_plugins'] as $plugin_slug) {
		$plugin_slug = corgan_esc($plugin_slug);
		$plugin_path = trailingslashit( get_template_directory() ) . sprintf('plugins/%s/%s.php', $plugin_slug, $plugin_slug);
		if (file_exists($plugin_path)) { require_once $plugin_path; }
	}
}
?>