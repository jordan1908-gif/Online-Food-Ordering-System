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
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

</head>
</html>
    



<?php
// Range.php
if(isset($_POST["From"], $_POST["to"]))
{
	$conn = mysqli_connect("localhost", "root", "", "cartsystem","3308");
	$result = '';
	$query = "SELECT * FROM cakesales WHERE time BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
	$sql = mysqli_query($conn, $query);
	$result .='
	<table id="example" class="display responsive nowrap">
	<tr>
	            <th style="background-color: mediumspringgreen;">No#</th>
                <th style="background-color: mediumspringgreen;">Time</th>
                <th style="background-color: mediumspringgreen;">Chocolate Cake&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: mediumspringgreen;">Strawberry Cake&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: mediumspringgreen;">Oreo Cake&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: mediumspringgreen;">Caramel Cake&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: mediumspringgreen;">Tiramisu Cake&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: mediumspringgreen;">Cheesecake&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: mediumspringgreen;">Macarons&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: mediumspringgreen;">Yam Cupcake&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: mediumspringgreen;">Action&nbsp;&nbsp;&nbsp;&nbsp;</th>
	</tr>';
    if(mysqli_num_rows($sql) > 0) {
    $i = 1;
	
		while($row = mysqli_fetch_array($sql))
		{
			$result .='
            <tr>
            <td>'.$i++.'</td>
            <td>'.$row["time"].'&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>'.$row["ChocolateCake"].'</td>
			<td>'.$row["StrawberryCake"].'</td>
			<td>'.$row["OreoCake"].'</td>
			<td>'.$row["CaramelCake"].'</td>
            <td>'.$row["TiramisuCake"].'</td>
            <td>'.$row["Cheesecake"].'</td>
            <td>'.$row["Macarons"].'</td>
            <td>'.$row["YamCupcake"].'</td>
            <td><a href="cakesales.php?id=<?php echo $id;?><#modal2?id=<?php echo $id; ?>"> <button class="btn btn-success btn-sm" style="position:absolute; margin-top: -15px; left:1335px;" data-toggle="modal" data-target="#modal2" name="edit_data"><i class="fas fa-edit"></i></button></a>
            <a href="cakesales.php?id=<?php echo $id; ?>"><button class="btn btn-danger btn-sm" style="position:absolute; margin-top: -15px; left:1375px;" name="del_data"><i class="fas fa-trash"></i></button></a></td>
            </tr>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td style="text-align: center;" colspan="11">No Matching Records Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}
?>

<script src="https://code.jquery.com/jquery-3.4.0.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

