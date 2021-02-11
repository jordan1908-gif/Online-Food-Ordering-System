<?php
include("staffconn.php");

$id = intval($_GET['id']);

$result = mysqli_query($con,"SELECT * FROM orders WHERE id=$id;");
$row = mysqli_fetch_array($result);

$id = $row['id'];
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$pmode = $row['pmode'];
$products = $row['products'];
$amount_paid = $row['amount_paid'];
$order = $row['order_timestamp'];
$deliver = $row['deliver_timestamp'];
$orderstatus = $row['order_status'];
$userid = $row['userid'];


    $sql = "INSERT INTO deliveredorders (id, name, email, phone, pmode, products, amount_paid, order_timestamp, deliver_timestamp, order_status, userid)
    VALUES
    ('$id','$name','$email','$phone','$pmode','$products','$amount_paid','$order','$deliver','$orderstatus','$userid')";
    
    if(!mysqli_query($con,$sql))
	{
	die('Error:'.mysqli_error($con));
	}	
	echo '<script>alert("Order has been closed successfully!");
	window.location.href="staff_view";
	</script>';	
    
$result = mysqli_query($con,"DELETE FROM orders WHERE id=$id");

mysqli_close($con);

?>