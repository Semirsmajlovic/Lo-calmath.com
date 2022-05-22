<?php

if ( ! function_exists( 'esmarts_elated_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function esmarts_elated_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_image_gallery_widget' );
}