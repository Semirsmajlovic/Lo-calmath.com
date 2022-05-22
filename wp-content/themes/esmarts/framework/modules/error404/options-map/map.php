<?php

if ( ! function_exists( 'esmarts_elated_error_404_options_map' ) ) {
	function esmarts_elated_error_404_options_map() {
		
		esmarts_elated_add_admin_page(
			array(
				'slug'  => '__404_error_page',
				'title' => esc_html__( '404 Error Page', 'esmarts' ),
				'icon'  => 'fa fa-exclamation-triangle'
			)
		);
		
		$panel_404_header = esmarts_elated_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_header',
				'title' => esc_html__( 'Header', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => '404_logo_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Logo Image', 'esmarts' ),
				'parent'        => $panel_404_header
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_background_color_header',
				'label'       => esc_html__( 'Background Color', 'esmarts' ),
				'description' => esc_html__( 'Choose a background color for header area', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'text',
				'name'          => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'esmarts' ),
				'description'   => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'esmarts' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'color',
				'name'          => '404_menu_area_border_color_header',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'esmarts' ),
				'description'   => esc_html__( 'Choose a border bottom color for header area', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'select',
				'name'          => '404_header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'esmarts' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'esmarts' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'esmarts' ),
					'light-header' => esc_html__( 'Light', 'esmarts' ),
					'dark-header'  => esc_html__( 'Dark', 'esmarts' )
				)
			)
		);
		
		$panel_404_options = esmarts_elated_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_options',
				'title' => esc_html__( '404 Page Options', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type'   => 'color',
				'name'   => '404_page_background_color',
				'label'  => esc_html__( 'Background Color', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_image',
				'label'       => esc_html__( 'Background Image', 'esmarts' ),
				'description' => esc_html__( 'Choose a background image for 404 page', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'esmarts' ),
				'description' => esc_html__( 'Choose a pattern image for 404 page', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_title_image',
				'label'       => esc_html__( 'Title Image', 'esmarts' ),
				'description' => esc_html__( 'Choose a background image for displaying above 404 page Title', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_title',
				'default_value' => '',
				'label'         => esc_html__( 'Title', 'esmarts' ),
				'description'   => esc_html__( 'Enter title for 404 page. Default label is "404".', 'esmarts' )
			)
		);
		
		$first_level_group = esmarts_elated_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'first_level_group',
				'title'       => esc_html__( 'Title Style', 'esmarts' ),
				'description' => esc_html__( 'Define styles for 404 page title', 'esmarts' )
			)
		);
		
		$first_level_row1 = esmarts_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => '404_title_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'esmarts' ),
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_title_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'esmarts' ),
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'esmarts' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'esmarts' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_row2 = esmarts_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2',
				'next'   => true
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'esmarts' ),
				'options'       => esmarts_elated_get_font_style_array()
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'esmarts' ),
				'options'       => esmarts_elated_get_font_weight_array()
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_title_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'esmarts' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'esmarts' ),
				'options'       => esmarts_elated_get_text_transform_array()
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'text',
				'name'        => '404_back_to_home',
				'label'       => esc_html__( 'Back to Home Button Label', 'esmarts' ),
				'description' => esc_html__( 'Enter label for "Back to home" button', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'select',
				'name'          => '404_button_style',
				'default_value' => 'light-style',
				'label'         => esc_html__( 'Button Skin', 'esmarts' ),
				'description'   => esc_html__( 'Choose a style to make Back to Home button in that predefined style', 'esmarts' ),
				'options'       => array(
					'default-style' => esc_html__( 'Default', 'esmarts' ),
					'light-style'   => esc_html__( 'Light', 'esmarts' )
				)
			)
		);
	}
	
	add_action( 'esmarts_elated_action_options_map', 'esmarts_elated_error_404_options_map', 19 );
}