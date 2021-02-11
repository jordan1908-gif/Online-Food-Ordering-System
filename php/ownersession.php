<?php
session_start();

if (!isset($_SESSION['id']))
{
		echo "<script>alert('Please login!'); window.location.href='ownerlogin.php';</script>";
}
else{
	$id = $_SESSION["id"];
}	
?>