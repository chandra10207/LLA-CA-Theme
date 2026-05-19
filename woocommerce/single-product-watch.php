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

get_header( 'shop' ); ?>

<div class="fusion-fullwidth fullwidth-box fusion-fullwidth-1  fusion-parallax-none nonhundred-percent-fullwidth order_mobile_row1 extend" style="border-color:#eae9e9;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:0px;padding-top:0px;padding-left:0px;padding-right:0px;">
<div class="fusion-row">
<div class="fusion-one-full fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;">
<div class="fusion-column-wrapper">
<h3 style="float: left;"><span style="font-weight: 900; color: #4a4c9a;">Mobile Alert Watch with Fall Detect, Hands Free Voice & GPS.</span>&nbsp;Enjoy freedom. <span style="font-weight: 900;">Order:</span> <a id="number_link" style="font-size: 17px; font-family: bitter; color: #4a4c9a;" href="tel:1-877-801-7172"><strong><span class="number">1-877-801-7172</span></strong></a></h3>
<p><img class="alignright size-full wp-image-199" src="https://www.livelifealarms.ca/wp-content/uploads/2021/12/free-delivery-icon-mobile-alert-canada.png" alt="alarm-pendants-free-delivery-canada-icon" width="211" height="30"><br>
<img class="aligncenter size-full wp-image-201" src="https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line.jpg" alt="alarm-pendants-header-thin-line" width="1164" height="17" srcset="https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line-120x2.jpg 120w, https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line-200x3.jpg 200w, https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line-300x4.jpg 300w, https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line-400x6.jpg 400w, https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line-500x7.jpg 500w, https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line-600x9.jpg 600w, https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line-768x11.jpg 768w, https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line-800x12.jpg 800w, https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line-1024x15.jpg 1024w, https://livelifealarms.ca/wp-content/uploads/2016/10/alarm-pendants-header-thin-line.jpg 1164w" sizes="(max-width: 1164px) 100vw, 1164px"></p>
<div class="fusion-clearfix"></div></div></div><div class="fusion-clearfix"></div></div></div>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'llacontent', 'watch' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
<div style="clear:both"></div>
	
<div class="fusion-fullwidth fullwidth-box fusion-fullwidth-2  fusion-parallax-none nonhundred-percent-fullwidth order_mobile_row2" style="border-color:#eae9e9;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:20px;padding-top:50px;padding-left:30px;padding-right:30px;padding-left:30px !important;padding-right:30px !important;background-color:#f4f2ef;"><style type="text/css" scoped="scoped">.fusion-fullwidth-2 {
                            padding-left: 30px !important;
                            padding-right: 30px !important;
                        }</style><div class="fusion-row"><div class="fusion-one-third fusion-layout-column fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper"><p><img class="aligncenter size-full wp-image-224" src="https://www.livelifealarms.ca/wp-content/uploads/2022/01/couple-with-live-life-alarms-4g-watch.png" alt="live life alarms 4g watch canada" width="239" height="277"></p>
<h2 data-fontsize="21" data-lineheight="31"><span style="font-weight: 900; color: #4a4c9a;">No</span> monthly monitoring fees ever.</h2>
<p>In an emergency your 4GX <strong>Live<span style="color: #e40030;">Life</span> Mobile Alert watch</strong> contacts the people who love you and know you the most – your family and friends. Ongoing costs are just $75 each year from Year 2 (pays for unlimited emergency calls and texts).</p>
<p><strong>What’s included with your 4GX mobile watch:</strong></p>
<div class="order_mobile_bg-1"><img class="alignleft size-full wp-image-225" src="https://www.livelifealarms.ca/wp-content/uploads/2016/10/personal-alarm-service-pen-icon.png" alt="personal-alarm-service-pen-icon" width="35" height="37">Quick start guide and manual.</div>
<div class="order_mobile_bg-2"><img class="alignleft size-full wp-image-4131" src="https://www.livelifealarms.ca/wp-content/uploads/2022/01/mobile-personal-alarm-pendant-system-steps-icon.png" alt="personal medical alert with fall alarm pendant gps" width="35" height="37">Steps counter.</div>
<div class="order_mobile_bg-1"><img class="alignleft size-full wp-image-4128" src="https://www.livelifealarms.ca/wp-content/uploads/2018/06/personal-alarm-pendant-watch-elderly-3.png" alt="" width="35" height="36">Sleek, robust &amp; adjustable wristband.</div>

