<?php

if ( ! function_exists( 'esmarts_elated_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function esmarts_elated_general_options_map() {
		
		esmarts_elated_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'esmarts' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = esmarts_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'esmarts' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'esmarts' ),
				'parent'        => $panel_design_style
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'esmarts' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_additional_google_fonts_container"
				)
			)
		);
		
		$additional_google_fonts_container = esmarts_elated_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'esmarts' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'esmarts' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'esmarts' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'esmarts' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'esmarts' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'esmarts' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'esmarts' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'esmarts' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'esmarts' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'esmarts' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'esmarts' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'esmarts' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'esmarts' ),
					'100i' => esc_html__( '100 Thin Italic', 'esmarts' ),
					'200'  => esc_html__( '200 Extra-Light', 'esmarts' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'esmarts' ),
					'300'  => esc_html__( '300 Light', 'esmarts' ),
					'300i' => esc_html__( '300 Light Italic', 'esmarts' ),
					'400'  => esc_html__( '400 Regular', 'esmarts' ),
					'400i' => esc_html__( '400 Regular Italic', 'esmarts' ),
					'500'  => esc_html__( '500 Medium', 'esmarts' ),
					'500i' => esc_html__( '500 Medium Italic', 'esmarts' ),
					'600'  => esc_html__( '600 Semi-Bold', 'esmarts' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'esmarts' ),
					'700'  => esc_html__( '700 Bold', 'esmarts' ),
					'700i' => esc_html__( '700 Bold Italic', 'esmarts' ),
					'800'  => esc_html__( '800 Extra-Bold', 'esmarts' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'esmarts' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'esmarts' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'esmarts' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'esmarts' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'esmarts' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'esmarts' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'esmarts' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'esmarts' ),
					'greek'        => esc_html__( 'Greek', 'esmarts' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'esmarts' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'esmarts' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'esmarts' ),
				'parent'      => $panel_design_style
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'esmarts' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'esmarts' ),
				'parent'      => $panel_design_style
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'esmarts' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'esmarts' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'esmarts' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_boxed_container"
				)
			)
		);
		
			$boxed_container = esmarts_elated_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'hidden_property' => 'boxed',
					'hidden_value'    => 'no'
				)
			);
		
				esmarts_elated_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'esmarts' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'esmarts' ),
						'parent'      => $boxed_container
					)
				);
				
				esmarts_elated_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'esmarts' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'esmarts' ),
						'parent'      => $boxed_container
					)
				);
				
				esmarts_elated_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'esmarts' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'esmarts' ),
						'parent'      => $boxed_container
					)
				);
				
				esmarts_elated_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'esmarts' ),
						'description'   => esc_html__( 'Choose background image attachment', 'esmarts' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'esmarts' ),
							'fixed'  => esc_html__( 'Fixed', 'esmarts' ),
							'scroll' => esc_html__( 'Scroll', 'esmarts' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'esmarts' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_paspartu_container"
				)
			)
		);
		
			$paspartu_container = esmarts_elated_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'hidden_property' => 'paspartu',
					'hidden_value'    => 'no'
				)
			);
		
				esmarts_elated_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'esmarts' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'esmarts' ),
						'parent'      => $paspartu_container
					)
				);
				
				esmarts_elated_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'esmarts' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'esmarts' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				esmarts_elated_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'esmarts' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'esmarts' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				esmarts_elated_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'esmarts' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => 'eltdf-grid-1300',
				'label'         => esc_html__( 'Initial Width of Content', 'esmarts' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'esmarts' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'eltdf-grid-1300' => esc_html__( '1300px - default', 'esmarts' ),
					'eltdf-grid-1200' => esc_html__( '1200px', 'esmarts' ),
					'eltdf-grid-1100' => esc_html__( '1100px', 'esmarts' ),
					'eltdf-grid-1000' => esc_html__( '1000px', 'esmarts' ),
					'eltdf-grid-800'  => esc_html__( '800px', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'esmarts' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'esmarts' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = esmarts_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'esmarts' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'esmarts' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'esmarts' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_page_transitions_container"
				)
			)
		);
		
			$page_transitions_container = esmarts_elated_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'hidden_property' => 'smooth_page_transitions',
					'hidden_value'    => 'no'
				)
			);
		
				esmarts_elated_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'esmarts' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'esmarts' ),
						'parent'        => $page_transitions_container,
						'args'          => array(
							"dependence"             => true,
							"dependence_hide_on_yes" => "",
							"dependence_show_on_yes" => "#eltdf_page_transition_preloader_container"
						)
					)
				);
				
				$page_transition_preloader_container = esmarts_elated_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'hidden_property' => 'page_transition_preloader',
						'hidden_value'    => 'no'
					)
				);
		
		
					esmarts_elated_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'esmarts' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = esmarts_elated_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'esmarts' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'esmarts' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = esmarts_elated_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					esmarts_elated_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'esmarts' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
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
					
					esmarts_elated_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'esmarts' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					esmarts_elated_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'esmarts' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'esmarts' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'esmarts' ),
				'parent'        => $panel_settings
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'esmarts' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = esmarts_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'esmarts' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'esmarts' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = esmarts_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'esmarts' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'esmarts' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'esmarts_elated_action_options_map', 'esmarts_elated_general_options_map', 1 );
}

if ( ! function_exists( 'esmarts_elated_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function esmarts_elated_page_general_style( $style ) {
		$current_style = '';
		$page_id       = esmarts_elated_get_page_id();
		$class_prefix  = esmarts_elated_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = esmarts_elated_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = esmarts_elated_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = esmarts_elated_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = esmarts_elated_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.eltdf-boxed .eltdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= esmarts_elated_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_color = esmarts_elated_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = esmarts_elated_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( esmarts_elated_string_ends_with( $paspartu_width, '%' ) || esmarts_elated_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.eltdf-paspartu-enabled .eltdf-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= esmarts_elated_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		$paspartu_responsive_width = esmarts_elated_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( esmarts_elated_string_ends_with( $paspartu_responsive_width, '%' ) || esmarts_elated_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . esmarts_elated_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'esmarts_elated_filter_add_page_custom_style', 'esmarts_elated_page_general_style' );
}