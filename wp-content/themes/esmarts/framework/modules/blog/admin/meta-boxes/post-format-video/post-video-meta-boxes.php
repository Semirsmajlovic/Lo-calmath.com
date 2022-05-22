<?php

if ( ! function_exists( 'esmarts_elated_map_post_video_meta' ) ) {
	function esmarts_elated_map_post_video_meta() {
		$video_post_format_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'esmarts' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'esmarts' ),
				'description'   => esc_html__( 'Choose video type', 'esmarts' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'esmarts' ),
					'self'            => esc_html__( 'Self Hosted', 'esmarts' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltdf_eltdf_video_self_hosted_container',
						'self'            => '#eltdf_eltdf_video_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltdf_eltdf_video_embedded_container',
						'self'            => '#eltdf_eltdf_video_self_hosted_container'
					)
				)
			)
		);
		
		$eltdf_video_embedded_container = esmarts_elated_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltdf_video_embedded_container',
				'hidden_property' => 'eltdf_video_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltdf_video_self_hosted_container = esmarts_elated_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltdf_video_self_hosted_container',
				'hidden_property' => 'eltdf_video_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'esmarts' ),
				'description' => esc_html__( 'Enter Video URL', 'esmarts' ),
				'parent'      => $eltdf_video_embedded_container,
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'esmarts' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'esmarts' ),
				'parent'      => $eltdf_video_self_hosted_container,
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'esmarts' ),
				'description' => esc_html__( 'Enter video image', 'esmarts' ),
				'parent'      => $eltdf_video_self_hosted_container,
			)
		);
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_post_video_meta', 22 );
}