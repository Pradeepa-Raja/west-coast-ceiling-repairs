<?php
/**
 * Theme lists
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }



// Return numbers range
if ( !function_exists( 'corgan_get_list_range' ) ) {
	function corgan_get_list_range($from=1, $to=2, $prepend_inherit=false) {
		$list = array();
		for ($i=$from; $i<=$to; $i++)
			$list[$i] = $i;
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}



// Return styles list
if ( !function_exists( 'corgan_get_list_styles' ) ) {
	function corgan_get_list_styles($from=1, $to=2, $prepend_inherit=false) {
		$list = array();
		for ($i=$from; $i<=$to; $i++)
			$list[$i] = sprintf(esc_html__('Style %d', 'corgan'), $i);
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}

// Return list with 'Yes' and 'No' items
if ( !function_exists( 'corgan_get_list_yesno' ) ) {
	function corgan_get_list_yesno($prepend_inherit=false) {
		$list = array(
			"yes"	=> esc_html__("Yes", 'corgan'),
			"no"	=> esc_html__("No", 'corgan')
		);
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}

// Return list with 'On' and 'Of' items
if ( !function_exists( 'corgan_get_list_onoff' ) ) {
	function corgan_get_list_onoff($prepend_inherit=false) {
		$list = array(
			"on"	=> esc_html__("On", 'corgan'),
			"off"	=> esc_html__("Off", 'corgan')
		);
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}

// Return list with 'Show' and 'Hide' items
if ( !function_exists( 'corgan_get_list_showhide' ) ) {
	function corgan_get_list_showhide($prepend_inherit=false) {
		$list = array(
			"show" => esc_html__("Show", 'corgan'),
			"hide" => esc_html__("Hide", 'corgan')
		);
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}

// Return list with 'Horizontal' and 'Vertical' items
if ( !function_exists( 'corgan_get_list_directions' ) ) {
	function corgan_get_list_directions($prepend_inherit=false) {
		$list = array(
			"horizontal" => esc_html__("Horizontal", 'corgan'),
			"vertical"   => esc_html__("Vertical", 'corgan')
		);
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}

// Return list of the animations
if ( !function_exists( 'corgan_get_list_animations' ) ) {
	function corgan_get_list_animations($prepend_inherit=false) {
		$list = array(
			'none'			=> esc_html__('- None -',	'corgan'),
			'bounced'		=> esc_html__('Bounced',	'corgan'),
			'elastic'		=> esc_html__('Elastic',	'corgan'),
			'flash'			=> esc_html__('Flash',		'corgan'),
			'flip'			=> esc_html__('Flip',		'corgan'),
			'pulse'			=> esc_html__('Pulse',		'corgan'),
			'rubberBand'	=> esc_html__('Rubber Band','corgan'),
			'shake'			=> esc_html__('Shake',		'corgan'),
			'swing'			=> esc_html__('Swing',		'corgan'),
			'tada'			=> esc_html__('Tada',		'corgan'),
			'wobble'		=> esc_html__('Wobble',		'corgan')
		);
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}


// Return list of the enter animations
if ( !function_exists( 'corgan_get_list_animations_in' ) ) {
	function corgan_get_list_animations_in($prepend_inherit=false) {
		$list = array(
			'none'				=> esc_html__('- None -',			'corgan'),
			'bounceIn'			=> esc_html__('Bounce In',			'corgan'),
			'bounceInUp'		=> esc_html__('Bounce In Up',		'corgan'),
			'bounceInDown'		=> esc_html__('Bounce In Down',		'corgan'),
			'bounceInLeft'		=> esc_html__('Bounce In Left',		'corgan'),
			'bounceInRight'		=> esc_html__('Bounce In Right',	'corgan'),
			'elastic'			=> esc_html__('Elastic In',			'corgan'),
			'fadeIn'			=> esc_html__('Fade In',			'corgan'),
			'fadeInUp'			=> esc_html__('Fade In Up',			'corgan'),
			'fadeInUpSmall'		=> esc_html__('Fade In Up Small',	'corgan'),
			'fadeInUpBig'		=> esc_html__('Fade In Up Big',		'corgan'),
			'fadeInDown'		=> esc_html__('Fade In Down',		'corgan'),
			'fadeInDownBig'		=> esc_html__('Fade In Down Big',	'corgan'),
			'fadeInLeft'		=> esc_html__('Fade In Left',		'corgan'),
			'fadeInLeftBig'		=> esc_html__('Fade In Left Big',	'corgan'),
			'fadeInRight'		=> esc_html__('Fade In Right',		'corgan'),
			'fadeInRightBig'	=> esc_html__('Fade In Right Big',	'corgan'),
			'flipInX'			=> esc_html__('Flip In X',			'corgan'),
			'flipInY'			=> esc_html__('Flip In Y',			'corgan'),
			'lightSpeedIn'		=> esc_html__('Light Speed In',		'corgan'),
			'rotateIn'			=> esc_html__('Rotate In',			'corgan'),
			'rotateInUpLeft'	=> esc_html__('Rotate In Down Left','corgan'),
			'rotateInUpRight'	=> esc_html__('Rotate In Up Right',	'corgan'),
			'rotateInDownLeft'	=> esc_html__('Rotate In Up Left',	'corgan'),
			'rotateInDownRight'	=> esc_html__('Rotate In Down Right','corgan'),
			'rollIn'			=> esc_html__('Roll In',			'corgan'),
			'slideInUp'			=> esc_html__('Slide In Up',		'corgan'),
			'slideInDown'		=> esc_html__('Slide In Down',		'corgan'),
			'slideInLeft'		=> esc_html__('Slide In Left',		'corgan'),
			'slideInRight'		=> esc_html__('Slide In Right',		'corgan'),
			'wipeInLeftTop'		=> esc_html__('Wipe In Left Top',	'corgan'),
			'zoomIn'			=> esc_html__('Zoom In',			'corgan'),
			'zoomInUp'			=> esc_html__('Zoom In Up',			'corgan'),
			'zoomInDown'		=> esc_html__('Zoom In Down',		'corgan'),
			'zoomInLeft'		=> esc_html__('Zoom In Left',		'corgan'),
			'zoomInRight'		=> esc_html__('Zoom In Right',		'corgan')
		);
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}


// Return list of the out animations
if ( !function_exists( 'corgan_get_list_animations_out' ) ) {
	function corgan_get_list_animations_out($prepend_inherit=false) {
		$list = array(
			'none'			=> esc_html__('- None -',			'corgan'),
			'bounceOut'		=> esc_html__('Bounce Out',			'corgan'),
			'bounceOutUp'	=> esc_html__('Bounce Out Up',		'corgan'),
			'bounceOutDown'	=> esc_html__('Bounce Out Down',	'corgan'),
			'bounceOutLeft'	=> esc_html__('Bounce Out Left',	'corgan'),
			'bounceOutRight'=> esc_html__('Bounce Out Right',	'corgan'),
			'fadeOut'		=> esc_html__('Fade Out',			'corgan'),
			'fadeOutUp'		=> esc_html__('Fade Out Up',		'corgan'),
			'fadeOutUpBig'	=> esc_html__('Fade Out Up Big',	'corgan'),
			'fadeOutDownSmall'	=> esc_html__('Fade Out Down Small','corgan'),
			'fadeOutDownBig'=> esc_html__('Fade Out Down Big',	'corgan'),
			'fadeOutDown'	=> esc_html__('Fade Out Down',		'corgan'),
			'fadeOutLeft'	=> esc_html__('Fade Out Left',		'corgan'),
			'fadeOutLeftBig'=> esc_html__('Fade Out Left Big',	'corgan'),
			'fadeOutRight'	=> esc_html__('Fade Out Right',		'corgan'),
			'fadeOutRightBig'=> esc_html__('Fade Out Right Big','corgan'),
			'flipOutX'		=> esc_html__('Flip Out X',			'corgan'),
			'flipOutY'		=> esc_html__('Flip Out Y',			'corgan'),
			'hinge'			=> esc_html__('Hinge Out',			'corgan'),
			'lightSpeedOut'	=> esc_html__('Light Speed Out',	'corgan'),
			'rotateOut'		=> esc_html__('Rotate Out',			'corgan'),
			'rotateOutUpLeft'	=> esc_html__('Rotate Out Down Left',	'corgan'),
			'rotateOutUpRight'	=> esc_html__('Rotate Out Up Right',	'corgan'),
			'rotateOutDownLeft'	=> esc_html__('Rotate Out Up Left',		'corgan'),
			'rotateOutDownRight'=> esc_html__('Rotate Out Down Right',	'corgan'),
			'rollOut'			=> esc_html__('Roll Out',		'corgan'),
			'slideOutUp'		=> esc_html__('Slide Out Up',	'corgan'),
			'slideOutDown'		=> esc_html__('Slide Out Down',	'corgan'),
			'slideOutLeft'		=> esc_html__('Slide Out Left',	'corgan'),
			'slideOutRight'		=> esc_html__('Slide Out Right','corgan'),
			'zoomOut'			=> esc_html__('Zoom Out',		'corgan'),
			'zoomOutUp'			=> esc_html__('Zoom Out Up',	'corgan'),
			'zoomOutDown'		=> esc_html__('Zoom Out Down',	'corgan'),
			'zoomOutLeft'		=> esc_html__('Zoom Out Left',	'corgan'),
			'zoomOutRight'		=> esc_html__('Zoom Out Right',	'corgan')
		);
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}

// Return classes list for the specified animation
if (!function_exists('corgan_get_animation_classes')) {
	function corgan_get_animation_classes($animation, $speed='normal', $loop='none') {
		// speed:	fast=0.5s | normal=1s | slow=2s
		// loop:	none | infinite
		return corgan_is_off($animation) ? '' : 'animated '.esc_attr($animation).' '.esc_attr($speed).(!corgan_is_off($loop) ? ' '.esc_attr($loop) : '');
	}
}

// Return custom sidebars list, prepended inherit and main sidebars item (if need)
if ( !function_exists( 'corgan_get_list_sidebars' ) ) {
    function corgan_get_list_sidebars($prepend_inherit=false) {
        if (($list = corgan_storage_get('list_sidebars'))=='') {
            $sidebars = corgan_get_sidebars();
            $list = array();
            if (is_array($sidebars)) {
                foreach ($sidebars as $id => $sb)
                    $list[$id] = $sb['name'];
            }
            corgan_storage_set('list_sidebars', $list);
        }
        return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
    }
}

// Return sidebars positions
if ( !function_exists( 'corgan_get_list_sidebars_positions' ) ) {
	function corgan_get_list_sidebars_positions($prepend_inherit=false) {
		$list = array(
			'left'  => esc_html__('Left',  'corgan'),
			'right' => esc_html__('Right', 'corgan')
		);
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}

// Return blog styles list, prepended inherit
if ( !function_exists( 'corgan_get_list_blog_styles' ) ) {
	function corgan_get_list_blog_styles($prepend_inherit=false) {
		$list = apply_filters('corgan_filter_list_blog_styles', array(
			'excerpt'	=> esc_html__('Excerpt','corgan'),
			'classic_2'	=> esc_html__('Classic /2 columns/',	'corgan'),
			'classic_3'	=> esc_html__('Classic /3 columns/',	'corgan'),
			'portfolio_2' => esc_html__('Portfolio /2 columns/','corgan'),
			'portfolio_3' => esc_html__('Portfolio /3 columns/','corgan'),
			'portfolio_4' => esc_html__('Portfolio /4 columns/','corgan'),
			'gallery_2' => esc_html__('Gallery /2 columns/',	'corgan'),
			'gallery_3' => esc_html__('Gallery /3 columns/',	'corgan'),
			'gallery_4' => esc_html__('Gallery /4 columns/',	'corgan'),
			'chess_1'	=> esc_html__('Chess /2 column/',		'corgan'),
			'chess_2'	=> esc_html__('Chess /4 columns/',		'corgan'),
			'chess_3'	=> esc_html__('Chess /6 columns/',		'corgan')
			)
		);
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}


// Return list of categories
if ( !function_exists( 'corgan_get_list_categories' ) ) {
	function corgan_get_list_categories($prepend_inherit=false) {
		if (($list = corgan_storage_get('list_categories'))=='') {
			$list = array();
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false );
			$taxonomies = get_categories( $args );
			if (is_array($taxonomies) && count($taxonomies) > 0) {
				foreach ($taxonomies as $cat) {
					$list[$cat->term_id] = $cat->name;
				}
			}
			corgan_storage_set('list_categories', $list);
		}
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}


// Return list of taxonomies
if ( !function_exists( 'corgan_get_list_terms' ) ) {
	function corgan_get_list_terms($prepend_inherit=false, $taxonomy='category') {
		if (($list = corgan_storage_get('list_taxonomies_'.($taxonomy)))=='') {
			$list = array();
			$args = array(
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => $taxonomy,
				'pad_counts'               => false );
			$taxonomies = get_terms( $taxonomy, $args );
			if (is_array($taxonomies) && count($taxonomies) > 0) {
				foreach ($taxonomies as $cat) {
					$list[$cat->term_id] = $cat->name;	// . ($taxonomy!='category' ? ' /'.($cat->taxonomy).'/' : '');
				}
			}
			corgan_storage_set('list_taxonomies_'.($taxonomy), $list);
		}
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}

// Return list of post's types
if ( !function_exists( 'corgan_get_list_posts_types' ) ) {
	function corgan_get_list_posts_types($prepend_inherit=false) {
		if (($list = corgan_storage_get('list_posts_types'))=='') {
			$list = apply_filters('corgan_filter_list_posts_types', array(
				'post' => esc_html('Post', 'corgan')
			));
			corgan_storage_set('list_posts_types', $list);
		}
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}


// Return list post items from any post type and taxonomy
if ( !function_exists( 'corgan_get_list_posts' ) ) {
	function corgan_get_list_posts($prepend_inherit=false, $opt=array()) {
		$opt = array_merge(array(
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'taxonomy'			=> 'category',
			'taxonomy_value'	=> '',
			'posts_per_page'	=> -1,
			'orderby'			=> 'post_date',
			'order'				=> 'desc',
			'return'			=> 'id'
			), is_array($opt) ? $opt : array('post_type'=>$opt));

		$hash = 'list_posts_'.($opt['post_type']).'_'.($opt['taxonomy']).'_'.($opt['taxonomy_value']).'_'.($opt['orderby']).'_'.($opt['order']).'_'.($opt['return']).'_'.($opt['posts_per_page']);
		if (($list = corgan_storage_get($hash))=='') {
			$list = array();
			$list['none'] = esc_html__("- Not selected -", 'corgan');
			$args = array(
				'post_type' => $opt['post_type'],
				'post_status' => $opt['post_status'],
				'posts_per_page' => $opt['posts_per_page'],
				'ignore_sticky_posts' => true,
				'orderby'	=> $opt['orderby'],
				'order'		=> $opt['order']
			);
			if (!empty($opt['taxonomy_value'])) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => $opt['taxonomy'],
						'field' => (int) $opt['taxonomy_value'] > 0 ? 'id' : 'slug',
						'terms' => $opt['taxonomy_value']
					)
				);
			}
			$posts = get_posts( $args );
			if (is_array($posts) && count($posts) > 0) {
				foreach ($posts as $post) {
					$list[$opt['return']=='id' ? $post->ID : $post->post_title] = $post->post_title;
				}
			}
			corgan_storage_set($hash, $list);
		}
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}


// Return list of registered users
if ( !function_exists( 'corgan_get_list_users' ) ) {
	function corgan_get_list_users($prepend_inherit=false, $roles=array('administrator', 'editor', 'author', 'contributor', 'shop_manager')) {
		if (($list = corgan_storage_get('list_users'))=='') {
			$list = array();
			$list['none'] = esc_html__("- Not selected -", 'corgan');
			$args = array(
				'orderby'	=> 'display_name',
				'order'		=> 'ASC' );
			$users = get_users( $args );
			if (is_array($users) && count($users) > 0) {
				foreach ($users as $user) {
					$accept = true;
					if (is_array($user->roles)) {
						if (is_array($user->roles) && count($user->roles) > 0) {
							$accept = false;
							foreach ($user->roles as $role) {
								if (in_array($role, $roles)) {
									$accept = true;
									break;
								}
							}
						}
					}
					if ($accept) $list[$user->user_login] = $user->display_name;
				}
			}
			corgan_storage_set('list_users', $list);
		}
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}

// Return menus list, prepended inherit
if ( !function_exists( 'corgan_get_list_menus' ) ) {
	function corgan_get_list_menus($prepend_inherit=false) {
		if (($list = corgan_storage_get('list_menus'))=='') {
			$list = array();
			$list['default'] = esc_html__("Default", 'corgan');
			$menus = wp_get_nav_menus();
			if (is_array($menus) && count($menus) > 0) {
				foreach ($menus as $menu) {
					$list[$menu->slug] = $menu->name;
				}
			}
			corgan_storage_set('list_menus', $list);
		}
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}

// Return iconed classes list
if ( !function_exists( 'corgan_get_list_icons' ) ) {
	function corgan_get_list_icons($prepend_inherit=false) {
		static $list = false;
		if (!is_array($list)) 
			$list = !is_admin() ? array() : corgan_parse_icons_classes(corgan_get_file_dir("css/fontello/css/fontello-codes.css"));
		return $prepend_inherit ? corgan_array_merge(array('inherit' => esc_html__("Inherit", 'corgan')), $list) : $list;
	}
}
?>