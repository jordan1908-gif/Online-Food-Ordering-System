<?php
include("session(staffadmin).php");
require('db1.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $quantity =$_POST['quantity'];
    $item = $_POST['item'];
    $ins_query="insert into inventory
    (`quantity`,`item`)values
    ('$quantity','$item')";
    mysqli_query($con,$ins_query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
        <meta charset="UTF-8">
        <style type="text/css">
         header {
            background-image: url('bake1.png');
            background-repeat: no-repeat;
            background-size: initial;
            background-position: center;
            height: 150px;
            position: relative;
            }
            
        table {
            border: 3px solid black;
            width: 100%;
            font-family: Georgia, serif;
            font-size: 25px;
            text-align: center;
            margin-top:10px;  
        }
        td {
            height: 100px;
            overflow: hidden;
            vertical-align: center;
        }
        th {
            height: 50px;
            background-color: #588c7e;
            color: white;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
        
        tr td:first-child {
            width: 100px;
        }

        tr td:nth-child(2) {
            width: 200px;
        }
        tr td:nth-child(3) {
            width: 400px;
        }
        tr td:nth-child(4) {
            width: 200px;
        }
        tr td:nth-child(5) {
            width: 200px;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>Add New Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"crossorigin="annonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="Admin.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <header>
        <?php include("header1.php"); ?>
    </header>
    
    
    
    <body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light mt-5 rounded">
            <h2 class="text-center p-2">Insert New Record</h2>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<div class="form-group">
 <input type="text" name="quantity" class="form-control" placeholder="Item Quantity" required>
</div>
<div class="form-group">
 <input type="text" name="item" class="form-control" placeholder="Item Name" required>
</div>
<div class="form-group">
 <input type="submit" name="submit" class="btn btn-danger btn-block" value="Submit">
</div>
</form>
<p style="color:#008000;"><?php echo $status; ?></p>
</div>
</div>
</div>


<br>
<div class="form">
<h2 style="text-align: center;">View Inventory Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Item</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from inventory ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["quantity"]; ?></td>
<td align="center"><?php echo $row["item"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete the item?');">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>



    </body>
    
    
</html>