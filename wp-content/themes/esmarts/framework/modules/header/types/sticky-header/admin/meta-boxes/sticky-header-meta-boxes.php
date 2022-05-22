<?php

if ( ! function_exists( 'esmarts_elated_sticky_header_meta_boxes_options_map' ) ) {
	function esmarts_elated_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = esmarts_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'hidden_property' => 'eltdf_header_behaviour_meta',
				'hidden_values'   => array(
					'',
					'no-behavior',
					'fixed-on-scroll',
					'sticky-header-on-scroll-up'
				)
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll amount for sticky header appearance', 'esmarts' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'esmarts' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
	}
	
	add_action( 'esmarts_elated_action_additional_header_area_meta_boxes_map', 'esmarts_elated_sticky_header_meta_boxes_options_map', 10, 1 );
}