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
	$query = "SELECT * FROM deliveredorders WHERE order_timestamp BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
	$sql = mysqli_query($conn, $query);
	$result .='
	<table id="example" class="display responsive nowrap">
	<tr>
	            <th style="background-color: lavender;">No#</th>
                <th style="background-color: lavender;">Time</th>
                <th style="background-color: lavender;">Amount Earned (RM)</th>
	</tr>';
    if(mysqli_num_rows($sql) > 0) {
    $i = 1;
	
		while($row = mysqli_fetch_array($sql))
		{
			$result .='
            <tr>
            <td>'.$i++.'</td>
            <td>'.$row["order_timestamp"].'</td>
			<td>'.$row["amount_paid"].'</td>
            </tr>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td style="text-align:center;" colspan="5">No Matching Records Found</td>
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