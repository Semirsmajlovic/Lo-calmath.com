<?php

if ( ! function_exists( 'esmarts_elated_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function esmarts_elated_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'esmarts' ),
				'description'   => esc_html__( 'Default Sidebar', 'esmarts' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="eltdf-widget-title">',
				'after_title'   => '</h4>'
			)
		);
	}
	
	add_action( 'widgets_init', 'esmarts_elated_register_sidebars', 1 );
}

if ( ! function_exists( 'esmarts_elated_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates eSmartsElatedClassSidebar object
	 */
	function esmarts_elated_add_support_custom_sidebar() {
		add_theme_support( 'eSmartsElatedClassSidebar' );
		
		if ( get_theme_support( 'eSmartsElatedClassSidebar' ) ) {
			new eSmartsElatedClassSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'esmarts_elated_add_support_custom_sidebar' );
}