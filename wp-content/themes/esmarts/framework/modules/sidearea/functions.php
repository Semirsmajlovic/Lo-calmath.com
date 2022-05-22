<?php
if ( ! function_exists( 'esmarts_elated_register_side_area_sidebar' ) ) {
	/**
	 * Register side area sidebar
	 */
	function esmarts_elated_register_side_area_sidebar() {
		register_sidebar(
			array(
				'id'            => 'sidearea',
				'name'          => esc_html__( 'Side Area', 'esmarts' ),
				'description'   => esc_html__( 'Side Area', 'esmarts' ),
				'before_widget' => '<div id="%1$s" class="widget eltdf-sidearea %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="eltdf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	add_action( 'widgets_init', 'esmarts_elated_register_side_area_sidebar' );
}

if ( ! function_exists( 'esmarts_elated_side_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different side menu styles
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function esmarts_elated_side_menu_body_class( $classes ) {
		
		if ( is_active_widget( false, false, 'eltdf_side_area_opener' ) ) {
			
			$classes[] = 'eltdf-side-menu-slide-from-right';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'esmarts_elated_side_menu_body_class' );
}

if ( ! function_exists( 'esmarts_elated_get_side_area' ) ) {
	/**
	 * Loads side area HTML
	 */
	function esmarts_elated_get_side_area() {
		
		if ( is_active_widget( false, false, 'eltdf_side_area_opener' ) ) {
			
			esmarts_elated_get_module_template_part( 'templates/sidearea', 'sidearea' );
		}
	}
	
	add_action( 'esmarts_elated_action_after_body_tag', 'esmarts_elated_get_side_area', 10 );
}