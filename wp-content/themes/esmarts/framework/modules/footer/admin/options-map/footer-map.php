<?php

if ( ! function_exists( 'esmarts_elated_footer_options_map' ) ) {
	function esmarts_elated_footer_options_map() {
		
		esmarts_elated_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'esmarts' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);
		
		$footer_panel = esmarts_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'esmarts' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'esmarts' ),
				'parent'        => $footer_panel,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'esmarts' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_top_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = esmarts_elated_add_admin_container(
			array(
				'name'            => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '4',
				'label'         => esc_html__( 'Footer Top Columns', 'esmarts' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'esmarts' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'esmarts' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'esmarts' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'esmarts' ),
					'left'   => esc_html__( 'Left', 'esmarts' ),
					'center' => esc_html__( 'Center', 'esmarts' ),
					'right'  => esc_html__( 'Right', 'esmarts' )
				),
				'parent'        => $show_footer_top_container,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'esmarts' ),
				'description' => esc_html__( 'Set background color for top footer area', 'esmarts' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'esmarts' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_bottom_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_bottom_container = esmarts_elated_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '2',
				'label'         => esc_html__( 'Footer Bottom Columns', 'esmarts' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'esmarts' ),
				'options'       => array(
					'1' => '1',
					'2' => '2'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'esmarts' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'esmarts' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}
	
	add_action( 'esmarts_elated_action_options_map', 'esmarts_elated_footer_options_map', 11 );
}