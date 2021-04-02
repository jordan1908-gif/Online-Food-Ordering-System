<?php include("session.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>Bake n Take Cart</title>
    <link rel="stylesheet" href="bot.css">
    <style type="text/css">
        table-responsive mt-2 {
            border-collapse: collapse;
            width:100%;
            color: #7B68EE;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        th {
            background-color: #588c7e;
            color: white;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"crossorigin="annonymous">
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="cart.php">Bake n Take Cart</a>

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
        <a class="nav-link active" href="cart.php">Cart &nbsp;<i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
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
        <div class="col-lg-10">
        <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else {echo 'none';} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong> 
        </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered table_striped text-center">
                    <thead>
                    <tr>
                        <td colspan="7">
                            <h4 class="text-center-info m-0">Products in your cart!</h4>
                        </td>
                    </tr> 
                    <tr>
                        <th>Product ID</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>
                            <a href="action.php?clear=all" class="badge-danger badge p-1"
                            onclick="return confirm('Are you sure you want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                        </th>
                    </tr>
                    <thead>
                    <tbody>
                        <?php 
                        require 'config.php';
                        $puserid = $_SESSION["id"];
                        $stmt = $conn->prepare("SELECT * FROM cart WHERE userid=$puserid order by product_id ASC");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $grand_total = 0;
                        while($row = $result->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?= $row['product_id']?></td>
                            <input type="hidden" class="pid" value="<?= $row['product_id']?>">
                            <td><img src="<?= $row['product_image']?>" width="50"></td>
                            <td><?= $row['product_name']?></td>
                            <td>
                                <i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2);?>
                            </td>
                            <input type="hidden" class="pprice" value="<?= $row['product_price']?>">
                            <td>
                                <input type="number" name="qty" class="form-control itemQty" min="1" value="<?= $row['qty']?>" style="width:75px;">
                            </td>
                            <td><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['total_price'],2);?></td>
                            <td>
                                <a href="action.php?remove=<?= $row['product_id']?>" class="text-danger lead" onclick="return confirm('Are you sure you want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $grand_total +=$row['total_price'];?>
                        
                        <?php endwhile; ?>
                        <tr>
                            <td colspan="3">
                                <a href="index1.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
                             </td>
                            <td colspan="2"><b>Basket Total</b></td>
                            <td><b><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2);?></b></td>
                            <td>
                                <a href="checkout.php" class="btn btn-info <?= ($grand_total>1)?"":"disabled";?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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

            $(".itemQty").on('change', function(){
                var $el = $(this).closest('tr');

                var pid = $el.find(".pid").val();
                var pprice = $el.find(".pprice").val();
                var qty = $el.find(".itemQty").val();
                if(qty<1){
                    alert('No negative quantity allowed!');
                    location.reload(true);
                }
                else {
                location.reload(true);
                
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    cache: false,
                    data: {qty:qty,pid:pid,pprice:pprice},
                    success: function(response){
                        console.log(response);
                    }
                });
                }
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
