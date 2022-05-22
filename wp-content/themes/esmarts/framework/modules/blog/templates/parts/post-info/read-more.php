<?php if ( ! esmarts_elated_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="eltdf-post-read-more-button">
		<?php
		if ( esmarts_elated_core_plugin_installed() ) {
			echo esmarts_elated_get_button_html(
				apply_filters(
					'esmarts_elated_filter_blog_template_read_more_button',
					array(
						'type'         => 'simple',
						'size'         => 'medium',
						'link'         => get_the_permalink(),
						'text'         => esc_html__( 'READ MORE', 'esmarts' ),
						'custom_class' => 'eltdf-blog-list-button'
					)
				)
			);
		} else { ?>
			<a itemprop="url" href="<?php echo esc_url( get_the_permalink() ); ?>" target="_self" class="eltdf-btn eltdf-btn-medium eltdf-btn-simple eltdf-blog-list-button">
                <span class="eltdf-btn-text"><?php echo esc_html__( 'READ MORE', 'esmarts' ); ?></span>
			</a>
		<?php } ?>
	</div>
<?php } ?>