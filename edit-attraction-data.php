<?php
require_once 'conn.php';

if(isset($_POST['submit'])){
	$attraction_id = $_POST['attraction-id'];
	$attraction_name = $_POST['attraction-name'];
	$attraction_detail = $_POST['attraction-detail'];
	
	$update_sql = "UPDATE attraction SET name = '$attraction_name', detail = '$attraction_detail' WHERE id = $attraction_id";
	if($conn -> query($update_sql) === TRUE){
		echo "Update Attraction successfully";
	} else {
		echo "Update Attration failed:" . $conn -> error;
	}
	
	if(isset($_POST['remove-img'])){
		foreach($_POST['remove-img'] as $img_id){
			$remove_img_sql = "DELETE FROM image WHERE id = '$img_id'";
			if($conn -> query($remove_img_sql) === TRUE){
				echo "Remove image successfully";
			} else {
				echo "Remove Image failed:" .$conn -> error;
			}
		}
	}
	
	if(!empty($_FILES['attraction-img']['name'][0])){
			$total_img = count($_FILES['attraction-img']['name']);
			for($i = 0; $i < $total_img; $i++){
				$img_name = $_FILES['attraction-img']['name'][$i];
				$img_tmp = $_FILES['attraction-img']['tmp_name'][$i];
				$img_path = "upload/" . $img_name;
				move_uploaded_file($img_tmp, $img_path);
				
				$sql = "INSERT INTO image (attraction_id, path) VALUES('$attraction_id', '$img_path')";
				if($conn -> query($sql) === TRUE){
					echo "Add image successfully";
				} else {
					echo "Add image failed:" . $conn -> error;
				}
			}
		}
} else {
	header("Location: edit-attraction.php?id=$attraction_id");
	exit();
}

header("Location: admin-attraction.php");
$conn -> close();
?>