<?php

class eSmartsElatedClassBlogListWidget extends eSmartsElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_blog_list_widget',
			esc_html__( 'Elated Blog List Widget', 'esmarts' ),
			array( 'description' => esc_html__( 'Display a list of your blog posts', 'esmarts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'esmarts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'esmarts' ),
				'options' => array(
					'simple'  => esc_html__( 'Simple', 'esmarts' ),
					'minimal' => esc_html__( 'Minimal', 'esmarts' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'number_of_posts',
				'title' => esc_html__( 'Number of Posts', 'esmarts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'space_between_items',
				'title'   => esc_html__( 'Space Between Items', 'esmarts' ),
				'options' => esmarts_elated_get_space_between_items_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'order_by',
				'title'   => esc_html__( 'Order By', 'esmarts' ),
				'options' => esmarts_elated_get_query_order_by_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'order',
				'title'   => esc_html__( 'Order', 'esmarts' ),
				'options' => esmarts_elated_get_query_order_array()
			),
			array(
				'type'        => 'textfield',
				'name'        => 'category',
				'title'       => esc_html__( 'Category Slug', 'esmarts' ),
				'description' => esc_html__( 'Leave empty for all or use comma for list', 'esmarts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_tag',
				'title'   => esc_html__( 'Title Tag', 'esmarts' ),
				'options' => esmarts_elated_get_title_tag( true )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_transform',
				'title'   => esc_html__( 'Title Text Transform', 'esmarts' ),
				'options' => esmarts_elated_get_text_transform_array( true )
			),
			array(
				'type'       => 'dropdown',
				'name' => 'image_size',
				'title'    => esc_html__( 'Image Size', 'esmarts' ),
				'options'      => array_flip( array(
					esc_html__( 'Original', 'esmarts' )  => 'full',
					esc_html__( 'Square', 'esmarts' )    => 'esmarts_elated_image_square',
					esc_html__( 'Landscape', 'esmarts' ) => 'esmarts_elated_image_landscape',
					esc_html__( 'Portrait', 'esmarts' )  => 'esmarts_elated_image_portrait',
					esc_html__( 'Thumbnail', 'esmarts' ) => 'thumbnail',
					esc_html__( 'Medium', 'esmarts' )    => 'medium',
					esc_html__( 'Large', 'esmarts' )     => 'large'
				) )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		$instance['post_info_section'] = 'yes';
		$instance['number_of_columns'] = '1';
		
		// Filter out all empty params
		$instance         = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		$instance['type']       = ! empty( $instance['type'] ) ? $instance['type'] : 'simple';
		$instance['image_size'] = ! empty( $instance['image_size'] ) ? $instance['image_size'] : 'thumbnail';
		
		$params = '';
		//generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget eltdf-blog-list-widget">';
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			
			echo do_shortcode( "[eltdf_blog_list $params]" ); // XSS OK
		echo '</div>';
	}
}