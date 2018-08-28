<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
        wp_enqueue_style('fonts/css', ('https://fonts.googleapis.com/css?family=Nothing+You+Could+Do'), false, null);
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'aos-scripts', get_template_directory_uri() . '/js/aos.js', array(), true);
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), true);
        wp_enqueue_script( 'slick-scripts', get_template_directory_uri() . '/js/slick.min.js', array(), true);
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );


/**
 * Functions for Post Type 'Web Site'
 *
 * @since Nueva Web Site 1.2
 */

if ( function_exists('acf_add_options_page') ) {

    /*
        $page = acf_add_options_page(array(
            'page_title'    => __('Quienes Somos', 'WebSite'),
            'menu_title'    => __('Quienes Somos', 'WebSite'),
            'menu_slug'     => 'theme-about-settings',
            'capability'    => 'manage_options',
            'redirect'  => false,
            'rewrite' => array( 'slug' => 'about' ),

        ));
    */

    $page = acf_add_options_page(array(
        'page_title'    => __('Configuration General Home', 'WebSite'),
        'menu_title'    => __('Intro WebSite', 'WebSite'),
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'manage_options',
        'redirect'  => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => __('Solutions & Server', 'WebSite'),
        'menu_title' => __('Solutions & Server', 'WebSite'),
        'menu_slug' => 'theme-solutions-configuration',
        'capability' => 'manage_options',
        'parent_slug' => 'theme-general-settings',
        'position' => false,
        'icon_url' => false,
    ));
    acf_add_options_sub_page(array(
        'page_title' => __('Slider Clients', 'WebSite'),
        'menu_title' => __('Slider Clients', 'WebSite'),
        'menu_slug' => 'slider-clients-configuration',
        'capability' => 'manage_options',
        'parent_slug' => 'theme-general-settings',
        'position' => false,
        'icon_url' => false,
    ));

    acf_add_options_sub_page(array(
        'page_title' => __('Meet Us', 'WebSite'),
        'menu_title' => __('Meet Us Settings', 'WebSite'),
        'menu_slug' => 'meetus-configuration',
        'capability' => 'manage_options',
        'parent_slug' => 'theme-general-settings',
        'position' => false,
        'icon_url' => false,
    ));

    acf_add_options_sub_page(array(
        'page_title' => __('Copyright', 'WebSite'),
        'menu_title' => __('Copyright Info', 'WebSite'),
        'menu_slug' => 'theme-service-configuration',
        'capability' => 'manage_options',
        'parent_slug' => 'theme-general-settings',
        'position' => false,
        'icon_url' => false,
    ));
    /*acf_add_options_sub_page(array(
        'page_title' => __('Configuracion Nosotros', 'WebSite'),
        'menu_title' => __('Configuracion Nosotros', 'WebSite'),
        'menu_slug' => 'theme-service',
        'capability' => 'manage_options',
        'parent_slug' => 'theme-general-settings',
        'position' => false,
        'icon_url' => false,
    ));*/

    /*
     * Intro
     * Solutions & Server
     * Clientes
     * Meet US
     * */
}
