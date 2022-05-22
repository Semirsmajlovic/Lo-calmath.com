<?php

/*
   Class: eSmartsElatedClassMultipleImages
   A class that initializes Elated Multiple Images
*/
class eSmartsElatedClassMultipleImages implements ieSmartsElatedInterfaceRender {
	private $name;
	private $label;
	private $description;

	function __construct($name,$label="",$description="") {
		global $theme_name_php_global_Framework;
		$this->name = $name;
		$this->label = $label;
		$this->description = $description;
		$theme_name_php_global_Framework->eltdMetaBoxes->addOption($this->name,"");
	}

	public function render($factory) {
		global $post;
		?>

		<div class="eltdf-page-form-section">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($this->label); ?></h4>
				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<ul class="eltdf-gallery-images-holder clearfix">
								<?php
								$image_gallery_val = get_post_meta( $post->ID, $this->name , true );
								if($image_gallery_val!='' ) $image_gallery_array=explode(',',$image_gallery_val);

								if(isset($image_gallery_array) && count($image_gallery_array)!=0):
									foreach($image_gallery_array as $gimg_id):
										$gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);
										echo '<li class="eltdf-gallery-image-holder"><img src="'.esc_url($gimage_wp[0]).'"/></li>';
									endforeach;
								endif;
								?>
							</ul>
							<input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr( $this->name) ?>" name="<?php echo esc_attr( $this->name) ?>">
							<div class="eltdf-gallery-uploader">
								<a class="eltdf-gallery-upload-btn btn btn-sm btn-primary" href="javascript:void(0)"><?php esc_html_e('Upload', 'esmarts'); ?></a>
								<a class="eltdf-gallery-clear-btn btn btn-sm btn-default pull-right" href="javascript:void(0)"><?php esc_html_e('Remove All', 'esmarts'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

/*
   Class: eSmartsElatedClassImagesVideos
   A class that initializes Elated Images Videos
*/
class eSmartsElatedClassImagesVideos implements ieSmartsElatedInterfaceRender {
	private $label;
	private $description;

	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<div class="eltdf_hidden_portfolio_images" style="display: none">
			<div class="eltdf-page-form-section">
				<div class="eltdf-field-desc">
					<h4><?php echo esc_html($this->label); ?></h4>
					<p><?php echo esc_html($this->description); ?></p>
				</div>
				<div class="eltdf-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-2">
								<em class="eltdf-field-description"><?php esc_html_e('Order Number', 'esmarts'); ?></em>
								<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" />
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="eltdf-field-description"><?php esc_html_e('Image', 'esmarts'); ?></em>
								<div class="eltdf-media-uploader">
									<div style="display: none" class="eltdf-media-image-holder">
										<img src="" alt="<?php esc_attr_e( 'Image thumbnail', 'esmarts' ); ?>" class="eltdf-media-image img-thumbnail" />
									</div>
									<div style="display: none" class="eltdf-media-meta-fields">
										<input type="hidden" class="eltdf-media-upload-url" name="portfolioimg_x" id="portfolioimg_x" />
										<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value="" />
										<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value="" />
									</div>
									<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'esmarts'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'esmarts'); ?>"><?php esc_html_e('Upload', 'esmarts'); ?></a>
									<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'esmarts'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-3">
								<em class="eltdf-field-description"><?php esc_html_e('Video Type', 'esmarts'); ?></em>
								<select class="form-control eltdf-form-element eltdf-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
									<option value=""></option>
									<option value="youtube"><?php esc_html_e('YouTube', 'esmarts'); ?></option>
									<option value="vimeo"><?php esc_html_e('Vimeo', 'esmarts'); ?></option>
									<option value="self"><?php esc_html_e('Self Hosted', 'esmarts'); ?></option>
								</select>
							</div>
							<div class="col-lg-3">
								<em class="eltdf-field-description"><?php esc_html_e('Video ID', 'esmarts'); ?></em>
								<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" />
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="eltdf-field-description"><?php esc_html_e( 'Video image', 'esmarts' ); ?></em>
								<div class="eltdf-media-uploader">
									<div style="display: none" class="eltdf-media-image-holder">
										<img src="" alt="<?php esc_attr_e( 'Image thumbnail', 'esmarts' ); ?>" class="eltdf-media-image img-thumbnail" />
									</div>
									<div style="display: none" class="eltdf-media-meta-fields">
										<input type="hidden" class="eltdf-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x" />
										<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value="" />
										<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value="" />
									</div>
									<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'esmarts'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'esmarts'); ?>"><?php esc_html_e('Upload', 'esmarts'); ?></a>
									<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'esmarts'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-4">
								<em class="eltdf-field-description"><?php esc_html_e('Video mp4', 'esmarts'); ?></em>
								<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" />
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<a class="eltdf_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e('Remove portfolio image/video', 'esmarts'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$no = 1;
		$portfolio_images = get_post_meta( $post->ID, 'eltd_portfolio_images', true );
		if (count($portfolio_images)>1 && esmarts_elated_core_plugin_installed()) {
			usort($portfolio_images, "eltdf_core_compare_portfolio_videos");
		}
		while (isset($portfolio_images[$no-1])) {
			$portfolio_image = $portfolio_images[$no-1];
			?>

			<div class="eltdf_portfolio_image" rel="<?php echo esc_attr($no); ?>" style="display: block;">
				<div class="eltdf-page-form-section">
					<div class="eltdf-field-desc">
						<h4><?php echo esc_html($this->label); ?></h4>
						<p><?php echo esc_html($this->description); ?></p>
					</div>
					<div class="eltdf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="eltdf-field-description"><?php esc_html_e('Order Number', 'esmarts'); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" />
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltdf-field-description"><?php esc_html_e('Image', 'esmarts'); ?></em>
									<div class="eltdf-media-uploader">
										<div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?> class="eltdf-media-image-holder">
											<img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(esmarts_elated_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']))); } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'esmarts' ); ?>" class="eltdf-media-image img-thumbnail"/>
										</div>
										<div style="display: none" class="eltdf-media-meta-fields">
											<input type="hidden" class="eltdf-media-upload-url" name="portfolioimg[]" id="portfolioimg_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
											<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value="" />
											<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value="" />
										</div>
										<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'esmarts'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'esmarts'); ?>"><?php esc_html_e('Upload', 'esmarts'); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'esmarts'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-3">
									<em class="eltdf-field-description"><?php esc_html_e('Video Type', 'esmarts'); ?></em>
									<select class="form-control eltdf-form-element eltdf-portfoliovideotype" name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
										<option value=""></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube"><?php esc_html_e('YouTube', 'esmarts'); ?></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo"><?php esc_html_e('Vimeo', 'esmarts'); ?></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self"><?php esc_html_e('Self Hosted', 'esmarts'); ?></option>
									</select>
								</div>
								<div class="col-lg-3">
									<em class="eltdf-field-description"><?php esc_html_e('Video ID', 'esmarts'); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>" />
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltdf-field-description"><?php esc_html_e( 'Video image', 'esmarts' ); ?></em>
									<div class="eltdf-media-uploader">
										<div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?> class="eltdf-media-image-holder">
											<img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(esmarts_elated_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']))); } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'esmarts' ); ?>" class="eltdf-media-image img-thumbnail"/>
										</div>
										<div style="display: none" class="eltdf-media-meta-fields">
											<input type="hidden" class="eltdf-media-upload-url" name="portfoliovideoimage[]" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
											<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
											<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
										</div>
										<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'esmarts'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'esmarts'); ?>"><?php esc_html_e('Upload', 'esmarts'); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'esmarts'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-4">
									<em class="eltdf-field-description"><?php esc_html_e('Video mp4', 'esmarts'); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>" />
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<a class="eltdf_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e('Remove portfolio image/video', 'esmarts'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$no++;
		}
		?>
		<br />
		<a class="eltdf_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/"><?php esc_html_e('Add portfolio image/video', 'esmarts'); ?></a>
	<?php
	}
}

