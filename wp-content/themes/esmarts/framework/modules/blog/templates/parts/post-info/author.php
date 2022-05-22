<div class="eltdf-post-info-author">
    <a itemprop="author" class="eltdf-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
        <?php echo esmarts_elated_kses_img(get_avatar(get_the_author_meta('ID'), 30)); ?>
	    <span class="eltdf-pi-author-label"><?php esc_html_e('by', 'esmarts'); ?></span>
	    <span class="eltdf-pi-author-name"><?php the_author_meta('display_name'); ?></span>
    </a>
</div>