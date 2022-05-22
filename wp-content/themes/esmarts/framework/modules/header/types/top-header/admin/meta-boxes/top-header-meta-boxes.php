<?php

if ( ! function_exists( 'esmarts_elated_get_hide_dep_for_top_header_area_meta_boxes' ) ) {
	function esmarts_elated_get_hide_dep_for_top_header_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'esmarts_elated_filter_top_header_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'esmarts_elated_header_top_area_meta_options_map' ) ) {
	function esmarts_elated_header_top_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = esmarts_elated_get_hide_dep_for_top_header_area_meta_boxes();
		
		$top_header_container = esmarts_elated_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'eltdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		esmarts_elated_add_admin_section_title(
			array(
				'parent' => $top_header_container,
				'name'   => 'top_area_style',
				'title'  => esc_html__( 'Top Area', 'esmarts' )
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_top_bar_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Top Bar', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show header top bar area', 'esmarts' ),
				'parent'        => $top_header_container,
				'options'       => esmarts_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_top_bar_container_no_style',
						'no'  => '#eltdf_top_bar_container_no_style',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_top_bar_container_no_style'
					)
				)
			)
		);
		
		$top_bar_container = esmarts_elated_add_admin_container_no_style(
			array(
				'name'            => 'top_bar_container_no_style',
				'parent'          => $top_header_container,
				'hidden_property' => 'eltdf_top_bar_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_top_bar_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar In Grid', 'esmarts' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'esmarts' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => esmarts_elated_get_yes_no_select_array()
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'   => 'eltdf_top_bar_background_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Top Bar Background Color', 'esmarts' ),
				'parent' => $top_bar_container
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_top_bar_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Background Color Transparency', 'esmarts' ),
				'description' => esc_html__( 'Set top bar background color transparenct. Value should be between 0 and 1', 'esmarts' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_top_bar_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Border', 'esmarts' ),
				'description'   => esc_html__( 'Set border on top bar', 'esmarts' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => esmarts_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_top_bar_border_container',
						'no'  => '#eltdf_top_bar_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_top_bar_border_container'
					)
				)
			)
		);
		
		$top_bar_border_container = esmarts_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'hidden_property' => 'eltdf_top_bar_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_top_bar_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'esmarts' ),
				'description' => esc_html__( 'Choose color for top bar border', 'esmarts' ),
				'parent'      => $top_bar_border_container
			)
		);
	}
	
	add_action( 'esmarts_elated_action_additional_header_area_meta_boxes_map', 'esmarts_elated_header_top_area_meta_options_map', 10, 1 );
}