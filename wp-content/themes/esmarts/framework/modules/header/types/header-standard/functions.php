<?php

if ( ! function_exists( 'esmarts_elated_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function esmarts_elated_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'eSmartsElatedNamespace\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'esmarts_elated_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function esmarts_elated_init_register_header_standard_type() {
		add_filter( 'esmarts_elated_filter_register_header_type_class', 'esmarts_elated_register_header_standard_type' );
	}
	
	add_action( 'esmarts_elated_action_before_header_function_init', 'esmarts_elated_init_register_header_standard_type' );
}