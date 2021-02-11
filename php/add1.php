<?php 
    require "config.php";
    $msg="";
    if(isset($_POST['submit'])){
        $p_name=$_POST['pName'];
        $p_price=$_POST['pPrice'];
        $target_dir="image/";
        $target_file=$target_dir.basename($_FILES['image']["name"]);
        move_uploaded_file($_FILES['image']["tmp_name"], $target_file);
        $p_code=$_POST['pCode'];

        $sql="INSERT INTO cakeproduct (product_name,product_price,product_image,product_code)VALUES('$p_name','$p_price','$target_file','$p_code')";

        if(mysqli_query($conn,$sql)){
            $msg="New drink has been added successfully!";
        }
        else{
            $msg="Failed to add the product";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>Add New Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"crossorigin="annonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body style="background-color:powderblue;">

    <div class="container1">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light mt-5 rounded">
                <h2 class="text-center p-2">Add New Menu</h2>
                <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                    <div class="form-group">
                        <input type="text" name="pName" class="form-control" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pPrice" class="form-control" placeholder="Product Price" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pCode" class="form-control" placeholder="Product Code" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                        <label>Select Product Image:</label>
                        <input type="file" name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success btn-block" value="Add">
                    </div>
                    <div class="form-group">
                        <h4 class="text-center"><?= $msg; ?></h4>
                    </div>
                    <div class="form-group">
                        <a href="index2.php" class="btn btn-warning btn-block btn-block">Go to product page</a>
                    </div>

                </form>
            </div>
        </div>
    

    </body>

</html>