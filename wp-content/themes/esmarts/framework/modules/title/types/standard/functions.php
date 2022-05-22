<?php

if ( ! function_exists( 'esmarts_elated_set_title_standard_type_for_options' ) ) {
	/**
	 * This function set standard title type value for title options map and meta boxes
	 */
	function esmarts_elated_set_title_standard_type_for_options( $type ) {
		$type['standard'] = esc_html__( 'Standard', 'esmarts' );
		
		return $type;
	}
	
	add_filter( 'esmarts_elated_filter_title_type_global_option', 'esmarts_elated_set_title_standard_type_for_options' );
	add_filter( 'esmarts_elated_filter_title_type_meta_boxes', 'esmarts_elated_set_title_standard_type_for_options' );
}

if ( ! function_exists( 'esmarts_elated_set_title_standard_type_as_default_options' ) ) {
	/**
	 * This function set default title type value for global title option map
	 */
	function esmarts_elated_set_title_standard_type_as_default_options( $type ) {
		$type = 'standard';
		
		return $type;
	}
	
	add_filter( 'esmarts_elated_filter_default_title_type_global_option', 'esmarts_elated_set_title_standard_type_as_default_options' );
}