<?php
$author_info_box       = esc_attr( esmarts_elated_options()->getOptionValue( 'blog_author_info' ) );
$author_info_email     = esc_attr( esmarts_elated_options()->getOptionValue( 'blog_author_info_email' ) );
$author_id             = esc_attr( get_the_author_meta( 'ID' ) );
$social_networks       = esmarts_elated_core_plugin_installed() ? esmarts_elated_get_user_custom_fields() : false;
$display_author_social = esmarts_elated_options()->getOptionValue( 'blog_single_author_social' ) === 'no' ? false : true;
?>
<?php if($author_info_box === 'yes' && get_the_author_meta('user_email') !== "") { ?>
	<div class="eltdf-author-description">
		<div class="eltdf-author-description-inner">
			<div class="eltdf-author-description-content">
				<div class="eltdf-author-description-image">
					<a itemprop="url" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" title="<?php the_title_attribute(); ?>" target="_self">
						<?php echo esmarts_elated_kses_img(get_avatar(get_the_author_meta( 'ID' ), 138)); ?>
					</a>
				</div>
				<div class="eltdf-author-description-text-holder">
					<h5 class="eltdf-author-name vcard author">
						<a itemprop="url" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" title="<?php the_title_attribute(); ?>" target="_self">
							<span class="fn">
							<?php
							if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
								echo esc_html(get_the_author_meta('first_name')) . " " . esc_html(get_the_author_meta('last_name'));
							} else {
								echo esc_html(get_the_author_meta('display_name'));
							}
							?>
							</span>
						</a>
					</h5>
					<?php if(get_the_author_meta('position') !== '') : ?>
						<div class="eltdf-author-position-holder">
							<p class="eltdf-author-position"><?php echo esc_html(get_the_author_meta('position', $author_id)); ?></p>
						</div>
					<?php endif; ?>
					<?php if(get_the_author_meta('description') != "") { ?>
						<div class="eltdf-author-text">
                            <?php
                                $description_text = strip_tags(get_the_author_meta('description', $author_id));
                            ?>
							<p itemprop="description"><?php echo esc_attr($description_text); ?></p>
						</div>
					<?php } ?>
					<?php if($display_author_social) { ?>
						<?php if(is_array($social_networks) && count($social_networks)){ ?>
							<div class="eltdf-author-social-icons clearfix">
								<?php foreach($social_networks as $network){ ?>
									<?php
									$icon_family = 'font_elegant';
									if(strpos($network['class'],'instagram')) {
										$icon_family = 'font_awesome';
									} ?>
									<a itemprop="url" href="<?php echo esc_url($network['link'])?>" target="_blank">
										<?php echo esmarts_elated_icon_collections()->renderIcon($network['class'], $icon_family); ?>
									</a>
								<?php }?>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>