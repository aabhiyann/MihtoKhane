
<?php
     $Address = $_POST['Address'];
     $Orders = $_POST['Orders'];
	 $Name =$_POST['Name'];
	 $email =$_POST['email'];


	// Database connection
	$conn = new mysqli('localhost','root','','Khana');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into deliveryorders(Address, Orders, Name, email) 
	values(?,?,?,?)");
		$stmt->bind_param('ssss', $Address,$Orders,$Name,$email);
		$execval = $stmt->execute();
		echo $execval;
		
		$stmt->close();
		$conn->close();
	}
?>