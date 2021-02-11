
<!DOCTYPE html>
<html>
	<head>
		<title>Update</title>
		<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"crossorigin="annonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		
		<style>
        .form-style-5{
	    max-width: 500px;
        height: 440px;
	    padding: 10px 20px;
	    background: #f4f7f8;
	    margin: 10px auto;
	    padding: 20px;
	    background: #f4f7f8;
	    border-radius: 8px;
	    font-family: Georgia, "Times New Roman", Times, serif;
        font-size:20px;
        }
        fieldset{
        height:350px;
        color: black;
        }
        input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 10px;
        background-color: pink;
        color: black;
        }

        input[type=number] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 10px;
        background-color: pink;
        color: black;
        }

        .form-style-5 input[type="submit"]
        {
	    position: relative;
        display: block;
        color: #000;
	    margin: 0 auto;
	    background: lightskyblue;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        width: 100%;
        border: 1px solid darkblue;
        border-width: 1px 1px 1px;
        margin-bottom: 10px;
        }

        header {
            background-image: url('bake1.png');
            background-repeat: no-repeat;
            background-size: initial;
            background-position: center;
            height: 150px;
            position: relative;
        }
		</style>
    </head>
    <body>
    <header>
        <?php include("header6.php"); ?>
    </header>
		<?php
			include("staffconn.php");
			$id = intval($_GET["id"]);
            $result = mysqli_query($con,"SELECT * FROM product WHERE product_id=$id");
			while ($row = mysqli_fetch_array($result))
		    {
        ?>

        <div class="form-style-5">
            <form action="u3.php" method="post">
		    <input type="hidden" name="id" value="<?php echo $row["product_id"]; ?>">
		    <fieldset>
		
		    &nbsp &nbsp &nbsp Product Name:<br>
		    <input type="text" name="name"  readonly="readonly" value="<?php echo $row["product_name"]; ?>" required><br><br>
		
		    &nbsp &nbsp &nbsp Product price:<br>
		    <input type="number" name="price" min="1" value="<?php echo $row["product_price"]; ?>" required><br><br>
		
            <input type="submit"  class="btn btn-success btn-block" value="Submit"> 
            <a href="index1.php" style="margin-top: 30px; border : 3px solid orange; border-width: 1px 1px 1px; font-size: 18px; " class="btn btn-warning btn-block btn-block">Go to product page</a>
            </fieldset>
            </form>
        </div>
        <?php 
            }
        ?>

       
        
		
	
		
	</body>
</html>