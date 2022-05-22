<?php

/*** Child Theme Function  ***/

if ( ! function_exists( 'esmarts_elated_child_theme_enqueue_scripts' ) ) {
	function esmarts_elated_child_theme_enqueue_scripts() {

		$parent_style = 'esmarts-elated-default-style';

		wp_enqueue_style('esmarts-elated-child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
	}

	add_action( 'wp_enqueue_scripts', 'esmarts_elated_child_theme_enqueue_scripts' );
}