/*
   Class: eSmartsElatedClassImagesVideos
   A class that initializes Elated Images Videos
*/
class eSmartsElatedClassImagesVideosFramework implements ieSmartsElatedInterfaceRender {
	private $label;
	private $description;

	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<div class="eltdf-hidden-portfolio-images"  style="display: none">
			<div class="eltdf-portfolio-toggle-holder">
				<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
					<span class="number">1</span><span class="eltdf-toggle-inner"><?php esc_html_e('Image - ', 'esmarts'); ?><em><?php esc_html_e('Order Number', 'esmarts'); ?></em></span>
				</div>
				<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltdf-portfolio-toggle-content">
				<div class="eltdf-page-form-section">
					<div class="eltdf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="eltdf-media-uploader">
										<em class="eltdf-field-description"><?php esc_html_e('Image', 'esmarts'); ?></em>
										<div style="display: none" class="eltdf-media-image-holder">
											<img src="" alt="<?php esc_attr_e( 'Image thumbnail', 'esmarts' ); ?>" class="eltdf-media-image img-thumbnail">
										</div>
										<div class="eltdf-media-meta-fields">
											<input type="hidden" class="eltdf-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
											<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value="">
											<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value="">
										</div>
										<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'esmarts'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'esmarts'); ?>"><?php esc_html_e('Upload', 'esmarts'); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'esmarts'); ?></a>
									</div>
								</div>
								<div class="col-lg-2">
									<em class="eltdf-field-description"><?php esc_html_e('Order Number', 'esmarts'); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
								</div>
							</div>
							<input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
							<input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
							<input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
							<input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="eltdf-hidden-portfolio-videos"  style="display: none">
			<div class="eltdf-portfolio-toggle-holder">
				<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
					<span class="number">2</span><span class="eltdf-toggle-inner"><?php esc_html_e('Video - ', 'esmarts'); ?><em><?php esc_html_e('Order Number', 'esmarts'); ?></em></span>
				</div>
				<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltdf-portfolio-toggle-content">
				<div class="eltdf-page-form-section">
					<div class="eltdf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="eltdf-media-uploader">
										<em class="eltdf-field-description"><?php esc_html_e('Cover Video Image', 'esmarts'); ?></em>
										<div style="display: none" class="eltdf-media-image-holder">
											<img src="" alt="<?php esc_attr_e( 'Image thumbnail', 'esmarts' ); ?>" class="eltdf-media-image img-thumbnail">
										</div>
										<div style="display: none" class="eltdf-media-meta-fields">
											<input type="hidden" class="eltdf-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
											<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value="">
											<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value="">
										</div>
										<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'esmarts'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'esmarts'); ?>"><?php esc_html_e('Upload', 'esmarts'); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'esmarts'); ?></a>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-2">
											<em class="eltdf-field-description"><?php esc_html_e('Order Number', 'esmarts'); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
										</div>
									</div>
									<div class="row next-row">
										<div class="col-lg-2">
											<em class="eltdf-field-description"><?php esc_html_e('Video Type', 'esmarts'); ?></em>
											<select class="form-control eltdf-form-element eltdf-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
												<option value=""></option>
												<option value="youtube"><?php esc_html_e('YouTube', 'esmarts'); ?></option>
												<option value="vimeo"><?php esc_html_e('Vimeo', 'esmarts'); ?></option>
												<option value="self"><?php esc_html_e('Self Hosted', 'esmarts'); ?></option>
											</select>
										</div>
										<div class="col-lg-2 eltdf-video-id-holder">
											<em class="eltdf-field-description" id="videoId"><?php esc_html_e('Video ID', 'esmarts'); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x">
										</div>
									</div>
									<div class="row next-row eltdf-video-self-hosted-path-holder">
										<div class="col-lg-4">
											<em class="eltdf-field-description"><?php esc_html_e('Video mp4', 'esmarts'); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x">
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$no = 1;
		$portfolio_images = get_post_meta( $post->ID, 'eltd_portfolio_images', true );
		if (count($portfolio_images)>1 && esmarts_elated_core_plugin_installed()) {
			usort($portfolio_images, "eltdf_core_compare_portfolio_videos");
		}
		while (isset($portfolio_images[$no-1])) {
			$portfolio_image = $portfolio_images[$no-1];
			if (isset($portfolio_image['portfolioimgtype']))
				$portfolio_img_type = $portfolio_image['portfolioimgtype'];
			else {
				if (stripslashes($portfolio_image['portfolioimg']) == true)
					$portfolio_img_type = "image";
				else
					$portfolio_img_type = "video";
			}
			if ($portfolio_img_type == "image") {
				?>

				<div class="eltdf-portfolio-images eltdf-portfolio-media" rel="<?php echo esc_attr($no); ?>">
					<div class="eltdf-portfolio-toggle-holder">
						<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
							<span class="number"><?php echo esc_attr($no); ?></span><span class="eltdf-toggle-inner"><?php esc_html_e('Image - ', 'esmarts'); ?><em><?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?></em></span>
						</div>
						<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
							<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="eltdf-portfolio-toggle-content" style="display: none">
						<div class="eltdf-page-form-section">
							<div class="eltdf-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="eltdf-media-uploader">
												<em class="eltdf-field-description"><?php esc_html_e('Image', 'esmarts'); ?></em>
												<div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?> class="eltdf-media-image-holder">
													<img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(esmarts_elated_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']))); } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'esmarts' ); ?>" class="eltdf-media-image img-thumbnail"/>
												</div>
												<div style="display: none" class="eltdf-media-meta-fields">
													<input type="hidden" class="eltdf-media-upload-url" name="portfolioimg[]" id="portfolioimg_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
													<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
													<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
												</div>
												<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'esmarts'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'esmarts'); ?>"><?php esc_html_e('Upload', 'esmarts'); ?></a>
												<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'esmarts'); ?></a>
											</div>
										</div>
										<div class="col-lg-2">
											<em class="eltdf-field-description"><?php esc_html_e('Order Number', 'esmarts'); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>">
										</div>
									</div>
									<input type="hidden" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" name="portfoliovideoimage[]">
									<input type="hidden" id="portfoliovideotype_<?php echo esc_attr($no); ?>" name="portfoliovideotype[]">
									<input type="hidden" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]">
									<input type="hidden" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="image">
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			} else {
				?>
				<div class="eltdf-portfolio-videos eltdf-portfolio-media" rel="<?php echo esc_attr($no); ?>">
					<div class="eltdf-portfolio-toggle-holder">
						<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
							<span class="number"><?php echo esc_attr($no); ?></span><span class="eltdf-toggle-inner"><?php esc_html_e('Video - ', 'esmarts'); ?><em><?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?></em></span>
						</div>
						<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="eltdf-portfolio-toggle-content" style="display: none">
						<div class="eltdf-page-form-section">
							<div class="eltdf-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="eltdf-media-uploader">
												<em class="eltdf-field-description"><?php esc_html_e('Cover Video Image', 'esmarts'); ?></em>
												<div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?> class="eltdf-media-image-holder">
													<img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(esmarts_elated_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']))); } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'esmarts' ); ?>" class="eltdf-media-image img-thumbnail"/>
												</div>
												<div style="display: none" class="eltdf-media-meta-fields">
													<input type="hidden" class="eltdf-media-upload-url" name="portfoliovideoimage[]" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
													<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
													<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
												</div>
												<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'esmarts'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'esmarts'); ?>"><?php esc_html_e('Upload', 'esmarts'); ?></a>
												<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'esmarts'); ?></a>
											</div>
										</div>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-lg-2">
													<em class="eltdf-field-description"><?php esc_html_e('Order Number', 'esmarts'); ?></em>
													<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>">
												</div>
											</div>
											<div class="row next-row">
												<div class="col-lg-2">
													<em class="eltdf-field-description"><?php esc_html_e('Video Type', 'esmarts'); ?></em>
													<select class="form-control eltdf-form-element eltdf-portfoliovideotype" name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
														<option value=""></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube"><?php esc_html_e('YouTube', 'esmarts'); ?></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo"><?php esc_html_e('Vimeo', 'esmarts'); ?></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self"><?php esc_html_e('Self Hosted', 'esmarts'); ?></option>
													</select>
												</div>
												<div class="col-lg-2 eltdf-video-id-holder">
													<em class="eltdf-field-description"><?php esc_html_e('Video ID', 'esmarts'); ?></em>
													<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>" />
												</div>
											</div>
											<div class="row next-row eltdf-video-self-hosted-path-holder">
												<div class="col-lg-4">
													<em class="eltdf-field-description"><?php esc_html_e('Video mp4', 'esmarts'); ?></em>
													<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>" />
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" id="portfolioimg_<?php echo esc_attr($no); ?>" name="portfolioimg[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="video">
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			$no++;
		}
		?>

		<div class="eltdf-portfolio-add">
			<a class="eltdf-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i><?php esc_html_e('Add Image', 'esmarts'); ?></a>
			<a class="eltdf-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e('Add Video', 'esmarts'); ?></a>
			<a class="eltdf-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e('Expand All', 'esmarts'); ?></a>
		</div>
	<?php
	}
}

