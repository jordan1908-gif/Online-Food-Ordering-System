<?php require_once 'authController.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

    <title>Reset Password</title>
</head>

<header>
            <div class="overlay"></div>
            <nav>
              <h2 style="color: white;">Reset Password Page</h2>
                <ul>
                    <li><a href="homepage.php" >Home</a></li>
                </ul>
            </nav>
    
</header>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
                <form action="reset_password.php" method="post">
                    <h3 class="text-center">Reset your password</h3>

                    <?php if(count($errors) >0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?> </li>
                            <?php endforeach; ?> 
                        </div>
                    <?php endif; ?> 

                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="passwordConf" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="reset-password-btn" class="btn btn-primary btn-block btn-lg">Reset Password</button>
                    </div>
                    
                
                </form>
            </div>
        </div>
    </div>
</body>

</html>