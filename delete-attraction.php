<?php
require_once 'conn.php';

if(isset($_GET['id'])){
	$attraction_id = $_GET['id'];
	
	$delete_img_sql = "DELETE FROM image WHERE attraction_id = '$attraction_id'";
	if($conn -> query($delete_img_sql) === TRUE){
		$delete_sql = "DELETE FROM attraction WHERE id = '$attraction_id'";
		if($conn -> query($delete_sql) === TRUE){
			echo "Delete attraction successfully";
		} else {
			echo "Delete attraction failed:" . $conn -> error;
		}
		echo "Delete image successfully";
	} else {
		echo "Delete image failed:" . $conn -> error;
	}
	
} else {
	echo "ID not provide";
}

	header("Location: admin-attraction.php");
	
	$conn -> close();
?>