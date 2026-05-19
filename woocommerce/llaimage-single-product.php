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

	<div class="image_removeonDesktop">
		<img src="https://www.livelifealarms.ca/wp-content/uploads/2021/11/4G-live-life-alarms-emergency-medical-pendant-alarm-gps-seniors.jpg" alt="" title="mobile-medical-alarm-system-slider-3 tst">
	</div>
	
	<div id="slider" class="fusion-flexslider slider_removeonMobile">
		<div class="order_mobile_row1"><?php masterslider(3); ?></div>
	</div>

</div>
