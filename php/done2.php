<?php
include("staffconn.php");
$id = intval($_GET['id']);
$result = mysqli_query($con,"DELETE FROM product WHERE product_id=$id");
$sql = "UPDATE staffproduct SET product_status='Sold Out' WHERE product_id=$id";
	if(!mysqli_query($con,$sql))
	{
	die('Error:'.mysqli_error($con));
	}	
	echo '<script>alert("Successfully Updated!");
	window.location.href="updateprice.php";
	</script>';	
mysqli_close($con);

?>
