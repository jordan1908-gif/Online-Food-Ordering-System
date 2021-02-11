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

</head>
</html>
    



<?php
// Range.php
if(isset($_POST["From"], $_POST["to"]))
{
	$conn = mysqli_connect("localhost", "root", "", "cartsystem","3308");
	$result = '';
	$query = "SELECT * FROM sales WHERE time BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
	$sql = mysqli_query($conn, $query);
	$result .='
	<table id="example" class="display responsive nowrap">
	<tr>
	            <th style="background-color: lightblue;">No#</th>
                <th style="background-color: lightblue;">Time</th>
                <th style="background-color: lightblue;">Original&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Watermelon&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Mango&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Blueberry&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Apricot&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Matcha&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Horlicks&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Chocolate&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Taro&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Roasted&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Strawberry&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="background-color: lightblue;">Action&nbsp;&nbsp;&nbsp;&nbsp;</th>
	</tr>';
    if(mysqli_num_rows($sql) > 0) {
    $i = 1;
	
		while($row = mysqli_fetch_array($sql))
		{
			$result .='
            <tr>
            <td>'.$i++.'</td>
            <td>'.$row["time"].'&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>'.$row["original"].'</td>
			<td>'.$row["watermelon"].'</td>
			<td>'.$row["mango"].'</td>
			<td>'.$row["blueberry"].'</td>
            <td>'.$row["apricot"].'</td>
            <td>'.$row["matcha"].'</td>
            <td>'.$row["horlicks"].'</td>
            <td>'.$row["chocolate"].'</td>
            <td>'.$row["taro"].'</td>
            <td>'.$row["roasted"].'</td>
            <td>'.$row["strawberry"].'</td>
            <td><a href="ownersales.php?id=<?php echo $id;?><#modal2?id=<?php echo $id; ?>"> <button class="btn btn-success btn-sm" style="position:absolute; margin-top: -15px; left:1375px;" data-toggle="modal" data-target="#modal2" name="edit_data"><i class="fas fa-edit"></i></button></a>
            <a href="ownersales.php?id=<?php echo $id; ?>"><button class="btn btn-danger btn-sm" style="position:absolute; margin-top: -15px; left:1415px;" name="del_data"><i class="fas fa-trash"></i></button></a></td>
            </tr>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td style="text-align:center;" colspan="14">No Matching Records Found</td>
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