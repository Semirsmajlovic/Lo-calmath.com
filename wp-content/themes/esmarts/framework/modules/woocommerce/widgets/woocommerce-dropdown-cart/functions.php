<?php

if ( ! function_exists( 'esmarts_elated_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function esmarts_elated_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'eSmartsElatedClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'esmarts_elated_filter_register_widgets', 'esmarts_elated_register_woocommerce_dropdown_cart_widget' );
}