<?php 
include("staffsession.php");
require 'config.php';
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $queries =$_POST['queries'];
    $replies = $_POST['replies'];
    $ins_query="INSERT into chatbot
    (`queries`,`replies`)values
    ('$queries','$replies')";
    mysqli_query($conn,$ins_query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.";
}
?>

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
            width: 400px;
        }
            tr td:nth-child(3) {
            width: 400px;
        }
            tr td:nth-child(4) {
            width: 70px;
        }
            tr td:nth-child(5) {
            width: 40px;
        }
      
      
      
	</style>
</head>
<body>
<header>
        <?php include("header6.php"); ?>
</header>


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light mt-5 rounded">
            <h2 class="text-center p-2">Insert New Q&A</h2>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<div class="form-group">
 <input type="text" name="queries" class="form-control" placeholder="Queries" required>
</div>
<div class="form-group">
 <textarea name="replies" class="form-control" placeholder="Replies" required></textarea>
</div>
<div class="form-group">
 <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
</div>
</form>
<p style="color:#008000;"><?php echo $status; ?></p>
</div>
</div>
</div>


<br>
<div class="form">
<h2 style="text-align: center;">View All Q&A</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>ID</strong></th>
<th><strong>Query</strong></th>
<th><strong>Reply</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from chatbot ORDER BY id ASC;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["queries"]; ?></td>
<td align="center"><?php echo $row["replies"]; ?></td>
<td align="center">
<a href="edit3.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete1.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete the query?');">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>


    
 




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    

    






</html> 