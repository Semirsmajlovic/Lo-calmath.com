<?php
$blog_single_navigation = esmarts_elated_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = esmarts_elated_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="eltdf-blog-single-navigation clearfix">
		<?php
		/* Single navigation section - SETTING PARAMS */
		$post_navigation = array(
			'prev' => array(
				'title' => '',
				'image' => '',
				'label' => '<span class="eltdf-blog-single-nav-label">'.esc_html__('Previous', 'esmarts').'</span>'
			),
			'next' => array(
				'title' => '',
				'image' => '',
				'label' => '<span class="eltdf-blog-single-nav-label">'.esc_html__('Next', 'esmarts').'</span>'
			)
		);
		
		if(get_previous_post() !== ""){
			if($blog_navigation_through_same_category){
				if(get_previous_post(true) !== ""){
					$post_navigation['prev']['post'] = get_previous_post(true);
				}
			} else {
				if(get_previous_post() != ""){
					$post_navigation['prev']['post'] = get_previous_post();
				}
			}
			
			if($post_navigation['prev']['post']->post_title != '') {
				$post_navigation['prev']['title'] = '<span class="eltdf-blog-single-nav-title-text">'.$post_navigation['prev']['post']->post_title.'</span>';
			}
			
			$prev_post_ID = $post_navigation['prev']['post']->ID;
			$prev_background_image_src = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post_ID), array(78, 0));
			$prev_post_thumbnail = $prev_background_image_src[0];
			
			if($prev_post_thumbnail != '') {
				$post_navigation['prev']['image'] = '<img class="eltdf-nav-image" src="'.esc_url($prev_post_thumbnail).'" alt="'. esc_attr__(' Post Image', 'esmarts') .'">';
			}
		}
		if(get_next_post() != ""){
			if($blog_navigation_through_same_category){
				if(get_next_post(true) !== ""){
					$post_navigation['next']['post'] = get_next_post(true);
					
				}
			} else {
				if(get_next_post() !== ""){
					$post_navigation['next']['post'] = get_next_post();
				}
			}
			
			if($post_navigation['next']['post']->post_title != '') {
				$post_navigation['next']['title'] = '<span class="eltdf-blog-single-nav-title-text">'.$post_navigation['next']['post']->post_title.'</span>';
			}
			
			$next_post_ID = $post_navigation['next']['post']->ID;
			$next_background_image_src = wp_get_attachment_image_src(get_post_thumbnail_id($next_post_ID), array(78, 0));
			$next_post_thumbnail = $next_background_image_src[0];
			
			if($next_post_thumbnail != '') {
				$post_navigation['next']['image'] = '<img class="eltdf-nav-image" src="'.esc_url($next_post_thumbnail).'" alt="'. esc_attr__(' Post Image', 'esmarts') .'">';
			}
		}
		
		if (isset($post_navigation['prev']['post']) || isset($post_navigation['next']['post'])) {
			foreach (array('prev', 'next') as $nav_type) {
				if (isset($post_navigation[$nav_type]['post'])) { ?>
					<?php $eltdf_has_thumb = isset($post_navigation[$nav_type]['image']) && !empty($post_navigation[$nav_type]['image']); ?>
					<?php $eltdf_nav_class = !$eltdf_has_thumb ? ' eltdf-no-nav-image' : '';  ?>
					<a itemprop="url" class="eltdf-blog-single-<?php echo esc_attr($nav_type); ?> <?php echo esc_attr($eltdf_nav_class); ?>" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
						<?php if($eltdf_has_thumb) { ?>
							<div class="eltdf-nav-blog-post-image">
								<?php echo wp_kses($post_navigation[$nav_type]['image'], array('img' => array('class' => true, 'src' => true, 'alt' => true))); ?>
							</div>
						<?php } ?>
						<div class="eltdf-nav-blog-post-label-wrapper">
							<?php echo wp_kses($post_navigation[$nav_type]['label'], array('span' => array('class' => true))); ?>
							<p class="eltdf-blog-single-nav-title">
								<?php echo wp_kses($post_navigation[$nav_type]['title'], array('span' => array('class' => true))); ?>
							</p>
						</div>
					</a>
				<?php }
			}
		}
		?>
	</div>
<?php } ?>
