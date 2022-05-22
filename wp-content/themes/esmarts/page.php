<?php
$eltdf_sidebar_layout = esmarts_elated_sidebar_layout();

get_header();
esmarts_elated_get_title();
get_template_part( 'slider' );
do_action('esmarts_elated_action_before_main_content');
?>

<div class="eltdf-container eltdf-default-page-template">
	<?php do_action( 'esmarts_elated_action_after_container_open' ); ?>
	
	<div class="eltdf-container-inner clearfix">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="eltdf-grid-row">
				<div <?php echo esmarts_elated_get_content_sidebar_class(); ?>>
					<?php
						the_content();
						do_action( 'esmarts_elated_action_page_after_content' );
					?>
				</div>
				<?php if ( $eltdf_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo esmarts_elated_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
	</div>
	
	<?php do_action( 'esmarts_elated_action_before_container_close' ); ?>
</div>

<?php get_footer(); ?>