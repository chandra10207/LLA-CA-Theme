<?php
defined('ABSPATH') || exit;
do_action('woocommerce_email_header', $email_heading, $email);
?>

<p><br>Hi <?php echo esc_html($order->get_billing_first_name()); ?>,</p>

<p>Due to the ongoing Canada Post strike, we are currently unable to ship any orders.</p>

<p>Current orders have been processed and prepared for dispatch, and will ship as soon as possible. Orders that are held
    by Canada Post will resume shipping once the strike ends.</p>

<p>We appreciate your patience, and if you have any questions please call us on 1-877-801-7172.</p>

<p>Kind regards, <br>The LiveLife Alarms Team<br></p>


<?php
do_action('woocommerce_email_footer', $email);
