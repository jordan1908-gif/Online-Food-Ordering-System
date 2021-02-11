<?php require_once 'authController2.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

    <title>Forgot Password</title>
</head>

<header>
            <div class="overlay"></div>
            <nav>
              <h2 style="color: white;">Forgot Password Page</h2>
            </nav>
    
</header>
<body>
<img src="image/confused.png" style="position:fixed; right:1200px; bottom:250px; width:330px; height:350px; border:none;"> 
<img src="image/forgot.gif" style="position:fixed; right:200px; bottom:195px; width:400px; height:400px; border:none;">  
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
                <form action="forgot_password2.php" method="post">
                    <h3 class="text-center">Recover your password</h3>
                    <p>
                        Please enter your email address you used to sign up on this site and we will assist you in recovering your password.
                    </p>
                    <?php if(count($errors) >0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?> </li>
                            <?php endforeach; ?> 
                        </div>
                    <?php endif; ?> 


                    <div class="form-group">
                        <input type="text" name="email" class="form-control form-control-lg">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="forgot-password" class="btn btn-primary btn-block btn-lg">Recover your password</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>

</html>