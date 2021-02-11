<?php include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="bot.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    <style>
			body {
				font-family: Georgia, serif;
                
			}
			.box {
                position: relative;
                right: -650px;
                top: 100px;
                margin:10px;
                padding:10px;
                width:400px;
                height:580px;
                background-color: ;
                border-radius:10px;
            }

            .form-div {
                margin: 50px auto 50px;
                padding: 25px 15px 10px 15px;
                border:1px solid #000;
                border-radius: 5px;
                font-size: 1.2em;
                font-family: 'EB Garamond', serif;
                width: 500px;
                text-align: center;
                background-color: mintcream;
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


<img src="image/b1.jpg" style="position:fixed; right:1100px; bottom:120px; width:350px; height:500px; border:none;">   
<img src="image/b2.png" style="position:fixed; right:200px; bottom:110px; width:350px; height:500px; border:none;">  

<?php
        include("config.php");
        $id = intval($_GET['id']);
		$sql = "SELECT * FROM staff WHERE id=$id";
		$result = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result))
		{
    ?>
        <div class="col-md-4 offset-md-4 form-div login">
		<form action="update2.php" method="post">
			<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
		<fieldset>
			<h2>My Profile</h2>
			Name:<br>
			<input type="username" name="username" style="width: 350px;" value="<?php echo $row['username']?>" required="required"></br></br>
			
			Email:<br>
			<input type="email" name="email" style="width: 350px;" value="<?php echo $row['email']?>" required="required"></br></br>
			
			Contact:<br>
			<input type="contact" name="contact" style="width: 350px;" value="<?php echo $row['contact']?>" required="required"></br></br>

            Gender:
			</br><input type="radio" name="gender"  <?php if ($row['gender'] == "Male") { ?>checked="checked"<?php } ?> value="Male"  required="required">Male&nbsp;
			<input type="radio" name="gender"  <?php if ($row['gender'] == "Female") { ?>checked="checked"<?php } ?> value="Female"  required="required">Female</br></br>

            Position:
			</br><input type="radio" name="position"  <?php if ($row['position'] == "Cake Designer") { ?>checked="checked"<?php } ?> value="Cake Designer"  required="required">Cake Designer&nbsp;
            <input type="radio" name="position"  <?php if ($row['position'] == "Executive Chef") { ?>checked="checked"<?php } ?> value="Executive Chef"  required="required">Executive Chef&nbsp;
            <input type="radio" name="position"  <?php if ($row['position'] == "Manager") { ?>checked="checked"<?php } ?> value="Manager"  required="required">Manager</br></br>

			Home Address:
			<textarea name="address" name="address" style="width: 350px; height:100px;" required="required"><?php echo $row['address']?></textarea></br></br>
			
			<input type="submit" class="btn btn-success" value="Submit">
		</fieldset>
		</form>
	<?php
		}
		mysqli_close($conn);
		?>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
</body>
</html>