<?php

if ( ! function_exists( 'esmarts_elated_set_search_slide_from_hb_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function esmarts_elated_set_search_slide_from_hb_global_option( $search_type_options ) {
        $search_type_options['slide-from-header-bottom'] = esc_html__( 'Slide From Header Bottom', 'esmarts' );

        return $search_type_options;
    }

    add_filter( 'esmarts_elated_filter_search_type_global_option', 'esmarts_elated_set_search_slide_from_hb_global_option' );
}