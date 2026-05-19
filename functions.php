<?php
function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [] );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 20 );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

/*== HEADER SLOGAN - CONTACT INFO ==*/
function header_contact_info () { ?>
	<div class="header_tagline"><?php dynamic_sidebar( 'header_slogan-1' ); ?></div>
	<div class="header_contact_info"><?php dynamic_sidebar( 'header_contact_info' ); ?></div>
<?php }
add_filter( 'avada_logo_append', 'header_contact_info');


if (function_exists('register_sidebar')) {
			register_sidebar(array(
			'name' => __('Header Contact','avada-framework' ),
			'id'   => 'header_contact_info',
			'description'   => __( 'These are widgets for the Header Contact Widget.','avada-framework' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title"><span>',
			'after_title'   => '</span></h3>'
		));
}
if (function_exists('register_sidebar')) {
			register_sidebar(array(
			'name' => __('Header Slogan','avada-framework' ),
			'id'   => 'header_slogan-1',
			'description'   => __( 'These are widgets for the Header Slogan Widget.','avada-framework' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title"><span>',
			'after_title'   => '</span></h3>'
		));
}

add_filter('add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect() {
	global $woocommerce;
 	$checkout_url = $woocommerce->cart->get_checkout_url();
 	return $checkout_url;
}

function terms_and_condition_check_by_default ( $terms_is_checked ) {
	return true;
}
add_filter( 'woocommerce_terms_is_checked_default', 'terms_and_condition_check_by_default', 10 );


function programming_option( $checkout ) {
	global $woocommerce;

	foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
		$_product = $values['data'];
		
		if ( $_product->id === 1523 ) {
			echo '<h2 style="display:block; clear:both; padding-top: 10px;"><strong><span style="color: #4a4c9a;">4GX Programming </span>Information</strong></h2>';
			echo '<div class="checkout_title_line"></div>';
			echo '<div class="progamming_container">'; 
			echo '<img src="https://www.livelifealarms.ca/wp-content/uploads/2016/11/pendant-alarms-free-programming-teardrop.png" alt="pendant-alarms-free-programming-teardrop" width="105" height="122" class="alignright size-full wp-image-556" />';
			echo '<p>' .__("We'll be in contact with you shortly after your order is complete.") . '</p>';
			echo '<p>' .__("We'll ask you to give us up to 6 phone numbers you'd like pre-programmed.") . '</p>';
			echo '<p>' .__("Please check your SPAM or Junk folder for an email that contains the setup-form link. Be sure to enter your order number on it. Once we receive the setup-form, your order will be placed in the que to be programmed. From the time we receive your setup form, delivery is approximately 10 - 12 business days. Once your order is complete, you will receive a tracking number.") . '</p>';
			echo '</div>';
			echo '<div style="clear:both; height: 45px;"></div>';

		} else if ( $_product->id === 6321 ) {
			echo '<h2 style="display:block; clear:both; padding-top: 10px;"><strong><span style="color: #4a4c9a;">3G Programming </span>Information</strong></h2>';
			echo '<div class="checkout_title_line"></div>';
			echo '<div class="progamming_container">'; 
			echo '<img src="https://www.livelifealarms.ca/wp-content/uploads/2016/11/pendant-alarms-free-programming-teardrop.png" alt="pendant-alarms-free-programming-teardrop" width="105" height="122" class="alignright size-full wp-image-556" />';
			echo '<p>' .__("We'll be in contact with you shortly after your order is complete.") . '</p>';
			echo '<p>' .__("We'll ask you to give us up to 5 phone numbers you'd like pre-programmed.") . '</p>';
			echo '</div>';
			echo '<div style="clear:both; height: 45px;"></div>';
		} 
		
	}
	echo '<img src="https://www.livelifealarms.ca/wp-content/uploads/2016/11/buy-personal-alarm-checkout-cart-icon.png" alt="buy-personal-alarm-checkout-cart-icon" width="34" height="33" class="alignleft size-full wp-image-551" />';
	echo '<h2><strong><span style="color: #4a4c9a;">Your Order </span>Details</strong></h2>';
	echo '<div class="checkout_title_line"></div>';

}
add_action( 'woocommerce_checkout_after_customer_details', 'programming_option' );


add_filter( 'postmeta_form_limit', 'meta_limit_increase' );
function meta_limit_increase( $limit ) {
    return 100;
}


// add_action( 'woocommerce_email_before_order_table', 'add_content', 20 );
 
function add_content($order) {
    if($order->get_status() != 'completed') {
echo '<p>So that we can quickly program your Mobile Alarm here&#39;s a link to our easy online setup form: <a href="https://www.livelifealarms.ca/setup-form" style="font-size:17px;">https://www.livelifealarms.ca/setup-form</a></p>';
}
}


function lla_setup_content_on_email( $order ) {

    if ( ! $order || $order->get_status() == 'completed' ) {
        return;
    }

    // Watch product IDs
    $watch_product_ids = array(24433, 20195); 

    // Pendant product IDs
    $pendant_product_ids = array(1523, 24429); 

    $hasPendant = $hasWatch = FALSE;

    // Default URL
    $setup_url = 'https://www.livelifealarms.ca/setup-form/';

    // Check if any order item matches one of the watch product IDs
    foreach ( $order->get_items() as $item ) {
        $product_id = $item->get_product_id();
        if ( in_array( $product_id, $watch_product_ids ) ) {
            $hasWatch = TRUE;
            break;
        }
    }

    // Check if any order item matches one of the watch product IDs
    foreach ( $order->get_items() as $item ) {
        $product_id = $item->get_product_id();
        if ( in_array( $product_id, $pendant_product_ids ) ) {
            $hasPendant = TRUE;
            break;
        }
    }
    
    if(!$hasPendant && !$hasWatch){
        return;
    }

    if($hasPendant){
        $setup_url = $setup_url;
    }
    else{
        if($hasWatch){
            $setup_url = $setup_url . '?setupfor=watch';
        }
    }

    // Output message
    echo '<p>So that we can quickly program your Mobile Alarm here&#39;s a link to our easy online setup form: 
    <a href="' . esc_url( $setup_url ) . '" style="font-size:17px;">' . esc_html( $setup_url ) . '</a></p>';
}
add_action( 'woocommerce_email_before_order_table', 'lla_setup_content_on_email', 20 );



add_filter( 'woocommerce_billing_fields', 'wc_npr_filter_email', 10, 1 );
function wc_npr_filter_email( $address_fields ) {
	$address_fields['billing_email']['required'] = false;
	return $address_fields;
}

add_action( 'woocommerce_checkout_update_order_meta', 'update_order_meta' );
function update_order_meta( $order_id ) {
  $no_option = " ";
  update_post_meta( $order_id, 'Contact person 1 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Contact person 2 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Contact person 3 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Contact person 4 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Contact person 5 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Contact person 6 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'IMEI', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Mobile Account Password', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Customer Service PIN', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Mobile Account Username', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Mobile Alarm Number', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Name in SMS', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Prepaid Credit Applied', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Sim Card Number', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Customer Address', sanitize_text_field($no_option) );
}

function lla_conversion_tracking($order_id) { 
    $order = new WC_Order( $order_id );
    $conversion_billing_email  = $order->get_billing_email();
    $conversion_order_total = $order->get_total();
?>
<script>
gtag('set', 'user_data', {
	"email": <?php echo $conversion_billing_email; ?>
	
});
</script>
<!-- Event snippet for CAN - Sale conversion page --> <script> gtag('event', 'conversion', { 'send_to': 'AW-674072954/xaqdCM6N67sBEPqStsEC', 'transaction_id': '' }); </script>

<!-- Google Code for Sale Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 851020713;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "ZN_TCK6M_3EQqZfmlQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript"  
src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt=""  
src="//www.googleadservices.com/pagead/conversion/851020713/?label=ZN_TCK6M_3EQqZfmlQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Global site tag (gtag.js) - Google Ads: 674072954 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-674072954"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-674072954'); </script>

<?php }
add_action( 'woocommerce_thankyou', 'lla_conversion_tracking' );

//CUSTOMIZE SPECIFIC PRODUCT
add_filter( 'template_include', 'custom_single_product_template_include', 50, 1 );
function custom_single_product_template_include( $template ) {
    if ( is_singular('product') && (has_term( 'LLAMobile', 'product_cat')) ) {
        $template = get_stylesheet_directory() . '/woocommerce/lla-single-product.php';
    } else if ( is_singular('product') && (has_term( 'LLA4gx', 'product_cat')) ) {
	$template = get_stylesheet_directory() . '/woocommerce/single-product-4gx.php';
  } else if ( is_singular('product') && (has_term( 'LLA3G', 'product_cat')) ) {
	$template = get_stylesheet_directory() . '/woocommerce/single-product-3g.php';
  } elseif (  is_singular('product') && (has_term( '4g-watch', 'product_cat'))  ) {
        $template = get_stylesheet_directory() . '/woocommerce/single-product-watch.php';
	} elseif (  is_singular('product') && (has_term( 'demo', 'product_cat'))  ) {
        $template = get_stylesheet_directory() . '/woocommerce/demo.php';
	}
    return $template;
}

/*
//CUSTOMIZE SPECIFIC PRODUCT
function so_43621049_template_include( $template ) {
  if ( is_singular('product') && (has_term( 'LLAMobile', 'product_cat')) ) {
    $template = get_stylesheet_directory() . '/woocommerce/lla-single-product.php';
  } else if ( is_singular('product') && (has_term( 'LLA4gx', 'product_cat')) ) {
	$template = get_stylesheet_directory() . '/woocommerce/single-product-4gx.php';
  } else if ( is_singular('product') && (has_term( 'LLA3G', 'product_cat')) ) {
	$template = get_stylesheet_directory() . '/woocommerce/single-product-3g.php';
  }
  return $template;
}
add_filter( 'template_include', 'so_43621049_template_include' );

function so_43621048_template_include( $template1 ) {
  if ( is_singular('product') && (has_term( 'LLAMonitoring', 'product_cat')) ) {
    $template1 = get_stylesheet_directory() . '/woocommerce/lla-monitoring-product.php';
  } 
  return $template1;
}
add_filter( 'template_include', 'so_43621048_template_include' );
*/

function change_subscription_product_string( $subscription_string, $product, $include )
{
    if( $include['sign_up_fee'] ){
        $subscription_string = str_replace('sign-up fee', 'initial payment', $subscription_string);
    }
    return $subscription_string;
}
add_filter( 'woocommerce_subscriptions_product_price_string', 'change_subscription_product_string', 10, 3 );

function lla_3months_installment( $pricestring ) {
    $newprice = str_replace( 'with 1 month free trial', '', $pricestring );
    return $newprice;
}
add_filter( 'woocommerce_subscriptions_product_price_string', 'lla_3months_installment' );

function lla_full_payment( $pricestring1 ) {
    $newprice1 = str_replace( 'for 1 month', '- one-time payment includes taxes.', $pricestring1 );
    return $newprice1;
}
add_filter( 'woocommerce_subscriptions_product_price_string', 'lla_full_payment' );

function wc_ninja_remove_password_strength() {
	if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
		wp_dequeue_script( 'wc-password-strength-meter' );
	}
}
add_action( 'wp_print_scripts', 'wc_ninja_remove_password_strength', 100 );

add_filter( 'wpcf7_validate_configuration', '__return_false' );

//REPLACE VARIABLE PRODUCT DROPDOWN TEXT
function my_wc_filter_dropdown_args( $args ) {
    global $product;
    if( is_singular('product') && (has_term( 'LLAMobile', 'product_cat')) ) {
        $args['show_option_none'] = 'Please choose a color';
    return $args;
    } elseif( is_singular('product') && (has_term( '4g-watch', 'product_cat')) ) {
        $args['show_option_none'] = 'Please choose wristband option';
    return $args;
    } elseif( is_singular('product') && (has_term( 'demo', 'product_cat')) ) {
        $args['show_option_none'] = 'Please choose an option';
    return $args;
    } elseif( is_singular('product') && (has_term( 'watch-accessories', 'product_cat')) ) {
        $args['show_option_none'] = 'Please choose wristband option';
    return $args;
    }
	elseif( is_singular('product') && ( has_term( 'pendant-accessories', 'product_cat') )) {
        $args['show_option_none'] = 'Please choose option';
    return $args;
    }
}
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'my_wc_filter_dropdown_args', 10 );

