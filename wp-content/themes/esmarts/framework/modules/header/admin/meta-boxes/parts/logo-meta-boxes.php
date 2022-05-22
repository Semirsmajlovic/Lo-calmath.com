<?php

if ( ! function_exists( 'esmarts_elated_logo_meta_box_map' ) ) {
	function esmarts_elated_logo_meta_box_map() {
		
		$logo_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'esmarts_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Logo', 'esmarts' ),
				'name'  => 'logo_meta'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'esmarts' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'esmarts' ),
				'parent'      => $logo_meta_box
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'esmarts' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'esmarts' ),
				'parent'      => $logo_meta_box
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'esmarts' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'esmarts' ),
				'parent'      => $logo_meta_box
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'esmarts' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'esmarts' ),
				'parent'      => $logo_meta_box
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'esmarts' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'esmarts' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_logo_meta_box_map', 47 );
}