class eSmartsElatedClassTwitterFramework implements  ieSmartsElatedInterfaceRender {
    public function render($factory) {
        $twitterApi = ElatedfTwitterApi::getInstance();
        $message = '';

        if(!empty($_GET['oauth_token']) && !empty($_GET['oauth_verifier'])) {
            if(!empty($_GET['oauth_token'])) {
                update_option($twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token']);
            }

            if(!empty($_GET['oauth_verifier'])) {
                update_option($twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier']);
            }

            $responseObj = $twitterApi->obtainAccessToken();
            if($responseObj->status) {
                $message = esc_html__('You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'esmarts');
            } else {
                $message = $responseObj->message;
            }
        }

        $buttonText = $twitterApi->hasUserConnected() ? esc_html__('Re-connect with Twitter', 'esmarts') : esc_html__('Connect with Twitter', 'esmarts');
    ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="eltdf-page-form-section" id="eltdf_enable_social_share">
            <div class="eltdf-field-desc">
                <h4><?php esc_html_e('Connect with Twitter', 'esmarts'); ?></h4>
                <p><?php esc_html_e('Connecting with Twitter will enable you to show your latest tweets on your site', 'esmarts'); ?></p>
            </div>
            <div class="eltdf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="eltdf-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html($buttonText); ?></a>
                            <input type="hidden" data-name="current-page-url" value="<?php echo esc_url($twitterApi->buildCurrentPageURI()); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

class eSmartsElatedClassInstagramFramework implements  ieSmartsElatedInterfaceRender {
    public function render( $factory ) {
        $instagram_api = ElatedInstagramApi::getInstance();
        $message       = '';

        //check if code parameter and instagram parameter is set in URL
        if ( ! empty( $_GET['code'] ) && ! empty( $_GET['instagram'] ) ) {
            //update code option so we can use it later
            $instagram_api->setConnectionType( 'instagram' );
            $instagram_api->instagramStoreCode();
            $instagram_api->instagramExchangeCodeForToken();
            $message = esc_html__( 'You have successfully connected with your Instagram Personal account.', 'esmarts' );
        }

        //check if code parameter and instagram parameter is set in URL
        if ( ! empty( $_GET['access_token'] ) && ! empty( $_GET['facebook'] ) ) {
            //update code option so we can use it later
            $instagram_api->setConnectionType( 'facebook' );
            $instagram_api->facebookStoreToken();
            $message = esc_html__( 'You have successfully connected with your Instagram Business account.', 'esmarts' );
        }

        //check if code parameter and instagram parameter is set in URL
        if ( ! empty( $_GET['disconnect'] ) ) {
            //update code option so we can use it later
            $instagram_api->disconnect();
            $message = esc_html__( 'You have have been disconnected from all Instagram accounts.', 'esmarts' );

        }
        ?>

        <?php if ( $message !== '' ) { ?>
            <div class="alert alert-success">
                <span><?php echo esc_html( $message ); ?></span>
            </div>
        <?php } ?>
        <div class="eltdf-page-form-section" id="eltdf_enable_social_share">
            <div class="eltdf-field-desc">
                <h4><?php esc_html_e( 'Connect with Instagram', 'esmarts' ); ?></h4>
                <p><?php esc_html_e( 'Connecting with Instagram will enable you to show your latest photos on your site', 'esmarts' ); ?></p>
            </div>
            <div class="eltdf-section-content">
                <div class="container-fluid">
                    <?php
                    $instagram_user_id = get_option( $instagram_api::INSTAGRAM_USER_ID );
                    $connection_type   = get_option( $instagram_api::CONNECTION_TYPE );
                    if ( $instagram_user_id ) { ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <p><?php echo esc_html__( 'You are currently connected to Instagram ID: ', 'esmarts' );
                                    echo esc_attr( $instagram_user_id ) ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <?php if ( ! empty( $_GET['disconnect'] ) ) { ?>
                            <div class="col-lg-4">
                                <a class="btn btn-primary" href="<?php echo esc_url( $instagram_api->reloadURL() ); ?>"><?php echo esc_html__( 'Reload Page', 'esmarts' ); ?></a>
                            </div>
                        <?php } else if ( empty( $connection_type ) ) { ?>
                            <div class="col-lg-4">
                                <a class="btn btn-primary" href="<?php echo esc_url( $instagram_api->instagramRequestCode() ); ?>"><?php echo esc_html__( 'Connect with Instagram Personal account', 'esmarts' ); ?></a>
                            </div>
<!--                            <div class="col-lg-4">-->
<!--                                <a class="btn btn-primary" href="--><?php //echo esc_url( $instagram_api->facebookRequestCode() ); ?><!--">--><?php //echo esc_html__( 'Connect with Instagram Business account', 'esmarts' ); ?><!--</a>-->
<!--                            </div>-->
                        <?php } else { ?>
                            <div class="col-lg-4">
                                <a class="btn btn-primary" href="<?php echo esc_url( $instagram_api->disconnectURL() ); ?>"><?php echo esc_html__( 'Disconnect Instagram account', 'esmarts' ) ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

/*
   Class: eSmartsElatedClassImagesVideos
   A class that initializes Elated Images Videos
*/
class eSmartsElatedClassOptionsFramework implements ieSmartsElatedInterfaceRender {
	private $label;
	private $description;


	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<div class="eltdf-portfolio-additional-item-holder" style="display: none">
			<div class="eltdf-portfolio-toggle-holder">
				<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
					<span class="number">1</span><span class="eltdf-toggle-inner"><?php esc_html_e('Additional Sidebar Item', 'esmarts'); ?> <em><?php esc_html_e('(Order Number, Item Title)', 'esmarts'); ?></em></span>
				</div>
				<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
					<span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltdf-portfolio-toggle-content">
				<div class="eltdf-page-form-section">
					<div class="eltdf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="eltdf-field-description"><?php esc_html_e('Order Number', 'esmarts'); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x">
								</div>
								<div class="col-lg-10">
									<em class="eltdf-field-description"><?php esc_html_e('Item Title', 'esmarts'); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionLabel_x" name="optionLabel_x">
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltdf-field-description"><?php esc_html_e('Item Text', 'esmarts'); ?></em>
									<textarea class="form-control eltdf-input eltdf-form-element" id="optionValue_x" name="optionValue_x"></textarea>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltdf-field-description"><?php esc_html_e('Enter Full URL for Item Text Link', 'esmarts'); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionUrl_x" name="optionUrl_x">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$no = 1;
		$portfolios = get_post_meta( $post->ID, 'eltd_portfolios', true );
		if (count($portfolios)>1 && esmarts_elated_core_plugin_installed()) {
			usort($portfolios, "eltdf_core_compare_portfolio_options");
		}
		while (isset($portfolios[$no-1])) {
			$portfolio = $portfolios[$no-1];
			?>
			<div class="eltdf-portfolio-additional-item" rel="<?php echo esc_attr($no); ?>">
				<div class="eltdf-portfolio-toggle-holder">
					<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
						<span class="number"><?php echo esc_attr($no); ?></span><span class="eltdf-toggle-inner"><?php esc_html_e('Additional Sidebar Item', 'esmarts'); ?> - <em>(<?php echo stripslashes($portfolio['optionlabelordernumber']); ?>, <?php echo stripslashes($portfolio['optionLabel']); ?>)</em></span>
					</div>
					<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
						<span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
						<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="eltdf-portfolio-toggle-content" style="display: none">
					<div class="eltdf-page-form-section">
						<div class="eltdf-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-2">
										<em class="eltdf-field-description"><?php esc_html_e('Order Number', 'esmarts'); ?></em>
										<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionlabelordernumber_<?php echo esc_attr($no); ?>" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber']) ? esc_attr(stripslashes($portfolio['optionlabelordernumber'])) : ""; ?>">
									</div>
									<div class="col-lg-10">
										<em class="eltdf-field-description"><?php esc_html_e('Item Title', 'esmarts'); ?></em>
										<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionLabel_<?php echo esc_attr($no); ?>" name="optionLabel[]" value="<?php echo esc_attr(stripslashes($portfolio['optionLabel'])); ?>">
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="eltdf-field-description"><?php esc_html_e('Item Text', 'esmarts'); ?></em>
										<textarea class="form-control eltdf-input eltdf-form-element" id="optionValue_<?php echo esc_attr($no); ?>" name="optionValue[]"><?php echo esc_attr(stripslashes($portfolio['optionValue'])); ?></textarea>
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="eltdf-field-description"><?php esc_html_e('Enter Full URL for Item Text Link', 'esmarts'); ?></em>
										<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionUrl_<?php echo esc_attr($no); ?>" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$no++;
		}
		?>

		<div class="eltdf-portfolio-add">
			<a class="eltdf-add-item btn btn-sm btn-primary" href="#"><?php esc_html_e('Add New Item', 'esmarts'); ?></a>
			<a class="eltdf-toggle-all-item btn btn-sm btn-default pull-right" href="#"><?php esc_html_e('Expand All', 'esmarts'); ?></a>
		</div>
	<?php
	}
}

class eSmartsElatedClassRepeater implements ieSmartsElatedInterfaceRender
{
    private $label;
    private $description;
    private $name;
    private $fields;
    private $num_of_rows;
    private $button_text;

    function __construct($fields, $name, $label = '', $description = '', $button_text = '')
    {
        global $theme_name_php_global_Framework;

        $this->label = $label;
        $this->description = $description;
        $this->fields = $fields;
        $this->name = $name;
        $this->num_of_rows = 1;
        $this->button_text = !empty($button_text) ? $button_text : esc_html__('Add New Item','esmarts');

        $counter = 0;
        foreach ($this->fields as $field) {

            if(!isset($this->fields[$counter]['options'])){
                $this->fields[$counter]['options'] = array();
            }
            if(!isset($this->fields[$counter]['args'])){
                $this->fields[$counter]['args'] = array();
            }
            if(!isset($this->fields[$counter]['hidden'])){
                $this->fields[$counter]['hidden'] = false;
            }
            if(!isset($this->fields[$counter]['label'])){
                $this->fields[$counter]['label'] = '';
            }
            if(!isset($this->fields[$counter]['description'])){
                $this->fields[$counter]['description'] = '';
            }
            if(!isset($this->fields[$counter]['default_value'])){
                $this->fields[$counter]['default_value'] = '';
            }

            $theme_name_php_global_Framework->eltdMetaBoxes->addOption($this->fields[$counter]['name'], $this->fields[$counter]['default_value']);
            $counter++;
        }
    }

    public function render($factory)
    {
        global $post;

        $clones = array();

        if(!empty($post)){
            $clones = get_post_meta($post->ID, $this->fields[0]['name'], true);
        }

        $sortable_class = 'eltdf-sortable-holder';

        foreach ($this->fields as $field) {
        	if ($field['type'] == 'textareahtml') {
        		$sortable_class = '';
        		break;
        	}
        }
        
        ?>
        <div class="eltdf-repeater-wrapper">
            <div class="eltdf-repeater-fields-holder <?php echo esc_attr($sortable_class);?> clearfix">
                <?php if (empty($clones)) { //first time
                    $counter = 0; ?>
                    <div class="eltdf-repeater-fields-row eltdf-initially-hidden">
                        <div class="eltdf-repeater-fields-row-inner">
                            <div class="eltdf-repeater-sort">
                                <i class="fa fa-sort"></i>
                            </div>
		                    <?php foreach ($this->fields as $field) { ?>
                                <div class="eltdf-repeater-field-item">
                                <?php
                                $factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => 0, 'value' => $field['default_value']));
                                ?>
                                </div>
		                    <?php
		                    $counter++;
		                	} ?>
                            <div class="eltdf-repeater-remove">
                                <a class="eltdf-clone-remove" href="#"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } else {
                    $j = 0;
                    $index = 0;
                    $values = array();
                    foreach ($this->fields as $field) {
                        if ($j++ === 0) { // avoid unnecessary get_post_meta call
                            $values[] = $clones;
                        } else {
                            $values[] = get_post_meta($post->ID, $field['name'], true);
                        }
                    }
                    while (isset($clones[$index])) { // rows
                        $count = 0; ?>
                        <div class="eltdf-repeater-fields-row">
                            <div class="eltdf-repeater-fields-row-inner">
                                <div class="eltdf-repeater-sort">
                                    <i class="fa fa-sort"></i>
                                </div>
		                        <?php foreach ($this->fields as $field) { // columns ?>
                                    <div class="eltdf-repeater-field-item">
                                    <?php			

                                    $factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => $index, 'value' => $values[$count][$index]));
                                    ?>
                                    </div>
		                            <?php
		                            $count++;
		                        } ?>
                                <div class="eltdf-repeater-remove">
                                    <a class="eltdf-clone-remove" href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php 
                        ++$index;
                    }
                    $this->num_of_rows = $index;
                }
                ?>
            </div>
            <div class="eltdf-repeater-add">
                <a class="eltdf-clone btn btn-sm btn-primary"
                   data-count="<?php echo esc_attr($this->num_of_rows) ?>"
                   href="#"><?php echo esc_html($this->button_text); ?></a>
            </div>
        </div>


        <?php

    }
}

class eSmartsElatedClassTableRepeater implements ieSmartsElatedInterfaceRender
{
    private $label;
    private $description;
    private $name;
    private $fields;
    private $num_of_rows;
    private $button_text;

    function __construct($fields, $name, $label = '', $description = '', $button_text = '')
    {
        global $theme_name_php_global_Framework;

        $this->label = $label;
        $this->description = $description;
        $this->fields = $fields;
        $this->name = $name;
        $this->num_of_rows = 1;
        $this->button_text = !empty($button_text) ? $button_text : esc_html__('Add New', 'esmarts');

        $counter = 0;
        foreach ($this->fields as $field) {
            if(!isset($this->fields[$counter]['options'])){
                $this->fields[$counter]['options'] = array();
            }
            if(!isset($this->fields[$counter]['args'])){
                $this->fields[$counter]['args'] = array();
            }
            if(!isset($this->fields[$counter]['hidden'])){
                $this->fields[$counter]['hidden'] = false;
            }
            if(!isset($this->fields[$counter]['label'])){
                $this->fields[$counter]['label'] = '';
            }
            if(!isset($this->fields[$counter]['description'])){
                $this->fields[$counter]['description'] = '';
            }
            if(!isset($this->fields[$counter]['default_value'])){
                $this->fields[$counter]['default_value'] = '';
            }

            $theme_name_php_global_Framework->eltdMetaBoxes->addOption($this->fields[$counter]['name'], $this->fields[$counter]['default_value']);
            $counter++;
        }
    }

    public function render($factory)
    {
        global $post;

        $clones = array();

        if(!empty($post)){
            $clones = get_post_meta($post->ID, $this->fields[0]['name'], true);
        }

        ?>
        <div class="eltdf-repeater-wrapper eltdf-question-answers">
            <table class="eltdf-repeater-fields-holder eltdf-table-layout clearfix">
                <thead>
                    <tr>
                        <th><?php esc_html_e('Order', 'esmarts') ?></th>
                        <?php foreach ($this->fields as $field) { ?>
                        <th><?php echo esc_html($field['th']); ?></th>
                        <?php } ?>
                        <th><?php esc_html_e('Remove', 'esmarts') ?></th>
                    </tr>
                </thead>
                <tbody class="eltdf-sortable-holder">
                <?php if (empty($clones)) { //first time
                    $counter = 0; ?>
                    <tr class="eltdf-repeater-fields-row eltdf-initially-hidden">
                        <td class="eltdf-repeater-sort">
                            <i class="fa fa-sort"></i>
                        </td>
                    <?php foreach ($this->fields as $field) { ?>

                        <td>
                        <?php
                        $factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => 0, 'value' => $field['default_value']));
                        $counter++;
                        ?>
                        </td>
                    <?php } ?>
                        <td class="eltdf-repeater-remove">
                            <a class="eltdf-clone-remove" href="#"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php } else {
                    $j = 0;
                    $index = 0;
                    $values = array();
                    foreach ($this->fields as $field) {
                        if ($j++ === 0) { // avoid unnecessary get_post_meta call
                            $values[] = $clones;
                        } else {
                            $values[] = get_post_meta($post->ID, $field['name'], true);
                        }
                    }
                    while (isset($clones[$index])) { // rows
                        $count = 0; ?>
                        <tr class="eltdf-repeater-fields-row">
                            <td class="eltdf-repeater-sort">
                                <i class="fa fa-sort"></i>
                            </td>
                            <?php foreach ($this->fields as $field) { // columns ?>
                                <td>
                                <?php
                                $factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => $index, 'value' => $values[$count][$index]));
                                ?>
                                </td>
                            <?php
                            $count++;
                        } ?>
                            <td class="eltdf-repeater-remove">
                                <a class="eltdf-clone-remove" href="#"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php
                        ++$index;
                    }
                    $this->num_of_rows = $index;
                }
                ?>
                </tbody>
            </table>
            <div class="eltdf-repeater-add">
                <a class="eltdf-clone btn btn-sm btn-primary"
                   data-count="<?php echo esc_attr($this->num_of_rows) ?>"
                   href="#"><?php echo esc_html($this->button_text); ?></a>
            </div>
        </div>


        <?php

    }
}

