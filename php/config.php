<?php
    $conn = mysqli_connect("localhost","root","","cartsystem","3308");
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }
?>