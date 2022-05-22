<?php

if ( ! function_exists( 'esmarts_elated_register_raw_html_widget' ) ) {
	/**
	 * Function that register raw html widget
	 */
	function esmarts_elated_register_raw_html_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassRawHTMLWidget';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_raw_html_widget' );
}