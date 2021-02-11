<?php
include("config.php");
$sql = "UPDATE staff SET
username='$_POST[username]',
email='$_POST[email]',
contact='$_POST[contact]',
address='$_POST[address]',
gender='$_POST[gender]',
position='$_POST[position]'
WHERE id=$_POST[id];";
if (!mysqli_query($conn, $sql)) {
    die('Error: '.mysqli_error($conn));
}
echo'<script>alert("Your details have been updated successfully!"); 
window.location.href = "staffprofile.php";
</script>';
mysqli_close($conn);
?>