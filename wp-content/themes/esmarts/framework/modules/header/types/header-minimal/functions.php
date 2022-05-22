<?php

if ( ! function_exists( 'esmarts_elated_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function esmarts_elated_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'eSmartsElatedNamespace\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'esmarts_elated_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function esmarts_elated_init_register_header_minimal_type() {
		add_filter( 'esmarts_elated_filter_register_header_type_class', 'esmarts_elated_register_header_minimal_type' );
	}
	
	add_action( 'esmarts_elated_action_before_header_function_init', 'esmarts_elated_init_register_header_minimal_type' );
}

if ( ! function_exists( 'esmarts_elated_include_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function esmarts_elated_include_header_minimal_full_screen_menu( $menus ) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'esmarts' );
		
		return $menus;
	}
	
	if ( esmarts_elated_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_filter( 'esmarts_elated_filter_register_headers_menu', 'esmarts_elated_include_header_minimal_full_screen_menu' );
	}
}

if ( ! function_exists( 'esmarts_elated_register_header_minimal_full_screen_menu_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function esmarts_elated_register_header_minimal_full_screen_menu_widgets() {
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_above',
				'name'          => esc_html__( 'Fullscreen Menu Top', 'esmarts' ),
				'description'   => esc_html__( 'This widget area is rendered above full screen menu', 'esmarts' ),
				'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-above-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="eltdf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_below',
				'name'          => esc_html__( 'Fullscreen Menu Bottom', 'esmarts' ),
				'description'   => esc_html__( 'This widget area is rendered below full screen menu', 'esmarts' ),
				'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-below-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="eltdf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( esmarts_elated_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_action( 'widgets_init', 'esmarts_elated_register_header_minimal_full_screen_menu_widgets' );
	}
}