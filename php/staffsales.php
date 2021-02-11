<?php include("staffsession.php");
require 'config.php'; 

$msg = '';
    $msgClass = '';
    
    if(isset($_POST['submit'])){
        $original        = $_POST['original'];
        $watermelon     = $_POST['watermelon'];
        $mango           = $_POST['mango'];
        $blueberry           = $_POST['blueberry'];
        $apricot          = $_POST['apricot'];
        $matcha           = $_POST['matcha'];
        $horlicks           = $_POST['horlicks'];
        $chocolate           = $_POST['chocolate'];
        $taro           = $_POST['taro'];
        $roasted           = $_POST['roasted'];
        $strawberry          = $_POST['strawberry'];

        $sql = "INSERT INTO sales(original, watermelon, mango, blueberry, apricot, matcha, horlicks, chocolate, taro, roasted, strawberry) VALUES('$original', '$watermelon', '$mango', '$blueberry', '$apricot', '$matcha', '$horlicks', '$chocolate', '$taro', '$roasted', '$strawberry')";
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
        $original        = $_POST['original'];
        $watermelon     = $_POST['watermelon'];
        $mango           = $_POST['mango'];
        $blueberry           = $_POST['blueberry'];
        $apricot          = $_POST['apricot'];
        $matcha           = $_POST['matcha'];
        $horlicks           = $_POST['horlicks'];
        $chocolate           = $_POST['chocolate'];
        $taro           = $_POST['taro'];
        $roasted           = $_POST['roasted'];
        $strawberry          = $_POST['strawberry'];
        $id = $_POST['id'];

        $sql = "UPDATE sales SET
        original='$_POST[original]',
        watermelon='$_POST[watermelon]',
        mango='$_POST[mango]',
        blueberry='$_POST[blueberry]',
        apricot='$_POST[apricot]',
        matcha='$_POST[matcha]',
        horlicks='$_POST[horlicks]',
        chocolate='$_POST[chocolate]',
        taro='$_POST[taro]',
        roasted='$_POST[roasted]',
        strawberry='$_POST[strawberry]'
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
    background-color: lightblue;
}
	</style>
 </head>
<body>
<header>
        <?php include("header6.php"); ?>
</header>
<div class = "container1" style = "margin-top: -90px; margin-left:200px; padding: 150px;">
<?php
     if (isset($msg)) { ?>
        <div class="form-group">
            <div align="center" style="margin-left:-150px;" class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?>
            </div>
        </div>
        <?php
        }
	?>
  
     <button type="button" class="btn btn-info btn-sm mb-5" style="float:right; margin-top:100px;" data-toggle="modal" data-target="#modal1">Open Modal</button>

     <div class="container">

<h2 style="margin-left: 270px;"><b>Search Range for Milk Tea</b></h2><br>
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
                <th>Original</th>
                <th>Watermelon</th>
                <th>Mango</th>
                <th>Blueberry</th>
                <th>Apricot</th>
                <th>Matcha</th>
                <th>Horlicks</th>
                <th>Chocolate</th>
                <th>Taro</th>
                <th>Roasted</th>
                <th>Strawberry</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>


<?php
    require 'config.php';
    $sql = "SELECT * FROM sales";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $time          =  $row["time"];
            $original      =  $row["original"];       
            $watermelon   =  $row["watermelon"];        
            $mango         =  $row["mango"];
            $blueberry         =  $row["blueberry"];
            $apricot         =  $row["apricot"];
            $matcha         =  $row["matcha"];
            $horlicks         =  $row["horlicks"];
            $chocolate         =  $row["chocolate"];
            $taro         =  $row["taro"];
            $roasted         =  $row["roasted"];
            $strawberry         =  $row["strawberry"];
            $id            =  $row["id"];
