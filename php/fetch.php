<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "cartsystem","3308");
$columns = array('id', 'time', 'original', 'watermelon', 'mango', 'blueberry', 'apricot' , 'matcha', 'horlicks', 'chocolate', 'taro', 'roasted', 'strawberry');

$query = "SELECT * FROM sales WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'time BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR original LIKE "%'.$_POST["search"]["value"].'%" 
  OR watermelon LIKE "%'.$_POST["search"]["value"].'%" 
  OR mango LIKE "%'.$_POST["search"]["value"].'%" 
  OR blueberry LIKE "%'.$_POST["search"]["value"].'%" 
  OR apricot LIKE "%'.$_POST["search"]["value"].'%" 
  OR matcha LIKE "%'.$_POST["search"]["value"].'%" 
  OR horlicks LIKE "%'.$_POST["search"]["value"].'%" 
  OR chocolate LIKE "%'.$_POST["search"]["value"].'%" 
  OR taro LIKE "%'.$_POST["search"]["value"].'%" 
  OR roasted LIKE "%'.$_POST["search"]["value"].'%" 
  OR strawberry LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["time"];
 $sub_array[] = $row["original"];
 $sub_array[] = $row["watermelon"];
 $sub_array[] = $row["mango"];
 $sub_array[] = $row["blueberry"];
 $sub_array[] = $row["apricot"];
 $sub_array[] = $row["matcha"];
 $sub_array[] = $row["horlicks"];
 $sub_array[] = $row["chocolate"];
 $sub_array[] = $row["taro"];
 $sub_array[] = $row["roasted"];
 $sub_array[] = $row["strawberry"];
 
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM sales";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
