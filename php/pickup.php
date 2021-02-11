

<html>
<head>
<link rel="stylesheet" type="text/css" href="staff2.css">
</head>
<body>
    <header>
        <?php include("header.php"); ?>
    </header>
    <?php
        include("staffconn.php");
        $result = mysqli_query($con, "SELECT * FROM completeorder");
    ?>
    <?php
		while ($row = mysqli_fetch_array($result))
		{
			echo '<div class="box">';			
	
			echo 'ID:'.$row['OrderID'].'<br><br>';
            echo 'Customer name:<br>'.$row['Cust_name'].'<br><br>';
            echo 'Contact no:<br>'.$row['Cust_phone'].'<br><br>';
            echo 'Amount paid(RM):<br>'.$row['Amount_paid'].'<br><br>';
            echo '<a class="submit" onclick="return confirm(\'Ready for Customer: '.$row['Cust_name'].' ?\')"  
            href="done1.php?id='.$row['OrderID'].'">Collected</a>';
            echo '</div>';
           
		}
	?>
</body>
</html>