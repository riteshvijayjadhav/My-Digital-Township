<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$number = $_POST['number'];
    $message = $_POST['message'];


	// Database connection
	$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstname, lastname, number, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $firstname, $lastname, $number, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Your message has been send successfully... <br> We Will contact you soon.";
		$stmt->close();
		$conn->close();
	}
?>