?>

            <tr>
                <td><?php $i++; echo $i; ?></td>
                <td><?php echo $time; ?></td>
                <td><?php echo $original; ?></td>
                <td><?php echo $watermelon; ?></td>
                <td><?php echo $mango; ?></td>
                <td><?php echo $blueberry; ?></td>
                <td><?php echo $apricot; ?></td>
                <td><?php echo $matcha; ?></td>
                <td><?php echo $horlicks; ?></td>
                <td><?php echo $chocolate; ?></td>
                <td><?php echo $taro; ?></td>
                <td><?php echo $roasted; ?></td>
                <td><?php echo $strawberry; ?></td>
                <td>
                <a href="staffsales.php?id=<?php echo $id;?><#modal2?id=<?php echo $id; ?>"> <button class="btn btn-success btn-sm" style="position:absolute; margin-top: -15px; left:1370px;" data-toggle="modal" data-target="#modal2" name="edit_data"><i class="fas fa-edit"></i></button></a>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        
                        <a href="staffsales.php?id=<?php echo $id; ?>"><button class="btn btn-danger btn-sm" style="position:absolute; margin-top: -15px; left:1415px;" name="del_data"><i class="fas fa-trash"></i></button></a>
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
                <input type="text" name="original" class="form-control" placeholder="Enter original">
            </div>
          
              <div class="form-group">
                <input type="text" name="watermelon" class="form-control" placeholder="Enter watermelon">
            </div>

              <div class="form-group">
                <input type="text" name="mango" class="form-control" placeholder="Enter mango">
            </div>

              <div class="form-group">
                <input type="text" name="blueberry" class="form-control" placeholder="Enter blueberry">
            </div>

            <div class="form-group">
                <input type="text" name="apricot" class="form-control" placeholder="Enter apricot">
            </div>

            <div class="form-group">
                <input type="text" name="matcha" class="form-control" placeholder="Enter matcha">
            </div>

            <div class="form-group">
                <input type="text" name="horlicks" class="form-control" placeholder="Enter horlicks">
            </div>

            <div class="form-group">
                <input type="text" name="chocolate" class="form-control" placeholder="Enter chocolate">
            </div>

            <div class="form-group">
                <input type="text" name="taro" class="form-control" placeholder="Enter taro">
            </div>

            <div class="form-group">
                <input type="text" name="roasted" class="form-control" placeholder="Enter roasted">
            </div>

            <div class="form-group">
                <input type="text" name="strawberry" class="form-control" placeholder="Enter strawberry">
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
		$sql = "SELECT * FROM sales where id=$id ";
		$result = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result))
		{
	    ?>
        <div class="modal-body">
            <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <input type="text" name="original" value="<?php echo $row['original']?>" class="form-control" placeholder="Enter original">
            </div>
          
              <div class="form-group">
                <input type="text" name="watermelon" value="<?php echo $row['watermelon']?>" class="form-control" placeholder="Enter watermelon">
            </div>

              <div class="form-group">
                <input type="text" name="mango" value="<?php echo $row['mango']?>" class="form-control" placeholder="Enter mango">
            </div>

              <div class="form-group">
                <input type="text" name="blueberry" value="<?php echo $row['blueberry']?>" class="form-control" placeholder="Enter blueberry">
            </div>

            <div class="form-group">
                <input type="text" name="apricot" value="<?php echo $row['apricot']?>" class="form-control" placeholder="Enter apricot">
            </div>

            <div class="form-group">
                <input type="text" name="matcha" value="<?php echo $row['matcha']?>" class="form-control" placeholder="Enter matcha">
            </div>

            <div class="form-group">
                <input type="text" name="horlicks" value="<?php echo $row['horlicks']?>" class="form-control" placeholder="Enter horlicks">
            </div>

            <div class="form-group">
                <input type="text" name="chocolate" value="<?php echo $row['chocolate']?>" class="form-control" placeholder="Enter chocolate">
            </div>

            <div class="form-group">
                <input type="text" name="taro" value="<?php echo $row['taro']?>" class="form-control" placeholder="Enter taro">
            </div>

            <div class="form-group">
                <input type="text" name="roasted" value="<?php echo $row['roasted']?>" class="form-control" placeholder="Enter roasted">
            </div>

            <div class="form-group">
                <input type="text" name="strawberry" value="<?php echo $row['strawberry']?>" class="form-control" placeholder="Enter strawberry">
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
				url:"range.php",
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