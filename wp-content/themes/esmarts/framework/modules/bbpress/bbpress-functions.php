<?php

if ( ! function_exists( 'esmarts_elated_override_bbpress_breadcrumbs_home_link' ) ) {
	function esmarts_elated_override_bbpress_breadcrumbs_home_link( $use_home_link ) {
		if ( function_exists( ( 'is_bbpress' ) ) && is_bbpress() ) {
			$use_home_link = false;
		}
		
		return $use_home_link;
	}
	
	add_filter( 'esmarts_elated_filter_breadcrumbs_title_use_home_link', 'esmarts_elated_override_bbpress_breadcrumbs_home_link' );
}

if ( ! function_exists( 'esmarts_elated_override_bbpress_title_single_user' ) ) {
	function esmarts_elated_override_bbpress_title_single_user( $title ) {
		
		if ( function_exists( 'bbp_is_single_user' ) && bbp_is_single_user() ) {
			$title = esc_html__( 'Forum User', 'esmarts' );
		}
		
		return $title;
	}
	
	add_filter( 'esmarts_elated_filter_title_text', 'esmarts_elated_override_bbpress_title_single_user' );
}

if ( ! function_exists( 'esmarts_elated_override_bbpress_breadcrumbs' ) ) {
	function esmarts_elated_override_bbpress_breadcrumbs( $childContent, $delimiter, $before, $after ) {
		if ( function_exists( ( 'is_bbpress' ) ) && is_bbpress() ) {
			
			$childContent = bbp_get_breadcrumb(
				array(
					'sep' => '&nbsp; / &nbsp;'
				)
			);
		}
		
		return $childContent;
	}
	
	add_filter( 'esmarts_elated_filter_breadcrumbs_title_child_output', 'esmarts_elated_override_bbpress_breadcrumbs', 10, 4 );
}