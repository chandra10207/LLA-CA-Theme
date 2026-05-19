<?php
/**
 * Order Notes Report (Grouped by Sequential Order Number)
 */


// https://www.livelifealarms.ca/wp-content/themes/Avada-Child-Theme/order-notes.php?start_date=2025-01-01&end_date=2025-02-24

require_once dirname( __FILE__, 4 ) . '/wp-load.php'; // load WordPress

// Get params
$start_date = isset($_GET['start_date']) ? sanitize_text_field($_GET['start_date']) : '';
$end_date   = isset($_GET['end_date']) ? sanitize_text_field($_GET['end_date']) : '';

if ( empty( $start_date ) || empty( $end_date ) ) {
    wp_die("Please provide start_date and end_date in format: ?start_date=YYYY-MM-DD&end_date=YYYY-MM-DD");
}

// Fetch orders
$orders = wc_get_orders( array(
    'limit'        => -1,
    'date_created' => $start_date . '...' . $end_date,
    'return'       => 'ids',
));

$grouped_notes = array();

foreach ( $orders as $order_id ) {
    $order = wc_get_order( $order_id );
    if ( ! $order ) continue;

    $order_number = $order_id;

    //$order_number = $order->get_order_number(); // Sequential Order Number

    $notes = wc_get_order_notes( array( 'order_id' => $order_id ) );
    foreach ( $notes as $note ) {
        $grouped_notes[$order_number][] = array(
            'note_id'    => $note->id,
            'note'       => $note->content,
            'added_by'   => $note->added_by,
            'is_customer_note' => $note->customer_note ? 'Yes' : 'No',
            'date'       => $note->date_created->date_i18n( 'Y-m-d H:i:s' ),
        );
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WooCommerce Order Notes Report</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { margin-bottom: 5px; }
        h3 { margin-top: 30px; /*background: #f0f0f0;*/ padding: 10px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f4f4f4; }
    </style>
</head>
<body>
    <h2>WooCommerce Order Notes (<?php echo esc_html($start_date); ?> → <?php echo esc_html($end_date); ?>)</h2>

    <?php if ( empty($grouped_notes) ): ?>
        <p>No order notes found in this date range.</p>
    <?php else: ?>
        <?php foreach ( $grouped_notes as $order_number => $notes ): ?>
            <h3>Order #<?php echo esc_html( $order_number ); ?></h3>
            <table>
                <tr>
                    <th>Note ID</th>
                    <th>Note</th>
                    <th>Added By</th>
                    <th>Customer Note</th>
                    <th>Date</th>
                </tr>
                <?php foreach ( $notes as $row ): ?>
                    <tr>
                        <td><?php echo esc_html( $row['note_id'] ); ?></td>
                        <td><?php echo esc_html( $row['note'] ); ?></td>
                        <td><?php echo esc_html( $row['added_by'] ); ?></td>
                        <td><?php echo esc_html( $row['is_customer_note'] ); ?></td>
                        <td><?php echo esc_html( $row['date'] ); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
