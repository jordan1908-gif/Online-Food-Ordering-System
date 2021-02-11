<?php 
//index.php
require('config.php');
$query = "SELECT * FROM cakesales";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ time:'".$row["time"]."', ChocolateCake:".$row["ChocolateCake"].", StrawberryCake:".$row["StrawberryCake"].", OreoCake:".$row["OreoCake"].", CaramelCake:".$row["CaramelCake"].", TiramisuCake:".$row["TiramisuCake"].", Cheesecake:".$row["Cheesecake"].", Macarons:".$row["Macarons"].", YamCupcake:".$row["YamCupcake"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Graphs</title>
  <style>
		

            header {
            background-image: url('bake1.png');
            background-repeat: no-repeat;
            background-size: initial;
            background-position: center;
            height: 150px;
            position: relative;
            }
	</style>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  
 </head>
 <body>
 <header>
        <?php include("header1.php"); ?>
</header>
  <br /><br />
  <div class="container" style="width:1200px;"> 
   <h2 class="text-center">Cake Sales Per Day</h2>
   
   <br /><br />
   <div id="bar-chart"></div>
  </div>

  <div class = "container">
  <button class = "btn btn-warning btn-sm"><a href = "cakesales.php" style = "text-decoration: none; color: #333;">Back to Results</a></button>
</div>

 </body>
</html>

<script>
Morris.Bar({
 element : 'bar-chart',
 data:[<?php echo $chart_data; ?>],
 xkey:['time'],
 ykeys:['ChocolateCake','StrawberryCake','OreoCake','CaramelCake','TiramisuCake','Cheesecake','Macarons','YamCupcake'],
 labels:['ChocolateCake','StrawberryCake','OreoCake','CaramelCake','TiramisuCake','Cheesecake','Macarons','YamCupcake'],
 hideHover:'auto',
 stacked:true
});
</script>