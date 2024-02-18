<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel</title>
<link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.4.1.js"></script>
</head>

<body>
	<?php
	
	require_once 'nav.php';
	require_once 'conn.php';
	
	if(isset($_GET['id'])){
		$attraction_id = $_GET['id'];
		
		$sql = "SELECT * FROM attraction WHERE id = $attraction_id";
		$result = $conn -> query($sql);
		if($result -> num_rows > 0){
			$row = $result -> fetch_assoc();
			$attraction_name = $row['name'];
			$attraction_detail = $row['detail'];
		}
	}
	?>
	
	<div class="container">
		<div class="row pt-3 pb-3">
			<h1>Edit Attraction</h1>
		</div>
	</div>
	<div class="container pt-3">
		<div class="row">
			<form action="edit-attraction-data.php" name="form" id="form" enctype="multipart/form-data" method="post">
				<div class="form-group" style="display: none">
            		<label for="attraction-id">Attraction ID</label>
            		<input type="text" class="form-control" id="attraction-id" name="attraction-id" value="<?php echo $attraction_id ?>">
            	</div>
				<div class="form-group">
					<label for="attraction-name">Attraction Name</label>
					<input type="text" class="form-control" id="attraction-name" name="attraction-name" value="<?php echo $attraction_name ?>">
				</div>
				<div class="form-group">
					<label for="attraction-detail">Attraction Detail</label>
					<textarea type="text" class="form-control" name="attraction-detail" rows="4" id="attraction-detail"><?php echo $attraction_detail ?></textarea>
				</div>
				<div class="form-group">
					<label for="attraction-detail">Attraction Image</label>
					<input type="file" class="form-control-file" name="attraction-img[]" id="attraction-img" multiple>
				</div>
				<?php
				
				$img_sql = "SELECT * FROM image WHERE attraction_id = $attraction_id";
				$img_result = $conn -> query($img_sql);
				
				if($img_result -> num_rows > 0){
					while($row_img = $img_result -> fetch_assoc()){
						$img_id = $row_img['id'];
						$img_path = $row_img['path'];
						echo '<div class="form-group">';
						echo '<label>Current Image</label>';
						echo '<img src="'.$img_path.'" class="img-thumbnail" style="width:150px; height=150px;">';
						echo '<input type="checkbox" name="remove-img[]" value="'.$img_id.'"> Remove';
						echo '</div>';
					}
				}
				
				?>
				<button type="submit" class="btn btn-primary" name="submit">Save</button>
		</form>
		</div>
	</div>
	
	<script>
		function validateForm(){
			var	attractionName = document.getElementById("attraction-name").value.trim();
			var attractionDetail = document.getElementById("attraction-detail").value.trim();
			var image = document.getElementById("attraction-img").value.trim();
			
			if	(attractionName === "" || attractionDetail === ""){
				alert ("Please fill all fields");
				return false;
			}
			return true;
		}
		
		document.getElementById("form").addEventListener("submit", function(event){
			if	(!validateForm()){
				event.preventDefault();
			}
		});
	</script>
</body>
</html>