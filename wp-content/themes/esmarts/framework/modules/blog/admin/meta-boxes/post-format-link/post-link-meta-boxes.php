<?php

if ( ! function_exists( 'esmarts_elated_map_post_link_meta' ) ) {
	function esmarts_elated_map_post_link_meta() {
		$link_post_format_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'esmarts' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'esmarts' ),
				'description' => esc_html__( 'Enter link', 'esmarts' ),
				'parent'      => $link_post_format_meta_box,
			
			)
		);
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_post_link_meta', 24 );
}