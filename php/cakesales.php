<?php include("session.php");
require 'config.php'; 

$msg = '';
    $msgClass = '';
    
    if(isset($_POST['submit'])){
        $chocolatec        = $_POST['ChocolateCake'];
        $strawberryc     = $_POST['StrawberryCake'];
        $oreoc          = $_POST['OreoCake'];
        $caramelc           = $_POST['CaramelCake'];
        $tiramisuc          = $_POST['TiramisuCake'];
        $cheesecake           = $_POST['Cheesecake'];
        $macarons           = $_POST['Macarons'];
        $yamcupcake           = $_POST['YamCupcake'];
        

        $sql = "INSERT INTO cakesales(ChocolateCake, StrawberryCake, OreoCake, CaramelCake, TiramisuCake, Cheesecake, Macarons, YamCupcake) 
        VALUES('$chocolatec', '$strawberryc', '$oreoc', '$caramelc', '$tiramisuc', '$cheesecake', '$macarons', '$yamcupcake')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $msg = "Data inserted successfully";
            $msgClass="alert-success";
        }
        else {
            $msg = "Data not inserted";
            $msgClass="alert-danger";
        }
    }
    ?>

    <?php
    
    if(isset($_POST['submit1'])){
        $chocolatec        = $_POST['ChocolateCake'];
        $strawberryc     = $_POST['StrawberryCake'];
        $oreoc          = $_POST['OreoCake'];
        $caramelc           = $_POST['CaramelCake'];
        $tiramisuc          = $_POST['TiramisuCake'];
        $cheesecake           = $_POST['Cheesecake'];
        $macarons           = $_POST['Macarons'];
        $yamcupcake           = $_POST['YamCupcake'];
        $id = $_POST['id'];

        $sql = "UPDATE cakesales SET
        ChocolateCake='$_POST[ChocolateCake]',
        StrawberryCake='$_POST[StrawberryCake]',
        OreoCake='$_POST[OreoCake]',
        CaramelCake='$_POST[CaramelCake]',
        TiramisuCake='$_POST[TiramisuCake]',
        Cheesecake='$_POST[Cheesecake]',
        Macarons='$_POST[Macarons]',
        YamCupcake='$_POST[YamCupcake]'
        WHERE id=$_POST[id];";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $msg = "Data updated successfully";
            $msgClass="alert-success";
        }
        else {
            $msg = "Data not inserted";
            $msgClass="alert-danger";
        }
    }
 ?>


<?php 
    // Delete Data
if (isset($_POST['del_data'])) {
	$query="DELETE FROM cakesales WHERE id=".$_POST['id'];
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
    background-color: mediumspringgreen;
}
	</style>
 </head>
<body>
<header>
        <?php include("header1.php"); ?>
</header>
<div class = "container1" style = "margin-top: -90px; margin-left:200px; padding: 150px;">
<?php
     if (isset($msg)) { ?>
        <div class="form-group">
            <div align="center" style="margin-left: -150px;" class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?>
            </div>
        </div>
        <?php
        }
	?>
  
     <button type="button" class="btn btn-info btn-sm mb-5" style="float:right; margin-top:100px;" data-toggle="modal" data-target="#modal1">Insert Data</button>

     <div class="container">

<h2 style="margin-left: 300px;"><b>Search Range for Cake</b></h2><br>
<div class="col-md-2" style="margin-left: 270px;">
Start:
<input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
</div>
<div class="col-md-2" style="margin-left: 470px; margin-top:-61px;">
End:
<input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
</div>
<div class="col-md-8" style="margin-left:390px; margin-top:30px;">
<input type="button" name="range" id="range" value="Search Now!" class="btn btn-success"/>
</div>
</div>

    
  
   

    <table id="example" class="display responsive nowrap" style = "border: 1px solid black;  
    position:relative;width: 100%; left:-180px; ">
        <thead>
            <tr>
                <th>No#</th>
                <th>Time</th>
                <th>Chocolate Cake</th>
                <th>Strawberry Cake</th>
                <th>Oreo Cake</th>
                <th>Caramel Cake</th>
                <th>Tiramisu Cake</th>
                <th>Cheesecake</th>
                <th>Macarons</th>
                <th>Yam Cupcake</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>


<?php
    require 'config.php';
    $sql = "SELECT * FROM cakesales";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $time          =  $row["time"];
            $chocolatec      =  $row["ChocolateCake"];       
            $strawberryc   =  $row["StrawberryCake"];        
            $oreoc        =  $row["OreoCake"];
            $caramelc        =  $row["CaramelCake"];
            $tiramisuc         =  $row["TiramisuCake"];
            $cheesecake         =  $row["Cheesecake"];
            $macarons         =  $row["Macarons"];
            $yamcupcake        =  $row["YamCupcake"];
            $id            =  $row["id"];
