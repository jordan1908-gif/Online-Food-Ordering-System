<?php
require_once 'authController2.php'; 

// verify the user login token
if (isset($_GET['token'])) {
    $token = $_GET['token']; 
    verifyUser($token);
}

// verify the user login token
if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token']; 
    resetPassword($passwordToken);
}

if (!isset($_SESSION['id'])) {
    header('location: ownerlogin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

    <title>Homepage</title>
</head>

<header>
            <div class="overlay"></div>
            <nav>
              <h2 style="color: white;">Login Page</h2>
            </nav>
    
</header>
<body>
 
            <img src="image/girl.png" style="position:fixed; right:1200px; bottom:180px; width:370px; height:330px; border:none;"> 

            <img src="image/boy.png" style="position:fixed; right:200px; bottom:195px; width:300px; height:320px; border:none;">       
    
        
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">

            <?php if(isset($_SESSION['message'])): ?>
                <div class="alert <?php echo $_SESSION['alert-class']; ?>">
                   <?php
                     echo $_SESSION['message']; 
                     unset($_SESSION['message']);
                     unset($_SESSION['alert-class']);
                    ?>
                </div>
            <?php endif; ?>

                <h3> Welcome, <?php echo $_SESSION['username']; ?> </h3>

                <a href="index.php?logout=1" class="logout"></a>

            <?php if(!$_SESSION['verified']): ?>
                <div class="alert alert-warning">
                You need to verify your account before proceeding!
                Sign in to your email account and click on the verification link that has been sent to you at
                <strong><?php echo $_SESSION['email']; ?></strong>
                </div>
            <?php endif; ?>

            <?php if($_SESSION['verified']): ?>
                <button class="btn btn-block btn-lg btn-primary">
                <a href="home(staffadmin).php" style="color:white;"> You have been verified!</button>
            <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>