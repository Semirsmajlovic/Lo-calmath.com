<?php

if ( ! function_exists( 'esmarts_elated_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function esmarts_elated_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'esmarts' );
		
		return $type;
	}
	
	add_filter( 'esmarts_elated_filter_title_type_global_option', 'esmarts_elated_set_title_centered_type_for_options' );
	add_filter( 'esmarts_elated_filter_title_type_meta_boxes', 'esmarts_elated_set_title_centered_type_for_options' );
}