<?php

if ( ! function_exists( 'esmarts_elated_get_search_types_options' ) ) {
    function esmarts_elated_get_search_types_options() {
        $search_type_options = apply_filters( 'esmarts_elated_filter_search_type_global_option', $search_type_options = array() );

        return $search_type_options;
    }
}

if ( ! function_exists( 'esmarts_elated_search_options_map' ) ) {
	function esmarts_elated_search_options_map() {
		
		esmarts_elated_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'esmarts' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = esmarts_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'esmarts' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		esmarts_elated_add_admin_field( array(
			'name'          => 'search_page_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Layout', 'esmarts' ),
			'default_value' => 'in-grid',
			'description'   => esc_html__( 'Set layout. Default is in grid.', 'esmarts' ),
			'parent'        => $search_page_panel,
			'options'       => array(
				'in-grid'    => esc_html__( 'In Grid', 'esmarts' ),
				'full-width' => esc_html__( 'Full Width', 'esmarts' )
			)
		) );
		
		esmarts_elated_add_admin_field( array(
			'name'          => 'search_page_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'esmarts' ),
			'description'   => esc_html__( "Choose a sidebar layout for search page", 'esmarts' ),
			'default_value' => 'no-sidebar',
			'options'       => array(
				'no-sidebar'       => esc_html__( 'No Sidebar', 'esmarts' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'esmarts' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'esmarts' ),
				'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'esmarts' ),
				'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'esmarts' )
			),
			'parent'        => $search_page_panel
		) );
		
		$esmarts_custom_sidebars = esmarts_elated_get_custom_sidebars();
		if ( count( $esmarts_custom_sidebars ) > 0 ) {
			esmarts_elated_add_admin_field( array(
				'name'        => 'search_custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'esmarts' ),
				'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'esmarts' ),
				'parent'      => $search_page_panel,
				'options'     => $esmarts_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
		
		$search_panel = esmarts_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'esmarts' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_type',
				'default_value' => 'fullscreen',
				'label'         => esc_html__( 'Select Search Type', 'esmarts' ),
				'description'   => esc_html__( "Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'esmarts' ),
				'options'       => esmarts_elated_get_search_types_options()
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Search Icon Pack', 'esmarts' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'esmarts' ),
				'options'       => esmarts_elated_icon_collections()->getIconCollectionsExclude( array( 'linea_icons' ) )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Grid Layout', 'esmarts' ),
				'description'   => esc_html__( 'Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'esmarts' ),
			)
		);
		
		esmarts_elated_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'esmarts' ),
				'description'   => esc_html__( 'Set size for icon', 'esmarts' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$search_icon_color_group = esmarts_elated_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Colors', 'esmarts' ),
				'description' => esc_html__( 'Define color style for icon', 'esmarts' ),
				'name'        => 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = esmarts_elated_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__( 'Color', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'enable_search_icon_text',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Search Icon Text', 'esmarts' ),
				'description'   => esc_html__( "Enable this option to show 'Search' text next to search icon in header", 'esmarts' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_enable_search_icon_text_container'
				)
			)
		);
		
		$enable_search_icon_text_container = esmarts_elated_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'enable_search_icon_text_container',
				'hidden_property' => 'enable_search_icon_text',
				'hidden_value'    => 'no'
			)
		);
		
		$enable_search_icon_text_group = esmarts_elated_add_admin_group(
			array(
				'parent'      => $enable_search_icon_text_container,
				'title'       => esc_html__( 'Search Icon Text', 'esmarts' ),
				'name'        => 'enable_search_icon_text_group',
				'description' => esc_html__( 'Define style for search icon text', 'esmarts' )
			)
		);
		
		$enable_search_icon_text_row = esmarts_elated_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row'
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color',
				'label'  => esc_html__( 'Text Color', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color_hover',
				'label'  => esc_html__( 'Text Hover Color', 'esmarts' )
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_font_size',
				'label'         => esc_html__( 'Font Size', 'esmarts' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_line_height',
				'label'         => esc_html__( 'Line Height', 'esmarts' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = esmarts_elated_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row2',
				'next'   => true
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_text_transform',
				'label'         => esc_html__( 'Text Transform', 'esmarts' ),
				'default_value' => '',
				'options'       => esmarts_elated_get_text_transform_array()
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_icon_text_google_fonts',
				'label'         => esc_html__( 'Font Family', 'esmarts' ),
				'default_value' => '-1',
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_style',
				'label'         => esc_html__( 'Font Style', 'esmarts' ),
				'default_value' => '',
				'options'       => esmarts_elated_get_font_style_array(),
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_weight',
				'label'         => esc_html__( 'Font Weight', 'esmarts' ),
				'default_value' => '',
				'options'       => esmarts_elated_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = esmarts_elated_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row3',
				'next'   => true
			)
		);
		
		esmarts_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row3,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'esmarts' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'esmarts_elated_action_options_map', 'esmarts_elated_search_options_map', 16 );
}