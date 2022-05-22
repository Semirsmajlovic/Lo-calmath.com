<?php

if ( ! function_exists( 'esmarts_elated_map_footer_meta' ) ) {
	function esmarts_elated_map_footer_meta() {
		
		$footer_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'esmarts_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Footer', 'esmarts' ),
				'name'  => 'footer_meta'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_disable_footer_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Footer for this Page', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'esmarts' ),
				'parent'        => $footer_meta_box
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_footer_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Footer in Grid', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'esmarts' ),
				'parent'        => $footer_meta_box,
				'options'       => esmarts_elated_get_yes_no_select_array()
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'esmarts' ),
				'parent'        => $footer_meta_box,
				'options'       => esmarts_elated_get_yes_no_select_array()
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'esmarts' ),
				'parent'        => $footer_meta_box,
				'options'       => esmarts_elated_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_footer_meta', 70 );
}