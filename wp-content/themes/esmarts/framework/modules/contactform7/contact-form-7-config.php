<?php

if ( ! function_exists('esmarts_elated_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function esmarts_elated_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'esmarts'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'esmarts') => 'default',
				esc_html__('Custom Style 1', 'esmarts') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'esmarts') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'esmarts') => 'cf7_custom_style_3',
				esc_html__('Custom Style 4', 'esmarts') => 'cf7_custom_style_4'
			),
			'description' => esc_html__('You can style each form element individually in Elated Options > Contact Form 7', 'esmarts')
		));
	}
	
	add_action('vc_after_init', 'esmarts_elated_contact_form_map');
}