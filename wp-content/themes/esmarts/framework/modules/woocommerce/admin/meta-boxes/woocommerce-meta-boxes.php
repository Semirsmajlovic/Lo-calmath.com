<?php

if(!function_exists('esmarts_elated_map_woocommerce_meta')) {
    function esmarts_elated_map_woocommerce_meta() {
        $woocommerce_meta_box = esmarts_elated_create_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'esmarts'),
                'name' => 'woo_product_meta'
            )
        );

        esmarts_elated_create_meta_box_field(array(
            'name'        => 'eltdf_product_featured_image_size',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Product List Shortcode', 'esmarts'),
            'description' => esc_html__('Choose image layout when it appears in Elated Product List - Masonry layout shortcode', 'esmarts'),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                'eltdf-woo-image-normal-width' => esc_html__('Default', 'esmarts'),
                'eltdf-woo-image-large-width'  => esc_html__('Large Width', 'esmarts')
            )
        ));

        esmarts_elated_create_meta_box_field(
            array(
                'name'          => 'eltdf_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'esmarts'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'esmarts'),
                'parent'        => $woocommerce_meta_box,
                'options'       => esmarts_elated_get_yes_no_select_array()
            )
        );

	    esmarts_elated_create_meta_box_field(
		    array(
			    'name'          => 'eltdf_show_new_sign_woo_meta',
			    'type'          => 'select',
			    'default_value' => '',
			    'label'         => esc_html__('Show New Sign', 'esmarts'),
			    'parent'        => $woocommerce_meta_box,
			    'options'       => esmarts_elated_get_yes_no_select_array(false)
		    )
	    );
    }
	
    add_action('esmarts_elated_action_meta_boxes_map', 'esmarts_elated_map_woocommerce_meta', 99);
}