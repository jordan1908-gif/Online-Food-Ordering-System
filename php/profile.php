<?php include("session.php");
require 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>User Profile</title>
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
    background-color: lavender;
    height: 750px;
    

}
      
      
      
	</style>
</head>
<body>

<img src="image/b1.jpg" style="position:fixed; right:1100px; bottom:120px; width:350px; height:500px; border:none;">   
<img src="image/b2.png" style="position:fixed; right:200px; bottom:110px; width:350px; height:500px; border:none;">     
 
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!--/ wrapper -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="scripts.js">
  </script>
  
  <!-- Brand -->
  <a class="navbar-brand" href="profile.php">Bake n Take Profile</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="profile.php">Profile  &nbsp;<i class="fas fa-user"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index2.php">Cakes  &nbsp;<i class="fas fa-birthday-cake"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index1.php">Milk Tea &nbsp;<i class='fas fa-glass-cheers'></i></a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart &nbsp;<i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="orderhistory.php">History &nbsp;<i class="fas fa-book"></i></a>
      </li>
      <li class="nav-item">
      <a href="index.php?logout=1" onclick="return confirm('Are you sure you want to logout?');" class="nav-link">Logout &nbsp;<i class="fas fa-sign-out-alt"></i></a>   
      </li>
    </ul>
  </div>
</nav>

<input type="checkbox" id="click">
    <label for="click">
      <i class="fab fa-facebook-messenger"></i>
      <i class="fas fa-times"></i>
    </label>
    <div class="wrapper">
        <div class="title">Chat With Us Now</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });

    $(document).ready(function(){
        $(".addItemBtn").click(function(e){
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var pcode = $form.find(".pcode").val();

            $.ajax({
                url: 'action.php',
                method: 'post',
                data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
                success:function(response){
                    $("#message").html(response);
                    window.scrollTo(0,0);
                    load_cart_item_number();
                }
            });
        });
    });

    load_cart_item_number();

    function load_cart_item_number(){
        $.ajax({
            url: 'action.php',
            method:'get',
            data: {cartItem:"cart_item"},
            success:function(response){
                $("#cart-item").html(response);
            }
        }

        )
    }
    </script>


<?php
    $id = $_SESSION['id'];
    $conn = mysqli_connect("localhost","root","","cartsystem","3308");
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }

    $sql = "SELECT username,email,contact,cardnumber,address,gender,id from users WHERE id=$id";
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
            echo 'Card Number:<br>'.$dispnum=substr($row['cardnumber'],0,5).'<br><br>';
            echo 'Address:<br>'.$row["address"].'<br><br>';
            echo '<a class="btn btn-success" href="edit1.php?id='.$row['id'].'">Update Details</a>';
            echo '<a class="btn btn-primary"  href="creditcard.php?id='.$row['id'].'" style="color: white; position:static; width: 200px; margin-left:20px; bottom:40px;">Update Credit Card</a>';
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