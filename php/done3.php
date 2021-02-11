<?php
include("staffconn.php");


$id = intval($_GET['id']);

$result = mysqli_query($con,"DELETE FROM cakeproduct WHERE product_id=$id");

mysqli_close($con);
header('Location: updateprice.php')
?>
