<?php

if( !function_exists('esmarts_elated_get_blog_holder_params') ) {
    /**
     * Function that generates params for holders on blog templates
     */
    function esmarts_elated_get_blog_holder_params($params) {
        $params_list = array();

        $params_list['holder'] = 'eltdf-container';
        $params_list['inner'] = 'eltdf-container-inner clearfix';

        return $params_list;
    }

    add_filter( 'esmarts_elated_filter_blog_holder_params', 'esmarts_elated_get_blog_holder_params' );
}

if( !function_exists('esmarts_elated_get_blog_single_holder_classes') ) {
    /**
     * Function that generates blog holder classes for single blog page
     */
    function esmarts_elated_get_blog_single_holder_classes($classes) {
        $sidebar_classes   = array();
        $sidebar_classes[] = 'eltdf-grid-large-gutter';
	
	    $classes = $classes . ' ' . implode(' ', $sidebar_classes);
	    
        return $classes;
    }

    add_filter( 'esmarts_elated_filter_blog_single_holder_classes', 'esmarts_elated_get_blog_single_holder_classes' );
}

if( !function_exists('esmarts_elated_blog_part_params') ) {
    function esmarts_elated_blog_part_params($params) {

        $part_params = array();
        $part_params['title_tag'] = 'h2';
        $part_params['link_tag'] = 'h3';
        $part_params['quote_tag'] = 'h3';

        return array_merge($params, $part_params);
    }

    add_filter( 'esmarts_elated_filter_blog_part_params', 'esmarts_elated_blog_part_params' );
}