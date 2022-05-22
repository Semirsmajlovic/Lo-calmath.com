<?php

if ( ! function_exists( 'esmarts_elated_sidearea_options_map' ) ) {
	function esmarts_elated_sidearea_options_map() {
		
		esmarts_elated_add_admin_page(
			array(
				'slug'  => '_side_area_page',
				'title' => esc_html__( 'Side Area', 'esmarts' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$side_area_panel = esmarts_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Side Area', 'esmarts' ),
				'name'  => 'side_area',
				'page'  => '_side_area_page'
			)
		);
		
		$side_area_icon_style_group = esmarts_elated_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'side_area_icon_style_group',
				'title'       => esc_html__( 'Side Area Icon Style', 'esmarts' ),
				'description' => esc_html__( 'Define styles for Side Area icon', 'esmarts' )
			)
		);
		
		$side_area_icon_style_row1 = esmarts_elated_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row1'
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_color',
				'label'  => esc_html__( 'Color', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'esmarts' )
			)
		);
		
		$side_area_icon_style_row2 = esmarts_elated_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row2',
				'next'   => true
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_color',
				'label'  => esc_html__( 'Close Icon Color', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_hover_color',
				'label'  => esc_html__( 'Close Icon Hover Color', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'text',
				'name'          => 'side_area_width',
				'default_value' => '',
				'label'         => esc_html__( 'Side Area Width', 'esmarts' ),
				'description'   => esc_html__( 'Enter a width for Side Area', 'esmarts' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'color',
				'name'        => 'side_area_background_color',
				'label'       => esc_html__( 'Background Color', 'esmarts' ),
				'description' => esc_html__( 'Choose a background color for Side Area', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'image',
				'name'        => 'side_area_background_image',
				'label'       => esc_html__( 'Background Image', 'esmarts' ),
				'description' => esc_html__( 'Choose a background image for Side Area', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'text',
				'name'        => 'side_area_padding',
				'label'       => esc_html__( 'Padding', 'esmarts' ),
				'description' => esc_html__( 'Define padding for Side Area in format top right bottom left', 'esmarts' ),
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'side_area_aligment',
				'default_value' => '',
				'label'         => esc_html__( 'Text Alignment', 'esmarts' ),
				'description'   => esc_html__( 'Choose text alignment for side area', 'esmarts' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'esmarts' ),
					'left'   => esc_html__( 'Left', 'esmarts' ),
					'center' => esc_html__( 'Center', 'esmarts' ),
					'right'  => esc_html__( 'Right', 'esmarts' )
				)
			)
		);
	}
	
	add_action( 'esmarts_elated_action_options_map', 'esmarts_elated_sidearea_options_map', 15 );
}