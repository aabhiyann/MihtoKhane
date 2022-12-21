
<?php
     $Name = $_POST['name'];
     $Email = $_POST['email'];
     $Find = $_POST['find-us'];
  
     $Message =$_POST['message'];


	// Database connection
	$conn = new mysqli('localhost','root','','Khana');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into newsletter(Name, Email, Find,  Message) 
	values(?,?,?,?)");
		$stmt->bind_param('ssss',$Name,$Email,$Find,$Message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Thank You";
		$stmt->close();
		$conn->close();
	}
?>
