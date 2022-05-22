<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if(!defined('ABSPATH')) {
	die('-1');
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

global $post;

$event_id = get_the_ID();

$price_class = '';
if(tribe_get_cost(null, true) === 'Free') {
	$price_class = 'eltdf-free';
}
?>

<div id="tribe-events-content" class="tribe-events-single eltdf-tribe-events-single">
	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<div class="eltdf-events-single-main-info clearfix">
		<div class="eltdf-events-single-date-holder">
			<div class="eltdf-events-single-date-inner">
				<span class="eltdf-events-single-date-day">
					<?php echo tribe_get_start_date(null, true, 'd'); ?>
				</span>

				<span class="eltdf-events-single-date-month">
					<?php echo tribe_get_start_date(null, true, 'M'); ?>
				</span>
			</div>
		</div>
		<div class="eltdf-events-single-title-holder">
			<h3 class="eltdf-events-single-title"><?php the_title(); ?></h3>
			<div class="eltdf-events-single-date">
				<span class="eltdf-events-single-info-icon">
					<?php echo esmarts_elated_icon_collections()->renderIcon('lnr-clock', 'linear_icons'); ?>
				</span>
				<?php echo tribe_events_event_schedule_details($event_id); ?>
			</div>
			<?php if(tribe_get_cost($event_id)) { ?>
			<div class="eltdf-events-single-cost <?php echo  esc_attr($price_class)?>">
				<?php echo tribe_get_cost(null, true); ?>
			</div>
			<?php } ?>
		</div>
	</div>

	<div class="eltdf-events-single-main-content">
		<div class="eltdf-grid-row eltdf-events-single-media">
			<div class="eltdf-events-single-featured-image eltdf-grid-col-6">
				<?php echo tribe_event_featured_image($event_id, 'full', false); ?>
			</div>
			<div class="eltdf-events-single-map eltdf-grid-col-6">
				<?php tribe_get_template_part('modules/meta/map'); ?>
			</div>
		</div>
		<div class="eltdf-events-single-content-holder">
			<?php do_action('tribe_events_single_event_before_the_content') ?>

			<?php the_content(); ?>

			<?php do_action('tribe_events_single_event_after_the_content') ?>
		</div>
	</div>

	<div class="eltdf-events-single-meta">
		<?php do_action('tribe_events_single_event_before_the_meta') ?>
		<h4><?php esc_html_e('Event Details', 'esmarts'); ?></h4>

		<div class="eltdf-events-single-meta-holder eltdf-grid-row">
			<div class="eltdf-grid-col-4">
				<div class="eltdf-events-single-meta-item">
					<span class="eltdf-events-single-meta-icon">
						<?php echo esmarts_elated_icon_collections()->renderIcon('lnr-calendar-full', 'linear_icons'); ?>
					</span>
					<span class="eltdf-events-single-meta-label"><?php esc_html_e('Date:', 'esmarts'); ?></span>
					<span class="eltdf-events-single-meta-value">
						<?php echo tribe_events_event_schedule_details(); ?>
					</span>
				</div>

				<div class="eltdf-events-single-meta-item">
					<span class="eltdf-events-single-meta-icon">
						<?php echo esmarts_elated_icon_collections()->renderIcon('lnr-clock', 'linear_icons'); ?>
					</span>
					<span class="eltdf-events-single-meta-label"><?php esc_html_e('Time:', 'esmarts'); ?></span>
					<span class="eltdf-events-single-meta-value">
						<?php echo tribe_get_start_time(); ?> - <?php echo tribe_get_end_time(); ?>
					</span>
				</div>

				<?php if(tribe_has_venue()) : ?>
					<div class="eltdf-events-single-meta-item">
						<span class="eltdf-events-single-meta-icon">
							<?php echo esmarts_elated_icon_collections()->renderIcon('lnr-apartment', 'linear_icons'); ?>
						</span>
						<span class="eltdf-events-single-meta-label"><?php esc_html_e('Venue:', 'esmarts'); ?></span>
						<span class="eltdf-events-single-meta-value">
							<?php echo esc_html(tribe_get_venue()); ?>
						</span>
					</div>

					<?php if(tribe_address_exists()) : ?>
						<div class="eltdf-events-single-meta-item">
							<span class="eltdf-events-single-meta-icon">
								<?php echo esmarts_elated_icon_collections()->renderIcon(' lnr-map-marker', 'linear_icons'); ?>
							</span>
							<span class="eltdf-events-single-meta-label"><?php esc_html_e('Address:', 'esmarts'); ?></span>
							<span class="eltdf-events-single-meta-value">
								<?php echo tribe_get_address(); ?>
							</span>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<div class="eltdf-grid-col-4">
				<?php if(tribe_has_organizer()) : ?>
                    <?php 
                        $organizer_ids = tribe_get_organizer_ids(); 
                        foreach ( $organizer_ids as $organizer ) {
                    ?>
					<div class="eltdf-events-single-meta-item">
						<span class="eltdf-events-single-meta-icon">
							<?php echo esmarts_elated_icon_collections()->renderIcon('lnr-user', 'linear_icons'); ?>
						</span>
                        
						<span class="eltdf-events-single-meta-label"><?php esc_html_e('Organizer Name:', 'esmarts'); ?></span>
						<span class="eltdf-events-single-meta-value">
                            
                        <?php 
                                echo tribe_get_organizer_link( $organizer );
                        ?>
                            
						</span>
					</div>
                    <?php
                        }
                    ?>
				<?php endif; ?>

				<?php if(tribe_get_organizer_phone()) : ?>
					<div class="eltdf-events-single-meta-item">
						<span class="eltdf-events-single-meta-icon">
							<?php echo esmarts_elated_icon_collections()->renderIcon('lnr-phone-handset', 'linear_icons'); ?>
						</span>
						<span class="eltdf-events-single-meta-label"><?php esc_html_e('Phone:', 'esmarts'); ?></span>
						<span class="eltdf-events-single-meta-value">
							<?php echo esc_html(tribe_get_organizer_phone()); ?>
						</span>
					</div>
				<?php endif; ?>

				<?php if(tribe_get_organizer_email()) : ?>
					<div class="eltdf-events-single-meta-item">
						<span class="eltdf-events-single-meta-icon">
							<?php echo esmarts_elated_icon_collections()->renderIcon('lnr-envelope', 'linear_icons'); ?>
						</span>
						<span class="eltdf-events-single-meta-label"><?php esc_html_e('Email:', 'esmarts'); ?></span>
						<span class="eltdf-events-single-meta-value">
							<a href="mailto: <?php echo tribe_get_organizer_email(); ?>">
								<?php echo esc_html(tribe_get_organizer_email()); ?>
							</a>
						</span>
					</div>
				<?php endif; ?>

				<?php if(tribe_get_organizer_website_link()) : ?>
					<div class="eltdf-events-single-meta-item">
						<span class="eltdf-events-single-meta-icon">
							<?php echo esmarts_elated_icon_collections()->renderIcon('lnr-earth', 'linear_icons'); ?>
						</span>
						<span class="eltdf-events-single-meta-label"><?php esc_html_e('Website:', 'esmarts'); ?></span>
						<span class="eltdf-events-single-meta-value">
							<a target="_blank" href="<?php echo tribe_get_organizer_website_url(); ?>">
								<?php echo tribe_get_organizer_website_url(); ?>
							</a>
						</span>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="eltdf-events-single-navigation-holder clearfix">
			<div class="eltdf-events-single-prev-event">
				<?php
				$prev_event = Tribe__Events__Main::instance()->get_closest_event($post, 'previous');
				if($prev_event !== null) {
				?>
				<a class="eltdf-events-nav-image" href="<?php echo esc_url(tribe_get_event_link($prev_event)); ?>" target="_self" itemprop="url">
					<?php echo get_the_post_thumbnail($prev_event, 'esmarts_elated_square'); ?>
				</a>
				<span class="eltdf-events-nav-text">
					<span class="eltdf-events-nav-label"><?php esc_html_e('Previous' , 'esmarts')?></span>
					<?php tribe_the_prev_event_link('%title%'); ?>
				</span>
				<?php } ?>

			</div>

			<div class="eltdf-events-single-next-event">
				<?php
				$next_event = Tribe__Events__Main::instance()->get_closest_event($post, 'next');
				if($next_event !== null) {
				?>

				<span class="eltdf-events-nav-text">
					<span class="eltdf-events-nav-label"><?php esc_html_e('Next' , 'esmarts')?></span>
					<?php tribe_the_next_event_link('%title%'); ?>
				</span>
				<a class="eltdf-events-nav-image" href="<?php echo esc_url(tribe_get_event_link($next_event)); ?>" target="_self" itemprop="url">
					<?php echo get_the_post_thumbnail($next_event, 'esmarts_elated_square'); ?>
				</a>
				<?php } ?>

			</div>
		</div>

		<?php do_action('tribe_events_single_event_after_the_meta'); ?>
	</div>
</div>
