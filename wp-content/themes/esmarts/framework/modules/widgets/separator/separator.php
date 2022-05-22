<?php

class eSmartsElatedClassSeparatorWidget extends eSmartsElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_separator_widget',
			esc_html__( 'Elated Separator Widget', 'esmarts' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'esmarts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'esmarts' ),
				'options' => array(
					'normal'     => esc_html__( 'Normal', 'esmarts' ),
					'full-width' => esc_html__( 'Full Width', 'esmarts' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'esmarts' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'esmarts' ),
					'left'   => esc_html__( 'Left', 'esmarts' ),
					'right'  => esc_html__( 'Right', 'esmarts' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'esmarts' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'esmarts' ),
					'dashed' => esc_html__( 'Dashed', 'esmarts' ),
					'dotted' => esc_html__( 'Dotted', 'esmarts' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'esmarts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'esmarts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'esmarts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'esmarts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'esmarts' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget eltdf-separator-widget">';
			echo do_shortcode( "[eltdf_separator $params]" ); // XSS OK
		echo '</div>';
	}
}