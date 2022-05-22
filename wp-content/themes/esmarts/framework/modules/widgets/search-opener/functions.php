<?php

if ( ! function_exists( 'esmarts_elated_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function esmarts_elated_register_search_opener_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_search_opener_widget' );
}