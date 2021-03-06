<?php

if ( ! function_exists( 'esmarts_elated_load_modules' ) ) {
	/**
	 * Loades all modules by going through all folders that are placed directly in modules folder
	 * and loads load.php file in each. Hooks to esmarts_elated_action_after_options_map action
	 *
	 * @see http://php.net/manual/en/function.glob.php
	 */
	function esmarts_elated_load_modules() {
		foreach ( glob( ELATED_FRAMEWORK_ROOT_DIR . '/modules/*/load.php' ) as $module_load ) {
			include_once $module_load;
		}
	}
	
	add_action( 'esmarts_elated_action_before_options_map', 'esmarts_elated_load_modules' );
}