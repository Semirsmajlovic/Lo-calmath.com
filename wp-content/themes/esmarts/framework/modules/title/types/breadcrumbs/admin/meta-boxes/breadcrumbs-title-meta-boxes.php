<?php

if ( ! function_exists( 'esmarts_elated_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function esmarts_elated_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'esmarts' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'esmarts' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'esmarts_elated_action_additional_title_area_meta_boxes', 'esmarts_elated_breadcrumbs_title_type_options_meta_boxes' );
}