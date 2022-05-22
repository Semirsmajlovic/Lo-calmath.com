<?php

if ( ! function_exists( 'esmarts_elated_breadcrumbs_title_area_typography_style' ) ) {
	function esmarts_elated_breadcrumbs_title_area_typography_style() {
		
		$item_styles = esmarts_elated_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.eltdf-title-holder .eltdf-title-wrapper .eltdf-breadcrumbs'
		);
		
		echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = esmarts_elated_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.eltdf-title-holder .eltdf-title-wrapper .eltdf-breadcrumbs a:hover'
		);
		
		echo esmarts_elated_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_breadcrumbs_title_area_typography_style' );
}