<?php
include("session(staffadmin).php");
$connect = mysqli_connect("localhost", "root", "", "cartsystem","3308");  
$query = "SELECT * FROM deliveredorders";  
$result = mysqli_query($connect, $query);  
?>

<!DOCTYPE html>
<html>
<head>
    <Title>Order History</title>
    <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <!-- Popper JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

     <!-- Latest compiled JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
     
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
            background-color: pink;
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
            width: 740px;
        }
        tr td:nth-child(4) {
            width: 190px;
        }

    </style>
</head>
<header>
       <?php include("header7.php"); ?>
    </header>
<body>

                </br></br>
                <h1 align="center">Customer Order History</h1> &nbsp; 
                <div class="form-inline">
                    <input type="text" style="margin-left: 740px; padding: 10px; border: 2px solid pink;" name="search" id="search_text" class="
                    form-control form-control-lg rounded-0 border-primary" placeholder="Search with ID or Name">
               </div>

<table id="table-data">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Products</th>
        <th>Total Amount (RM)</th>
        <th>Order Period</th>
        <th>Deliver Period </th>
        
    </tr>
    <?php
    $conn = mysqli_connect("localhost","root","","cartsystem","3308");
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }

    $sql = "SELECT id,name,products,amount_paid,order_timestamp,deliver_timestamp from deliveredorders ORDER by id ASC";
    $result = $conn-> query($sql);

    if ($result-> num_rows>0) {
        while ($row = $result -> fetch_assoc()) {
            echo "<tr><td>". $row["id"]. "</td><td>". $row["name"]. "</td><td>" .$row["products"]. "</td><td>" .$row["amount_paid"] ."</td><td>" .$row["order_timestamp"]."</td><td>" .$row["deliver_timestamp"]."</td></tr>";
        }
        echo "</table>";
    }
    else {
        echo "0 result";
    }

    $conn-> close();

    ?>
    </table>
    <script type="text/javascript">
     $(document).ready(function(){
          $("#search_text").keyup(function(){
               var search = $(this).val();
               $.ajax({
                    url:'action2.php',
                    method: 'post',
                    data:{query:search},
                    success:function(response){
                         $("#table-data").html(response);
                    }
               });
          });
     });
</script>
    </body>
    </html>
