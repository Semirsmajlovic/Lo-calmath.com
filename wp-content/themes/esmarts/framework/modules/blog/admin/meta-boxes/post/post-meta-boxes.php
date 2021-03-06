<?php

/*** Post Settings ***/

if ( ! function_exists( 'esmarts_elated_map_post_meta' ) ) {
	function esmarts_elated_map_post_meta() {
		
		$post_meta_box = esmarts_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'esmarts' ),
				'name'  => 'post-meta'
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'esmarts' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'esmarts' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
				'options'       => array(
					''                 => esc_html__( 'Default', 'esmarts' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'esmarts' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'esmarts' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'esmarts' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'esmarts' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'esmarts' )
				)
			)
		);
		
		$esmarts_custom_sidebars = esmarts_elated_get_custom_sidebars();
		if ( count( $esmarts_custom_sidebars ) > 0 ) {
			esmarts_elated_create_meta_box_field( array(
				'name'        => 'eltdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'esmarts' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'esmarts' ),
				'parent'      => $post_meta_box,
				'options'     => esmarts_elated_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'esmarts' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'esmarts' ),
				'parent'      => $post_meta_box
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'esmarts' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'esmarts' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'esmarts' ),
					'large-width'        => esc_html__( 'Large Width', 'esmarts' ),
					'large-height'       => esc_html__( 'Large Height', 'esmarts' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'esmarts' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'esmarts' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'esmarts' ),
					'large-width' => esc_html__( 'Large Width', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_disable_post_featured_image_meta',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Post Featured Image', 'esmarts' ),
				'description'   => esc_html__( 'Disabling this option will hide post featured image on your single post page', 'esmarts' ),
				'parent'        => $post_meta_box,
				'options'       => esmarts_elated_get_yes_no_select_array( false )
			)
		);
		
		esmarts_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'esmarts' ),
				'parent'        => $post_meta_box,
				'options'       => esmarts_elated_get_yes_no_select_array()
			)
		);

		do_action('esmarts_elated_action_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_post_meta', 20 );
}
