<?php

if ( ! function_exists( 'esmarts_elated_map_general_meta' ) ) {
	function esmarts_elated_map_general_meta() {
		
		$general_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'esmarts_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'General', 'esmarts' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'esmarts' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'esmarts' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'esmarts' ),
				'parent'        => $general_meta_box
			)
		);
		
		$eltdf_content_padding_group = esmarts_elated_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'esmarts' ),
				'description' => esc_html__( 'Define styles for Content area', 'esmarts' ),
				'parent'      => $general_meta_box
			)
		);
		
			$eltdf_content_padding_row = esmarts_elated_add_admin_row(
				array(
					'name'   => 'eltdf_content_padding_row',
					'next'   => true,
					'parent' => $eltdf_content_padding_group
				)
			);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'   => 'eltdf_page_content_top_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Top Padding', 'esmarts' ),
						'parent' => $eltdf_content_padding_row,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'    => 'eltdf_page_content_top_padding_mobile',
						'type'    => 'selectsimple',
						'label'   => esc_html__( 'Set this top padding for mobile header', 'esmarts' ),
						'parent'  => $eltdf_content_padding_row,
						'options' => esmarts_elated_get_yes_no_select_array( false )
					)
				);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'esmarts' ),
				'description' => esc_html__( 'Choose background color for page content', 'esmarts' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'    => 'eltdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'esmarts' ),
				'parent'  => $general_meta_box,
				'options' => esmarts_elated_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_boxed_container_meta',
						'no'  => '#eltdf_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_boxed_container_meta'
					)
				)
			)
		);
		
			$boxed_container_meta = esmarts_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'hidden_property' => 'eltdf_boxed_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'esmarts' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'esmarts' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'esmarts' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'esmarts' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'esmarts' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'esmarts' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'esmarts' ),
						'description'   => esc_html__( 'Choose background image attachment', 'esmarts' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'esmarts' ),
							'fixed'  => esc_html__( 'Fixed', 'esmarts' ),
							'scroll' => esc_html__( 'Scroll', 'esmarts' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'esmarts' ),
				'parent'        => $general_meta_box,
				'options'       => esmarts_elated_get_yes_no_select_array(),
				'args'    => array(
					'dependence'    => true,
					'hide'          => array(
						''    => '#eltdf_eltdf_paspartu_container_meta',
						'no'  => '#eltdf_eltdf_paspartu_container_meta',
						'yes' => ''
					),
					'show'          => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_eltdf_paspartu_container_meta'
					)
				)
			)
		);
		
			$paspartu_container_meta = esmarts_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'eltdf_paspartu_container_meta',
					'hidden_property' => 'eltdf_paspartu_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'esmarts' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'esmarts' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'esmarts' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'esmarts' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'esmarts' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'esmarts' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				esmarts_elated_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'eltdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'esmarts' ),
						'options'       => esmarts_elated_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'esmarts' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'esmarts' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'esmarts' ),
					'eltdf-grid-1100' => esc_html__( '1100px', 'esmarts' ),
					'eltdf-grid-1300' => esc_html__( '1300px', 'esmarts' ),
					'eltdf-grid-1200' => esc_html__( '1200px', 'esmarts' ),
					'eltdf-grid-1000' => esc_html__( '1000px', 'esmarts' ),
					'eltdf-grid-800'  => esc_html__( '800px', 'esmarts' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'esmarts' ),
				'parent'        => $general_meta_box,
				'options'       => esmarts_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_page_transitions_container_meta',
						'no'  => '#eltdf_page_transitions_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_page_transitions_container_meta'
					)
				)
			)
		);
		
			$page_transitions_container_meta = esmarts_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'hidden_property' => 'eltdf_smooth_page_transitions_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				esmarts_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'esmarts' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'esmarts' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => esmarts_elated_get_yes_no_select_array(),
						'args'        => array(
							'dependence' => true,
							'hide'       => array(
								''    => '#eltdf_page_transition_preloader_container_meta',
								'no'  => '#eltdf_page_transition_preloader_container_meta',
								'yes' => ''
							),
							'show'       => array(
								''    => '',
								'no'  => '',
								'yes' => '#eltdf_page_transition_preloader_container_meta'
							)
						)
					)
				);
				
				$page_transition_preloader_container_meta = esmarts_elated_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'hidden_property' => 'eltdf_page_transition_preloader_meta',
						'hidden_values'   => array(
							'',
							'no'
						)
					)
				);
				
					esmarts_elated_create_meta_box_field(
						array(
							'name'   => 'eltdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'esmarts' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = esmarts_elated_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'esmarts' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'esmarts' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = esmarts_elated_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					esmarts_elated_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'eltdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'esmarts' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'esmarts' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'esmarts' ),
								'pulse'                 => esc_html__( 'Pulse', 'esmarts' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'esmarts' ),
								'cube'                  => esc_html__( 'Cube', 'esmarts' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'esmarts' ),
								'stripes'               => esc_html__( 'Stripes', 'esmarts' ),
								'wave'                  => esc_html__( 'Wave', 'esmarts' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'esmarts' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'esmarts' ),
								'atom'                  => esc_html__( 'Atom', 'esmarts' ),
								'clock'                 => esc_html__( 'Clock', 'esmarts' ),
								'mitosis'               => esc_html__( 'Mitosis', 'esmarts' ),
								'lines'                 => esc_html__( 'Lines', 'esmarts' ),
								'fussion'               => esc_html__( 'Fussion', 'esmarts' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'esmarts' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'esmarts' ),
                                'pencil'                => esc_html__( 'Pencil', 'esmarts' )
							)
						)
					);
					
					esmarts_elated_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'eltdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'esmarts' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					esmarts_elated_create_meta_box_field(
						array(
							'name'        => 'eltdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'esmarts' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'esmarts' ),
							'options'     => esmarts_elated_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'esmarts' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'esmarts' ),
				'parent'      => $general_meta_box,
				'options'     => esmarts_elated_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_general_meta', 10 );
}