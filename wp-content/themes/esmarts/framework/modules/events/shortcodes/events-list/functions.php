<?php

if ( ! function_exists( 'eltdf_core_add_events_list_shortcodes' ) ) {
    function eltdf_core_add_events_list_shortcodes( $shortcodes_class_name ) {
        $shortcodes = array(
            'ElatedCore\CPT\Shortcodes\EventsList\EventsList'
        );

        $shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );

        return $shortcodes_class_name;
    }

    add_filter( 'eltdf_core_filter_add_vc_shortcode', 'eltdf_core_add_events_list_shortcodes' );
}