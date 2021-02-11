<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
	$name= $_POST['name']; 
	$email= $_POST['email']; 
	$address= $_POST['address']; 
	$phone= $_POST['phone']; 
	$subject= $_POST['subject']; 
	$remarks= $_POST['remarks']; 

	require_once "PHPMailer/PHPMailer.php";
	require_once "PHPMailer/SMTP.php";
	require_once "PHPMailer/Exception.php";

	$mail = new PHPMailer();

	//smtp 
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true; 
	$mail->Username = "bakeandtakebakery7@gmail.com";
	$mail->Password = "myvi8166";
	$mail->Port = '587'; 
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

	//email
	$mail->isHTML(true);
	$mail->setFrom($email, $name);
	$mail->addAddress("bakeandtakebakery7@gmail.com");
	$mail->Subject = ("$email ($subject)");
	$mail->Body = "<h3>Name: $name <br>Email: $email <br>Address: $address <br>Phone Number: $phone <br>Subject: $subject <br>Remarks: $remarks</h3>"; 

	if($mail->send()){
		$status = "success";
		$response = "Email is sent!";
	}
	else 
	{
		$status = "failed";
		$response = "Something went wrong: <br>" .$mail->ErrorInfo;
	}
	exit(json_encode(array("status" => $status, "response" => $response)));


}

?>