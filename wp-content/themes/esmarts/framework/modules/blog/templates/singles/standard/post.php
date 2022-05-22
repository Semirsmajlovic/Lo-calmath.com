<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="eltdf-post-content">
		<div class="eltdf-post-heading">
			<?php esmarts_elated_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
		</div>
		<div class="eltdf-post-text">
			<div class="eltdf-post-text-inner">
				<?php esmarts_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
				<div class="eltdf-post-info-top">
					<?php esmarts_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
					<?php esmarts_elated_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
					<?php esmarts_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
					<?php esmarts_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
				</div>
				<div class="eltdf-post-text-main">
					<?php the_content(); ?>
					<?php do_action('esmarts_elated_action_single_link_pages'); ?>
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