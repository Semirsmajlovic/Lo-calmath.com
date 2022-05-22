<?php
$product = esmarts_elated_return_woocommerce_global_variable();

if ($product->is_on_sale()) { ?>
	<span class="eltdf-<?php echo esc_attr($class_name); ?>-onsale"><?php esc_html_e('SALE', 'esmarts'); ?></span>
<?php } ?>

<?php if (!$product->is_in_stock()) { ?>
	<span class="eltdf-<?php echo esc_attr($class_name); ?>-out-of-stock"><?php esc_html_e('SOLD', 'esmarts'); ?></span>
<?php }

$id  = get_the_ID();
$new = get_post_meta( $id, 'eltdf_show_new_sign_woo_meta', true );

if( 'yes' === $new ) { ?>
	<span class="eltdf-product-new"><?php esc_html_e( 'New', 'esmarts' ); ?></span>
<?php }

$product_image_size = 'shop_catalog';
if($image_size === 'full') {
	$product_image_size = 'full';
} else if ($image_size === 'square') {
	$product_image_size = 'esmarts_elated_image_square';
} else if ($image_size === 'landscape') {
	$product_image_size = 'esmarts_elated_image_landscape';
} else if ($image_size === 'portrait') {
	$product_image_size = 'esmarts_elated_image_portrait';
} else if ($image_size === 'medium') {
	$product_image_size = 'medium';
} else if ($image_size === 'large') {
	$product_image_size = 'large';
} else if ($image_size === 'shop_thumbnail') {
	$product_image_size = 'shop_thumbnail';
}

if(has_post_thumbnail()) {
	the_post_thumbnail(apply_filters( 'esmarts_elated_filter_product_list_image_size', $product_image_size));
}