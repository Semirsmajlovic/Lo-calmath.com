<?php

if ( ! function_exists( 'esmarts_elated_sidebar_options_map' ) ) {
	function esmarts_elated_sidebar_options_map() {
		
		esmarts_elated_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'esmarts' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = esmarts_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'esmarts' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		esmarts_elated_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'esmarts' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'esmarts' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
			'options'       => array(
				'no-sidebar'       => esc_html__( 'No Sidebar', 'esmarts' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'esmarts' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'esmarts' ),
				'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'esmarts' ),
				'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'esmarts' )
			)
		) );
		
		$esmarts_custom_sidebars = esmarts_elated_get_custom_sidebars();
		if ( count( $esmarts_custom_sidebars ) > 0 ) {
			esmarts_elated_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'esmarts' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'esmarts' ),
				'parent'      => $sidebar_panel,
				'options'     => $esmarts_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'esmarts_elated_action_options_map', 'esmarts_elated_sidebar_options_map', 9 );
}