<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * esmarts_elated_action_header_meta hook
	 *
	 * @see esmarts_elated_header_meta() - hooked with 10
	 * @see esmarts_elated_user_scalable_meta - hooked with 10
	 * @see eltdf_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'esmarts_elated_action_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * esmarts_elated_action_after_body_tag hook
	 *
	 * @see esmarts_elated_get_side_area() - hooked with 10
	 * @see esmarts_elated_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'esmarts_elated_action_after_body_tag' ); ?>
	
	<div class="eltdf-wrapper eltdf-404-page">
		<div class="eltdf-wrapper-inner">
            <?php
            /**
             * esmarts_elated_action_after_wrapper_inner hook
             *
             * @see esmarts_elated_get_header() - hooked with 10
             * @see esmarts_elated_get_mobile_header() - hooked with 20
             * @see esmarts_elated_back_to_top_button() - hooked with 30
             * @see esmarts_elated_get_header_minimal_full_screen_menu() - hooked with 40
             */
            do_action( 'esmarts_elated_action_after_wrapper_inner' );

            do_action('esmarts_elated_action_before_main_content'); ?>
			
			<div class="eltdf-content" <?php esmarts_elated_content_elem_style_attr(); ?>>
				<div class="eltdf-content-inner">
					<div class="eltdf-page-not-found">
						<?php
						$eltdf_title_image_404 = esmarts_elated_options()->getOptionValue( '404_page_title_image' );
						$eltdf_title_404       = esmarts_elated_options()->getOptionValue( '404_title' );
						$eltdf_button_label    = esmarts_elated_options()->getOptionValue( '404_back_to_home' );
						$eltdf_button_style    = esmarts_elated_options()->getOptionValue( '404_button_style' );
						
						if ( ! empty( $eltdf_title_image_404 ) ) { ?>
							<div class="eltdf-404-title-image">
								<img src="<?php echo esc_url( $eltdf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'esmarts' ); ?>" />
							</div>
						<?php } else { ?>
							<img src="<?php echo ELATED_ASSETS_ROOT . '/img/404-image.png'; ?>" alt="<?php esc_attr_e( '404 Title Image', 'esmarts' ); ?>" />
						<?php } ?>
						
						<h4 class="eltdf-404-title">
							<?php if ( ! empty( $eltdf_title_404 ) ) {
								echo esc_html( $eltdf_title_404 );
							} else {
								esc_html_e( 'Oops, seems you ventured to far out into space. Here\'s the way back home.', 'esmarts' );
							} ?>
						</h4>
						
						<?php
						$eltdf_params           = array();
						$eltdf_params['text']   = ! empty( $eltdf_button_label ) ? $eltdf_button_label : esc_html__( 'Back to home', 'esmarts' );
						$eltdf_params['link']   = esc_url( home_url( '/' ) );
						$eltdf_params['target'] = '_self';
						$eltdf_params['type']   = 'solid';
						$eltdf_params['size']   = 'medium';
                        $eltdf_params['skin']   = 'light';
                        $eltdf_params['hover_animation'] = 'yes';
						
						if ( $eltdf_button_style == 'default-style' ) {
							$eltdf_params['custom_class'] = 'eltdf-btn-default-style';
						} else {
							$eltdf_params['custom_class'] = 'eltdf-btn-light-style';
						}
						
						echo esmarts_elated_execute_shortcode( 'eltdf_button', $eltdf_params ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>