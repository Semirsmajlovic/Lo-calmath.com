<?php if($max_num_pages > 1) { ?>
	<div class="eltdf-blog-pag-loading">
		<div class="eltdf-blog-pag-bounce1"></div>
		<div class="eltdf-blog-pag-bounce2"></div>
		<div class="eltdf-blog-pag-bounce3"></div>
	</div>
	<div class="eltdf-blog-pag-load-more">
		<?php
        if(esmarts_elated_core_plugin_installed()) {
			echo esmarts_elated_get_button_html(
                apply_filters(
                    'esmarts_elated_filter_blog_template_load_more_button',
                    array(
                        'link' => 'javascript: void(0)',
                        'size' => 'large',
                        'text' => esc_html__('Load more', 'esmarts')
			        )
                )
            );
        } else { ?>
            <a itemprop="url" href="javascript:void(0)" target="_self" class="eltdf-btn eltdf-btn-large eltdf-btn-solid">
                <span class="eltdf-btn-text">
                    <?php echo esc_html__('Load more', 'esmarts'); ?>
                </span>
            </a>
		<?php } ?>
	</div>
<?php }