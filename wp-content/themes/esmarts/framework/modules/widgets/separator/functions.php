<?php

if ( ! function_exists( 'esmarts_elated_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function esmarts_elated_register_separator_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_separator_widget' );
}