
<?php
     $Address = $_POST['Address'];
     $Orders = $_POST['Orders'];
     $Phone = $_POST['Phone'];
	 $Name =$_POST['Name'];
	 $email =$_POST['email'];


	// Database connection
	$conn = new mysqli('localhost','root','','Khana');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into pickuporders(Address, Orders, Phone, Name, email) 
	values(?,?,?,?,?)");
		$stmt->bind_param('sssss', $Address,$Orders,$Phone,$Name,$email);
		$execval = $stmt->execute();
		echo $execval;
	
		$stmt->close();
		$conn->close();
	}
?>
