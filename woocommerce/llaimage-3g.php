<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version	 2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

if ( ! Avada()->settings->get( 'disable_woo_gallery' ) ) {
	include WC()->plugin_path() . '/templates/single-product/product-image.php';
	return;
}
?>
<div class="images">

	<div id="slider" class="fusion-flexslider">
		<div class="order_mobile_row1"><?php masterslider(9); ?></div>
	</div>

</div>
