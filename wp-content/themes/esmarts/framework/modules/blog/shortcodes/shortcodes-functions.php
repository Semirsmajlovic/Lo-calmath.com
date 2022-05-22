<?php

if ( ! function_exists( 'esmarts_elated_include_blog_shortcodes' ) ) {
	function esmarts_elated_include_blog_shortcodes() {
		include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-list/blog-list.php';
	}
	
	if ( esmarts_elated_core_plugin_installed() ) {
		add_action( 'eltdf_core_action_include_shortcodes_file', 'esmarts_elated_include_blog_shortcodes' );
	}
}

if ( ! function_exists( 'esmarts_elated_add_blog_shortcodes' ) ) {
	function esmarts_elated_add_blog_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'ElatedCore\CPT\Shortcodes\BlogList\BlogList'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( esmarts_elated_core_plugin_installed() ) {
		add_filter( 'eltdf_core_filter_add_vc_shortcode', 'esmarts_elated_add_blog_shortcodes' );
	}
}

if ( ! function_exists( 'esmarts_elated_set_blog_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function esmarts_elated_set_blog_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( esmarts_elated_core_plugin_installed() ) {
		add_filter( 'eltdf_core_filter_add_vc_shortcodes_custom_icon_class', 'esmarts_elated_set_blog_list_icon_class_name_for_vc_shortcodes' );
	}
}