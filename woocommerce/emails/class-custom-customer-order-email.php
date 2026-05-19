<?php
if (!defined('ABSPATH')) {
    exit;
}

class Custom_Customer_Order_Email extends WC_Email
{

    public function __construct()
    {
        $this->id = 'lla_ca_strike';
        $this->title = 'Canada Post Strike';
        $this->description = 'This email is sent to the customer when they place an order.';
        $this->customer_email = true;
        $this->template_html = 'emails/custom-customer-order-email.php';
        $this->template_plain = 'emails/plain/custom-customer-order-email.php';
        $this->subject = 'Update on Your Order with LiveLife Alarms';
        $this->heading = 'Update on Your Order';

        add_action('woocommerce_order_status_pending_to_processing_notification', [$this, 'trigger'], 10, 2);
        add_action('woocommerce_order_status_pending_to_completed_notification', [$this, 'trigger'], 10, 2);
        add_action('woocommerce_order_status_pending_to_on-hold_notification', [$this, 'trigger'], 10, 2);

        parent::__construct();
    }

    public function trigger($order_id, $order = false)
    {
        if ($order_id && !is_a($order, 'WC_Order')) {
            $order = wc_get_order($order_id);
        }

        if (is_a($order, 'WC_Order')) {
            $this->object = $order;
            $this->recipient = $order->get_billing_email();
        }

        if (!$this->is_enabled() || !$this->get_recipient()) {
            return;
        }

        $this->send($this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments());
    }

    public function get_content_html()
    {
        return wc_get_template_html(
            $this->template_html,
            array(
                'order' => $this->object,
                'email_heading' => $this->get_heading(),
                'sent_to_admin' => false,
                'plain_text' => false,
                'email' => $this,
            ),
            '',
            plugin_dir_path(__FILE__) . 'templates/'
        );
    }

    public function get_content_plain()
    {
        return wc_get_template_html(
            $this->template_plain,
            array(
                'order' => $this->object,
                'email_heading' => $this->get_heading(),
                'sent_to_admin' => false,
                'plain_text' => true,
                'email' => $this,
            ),
            '',
            plugin_dir_path(__FILE__) . 'templates/'
        );
    }
}
