<?php
include("staffconn.php");
	
$sql="UPDATE product, staffproduct 
SET staffproduct.product_price='$_POST[price]',
product.product_price='$_POST[price]'
WHERE product.product_id='$_POST[id];'
AND staffproduct.product_id='$_POST[id];'";

if(!mysqli_query($con,$sql))
	{
	die('Error:'.mysqli_error($con));
	}	
	echo '<script>alert("Successfully Updated!");
	window.location.href="updateprice.php";
	</script>';	
	mysqli_close($con);
?>