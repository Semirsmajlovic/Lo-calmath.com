<?php

if ( esmarts_elated_contact_form_7_installed() ) {
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_cf7_widget' );
}

if ( ! function_exists( 'esmarts_elated_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function esmarts_elated_register_cf7_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassContactForm7Widget';
		
		return $widgets;
	}
}