class eSmartsElatedClassParentChildRepeater implements ieSmartsElatedInterfaceRender
{
    private $num_of_rows;
    private $name;
    private $label;
    private $description;
    private $fields;
    private $not_used_fields;

    function __construct($name, $label = '', $description = '', $fields)
    {
        global $theme_name_php_global_Framework;

        $this->num_of_rows = 1;
        $this->name = $name;
        $this->label = $label;
        $this->description = $description;
        $this->fields = $fields;

        $counter = 0;
        foreach ($this->fields as $field) {
            if(!isset($this->fields[$counter]['options'])){
                $this->fields[$counter]['options'] = array();
            }
            if(!isset($this->fields[$counter]['args'])){
                $this->fields[$counter]['args'] = array();
            }
            if(!isset($this->fields[$counter]['hidden'])){
                $this->fields[$counter]['hidden'] = false;
            }
            if(!isset($this->fields[$counter]['label'])){
                $this->fields[$counter]['label'] = '';
            }
            if(!isset($this->fields[$counter]['description'])){
                $this->fields[$counter]['description'] = '';
            }
            if(!isset($this->fields[$counter]['default_value'])){
                $this->fields[$counter]['default_value'] = '';
            }

            $counter++;
        }
        $this->not_used_fields = $this->fields;
        $theme_name_php_global_Framework->eltdMetaBoxes->addOption($this->name, "");
    }

