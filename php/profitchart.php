<?php 
//index.php
require('config.php');
$query = "SELECT * FROM deliveredorders";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ order_timestamp:'".$row["order_timestamp"]."', amount_paid:".$row["amount_paid"]."}, ";
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
  <div class="container" style="width:1000px;"> 
   <h2 class="text-center">Amount Earned Per Day in RM</h2>
   
   <br /><br />
   <div id="chart"></div>
  </div>

  <div class = "container">
  <button class = "btn btn-warning btn-sm"><a href = "profit.php" style = "text-decoration: none; color: #333;">Back to Results</a></button>
</div>

 </body>
</html>

<script>
Morris.Line({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:['order_timestamp'],
 ykeys:['amount_paid',],
 labels:['amount_paid'],
 hideHover:'auto',
 stacked: true
});
</script>