?>

            <tr>
                <td><?php $i++; echo $i; ?></td>
                <td><?php echo $time; ?></td>
                <td><?php echo $chocolatec; ?></td>
                <td><?php echo $strawberryc; ?></td>
                <td><?php echo $oreoc; ?></td>
                <td><?php echo $caramelc; ?></td>
                <td><?php echo $tiramisuc; ?></td>
                <td><?php echo $cheesecake; ?></td>
                <td><?php echo $macarons; ?></td>
                <td><?php echo $yamcupcake; ?></td>
                <td>
                <a href="cakesales.php?id=<?php echo $id;?><#modal2?id=<?php echo $id; ?>"> <button class="btn btn-success btn-sm" style="position:absolute; margin-top: -15px; left:1335px;" data-toggle="modal" data-target="#modal2" name="edit_data"><i class="fas fa-edit"></i></button></a>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        
                        <a href="cakesales.php?id=<?php echo $id; ?>"><button class="btn btn-danger btn-sm" style="position:absolute; margin-top: -15px; left:1375px;" name="del_data"><i class="fas fa-trash"></i></button></a>
                    </form>
                   
                </td>
             <?php }  ?>
            </tr>
         <?php } ?>  
     </tbody>
  </table>


  <!-- The Modal -->
  <div class="modal" id="modal1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Enter Product Sales</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <input type="text" name="ChocolateCake" class="form-control" placeholder="Enter ChocolateCake">
            </div>
          
              <div class="form-group">
                <input type="text" name="StrawberryCake" class="form-control" placeholder="Enter StrawberryCake">
            </div>

              <div class="form-group">
                <input type="text" name="OreoCake" class="form-control" placeholder="Enter OreoCake">
            </div>

              <div class="form-group">
                <input type="text" name="CaramelCake" class="form-control" placeholder="Enter CaramelCake">
            </div>

            <div class="form-group">
                <input type="text" name="TiramisuCake" class="form-control" placeholder="Enter TiramisuCake">
            </div>

            <div class="form-group">
                <input type="text" name="Cheesecake" class="form-control" placeholder="Enter Cheesecake">
            </div>

            <div class="form-group">
                <input type="text" name="Macarons" class="form-control" placeholder="Enter Macarons">
            </div>

            <div class="form-group">
                <input type="text" name="YamCupcake" class="form-control" placeholder="Enter Yam Cupcake">
            </div>

           

            <input type="submit" value="Submit" name="submit" class="btn btn-success btn-sm">
           </form> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- The Modal -->
  <div class="modal fade" id="modal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Product Sales</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <?php
        include("config.php");
        $id = intval($_GET["id"]);
		$sql = "SELECT * FROM cakesales where id=$id ";
		$result = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result))
		{
	    ?>
        <div class="modal-body">
            <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <input type="text" name="ChocolateCake" value="<?php echo $row['ChocolateCake']?>" class="form-control" placeholder="Enter ChocolateCake">
            </div>
          
              <div class="form-group">
                <input type="text" name="StrawberryCake" value="<?php echo $row['StrawberryCake']?>" class="form-control" placeholder="Enter StrawberryCake">
            </div>

              <div class="form-group">
                <input type="text" name="OreoCake" value="<?php echo $row['OreoCake']?>" class="form-control" placeholder="Enter OreoCake">
            </div>

              <div class="form-group">
                <input type="text" name="CaramelCake" value="<?php echo $row['CaramelCake']?>" class="form-control" placeholder="Enter CaramelCake">
            </div>

            <div class="form-group">
                <input type="text" name="TiramisuCake" value="<?php echo $row['TiramisuCake']?>" class="form-control" placeholder="Enter TiramisuCake">
            </div>

            <div class="form-group">
                <input type="text" name="Cheesecake" value="<?php echo $row['Cheesecake']?>" class="form-control" placeholder="Enter CheeseCake">
            </div>

            <div class="form-group">
                <input type="text" name="Macarons" value="<?php echo $row['Macarons']?>" class="form-control" placeholder="Enter Macarons">
            </div>

            <div class="form-group">
                <input type="text" name="YamCupcake" value="<?php echo $row['YamCupcake']?>" class="form-control" placeholder="Enter Yam Cupcake">
            </div>

            

            <input type="submit" value="Submit" name="submit1" class="btn btn-success btn-sm">
           </form> 
        </div>
        <?php
		}
		mysqli_close($conn);
		?>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>




    <button class = "btn btn-primary btn-sm"><a href = "cakechart.php" style = "text-decoration: none; color: #fff;"><i class="fas fa-chart-bar"></i> Graphical Results</a></button>





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
				url:"range2.php",
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