    public function render($factory)
    {
        global $post;

        $clones = array();
        if (!empty($post)) {
            $clones = get_post_meta($post->ID, $this->name, true);
        }

        ?>
        <div class="eltdf-repeater-wrapper">
            <div class="eltdf-repeater-fields-holder eltdf-enable-pc eltdf-sortable-holder clearfix" data-fields-number="<?php echo esc_attr(sizeof($this->fields)) ?>">
                <?php if(empty($clones)) {
                    foreach($this->fields as $field) {
                        $sorting_class = 'eltdf-sort-' . $field['role'];
                        if($field['role'] == 'parent') {
                            $sorting_class .= ' first-level';
                        } else {
                            $sorting_class .= ' second-level';
                        }
                        ?>
                        <div class="eltdf-repeater-fields-row <?php echo esc_attr($sorting_class); ?> eltdf-initially-hidden" data-name="<?php echo esc_attr($field['name']); ?>">
                            <div class="eltdf-repeater-fields-row-inner">
                                <div class="eltdf-repeater-sort">
                                    <i class="fa fa-sort"></i>
                                </div>
                                <div class="eltdf-repeater-field-item">
                                    <?php
                                        $factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => 0, 'name'=>$this->name, 'value' => $field['default_value']));
                                    ?>
                                </div>
                                <div class="eltdf-repeater-remove">
                                    <a class="eltdf-clone-remove" href="#" data-name="<?php echo esc_attr($field['name']); ?>"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else {
                    $index = 0;
                    $values =  $clones;
                    foreach($values as $value) {
                        if(is_numeric($value)) {
                            $type = get_post_type($value);
                            foreach($this->fields as $key => $field) {
                                if($field['name'] == $type) {
                                    unset($this->not_used_fields[$key]);
                                    $sorting_class = 'eltdf-sort-' . $field['role'];
                                    if($field['role'] == 'parent') {
                                        $sorting_class .= ' first-level';
                                    } else {
                                        $sorting_class .= ' second-level';
                                    } ?>
                                    <div class="eltdf-repeater-fields-row <?php echo esc_attr($sorting_class); ?>" data-name="<?php echo esc_attr($field['name']); ?>">
                                        <div class="eltdf-repeater-fields-row-inner">
                                            <div class="eltdf-repeater-sort">
                                                <i class="fa fa-sort"></i>
                                            </div>
                                            <div class="eltdf-repeater-field-item">
                                                <?php
                                                $factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => $index, 'name'=>$this->name, 'value' => $value));
                                                ?>
                                            </div>
                                            <div class="eltdf-repeater-remove">
                                                <a class="eltdf-clone-remove data-name="<?php echo esc_attr($field['name']); ?>"" href="#"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        } else {
                            foreach($this->fields as $key => $field) {
                                if($field['role'] == 'parent') {
                                    unset($this->not_used_fields[$key]);
                                    $sorting_class = 'eltdf-sort-parent';
                                    $sorting_class .= ' first-level';
                                    ?>
                                    <div class="eltdf-repeater-fields-row <?php echo esc_attr($sorting_class); ?>" data-name="<?php echo esc_attr($field['name']); ?>">
                                        <div class="eltdf-repeater-fields-row-inner">
                                            <div class="eltdf-repeater-sort">
                                                <i class="fa fa-sort"></i>
                                            </div>
                                            <div class="eltdf-repeater-field-item">
                                                <?php
                                                $factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => $index, 'name' => $this->name, 'value' => $value));
                                                ?>
                                            </div>
                                            <div class="eltdf-repeater-remove">
                                                <a class="eltdf-clone-remove" href="#" data-name="<?php echo esc_attr($field['name']); ?>"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                    ++$index;
                    }

                    foreach($this->not_used_fields as $field) {
                        $sorting_class = 'eltdf-sort-' . $field['role'];
                        if($field['role'] == 'parent') {
                            $sorting_class .= ' first-level';
                        } else {
                            $sorting_class .= ' second-level';
                        }
                        ?>
                        <div class="eltdf-repeater-fields-row <?php echo esc_attr($sorting_class); ?> eltdf-initially-hidden" data-name="<?php echo esc_attr($field['name']); ?>">
                            <div class="eltdf-repeater-fields-row-inner">
                                <div class="eltdf-repeater-sort">
                                    <i class="fa fa-sort"></i>
                                </div>
                                <div class="eltdf-repeater-field-item">
                                    <?php
                                    $factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => 0, 'name'=>$this->name, 'value' => $field['default_value']));
                                    ?>
                                </div>
                                <div class="eltdf-repeater-remove">
                                    <a class="eltdf-clone-remove" href="#" data-name="<?php echo esc_attr($field['name']); ?>"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
                ?>
            </div>
            <?php foreach($this->fields as $field) { ?>
                <div class="eltdf-repeater-add">
                    <a class="eltdf-clone btn btn-sm btn-primary"
                       data-count="<?php echo esc_attr($this->num_of_rows) ?>"
                       data-name="<?php echo esc_attr($field['name']) ?>"
                       href="#"><?php echo esc_html($field['button_text']); ?></a>
                </div>
            <?php } ?>
        </div>
        <?php
    }
}