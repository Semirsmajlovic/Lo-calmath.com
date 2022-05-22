<?php

if ( ! function_exists( 'esmarts_elated_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function esmarts_elated_register_blog_list_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_blog_list_widget' );
}