<?php
/**
 * Default Theme Options and Internal Theme Settings
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

// -----------------------------------------------------------------
// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
// -- Internal theme settings
// -----------------------------------------------------------------
corgan_storage_set('settings', array(
	
	'custom_sidebars'			=> 8,							// How many custom sidebars will be registered (in addition to theme preset sidebars): 0 - 10

	'ajax_views_counter'		=> true,						// Use AJAX for increment posts counter (if cache plugins used) 
																// or increment posts counter then loading page (without cache plugin)
	'disable_jquery_ui'			=> false,						// Prevent loading custom jQuery UI libraries in the third-party plugins

	'max_load_fonts'			=> 3,							// Max fonts number to load from Google fonts or from uploaded fonts

	'breadcrumbs_max_level' 	=> 3,							// Max number of the nested categories in the breadcrumbs (0 - unlimited)

	'use_mediaelements'			=> true,						// Load script "Media Elements" to play video and audio

	'max_excerpt_length'		=> 60,							// Max words number for the excerpt in the blog style 'Excerpt'.
																// For style 'Classic' - get half from this value
	'message_maxlength'			=> 1000							// Max length of the message from contact form
	
));



// -----------------------------------------------------------------
// -- Theme fonts (Google and/or custom fonts)
// -----------------------------------------------------------------

// Fonts to load when theme start
// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
corgan_storage_set('load_fonts', array(
	array(
		'name'	 => 'Source Sans Pro',
		'family' => 'sans-serif',
		'styles' => '400,700'
		),
	array(
		'name'   => 'Montserrat',
		'family' => 'sans-serif',
        'styles' => '400,700'
		),
	array(
		'name'	 => 'Crimson Text',
		'family' => 'serif',
        'styles' => '400i,600i'
		)
));

// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
corgan_storage_set('load_fonts_subset', 'latin,latin-ext');

// Settings of the main tags
corgan_storage_set('theme_fonts', array(
	'p' => array(
		'title'				=> esc_html__('Main text', 'corgan'),
		'description'		=> esc_html__('Font settings of the main text of the site', 'corgan'),
		'font-family'		=> '"Source Sans Pro", sans-serif',
		'font-size' 		=> '1rem',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.467em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0',
		'margin-top'		=> '0em',
		'margin-bottom'		=> '1.45rem'
		),
	'h1' => array(
		'title'				=> esc_html__('Heading 1', 'corgan'),
		'font-family'		=> '"Montserrat", sans-serif',
		'font-size' 		=> '6.667rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.1818em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '-1px',
		'margin-top'		=> '1em',
		'margin-bottom'		=> '0.218em'
		),
	'h2' => array(
		'title'				=> esc_html__('Heading 2', 'corgan'),
		'font-family'		=> '"Montserrat", sans-serif',
		'font-size' 		=> '2.8rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0',
		'margin-top'		=> '2.54em',
		'margin-bottom'		=> '0.35em'
		),
	'h3' => array(
		'title'				=> esc_html__('Heading 3', 'corgan'),
		'font-family'		=> '"Montserrat", sans-serif',
		'font-size' 		=> '2.4rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2667em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0',
		'margin-top'		=> '3em',
		'margin-bottom'		=> '0.25em'
		),
	'h4' => array(
		'title'				=> esc_html__('Heading 4', 'corgan'),
		'font-family'		=> '"Montserrat", sans-serif',
		'font-size' 		=> '1.333rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.28em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0',
		'margin-top'		=> '5.8em',
		'margin-bottom'		=> '0.8em'
		),
	'h5' => array(
		'title'				=> esc_html__('Heading 5', 'corgan'),
		'font-family'		=> '"Montserrat", sans-serif',
		'font-size' 		=> '1.067em',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.3em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0',
		'margin-top'		=> '7.35em',
		'margin-bottom'		=> '0.5em'
		),
	'h6' => array(
		'title'				=> esc_html__('Heading 6', 'corgan'),
		'font-family'		=> '"Crimson Text", serif',
		'font-size' 		=> '1.067em',
		'font-weight'		=> '400',
		'font-style'		=> 'italic',
		'line-height'		=> '1.375em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0',
		'margin-top'		=> '7.4em',
		'margin-bottom'		=> '0.25em'
		),
	'logo' => array(
		'title'				=> esc_html__('Logo text', 'corgan'),
		'description'		=> esc_html__('Font settings of the text case of the logo', 'corgan'),
		'font-family'		=> '"Montserrat", sans-serif',
		'font-size' 		=> '1.6rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.25em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0'
		),
	'button' => array(
		'title'				=> esc_html__('Buttons', 'corgan'),
		'font-family'		=> '"Montserrat", sans-serif',
		'font-size' 		=> '0.8rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0'
		),
	'input' => array(
		'title'				=> esc_html__('Input fields', 'corgan'),
		'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'corgan'),
		'font-family'		=> '"Source Sans Pro", sans-serif',
		'font-size' 		=> '1rem',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> ''
		),
	'info' => array(
		'title'				=> esc_html__('Post meta', 'corgan'),
		'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'corgan'),
		'font-family'		=> '"Crimson Text", serif',
		'font-size' 		=> '1.067em',
		'font-weight'		=> '400',
		'font-style'		=> 'italic',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '',
		'margin-top'		=> '0.5em',
		'margin-bottom'		=> ''
		),
	'menu' => array(
		'title'				=> esc_html__('Main menu', 'corgan'),
		'description'		=> esc_html__('Font settings of the main menu items', 'corgan'),
		'font-family'		=> '"Montserrat", sans-serif',
		'font-size' 		=> '0.8rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0'
		),
	'submenu' => array(
		'title'				=> esc_html__('Dropdown menu', 'corgan'),
		'description'		=> esc_html__('Font settings of the dropdown menu items', 'corgan'),
		'font-family'		=> '"Montserrat", sans-serif',
		'font-size' 		=> '0.8rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0'
		)
));



// -----------------------------------------------------------------
// -- Theme colors for customizer
// -- Attention! Inner scheme must be last in the array below
// -----------------------------------------------------------------
corgan_storage_set('schemes', array(

	// Color scheme: 'default'
	'default' => array(
		'title'	 => esc_html__('Default', 'corgan'),
		'colors' => array(
			
			// Whole block border and background
			'bg_color'				=> '#ffffff',
			'bd_color'				=> '#e5e5e5',

			// Text and links colors
			'text'					=> '#8b8b8b',   //
			'text_light'			=> '#a0b2be',
			'text_dark'				=> '#502b21',   //
			'text_link'				=> '#f7a145',   //
			'text_hover'			=> '#a2473e',   //

			// Alternative blocks (submenu, buttons, tabs, etc.)
			'alter_bg_color'		=> '#f6f1e8',   //
			'alter_bg_hover'		=> '#dae1e5',
			'alter_bd_color'		=> '#ddd8d0',   //
			'alter_bd_hover'		=> '#ced5d9',
			'alter_text'			=> '#3f4346',
			'alter_light'			=> '#a0b2be',
			'alter_dark'			=> '#c8beb9',
			'alter_link'			=> '#f7a145',   //
			'alter_hover'			=> '#13162b',

			// Input fields (form's fields and textarea)
			'input_bg_color'		=> '#f4f9fc',
			'input_bg_hover'		=> '#ebf4fa',
			'input_bd_color'		=> '#f4f9fc',
			'input_bd_hover'		=> '#dae9f2',
			'input_text'			=> '#a0b2be',
			'input_light'			=> '#8b9ba6',
			'input_dark'			=> '#76838c',
			
			// Inverse blocks (text and links on accented bg)
			'inverse_text'			=> '#ffffff',
			'inverse_light'			=> '#fefefd',   //
			'inverse_dark'			=> '#ffffff',
			'inverse_link'			=> '#ffffff',
			'inverse_hover'			=> '#13162b',

			// Additional accented colors (if used in the current theme)
			// For example:
			//'accent'				=> '3fb9be'
		
		)
	)

));



// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if (!function_exists('corgan_options_create')) {

	function corgan_options_create() {

		corgan_storage_set('options', array(
		
			// Section 'Title & Tagline' - add theme options in the standard WP section
			'title_tagline' => array(
				"title" => esc_html__('Title, Tagline & Site icon', 'corgan'),
				"desc" => wp_kses_data( __('Specify site title and tagline (if need) and upload the site icon', 'corgan') ),
				"type" => "section"
				),
		
		
			// Section 'Header' - add theme options in the standard WP section
			'header_image' => array(
				"title" => esc_html__('Header', 'corgan'),
				"desc" => wp_kses_data( __('Select or upload logo images, select header type and widgets set for the header', 'corgan') ),
				"type" => "section"
				),
			'header_image_override' => array(
				"title" => esc_html__('Header image override', 'corgan'),
				"desc" => wp_kses_data( __("Allow override the header image with the page's/post's/product's/etc. featured image", 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"std" => 0,
				"type" => "hidden"
				),
			'header_video' => array(
				"title" => esc_html__('Header video', 'corgan'),
				"desc" => wp_kses_data( __("Select video to use it as background for the header", 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"std" => '',
				"type" => "video"
				),
			'header_fullheight' => array(
				"title" => esc_html__('Fullheight Header', 'corgan'),
				"desc" => wp_kses_data( __("Enlarge header area to fill whole screen. Used only if header have a background image", 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_style' => array(
				"title" => esc_html__('Header style', 'corgan'),
				"desc" => wp_kses_data( __('Select style to display the site header', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"std" => 'header-2',
				"options" => apply_filters('corgan_filter_list_header_styles', array(
					'header-1'	=> esc_html__('Header 1',	'corgan'),
					'header-2'	=> esc_html__('Header 2',	'corgan')
				)),
				"type" => "select"
				),
			'header_position' => array(
				"title" => esc_html__('Header position', 'corgan'),
				"desc" => wp_kses_data( __('Select position to display the site header', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"std" => 'default',
				"options" => array(
					'default' => esc_html__('Default','corgan'),
					'over' => esc_html__('Over',	'corgan'),
					'under' => esc_html__('Under',	'corgan')
				),
				"type" => "select"
				),
			'header_scheme' => array(
				"title" => esc_html__('Header Color Scheme', 'corgan'),
				"desc" => wp_kses_data( __('Select color scheme to decorate header area', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"std" => 'inherit',
				"options" => corgan_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'menu_style' => array(
				"title" => esc_html__('Menu position', 'corgan'),
				"desc" => wp_kses_data( __('Select position of the main menu', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"std" => 'top',
				"options" => array(
					'top'	=> esc_html__('Top',	'corgan'),
					'left'	=> esc_html__('Left',	'corgan'),
					'right'	=> esc_html__('Right',	'corgan')
				),
				"type" => "hidden"
				),
			'menu_scheme' => array(
				"title" => esc_html__('Menu Color Scheme', 'corgan'),
				"desc" => wp_kses_data( __('Select color scheme to decorate main menu area', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"std" => 'inherit',
				"options" => corgan_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'menu_stretch' => array(
				"title" => esc_html__('Stretch sidemenu', 'corgan'),
				"desc" => wp_kses_data( __('Stretch sidemenu to window height (if menu items number >= 5)', 'corgan') ),
				"std" => 1,
				"type" => "hidden"
				),
			'search_style' => array(
				"title" => esc_html__('Search in the header', 'corgan'),
				"desc" => wp_kses_data( __('Select style of the search field in the header', 'corgan') ),
				"std" => 'expand',
				"options" => array(
					'expand' => esc_html__('Expand', 'corgan'),
					'fullscreen' => esc_html__('Fullscreen', 'corgan')
				),
				"type" => "hidden"
				),
			'header_widgets' => array(
				"title" => esc_html__('Header widgets', 'corgan'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on each page', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on this page', 'corgan') ),
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'header_columns' => array(
				"title" => esc_html__('Header columns', 'corgan'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"dependency" => array(
					'header_widgets' => array('^hide')
				),
				"std" => 0,
				"options" => corgan_get_list_range(0,6),
				"type" => "select"
				),
			'header_wide' => array(
				"title" => esc_html__('Header fullwide', 'corgan'),
				"desc" => wp_kses_data( __('Do you want to stretch the header widgets area to the entire window width?', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'show_page_title' => array(
				"title" => esc_html__('Show Page Title', 'corgan'),
				"desc" => wp_kses_data( __('Do you want to show page title area (page/post/category title and breadcrumbs)?', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'corgan')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'show_breadcrumbs' => array(
				"title" => esc_html__('Show breadcrumbs', 'corgan'),
				"desc" => wp_kses_data( __('Do you want to show breadcrumbs in the page title area?', 'corgan') ),
				"std" => 1,
				"type" => "checkbox"
				),

            'show_cart_header' => array(
                "title" => esc_html__('Show cart in header', 'corgan'),
                "desc" => wp_kses_data( __('Do you want to show cart in header?', 'corgan') ),
                'refresh' => true,
                "std" => 0,
                "type" => "checkbox"
            ),

            'show_button_header' => array(
                "title" => esc_html__('Show button in header', 'corgan'),
                "desc" => wp_kses_data( __('Do you want to show button in header?', 'corgan') ),
                'refresh' => true,
                "std" => 0,
                "type" => "checkbox"
            ),
            'button_header_text' => array(
                "title" => esc_html__('Button text', 'corgan'),
                "desc" => wp_kses_data( __('Enter button text', 'corgan') ),
                "dependency" => array(
                    'show_button_header' => array('1')
                ),
                "std" => '',
                "type" => "text"
            ),

            'button_header_link' => array(
                "title" => esc_html__('Button link', 'corgan'),
                "desc" => wp_kses_data( __('Enter button link', 'corgan') ),
                "dependency" => array(
                    'show_button_header' => array('1')
                ),
                "std" => '',
                "type" => "text"
            ),


			'logo' => array(
				"title" => esc_html__('Logo', 'corgan'),
				"desc" => wp_kses_data( __('Select or upload site logo', 'corgan') ),
                "override" => array(
                    'mode' => 'page',
                    'section' => esc_html__('Header', 'corgan')
                ),
				"std" => '',
				"type" => "image"
				),
			'logo_retina' => array(
				"title" => esc_html__('Logo for Retina', 'corgan'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'corgan') ),
				"std" => '',
				"type" => "image"
				),
			'header_title_image' => array(
				"title" => esc_html__('Header title image', 'corgan'),
				"desc" => wp_kses_data( __('Select image to insert into the Header "Style 2"', 'corgan') ),
				"std" => '',
				"type" => "image"
				),
			'header_title_text' => array(
				"title" => esc_html__('Header title text', 'corgan'),
				"desc" => wp_kses_data( __('Put here text to insert into the Header "Style 2"', 'corgan') ),
				"std" => '',
				"type" => "textarea"
				),
			'mobile_layout_width' => array(
				"title" => esc_html__('Mobile layout from', 'corgan'),
				"desc" => wp_kses_data( __('Window width to show mobile layout of the header', 'corgan') ),
				"std" => 1140,
				"type" => "text"
				),
			
		
		
			// Section 'Content'
			'content' => array(
				"title" => esc_html__('Content', 'corgan'),
				"desc" => wp_kses_data( __('Options for the content area', 'corgan') ),
				"type" => "section",
				),
			'body_style' => array(
				"title" => esc_html__('Body style', 'corgan'),
				"desc" => wp_kses_data( __('Select width of the body content', 'corgan') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses',
					'section' => esc_html__('Content', 'corgan')
				),
				"refresh" => false,
				"std" => 'wide',
				"options" => array(
					'boxed'		=> esc_html__('Boxed',		'corgan'),
					'wide'		=> esc_html__('Wide',		'corgan'),
					'fullwide'	=> esc_html__('Fullwide',	'corgan'),
					'fullscreen'=> esc_html__('Fullscreen',	'corgan')
				),
				"type" => "select"
				),
			'color_scheme' => array(
				"title" => esc_html__('Site Color Scheme', 'corgan'),
				"desc" => wp_kses_data( __('Select color scheme to decorate whole site. Attention! Case "Inherit" can be used only for custom pages, not for root site content in the Appearance - Customize', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'corgan')
				),
				"std" => 'default',
				"options" => corgan_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'expand_content' => array(
				"title" => esc_html__('Expand content', 'corgan'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'corgan') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses',
					'section' => esc_html__('Content', 'corgan')
				),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'remove_margins' => array(
				"title" => esc_html__('Remove margins', 'corgan'),
				"desc" => wp_kses_data( __('Remove margins above and below the content area', 'corgan') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses',
					'section' => esc_html__('Content', 'corgan')
				),
				"refresh" => false,
				"std" => 0,
				"type" => "checkbox"
				),
			'seo_snippets' => array(
				"title" => esc_html__('SEO snippets', 'corgan'),
				"desc" => wp_kses_data( __('Add structured data markup to the single posts and pages', 'corgan') ),
				"std" => 0,
				"type" => "checkbox"
				),
			'no_image' => array(
				"title" => esc_html__('No image placeholder', 'corgan'),
				"desc" => wp_kses_data( __('Select or upload image, used as placeholder for the posts without featured image', 'corgan') ),
				"std" => '',
				"type" => "image"
				),
			'sidebar_widgets' => array(
				"title" => esc_html__('Sidebar widgets', 'corgan'),
				"desc" => wp_kses_data( __('Select default widgets to show in the sidebar', 'corgan') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses',
					'section' => esc_html__('Widgets', 'corgan')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_scheme' => array(
				"title" => esc_html__('Color Scheme', 'corgan'),
				"desc" => wp_kses_data( __('Select color scheme to decorate sidebar', 'corgan') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses',
					'section' => esc_html__('Widgets', 'corgan')
				),
				"std" => 'side',
				"options" => corgan_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'sidebar_position' => array(
				"title" => esc_html__('Sidebar position', 'corgan'),
				"desc" => wp_kses_data( __('Select position to show sidebar', 'corgan') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses',
					'section' => esc_html__('Widgets', 'corgan')
				),
				"refresh" => false,
				"std" => 'right',
				"options" => corgan_get_list_sidebars_positions(),
				"type" => "select"
				),
			'widgets_above_page' => array(
				"title" => esc_html__('Widgets above the page', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'corgan')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_above_content' => array(
				"title" => esc_html__('Widgets above the content', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'corgan')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_content' => array(
				"title" => esc_html__('Widgets below the content', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'corgan')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_page' => array(
				"title" => esc_html__('Widgets below the page', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'corgan')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
		
		
		
			// Section 'Footer'
			'footer' => array(
				"title" => esc_html__('Footer', 'corgan'),
				"desc" => wp_kses_data( __('Select set of widgets and columns number for the site footer', 'corgan') ),
				"type" => "section"
				),
			'footer_scheme' => array(
				"title" => esc_html__('Footer Color Scheme', 'corgan'),
				"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'corgan') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses',
					'section' => esc_html__('Footer', 'corgan')
				),
				"std" => 'dark',
				"options" => corgan_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),

            'call_in_footer' => array(
                "title" => esc_html__('Show call to action in footer', 'corgan'),
                "desc" => wp_kses_data( __('Show call to action in the footer', 'corgan') ),
                'refresh' => false,
                "std" => 0,
                "type" => "checkbox"
            ),

            'call_title' => array(
                "title" => esc_html__('Call to action title', 'corgan'),
                "desc" => wp_kses_data( __('Enter call to action title', 'corgan') ),
                "override" => array(
                    'mode' => 'page,cpt_team,cpt_services,cpt_courses',
                    'section' => esc_html__('Footer', 'corgan')
                ),
                "dependency" => array(
                    'call_in_footer' => array('1')
                ),
                "std" => '',
                "type" => "text"
            ),

            'call_text' => array(
                "title" => esc_html__('Call to action text', 'corgan'),
                "desc" => wp_kses_data( __('Enter call to action text', 'corgan') ),
                "override" => array(
                    'mode' => 'page,cpt_team,cpt_services,cpt_courses',
                    'section' => esc_html__('Footer', 'corgan')
                ),
                "dependency" => array(
                    'call_in_footer' => array('1')
                ),
                "std" => '',
                "type" => "text"
            ),

            'call_button' => array(
                "title" => esc_html__('Call to action button text', 'corgan'),
                "desc" => wp_kses_data( __('Enter call to action button text', 'corgan') ),
                "override" => array(
                    'mode' => 'page,cpt_team,cpt_services,cpt_courses',
                    'section' => esc_html__('Footer', 'corgan')
                ),
                "dependency" => array(
                    'call_in_footer' => array('1')
                ),
                "std" => '',
                "type" => "text"
            ),

            'call_link' => array(
                "title" => esc_html__('Call to action button link', 'corgan'),
                "desc" => wp_kses_data( __('Enter call to action button link', 'corgan') ),
                "override" => array(
                    'mode' => 'page,cpt_team,cpt_services,cpt_courses',
                    'section' => esc_html__('Footer', 'corgan')
                ),
                "dependency" => array(
                    'call_in_footer' => array('1')
                ),
                "std" => '',
                "type" => "text"
            ),




			'footer_widgets' => array(
				"title" => esc_html__('Footer widgets', 'corgan'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'corgan') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses',
					'section' => esc_html__('Footer', 'corgan')
				),
				"std" => 'footer_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'footer_columns' => array(
				"title" => esc_html__('Footer columns', 'corgan'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'corgan') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses',
					'section' => esc_html__('Footer', 'corgan')
				),
				"dependency" => array(
					'footer_widgets' => array('^hide')
				),
				"std" => 0,
				"options" => corgan_get_list_range(0,6),
				"type" => "select"
				),
			'footer_wide' => array(
				"title" => esc_html__('Footer fullwide', 'corgan'),
				"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'corgan') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses',
					'section' => esc_html__('Footer', 'corgan')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_in_footer' => array(
				"title" => esc_html__('Show logo', 'corgan'),
				"desc" => wp_kses_data( __('Show logo in the footer', 'corgan') ),
				'refresh' => false,
				"std" => 0,
				"type" => "hidden"
				),
			'logo_footer' => array(
				"title" => esc_html__('Logo for footer', 'corgan'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it in the footer', 'corgan') ),
				"dependency" => array(
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'logo_footer_retina' => array(
				"title" => esc_html__('Logo for footer (Retina)', 'corgan'),
				"desc" => wp_kses_data( __('Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'corgan') ),
				"dependency" => array(
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'socials_in_footer' => array(
				"title" => esc_html__('Show social icons', 'corgan'),
				"desc" => wp_kses_data( __('Show social icons in the footer (under logo or footer widgets)', 'corgan') ),
				"std" => 0,
				"type" => "hidden"
				),
			'copyright' => array(
				"title" => esc_html__('Copyright', 'corgan'),
				"desc" => wp_kses_data( __('Copyright text in the footer', 'corgan') ),
				"std" => esc_html__('AncoraThemes &copy; {Y}. All rights reserved. Terms of use and Privacy Policy', 'corgan'),
				"refresh" => false,
				"type" => "textarea"
				),
		
		
		
			// Section 'Homepage' - settings for home page
			'homepage' => array(
				"title" => esc_html__('Homepage', 'corgan'),
				"desc" => wp_kses_data( __('Select blog style and widgets to display on the homepage', 'corgan') ),
				"type" => "section"
				),
			'expand_content_home' => array(
				"title" => esc_html__('Expand content', 'corgan'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the Homepage', 'corgan') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style_home' => array(
				"title" => esc_html__('Blog style', 'corgan'),
				"desc" => wp_kses_data( __('Select posts style for the homepage', 'corgan') ),
				"std" => 'excerpt',
				"options" => corgan_get_list_blog_styles(),
				"type" => "select"
				),
			'first_post_large_home' => array(
				"title" => esc_html__('First post large', 'corgan'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of the Homepage', 'corgan') ),
				"dependency" => array(
					'blog_style_home' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_widgets_home' => array(
				"title" => esc_html__('Header widgets', 'corgan'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the homepage', 'corgan') ),
				"std" => 'header_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_widgets_home' => array(
				"title" => esc_html__('Sidebar widgets', 'corgan'),
				"desc" => wp_kses_data( __('Select sidebar to show on the homepage', 'corgan') ),
				"std" => 'sidebar_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_position_home' => array(
				"title" => esc_html__('Sidebar position', 'corgan'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the homepage', 'corgan') ),
				"refresh" => false,
				"std" => 'right',
				"options" => corgan_get_list_sidebars_positions(),
				"type" => "select"
				),
			'widgets_above_page_home' => array(
				"title" => esc_html__('Widgets above the page', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'corgan') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_above_content_home' => array(
				"title" => esc_html__('Widgets above the content', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'corgan') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_content_home' => array(
				"title" => esc_html__('Widgets below the content', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'corgan') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_page_home' => array(
				"title" => esc_html__('Widgets below the page', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'corgan') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			
		
		
			// Section 'Blog archive'
			'blog' => array(
				"title" => esc_html__('Blog archive', 'corgan'),
				"desc" => wp_kses_data( __('Options for the blog archive', 'corgan') ),
				"type" => "section",
				),
			'expand_content_blog' => array(
				"title" => esc_html__('Expand content', 'corgan'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the blog archive', 'corgan') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style' => array(
				"title" => esc_html__('Blog style', 'corgan'),
				"desc" => wp_kses_data( __('Select posts style for the blog archive', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'corgan')
				),
				"dependency" => array(
					'#page_template' => array('blog.php')
				),
				"std" => 'excerpt',
				"options" => corgan_get_list_blog_styles(),
				"type" => "select"
				),
			'blog_columns' => array(
				"title" => esc_html__('Blog columns', 'corgan'),
				"desc" => wp_kses_data( __('How many columns should be used in the blog archive (from 2 to 4)?', 'corgan') ),
				"std" => 2,
				"options" => corgan_get_list_range(2,4),
				"type" => "hidden"
				),
			'post_type' => array(
				"title" => esc_html__('Post type', 'corgan'),
				"desc" => wp_kses_data( __('Select post type to show in the blog archive', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'corgan')
				),
				"dependency" => array(
					'#page_template' => array('blog.php')
				),
				"linked" => 'parent_cat',
				"refresh" => false,
				"hidden" => true,
				"std" => 'post',
				"options" => corgan_get_list_posts_types(),
				"type" => "select"
				),
			'parent_cat' => array(
				"title" => esc_html__('Category to show', 'corgan'),
				"desc" => wp_kses_data( __('Select category to show in the blog archive', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'corgan')
				),
				"dependency" => array(
					'#page_template' => array('blog.php')
				),
				"refresh" => false,
				"hidden" => true,
				"std" => '0',
				"options" => corgan_array_merge(array(0 => esc_html__('- Select category -', 'corgan')), corgan_get_list_categories()),
				"type" => "select"
				),
			'posts_per_page' => array(
				"title" => esc_html__('Posts per page', 'corgan'),
				"desc" => wp_kses_data( __('How many posts will be displayed on this page', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'corgan')
				),
				"dependency" => array(
					'#page_template' => array('blog.php')
				),
				"hidden" => true,
				"std" => '10',
				"type" => "text"
				),
			"blog_pagination" => array( 
				"title" => esc_html__('Pagination style', 'corgan'),
				"desc" => wp_kses_data( __('Show Older/Newest posts or Page numbers below the posts list', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'corgan')
				),
				"std" => "links",
				"options" => array(
					'pages'	=> esc_html__("Page numbers", 'corgan'),
					'links'	=> esc_html__("Older/Newest", 'corgan'),
					'more'	=> esc_html__("Load more", 'corgan'),
					'infinite' => esc_html__("Infinite scroll", 'corgan')
				),
				"type" => "select"
				),
			'show_filters' => array(
				"title" => esc_html__('Show filters', 'corgan'),
				"desc" => wp_kses_data( __('Show categories as tabs to filter posts', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'corgan')
				),
				"dependency" => array(
					'#page_template' => array('blog.php'),
					'blog_style' => array('portfolio', 'gallery')
				),
				"hidden" => true,
				"std" => 0,
				"type" => "checkbox"
				),
			'first_post_large' => array(
				"title" => esc_html__('First post large', 'corgan'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of blog archive', 'corgan') ),
				"dependency" => array(
					'blog_style' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			"blog_content" => array( 
				"title" => esc_html__('Posts content', 'corgan'),
				"desc" => wp_kses_data( __("Show full post's content in the blog or only post's excerpt", 'corgan') ),
				"std" => "excerpt",
				"options" => array(
					'excerpt'	=> esc_html__('Excerpt',	'corgan'),
					'fullpost'	=> esc_html__('Full post',	'corgan')
				),
				"type" => "select"
				),
			'time_diff_before' => array(
				"title" => esc_html__('Time difference', 'corgan'),
				"desc" => wp_kses_data( __("How many days show time difference instead post's date", 'corgan') ),
				"std" => 5,
				"type" => "text"
				),
			'related_posts' => array(
				"title" => esc_html__('Related posts', 'corgan'),
				"desc" => wp_kses_data( __('How many related posts should be displayed in the single post?', 'corgan') ),
				"std" => 0,
				"options" => corgan_get_list_range(0,4),
				"type" => "select"
				),
			"blog_animation" => array( 
				"title" => esc_html__('Animation for posts', 'corgan'),
				"desc" => wp_kses_data( __('Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'corgan') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'corgan')
				),
				"dependency" => array(
					'#page_template' => array('blog.php')
				),
				"std" => "none",
				"options" => corgan_get_list_animations_in(),
				"type" => "select"
				),
			"animation_on_mobile" => array( 
				"title" => esc_html__('Allow animation on mobile', 'corgan'),
				"desc" => wp_kses_data( __('Allow extended animation effects on mobile devices', 'corgan') ),
				"std" => 'yes',
				"dependency" => array(
					'blog_animation' => array('^none')
				),
				"options" => corgan_get_list_yesno(),
				"type" => "switch"
				),
			'header_widgets_blog' => array(
				"title" => esc_html__('Header widgets', 'corgan'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the blog archive', 'corgan') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_widgets_blog' => array(
				"title" => esc_html__('Sidebar widgets', 'corgan'),
				"desc" => wp_kses_data( __('Select sidebar to show on the blog archive', 'corgan') ),
				"std" => 'sidebar_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_position_blog' => array(
				"title" => esc_html__('Sidebar position', 'corgan'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the blog archive', 'corgan') ),
				"refresh" => false,
				"std" => 'right',
				"options" => corgan_get_list_sidebars_positions(),
				"type" => "select"
				),
			'widgets_above_page_blog' => array(
				"title" => esc_html__('Widgets above the page', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'corgan') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_above_content_blog' => array(
				"title" => esc_html__('Widgets above the content', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'corgan') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_content_blog' => array(
				"title" => esc_html__('Widgets below the content', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'corgan') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_page_blog' => array(
				"title" => esc_html__('Widgets below the page', 'corgan'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'corgan') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'corgan')), corgan_get_list_sidebars()),
				"type" => "select"
				),
			
		
		
		
			// Section 'Colors' - choose color scheme and customize separate colors from it
			'scheme' => array(
				"title" => esc_html__('* Color scheme editor', 'corgan'),
				"desc" => wp_kses_data( __("<b>Simple settings</b> - you can change only accented color, used for links, buttons and some accented areas.", 'corgan') )
						. '<br>'
						. wp_kses_data( __("<b>Advanced settings</b> - change all scheme's colors and get full control over the appearance of your site!", 'corgan') ),
				"priority" => 1000,
				"type" => "section"
				),
		
			'color_settings' => array(
				"title" => esc_html__('Color settings', 'corgan'),
				"desc" => '',
				"std" => 'simple',
				"options" => array(
					"simple"  => esc_html__("Simple", 'corgan'),
					"advanced" => esc_html__("Advanced", 'corgan')
				),
				"refresh" => false,
				"type" => "switch"
				),
		
			'color_scheme_editor' => array(
				"title" => esc_html__('Color Scheme', 'corgan'),
				"desc" => wp_kses_data( __('Select color scheme to edit colors', 'corgan') ),
				"std" => 'default',
				"options" => corgan_get_list_schemes(),
				"refresh" => false,
				"type" => "select"
				),
		
			'scheme_storage' => array(
				"title" => esc_html__('Colors storage', 'corgan'),
				"desc" => esc_html__('Hidden storage of the all color from the all color shemes (only for internal usage)', 'corgan'),
				"std" => '',
				"refresh" => false,
				"type" => "hidden"
				),
		
			'scheme_info_single' => array(
				"title" => esc_html__('Colors for single post/page', 'corgan'),
				"desc" => wp_kses_data( __('Specify colors for single post/page (not for alter blocks)', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
				
			'bg_color' => array(
				"title" => esc_html__('Background color', 'corgan'),
				"desc" => wp_kses_data( __('Background color of the whole page', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'bd_color' => array(
				"title" => esc_html__('Border color', 'corgan'),
				"desc" => wp_kses_data( __('Color of the bordered elements, separators, etc.', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'text' => array(
				"title" => esc_html__('Text', 'corgan'),
				"desc" => wp_kses_data( __('Plain text color on single page/post', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_light' => array(
				"title" => esc_html__('Light text', 'corgan'),
				"desc" => wp_kses_data( __('Color of the post meta: post date and author, comments number, etc.', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_dark' => array(
				"title" => esc_html__('Dark text', 'corgan'),
				"desc" => wp_kses_data( __('Color of the headers, strong text, etc.', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_link' => array(
				"title" => esc_html__('Links', 'corgan'),
				"desc" => wp_kses_data( __('Color of links and accented areas', 'corgan') ),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_hover' => array(
				"title" => esc_html__('Links hover', 'corgan'),
				"desc" => wp_kses_data( __('Hover color for links and accented areas', 'corgan') ),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_alter' => array(
				"title" => esc_html__('Colors for alternative blocks', 'corgan'),
				"desc" => wp_kses_data( __('Specify colors for alternative blocks - rectangular blocks with its own background color (posts in homepage, blog archive, search results, widgets on sidebar, footer, etc.)', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'alter_bg_color' => array(
				"title" => esc_html__('Alter background color', 'corgan'),
				"desc" => wp_kses_data( __('Background color of the alternative blocks', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bg_hover' => array(
				"title" => esc_html__('Alter hovered background color', 'corgan'),
				"desc" => wp_kses_data( __('Background color for the hovered state of the alternative blocks', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_color' => array(
				"title" => esc_html__('Alternative border color', 'corgan'),
				"desc" => wp_kses_data( __('Border color of the alternative blocks', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_hover' => array(
				"title" => esc_html__('Alternative hovered border color', 'corgan'),
				"desc" => wp_kses_data( __('Border color for the hovered state of the alter blocks', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_text' => array(
				"title" => esc_html__('Alter text', 'corgan'),
				"desc" => wp_kses_data( __('Text color of the alternative blocks', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_light' => array(
				"title" => esc_html__('Alter light', 'corgan'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with alternative background', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_dark' => array(
				"title" => esc_html__('Alter dark', 'corgan'),
				"desc" => wp_kses_data( __('Color of the headers inside block with alternative background', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_link' => array(
				"title" => esc_html__('Alter link', 'corgan'),
				"desc" => wp_kses_data( __('Color of the links inside block with alternative background', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_hover' => array(
				"title" => esc_html__('Alter hover', 'corgan'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with alternative background', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_input' => array(
				"title" => esc_html__('Colors for the form fields', 'corgan'),
				"desc" => wp_kses_data( __('Specify colors for the form fields and textareas', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'input_bg_color' => array(
				"title" => esc_html__('Inactive background', 'corgan'),
				"desc" => wp_kses_data( __('Background color of the inactive form fields', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bg_hover' => array(
				"title" => esc_html__('Active background', 'corgan'),
				"desc" => wp_kses_data( __('Background color of the focused form fields', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_color' => array(
				"title" => esc_html__('Inactive border', 'corgan'),
				"desc" => wp_kses_data( __('Color of the border in the inactive form fields', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_hover' => array(
				"title" => esc_html__('Active border', 'corgan'),
				"desc" => wp_kses_data( __('Color of the border in the focused form fields', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_text' => array(
				"title" => esc_html__('Inactive field', 'corgan'),
				"desc" => wp_kses_data( __('Color of the text in the inactive fields', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_light' => array(
				"title" => esc_html__('Disabled field', 'corgan'),
				"desc" => wp_kses_data( __('Color of the disabled field', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_dark' => array(
				"title" => esc_html__('Active field', 'corgan'),
				"desc" => wp_kses_data( __('Color of the active field', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_inverse' => array(
				"title" => esc_html__('Colors for inverse blocks', 'corgan'),
				"desc" => wp_kses_data( __('Specify colors for inverse blocks, rectangular blocks with background color equal to the links color or one of accented colors (if used in the current theme)', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'inverse_text' => array(
				"title" => esc_html__('Inverse text', 'corgan'),
				"desc" => wp_kses_data( __('Color of the text inside block with accented background', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_light' => array(
				"title" => esc_html__('Inverse light', 'corgan'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with accented background', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_dark' => array(
				"title" => esc_html__('Inverse dark', 'corgan'),
				"desc" => wp_kses_data( __('Color of the headers inside block with accented background', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_link' => array(
				"title" => esc_html__('Inverse link', 'corgan'),
				"desc" => wp_kses_data( __('Color of the links inside block with accented background', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_hover' => array(
				"title" => esc_html__('Inverse hover', 'corgan'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with accented background', 'corgan') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$corgan_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),


			// Section 'Hidden' - internal options
			'reset_options' => array(
				"title" => '',
				"desc" => '',
				"std" => '0',
				"type" => "hidden",
				),
			'media_title' => array(
				"title" => esc_html__('Media title', 'corgan'),
				"desc" => wp_kses_data( __('Used as title for the audio and video item in this post', 'corgan') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'corgan')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),
			'media_author' => array(
				"title" => esc_html__('Media author', 'corgan'),
				"desc" => wp_kses_data( __('Used as author name for the audio and video item in this post', 'corgan') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'corgan')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),

		));


		// Prepare panel 'Fonts'
		$fonts = array(
		
			// Panel 'Fonts' - manage fonts loading and set parameters of the base theme elements
			'fonts' => array(
				"title" => esc_html__('* Fonts settings', 'corgan'),
				"desc" => '',
				"priority" => 1500,
				"type" => "panel"
				),

			// Section 'Load_fonts'
			'load_fonts' => array(
				"title" => esc_html__('Load fonts', 'corgan'),
				"desc" => wp_kses_data( __('Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'corgan') )
						. '<br>'
						. wp_kses_data( __('<b>Attention!</b> Press "Refresh" button to reload preview area after the all fonts are changed', 'corgan') ),
				"type" => "section"
				),
			'load_fonts_subset' => array(
				"title" => esc_html__('Google fonts subsets', 'corgan'),
				"desc" => wp_kses_data( __('Specify comma separated list of the subsets which will be load from Google fonts', 'corgan') )
						. '<br>'
						. wp_kses_data( __('Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'corgan') ),
				"refresh" => false,
				"std" => '$corgan_get_load_fonts_subset',
				"type" => "text"
				)
		);

		for ($i=1; $i<=corgan_get_theme_setting('max_load_fonts'); $i++) {
			$fonts["load_fonts-{$i}-info"] = array(
				"title" => esc_html(sprintf(__('Font %s', 'corgan'), $i)),
				"desc" => '',
				"type" => "info",
				);
			$fonts["load_fonts-{$i}-name"] = array(
				"title" => esc_html__('Font name', 'corgan'),
				"desc" => '',
				"refresh" => false,
				"std" => '$corgan_get_load_fonts_option',
				"type" => "text"
				);
			$fonts["load_fonts-{$i}-family"] = array(
				"title" => esc_html__('Font family', 'corgan'),
				"desc" => $i==1 
							? wp_kses_data( __('Select font family to use it if font above is not available', 'corgan') )
							: '',
				"refresh" => false,
				"std" => '$corgan_get_load_fonts_option',
				"options" => array(
					'inherit' => esc_html__("Inherit", 'corgan'),
					'serif' => esc_html__('serif', 'corgan'),
					'sans-serif' => esc_html__('sans-serif', 'corgan'),
					'monospace' => esc_html__('monospace', 'corgan'),
					'cursive' => esc_html__('cursive', 'corgan'),
					'fantasy' => esc_html__('fantasy', 'corgan')
				),
				"type" => "select"
				);
			$fonts["load_fonts-{$i}-styles"] = array(
				"title" => esc_html__('Font styles', 'corgan'),
				"desc" => $i==1 
							? wp_kses_data( __('Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'corgan') )
											. '<br>'
								. wp_kses_data( __('<b>Attention!</b> Each weight and style increase download size! Specify only used weights and styles.', 'corgan') )
							: '',
				"refresh" => false,
				"std" => '$corgan_get_load_fonts_option',
				"type" => "text"
				);
		}
		$fonts['load_fonts_end'] = array(
			"type" => "section_end"
			);

		// Sections with font's attributes for each theme element
		$theme_fonts = corgan_get_theme_fonts();
		foreach ($theme_fonts as $tag=>$v) {
			$fonts["{$tag}_section"] = array(
				"title" => !empty($v['title']) 
								? $v['title'] 
								: esc_html(sprintf(__('%s settings', 'corgan'), $tag)),
				"desc" => !empty($v['description']) 
								? $v['description'] 
								: wp_kses_post( sprintf(__('Font settings of the "%s" tag.', 'corgan'), $tag) ),
				"type" => "section",
				);
	
			foreach ($v as $css_prop=>$css_value) {
				if (in_array($css_prop, array('title', 'description'))) continue;
				$options = '';
				$type = 'text';
				$title = ucfirst(str_replace('-', ' ', $css_prop));
				if ($css_prop == 'font-family') {
					$type = 'select';
					$options = corgan_get_list_load_fonts(true);
				} else if ($css_prop == 'font-weight') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'corgan'),
						'100' => esc_html__('100 (Light)', 'corgan'), 
						'200' => esc_html__('200 (Light)', 'corgan'), 
						'300' => esc_html__('300 (Thin)',  'corgan'),
						'400' => esc_html__('400 (Normal)', 'corgan'),
						'500' => esc_html__('500 (Semibold)', 'corgan'),
						'600' => esc_html__('600 (Semibold)', 'corgan'),
						'700' => esc_html__('700 (Bold)', 'corgan'),
						'800' => esc_html__('800 (Black)', 'corgan'),
						'900' => esc_html__('900 (Black)', 'corgan')
					);
				} else if ($css_prop == 'font-style') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'corgan'),
						'normal' => esc_html__('Normal', 'corgan'), 
						'italic' => esc_html__('Italic', 'corgan')
					);
				} else if ($css_prop == 'text-decoration') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'corgan'),
						'none' => esc_html__('None', 'corgan'), 
						'underline' => esc_html__('Underline', 'corgan'),
						'overline' => esc_html__('Overline', 'corgan'),
						'line-through' => esc_html__('Line-through', 'corgan')
					);
				} else if ($css_prop == 'text-transform') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'corgan'),
						'none' => esc_html__('None', 'corgan'), 
						'uppercase' => esc_html__('Uppercase', 'corgan'),
						'lowercase' => esc_html__('Lowercase', 'corgan'),
						'capitalize' => esc_html__('Capitalize', 'corgan')
					);
				}
				$fonts["{$tag}_{$css_prop}"] = array(
					"title" => $title,
					"desc" => '',
					"refresh" => false,
					"std" => '$corgan_get_theme_fonts_option',
					"options" => $options,
					"type" => $type
				);
			}
			
			$fonts["{$tag}_section_end"] = array(
				"type" => "section_end"
				);
		}

		$fonts['fonts_end'] = array(
			"type" => "panel_end"
			);

		// Add fonts parameters into Theme Options
		corgan_storage_merge_array('options', '', $fonts);
	}
}




// -----------------------------------------------------------------
// -- Create and manage Theme Options
// -----------------------------------------------------------------

// Theme init priorities:
// 2 - create Theme Options
if (!function_exists('corgan_options_theme_setup2')) {
	add_action( 'after_setup_theme', 'corgan_options_theme_setup2', 2 );
	function corgan_options_theme_setup2() {
		corgan_options_create();
	}
}

// Step 1: Load default settings and previously saved mods
if (!function_exists('corgan_options_theme_setup5')) {
	add_action( 'after_setup_theme', 'corgan_options_theme_setup5', 5 );
	function corgan_options_theme_setup5() {
		corgan_storage_set('options_reloaded', false);
		corgan_load_theme_options();
	}
}

// Step 2: Load current theme customization mods
if (is_customize_preview()) {
	if (!function_exists('corgan_load_custom_options')) {
		add_action( 'wp_loaded', 'corgan_load_custom_options' );
		function corgan_load_custom_options() {
			if (!corgan_storage_get('options_reloaded')) {
				corgan_storage_set('options_reloaded', true);
				corgan_load_theme_options();
			}
		}
	}
}

// Load current values for each customizable option
if ( !function_exists('corgan_load_theme_options') ) {
	function corgan_load_theme_options() {
		$options = corgan_storage_get('options');
		$reset = (int) get_theme_mod('reset_options', 0);
		foreach ($options as $k=>$v) {
			if (isset($v['std'])) {
				if (strpos($v['std'], '$corgan_')!==false) {
					$func = substr($v['std'], 1);
					if (function_exists($func)) {
						$v['std'] = $func($k);
					}
				}
				$value = $v['std'];
				if (!$reset) {
					if (isset($_GET[$k]))
						$value = $_GET[$k];
					else {
						$tmp = get_theme_mod($k, -987654321);
						if ($tmp != -987654321) $value = $tmp;
					}
				}
				corgan_storage_set_array2('options', $k, 'val', $value);
				if ($reset) remove_theme_mod($k);
			}
		}
		if ($reset) {
			// Unset reset flag
			set_theme_mod('reset_options', 0);
			// Regenerate CSS with default colors and fonts
			corgan_customizer_save_css();
		} else {
			do_action('corgan_action_load_options');
		}
	}
}

// Override options with stored page/post meta
if ( !function_exists('corgan_override_theme_options') ) {
	add_action( 'wp', 'corgan_override_theme_options', 1 );
	function corgan_override_theme_options($query=null) {
		if (is_page_template('blog.php')) {
			corgan_storage_set('blog_archive', true);
			corgan_storage_set('blog_template', get_the_ID());
		}
		corgan_storage_set('blog_mode', corgan_detect_blog_mode());
		if (is_singular()) {
			corgan_storage_set('options_meta', get_post_meta(get_the_ID(), 'corgan_options', true));
		}
	}
}


// Return customizable option value
if (!function_exists('corgan_get_theme_option')) {
	function corgan_get_theme_option($name, $defa='', $strict_mode=false, $post_id=0) {
		$rez = $defa;
		$from_post_meta = false;
		if ($post_id > 0) {
			if (!corgan_storage_isset('post_options_meta', $post_id))
				corgan_storage_set_array('post_options_meta', $post_id, get_post_meta($post_id, 'corgan_options', true));
			if (corgan_storage_isset('post_options_meta', $post_id, $name)) {
				$tmp = corgan_storage_get_array('post_options_meta', $post_id, $name);
				if (!corgan_is_inherit($tmp)) {
					$rez = $tmp;
					$from_post_meta = true;
				}
			}
		}
		if (!$from_post_meta && corgan_storage_isset('options')) {
			if ( !corgan_storage_isset('options', $name) ) {
				$rez = $tmp = '_not_exists_';
				if (function_exists('trx_addons_get_option'))
					$rez = trx_addons_get_option($name, $tmp, false);
				if ($rez === $tmp) {
					if ($strict_mode) {
						$s = debug_backtrace();
						//array_shift($s);
						$s = array_shift($s);
						echo '<pre>' . sprintf(esc_html__('Undefined option "%s" called from:', 'corgan'), $name);
						if (function_exists('dco')) dco($s);
						else print_r($s);
						echo '</pre>';
						die();
					} else
						$rez = $defa;
				}
			} else {
				$blog_mode = corgan_storage_get('blog_mode');
				// Override option from GET or POST for current blog mode
				if (!empty($blog_mode) && isset($_REQUEST[$name . '_' . $blog_mode])) {
					$rez = $_REQUEST[$name . '_' . $blog_mode];
				// Override option from GET
				} else if (isset($_REQUEST[$name])) {
					$rez = $_REQUEST[$name];
				// Override option from current page settings (if exists)
				} else if (corgan_storage_isset('options_meta', $name) && !corgan_is_inherit(corgan_storage_get_array('options_meta', $name))) {
					$rez = corgan_storage_get_array('options_meta', $name);
				// Override option from current blog mode settings: 'home', 'search', 'page', 'post', 'blog', etc. (if exists)
				} else if (!empty($blog_mode) && corgan_storage_isset('options', $name . '_' . $blog_mode, 'val') && !corgan_is_inherit(corgan_storage_get_array('options', $name . '_' . $blog_mode, 'val'))) {
					$rez = corgan_storage_get_array('options', $name . '_' . $blog_mode, 'val');
				// Get saved option value
				} else if (corgan_storage_isset('options', $name, 'val')) {
					$rez = corgan_storage_get_array('options', $name, 'val');
				// Get ThemeREX Addons option value
				} else if (function_exists('trx_addons_get_option')) {
					$rez = trx_addons_get_option($name, $defa, false);
				}
			}
		}
		return $rez;
	}
}


// Check if customizable option exists
if (!function_exists('corgan_check_theme_option')) {
	function corgan_check_theme_option($name) {
		return corgan_storage_isset('options', $name);
	}
}

// Get dependencies list from the Theme Options
if ( !function_exists('corgan_get_theme_dependencies') ) {
	function corgan_get_theme_dependencies() {
		$options = corgan_storage_get('options');
		$depends = array();
		foreach ($options as $k=>$v) {
			if (isset($v['dependency'])) 
				$depends[$k] = $v['dependency'];
		}
		return $depends;
	}
}

// Return internal theme setting value
if (!function_exists('corgan_get_theme_setting')) {
	function corgan_get_theme_setting($name) {
		return corgan_storage_isset('settings', $name) ? corgan_storage_get_array('settings', $name) : false;
	}
}


// Set theme setting
if ( !function_exists( 'corgan_set_theme_setting' ) ) {
	function corgan_set_theme_setting($option_name, $value) {
		if (corgan_storage_isset('settings', $option_name))
			corgan_storage_set_array('settings', $option_name, $value);
	}
}
?>