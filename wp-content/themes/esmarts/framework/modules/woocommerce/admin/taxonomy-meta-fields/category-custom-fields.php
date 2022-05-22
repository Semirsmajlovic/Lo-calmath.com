<?php

if( !function_exists('esmarts_elated_category_add_custom_meta_field') ) {

	function esmarts_elated_category_add_custom_meta_field() {

		$options = \eSmartsElatedClassIconCollections::get_instance()->getIconCollectionsEmpty();
		$icons_collections = \eSmartsElatedClassIconCollections::get_instance()->getIconCollectionsKeys();
		?>
		<div class="form-field">
			<label for="category_icon_pack"><?php esc_html_e('Icon Pack', 'esmarts'); ?></label>
			<select name="category_icon_pack" id="category_icon_pack" class="dependence">
				<?php foreach ($options as $option => $key) { ?>
					<option value="<?php echo esc_attr($option); ?>"><?php echo esc_attr($key); ?></option>
				<?php } ?>
			</select>
		</div>
		<?php foreach ($icons_collections as $icons_collection) {
		$icons_param = \eSmartsElatedClassIconCollections::get_instance()->getIconCollectionParamNameByKey($icons_collection);
		?>
		<div class="form-field mkd-icon-collection-holder" style="display: none"
			 data-icon-collection="<?php echo esc_attr($icons_collection); ?>">
			<label for="category_icon"><?php esc_html_e('Icon', 'esmarts'); ?></label>
			<select name="category_<?php echo esc_attr($icons_param) ?>"
					id="category_<?php echo esc_attr($icons_param) ?>">
				<?php
				$icons = \eSmartsElatedClassIconCollections::get_instance()->getIconCollection($icons_collection);
				foreach ($icons->icons as $option => $key) { ?>
					<option value="<?php echo esc_attr($option); ?>"><?php echo esc_attr($key); ?></option>
				<?php } ?>
			</select>
		</div>
	<?php } ?>

		<div class="form-field">
			<label for="category_image"><?php esc_html_e('Image', 'esmarts'); ?></label>
			<input type="hidden" id="category_image" name="category_image" class="custom_media_url"
				   value="">
			<div id="category-image-wrapper"></div>
			<p>
				<input type="button" class="button button-secondary category_media_button"
					   id="category_media_button" name="category_media_button"
					   value="<?php esc_html_e('Add Image', 'esmarts'); ?>"/>
				<input type="button" class="button button-secondary categorytax_media_remove"
					   id="categorytax_media_remove" name="categorytax_media_remove"
					   value="<?php esc_html_e('Remove Image', 'esmarts'); ?>"/>
			</p>
		</div>

		<?php
	}

	add_action('product_cat_add_form_fields', 'esmarts_elated_category_add_custom_meta_field', 10, 2);

}

