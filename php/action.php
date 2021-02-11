<?php
    session_start();
    require 'config.php';

    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcode = $_POST['pcode'];
        $puserid = $_SESSION['id'];
        $pqty = 1; 

        $stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=? AND userid=$puserid");
        $stmt->bind_param("s",$pcode);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
        $code = $r['product_code'];

        if(!$code){
            $query = $conn->prepare("INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code,userid) VALUES (?,?,?,?,?,?,?)");
            $query->bind_param("sssisss",$pname,$pprice,$pimage,$pqty,$pprice,$pcode,$puserid);
            $query->execute();

            echo'<div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" 
                        data-dismiss="alert">&times;</button>
                    <strong>Item added to your cart!</strong> 
                </div>';
        }
        else{
            echo'<div class="alert alert-danger alert-dismissible mt-2">
                    <button type="button" class="close" 
                        data-dismiss="alert">&times;</button>
                    <strong>Item had already been added to your cart!</strong> 
                </div>';
        }
    }

    if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
        $puserid = $_SESSION['id'];
        $stmt = $conn-> prepare("SELECT * FROM cart WHERE userid=$puserid");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows; 

        echo $rows;
    }

    if(isset($_GET['remove'])){
        $id = $_GET['remove'];

        $stmt = $conn->prepare("DELETE FROM cart WHERE product_id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Item removed from cart successfully!';
        header('location:cart.php');
    }

    if(isset($_GET['clear'])){
        $puserid = $_SESSION["id"];
        $stmt = $conn->prepare("DELETE FROM cart WHERE userid=$puserid");
        $stmt->execute();
        header('location:cart.php');
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'All items removed from cart successfully!';
    }

    if(isset($_GET['clearr'])){
        $puserid = $_SESSION["id"];
        $stmt = $conn->prepare("DELETE FROM cart WHERE userid=$puserid");
        $stmt->execute();
        header('location:index1.php');

    }

    

    if(isset($_POST['qty'])){
        $qty = $_POST['qty'];
        $pid = $_POST['pid'];
        $pprice = $_POST['pprice'];

        $tprice = $qty*$pprice; 

        $stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE product_id=?");
        $stmt->bind_param("isi",$qty,$tprice,$pid);
        $stmt->execute();
    }

    if(isset($_POST['action']) && isset($_POST['action'])== 'order'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $products = $_POST['products'];
        $grand_total = $_POST['grand_total'];
        $pmode = $_POST['pmode'];
        $puserid = $_SESSION["id"];
        $data = '';

        $stmt = $conn->prepare("INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid,userid)VALUES(?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss", $name,$email,$phone,$address,$pmode,$products,$grand_total,$puserid);
        $stmt->execute();
        $data .='<div class="text-center">
                    <h1 class="display-4 mt-2 text-danger"> Thank you for your purchase! </h1>
                    <h2 class="text-success"> Your order is placed successfully! Please wait patiently while we deliver! </h2>
                    <h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$products.' </h4>
                    <h4> Your Name : '.$name.'</h4>
                    <h4> Your E-mail : '.$email.'</h4>
                    <h4> Your Phone : '.$phone.'</h4>
                    <h4> Your Home Address : '.$address.'</h4>
                    <h4> Total Amount To Be Paid : '.number_format($grand_total,2).'</h4>
                    <h4> Payment Mode : '.$pmode.'</h4>
                    <h5> <a href="action.php?clearr=all" style="position:static; right:780px;" class="btn btn-success">Back to home page</a> </h5>
                    <img src="image/cat2.gif" style="position:relative; margin-right:-30px; bottom:1px; width:400px; height:340px; border:none;"> 
                </div>';
        echo $data;
    }

  

    

?>


