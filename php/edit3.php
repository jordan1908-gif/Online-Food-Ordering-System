<?php
include("session.php");
require 'config.php';
$id=$_REQUEST['id'];
$query = "SELECT * from chatbot where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Query</title>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   


</head>
<header>
        <?php include("header6.php"); ?>
</header>
<style type="text/css">
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
            background-color: #9370DB;
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

        header {
            background-image: url('bake1.png');
            background-repeat: no-repeat;
            background-size: initial;
            background-position: center;
            height: 150px;
            position: relative;
            }
    </style>

<body>
<div class="form">
    <?php
        $status = "";
        if(isset($_POST['new']) && $_POST['new']==1) {
            $id=$_REQUEST['id'];
            $queries =$_REQUEST["queries"];
            $replies =$_REQUEST['replies'];
            $update="update chatbot set queries='".$queries."', replies='".$replies."' where id='".$id."'";
            mysqli_query($conn, $update) or die(mysqli_error());
            $status = "Query Updated Successfully.";
        }
    ?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-light mt-5 rounded">
            <h2 class="text-center p-2">Update Query</h2>
                <form name="form" method="post" action=""> 
                    <input type="hidden" name="new" value="1" />
                    <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                        <div class="form-group">
                            <input type="text" name="queries" class="form-control" placeholder="Queries" required value="<?php echo $row['queries'];?>" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="replies" class="form-control" placeholder="Replies" required value="<?php echo $row['replies'];?>" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success btn-block" value="Update">
                            <a href="chatbot.php" class="btn btn-warning btn-block btn-block">Go Back</a>
                        </div>

                    
                </form>
                    <p style="color:#008000;"><?php echo $status; ?></p>
            
        </div>
    </div>
</div>

<br>
<div class="form">
    <h2 style="text-align: center;">View Records</h2>
        <table id ="view" width="100%" border="1" style="border-collapse:collapse;">
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
</html>

