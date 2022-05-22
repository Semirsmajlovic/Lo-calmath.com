<?php

if ( ! function_exists( 'esmarts_elated_map_post_quote_meta' ) ) {
	function esmarts_elated_map_post_quote_meta() {
		$quote_post_format_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'esmarts' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'esmarts' ),
				'description' => esc_html__( 'Enter Quote text', 'esmarts' ),
				'parent'      => $quote_post_format_meta_box,
			
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'esmarts' ),
				'description' => esc_html__( 'Enter Quote author', 'esmarts' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_post_quote_meta', 25 );
}