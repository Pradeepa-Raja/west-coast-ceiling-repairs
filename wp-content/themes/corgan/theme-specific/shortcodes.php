<?php

if ( !function_exists('corgan_specific_theme_setup1') ) {
    add_action( 'after_setup_theme', 'corgan_specific_theme_setup1', 1 );

    function corgan_specific_theme_setup1() {

        //Add new styles
        add_filter('trx_addons_sc_type',     'corgan_specific_sc_add_type', 10, 2);

        //Add new params
        add_filter('trx_addons_sc_map',      'corgan_specific_sc_add_map', 10, 2);

        //Add new atts to shortcode
        add_filter('trx_addons_sc_atts',     'corgan_specific_sc_atts', 10, 2);

        //Add new title style
        add_filter('trx_addons_sc_title_style',     'corgan_sc_title_style', 10, 2);
    }
}


if ( !function_exists('corgan_specific_sc_add_type') ) {
    function corgan_specific_sc_add_type($list, $sc) {
        if($sc == 'trx_sc_button') {
            $list[ esc_html__('Bordered', 'corgan') ] = 'bordered_button';
        }

        if($sc == 'trx_sc_services') {
            $list[ esc_html__('Portfolio style', 'corgan') ] = 'port_style';
        }
        return $list;
    }
}


if ( !function_exists('corgan_sc_title_style') ) {
    function corgan_sc_title_style($list, $sc) {
        if($sc == 'trx_sc_title') {
            $list[ esc_html__('Accented', 'corgan') ] = 'accented_title';
        }
        return $list;
    }
}

// Add params to the shortcode
if ( !function_exists('corgan_specific_sc_add_map') ) {
    function corgan_specific_sc_add_map($params, $sc) {
        //Promo image2
        if (in_array($sc, array('trx_sc_promo'))) {
            $params['params'][] = array(
                "param_name" => "image1",
                "heading" => esc_html__("Image URL for text block", 'corgan'),
                "description" => wp_kses_data( __("Select the promo image from the library for text section", 'corgan') ),
                "group" => esc_html__('Image', 'corgan'),
                "type" => "attach_image"
            );
        }

        //Contact form FAX
        if (in_array($sc, array('trx_sc_form'))) {
            $params['params'][] = array(
                'param_name' => 'fax',
                'heading' => esc_html__( 'Your fax', 'corgan' ),
                'description' => esc_html__( 'Specify your fax for the detailed form', 'corgan' ),
                'dependency' => array(
                    'element' => 'type',
                    'value' => array('detailed')
                ),
                'type' => 'textfield',
            );
        }

        return $params;
    }
}

// Add params to the default shortcode's atts
if ( !function_exists( 'corgan_specific_sc_atts' ) ) {
    function corgan_specific_sc_atts($atts, $sc) {
        // Promo image
        if ($sc == 'trx_sc_promo')
            $atts['image1'] = '';

        // Contact FAX
        if ($sc == 'trx_sc_form')
            $atts['fax'] = '';

        return $atts;
    }
}

?>