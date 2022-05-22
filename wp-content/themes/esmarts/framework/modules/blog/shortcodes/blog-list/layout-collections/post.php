<li class="eltdf-bl-item eltdf-item-space clearfix">
	<div class="eltdf-bli-inner">
		<?php esmarts_elated_get_module_template_part( 'templates/parts/media', 'blog', '', $params ); ?>
        <div class="eltdf-bli-content">
	        <?php esmarts_elated_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
            <div class="eltdf-bli-info">
                <?php esmarts_elated_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params ); ?>
                <?php esmarts_elated_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params ); ?>
                <?php esmarts_elated_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params ); ?>
                <?php esmarts_elated_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params ); ?>
            </div>
	        <?php esmarts_elated_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
        </div>
	</div>
</li>