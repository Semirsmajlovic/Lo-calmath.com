<?php

if ( ! function_exists( 'esmarts_elated_set_header_standard_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function esmarts_elated_set_header_standard_type_global_option( $header_types ) {
		$header_types['header-standard'] = array(
			'image' => ELATED_FRAMEWORK_HEADER_TYPES_ROOT . '/header-standard/assets/img/header-standard.png',
			'label' => esc_html__( 'Standard', 'esmarts' )
		);
		
		return $header_types;
	}
	
	add_filter( 'esmarts_elated_filter_header_type_global_option', 'esmarts_elated_set_header_standard_type_global_option' );
}

if ( ! function_exists( 'esmarts_elated_set_header_standard_type_as_global_option' ) ) {
	/**
	 * This function set default header type value for global header option map
	 */
	function esmarts_elated_set_header_standard_type_as_global_option( $header_type ) {
		$header_type = 'header-standard';
		
		return $header_type;
	}
	
	add_filter( 'esmarts_elated_filter_default_header_type_global_option', 'esmarts_elated_set_header_standard_type_as_global_option' );
}

if ( ! function_exists( 'esmarts_elated_set_header_standard_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function esmarts_elated_set_header_standard_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-standard'] = esc_html__( 'Standard', 'esmarts' );
		
		return $header_type_options;
	}
	
	add_filter( 'esmarts_elated_filter_header_type_meta_boxes', 'esmarts_elated_set_header_standard_type_meta_boxes_option' );
}

if ( ! function_exists( 'esmarts_elated_set_show_dep_options_for_header_standard' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type global option
	 */
	function esmarts_elated_set_show_dep_options_for_header_standard( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#eltdf_header_behaviour';
		$show_containers[] = '#eltdf_menu_area_container';
		$show_containers[] = '#eltdf_panel_main_menu';
		$show_containers[] = '#eltdf_panel_sticky_header';
		$show_containers[] = '#eltdf_panel_fixed_header';
		$show_containers[] = '#eltdf_set_menu_area_position';

		$show_containers = apply_filters( 'esmarts_elated_filter_show_dep_options_for_header_standard', $show_containers );
		
		$show_dep_options['header-standard'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'esmarts_elated_filter_header_type_show_global_option', 'esmarts_elated_set_show_dep_options_for_header_standard' );
}

if ( ! function_exists( 'esmarts_elated_set_hide_dep_options_for_header_standard' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type global option
	 */
	function esmarts_elated_set_hide_dep_options_for_header_standard( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#eltdf_logo_area_container';
		$hide_containers[] = '#eltdf_panel_fullscreen_menu';
		
		$hide_containers = apply_filters( 'esmarts_elated_filter_hide_dep_options_for_header_standard', $hide_containers );
		
		$hide_dep_options['header-standard'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'esmarts_elated_filter_header_type_hide_global_option', 'esmarts_elated_set_hide_dep_options_for_header_standard' );
}

if ( ! function_exists( 'esmarts_elated_set_show_dep_options_for_header_standard_meta_boxes' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type meta boxes map
	 */
	function esmarts_elated_set_show_dep_options_for_header_standard_meta_boxes( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#eltdf_menu_area_container';
		
		$show_containers = apply_filters( 'esmarts_elated_filter_show_dep_options_for_header_standard_meta_boxes', $show_containers );
		
		$show_dep_options['header-standard'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'esmarts_elated_filter_header_type_show_meta_boxes', 'esmarts_elated_set_show_dep_options_for_header_standard_meta_boxes' );
}

if ( ! function_exists( 'esmarts_elated_set_hide_dep_options_for_header_standard_meta_boxes' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type meta boxes map
	 */
	function esmarts_elated_set_hide_dep_options_for_header_standard_meta_boxes( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#eltdf_logo_area_container';
		
		$hide_containers = apply_filters( 'esmarts_elated_filter_hide_dep_options_for_header_standard_meta_boxes', $hide_containers );
		
		$hide_dep_options['header-standard'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'esmarts_elated_filter_header_type_hide_meta_boxes', 'esmarts_elated_set_hide_dep_options_for_header_standard_meta_boxes' );
}

if ( ! function_exists( 'esmarts_elated_set_hide_dep_options_header_standard' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function esmarts_elated_set_hide_dep_options_header_standard( $hide_dep_options ) {
		$hide_dep_options[] = 'header-standard';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'esmarts_elated_filter_header_logo_area_hide_global_option', 'esmarts_elated_set_hide_dep_options_header_standard' );
	
	// header global panel meta boxes
	add_filter( 'esmarts_elated_filter_header_logo_area_hide_meta_boxes', 'esmarts_elated_set_hide_dep_options_header_standard' );
	
	// header types panel options
	add_filter( 'esmarts_elated_filter_header_centered_hide_global_option', 'esmarts_elated_set_hide_dep_options_header_standard' );
	add_filter( 'esmarts_elated_filter_full_screen_menu_hide_global_option', 'esmarts_elated_set_hide_dep_options_header_standard' );
	add_filter( 'esmarts_elated_filter_header_vertical_hide_global_option', 'esmarts_elated_set_hide_dep_options_header_standard' );
	add_filter( 'esmarts_elated_filter_header_vertical_menu_hide_global_option', 'esmarts_elated_set_hide_dep_options_header_standard' );
	
	// header types panel meta boxes
	add_filter( 'esmarts_elated_filter_header_centered_hide_meta_boxes', 'esmarts_elated_set_hide_dep_options_header_standard' );
	add_filter( 'esmarts_elated_filter_header_vertical_hide_meta_boxes', 'esmarts_elated_set_hide_dep_options_header_standard' );
}

if ( ! function_exists( 'esmarts_elated_set_standard_hide_dep_options_for_header_types' ) ) {
	/**
	 * This function is used to disable this header type specific containers/panels for admin options when another header type is selected
	 */
	function esmarts_elated_set_standard_hide_dep_options_for_header_types( $hide_containers_dep_options ) {
		$hide_containers_dep_options[] = '#eltdf_set_menu_area_position';

		return $hide_containers_dep_options;
	}

	// hide header centered container for global options
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_box', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_divided', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_minimal', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_centered', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_standard_extended', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_tabbed', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_top_menu', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_vertical', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_vertical_closed', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_vertical_compact', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );

	// hide header centered container for meta boxes
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_box_meta_boxes', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_divided_meta_boxes', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_minimal_meta_boxes', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_centered_meta_boxes', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_standard_extended_meta_boxes', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_tabbed_meta_boxes', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_top_menu_meta_boxes', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_vertical_meta_boxes', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_vertical_closed_meta_boxes', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
	add_filter( 'esmarts_elated_filter_hide_dep_options_for_header_vertical_compact_meta_boxes', 'esmarts_elated_set_standard_hide_dep_options_for_header_types' );
}
