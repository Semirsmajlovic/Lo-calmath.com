<?php

if ( ! function_exists( 'esmarts_elated_events_custom_styles' ) ) {
	/**
	 * Outputs custom styles for events
	 */
	function esmarts_elated_events_custom_styles() {
		if ( esmarts_elated_options()->getOptionValue( 'first_color' ) !== "" ) {
			$color_selector = array(
				'.mkdf-tribe-events-single .mkdf-events-single-meta .mkdf-events-single-next-event a:hover',
				'.mkdf-tribe-events-single .mkdf-events-single-meta .mkdf-events-single-prev-event a:hover',
				'#tribe-events-content-wrapper .tribe-bar-views-list li.tribe-bar-active a',
				'#tribe-events-content-wrapper .tribe-bar-views-list li a:hover',
				'#tribe-events-content-wrapper .tribe-events-sub-nav .tribe-events-nav-previous a:hover',
				'#tribe-events-content-wrapper .tribe-events-sub-nav .tribe-events-nav-next a:hover',
				'#tribe-events-content-wrapper .tribe-events-calendar td div[id*=tribe-events-daynum-] a:hover'
			);
			
			$background_color_selector = array(
				'.mkdf-tribe-events-single .mkdf-events-single-main-info .mkdf-events-single-date-holder'
			);
			
			$border_color_selector = array(
				'#tribe-events-content-wrapper .tribe-bar-filters input[type=text]:focus'
			);
			
			echo esmarts_elated_dynamic_css( $color_selector, array( 'color' => esmarts_elated_options()->getOptionValue( 'first_color' ) ) );
			echo esmarts_elated_dynamic_css( '::selection', array( 'background' => esmarts_elated_options()->getOptionValue( 'first_color' ) ) );
			echo esmarts_elated_dynamic_css( '::-moz-selection', array( 'background' => esmarts_elated_options()->getOptionValue( 'first_color' ) ) );
			echo esmarts_elated_dynamic_css( $background_color_selector, array( 'background-color' => esmarts_elated_options()->getOptionValue( 'first_color' ) ) );
			echo esmarts_elated_dynamic_css( $border_color_selector, array( 'border-color' => esmarts_elated_options()->getOptionValue( 'first_color' ) ) );
		}
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_events_custom_styles' );
}