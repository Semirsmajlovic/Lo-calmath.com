<?php

if ( ! function_exists( 'esmarts_elated_get_hide_dep_for_header_standard_options' ) ) {
	function esmarts_elated_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'esmarts_elated_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'esmarts_elated_header_standard_map' ) ) {
	function esmarts_elated_header_standard_map( $parent ) {
		$hide_dep_options = esmarts_elated_get_hide_dep_for_header_standard_options();
		
		esmarts_elated_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'esmarts' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'esmarts' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'esmarts' ),
					'left'   => esc_html__( 'Left', 'esmarts' ),
					'center' => esc_html__( 'Center', 'esmarts' )
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'esmarts_elated_action_additional_header_menu_area_options_map', 'esmarts_elated_header_standard_map' );
}