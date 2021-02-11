<?php include("session.php");
require 'config.php'; 

?>
    
  

   


<?php 
    // Delete Data
if (isset($_POST['del_data'])) {
	$query="DELETE FROM sales WHERE id=".$_POST['id'];
	$result = mysqli_query($conn, $query);
	if($result){
        $msg= "Data deleted successfully";
        $msgClass="alert-success";
	}
	else {
        $msg= "Data deleted successfully";
        $msgClass="alert-danger";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    
     <!-- Bootstrap CDN -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- Data Tables -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">

      <!-- Modal CSS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
       
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
    <!-- Title  -->
    <title>Sales</title>  

    <style>
            header {
            background-image: url('bake1.png');
            background-repeat: no-repeat;
            background-size: initial;
            background-position: center;
            height: 150px;
            position: relative;
            }

            table, td, th {  
  border: 1px solid black;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}

thead {
    background-color: lavender;
}
	</style>
 </head>
<body>
<header>
        <?php include("header1.php"); ?>
</header>
<div class = "container1" style = "margin-top: -90px; margin-left:50px; padding: 150px;">
<?php
     if (isset($msg)) { ?>
        <div class="form-group">
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?>
            </div>
        </div>
        <?php
        }
	?>
  
     

     <div class="container">

<h2 style="margin-left: 390px;"><b>Search Range for Profit</b></h2><br>
<div class="col-md-2" style="margin-left: 370px;">
Start:
<input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
</div>
<div class="col-md-2" style="margin-left: 570px; margin-top:-61px;">
End:
<input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
</div>
<div class="col-md-8" style="margin-left:490px; margin-top:30px;">
<input type="button" name="range" id="range" value="Search Now!" class="btn btn-success"/>
</div>
</div>

    
  
   

    <table id="example" class="display responsive nowrap" style = "border: 1px solid black;  
    position:relative;width: 100%; ">
        <thead>
            <tr>
                <th>No#</th>
                <th>Time</th>
                <th>Amount Earned (RM)</th>
            </tr>
        </thead>
        <tbody>


<?php
    require 'config.php';
    $sql = "SELECT * FROM deliveredorders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $time          =  $row["order_timestamp"];
            $amount        =  $row['amount_paid'];
            $id            =  $row["id"];
?>

            <tr>
                <td><?php $i++; echo $i; ?></td>
                <td><?php echo $time; ?></td>
                <td><?php echo $amount; ?></td>
               
                
                
                   
                   
                
             <?php }  ?>
            </tr>
         <?php } ?>  
     </tbody>
  </table>







    <button class = "btn btn-primary btn-sm"><a href = "profitchart.php" style = "text-decoration: none; right:50px; color: #fff;"><i class="fas fa-chart-bar"></i> Graphical Results</a></button>


    <script src="https://code.jquery.com/jquery-3.4.0.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
   
   <script>
$(document).ready(function(){
	$.datepicker.setDefaults({
		dateFormat: 'yy-mm-dd'
	});
	$(function(){
		$("#From").datepicker();
		$("#to").datepicker();
	});
	$('#range').click(function(){
		var From = $('#From').val();
		var to = $('#to').val();
		if(From != '' && to != '')
		{
			$.ajax({
				url:"range1.php",
				method:"POST",
				data:{From:From, to:to},
				success:function(data)
				{
					$('#example').html(data);
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});
</script>
    

    



</body> 


</html> 