<?php

if ( ! function_exists( 'esmarts_elated_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function esmarts_elated_footer_top_general_styles() {
		$item_styles      = array();
		$background_color = esmarts_elated_options()->getOptionValue( 'footer_top_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo esmarts_elated_dynamic_css( '.eltdf-page-footer .eltdf-footer-top-holder', $item_styles );
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_footer_top_general_styles' );
}

if ( ! function_exists( 'esmarts_elated_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function esmarts_elated_footer_bottom_general_styles() {
		$item_styles      = array();
		$background_color = esmarts_elated_options()->getOptionValue( 'footer_bottom_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo esmarts_elated_dynamic_css( '.eltdf-page-footer .eltdf-footer-bottom-holder', $item_styles );
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_footer_bottom_general_styles' );
}