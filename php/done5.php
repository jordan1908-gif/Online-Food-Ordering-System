<?php
include("staffconn.php");
$id = intval($_GET['id']);
$result = mysqli_query($con, "SELECT * FROM orders WHERE id=$id;");
$row=mysqli_fetch_array($result);

$OrderID = $row['id'];
$name = $row['name'];
$phone = $row['phone'];
$C_orders = $row['products'];
$amount = $row['amount_paid'];
$time = $row['order_timestamp'];

$sql = "UPDATE orders SET order_status='Order is now on its way. Estimated delivery time within 30 minutes!' WHERE id=$id";
	if(!mysqli_query($con,$sql))
	{
	die('Error:'.mysqli_error($con));
	}	
	echo '<script>alert("Successfully Updated!");
	window.location.href="staff_view";
	</script>';	

mysqli_close($con);

?>