<div class="fusion-clearfix"></div></div></div><div class="fusion-two-third fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper"><h2 data-fontsize="21" data-lineheight="31"><span style="font-weight: 900; color: #4a4c9a;">More</span> product information.</h2>
<div class="fusion-tabs fusion-tabs-1 classic horizontal-tabs"><style type="text/css">.fusion-tabs.fusion-tabs-1 .nav-tabs li a{border-top-color:#f4f2ef;background-color:#f4f2ef;}.fusion-tabs.fusion-tabs-1 .nav-tabs{background-color:#d3d2cc;}.fusion-tabs.fusion-tabs-1 .nav-tabs li.active a,.fusion-tabs.fusion-tabs-1 .nav-tabs li.active a:hover,.fusion-tabs.fusion-tabs-1 .nav-tabs li.active a:focus{border-right-color:#d3d2cc;}.fusion-tabs.fusion-tabs-1 .nav-tabs li.active a,.fusion-tabs.fusion-tabs-1 .nav-tabs li.active a:hover,.fusion-tabs.fusion-tabs-1 .nav-tabs li.active a:focus{background-color:#d3d2cc;}.fusion-tabs.fusion-tabs-1 .nav-tabs li a:hover{background-color:#d3d2cc;border-top-color:#d3d2cc;}.fusion-tabs.fusion-tabs-1 .tab-pane{background-color:#d3d2cc;}.fusion-tabs.fusion-tabs-1 .nav,.fusion-tabs.fusion-tabs-1 .nav-tabs,.fusion-tabs.fusion-tabs-1 .tab-content .tab-pane{border-color:#d3d2cc;}</style><div class="nav"><ul class="nav-tabs nav-justified"><li class="active"><a class="tab-link" id="fusion-tab-features" href="#tab-80c288499931b5558fe" data-toggle="tab"><h4 class="fusion-tab-heading" data-fontsize="16" data-lineheight="24">Features</h4></a></li><li><a class="tab-link" id="fusion-tab-guarantee&amp;warranty" href="#tab-c8aef6251279eabd42b" data-toggle="tab"><h4 class="fusion-tab-heading" data-fontsize="16" data-lineheight="24">Guarantee &amp; Warranty</h4></a></li><li><a class="tab-link" id="fusion-tab-specifications" href="#tab-45a5a138c99437e8843" data-toggle="tab"><h4 class="fusion-tab-heading" data-fontsize="16" data-lineheight="24">Specifications</h4></a></li></ul></div><div class="tab-content"><div class="nav fusion-mobile-tab-nav"><ul class="nav-tabs nav-justified"><li class="active"><a class="tab-link" id="fusion-tab-features" href="#tab-80c288499931b5558fe" data-toggle="tab"><h4 class="fusion-tab-heading" data-fontsize="16" data-lineheight="24">Features</h4></a></li></ul></div><div class="tab-pane fade in active" id="tab-80c288499931b5558fe"><p></p>
<div class="order_mobile_r2_tab_left" style="line-height: 26px; margin-top: -14px;">
<ul class="template_ul">
<li>Calls and sends text messages to up to six emergency contacts when the SOS button on the side of the watch is pressed for two seconds. Calls until someone on the contact list answers the call. It will stop calling the other numbers if the wearer ends the call sequence. </li>
<li>Using GPS all help text messages contain a link to Google Maps displaying the location of the wearer on a map with accuracy to approximately 2 metres.</li>
<li>You can call a nominated contact by pressing the contacts section on the watch. </li>
<li>You can speak and listen to calls through the mobile alarm watch built-in microphone and speakerphone.</li>
<li>You can include ‘911’ as one of your emergency contacts. </li>
<li>Easy to recharge in just 45 minutes by placing into the charging station. Battery lasts 2 days. </li>
</ul>
</div>
<div class="order_mobile_r2_tab_right" style="line-height: 25px; margin-top: -14px;">
<ul class="template_ul">
<li>Location feature: Want to know exactly where the person wearing the alarm watch is? Just send a simple text message to the Live Life Watch and it will send back their location on Google Maps. </li>
<li>Uses the best 4GX signal from either Rogers, Bell, Telus, Tbaytel, MTS or Sasktel (depending on location) which gives the widest coverage in Canada of 99.5% of all populated areas. </li>
<li>Fall detection: If a fall is detected the medical alert watch sends text messages with your location to up to 6 contacts. A<a class="fusion-modal-text-link" data-toggle="modal" data-target=".fusion-modal.fall_alarm_sound" href="#"><strong> voice from the alarm</strong></a> will guide you through the emergency call sequence and allow you to cancel if a false alarm.</li>
<li>Wandering feature: For people who are at risk of wandering the Geo Fencing option allows warning text messages to be sent if the wearer strays outside a defined area.</li>
<li>No contracts or monthly monitoring fees. 30 day money back <strong><a href="/refund-policy/">guarantee</a>&nbsp;</strong>, 12 month full <strong><a href="/watch-warranty/">warranty & limited lifetime warranty.</a></li>
</ul>
</div>
<div style="clear: both;"></div>
<p></p></div><div class="nav fusion-mobile-tab-nav"><ul class="nav-tabs nav-justified"><li><a class="tab-link" id="fusion-tab-guarantee&amp;warranty" href="#tab-c8aef6251279eabd42b" data-toggle="tab"><h4 class="fusion-tab-heading" data-fontsize="16" data-lineheight="24">Guarantee &amp; Warranty</h4></a></li></ul></div><div class="tab-pane fade" id="tab-c8aef6251279eabd42b">
</strong><p style="margin-top: 30px;"><strong>30 Day Moneyback Guarantee</strong></p>
<p>The <strong>Live<span style="color: #e40030;">Life</span></strong> Mobile Alarm Watch comes with a 30 day money-back guarantee. Simply return the watch alarm unit in it’s original packaging within 30 days of purchase for a full refund.</p>
<p>See our <a href="/customer-service" target="_blank"><strong>Customer Service</strong></a> page for more details on our guarantee and returns policy.</p>
<p><strong>12 Months Warranty</strong></p>
<p>The <strong>Live<span style="color: #e40030;">Life</span></strong> Mobile Alarm Watch comes with a 12 month warranty. If the watch has a manufacturing defect or breaks down within the first 12 months of purchase we will replace it free of charge. If the unit fails after the first 12 months please send it back to us and we will repair or replace it. We will only charge you for the cost of repair. You won’t have to buy a new unit.</p>
<p>See our <a href="/customer-service" target="_blank"><strong>Customer Service</strong></a> page for the terms and conditions of our warranty.</p></div><div class="nav fusion-mobile-tab-nav"><ul class="nav-tabs nav-justified"><li><a class="tab-link" id="fusion-tab-specifications" href="#tab-45a5a138c99437e8843" data-toggle="tab"><h4 class="fusion-tab-heading" data-fontsize="16" data-lineheight="24">Specifications</h4></a></li></ul></div><div class="tab-pane fade" id="tab-45a5a138c99437e8843"><p></p>
<div class="order_mobile_r2_tab_left" style="margin-top: -10px;">
<ul class="template_ul">
<li>Includes unlimited emergency calls and texts for one year. Just $75 per year after that.</li>
<li>Uses GPS, Bluetooth and wifi tracking to locate pendant with link to location in Google Maps to within 2 metres.</li>
<li>Uses in-built microphone and speakerphone to communicate hands free.</li>
<li>In an emergency calls and texts up to 6 contacts. Can include 911.</li>
<li>Has fall detection option with voice warnings. Detects height and angle of fall along with force of impact.</li>
<li>Dementia wandering feature: Geo fencing option can be set to send warning texts when user strays outside the geo fenced area.</li>
</ul>
</div>
<div class="order_mobile_r2_tab_right" style="margin-top: -10px;">
<ul class="template_ul">
<li>Transmits and receives on 4GX 700Mhz band via voice and text messages.</li>
<li>Waterproof rating of IP8.</li>
<li>Battery type: Lithium-ion, 580mAh capacity, 3.7V.</li>
<li>Recharge from empty to full in 45 minutes.</li>
<li>Battery low indication via voice warning and text message to contacts.</li>
<li>Receives and transmits on frequency band 700Mhz.</li>
<li>Antenna: Internal WCDMA high energy design.</li>
<li>GPS: U-blox 8 chip (Support AGPS).</li>
<li>Dimensions: 47mm x 47mm x 16mm.</li>
<li>Weight: 64 grams.</li>
<li>Operation temperature: -20 to +80 degrees Celsius.</li>
</ul>
</div>
<div style="clear: both;"></div>
<p></p></div></div></div><div class="fusion-clearfix"></div></div></div><div class="fusion-clearfix"></div><div class="fusion-one-full fusion-layout-column fusion-column-last fusion-spacing-yes order_mobile_r2_img" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper"><p><img class="alignleft size-full wp-image-732" src="https://www.livelifealarms.ca/wp-content/uploads/2016/10/buy-personal-alarm-payment-icon-2-1.jpg" alt="buy-personal-alarm-payment-icon-2" width="230" height="67" srcset="https://www.livelifealarms.ca/wp-content/uploads/2016/10/buy-personal-alarm-payment-icon-2-1-200x58.jpg 200w, https://www.livelifealarms.ca/wp-content/uploads/2016/10/buy-personal-alarm-payment-icon-2-1.jpg 230w" sizes="(max-width: 230px) 100vw, 230px"><img class="alignleft size-full wp-image-733" src="https://www.livelifealarms.ca/wp-content/uploads/2016/10/buy-personal-alarm-payment-icon-3-1.jpg" alt="buy-personal-alarm-payment-icon-3" width="230" height="67" srcset="https://www.livelifealarms.ca/wp-content/uploads/2016/10/buy-personal-alarm-payment-icon-3-1-200x58.jpg 200w, https://www.livelifealarms.ca/wp-content/uploads/2016/10/buy-personal-alarm-payment-icon-3-1.jpg 230w" sizes="(max-width: 230px) 100vw, 230px"><img class="alignleft size-full wp-image-734" src="https://www.livelifealarms.ca/wp-content/uploads/2017/06/buy-personal-alarm-payment-icon-4b.jpg" alt="buy-personal-alarm-payment-icon-4" width="240" height="67"><img class="alignleft size-full wp-image-735" src="https://www.livelifealarms.ca/wp-content/uploads/2016/10/buy-personal-alarm-payment-icon-6.jpg" alt="buy-personal-alarm-payment-icon-6" width="166" height="67"><img class="alignleft size-full wp-image-736" src="https://www.livelifealarms.ca/wp-content/uploads/2016/10/buy-personal-alarm-payment-icon-5-1.jpg" alt="buy-personal-alarm-payment-icon-5" width="220" height="67" srcset="https://www.livelifealarms.ca/wp-content/uploads/2016/10/buy-personal-alarm-payment-icon-5-1-200x61.jpg 200w, https://www.livelifealarms.ca/wp-content/uploads/2016/10/buy-personal-alarm-payment-icon-5-1.jpg 220w" sizes="(max-width: 220px) 100vw, 220px"></p>
<div class="fusion-clearfix"></div></div></div><div class="fusion-clearfix"></div></div></div>
	
<?php get_footer( 'shop' ); ?>
