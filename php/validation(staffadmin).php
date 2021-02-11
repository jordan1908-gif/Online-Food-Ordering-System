<?php
    session_start();

    $con = mysqli_connect("localhost","root","","userregistration","3308");
    
    $name = $_POST['user'];
    $email =$_POST['email'];
    $pass = $_POST['password'];

    $s = "SELECT * from admin where name = '$name' && password = '$pass'";
    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result);

	if($num == 1){
        $_SESSION['username'] = $name;
        header('location:home(staffadmin).php');
    } else {
        header('location:login(staffadmin).php'); 
    }


?>