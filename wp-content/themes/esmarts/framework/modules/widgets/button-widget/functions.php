<?php

if ( ! function_exists( 'esmarts_elated_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function esmarts_elated_register_button_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_button_widget' );
}