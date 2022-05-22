<?php

if ( ! function_exists( 'esmarts_elated_like' ) ) {
	/**
	 * Returns eSmartsElatedClassLike instance
	 *
	 * @return eSmartsElatedClassLike
	 */
	function esmarts_elated_like() {
		return eSmartsElatedClassLike::get_instance();
	}
}

function esmarts_elated_get_like() {
	
	echo wp_kses( esmarts_elated_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}