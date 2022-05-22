<?php

if ( ! function_exists( 'esmarts_elated_get_blog_list_types_options' ) ) {
	function esmarts_elated_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'esmarts_elated_filter_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'esmarts_elated_blog_options_map' ) ) {
	function esmarts_elated_blog_options_map() {
		$blog_list_type_options = esmarts_elated_get_blog_list_types_options();
		
		esmarts_elated_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'esmarts' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = esmarts_elated_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'esmarts' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'esmarts' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'esmarts' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'esmarts' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
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
			esmarts_elated_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'esmarts' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'esmarts' ),
					'parent'      => $panel_blog_lists,
					'options'     => esmarts_elated_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'esmarts' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'esmarts' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'esmarts' ),
					'full-width' => esc_html__( 'Full Width', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'esmarts' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'esmarts' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'esmarts' ),
					'three' => esc_html__( '3 Columns', 'esmarts' ),
					'four'  => esc_html__( '4 Columns', 'esmarts' ),
					'five'  => esc_html__( '5 Columns', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'esmarts' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'esmarts' ),
				'default_value' => 'normal',
				'options'       => esmarts_elated_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'esmarts' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'esmarts' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'esmarts' ),
					'original' => esc_html__( 'Original', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'esmarts' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'esmarts' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'esmarts' ),
					'load-more'       => esc_html__( 'Load More', 'esmarts' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'esmarts' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'esmarts' )
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'esmarts' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'esmarts' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = esmarts_elated_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'esmarts' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'esmarts' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
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
		
		if ( count( $esmarts_custom_sidebars ) > 0 ) {
			esmarts_elated_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'esmarts' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'esmarts' ),
					'parent'      => $panel_blog_single,
					'options'     => esmarts_elated_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'esmarts' ),
				'parent'        => $panel_blog_single,
				'options'       => esmarts_elated_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'esmarts' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'esmarts' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'esmarts' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'esmarts' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'esmarts' ),
				'parent'        => $panel_blog_single,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_navigation_container'
				)
			)
		);
		
		$blog_single_navigation_container = esmarts_elated_add_admin_container(
			array(
				'name'            => 'eltdf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'esmarts' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'esmarts' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'esmarts' ),
				'parent'        => $panel_blog_single,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_author_info_container'
				)
			)
		);
		
		$blog_single_author_info_container = esmarts_elated_add_admin_container(
			array(
				'name'            => 'eltdf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'esmarts' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'esmarts' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'esmarts_elated_action_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'esmarts_elated_action_options_map', 'esmarts_elated_blog_options_map', 13 );
}