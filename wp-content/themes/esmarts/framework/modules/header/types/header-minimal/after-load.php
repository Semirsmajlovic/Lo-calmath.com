<?php

if ( ! function_exists( 'esmarts_elated_header_minimal_full_screen_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function esmarts_elated_header_minimal_full_screen_menu_body_class( $classes ) {
		$classes[] = 'eltdf-' . esmarts_elated_options()->getOptionValue( 'fullscreen_menu_animation_style' );
		
		return $classes;
	}
	
	if ( esmarts_elated_check_is_header_type_enabled( 'header-minimal', esmarts_elated_get_page_id() ) ) {
		add_filter( 'body_class', 'esmarts_elated_header_minimal_full_screen_menu_body_class' );
	}
}

if ( ! function_exists( 'esmarts_elated_get_header_minimal_full_screen_menu' ) ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function esmarts_elated_get_header_minimal_full_screen_menu() {
		$parameters = array(
			'fullscreen_menu_in_grid' => esmarts_elated_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ? true : false
		);
		
		esmarts_elated_get_module_template_part( 'templates/full-screen-menu', 'header/types/header-minimal', '', $parameters );
	}
	
	if ( esmarts_elated_check_is_header_type_enabled( 'header-minimal', esmarts_elated_get_page_id() ) ) {
		add_action( 'esmarts_elated_action_after_wrapper_inner', 'esmarts_elated_get_header_minimal_full_screen_menu', 40 );
	}
}

if ( ! function_exists( 'esmarts_elated_header_minimal_mobile_menu_module' ) ) {
    /**
     * Function that edits module for mobile menu
     *
     * @param $module - default module value
     *
     * @return string name of module
     */
    function esmarts_elated_header_minimal_mobile_menu_module( $module ) {
        return 'header/types/header-minimal';
    }

    if ( esmarts_elated_check_is_header_type_enabled( 'header-minimal', esmarts_elated_get_page_id() ) ) {
        add_filter('esmarts_elated_filter_mobile_menu_module', 'esmarts_elated_header_minimal_mobile_menu_module');
    }
}

if ( ! function_exists( 'esmarts_elated_header_minimal_mobile_menu_slug' ) ) {
    /**
     * Function that edits slug for mobile menu
     *
     * @param $slug - default slug value
     *
     * @return string name of slug
     */
    function esmarts_elated_header_minimal_mobile_menu_slug( $slug ) {
        return 'minimal';
    }

    if ( esmarts_elated_check_is_header_type_enabled( 'header-minimal', esmarts_elated_get_page_id() ) ) {
        add_filter('esmarts_elated_filter_mobile_menu_slug', 'esmarts_elated_header_minimal_mobile_menu_slug');
    }
}