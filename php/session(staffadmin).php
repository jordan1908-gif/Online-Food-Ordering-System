<?php 

session_start();

if (!isset($_SESSION["username"])) {
    echo "<script>alert('Please login!'); window.location.href='login(staffadmin).php';</script>";
}

?>