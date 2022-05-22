<?php

class eSmartsElatedClassSearchPostType extends eSmartsElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_search_post_type',
			esc_html__( 'Elated Search Post Type', 'esmarts' ),
			array( 'description' => esc_html__( 'Select post type that you want to be searched for', 'esmarts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$post_types = apply_filters( 'esmarts_elated_filter_search_post_type_widget_params_post_type', array( 'post' => 'Post' ) );
		
		$this->params = array(
			array(
				'type'        => 'dropdown',
				'name'        => 'post_type',
				'title'       => esc_html__( 'Post Type', 'esmarts' ),
				'description' => esc_html__( 'Choose post type that you want to be searched for', 'esmarts' ),
				'options'     => $post_types
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$search_type_class = 'eltdf-search-post-type';
		$post_type         = $instance['post_type'];
		?>
		
		<div class="widget eltdf-search-post-type-widget">
			<div data-post-type="<?php echo esc_attr( $post_type ); ?>" <?php esmarts_elated_class_attribute( $search_type_class ); ?>>
				<div class="eltdf-post-type-search-field-wrapper">
					<input class="eltdf-post-type-search-field" value="" placeholder="<?php esc_attr_e( 'Search here', 'esmarts' ) ?>">
				</div>
				<div class="eltdf-search-icon-holder">
					<div class="eltdf-search-icon-inner">
						<span class="eltdf-search-icon"><?php esc_html_e('Search', 'esmarts'); ?></span>
						<i class="eltdf-search-loading fa fa-spinner fa-spin eltdf-hidden" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			<div class="eltdf-post-type-search-results"></div>
		</div>
	<?php }
}