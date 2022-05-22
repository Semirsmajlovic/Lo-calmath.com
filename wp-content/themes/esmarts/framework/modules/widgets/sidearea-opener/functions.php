<?php

if ( ! function_exists( 'esmarts_elated_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function esmarts_elated_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_sidearea_opener_widget' );
}