<?php

if ( ! function_exists( 'esmarts_elated_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function esmarts_elated_register_icon_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_icon_widget' );
}