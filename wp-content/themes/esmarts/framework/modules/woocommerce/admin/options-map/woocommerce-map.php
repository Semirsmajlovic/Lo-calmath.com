<?php

if ( ! function_exists( 'esmarts_elated_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function esmarts_elated_woocommerce_options_map() {
		
		esmarts_elated_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'esmarts' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = esmarts_elated_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'esmarts' ),
				'default_value' => 'eltdf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for product listing and related products on single product', 'esmarts' ),
				'options'       => array(
					'eltdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'esmarts' ),
					'eltdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'esmarts' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'esmarts' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'esmarts' ),
				'default_value' => 'normal',
				'options'       => esmarts_elated_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'esmarts' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'esmarts' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'esmarts' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'esmarts' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'esmarts' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'esmarts' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'esmarts' ),
				'default_value' => 'h4',
				'options'       => esmarts_elated_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = esmarts_elated_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'esmarts' ),
				'parent'        => $panel_single_product,
				'options'       => esmarts_elated_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_single_product_title_tag',
				'default_value' => 'h2',
				'label'         => esc_html__( 'Single Product Title Tag', 'esmarts' ),
				'options'       => esmarts_elated_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '4',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'esmarts' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'esmarts' ),
					'3' => esc_html__( 'Three', 'esmarts' ),
					'2' => esc_html__( 'Two', 'esmarts' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'below-image',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'esmarts' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'esmarts' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'esmarts' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'esmarts' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'esmarts' ),
				'parent'        => $panel_single_product,
				'options'       => esmarts_elated_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'esmarts' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'esmarts' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'esmarts' )
				),
				'parent'        => $panel_single_product
			)
		);
	}
	
	add_action( 'esmarts_elated_action_options_map', 'esmarts_elated_woocommerce_options_map', 21 );
}