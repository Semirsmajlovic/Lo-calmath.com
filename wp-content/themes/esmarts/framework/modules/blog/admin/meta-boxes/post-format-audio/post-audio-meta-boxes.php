<?php

if ( ! function_exists( 'esmarts_elated_map_post_audio_meta' ) ) {
	function esmarts_elated_map_post_audio_meta() {
		$audio_post_format_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'esmarts' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'esmarts' ),
				'description'   => esc_html__( 'Choose audio type', 'esmarts' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'esmarts' ),
					'self'            => esc_html__( 'Self Hosted', 'esmarts' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltdf_eltdf_audio_self_hosted_container',
						'self'            => '#eltdf_eltdf_audio_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltdf_eltdf_audio_embedded_container',
						'self'            => '#eltdf_eltdf_audio_self_hosted_container'
					)
				)
			)
		);
		
		$eltdf_audio_embedded_container = esmarts_elated_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltdf_audio_embedded_container',
				'hidden_property' => 'eltdf_audio_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltdf_audio_self_hosted_container = esmarts_elated_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltdf_audio_self_hosted_container',
				'hidden_property' => 'eltdf_audio_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'esmarts' ),
				'description' => esc_html__( 'Enter audio URL', 'esmarts' ),
				'parent'      => $eltdf_audio_embedded_container,
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'esmarts' ),
				'description' => esc_html__( 'Enter audio link', 'esmarts' ),
				'parent'      => $eltdf_audio_self_hosted_container,
			)
		);
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_post_audio_meta', 23 );
}