add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

//DISPLAY CUSTOM FIELD WHEN ACF IS ACTIVE
add_filter('acf/settings/remove_wp_meta_box', '__return_false');


function myscript() { ?>
<script type="text/javascript">
	jQuery('#wdform_36_country16').empty().append('<option value="Canada" selected>Canada</option><option value="United States">United States</option>');
	jQuery('#wdform_42_country16').empty().append('<option value="Canada" selected>Canada</option><option value="United States">United States</option>');
	jQuery('#wdform_4_country17').empty().append('<option value="Canada" selected>Canada</option><option value="United States">United States</option>');
	jQuery('#wdform_13_country17').empty().append('<option value="Canada" selected>Canada</option><option value="United States">United States</option>');
    jQuery(".nav-tabs li a").click(function(e) {
        if(jQuery(window).width() > 768) {
            e.preventDefault();
            
        }
        jQuery(".nav-tabs > li").removeClass("active");
        jQuery(this).parent().addClass("active");
        jQuery(this).parent().siblings().removeClass("active");
        var show_id = jQuery(this).attr("href");
        show_id = show_id.substring(1);
        jQuery("#tab-80c288499931b5558fe").hide();
        jQuery("#tab-c8aef6251279eabd42b").hide();
        jQuery("#tab-45a5a138c99437e8843").hide();
        
        jQuery("#"+show_id).show();
        jQuery("#"+show_id).siblings().removeClass("in");
        jQuery("#"+show_id).addClass("in");
    });
</script>

<?php
 }
