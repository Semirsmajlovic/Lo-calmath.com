<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = ELATED_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'esmarts_elated_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function esmarts_elated_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'esmarts_elated_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'esmarts_elated_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function esmarts_elated_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Elated Row Content Width', 'esmarts' ),
				'value'      => array(
					esc_html__( 'Full Width', 'esmarts' ) => 'full-width',
					esc_html__( 'In Grid', 'esmarts' )    => 'grid'
				),
				'group'      => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Elated Anchor ID', 'esmarts' ),
				'description' => esc_html__( 'For example "home"', 'esmarts' ),
				'group'       => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Elated Background Color', 'esmarts' ),
				'group'      => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Elated Background Image', 'esmarts' ),
				'group'      => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Elated Disable Background Image', 'esmarts' ),
				'value'       => array(
					esc_html__( 'Never', 'esmarts' )        => '',
					esc_html__( 'Below 1280px', 'esmarts' ) => '1280',
					esc_html__( 'Below 1024px', 'esmarts' ) => '1024',
					esc_html__( 'Below 768px', 'esmarts' )  => '768',
					esc_html__( 'Below 680px', 'esmarts' )  => '680',
					esc_html__( 'Below 480px', 'esmarts' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'esmarts' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Elated Parallax Background Image', 'esmarts' ),
				'group'      => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Elated Parallax Speed', 'esmarts' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'esmarts' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Elated Parallax Section Height (px)', 'esmarts' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Elated Content Aligment', 'esmarts' ),
				'value'      => array(
					esc_html__( 'Default', 'esmarts' ) => '',
					esc_html__( 'Left', 'esmarts' )    => 'left',
					esc_html__( 'Center', 'esmarts' )  => 'center',
					esc_html__( 'Right', 'esmarts' )   => 'right'
				),
				'group'      => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Elated Row Content Width', 'esmarts' ),
				'value'      => array(
					esc_html__( 'Full Width', 'esmarts' ) => 'full-width',
					esc_html__( 'In Grid', 'esmarts' )    => 'grid'
				),
				'group'      => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Elated Background Color', 'esmarts' ),
				'group'      => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Elated Background Image', 'esmarts' ),
				'group'      => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Elated Disable Background Image', 'esmarts' ),
				'value'       => array(
					esc_html__( 'Never', 'esmarts' )        => '',
					esc_html__( 'Below 1280px', 'esmarts' ) => '1280',
					esc_html__( 'Below 1024px', 'esmarts' ) => '1024',
					esc_html__( 'Below 768px', 'esmarts' )  => '768',
					esc_html__( 'Below 680px', 'esmarts' )  => '680',
					esc_html__( 'Below 480px', 'esmarts' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'esmarts' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Elated Content Aligment', 'esmarts' ),
				'value'      => array(
					esc_html__( 'Default', 'esmarts' ) => '',
					esc_html__( 'Left', 'esmarts' )    => 'left',
					esc_html__( 'Center', 'esmarts' )  => 'center',
					esc_html__( 'Right', 'esmarts' )   => 'right'
				),
				'group'      => esc_html__( 'Elated Settings', 'esmarts' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( esmarts_elated_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Elated Enable Passepartout', 'esmarts' ),
					'value'       => array_flip( esmarts_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Elated Settings', 'esmarts' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Elated Passepartout Size', 'esmarts' ),
					'value'       => array(
						esc_html__( 'Tiny', 'esmarts' )   => 'tiny',
						esc_html__( 'Small', 'esmarts' )  => 'small',
						esc_html__( 'Normal', 'esmarts' ) => 'normal',
						esc_html__( 'Large', 'esmarts' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'esmarts' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Elated Disable Side Passepartout', 'esmarts' ),
					'value'       => array_flip( esmarts_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'esmarts' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Elated Disable Top Passepartout', 'esmarts' ),
					'value'       => array_flip( esmarts_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'esmarts' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'esmarts_elated_vc_row_map' );
}