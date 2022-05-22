<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
	            <div class="eltdf-quote-mark">
		            <span class="eltdf-quote-mark-icon icon_quotations"></span>
	            </div>
	            <?php esmarts_elated_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                <div class="eltdf-post-info-top">
	                <?php esmarts_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
	                <?php esmarts_elated_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
	                <?php esmarts_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
	                <?php esmarts_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
	            <div class="eltdf-post-info-bottom clearfix">
		            <div class="eltdf-post-info-bottom-left">
			            <?php esmarts_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
		            </div>
		            <div class="eltdf-post-info-bottom-right">
			            <?php esmarts_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
		            </div>
	            </div>
            </div>
        </div>
    </div>
</article>