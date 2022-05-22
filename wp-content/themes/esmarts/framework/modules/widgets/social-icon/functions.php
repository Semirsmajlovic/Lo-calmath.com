<?php

if ( ! function_exists( 'esmarts_elated_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function esmarts_elated_register_social_icon_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_social_icon_widget' );
}