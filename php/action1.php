<?php
    include 'config.php';
    $output='';

    if(isset($_POST['query'])){
        $search=$_POST['query'];
        $stmt=$conn->prepare("SELECT * FROM users WHERE id LIKE 
            CONCAT('%',?,'%') OR username LIKE  CONCAT('%',?,'%')");
        $stmt->bind_param("ss",$search,$search);
    }
    else{
        $stmt=$conn->prepare("SELECT * FROM users");
    }
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows>0){
        $output = "<thead> 
                        <tr>  
                            <th>Customer ID</th> 
                            <th>Customer Name</th>  
                            <th>Details</th>  
                        </tr> 
                    </thead>
                    <tbody>";
                    while($row=$result->fetch_assoc()){
                        $output .="
                        <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['username']."</td>  
                            <td><input type='button' name='view' value='VIEW' class='btn btn-info btn view_data' id='".$row['id']."'/></td>
                           
                        </tr>";
                    }
                    $output .="</tbody>";
                    echo $output;
                }
                else {
                    echo"<h3>No Records Found!</h3>";
                }

    

?>
<script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var customer_id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{customer_id:customer_id},  
                success:function(data){  
                     $('#customer_name').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>