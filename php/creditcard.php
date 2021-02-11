<?php include("session.php"); ?>
<html>
<head>
<title>Credit Card Validator</title>
<head>
<link href="credit.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="jquery-creditcardvalidator/jquery.creditCardValidator.js"></script>
<script>
function validate(){
	var valid = true;	 
    $(".demoInputBox").css('background-color','');
    var message = "";

    var cardHolderNameRegex = /^[a-z ,.'-]+$/i;
    var cvvRegex = /^[0-9]{3,3}$/;
    
    var cardHolderName = $("#card-holder-name").val();
    var cardNumber = $("#card-number").val();
    var cvv = $("#cvv").val();

    if(cardHolderName == "" || cardNumber == "" || cvv == "") {
    	   message  += "<div>All Fields are Required.</div>";  
    	   if(cardHolderName == "") {
    		   $("#card-holder-name").css('background-color','#FFFFDF');
    	   }
    	   if(cardNumber == "") {
    		   $("#card-number").css('background-color','#FFFFDF');
    	   }
    	   if (cvv == "") {
    		   $("#cvv").css('background-color','#FFFFDF');
    	   }
       valid = false;
    }
    
    if (cardHolderName != "" && !cardHolderNameRegex.test(cardHolderName)) {
        message  += "<div>Card Holder Name is Invalid</div>";    
    		$("#card-holder-name").css('background-color','#FFFFDF');
    		valid = false;
    }
    
    if(cardNumber != "") {
        	$('#card-number').validateCreditCard(function(result){
            if(!(result.valid)){
                	message  += "<div>Card Number is Invalid</div>";    
            		$("#card-number").css('background-color','#FFFFDF');
            		valid = false;
            }
        });
    }
    
    if (cvv != "" && !cvvRegex.test(cvv)) {
        message  += "<div>CVV is Invalid</div>";    
        $("#cvv").css('background-color','#FFFFDF');
    		valid = false;
    }
    
    if(message != "") {
        $("#error-message").show();
        $("#error-message").html(message);
    }
    return valid;
}
</script>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  
  
<img src="image/b1.jpg" style="position:fixed; right:1130px; bottom:120px; width:350px; height:500px; border:none;">   
<img src="image/b2.png" style="position:fixed; right:200px; bottom:110px; width:350px; height:500px; border:none;">   
  
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
<?php
        include("config.php");
        $id = intval($_GET['id']);
        
		$sql = "SELECT * FROM users WHERE id=$id";
		$result = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result))
		{
    ?>
    <form id="frmContact" action="updatecc.php" method="post"
        onSubmit="return validate();">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <div class="field-row">
        <i class="fab fa-cc-visa fa-3x" style="color:black;"></i> &nbsp;
        <i class="fab fa-cc-paypal fa-3x" style="color:black;"></i> &nbsp;
        <i class="fab fa-cc-mastercard fa-3x" style="color:black;"></i> &nbsp;
        <i class="fab fa-cc-amex fa-3x" style="color:black;"></i> &nbsp;
        <i class="fab fa-cc-jcb fa-3x" style="color:black;"></i>
            <label style="padding-top: 20px;">Card Holder Name</label> <span
                id="card-holder-name-info" class="info"></span><br /> <input name="cardholder"
                type="text" id="card-holder-name" class="demoInputBox" />
        </div>
        <div class="field-row">
            <label>Card Number</label> <span id="card-number-info"
                class="info"></span><br /> <input type="text" name="cardnumber"
                id="card-number" class="demoInputBox">
        </div>
        <div class="field-row">
            <div class="contact-row column-right">
                <label>Expiry Month / Year</label> <span
                    id="userEmail-info" class="info"></span><br /> <select
                    name="expiryMonth" id="expiryMonth"
                    class="demoSelectBox">
                <?php
                for ($i = date("m"); $i <= 12; $i ++) {
                    $monthValue = $i;
                    if (strlen($i) < 2) {
                        $monthValue = "0" . $monthValue;
                    }
                    ?>
                <option value="<?php echo $monthValue; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
                </select> <select name="expiryMonth" id="expiryMonth"
                    class="demoSelectBox">
            <?php
            for ($i = date("Y"); $i <= 2030; $i ++) {
                $yearValue = substr($i, 2);
                ?>
            <option value="<?php echo $yearValue; ?>"><?php echo $i; ?></option>
            <?php
            }
            ?>
            </select>
            </div>
            <div class="contact-row cvv-box">
                <label>CVV</label> <span id="cvv-info" class="info"></span><br />
                <input type="text" name="cvv" id="cvv"
                    class="demoInputBox cvv-input">
            </div>
        </div>
        <div>
            <input type="submit"  value="Submit" class="btnAction" />
        </div>
        <div id="error-message"></div>

    </form>
    <?php
		}
		mysqli_close($conn);
		?>

</body>
</html>