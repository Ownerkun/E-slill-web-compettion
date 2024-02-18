<?php
if(isset($_POST['submit'])){
	$contact_name = $_POST['contact-name'];
	$contact_detail = $_POST['contact-detail'];
	$contact_email = $_POST['contact-email'];
	
	require_once 'conn.php';

	$sql = "INSERT INTO contact (name, email, detail) VALUES ('$contact_name', '$contact_email', '$contact_detail')";
	if($conn -> query($sql) === true){
		echo "Add contact successfully";
	} else {
		echo "Add contact Failed: " . $conn -> error;
	}
	
	header("Location: contact-us.php");
	
	$conn -> close();
}

?>