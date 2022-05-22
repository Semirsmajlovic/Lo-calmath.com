<?php

if ( ! function_exists( 'esmarts_elated_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function esmarts_elated_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'esmarts_elated_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'esmarts_elated_header_standard_meta_map' ) ) {
	function esmarts_elated_header_standard_meta_map( $parent ) {
		$hide_dep_options = esmarts_elated_get_hide_dep_for_header_standard_meta_boxes();
		
		esmarts_elated_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'eltdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'esmarts' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'esmarts' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'esmarts' ),
					'left'   => esc_html__( 'Left', 'esmarts' ),
					'right'  => esc_html__( 'Right', 'esmarts' ),
					'center' => esc_html__( 'Center', 'esmarts' )
				),
				'hidden_property' => 'eltdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'esmarts_elated_action_additional_header_area_meta_boxes_map', 'esmarts_elated_header_standard_meta_map' );
}