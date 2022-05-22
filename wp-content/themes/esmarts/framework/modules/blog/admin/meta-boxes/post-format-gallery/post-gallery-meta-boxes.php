<?php

if ( ! function_exists( 'esmarts_elated_map_post_gallery_meta' ) ) {
	
	function esmarts_elated_map_post_gallery_meta() {
		$gallery_post_format_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'esmarts' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		esmarts_elated_add_multiple_images_field(
			array(
				'name'        => 'eltdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'esmarts' ),
				'description' => esc_html__( 'Choose your gallery images', 'esmarts' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_post_gallery_meta', 21 );
}
