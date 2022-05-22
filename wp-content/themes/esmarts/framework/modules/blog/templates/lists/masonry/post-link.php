<?php
$post_classes[] = 'eltdf-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
	<div class="eltdf-post-content">
		<div class="eltdf-post-text">
			<div class="eltdf-link-mark">
				<span class="eltdf-link-mark-icon icon_link"></span>
			</div>
			<?php esmarts_elated_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
		</div>
	</div>
</article>