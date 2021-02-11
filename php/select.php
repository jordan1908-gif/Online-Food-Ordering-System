<?php  
 if(isset($_POST["customer_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cartsystem","3308");  
      $query = "SELECT * FROM users WHERE id = '".$_POST["customer_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["username"].'</td>  
                </tr> 
                <tr>  
                    <td width="30%"><label>Email</label></td>  
                    <td width="70%">'.$row["email"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Address</label></td>  
                     <td width="70%">'.$row["address"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Member since</label></td>  
                    <td width="70%">'.$row["joined"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Gender</label></td>  
                     <td width="70%">'.$row["gender"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Contact</label></td>  
                     <td width="70%">'.$row["contact"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Verified</label></td>  
                     <td width="70%">'.$row["verified"].'</td>  
                </tr>    
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>