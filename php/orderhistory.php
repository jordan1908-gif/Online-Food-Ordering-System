<?php

include("session.php");
require 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
    <Title>Order History</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"crossorigin="annonymous">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
    <style>
			body {
				font-family: Georgia, serif;
			}
			.box {
                float:left;
                margin:10px;
                padding:10px;
                width:400px;
                height:580px;
                background-color: lightblue;
                border-radius:10px;
      }	
      
      
		</style>
</head>

<body> <!-- style="background-color:mediumslateblue;"> -->


<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="orderhistory.php">Bake n Take Order History</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile  &nbsp;<i class="fas fa-user"></i></a>
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
        <a class="nav-link active" href="orderhistory.php">History &nbsp;<i class="fas fa-book"></i></a>
      </li>
      <li class="nav-item">
      <a href="index.php?logout=1" onclick="return confirm('Are you sure you want to logout?');" class="nav-link">Logout &nbsp;<i class="fas fa-sign-out-alt"></i></a>   
      </li>
    </ul>
  </div>
</nav>
<br>
<div class="form-inline" style="margin-left:570px;">
<form method="post" action="orderhistory.php">
	<br>Search Order History:
			<input type="text" name="products"> <input type="submit" name="searchBtn" value="Search"> <br><br>
</form>	
</div>

<?php
    $puserid = $_SESSION['id'];
    $conn = mysqli_connect("localhost","root","","cartsystem","3308");
    if(isset($_POST['searchBtn']))
			{
				$products= $_POST['products'];
				$sql="SELECT * FROM orders WHERE products LIKE '%" .$products."%' AND userid=$puserid";
			}
			else
			{
				$sql = "SELECT * FROM orders WHERE userid=$puserid";
			}
			
      $result= mysqli_query($conn,$sql);
      
      while($row = mysqli_fetch_array($result))
		{
      echo '<div class="box">';
      echo '<img src="image/bear.jpg" style="position:center;">';
            echo '<h3 style="text-align: center;"></h3>';
            echo 'Name:<br>'.$row["name"].'<br><br>';
            echo 'Products:<br>'.$row["products"].'<br><br>';
            echo 'Total Amount:<br>'.$row["amount_paid"].'<br><br>';
            echo 'Order Date:<br>'.$row["order_timestamp"].'<br><br>';
            echo 'Delivered At:<br>'.$row["deliver_timestamp"].'<br><br>';
            echo 'Order Status:<br>' .$row["order_status"].'<br><br>';

            echo '</div>';
    }
    ?>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      $("#placeOrder").submit(function(e){
        e.preventDefault();
        $.ajax({
          url: 'action.php',
          method:'post',
          data: $('form').serialize()+"&action=order",
          success: function(response){
            $("#order").html(response);
          }
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
        });
    }
});

    
</script>

    
   
    
    </body>
    </html>
