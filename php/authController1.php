<?php

session_start();

require 'db2.php';
require_once 'emailController1.php';

$errors = array();
$username = "";
$email = "";

// if user clicks on the sign up button
if (isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];


    // validation
    if (empty($username)) {
        $errors['username'] = "Username required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email address is invalid";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }
    if (empty($contact)) {
        $errors['contact'] = "Contact number required";
    }
    if (empty($address)) {
        $errors['address'] = "Address required";
    }
    if (empty($gender)) {
        $errors['gender'] = "Gender required";
    }
    if (empty($position)) {
        $errors['position'] = "Position required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }

    if($password !== $passwordConf) {
        $errors ['password'] = "The two passwords do not match";
    }

    $emailQuery = "SELECT * FROM staff WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0) {
        $errors['email'] = "Email already exists";
    }

    $usernameQuery = "SELECT * FROM staff WHERE username=? LIMIT 1";
    $stmt = $conn->prepare($usernameQuery);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0) {
        $errors['username'] = "Username already exists";
    }


    if (count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false; 

        $sql = "INSERT INTO staff (username, email, contact, address, gender, position, verified, token, password) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssbss',$username, $email, $contact, $address, $gender, $position, $verified, $token, $password);
       
       if ($stmt->execute()) {
            // login user
            $user_id = $conn->insert_id; 
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;

            sendVerificationEmail($email, $token);


            // flash message
            $_SESSION['message'] = "You are now logged in!";
            $_SESSION['alert-class'] = "alert-success";
            header('location:staffindex.php');
            exit();
        } else {
           $errors['db_error'] = "Database error: failed to register"; 
       }
    }

}

// if user clicks on the login button 
if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // validation
    if (empty($username)) {
        $errors['username'] = "Username required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }

    if (count($errors)===0) {
    $sql = "SELECT * FROM staff WHERE email=? OR username=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss',$username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // login success
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['verified'] = $user['verified'];
        // flash message
        $_SESSION['message'] = "You are now logged in!";
        $_SESSION['alert-class'] = "alert-success";
        header('location:staffindex.php');
        exit();
    } else {
        $errors['login_fail']= "Wrong credentials";
    }
}

}

//logout user 
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: stafflogin.php');
    exit();
}

// verify user by token
function verifyUser($token)
{
    global $conn;
    $sql = "SELECT * FROM staff WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE staff SET verified=1 WHERE token='$token'";

        if (mysqli_query($conn, $update_query)) {
          // log user in   
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;
         // flash message
            $_SESSION['message'] = "Your email address has been successfully verified!";
            $_SESSION['alert-class'] = "alert-success";
            header('location:staffindex.php');
            exit();
        }
    } else {
        echo 'User not found';
    }
}

// if user clicks on the forgot password button
if (isset($_POST['forgot-password'])) {
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email address is invalid";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }

    if (count($errors) ==0) {
       $sql = "SELECT * FROM staff WHERE email='$email' LIMIT 1"; 
       $result = mysqli_query($conn, $sql);
       $user = mysqli_fetch_assoc($result);
       $token = $user['token'];
       sendPasswordResetLink($email, $token);
       header('location: password_message1.php');
       exit(0);
    }
}

// if user clicked on the reset password button
if (isset($_POST['reset-password-btn'])) {
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    if (empty($password) || empty($passwordConf)) {
        $errors['password'] = "Password required";
    }
    if($password !== $passwordConf) {
        $errors ['password'] = "The two passwords do not match";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    if(count($errors)== 0) {
        $sql= "UPDATE staff SET password='$password' WHERE email='$email'";
        $result= mysqli_query($conn, $sql);
        if ($result) {
            header('location:stafflogin.php');
            exit(0);
        }
    }
}

function resetPassword($token)
{
    global $conn;
    $sql = "SELECT * FROM staff WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: reset_password1.php');
    exit(0);
}