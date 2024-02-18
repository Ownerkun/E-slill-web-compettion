<?php
if(isset($_POST['submit'])){
	$attraction_name = $_POST['attraction-name'];
	$attraction_detail = $_POST['attraction-detail'];
	
	require_once 'conn.php';

	$sql = "INSERT INTO attraction (name, detail) VALUES ('$attraction_name', '$attraction_detail')";
	if($conn -> query($sql) === true){
		$attraction_id = $conn -> insert_id;
		
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
		echo "Add attraction successfully";
	} else {
		echo "Add Attraction Failed: " . $conn -> error;
	}
	
	header("Location: admin-attraction.php");
	
	$conn -> close();
}

?>