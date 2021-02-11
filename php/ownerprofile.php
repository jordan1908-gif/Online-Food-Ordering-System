<?php include("ownersession.php");
require 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>Owner Profile</title>
    <link rel="stylesheet" href="bot.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <style>
			body {
				font-family: Georgia, serif;
                overflow-y: visible;
                
			}
			
            .form-div {
                margin: 50px auto 50px;
                padding: 25px 15px 10px 15px;
                border:1px solid #000;
                border-radius: 5px;
                font-size: 1.2em;
                font-family: 'EB Garamond', serif;
                width: 400px;
                text-align: center;
                background-color: lightsteelblue;
                height: 680px;
            }

            header {
            background-image: url('bake1.png');
            background-repeat: no-repeat;
            background-size: initial;
            background-position: center;
            height: 150px;
            position: relative;
            }
      
      
      
	</style>
</head>
<body>
<header>
        <?php include("header1.php"); ?>
    </header>
<img src="image/b1.jpg" style="position:fixed; right:1100px; bottom:120px; width:350px; height:500px; border:none;">   
<img src="image/b2.png" style="position:fixed; right:200px; bottom:110px; width:350px; height:500px; border:none;">     
 




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    

    


<?php
    $id = $_SESSION['id'];
    $conn = mysqli_connect("localhost","root","","cartsystem","3308");
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }

    $sql = "SELECT username,email,contact,address,gender,id from owner WHERE id=$id";
    $result = $conn-> query($sql);

    if ($result-> num_rows>0) {
        while ($row = $result -> fetch_assoc()) {
            echo '<div class="col-md-4 offset-md-4 form-div login">';
            
            if($row['gender'] =="Male")
            {
                $genderIcon = "male.png";
            }
            else {
                $genderIcon = "female.png";
            }
            echo '<img src="image/'.$genderIcon.'"width="120px" style="position:relative; right:1px;">';
            echo '<h3 style="text-align: center;"></h3>';
            echo 'Name:<br>'.$row["username"].'<br><br>';
            echo 'Gender:<br>'.$row["gender"].'<br><br>';
            echo 'Email:<br>'.$row["email"].'<br><br>';
            echo 'Contact:<br>'.$row["contact"].'<br><br>';
            echo 'Address:<br>'.$row["address"].'<br><br>';
            echo '<a class="btn btn-success" href="edit4.php?id='.$row['id'].'">Update Details</a>';
            echo '</div>';
            
        }
    }
    else {
        echo "0 result";
    }



    $conn-> close();

    

    ?>
</body> 


</html> 