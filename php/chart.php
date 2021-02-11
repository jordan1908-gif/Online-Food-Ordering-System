<?php 
//index.php
require('config.php');
$query = "SELECT * FROM sales";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ time:'".$row["time"]."', original:".$row["original"].", watermelon:".$row["watermelon"].", mango:".$row["mango"].", blueberry:".$row["blueberry"].", apricot:".$row["apricot"].", matcha:".$row["matcha"].", horlicks:".$row["horlicks"].", chocolate:".$row["chocolate"].", taro:".$row["taro"].", roasted:".$row["roasted"].", strawberry:".$row["strawberry"]."}, ";
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
 
 <header>
        <?php include("header1.php"); ?>
</header>
  <br /><br />
  <div class="container" style="width:1200px;"> 
   <h2 class="text-center">Milk Tea Sales Per Day</h2>
   
   <br /><br />
   <div id="chart"></div>
  </div>

  <div class = "container">
  <button class = "btn btn-warning btn-sm"><a href = "ownersales.php" style = "text-decoration: none; color: #333;">Back to Results</a></button>
</div>

 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:['time'],
 ykeys:['original','watermelon','mango','blueberry','apricot','matcha','horlicks','chocolate','taro','roasted','strawberry'],
 labels:['original','watermelon','mango','blueberry','apricot','matcha','horlicks','chocolate','taro','roasted','strawberry'],
 
 hideHover:'auto',
 stacked:true
});
</script>