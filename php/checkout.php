<?php
    session_start();
    require 'config.php';

    $grand_total = 0;
    $allItems = '';
    $items = array(); 
    $puserid = $_SESSION["id"];

    $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, 
    total_price FROM cart WHERE userid=$puserid";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $grand_total +=$row['total_price'];
        $items[] = $row['ItemQty'];
    }
    $allItems = implode(",", $items);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>Checkout</title>
    <link rel="stylesheet" href="bot.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"crossorigin="annonymous">
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="checkout.php">Bake n Take Checkout</a>

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
        <a class="nav-link active" href="checkout.php">Checkout &nbsp;<i class="fa fa-credit-card"></i></a>
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

<div class="container">
    <div class="row justify-content-center">
        <div class=".col-lg-6 px-4 pb-4" id="order">
            <h4 class="text-center text-info p-2">Complete your order!</h4>
            <div class="jumpbotron p-3 mb-2 text-center">
                <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
                <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2)?></h5>
            </div>

            <?php
              include("config.php");
              $id = $_SESSION['id'];
		          $sql = "SELECT * FROM users WHERE id=$id";
	          	$result = mysqli_query($conn,$sql);
		          while($row=mysqli_fetch_array($result))
		          {
	          ?> 

            <form action=""method="post" id="placeOrder">
              <input type="hidden" name="products" value="<?= $allItems;?>">
              <input type="hidden" name="grand_total" value="<?= $grand_total;?>">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" value="<?php echo $row['username']?>" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" value="<?php echo $row['email']?>" placeholder="Enter E-Mail" required>
                </div>
                <div class="form-group">
                  <input type="tel" name="phone" class="form-control" value="<?php echo $row['contact']?>"placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                  <input type="address" name="address" class="form-control" value="<?php echo $row['address']?>"placeholder="Enter Home Address" required>
                </div>
                <div class="form-group">
                  <input type="cc" name="cc" id="cc" style="display: none" class="form-control" readonly="readonly" value="<?php echo $row['cardnumber']?>"placeholder="Enter Credit Card" required>
                </div>
              <h6 class="text-center lead">Select Payment Method</h6>
                <div class="form-group">
                  <select onchange="checkOptions(this)" id="pmode" name="pmode" class="form-control">
                    <option value="" selected disabled>-Select Payment Method-</option>
                    <option value="cod">Cash On Delivery</option>
                    <option value="cc">Credit Card</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <input type="submit" name="submit" value="Confirm Order" class="btn btn-danger btn-block">
                  <img src="image/thankyou.png" style="position:static; margin-left:620px; bottom:100px; width:170px; height:150px; border:none;"> 
                  <img src="image/cat4.gif" style="position:static; margin-left:460px; margin-top:-130px; width:200px; height:300px; border:none;"> 
                </div>
            </form>
            <?php
		          }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    var otherInput;
function checkOptions(select) {
  otherInput = document.getElementById('cc');
  if (select.options[select.selectedIndex].value == "cc") {
    otherInput.style.display = 'block';
    
  }
  else {
    otherInput.style.display = 'none';
  }
}
</script>

    <script type="text/javascript">
    $(document).ready(function () {
$("#cc").mask("9999 9999 9999 9999");
});




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

function myFunction() {
    str = document.getElementById('num').value;

    str=str.replace(/\s/g, '');
    if(str.length%4==0){
    
        document.getElementById('num').value+=" ";
    }
}
</script>
</body> 


</html> 