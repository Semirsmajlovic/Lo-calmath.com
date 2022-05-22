<?php

if ( ! function_exists( 'esmarts_elated_get_title_types_meta_boxes' ) ) {
	function esmarts_elated_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'esmarts_elated_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'esmarts' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'esmarts_elated_map_title_meta' ) ) {
	function esmarts_elated_map_title_meta() {
		$title_type_meta_boxes = esmarts_elated_get_title_types_meta_boxes();
		
		$title_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'esmarts_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Title', 'esmarts' ),
				'name'  => 'title_meta'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'esmarts' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'esmarts' ),
				'parent'        => $title_meta_box,
				'options'       => esmarts_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '',
						'no'  => '#eltdf_eltdf_show_title_area_meta_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '#eltdf_eltdf_show_title_area_meta_container',
						'no'  => '',
						'yes' => '#eltdf_eltdf_show_title_area_meta_container'
					)
				)
			)
		);
		
			$show_title_area_meta_container = esmarts_elated_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'eltdf_show_title_area_meta_container',
					'hidden_property' => 'eltdf_show_title_area_meta',
					'hidden_value'    => 'no'
				)
			);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'esmarts' ),
						'description'   => esc_html__( 'Choose title type', 'esmarts' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'esmarts' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'esmarts' ),
						'options'       => esmarts_elated_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'esmarts' ),
						'description' => esc_html__( 'Set a height for Title Area', 'esmarts' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'esmarts' ),
						'description' => esc_html__( 'Choose a background color for title area', 'esmarts' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'esmarts' ),
						'description' => esc_html__( 'Choose an Image for title area', 'esmarts' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'esmarts' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'esmarts' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'esmarts' ),
							'hide'                => esc_html__( 'Hide Image', 'esmarts' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'esmarts' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'esmarts' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'esmarts' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'esmarts' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'esmarts' )
						)
					)
				);
		
				esmarts_elated_add_admin_field(
					array(
						'name'          => 'eltdf_title_area_disable_parallax_image_responsive_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Disable Parallax Image Responsive', 'esmarts' ),
						'options'       => esmarts_elated_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'esmarts' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'esmarts' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'esmarts' ),
							'header_bottom' => esc_html__( 'From Bottom of Header', 'esmarts' ),
							'window_top'    => esc_html__( 'From Window Top', 'esmarts' )
						)
					)
				);
		
				esmarts_elated_create_meta_box_field(
					array(
						'type'          => 'text',
						'name'          => 'eltdf_title_area_custom_title_text_meta',
						'label'         => esc_html__( 'Custom Title Text', 'esmarts' ),
						'description'   => esc_html__( 'Enter your custom title text', 'esmarts' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'esmarts' ),
						'options'       => esmarts_elated_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'esmarts' ),
						'description' => esc_html__( 'Choose a color for title text', 'esmarts' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'esmarts' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'esmarts' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'esmarts' ),
						'options'       => esmarts_elated_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'esmarts' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'esmarts' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'esmarts_elated_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_title_meta', 60 );
}