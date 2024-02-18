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
	
	?>
	
	<div class="container">
		<div class="row pt-3 pb-3">
			<h1>Add Attraction</h1>
		</div>
	</div>
	<div class="container pt-3">
		<div class="row">
			<form action="add-attraction-data.php" name="form" id="form" enctype="multipart/form-data" method="post">
			<div class="form-group">
            	<label for="attraction-name">Attraction Name</label>
            	<input type="text" class="form-control" id="attraction-name" name="attraction-name">
            </div>
			<div class="form-group">
				<label for="attraction-detail">Attraction Detail</label>
				<textarea type="text" class="form-control" name="attraction-detail" rows="4" id="attraction-detail"></textarea>
			</div>
			<div class="form-group">
				<label for="attraction-detail">Attraction Image</label>
				<input type="file" class="form-control-file" name="attraction-img[]" id="attraction-img" multiple>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Save</button>
		</form>
		</div>
	</div>
	
	<script>
		function validateForm(){
			var	attractionName = document.getElementById("attraction-name").value.trim();
			var attractionDetail = document.getElementById("attraction-detail").value.trim();
			var image = document.getElementById("attraction-img").value.trim();
			
			if	(attractionName === "" || attractionDetail === "" || image === ""){
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