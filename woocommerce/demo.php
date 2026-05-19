<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
get_header( 'shop' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php endwhile; ?>
    <div class="demo_container">
        <div class="slider-container">
         <div id="slider" class="fusion-flexslider slider_removeonMobile">
             <?php $slider_id = get_post_meta($product->get_id(), 'slider_id', true); ?>
			<div class="order_mobile_row1"><?php masterslider($slider_id); ?></div>
		</div>
          
          
        </div>
        <div class="product-container">
            <?php do_action( 'woocommerce_before_single_product' ); ?>
            <p style="color:#ff0000; font-weight: 800; font-size: 18px;"><?php echo "$".$product->get_price(); ?></p>
            
            <?php do_action( 'woocommerce_single_product_summary' ); ?>
            
            <?php do_action( 'woocommerce_after_single_product' ); ?>
            
        </div>
    </div>

<style>
    .demo_container {
        max-width: 1480px;
        margin:auto;
        display: grid;
        grid-template-columns: 49% 49%;
        grid-column-gap: 2%;
        
    }
    .product_meta { display: none; }
    .quantity.buttons_added { border: 1px solid #ccc !important; }
    .form.cart { margin-top: 0px !important; }
    .avada-variation.single_variation .woocommerce-variation-price{ display: none; }
    @media only screen and (max-width: 1024px) {
        .demo_container {
            display: block;
            margin-top: 25px;
            margin-bottom: 25px;
            padding: 15px;
        }
    }
    
    .price {
        display: none;
    }
</style>

<?php get_footer( 'shop' ); ?>