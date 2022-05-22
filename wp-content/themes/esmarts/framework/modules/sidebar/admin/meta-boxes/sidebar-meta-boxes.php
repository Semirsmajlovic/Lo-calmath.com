<?php

if ( ! function_exists( 'esmarts_elated_map_sidebar_meta' ) ) {
	function esmarts_elated_map_sidebar_meta() {
		$eltdf_sidebar_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'esmarts_elated_filter_set_scope_for_meta_boxes', array( 'page' ) ),
				'title' => esc_html__( 'Sidebar', 'esmarts' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Layout', 'esmarts' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'esmarts' ),
				'parent'      => $eltdf_sidebar_meta_box,
				'options'     => array(
					''                 => esc_html__( 'Default', 'esmarts' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'esmarts' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'esmarts' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'esmarts' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'esmarts' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'esmarts' )
				)
			)
		);
		
		$eltdf_custom_sidebars = esmarts_elated_get_custom_sidebars();
		if ( count( $eltdf_custom_sidebars ) > 0 ) {
			esmarts_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'esmarts' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'esmarts' ),
					'parent'      => $eltdf_sidebar_meta_box,
					'options'     => $eltdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_sidebar_meta', 31 );
}