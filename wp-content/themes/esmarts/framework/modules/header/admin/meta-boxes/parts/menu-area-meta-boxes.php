<?php

if ( ! function_exists( 'esmarts_elated_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function esmarts_elated_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'esmarts_elated_filter_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'esmarts_elated_header_menu_area_meta_options_map' ) ) {
	function esmarts_elated_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = esmarts_elated_get_hide_dep_for_header_menu_area_meta_boxes();
		
		$menu_area_container = esmarts_elated_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'eltdf_header_type_meta',
				'hidden_values'   => $hide_dep_options,
				'args'            => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		esmarts_elated_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'esmarts' )
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_disable_header_widget_menu_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Menu Area Widget', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the menu area', 'esmarts' ),
				'parent'        => $menu_area_container
			)
		);
		
		$esmarts_custom_sidebars = esmarts_elated_get_custom_sidebars();
		if ( count( $esmarts_custom_sidebars ) > 0 ) {
			esmarts_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Menu Area', 'esmarts' ),
					'description' => esc_html__( 'Choose custom widget area to display in header menu area"', 'esmarts' ),
					'parent'      => $menu_area_container,
					'options'     => $esmarts_custom_sidebars
				)
			);
		}
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'esmarts' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'esmarts' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => esmarts_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_menu_area_in_grid_container',
						'no'  => '#eltdf_menu_area_in_grid_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_menu_area_in_grid_container'
					)
				)
			)
		);
		
		$menu_area_in_grid_container = esmarts_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'hidden_property' => 'eltdf_menu_area_in_grid_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'esmarts' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'esmarts' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'esmarts' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'esmarts' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'esmarts' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'esmarts' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => esmarts_elated_get_yes_no_select_array()
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'esmarts' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'esmarts' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => esmarts_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_menu_area_in_grid_border_container',
						'no'  => '#eltdf_menu_area_in_grid_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_menu_area_in_grid_border_container'
					)
				)
			)
		);
		
		$menu_area_in_grid_border_container = esmarts_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'hidden_property' => 'eltdf_menu_area_in_grid_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'esmarts' ),
				'description' => esc_html__( 'Set border color for grid area', 'esmarts' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'esmarts' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'esmarts' ),
				'parent'      => $menu_area_container
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'esmarts' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'esmarts' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'esmarts' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'esmarts' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => esmarts_elated_get_yes_no_select_array()
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'esmarts' ),
				'description'   => esc_html__( 'Set border on menu area', 'esmarts' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => esmarts_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_menu_area_border_bottom_color_container',
						'no'  => '#eltdf_menu_area_border_bottom_color_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_menu_area_border_bottom_color_container'
					)
				)
			)
		);
		
		$menu_area_border_bottom_color_container = esmarts_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'hidden_property' => 'eltdf_menu_area_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'esmarts' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'esmarts' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'eltdf_dropdown_top_position_meta',
				'label'         => esc_html__( 'Dropdown Position', 'esmarts' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'esmarts' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);
		
		do_action( 'esmarts_elated_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'esmarts_elated_action_header_menu_area_meta_boxes_map', 'esmarts_elated_header_menu_area_meta_options_map', 10, 1 );
}