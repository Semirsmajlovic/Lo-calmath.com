<?php
$image_size          = isset( $image_size ) ? $image_size : 'full';
$image_meta          = get_post_meta( get_the_ID(), 'eltdf_blog_list_featured_image_meta', true );
$has_featured        = ! empty( $image_meta ) || has_post_thumbnail();
$blog_list_image_id  = ! empty( $image_meta ) && esmarts_elated_blog_item_has_link() ? esmarts_elated_get_attachment_id_from_url( $image_meta ) : '';
$disable_featured    = is_single() && get_post_meta( get_the_ID(), 'eltdf_disable_post_featured_image_meta', true ) === 'yes' ? false : true;
?>

<?php if ( $has_featured && $disable_featured ) { ?>
	<div class="eltdf-post-image">
		<?php if ( esmarts_elated_blog_item_has_link() ) { ?>
			<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php } ?>
			<?php if ( ! empty( $blog_list_image_id ) ) {
				echo wp_get_attachment_image( $blog_list_image_id, $image_size );
			} else {
				the_post_thumbnail( $image_size );
			} ?>
		<?php if ( esmarts_elated_blog_item_has_link() ) { ?>
			</a>
		<?php } ?>
		<?php do_action('esmarts_elated_action_blog_inside_image_tag')?>
	</div>
<?php } ?>