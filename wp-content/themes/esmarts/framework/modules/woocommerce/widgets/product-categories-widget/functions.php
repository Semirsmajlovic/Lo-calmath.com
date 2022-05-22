<?php

if(!function_exists('esmarts_elated_register_blog_categories_widget')) {
	/**
	 * Function that register blog list widget
	 */
	function esmarts_elated_register_blog_categories_widget($widgets) {
		$widgets[] = 'eSmartsElatedClassProductCategoriesWidget';
		
		return $widgets;
	}
	
	add_filter('esmarts_elated_filter_register_widgets', 'esmarts_elated_register_blog_categories_widget');
}