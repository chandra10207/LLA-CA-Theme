<?php global $wpo_wcpdf; ?>
<table class="head container">
	<tr>
		<td class="header">
		<?php
		if( $wpo_wcpdf->get_header_logo_id() ) {
			$wpo_wcpdf->header_logo();
		} else {
			echo apply_filters( 'wpo_wcpdf_invoice_title', __( 'Invoice', 'wpo_wcpdf' ) );
		}
		?>
		</td>
		<td class="shop-info">
			<div class="shop-name"><h3><?php $wpo_wcpdf->shop_name(); ?></h3></div>
			<div class="shop-address"><?php $wpo_wcpdf->shop_address(); ?></div>
		</td>
	</tr>
</table>

<h1 class="document-type-label">
<?php if( $wpo_wcpdf->get_header_logo_id() ) echo apply_filters( 'wpo_wcpdf_invoice_title', __( 'Invoice', 'wpo_wcpdf' ) ); ?>
</h1>

<?php do_action( 'wpo_wcpdf_after_document_label', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>

<table class="order-data-addresses">
	<tr>
		<td class="address billing-address">
			<!-- <h3><?php _e( 'Billing Address:', 'wpo_wcpdf' ); ?></h3> -->
			<?php $wpo_wcpdf->billing_address(); ?>
			<?php if ( isset($wpo_wcpdf->settings->template_settings['invoice_email']) ) { ?>
			<div class="billing-email"><?php $wpo_wcpdf->billing_email(); ?></div>
			<?php } ?>
			<?php if ( isset($wpo_wcpdf->settings->template_settings['invoice_phone']) ) { ?>
			<div class="billing-phone"><?php $wpo_wcpdf->billing_phone(); ?></div>
			<?php } ?>
		</td>
		<td class="address shipping-address">
			<?php if ( isset($wpo_wcpdf->settings->template_settings['invoice_shipping_address']) && $wpo_wcpdf->ships_to_different_address()) { ?>
			<h3><?php _e( 'Ship To:', 'wpo_wcpdf' ); ?></h3>
			<?php $wpo_wcpdf->shipping_address(); ?>
			<?php } ?>
		</td>
		<td class="order-data">
			<table>
				<?php do_action( 'wpo_wcpdf_before_order_data', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>
				<?php if ( isset($wpo_wcpdf->settings->template_settings['display_number']) && $wpo_wcpdf->settings->template_settings['display_number'] == 'invoice_number') { ?>
				<tr class="invoice-number">
					<th><?php _e( 'Invoice Number:', 'wpo_wcpdf' ); ?></th>
					<td><?php $wpo_wcpdf->invoice_number(); ?></td>
				</tr>
				<?php } ?>
				<?php if ( isset($wpo_wcpdf->settings->template_settings['display_date']) && $wpo_wcpdf->settings->template_settings['display_date'] == 'invoice_date') { ?>
				<tr class="invoice-date">
					<th><?php _e( 'Invoice Date:', 'wpo_wcpdf' ); ?></th>
					<td><?php $wpo_wcpdf->invoice_date(); ?></td>
				</tr>
				<?php } ?>
				<tr class="order-number">
					<th><?php _e( 'Order Number:', 'wpo_wcpdf' ); ?></th>
					<td><?php $wpo_wcpdf->order_number(); ?></td>
				</tr>
				<tr class="order-date">
					<th><?php _e( 'Order Date:', 'wpo_wcpdf' ); ?></th>
					<td><?php $wpo_wcpdf->order_date(); ?></td>
				</tr>
				<tr class="payment-method">
					<th><?php _e( 'Payment Method:', 'wpo_wcpdf' ); ?></th>
					<td><?php $wpo_wcpdf->payment_method(); ?></td>
				</tr>
				<?php do_action( 'wpo_wcpdf_after_order_data', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>
			</table>			
		</td>
	</tr>
</table>

<table style="width: 100%;">
    <tr>
		<td style="width: 60%;">
		<h2 class="invoice_title" style="margin-top: -30px;">Mobile Alarm Details</h2>
		<?php
                $preferred_time = get_post_meta($wpo_wcpdf->export->order->id,'Preferred Time',true);
                $contact_number = get_post_meta($wpo_wcpdf->export->order->id,'Contact Number',true);
                $mobile_number = get_post_meta ($wpo_wcpdf->export->order->id,'Mobile Alarm Number',true);
                $mobile_account = get_post_meta ($wpo_wcpdf->export->order->id,'Mobile Account Username',true);
                $mobile_password = get_post_meta ($wpo_wcpdf->export->order->id,'Mobile Account Password',true);
                $service_pin = get_post_meta ($wpo_wcpdf->export->order->id,'Customer Service PIN',true);
                $sim_card = get_post_meta ($wpo_wcpdf->export->order->id,'Sim Card #',true);
                $contact_1 = get_post_meta ($wpo_wcpdf->export->order->id,'Contact person 1 #',true);
                $contact_2 = get_post_meta ($wpo_wcpdf->export->order->id,'Contact person 2 #',true);
                $contact_3 = get_post_meta ($wpo_wcpdf->export->order->id,'Contact person 3 #',true);
                $contact_4 = get_post_meta ($wpo_wcpdf->export->order->id,'Contact person 4 #',true);
                $contact_5 = get_post_meta ($wpo_wcpdf->export->order->id,'Contact person 5 #',true);
				$contact_6 = get_post_meta ($wpo_wcpdf->export->order->id,'Contact person 6 #',true);
				$customer_address = get_post_meta ($wpo_wcpdf->export->order->id,'Customer Address', true);
                $sms_name = get_post_meta ($wpo_wcpdf->export->order->id,'Name in SMS',true);
                $prepaid_applied = get_post_meta ($wpo_wcpdf->export->order->id,'Prepaid Credit Applied',true);
                
				if  (!empty( $mobile_account )) {
					if (isset($mobile_number)) {
                    echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Mobile Alarm Number: ') . '</strong>&nbsp; &nbsp;' . $mobile_number . '</p>';
					}
				
					if (isset($mobile_account)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Mobile Account Username: ') . '</strong>&nbsp; &nbsp;' . $mobile_account . '</p>';
					}
					
					if (isset($contact_1)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Contact person 1 #: ') . '</strong>&nbsp; &nbsp;' . $contact_1 . '</p>';
					}
					if (isset($contact_2)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Contact person 2 #: ') . '</strong>&nbsp; &nbsp;' . $contact_2 . '</p>';
					}
					if (isset($contact_3)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Contact person 3 #: ') . '</strong>&nbsp; &nbsp;' . $contact_3 . '</p>';
					}
					if (isset($contact_4)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Contact person 4 #: ') . '</strong>&nbsp; &nbsp;' . $contact_4 . '</p>';
					}
					if (isset($contact_5)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Contact person 5 #: ') . '</strong>&nbsp; &nbsp;' . $contact_5 . '</p>';
					}
					
					if (isset($contact_6)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Contact person 6 #: ') . '</strong>&nbsp; &nbsp;' . $contact_6 . '</p>';
					}
					
					if(!empty($customer_address)){
						if (isset($customer_address)) {
							echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Customers Address: ') . '&nbsp; &nbsp;' . $customer_address . '</p>';
						} 
					}
					if (isset($sms_name)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Name in emergency text message: ') . '</strong>&nbsp; &nbsp;' . $sms_name . '</p>';
					}
				} else {
					if (isset($mobile_number)) {
                    echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Mobile Alarm Number: ') . '</strong>&nbsp; &nbsp;' . $mobile_number . '</p>';
					}
					if (isset($contact_1)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 1 #: ') . '&nbsp; &nbsp;' . $contact_1 . '</p>';
					}
					if (isset($contact_2)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 2 #: ') . '&nbsp; &nbsp;' . $contact_2 . '</p>';
					}
					if (isset($contact_3)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 3 #: ') . '&nbsp; &nbsp;' . $contact_3 . '</p>';
					}
					if (isset($contact_4)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 4 #: ') . '&nbsp; &nbsp;' . $contact_4 . '</p>';
					}
					if (isset($contact_5)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 5 #: ') . '&nbsp; &nbsp;' . $contact_5 . '</p>';
					}

					if (isset($contact_6)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 6 #: ') . '&nbsp; &nbsp;' . $contact_6 . '</p>';
					}
					if(!empty($customer_address)){
						if (isset($customer_address)) {
							echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Customers Address: ') . '&nbsp; &nbsp;' . $customer_address . '</p>';
						} 
					}
					if (isset($sms_name)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Name in emergency text message: ') . '&nbsp; &nbsp;' . $sms_name . '</p>';
					}	
				
				}
			
				
                ?>
		</td>
    </tr>
</table>



<?php do_action( 'wpo_wcpdf_before_order_details', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>


<table class="order-details">
	<thead>
		<tr>
			<th class="product"><?php _e('Product', 'wpo_wcpdf'); ?></th>
			<th class="quantity"><?php _e('Quantity', 'wpo_wcpdf'); ?></th>
			<th class="price"><?php _e('Price', 'wpo_wcpdf'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $items = $wpo_wcpdf->get_order_items(); if( sizeof( $items ) > 0 ) : foreach( $items as $item_id => $item ) : ?>
		<tr class="<?php echo apply_filters( 'wpo_wcpdf_item_row_class', $item_id, $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order, $item_id ); ?>">
			<td class="product">
				<?php $description_label = __( 'Description', 'wpo_wcpdf' ); // registering alternate label translation ?>
				<span class="item-name"><?php echo $item['name']; ?></span>
				<?php do_action( 'wpo_wcpdf_before_item_meta', $wpo_wcpdf->export->template_type, $item, $wpo_wcpdf->export->order  ); ?>
				<span class="item-meta"><?php echo $item['meta']; ?></span>
				<dl class="meta">
					<?php $description_label = __( 'SKU', 'wpo_wcpdf' ); // registering alternate label translation ?>
					<?php if( !empty( $item['sku'] ) ) : ?><dt class="sku"><?php _e( 'SKU:', 'wpo_wcpdf' ); ?></dt><dd class="sku"><?php echo $item['sku']; ?></dd><?php endif; ?>
					<?php if( !empty( $item['weight'] ) ) : ?><dt class="weight"><?php _e( 'Weight:', 'wpo_wcpdf' ); ?></dt><dd class="weight"><?php echo $item['weight']; ?><?php echo get_option('woocommerce_weight_unit'); ?></dd><?php endif; ?>
				</dl>
				<?php do_action( 'wpo_wcpdf_after_item_meta', $wpo_wcpdf->export->template_type, $item, $wpo_wcpdf->export->order  ); ?>
			</td>
			<td class="quantity"><?php echo $item['quantity']; ?></td>
			<td class="price"><?php echo $item['order_price']; ?></td>
		</tr>
		<?php endforeach; endif; ?>
	</tbody>
	<tfoot>
		<tr class="no-borders">
			<td class="no-borders">
				<div class="customer-notes">
					<?php if ( $wpo_wcpdf->get_shipping_notes() ) : ?>
						<h3><?php _e( 'Customer Notes', 'wpo_wcpdf' ); ?></h3>
						<?php $wpo_wcpdf->shipping_notes(); ?>
					<?php endif; ?>
				</div>				
			</td>
			<td class="no-borders" colspan="2">
				<table class="totals">
					<tfoot>
						<?php foreach( $wpo_wcpdf->get_woocommerce_totals() as $key => $total ) : ?>
						<tr class="<?php echo $key; ?>">
							<td class="no-borders"></td>
							<th class="description"><?php echo $total['label']; ?></th>
							<td class="price"><span class="totals-price"><?php echo $total['value']; ?></span></td>
						</tr>
						<?php endforeach; ?>
					</tfoot>
				</table>
			</td>
		</tr>
	</tfoot>
</table>

<?php do_action( 'wpo_wcpdf_after_order_details', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>

<?php if ( $wpo_wcpdf->get_footer() ): ?>
<div id="footer">
	<?php $wpo_wcpdf->footer(); ?>
</div><!-- #letter-footer -->
<?php endif; ?>