
<h1>Pick Date Range</h1>

<form action="" method="GET">
  <label for="start_date">Start Date:</label>
  <input type="date" id="start_date" name="start_date">
  </br></br>
  <label for="end_date">End  Date:</label>
  <input type="date" id="end_date" name="end_date">
  </br></br>
  <input type="submit" value="Search Order" style="pointer:cursor;">
</form>

<p><strong>Note:</strong> not supported in Internet Explorer 11 or prior Safari 14.1.</p>

<?php
defined( 'ABSPATH' ) || exit;
if(isset($_GET['start_date'])) {
	$start_date = $_GET['start_date'];
} else {
	$start_date = '2022-01-01';
}

if(isset($_GET['end_date'])) {
	$end_date = $_GET['end_date'];
} else {
	$end_date = '2022-01-02';
}

//Limit is the number of orders you want to process
/*$args = array(
	'order' => 'DESC',
	'limit' => -1,
    'meta_key' => '_completed_date',
    'meta_value' => $date_completed,
    'meta_compare' => 'LIKE',
); */
$args = array(
	'limit' => -1,
	'date_created' => $start_date.'...'.$end_date,
	'order' => 'ASC'
);

?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>


<h2>Found Orders</h2>

<table>
  <tr>
    <th>Order Number</th>
    <th>Order Date</th>
    <th>Order Status</th>
    <th>Total</th>
    <th>Customer ID</th>
    <th>Customer First Name</th>
    <th>Customer Last </th>
    <th>Email</th>
  </tr>

<?php
$query = new WC_Order_Query( $args );
$orders = $query->get_orders();
$count = 0;
foreach($orders as $order) {
		$id = $order->ID;
		$billing_email = get_post_meta($id, '_billing_email', true);
		$user = get_user_by('email', $billing_email);
// 		echo'<pre>';
// 		var_dump($user);
// 		echo '</pre>';
				echo '<tr>';
				echo '<td>'.$id.'</td>';
				echo '<td>'.$order->order_date.'</td>';
				echo '<td>'.$order->get_status().'</td>';
				echo '<td>'.$order->total.'</td>';
				echo '<td>'.$user->id.'</td>';
				echo'<td>'.$user->first_name.'</td>';
				echo'<td>'.$user->last_name.'</td>';
				echo'<td>'.$billing_email.'</td>';
				echo '</tr>';
				$count++;
		
	}
echo 'Total:'.$count;
?>
</table>

	