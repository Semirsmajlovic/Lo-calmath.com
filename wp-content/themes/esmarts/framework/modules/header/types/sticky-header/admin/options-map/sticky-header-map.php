<?php

if ( ! function_exists( 'esmarts_elated_get_hide_dep_for_sticky_header_options' ) ) {
	function esmarts_elated_get_hide_dep_for_sticky_header_options() {
		$hide_dep_options = apply_filters( 'esmarts_elated_filter_sticky_header_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'esmarts_elated_get_additional_hide_dep_for_sticky_header_options' ) ) {
	function esmarts_elated_get_additional_hide_dep_for_sticky_header_options() {
		$additional_hide_dep_options = apply_filters( 'esmarts_elated_filter_sticky_header_additional_hide_global_option', $additional_hide_dep_options = array() );
		
		return $additional_hide_dep_options;
	}
}

if ( ! function_exists( 'esmarts_elated_header_sticky_options_map' ) ) {
	function esmarts_elated_header_sticky_options_map() {
		$hide_dep_options            = esmarts_elated_get_hide_dep_for_sticky_header_options();
		$additional_hide_dep_options = esmarts_elated_get_additional_hide_dep_for_sticky_header_options();
			
		$panel_sticky_header = esmarts_elated_add_admin_panel(
			array(
				'title'           => esc_html__( 'Sticky Header', 'esmarts' ),
				'name'            => 'panel_sticky_header',
				'page'            => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options,
				'args'            => array(
					'use_both_dep'               => true,
					'additional_hidden_property' => 'header_behaviour',
					'additional_hidden_values'   => $additional_hide_dep_options
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'scroll_amount_for_sticky',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky', 'esmarts' ),
				'description' => esc_html__( 'Enter scroll amount for Sticky Menu to appear (deafult is header height). This value can be overriden on a page level basis', 'esmarts' ),
				'parent'      => $panel_sticky_header,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'sticky_header_in_grid',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Sticky Header in Grid', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will put sticky header in grid', 'esmarts' ),
				'parent'        => $panel_sticky_header,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'sticky_header_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'esmarts' ),
				'description' => esc_html__( 'Choose a background color for header area', 'esmarts' ),
				'parent'      => $panel_sticky_header
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'sticky_header_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Background Transparency', 'esmarts' ),
				'description' => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'esmarts' ),
				'parent'      => $panel_sticky_header,
				'args'        => array(
					'col_width' => 1
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'sticky_header_border_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'esmarts' ),
				'description' => esc_html__( 'Set border bottom color for header area', 'esmarts' ),
				'parent'      => $panel_sticky_header
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'sticky_header_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Sticky Header Height', 'esmarts' ),
				'description' => esc_html__( 'Enter height for sticky header (default is 60px)', 'esmarts' ),
				'parent'      => $panel_sticky_header,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$group_sticky_header_menu = esmarts_elated_add_admin_group(
			array(
				'title'       => esc_html__( 'Sticky Header Menu', 'esmarts' ),
				'name'        => 'group_sticky_header_menu',
				'parent'      => $panel_sticky_header,
				'description' => esc_html__( 'Define styles for sticky menu items', 'esmarts' )
			)
		);
		
		$row1_sticky_header_menu = esmarts_elated_add_admin_row(
			array(
				'name'   => 'row1',
				'parent' => $group_sticky_header_menu
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'sticky_color',
				'type'        => 'colorsimple',
				'label'       => esc_html__( 'Text Color', 'esmarts' ),
				'description' => '',
				'parent'      => $row1_sticky_header_menu
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'sticky_hovercolor',
				'type'        => 'colorsimple',
				'label'       => esc_html__( esc_html__( 'Hover/Active Color', 'esmarts' ), 'esmarts' ),
				'description' => '',
				'parent'      => $row1_sticky_header_menu
			)
		);
		
		$row2_sticky_header_menu = esmarts_elated_add_admin_row(
			array(
				'name'   => 'row2',
				'parent' => $group_sticky_header_menu
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'sticky_google_fonts',
				'type'          => 'fontsimple',
				'label'         => esc_html__( 'Font Family', 'esmarts' ),
				'default_value' => '-1',
				'parent'        => $row2_sticky_header_menu,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_font_size',
				'label'         => esc_html__( 'Font Size', 'esmarts' ),
				'default_value' => '',
				'parent'        => $row2_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_line_height',
				'label'         => esc_html__( 'Line Height', 'esmarts' ),
				'default_value' => '',
				'parent'        => $row2_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_text_transform',
				'label'         => esc_html__( 'Text Transform', 'esmarts' ),
				'default_value' => '',
				'options'       => esmarts_elated_get_text_transform_array(),
				'parent'        => $row2_sticky_header_menu
			)
		);
		
		$row3_sticky_header_menu = esmarts_elated_add_admin_row(
			array(
				'name'   => 'row3',
				'parent' => $group_sticky_header_menu
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'esmarts' ),
				'options'       => esmarts_elated_get_font_style_array(),
				'parent'        => $row3_sticky_header_menu
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'esmarts' ),
				'options'       => esmarts_elated_get_font_weight_array(),
				'parent'        => $row3_sticky_header_menu
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'esmarts' ),
				'default_value' => '',
				'parent'        => $row3_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'esmarts_elated_action_header_sticky_options_map', 'esmarts_elated_header_sticky_options_map', 10, 1 );
}