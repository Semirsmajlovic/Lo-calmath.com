<?php

if ( ! function_exists( 'esmarts_elated_404_header_general_styles' ) ) {
	/**
	 * Generates general custom styles for 404 header area
	 */
	function esmarts_elated_404_header_general_styles() {
		$background_color        = esmarts_elated_options()->getOptionValue( '404_menu_area_background_color_header' );
		$background_transparency = esmarts_elated_options()->getOptionValue( '404_menu_area_background_transparency_header' );
		
		$header_styles = array();
		$menu_selector = array(
			'.eltdf-404-page .eltdf-page-header .eltdf-menu-area'
		);
		
		if ( ! empty( $background_color ) ) {
			$header_styles['background-color']        = $background_color;
			$header_styles['background-transparency'] = 1;
			
			if ( $background_transparency !== '' ) {
				$header_styles['background-transparency'] = $background_transparency;
			}
			
			echo esmarts_elated_dynamic_css( $menu_selector, array( 'background-color' => esmarts_elated_rgba_color( $header_styles['background-color'], $header_styles['background-transparency'] ) . ' !important' ) );
		}
		
		if ( empty( $background_color ) && $background_transparency !== '' ) {
			$header_styles['background-color']        = '#fff';
			$header_styles['background-transparency'] = $background_transparency;
			
			echo esmarts_elated_dynamic_css( $menu_selector, array( 'background-color' => esmarts_elated_rgba_color( $header_styles['background-color'], $header_styles['background-transparency'] ) . ' !important' ) );
		}
		
		$border_color = esmarts_elated_options()->getOptionValue( '404_menu_area_border_color_header' );
		
		$menu_styles = array();
		
		if ( ! empty( $border_color ) ) {
			$menu_styles['border-color'] = $border_color;
		}
		
		echo esmarts_elated_dynamic_css( $menu_selector, $menu_styles );
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_404_header_general_styles' );
}

if ( ! function_exists( 'esmarts_elated_404_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function esmarts_elated_404_footer_top_general_styles() {
		$background_color         = esmarts_elated_options()->getOptionValue( '404_page_background_color' );
		$background_image         = esmarts_elated_options()->getOptionValue( '404_page_background_image' );
		$pattern_background_image = esmarts_elated_options()->getOptionValue( '404_page_background_pattern_image' );
		
		$item_styles = array();
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		if ( ! empty( $background_image ) ) {
			$item_styles['background-image']    = 'url(' . $background_image . ')';
			$item_styles['background-position'] = 'center 0';
			$item_styles['background-size']     = 'cover';
			$item_styles['background-repeat']   = 'no-repeat';
		}
		
		if ( ! empty( $pattern_background_image ) ) {
			$item_styles['background-image']    = 'url(' . $pattern_background_image . ')';
			$item_styles['background-position'] = '0 0';
			$item_styles['background-repeat']   = 'repeat';
		}
		
		$item_selector = array(
			'.eltdf-404-page .eltdf-content'
		);
		
		echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_404_footer_top_general_styles' );
}

if ( ! function_exists( 'esmarts_elated_404_title_styles' ) ) {
	/**
	 * Generates styles for 404 page title
	 */
	function esmarts_elated_404_title_styles() {
		$item_styles = esmarts_elated_get_typography_styles( '404_title' );
		
		$item_selector = array(
			'.eltdf-404-page .eltdf-page-not-found .eltdf-404-title'
		);
		
		echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_404_title_styles' );
}

if ( ! function_exists( 'esmarts_elated_404_subtitle_styles' ) ) {
	/**
	 * Generates styles for 404 page subtitle
	 */
	function esmarts_elated_404_subtitle_styles() {
		$item_styles = esmarts_elated_get_typography_styles( '404_subtitle' );
		
		$item_selector = array(
			'.eltdf-404-page .eltdf-page-not-found .eltdf-404-subtitle'
		);
		
		echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_404_subtitle_styles' );
}

if ( ! function_exists( 'esmarts_elated_404_text_styles' ) ) {
	/**
	 * Generates styles for 404 page text
	 */
	function esmarts_elated_404_text_styles() {
		$item_styles = esmarts_elated_get_typography_styles( '404_text' );
		
		$item_selector = array(
			'.eltdf-404-page .eltdf-page-not-found .eltdf-404-text'
		);
		
		echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_404_text_styles' );
}