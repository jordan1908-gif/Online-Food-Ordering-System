<?php include("staffsession.php");
require 'config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Price</title>
		<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="staff3.css">
	</head>
	<header>
	
	</header>
	<body>
        <?php include("header2.php"); ?>
	
<div class="form-inline" style="margin-left:640px;">
<form method="post" action="updateprice.php">
	<br>Products:
			<input type="text" style="padding: 10px; border: 2px solid darkslateblue;" placeholder=" Search with product name" name="product_name"> 
			<input type="submit" style="padding: 10px; width:80px; " name="searchBtn" value="Search"> <br><br>
			<input type="hidden" name="product_code">
</form>	
</div>
<?php
    
    $conn = mysqli_connect("localhost","root","","cartsystem","3308");
    if(isset($_POST['searchBtn']))
			{
				$products= $_POST['product_name'];
				$pcode= $_POST['product_code'];
				$sql="SELECT * FROM staffproduct WHERE product_name LIKE '%" .$products."%' AND product_code LIKE '%" .$pcode."%'";
			}
			else
			{
				$sql = "SELECT * FROM staffproduct order by product_id ASC ";
			}
			
      $result= mysqli_query($conn,$sql);
      
      while($row = mysqli_fetch_array($result))
		{
			echo '<div class="box">';
			echo "<img src='".$row['product_image']."' margin-left='50' height='100' width='85'>";
			echo '<h3>'.$row['product_code'].'</h3>'.'<br><br>';
			echo 'Product Name:<br>'.$row['product_name'].'<br><br>';
			echo 'Product Status:<br>'.$row['product_status'].'<br><br>';
			echo 'Product Price:<br>'.$row['product_price'].'<br><br>';
			echo '<td><a class="edit" href="priceedit.php?id='.$row['product_id'].'">Edit</a> ';
			echo '<td><a class="edit" onclick="return confirm(\'Open for ProductID:'.$row['product_id'].' product?\')" href="done7.php?id='.$row['product_id'].'">Available</a> ';
			echo '<td><a class="delete" onclick="return confirm(\'Close for ProductID:'.$row['product_id'].' product?\')"  href="done2.php?id='.$row['product_id'].'">Sold out</a><br><br>';
			
			echo '</div>';
		}
		?>



		
	</body>
</html>