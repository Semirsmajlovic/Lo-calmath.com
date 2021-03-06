<?php

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'esmarts_elated_map_blog_meta' ) ) {
	function esmarts_elated_map_blog_meta() {
		$eltd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$eltd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'esmarts' ),
				'name'  => 'blog_meta'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'esmarts' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'esmarts' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltd_blog_categories
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'esmarts' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'esmarts' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltd_blog_categories,
				'args'        => array( "col_width" => 3 )
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'esmarts' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'esmarts' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'esmarts' ),
					'in-grid'    => esc_html__( 'In Grid', 'esmarts' ),
					'full-width' => esc_html__( 'Full Width', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'esmarts' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'esmarts' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'esmarts' ),
					'two'   => esc_html__( '2 Columns', 'esmarts' ),
					'three' => esc_html__( '3 Columns', 'esmarts' ),
					'four'  => esc_html__( '4 Columns', 'esmarts' ),
					'five'  => esc_html__( '5 Columns', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'esmarts' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'esmarts' ),
				'options'     => esmarts_elated_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'esmarts' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'esmarts' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'esmarts' ),
					'fixed'    => esc_html__( 'Fixed', 'esmarts' ),
					'original' => esc_html__( 'Original', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'esmarts' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'esmarts' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'esmarts' ),
					'standard'        => esc_html__( 'Standard', 'esmarts' ),
					'load-more'       => esc_html__( 'Load More', 'esmarts' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'esmarts' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'esmarts' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'esmarts' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_blog_meta', 30 );
}