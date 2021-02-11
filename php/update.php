<?php
include("config.php");
$sql = "UPDATE users SET
username='$_POST[username]',
email='$_POST[email]',
gender='$_POST[gender]',
contact='$_POST[contact]',
address='$_POST[address]'
WHERE id=$_POST[id];";
if (!mysqli_query($conn, $sql)) {
    die('Error: '.mysqli_error($conn));
}
echo'<script>alert("Your details have been updated successfully!"); 
window.location.href = "profile.php";
</script>';
mysqli_close($conn);


?>