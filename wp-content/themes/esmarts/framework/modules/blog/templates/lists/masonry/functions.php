<?php

if ( ! function_exists( 'esmarts_elated_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function esmarts_elated_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'esmarts' );
		
		return $templates;
	}
	
	add_filter( 'esmarts_elated_filter_register_blog_templates', 'esmarts_elated_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'esmarts_elated_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function esmarts_elated_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'esmarts' );
		
		return $options;
	}
	
	add_filter( 'esmarts_elated_filter_blog_list_type_global_option', 'esmarts_elated_set_blog_masonry_type_global_option' );
}