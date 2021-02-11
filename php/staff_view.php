<?php include("staffsession.php");
require 'config.php'; ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="staff1.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>
<body>
    
    <header>
        <?php include("header8.php"); ?>
    </header>

    <div class="form-inline" style="margin-left:640px;">
<form method="post" action="staff_view.php">
	<br>Orders:
			<input type="text" style="padding: 10px; border: 2px solid darkslateblue;" placeholder=" Search with Order ID" name="id"> 
			<input type="submit" style="padding: 10px; width:80px; " name="searchBtn" value="Search"> <br><br>
</form>	
</div>


<?php
    
    $conn = mysqli_connect("localhost","root","","cartsystem","3308");
    if(isset($_POST['searchBtn']))
			{
				$orderid= $_POST['id'];
				$sql="SELECT * FROM orders WHERE id LIKE '%" .$orderid."%'";
			}
			else
			{
				$sql = "SELECT * FROM orders order by id ASC";
			}
			
      $result= mysqli_query($conn,$sql);
      
      while($row = mysqli_fetch_array($result))
		{
			echo '<div class="box">';			
            echo 'Order ID:'.$row['id'].'<br>';
            echo '<br>Customer: '.$row['name'].'<br>';
            echo '<br>Contact No: '.$row['phone'].'<br>';
            echo '<br>Home Address: '.$row['address'].'<br>';
            echo '<br>Payment Method: '.$row['pmode'].'<br>';
            echo '<br>Orders:<br>'.$row['products'].'<br>';
            echo '<br>Total Amount (RM):<br>'.$row['amount_paid'].'<br>';
            echo '<br>Order time:<br>'.$row['order_timestamp'].'<br>';
            echo '<br>Delivery time:<br>'.$row['deliver_timestamp'];
            echo '<a class="done" onclick="return confirm(\'Update for OrderID: '.$row['id'].' ?\')"  
            href="done.php?id='.$row['id'].'">Order Received</a><br><br>';
            echo '<a class="done4" onclick="return confirm(\'Update for OrderID: '.$row['id'].' ?\')"    
            href="done4.php?id='.$row['id'].'">Order Being Prepared</a><br><br>';
            echo '<a class="done5" onclick="return confirm(\'Update for OrderID: '.$row['id'].' ?\')"   
            href="done5.php?id='.$row['id'].'">Order is on its way!</a><br><br>';
            echo '<a class="done6" onclick="return confirm(\'Update for OrderID: '.$row['id'].' ?\')"   
            href="done6.php?id='.$row['id'].'">Order has been delivered!</a><br><br>';
            echo '<a href="done1.php?id='.$row['id'].'" class="done7" onclick="return confirm(\'Close for OrderID: '.$row['id'].' ?\')"   
            >X</a><br><br>';
            echo '</div>';
		}
		?>


























    <script>
        document.getElementById('form-button').onclick = function () {
    this.disabled = true;
}
    </script>
</body>
</html>