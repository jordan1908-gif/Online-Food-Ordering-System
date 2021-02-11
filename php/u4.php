<?php
include("staffconn.php");
	
$sql="UPDATE cakeproduct SET
product_price='$_POST[price]'

WHERE product_id='$_POST[id];'";

echo $sql;
if(mysqli_query($con,$sql)){
	mysqli_close($con);
	header('Location:updateprice.php');
}
?>