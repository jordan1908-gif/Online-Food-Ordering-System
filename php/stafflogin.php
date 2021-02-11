<?php require_once 'authController1.php'; ?>
<html>
	<head>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">    
    </head>
    <header>
            <div class="overlay"></div>
            <nav>
              <h2 style="color: white;">Staff Login Page</h2>
                <ul>
                    <li><a href="homepage.php" class="cool-link">Home</a></li>
                    <li><a href="userrole.html" class="cool-link">User Roles</a></li>
                </ul>
            </nav>
    
    </header>
	<style>
    body {
    overflow-y: hidden; /* Hide scrollbars */
    }
    </style>
    
    <body>
    <img src="image/staff2.png" class="avatar2" style="position:fixed; top:-70px; height:190px; width: 210px;  border:none;">
    <img src="image/cake.gif" style="position:fixed; right:1160px; bottom:210px; width:310px; height:310px; border:none;"> 
    <img src="image/cat2.gif" style="position:fixed; right:250px; bottom:195px; width:300px; height:300px; border:none;">  
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
                <form action="stafflogin.php" method="post">
                    <h3 class="text-center">Staff Login</h3>

                    <?php if(count($errors) >0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?> </li>
                            <?php endforeach; ?> 
                        </div>
                    <?php endif; ?> 


                    <div class="form-group">
                        <label for="username">Username or Email</label>
                        <input type="text" name="username" value="<?php echo $username; ?>"  class="form-control form-control-lg">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" value="" id="myInput">
                        <input type="checkbox" onclick="myFunction()">Show Password
                        <script>
                            function myFunction() {
                                var x = document.getElementById("myInput");
                                    if (x.type === "password") {
                                        x.type = "text";
                                    } else {
                                        x.type = "password";
                                            }
                                    }
                        </script>
                    </div>
                    
            
                    <div class="form-group">
                        <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Login</button>
                    </div>
                    <p class="text-center">Not yet a member? <a href="staffsignup.php">Sign Up</a></p>
                    <div style="font-size 0.8em; text-align: center;">
                    <a href="forgot_password1.php">Forgot/ Change your password?</a></div>
                
        </form>
    </div>
    </div>
    </div>
</body>
	
</html>