add_action('wp_footer', 'myscript');

//add price filter email_list,watch_price,pendant_price - strict rule - could potentially break the site
function bulk_pricing($price, $product) {
    $demo_lists = array(
            array('andrea@pcgirls.ca',
            'synchronsecurity@rogers.com', 
            'jims1854@gmail.com',
            'bibek@livelifealarms.com.au', 
            'phil@livelifealarms.ca', 
            'lisa@livelifealarms.ca', 
            'admin@livelifealarms.ca', 
            397, 
            437
        ),
        );
    $pendants = array(20702, 20703, 20704 );
    $watches = array(20694, 20700, 20701);
    
    if( wp_get_current_user() != NULL ) {
        $current_user = wp_get_current_user();
        $usr_email = $current_user->user_email;
        if( !empty($usr_email) ) {
            
            foreach($demo_lists as $demo_list) {
                if( in_array($usr_email, $demo_list) ) {
                   $product_id = $product->get_id();
                   if(is_numeric($price)) {
                        if( in_array( $product_id, $pendants )){
                            return $demo_list[count($demo_list) - 2];   
                        } elseif ( in_array($product_id, $watches) ) {
                            return $demo_list[count($demo_list) -1 ];
                        } 
                    } 
                }
            }    
        }
    }
    return $price; 
}

