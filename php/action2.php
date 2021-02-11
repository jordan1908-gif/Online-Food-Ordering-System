<?php
    include 'config.php';
    $output='';

    if(isset($_POST['query'])){
        $search=$_POST['query'];
        $stmt=$conn->prepare("SELECT * FROM deliveredorders WHERE id LIKE 
            CONCAT('%',?,'%') OR name LIKE  CONCAT('%',?,'%')");
        $stmt->bind_param("ss",$search,$search);
    }
    else{
        $stmt=$conn->prepare("SELECT * FROM deliveredorders");
    }
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows>0){
        $output = "<thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Products</th>
                            <th>Total Amount (RM)</th>
                            <th>Order Period</th>
                            <th>Deliver Period </th>
                        </tr>
                    </thead>
                    <tbody>";
                    while($row=$result->fetch_assoc()){
                        $output .="
                        <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['name']."</td> 
                            <td>".$row['products']."</td>
                            <td>".$row['amount_paid']."</th>
                            <td>".$row['order_timestamp']."</th> 
                            <td>".$row['deliver_timestamp']."</th> 
                        </tr>";
                    }
                    $output .="</tbody>";
                    echo $output;
                }
                else {
                    echo"<h3>No Records Found!</h3>";
                }

    

?>
