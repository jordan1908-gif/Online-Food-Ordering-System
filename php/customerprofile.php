<?php  
 $connect = mysqli_connect("localhost", "root", "", "cartsystem","3308");  
 $query = "SELECT * FROM users";  
 $result = mysqli_query($connect, $query);  
 ?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>Customer Profile</title>

     <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <!-- Popper JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

     <!-- Latest compiled JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>  
    <style>
            header {
            background-image: url('bake1.png');
            background-repeat: no-repeat;
            background-size: initial;
            background-position: center;
            height: 150px;
            position: relative;
            }

            .content-table {
                border-collapse: collapse;
                margin: 25px 0; 
                font-size:1.5em;
                min-width: 400px;
                font-weight: bold;
                border-radius: 5px 5px 0 0 ;
                overflow: hidden;
                box-shadow: 0 0 20px rgba(0,0,0,0.15);
            }
            .content-table th {
                background-color: lightsalmon;
                color: white;
                padding: 12px 15px;

            }
            .content-table td {
                padding: 12px 15px;
                
            }
            .content-table tbody tr {
                border-bottom: 1px solid #dddddd;
            }
            .content-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }
            .content-table tbody tr:last-of-type {
                border-bottom: 2px solid lightsalmon;
            }  

            tr td:first-child {
            width: 300px;
        }

        tr td:nth-child(2) {
            width: 620px;
        }
        tr td:nth-child(3) {
            width: 200px;
        }
	</style>
</head>
<body>
<img src="image/bbtea.png" style="position:fixed; right:1240px; bottom:150px; width:400px; height:430px; border:none;">    
<img src="image/bbtea1.png" style="position:fixed; right:120px; bottom:150px; width:380px; height:420px; border:none;">   

<header>
        <?php include("header1.php"); ?>
</header>
<div class="container" style="width:600px;">
                </br></br>
                <h1 align="center">Customer Details & Database</h1> &nbsp; 
                <div class="form-inline">
                    <label for="search" class="font-weight-bold lead text-dark">
                    Search Record </label>&nbsp;
                    <input type="text" name="search" id="search_text" class="
                    form-control form-control-lg rounded-0 border-primary" placeholder="Search with ID or Name">
               </div>
                <div class="table-responsive">  
                     <table id="table-data" class="content-table"> 
                     <thead> 
                          <tr>  
                               <th>Customer ID</th> 
                               <th>Customer Name</th>  
                               <th>Details</th>  
                          </tr> 
                    </thead> 
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["id"]; ?></td>
                               <td><?php echo $row["username"]; ?></td>  
                               <td><input type="button" name="view" value="VIEW" id="<?php echo $row["id"]; ?>" class="btn btn-info btn view_data" /></td> 
                          </tr> 

                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 align="center" class="modal-title">Customer Details</h4>  
                </div>  
                <div class="modal-body" id="customer_name">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 

<script type="text/javascript">
     $(document).ready(function(){
          $("#search_text").keyup(function(){
               var search = $(this).val();
               $.ajax({
                    url:'action1.php',
                    method: 'post',
                    data:{query:search},
                    success:function(response){
                         $("#table-data").html(response);
                    }
               });
          });
     });
</script>



 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var customer_id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{customer_id:customer_id},  
                success:function(data){  
                     $('#customer_name').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
</body>  
 </html>  