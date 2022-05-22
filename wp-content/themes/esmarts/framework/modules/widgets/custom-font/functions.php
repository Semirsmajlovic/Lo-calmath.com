<?php

if ( ! function_exists( 'esmarts_elated_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function esmarts_elated_register_custom_font_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_custom_font_widget' );
}