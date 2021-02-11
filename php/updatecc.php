<?php
include("config.php");
$sql = "UPDATE users SET
cardholder='$_POST[cardholder]',
cardnumber='$_POST[cardnumber]',
expiryMonth='$_POST[expiryMonth]',
cvv=MD5('$_POST[cvv]')
WHERE id=$_POST[id];";
if (mysqli_query($conn, $sql)) {
mysqli_close($conn);
header('Location: profile.php');
}
?>