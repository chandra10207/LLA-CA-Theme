<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action( 'wpo_wcpdf_before_document', $this->get_type(), $this->order ); ?>

<table class="head container">
	<tr>
		<td class="header">
		<?php
		if ( $this->has_header_logo() ) {
			do_action( 'wpo_wcpdf_before_shop_logo', $this->get_type(), $this->order );
			$this->header_logo();
			do_action( 'wpo_wcpdf_after_shop_logo', $this->get_type(), $this->order );
		} else {
			$this->title();
		}
		?>
		</td>
		<td class="shop-info">
			<?php do_action( 'wpo_wcpdf_before_shop_name', $this->get_type(), $this->order ); ?>
			<div class="shop-name"><h3><?php $this->shop_name(); ?></h3></div>
			<?php do_action( 'wpo_wcpdf_after_shop_name', $this->get_type(), $this->order ); ?>
			<?php do_action( 'wpo_wcpdf_before_shop_address', $this->get_type(), $this->order ); ?>
			<div class="shop-address"><?php $this->shop_address(); ?></div>
			<?php do_action( 'wpo_wcpdf_after_shop_address', $this->get_type(), $this->order ); ?>
		</td>
	</tr>
</table>

<?php do_action( 'wpo_wcpdf_before_document_label', $this->get_type(), $this->order ); ?>

<h1 class="document-type-label">
	<?php if ( $this->has_header_logo() ) $this->title(); ?>
</h1>

<?php do_action( 'wpo_wcpdf_after_document_label', $this->get_type(), $this->order ); ?>

<table class="order-data-addresses">
	<tr>
		<td class="address shipping-address">
			<!-- <h3><?php _e( 'Shipping Address:', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3> -->
			<?php do_action( 'wpo_wcpdf_before_shipping_address', $this->get_type(), $this->order ); ?>
			<?php $this->shipping_address(); ?>
			<?php do_action( 'wpo_wcpdf_after_shipping_address', $this->get_type(), $this->order ); ?>
			<?php if ( isset( $this->settings['display_email'] ) ) : ?>
				<div class="billing-email"><?php $this->billing_email(); ?></div>
			<?php endif; ?>
			<?php if ( isset( $this->settings['display_phone'] ) ) : ?>
				<div class="shipping-phone"><?php $this->shipping_phone( ! $this->show_billing_address() ); ?></div>
			<?php endif; ?>
		</td>
		<td class="address billing-address">
			<?php if ( $this->show_billing_address() ) : ?>
				<h3><?php _e( 'Billing Address:', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
				<?php do_action( 'wpo_wcpdf_before_billing_address', $this->get_type(), $this->order ); ?>
				<?php $this->billing_address(); ?>
				<?php do_action( 'wpo_wcpdf_after_billing_address', $this->get_type(), $this->order ); ?>
				<?php if ( isset( $this->settings['display_phone'] ) && ! empty( $this->get_billing_phone() ) ) : ?>
					<div class="billing-phone"><?php $this->billing_phone(); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</td>
		<td class="order-data">
			<table>
				<?php do_action( 'wpo_wcpdf_before_order_data', $this->get_type(), $this->order ); ?>
				<tr class="order-number">
					<th><?php _e( 'Order Number:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php $this->order_number(); ?></td>
				</tr>
				<tr class="order-date">
					<th><?php _e( 'Order Date:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php $this->order_date(); ?></td>
				</tr>
				<?php if ( $shipping_method = $this->get_shipping_method() ) : ?>
				<tr class="shipping-method">
					<th><?php _e( 'Shipping Method:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php echo $shipping_method; ?></td>
				</tr>
				<?php endif; ?>
				<?php do_action( 'wpo_wcpdf_after_order_data', $this->get_type(), $this->order ); ?>
			</table>			
		</td>
	</tr>
</table>

<table style="width: 100%; margin-top: -10px;">
    <tr>
		<td style="width: 60%;">
		<h2 class="invoice_title" style="margin-bottom: 10px; margin-top: 0px;">Mobile Alarm Details</h2>
		<?php
		        
                $mobile_number = $order->get_meta('Mobile Alarm Number');
                $contact_1 = $order->get_meta('Contact person 1 #');
                $contact_2 = $order->get_meta('Contact person 2 #');
                $contact_3 = $order->get_meta('Contact person 3 #');
                $contact_4 = $order->get_meta('Contact person 4 #');
                $contact_5 = $order->get_meta('Contact person 5 #');
				$contact_6 = $order->get_meta('Contact person 6 #');
                $sms_name = $order->get_meta('Name in SMS');
                
			    $customer_address = $order->get_meta('Customer Address');
                
                if  (!empty( $mobile_number )) {
					if ($mobile_number) {
                    echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Mobile Alarm Number: ') . '</strong>&nbsp; &nbsp;' . $mobile_number . '</p>';
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
							echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Customers Address: ') . '</strong>&nbsp; &nbsp;' . $customer_address . '</p>';
						} 
					}
                    echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Annual Renewal: ') . '</strong>&nbsp; &nbsp;' . 'You will receive an email prior to the 1st anniversary of owning your device. If you choose to discontinue service, please call us to cancel. '. '</p>';
                    
                   
                    
                    
					if (isset($sms_name)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Name in emergency text message: ') . '</strong>&nbsp; &nbsp;' . $sms_name . '</p>';
					}
				}
                ?>
		</td>
    </tr>
</table>

<?php do_action( 'wpo_wcpdf_before_order_details', $this->get_type(), $this->order ); ?>

<table class="order-details">
	<thead>
		<tr>
			<th class="product"><?php _e( 'Product', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
			<th class="quantity"><?php _e( 'Quantity', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $this->get_order_items() as $item_id => $item ) : ?>
			<tr class="<?php echo apply_filters( 'wpo_wcpdf_item_row_class', 'item-'.$item_id, esc_attr( $this->get_type() ), $this->order, $item_id ); ?>">
				<td class="product">
					<?php $description_label = __( 'Description', 'woocommerce-pdf-invoices-packing-slips' ); // registering alternate label translation ?>
					<span class="item-name"><?php echo $item['name']; ?></span>
					<?php do_action( 'wpo_wcpdf_before_item_meta', $this->get_type(), $item, $this->order  ); ?>
					<span class="item-meta"><?php echo $item['meta']; ?></span>
					
					<?php do_action( 'wpo_wcpdf_after_item_meta', $this->get_type(), $item, $this->order  ); ?>
				</td>
				<td class="quantity"><?php echo $item['quantity']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>



<?php do_action( 'wpo_wcpdf_after_order_details', $this->get_type(), $this->order ); ?>

<?php do_action( 'wpo_wcpdf_before_customer_notes', $this->get_type(), $this->order ); ?>

<div class="customer-notes">
	<?php if ( $this->get_shipping_notes() ) : ?>
		<h3><?php _e( 'Customer Notes', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
		<?php $this->shipping_notes(); ?>
	<?php endif; ?>
</div>

<?php do_action( 'wpo_wcpdf_after_customer_notes', $this->get_type(), $this->order ); ?>

<?php if ( $this->get_footer() ) : ?>
	<div id="footer" style="margin-top: -20px;">
		<!-- hook available: wpo_wcpdf_before_footer -->
		<?php $this->footer(); ?>
		<!-- hook available: wpo_wcpdf_after_footer -->
	</div><!-- #letter-footer -->
<?php endif; ?>

<?php do_action( 'wpo_wcpdf_after_document', $this->get_type(), $this->order ); ?>