add_filter( 'woocommerce_product_get_price', 'bulk_pricing', 10, 2 );
add_filter( 'woocommerce_product_variation_get_price', 'bulk_pricing', 10, 2 );


 
add_action('init', 'register_custom_order_status');

function register_custom_order_status() {
    register_post_status('wc-custom-status', array(
            'label' => _x('Renewal Paid', 'Order status', 'woocommerce'),
            'public' => false,
            'exclude_from_search' => false,
            'show_in_admin_all_list' => true,
            'show_in_admin_status_list' => true,
            'label_count' => _n_noop( 'Renewal Paid <span class="count">(%s)</span>', 'Renewal Paid <span class="count">(%s)</span>', 'woocommerce' )

        )
    );
}


add_filter( 'wc_order_statuses', 'lla_order_status_dropdown' );
 
function lla_order_status_dropdown( $order_statuses ) {
   $order_statuses['wc-custom-status'] = _x('Renewal Paid', 'Order status', 'woocommerce');
   return $order_statuses;
}


//Menu
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
    $user = wp_get_current_user();
     if ( isset( $user->roles[0] ) && $user->roles[0] == 'shop_manager' ) {
        echo '<style>
                #toplevel_page_WDD_plugins,
                #toplevel_page_fusion-builder-options,
                #menu-posts-slide,
                #toplevel_page_revslider,
                #toplevel_page_masterslider,
                #toplevel_page_layerslider,
                #menu-posts-themefusion_elastic,
                #menu-tools,
                #menu-settings,
                #toplevel_page_aioseo,
                #toplevel_page_sucuriscan,
                #toplevel_page_wpassetcleanup_getting_started,
                #toplevel_page_smush,
                #toplevel_page_edit-post_type-acf-field-group
                {
                    display: none !important;
            }
        
  </style>'; 
     }
     
     echo '<style>
         mark.order-status.status-custom-status.tips {
                background: #ffaaed;
            }
     </style>';
    
}

// Register new WooCommerce email
add_filter('woocommerce_email_classes', 'lla_register_custom_customer_order_email');
function lla_register_custom_customer_order_email($emails)
{
    require_once get_stylesheet_directory() . '/woocommerce/emails/class-custom-customer-order-email.php';
    $emails['Canada_Strike_Email'] = new Custom_Customer_Order_Email();
    return $emails;
}