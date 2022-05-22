<?php

if(!function_exists('esmarts_elated_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function esmarts_elated_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'eSmartsElatedClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter('esmarts_elated_filter_register_widgets', 'esmarts_elated_register_sticky_sidebar_widget');
}