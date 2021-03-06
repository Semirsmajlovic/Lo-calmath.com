<?php

if ( ! function_exists( 'esmarts_elated_admin_map_init' ) ) {
	function esmarts_elated_admin_map_init() {
		do_action( 'esmarts_elated_action_before_options_map' );
		
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/fonts/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/general/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/page/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/social/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/reset/map.php';
		
		do_action( 'esmarts_elated_action_options_map' );
		
		do_action( 'esmarts_elated_action_after_options_map' );
	}
	
	add_action( 'after_setup_theme', 'esmarts_elated_admin_map_init', 1 );
}