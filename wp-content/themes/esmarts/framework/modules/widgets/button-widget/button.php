<?php

class eSmartsElatedClassButtonWidget extends eSmartsElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_button_widget',
			esc_html__( 'Elated Button Widget', 'esmarts' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'esmarts' ) )
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
					'solid'   => esc_html__( 'Solid', 'esmarts' ),
					'outline' => esc_html__( 'Outline', 'esmarts' ),
					'simple'  => esc_html__( 'Simple', 'esmarts' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'esmarts' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'esmarts' ),
					'medium' => esc_html__( 'Medium', 'esmarts' ),
					'large'  => esc_html__( 'Large', 'esmarts' ),
					'huge'   => esc_html__( 'Huge', 'esmarts' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'esmarts' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'esmarts' ),
				'default' => esc_html__( 'Button Text', 'esmarts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'esmarts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'esmarts' ),
				'options' => esmarts_elated_get_link_target_array()
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'esmarts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'esmarts' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'esmarts' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'esmarts' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'esmarts' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'esmarts' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'esmarts' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'esmarts' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'esmarts' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'esmarts' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'esmarts' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'esmarts' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget eltdf-button-widget">';
			echo do_shortcode( "[eltdf_button $params]" ); // XSS OK
		echo '</div>';
	}
}