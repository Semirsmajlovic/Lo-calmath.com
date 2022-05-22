<?php

if ( ! function_exists( 'esmarts_elated_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function esmarts_elated_reset_options_map() {
		
		esmarts_elated_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'esmarts' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = esmarts_elated_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'esmarts' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'esmarts' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'esmarts_elated_action_options_map', 'esmarts_elated_reset_options_map', 100 );
}