if( !function_exists('esmarts_elated_category_edit_custom_meta_field') ) {

	function esmarts_elated_category_edit_custom_meta_field($term, $tax)
	{

		$category_image_id = get_term_meta($term->term_id, 'category_image', true);
		$category_icon_pack = get_term_meta($term->term_id, 'category_icon_pack', true);

		$options = \eSmartsElatedClassIconCollections::get_instance()->getIconCollectionsEmpty();
		$icons_collections = \eSmartsElatedClassIconCollections::get_instance()->getIconCollectionsKeys();

		?>
		<tr class="form-field">
			<th scope="row"><?php esc_html_e('Icon Pack', 'esmarts'); ?></th>
			<td>
				<select name="category_icon_pack" id="category_icon_pack" class="dependence">
					<?php foreach ($options as $option => $key) { ?>
						<option
							value="<?php echo esc_attr($option); ?>" <?php if ($option == $category_icon_pack) {
							echo 'selected';
						} ?>><?php echo esc_attr($key); ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<?php foreach ($icons_collections as $icons_collection) {
		$icons_param = \eSmartsElatedClassIconCollections::get_instance()->getIconCollectionParamNameByKey($icons_collection);
		$style = 'display:none';
		if ($category_icon_pack == $icons_collection) {
			$style = 'display:table-row';
		}
		?>
		<tr class="form-field mkd-icon-collection-holder" style="<?php echo esc_attr($style); ?>"
			data-icon-collection="<?php echo esc_attr($icons_collection); ?>">
			<th scope="row"><?php esc_html_e('Icon', 'esmarts'); ?></th>
			<td>
				<select name="category_<?php echo esc_attr($icons_param) ?>"
						id="category_<?php echo esc_attr($icons_param) ?>">
					<?php
					$icons = \eSmartsElatedClassIconCollections::get_instance()->getIconCollection($icons_collection);
					$activ_icon = get_term_meta($term->term_id, 'category_' . $icons_param, true);
					foreach ($icons->icons as $option => $key) { ?>
						<option value="<?php echo esc_attr($option); ?>" <?php if ($option == $activ_icon) {
							echo 'selected';
						} ?>><?php echo esc_attr($key); ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
	<?php } ?>
		<tr class="form-field">
			<th scope="row">
				<label for="category_image"><?php esc_html_e('Image', 'esmarts'); ?></label>
			</th>
			<td>
				<?php ?>
				<input type="hidden" id="category_image" name="category_image"
					   value="<?php echo esc_attr($category_image_id); ?>">
				<div id="category-image-wrapper">
					<?php if ($category_image_id) { ?>
						<?php echo wp_get_attachment_image($category_image_id, 'thumbnail'); ?>
					<?php } ?>
				</div>
				<p>
					<input type="button" class="button button-secondary category_media_button"
						   id="category_media_button" name="category_media_button"
						   value="<?php esc_html_e('Add Image', 'esmarts'); ?>"/>
					<input data-termid="<?php echo esc_attr($term->term_id); ?>" data-taxonomy="<?php echo esc_attr($tax); ?>" type="button"
						   class="button button-secondary categorytax_media_remove"
						   id="categorytax_media_remove" name="categorytax_media_remove"
						   value="<?php esc_html_e('Remove Image', 'esmarts'); ?>"/>
				</p>
			</td>
		</tr>

		<?php
	}

	add_action('product_cat_edit_form_fields', 'esmarts_elated_category_edit_custom_meta_field', 10, 2);

}


if( !function_exists('eltdf_save_category_custom_meta_field') ) {

	function eltdf_save_category_custom_meta_field($term_id) {

		$fileds = array('category_icon_pack', 'category_image');
		$icons_collections = \eSmartsElatedClassIconCollections::get_instance()->getIconCollectionsKeys();
		foreach ($icons_collections as $icons_collection) {
			$icons_param = \eSmartsElatedClassIconCollections::get_instance()->getIconCollectionParamNameByKey($icons_collection);
			$fileds[] = 'category_' . $icons_param;
		}
		foreach ($fileds as $value) {
			if (isset($_POST[$value]) && '' !== $_POST[$value]) {
				add_term_meta($term_id, $value, $_POST[$value]);
			}
		}
	}

	add_action('created_product_cat', 'eltdf_save_category_custom_meta_field', 10, 2);

}

if( !function_exists('eltdf_update_category_custom_meta_field') ) {

	function eltdf_update_category_custom_meta_field($term_id)
	{
		$fileds = array('category_icon_pack', 'category_image');
		$icons_collections = \eSmartsElatedClassIconCollections::get_instance()->getIconCollectionsKeys();
		foreach ($icons_collections as $icons_collection) {
			$icons_param = \eSmartsElatedClassIconCollections::get_instance()->getIconCollectionParamNameByKey($icons_collection);
			$fileds[] = 'category_' . $icons_param;
		}
		foreach ($fileds as $value) {
			if (isset($_POST[$value]) && '' !== $_POST[$value]) {
				update_term_meta($term_id, $value, $_POST[$value]);
			} else {
				update_term_meta($term_id, $value, '');
			}
		}
	}

	add_action('edited_product_cat', 'eltdf_update_category_custom_meta_field', 10, 2);

}
if( !function_exists('esmarts_elated_category_load_wp_media_files') ) {
	function esmarts_elated_category_load_wp_media_files()
	{
		wp_enqueue_media();
	}

	add_action('admin_enqueue_scripts', 'esmarts_elated_category_load_wp_media_files');
}

if( !function_exists('esmarts_elated_category_add_script') ) {
	function esmarts_elated_category_add_script()
	{

		?>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {

				function mkd_media_upload(button_class) {
					var _custom_media = true,
						_orig_send_attachment = wp.media.editor.send.attachment;
					$('body').on('click', button_class, function (e) {
						var button_id = '#' + $(this).attr('id');
						var button = $(button_id);
						_custom_media = true;
						wp.media.editor.send.attachment = function (props, attachment) {
							if (_custom_media) {
								$('#category_image').val(attachment.id);
								$('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
								$('#category-image-wrapper .custom_media_image').attr('src', attachment.sizes.thumbnail.url).css('display', 'block');
							} else {
								return _orig_send_attachment.apply(button_id, [props, attachment]);
							}
						}
						wp.media.editor.open(button);
						return false;
					});
				}

				mkd_media_upload('.category_media_button.button');
				$('body').on('click', '.categorytax_media_remove', function () {
					var $this = $(this);

					/** Make sure the user didn't hit the button by accident and they really mean to delete the image **/
					if ($('#category_image').val() !== '' && confirm('Are you sure you want to delete this file?')) {
						var result = $.ajax({
							url: '/wp-admin/admin-ajax.php',
							type: 'GET',
							data: {
								action: 'esmarts_elated_tax_del_image',
								term_id: $this.data('termid'),
								taxonomy: $this.data('taxonomy')
							},
							dataType: 'text'
						});

						result.success(function (data) {
							$('#eltdf-uploaded-image').remove();
						});
						result.fail(function (jqXHR, textStatus) {
							console.log("Request failed: " + textStatus);
						});

						$('#category_image').val('');
						$('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
					}

				});

				$(document).ajaxComplete(function (event, xhr, settings) {
					var queryStringArr = settings.data.split('&');
					if ($.inArray('action=add-tag', queryStringArr) !== -1) {
						var xml = xhr.responseXML;
						$response = $(xml).find('term_id').text();
						if ($response != "") {
							// Clear the thumb image
							$('#category-image-wrapper').html('');
						}
					}
				});

				eltdfInitTermIconSelectChange();
				function eltdfInitTermIconSelectChange() {
					$(document).on('change', 'select.dependence', function (e) {
						var valueSelected = this.value.replace(/ /g, '');
						$('.form-field.mkd-icon-collection-holder').fadeOut();
						$('.form-field[data-icon-collection="' + valueSelected + '"]').fadeIn();

					});
				}

			});
		</script>
	<?php }

	add_action('admin_footer', 'esmarts_elated_category_add_script');
}

if( !function_exists('esmarts_elated_tax_del_image') ) {
	/** Metabox Delete Image **/
	function esmarts_elated_tax_del_image()
	{

		/** If we don't have a term_id, bail out **/
		if (!isset($_GET['term_id'])) {
			echo esc_html('Not Set or Empty', 'esmarts');
			exit;
		}

		$term_id = $_GET['term_id'];
		$imageID = get_term_meta($term_id, 'category_image', true);  // Get our attachment ID

		if (is_numeric($imageID)) {                              // Verify that the attachment ID is indeed a number
			wp_delete_attachment($imageID);                       // Delete our image
			delete_term_meta($term_id, 'category_image');// Delete our image meta
			exit;
		}

		echo esc_html__('Contact Administrator', 'esmarts'); // If we've reached this point, something went wrong - enable debugging
		exit;
	}

	add_action('wp_ajax_esmarts_elated_tax_del_image', 'esmarts_elated_tax_del_image');
}

if( !function_exists('esmarts_elated_delete_associated_term_media') ) {
	/** Delete Associated Media Upon Term Deletion **/
	function esmarts_elated_delete_associated_term_media($term_id, $tax)
	{
		global $wp_taxonomies;

		if (isset($term_id, $tax, $wp_taxonomies) && isset($wp_taxonomies[$tax])) {
			$imageID = get_term_meta($term_id, 'category_image', true);

			if (is_numeric($imageID)) {
				wp_delete_attachment($imageID);
			}
		}
	}

	add_action('pre_delete_term', 'esmarts_elated_delete_associated_term_media', 10, 2);
}
